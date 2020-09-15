@extends('Front.master')
@section('css_after')
<link rel="stylesheet" href="{{asset('Admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
@endsection
@section('hero')
<style>
    .clickable {
        cursor: pointer;
    }
</style>
<section id="contact" class="contact" style="background: rgba(40, 58, 90, 0.9);">
    <div class="container" data-aos="fade-up">
        <div class="section-title text-light mt-3">
            <h2 class="text-light">Surat Permohonan</h2>
            <p>Anda Masuk Sebagai {{$data['penduduk']->nama}}.</p>
            <p>Klik <a class="btn btn-sm btn-outline-danger" href="{{route('front_surat_permohonan_logout')}}">disini</a> jika ingin keluar.</p>
        </div>

        <div class="row row-cols-2 row-cols-md-4">
            @foreach ($data['surat'] as $d)
            <div class="col mb-4 card-surat" data-id="{{$d->id}}" data-nama="{{$d->jenis_surat}}">
                <div class="card clickable">
                    <img src="{{asset($d->logo)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$d->jenis_surat}}</h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section><!-- End Contact Section -->

@endsection
@section('js_after')
<script src="{{asset('Admin/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="{{asset('Front/js/html2pdf/html2pdf.bundle.min.js')}}"></script>

<script>
    let url = {udh : "{{route('front_surat_permohonan_unduh',['id'=>'__post__'])}}"};

    function download(nama,isi)
    {
        var el = document.createElement("div");
          el.innerHTML = isi;
          var opt = {
            margin: 0.2,
            filename: nama+".pdf",
            image: { type: "jpeg", quality: 0.98 },
            html2canvas: { scale: 2 },
            jsPDF: { unit: "in", format: "letter", orientation: "portrait" },
          };
          html2pdf().set(opt).from(el).save().then(()=>{
            $("#preloader").remove();
          });

    }
    $(document).on('click','.card-surat',function(){
        let id = $(this).data('id');
        let nama = $(this).data('nama');
        Swal.fire({
            title: `Apakah Anda Yakin Mengunduh ${nama}?`,
            text: "",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Unduh!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.value) {
                $("body").append(`<div id="preloader"></div>`);
                let temp_url = url.udh;
                temp_url = temp_url.replace("__post__", id);
                fetch(temp_url)
                .then(response => response.text())
                .then(data => {
                    download(nama,data);
                });
            }
        });
    });
</script>
@endsection
