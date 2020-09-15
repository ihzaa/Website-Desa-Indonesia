<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $berita=Berita::all();
        return view('Admin.Pages.Berita.index', compact('berita'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Pages.Berita.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul_berita' => 'required|max:255',
            'konten_berita' => 'required',
            'thumbnail_berita' => 'required|mimes:jpeg,png|max:2048'
        ]);

        $description = $request->konten_berita;
        $dom = new \DomDocument();
        $dom->loadHtml($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');

        if (!is_dir(storage_path('app\public\images\berita\konten'))) {
            mkdir(storage_path('app\public\images\berita\konten'), 0777, true);
        }

        foreach ($images as $k => $img) {
            $data = $img->getAttribute('src');
            list($type, $data) = explode(';', $data);
            list(, $data) = explode(',', $data);
            $image_name = "\app\public\images\berita\konten\img" . time() . $k . '.png';
            $path = storage_path() . $image_name;
            file_put_contents($path, $data);
            $img->removeAttribute('src');
            $img->setAttribute('src', $image_name);
        }

        $imageName = 'img'.time().'.'.$request->thumbnail_berita->extension();
        $request->thumbnail_berita->move(storage_path('\app\public\images\berita\thumbnails'), $imageName);
        Berita::create([
            'judul_berita'=>$request->judul_berita,
            'konten_berita'=>$request->konten_berita,
            'thumbnail_berita'=>$imageName
        ]);
        return redirect()->route('admin_berita_index')->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $berita = Berita::where('id', $id)->first();
        return view('Admin.Pages.Berita.edit', compact('berita'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $edit=Berita::find($id);
        $edit->update($request->all());
        return redirect()->route('admin_berita_index')->with('success', 'Berhasil mengubah konten');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Berita::find($id)->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus data');
    }
}
