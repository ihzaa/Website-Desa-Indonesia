<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\KegiatanPosyandu;
use App\Models\Posyandu;

class PosyanduController extends Controller
{
    protected $view_folder = 'Front.pages.Posyandu.';

    public function index($id)
    {
        $posyandu = Posyandu::where('id',$id)->with(['kegiatans','penduduks'])->get()[0];
        // dd($posyandu);
        return view($this->view_folder.'index', compact('posyandu'));
    }

    public function detail_kegiatan($id)
    {
        $kegiatan = KegiatanPosyandu::find($id);
        return view($this->view_folder.'detail', compact('kegiatan'));
    }

    public function show($id)
    {
        $posyandu = Posyandu::find($id);
        $kegiatans = $posyandu->kegiatans;

    }
}
