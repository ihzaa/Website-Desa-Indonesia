<section id="faq" class="faq section-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Tanya Jawab</h2>
            <p>Berikut adalah beberapa pertanyaan yang sering kali ditanyakan</p>
        </div>

        <div class="faq-list">
            <ul>
                @foreach($qna as $qn)
                    <li data-aos="fade-up" data-aos-delay="100">
                        <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" class="collapsed"
                                                                       href="{{'#faq-list-' . $loop->iteration}}">{{$qn->judul}}
                            <i class="bx bx-chevron-down icon-show"></i><i
                                class="bx bx-chevron-up icon-close"></i></a>
                        <div id="{{'faq-list-' . $loop->iteration}}"
                             class="{{$loop->iteration === 1 ? "collapse show" : "collapse"}}" data-parent=".faq-list">
                            <p>
                                {{$qn->jawaban}}
                            </p>
                        </div>
                    </li>
                @endforeach

            </ul>
        </div>

    </div>
</section>
