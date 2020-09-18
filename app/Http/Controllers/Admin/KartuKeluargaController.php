<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KartuKeluarga;
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
        $kk = KartuKeluarga::where('id',$id);
        if($kk==null){
            return redirect(route('data_kk_index'))->with('status', 'Data KK tidak ditemukan!');
        }
        $kk = $kk->with(['penduduks'])->get()[0];
        return view($this->folder_view.'edit', compact('kk'));
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

}
