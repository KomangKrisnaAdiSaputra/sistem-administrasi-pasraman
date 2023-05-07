<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Jadwal - {{ $data['title_tanggal_upacara'] }}</title>
    <link rel="stylesheet" href="{{ asset('assets/css/main/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/shared/iconly.css') }}" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <style>
        * {
            font-size: 9px;
            font-family: 'Times New Roman';
        }

        .print-laporan {
            page-break-after: always;
        }

        .centered {
            text-align: center;
        }

        .teks {
            color: black;
            font-weight: bold;
        }

        .judul {
            padding: 1em;
            margin-top: 2em;
        }

        .tabel {
            width: 90%;
            margin-left: auto;
            margin-right: auto;
        }


        .table1,
        tr,
        td {
            border: 1px solid rgb(0, 0, 0);
            padding: 8px 20px;
            color: black;

        }


        .color-th {
            font-weight: bold;
        }

        .color-cancel {
            background-color: #c84353;
            color: black !important;
        }

        .color-vendor {
            color: red;
        }

        .black {
            color: black;
            font-weight: normal;
        }

        /* @media print {
            body {
                -webkit-print-color-adjust: exact;
            }

            @page {
                margin: 0;
                size: A4 portrait !important;
            }

        } */

        @media print {
            body {
                -webkit-print-color-adjust: exact;
            }

            @page {
                margin: 2rem 0;

                size: A4 portrait !important;

            }
        }
    </style>
</head>

