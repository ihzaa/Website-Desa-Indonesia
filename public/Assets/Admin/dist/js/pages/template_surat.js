$(document).on("click", "#btn_tambah", function () {
    $("#form_modal").attr("action", url.tbh);
    $("#file").attr("required", "");
    $("#info_file").hide();
    $("#nama").val("");
    $("#file").val("");

    $("#modal_tambah").modal("show");
});
$(document).on("click", ".btn_edit", function () {
    let nama = $(this).data("nama");
    let id = $(this).data("id");
    let tmpUrl = url.edt;
    tmpUrl = tmpUrl.replace("aww", id);
    $("#form_modal").attr("action", tmpUrl);
    $("#file").removeAttr("required");
    $("#info_file").show();
    $("#nama").val(nama);

    $("#modal_tambah").modal("show");
});

$("#tabel_surat").DataTable({
    paging: true,
    lengthChange: true,
    searching: true,
    ordering: true,
    info: true,
    autoWidth: true,
});
$(document).on("click", ".btn_hapus", function () {
    let nama = $(this).data("nama");
    let id = $(this).data("id");
    Swal.fire({
        title: "Hapus?",
        text: "Yakin Menghapus Surat " + nama + "?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, Hapus!",
        cancelButtonText: "Batal",
    }).then((result) => {
        if (result.value) {
            $("#main_loading").show();
            let tempUrl = url.del;
            tempUrl = tempUrl.replace("aww", id);
            window.location.replace(tempUrl);
        }
    });
});
