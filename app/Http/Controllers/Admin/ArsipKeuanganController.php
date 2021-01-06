<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BidangArsipKeuangan;
use App\Models\PendapatanArsipKeuangan;
use App\Models\PosArsipKeuangan;
use App\Models\TahunArsipKeuangan;
use Illuminate\Http\Request;

class ArsipKeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idTahun)
    {
        $pos = PosArsipKeuangan::where('tahun_arsip_keuangan_id', $idTahun)->get();
        $pendapatan = PendapatanArsipKeuangan::where('tahun_arsip_keuangan_id', $idTahun)->get();
        $bidang = BidangArsipKeuangan::where('tahun_arsip_keuangan_id', $idTahun)->get();
        $tahun = TahunArsipKeuangan::findOrFail($idTahun);
        return view('Admin.Pages.ArsipKeuangan.KelolaArsip.index', compact('idTahun', 'pos', 'pendapatan', 'bidang', 'tahun'));
    }

}
