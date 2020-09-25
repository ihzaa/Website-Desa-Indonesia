@extends('Admin.Template.all')

@section('page_title','Kelola Transparansi')

@section('breadcumb')
<li class="breadcrumb-item"><a href="{{route('admin_dashboard')}}">Home</a></li>
<li class="breadcrumb-item"><a href="{{route('admin_transparansi_index')}}">Transparansi</a></li>
<li class="breadcrumb-item active">Kelola Transparansi</li>
@endsection

@section('css_before')
<link rel="stylesheet" href="{{asset('Admin/plugins/tempusdominus/tempusdominus.min.css')}}">
@endsection

@section('content')

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


<div class="card card-primary float-right">
    <div class="card-header">
        <h3 class="card-title">Ubah data</h3>

        <!-- tools box -->
        <div class="card-tools">
            <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                title="Collapse">
                <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip"
                title="Remove">
                <i class="fas fa-times"></i></button>
        </div>
        <!-- /. tools -->

    </div>
    <form action="{{route('admin_transparansi_update', $transparansi[0]->id)}}" method="POST">
        @csrf
        @method('put')
        <div class="card-body">
            <div class="form-group">
                <label for="">Tahun</label>
                <input type="number" name="tahun" class="form-control" value="{{$transparansi[0]->tahun}}">
            </div>

        </div>
        <div class="card-footer">
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Ubah sekarang</button>
            </div>
        </div>
    </form>
</div>

<div class="row">
    <div class="col-12">
        <div class="card card-outline card-green">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h3 class="card-title m-2">Kelola data pendapatan desa tahun {{$transparansi[0]->tahun}}</h3>
                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#createModalPendapatan"><i
                            class="fas fa-plus"></i>&nbsp; Tambah Data</button>
                </div>

            </div>
            <div class="card-body">

                <table id="dfPendapatanTable" class="table table-bordered table-striped" data-form="deleteForm">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th width="6%">#</th>
                            <th style="width: 200px;">Jenis Pendapatan</th>
                            <th style="width: 200px;">Nominal Pendapatan</th>
                            <th style="width: 150px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($transparansi as $data)
                        @foreach($data->pendapatandesa->jenispendapatan as $datas)
                        <tr class="data-row">
                            <td>{{$datas->id}}</td>
                            <td>{{$loop->iteration}}</td>
                            <td class="jenis_pendapatan">{{$datas->jenis_pendapatan}}</td>
                            <td class="nominal_pendapatan">Rp. {{number_format($datas->nominal_pendapatan,0,'','.')}}</td>
                            <td>
                                <button class="btn btn-warning editPendapatan" data-value="{{$datas->id}}">Edit</button>
                                <button class="btn btn-danger deleteModalPendapatan" data-toggle="modal"
                                    data-target="#deleteModalPendapatan" id="{{$datas->id}}">Delete</button>
                            </td>
                        </tr>
                        @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card card-outline card-yellow">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h3 class="card-title m-2">Kelola data pembiayaan desa tahun {{$transparansi[0]->tahun}}</h3>
                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#createModalPembiayaan"><i
                            class="fas fa-plus"></i>&nbsp; Tambah Data</button>

                </div>

            </div>
            <div class="card-body">
                <table id="dfPembiayaanTable" class="table table-bordered table-striped" data-form="deleteForm">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th width="6%">#</th>
                            <th style="width: 200px;">Jenis Pembiayaan</th>
                            <th style="width: 200px;">Nominal Pembiayaan</th>
                            <th style="width: 150px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transparansi as $data)
                        @foreach($data->pembiayaandesa->jenispembiayaan as $datas)
                        <tr class="data-row">
                            <td>{{$datas->id}}</td>
                            <td>{{$loop->iteration}}</td>
                            <td class="jenis_pembiayaan">{{$datas->jenis_pembiayaan}}</td>
                            <td class="nominal_pembiayaan">Rp. {{number_format($datas->nominal_pembiayaan,0,'','.')}}</td>
                            <td>
                                <button class="btn btn-warning editPembiayaan" data-value="{{$datas->id}}">Edit</button>
                                <button class="btn btn-danger deleteModalPembiayaan" data-toggle="modal"
                                    data-target="#deleteModalPembiayaan" id="{{$datas->id}}">Delete</button>
                            </td>
                        </tr>
                        @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card card-outline card-red">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h3 class="card-title m-2">Kelola data belanja desa tahun {{$transparansi[0]->tahun}}</h3>
                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#createModalBelanja"><i
                            class="fas fa-plus"></i>&nbsp; Tambah Data</button>

                </div>

            </div>
            <div class="card-body">

                <table id="dfBelanjaTable" class="table table-bordered table-striped" data-form="deleteForm">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th width="6%">#</th>
                            <th style="width: 200px;">Jenis Belanja</th>
                            <th style="width: 200px;">Nominal Belanja</th>
                            <th style="width: 150px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transparansi as $data)
                        @foreach($data->belanjadesa->jenisbelanja as $datas)
                        <tr class="data-row">
                            <td>{{$datas->id}}</td>
                            <td>{{$loop->iteration}}</td>
                            <td class="jenis_belanja">{{$datas->jenis_belanja}}</td>
                            <td class="nominal_belanja">Rp. {{number_format($datas->nominal_belanja,0,'','.')}}</td>
                            <td>
                                <button class="btn btn-warning editBelanja" data-value="{{$datas->id}}">Edit</button>
                                <button class="btn btn-danger deleteModalBelanja" data-toggle="modal"
                                    data-target="#deleteModalBelanja" id="{{$datas->id}}">Delete</button>
                            </td>
                        </tr>
                        @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- MODAL PENDAPATAN -->
