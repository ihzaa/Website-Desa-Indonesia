@extends('Admin.Template.all')

@section('page_title','Edit Daftar Posyandu')

@section('css_before')
<link rel="stylesheet" href="{{asset('Admin/plugins/datatables-select/css/select.bootstrap4.min.css')}}">
@endsection

@section('breadcumb')
<li class="breadcrumb-item">Home</li>
<li class="breadcrumb-item" aria-current="page">
    <a class="link-fx" href="{{route('posyandu.index')}}">Daftar Posyandu</a>
</li>
<li class="breadcrumb-item">{{$posyandu->nama_posyandu}}</li>
@endsection


@section('content')

@if (session('status'))
<div class="alert alert-warning">
    {{ session('status') }}
</div>
@endif
@error('logo_posyandu')
<div class="alert alert-danger">Gagal membuat data baru, logo maximum posyandu 2MB</div>
@enderror

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Daftar Penduduk Terdaftar di Posyandu {{$posyandu->nama_posyandu}}</h3>
        <div class="card-tools">
            <button type="button" data-toggle="modal" data-target="#modal-add-penduduk" class="hapus-modal btn btn-primary">
                <i class="fas fa-user"></i> Tambah Penduduk
            </button>
        </div>
    </div>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Penduduk</th>
                    <th>Tanggal Lahir</th>
                    <th>Umur (Tahun)</th>
                    <th>SHDRT</th>
                    <th>Gol. Darah</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($penduduks as $p)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$p->nama}}</td>
                    <td>{{$p->tgl_lahir}}</td>
                    <td>{{$p->umur}}</td>
                    <td>{{$p->shdrt}}</td>
                    <td>{{$p->gol_darah}}</td>
                    <td>
                        <button type="button" data-toggle="modal" data-target="#modal-delete" data-id="{{$p->id}}" class="hapus-modal btn btn-danger hapus-penduduk" data-nama="{{$p->nama}}">
                            <i class="fas fa-ban"></i> Hapus
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Kegiatan di Posyandu {{$posyandu->nama_posyandu}}</h3>
        <div class="card-tools">
            <a href="{{route('kegiatan_posyandu.detail',['posyandu'=>$posyandu->id])}}" class="btn btn-block btn-success">
                <i class="fas fa-plus-square"></i> Tambah Kegiatan
            </a>
        </div>
    </div>
    <div class="card-body">
        <table id="kegiatan_posyandu" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Kegiatan</th>
                    <th>Tanggal Kegiatan</th>
                    <th>Tanggal Dibuat</th>
                    <th style="width: 20%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posyandu->kegiatans as $p)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$p->judul_kegiatan}}</td>
                    <td>{{$p->tanggal_kegiatan}}</td>
                    <td>{{$p->created_at}}</td>
                    <td>
                        <a class="btn btn-block btn-info" href="{{route('kegiatan_posyandu.edit',['id_keg'=>$p->id,'id_pos'=>$posyandu->id])}}">
                            <i class="fas fa-edit"></i> Edit Kegiatan
                        </a>
                        <a class="btn btn-block btn-danger" href="{{route('posyandu.index')}}">
                            <i class="fas fa-ban"></i> Hapus Kegiatan
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Update Data Posyandu</h3>
    </div>
    <div class="card-body">
        <div class="box box-primary">
            <!-- form start -->
            <form role="form" method="POST" action="{{route('posyandu.update',['posyandu'=>$posyandu->id])}}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label>Nama Posyandu</label>
                        <input type="text" class="form-control" name="nama_posyandu" value="{{$posyandu->nama_posyandu}}" required>
                    </div>
                    <div class="form-group">
                        <label>Logo Posyandu</label><br>
                        <img src="{{$posyandu->path_logo}}" style="max-width: 200px; max-width: 200px;" alt="User Image">
                    </div>
                    <div class="form-group">
                        <label>Update Logo (Maximal 2MB)</label>
                        <input type="file" class="form-control" accept=".jpg, .png, .jpeg |image/*" name="logo_posyandu">
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary float-right"> <i class="fas fa-save"></i> Perbarui</button>
                </div>
            </form>
            <button type="button" data-toggle="modal" data-nama="{{$posyandu->nama_posyandu}}" data-target="#modal-default" class="hapus-modal btn btn-danger">
                <i class="fas fa-trash"></i> Hapus Data Posyandu
            </button>
        </div>
    </div>
</div>


