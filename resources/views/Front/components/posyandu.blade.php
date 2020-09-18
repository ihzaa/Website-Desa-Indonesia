<section id="posyandus" class="services section-bg">
    <div class="container-fluid" data-aos="fade-up" style="padding-left:150px; padding-right: 150px;">

        <div class="section-title">
            <h2>Posyandu Desa</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
                consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia
                fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">
            @foreach($posyandus as $p)
            <div class="news-card" style="width: 500px;">
                <a href="{{route('front_posyandu_index',['id'=>$p->id])}}" class="news-card__card-link"></a>
                <img src="{{$p->path_logo}}" alt="" class="news-card__image">
                <div class="news-card__text-wrapper">
                    <h2 class="news-card__title">{{$p->nama_posyandu}}</h2>
                    <p class="text-white font-weight-bold">Jumlah penduduk terdaftar {{$p->jumlah_penduduk}}</p>
                    <div class="news-card__details-wrapper">
                        <a href="{{route('front_posyandu_index',['id'=>$p->id])}}" class="news-card__read-more">Kegiatan <i class="fas fa-long-arrow-alt-right"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>