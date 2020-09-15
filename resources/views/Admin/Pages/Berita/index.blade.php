@extends('Admin.Template.all')

@section('page_title','Berita')

@section('breadcumb')
<li class="breadcrumb-item"><a href="{{route('admin_dashboard')}}">Home</a></li>
<li class="breadcrumb-item active">Berita</li>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <h3 class="card-title m-2">Berita yang akan ditampilkan pada website</h3>
            <a class="btn btn-primary btn-sm" href="{{route('admin_berita_create')}}"><i
                    class="fas fa-plus"></i>&nbsp;Tambah Berita</a>
        </div>

    </div>
    <div class="card-body">

        @if (session('success'))
        <div class="alert alert-success mt-2">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ session('success') }}
        </div>
        @endif

        <table id="dfUsageTable" class="table table-bordered table-striped" data-form="deleteForm">
            <thead>
                <tr>
                    <th width="4%">#</th>
                    <th width="10%">Thumbnail</th>
                    <th style="width: 200px;">Judul</th>
                    <th style="width: 200px;">Terakhir Update</th>
                    <th style="width: 130px;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($berita as $data)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td><a href="{{Storage::url('images/berita/thumbnails')}}/{{$data->thumbnail_berita}}"
                            target="_blank">Lihat Gambar</a></td>
                    <td>{{$data->judul_berita}}</td>
                    <td>{{Carbon\Carbon::parse($data->updated_at)->translatedFormat('l, d F Y H:i')}}</td>
                    <td>
                        <a href="{{route('admin_berita_edit', $data->id)}}" class="btn btn-warning">Edit</a>
                        <button class="btn btn-danger ml-2 deleteModal" data-toggle="modal" data-target="#deleteModal"
                            id="{{$data->id}}">Hapus</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
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
<script>
    $(function () {
        $("#dfUsageTable").DataTable({
            "responsive": true,
            "autoWidth": false
        });

        $(".deleteModal").click(function (e) {
            let id = $(this).attr("id")
            $('#formDelete').attr('action', '/4dm1n/berita/' + id)
        });

        window.setTimeout(function () {
            $(".alert").fadeTo(500, 0).slideUp(500, function () {
                $(this).remove();
            });
        }, 2000);
    });
</script>

@endsection
