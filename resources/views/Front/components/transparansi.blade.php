<section id="transparansi" class="transparansi section">
    <div class="container-fluid" data-aos="fade-up">

        <div class="section-title">
            <h2>Transparansi Dana Desa</h2>
            <p>Berikut merupakan data transparansi dana desa baik dana masuk maupun dana keluar.</p>
        </div>

        @if($transparansi->isNotEmpty())
        <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center align-items-stretch">
                <div class="transparansi-accordion-list">
                    <ul>
                        <li style="background-color: rgba(67, 86, 255, 0.685);" data-aos="fade-up" data-aos-delay="100">
                            <a data-toggle="collapse" href="#transparansi-list-1" data-accordion="chartPendapatan"
                                id="accordionPendapatan" class="text-white collapsed">
                                <h3 class="text-white">Dana Pendapatan</h3> Merupakan dana yang didapatkan oleh desa
                                untuk menjalankan rencana kegiatan desa. <i class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i>
                            </a>
                            <div id="transparansi-list-1" class="collapse" data-parent=".transparansi-accordion-list">
                                <hr class="bg-white">
                                <div class="card mt-2">
                                    <div class="table-responsive">
                                        <table class="table table-borderless table-striped table-light">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Jenis Pendapatan</th>
                                                    <th scope="col">Nominal Pendapatan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($transparansi as $data)
                                                @foreach($data->pendapatandesa->jenispendapatan as $datas)
                                                <tr>
                                                    <th scope="row">{{$loop->iteration}}</th>
                                                    <td>{{$datas->jenis_pendapatan}}</td>
                                                    <td>Rp. {{$datas->nominal_pendapatan}}</td>
                                                </tr>
                                                @endforeach
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li style="background-color: rgba(155, 67, 255, 0.685);" data-aos="fade-up"
                            data-aos-delay="100">
                            <a data-toggle="collapse" href="#transparansi-list-2" data-accordion="chartPembiayaan"
                                id="accordionPembiayaan" class="text-white collapsed">
                                <h3 class="text-white">Dana Pembiayaan</h3> Merupakan dana yang digunakan oleh desa
                                untuk membiayai rencana kegiatan yang dijalankan. <i
                                    class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i>
                            </a>
                            <div id="transparansi-list-2" class="collapse" data-parent=".transparansi-accordion-list">
                                <hr class="bg-white">
                                <div class="card mt-2">
                                    <div class="table-responsive">
                                        <table class="table table-borderless table-striped table-light">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Jenis Pembiayaan</th>
                                                    <th scope="col">Nominal Pembiayaan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($transparansi as $data)
                                                @foreach($data->pembiayaandesa->jenispembiayaan as $datas)
                                                <tr>
                                                    <th scope="row">{{$loop->iteration}}</th>
                                                    <td>{{$datas->jenis_pembiayaan}}</td>
                                                    <td>Rp. {{$datas->nominal_pembiayaan}}</td>
                                                </tr>
                                                @endforeach
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li style="background-color: rgba(255, 67, 130, 0.685);" data-aos="fade-up"
                            data-aos-delay="100">
                            <a data-toggle="collapse" href="#transparansi-list-3" data-accordion="chartBelanja"
                                id="accordionBelanja" class="text-white collapsed">
                                <h3 class="text-white">Dana Belanja</h3> Merupakan dana yang digunakan oleh desa untuk
                                membeli atau belanja suatu barang untuk menunjang kegiatan desa. <i
                                    class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i>
                            </a>
                            <div id="transparansi-list-3" class="collapse" data-parent=".transparansi-accordion-list">
                                <hr class="bg-white">
                                <div class="card mt-2">
                                    <div class="table-responsive">
                                        <table class="table table-borderless table-striped table-light">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Jenis Belanja</th>
                                                    <th scope="col">Nominal Belanja</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($transparansi as $data)
                                                @foreach($data->belanjadesa->jenisbelanja as $datas)
                                                <tr>
                                                    <th scope="row">{{$loop->iteration}}</th>
                                                    <td>{{$datas->jenis_belanja}}</td>
                                                    <td>Rp. {{$datas->nominal_belanja}}</td>
                                                </tr>
                                                @endforeach
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-6 d-flex flex-column justify-content-center align-items-stretch">
                <div data-aos="fade-up" data-aos-delay="100" id="chartAll" style="height: 500px;"></div>
                <div data-aos="fade-up" data-aos-delay="100" id="chartPendapatan" style="height: 500px; display: none;">
                </div>
                <div data-aos="fade-up" data-aos-delay="100" id="chartPembiayaan" style="height: 500px; display: none;">
                </div>
                <div data-aos="fade-up" data-aos-delay="100" id="chartBelanja" style="height: 500px; display: none;">
                </div>
            </div>
        </div>
        @endif
    </div>
</section>
    
