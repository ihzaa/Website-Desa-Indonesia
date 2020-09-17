<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QnA;
use Illuminate\Http\Request;

class QnAController extends Controller
{
    public function index()
    {
        $qna = QnA::all();

        return view('Admin.Pages.QnA.qna', compact('qna'));
    }

    public function store(Request $request)
    {
        QnA::create([
            'judul' => $request->judul,
            'jawaban' => $request->jawaban
        ]);

        return redirect()->route('admin_tanyajawab')->with('status', 'Data Berhasil Ditambahkan');
    }

    public function update(Request $request, $id)
    {
        QnA::where('id', $id)
            ->update([
               'judul' => $request->judul,
               'jawaban' => $request->jawaban
            ]);

        return redirect()->route('admin_tanyajawab')->with('status', 'Data Berhasil Diupdate');
    }

    public function destroy($id)
    {
        QnA::destroy($id);

        return redirect()->route('admin_tanyajawab');
    }
}
