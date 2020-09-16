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
                    <h1>Website Desa Indonesia</h1>
                    <h2>Layanan Sistem Informasi dan Manajemen Tata Kelola Desa Indonesia</h2>
                    <div class="d-lg-flex">
                        <a href="#about" class="btn-get-started scrollto">Get Started</a>
                        <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="venobox btn-watch-video"
                           data-vbtype="video" data-autoplay="true"> Watch Video <i class="icofont-play-alt-2"></i></a>
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
    @include('Front.components.cliens')
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

    <!-- ======= Cta Section ======= -->
    @include('Front.components.cta')
    <!-- End Cta Section -->

    <!-- ======= About Us Section ======= -->
    @include('Front.components.aboutus')
    <!-- End About Us Section -->

    <!-- ======= Why Us Section ======= -->
    @include('Front.components.whyus')
    <!-- End Why Us Section -->


    <!-- ======= Pricing Section ======= -->
    @include('Front.components.pricing')
    <!-- End Pricing Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    @include('Front.components.faq')
    <!-- End Frequently Asked Questions Section -->

    <!-- ======= Contact Section ======= -->
    @include('Front.components.contact')
    <!-- End Contact Section -->
@endsection
