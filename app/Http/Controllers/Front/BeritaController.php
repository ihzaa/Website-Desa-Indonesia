<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\Berita;

class BeritaController extends Controller
{
    public function ShowBerita($id){
        $berita=Berita::where('id', $id)->first();
        return view('Front.pages.berita', compact('berita'));
    }

    public function ListBerita(){
        $berita=Berita::paginate(4);
        return view('Front.pages.listberita', compact('berita'));
    }
}
