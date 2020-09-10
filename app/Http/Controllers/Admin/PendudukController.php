<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataKtp;
use App\Models\KartuKeluarga;
use App\Models\Kematian;
use App\Models\Penduduk;
use Illuminate\Http\Request;

class PendudukController extends Controller
{
    protected $folder_view = 'Admin.Pages.KartuKeluarga.Anggota.';

    public function form_add($id)
    {
        $kk = KartuKeluarga::find($id);
        return view($this->folder_view.'tambah',compact('kk'));
    }

    public function store($id, Request $request)
    {
        $nik = $request->input('nik');
        $id_ktp = null;
        $id_kematian = null;
        if( $nik != null){
            $request->validate([
                'nik' => 'required|unique:data_ktps',
            ]);
            $id_ktp = DataKtp::insertGetId([
                'nik' => $nik,
                'masa_berlaku' => $request->input('masa_berlaku'),
            ]);
        }
        $kematian = $request->input('tanggal_kematian');
        if( $kematian != null){
            $id_kematian = Kematian::insertGetId([
                'tanggal_kematian' => $kematian,
            ]);
        }
        $id_penduduk = Penduduk::insertGetId(
            $request->except(['_token','method','tanggal_kematian','masa_berlaku','nik'])
        );
        if($id_ktp != null){
            Penduduk::find($id_penduduk)->update(['id_data_ktp' => $id_ktp]);
        }
        if($id_kematian != null){
            Penduduk::find($id_penduduk)->update(['id_kematian' => $id_kematian, 'status_hidup' => 'mati']);
        }else{
            Penduduk::find($id_penduduk)->update(['status_hidup' => 'hidup']);
        }
        return redirect(route('data_kk_form_edit',['id'=>$id]))->with('status', 'Sukses menambahkan anggota keluarga baru!');
    }

    public function form_edit($id_kk, $id)
    {
        return view($this->folder_view.'edit');
    }
    
    public function update(Request $request)
    {
        return view($this->folder_view.'tambah');
    }
}
