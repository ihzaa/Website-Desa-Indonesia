var tabel = "";
$(document).ready(function () {
    function getAll() {
        var myHeaders = new Headers();
        myHeaders.append("pragma", "no-cache");
        myHeaders.append("cache-control", "no-cache");
        var myInit = {
            headers: myHeaders,
        };

        fetch(url.getAll, myInit)
            .then((response) => response.json())
            .then((data) => {
                for (let i = 0; i < data["surat"].length; i++) {
                    let temp_url = url.edit;
                    temp_url = temp_url.replace("_id", data["surat"][i].id);
                    let temp_url_sampel = url.sampel;
                    temp_url_sampel = temp_url_sampel.replace("_id", data["surat"][i].id);
                    $("#tabel_surat tbody").append(`
                <tr>
                    <td>${data["surat"][i].jenis_surat}</td>
                    <td>${data["surat"][i].arsip_surat_penduduks_count}
                    </td>
                    <td class="text-center">
                        <a href="${temp_url}" class="btn btn-sm btn-warning btn-edit" data-toggle="tooltip"
                                        data-placement="bottom" title="Edit" data-id="${data["surat"][i].id}"><i
                                            class="fas fa-edit"></i></a>
                        <button class="btn btn-sm btn-danger btn-hapus" data-toggle="tooltip" data-placement="bottom"
                                        title="Hapus" data-id="${data["surat"][i].id}"><i class="fas fa-trash"></i></button>
                        <a href="${temp_url_sampel}" class="btn btn-sm btn-info btn-edit" data-toggle="tooltip"
                                        data-placement="bottom" title="Unduh Sampel Surat"><i class="fas fa-file-download"></i></a>
                    </td>
                </tr>
            `);
                }
            })
            .then(() => {
                $(function () {
                    $('[data-toggle="tooltip"]').tooltip();
                });
                tabel = $("#tabel_surat").DataTable({
                    paging: true,
                    lengthChange: true,
                    searching: true,
                    ordering: true,
                    info: true,
                    autoWidth: true,
                });
            })
            .then(() => {
                $("#main_loading").fadeOut();
            });
    }
    getAll();
    $(document).on("click", "#btn_tambah", function () {
        $("#main_loading").show();
        // fetch(url.halamanTambahR)
        //     .then((response) => response.text())
        //     .then((data) => {
        //         tabel.clear().destroy();
        //         $("#page_title").html("Tambah Surat Permohonan");
        //         $("#bread_1").html(`
        //         <a href="${window.location.href}">Surat Permohonan</a>
        //         `);
        //         $("#content").html(data);

        //         window.history.pushState("", "", url.halamanTambah);
        //     })
        //     .then(() => {
        //         // $("#breadcrumb").append(`
        //         // <li id="bread_2" class="breadcrumb-item">Tambah Surat</li>`);
        //         $("#main_loading").fadeOut();
        //         $("#js_main").remove();
        //     });
    });

    $(document).on("click", ".btn-edit", function () {
        // let id = $(this).data("id");
        $("#main_loading").show();
        // let temp_url = url.editR;
        // temp_url = temp_url.replace("_id", id);
        // fetch(temp_url)
        //     .then((response) => response.text())
        //     .then((data) => {
        //         tabel.clear().destroy();
        //         $("#page_title").html("Edit Surat Permohonan");
        //         $("#bread_1").html(`
        //         <a href="${window.location.href}">Surat Permohonan</a>
        //         `);

        //         $("#content").html(data);
        //         temp_url = url.edit;
        //         temp_url = temp_url.replace("_id", id);
        //         window.history.pushState("", "", temp_url);
        //     })
        //     .then(() => {
        //         // $("#breadcrumb").append(
        //         //     '<li id="bread_2" class="breadcrumb-item">Edit Surat</li>'
        //         // );
        //         $("#main_loading").fadeOut();
        //         $("#js_main").remove();
        //     });
    });

    $(document).on("click", ".btn-hapus", function () {
        let id = $(this).data("id");
        Swal.fire({
            title: "Hapus?",
            text: "Yakin Menghapus Surat?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Hapus!",
            cancelButtonText: "Batal",
        }).then((result) => {
            if (result.value) {
                $("#main_loading").show();
                let temp_url = url.hapus;
                temp_url = temp_url.replace("_id", id);
                fetch(temp_url)
                    .then(() => {
                        tabel.clear().destroy();
                    })
                    .then(() => {
                        getAll();
                    })
                    .then(() => {
                        Swal.fire(
                            "Berhasil!",
                            "Surat Permohonan Berhasil Dihapus!",
                            "success"
                        );
                    });
            }
        });
    });
});
