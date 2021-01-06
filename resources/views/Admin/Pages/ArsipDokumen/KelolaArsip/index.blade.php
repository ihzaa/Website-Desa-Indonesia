@extends('Admin.Template.all')

@section('page_title', 'Arsip Dokumen Desa Tahun ' . $tahun)

@section('breadcumb')
    <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin_arsip_dokumen_index') }}">Tahun Arsip Dokumen</a></li>
    <li class="breadcrumb-item active">Kelola Arsip Dokumen</li>
@endsection

@section('css_before')
    <link rel="stylesheet" href="{{ asset('Admin/plugins/tempusdominus/tempusdominus.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Admin/plugins/bootstrap-toggle/bootstrap-toggle.min.css') }}">
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h3 class="card-title m-2">Daftar arsip dokumen desa tahun {{ $tahun }}</h3>
                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#createModal"><i
                        class="fas fa-plus"></i>&nbsp;Tambah Data Arsip</button>

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
                        <th>ID</th>
                        <th width="5%">#</th>
                        <th>Nama Arsip</th>
                        <th>Ketersediaan File</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($arsip as $data)
                        <tr>
                            <td>{{$data->id}}</td>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->nama_arsip }}</td>
                            <td>{!! $data->file != null
                                ? '<h5><label class="badge badge-primary">File tersedia</label></h5>
                                '
                                : '<label class="badge badge-primary">File tidak tersedia</label>' !!}</td>
                            <td>
                                <a href="{{ Storage::url('arsip/dokumen/') . $data->file }}" target="_blank"
                                    class="btn btn-primary"><i class="fas fa-book-reader"></i> Lihat File</a
                                    href="{{ storage_path('app/public/arsip/dokumen/') . $data->file }}" target="_blank">
                                <button class="btn btn-warning editModal"><i class="fas fa-edit"></i>Ubah Data</button>
                                <button data-toggle="modal" data-target="#deleteModal" data-id="{{ $data->id }}"
                                    class="btn btn-danger deleteModal" id="btn-delete"><i class="fas fa-trash"></i> Hapus
                                    Data</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!--Modal create data-->
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Arsip</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formCreate" action="{{ route('admin_arsip_dokumen_kelola_store', $id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama_arsip">Nama Arsip <span class="text-red">*</span></label>
                            <input type="text" name="nama_arsip" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="file_upload">Upload Arsip <span class="text-red">*</span></label>
                            <input type="file" id="file_upload" accept=".xlsx,.xls,.doc,.docx,.ppt,.pptx,.txt,.pdf"
                                name="file_upload" class="form-control" required>
                            <ul>
                                <li>
                                    <small>File yang diterima : .xlsx, .xls, .doc, .docx, .ppt, .pptx, .txt, .pdf</small>
                                </li>
                                <li>
                                    <small>Ukuran file maksimal 25mb</small>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Tambahkan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--Modal edit data-->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data Arsip</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formedit" action="/" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama_arsip">Nama Arsip <span class="text-red">*</span></label>
                            <input type="text" name="nama_arsip" id="nama_arsip" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="file_upload">Upload Arsip <small>(kosongkan jika tidak ada perubahan)</small></label>
                            <input type="file" id="file_upload" accept=".xlsx,.xls,.doc,.docx,.ppt,.pptx,.txt,.pdf"
                                name="file_upload" class="form-control">
                            <ul>
                                <li>
                                    <small>File yang diterima : .xlsx, .xls, .doc, .docx, .ppt, .pptx, .txt, .pdf</small>
                                </li>
                                <li>
                                    <small>Ukuran file maksimal 25mb</small>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Tambahkan Data</button>
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
                <form id="formDelete" action="/" method="post">
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
    <script src="{{ asset('Admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('Admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('Admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('Admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('Admin/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('Admin/plugins/tempusdominus/tempusdominus.min.js') }}"></script>
    <script src="{{ asset('Admin/plugins/bootstrap-toggle/bootstrap-toggle.min.js') }}"></script>
    <script>
        $(function() {
            var table = $("#dfUsageTable").DataTable({
                "responsive": true,
                "autoWidth": false,
                "columnDefs":[{
                    "targets": [0],
                    "visible": false
                }]
            });

            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function() {
                    $(this).remove();
                });
            }, 2000);

            $('#tahun').datetimepicker({
                format: 'YYYY'
            });

            $('.deleteModal').click(function() {
                let id = $(this).data('id');
                $('#formDelete').attr('action', '' + id);
            });

            table.on('click', '.editModal', function() {
                $tr = $(this).closest('tr');
                if ($($tr).hasClass('child')) {
                    $tr = $tr.prev('.parent');
                }
                var data = table.row($tr).data();
                $('#nama_arsip').val(data[2]);
                $('#formedit').attr('action', '/4dm1n/arsip-dokumen/'+{{$id}}+'/kelola/'+data[0]);
                $('#editModal').modal('show')
            })
        });
    </script>
@endsection
