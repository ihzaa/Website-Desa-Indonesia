
<!--Modal create data-->
<div class="modal fade" id="createModalPembiayaan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title">Tambah Data Pembiayaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formCreatePembiayaan"
                action="{{route('admin_kelola_transparansi_store_pembiayaan', $transparansi[0]->id)}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="jenis_pembiayaan">Jenis Pembiayaan</label>
                            <textarea name="jenis_pembiayaan" id="jenis_pembiayaan" cols="30" rows="3"
                                class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="jenis_pembiayaan">Nominal Pembiayaan</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp. </span>
                                </div>
                                <input name="nominal_pembiayaan" type="number" id="nominal_pembiayaan"
                                    class="form-control" required>
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
<!-- Modal create data -->


<!--Modal delete data-->
<div class="modal fade" id="deleteModalPembiayaan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-danger">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formDeletePembiayaan" action="" method="post">
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
<div class="modal fade" id="editModalPembiayaan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data Pembiayaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editFormPembiayaan"
                action="{{route('admin_kelola_transparansi_store_pembiayaan', $transparansi[0]->id)}}" method="post">
                @csrf
                @method('put')
                <div class="modal-body">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="jenis_pembiayaan">Jenis Pembiayaan</label>
                            <textarea name="jenis_pembiayaan" id="modal_jenis_pembiayaan" cols="30" rows="3"
                                class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="jenis_pembiayaan">Nominal Pembiayaan</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp. </span>
                                </div>
                                <input name="nominal_pembiayaan" type="number" id="modal_nominal_pembiayaan"
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

