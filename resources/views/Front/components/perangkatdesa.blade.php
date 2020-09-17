<section id="perangkatdesa" class="team section-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Perangkat Desa</h2>
            <p>Berikut adalah perangkat desa Infotech masa periode 2020 - 2025.</p>
        </div>

        <div class="row">

            @if(count($perangkats) !== 0)
            @foreach($perangkats as $perangkat)
            <div class="col-lg-6 mt-4">
                <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="400">
                    <div class="pic"><img src="{{url('storage/images/perangkat/' . $perangkat->photo)}}"
                            class="img-fluid" alt="{{$perangkat->nama}}">
                    </div>
                    <div class="member-info">
                        <h4>{{$perangkat->nama}}</h4>
                        <span>{{$perangkat->jabatan}}</span>
                        <p>Dolorum tempora officiis odit laborum officiis et et accusamus</p>
                        <div class="social">
                            <a href=""><i class="ri-twitter-fill"></i></a>
                            <a href=""><i class="ri-facebook-fill"></i></a>
                            <a href=""><i class="ri-instagram-fill"></i></a>
                            <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
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