<div class="modal fade" id="modal-delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus penduduk dari Posyandu</h4>
            </div>
            <form role="form" action="{{route('anggota_posyandu_delete')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    Anda yakin ingin menghapus penduduk dari posyandu {{$posyandu->nama_posyandu}} ?
                    <div class="form-group">
                        <input type="hidden" id="id-penduduk" name="id_penduduk">
                        <input type="hidden" name="id_posyandu" value="{{$posyandu->id}}">
                        <label>Nama Penduduk</label>
                        <input type="text" class="form-control" id="nama-penduduk" disabled>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus Posyandu</h4>
            </div>
            <form action="{{route('posyandu.destroy',['posyandu' => $posyandu->id])}}" method="POST">
                @method('DELETE')
                @csrf
                <div class="modal-body">
                    Anda yakin ingin menghapus keseluruhan data posyandu ?
                    <div class="form-group">
                        <label>Nama Posyandu</label>
                        <input type="text" class="form-control" id="nama_posyandu" disabled>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="modal-add-penduduk">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Penduduk</h4>
            </div>
            <div class="form-group py-3 px-3">
                <label>Cari Nama Penduduk</label>
                <div class="row">
                    <div class="col-md-10 px-2">
                        <input type="text" class="form-control" id="nama_penduduk" required>
                    </div>
                    <div class="col-md-2 px-2">
                        <button type="button" id="search-penduduk" class="btn btn-primary btn-block">Cari</button>
                    </div>
                </div>
            </div>
            <div id="notif_search" class="alert alert-warning text-dark font-weight-bold">
            </div>
            <div id="notif_success" hidden class="alert alert-success text-dark font-weight-bold">
                Berhasil submit penduduk ke posyandu
            </div>
            <div class="py-3 px-3">
                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nik</th>
                            <th>Nama Penduduk</th>
                            <th>Tanggal Lahir</th>
                            <th>Umur (Tahun)</th>
                            <th>Golongan Darah</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <div class="col-md-4 float-right">
                    <button type="button" id="submit-button" class="btn btn-success btn-block">Submit</button>
                </div>
                <div class="col-md-4">
                    <button type="button" class="btn btn-warning btn-block" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endsection


@section('js_after')
<!-- DataTables -->
<script src="{{asset('Admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('Admin/plugins/datatables-select/js/dataTables.select.min.js')}}"></script>
<script src="{{asset('Admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('Admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('Admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<!-- Custom JS -->
<script>
    $(function() {
        $('#example1').DataTable();
        $('#kegiatan_posyandu').DataTable();
        var notif_search = $('#notif_search');
        notif_search.attr("hidden", true);
        var table_penduduk = $('#example2').DataTable({
            select: {
                style: 'multi'
            }
        });

        $(document).on("click", ".hapus-modal", function() {
            let nama = $(this).data('nama');
            $("#nama_posyandu").val(nama);
        });

        $('#search-penduduk').on("click", function() {
            table_penduduk.rows().clear().draw();
            notif_search.attr("hidden", true);
            $.ajax({
                url: "{{route('query.penduduk.base')}}" + "/" + $('#nama_penduduk').val(),
                contentType: "application/json",
                dataType: 'json',
                success: function(result) {
                    let penduduks = result.penduduks;
                    if (penduduks.length > 0) {
                        penduduks.map(function(p) {
                            table_penduduk.row.add([p.id, p.nik, p.nama, p.tgl_lahir, p.umur, p.gol_darah]).draw();
                        });
                    } else {
                        notif_search.html("Data penduduk tidak ditemukan");
                        notif_search.removeAttr('hidden');
                    }
                }
            });
        })

        $('#submit-button').on("click", function() {
            notif_search.attr("hidden", true);
            let datas = table_penduduk.rows({
                selected: true
            }).data();
            if (datas.length > 0) {
                var ids = [];
                for (let i = 0; i < datas.length; i++) {
                    console.log(datas[i]);
                    ids.push(datas[i][0]);
                }
                console.log(ids);
                $.ajax({
                    type: "POST",
                    url: "{{route('anggota_posyandu_store')}}",
                    data: {
                        'id_penduduk[]': ids,
                        "_token": "{{ csrf_token() }}",
                        "id_pos": "{{$posyandu->id}}"
                    },
                    success: function(result) {
                        $('#notif_success').removeAttr('hidden');
                        $('#submit-button').attr("hidden", true);
                        setTimeout(location.reload.bind(location), 1000);
                    }
                });
            } else {
                notif_search.html("Data penduduk belum dipilih");
                notif_search.removeAttr('hidden');
            }
        });

        $('#nama_penduduk').on('keypress', function(event) {
            if (event.which === 13) {
                $('#search-penduduk').click();
            }
        });

        $(document).on("click", ".hapus-penduduk", function() {
            let id = $(this).data('id');
            let nama = $(this).data('nama');
            $("#id-penduduk").val(id);
            $("#nama-penduduk").val(nama);
        });
    })
</script>
@endsection