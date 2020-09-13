@extends('Front.master')

@section('title', " | " . $homes -> home_category -> category_name)
@section('header', 'header-inner-pages')

@section('main')
    <main>

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <ol>
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li>{{$homes -> home_category -> category_name}}</li>
                </ol>
                <h2>Portfolio Details</h2>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Portfolio Details Section ======= -->
        <section id="portfolio-details" class="portfolio-details">
            <div class="container">

                <div class="portfolio-details-container">

                    <div class="owl-carousel portfolio-details-carousel">
                        <img src="{{url('storage/images/home/' . $homes->image)}}" class="img-fluid"
                             style="max-height: 695px; object-fit: cover" alt="">
                    </div>

                    <div class="portfolio-info">
                        <h3>{{$homes -> title}}</h3>
                        <ul>
                            <li><strong>Kategori</strong>: {{$homes -> home_category -> category_name}}</li>
                            <li><strong>Dibuat</strong>: {{$homes -> created_at -> format('d M Y')}}</li>
                            <li><strong>Diupdate</strong>: {{$homes -> updated_at -> format('d M Y')}}</li>
                        </ul>
                    </div>

                </div>

                <div class="portfolio-description">
                    <h2>{{$homes -> title}}</h2>
                    <p>
                        {!! $homes -> content !!}
                    </p>
                </div>

            </div>
        </section><!-- End Portfolio Details Section -->

    </main>
@endsection
