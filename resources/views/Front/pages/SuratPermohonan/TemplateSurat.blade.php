<div style="width: 100%;font-family: 'Times New Roman';color: black;">
    <div style="text-align: center !important; min-width: 100%">
        <img src="{{asset($surat['logo'])}}" id="logo" alt="" style="
          position: absolute;
          left: 0.6rem;
          top: 1.5rem;
          height: 90px;
          max-width: 150px !important;
        " />
        <h3 style="
          text-transform: uppercase !important;
          margin-bottom: 0 !important;
        ">
            PEMERINTAH KABUPATEN MADIUN
        </h3>
        <h3 style="
          text-transform: uppercase !important;
          margin-bottom: 0 !important;
          margin-top: 0 !important;
        ">
            Kecamatan Geger
        </h3>
        <h1 style="
          text-transform: uppercase !important;
          margin-bottom: 0 !important;
          margin-top: 0 !important;
        ">
            <strong>DESA Sangen</strong>
        </h1>
        <p style="margin-bottom: 0 !important; margin-top: 0 !important;font-size: 75%;">
            Jl. Raya Ponorogo - Madiun No.10, Kembangsore, Sangen, Kec. Geger, Madiun, Jawa Timur
        </p>
        <hr style="
          border-top: 2px solid rgba(0, 0, 0, 0.1);
          background-color: black;
          margin-bottom: 0 !important;
        " />
        <hr style="
          border-top: 1px solid rgba(0, 0, 0, 0.1);
          background-color: black;
          margin-top: 2px !important;
          margin-bottom: 0 !important;
        " />
    </div>

    <div style="width: 100%; margin-bottom: 0 !important;margin-top: 1.5rem !important">
        <div style="text-align: center !important;margin-bottom: 0 !important;">
            <p style="
            margin-bottom: 0 !important;
            margin-top: 0 !important;
            font-size: 150%;
            ">
                <strong><u style="text-transform: uppercase !important;margin-bottom: 0 !important;
                    margin-top: 0 !important;">{{$surat['jenis_surat']}}</u></strong>
            </p>
        </div>
    </div>
    <div style="min-width: 100%;margin-top: 0 !important;">
        <div style="text-align: center !important; min-width: 100%;margin-top: 0 !important;">
            <p style="
            text-transform: uppercase !important;
            margin-bottom: 0 !important;
            margin-top: 0 !important;
            font-size: 150%;
          ">
                <strong>{{$surat['nomor']}}/<span
                        id="nomer_surat">{{$surat['tipe_surat']}}</span>/{{$surat['tahun']}}</strong>
            </p>
        </div>
    </div>
    <div style="
        margin-top: 1.5rem !important;
        margin-left: 3rem !important;
        margin-right: 3rem !important;
      ">
        <div style="min-width: 100%">
            <p style="text-indent: 50px; margin-bottom: 0 !important">
                Dengan ini Kepala Desa Sangen Kecamatan Geger Kabupaten Madiun,
                menerangkan dengan sebenarnya bahwa :
            </p>
        </div>
    </div>
    <div style="
        width: 100% !important;
        margin-top: 1.5rem !important;
        margin-left: 3rem !important;
        margin-right: 3rem !important;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
      " id="atribut">
        @foreach ($surat['attribute'] as $d)
        <div style="flex: 0 0 8%; width: 8%;;"></div>
        <div style="flex: 0 0 25%; width: 25%; text-transform: capitalize;">
            {{str_replace('_',' ',$d)}}
        </div>
        <div style="flex: 0 0 66%; width: 66%;">:
            @php
            echo $penduduk->$d
            @endphp
        </div>
        @endforeach
    </div>
    <div style="
        margin-top: 1.5rem !important;
        margin-left: 3rem !important;
        margin-right: 3rem !important;
      ">
        <p style="text-indent: 50px; margin-bottom: 0 !important" id="keterangan">
            @php
            echo $surat['keterangan'];
            @endphp
        </p>
    </div>

    <div style="
        margin-top: 1.5rem !important;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
      ">
        <div style="
          flex: 0 0 33%;
          max-width: 33%;
          text-align: center !important;
        " id="kiri">
            @php
            echo $surat['ttd_kiri'];
            @endphp
        </div>
        <div style="
          flex: 0 0 33%;
          max-width: 33%;
          text-align: center !important;
        " id="tengah">
            @php
            echo $surat['ttd_tengah'];
            @endphp
        </div>
        <div style="
          flex: 0 0 33%;
          max-width: 33%;
          text-align: center !important;
        " id="kanan">
            @php
            echo $surat['ttd_kanan'];
            @endphp
        </div>
    </div>
</div>
