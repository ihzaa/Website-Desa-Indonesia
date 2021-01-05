function sleep(time) {
    return new Promise((resolve) => setTimeout(resolve, time));
}

function download(nama, isi) {
    var el = document.createElement("div");
    el.innerHTML = isi;
    var opt = {
        margin: 0.2,
        filename: nama + ".pdf",
        image: { type: "jpeg", quality: 0.98 },
        html2canvas: { scale: 2 },
        jsPDF: { unit: "in", format: "letter", orientation: "portrait" },
    };
    html2pdf()
        .set(opt)
        .from(el)
        .save()
        .then(() => {
            if (nama == "Surat Pengantar Pindah") {
                location.reload();
            } else {
                $("#preloader").remove();
            }
        });
}
$(document).on("click", ".card-surat", function () {
    let id = $(this).data("id");
    let nama = $(this).data("nama");
    Swal.fire({
        title: `Apakah Anda Yakin Mengunduh ${nama}?`,
        text: "",
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Unduh!",
        cancelButtonText: "Batal",
    }).then((result) => {
        if (result.value) {
            $("body").append(`<div id="preloader"></div>`);
            let temp_url = url.udh;
            temp_url = temp_url.replace("__post__", id);
            fetch(temp_url)
                .then((response) => response.text())
                .then((data) => {
                    download(nama, data);
                });
        }
    });
});

$(document).on("click", ".card-surat-pindah", function () {
    $("#modal-surat-keluar").modal("show");
});

$(document).on("change", "#pindah_pilih_prop", function () {
    $("body").append(`<div id="preloader"></div>`);
    $("#profinsi_xx").remove();
    $("#pindah_pilih_kota").html(
        '<option value="xx" id="kota_xx">Pilih Kabupaten/Kota</option>'
    );
    $("#pindah_pilih_kec").html(
        '<option value="xx" id="kec_xx">Pilih Kecamatan</option>'
    );
    $("#pindah_pilih_kec").attr("disabled", "");
    $("#pindah_pilih_kel").html(
        '<option value="xx" id="kel_xx">Pilih Kelurahan/Desa</option>'
    );
    $("#pindah_pilih_kel").attr("disabled", "");
    let temp_url = url.getProv;
    temp_url = temp_url.replace("nahkan", $(this).val());
    getAndRenderWilayah(temp_url, "pindah_pilih_kota");
});

$(document).on("change", "#pindah_pilih_kota", function () {
    $("body").append(`<div id="preloader"></div>`);
    $("#kota_xx").remove();
    $("#pindah_pilih_kec").html(
        '<option value="xx" id="kec_xx">Pilih Kecamatan</option>'
    );
    $("#pindah_pilih_kec").attr("disabled", "");
    $("#pindah_pilih_kel").html(
        '<option value="xx" id="kel_xx">Pilih Kelurahan/Desa</option>'
    );
    $("#pindah_pilih_kel").attr("disabled", "");
    let temp_url = url.getProv;
    temp_url = temp_url.replace("nahkan", $(this).val());
    getAndRenderWilayah(temp_url, "pindah_pilih_kec");
});

$(document).on("change", "#pindah_pilih_kec", function () {
    $("body").append(`<div id="preloader"></div>`);
    $("#kec_xx").remove();
    $("#pindah_pilih_kel").html(
        '<option value="xx" id="kel_xx">Pilih Kelurahan/Desa</option>'
    );
    $("#pindah_pilih_kel").attr("disabled", "");
    let temp_url = url.getProv;
    temp_url = temp_url.replace("nahkan", $(this).val());
    getAndRenderWilayah(temp_url, "pindah_pilih_kel");
});

function getAndRenderWilayah(url, target) {
    fetch(url)
        .then((response) => response.json())
        .then((data) => {
            if (target == "pindah_pilih_kota") {
                $("#" + target).html(
                    '<option value="xx" id="kota_xx">Pilih Kabupaten/Kota</option>'
                );
            } else if (target == "pindah_pilih_kec") {
                $("#" + target).html(
                    '<option value="xx" id="kec_xx">Pilih Kecamatan</option>'
                );
            } else if (target == "pindah_pilih_kel") {
                $("#" + target).html(
                    '<option value="xx" id="kel_xx">Pilih Kelurahan/Desa</option>'
                );
            }
            const len = data.length;
            for (let i = 0; i < len; i++) {
                $("#" + target).append(
                    `<option value="${data[i].kode}">${data[i].nama}</option>`
                );
            }
        })
        .then(() => {
            $("#" + target).removeAttr("disabled");
            $("#preloader").fadeOut();
            sleep(500).then(() => {
                $("#preloader").remove();
            });
        })
        .catch((err) =>
            alert("terjadi error " + err + ". Silahkan Muat ulang halaman!")
        );
}

$(document).ready(function () {
    $(".select_wilayah").select2();

    $(document).on("click", ".card-surat-template", function () {
        let id = $(this).data("id");
        let nama = $(this).data("nama");
        Swal.fire({
            title: `Apakah Anda Yakin Mengunduh ${nama}?`,
            text: "",
            icon: "question",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Unduh!",
            cancelButtonText: "Batal",
        }).then((result) => {
            if (result.value) {
                let temp_url = url.udh_template;
                temp_url = temp_url.replace("nahkan", id);
                openInNewTab(temp_url);
            }
        });
    });
});

function openInNewTab(url) {
    var win = window.open(url, "_blank");
    win.focus();
}

$(document).on("click", "#btn_untuh_surat_pindah", function () {
    const prov = $("#pindah_pilih_prop");
    const kota = $("#pindah_pilih_kota");
    const kec = $("#pindah_pilih_kec");
    const kel = $("#pindah_pilih_kel");
    const rt = $("#rt");
    const rw = $("#rw");
    const anggota = $("#pindah_pilih_anggota");
    if (
        prov.val() != "xx" &&
        kota.val() != "xx" &&
        kec.val() != "xx" &&
        kel.val() != "xx" &&
        rt.val() != "" &&
        rw.val() != "" &&
        anggota.val() != ""
    ) {
        $("body").append(`<div id="preloader"></div>`);
        fetch(url.udh_pindah, {
            method: "post",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            body: JSON.stringify({
                prov: $("#pindah_pilih_prop option:selected").text(),
                kota: $("#pindah_pilih_kota option:selected").text(),
                kel: $("#pindah_pilih_kel option:selected").text(),
                kec: $("#pindah_pilih_kec option:selected").text(),
                rt: rt.val(),
                rw: rw.val(),
                anggota: anggota.val(),
            }),
        })
            .then((resp) => {
                console.log(resp);
                if (resp.status == 202) {
                    return 202;
                } else {
                    return resp.text();
                }
            })
            .then((data) => {
                $("#modal-surat-keluar").modal("hide");
                if (data == 202) {
                    const pesan =
                        "Tidak ada kepala keluarga pada kartu keluarga anda.";
                    $("#preloader").remove();
                    Swal.fire({
                        title: pesan,
                        text: "",
                        icon: "error",
                    });
                } else {
                    download("Surat Pengantar Pindah", data);
                }
            });
    } else {
        Swal.fire({
            title: "Isikan seluruh inputan yang tersedia.",
            text: "Maaf!",
            icon: "error",
        });
    }
});
