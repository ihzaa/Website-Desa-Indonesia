<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Home;
use App\Models\HomeCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|file|image|mimes:jpeg,png,jpg|max:5200'
        ]);


        if ($validator->fails()) {
            return redirect()->route('admin_home_create')->with('alert', $validator->getMessageBag());
        }

        $file = $request->file('image');
        $nama_file = "HM" . time() . "." . $file->getClientOriginalExtension();
        $tujuan_upload = storage_path('app/public/images/home');
        $file->move($tujuan_upload, $nama_file);

        Home::create([
            'title' => $request->title,
            'content' => $request->contents,
            'image' => $nama_file,
            'home_category_id' => $request->category
        ]);

        return redirect()->route('admin_home_create')->with('status', 'Data Berhasil Ditambahkan');
    }

    public function destroy($id){
        Home::destroy($id);

        return redirect()->route('admin_home');
    }
}
