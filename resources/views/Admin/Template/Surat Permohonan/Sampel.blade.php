<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div style="min-width: 100%">
        <div style="text-align: center!important; min-width: 100%">
            <img src="{{url('Assets/'.$data->logo)}}" id="logo" alt="" style="
            position: absolute;
            left: 1rem;
            top: 1.5rem;
            height: 100px;
            max-width: 250px !important;
            ">
            <h3 style="text-transform: uppercase!important;margin-bottom: 0!important;">
                PEMERINTAH KABUPATEN BOGOR</h3>
            <h3 style="text-transform: uppercase!important;margin-bottom: 0!important;margin-top: 0!important;">
                KECAMATAN APAINI</h3>
            <h1 style="text-transform: uppercase!important;margin-bottom: 0!important;margin-top: 0!important;">
                <strong>DESA KONOHA</strong>
            </h1>
            <p style="margin-bottom: 0!important;margin-top: 0!important;">Jl. Soehat RT.2 No.12 Balikpapan Utara</p>
            <hr style="
            border-top: 2px solid rgba(0, 0, 0, 0.1);background-color: black;margin-bottom: 0!important;">
            <hr
                style="
            border-top: 1px solid rgba(0, 0, 0, 0.1);background-color: black;margin-top: 2px !important;margin-bottom: 0!important;">
        </div>
    </div>
    <div style="min-width: 100%;margin-top: 1.5rem!important;">
        <div style="text-align: center!important; min-width: 100%">
            <h4 style="text-transform: uppercase!important;margin-bottom: 0!important;margin-top: 0!important;"><u
                    id="nama_surat">{{$data->jenis_surat}}</u></h4>
        </div>
    </div>
    <div style="min-width: 100%">
        <div style="text-align: center!important; min-width: 100%">
            <h4 style="text-transform: uppercase!important;margin-bottom: 0!important;margin-top: 0!important;">
                NomerSurat/<span id="nomer_surat">{{$data->tipe_surat}}</span>/Tahun</h4>
        </div>
    </div>
    <div
        style="min-width: 100%;margin-top: 1.5rem!important;padding-left: 3rem!important;padding-right: 3rem!important;">
        <div style="min-width: 100%">
            <p style="text-indent: 50px;margin-bottom: 0!important;">Dengan ini Kepala Desa Konoha Kecamatan
                Apaini Kabupaten Bogor,
                menerangkan dengan sebenarnya bahwa :</p>
        </div>
    </div>
    <div style="min-width: 100%;margin-top: 1.5rem!important;padding-left: 3rem!important;padding-right: 3rem!important;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-right: -7.5px;
    margin-left: -7.5px;" id="atribut">
        @foreach ($data['attribute'] as $d)
        <div style="flex: 0 0 8.333333%;max-width: 8.333333%;">
        </div>
        <div style="flex: 0 0 25%;max-width: 25%;text-transform: capitalize;">
            {{str_replace('_',' ',$d)}}
        </div>
        <div style="flex: 0 0 66.666667%;max-width: 66.666667%;">
            : Sesuai Dengan Data Penduduk
        </div>
        @endforeach
    </div>
    <div
        style="min-width: 100%;margin-top: 1.5rem!important;padding-left: 3rem!important;padding-right: 3rem!important;">
        <p style="text-indent: 50px;margin-bottom: 0!important;" id="keterangan">
            @php
            echo $data->keterangan;
            @endphp</p>
    </div>
    <div style="min-width: 100%;margin-top: 1.5rem!important;padding-left: 3rem!important;padding-right: 3rem!important;display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        margin-right: -7.5px;">

        <div style="flex: 0 0 33.333333%;max-width: 33.333333%;text-align: center!important;" id="kiri">
            @php
            echo $data->ttd_kiri;
            @endphp
        </div>
        <div style="flex: 0 0 33.333333%;max-width: 33.333333%;text-align: center!important;" id="tengah">
            @php
            echo $data->ttd_tengah;
            @endphp
        </div>
        <div style="flex: 0 0 33.333333%;max-width: 33.333333%;text-align: center!important;" id="kanan">
            @php
            echo $data->ttd_kanan;
            @endphp
        </div>
    </div>

</body>

</html>
