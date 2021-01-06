<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ArsipDokumen;
use App\Models\TahunArsipDokumen;
use Illuminate\Http\Request;

class ArsipDokumenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $arsip = ArsipDokumen::where('tahun_arsip_dokumen_id', $id)->orderByDesc('id')->get();
        $tahun = TahunArsipDokumen::findOrFail($id)->tahun;
        return view('Admin.Pages.ArsipDokumen.KelolaArsip.index', compact('arsip', 'tahun', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id, Request $request)
    {
        $strTitle = strtoupper(str_replace(' ', '_', $request->nama_arsip));
        $docsName = 'ARSIP_' . $strTitle . '_' . time() . '.' . $request->file_upload->extension();
        $request->file_upload->move(storage_path('app/public/arsip/dokumen/'), $docsName);
        ArsipDokumen::create([
            'tahun_arsip_dokumen_id' => $id,
            'nama_arsip' => $request->nama_arsip,
            'file' => $docsName
        ]);
        return redirect()->back()->with('success', 'Berhasil menambahkan data arsip');
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
    public function update($idTahun, $idArsip, Request $request)
    {
        if ($request->file_upload != null) {
            $strTitle = strtoupper(str_replace(' ', '_', $request->nama_arsip));
            $docsName = 'ARSIP_' . $strTitle . '_' . time() . '.' . $request->file_upload->extension();
            $request->file_upload->move(storage_path('app/public/arsip/dokumen/'), $docsName);
            ArsipDokumen::findOrFail($idArsip)->update([
                'nama_arsip' => $request->nama_arsip,
                'file' => $docsName
            ]);
        }else{
            ArsipDokumen::findOrFail($idArsip)->update([
                'nama_arsip' => $request->nama_arsip,
            ]);
        }
        return redirect()->back()->with('success', 'Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idTahun, $idArsip)
    {
        $arsip=ArsipDokumen::findOrFail($idArsip);
        $arsip->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus data');
    }
}
