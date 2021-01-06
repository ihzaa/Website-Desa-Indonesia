
<!--Modal create data-->
<div class="modal fade" id="createModalBidang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title">Tambah Data Bidang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formCreatePembiayaan" action="{{route('admin_arsip_keuangan_kelola_bidang_store', $idTahun)}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="callout callout-info">
                        <p>Cash On Hand</p>
                        <h5><strong>Rp{{number_format($tahun->cash_on_hand, 0, ',', '.')}}</strong></h5>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="jenis_pembiayaan">Nama Bidang<span class="text-red">*</span></label>
                            <input type="text" name="nama_bidang" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="uang_bagian">Uang Bagian<span class="text-red">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp. </span>
                            </div>
                            <input name="uang_bagian" type="number" class="form-control" required>
                        </div>
                        <small>Uang bagian tidak boleh melebihi dari cash on hand</small>
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
<div class="modal fade" id="deleteModalBidang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-danger">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formDeleteBidang" action="" method="post">
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
<div class="modal fade" id="editModalBidang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title">Edit Data Bidang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formEditBidang" action="" method="post">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="callout callout-info">
                        <p>Cash On Hand</p>
                        <h5><strong>Rp{{number_format($tahun->cash_on_hand, 0, ',', '.')}}</strong></h5>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="jenis_pembiayaan">Nama Bidang<span class="text-red">*</span></label>
                            <input type="text" name="nama_bidang" id="nama_bidang_modal" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cash_on_hand">Uang Bagian<span class="text-red">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp. </span>
                            </div>
                            <input name="uang_bagian" type="number" class="form-control" id="uang_bidang_modal" required>
                        </div>
                        <small>Uang bagian tidak boleh melebihi dari cash on hand</small>
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
