<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PosArsipKeuangan;
use Illuminate\Http\Request;

class PosArsipController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($idTahun,Request $request)
    {
        $request->validate([
            'nama_pos'=>'required'
        ]);
        PosArsipKeuangan::create([
            'tahun_arsip_keuangan_id'=>$idTahun,
            'nama_pos'=>$request->nama_pos
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
    public function update($idTahun, $idPos, Request $request)
    {
        PosArsipKeuangan::findOrFail($idPos)->update([
            'nama_pos'=>$request->nama_pos
        ]);
        return redirect()->back()->with('success', 'Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PosArsipKeuangan::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus data');
    }
}
