@extends('Admin.Template.all')

@section('page_title','Posyandu')

@section('breadcumb')
<li class="breadcrumb-item">Home</li>
<li class="breadcrumb-item">Posyandu</li>
@endsection

@section('content')
<div class="card">
    @if (session('status'))
    <div class="alert alert-warning">
        {{ session('status') }}
    </div>
    @endif
    @error('logo_posyandu')
        <div class="alert alert-danger">Gagal membuat data baru, logo maximum posyandu 2MB</div>
    @enderror
    <div class="card-header">
        <h3 class="card-title">Daftar Posyandu</h3>
        <div class="card-tools">
            <button type="button" data-toggle="modal" data-target="#modal-default" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Data
            </button>
        </div>
    </div>
    <div class="card-body">

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">

                </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Logo</th>
                            <th>Nama Posyandu</th>
                            <th>Jumlah Penduduk Terdaftar</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posyandus as $posyandu)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>
                            <img src="{{asset($posyandu->path_logo)}}" style="max-width: 50px; max-width: 50px;" alt="User Image">
                            </td>
                            <td>{{$posyandu->nama_posyandu}}</td>
                            <td>{{$posyandu->jumlah_penduduk}}</td>
                            <td>
                                <a href="{{route('posyandu.edit',['posyandu'=>$posyandu->id])}}" class="btn btn-primary">
                                    <i class="fas fa-edit"></i> edit
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Posyandu</h4>
            </div>
            <form action="{{route('posyandu.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    Form Tambah Data Posyandu
                    <div class="form-group">
                        <label>Nama Posyandu</label>
                        <input type="text" class="form-control" name="nama_posyandu" required>
                    </div>
                    <div class="form-group">
                        <label>Logo Posyandu (Maximal 2MB)</label>
                        <input type="file" class="form-control" 
                        accept=".jpg, .png, .jpeg |image/*"
                        name="logo_posyandu" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
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
<script src="{{asset('Admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('Admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('Admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<!-- Custom JS -->
<script>
    $(function() {
        $('#example1').DataTable()
    })
</script>
@endsection