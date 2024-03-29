window.alert = function () {};
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
            ["para", ["paragraph"]],
        ],
        placeholder: "Keterangan Surat....",
    });
    $("#keterangan_pembuka").summernote({
        toolbar: [
            ["font", ["bold", "underline", "clear"]],
            ["color", ["color"]],
            ["para", ["paragraph"]],
        ],
        placeholder: "Pembukaan Surat....",
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
            kode_wilayah: {
                required: true,
            },
            // atribut: {
            //     required: true,
            // },
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

    $(document).on("click", "#btn_preview", function () {
        if (!validator.checkForm()) {
            //  || $("#keterangan").val() == ""
            // if ($("#keterangan").val() == "") {
            //     // Toast.fire({
            //     //     icon: "error",
            //     //     title: " Keterangan Surat Tidak Boleh Kosong.",
            //     // });
            //     $(document).Toasts("create", {
            //         class: "bg-danger",
            //         title: "Maaf!",
            //         body: "Keterangan Surat Tidak Boleh Kosong.",
            //     });
            // }
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
            validator.form();
        } else {
            $("#modal_preview #nama_surat").html($("#nama_surat").val());
            $("#modal_preview #kode_surat_preview").html($("#kode_surat").val());
            $("#modal_preview #kode_wilayah_preview").html($("#kode_wilayah").val());
            let attr = "";
            let attr_input = $("#atribut").val();
            for (let i = 0; i < attr_input.length; i++) {
                attr += `
                <div style="flex: 0 0 8.333333%;max-width: 8.333333%;">
                </div>
                <div style="flex: 0 0 25%;max-width: 25%;text-transform: capitalize;">
                ${attr_input[i].replace("_", " ")}
                </div>
                <div style="flex: 0 0 66.666667%;max-width: 66.666667%;">
                : Sesuai Dengan Data Penduduk
                </div>`;
            }
            $("#modal_preview #atribut").html(attr);
            $("#modal_preview #keterangan").html($("#keterangan").val());
            $("#modal_preview #keterangan_pembuka").html(
                $("#keterangan_pembuka").val()
            );
            $("#modal_preview #kiri").html($("#ttd1").val());
            $("#modal_preview #tengah").html($("#ttd2").val());
            $("#modal_preview #kanan").html($("#ttd3").val());
            $("#modal_preview #logo").attr("src", $("#img-logo").attr("src"));
            $("#modal_preview #timestamp").html("KOTA, TANGGAL HARI INI");
            $("#modal_preview").modal("show");
        }
    });
    $(document).on("submit", "#formaja", function () {
        event.preventDefault();
        if (!validator.checkForm() ) {
            // || $("#keterangan").val() == ""
            return;
        }
        if (document.getElementById("logo").hasAttribute("required")) {
            var temp_logo = document.querySelector("#logo").files[0];
            if (temp_logo.size > 256000) {
                $(document).Toasts("create", {
                    class: "bg-danger",
                    title: "Maaf!",
                    body: "Ukuran Logo yang Dipilih Lebih Besar Dari 256KB.",
                });
                document.body.scrollTop = 0; // For Safari
                document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
                return;
            }
            var _validFileExtensions = [
                ".jpg",
                ".jpeg",
                ".bmp",
                ".gif",
                ".png",
            ];

            var sFileName = document.querySelector("#logo").value;
            if (sFileName.length > 0) {
                var blnValid = false;
                for (var j = 0; j < _validFileExtensions.length; j++) {
                    var sCurExtension = _validFileExtensions[j];
                    if (
                        sFileName
                            .substr(
                                sFileName.length - sCurExtension.length,
                                sCurExtension.length
                            )
                            .toLowerCase() == sCurExtension.toLowerCase()
                    ) {
                        blnValid = true;
                        break;
                    }
                }

                if (!blnValid) {
                    $(document).Toasts("create", {
                        class: "bg-danger",
                        title: "Maaf!",
                        body: "Logo Harus Berupa Gambar.",
                    });
                    document.body.scrollTop = 0; // For Safari
                    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
                    return;
                }
            }
        } else {
            if (document.querySelector("#logo").value != "") {
                var temp_logo = document.querySelector("#logo").files[0];
                if (temp_logo.size > 256000) {
                    $(document).Toasts("create", {
                        class: "bg-danger",
                        title: "Maaf!",
                        body:
                            "Ukuran Logo yang Dipilih Lebih Besar Dari 256KB.",
                    });
                    document.body.scrollTop = 0; // For Safari
                    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
                    return;
                }
                var _validFileExtensions = [
                    ".jpg",
                    ".jpeg",
                    ".bmp",
                    ".gif",
                    ".png",
                ];

                var sFileName = document.querySelector("#logo").value;
                if (sFileName.length > 0) {
                    var blnValid = false;
                    for (var j = 0; j < _validFileExtensions.length; j++) {
                        var sCurExtension = _validFileExtensions[j];
                        if (
                            sFileName
                                .substr(
                                    sFileName.length - sCurExtension.length,
                                    sCurExtension.length
                                )
                                .toLowerCase() == sCurExtension.toLowerCase()
                        ) {
                            blnValid = true;
                            break;
                        }
                    }

                    if (!blnValid) {
                        $(document).Toasts("create", {
                            class: "bg-danger",
                            title: "Maaf!",
                            body: "Logo Harus Berupa Gambar.",
                        });
                        document.body.scrollTop = 0; // For Safari
                        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
                        return;
                    }
                }
            }
        }

        $("#main_loading").show();
        event.preventDefault();
        const fileInput = document.querySelector("#logo");
        const formData = new FormData();
        formData.append("jenis_surat", $("#nama_surat").val());
        formData.append("atribut", JSON.stringify($("#atribut").val()));
        formData.append("keterangan", $("#keterangan").val());
        formData.append("keterangan_pembuka", $("#keterangan_pembuka").val());
        formData.append("kode_surat", $("#kode_surat").val());
        formData.append("kode_wilayah", $("#kode_wilayah").val());
        formData.append("ttd1", $("#ttd1").val());
        formData.append("ttd2", $("#ttd2").val());
        formData.append("ttd3", $("#ttd3").val());
        if (fileInput.files[0] != undefined) {
            formData.append("logo", fileInput.files[0]);
        }

        const options = {
            method: "POST",
            body: formData,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        };

        fetch(event.target.action, options)
            .then((resp) => {
                return resp.text();
            })
            .then((body) => {
                var link = window.location.href;
                link = link.substring(0, link.lastIndexOf("/"));
                window.history.pushState("", "", link);
                $("#page_title").html("Surat Permohonan");
                $("#bread_1").html(`Surat Permohonan`);
                $("#bread_2").remove();
                $("#content").html(body);
                $("#main_loading").fadeOut();
            })
            .catch((error) => {
                console.log(error);
            });
    });
});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $("#img-" + input.id).attr("src", e.target.result);
        };
        reader.readAsDataURL(input.files[0]); // convert to base64 string
        $(input).next(".custom-file-label").html(input.files[0].name);
    }
}

$(document).on("change", ".input_img", function () {
    readURL(this);
});
