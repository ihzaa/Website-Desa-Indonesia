<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\arsip_surat_penduduk;
use App\Models\Penduduk;
use App\Models\permohonan_surat;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use PDF;
use stdClass;

class SuratPermohonanController extends Controller
{
    public function index()
    {
        return view('Admin.Pages.SuratPermohonan.index');
    }

    public function indexResponse()
    {
        return response()->view('Admin.Pages.SuratPermohonan.response_index');
    }

    public function getAll()
    {

        // $data['surat'] = permohonan_surat::withCount('arsip_surat_penduduks')->toSql();
        // dd($surat);
        $data['surat'] = DB::select(DB::raw('Select `permohonan_surats`.id,`permohonan_surats`.jenis_surat, (select count(*) from `arsip_surat_penduduks` where `permohonan_surats`.`id` = `arsip_surat_penduduks`.`permohonan_surat_id` and `arsip_surat_penduduks`.`deleted_at` is null) as `arsip_surat_penduduks_count` from `permohonan_surats` where `permohonan_surats`.`deleted_at` is null'));
        return response()->json($data);
    }

    public function halamanTambah()
    {
        $data = array();
        $data['kolom_penduduk'] = Schema::getColumnListing('penduduks');
        // return $data;
        return view('Admin.Pages.SuratPermohonan.tambah_edit', compact("data"));
    }

    public function halamanTambahResponse()
    {
        $data = array();
        $data['kolom_penduduk'] = Schema::getColumnListing('penduduks');
        // return $data;
        return response()->view('Admin.Pages.SuratPermohonan.tambah_edit_response', compact("data"));
    }

    public function halamanEdit($id)
    {
        $data = array();
        $data['surat'] = permohonan_surat::find($id);
        $data['surat']->attribute = json_decode($data['surat']->attribute);
        $data['kolom_penduduk'] = Schema::getColumnListing('penduduks');
        // return $data;
        return view('Admin.Pages.SuratPermohonan.tambah_edit', compact("data"));
    }

    public function halamanEditResponse($id)
    {
        $data = array();
        $data['surat'] = permohonan_surat::find($id);
        $data['surat']->attribute = json_decode($data['surat']->attribute);
        $data['kolom_penduduk'] = Schema::getColumnListing('penduduks');
        return response()->view('Admin.Pages.SuratPermohonan.tambah_edit_response', compact("data"));
    }

    public function tambah(Request $request)
    {
        // return response()->json($request);
        $this->validate($request, [
            'logo' => ['required', 'image', 'max:256']
        ]);
        $surat = new permohonan_surat;
        $surat->jenis_surat = $request->jenis_surat;
        $surat->attribute = $request->atribut;
        $surat->keterangan_pembuka = $request->keterangan_pembuka;
        $surat->logo = 'a';
        $surat->keterangan = $request->keterangan;
        $surat->tipe_surat = $request->kode_wilayah;
        $surat->kode_surat = $request->kode_surat;
        $surat->save();

        if ($request->ttd1 != null) {
            $request->ttd1 = $this->simpanGambarYWSTWYG($surat->id, $request->ttd1, 1);
            $surat->ttd_kiri = $request->ttd1;
        }
        if ($request->ttd2 != null) {
            $surat->ttd_tengah = $this->simpanGambarYWSTWYG($surat->id, $request->ttd2, 2);
        }
        if ($request->ttd3 != null) {
            $surat->ttd_kanan = $this->simpanGambarYWSTWYG($surat->id, $request->ttd3, 3);
        }

        $extension = $request->file('logo')->getClientOriginalExtension();
        $location = 'Admin/dist/img/Logo Surat Permohonan';
        $nameUpload = $surat->id . 'logo.' . $extension;
        $request->file('logo')->move('Assets/' . $location, $nameUpload);
        $filepath = $location . "/" . $nameUpload;

        $surat->logo = $filepath;


        $surat->save();

        return $this->indexResponse();
    }

