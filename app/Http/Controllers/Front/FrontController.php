<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\BPD;
use App\Models\Home;
use App\Models\KartuKeluarga;
use App\Models\Penduduk;
use App\Models\PerangkatDesa;
use App\Models\Berita;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $perangkats = PerangkatDesa::all();
        $bpds = BPD::all();
        $berita = Berita::all();

        $penduduks = Penduduk::all();
        $pria = Penduduk::where('jenis_kelamin', 'laki-laki')->get();
        $wanita = Penduduk::where('jenis_kelamin', 'perempuan')->get();
        $kematians = Penduduk::where('id_kematian', '!=', null)->get();

        $homes = Home::with([
            'home_category'
        ])->get();

        return view('Front.pages.front', compact('homes', 'perangkats', 'bpds', 'berita',
            'penduduks', 'pria', 'wanita', 'kematians'));
    }

    public function show($id)
    {
        $homes = Home::with([
            'home_category'
        ])->find($id);

        if ($homes === null) {
            return redirect('/');
        } else {
            return view('Front.pages.tentangkamidetail', compact('homes'));
        }
    }

    public function ShowBerita($id)
    {
        $berita = Berita::where('id', $id)->first();
        return view('Front.pages.berita', compact('berita'));
    }
}
