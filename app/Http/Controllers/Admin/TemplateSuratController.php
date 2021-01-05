<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\template_surat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class TemplateSuratController extends Controller
{
    public function index()
    {
        $data = array();
        $data['surat'] = template_surat::all();
        return view('Admin.Pages.TemplateSurat.index', compact("data"));
    }
    public function tambah(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'file' => 'required|mimes:doc,docx'
        ]);

        $template = new template_surat;
        $template->nama = $request->nama;
        $template->file = 'a';
        $template->save();

        $extension = $request->file('file')->getClientOriginalExtension();
        $location = 'Surat/Template';
        $nameUpload = $template->id . '-' . $request->nama . '.' . $extension;
        $request->file('file')->move('Assets/' . $location, $nameUpload);
        $filepath = $location . "/" . $nameUpload;
        $template->file = $filepath;
        $template->save();

        return redirect(route('admin_template_surat_index'))->with('icon', 'success')->with('title', 'Berhasil!')->with('message', 'Surat berhasil ditambahkan.');
    }

    public function hapus($id)
    {
        $t = template_surat::find($id);
        File::delete('Assets/' . $t->file);
        $t->delete();
        return redirect(route('admin_template_surat_index'))->with('icon', 'success')->with('title', 'Berhasil!')->with('message', 'Surat berhasil dihapus.');
    }

    public function edit(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'file' => 'mimes:doc,docx'
        ]);
        $t = template_surat::find($id);
        $t->nama = $request->nama;
        if ($request->has('file')) {
            $extension = $request->file('file')->getClientOriginalExtension();
            $location = 'Surat/Template';
            $nameUpload = $t->id . '-' . $request->nama . '.' . $extension;
            $request->file('file')->move('Assets/' . $location, $nameUpload);
            $filepath = $location . "/" . $nameUpload;
            $t->file = $filepath;
        }
        $t->save();
        return redirect(route('admin_template_surat_index'))->with('icon', 'success')->with('title', 'Berhasil!')->with('message', 'Surat berhasil diubah.');
    }

    public function download($id)
    {
        $t = template_surat::find($id);
        return response()->download(public_path('Assets/' . $t->file));
    }
}
