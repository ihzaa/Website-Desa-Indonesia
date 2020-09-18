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
        return view($this->folder_view . 'tambah', compact('kk'));
    }

    public function store($id, Request $request)
    {
        $nik = $request->input('nik');
        $id_ktp = null;
        $id_kematian = null;
        if ($nik != null) {
            $request->validate([
                'nik' => 'required|unique:data_ktps',
            ]);
            $id_ktp = DataKtp::insertGetId([
                'nik' => $nik,
                'masa_berlaku' => $request->input('masa_berlaku'),
            ]);
        }
        $kematian = $request->input('tanggal_kematian');
        if ($kematian != null) {
            $id_kematian = Kematian::insertGetId([
                'tanggal_kematian' => $kematian,
            ]);
        }
        $id_penduduk = Penduduk::insertGetId(
            $request->except(['_token', 'method', 'tanggal_kematian', 'masa_berlaku', 'nik'])
        );
        if ($id_ktp != null) {
            Penduduk::find($id_penduduk)->update(['id_data_ktp' => $id_ktp]);
        }
        if ($id_kematian != null) {
            Penduduk::find($id_penduduk)->update(['id_kematian' => $id_kematian, 'status_hidup' => 'mati']);
        } else {
            Penduduk::find($id_penduduk)->update(['status_hidup' => 'hidup']);
        }
        return redirect(route('data_kk_form_edit', ['id' => $id]))->with('status', 'Sukses menambahkan anggota keluarga baru!');
    }

    public function form_edit($id, $id_anggota)
    {
        $kk = KartuKeluarga::find($id);
        if ($kk == null) {
            return redirect(route('data_kk_index'))->with('status', 'Data KK tidak ditemukan!');
        }
        $p = Penduduk::where('id', $id_anggota);
        if ($p == null) {
            return redirect(route('data_kk_form_edit', ['id' => $id]))->with('status', 'Penduduk anggota keluarga tidak ditemukan!');
        }
        $p = $p->with(['kematian', 'data_ktp'])->get()[0];
        return view($this->folder_view . 'edit', compact('kk', 'p'));
    }

    public function update($id, Request $request)
    {
        $p = Penduduk::where('id', $request->input('id_penduduk'));
        if ($p == null) {
            return redirect(route('data_kk_form_edit', ['id' => $id]))->with('status', 'Penduduk anggota keluarga tidak ditemukan!');
        }
        $p_relate_before = $p->with(['kematian', 'data_ktp'])->get()[0];

        // filter ktp
        $nik = $request->input('nik');
        $masa_berlaku = $request->input('masa_berlaku');

        if ($p_relate_before->data_ktp == null && $nik != null) {
            $request->validate([
                'nik' => 'required|unique:data_ktps',
            ]);
            $id_ktp = DataKtp::insertGetId([
                'nik' => $nik,
                'masa_berlaku' => $masa_berlaku,
            ]);
            $p->update(['id_data_ktp'=>$id_ktp]);
        } else if ($p_relate_before->data_ktp != null & $nik != null) {
            $request->validate([
                'nik' => 'required|unique:data_ktps,nik,' . $p_relate_before->data_ktp->id,
            ]);
            $p_relate_before->data_ktp->update(
                [
                    'nik' => $nik,
                    'masa_berlaku' => $masa_berlaku,
                ]
            );
        } else if ($p_relate_before->data_ktp != null & $nik == null) { 
            $data_ktp = DataKtp::find($p_relate_before->data_ktp->id);
            $p->update(['id_data_ktp'=>null]);
            $data_ktp->delete();
        }

        // filter kematian
        $tanggal_kematian = $request->input('tanggal_kematian');
        
        if ($p_relate_before->kematian == null && $tanggal_kematian != null) {
            $id_kematian = Kematian::insertGetId([
                'tanggal_kematian' => $tanggal_kematian,
            ]);
            $p->update(['id_kematian'=>$id_kematian,'status_hidup'=>'mati']);
        } else if ($p_relate_before->kematian != null & $tanggal_kematian != null) {
            $p_relate_before->kematian->update(
                [
                    'tanggal_kematian' => $tanggal_kematian,
                ]
            );
        } else if ($p_relate_before->kematian != null & $tanggal_kematian == null) { 
            $kematian_backup = Kematian::find($p_relate_before->kematian->id);
            $p->update(['id_kematian'=>null,'status_hidup'=>'hidup']);
            $kematian_backup->delete();
        }

        $p->update(
            $request->except(['id_penduduk','_token','method','tanggal_kematian','nik','masa_berlaku'])
        );

        return redirect(route('data_kk_form_edit', ['id' => $id]))->with('status', 'Sukses memperbarui data anggota keluarga!');
    }

    public function delete($id, Request $request)
    {
        $p = Penduduk::find(
            $request->input('id_penduduk')
        );
        $p->delete();
        return redirect(route('data_kk_form_edit', ['id' => $id]))->with('status', 'Berhasil menghapus anggota keluarga!');
    }
}
