$(function () {
    "use strict";

    var ticksStyle = {
        fontColor: "#495057",
        fontStyle: "bold",
    };

    var mode = "index";
    var intersect = true;

    var $visitorsChart = $("#visitors-chart");
    var visitorsChart = new Chart($visitorsChart, {
        data: {
            labels: [
                "Januari",
                "Februari",
                "Maret",
                "April",
                "Mei",
                "Juni",
                "Juli",
                "Agustus",
                "September",
                "Oktober",
                "November",
                "Desember",
            ],
            datasets: [
                {
                    type: "line",
                    data: total_surat_tahun,
                    backgroundColor: "transparent",
                    borderColor: "#007bff",
                    pointBorderColor: "#007bff",
                    pointBackgroundColor: "#007bff",
                    fill: false,
                    // pointHoverBackgroundColor: '#007bff',
                    // pointHoverBorderColor    : '#007bff'
                },
            ],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                mode: mode,
                intersect: intersect,
            },
            hover: {
                mode: mode,
                intersect: intersect,
            },
            legend: {
                display: false,
            },
            scales: {
                yAxes: [
                    {
                        // display: false,
                        gridLines: {
                            display: true,
                            lineWidth: "4px",
                            color: "rgba(0, 0, 0, .2)",
                            zeroLineColor: "transparent",
                        },
                        ticks: $.extend(
                            {
                                beginAtZero: true,
                                suggestedMax: 10,
                            },
                            ticksStyle
                        ),
                    },
                ],
                xAxes: [
                    {
                        display: true,
                        gridLines: {
                            display: false,
                        },
                        ticks: ticksStyle,
                    },
                ],
            },
        },
    });
});
