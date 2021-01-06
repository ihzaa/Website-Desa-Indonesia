<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BidangArsipKeuangan;
use App\Models\PendapatanArsipKeuangan;
use App\Models\PosArsipKeuangan;
use App\Models\TahunArsipKeuangan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TahunArsipKeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pos = PosArsipKeuangan::all();
        // $bidang = BidangArsipKeuangan::all();
        $tahun = TahunArsipKeuangan::all();
        $pendapatan = PendapatanArsipKeuangan::all();
        $bidang = BidangArsipKeuangan::all();
        return view('Admin.Pages.ArsipKeuangan.index', compact('tahun', 'pos', 'bidang', 'pendapatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'tahun' => ['required','max:4', Rule::Unique('tahun_arsip_keuangan')->whereNull('deleted_at')]
            ],
            [
                'tahun.required' => 'Tahun harus diisi.',
                'tahun.max' => 'Tahun harus 4 digit.',
                'tahun.unique' => 'Tahun yang anda masukkan sudah ada pada data.',
            ]
        );
        TahunArsipKeuangan::create($request->all());
        return redirect()->back()->with('success', 'Berhasil menambahkan data tahun');
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TahunArsipKeuangan::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus data');
    }
}
