<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Home;
use App\Models\Posyandu;

class PosyanduController extends Controller
{
    protected $view_folder = 'Front.pages.';

    public function index($id)
    {
        $posyandu = Posyandu::where('id',$id)->with(['kegiatans','penduduks'])->get()[0];
        // dd($posyandu);
        return view($this->view_folder.'index_posyandu', compact('posyandu'));
    }

    public function show($id)
    {
        $posyandu = Posyandu::find($id);
        $kegiatans = $posyandu->kegiatans;

    }
}
