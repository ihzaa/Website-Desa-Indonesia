@extends('Front.master')

@section('title', " | " . $homes -> home_category -> category_name)
@section('header', 'header-inner-pages')

@section('main')
    <main>

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs d-flex justify-content-center">
            <div class="col-11">

                <ol>
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li>{{$homes -> home_category -> category_name}}</li>
                </ol>
                <h2>{{"Detail " . $homes -> home_category -> category_name}}</h2>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Portfolio Details Section ======= -->
        <section id="portfolio-details" class="portfolio-details">
            <div class="d-flex justify-content-center row">
                <div class="col-lg-8" style="padding: 0 22px 22px 22px">

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

                <div class="col-lg-3 ml-3">
                    <h5>Berita Terkini</h5>
                    <hr/>

                    @foreach($beritas as $brt)
                        <div class="row ml-1 mr-0">
                            <img src="{{Storage::url('images/berita/thumbnails')}}/{{$brt->thumbnail_berita}}"
                                 class="rounded" alt=""
                                 style="width: 70px; height: 70px">

                            <div class="col-10">
                                <p class="mb-0 text-uppercase font-weight-bold"
                                   style="font-size: 0.8em">{{\Carbon\Carbon::parse($brt->created_at)->translatedFormat('d M Y')}}</p>
                                <p class="mb-0 text-uppercase text-secondary font-weight-normal"
                                   style="font-size: 0.9em;">{{substr($brt->judul_berita, 0, 75) . "..."}}</p>
                                <a href="{{route('front_berita_show', ['id' => $brt->id])}}">
                                    <p style="font-size: 0.8em" class="mb-0 mt-1 text-right">Selengkapnya</p>
                                </a>
                            </div>
                        </div>
                        <hr/>
                    @endforeach

                </div>
            </div>
        </section><!-- End Portfolio Details Section -->

    </main>
@endsection
