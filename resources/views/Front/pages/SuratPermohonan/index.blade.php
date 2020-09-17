@extends('Front.master')
@section('css_after')
<link rel="stylesheet" href="{{asset('Admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('Front/css/loading.min.css')}}">
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
            @foreach ($data['surat'] as $d)
            <div class="col mb-4 card-surat" data-id="{{$d->id}}" data-nama="{{$d->jenis_surat}}">
                <div class="card clickable">
                    <img src="{{asset($d->logo)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$d->jenis_surat}}</h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section><!-- End Contact Section -->

@endsection
@section('js_after')
<script src="{{asset('Admin/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="{{asset('Front/js/html2pdf/html2pdf.bundle.min.js')}}"></script>
<script>
    let url = {udh : "{{route('front_surat_permohonan_unduh',['id'=>'__post__'])}}"};
</script>
<script src="{{asset('Front/js/pages/surat-permohonan-index.js')}}"></script>
@endsection
