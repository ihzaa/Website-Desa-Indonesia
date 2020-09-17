@extends('Admin.Template.all')

@section('page_title','Tanya Jawab')

@section('breadcumb')
    <li class="breadcrumb-item">Home</li>
    <li class="breadcrumb-item">Tanya Jawab</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h3 class="card-title m-2">Pertanyaan yang sering muncul</h3>
                <button class="btn btn-primary" data-toggle="modal"
                        data-target="#tambahPertanyaanModal"><i class="fas fa-plus"></i> Tambah
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
            <table id="dfUsageTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th width="5%" class="text-center">No</th>
                    <th class="text-center">Judul</th>
                    <th class="text-center">Jawaban</th>
                    <th class="text-center" style="width: 130px;">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($qna as $qn)
                    <tr>
                        <td class="text-center">{{$loop->iteration . "."}}</td>
                        <td>{{$qn->judul}}</td>
                        <td>{{$qn->jawaban}}</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                    data-target="#updateQnAModal" data-id="{{$qn->id}}"
                                    data-judul="{{$qn->judul}}" data-jawaban="{{$qn->jawaban}}"
                                    style="font-size: 12px; width: 60px; padding: 2px">Edit
                            </button>
                            <button type="button" class="btn btn-danger btn-sm deleteQnAModal"
                                    id="{{$qn->id}}" data-toggle="modal" data-target="#deleteQnAModal"
                                    style="font-size: 12px; width: 60px; padding: 2px">Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <!-- Add Pertanyaan-->
    <div class="modal fade" id="tambahPertanyaanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Pertanyaan</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{route('admin_tanyajawab_post')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <input type="text" class="form-control mt-3 mb-3" aria-label="Sizing example input"
                               aria-describedby="inputGroup-sizing-lg"
                               placeholder="Masukkan Pertanyaan" name="judul" required>
                        <textarea type="text" class="form-control mt-3 mb-3" aria-label="Sizing example input"
                                  aria-describedby="inputGroup-sizing-lg"
                                  placeholder="Masukkan Jawaban" name="jawaban" rows="5" required></textarea>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Update QnA Modal-->
    <div class="modal fade" id="updateQnAModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Anggota BPD</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form id="formUpdateQnA" action="#" method="post">
                    @method('PUT')
                    @csrf
                    <div class="modal-body">
                        <input id="judul" type="text" class="form-control mt-3 mb-3" aria-label="Sizing example input"
                               aria-describedby="inputGroup-sizing-lg"
                               placeholder="Masukkan Pertanyaan" name="judul" required>
                        <textarea id="jawaban" type="text" class="form-control mt-3 mb-3" aria-label="Sizing example input"
                                  aria-describedby="inputGroup-sizing-lg"
                                  placeholder="Masukkan Jawaban" name="jawaban" rows="5" required></textarea>
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
    <div class="modal fade" id="deleteQnAModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formDeleteQnA" action="#" method="post">
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

            $(".deleteQnAModal").click(function (e) {
                let id = $(this).attr("id")

                $('#formDeleteQnA').attr('action', '/4dm1n/tanyajawab/' + id)
            });

            $('#updateQnAModal').on('show.bs.modal', function (event) {
                let button = $(event.relatedTarget);
                let id = button.data('id');
                let judul = button.data('judul');
                let jawaban = button.data('jawaban');

                let modal = $(this);
                modal.find('#judul').val(judul)
                modal.find('#jawaban').val(jawaban)

                $('#formUpdateQnA').attr('action', '/4dm1n/tanyajawab/' + id)
            });

            window.setTimeout(function () {
                $(".alert").fadeTo(500, 0).slideUp(500, function () {
                    $(this).remove();
                });
            }, 2000);
        });
    </script>

@endsection
