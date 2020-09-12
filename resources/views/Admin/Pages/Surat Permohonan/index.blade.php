@extends('Admin.Template.all')

@section('page_title','Surat Permohonan')

@section('css_before')
<link rel="stylesheet" href="{{asset('Admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('Admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('Admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
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
@endsection

@section('js_after')

<!-- DataTables -->
<script src="{{asset('Admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('Admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('Admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('Admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('Admin/plugins/sweetalert2/sweetalert2.min.js')}}"></script>

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
                sampel : "{{route('admin_surat_permohonan_sampel',['id'=>'_id'])}}"
                }
</script>
<script src="{{asset('Admin/dist/js/pages/surat_permohonan_index.js')}}" id="js_main"></script>
@endsection
