<!-- MODAL PENDAPATAN -->

<!--Modal create data-->
<div class="modal fade" id="createModalPendapatan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title">Tambah Data Pendapatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formCreatePendapatan" action="{{route('admin_arsip_keuangan_kelola_pendapatan_store', $idTahun)}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="nama_pendapatan">Nama Pendapatan<span class="text-red">*</span></label>
                            <input type="text" id="nama_pendapatan" name="nama_pendapatan" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="nominal">Nominal Pendapatan<span class="text-red">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp. </span>
                                </div>
                                <input name="nominal" id="nominal_pendapatan" type="number" id="nominal"
                                    class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tgl_pendapatan">Tanggal Pendapatan<span class="text-red">*</span></label>
                            <input type="date" id="tgl_pendapatan" name="tgl_pendapatan" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Kirim Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal create data -->


<!--Modal delete data-->
<div class="modal fade" id="deleteModalPendapatan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-danger">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formDeletePendapatan" action="/" method="post">
                @method('delete')
                @csrf
                <div class="modal-body">
                    <p>Anda yakin ingin menghapus data tersebut ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-light">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--Modal edit data-->
<div class="modal fade" id="editModalPendapatan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title">Edit Data Pendapatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formEditPendapatan" action="/" method="post">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="nama_pendapatan">Nama Pendapatan<span class="text-red">*</span></label>
                            <input id="nama_pendapatan_modal" type="text" name="nama_pendapatan" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="nominal">Nominal Pendapatan<span class="text-red">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp. </span>
                                </div>
                                <input name="nominal" type="number"
                                    class="form-control" id="nominal_pendapatan_modal" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tgl_pendapatan">Tanggal Pendapatan<span class="text-red">*</span></label>
                            <input type="date" id="tgl_pendapatan_modal" name="tgl_pendapatan" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Kirim Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal edit data -->
<!-- MODAL PENDAPATAN -->
