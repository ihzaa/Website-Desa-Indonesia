@extends('Admin.Template.all')

@section('page_title','Arsip Keuangan Desa')

@section('breadcumb')
<li class="breadcrumb-item"><a href="{{route('admin_dashboard')}}">Home</a></li>
<li class="breadcrumb-item active">Arsip Keuangan</li>
@endsection

@section('css_before')
<link rel="stylesheet" href="{{asset('Admin/plugins/tempusdominus/tempusdominus.min.css')}}">
<link rel="stylesheet" href="{{asset('Admin/plugins/bootstrap-toggle/bootstrap-toggle.min.css')}}">
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <h3 class="card-title m-2">Daftar arsip keuangan berdasarkan tahun</h3>
            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#createModal"><i
                    class="fas fa-plus"></i>&nbsp;Tambah Data Tahun</button>

        </div>

    </div>
    <div class="card-body">

        @if (session('success'))
        <div class="alert alert-success mt-2">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ session('success') }}
        </div>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <table id="dfUsageTable" class="table table-bordered table-striped" data-form="deleteForm">
            <thead>
                <tr>
                    <th width="5%">#</th>
                    <th width="5%">Tahun</th>
                    <th width="10%">Jumlah Pos Belanja</th>
                    <th width="10%">Jumlah Bidang</th>
                    <th width="10%">Total Pendapatan</th>
                    <th style="width: 20%;">Action</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </div>
</div>

<!--Modal delete data-->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Tahun</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formCreate" action="{{route('admin_transparansi_store')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="tahun">Tahun</label>
                        <div class="input-group date" data-target-input="nearest">
                            <input type="text" name="tahun" id="tahun" class="form-control datetimepicker-input"
                                data-target="#tahun" data-toggle="datetimepicker" required autocomplete="off" />
                            <div class="input-group-append" data-target="#tahun" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Buat Data</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!--Modal delete data-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formDelete" action="/dasidjas" method="post">
                @method('delete')
                @csrf
                <div class="modal-body">
                    <p>Anda yakin ingin menghapus konten berita tersebut ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js_after')
<script src="{{asset('Admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('Admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('Admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('Admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('Admin/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('Admin/plugins/tempusdominus/tempusdominus.min.js')}}"></script>
<script src="{{asset('Admin/plugins/bootstrap-toggle/bootstrap-toggle.min.js')}}"></script>
<script>
    $(function () {
        $("#dfUsageTable").DataTable({
            "responsive": true,
            "autoWidth": false
        });



        $(".deleteModal").click(function (e) {
            let id = $(this).attr("id")
            $('#formDelete').attr('action', '/4dm1n/transparansi/' + id)
        });

        window.setTimeout(function () {
            $(".alert").fadeTo(500, 0).slideUp(500, function () {
                $(this).remove();
            });
        }, 2000);

        $('#tahun').datetimepicker({
            format: 'YYYY'
        });
    });
</script>
@endsection
