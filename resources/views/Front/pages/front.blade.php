@extends('Front.master')

@section('css_before')
    <link rel="stylesheet" href="{{asset('Front/css/components/news.css')}}">
@endsection

@section('hero')
    <section id="hero" class="d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1"
                     data-aos="fade-up" data-aos-delay="200">
                    <div class="row justify-content-center justify-content-lg-start mt-3">
                        @if($setting->logo_kabupaten !== null)
                            <img src="{{url('storage/images/logo') . "/" . $setting->logo_kabupaten}}" alt="Logo Kabupaten"
                                 class="img-fluid"
                                 style="max-height: 80px">
                        @endif
                        @if($setting->logo_kabupaten !== null)
                            <img src="{{asset('Logo/logo_garuda.png')}}" alt="Logo Garuda" class="img-fluid ml-5"
                                 style="max-height: 80px">
                        @else
                            <img src="{{asset('Logo/logo_garuda.png')}}" alt="Logo Garuda" class="img-fluid"
                                 style="max-height: 80px">
                        @endif
                        @if($setting->logo_maskot !== null)
                            <img src="{{url('storage/images/logo') . "/" . $setting->logo_maskot}}" alt="Logo Maskot"
                                 class="img-fluid ml-5"
                                 style="max-height: 80px">
                        @endif
                    </div>
                    <h1 class="mt-4 text-uppercase">{{$setting->nama_desa}}</h1>
                    <h2>Sistem Informasi dan Pelayanan Administrasi Desa {{$setting->nama_desa}},
                        Kecamatan {{$setting->kecamatan}}
                        <br>{{$setting->kabupaten}}</h2>
                    <div class="d-lg-flex">
                        <a href="{{route('front_index_surat_permohonan')}}" class="btn-get-started scrollto">Surat
                            Permohonan</a>
                        <a href="#" class="venobox btn-watch-video"
                           data-vbtype="video" data-autoplay="true"> Lihat Video <i class="icofont-play-alt-2"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                    <img src="{{asset('Front/img/hero-img.png')}}" class="img-fluid animated" alt="">
                </div>
            </div>

        </div>
    </section>
@endsection

@section('main')
    <!-- ======= Cliens Section ======= -->
    {{--    @include('Front.components.cliens')--}}
    <!-- End Cliens Section -->

    <!-- ======= Grafik Pertumbuhan Section ======= -->
    @include('Front.components.grafikpertumbuhan')
    <!-- End Grafik Pertumbuhan Section -->

    <!-- ======= Services Section ======= -->
    @include('Front.components.berita')
    <!-- End Services Section -->

    <!-- ======= Portfolio Section ======= -->
    @include('Front.components.tentangkami')
    <!-- End Portfolio Section -->

    <!-- ======= Perangkat Desa Section ======= -->
    @include('Front.components.perangkatdesa')
    <!-- End Perangkat Desa Section -->

    <!-- ======= BPD Section ======= -->
    @include('Front.components.bpd')
    <!-- End Perangkat Desa Section -->

    <!-- ======= POSYANDU Section ======= -->
    @include('Front.components.posyandu')
    <!-- End POSYANDU Section -->

    <!-- ======= Cta Section ======= -->
    @include('Front.components.cta')
    <!-- End Cta Section -->
    
{{-- 
    <!-- ======= About Us Section ======= -->
    @include('Front.components.aboutus')
    <!-- End About Us Section -->

    <!-- ======= Why Us Section ======= -->
    @include('Front.components.whyus')
    <!-- End Why Us Section --> 
--}}

    <!-- ======= Transparansi Section ======= -->
    @include('Front.components.transparansi')
    <!-- End Transparansi Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    @include('Front.components.faq')
    <!-- End Frequently Asked Questions Section -->

    <!-- ======= Contact Section ======= -->
    @include('Front.components.contact')
    <!-- End Contact Section -->
@endsection
