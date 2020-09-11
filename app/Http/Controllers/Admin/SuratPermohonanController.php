<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuratPermohonanController extends Controller
{
    public function index()
    {
        return view('Admin.Pages.Surat Permohonan.index');
    }

    public function indexResponse()
    {
        return view('Admin.Pages.Surat Admin.Pages.Surat Permohonan.response_index');
    }

    public function halamanTambah()
    {
        return view('Admin.Pages.Surat Permohonan.tambah');
    }
}
