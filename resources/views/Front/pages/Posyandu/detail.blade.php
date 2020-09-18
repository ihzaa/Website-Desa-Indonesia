@extends('Front.master')
@section('header', 'header-inner-pages')

@section('css_after')
<link rel="stylesheet" href="{{asset('Admin/plugins/summernote/summernote-bs4.css')}}">
@endsection

@section('main')
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <br>
    <div class="container">
        <ol>
            <li><a href="{{route('front_dashboard')}}">Home</a></li>
            <li><a href="{{route('front_posyandu_index',['id'=>$kegiatan->posyandu->id])}}">Posyandu {{$kegiatan->posyandu->nama_posyandu}}</a></li>
            <li>Detail Kegiatan</li>
        </ol>
        <h1 style="color: #37517e">{{$kegiatan->judul_kegiatan}}</h1 style="color: #37517e">
        <small>Tanggal Kegiatan {{$kegiatan->date_kegiatan}}</small><br>
        <small>Tanggal post: {{$kegiatan->date_format}}</small>
    </div>
    <div class="row">
        <div class="col-md-10">

        </div>
        <div class="col-md-2">

        </div>
    </div>
</section><!-- End Breadcrumbs -->

<section class="inner-page">
    <div class="container">
    {!! $kegiatan->kegiatan !!}
    </div>
</section>

@endsection

@section('js_after')
<script src="{{asset('Admin/plugins/summernote/summernote-bs4.min.js')}}"></script>
<script>
$(document).ready(function(){
    $("img").addClass("img-responsive");
    $("img").css("max-width", "100%");
});
</script>
@endsection