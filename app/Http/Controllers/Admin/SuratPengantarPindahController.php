<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuratPengantarPindahController extends Controller
{
    public function index()
    {
        $data = array();
        $data['surat'] = DB::select(DB::raw('SELECT arsip_surat_pindah_penduduks.`provinsi`, arsip_surat_pindah_penduduks.`kabupaten_kota`, arsip_surat_pindah_penduduks.kecamatan, arsip_surat_pindah_penduduks.desa_kelurahan,arsip_surat_pindah_penduduks.rt,arsip_surat_pindah_penduduks.rw,arsip_surat_pindah_penduduks.created_at ,penduduks.nama,data_ktps.nik FROM `arsip_surat_pindah_penduduks` JOIN penduduks ON arsip_surat_pindah_penduduks.penduduk_id = penduduks.id JOIN data_ktps ON data_ktps.id = penduduks.id_data_ktp ORDER BY arsip_surat_pindah_penduduks.created_at DESC'));
        return view('Admin.Pages.SuratPindah.index', compact("data"));
    }
}
