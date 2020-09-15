<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Website Desa @yield('title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('Logo/logo_jatim.png')}}" rel="icon">
    <link href="{{asset('Logo/logo_jatim.png')}}" rel="apple-touch-icon">

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

        <h1 class="logo mr-auto"><a href="{{url('/')}}">Website Desa</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        {{--<a href="index.html" class="logo mr-auto"><img src="{{asset('Front/img/favicon.png')}}" alt="" class="img-fluid"></a>--}}

        <nav class="nav-menu d-none d-lg-block">
            <ul>
                <li class="active"><a href="{{url('/')}}">Home</a></li>
                <li><a href="{{url('/#about')}}">About</a></li>
                <li><a href="{{url('/#services')}}">Services</a></li>
                <li class="drop-down"><a href="">Tentang Kami</a>
                    <ul>
                        <li><a href="{{url('/#tentangkami')}}">Visi Misi</a></li>
                        <li><a href="{{url('/#tentangkami')}}">Sejarah Desa</a></li>
                        <li><a href="{{url('/#tentangkami')}}">Profil Desa</a></li>
                        <li><a href="{{url('/#tentangkami')}}">Wilayah Desa</a></li>
                    </ul>
                </li>
                <li><a href="{{url('/#perangkatdesa')}}">Perangkat Desa</a></li>
                <li><a href="{{url('/#contact')}}">Contact</a></li>

            </ul>
        </nav><!-- .nav-menu -->

        <a href="{{url('/#about')}}" class="get-started-btn scrollto">Get Started</a>

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

    <div class="footer-newsletter">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h4>Join Our Newsletter</h4>
                    <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
                    <form action="" method="post">
                        <input type="email" name="email"><input type="submit" value="Subscribe">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6 footer-contact">
                    <h3>Arsha</h3>
                    <p>
                        A108 Adam Street <br>
                        New York, NY 535022<br>
                        United States <br><br>
                        <strong>Phone:</strong> +1 5589 55488 55<br>
                        <strong>Email:</strong> info@example.com<br>
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

                <div class="col-lg-3 col-md-6 footer-links">
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
    </div>

    <div class="container footer-bottom clearfix">
        <div class="copyright">
            &copy; Copyright <strong><span>Arsha</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>
</footer><!-- End Footer -->

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
