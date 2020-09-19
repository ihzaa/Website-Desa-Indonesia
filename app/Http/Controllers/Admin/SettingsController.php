<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\admin;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class SettingsController extends Controller
{
    public function index()
    {
        $setting = Setting::orderBy('id', 'desc')->first();

        return view('Admin.Pages.Pengaturan.pengaturan', compact('setting'));
    }

    public function update(Request $request, $id)
    {
        Setting::where('id', $id)
            ->update([
                'nama_desa' => $request->nama_desa,
                'kecamatan' => $request->kecamatan,
                'kabupaten' => $request->kabupaten,
                'alamat_lengkap' => $request->alamat_lengkap,
                'no_wa' => $request->no_wa,
                'no_telepon' => $request->no_telepon,
                'email' => $request->email,
            ]);

        return redirect()->back()->with('status', 'Data Berhasil Diupdate');
    }

    public function updatepassword(Request $request, $id)
    {
        $admin = admin::find($id);

        if (Hash::check($request->pwlama, $admin->password)) {

            admin::where('id', $id)
                ->update([
                    'password' => Hash::make($request->pwbaru)
                ]);

            return redirect()->back()->with('status', 'Password Berhasil Diubah');
        } else {
            return redirect()->back()->with('alert', 'Password Lama Anda Salah');
        }
    }

    public function storekabupatenlogo(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'logo_kabupaten' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('alert', $validator->getMessageBag());
        }else{
            $file = $request->file('logo_kabupaten');
            $nama_file = "KBP" . time() . "." . $file->getClientOriginalExtension();
            $tujuan_upload = storage_path('app/public/images/logo');
            $file->move($tujuan_upload, $nama_file);

            Setting::where('id', $id)
                ->update([
                   'logo_kabupaten' => $nama_file
                ]);

            return redirect()->back()->with('status', 'Logo Kabupaten Berhasil Diupdate');
        }
    }

    public function storemaskotlogo(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'logo_maskot' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('alert', $validator->getMessageBag());
        }else{
            $file = $request->file('logo_maskot');
            $nama_file = "MKT" . time() . "." . $file->getClientOriginalExtension();
            $tujuan_upload = storage_path('app/public/images/logo');
            $file->move($tujuan_upload, $nama_file);

            Setting::where('id', $id)
                ->update([
                    'logo_maskot' => $nama_file
                ]);

            return redirect()->back()->with('status', 'Logo Maskot Berhasil Diupdate');
        }
    }
}
