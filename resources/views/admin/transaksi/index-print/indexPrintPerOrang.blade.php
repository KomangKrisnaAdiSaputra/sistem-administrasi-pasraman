<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Invoice - {{ $data['data_transaksi']->nama_pelanggan }}</title>
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
            margin-top: 1em;
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

        @media print {
            body {
                -webkit-print-color-adjust: exact;
            }

            @page {
                margin: 0;
                size: A4 portrait !important;
            }

        }
    </style>
</head>

<body>

    <div class="print-laporan">
        <div class="judul">
            <h4 class="centered teks-bold">PASRAMAN GRIYA GEDE WAYAHAN BURUAN</h4>
            <p class="centered teks-bold" style="font-size: 8px !important;">Jl. Giri Sari, Celuk Buruan, Blahbatuh,
                Gianyar
                Telepon :
                +62819-0784-0384 <br> Website :
                pasramangriyaburuan.com
                Email : pasramangriyagedewayahanburuan@gmail.com</p>
        </div>
        <p style="margin-left: 3.3rem; color: black; margin-bottom: 6px;">
            File ini diunduh pada tanggal {{ $data['tanggal'] }}
            pukul {{ $data['waktu'] }}
        </p>
        {{-- <hr style="border-top: 4px double #000000; "> --}}
        <div style="width: 100%; height: 1px; background-color: #000000; margin-bottom: 1px;"></div>
        <div style="width: 100%; height: 1px; background-color: #000000; margin-bottom: 6px;"></div>
        <div class="tabel d-flex justify-content-between">
            <div style=" width: 350px; height: 150px;">
                {{-- <h5 class="teks-bold">Kode Transaksi &emsp;&emsp;&emsp;&emsp;&emsp;:
                    {{ $data['data_transaksi']->kode_transaksi }}
                </h5> --}}
                <h5 class="black mt-4">Tanggal Transaksi &emsp;&emsp;&emsp;&emsp;&ensp;&ensp;:
                    {{ Carbon\Carbon::parse($data['data_transaksi']->tanggal_transaksi)->formatLocalized('%d %B %Y') }}
                </h5>
                <h5 class="black">Tanggal Upacara &emsp;&emsp;&emsp;&emsp;&ensp;&ensp;&ensp;:
                    {{ Carbon\Carbon::parse($data['data_transaksi']->tanggal_upacara)->formatLocalized('%d %B %Y') }}
                </h5>
                @if ($data['data_transaksi']->tanggal_banten_pulang != null)
                    <h5 class="black">Tanggal Pengambilan Upakara :
                        {{ Carbon\Carbon::parse($data['data_transaksi']->tanggal_banten_pulang)->formatLocalized('%d %B %Y') }}
                        <br>
                        Bawa Pulang
                    </h5>
                @endif

            </div>
            <div style=" width: 250px; height: 150px;">
                <h5 class="black">Untuk : </h5>
                <h5 class="teks-bold">{{ $data['data_transaksi']->nama_pelanggan }}</h5>
                <h5 class="black">Alamat : {{ $data['data_transaksi']->alamat }}</h5>
                <h5 class="black">No Telp : {{ $data['data_transaksi']->no_telepon }}</h5>
                {{-- <h5 class="black">Email : {{ $data['data_transaksi']->email }}</h5> --}}
            </div>
        </div>

        <div class="tabel">
            <table class="table table-bordered tabel-pemesanan">
                <tr>
                    <td class="centered teks-bold">No</td>
                    <td class="centered teks-bold">Nama Upacara</td>
                    <td class="centered teks-bold">Jumlah (Orang)</td>
                    <td class="centered teks-bold">Nama Upakara</td>
                    <td class="centered teks-bold">Jumlah</td>
                    <td class="centered teks-bold">Status</td>
                    <td class="centered teks-bold">Total Biaya (Rp)</td>
                </tr>
                @if ($data['data_upacara']->count() > $data['data_banten']->count())
                    @foreach ($data['data_upacara'] as $key => $value)
                        <tr>
                            <td class="centered">{{ $key + 1 }}</td>
                            <td>{{ $value->tb_upacara->nama_upacara }}</td>
                            <td class="centered">{{ $value->qty_upacara }}</td>
                            @foreach ($data['data_banten'] as $key2 => $value2)
                                <td @if ($key != $key2) hidden @endif>
                                    {{ $value2->tb_banten->nama_banten }}
                                </td>
                                <td @if ($key != $key2) hidden @endif class="centered">
                                    {{ $value2->qty }}
                                </td>
                                <td @if ($key != $key2) hidden @endif>
                                    @if ($value2->banten_pulang == 0)
                                        Tidak Bawa Pulang
                                    @else
                                        Bawa Pulang
                                    @endif
                                </td>
                            @endforeach
                            @if ($data['data_upacara']->count() != $data['data_banten']->count())
                                <td @if ($key + 1 <= $data['data_banten']->count()) hidden @endif></td>
                                <td @if ($key + 1 <= $data['data_banten']->count()) hidden @endif></td>
                                <td @if ($key + 1 <= $data['data_banten']->count()) hidden @endif></td>
                            @endif
                            @if ($key == 0)
                                <td rowspan="{{ $data['data_upacara']->count() }}" class="rightt teks-bold">
                                    @currency($data['data_transaksi']->biaya)
                                </td>
                            @endif
                        </tr>
                    @endforeach
                @else
                    @foreach ($data['data_banten'] as $key => $value)
                        <tr>
                            <td class="centered">{{ $key + 1 }}</td>
                            @foreach ($data['data_upacara'] as $key2 => $value2)
                                @if ($key2 == $key)
                                    <td>
                                        {{ $value2->tb_upacara->nama_upacara }}
                                    </td>
                                    <td class="centered">
                                        {{ $value2->qty_upacara }}
                                    </td>
                                @endif
                            @endforeach
                            @if ($data['data_upacara']->count() != $data['data_banten']->count())
                                <td @if ($key + 1 <= $data['data_upacara']->count()) hidden @endif></td>
                                <td @if ($key + 1 <= $data['data_upacara']->count()) hidden @endif></td>
                            @endif
                            <td>
                                {{ $value->tb_banten->nama_banten }}
                            </td>
                            <td class="centered">
                                {{ $value->qty }}
                            </td>
                            <td>
                                @if ($value->banten_pulang == 0)
                                    Tidak Bawa Pulang
                                @else
                                    Bawa Pulang
                                @endif
                            </td>
                            @if ($key == 0)
                                <td rowspan="{{ $data['data_banten']->count() }}" class="rightt teks-bold">
                                    @currency($data['data_transaksi']->biaya)
                                </td>
                            @endif
                        </tr>
                    @endforeach
                @endif
                <tr>
                    <td class="teks-bold" colspan="2">Keterangan</td>
                    <td colspan="4">{{ $data['data_transaksi']->keterangan_upacara }}</td>
                    <td></td>
                </tr>
                <tr>
                    <td class="teks-bold" colspan="6">DP (Rp)</td>
                    <td class="rightt"> @currency($data['data_transaksi']->dp)</td>
                </tr>
                <tr>
                    <td class="teks-bold" colspan="6">Sisa (Rp)</td>
                    <td class="rightt">
                        @if ($data['data_transaksi']->tanggal_pelunasan != null)
                            0
                        @else
                            @currency($data['data_transaksi']->pelunasan)
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="teks-bold" colspan="6">Pelunasan (Rp)</td>
                    <td class="rightt">
                        @if ($data['data_transaksi']->tanggal_pelunasan == null)
                            0
                        @else
                            @currency($data['data_transaksi']->pelunasan)
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="teks-bold" colspan="6">Keterangan</td>
                    <td class="centered">
                        @if ($data['data_transaksi']->status == 0)
                            Lunas
                        @elseif($data['data_transaksi']->status == 1)
                            Belum Lunas
                        @elseif($data['data_transaksi']->status == 2)
                            Cancel
                        @endif
                    </td>
                </tr>
            </table>
        </div>
        {{-- <br>
        <div style=" width: 220px; height: 210px; float: right; margin-right: 4em;">
            <h5 class="black centered">
                Gianyar, {{ Carbon\Carbon::now()->formatLocalized('%d %B %Y') }}
            </h5>
            <h5 class="black centered">
                Bagian Administrasi
            </h5><br><br><br>
            <h5 class="black centered">
                (Ida Ayu Wahyu Kumara Putri)
            </h5>
        </div> --}}
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
