@extends('Admin.Template.all')

@section('page_title','Tambah Berita')

@section('breadcumb')
<li class="breadcrumb-item"><a href="{{route('admin_dashboard')}}">Home</a></li>
<li class="breadcrumb-item"><a href="{{route('admin_berita_index')}}">Berita</a></li>
<li class="breadcrumb-item active">Tambah Berita</a></li>
@endsection

@section('css_before')
<link rel="stylesheet" href="{{asset('Admin/plugins/summernote/summernote-bs4.css')}}">
@endsection


@section('content')

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">
                        Halaman Editor Web Desa
                    </h3>
                    <!-- tools box -->
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse"
                            data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove"
                            data-toggle="tooltip" title="Remove">
                            <i class="fas fa-times"></i></button>
                    </div>
                    <!-- /. tools -->
                </div>
                <!-- /.card-header -->
                <form action="{{route('admin_berita_store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body pad">
                        <div class="form-group">
                            <label for="judul_berita">Judul Berita</label><small> (harus diisi)</small>
                            <div id="validationjudul"></div>
                            <input type="text" name="judul_berita" class="form-control" id="judul_berita"
                                placeholder="Masukkan judul berita" required>
                            <small>Buat judul dengan maksimal 100 karakter untuk maksimalkan tampilan</small>
                        </div>
                        <div class="form-group">
                            <label for="thumbnail_berita">Thumbnail Berita</label><small> (harus diisi)</small>
                            <div id="validationthumbnail"></div>
                            <input type="file" id="thumbnail_berita" accept="image/jpeg,image/png" name="thumbnail_berita"
                                class="form-control" required>
                            <ul>
                                <li>
                                    <small>File yang diterima : .jpeg / .jpg / .png</small>
                                </li>
                                <li>
                                    <small>Ukuran gambar maksimal 2mb</small>
                                </li>
                                <li>
                                    <small>Gambar yang disarankan memiliki ukuran 2:3 (150px * 250px)</small>
                                </li>
                            </ul>
                        </div>
                        <div class="form-group">
                            <label for="konten_berita">Konten Berita</label><small> (harus diisi)</small>
                            <div id="validationberita"></div>
                            <textarea id="konten_berita" name="konten_berita" class="textarea mb-3"
                                placeholder="Place some text here"
                                style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                                required data-msg="Please write something"></textarea>
                        </div>


                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-end">
                            <a href="{{route('admin_berita_index')}}" class="btn btn-light mr-3">Kembali</a>
                            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i>&nbsp;
                                Simpan</button>
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
    $(function () {
        // Summernote
        $('.textarea').summernote({
            placeholder: 'Tulis Konten Disini',
            height: 500
        })
    })

    $('.btn').on('click', function(){
        if ($('.textarea').summernote('isEmpty')) {
            $('#validationberita').text('Anda belum mengisikan konten, silakan isi terlebih dahulu').css({'color' : 'red', 'margin-bottom' : '5px', 'font-size' : '10pt', 'font-style' : 'italic'});
        }
        if ($('#judul_berita').val().length == 0){
            $('#validationjudul').text('Anda belum mengisikan judul, silakan isi terlebih dahulu').css({'color' : 'red', 'margin-bottom' : '5px', 'font-size' : '10pt', 'font-style' : 'italic'});
        }

        if ($('#thumbnail_berita').val().length == 0){
            $('#validationthumbnail').text('Anda belum unggah thumbnail, silakan isi terlebih dahulu').css({'color' : 'red', 'margin-bottom' : '5px', 'font-size' : '10pt', 'font-style' : 'italic'});
        }

    })

</script>
@endsection
