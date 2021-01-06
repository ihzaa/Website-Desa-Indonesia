@extends('Admin.Template.all')

@section('page_title','Kelola Arsip Keuangan Tahun '.$tahun->tahun)

@section('breadcumb')
<li class="breadcrumb-item"><a href="{{route('admin_dashboard')}}">Home</a></li>
<li class="breadcrumb-item"><a href="{{route('admin_arsip_keuangan_index')}}">Tahun Arsip Keuangan</a></li>
<li class="breadcrumb-item active">Kelola Arsip Keuangan</li>
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
@if (session('failed'))
<div class="alert alert-danger mt-2">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    {{ session('failed') }}
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
    <button class="btn btn-info mb-3" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
        <i class="fas fa-receipt"></i> &nbsp;Lihat Rekap Keuangan
    </button>
    <div class="collapse" id="collapseExample">
        <div class="row">
            <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        Rekapitulasi Data Keuangan Tahun {{$tahun->tahun}}
                    </div>
                </div>
                <div class="card-body">
                        <div class="callout callout-info">
                            <h5>Cash On Hand Tahun</h5>
                            <h3><strong>Rp{{number_format($tahun->cash_on_hand, 0, '', '.')}}</strong></h3>
                        </div>
                        <div class="card">
                            <div class="card-header bg-info">
                                <h3 class="card-title">Visualisasi Data Sisa Uang Per Bidang</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                               <div class="row">
                                   @foreach($bidang as $data)
                                    <div class="col-6 mb-2">
                                        <p><strong><code>{{$data->nama_bidang}}</code></strong></p>

                                        <div class="progress">
                                            <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" role="progressbar"
                                                style="width: {{$data->cash_on_hand/$data->uang_bagian*100}}%">
                                                <span class="sr-only">40% Complete (success)</span>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 

    <div class="col-12">
        <div class="card card-outline card-green">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h3 class="card-title m-2">Kelola data pendapatan </h3>
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
                            <th style="width: 200px;">Nama Pendapatan</th>
                            <th style="width: 200px;">Nominal</th>
                            <th style="width: 200px;">Tanggal Pendapatan</th>
                            <th style="width: 200px;">Terakhir Diubah</th>
                            <th style="width: 150px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pendapatan as $data)
                            <tr>
                                <td>{{$data->id}}</td>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$data->nama_pendapatan}}</td>
                                <td>Rp{{number_format($data->nominal,0,',','.')}}</td>
                                <td>{{\Carbon\Carbon::parse($data->tgl_pendapatan)->format('d/m/Y')}}</td>
                                <td>{{\Carbon\Carbon::parse($data->updated_at)->diffForHumans()}}</td>
                                <td>
                                    <button class="btn btn-sm btn-warning editPendapatan"><i class="fas fa-edit"></i>Ubah Data</button>
                                    <button class="btn btn-sm btn-danger deletePendapatan"><i class="fas fa-trash"></i> Hapus Data</button>
                                </td>
                            </tr>
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
                    <h3 class="card-title m-2">Kelola data bidang </h3>
                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#createModalBidang"><i
                            class="fas fa-plus"></i>&nbsp; Tambah Data</button>

                </div>

            </div>
            <div class="card-body">
                <table id="dfBidangTable" class="table table-bordered table-striped" data-form="deleteForm">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th width="6%">#</th>
                            <th style="width: 200px;">Nama Bidang</th>
                            <th style="width: 200px;">Uang Bagian</th>
                            <th style="width: 200px;">Cash On Hand</th>
                            <th style="width: 200px;">Terakhir Diubah</th>
                            <th style="width: 150px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bidang as $data)
                            <tr>
                                <td>{{$data->id}}</td>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$data->nama_bidang}}</td>
                                <td>Rp{{number_format($data->uang_bagian,0,',','.')}}</td>
                                <td>Rp{{number_format($data->cash_on_hand,0,',','.')}}</td>
                                <td>{{\Carbon\Carbon::parse($data->updated_at)->diffForHumans()}}</td>
                                <td>
                                    <a href="{{route('admin_arsip_keuangan_kelola_rincian_index', [$idTahun, $data->id])}}" class="btn btn-sm btn-primary"><i class="fas fa-shopping-cart"></i> &nbsp;Kelola Belanja</a>
                                    <button class="btn btn-sm btn-warning editBidang"><i class="fas fa-edit"></i>Ubah Data</button>
                                    <button class="btn btn-sm btn-danger deleteBidang"><i class="fas fa-trash"></i> Hapus Data</button>
                                </td>
                            </tr>
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
                    <h3 class="card-title m-2">Kelola data pos </h3>
                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#createModalPos"><i
                            class="fas fa-plus"></i>&nbsp; Tambah Data</button>

                </div>

            </div>
            <div class="card-body">

                <table id="dfPosTable" class="table table-bordered table-striped" data-form="deleteForm">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th width="6%">#</th>
                            <th style="width: 200px;">Nama Pos</th>
                            <th style="width: 200px;">Terakhir Diubah</th>
                            <th style="width: 150px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pos as $data)
                            <tr>
                                <td>{{$data->id}}</td>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$data->nama_pos}}</td>
                                <td>{{\Carbon\Carbon::parse($data->updated_at)->diffForHumans()}}</td>
                                <td>
                                    <button class="btn btn-sm btn-warning editPos"><i class="fas fa-edit"></i>Ubah Data</button>
                                    <button class="btn btn-sm btn-danger deletePos"><i class="fas fa-trash"></i> Hapus Data</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- MODAL PENDAPATAN -->
