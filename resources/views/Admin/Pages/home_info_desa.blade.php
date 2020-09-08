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
                    <th class="text-center">Title</th>
                    <th class="text-center">Content</th>
                    <th class="text-center">Category</th>
                    <th class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($homes as $home)
                    <tr>
                        <td class="text-center">{{$loop->iteration . "."}}</td>
                        <td class="text-center">
                            <a href="#" target="_blank">Lihat Gambar</a>
                        </td>
                        <td>{{$home->title}}</td>
                        <td>{{$home->content}}</td>
                        <td class="text-center">{{$home->home_category->category_name}}</td>
                        <td class="text-center" width="150px">
                            <button type="button" class="btn btn-warning btn-sm"
                                    style="font-size: 12px; width: 60px; padding: 2px">Edit
                            </button>
                            <button type="button" class="btn btn-danger btn-sm"
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


@endsection

@section('js_after')
    <script src="{{asset('Admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('Admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('Admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('Admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script>
        $(function () {
            $("#dfUsageTable").DataTable({

            });
        });
    </script>

@endsection
