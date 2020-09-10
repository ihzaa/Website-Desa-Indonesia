<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PerangkatDesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PerangkatDesaController extends Controller
{
    public function index()
    {
        $perangkats = PerangkatDesa::all();

        return view('Admin.Pages.home_perangkat_desa', compact('perangkats'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'photo' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin_home_perangkatdesa')->with('alert', $validator->getMessageBag());
        }

        $file = $request->file('photo');
        $nama_file = "PD" . time() . "." . $file->getClientOriginalExtension();
        $tujuan_upload = storage_path('app/public/images/perangkat');
        $file->move($tujuan_upload, $nama_file);

        PerangkatDesa::create([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'photo' => $nama_file,
        ]);

        return redirect()->route('admin_home_perangkatdesa')->with('status', 'Data Berhasil Ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $file = $request->file('photo');

        if (is_null($file)) {
            PerangkatDesa::where('id', $id)
                ->update([
                    'nama' => $request->nama,
                    'jabatan' => $request->jabatan
                ]);
        }else{
            $validator = Validator::make($request->all(), [
                'photo' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
            ]);

            if ($validator->fails()) {
                return redirect()->route('admin_home_perangkatdesa')->with('alert', $validator->getMessageBag());
            }

            $file = $request->file('photo');
            $nama_file = "PD" . time() . "." . $file->getClientOriginalExtension();
            $tujuan_upload = storage_path('app/public/images/perangkat');
            $file->move($tujuan_upload, $nama_file);

            PerangkatDesa::where('id', $id)
                ->update([
                    'nama' => $request->nama,
                    'jabatan' => $request->jabatan,
                    'photo' => $nama_file
                ]);
        }

        return redirect()->route('admin_home_perangkatdesa')->with('status', 'Data Berhasil Di Update');
    }

    public function destroy($id)
    {
        PerangkatDesa::destroy($id);

        return redirect()->route('admin_home_perangkatdesa');
    }
}
