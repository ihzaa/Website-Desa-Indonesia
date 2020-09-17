<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penduduk;
use App\Models\Posyandu;
use Illuminate\Http\Request;

class AnggotaPosyanduController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $posyandu = Posyandu::find($request->id_pos);
        $posyandu->penduduks()->syncWithoutDetaching($request->id_penduduk);
        return true;
    }

    public function delete(Request $request)
    {
        $pos = Posyandu::find($request->id_posyandu);
        $pos->penduduks()->detach($request->id_penduduk);
        return redirect()->back()->with('status', 'Berhasil menghapus penduduk');
    }

    
    public function queryByNama($nama){
        $penduduks = Penduduk::where('nama','like','%'.$nama.'%')->get();
        return json_encode(
            ['penduduks' => $penduduks], 200
        );
    }
}
