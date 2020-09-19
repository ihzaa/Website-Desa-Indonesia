<section id="perangkatdesa" class="team section-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Badan Permusyawaratan Desa</h2>
        </div>

        <div class="row justify-content-center">
            @if(count($bpds) !== 0)
                @foreach($bpds as $bpd)
                    <div class="col-lg-3 col-md-5 col-9" data-aos="fade-up" data-aos-delay="100">
                        <div class="card mb-5 mb-lg-0">
                            <div class="card-body">
                                <h4 class="card-title text-muted text-uppercase text-center">{{$bpd->nama}}</h4>
                                <hr>
                                <div class="row justify-content-center">
                                    <img class="img-fluid"
                                         src="{{url('storage/images/bpd/' . $bpd->photo)}}"
                                         style="width: 70%;height: 12rem;object-fit: scale-down;" alt="{{$bpd->nama}}">
                                </div>
                                <hr class="mb-3">
                                <div class="text-center">
                                    <button class="btn"
                                            style="font-size: 0.7em; padding: 8px 16px 8px 16px">{{strtoupper($bpd->jabatan)}}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div style="width: 100%">
                    <p class="text-center text-secondary">Belum ada data</p>
                </div>
            @endif
        </div>

    </div>
</section>
