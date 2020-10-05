<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Posyandu;
use Illuminate\Http\Request;

class PosyanduController extends Controller
{
    protected $folder_view = 'Admin.Pages.Posyandu.';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posyandus = Posyandu::all();
        return view($this->folder_view.'index', compact('posyandus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'logo_posyandu' => 'mimes:jpeg,jpg,png|max:2000'
        ]);

        $path = $request->file('logo_posyandu')->store('public/images');

        Posyandu::create([
            'logo_posyandu' => $path,
            'nama_posyandu' => $request->nama_posyandu
        ]);
        return redirect()->back()->with('status', 'Berhasil menambah posyandu');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posyandu = Posyandu::find($id);
        $penduduks = $posyandu->penduduks;
        return view($this->folder_view.'edit', compact('posyandu', 'penduduks'));
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
        $pos = Posyandu::find($id);
        if($request->logo_posyandu != null){
            $request->validate([
                'logo_posyandu' => 'mimes:jpeg,jpg,png|max:2000'
            ]);
            $pos->delete_photo();
            $path = $request->file('logo_posyandu')->store('public/images');
            $pos->update(['logo_posyandu' => $path]);
        }
        $pos->update(['nama_posyandu' => $request->nama_posyandu]);
        return redirect()->back()->with('status', 'Berhasil memperbarui posyandu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Posyandu::find($id)->delete();
        return redirect(route('posyandu.index'))->with('status', 'Berhasil menghapus posyandu');
    }

}
