@extends('Admin.Template.all')

@section('page_title','Kritik dan Saran')

@section('breadcumb')
    <li class="breadcrumb-item">Home</li>
    <li class="breadcrumb-item">Kritik dan Saran</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h3 class="card-title m-2">Kritik dan Saran dari pengguna</h3>
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
                    <th class="text-center">Nama</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Subject</th>
                    <th class="text-center">Message</th>
                    <th class="text-center">Dibuat pada</th>
                </tr>
                </thead>
                <tbody>
                @foreach($kritiksarans as $ks)
                    <tr>
                        <td class="text-center">{{$loop->iteration . "."}}</td>
                        <td>{{$ks->nama}}</td>
                        <td>{{$ks->email}}</td>
                        <td>{{$ks->subject}}</td>
                        <td>{{$ks->message}}</td>
                        <td class="text-center">{{\Carbon\Carbon::parse($ks->created_at)->translatedFormat('d M Y H:m')}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
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

            window.setTimeout(function () {
                $(".alert").fadeTo(500, 0).slideUp(500, function () {
                    $(this).remove();
                });
            }, 2000);
        });
    </script>

@endsection
