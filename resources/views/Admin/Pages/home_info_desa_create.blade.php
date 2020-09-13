@extends('Admin.Template.all')

@section('page_title','Home dan Info Desa')

@section('css_before')
    <link rel="stylesheet" href="{{asset('Admin/plugins/summernote/summernote-bs4.css')}}">
@endsection

@section('breadcumb')
    <li class="breadcrumb-item">Home</li>
    <li class="breadcrumb-item" aria-current="page">
        <a class="link-fx" href="{{route('admin_home_infodesa')}}">Info Desa</a>
    </li>
    <li class="breadcrumb-item">Tambah Informasi</li>
@endsection

@section('content')

    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h3 class="card-title m-2">Pastikan Semua Informasi Telah Terisi</h3>
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
            <form action="{{route('admin_home_infodesa_post')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Judul</label>
                    <input type="text" class="form-control" id="title" placeholder="Masukkan Judul" name="title" required>
                    <label for="category" class="mt-3">Category</label>
                    <select class="form-control" id="category" name="category">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->category_name}}</option>
                        @endforeach
                    </select>
                    <label for="content" class="mt-3">Content</label>
                    <textarea class="textarea" placeholder="Place some text here" id="content" name="contents"
                              style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

                    <div class="d-flex justify-content-between mt-4">
                        <input type="file" id="image" name="image" required>
                        <button type="submit" class="btn btn-primary" style="width: 130px">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('js_after')
    <script src="{{asset('Admin/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <script>
        $(function () {
            $('.textarea').summernote({
                height: 600
            })

            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                    $(this).remove();
                });
            }, 2000);
        });
    </script>

@endsection
