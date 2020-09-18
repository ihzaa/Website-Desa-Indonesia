<section id="berita" class="services section-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Berita Desa</h2>
            <p>Di bawah ini merupakan berita-berita yang ada pada desa, yang disajikan resmi oleh pemerintah desa.</p>
        </div>

        <div class="row">
            @foreach($berita as $data)
            <div class="news-card">
                <a target="_blank" href="{{route('berita_show', $data->id)}}" class="news-card__card-link"></a>
                <img src="{{Storage::url('images/berita/thumbnails')}}/{{$data->thumbnail_berita}}" alt=""
                    class="news-card__image">
                <div class="news-card__text-wrapper">
                    <h2 class="news-card__title">
                        {{strlen($data->judul_berita) > 35 ? substr($data->judul_berita,0,35)."..." : $data->judul_berita}}
                    </h2>
                    <div class="news-card__post-date">
                        {{\Carbon\Carbon::parse($data->created_at)->translatedFormat('d M, Y')}}</div>
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

        <div class="text-center mt-4">
            <a href="{{route('berita_list')}}" class="btn-learn-more" style="margin-top: 10px">Lihat Berita Lainnya...</a>
        </div>
    </div>
</section>