@include('Admin.Pages.Transparansi.Kelola.components.modalPendapatan')
<!-- MODAL PENDAPATAN -->

<!-- MODAL PEMBIAYAAN -->
@include('Admin.Pages.Transparansi.Kelola.components.modalPembiayaan')
<!-- MODAL PEMBIAYAAN -->

<!-- MODAL BELANJA -->
@include('Admin.Pages.Transparansi.Kelola.components.modalBelanja')
<!-- MODAL BELANJA -->

@endsection

@section('js_after')
<script src="{{asset('Admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('Admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('Admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('Admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('Admin/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('Admin/plugins/tempusdominus/tempusdominus.min.js')}}"></script>
<script>
    $(function () {
        var pendapatan = $("#dfPendapatanTable").DataTable({
            "responsive": true,
            "autoWidth": false,
            "columnDefs": [
                {
                    "targets": [0],
                    "visible": false,
                    "searchable": false
                },

            ]
        });

        pendapatan.on('click', '.editPendapatan', function () {
            $tr = $(this).closest('tr');
            if ($($tr).hasClass('child')) {
                $tr = $tr.prev('.parent');
            }

            var data = pendapatan.row($tr).data();
            var nominal = data[3].replace("Rp. ", "");

            $('#modal_jenis_pendapatan').val(data[2]);
            $('#modal_nominal_pendapatan').val(nominal);

            $('#editFormPendapatan').attr('action', data[0] + '/pendapatan/update');
            $('#editModalPendapatan').modal('show');
        });

        var pembiayaan = $("#dfPembiayaanTable").DataTable({
            "responsive": true,
            "autoWidth": false,
            "columnDefs": [
                {
                    "targets": [0],
                    "visible": false,
                    "searchable": false
                },

            ]
        });

        pembiayaan.on('click', '.editPembiayaan', function () {
            $tr = $(this).closest('tr');
            if ($($tr).hasClass('child')) {
                $tr = $tr.prev('.parent');
            }

            var data = pembiayaan.row($tr).data();
            var nominal = data[3].replace("Rp. ", "");

            $('#modal_jenis_pembiayaan').val(data[2]);
            $('#modal_nominal_pembiayaan').val(nominal);

            $('#editFormPembiayaan').attr('action', data[0] + '/pembiayaan/update');
            $('#editModalPembiayaan').modal('show');
        });

        var belanja = $("#dfBelanjaTable").DataTable({
            "responsive": true,
            "autoWidth": false,
            "columnDefs": [
                {
                    "targets": [0],
                    "visible": false,
                    "searchable": false
                },

            ]
        });

        belanja.on('click', '.editBelanja', function () {
            $tr = $(this).closest('tr');
            if ($($tr).hasClass('child')) {
                $tr = $tr.prev('.parent');
            }

            var data = belanja.row($tr).data();
            var nominal = data[3].replace("Rp. ", "");

            $('#modal_jenis_belanja').val(data[2]);
            $('#modal_nominal_belanja').val(nominal);

            $('#editFormBelanja').attr('action', data[0] + '/belanja/update');
            $('#editModalBelanja').modal('show');
        });

        $(document).on("click", ".deleteModalPendapatan", function () {
            $tr = $(this).closest('tr');
            if ($($tr).hasClass('child')) {
                $tr = $tr.prev('.parent');
            }

            var data = pendapatan.row($tr).data();
            $('#formDeletePendapatan').attr('action', data[0] + '/pendapatan/destroy');
            $('#deleteModalPendapatan').modal('show');
        });

        $(document).on("click", ".deleteModalPembiayaan", function () {
            $tr = $(this).closest('tr');
            if ($($tr).hasClass('child')) {
                $tr = $tr.prev('.parent');
            }

            var data = pembiayaan.row($tr).data();
            $('#formDeletePembiayaan').attr('action', data[0] + '/pembiayaan/destroy');
            $('#deleteModalPembiayaan').modal('show');
        });

        $(document).on("click", ".deleteModalBelanja", function () {
            $tr = $(this).closest('tr');
            if ($($tr).hasClass('child')) {
                $tr = $tr.prev('.parent');
            }

            var data = belanja.row($tr).data();
            $('#formDeleteBelanja').attr('action', data[0] + '/belanja/destroy');
            $('#deleteModalBelanja').modal('show');
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