@section('js_after')
<!-- Resources -->
<script src="{{asset('Front/vendor/amchart/core.js')}}"></script>
<script src="{{asset('Front/vendor/amchart/charts.js')}}"></script>
<script src="{{asset('Front/vendor/amchart/themes/kelly.js')}}"></script>
<script src="{{asset('Front/vendor/amchart/themes/animated.js')}}"></script>
<script>
    $("#accordionPendapatan,#accordionPembiayaan,#accordionBelanja").on("click", function () {
        if ($(this).attr('class') == "text-white collapsed") {
            $("#chartAll,#chartPendapatan,#chartPembiayaan,#chartBelanja").css("display", "none");
            $("#" + $(this).data("accordion")).css("display", "inline")
        } else {
            $("#chartPendapatan,#chartPembiayaan,#chartBelanja").css("display", "none");
            $("#chartAll").css("display", "inline");
        }
    }); 
</script>

<!-- CHART ALL -->
<script>
    am4core.ready(function () {

        // Themes begin
        am4core.useTheme(am4themes_kelly);
        am4core.useTheme(am4themes_animated);
        // Themes end

        var chart = am4core.create("chartAll", am4charts.PieChart3D);
        chart.hiddenState.properties.opacity = 0; // this creates initial fade-in
        chart.legend = new am4charts.Legend();

        chart.data = [
            {
                jenis: "Pendapatan Desa (Rp.)",
                nominal: {{$transparansi->isNotEmpty()? $transparansi[0]-> pendapatandesa -> total_pendapatan : '' }}
      },
        {
            jenis: "Pembiayaan Desa (Rp.)",
            nominal: {{ $transparansi->isNotEmpty()? $transparansi[0]-> pembiayaandesa -> total_pembiayaan : '' }}
      },
        {
            jenis: "Belanja Desa (Rp.)",
            nominal: {{ $transparansi->isNotEmpty()? $transparansi[0]-> belanjadesa -> total_belanja : ''  }}
      },    
    ];

    chart.innerRadius = 100;

    var series = chart.series.push(new am4charts.PieSeries3D());
    series.dataFields.value = "nominal";
    series.dataFields.category = "jenis";
    
    }); // end am4core.ready()
</script>

<!-- CHART PENDAPATAN -->
<script>
    am4core.ready(function () {

        // Themes begin
        am4core.useTheme(am4themes_kelly);
        am4core.useTheme(am4themes_animated);
        // Themes end

        var chart = am4core.create("chartPendapatan", am4charts.PieChart3D);
        chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

        chart.legend = new am4charts.Legend();

        chart.data = [
        @foreach($transparansi as $data)
        @foreach($data -> pendapatandesa -> jenispendapatan as $datas)
        { !!json_encode($datas -> only('jenis_pendapatan', 'nominal_pendapatan'))!! },
        @endforeach
        @endforeach
        ];

        chart.innerRadius = 100;

        var series = chart.series.push(new am4charts.PieSeries3D());
        series.dataFields.value = "nominal_pendapatan";
        series.dataFields.category = "jenis_pendapatan";

    }); // end am4core.ready()
</script>

<!-- CHART PEMBIAYAAN -->

<script>
    am4core.ready(function () {

        // Themes begin
        am4core.useTheme(am4themes_kelly);
        am4core.useTheme(am4themes_animated);
        // Themes end

        var chart = am4core.create("chartPembiayaan", am4charts.PieChart3D);
        chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

        chart.legend = new am4charts.Legend();

        chart.data = [
        @foreach($transparansi as $data)
        @foreach($data -> pembiayaandesa -> jenispembiayaan as $datas)
        { !!json_encode($datas -> only('jenis_pembiayaan', 'nominal_pembiayaan'))!! },
        @endforeach
        @endforeach
        ];

        chart.innerRadius = 100;

        var series = chart.series.push(new am4charts.PieSeries3D());
        series.dataFields.value = "nominal_pembiayaan";
        series.dataFields.category = "jenis_pembiayaan";

    }); // end am4core.ready()
</script>

<!-- CHART BELANJA -->

<script>
    am4core.ready(function () {

        // Themes begin
        am4core.useTheme(am4themes_kelly);
        am4core.useTheme(am4themes_animated);
        // Themes end

        var chart = am4core.create("chartBelanja", am4charts.PieChart3D);
        chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

        chart.legend = new am4charts.Legend();

        chart.data = [
        @foreach($transparansi as $data)
        @foreach($data -> belanjadesa -> jenisbelanja as $datas)
        { !!json_encode($datas -> only('jenis_belanja', 'nominal_belanja'))!! },
        @endforeach
        @endforeach
        ];

        chart.innerRadius = 100;

        var series = chart.series.push(new am4charts.PieSeries3D());
        series.dataFields.value = "nominal_belanja";
        series.dataFields.category = "jenis_belanja";

    }); // end am4core.ready()
</script>



@endsection