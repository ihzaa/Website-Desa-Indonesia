@extends('Front.master')
@section('title',"- Surat Permohonan")
@section('css_after')
<link rel="stylesheet" href="{{asset('Admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('Front/css/loading.min.css')}}">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('hero')
<style>
    .clickable {
        cursor: pointer;
    }
</style>
<section id="contact" class="contact" style="background: rgba(40, 58, 90, 0.9);">
    <div class="container" data-aos="fade-up">
        <div class="section-title text-light mt-3">
            <h2 class="text-light">Surat Permohonan</h2>
            <p>Anda Masuk Sebagai <strong class="ld ld-dim">{{$data['penduduk']->nama}}</strong>.</p>
            <p>Klik <a class="btn btn-sm btn-danger" href="{{route('front_surat_permohonan_logout')}}">disini</a> jika
                ingin keluar.</p>
            <p>Pilih Salah Satu Surat Permohonan Untuk Mengunduh.</p>
        </div>

        <div class="row row-cols-2 row-cols-md-4">
            <div class="col mb-4 card-surat-pindah">
                <div class="card clickable">
                    <div class="card-body">
                        <h5 class="card-title m-0">Surat Pengantar Pindah</h5>
                    </div>
                </div>
            </div>
            @foreach ($data['surat'] as $d)
            <div class="col mb-4 card-surat" data-id="{{$d->id}}" data-nama="{{$d->jenis_surat}}">
                <div class="card clickable">
                    {{-- <img src="{{asset($d->logo)}}" class="card-img-top" alt="..."> --}}
                    <div class="card-body">
                        <h5 class="card-title m-0">{{$d->jenis_surat}}</h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {{-- @if(count($data['surat']) == 0)
        <h1 class="text-info text-center">Maaf Belum Ada Surat Permohonan yang Dibuat.</h1>
        @endif --}}
    </div>
</section><!-- End Contact Section -->
<div id="modal-surat-keluar" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Data Surat Keluar</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3 class="text-center mb-2">Data Alamat Pindah</h3>
                <div class="form-inline">
                    <div class="input-group mb-2 col-md-6">
                        <select class="custom-select form-control select_wilayah" style="width: 100%;"
                            id="pindah_pilih_prop">
                            <option value="xx" id="profinsi_xx">Pilih propinsi</option>
                            @foreach ($data['prop'] as $p)
                            <option value="{{$p->kode}}">{{$p->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group mb-2 col-md-6">
                        <select class="custom-select form-control select_wilayah" style="width: 100%;"
                            id="pindah_pilih_kota" disabled>
                            <option value="xx" id="kota_xx">Pilih Kabupaten/Kota</option>
                        </select>
                    </div>
                </div>
                <div class="form-inline">
                    <div class="input-group mb-2 col-md-6">
                        <select class="custom-select form-control select_wilayah" style="width: 100%;"
                            id="pindah_pilih_kec" disabled>
                            <option value="xx" id="kec_xx">Pilih Kecamatan</option>
                        </select>
                    </div>
                    <div class="input-group mb-2 col-md-6">
                        <select class="custom-select form-control select_wilayah" style="width: 100%;"
                            id="pindah_pilih_kel" disabled>
                            <option value="xx" id="kel_xx">Pilih Kelurahan/Desa</option>
                        </select>
                    </div>
                </div>
                <div class="form-inline">
                    <div class="input-group mb-2 col-6">
                        <div class="input-group-prepend">
                            <div class="input-group-text">RT</div>
                        </div>
                        <input type="number" class="form-control" id="rt" placeholder="RT" />
                    </div>
                    <div class="input-group mb-2 col-6">
                        <div class="input-group-prepend">
                            <div class="input-group-text">RW</div>
                        </div>
                        <input type="number" class="form-control" id="rw" placeholder="RW" />
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="">Anggota kelauarga yang pindah:</label>
                    <select class="custom-select form-control select_wilayah" style="width: 100%;"
                        id="pindah_pilih_anggota" name="anggota[]" multiple="multiple">
                        @foreach ($data['kk'] as $d)
                        <option value="{{$d->id}}">{{$d->nama}}</option>
                        @endforeach
                    </select></div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" id="btn_untuh_surat_pindah">Unduh!</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js_after')
<script src="{{asset('Admin/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="{{asset('Front/js/html2pdf/html2pdf.bundle.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
    let url = {udh : "{{route('front_surat_permohonan_unduh',['id'=>'__post__'])}}",
    getProv : "{{route('front_surat_permohonan_pindah_get_prov',['id'=>'nahkan'])}}",
    getKota : "{{route('front_surat_permohonan_pindah_get_kota',['id'=>'nahkan'])}}",
    udh_pindah : "{{route('front_surat_permohonan_pindah_unduh')}}"
    };
</script>
<script src="{{asset('Front/js/pages/surat-permohonan-index.js')}}"></script>

@endsection
