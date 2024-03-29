@php
    use App\Models\Setting;
    $setting = Setting::orderBy('id', 'desc')->first();
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Desa {{$setting->nama_desa}} @yield('title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{url('storage/images/logo') . "/" . $setting->logo_kabupaten}}" rel="icon">
    <link href="{{url('storage/images/logo') . "/" . $setting->logo_kabupaten}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('Front/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('Front/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
    <link href="{{asset('Front/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('Front/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{asset('Front/vendor/venobox/venobox.css')}}" rel="stylesheet">
    <link href="{{asset('Front/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('Front/vendor/aos/aos.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('Front/css/style.css')}}" rel="stylesheet">
@yield('css_before')

@yield('css_after')
<!-- =======================================================
    * Template Name: Arsha - v2.2.0
    * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top @yield('header')">
    <div class="container d-flex align-items-center">

        <div class="logo mr-auto row">
            <img src="{{url('storage/images/logo') . "/" . $setting->logo_kabupaten}}" alt=""
                 class="img-fluid ml-2">
            <h1 class="ml-4"><a href="{{url('/')}}">Desa {{$setting->nama_desa}}</a></h1>
        </div>
        <!-- Uncomment below if you prefer to use an image logo -->
        {{--<a href="index.html" class="logo mr-auto"><img src="{{asset('Front/img/favicon.png')}}" alt=""
        class="img-fluid"></a>--}}

        <nav class="nav-menu d-none d-lg-block">
            <ul>
                <li><a href="{{url('/')}}">Home</a></li>
                <li><a href="{{url('/#grafik')}}">Pertumbuhan</a></li>
                <li><a href="{{url('/#berita')}}">Berita</a></li>
                <li><a href="{{url('/#posyandus')}}">Posyandu</a></li>
                <li class="drop-down"><a href="">Tentang Kami</a>
                    <ul>
                        <li><a href="{{url('/#portfolio')}}">Visi Misi</a></li>
                        <li><a href="{{url('/#portfolio')}}">Sejarah Desa</a></li>
                        <li><a href="{{url('/#portfolio')}}">Profil Desa</a></li>
                        <li><a href="{{url('/#portfolio')}}">Wilayah Desa</a></li>
                        <li><a href="{{url('/#perangkatdesa')}}">Perangkat Desa</a></li>
                    </ul>
                </li>
                <li><a href="{{url('/#faq')}}">Tanya Jawab</a></li>
                <li><a href="{{url('/#contact')}}">Kontak</a></li>

            </ul>
        </nav><!-- .nav-menu -->

        {{--        <a href="{{route('front_index_surat_permohonan')}}" class="get-started-btn scrollto" style="font-size: 0.7em">Surat--}}
        {{--            Permohonan</a>--}}

    </div>
</header><!-- End Header -->

<!-- ======= Hero Section ======= -->
@yield('hero')
<!-- End Hero -->

<main id="main">
    @yield('main')
</main>
<!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer">

    <div class="footer-top footer-newsletter">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 footer-contact">
                    <h3>Desa {{$setting->nama_desa}}</h3>
                    <p>
                        {!! $setting->alamat_lengkap !!} <br><br>
                        <strong>Whatsapp:</strong> {{$setting->no_wa}}<br>
                        <strong>Telepon:</strong> {{$setting->no_telepon}}<br>
                        <strong>Email:</strong> {{$setting->email}}<br>
                    </p>
                </div>
                <div class="col-lg-4 col-md-6 footer-links">
                    <h4>SIPANJI</h4>
                    <p>Sistem Informasi dan Pelayanan Administrasi Desa Kedungpanji</p>
                    {{-- <form action="" method="post">
                        <input type="email" name="email"><input type="submit" value="Subscribe">
                    </form> --}}
                </div>
                <div class="col-lg-4 col-md-6 footer-links">
                    <h4>Our Social Networks</h4>
                    {{-- <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p> --}}
                    <div class="social-links mt-3">
                        <a href="#!" class="twitter"><i class="bx bxl-twitter"></i></a>
                        <a href="#!" class="facebook"><i class="bx bxl-facebook"></i></a>
                        <a href="#!" class="instagram"><i class="bx bxl-instagram"></i></a>
                        <a href="#!" class="google-plus"><i class="bx bxl-skype"></i></a>
                        <a href="#!" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-md-6 footer-contact">
                    <h3>Desa {{$setting->nama_desa}}</h3>
                    <p>
                        {!! $setting->alamat_lengkap !!} <br><br>
                        <strong>Whatsapp:</strong> {{$setting->no_wa}}<br>
                        <strong>Telepon:</strong> {{$setting->no_telepon}}<br>
                        <strong>Email:</strong> {{$setting->email}}<br>
                    </p>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{url('/')}}">Home</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{url('/')}}">About us</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{url('/')}}">Services</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{url('/')}}">Terms of service</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{url('/')}}">Privacy policy</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{url('/')}}">Web Design</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{url('/')}}">Web Development</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{url('/')}}">Product Management</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{url('/')}}">Marketing</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{url('/')}}">Graphic Design</a></li>
                    </ul>
                </div>

                <div class="col-lg-6 col-md-6 footer-links">
                    <h4>Our Social Networks</h4>
                    <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p>
                    <div class="social-links mt-3">
                        <a href="{{url('/')}}" class="twitter"><i class="bx bxl-twitter"></i></a>
                        <a href="{{url('/')}}" class="facebook"><i class="bx bxl-facebook"></i></a>
                        <a href="{{url('/')}}" class="instagram"><i class="bx bxl-instagram"></i></a>
                        <a href="{{url('/')}}" class="google-plus"><i class="bx bxl-skype"></i></a>
                        <a href="{{url('/')}}" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </div> --}}

    <div class="container footer-bottom clearfix">
        <div class="copyright">
            &copy; Copyright <strong><span>Arsha</span></strong>.All Rights Reserved. 
            <div>
                Developed by <strong>PT. Media Layar Independen</strong>
            </div>
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>
</footer>
    <!-- End Footer -->
<a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="{{asset('Front/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('Front/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('Front/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
<script src="{{asset('Front/vendor/php-email-form/validate.js')}}"></script>
<script src="{{asset('Front/vendor/waypoints/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('Front/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('Front/vendor/venobox/venobox.min.js')}}"></script>
<script src="{{asset('Front/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('Front/vendor/aos/aos.js')}}"></script>

<!-- Template Main JS File -->
<script src="{{asset('Front/js/main.js')}}"></script>
@yield('js_after')
</body>

</html>
