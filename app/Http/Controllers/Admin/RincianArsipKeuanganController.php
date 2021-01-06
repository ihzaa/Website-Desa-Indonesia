<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BidangArsipKeuangan;
use App\Models\PosArsipKeuangan;
use App\Models\RincianArsipKeuangan;
use App\Models\TahunArsipKeuangan;
use Illuminate\Http\Request;

class RincianArsipKeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idTahun, $idBidang)
    {
        $rincian = RincianArsipKeuangan::where('bidang_arsip_keuangan_id', $idBidang)->with('BidangArsipKeuangan', 'PosArsipKeuangan')->get();
        $tahun = TahunArsipKeuangan::findOrFail($idTahun)->tahun;
        $bidang = BidangArsipKeuangan::findOrFail($idBidang);
        $pos = PosArsipKeuangan::where('tahun_arsip_keuangan_id', $idTahun)->get();
        if($pos==null){
            return redirect()->back()->with('failed', 'Data pos belum ditambahkan, silakan ditambahkan terlebih dahulu.');
        }
        return view('Admin.Pages.ArsipKeuangan.KelolaArsip.Rincian.index', compact('rincian', 'bidang', 'pos', 'idTahun', 'idBidang', 'tahun'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($idTahun, $idBidang, Request $request)
    {
        $request->validate([
            'pos_belanja_id'=>'required',
            'rincian'=>'required',
            'pajak'=>'min:0|max:100'
        ]);
        $total = $request->nominal;
        if($request->pajak){
            $total = $request->nominal+($request->nominal*$request->pajak/100);
        }
        $bidang = BidangArsipKeuangan::findOrFail($idBidang);
        $cash_on_hand = $bidang->cash_on_hand;
        $cash_on_hand = $cash_on_hand - $total;
        if($cash_on_hand<0){
            return redirect()->back()->with('failed', 'Cash On Hand pada bidang akan minus, silakan masukkan kembali dengan menyesuaikan uang yang ada.');
        }

        RincianArsipKeuangan::create([
            'bidang_arsip_keuangan_id' => $idBidang,
            'pos_arsip_keuangan_id' => $request->pos_belanja_id,
            'rincian' => $request->rincian,
            'nominal' => $request->nominal,
            'pajak' => $request->pajak,
        ]);

        $bidang->update([
            'cash_on_hand'=>$cash_on_hand
        ]);

        return redirect()->back()->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($idTahun, $idBidang, $idRincian, Request $request)
    {
        $request->validate([
            'pos_belanja_id'=>'required',
            'rincian'=>'required',
            'pajak'=>'min:0|max:100'
        ]);
        $rincian = RincianArsipKeuangan::findOrFail($idRincian);
        $total_old = $rincian->nominal+($rincian->pajak*$rincian->nominal/100);
        $total = $request->nominal;
        if($request->pajak){
            $total = $request->nominal+($request->nominal*$request->pajak/100);
        }
        $bidang = BidangArsipKeuangan::findOrFail($idBidang);
        $cash_on_hand_old = $bidang->cash_on_hand;
        $cash_on_hand = $cash_on_hand_old + $total_old;
        $cash_on_hand = $cash_on_hand - $total;
        if($cash_on_hand<0){
            return redirect()->back()->with('failed', 'Cash On Hand pada bidang akan minus, silakan masukkan kembali dengan menyesuaikan uang yang ada.');
        }

        $rincian->update([
            'pos_arsip_keuangan_id' => $request->pos_belanja_id,
            'rincian' => $request->rincian,
            'nominal' => $request->nominal,
            'pajak' => $request->pajak,
        ]);

        $bidang->update([
            'cash_on_hand'=>$cash_on_hand
        ]);

        return redirect()->back()->with('success', 'Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idTahun, $idBidang, $idRincian)
    {
        $rincian = RincianArsipKeuangan::findOrFail($idRincian);
        $bidang = BidangArsipKeuangan::findOrFail($idBidang);
        $total = $rincian->nominal+($rincian->nominal*$rincian->pajak/100);
        $cash_on_hand = $bidang->cash_on_hand;
        $cash_on_hand = $cash_on_hand+$total;
        $bidang->update([
            'cash_on_hand'=>$cash_on_hand
        ]);
        $rincian->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus data');
    }
}
