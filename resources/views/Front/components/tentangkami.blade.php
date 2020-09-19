<section id="portfolio" class="portfolio">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Tentang Kami</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
                consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia
                fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <ul id="portfolio-flters" class="d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
            <li data-filter="*" class="filter-active">Semua</li>
            <li data-filter=".filter-visimisi">Visi Misi</li>
            <li data-filter=".filter-sejarahdesa">Sejarah</li>
            <li data-filter=".filter-profildesa">Profil</li>
            <li data-filter=".filter-wilayahdesa">Wilayah</li>
        </ul>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

            @foreach($homes->where('home_category_id', 1) as $home)
                <div class="col-md-6 portfolio-item filter-visimisi">
                    <div class="portfolio-img"><img src="{{url('storage/images/home/' . $home->image)}}"
                                                    class="img-fluid" alt="{{$home -> title}}">
                    </div>
                    <div class="portfolio-info">
                        <h4>{{$home -> title}}</h4>
                        <p>{{$home -> home_category -> category_name}}</p>
                        <a href="{{url('storage/images/home/' . $home->image)}}" data-gall="portfolioGallery"
                           class="venobox preview-link" title="{{$home -> title}}"><i class="bx bx-plus"></i></a>
                        <a href="{{route('front_tentang_kami', ['id' => $home->id])}}" class="details-link"
                           title="More Details"><i
                                class="bx bx-link"></i></a>
                    </div>
                </div>
            @endforeach

            @foreach($homes->where('home_category_id', 2) as $home)
                <div class="col-md-6 portfolio-item filter-sejarahdesa">
                    <div class="portfolio-img"><img src="{{url('storage/images/home/' . $home->image)}}"
                                                    class="img-fluid" alt="{{$home -> title}}">
                    </div>
                    <div class="portfolio-info">
                        <h4>{{$home -> title}}</h4>
                        <p>{{$home -> home_category -> category_name}}</p>
                        <a href="{{url('storage/images/home/' . $home->image)}}" data-gall="portfolioGallery"
                           class="venobox preview-link" title="{{$home -> title}}"><i class="bx bx-plus"></i></a>
                        <a href="{{route('front_tentang_kami', ['id' => $home->id])}}" class="details-link"
                           title="More Details"><i
                                class="bx bx-link"></i></a>
                    </div>
                </div>
            @endforeach

            @foreach($homes->where('home_category_id', 3) as $home)
                <div class="col-md-6 portfolio-item filter-profildesa">
                    <div class="portfolio-img"><img src="{{url('storage/images/home/' . $home->image)}}"
                                                    class="img-fluid" alt="{{$home -> title}}">
                    </div>
                    <div class="portfolio-info">
                        <h4>{{$home -> title}}</h4>
                        <p>{{$home -> home_category -> category_name}}</p>
                        <a href="{{url('storage/images/home/' . $home->image)}}" data-gall="portfolioGallery"
                           class="venobox preview-link" title="{{$home -> title}}"><i class="bx bx-plus"></i></a>
                        <a href="{{route('front_tentang_kami', ['id' => $home->id])}}" class="details-link"
                           title="More Details"><i
                                class="bx bx-link"></i></a>
                    </div>
                </div>
            @endforeach

            @foreach($homes->where('home_category_id', 4) as $home)
                <div class="col-md-6 portfolio-item filter-wilayahdesa">
                    <div class="portfolio-img"><img src="{{url('storage/images/home/' . $home->image)}}"
                                                    class="img-fluid" alt="{{$home -> title}}">
                    </div>
                    <div class="portfolio-info">
                        <h4>{{$home -> title}}</h4>
                        <p>{{$home -> home_category -> category_name}}</p>
                        <a href="{{url('storage/images/home/' . $home->image)}}" data-gall="portfolioGallery"
                           class="venobox preview-link" title="{{$home -> title}}"><i class="bx bx-plus"></i></a>
                        <a href="{{route('front_tentang_kami', ['id' => $home->id])}}" class="details-link"
                           title="More Details"><i
                                class="bx bx-link"></i></a>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>
