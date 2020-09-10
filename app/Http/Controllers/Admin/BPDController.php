<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BPD;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BPDController extends Controller
{
    public function index()
    {
        $bpd = BPD::all();

        return view('Admin.Pages.home_bpd', compact('bpd'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'photo' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin_home_bpd')->with('alert', $validator->getMessageBag());
        }

        $file = $request->file('photo');
        $nama_file = "BPD" . time() . "." . $file->getClientOriginalExtension();
        $tujuan_upload = storage_path('app/public/images/bpd');
        $file->move($tujuan_upload, $nama_file);

        BPD::create([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'photo' => $nama_file,
        ]);

        return redirect()->route('admin_home_bpd')->with('status', 'Data Berhasil Ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $file = $request->file('photo');

        if (is_null($file)) {
            BPD::where('id', $id)
                ->update([
                    'nama' => $request->nama,
                    'jabatan' => $request->jabatan
                ]);
        }else{
            $validator = Validator::make($request->all(), [
                'photo' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
            ]);

            if ($validator->fails()) {
                return redirect()->route('admin_home_bpd')->with('alert', $validator->getMessageBag());
            }

            $file = $request->file('photo');
            $nama_file = "BPD" . time() . "." . $file->getClientOriginalExtension();
            $tujuan_upload = storage_path('app/public/images/bpd');
            $file->move($tujuan_upload, $nama_file);

            BPD::where('id', $id)
                ->update([
                    'nama' => $request->nama,
                    'jabatan' => $request->jabatan,
                    'photo' => $nama_file
                ]);
        }

        return redirect()->route('admin_home_bpd')->with('status', 'Data Berhasil Diupdate');
    }

    public function destroy($id)
    {
        BPD::destroy($id);

        return redirect()->route('admin_home_bpd');
    }
}
