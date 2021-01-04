<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KartuKeluarga;
use App\Models\Penduduk;
use Illuminate\Http\Request;

class KartuKeluargaController extends Controller
{
    protected $folder_view = 'Admin.Pages.KartuKeluarga.';

    public function index()
    {
        $data_kk = KartuKeluarga::all();
        return view($this->folder_view.'index', compact('data_kk'));
    }

    public function form_add()
    {
        return view($this->folder_view.'tambah');
    }

    public function form_edit($id)
    {
        $kk = KartuKeluarga::where('id',$id)->firstOrFail();
        $kepala = $kk->penduduks->where('shdrt', 'kepala keluarga')->first();
        $kk = $kk->with(['penduduks'])->get()[0];
        return view($this->folder_view.'edit', compact('kk', 'kepala'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_kk' => 'required|unique:kartu_keluargas',
        ]);
        KartuKeluarga::create(
            $request->except(['_token','method'])
        );
        return redirect(route('data_kk_index'))->with('status', 'Sukses menambahkan data baru!');
    }

    public function update(Request $request)
    {
        $id_kk = $request->input('id_kk');
        $request->validate([
            'no_kk' => 'required|unique:kartu_keluargas,no_kk,'.$id_kk,
        ]);
        KartuKeluarga::find(
            $id_kk
        )->update( $request->except(['_token','method','id_kk']));
        return redirect(route('data_kk_form_edit',['id'=>$id_kk]))->with('status', 'Sukses memperbarui data');
    }

    public function delete(Request $request)
    {
        $kk = KartuKeluarga::find(
            $request->input('id_kk')
        );
        $kk->delete();
        return redirect(route('data_kk_index'))->with('status', 'Berhasil menghapus data!');
    }

    public function indexRestore(){
        $penduduks = Penduduk::onlyTrashed()->get();
        return view($this->folder_view.'restore', compact('penduduks'));
    }

    public function restore(Request $request){
        Penduduk::withTrashed()
        ->where('id', $request->id)
        ->restore();
        return redirect()->back()->with('status', 'Berhasil mengembalikan data penduduk');
    }

}
