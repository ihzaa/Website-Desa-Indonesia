<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\arsip_surat_penduduk;
use App\Models\KartuKeluarga;
use App\Models\Penduduk;
use App\Models\permohonan_surat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $data = array();
        $data['surat_bulanan'] = DB::select(DB::raw("SELECT SUM(CASE WHEN MONTH(created_at) = 1 THEN 1 ELSE 0 END) AS 'Januari', SUM(CASE  WHEN MONTH(created_at) =  2 THEN 1 ELSE 0 END) AS 'February', SUM(CASE  WHEN MONTH(created_at)= 3 THEN 1 ELSE 0 END) AS 'March', SUM(CASE  WHEN MONTH(created_at)= 4 THEN 1 ELSE 0 END) AS 'April',SUM(CASE  WHEN MONTH(created_at)= 5 THEN 1 ELSE 0 END) AS 'May',SUM(CASE WHEN MONTH(created_at)= 6 THEN 1 ELSE 0 END) AS 'June',SUM(CASE WHEN MONTH(created_at)= 7 THEN 1 ELSE 0 END) AS 'July',SUM(CASE WHEN MONTH(created_at)= 8 THEN 1 ELSE 0 END) AS 'August',SUM(CASE WHEN MONTH(created_at)= 9 THEN 1 ELSE 0 END) AS 'September',SUM(CASE WHEN MONTH(created_at)= 10 THEN 1 ELSE 0 END) AS 'October',SUM(CASE WHEN MONTH(created_at)= 11 THEN 1 ELSE 0 END) AS 'November',SUM(CASE WHEN MONTH(created_at)= 12 THEN 1 ELSE 0 END) AS 'December' FROM arsip_surat_penduduks WHERE YEAR(created_at) =" . date('Y')));
        $data['surat_bulanan'] = array_values((array)$data['surat_bulanan'][0]);
        $data['total_surat_tahun'] = 0;
        foreach ($data['surat_bulanan'] as $d) {
            $data['total_surat_tahun'] += $d;
        }
        $data['surat_tebanyak'] = DB::select(DB::raw("Select `permohonan_surats`.jenis_surat, (select count(*) from `arsip_surat_penduduks` where `permohonan_surats`.`id` = `arsip_surat_penduduks`.`permohonan_surat_id` and `arsip_surat_penduduks`.`deleted_at` is null AND YEAR(arsip_surat_penduduks.created_at) = " . date('Y') . ") as `arsip_surat_penduduks_count` from `permohonan_surats` where `permohonan_surats`.`deleted_at` is null ORDER BY `arsip_surat_penduduks_count` DESC LIMIT 5"));
        $data['total_surat_semua'] = arsip_surat_penduduk::count();
        $data['total_surat'] = permohonan_surat::count();
        $data['totak_kk'] = KartuKeluarga::count();
        $data['total_penduduk_laki'] = Penduduk::where('jenis_kelamin', 'laki-laki')->count();
        $data['total_penduduk_perempuan'] = Penduduk::where('jenis_kelamin', 'perempuan')->count();
        $data['total_penduduk'] = $data['total_penduduk_laki'] + $data['total_penduduk_perempuan'];
        $data['total_meninggal'] = Penduduk::where('status_hidup', 'mati')->count();
        $data['total_pemilih'] = DB::select(DB::raw("SELECT SUM(CASE WHEN YEAR(CURDATE()) - YEAR(tgl_lahir) - IF(STR_TO_DATE(CONCAT(YEAR(CURDATE()), '-', MONTH(tgl_lahir), '-', DAY(tgl_lahir)) ,'%Y-%c-%e') > CURDATE(), 1, 0) > 16 THEN 1 ELSE 0 END)  as age FROM penduduks"));
        // return $data;
        return view('Admin.Pages.Dashboard', compact('data'));
    }
}
