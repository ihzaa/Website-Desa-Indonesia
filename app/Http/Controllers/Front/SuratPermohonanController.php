<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\arsip_surat_penduduk;
use App\Models\DataKtp;
use App\Models\Penduduk;
use App\Models\permohonan_surat;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuratPermohonanController extends Controller
{
    public function index()
    {
        if (Auth::guard('penduduk')->check()) {
            $data['penduduk'] = Penduduk::find(Auth::guard('penduduk')->id());
            $data['surat'] = permohonan_surat::all();
            return view('Front.pages.SuratPermohonan.index', compact("data"));
        } else {
            return view('Front.pages.SuratPermohonan.Login');
        }
    }

    public function unduh($id)
    {
        if (Auth::guard('penduduk')->check()) {

            $surat = permohonan_surat::find($id);
            $surat->attribute = json_decode($surat->attribute);
            // $surat->tgl_lahir = Carbon::parse($surat->tgl_lahir)->format("d/m/y");
            $penduduk = Penduduk::find(Auth::guard('penduduk')->id());
            arsip_surat_penduduk::create([
                "tanggal_surat" => Carbon::now(),
                "penduduk_id" => $penduduk->id,
                "permohonan_surat_id" => $id
            ]);
            $surat['nomor'] = arsip_surat_penduduk::where('permohonan_surat_id', $id)->count();
            $str = "";
            do {
                $str = $this->get_string_between($surat['keterangan'], "{", "}");
                $tmp = str_replace(" ", "_", $str);
                $surat['keterangan'] = str_replace("{" . $str . "}", $penduduk[$tmp], $surat['keterangan']);
            } while ($str != "");
            // return response()->json($surat);
            return response()->view('Front.pages.SuratPermohonan.TemplateSurat', compact("surat", "penduduk"));
        } else {
            return view('Front.pages.SuratPermohonan.Login');
        }
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
    public function login(Request $request)
    {
        $request->validate([
            'nik' => 'required',
            'nama' => 'required',
        ]);

        $dataKtp = DataKtp::where('nik', $request->nik)->first();

        if (empty($dataKtp)) {
            return back()->with('icon', 'error')->with('title', 'Maaf!')->with('text', 'NIK Tidak Ditemukan!')->withInput();
        } else {
            $penduduk = $dataKtp->penduduk()->first();
            // return $penduduk;
            // $penduduk = Penduduk::where('id_data_ktp')->first();
            if (strcasecmp($penduduk->nama, $request->nama) == 0) {
                Auth::guard('penduduk')->loginUsingId($dataKtp->id);
                return redirect(route('front_index_surat_permohonan'));
            } else {
                return back()->with('icon', 'error')->with('title', 'Maaf!')->with('text', 'Nama Yang Anda Inputkan Salah!')->withInput();
            }
        }
    }

    public function logout()
    {
        Auth::guard('penduduk')->logout();
        return redirect(route('front_dashboard'));
    }
}
