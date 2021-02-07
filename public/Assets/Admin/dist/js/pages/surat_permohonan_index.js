var tabel = "";
var tabel_arsip = "";
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
                    temp_url_sampel = temp_url_sampel.replace(
                        "_id",
                        data["surat"][i].id
                    );
                    $("#tabel_surat tbody").append(`
                <tr>
                    <td class="nama_surat">${data["surat"][i].jenis_surat}</td>
                    <td>${data["surat"][i].arsip_surat_penduduks_count}
                    </td>
                    <td class="text-center">
                        <a href="${temp_url}" class="btn btn-sm btn-warning btn-edit" data-toggle="tooltip"
                                        data-placement="bottom" title="Edit" data-id="${data["surat"][i].id}"><i
                                            class="fas fa-edit"></i></a>
                        <button class="btn btn-sm btn-danger btn-hapus" data-toggle="tooltip" data-placement="bottom"
                                        title="Hapus" data-id="${data["surat"][i].id}"><i class="fas fa-trash"></i></button>
                        <button class="btn btn-sm btn-info btn-unduh-sampel" data-toggle="tooltip"
                                        data-placement="bottom" title="Unduh Sampel Surat" data-id="${data["surat"][i].id}"><i class="fas fa-file-download"></i></button>
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
    var myHeaders = new Headers();
    myHeaders.append("pragma", "no-cache");
    myHeaders.append("cache-control", "no-cache");
    var myInit = {
        headers: myHeaders,
    };
    fetch(url.getArsip, myInit)
        .then((response) => response.json())
        .then((data) => {
            // console.log(tabel_arsip);
            // console.log(tabel_arsip != undefined);
            // if (tabel_arsip != undefined) {
            //     try {
            //         tabel_arsip.clear().destroy();
            //     } catch (err) {
            //         console.log(err);
            //     }
            // }
            let el = $("#tabel_arsip tbody");
            let isi = "";
            console.log(data);
            for (let i = 0; i < data.length; i++) {
                isi += `
                <tr>
                    <td>
                        ${i + 1}
                    </td>
                    <td>
                        ${Date.parse(data[i].tanggal_surat).toString(
                            "d MMMM yyyy"
                        )}
                    </td>
                    <td class="nama_surat">${data[i].jenis_surat}</td>
                    <td>
                        ${data[i].nik}
                    </td>
                    <td>
                        ${data[i].nama}
                    </td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-info btn-unduh-arsip" data-toggle="tooltip" data-id="${
                            data[i].aid
                        }" data-no="${data[i].nomer}"
                        data-placement="bottom" title="Unduh Surat"><i class="fas fa-file-download"></i></button>
                    </td>
                </tr>
                `;
            }
            $("#arsip_loading").remove();
            el.append(isi);
            tabel_arsip = $("#tabel_arsip").DataTable({
                paging: true,
                lengthChange: true,
                searching: true,
                ordering: true,
                info: true,
                autoWidth: true,
                dom: "Bfrtip",
                buttons: [
                    {
                        extend: "csvHtml5",
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4],
                        },
                    },
                    {
                        extend: "excelHtml5",
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4],
                        },
                    },
                    {
                        extend: "pdfHtml5",
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4],
                        },
                    },
                ],
            });
            $('[data-toggle="tooltip"]').tooltip();
        });

    $(document).on("click", ".btn-unduh-sampel", function () {
        $("#main_loading").fadeIn();
        let id = $(this).data("id");
        let nomer = "Sampel";
        let nama = $(this).parent().parent().find(".nama_surat").html();
        let temp_url = url.sampelNew;
        temp_url = temp_url.replace("_id", id);
        fetch(temp_url)
            .then((response) => response.text())
            .then((data) => {
                download(nomer, nama, data);
            });
    });
    $(document).on("click", ".btn-unduh-arsip", function () {
        $("#main_loading").fadeIn();
        let id = $(this).data("id");
        let nomer = $(this).data("no");
        let nama = $(this).parent().parent().find(".nama_surat").html();
        let temp_url = url.downloadArsip;
        temp_url = temp_url.replace("_id", id);
        fetch(temp_url)
            .then((response) => response.text())
            .then((data) => {
                download(nomer, nama, data);
            });
    });

    function download(no, nama, isi) {
        var el = document.createElement("div");
        el.innerHTML = isi;
        var opt = {
            margin: 0.2,
            filename: no + "-" + nama + ".pdf",
            image: { type: "jpeg", quality: 0.98 },
            html2canvas: { scale: 2 },
            jsPDF: { unit: "in", format: "letter", orientation: "portrait" },
        };
        html2pdf()
            .set(opt)
            .from(el)
            .save()
            .then(() => {
                $("#main_loading").fadeOut();
            });
    }
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
