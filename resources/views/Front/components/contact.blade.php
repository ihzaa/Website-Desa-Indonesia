<section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Kontak</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
                consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia
                fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">

            <div class="col-lg-5 d-flex align-items-stretch">
                <div class="info">
                    <div class="address">
                        <i class="icofont-google-map"></i>
                        <h4>Lokasi:</h4>
                        <p>{{$setting->alamat_lengkap}}</p>
                    </div>

                    <div class="email">
                        <i class="icofont-envelope"></i>
                        <h4>Email:</h4>
                        <p>{{$setting->email}}</p>
                    </div>

                    <div class="phone">
                        <i class="icofont-phone"></i>
                        <h4>Telepon:</h4>
                        <p>{{$setting->no_telepon}}</p>
                    </div>

                    <iframe
                        src="{!! $setting->maps !!}"
                        frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
                </div>

            </div>

            <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
                <form action="{{route('admin_kritiksaran_post')}}" method="post" role="form" class="php-email-form">
                    @if (session('status'))
                        <div class="alert alert-success mt-2">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            {{ session('status') }}
                        </div>
                    @endif
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">Nama Anda</label>
                            <input type="text" name="nama" class="form-control" id="name" data-rule="minlen:4"
                                   data-msg="Please enter at least 4 chars"/>
                            <div class="validate"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="name">Email</label>
                            <input type="email" class="form-control" name="email" id="email" data-rule="email"
                                   data-msg="Please enter a valid email"/>
                            <div class="validate"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Subjek</label>
                        <input type="text" class="form-control" name="subject" id="subject" data-rule="minlen:4"
                               data-msg="Please enter at least 8 chars of subject"/>
                        <div class="validate"></div>
                    </div>
                    <div class="form-group">
                        <label for="name">Pesan</label>
                        <textarea class="form-control" name="message" rows="10" data-rule="required"
                                  data-msg="Please write something for us"></textarea>
                        <div class="validate"></div>
                    </div>
                    <div class="mb-3">
                        <div class="loading">Loading</div>
                        <div class="error-message"></div>
                        <div class="sent-message">Your message has been sent. Thank you!</div>
                    </div>
                    <div class="text-center">
                        <button type="submit">Kirim Sekarang</button>
                    </div>
                </form>
            </div>

        </div>

    </div>
</section>
