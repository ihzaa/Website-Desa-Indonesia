<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KegiatanPosyandu;
use App\Models\Posyandu;
use Illuminate\Http\Request;

class KegiatanPosyanduController extends Controller
{

    protected $folder_view = 'Admin.Pages.Posyandu.Kegiatan.';

    public function save(Request $request, $id)
    {
        $request->validate([
            'thumbnail' => 'mimes:jpeg,jpg,png|max:2000'
        ]);

        $path = $request->file('thumbnail')->store('images');

        KegiatanPosyandu::create([
            'judul_kegiatan' => $request->judul_kegiatan,
            'thumbnail' => $path,
            'posyandu_id' => $id,
            'kegiatan' => $request->kegiatan,
            'tanggal_kegiatan' => $request->tanggal_kegiatan
        ]);
        return redirect()->back()->with('status', 'Berhasil menambah kegiatan posyandu');
    }

    public function detail($id)
    {
        $posyandu = Posyandu::find($id);
        return view($this->folder_view . 'tambah', compact('posyandu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_keg, $id_pos)
    {
        $posyandu = Posyandu::find($id_pos);
        $kegiatan = KegiatanPosyandu::find($id_keg);
        return view($this->folder_view . 'edit', compact('posyandu', 'kegiatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_keg)
    {
        $pos = KegiatanPosyandu::find($id_keg);
        if ($request->thumbnail != null) {
            $request->validate([
                'thumbnail' => 'mimes:jpeg,jpg,png|max:2000'
            ]);
            $pos->delete_photo();
            $path = $request->file('thumbnail')->store('images');
            $pos->update(['thumbnail' => $path]);
        }
        $pos->update([
            'judul_kegiatan' => $request->judul_kegiatan,
            'kegiatan' => $request->kegiatan,
            'tanggal_kegiatan' => $request->tanggal_kegiatan
        ]);
        return redirect()->back()->with('status', 'Berhasil memperbarui kegiatan posyandu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
