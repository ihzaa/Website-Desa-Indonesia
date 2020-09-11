$(document).ready(function () {
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        onOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
    });
    $("#keterangan").summernote({
        toolbar: [
            ["font", ["bold", "underline", "clear"]],
            ["color", ["color"]],
        ],
        placeholder: "Keterangan Surat....",
    });
    $(".summernote").summernote({
        toolbar: [
            ["font", ["bold", "underline", "clear"]],
            ["color", ["color"]],
            ["insert", ["picture"]],
        ],
        placeholder: "Keterangan Jabatan<br><br>FOTO TANDA TANGAN<br><br>Nama",
        height: 150,
    });
    $(".select2bs4").select2({
        theme: "bootstrap4",
    });
    var validator = $("#formaja").validate({
        rules: {
            jenis_surat: {
                required: true,
            },
            kode_surat: {
                required: true,
            },
            atribut: {
                required: true,
            },
        },
        errorElement: "span",
        errorPlacement: function (error, element) {
            error.addClass("invalid-feedback");
            element.closest(".form-group").append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass("is-invalid");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass("is-invalid");
        },
    });

    $("#btn_preview").on("click", function () {
        if (!validator.checkForm() || $("#keterangan").val() == "") {
            if ($("#keterangan").val() == "") {
                // Toast.fire({
                //     icon: "error",
                //     title: " Keterangan Surat Tidak Boleh Kosong.",
                // });
                $(document).Toasts("create", {
                    class: "bg-danger",
                    title: "Maaf!",
                    body:
                        "Keterangan Surat Tidak Boleh Kosong.",
                });
            }
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
            validator.form();
        } else {
            $("#modal_preview #nama_surat").html($("#nama_surat").val());
            $("#modal_preview #nomer_surat").html($("#kode_surat").val());
            let attr = "";
            let attr_input = $("#atribut").val();
            for (let i = 0; i < attr_input.length; i++) {
                attr += `
                <div style="flex: 0 0 8.333333%;max-width: 8.333333%;">
                </div>
                <div style="flex: 0 0 25%;max-width: 25%;">
                ${attr_input[i]}
                </div>
                <div style="flex: 0 0 66.666667%;max-width: 66.666667%;">
                : Sesuai Dengan Data Penduduk
                </div>`;
            }
            $("#modal_preview #atribut").html(attr);
            $("#modal_preview #keterangan").html($("#keterangan").val());
            $("#modal_preview #kiri").html($("#ttd1").val());
            $("#modal_preview #tengah").html($("#ttd2").val());
            $("#modal_preview #kanan").html($("#ttd3").val());
            $("#modal_preview #logo").attr("src", $("#img-logo").attr("src"));
            $("#modal_preview").modal("show");
        }
    });
});
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $("#img-" + input.id).attr("src", e.target.result);
        };
        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
}

$(".input_img").change(function () {
    readURL(this);
});