@include('Admin.Pages.ArsipKeuangan.KelolaArsip.components.modalPendapatan')
<!-- MODAL PENDAPATAN -->

<!-- MODAL PEMBIAYAAN -->
@include('Admin.Pages.ArsipKeuangan.KelolaArsip.components.modalPos')
<!-- MODAL PEMBIAYAAN -->

<!-- MODAL BELANJA -->
@include('Admin.Pages.ArsipKeuangan.KelolaArsip.components.modalBidang')
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
            var nominal = data[3].replace("Rp", "").replaceAll('.','');
            var date = data[4];
            var newdate = date.split("/").reverse().join("-");
            $('#nama_pendapatan_modal').val(data[2]);
            $('#nominal_pendapatan_modal').val(nominal);
            $('#tgl_pendapatan_modal').val(newdate);

            $('#formEditPendapatan').attr('action', '/4dm1n/arsip-keuangan/' + {{$idTahun}} + '/kelola/pendapatan/' + data[0]);
            $('#editModalPendapatan').modal('show');
        });

        var bidang = $("#dfBidangTable").DataTable({
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

        bidang.on('click', '.editBidang', function () {
            $tr = $(this).closest('tr');
            if ($($tr).hasClass('child')) {
                $tr = $tr.prev('.parent');
            }
            var data = bidang.row($tr).data();
            var uang_bagian = data[3].replace("Rp", "").replaceAll('.','');
            $('#nama_bidang_modal').val(data[2])
            $('#uang_bidang_modal').val(uang_bagian)
            $('#formEditBidang').attr('action', '/4dm1n/arsip-keuangan/' + {{$idTahun}} + '/kelola/bidang/' + data[0]);
            $('#editModalBidang').modal('show');
        });



        var pos = $("#dfPosTable").DataTable({
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

        pos.on('click', '.editPos', function () {
            $tr = $(this).closest('tr');
            if ($($tr).hasClass('child')) {
                $tr = $tr.prev('.parent');
            }

            var data = pos.row($tr).data();
            $('#nama_pos_modal').val(data[2]);

            $('#formEditPos').attr('action', '/4dm1n/arsip-keuangan/' + {{$idTahun}} + '/kelola/pos/' + data[0]);
            $('#editModalPos').modal('show');
        });

        $(document).on("click", ".deletePendapatan", function () {
            $tr = $(this).closest('tr');
            if ($($tr).hasClass('child')) {
                $tr = $tr.prev('.parent');
            }

            var data = pendapatan.row($tr).data();
            $('#formDeletePendapatan').attr('action', '/4dm1n/arsip-keuangan/'+{{$idTahun}}+'/kelola/pendapatan/'+data[0]);
            $('#deleteModalPendapatan').modal('show');
        });

        $(document).on("click", ".deleteBidang", function () {
            $tr = $(this).closest('tr');
            if ($($tr).hasClass('child')) {
                $tr = $tr.prev('.parent');
            }

            var data = bidang.row($tr).data();
            $('#formDeleteBidang').attr('action', '/4dm1n/arsip-keuangan/'+{{$idTahun}}+'/kelola/bidang/'+data[0]);
            $('#deleteModalBidang').modal('show');
        });

        $(document).on("click", ".deletePos", function () {
            $tr = $(this).closest('tr');
            if ($($tr).hasClass('child')) {
                $tr = $tr.prev('.parent');
            }

            var data = pos.row($tr).data();
            $('#formDeletePos').attr('action', '/4dm1n/arsip-keuangan/'+{{$idTahun}}+'/kelola/pos/'+data[0]);
            $('#deleteModalPos').modal('show');
        });

        window.setTimeout(function () {
            $(".alert").fadeTo(500, 0).slideUp(500, function () {
                $(this).remove();
            });
        }, 5000);

        $('#tahun').datetimepicker({
            format: 'YYYY'
        });
    });
</script>

@endsection
