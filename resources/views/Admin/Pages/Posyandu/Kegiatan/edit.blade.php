@extends('Admin.Template.all')

@section('page_title','Tambah Kegiatan')

@section('breadcumb')
<li class="breadcrumb-item">Home</li>
<li class="breadcrumb-item" aria-current="page">
    <a class="link-fx" href="{{route('posyandu.index')}}">Daftar Posyandu</a>
</li>
<li class="breadcrumb-item" aria-current="page">
    <a class="link-fx" href="{{route('posyandu.edit',['posyandu'=>$posyandu->id])}}">{{$posyandu->nama_posyandu}}</a>
</li>
<li class="breadcrumb-item">Edit Kegiatan {{$kegiatan->judul_kegiatan}}</li>
@endsection

@section('css_before')
<link rel="stylesheet" href="{{asset('Admin/plugins/summernote/summernote-bs4.css')}}">
@endsection


@section('content')

@if (session('status'))
<div class="alert alert-warning">
    {{ session('status') }}
</div>
@endif
@error('thumbnail')
<div class="alert alert-danger">Gagal membuat data baru, thumbnail kegiatan maximum 2MB</div>
@enderror

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">
                        Halaman Editor Kegiatan {{$kegiatan->judul_kegiatan}}
                    </h3>
                </div>
                <!-- /.card-header -->
                <form action="{{route('kegiatan_posyandu_update',['id_keg'=>$kegiatan->id])}}" method="POST" enctype="multipart/form-data">
                    @method('POST')
                    @csrf
                    <div class="card-body pad">
                        <div class="form-group">
                            <label for="judul">Judul Kegiatan</label>
                            <input id="judul" type="text" name="judul_kegiatan" class="form-control" placeholder="Masukkan judul kegiatan posyandu" value="{{$kegiatan->judul_kegiatan}}" required>
                        </div>
                        <div class="form-group">
                            <label>Thumbnail Kegiatan</label>
                            <img src="{{$kegiatan->path_logo}}" style="max-width: 200px; max-width: 200px;" alt="User Image">
                        </div>
                        <div class="form-group">
                            <label>Update Thumbnail Kegiatan</label>
                            <input type="file" accept="image/jpeg,image/png" name="thumbnail" class="form-control">
                            <ul>
                                <li><small>File yang diterima : .jpeg / .jpg / .png</small></li>
                                <li><small>Ukuran gambar maksimal 2mb</small></li>
                            </ul>
                        </div>
                        <div class="form-group">
                            <label for="konten">Konten Kegiatan</label>
                            <textarea id="konten" name="kegiatan" class="textarea mb-3" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required>
                                {{$kegiatan->kegiatan}}
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_kegiatan">Tanggal Kegiatan</label>
                            <input type="date" id="tanggal_kegiatan" name="tanggal_kegiatan" class="form-control" value="{{$kegiatan->tanggal_kegiatan}}" required>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-end">
                            <a href="{{route('posyandu.edit',['posyandu'=>$posyandu->id])}}" class="btn btn-light mr-3">Kembali</a>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>&nbsp;
                                Perbarui</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.col-->
    </div>
    <!-- ./row -->
</section>
<!-- /.content -->

@endsection

@section('js_after')
<script src="{{asset('Admin/plugins/summernote/summernote-bs4.min.js')}}"></script>
<script>
    $(function() {
        // Summernote
        $('.textarea').summernote({
            placeholder: 'Tulis Konten Disini',
            height: 500
        })
    })
</script>
@endsection