<section id="services" class="services section-bg">
    <div class="container-fluid" data-aos="fade-up" style="padding-left:150px; padding-right: 150px;">

        <div class="section-title">
            <h2>Berita Desa</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
                consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia
                fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">
            @foreach($berita as $data)
                <div class="news-card">
                    <a href="{{route('front_berita_show', $data->id)}}" class="news-card__card-link"></a>
                    <img src="{{Storage::url('images/berita/thumbnails')}}/{{$data->thumbnail_berita}}"
                        alt="" class="news-card__image">
                    <div class="news-card__text-wrapper">
                        <h2 class="news-card__title">{{$data->judul_berita}}</h2>
                        <div class="news-card__post-date">{{\Carbon\Carbon::parse($data->created_at)->translatedFormat('d M, Y')}}</div>
                        <div class="news-card__details-wrapper">
                            <p class="news-card__excerpt">{!! $data->konten_berita !!}</p>
                            <a href="#" class="news-card__read-more">Selengkapnya <i
                                    class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
                <!--
            <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in"
                data-aos-delay="400">
                <div class="icon-box">
                    <div class="icon"><i class="bx bx-layer"></i></div>
                    <h4><a href="">Nemo Enim</a></h4>
                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
                </div>
            </div> -->

        </div>

    </div>
</section>
