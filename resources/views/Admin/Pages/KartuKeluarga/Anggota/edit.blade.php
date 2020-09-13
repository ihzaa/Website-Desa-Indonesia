@extends('Admin.Template.all')

@section('page_title','Edit Penduduk')

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
<li class="breadcrumb-item">Edit Anggota Keluarga</li>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Anggota Kartu Keluarga</h3>
    </div>
    <div class="card-body">
        @error('nik')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="box box-primary">
            <!-- form start -->
            <form role="form" method="POST" action="{{route('data_penduduk_update',['id'=>$kk->id])}}">
                @csrf
                <div class="box-body">
                    <input type="hidden" name="id_penduduk" value="{{$p->id}}">
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{$p->nama}}" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="datepicker">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tgl_lahir" value="{{$p->tgl_lahir}}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{$p->tempat_lahir}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" required>{{$p->alamat}}</textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="rt_kk">RT </label>
                                <input type="number" class="form-control" id="rt_kk" name="rt" value="{{$p->rt}}" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="rw_kk">RW </label>
                                <input type="number" class="form-control" id="rw_kk" name="rw" value="{{$p->rw}}" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="desa_kk">Desa / Kelurahan </label>
                                <input type="text" class="form-control" id="desa_kk" name="desa_kelurahan" value="{{$p->desa_kelurahan}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kecamtan_kk">Kecamatan </label>
                                <input type="text" class="form-control" id="kecamtan_kk" name="kecamatan" value="{{$p->kecamatan}}"  required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kabupaten_kota_kk">Kabupaten / Kota </label>
                                <input type="text" class="form-control" id="kabupaten_kota_kk" name="kabupaten_kota" value="{{$p->kabupaten_kota}}"  required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="provinsi_kk">Provinsi</label>
                                <input type="text" class="form-control" id="provinsi_kk" name="provinsi" value="{{$p->provinsi}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Pendidikan</label>
                                <input type="text" class="form-control" name="pendidikan" value="{{$p->pendidikan}}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Pekerjaan</label>
                                <input type="text" class="form-control" name="pekerjaan" value="{{$p->pekerjaan}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Ayah</label>
                                <input type="text" class="form-control" name="nama_ayah" value="{{$p->nama_ayah}}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Ibu</label>
                                <input type="text" class="form-control" name="nama_ibu" value="{{$p->nama_ibu}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Kewarganegaran</label>
                        <input type="text" class="form-control" name="kewarganegaraan" value="{{$p->kewarganegaraan}}" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>No Passport</label>
                                <input type="text" class="form-control" name="no_passpor" value="{{$p->no_passpor}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>No Kitas</label>
                                <input type="text" class="form-control" name="no_kitas" value="{{$p->no_kitas}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Jenis Kelamin </label>
                                <select class="form-control" name="jenis_kelamin" style="width: 100%;">
                                    <option value="perempuan" {{($p->jenis_kelamin == "perempuan") ? "selected": "" }}>perempuan</option>
                                    <option value="laki-laki" {{($p->jenis_kelamin == "laki-laki") ? "selected": "" }}>laki-laki</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Golongan Darah </label>
                                <select class="form-control" name="gol_darah" style="width: 100%;">
                                    <option value="O" {{($p->gol_darah == "O") ? "selected": "" }}>O</option>
                                    <option value="AB" {{($p->gol_darah == "AB") ? "selected": "" }}>AB</option>
                                    <option value="A" {{($p->gol_darah == "A") ? "selected": "" }}>A</option>
                                    <option value="B" {{($p->gol_darah == "B") ? "selected": "" }}>B</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Agama </label>
                                <select class="form-control" name="agama" style="width: 100%;">
                                    <option value="islam" {{($p->agama == "islam") ? "selected": "" }}>islam</option>
                                    <option value="katholik" {{($p->agama == "katholik") ? "selected": "" }}>katholik</option>
                                    <option value="protestan" {{($p->agama == "protestan") ? "selected": "" }}>protestan</option>
                                    <option value="hindu" {{($p->agama == "hindu") ? "selected": "" }}>hindu</option>
                                    <option value="budha" {{($p->agama == "budha") ? "selected": "" }}>budha</option>
                                    <option value="konghucu" {{($p->agama == "konghucu") ? "selected": "" }}>konghucu</option>
                                    <option value="kepercayaan" {{($p->agama == "kepercayaan") ? "selected": "" }}>kepercayaan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Status Kawin </label>
                                <select class="form-control" name="status_kawin" style="width: 100%;">
                                    <option value="belum kawin" {{($p->status_kawin == "belum kawin") ? "selected": "" }}>belum kawin</option>
                                    <option value="kawin" {{($p->status_kawin == "kawin") ? "selected": "" }}>kawin</option>
                                    <option value="cerai hidup" {{($p->status_kawin == "cerai hidup") ? "selected": "" }}>cerai hidup</option>
                                    <option value="cerai mati" {{($p->status_kawin == "cerai mati") ? "selected": "" }}>cerai mati</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Status Hidup Dalam Rumah Tangga </label>
                    <select class="form-control" name="shdrt" style="width: 100%;">
                        <option value="kepala keluarga" {{($p->shdrt == "kepala keluarga") ? "selected": "" }}>kepala keluarga</option>
                        <option value="anak" {{($p->shdrt == 'anak') ? 'selected': ""}}>anak</option>
                        <option value="istri" {{($p->shdrt == "istri") ? "selected": "" }}>istri</option>
                    </select>
                </div>
                <hr>
                <div id="form-ktp" class="row" hidden>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nik">NIK KTP</label>
                            <input type="number" class="form-control @error('nik') is-invalid @enderror" value="{{$p->data_ktp ? $p->data_ktp->nik:''}}" id="nik" name="nik">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Jenis KTP </label>
                            <select class="form-control" name="masa_berlaku" id="select-ktp" style="width: 100%;">
                                @if($p->data_ktp)
                                <option value="1"  {{($p->data_ktp->masa_berlaku == "1") ? "selected": "" }}>seumur hidup</option>
                                <option value="0"  {{($p->data_ktp->masa_berlaku == "0") ? "selected": "" }}>sementara</option>
                                @else
                                <option value="1"  selected>seumur hidup</option>
                                <option value="0" >sementara</option>
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
                <hr>
                <div id="form-kematian" class="row" hidden>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="tanggal_kematian">Kematian</label>
                            <input type="date" class="form-control" id="tanggal_kematian" name="tanggal_kematian" value="{{$p->kematian ? $p->kematian->tanggal_kematian:''}}">
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

    @if($p->data_ktp)
        $('#form-ktp').removeAttr('hidden');
        $('#remove_data_ktp').removeAttr('hidden');
        $('#add_data_ktp').attr('hidden', '');
    @endif

    @if($p->kematian)
        $('#form-kematian').removeAttr('hidden');
        $('#remove_data_kematian').removeAttr('hidden');
        $('#add_data_kematian').attr('hidden', '');
    @endif

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