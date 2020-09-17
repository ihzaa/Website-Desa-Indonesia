@extends('Front.master')
@section('header', 'header-inner-pages')
@section('title', " | " . $berita->judul_berita)

@section('main')
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">
        <ol>
            <li><a href="{{route('front_dashboard')}}">Home</a></li>
            <li><a href="{{route('berita_list')}}">Berita</a></li>
            <li>Detail Berita</li>
        </ol>
        <h1 style="color: #37517e">{{$berita->judul_berita}}</h1 style="color: #37517e">
        <small>{{\Carbon\Carbon::parse($berita->created_at)->translatedFormat('l, d F Y')}} | {{\Carbon\Carbon::parse($berita->created_at)->translatedFormat('H:i')}} WIB</small>
    </div>
</section><!-- End Breadcrumbs -->

<section class="inner-page">
    <div class="container">
        {!! $berita->konten_berita !!}
    </div>
</section>

@endsection
