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
            $("#preloader").remove();
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
