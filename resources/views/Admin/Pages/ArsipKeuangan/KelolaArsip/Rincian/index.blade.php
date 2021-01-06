@extends('Admin.Template.all')

@section('page_title', 'Rincian Belanja Bidang '.$bidang->nama_bidang.' Tahun '.$tahun)

@section('breadcumb')
    <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin_arsip_keuangan_index') }}">Tahun Arsip Keuangan</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin_arsip_keuangan_kelola_index', $idTahun) }}">Kelola Arsip Keuangan</a></li>
    <li class="breadcrumb-item active">Rincian Belanja</li>
@endsection

@section('css_before')
    <link rel="stylesheet" href="{{ asset('Admin/plugins/tempusdominus/tempusdominus.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Admin/plugins/bootstrap-toggle/bootstrap-toggle.min.css') }}">
@endsection

@section('content')
    <div class="callout callout-info">
        <h5>Cash On Hand Bidang</h5>
        <h3><strong>Rp{{number_format(floor($bidang->cash_on_hand), 0, ',', '.')}}</strong></h3>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h3 class="card-title m-2">Daftar Rincian Belanja</h3>
                <button class="btn btn-primary btn-sm btn-create" data-toggle="modal" data-target="#createModal"><i
                        class="fas fa-plus"></i>&nbsp;Tambah Data Rincian</button>

            </div>

        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success mt-2">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{ session('success') }}
                </div>
            @endif
            @if (session('failed'))
                <div class="alert alert-danger mt-2">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{ session('failed') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <table id="dfUsageTable" class="table table-bordered table-striped" data-form="deleteForm">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th width="5%">#</th>
                        <th>Pos Belanja</th>
                        <th>Rincian</th>
                        <th>Nominal</th>
                        <th>Pajak</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rincian as $data)
                        <tr>
                            <td>{{$data->id}}</td>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$data->PosArsipKeuangan->nama_pos}}</td>
                            <td>{{$data->rincian}}</td>
                            <td>{{$data->nominal != null ? 'Rp'.number_format($data->nominal,0,'.,','.') : '-'}}</td>
                            <td>{{$data->pajak != null ? $data->pajak.'%' : '-'}}</td>
                            <td>{{'Rp'.number_format($data->nominal-($data->pajak*$data->nominal/100), 0, ',', '.')}}</td>
                            <td>
                                <button class="btn btn-warning editModal"><i class="fas fa-edit"></i>Ubah Data</button>
                                <button class="btn btn-danger deleteModal" data-id="{{$data->id}}"><i class="fas fa-trash"></i> Hapus
                                    Data</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!--Modal create data-->
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Rincian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formCreate" action="{{Route('admin_arsip_keuangan_kelola_rincian_store', [$idTahun, $idBidang])}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="pos_belanja_id">Pos Belanja<span class="text-red">*</span></label>
                            <select name="pos_belanja_id" class="form-control" required>
                                @foreach($pos as $data)
                                    <option value="{{$data->id}}">{{$data->nama_pos}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="rincian">Rincian<span class="text-red">*</span></label>
                            <textarea name="rincian" class="form-control" cols="30" rows="5" required></textarea>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="nominal">Nominal <span><small>(kosongkan jika tidak memiliki nominal)</small></span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp. </span>
                                        </div>
                                        <input name="nominal" type="number" class="form-control nominal">
                                    </div>
                                    <small>Uang bagian tidak boleh melebihi dari cash on hand bidang {{$bidang->nama_bidang}}</small>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="pajak">Pajak <span><small>(kosongkan jika tidak memiliki pajak)</small></span></label>
                                    <div class="input-group">
                                        <input name="pajak" type="number" min="0" max="100" class="form-control pajak">
                                        <div class="input-group-append">
                                            <span class="input-group-text">%</span>
                                        </div>
                                    </div>
                                    <small>Uang bagian tidak boleh melebihi dari cash on hand bidang {{$bidang->nama_bidang}}</small>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <h4><strong>Rincian Biaya</strong></h4>
                            <table class="table">
                                <tr>
                                    <td>Nominal (Rp)</td>
                                    <td>Pajak (%)</td>
                                    <td>Nominal Pajak (Rp)</td>
                                    <td>Total (Rp)</td>
                                    <td>Cash On Hand (Rp)</td>
                                </tr>
                                <tr>
                                    <td class="table_nominal_rincian">0</td>
                                    <td class="table_pajak_rincian">0</td>
                                    <td class="table_nominal_pajak_rincian">0</td>
                                    <td class="table_total_rincian">0</td>
                                    <td class="table_cash_on_hand_rincian">0</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success btn_modal">Tambahkan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--Modal edit data-->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data Arsip</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formedit" action="/" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="pos_belanja_id">Pos Belanja<span class="text-red">*</span></label>
                            <select name="pos_belanja_id" id="pos_belanja_id_edit" class="form-control" required>
                                @foreach($pos as $data)
                                    <option value="{{$data->id}}">{{$data->nama_pos}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="rincian">Rincian<span class="text-red">*</span></label>
                            <textarea name="rincian" id="rincian_edit" class="form-control" cols="30" rows="5" required></textarea>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="nominal">Nominal <span><small>(kosongkan jika tidak memiliki nominal)</small></span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp. </span>
                                        </div>
                                        <input name="nominal" type="number" id="nominal_edit" class="form-control nominal">
                                    </div>
                                    <small>Uang bagian tidak boleh melebihi dari cash on hand bidang {{$bidang->nama_bidang}}</small>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="pajak">Pajak <span><small>(kosongkan jika tidak memiliki pajak)</small></span></label>
                                    <div class="input-group">
                                        <input name="pajak" type="number" id="pajak_edit" min="0" max="100" class="form-control pajak">
                                        <div class="input-group-append">
                                            <span class="input-group-text">%</span>
                                        </div>
                                    </div>
                                    <small>Uang bagian tidak boleh melebihi dari cash on hand bidang {{$bidang->nama_bidang}}</small>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <h4><strong>Rincian Biaya</strong></h4>
                            <table class="table">
                                <tr>
                                    <td>Nominal (Rp)</td>
                                    <td>Pajak (%)</td>
                                    <td>Nominal Pajak (Rp)</td>
                                    <td>Total (Rp)</td>
                                    <td>Cash On Hand (Rp)</td>
                                </tr>
                                <tr>
                                    <td class="table_nominal_rincian">0</td>
                                    <td class="table_pajak_rincian">0</td>
                                    <td class="table_nominal_pajak_rincian">0</td>
                                    <td class="table_total_rincian">0</td>
                                    <td class="table_cash_on_hand_rincian">0</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success btn_modal">Edit Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!--Modal delete data-->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formDelete" action="/" method="post">
                    @method('delete')
                    @csrf
                    <div class="modal-body">
                        <p>Anda yakin ingin menghapus konten berita tersebut ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js_after')
    <script src="{{ asset('Admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('Admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('Admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('Admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('Admin/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('Admin/plugins/tempusdominus/tempusdominus.min.js') }}"></script>
    <script src="{{ asset('Admin/plugins/bootstrap-toggle/bootstrap-toggle.min.js') }}"></script>
    <script>
        $(function() {
            var total_rincian=0;
            var nominal_rincian=0;
            var pajak_rincian=0;
            var cash_on_hand=0;

            var table = $("#dfUsageTable").DataTable({
                "responsive": true,
                "autoWidth": false,
                "columnDefs":[{
                    "targets": [0],
                    "visible": false
                }]
            });

            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function() {
                    $(this).remove();
                });
            }, 10000);

            $('#tahun').datetimepicker({
                format: 'YYYY'
            });

            $('.deleteModal').click(function() {
                let id = $(this).data('id');
                $('#formDelete').attr('action', '/4dm1n/arsip-keuangan/' + {{$idTahun}} + '/kelola/' + {{$idBidang}} + '/' + id);
                $('#deleteModal').modal('show');
            });

            table.on('click', '.editModal', function() {
                $tr = $(this).closest('tr');
                if ($($tr).hasClass('child')) {
                    $tr = $tr.prev('.parent');
                }
                var data = table.row($tr).data();
                var nominal_edit = data[4].replace("Rp", "").replaceAll('.','')
                var pajak_edit = data[5].replace("%","");
                $('#pos_belanja_edit').val(data[2]);
                $('#rincian_edit').html(data[3])
                $('#nominal_edit').val(nominal_edit)
                $('#pajak_edit').val(pajak_edit)
                if(data[4]!='-'){
                    nominal_rincian=nominal_edit
                }else{
                    nominal_rincian=0
                }
                if(data[5]!='-'){
                    pajak_rincian=pajak_edit
                }else{
                    pajak_rincian=0
                }
                cash_on_hand=parseInt({{$bidang->cash_on_hand}})
                kalkulasi_rincian()

                $('#formedit').attr('action', '/4dm1n/arsip-keuangan/'+{{$idTahun}}+'/kelola/'+{{$idBidang}}+'/'+data[0]);
                $('#editModal').modal('show')
            })

            $('.btn-create').click(function(){
                nominal_rincian=0
                pajak_rincian=0
                cash_on_hand = parseInt({{$bidang->cash_on_hand}})
                kalkulasi_rincian()
            });
            
            $('.nominal').on('input', function(){
                nominal_rincian=$(this).val()
                cash_on_hand=parseInt({{$bidang->cash_on_hand}})
                kalkulasi_rincian()
            })

            $('.pajak').on('input', function(){
                pajak_rincian=$(this).val()
                kalkulasi_rincian()
            })

            function kalkulasi_rincian(){
                $('.table_nominal_rincian').html(formatRupiah(nominal_rincian.toString()))
                $('.table_pajak_rincian').html(pajak_rincian)
                let nominal_pajak = parseInt(nominal_rincian*pajak_rincian/100)
                let kalkulasi = parseInt(nominal_rincian-nominal_pajak)
                $('.table_nominal_pajak_rincian').html(formatRupiah(nominal_pajak.toString()))
                cash_on_hand=cash_on_hand-kalkulasi
                if(kalkulasi>=0){
                    $('.table_total_rincian').html(formatRupiah(kalkulasi.toString()))
                    $('.btn_modal').attr('disabled', false);
                }else{
                    $('.table_total_rincian').html('Error')
                    $('.btn_modal').attr('disabled', true);
                }
                if(nominal_pajak==0 && pajak_rincian!=0){
                    $('.table_total_rincian').html('Error')
                    $('.btn_modal').attr('disabled', true);                 
                }
                if(cash_on_hand>=0){
                    $('.table_cash_on_hand_rincian').html(formatRupiah(cash_on_hand.toString()))
                }else{
                    $('.table_cash_on_hand_rincian').html('Error')
                    $('.btn_modal').attr('disabled', true);
                }
            }

            function formatRupiah(angka, prefix){
                // alert(angka)
                var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split   		= number_string.split(','),
                sisa     		= split[0].length % 3,
                rupiah     		= split[0].substr(0, sisa),
                ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
    
                // tambahkan titik jika yang di input sudah menjadi angka ribuan
                if(ribuan){
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
    
                rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                return 'Rp'+rupiah;
		    }
        });
    </script>
@endsection
