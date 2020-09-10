<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KartuKeluargaController extends Controller
{
    protected $folder_view = 'Admin.Pages.KartuKeluarga.';

    public function index()
    {
        return view($this->folder_view.'index');
    }
}
