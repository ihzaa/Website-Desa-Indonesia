<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KritikSaran;
use Illuminate\Http\Request;

class KritikSaranController extends Controller
{
    public function index()
    {
        $kritiksarans = KritikSaran::orderBy('id', 'desc')->get();

        return view('Admin.Pages.KritikSaran.kritiksaran', compact('kritiksarans'));
    }

    public function store(Request $request)
    {
        KritikSaran::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message
        ]);

        return redirect('/#contact')->with('status', 'Kritik dan Saran berhasil dikirim');
    }
}
