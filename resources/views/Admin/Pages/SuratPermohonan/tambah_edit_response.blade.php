<link rel="stylesheet" href="{{asset('Admin/plugins/summernote/summernote-bs4.css')}}">
<link rel="stylesheet" href="{{asset('Admin/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('Admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('Admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">

<form
    action="{{request()->is('*/tambah*')?route('admin_surat_permohonan_tambah_post'):route('admin_surat_permohonan_edit_post',['id'=>$data['surat']->id])}}"
    method="POST" id="formaja" enctype="multipart/form-data">
    @csrf
    <div class="card">
        <h5 class="card-header">Keterangan dan Logo Surat</h5>
        <div class="card-body">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nama_surat">Nama Surat <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="nama_surat" name="jenis_surat" placeholder="Nama Surat"
                        value="{{request()->is('*/tambah*')?old('jenis_surat'):$data['surat']->jenis_surat}}">
                </div>
                <div class="col-md-6">
                    <label for="kode_surat">Kode Surat <span class="text-danger">*</span></label>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">NomerSurat/</span>
                        </div>
                        <input type="text" class="form-control" id="kode_surat" name="kode_surat"
                            placeholder="Kode Surat"
                            value="{{request()->is('*/tambah*')?old('kode_surat'):$data['surat']->tipe_surat}}">
                        <div class="input-group-prepend">
                            <span class="input-group-text">/Tahun</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <img id="img-logo" class="img-fluid" style="max-height: 250px;"
                        src="{{request()->is('*/tambah*')? asset('Admin/dist/img/Jgn Di Hapus/picture.svg'):asset($data['surat']->logo)}}"
                        alt="your image" />
                </div>
                <div class="col-md-8 d-flex">
                    <div class="form-group col-md-12 my-auto">
                        <label for="logo">Logo Surat <span class="text-danger">*</span></label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input input_img"
                                {{request()->is('*/tambah*')?"required":""}} name="logo" id="logo">
                            <label class="custom-file-label"
                                for="logo">{{request()->is('*/tambah*')?"Pilih Logo":$data['surat']->jenis_surat.".jpg"}}</label>
                            <small class="form-text text-muted">- Ukuran max 256KB</small>
                            <small class="form-text text-muted">- Harus berupa gambar (format: jpg, jpeg, svg,
                                png , dll)</small>
                        </div>
                        @error('logo')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header">
                    Atribut dan Keterangan Surat
                </h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h5>Pembuka Surat<span class="text-success">^</span></h5>
                            <div class="form-group">
                                <textarea id="keterangan_pembuka"
                                    name="keterangan_pembuka">{{request()->is('*/tambah*')?old('pembuka'):$data['surat']->keterangan_pembuka}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <h5 class="card-title">Pilih atribut yang akan ditampilkan pada surat<span
                                    class="text-danger">*</span></h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            {{-- <div class="form-check form-check-inline mb-3 mr-3">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                <label class="form-check-label" for="inlineCheckbox1">abc</label>
                            </div> --}}
                            <div class="form-group">
                                {{-- <label>Atribut</label> --}}
                                <select class="select2bs4" multiple="multiple"
                                    data-placeholder="Pilih atribut yang akan ditampilkan pada surat"
                                    style="width: 100%;" name="atribut[]" id="atribut" required>
                                    @foreach ($data['kolom_penduduk'] as $d)
                                    @if($d == "id" || $d== "no_kitas" || $d == "shdrt" || $d == "id_kartu_keluarga" ||
                                    $d == "id_data_ktp" || $d == "id_kematian" || $d == "deleted_at" || $d ==
                                    "created_at" || $d == "updated_at")
                                    @php
                                    continue;
                                    @endphp
                                    @endif
                                    @if(request()->is('*/tambah*'))
                                    <option value="{{$d}}">{{str_replace('_',' ',$d)}}</option>
                                    @else
                                    @if(in_array($d,$data['surat']->attribute))
                                    <option value="{{$d}}" selected="selected">{{str_replace('_',' ',$d)}}</option>
                                    @else
                                    <option value="{{$d}}">{{str_replace('_',' ',$d)}}</option>
                                    @endif
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 mt-2">
                            <h5>Keterangan Surat <span class="text-danger">*</span><span class="text-success">^</span>
                            </h5>
                            <div class="form-group">
                                <textarea id="keterangan"
                                    name="keterangan">{{request()->is('*/tambah*')?old('keterangan'):$data['surat']->keterangan}}</textarea>
                            </div>
                        </div>
                        <div class="col-md-12 mt-2">
                            <small><span class="text-success">^</span> : Jika pada pembukaan dan keterangan ingin
                                menyertakan data penduduk, tambahkan
                                <strong>{nama_atribut}</strong> sesuai dengan nama atribut yang
                                tersedia pada list atribut dibawah. Misal: {nama} atau {tgl lahir}.</small>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card" id="ttd">
                <h5 class="card-header">
                    Tanda Tangan
                </h5>
                <div class="card-body">
                    <div class="row">
                        <p class="card-title">Anda dapat memasukkan foto tanda tangan. Kosongkan jika tidak diperlukan.
                        </p>
                    </div>
                    <div class="row d-block">
                        <p>Contoh hasil:</p>
                        <p class="mb-0"><b>Kepala Desa Gunung Samarinda</b></p>
                        <img src="{{asset('Admin/dist/img/Jgn Di Hapus/ttd.png')}}" alt="">
                        <p>Ihza Ahmad S.T.</p>
                    </div>
                    <div class="row">

                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    Kiri
                                </div>
                                <div class="card-body">
                                    <textarea class="summernote" id="ttd1"
                                        name="ttd1">{{request()->is('*/tambah*')? '':$data['surat']->ttd_kiri}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    Tengah
                                </div>
                                <div class="card-body">
                                    <textarea class="summernote" id="ttd2"
                                        name="ttd2">{{request()->is('*/tambah*')? '':$data['surat']->ttd_tengah}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    Kanan
                                </div>
                                <div class="card-body">
                                    <textarea class="summernote" id="ttd3"
                                        name="ttd3">{{request()->is('*/tambah*')? '':$data['surat']->ttd_kanan}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <p class="mb-0"><strong>Saran: agar hasil maksimal, atur ukuran gambar tanda tangan menjadi
                                    50%!</strong>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row d-flex">
        <div class="col-md-6 mx-auto">
            <button class="btn btn-block btn-outline-dark" type="button" id="btn_preview">Preview</button>
            <button class="btn btn-block btn-outline-dark" type="submit">Simpan</button>
        </div>
    </div>
</form>
<div id="modal_preview" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="min-width: 1300px !important;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Preview Surat</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="overflow-x: auto;">
                @include('Admin.Template.Surat Permohonan.Preview')
            </div>
        </div>
    </div>
</div>

<script src="{{asset('Admin/plugins/summernote/summernote-bs4.min.js')}}"></script>
<script src="{{asset('Admin/plugins/select2/js/select2.full.min.js')}}"></script>
<script src="{{asset('Admin/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('Admin/plugins/jquery-validation/additional-methods.min.js')}}"></script>
<script src="{{asset('Admin/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="{{asset('Admin/dist/js/pages/surat_permohonan_tambah_edit.blade.js')}}"></script>
