@extends('Admin.Template.all')

@section('page_title','Surat Permohonan')

@section('css_before')
<link rel="stylesheet" href="{{asset('Admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('Admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('Admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.4.1/css/buttons.dataTables.min.css">
@endsection

@section('breadcumb')
<li class="breadcrumb-item"><a href="{{route('admin_dashboard')}}">Dashboard</a></li>
<li class="breadcrumb-item" id="bread_1">Surat Permohonan</li>
@endsection

@section('content')
<div class="card">
    <div class="card-header d-flex">
        <h3 class="card-title">Daftar Surat Permohonan</h3>
        <a class="btn btn-sm btn-primary ml-auto" id="btn_tambah" href="{{route('admin_surat_permohonan_tambah')}}"><i
                class="fa fa-plus" aria-hidden="true"></i>Tambah
        </a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="tabel_surat" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Jenis Surat</th>
                    <th>Jumlah Dibuat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
                <tr>
                    <th>Jenis Surat</th>
                    <th>Jumlah Dibuat</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->

<div class="card card-outline card-success">
    <div class="card-header d-flex">
        <h3 class="card-title">Arsip Surat Yang Telah Diunduh Penduduk</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="tabel_arsip" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Jenis Surat</th>
                    <th>NIK</th>
                    <th>Penduduk</th>
                    <th>Download</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Jenis Surat</th>
                    <th>NIK</th>
                    <th>Penduduk</th>
                    <th>Download</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.card-body -->
    <div class="overlay dark" id="arsip_loading">
        <i class="fas fa-2x fa-sync-alt fa-spin"></i>
    </div>
</div>
@endsection

@section('js_after')

<!-- DataTables -->
<script src="{{asset('Admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('Admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('Admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('Admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('Admin/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="{{asset('Admin/dist/js/date.js')}}"></script>
<script src="{{asset('Front/js/html2pdf/html2pdf.bundle.min.js')}}"></script>

<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>

<script>
    window.alert = function () {};
    $('#main_loading').show();
    var url = {
                getAll : "{{route('admin_surat_permohonan_get_all')}}",
                halamanTambahR : "{{route('admin_surat_permohonan_tambah_response')}}",
                halamanTambah : "{{route('admin_surat_permohonan_tambah')}}",
                hapus : "{{route('admin_surat_permohonan_hapus',['id'=>'_id'])}}",
                editR : "{{route('admin_surat_permohonan_edit_response',['id'=>'_id'])}}",
                edit : "{{route('admin_surat_permohonan_edit',['id'=>'_id'])}}",
                sampel : "{{route('admin_surat_permohonan_sampel',['id'=>'_id'])}}",
                getArsip : "{{route('admin_surat_permohonan_get_all_arsip')}}",
                downloadArsip : "{{route('admin_surat_permohonan_download_arsip',['id'=>'_id'])}}",
                sampelNew : "{{route('admin_surat_permohonan_sampel_new',['id'=>'_id'])}}",
                }
</script>
<script src="{{asset('Admin/dist/js/pages/surat_permohonan_index.js')}}" id="js_main"></script>
@endsection
