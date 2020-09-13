@extends('Admin.Template.all')

@section('page_title','Tambah Penduduk')

@section('css_before')
@endsection

@section('breadcumb')
<li class="breadcrumb-item">Home</li>
<li class="breadcrumb-item" aria-current="page">
    <a class="link-fx" href="{{route('data_kk_index')}}">Kartu Keluarga</a>
</li>
<li class="breadcrumb-item" aria-current="page">
    <a class="link-fx" href="{{route('data_kk_form_edit',['id'=>$kk->id])}}">{{$kk->nama_kk}}</a>
</li>
<li class="breadcrumb-item">Tambah Anggota Keluarga</li>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tambah Anggota Kartu Keluarga</h3>
    </div>
    <div class="card-body">
        @error('nik')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="box box-primary">
            <!-- form start -->
            <form role="form" method="POST" action="{{route('data_penduduk_store',['id'=>$kk->id])}}">
                @csrf
                <div class="box-body">
                    <input type="hidden" name="id_kartu_keluarga" value="{{$kk->id}}">
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="datepicker">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tgl_lahir" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" required> </textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="rt_kk">RT </label>
                                <input type="number" class="form-control" id="rt_kk" name="rt" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="rw_kk">RW </label>
                                <input type="number" class="form-control" id="rw_kk" name="rw" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="desa_kk">Desa / Kelurahan </label>
                                <input type="text" class="form-control" id="desa_kk" name="desa_kelurahan" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kecamtan_kk">Kecamatan </label>
                                <input type="text" class="form-control" id="kecamtan_kk" name="kecamatan" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kabupaten_kota_kk">Kabupaten / Kota </label>
                                <input type="text" class="form-control" id="kabupaten_kota_kk" name="kabupaten_kota" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="provinsi_kk">Provinsi</label>
                                <input type="text" class="form-control" id="provinsi_kk" name="provinsi" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Pendidikan</label>
                                <input type="text" class="form-control" name="pendidikan" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Pekerjaan</label>
                                <input type="text" class="form-control" name="pekerjaan" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Ayah</label>
                                <input type="text" class="form-control" name="nama_ayah" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Ibu</label>
                                <input type="text" class="form-control" name="nama_ibu" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Kewarganegaran</label>
                        <input type="text" class="form-control" name="kewarganegaraan" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>No Passport</label>
                                <input type="text" class="form-control" name="no_passpor">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>No Kitas</label>
                                <input type="text" class="form-control" name="no_kitas">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Jenis Kelamin </label>
                                <select class="form-control" name="jenis_kelamin" style="width: 100%;">
                                    <option value="perempuan" selected="selected">perempuan</option>
                                    <option value="laki-laki">laki-laki</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Golongan Darah </label>
                                <select class="form-control" name="gol_darah" style="width: 100%;">
                                    <option value="O" selected="selected">O</option>
                                    <option value="AB">AB</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Agama </label>
                                <select class="form-control" name="agama" style="width: 100%;">
                                    <option value="islam" selected="selected">islam</option>
                                    <option value="katholik">katholik</option>
                                    <option value="protestan">protestan</option>
                                    <option value="hindu">hindu</option>
                                    <option value="budha">budha</option>
                                    <option value="konghucu">konghucu</option>
                                    <option value="kepercayaan">kepercayaan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Status Kawin </label>
                                <select class="form-control" name="status_kawin" style="width: 100%;">
                                    <option value="belum kawin" selected="selected">belum kawin</option>
                                    <option value="kawin">kawin</option>
                                    <option value="cerai hidup">cerai hidup</option>
                                    <option value="cerai mati">cerai mati</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Status Hidup Dalam Rumah Tangga </label>
                    <select class="form-control" name="shdrt" style="width: 100%;">
                        <option value="kepala keluarga" selected="selected">kepala keluarga</option>
                        <option value="anak">anak</option>
                        <option value="istri">istri</option>
                    </select>
                </div>
                <hr>
                <div id="form-ktp" class="row" hidden>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nik">NIK KTP</label>
                            <input type="number" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Jenis KTP </label>
                            <select class="form-control" name="masa_berlaku" id="select-ktp" style="width: 100%;">
                                <option value="1">seumur hidup</option>
                                <option value="0">sementara</option>
                            </select>
                        </div>
                    </div>
                </div>
                <hr>
                <div id="form-kematian" class="row" hidden>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="tanggal_kematian">Kematian</label>
                            <input type="date" class="form-control" id="tanggal_kematian" name="tanggal_kematian">
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="button" id="add_data_ktp" class="btn btn-success "> <i class="fas fa-file-archive"></i> Tambah KTP</button>
                    <button type="button" id="remove_data_ktp" hidden class="btn btn-danger"> <i class="fas fa-file-archive"></i> Hapus data KTP</button>
                    <button type="button" id="add_data_kematian" class="btn btn-warning "> <i class="fas fa-eject"></i> Data Kematian</button>
                    <button type="button" id="remove_data_kematian" hidden class="btn btn-danger"> <i class="fas fa-eject"></i> Hapus data kematian</button>
                    <button type="submit" class="btn btn-primary float-right"> <i class="fas fa-save"></i> Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


@section('js_after')
<script>
    @error('nik')
        $('#form-ktp').removeAttr('hidden');
        $('#remove_data_ktp').removeAttr('hidden');
        $('#add_data_ktp').attr('hidden', '');
    @enderror

    $('#add_data_ktp').click(function() {
        $('#form-ktp').removeAttr('hidden');
        $('#remove_data_ktp').removeAttr('hidden');
        $('#add_data_ktp').attr('hidden', '');
    });

    $('#remove_data_ktp').click(function() {
        $('#add_data_ktp').removeAttr('hidden');
        $('#form-ktp').attr('hidden', '');
        $('#remove_data_ktp').attr('hidden', '');
        $('#nik').val(null);
    });


    $('#add_data_kematian').click(function() {
        $('#form-kematian').removeAttr('hidden');
        $('#remove_data_kematian').removeAttr('hidden');
        $('#add_data_kematian').attr('hidden', '');
    });

    $('#remove_data_kematian').click(function() {
        $('#add_data_kematian').removeAttr('hidden');
        $('#form-kematian').attr('hidden', '');
        $('#remove_data_kematian').attr('hidden', '');
        $('#tanggal_kematian').val(null);
    });
</script>

@endsection