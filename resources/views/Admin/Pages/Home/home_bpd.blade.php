@extends('Admin.Template.all')

@section('page_title','Badan Permusyawaratan Desa')

@section('breadcumb')
    <li class="breadcrumb-item">Home</li>
    <li class="breadcrumb-item">BPD</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h3 class="card-title m-2">Informasi keanggotaan BPD</h3>
                <button class="btn btn-primary" data-toggle="modal"
                        data-target="#tambahPerangkatModal"><i class="fas fa-plus"></i> Tambah Anggota
                </button>
            </div>

        </div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success mt-2">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{ session('status') }}
                </div>
            @endif
            @if (session('alert'))
                <div class="alert alert-danger mt-2">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong> {{ session('alert') }}</strong>
                </div>
            @endif
            <table id="dfUsageTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th width="5%" class="text-center">No</th>
                    <th width="150px" class="text-center">Gambar</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Jabatan</th>
                    <th class="text-center" style="width: 130px;">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($bpd as $bp)
                    <tr>
                        <td class="text-center">{{$loop->iteration . "."}}</td>
                        <td class="text-center">
                            <img src="{{url('storage/images/bpd') . "/" .$bp->photo}}"
                                 class="rounded" alt="{{url('storage/images/bpd') . "/" .$bp->nama}}"
                                 width="100" height="100">
                        </td>
                        <td>{{$bp->nama}}</td>
                        <td>{{$bp->jabatan}}</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                    data-target="#updateBpdModal" data-id="{{$bp->id}}"
                                    data-nama="{{$bp->nama}}" data-jabatan="{{$bp->jabatan}}"
                                    style="font-size: 12px; width: 60px; padding: 2px">Edit
                            </button>
                            <button type="button" class="btn btn-danger btn-sm deleteBPDModal"
                                    id="{{$bp->id}}" data-toggle="modal" data-target="#deleteBPDModal"
                                    style="font-size: 12px; width: 60px; padding: 2px">Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            Footer
        </div>
    </div>


    <!-- Add Perangkat Modal-->
    <div class="modal fade" id="tambahPerangkatModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Anggota BPD</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{route('admin_home_bpd_post')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="text" class="form-control mt-3 mb-3" aria-label="Sizing example input"
                               aria-describedby="inputGroup-sizing-lg"
                               placeholder="Masukkan Nama" name="nama" required>
                        <input type="text" class="form-control mt-3 mb-3" aria-label="Sizing example input"
                               aria-describedby="inputGroup-sizing-lg"
                               placeholder="Masukkan Jabatan" name="jabatan" required>
                        <input type="file" name="photo" class="mb-3" required>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Update Perangkat Modal-->
    <div class="modal fade" id="updateBpdModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Anggota BPD</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form id="formUpdateBpd" action="#" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="modal-body">
                        <input type="text" class="form-control mt-3 mb-3" aria-label="Sizing example input"
                               aria-describedby="inputGroup-sizing-lg" id="nama"
                               placeholder="Masukkan Nama" name="nama" required>
                        <input type="text" class="form-control mt-3 mb-3" aria-label="Sizing example input"
                               aria-describedby="inputGroup-sizing-lg"
                               placeholder="Masukkan Jabatan" name="jabatan" id="jabatan" required>
                        <input type="file" name="photo" class="mb-3">
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--Modal delete data-->
    <div class="modal fade" id="deleteBPDModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formDeleteBPD" action="#" method="post">
                    @method('delete')
                    @csrf
                    <div class="modal-body">
                        <p>Anda yakin ingin menghapus Informasi Berikut ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
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

            $(".deleteBPDModal").click(function (e) {
                let id = $(this).attr("id")

                $('#formDeleteBPD').attr('action', '/4dm1n/home/bpd/delete/' + id)
            });

            $('#updateBpdModal').on('show.bs.modal', function (event) {
                let button = $(event.relatedTarget);
                let id = button.data('id');
                let nama = button.data('nama');
                let jabatan = button.data('jabatan');

                let modal = $(this);
                modal.find('#nama').val(nama)
                modal.find('#jabatan').val(jabatan)

                $('#formUpdateBpd').attr('action', '/4dm1n/home/bpd/update/' + id)
            });

            window.setTimeout(function () {
                $(".alert").fadeTo(500, 0).slideUp(500, function () {
                    $(this).remove();
                });
            }, 2000);
        });
    </script>

@endsection
