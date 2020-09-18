@extends('Admin.Template.all')

@section('page_title','Dashboard')

@section('breadcumb')
<li class="breadcrumb-item">Dashboard</li>
@endsection

@section('content')
<div class="row d-flex">
    <div class="col-md-3 col-sm-6 col-12 my-auto">
        <div class="row">
            <div class="col-md-12">
                <div class="info-box bg-gradient-info">
                    <span class="info-box-icon"><i class="fa fa-id-card"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Kartu Keluarga</span>
                        <span class="info-box-number">{{$data['totak_kk']}}</span>

                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="info-box bg-gradient-warning">
                    <span class="info-box-icon"><i class="fa fa-id-badge"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Calon Pemilih</span>
                        <span class="info-box-number">{{$data['total_pemilih'][0]->age}}</span>

                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-12 my-auto">
        <div class="row">
            <div class="col-md-12">
                <div class="info-box bg-gradient-success">
                    <span class="info-box-icon"><i class="fa fa-user"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Penduduk</span>
                        <span class="info-box-number">{{$data['total_penduduk']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="info-box bg-gradient-secondary">
                    <span class="info-box-icon"><i class="fas fa-user-times"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Penduduk Meninggal</span>
                        <span class="info-box-number">{{$data['total_meninggal']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-6 col-sm-6 col-12 my-auto">
        <div class="row">
            <div class="col-md-12">
                <div class="info-box bg-gradient-danger">
                    <span class="info-box-icon"><i class="fas fa-female"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Penduduk Perempuan</span>
                        <span class="info-box-number">{{$data['total_penduduk_perempuan']}}</span>

                        <div class="progress">
                            <div class="progress-bar"
                                style="width: @php try{echo( $data['total_penduduk_perempuan']/$data['total_penduduk']*100);}catch(Exception $e){echo 0;} @endphp%">
                            </div>
                        </div>
                        <span class="progress-description">
                            @php try{echo(
                            round($data['total_penduduk_perempuan']/$data['total_penduduk']*100));}catch(Exception
                            $e){echo 0;} @endphp %
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="info-box bg-gradient-primary">
                    <span class="info-box-icon"><i class="fa fa-male"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Penduduk Laki-Laki</span>
                        <span class="info-box-number">{{$data['total_penduduk_laki']}}</span>

                        <div class="progress">
                            <div class="progress-bar"
                                style="width: @php try{echo( $data['total_penduduk_laki']/$data['total_penduduk']*100);}catch(Exception $e){echo 0;} @endphp%"></div>
                        </div>
                        <span class="progress-description">
                            @php try{echo(
                                round($data['total_penduduk_laki']/$data['total_penduduk']*100));}catch(Exception
                                $e){echo 0;} @endphp %
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
        </div>

        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    {{-- <div class="col-md-3 col-sm-6 col-12 my-auto">

        <!-- /.info-box -->
    </div> --}}
    <!-- /.col -->
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Rekapitulasi Surat Permohonan</h5>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <p class="text-center">
                            <strong>Pembuatan Surat Tahun {{date('Y')}}</strong>
                        </p>

                        {{-- <div class="chart">
                            <!-- Sales Chart Canvas -->
                            <canvas id="salesChart" height="180" style="height: 180px;"></canvas>
                        </div> --}}
                        <div class="position-relative mb-4">
                            <canvas id="visitors-chart" height="200"></canvas>
                        </div>
                        <!-- /.chart-responsive -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4">
                        <p class="text-center">
                            <strong>Surat Diunduh Terbanyak Tahun {{date('Y')}}</strong>
                        </p>
                        @php
                        $warna = ['primary','success','danger','info','secondary'];
                        @endphp
                        @foreach ($data['surat_tebanyak'] as $d)
                        <div class="progress-group">
                            {{$d->jenis_surat}}
                            <span
                                class="float-right"><b>{{$d->arsip_surat_penduduks_count}}</b>/{{$data['total_surat_tahun']}}</span>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-{{$warna[$loop->index]}}"
                                    style="width: {{$d->arsip_surat_penduduks_count/$data['total_surat_tahun']*100}}%">
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- ./card-body -->
            <div class="card-footer">
                <div class="row">
                    <div class="col-sm-4 col-12">
                        <div class="description-block border-right">
                            {{-- <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 17%</span> --}}
                            <h5 class="description-header">{{$data['total_surat_tahun']}}</h5>
                            <span class="description-text">SURAT DIUNDUH TAHUN {{date('Y')}}</span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 col-12">
                        <div class="description-block border-right">
                            {{-- <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i>
                                0%</span> --}}
                            <h5 class="description-header">{{$data['total_surat_semua']}}</h5>
                            <span class="description-text">TOTAL SURAT DIUNDUH</span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 col-12">
                        <div class="description-block">
                            {{-- <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i>
                                18%</span> --}}
                            <h5 class="description-header">{{$data['total_surat']}}</h5>
                            <span class="description-text">TOTAL SURAT PERMOHONAN</span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
@endsection

@section('js_after')
<script src="{{asset('Admin/plugins/chart.js/Chart.min.js')}}"></script>
<script>
    let total_surat_tahun = @json($data['surat_bulanan']) ;
</script>
<script src="{{asset('Admin/dist/js/pages/dashboard_index.js')}}"></script>
@endsection
