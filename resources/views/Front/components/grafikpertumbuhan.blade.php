<section id="grafik" class="skills">
    <div class="container" data-aos="fade-up">

        <div class="row">
            <div class="col-lg-6 d-flex align-items-center" data-aos="fade-right" data-aos-delay="100">
                <img src="{{asset('Front/img/skills.png')}}" class="img-fluid" alt="">
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left" data-aos-delay="100">
                <h3>Grafik Pertumbuhan</h3>
                <p class="font-italic">
                    Grafik Pertumbuhan Penduduk di desa ... Berdasarkan Database Kependudukan Desa
                </p>

                <div class="skills-content">

                    <div class="progress">
                        <span class="skill">Total Penduduk <i class="val">{{count($penduduks)}}</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0"
                                 aria-valuemax="100"></div>
                        </div>
                    </div>

                    <div class="progress">
                        <span class="skill">Penduduk Pria <i
                                class="val">{{(count($pria) / count($penduduks)) * 100 . "%"}}</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar"
                                 aria-valuenow="{{(count($pria) / count($penduduks)) * 100}}" aria-valuemin="0"
                                 aria-valuemax="100"></div>
                        </div>
                    </div>

                    <div class="progress">
                        <span class="skill">Penduduk Wanita <i
                                class="val">{{(count($wanita) / count($penduduks)) * 100 . "%"}}</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar"
                                 aria-valuenow="{{(count($wanita) / count($penduduks)) * 100}}" aria-valuemin="0"
                                 aria-valuemax="100"></div>
                        </div>
                    </div>

                    <div class="progress">
                        <span class="skill">Penduduk Meninggal Dunia<i
                                class="val">{{(count($kematians) / count($penduduks)) * 100 . "%"}}</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar"
                                 aria-valuenow="{{(count($kematians) / count($penduduks)) * 100}}" aria-valuemin="0"
                                 aria-valuemax="100"></div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>
</section>
