<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\template_surat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TemplateSuratController extends Controller
{
    public function download($id)
    {
        if (Auth::guard('penduduk')->check()) {
            $t = template_surat::find($id);
            return response()->download(public_path('Assets/' . $t->file));
        } else {
            return view('Front.pages.SuratPermohonan.Login');
        }
    }
}
