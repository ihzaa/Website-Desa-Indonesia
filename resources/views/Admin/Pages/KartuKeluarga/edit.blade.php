@extends('Admin.Template.all')

@section('page_title','Update Kartu Keluarga')

@section('breadcumb')
<li class="breadcrumb-item">Home</li>
<li class="breadcrumb-item" aria-current="page">
    <a class="link-fx" href="{{route('data_kk_index')}}">Kartu Keluarga</a>
</li>
<li class="breadcrumb-item">Update Data</li>
@endsection

@section('content')
<div class="card">
<div class="card-header">
        <h3 class="card-title">Daftar Anggota Keluarga</h3>
        <div class="card-tools">
            <a href="{{route('data_penduduk_add',['id'=>$kk->id])}}" class="btn btn-primary">
                <i class="fas fa-user"></i> Tambah Anggota Keluarga</a>
        </div>
    </div>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Anggota Keluarga</th>
                    <th>Tanggal Lahir</th>
                    <th>Umur (Tahun)</th>
                    <th>SHDRT</th>
                    <th>Pekerjaan</th>
                    <th>Pendidikan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kk->penduduks as $p)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$p->nama}}</td>
                    <td>{{$p->tgl_lahir}}</td>
                    <td>{{$p->umur}}</td>
                    <td>{{$p->shdrt}}</td>
                    <td>{{$p->pekerjaan}}</td>
                    <td>{{$p->pendidikan}}</td>
                    <td>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="card">
    @if (session('status'))
    <div class="alert alert-warning">
        {{ session('status') }}
    </div>
    @endif
    <div class="card-header">
        <h3 class="card-title">Update Data Kartu Keluarga</h3>
    </div>
    <div class="card-body">
        <div class="box box-primary">
            <!-- form start -->
            <form role="form" method="POST" action="{{route('data_kk_update')}}">
                @csrf
                <div class="box-body">
                    <input type="hidden" name="id_kk" value="{{$kk->id}}" required>
                    <div class="form-group">
                        <label for="no_kk">Nomor Kartu Keluarga</label>
                        <input type="number" class="form-control @error('no_kk') is-invalid @enderror" id="no_kk" name="no_kk" value="{{$kk->no_kk}}" required>
                        @error('no_kk')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama_kk">Nama Kartu Keluarga</label>
                        <input type="text" class="form-control" id="nama_kk" name="nama_kk" value="{{$kk->nama_kk}}" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_kk">Alamat</label>
                        <textarea class="form-control" id="alamat_kk" name="alamat_kk" required>{{$kk->alamat_kk}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="dusun_kk">Dusun</label>
                        <input type="text" class="form-control" id="dusun_kk" name="dusun_kk" value="{{$kk->dusun_kk}}" required>
                    </div>
                    <div class="form-group">
                        <label for="desa_kk">Desa / Kelurahan </label>
                        <input type="text" class="form-control" id="desa_kk" name="desa_kelurahan_kk" value="{{$kk->desa_kelurahan_kk}}" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="rt_kk">RT </label>
                                <input type="number" class="form-control" id="rt_kk" name="rt_kk" value="{{$kk->rt_kk}}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="rw_kk">RW </label>
                                <input type="number" class="form-control" id="rw_kk" name="rw_kk" value="{{$kk->rw_kk}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kecamtan_kk">Kecamatan </label>
                                <input type="text" class="form-control" id="kecamtan_kk" name="kecamatan_kk" value="{{$kk->kecamatan_kk}}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kabupaten_kota_kk">Kabupaten / Kota </label>
                                <input type="text" class="form-control" id="kabupaten_kota_kk" name="kabupaten_kota_kk" value="{{$kk->kabupaten_kota_kk}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="provinsi_kk">Provinsi</label>
                        <input type="text" class="form-control" id="provinsi_kk" name="provinsi_kk" value="{{$kk->provinsi_kk}}" required>
                    </div>
                    <div class="form-group">
                        <label for="kode_pos_kk">Kode POS</label>
                        <input type="number" class="form-control" id="kode_pos_kk" name="kode_pos_kk" value="{{$kk->kode_pos_kk}}" required>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary "> <i class="fas fa-save"></i> Perbarui</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


@section('js_after')
<!-- DataTables -->
<script src="{{asset('Admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('Admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('Admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('Admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<!-- Custom JS -->
<script>
  $(function() {
    $('#example1').DataTable()
  })
</script>
@endsection