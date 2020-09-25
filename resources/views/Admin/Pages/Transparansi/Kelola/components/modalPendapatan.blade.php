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
            <form id="formCreatePendapatan"
                action="{{route('admin_kelola_transparansi_store_pendapatan', $transparansi[0]->id)}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="jenis_pendapatan">Jenis Pendapatan</label>
                            <textarea name="jenis_pendapatan" id="jenis_pendapatan" cols="30" rows="3"
                                class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="jenis_pendapatan">Nominal Pendapatan</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp. </span>
                                </div>
                                <input name="nominal_pendapatan" type="number" id="nominal_pendapatan"
                                    class="form-control" required>
                            </div>
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
            <form id="formDeletePendapatan" action="" method="post">
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

<!-- Attachment Modal -->
<div class="modal fade" id="editModalPendapatan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data Pendapatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editFormPendapatan"
                action="{{route('admin_kelola_transparansi_store_pendapatan', $transparansi[0]->id)}}" method="post">
                @csrf
                @method('put')
                <div class="modal-body">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="jenis_pendapatan">Jenis Pendapatan</label>
                            <textarea name="jenis_pendapatan" id="modal_jenis_pendapatan" cols="30" rows="3"
                                class="form-control required"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="jenis_pendapatan">Nominal Pendapatan</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp. </span>
                                </div>
                                <input name="nominal_pendapatan" type="number" id="modal_nominal_pendapatan"
                                    class="form-control required">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-warning">Kirim Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /Attachment Modal -->

<!-- MODAL PENDAPATAN -->
