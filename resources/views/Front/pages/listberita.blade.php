@extends('Front.master')
@section('header', 'header-inner-pages')
@section('title', " | Berita Desa")

@section('main')
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs" style="margin-bottom: 80px;">
    <div class="container">
        <ol>
            <li><a href="{{route('front_dashboard')}}">Home</a></li>
            <li>Berita</li>
        </ol>
        <h1 style="color: #37517e">Berita Desa</h1 style="color: #37517e">
    </div>
</section><!-- End Breadcrumbs -->

@foreach($berita as $data)
<section class="inner-page team" data-aos="400" style="margin-top: -75px;">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-lg-12">
                <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="400">
                    <div class="col-sm-12 col-md-12 col-lg-3">
                        <img src="{{Storage::url('images/berita/thumbnails')}}/{{$data->thumbnail_berita}}" alt=""
                            height="150px" width="250px">
                    </div>
                    <div class="member-info row">
                        <div class="col-sm-12 col-md-12 col-lg-9">
                            <h4><a
                                    href="">{{strlen($data->judul_berita) > 100 ? substr($data->judul_berita,0,150)."..." : $data->judul_berita}}</a>
                            </h4>
                            <span>{{\Carbon\Carbon::parse($data->created_at)->translatedFormat('d, F Y')}}</span>
                            <a href="{{route('berita_show', $data->id)}}" class="btn-learn-more"
                                style="margin-top: 10px">Baca Selengkapnya</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endforeach

<div class="container">
    <div class="d-flex justify-content-end mb-5 beritalink">
        {!! $berita->links() !!}
    </div>
</div>

@endsection

@section('js_after')

<script>
    if ($('#beritalink').text().length > 20) {
        var linkText = $('#beritalink').text();
        $('#beritalink').html(linkText.substring(0, 20) + "...")
        $('#beritalink').on("click", function () {
            console.log("linkText :: ", linkText);
            $('#beritalink').html(linkText);
        });
    }
</script>
@endsection
