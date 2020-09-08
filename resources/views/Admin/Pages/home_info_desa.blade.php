@extends('Admin.Template.all')

@section('page_title','Home dan Info Desa')

@section('breadcumb')
    <li class="breadcrumb-item">Home dan Info Desa</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h3 class="card-title m-2">Informasi akan ditampilkan di Website Utama</h3>
                <a href="{{route('admin_home_create')}}">
                    <button class="btn btn-secondary">Tambahkan Informasi</button>
                </a>
            </div>

        </div>
        <div class="card-body">
            <table id="dfUsageTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th width="5%" class="text-center">No</th>
                    <th width="10%" class="text-center">Image</th>
                    <th class="text-center" style="width: 200px;">Title</th>
                    <th class="text-center">Content</th>
                    <th class="text-center" style="width: 130px;">Category</th>
                    <th class="text-center" style="width: 130px;">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($homes as $home)
                    <tr>
                        <td class="text-center">{{$loop->iteration . "."}}</td>
                        <td class="text-center">
                            <a href="{{url('storage/images/home') . "/" .$home->image}}" target="_blank">Lihat Gambar</a>
                        </td>
                        <td>{{$home->title}}</td>
                        <td>{!! $home->content !!}</td>
                        <td class="text-center">{{$home->home_category->category_name}}</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-warning btn-sm"
                                    style="font-size: 12px; width: 60px; padding: 2px">Edit
                            </button>
                            <button type="button" class="btn btn-danger btn-sm deleteHomeModal"
                                    id="{{$home->id}}" data-toggle="modal" data-target="#deleteHomeModal"
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


    <!--Modal delete data-->
    <div class="modal fade" id="deleteHomeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formDeleteHome" action="#" method="post">
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

            $(".deleteHomeModal").click(function (e){
                let id = $(this).attr("id")

                $('#formDeleteHome').attr('action', '/4dm1n/home/delete/' + id)
            })
        });
    </script>

@endsection
