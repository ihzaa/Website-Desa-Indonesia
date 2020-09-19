@extends('Admin.Template.all')

@section('page_title','Pengaturan')

@section('breadcumb')
    <li class="breadcrumb-item">Home</li>
    <li class="breadcrumb-item">Pengaturan</li>
@endsection

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ session('status') }}
        </div>
    @elseif(session('alert'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ session('alert') }}
        </div>
    @endif

    <div class="row justify-content-between">
        <section class="col-lg-8 connectedSortable">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title m-2">Pengaturan Umum</h3>
                    </div>
                </div>
                <form action="{{route('admin_pengaturan_umum_update', ['id' => $setting->id])}}" method="post"
                      role="form">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="namadesa">Nama Desa</label>
                            <input type="text" class="form-control" id="namadesa" name="nama_desa"
                                   placeholder="Nama Desa" value="{{$setting->nama_desa}}"
                                   required>
                            <div class="row mt-3">
                                <div class="col">
                                    <label for="namakecamatan">Nama Kecamatan</label>
                                    <input type="text" class="form-control" placeholder="Kecamatan"
                                           id="namakecamatan" name="kecamatan" value="{{$setting->kecamatan}}"
                                           required>
                                </div>
                                <div class="col">
                                    <label for="namakabupaten">Nama Kabupaten / Kota</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <select class="form-control mr-sm-2" id="namakabupaten" name="clskabupaten">
                                                <option value="Kota"
                                                        @if(explode(' ', $setting->kabupaten)[0] === 'Kota')
                                                        selected
                                                    @endif
                                                >Kota
                                                </option>
                                                <option value="Kabupaten"
                                                        @if(explode(' ', $setting->kabupaten)[0] === 'Kabupaten')
                                                        selected
                                                    @endif
                                                >Kabupaten
                                                </option>
                                            </select>
                                        </div>
                                        <input type="text" class="form-control" id="namakabupaten"
                                               placeholder="Kabupaten / Kota" name="kabupaten"
                                               value="{{explode(' ', $setting->kabupaten)[1]}}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <label for="nowa">Nomor Whatsapp (ex : 6289515508020)</label>
                                    <input type="number" class="form-control" placeholder="No.Whatsapp"
                                           id="nowa" name="no_wa" value="{{$setting->no_wa}}">
                                </div>
                                <div class="col">
                                    <label for="notelp">Nomor Telepon</label>
                                    <input type="number" class="form-control" id="notelp"
                                           placeholder="No.Telepon" name="no_telepon" value="{{$setting->no_telepon}}">
                                </div>
                            </div>
                            <label for="email" class="mt-3">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                   placeholder="Email" value="{{$setting->email}}" required>
                            <label for="alamat" class="mt-3">Alamat Lengkap</label>
                            <textarea type="text" class="form-control" id="alamat" name="alamat_lengkap" rows="10"
                                      placeholder="Alamat Lengkap" required>{{$setting->alamat_lengkap}}</textarea>
                            <label for="maps" class="mt-3">IFrame Maps</label>
                            <textarea type="text" class="form-control" id="alamat" name="maps" rows="10"
                                      placeholder="IFrame Maps" required>{{$setting->maps}}</textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info float-right">Update</button>
                    </div>
                </form>
            </div>
        </section>


        <section class="col-lg-4 connectedSortable">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title m-2">Ubah Logo</h3>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin_pengaturan_logo_kabupaten', ['id' => $setting->id])}}" method="post"
                          enctype="multipart/form-data" role="form">
                        @csrf
                        <label for="alamat">Logo Kabupaten</label>
                        <div class="form-group">
                            @if($setting->logo_kabupaten !== null)
                                <img src="{{url('storage/images/logo') . "/" . $setting->logo_kabupaten}}"
                                     class="img-thumbnail"
                                     alt="Logo Kabupaten" width="80px" height="80px">
                            @else
                                <div class="img-thumbnail"
                                     style="width: 90px; height: 90px; background-color: #dedede"></div>
                            @endif
                        </div>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="logo_kabupaten" name="logo_kabupaten"
                                       required>
                                <label class="custom-file-label" for="logo_kabupaten">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-info">Upload</button>
                            </div>
                        </div>
                    </form>

                    <form action="{{route('admin_pengaturan_logo_maskot', ['id' => $setting->id])}}" method="post"
                          enctype="multipart/form-data" role="form" class="mt-3">
                        @csrf
                        <label for="alamat">Logo Maskot</label>
                        <div class="form-group">
                            @if($setting->logo_maskot !== null)
                                <img src="{{url('storage/images/logo') . "/" . $setting->logo_maskot}}"
                                     class="img-thumbnail"
                                     alt="Logo Kabupaten" width="80px" height="80px">
                            @else
                                <div class="img-thumbnail"
                                     style="width: 90px; height: 90px;  background-color: #dedede">
                                </div>
                            @endif
                        </div>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="logo_maskot" name="logo_maskot"
                                       required>
                                <label class="custom-file-label" for="logo_maskot">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-info">Upload</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            <form action="{{route('admin_pengaturan_password_update', ['id' => Auth::user()->id])}}" method="post"
                  role="form">
                @method('PUT')
                @csrf
                <div class="card card-outline card-warning">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title m-2">Ubah Password</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <label for="pwlama">Password Lama</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="pwlama" name="pwlama"
                                   placeholder="Password Lama">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <span toggle="#pwlama" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                </div>
                            </div>
                        </div>
                        <label for="pwbaru" class="mt-3">Password Baru</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="pwbaru" name="pwbaru"
                                   placeholder="Password Baru">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <span toggle="#pwbaru" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info float-right">Update</button>
                    </div>
                </div>
            </form>
        </section>
    </div>

@endsection

@section('js_after')
    <script src="{{asset('Admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('Admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('Admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('Admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('Admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
    <script>
        $(function () {
            bsCustomFileInput.init();

            window.setTimeout(function () {
                $(".alert").fadeTo(500, 0).slideUp(500, function () {
                    $(this).remove();
                });
            }, 2000);

            $(".toggle-password").click(function () {

                $(this).toggleClass("fa-eye fa-eye-slash");
                var input = $($(this).attr("toggle"));
                if (input.attr("type") == "password") {
                    input.attr("type", "text");
                } else {
                    input.attr("type", "password");
                }
            });
        });
    </script>

@endsection
