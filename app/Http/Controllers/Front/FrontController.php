<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\BPD;
use App\Models\Home;
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

        $homes = Home::with([
            'home_category'
        ])->get();

        return view('Front.pages.front', compact('homes','perangkats', 'bpds', 'berita'));
    }

    public function show($id)
    {
        $homes = Home::with([
            'home_category'
        ])->find($id);

        if ($homes === null){
            return redirect('/');
        }else{
            return view('Front.pages.tentangkamidetail', compact('homes'));
        }
    }

    public function ShowBerita($id){
        $berita=Berita::where('id', $id)->first();
        return view('Front.pages.berita', compact('berita'));
    }
}
