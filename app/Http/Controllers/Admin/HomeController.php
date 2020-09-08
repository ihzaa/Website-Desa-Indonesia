<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Home;
use App\Models\HomeCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $homes = Home::with(['home_category'])->get();


        return view('Admin.Pages.home_info_desa', compact('homes'));
    }

    public function create()
    {
        $categories = HomeCategory::all();

        return view('Admin.Pages.home_info_desa_create', compact('categories'));
    }
}
