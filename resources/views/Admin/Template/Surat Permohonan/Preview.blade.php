{{-- <div> --}}
<div style="min-width: 100%">
    <div style="text-align: center!important; min-width: 100%">
        <img src="" id="logo" alt="" style="
            position: absolute;
            left: 3rem;
            top: 1.5rem;
            height: 100px;
            max-width: 250px !important;
            ">
        <h3 style="text-transform: uppercase!important;margin-bottom: 0!important;">
            {{env('SURAT_KABKOT')}}</h3>
        <h3 style="text-transform: uppercase!important;margin-bottom: 0!important;">{{env('SURAT_KEC')}}</h3>
        <h1 style="text-transform: uppercase!important;margin-bottom: 0!important;">
            <strong>{{env('SURAT_KEL_DESA')}}</strong>
        </h1>
        <p style="margin-bottom: 0!important;font-size: 75%;">{{env('SURAT_ALAMAT')}}</p>
        <hr style="
            border-top: 2px solid rgba(0, 0, 0, 0.1);background-color: black;margin-bottom: 0!important;">
        <hr
            style="
            border-top: 1px solid rgba(0, 0, 0, 0.1);background-color: black;margin-top: 2px !important;margin-bottom: 0!important;">
    </div>
</div>
<div style="min-width: 100%;margin-top: 1.5rem!important;">
    <div style="text-align: center!important; min-width: 100%">
        <h4 style="text-transform: uppercase!important;margin-bottom: 0!important;"><u id="nama_surat"></u></h4>
    </div>
</div>
<div style="min-width: 100%">
    <div style="text-align: center!important; min-width: 100%">
        <h4 style="text-transform: uppercase!important;margin-bottom: 0!important;"><span id="kode_surat_preview"></span>/NomerSurat/<span
                id="kode_wilayah_preview"></span>/Tahun</h4>
    </div>
</div>
<div style="
margin-top: 1.5rem !important;
        margin-left: 3rem !important;
        margin-right: 3rem !important;">
    <div style="min-width: 100%">
        <p style="text-indent: 50px;margin-bottom: 0!important;" id="keterangan_pembuka">
        </p>
    </div>
</div>
<div style="min-width: 100%;margin-top: 1.5rem!important;padding-left: 3rem!important;padding-right: 3rem!important;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-right: -7.5px;
    margin-left: -7.5px;" id="atribut">
</div>
<div style="min-width: 100%;margin-top: 1.5rem!important;padding-left: 3rem!important;padding-right: 3rem!important;">
    <p style="margin-bottom: 0!important;" id="keterangan"></p>
</div>
<div style="
        margin-top: 1.5rem !important;
        margin-left: 3rem !important;
        margin-right: 3rem !important;
        text-align: right;
    " id="timestamp">
</div>
<div style="min-width: 100%;margin-top: 1.5rem!important;padding-left: 3rem!important;padding-right: 3rem!important;display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        margin-right: -7.5px;">
    <div style="flex: 0 0 33.333333%;max-width: 33.333333%;text-align: center!important;" id="kiri">
    </div>
    <div style="flex: 0 0 33.333333%;max-width: 33.333333%;text-align: center!important;" id="tengah">
    </div>
    <div style="flex: 0 0 33.333333%;max-width: 33.333333%;text-align: center!important;" id="kanan">
    </div>
</div>
{{-- </div> --}}
