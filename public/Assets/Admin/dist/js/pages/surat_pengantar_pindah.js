$(document).ready(function () {
    $("#tabel_surat_pengantar").DataTable({
        paging: true,
        lengthChange: true,
        searching: true,
        ordering: true,
        info: true,
        autoWidth: true,
        dom: "Bfrtip",
        buttons: ["excelHtml5", "csvHtml5", "pdfHtml5"],
    });
});