<body>

    <div class="print-laporan">
        <div class="judul">
            {{-- <h5 style="margin-left: 4rem; color: black;">laporan ini diunduh pada tanggal 15/12/2022 pukul 14:00:00</h5> --}}
            {{-- <h4 class="centered teks">PASRAMAN GRIYA GEDE WAYAHAN BURUAN</h4>
            <p class="centered teks" style="font-size: 8px !important;">
                Jadwal Harian Kegiatan Upacara
            </p> --}}
            {{-- <p style="margin-left: 4rem; color: black;">
                File ini diunduh pada tanggal {{ $waktuPrint['tanggal'] }}
                pukul {{ $waktuPrint['waktu'] }}
            </p> --}}
            {{-- <div style="width: 100%; height: 1px; background-color: #000000; margin-bottom: 1px;"></div>
            <div style="width: 100%; height: 1px; background-color: #000000; margin-bottom: 15px;"></div> --}}
            <h4 class="centered teks">{{ $data['hari_bali'] . ', ' . $data['tanggal_upacara'] }}
                ({{ $data['detail_waktu'] }})
            </h4>
        </div>
        <div class="tabel">
            <table class="table table-bordered table-borderless">
                <thead class="color-th">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Upacara</th>
                        <th>Upakara</th>
                        <th>Upakara Bawa Pulang</th>
                        <th>Ulam</th>
                        <th>Jam / Galah</th>
                        <th>Alamat</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_print as $key => $value)
                        <tr @if ($value['status'] == 2) class="color-cancel" @endif>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $value['nama'] }}</td>
                            <td>
                                <span id="data_print_upacara{{ $key + 1 }}">{{ $value['nama_upacara'] }}</span>
                                @if ($value['keterangan_upacara'] != null)
                                    <br><br>
                                    <b>Keterangan :</b> ({{ $value['keterangan_upacara'] }})
                                @endif
                            </td>
                            <td>
                                <span id="data_print_banten{{ $key + 1 }}">
                                    {{ $value['nama_banten'] }}
                                </span>
                                @if ($value['keterangan_cancel'] != null && $value['status'] == 2)
                                    <br><br>
                                    <b>Keterangan :</b> ({{ $value['keterangan_cancel'] }})
                                @endif
                            </td>
                            <td>
                                @if ($value['nama_banten_pulang'] != null)
                                    <span id="data_print_banten_pulang{{ $key + 1 }}">
                                        {{ $value['nama_banten_pulang'] }}
                                    </span>
                                @else
                                    Tidak Ada Banten Pulang !
                                @endif
                            </td>
                            <td>
                                @if ($value['nama_ulam'] != null)
                                    <span id="data_print_ulam{{ $key + 1 }}">
                                        {{ $value['nama_ulam'] }}
                                    </span>
                                @else
                                    Tidak Ada Banten Ulam !
                                @endif
                            </td>
                            <td>
                                {{ $value['waktu_upacara'] . ' ' . $data['detail_waktu'] }}
                            </td>
                            <td>{{ $value['alamat'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
    <div class="print-laporan">
        <div class="judul">
            <h4 class="centered teks">{{ $data['hari_bali'] . ', ' . $data['tanggal_upacara'] }}
                ({{ $data['detail_waktu'] }})
            </h4>
        </div>
        <div class="tabel">
            <div class="d-flex">
                <div class="tabel">
                    <table class="table table-bordered">
                        <tr class="color-th">
                            <td>Upacara</td>
                            <td class="centered">Total Upacara</td>
                        </tr>
                        @foreach ($data_upacara as $key => $value)
                            <tr>
                                <td class="{{ $value['status_vendor'] == 'vendor' ? 'color-vendor' : '' }}">
                                    {{ $value['upacara'] }}
                                </td>
                                <td class="centered {{ $value['status_vendor'] == 'vendor' ? 'color-vendor' : '' }}">
                                    {{ $value['total_upacara'] }}
                                </td>
                            </tr>
                        @endforeach

                    </table>
                </div>&emsp;
                <div class="tabel">

                    <table class="table table-bordered">
                        <tr class="color-th">
                            <td>Upakara</td>
                            <td class="centered">Total Upakara</td>
                        </tr>
                        @foreach ($data_banten as $key => $value)
                            <tr>
                                <td class="{{ $value['status_vendor'] == 'vendor' ? 'color-vendor' : '' }}">
                                    {{ $value['banten'] }}
                                </td>
                                <td class="centered {{ $value['status_vendor'] == 'vendor' ? 'color-vendor' : '' }}">
                                    {{ $value['qty'] }}
                                </td>
                            </tr>
                        @endforeach

                    </table>
                </div>&emsp;
                <div class="tabel">
                    <table class="table table-bordered">
                        <tr class="color-th">
                            <td>Upakara Bawa Pulang Pulang</td>
                            <td class="centered">Total Upakara Bawa Pulang</td>
                        </tr>
                        @foreach ($data_banten_pulang as $key => $value)
                            <tr>
                                <td class="{{ $value['status_vendor'] == 'vendor' ? 'color-vendor' : '' }}">
                                    {{ $value['banten_pulang'] }}
                                </td>
                                <td class="centered {{ $value['status_vendor'] == 'vendor' ? 'color-vendor' : '' }}">
                                    {{ $value['qty'] }}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>&emsp;
                <div class="tabel">
                    <table class="table table-bordered">
                        <tr class="color-th">
                            <td>Ulam</td>
                            <td class="centered">Total Ulam</td>
                        </tr>
                        @foreach ($data_ulam as $key => $value)
                            <tr>
                                <td class="{{ $value['status_vendor'] == 'vendor' ? 'color-vendor' : '' }}">
                                    {{ $value['nama_ulam'] }}
                                </td>
                                <td class="centered {{ $value['status_vendor'] == 'vendor' ? 'color-vendor' : '' }}">
                                    {{ $value['qty'] }}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        {{-- <br>
        <div style=" width: 220px; height: 210px; float: right; margin-right: 4em;">
            <h5 class="black centered">
                Gianyar, {{ Carbon\Carbon::now()->isoFormat('D MMMM Y') }}
            </h5>
            <h5 class="black centered">
                Bagian Administrasi
            </h5><br><br><br>
            <h5 class="black centered">
                (.............................................)
            </h5>
        </div> --}}
    </div>

    </div>
    {{-- <script>
        window.print();
    </script> --}}

    <script>
        for (let index = 1; index <= "{{ count($data_print) }}"; index++) {
            var huhu = document.getElementById("data_print_upacara" + index).textContent;
            document.getElementById("data_print_upacara" + index).innerHTML = huhu;
        }

        for (let index = 1; index <= "{{ count($data_print) }}"; index++) {
            var HAHAH = document.getElementById("data_print_banten" + index).textContent;
            document.getElementById("data_print_banten" + index).innerHTML = HAHAH;
        }

        for (let index = 1; index <= "{{ count($data_print) }}"; index++) {
            var xixix = document.getElementById("data_print_banten_pulang" + index).textContent;
            document.getElementById("data_print_banten_pulang" + index).innerHTML = xixix;
        }

        if ("{{ $value['nama_ulam'] != null }}") {
            for (let index = 1; index <= "{{ count($data_print) }}"; index++) {
                var hahahaha = document.getElementById("data_print_ulam" + index).textContent;
                document.getElementById("data_print_ulam" + index).innerHTML = hahahaha;
            }
        }

        window.print();
        // window.onafterprint = back;
        // window.onbeforeprint = back;
        var beforePrint = function() {
            console.log('Functionality to run before printing.');
        };

        var afterPrint = function() {
            window.history.back();
        };

        if (window.matchMedia) {
            var mediaQueryList = window.matchMedia('print');
            mediaQueryList.addListener(function(mql) {
                if (mql.matches) {
                    beforePrint();
                } else {
                    afterPrint();
                }
            });
        }

        window.onbeforeprint = beforePrint;
        window.onafterprint = afterPrint;
    </script>
    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/extensions/jquery/jquery.min.js') }}"></script>

</body>

</html>
