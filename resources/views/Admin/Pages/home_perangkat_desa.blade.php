@extends('Admin.Template.all')

@section('page_title','Perangkat Desa')

@section('breadcumb')
    <li class="breadcrumb-item">Home</li>
    <li class="breadcrumb-item">Perangkat Desa</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h3 class="card-title m-2">Informasi mengenai Perangkat Desa</h3>
                <button class="btn btn-secondary" data-toggle="modal"
                        data-target="#tambahPerangkatModal">Tambahkan Perangkat
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
                @foreach($perangkats as $perangkat)
                    <tr>
                        <td class="text-center">{{$loop->iteration . "."}}</td>
                        <td class="text-center">
                            <img src="{{url('storage/images/perangkat') . "/" .$perangkat->photo}}"
                                 class="rounded" alt="{{url('storage/images/home') . "/" .$perangkat->nama}}"
                                 width="100" height="100">
                        </td>
                        <td>{{$perangkat->nama}}</td>
                        <td>{{$perangkat->jabatan}}</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                    data-target="#updatePerangkatModal" data-id="{{$perangkat->id}}"
                                    data-nama="{{$perangkat->nama}}" data-jabatan="{{$perangkat->jabatan}}"
                                    style="font-size: 12px; width: 60px; padding: 2px">Edit
                            </button>
                            <button type="button" class="btn btn-danger btn-sm deletePerangkatModal"
                                    id="{{$perangkat->id}}" data-toggle="modal" data-target="#deletePerangkatModal"
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Perangkat Desa</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{route('admin_home_perangkatdesa_post')}}" method="post" enctype="multipart/form-data">
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
    <div class="modal fade" id="updatePerangkatModal" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Perangkat Desa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formUpdatePerangkat" action="#" method="post" enctype="multipart/form-data">
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
    </div>ss

    <!--Modal delete data-->
    <div class="modal fade" id="deletePerangkatModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formDeletePerangkat" action="#" method="post">
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

            $(".deletePerangkatModal").click(function (e) {
                let id = $(this).attr("id")

                $('#formDeletePerangkat').attr('action', '/4dm1n/home/perangkatdesa/delete/' + id)
            });

            $('#updatePerangkatModal').on('show.bs.modal', function (event) {
                let button = $(event.relatedTarget);
                let id = button.data('id');
                let nama = button.data('nama');
                let jabatan = button.data('jabatan');

                let modal = $(this);
                modal.find('#nama').val(nama)
                modal.find('#jabatan').val(jabatan)

                $('#formUpdatePerangkat').attr('action', '/4dm1n/home/perangkatdesa/update/' + id)
            });

            window.setTimeout(function () {
                $(".alert").fadeTo(500, 0).slideUp(500, function () {
                    $(this).remove();
                });
            }, 2000);
        });
    </script>

@endsection
