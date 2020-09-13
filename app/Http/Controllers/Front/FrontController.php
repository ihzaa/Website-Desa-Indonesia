<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\BPD;
use App\Models\Home;
use App\Models\PerangkatDesa;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $perangkats = PerangkatDesa::all();
        $bpds = BPD::all();

        $homes = Home::with([
            'home_category'
        ])->get();

        return view('Front.pages.front', compact('homes','perangkats', 'bpds'));
    }

    public function show($id)
    {
        $homes = Home::with([
            'home_category'
        ])->find($id);

        return view('Front.pages.tentangkamidetail', compact('homes'));
    }
}
