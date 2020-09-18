@extends('Front.master')

@section('css_before')
<link rel="stylesheet" href="{{asset('Admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('Front/css/components/news.css')}}">
@endsection


@section('hero')
<section id="hero" class="d-flex align-items-center" style="height: 10%">
</section>
@endsection

@section('main')
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">
        <ol>
            <li><a href="{{route('front_dashboard')}}">Home</a></li>
            <li>Detail Posyandu</li>
        </ol>
        <h1 style="color: #37517e">Posyandu {{$posyandu->nama_posyandu}}</h1 style="color: #37517e">
        <p class="badge badge-info">Jumlah penduduk terdaftar: {{$posyandu->jumlah_penduduk}}</p>
        <p class="badge badge-success">Jumlah kegiatan: {{$posyandu->jumlah_kegiatan}}</p>
    </div>
</section><!-- End Breadcrumbs -->

<section class="team section-bg">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Penduduk Terdaftar Posyandu {{$posyandu->nama_posyandu}}</h2>
        </div>

        <div class="row">
        <div class="col-lg-12">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Penduduk</th>
                    <th>Umur (Tahun)</th>
                    <th>Gol. Darah</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posyandu->penduduks as $p)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$p->nama}}</td>
                    <td>{{$p->umur}}</td>
                    <td>{{$p->gol_darah}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
        </div>
    </div>
</section>

<section id="perangkatdesa" class="team section-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Daftar Kegiatan Posyandu</h2>
        </div>

        <div class="row">

            @foreach($posyandu->kegiatans as $k)
            <div class="news-card" style="width: 500px;">
                <a href="{{route('front_posyandu_detail',['id'=> $k->id])}}" class="news-card__card-link"></a>
                <img src="{{$k->path_logo}}" alt="" class="news-card__image">
                <div class="news-card__text-wrapper">
                    <h2 class="news-card__title">{{$k->judul_kegiatan}}</h2>
                    <p class="text-white font-weight-bold">{{$k->date_format}}</p>
                    <div class="news-card__details-wrapper">
                        <a href="{{route('front_posyandu_detail',['id'=> $k->id])}}" class="news-card__read-more">Detail <i class="fas fa-long-arrow-alt-right"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection


@section('js_after')
<!-- DataTables -->
<script src="{{asset('Admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('Admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('Admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('Admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<!-- Custom JS -->
<script>
    $(function() {
        $('#example1').DataTable({
            responsive: true
        });
    });
</script>
@endsection