<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PendapatanArsipKeuangan;
use App\Models\TahunArsipKeuangan;
use Illuminate\Http\Request;

class PendapatanArsipController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($idTahun, Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nama_pendapatan'=>'required',
            'nominal'=>'required|numeric',
            'tgl_pendapatan'=>'required|date',
        ]);

        PendapatanArsipKeuangan::create($request->all()+[
            'tahun_arsip_keuangan_id'=>$idTahun
        ]);

        $tahun = TahunArsipKeuangan::findOrFail($idTahun);
        $cash_on_hand = $tahun->cash_on_hand + $request->nominal;
        $tahun->update([
            'cash_on_hand'=>$cash_on_hand
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
    public function update($idTahun, $idPendapatan, Request $request)
    {
        $tahun = TahunArsipKeuangan::findOrFail($idTahun);
        $pendapatan = PendapatanArsipKeuangan::findOrFail($idPendapatan);

        $pendapatan_nominal = $pendapatan->nominal;
        $cash_on_hand = $tahun->cash_on_hand-$pendapatan_nominal;
        $cash_on_hand = $cash_on_hand + $request->nominal;
        if($cash_on_hand<0){
            return redirect()->back()->with('failed', 'Cash On Hand pada tahun akan minus, silakan masukkan kembali dengan menyesuaikan uang yang ada.');
        }

        $pendapatan->update([
            'nama_pendapatan' => $request->nama_pendapatan,
            'nominal' => $request->nominal,
            'tgl_pendapatan' => $request->tgl_pendapatan,
        ]);

        $tahun->update([
            'cash_on_hand' => $cash_on_hand
        ]);

        return redirect()->back()->with('success', 'Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idTahun, $idPendapatan)
    {
        $pendapatan = PendapatanArsipKeuangan::findOrFail($idPendapatan);
        $tahun = TahunArsipKeuangan::findOrFail($idTahun);
        $tahun->update([
            'cash_on_hand'=>$tahun->cash_on_hand-$pendapatan->nominal
        ]);
        $pendapatan->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus data');
    }
}
