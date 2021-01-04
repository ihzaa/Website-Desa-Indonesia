@extends('Admin.Template.all')

@section('page_title','Kartu Keluarga')

@section('breadcumb')
<li class="breadcrumb-item">Home</li>
<li class="breadcrumb-item">
    <a href="{{route('data_kk_index')}}">Kartu Keluarga</a>
</li>
<li class="breadcrumb-item">Restore</li>
@endsection

@section('content')
<div class="card">
  @if (session('status'))
  <div class="alert alert-warning">
    {{ session('status') }}
  </div>
  @endif
  <div class="card-header">
    <h3 class="card-title">Daftar Penduduk Terhapus</h3>
  </div>
  
  <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nomor KK</th>
                    <th>Nama Kartu Keluarga</th>
                    <th>Nama Anggota Keluarga</th>
                    <th>Tanggal Lahir</th>
                    <th>Umur (Tahun)</th>
                    <th>SHDRT</th>
                    <!-- <th>Pekerjaan</th>
                    <th>Pendidikan</th>
                    <th>Calom Pemilih</th> -->
                    <th width="20%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($penduduks as $p)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$p->kartu_keluarga->no_kk}}</td>
                        <td>{{$p->kartu_keluarga->nama_kk}}</td>
                        <td>{{$p->nama}}</td>
                        <td>{{$p->tgl_lahir}}</td>
                        <td>{{$p->umur}}</td>
                        <td>{{$p->shdrt}}</td>
                        <!-- <td>{{$p->pekerjaan}}</td>
                        <td>{{$p->pendidikan}}</td>
                        <td><span class="label {{$p->pemilih == 'aktif'? 'label-success' : 'label-default'}}">{{$p->pemilih}}</span></td> -->
                        <td>
                        <button type="button" data-toggle="modal" data-id="{{$p->id}}" data-nama="{{$p->nama}}"
                             data-nama_kk="{{$p->kartu_keluarga->nama_kk}}" data-target="#modal-default"
                              class="hapus-modal btn btn-sm btn-info"  data-no_kk="{{$p->kartu_keluarga->no_kk}}">
                            <i class="fas fa-trash-restore"></i> Kembalikan
                        </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Kembalikan Data Penduduk</h4>
      </div>
      <form action="{{route('data_kk_restore')}}" method="POST">
      @csrf
      <div class="modal-body">
        Anda yakin ingin mengembalikan data penduduk sesuai dengan kartu keluarga berikut ?
          <input type="hidden" id="id_penduduk" name="id">
          <div class="form-group">
            <label for="no_kk">Nomor Kartu Keluarga</label>
            <input type="number" class="form-control" id="no_kk" disabled>
          </div>
          <div class="form-group">
            <label for="nama_kk">Nama Kartu Keluarga</label>
            <input type="text" class="form-control" id="nama_kk" disabled>
          </div>
          <div class="form-group">
            <label for="nama_kk">Nama Penduduk</label>
            <input type="text" class="form-control" id="nama_penduduk" disabled>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-info">Kembalikan</button>
      </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
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
    $(document).on("click", ".hapus-modal", function() {
      let id = $(this).data('id');
      let nomorKK = $(this).data('no_kk');
      let nama = $(this).data('nama');
      let namaKK = $(this).data('nama_kk');
      $("#id_penduduk").val(id);
      $("#no_kk").val(nomorKK);
      $("#nama_kk").val(namaKK);
      $("#nama_penduduk").val(nama);
    });
  })
</script>
@endsection