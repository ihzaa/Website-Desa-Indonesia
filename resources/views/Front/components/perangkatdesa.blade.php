<section id="perangkatdesa" class="buy-tickets section-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Perangkat Desa Sangen</h2>
        </div>

        <div class="row justify-content-center">

            @if(count($perangkats) !== 0)
                @foreach($perangkats as $perangkat)
                    <div class="col-lg-3" data-aos="fade-up" data-aos-delay="100">
                        <div class="card mb-5 mb-lg-0">
                            <div class="card-body">
                                <h4 class="card-title text-muted text-uppercase text-center">{{$perangkat->nama}}</h4>
                                <hr>
                                <div class="row justify-content-center">
                                    <img class="img-fluid"
                                         src="{{url('storage/images/perangkat/' . $perangkat->photo)}}"
                                         style="width: 70%;height: 12rem;object-fit: cover;" alt="{{$perangkat->nama}}">
                                </div>
                                <hr class="mb-3">
                                <div class="text-center">
                                    <button class="btn"
                                            style="font-size: 0.7em; padding: 8px 16px 8px 16px">{{strtoupper($perangkat->jabatan)}}</button>
                                </div>
                            </div>
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
