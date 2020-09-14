@extends('Front.master')
@section('css_after')
<link rel="stylesheet" href="{{asset('Admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
@endsection

@section('hero')
<section id="contact" class="contact" style="background: rgba(40, 58, 90, 0.9);">
    <div class="container" data-aos="fade-up">

        <div class="section-title text-light mt-3">
            <h2 class="text-light">Masuk Penduduk</h2>
            <p>Silahkan Masuk Menggunakan NIK dan Nama Anda.</p>
        </div>

        <div class="row d-flex">
            <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch mx-auto">
                <form action="{{route('front_surat_permohonan_login_post')}}" method="post" class="php-email-form">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="name">NIK (Nomer Induk Kependudukan)</label>
                            <input type="number" name="nik" class="form-control" id="nik" data-rule="required"
                                data-msg="NIK Tidak Boleh Kosong." value="{{old('nik')}}" />
                            <div class="validate"></div>
                            @error('nik')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama" id="nama" data-rule="required"
                            data-msg="Nama Tidak Boleh Kosong." value="{{old('nama')}}" />
                        <div class="validate"></div>
                        @error('nama')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <div class="loading">Loading</div>
                    </div>
                    <div class="text-center"><button type="submit">Masuk</button></div>
                </form>
            </div>

        </div>

    </div>
</section><!-- End Contact Section -->
@endsection

@section('js_after')
<script src="{{asset('Admin/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
@if(Session::get('icon'))
<script>
    Swal.fire({
    icon: "{{Session::get('icon')}}",
    title: "{{Session::get('title')}}",
    text: "{{Session::get('text')}}",
    })
</script>
@endif
@endsection
