<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BidangArsipKeuangan;
use App\Models\PendapatanArsipKeuangan;
use App\Models\PosArsipKeuangan;
use App\Models\RincianArsipKeuangan;
use App\Models\TahunArsipKeuangan;
use Illuminate\Http\Request;

class ArsipKeuanganController extends Controller
{
    public function taxCalculation($price, $tax){
        $price = $price+($price*$tax/100);
        return (int)$price;
    }

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
        $totalBelanjaBidang = [];
        // dd($bidang);
        foreach($bidang as $data){
            $rincian = RincianArsipKeuangan::where('bidang_arsip_keuangan_id', $data->id)->get();
            $arr_temp = [];
            foreach($rincian as $datas){
                $total = $this->taxCalculation($datas->nominal, $datas->pajak);
                array_push($arr_temp, $total);
            }
            array_push($totalBelanjaBidang, $arr_temp);
        }
        $idx=0;
        $totalBelanja=[];
        foreach($totalBelanjaBidang as $data){
            array_push($totalBelanja, array_sum($data));
        }
        return view('Admin.Pages.ArsipKeuangan.KelolaArsip.index', compact('idTahun', 'pos', 'pendapatan', 'bidang', 'tahun', 'totalBelanja'));
    }

}
