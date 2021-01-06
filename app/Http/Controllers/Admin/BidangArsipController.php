<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BidangArsipKeuangan;
use App\Models\TahunArsipKeuangan;
use Illuminate\Http\Request;

class BidangArsipController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($idTahun, Request $request)
    {
        $tahun = TahunArsipKeuangan::findOrFail($idTahun);
        $cash_on_hand = $tahun->cash_on_hand - $request->cash_on_hand;
        if($cash_on_hand<0){
            return redirect()->back()->with('failed', 'Cash on hand minus, silakan masukkan kembali dengan menyesuaikan uang yang ada.');
        }
        $request->validate([
            'nama_bidang'=>'required',
            'uang_bagian'=>'required'
        ]);
        BidangArsipKeuangan::create([
            'tahun_arsip_keuangan_id'=>$idTahun,
            'nama_bidang'=>$request->nama_bidang,
            'cash_on_hand'=>$request->uang_bagian,
            'uang_bagian'=>$request->uang_bagian
        ]);
        $tahun->update([
            'cash_on_hand'=>$tahun->cash_on_hand-$request->cash_on_hand
        ]);
        return redirect()->back()->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($idTahun, $idBidang, Request $request)
    {
        $request->validate([
            'nama_bidang'=>'required',
            'uang_bagian'=>'required'
        ]);
        $tahun = TahunArsipKeuangan::findOrFail($idTahun);
        $bidang = BidangArsipKeuangan::findOrFail($idBidang);
        $cash_on_hand_tahun = $tahun->cash_on_hand + $bidang->uang_bagian;
        $cash_on_hand_tahun = $cash_on_hand_tahun-$request->uang_bagian;
        $cash_on_hand_bidang=$request->uang_bagian;
        if($bidang->cash_on_hand != $bidang->uang_bagian){
            $total_belanja_bidang = $bidang->uang_bagian-$bidang->cash_on_hand;
            $cash_on_hand_bidang = $request->uang_bagian-$total_belanja_bidang;
        }
        if($cash_on_hand_bidang<0){
            return redirect()->back()->with('failed', 'Cash On Hand pada bidang akan minus, silakan masukkan kembali dengan mempertimbangkan belanja yang sudah ada.');
        }
        if($cash_on_hand_tahun<0){
            return redirect()->back()->with('failed', 'Cash On Hand pada tahun akan minus, silakan masukkan kembali dengan menyesuaikan uang yang ada.');
        }
        $bidang->update([
            'tahun_arsip_keuangan_id'=>$idTahun,
            'nama_bidang'=>$request->nama_bidang,
            'uang_bagian'=>$request->uang_bagian,
            'cash_on_hand'=>$cash_on_hand_bidang
        ]);
        $tahun->update([
            'cash_on_hand'=>$tahun->cash_on_hand-$request->cash_on_hand
        ]);
        return redirect()->back()->with('success', 'Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idTahun, $idBidang)
    {
        $tahun = TahunArsipKeuangan::findOrFail($idTahun);
        $bidang = BidangArsipKeuangan::findOrFail($idBidang);
        $tahun->update([
            'cash_on_hand'=>$tahun->cash_on_hand+$bidang->uang_bagian
        ]);
        $bidang->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus data');
    }
}