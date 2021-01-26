<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\arsip_surat_penduduk;
use App\Models\arsip_surat_pindah_penduduk;
use App\Models\DataKtp;
use App\Models\Penduduk;
use App\Models\permohonan_surat;
use App\Models\template_surat;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SuratPermohonanController extends Controller
{
    public function index()
    {
        if (Auth::guard('penduduk')->check()) {
            $data['penduduk'] = Penduduk::where('id_data_ktp', Auth::guard('penduduk')->id())->first();
            $data['kk'] = Penduduk::where('id_kartu_keluarga', $data['penduduk']->id_kartu_keluarga)->get();
            $data['surat'] = permohonan_surat::all();
            $data['template'] = template_surat::all();
            $data['prop'] = DB::select(DB::raw("SELECT `kode`,`nama` FROM `wilayah_2020` WHERE CHAR_LENGTH(`kode`)=2 ORDER BY `nama`"));
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
            $penduduk = Penduduk::where('id_data_ktp', Auth::guard('penduduk')->id())->first();
            $penduduk->tgl_lahir = Carbon::parse($penduduk->tgl_lahir)->translatedFormat("d F Y");
            $surat['nomor'] = (arsip_surat_penduduk::where('permohonan_surat_id', $id)->count()) + 1;
            $surat['nik'] = Auth::guard('penduduk')->user()->nik;
            $surat['timestamp'] = Carbon::parse($surat->tanggal_surat)->format('d-m-Y');
            arsip_surat_penduduk::create([
                "nomer" => $surat['nomor'],
                "tanggal_surat" => Carbon::now(),
                "penduduk_id" => $penduduk->id,
                "permohonan_surat_id" => $id
            ]);
            $surat['tahun'] = date('y');
            $str = "";
            do {
                $str = $this->get_string_between($surat['keterangan'], "{", "}");
                if ($str == "nik") {
                    $surat['keterangan'] = str_replace("{nik}", Auth::guard('penduduk')->user()->nik, $surat['keterangan']);
                } else {
                    $tmp = str_replace(" ", "_", $str);
                    $surat['keterangan'] = str_replace("{" . $str . "}", $penduduk[$tmp], $surat['keterangan']);
                }
            } while ($str != "");
            $str = "";
            do {
                $str = $this->get_string_between($surat['keterangan_pembuka'], "{", "}");
                if ($str == "nik") {
                    $surat['keterangan_pembuka'] = str_replace("{nik}", Auth::guard('penduduk')->user()->nik, $surat['keterangan_pembuka']);
                } else {
                    $tmp = str_replace(" ", "_", $str);
                    $surat['keterangan_pembuka'] = str_replace("{" . $str . "}", $penduduk[$tmp], $surat['keterangan_pembuka']);
                }
            } while ($str != "");
            // return response()->json($surat['keterangan']);
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

    public function getDataWilayah($id)
    {
        $n = strlen($id);
        $m = ($n == 2 ? 5 : ($n == 5 ? 8 : 13));
        $data = DB::select(DB::raw("SELECT `kode`,`nama` FROM `wilayah_2020` WHERE LEFT(`kode`,'$n')='$id' AND CHAR_LENGTH(`kode`)=$m ORDER BY `nama`"));

        return response()->json($data);
    }

    public function getKota($id)
    {

        $n = strlen($id);
        $m = ($n == 2 ? 5 : ($n == 5 ? 8 : 13));
        $data = DB::select(DB::raw("SELECT `kode`,`nama` FROM `wilayah_2020` WHERE LEFT(`kode`,'$n')='$id' AND CHAR_LENGTH(kode)=$m ORDER BY `nama`"));

        return response()->json($data);
    }

    public function unduhSuratKeluar(Request $request)
    {
        if (Auth::guard('penduduk')->check()) {
            $penduduk = Penduduk::where('id_data_ktp', Auth::guard('penduduk')->id())->first();
            $anggota = $request->anggota;
            $kk['anggota'] = Penduduk::whereIn('id', $request->anggota)->get();
            $kk['nama'] = Penduduk::where('id_kartu_keluarga', $penduduk->id_kartu_keluarga)->where('shdrt', 'kepala keluarga')->first();
            if ($kk['nama'] == []) {
                return response('', 202, []);
            }
            $kk['nik'] = DataKtp::find($kk['nama']->id_data_ktp);
            $pindah = array();
            $pindah["rt"] = $request->rt;
            $pindah["rw"] = $request->rw;
            $pindah["prov"] = $request->prov;
            $pindah['kota'] = $request->kota;
            $pindah['kec'] = $request->kec;
            $pindah['kel'] = $request->kel;
            // return response()->json($pindah)
            $data['tgl'] = Carbon::now()->format('d-m-Y');
            for ($i = 0; $i < count($anggota); $i++) {
                arsip_surat_pindah_penduduk::create([
                    'penduduk_id' => $anggota[$i],
                    'rt' => $request->rt,
                    'rw' => $request->rw,
                    'desa_kelurahan' => $request->kel,
                    'kecamatan' => $request->kec,
                    'kabupaten_kota' => $request->kota,
                    'provinsi' => $request->prov
                ]);
                Penduduk::find($anggota[$i])->delete();
            }
            if (in_array(Auth::guard('penduduk')->id(), $anggota)) {
                Auth::guard('penduduk')->logout();
            }
            return response()->view('Front.pages.SuratPermohonan.TemplateSuratPindah', compact("pindah", "penduduk", "data", "kk"));
        } else {
            return view('Front.pages.SuratPermohonan.Login');
        }
    }
}
