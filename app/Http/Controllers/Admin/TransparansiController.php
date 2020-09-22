<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BelanjaDesa;
use App\Models\JenisBelanja;
use App\Models\JenisPembiayaan;
use App\Models\JenisPendapatan;
use App\Models\PembiayaanDesa;
use App\Models\PendapatanDesa;
use App\Models\SisaPendapatanDesa;
use App\Models\TransparansiDanaDesa;
use Illuminate\Http\Request;

class TransparansiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transparansi = TransparansiDanaDesa::orderByDesc('id')->get();
        return view('Admin.Pages.Transparansi.index', compact('transparansi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Pages.Transparansi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tahun' => 'required|max:4|unique:App\Models\TransparansiDanaDesa,tahun',
        ],
            [
                'tahun.required' => 'Tahun harus diisi.',
                'tahun.max' => 'Tahun harus 4 digit.',
                'tahun.unique' => 'Tahun yang anda masukkan sudah ada pada data.',
            ]);

        $idPendapatan = PendapatanDesa::create([
            'total_pendapatan' => 0,
        ])->id;

        $idPembiayaan = PembiayaanDesa::create([
            'total_pembiayaan' => 0,
        ])->id;

        $idBelanja = BelanjaDesa::create([
            'total_belanja' => 0,
        ])->id;

        $idSisaPendapatan = SisaPendapatanDesa::create([
            'sisa_pendapatan' => 0,
        ])->id;

        TransparansiDanaDesa::create([
            'tahun' => $request->tahun,
            'sisa_pendapatan_id' => $idSisaPendapatan,
            'pendapatan_desa_id' => $idPendapatan,
            'pembiayaan_desa_id' => $idPembiayaan,
            'belanja_desa_id' => $idBelanja,
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
    public function update(Request $request, $id)
    {
        TransparansiDanaDesa::find($id)
            ->update([
                'tahun' => $request->tahun,
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
        TransparansiDanaDesa::find($id)
            ->delete();
        return redirect()->back()->with('success', 'Berhasil mengubah data');
    }

    public function KelolaTransparansi($id)
    {
        $idTransparansi = TransparansiDanaDesa::where('id', $id)->first();
        $transparansi = TransparansiDanaDesa::with([
            'pendapatandesa' => function ($q) use ($idTransparansi) {
                $q->with('jenispendapatan')
                    ->where('id', $idTransparansi->pendapatan_desa_id);
            },
            'pembiayaandesa' => function ($q) use ($idTransparansi) {
                $q->with('jenispembiayaan')
                    ->where('id', $idTransparansi->pembiayaan_desa_id);
            },
            'belanjadesa' => function ($q) use ($idTransparansi) {
                $q->with('jenisbelanja')
                    ->where('id', $idTransparansi->belanja_desa_id);
            },
        ])
            ->where('id', $id)
            ->get();

        return view('Admin.Pages.Transparansi.Kelola.index', compact('transparansi'));
    }

    public function StorePendapatan(Request $request, $id)
    {
        $request->validate([
            'jenis_pendapatan' => 'required',
            'nominal_pendapatan' => 'required|numeric',
        ],
            [
                'jenis_pendapatan.required' => 'Jenis pendapatan harus diisi',
                'nominal_pendapatan.required' => 'Nominal pendapatan harus diisi',
                'nominal_pendapatan.numeric' => 'Nominal pendapatan harus angka',
            ]);

        $idPendapatanDesa = TransparansiDanaDesa::where('id', $id)->first()->pendapatan_desa_id;

        JenisPendapatan::create([
            'jenis_pendapatan' => $request->jenis_pendapatan,
            'nominal_pendapatan' => $request->nominal_pendapatan,
            'pendapatan_desa_id' => $idPendapatanDesa,
        ]);

        $calculate = JenisPendapatan::whereHas('pendapatandesa', function ($q) use ($id) {
            $q->whereHas('transparansidesa', function ($q) use ($id) {
                $q->where('id', $id);
            });
        })->get();
        $sum = 0;
        foreach ($calculate as $data) {
            $sum += $data->nominal_pendapatan;
        }
        PendapatanDesa::find($idPendapatanDesa)
            ->update([
                'total_pendapatan' => $sum,
            ]);
        return redirect()->back()->with('success', 'Data berhasil ditambahkan.');
    }

    public function UpdatePendapatan(Request $request, $id)
    {
        $request->validate([
            'jenis_pendapatan' => 'required',
            'nominal_pendapatan' => 'required|numeric',
        ],
            [
                'jenis_pendapatan.require' => 'Data tidak boleh kosong',
                'nominal_pendapatan.require' => 'Data tidak boleh kosong',
                'nominal_pendapatan.numeric' => 'Data harus berupa angka',
            ]);
        JenisPendapatan::find($id)->update([
            'jenis_pendapatan' => $request->jenis_pendapatan,
            'nominal_pendapatan' => $request->nominal_pendapatan,
        ]);
        return redirect()->back()->with('success', 'Berhasil mengubah data');
    }

    public function DestroyPendapatan(Request $request, $id)
    {
        JenisPendapatan::find($id)->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus data');
    }

    // PEMBIAYAAN

    public function StorePembiayaan(Request $request, $id)
    {
        $request->validate([
            'jenis_pembiayaan' => 'required',
            'nominal_pembiayaan' => 'required|numeric',
        ],
            [
                'jenis_pembiayaan.required' => 'Jenis pembiayaan harus diisi',
                'nominal_pembiayaan.required' => 'Nominal pembiayaan harus diisi',
                'nominal_pembiayaan.numeric' => 'Nominal pembiayaan harus angka',
            ]);

        $idPembiayaanDesa = TransparansiDanaDesa::where('id', $id)->first()->pembiayaan_desa_id;

        JenisPembiayaan::create([
            'jenis_pembiayaan' => $request->jenis_pembiayaan,
            'nominal_pembiayaan' => $request->nominal_pembiayaan,
            'pembiayaan_desa_id' => $idPembiayaanDesa,
        ]);

        $calculate = JenisPembiayaan::whereHas('pembiayaandesa', function ($q) use ($id) {
            $q->whereHas('transparansidesa', function ($q) use ($id) {
                $q->where('id', $id);
            });
        })->get();
        $sum = 0;
        foreach ($calculate as $data) {
            $sum += $data->nominal_pembiayaan;
        }
        PembiayaanDesa::find($idPembiayaanDesa)
            ->update([
                'total_pembiayaan' => $sum,
            ]);
        return redirect()->back()->with('success', 'Data berhasil ditambahkan.');
    }

    public function UpdatePembiayaan(Request $request, $id)
    {
        $request->validate([
            'jenis_pembiayaan' => 'required',
            'nominal_pembiayaan' => 'required|numeric',
        ],
            [
                'jenis_pembiayaan.require' => 'Data tidak boleh kosong',
                'nominal_pembiayaan.require' => 'Data tidak boleh kosong',
                'nominal_pembiayaan.numeric' => 'Data harus berupa angka',
            ]);
        JenisPembiayaan::find($id)->update([
            'jenis_pembiayaan' => $request->jenis_pembiayaan,
            'nominal_pembiayaan' => $request->nominal_pembiayaan,
        ]);
        return redirect()->back()->with('success', 'Berhasil mengubah data');
    }

    public function DestroyPembiayaan(Request $request, $id)
    {
        JenisPembiayaan::find($id)->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus data');
    }

    // END PEMBIAYAAN

    // BELANJA

    public function StoreBelanja(Request $request, $id)
    {
        $request->validate([
            'jenis_belanja' => 'required',
            'nominal_belanja' => 'required|numeric',
        ],
            [
                'jenis_belanja.required' => 'Jenis belanja harus diisi',
                'nominal_belanja.required' => 'Nominal belanja harus diisi',
                'nominal_belanja.numeric' => 'Nominal belanja harus angka',
            ]);

        $idBelanjaDesa = TransparansiDanaDesa::where('id', $id)->first()->belanja_desa_id;

        JenisBelanja::create([
            'jenis_belanja' => $request->jenis_belanja,
            'nominal_belanja' => $request->nominal_belanja,
            'belanja_desa_id' => $idBelanjaDesa,
        ]);

        $calculate = JenisBelanja::whereHas('belanjadesa', function ($q) use ($id) {
            $q->whereHas('transparansidesa', function ($q) use ($id) {
                $q->where('id', $id);
            });
        })->get();
        $sum = 0;
        foreach ($calculate as $data) {
            $sum += $data->nominal_belanja;
        }
        BelanjaDesa::find($idBelanjaDesa)
            ->update([
                'total_belanja' => $sum,
            ]);
        return redirect()->back()->with('success', 'Data berhasil ditambahkan.');
    }

    public function UpdateBelanja(Request $request, $id)
    {
        $request->validate([
            'jenis_belanja' => 'required',
            'nominal_belanja' => 'required|numeric',
        ],
            [
                'jenis_belanja.require' => 'Data tidak boleh kosong',
                'nominal_belanja.require' => 'Data tidak boleh kosong',
                'nominal_belanja.numeric' => 'Data harus berupa angka',
            ]);
        JenisBelanja::find($id)->update([
            'jenis_belanja' => $request->jenis_belanja,
            'nominal_belanja' => $request->nominal_belanja,
        ]);
        return redirect()->back()->with('success', 'Berhasil mengubah data');
    }

    public function DestroyBelanja(Request $request, $id)
    {
        JenisBelanja::find($id)->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus data');
    }

    // END BELANJA
}
