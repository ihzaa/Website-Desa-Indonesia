
<!--Modal create data-->
<div class="modal fade" id="createModalBelanja" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title">Tambah Data Belanja</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formCreateBelanja"
                action="{{route('admin_kelola_transparansi_store_belanja', $transparansi[0]->id)}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="jenis_belanja">Jenis Belanja</label>
                            <textarea name="jenis_belanja" id="jenis_belanja" cols="30" rows="3"
                                class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="jenis_belanja">Nominal Belanja</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp. </span>
                                </div>
                                <input name="nominal_belanja" type="number" id="nominal_belanja"
                                    class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Kirim Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal create data -->


<!--Modal delete data-->
<div class="modal fade" id="deleteModalBelanja" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-danger">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formDeleteBelanja" action="" method="post">
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
<div class="modal fade" id="editModalBelanja" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Belanja</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editFormBelanja"
                action="{{route('admin_kelola_transparansi_store_belanja', $transparansi[0]->id)}}" method="post">
                @csrf
                @method('put')
                <div class="modal-body">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="jenis_belanja">Jenis Belanja</label>
                            <textarea name="jenis_belanja" id="modal_jenis_belanja" cols="30" rows="3"
                                class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="jenis_belanja">Nominal Belanja</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp. </span>
                                </div>
                                <input name="nominal_belanja" type="number" id="modal_nominal_belanja"
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
<!-- /Attachment Modal -->
