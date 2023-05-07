@extends('layouts.app')
@section('container.isi')
@section('footer.css', '18.5%')
@section('aktif.dashboard', 'header-aktif')
@section('container.css')
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.css' rel='stylesheet' />

    <style>
        .fc-event {
            font-size: .7em;
        }

        .href-link {
            font-size: 15px;
        }

        .href-link:link {
            text-decoration: none;
        }

        .href-link:visited {
            text-decoration: none;
        }

        .href-link:hover {
            text-decoration: underline;
        }

        .href-link:active {
            text-decoration: underline;
        }

        .flex-container {
            display: flex;
            flex-direction: row;
        }

        /* Responsive layout - makes a one column layout instead of a two-column layout */
        @media (max-width: 800px) {
            .flex-container {
                flex-direction: column;
            }

        }

        @media (max-width: 767px) {
            .flex-container {
                flex-direction: column;
            }
        }

        @media (min-width: 767px) and (max-width:1023px) {
            .flex-container {
                flex-direction: column;
            }
        }

        @media (min-width: 1023px) and (max-width:1199px) {
            .flex-container {
                flex-direction: column;
            }
        }
    </style>
@endsection
<section class="row">
<div class="col-12 col-lg-12">
        <div class="row">
            <div class="col-6 col-lg-3 col-md-6" title="Total Transaksi Belum Lunas Minggu Ini">
                <div class="card">
                    <div style="cursor: pointer;" class="card-body px-4 py-4-5" href="javascript:void(0)" onclick="goToPage('belum-lunas')">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                <div class="stats-icon red mb-2">
                                    <i class="iconly-boldBag"></i>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold" href="javascript:void(0)" class="href-link mt-2" onclick="goToPage('belum-lunas')">
                                    Transaksi Belum Lunas Minggu Ini
                                </h6>
                                <h6 class="font-extrabold mb-0">{{ $data['transaksi_belum_lunas'] }}</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3 col-md-6" title="Total Transaksi Minggu Ini">
                <div class="card">
                    <div style="cursor: pointer;" class="card-body px-4 py-4-5" href="javascript:void(0)" onclick="goToPage('transaksi')">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                <div class="stats-icon blue mb-2">
                                    <i class="iconly-boldBag-2"></i>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Total Transaksi Minggu Ini</h6>
                                <h6 class="font-extrabold mb-0">{{ $data['total_transaksi'] }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3 col-md-6" title="Total Pelanggan Yang Akan Ambil Banten Minggu Ini">
                <div class="card">
                    <div style="cursor: pointer;"class="card-body px-4 py-4-5" href="javascript:void(0)" onclick="goToPage('pelanggan')">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                <div class="stats-icon green mb-2">
                                    <i class="iconly-boldUser1"></i>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Total Pelanggan Minggu Ini</h6>
                                <h6 class="font-extrabold mb-0">{{ $data['total_pelanggan'] }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3 col-md-6" title="Total Transaksi Privat Minggu Ini">
                <div class="card">
                    <div style="cursor: pointer;" class="card-body px-4 py-4-5" href="javascript:void(0)" onclick="goToPage('privat')">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                <div class="stats-icon purple mb-2">
                                    <i class="iconly-boldDocument"></i>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Total Transaksi Privat</h6>
                                <h6 class="font-extrabold mb-0">{{ $data['total_privat'] }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-12  col-lg-12">
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
                <div class="flex-container">
                    <div class="col-12  col-xl-6">
                        <h5 style="text-align: center;">Kalender Jumlah Upacara</h5>
                        <div id="calendar"></div>

                    </div>
                    <div class="col-12  col-xl-6 mt-4">
                        <div id="transaksi"></div>
                    </div>
                </div>
                <div class="col-12 col-xl-12 mt-4">
                    <div id="chart-transaksi-terbanyak"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<input type="hidden" id="tanggal_minggu_awal" value="{{ $data['tanggal_minggu_awal'] }}">
<input type="hidden" id="tanggal_minggu_akhir" value="{{ $data['tanggal_minggu_akhir'] }}">
@section('container.js')
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.js'></script>
    <script src='https://unpkg.com/popper.js/dist/umd/popper.min.js'></script>
    <script src='https://unpkg.com/tooltip.js/dist/umd/tooltip.min.js'></script>
    <script>
        $(document).ready(function() {
            chart();
        });

        function chart() {

            $.get("{{ route('chart') }}", {}, function(data, status) {
                var chartTransaksi = {

                    series: [{
                        name: 'Privat',
                        type: 'bar',
                        data: data['privat']
                    }, {
                        name: 'Umum',
                        type: 'bar',
                        data: data['umum']
                    }],
                    chart: {
                        height: 350,
                        type: 'bar',
                        stacked: false
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        width: [1, 1, 4]
                    },
                    title: {
                        text: 'Data Transaksi (' + data['tanggal_awal'] + ' - ' + data['tanggal_akhir'] + ')',
                        align: 'left',
                        offsetX: 110
                    },
                    xaxis: {
                        categories: data['hari'],
                    },
                    yaxis: [{
                            axisTicks: {
                                show: true,
                            },
                            axisBorder: {
                                show: true,
                                color: '#008FFB'
                            },
                            labels: {
                                formatter: function(val) {
                                    return val
                                },
                                style: {
                                    colors: '#008FFB',
                                }
                            },

                        },
                        {
                            seriesName: 'Privat',
                            opposite: true,
                            axisTicks: {
                                show: true,
                            },
                            axisBorder: {
                                show: true,
                                color: '#00E396'
                            },
                            labels: {
                                formatter: function(val) {
                                    return val
                                },
                                style: {
                                    colors: '#00E396',
                                }
                            }
                        }
                    ],
                    tooltip: {
                        fixed: {
                            enabled: true,
                            position: 'topLeft', // topRight, topLeft, bottomRight, bottomLeft
                            offsetY: 30,
                            offsetX: 60
                        },
                    },
                    legend: {
                        horizontalAlign: 'left',
                        offsetX: 40
                    }
                };

                var chart_transaksi_terbanyak = {
                    series: [{
                        data: data['qty_upacara_terbanyak']
                    }],
                    chart: {
                        type: 'bar',
                        height: 380
                    },
                    plotOptions: {
                        bar: {
                            barHeight: '100%',
                            distributed: true,
                            horizontal: true,
                            dataLabels: {
                                position: 'bottom'
                            },
                        }
                    },
                    colors: ['#33b2df', '#546E7A', '#d4526e', '#A5978B', '#2b908f'],
                    dataLabels: {
                        enabled: true,
                        textAnchor: 'start',
                        style: {
                            colors: ['#fff']
                        },
                        formatter: function(val, opt) {
                            // return opt.w.globals.labels[opt.dataPointIndex] + ":  " + val
                            return opt.w.globals.labels[opt.dataPointIndex]
                        },
                        offsetX: 0,
                        dropShadow: {
                            enabled: true
                        }
                    },
                    stroke: {
                        width: 1,
                        colors: ['#fff']
                    },
                    xaxis: {
                        categories: data['nama_upacara_terbanyak'],
                        labels: {
                            formatter: function(val) {
                                return val + " Org"
                            }
                        }
                    },
                    yaxis: {
                        labels: {
                            show: false
                        }
                    },
                    title: {
                        text: 'Data Upacara Terbanyak Minggu Ini',
                        align: 'center',
                        floating: true
                    },
                    tooltip: {
                        theme: 'dark',
                        x: {
                            show: false
                        },
                        y: {
                            title: {
                                formatter: function(val) {
                                    return ''
                                }
                            },
                            formatter: function(val) {
                                return val + ' Org'
                            }
                        }
                    }
                };

                var chart = new ApexCharts(document.querySelector("#transaksi"), chartTransaksi);

                var chartTransaksiTerbanyak = new ApexCharts(document.querySelector("#chart-transaksi-terbanyak"),
                    chart_transaksi_terbanyak);


                chart.render();
                chartTransaksiTerbanyak.render();
            });
        }


        document.addEventListener('DOMContentLoaded', function() {
            $.get("{{ route('chart') }}", {}, function(data, status) {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {

                    initialView: 'dayGridMonth',
                    eventDidMount: function(info) {
                        $(info.el).popover({
                            title: info.event.title,
                            placement: 'top',
                            trigger: 'hover',
                            content: info.event.extendedProps.description,
                            container: 'body'
                        });
                        if (info.event.textColor) {
                            info.el.style.color = info.event.textColor;
                        }
                    },

                    events: data['data_kalender'],
                    // eventDidMount: function(info) {

                    //     console.log(info.event.extendedProps);
                    //     // {description: "Lecture", department: "BioChemistry"}
                    // },

                    selectOverlap: function(event) {
                        return event.rendering === 'background';
                    },
                    buttonText: {
                        //Here I make the button show French date instead of a text.
                        today: 'Hari Ini'
                    },
                    height: 490,
                });

                calendar.render();
                calendar.setOption('locale', 'id');
            });
        });

        function goToPage(status) {

            window.location.href = "{{ route('index-pemesanan') }}" + "?dashboard=" + status;
        }


        document.getElementById('toggle-dark').addEventListener('click', function() {
            location.reload();
        });
    </script>



@endsection
@endsection
