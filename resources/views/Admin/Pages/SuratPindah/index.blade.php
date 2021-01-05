@extends('Admin.Template.all')

@section('page_title','Surat Permohonan')

@section('css_before')
<link rel="stylesheet" href="{{asset('Admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('Admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('Admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('Admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.4.1/css/buttons.dataTables.min.css">
@endsection

@section('breadcumb')
<li class="breadcrumb-item"><a href="{{route('admin_dashboard')}}">Dashboard</a></li>
<li class="breadcrumb-item">Surat Pengantar Pindah</li>
@endsection

@section('content')
<div class="card">
    <div class="card-header d-flex">
        <h3 class="card-title">Daftar Surat Pengantar Pindah</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="tabel_surat_pengantar" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Alamat Tujuan</th>
                    <th>Dibuat</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data['surat'] as $d)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$d->nik}}</td>
                    <td>{{$d->nama}}</td>
                    <td>@php
                        echo "RT. $d->rt RW. $d->rw, kelurahan $d->desa_kelurahan, kecamatan $d->kecamatan,
                        $d->kabupaten_kota, $d->provinsi"
                        @endphp</td>
                    <td>{{\Carbon\Carbon::parse($d->created_at)->format('d-m-Y')}}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Tujuan</th>
                    <th>Dibuat</th>
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
{{-- <script src="{{asset('Admin/plugins/sweetalert2/sweetalert2.min.js')}}"></script> --}}
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="{{asset('Admin/dist/js/pages/surat_pengantar_pindah.js')}}"></script>

@endsection
