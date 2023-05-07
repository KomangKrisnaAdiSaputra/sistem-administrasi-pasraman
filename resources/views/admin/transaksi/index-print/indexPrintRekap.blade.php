<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Rekap Transaksi_{{ $tanggal['tanggal_print'] }}</title>
    <link rel="stylesheet" href="{{ asset('assets/css/main/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/shared/iconly.css') }}" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <style>
        * {
            font-size: 12px;
            font-family: 'Times New Roman';
        }

        .centered {
            text-align: center;
        }

        .rightt {
            text-align: right;
        }

        .teks-bold {
            color: black;
            font-weight: bold;
        }

        .judul {
            padding: 1em;
            margin-top: 0.5em;
        }

        .judul p {
            padding: -0.1em;

        }

        .tabel {
            width: 90%;
            margin-left: auto;
            margin-right: auto;
        }

        .tabel,
        tr,
        td {
            color: black;
        }

        .black {
            color: black;
            font-weight: normal;
        }

        .tabel-pemesanan tr td {
            border: 1px solid;
        }

        .center-text td {
            text-align: center;
            font-weight: bold;
        }

        /* div.print-laporan {
            display: none;
        }

        @media print {
           

            div.print-laporan {
                position: fixed;
                bottom: 0;
            }

            @page {
                margin: 2cm;
                size: A4 landscape !important;
            }

        } */
        @media print {

            @page {
                margin: 1em;

                size: A4 landscape !important;

            }
        }

        /* @page {
            size: A4 landscape !important;
            margin: 2cm;
        } */

        /* @print {
            @page :footer {
                display: none
            }

            @page :header {
                display: none
            }
        }

        break-inside: avoid; */
    </style>
</head>

<body>

    <div class="print-laporan">
        <div class="judul">
            <h4 class="centered teks-bold">PASRAMAN GRIYA GEDE WAYAHAN BURUAN</h4>
            <p class="centered teks-bold" style="font-size: 8px !important;">
                Rekap Transaksi Pemesanan <br>
                Periode {{ $tanggal['tanggal_awal'] }} - {{ $tanggal['tanggal_akhir'] }}
            </p>
        </div>
        <div class="tabel">
            <table class="table table-bordered tabel-pemesanan">
                <tr class="center-text">
                    <td>No</td>
                    {{-- <td>Kode Transaksi</td> --}}
                    <td>Nama Pelanggan</td>
                    <td>Tanggal Transaksi</td>
                    <td>Tanggal Upacara</td>
                    {{-- <td>Nama Upacara</td> --}}
                    <td>Total Biaya (Rp)</td>
                    <td>DP (Rp)</td>
                    <td>Pelunasan (Rp)</td>
                    <td>Sisa (Rp)</td>
                    <td>Ket</td>
                </tr>
                @foreach ($data as $key => $value)
                    <tr>
                        <td class="centered">{{ $key + 1 }}</td>
                        {{-- <td>{{ $value['kode_transaksi'] }}</td> --}}
                        <td>{{ $value['nama_pelanggan'] }}</td>
                        <td class="centered">
                            {{ Carbon\Carbon::parse($value['tanggal_transaksi'])->isoFormat('DD-MM-YYYY') }}
                        </td>
                        <td class="centered">
                            {{ Carbon\Carbon::parse($value['tanggal_upacara'])->isoFormat('DD-MM-YYYY') }}
                        </td>
                        {{-- <td>{{ $value['nama_upacara'] }}</td> --}}
                        <td class="rightt"> @currency($value['total_biaya']) </td>
                        <td class="rightt"> @currency($value['dp']) </td>
                        <td class="rightt">
                            @if ($value['status'] == 0)
                                @currency($value['pelunasan'])
                            @elseif($value['status'] == 1)
                                0
                            @endif
                        </td>
                        <td class="rightt">
                            @if ($value['status'] == 1)
                                @currency($value['sisa'])
                            @elseif($value['status'] == 0)
                                0
                            @endif
                        </td>
                        <td>{{ $value['keterangan'] }}</td>
                    </tr>
                @endforeach

            </table>
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
                (Ida Ayu Wahyu Kumara Putri)
            </h5>
        </div> --}}
        <p style="margin-left: 5rem; color: black; margin-top: 10em;">
            File ini diunduh pada tanggal {{ $tanggal['tanggal_print'] }}
            pukul {{ $tanggal['waktu'] }}
        </p>
    </div>
    {{-- <script>
        window.print();
    </script> --}}

    <script>
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
