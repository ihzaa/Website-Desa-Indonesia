@extends('Admin.Template.all')

@section('page_title','Surat Permohonan')

@section('css_before')
<link rel="stylesheet" href="{{asset('Admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('Admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('Admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('Admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
@endsection

@section('breadcumb')
<li class="breadcrumb-item"><a href="{{route('admin_dashboard')}}">Dashboard</a></li>
<li class="breadcrumb-item">Template Surat</li>
@endsection

@section('content')
<div class="card">
    <div class="card-header d-flex align-items-center">
        <h3 class="card-title">Daftar Template Surat</h3>
        <button class="btn btn-sm btn-primary ml-auto" id="btn_tambah"><i class="fas fa-plus"></i> Tambah</button>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="tabel_surat" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Dibuat</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data['surat'] as $d)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$d->nama}}</td>
                    <td>{{\Carbon\Carbon::parse($d->created_at)->format('d-m-Y')}}</td>
                    <td class="text-center"><button class="btn btn-sm btn-danger btn_hapus" data-id="{{$d->id}}"
                            data-nama="{{$d->nama}}"><i class="fas fa-trash"></i></button>
                        <button class="btn btn-sm btn-info btn_edit" data-id="{{$d->id}}" data-nama="{{$d->nama}}"><i
                                class="fas fa-pen"></i></button>
                        <a class="btn btn-sm btn-success"
                            href="{{route('admin_template_surat_download',['id'=>$d->id])}}" target="_blank"><i
                                class="fas fa-download"></i></a></td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Dibuat</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
<div id="modal_tambah" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Tambah Template Surat</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" id="form_modal" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama Surat</label>
                        <input name="nama" type="text" class="form-control @error('nama') is-invalid @enderror"
                            id="nama" placeholder="Nama Surat" required value="{{old('nama')}}">
                        @error('nama')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="file">File template (format doc atau docx)</label>
                        <input type="file" class="form-control-file @error('file') is-invalid @enderror" id="file"
                            name="file">
                        <small class="text-danger" id="info_file">Kosongkan file jika tidak ingin merubah</small>
                        @error('file')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js_after')

<!-- DataTables -->
<script src="{{asset('Admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('Admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('Admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('Admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('Admin/plugins/sweetalert2/sweetalert2.all.min.js')}}"></script>

<script>
    const url = {del : "{{route('admin_template_surat_hapus',['id'=>'aww'])}}",
    tbh : "{{route('admin_template_surat_tambah')}}",
    edt : "{{route('admin_template_surat_edit',['id'=>'aww'])}}"}
</script>
<script src="{{asset('Admin/dist/js/pages/template_surat.js')}}"></script>

@if ($errors->any())
<script>
    $('#modal_tambah').modal('show');
</script>
@endif
@if(Session::get('icon'))
<script>
    Swal.fire({
            icon: "{{Session::get('icon')}}",
            title: "{{Session::get('title')}}",
            text: "{{Session::get('message')}}",
        });
</script>
@endif
@endsection
