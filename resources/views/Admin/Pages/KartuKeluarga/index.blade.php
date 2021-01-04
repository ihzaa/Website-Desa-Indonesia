@extends('Admin.Template.all')

@section('page_title','Kartu Keluarga')

@section('breadcumb')
<li class="breadcrumb-item">Home</li>
<li class="breadcrumb-item">Kartu Keluarga</li>
@endsection

@section('content')
<div class="card">
  @if (session('status'))
  <div class="alert alert-warning">
    {{ session('status') }}
  </div>
  @endif
  <div class="card-header">
    <h3 class="card-title">Daftar Kartu Keluarga</h3>
    <div class="card-tools">
      <a href="{{route('data_kk_form_add')}}" class="btn-block btn btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
      <a href="{{route('data_kk_restore_index')}}" class="btn-block btn btn-info"><i class="fas fa-trash-restore"></i> Restore Data Penduduk</a>
    </div>
  </div>
  <div class="card-body">

    <div class="box">
      <div class="box-header">
        <h3 class="box-title">

        </h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No.</th>
              <th>Nomor Kartu Keluarga</th>
              <th>Nama Kartu Keluarga</th>
              <th>Jumlah Anggota Keluarga</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($data_kk as $kk)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$kk->no_kk}}</td>
              <td>{{$kk->nama_kk}}</td>
              <td>{{$kk->jumlah_anggota}}</td>
              <td>
                <a href="{{route('data_kk_form_edit',['id'=>$kk->id])}}" class="btn btn-primary">
                  <i class="fas fa-edit"></i> edit
                </a>
                <button type="button" data-toggle="modal" data-id="{{$kk->id}}" data-nama="{{$kk->nama_kk}}" data-nomor="{{$kk->no_kk}}" data-target="#modal-default" class="hapus-modal btn btn-danger">
                  <i class="fas fa-trash"></i> hapus
                </button>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Hapus Kartu Keluarga</h4>
      </div>
      <form action="{{route('data_kk_delete')}}" method="POST">
      @csrf
      <div class="modal-body">
        Anda yakin ingin menghapus kartu keluarga beserta data penduduk berikut ?
          <input type="hidden" id="id_kk" name="id_kk">
          <div class="form-group">
            <label for="no_kk">Nomor Kartu Keluarga</label>
            <input type="number" class="form-control" id="no_kk" disabled>
          </div>
          <div class="form-group">
            <label for="nama_kk">Nama Kartu Keluarga</label>
            <input type="text" class="form-control" id="nama_kk" disabled>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-danger">Hapus</button>
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
      let idKK = $(this).data('id');
      let nomorKK = $(this).data('nomor');
      let titleKK = $(this).data('nama');
      $("#id_kk").val(idKK);
      $("#no_kk").val(nomorKK);
      $("#nama_kk").val(titleKK);
    });
  })
</script>
@endsection