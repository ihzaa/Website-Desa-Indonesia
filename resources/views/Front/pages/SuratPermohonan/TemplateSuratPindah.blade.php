<div style="width: 100%; font-family: 'Times New Roman'; color: black" class="px-4">
    <h4 class="text-center"><strong>SURAT PENGANTAR PINDAH</strong></h4>
    <br>
    <p>Yang bertanda tangan dibawah ini adalah:</p>
    <table class="ml-4">
        <tbody>
            <tr>
                <td style="width: 5%">1</td>
                <td style="width: 40%">NIK Kepala Keluarga</td>
                <td style="width: 5%">:</td>
                <td style="width: 60%">{{$kk['nik']->nik}}</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Nama Kepala</td>
                <td>:</td>
                <td>{{$kk["nama"]->nama}}</td>
            </tr>
            <tr>
                <td style="vertical-align: top">3</td>
                <td style="vertical-align: top">Alamat Sekarang</td>
                <td style="vertical-align: top">:</td>
                <td>
                    <table>
                        <tbody>
                            <tr>
                                <td colspan="100">RT. {{$penduduk->rt}} RW {{$penduduk->rw}}</td>
                            </tr>
                            <tr>
                                <td style="width: auto">Desa/</td>
                                <td style="width: auto">:</td>
                                <td style="width: auto">{{$penduduk->desa_kelurahan}}</td>
                            </tr>
                            <tr>
                                <td style="width: auto">Kec.</td>
                                <td style="width: auto">:</td>
                                <td style="width: auto">{{$penduduk->kecamatan}}</td>
                            </tr>
                            <tr>
                                <td style="width: auto">Kab./</td>
                                <td style="width: auto">:</td>
                                <td style="width: auto">{{$penduduk->kabupaten_kota}}</td>
                            </tr>
                            <tr>
                                <td style="width: auto">Prop.</td>
                                <td style="width: auto">:</td>
                                <td style="width: auto">{{$penduduk->provinsi}}</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="vertical-align: top">4</td>
                <td style="vertical-align: top">Alamat Tujuan Pindah</td>
                <td style="vertical-align: top">:</td>
                <td>
                    <table>
                        <tbody>
                            <tr>
                                <td colspan="100">RT. {{$pindah["rt"]}} RW {{$pindah["rw"]}}</td>
                            </tr>
                            <tr>
                                <td style="width: auto">Desa/</td>
                                <td style="width: auto">:</td>
                                <td style="width: auto">{{$pindah['kel']}}</td>
                            </tr>
                            <tr>
                                <td style="width: auto">Kec.</td>
                                <td style="width: auto">:</td>
                                <td style="width: auto">{{$pindah['kec']}}</td>
                            </tr>
                            <tr>
                                <td style="width: auto">Kab./</td>
                                <td style="width: auto">:</td>
                                <td style="width: auto">{{$pindah['kota']}}</td>
                            </tr>
                            <tr>
                                <td style="width: auto">Prop.</td>
                                <td style="width: auto">:</td>
                                <td style="width: auto">{{$pindah['prov']}}</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="width: 5%">5</td>
                <td style="width: 40%">Keluarga yang Pindah</td>
                <td style="width: 5%">:</td>
                <td style="width: 60%"></td>
            </tr>
        </tbody>
    </table>
    <table border="1" style="width: 100%">
        <thead>
            <tr>
                <th style="width: 10%">No</th>
                <th style="width: 60%">Nama</th>
                <th style="width: 30%">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @php
            $i = 1;
            @endphp
            @foreach ($kk['anggota'] as $a)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$a->nama}}</td>
                <td>{{$a->shdrt}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <br />
    <p>
        Demikian Surat Pengantar Pindah ini agar dipergunakan sebagaimana
        mestinya.
    </p>
    <br />
    <div class="pr-4">
        <p class="text-right">{{$penduduk->desa_kelurahan}}, {{$data['tgl']}}</p>
        <div class="row">
            <div class="col-6"></div>
            <div class="col-3">
                <p>Ketua RT {{$penduduk->rt}}</p>
                <br />
                <br />
                <br />
                <p>.....................</p>
            </div>
            <div class="col-3">
                <p>Ketua RW {{$penduduk->rw}}</p>
                <br />
                <br />
                <br />
                <p>.....................</p>
            </div>

        </div>
    </div>
</div>