    private function simpanGambarYWSTWYG($id, $req, $j)
    {
        $dom = new \domdocument();
        libxml_use_internal_errors(true);
        $dom->loadHtml($req, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getelementsbytagname('img');
        foreach ($images as $k => $img) {
            $data = $img->getattribute('src');
            if ($data[0] != '/') {
                list($type, $data) = explode(';', $data);
                list(, $data)      = explode(',', $data);
                $data = base64_decode($data);
                $image_name = $id . '-' . $k . '-' . $j . '-' . time() . '.png';
                $path = '/Assets/Admin/dist/img/TTD Surat Permohonan/' . $image_name;
                File::put('Assets/Admin/dist/img/TTD Surat Permohonan/' . $image_name, $data);
                $img->removeattribute('src');
                $img->setattribute('src', $path);
            }
        }
        $req = $dom;
        return $req->saveHTML();
    }

    public function hapus($id)
    {
        permohonan_surat::find($id)->delete();
        return response()->json($id);
    }

    public function edit($id, Request $request)
    {
        $surat = permohonan_surat::find($id);
        $surat->jenis_surat = $request->jenis_surat;
        $surat->attribute = $request->atribut;
        $surat->keterangan_pembuka = $request->keterangan_pembuka;
        $surat->keterangan = $request->keterangan;
        $surat->tipe_surat = $request->kode_wilayah;
        $surat->kode_surat = $request->kode_surat;
        if ($request->has('logo')) {
            $extension = $request->file('logo')->getClientOriginalExtension();
            $location = 'Admin/dist/img/Logo Surat Permohonan';
            $nameUpload = $surat->id . 'logo.' . $extension;
            $request->file('logo')->move('Assets/' . $location, $nameUpload);
            $filepath = $location . "/" . $nameUpload;

            $surat->logo = $filepath;
        }
        if ($request->ttd1 != null) {
            $request->ttd1 = $this->simpanGambarYWSTWYG($id, $request->ttd1, 1);
            $surat->ttd_kiri = $request->ttd1;
        } else {
            $surat->ttd_kiri = null;
        }
        if ($request->ttd2 != null) {
            $surat->ttd_tengah = $this->simpanGambarYWSTWYG($id, $request->ttd2, 2);
        } else {
            $surat->ttd_tengah = null;
        }
        if ($request->ttd3 != null) {
            $surat->ttd_kanan = $this->simpanGambarYWSTWYG($id, $request->ttd3, 3);
        } else {
            $surat->ttd_kanan = null;
        }
        $surat->save();
        return $this->indexResponse();
    }

    public function downloadSampel($id)
    {
        $data = permohonan_surat::find($id);
        $kiri = "";
        $tengah = "";
        $kanan = "";
        $data->attribute = json_decode($data->attribute);
        if ($data->ttd_kiri != null) {
            $dom = new \domdocument();
            libxml_use_internal_errors(true);
            $dom->loadHtml($data->ttd_kiri, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $images = $dom->getelementsbytagname('img');
            foreach ($images as $k => $img) {
                $temp = $img->getattribute('src');
                $img->setattribute('src', url($temp));
            }
            $kiri = $dom->saveHTML();
        }
        if ($data->ttd_tengah != null) {
            $dom = new \domdocument();
            libxml_use_internal_errors(true);
            $dom->loadHtml($data->ttd_tengah, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $images = $dom->getelementsbytagname('img');
            foreach ($images as $k => $img) {
                $temp = $img->getattribute('src');
                $img->setattribute('src', url($temp));
            }
            $tengah = $dom->saveHTML();
        }
        if ($data->ttd_kanan != null) {
            $dom = new \domdocument();
            libxml_use_internal_errors(true);
            $dom->loadHtml($data->ttd_kanan, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $images = $dom->getelementsbytagname('img');
            foreach ($images as $k => $img) {
                $temp = $img->getattribute('src');
                $img->setattribute('src', url($temp));
            }
            $kanan = $dom->saveHTML();
        }
        // $pdf = PDF::loadview('Admin.Template.Surat Permohonan.Sampel', compact('data'));
        // $pdf->setPaper('F4', 'portrait');
        $tabel = '<table style="width:100%">
        <tbody>';
        foreach ($data->attribute as $d) {
            $tabel .= '
                <tr>
                    <td style="width: 30%!important;text-transform: capitalize;">' . str_replace('_', ' ', $d) . '</td>
                    <td style="width: 100%!important;">: Sesuai dengan data penduduk</td>
                </tr>';
        }
        $tabel .= '</tbody></table>';
        $pdf = App::make('dompdf.wrapper');
        $pdf->setPaper('F4', 'portrait');
        $pdf->loadHTML(' <div style="min-width: 100%">
        <div style="text-align: center!important; min-width: 100%">
            <img src="' . url('Assets/' . $data->logo) . '" id="logo" alt="" style="
            position: absolute;
            left: 1rem;
            top: 1.5rem;
            height: 100px;
            max-width: 180px !important;
            ">
            <h3 style="text-transform: uppercase!important;margin-bottom: 0!important;">
                PEMERINTAH KABUPATEN BOGOR</h3>
            <h3 style="text-transform: uppercase!important;margin-bottom: 0!important;margin-top: 0!important;">
                KECAMATAN APAINI</h3>
            <h1 style="text-transform: uppercase!important;margin-bottom: 0!important;margin-top: 0!important;">
                <strong>DESA KONOHA</strong>
            </h1>
            <p style="margin-bottom: 0!important;margin-top: 0!important;">Jl. Soehat RT.2 No.12 Balikpapan Utara</p>
            <hr style="
            border-top: 2px solid rgba(0, 0, 0, 0.1);background-color: black;margin-bottom: 0!important;">
            <hr
                style="
            border-top: 1px solid rgba(0, 0, 0, 0.1);background-color: black;margin-top: 2px !important;margin-bottom: 0!important;">
        </div>
    </div>
    <div style="min-width: 100%;margin-top: 1.5rem!important;">
        <div style="text-align: center!important; min-width: 100%">
            <h4 style="text-transform: uppercase!important;margin-bottom: 0!important;margin-top: 0!important;"><u
                    id="nama_surat">' . $data->jenis_surat . '</u></h4>
        </div>
    </div>
    <div style="min-width: 100%">
        <div style="text-align: center!important; min-width: 100%">
            <h4 style="text-transform: uppercase!important;margin-bottom: 0!important;margin-top: 0!important;">
                NomerSurat/<span id="nomer_surat">' . $data->tipe_surat . '</span>/Tahun</h4>
        </div>
    </div>
    <div
        style="min-width: 100%;margin-top: 1.5rem!important;margin-bottom: 1.5rem!important;padding-left: 0.5rem!important;padding-right: 0.5rem!important;">
        <div style="min-width: 100%">
            <p style="text-indent: 37px;margin-bottom: 0!important;">Dengan ini Kepala Desa Konoha Kecamatan
                Apaini Kabupaten Bogor,
                menerangkan dengan sebenarnya bahwa :</p>
        </div>
    </div>
    <div style="width: 100%;margin-top: 1.5rem!important;padding-left: 3rem!important;padding-right: 3rem!important;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-right: -7.5px;
    margin-left: -7.5px;" id="atribut">
        ' . $tabel . '
    </div>
    <div
        style="min-width: 100%;padding-left: 0.5rem!important;padding-right: 1rem!important;">
        <p style="text-indent: 50px!important;margin-bottom: 0!important;" id="keterangan">
            ' . $data->keterangan . '</p>
    </div>
    <div style="width: 100%;margin-top: 1.5rem!important;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-right: -7.5px;
    margin-left: -7.5px;" id="atribut">
    <table style="width: 100%;" >
    <tbody>
        <tr>
            <td style="width: 60%!important;text-align: center!important;">' . $kiri . '</td>
            <td style="width: 60%!important;text-align: center!important;">' . $tengah . '</td>
            <td style="width: 60%!important;text-align: center!important;">' . $kanan . '</td>
        </tr>
    </tbody>
</table>
    </div>
    ');
        return $pdf->download($data->jenis_surat . '-sampel.pdf');
    }

    public function getAllArsip()
    {
        // $data['surat'] = permohonan_surat::pluck('jenis_surat', 'id');
        // $data['arsip'] = array();
        // foreach ($data['surat'] as $k => $v) {
        //     $data['arsip'][$k] = arsip_surat_penduduk::where('permohonan_surat_id', $k)->get();
        // }
        // $data['surat'] = permohonan_surat::pluck('jenis_surat', 'id');
        $data = DB::select(DB::raw('SELECT penduduks.nama as nama, penduduks.id as id, data_ktps.nik as nik, arsip_surat_penduduks.tanggal_surat, permohonan_surats.jenis_surat, arsip_surat_penduduks.nomer, arsip_surat_penduduks.id as aid FROM penduduks JOIN data_ktps ON data_ktps.id = penduduks.id_data_ktp JOIN arsip_surat_penduduks ON arsip_surat_penduduks.penduduk_id = penduduks.id JOIN permohonan_surats on permohonan_surats.id = arsip_surat_penduduks.permohonan_surat_id ORDER BY arsip_surat_penduduks.tanggal_surat DESC'));
        // $data['arsip'] = arsip_surat_penduduk::orderBy('tanggal_surat', 'desc')->get();

        return response()->json($data);
    }

    public function downloadArsipById($id)
    {
        $arsip = arsip_surat_penduduk::find($id);
        $surat = permohonan_surat::find($arsip->permohonan_surat_id);
        $surat->attribute = json_decode($surat->attribute);
        $penduduk = Penduduk::find($arsip->penduduk_id);
        $penduduk->tgl_lahir = Carbon::parse($penduduk->tgl_lahir)->translatedFormat("d F Y");
        $surat['nomor'] = $arsip->nomer;
        $surat['tahun'] = Carbon::parse($arsip->tanggal_surat)->format('Y');
        $surat['timestamp'] = Carbon::parse($arsip->tanggal_surat)->format('d-m-Y');
        $str = "";
        do {
            $str = $this->get_string_between($surat['keterangan'], "{", "}");
            $tmp = str_replace(" ", "_", $str);
            $surat['keterangan'] = str_replace("{" . $str . "}", $penduduk[$tmp], $surat['keterangan']);
        } while ($str != "");
        // return response()->json($surat);
        return response()->view('Front.pages.SuratPermohonan.TemplateSurat', compact("surat", "penduduk"));
    }

    function get_string_between($string, $start, $end)
    {
        $string = ' ' . $string;
        $ini = strpos($string, $start);
        if ($ini == 0) return '';
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;
        return substr($string, $ini, $len);
    }

    public function downloadSampelNew($id)
    {
        $surat = permohonan_surat::find($id);
        $surat->attribute = json_decode($surat->attribute);
        $penduduk = new stdClass();
        $data['kolom_penduduk'] = Schema::getColumnListing('penduduks');
        foreach ($data['kolom_penduduk'] as $d) {
            // array_push($penduduk[$d] => "Sesuai Dengan Data Penduduk");
            $penduduk->$d = "Sesuai Dengan Data Penduduk";
        }
        $penduduk->nik = "Sesuai Dengan Data Penduduk";
        $surat['nomor'] = "NOMERSURAT";
        $surat['tahun'] = Carbon::now()->format('Y');
        $surat['nik'] = "NIK-PENDUDUK";
        $surat['timestamp'] = Carbon::now()->format('d-m-Y');
        return response()->view('Front.pages.SuratPermohonan.TemplateSurat', compact("surat", "penduduk"));
    }
}
