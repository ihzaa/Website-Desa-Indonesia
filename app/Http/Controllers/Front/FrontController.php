<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\BPD;
use App\Models\Home;
use App\Models\Penduduk;
use App\Models\PerangkatDesa;
use App\Models\Berita;
use App\Models\QnA;
use App\Models\Posyandu;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $perangkats = PerangkatDesa::all();
        $bpds = BPD::all();
        $berita = Berita::all()->sortByDesc('id')->take(3);
        $qna = QnA::all();

        $penduduks = Penduduk::all();
        $pria = Penduduk::where('jenis_kelamin', 'laki-laki')->get();
        $wanita = Penduduk::where('jenis_kelamin', 'perempuan')->get();
        $kematians = Penduduk::where('id_kematian', '!=', null)->get();
        

       
        $posyandus = Posyandu::all();
        $homes = Home::with([
            'home_category'
        ])->get();

        return view('Front.pages.front', compact('homes', 'perangkats', 'bpds', 'berita',
            'penduduks', 'pria', 'wanita', 'kematians', 'qna','posyandus'));
    }

    public function showTentangKami($id)
    {
        $homes = Home::with([
            'home_category'
        ])->find($id);

        $beritas = Berita::skip(0)->take(5)->orderBy('id', 'desc')->get();

        if ($homes === null) {
            return redirect('/');
        } else {
            return view('Front.pages.tentangkamidetail', compact('homes', 'beritas'));
        }
    }
}
