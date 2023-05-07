@extends('layouts.app')
@section('container.isi')
@section('footer.css', '5%')
@section('container.css')
    <style>
        .fontBold {
            font-weight: bold;
        }

        .centered {
            text-align: center;
        }

        .customTable td {
            font-size: 15px !important;
        }
    </style>
@endsection
<section class="section">
    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
                Transaksi
            </li>
            <li class="breadcrumb-item active" aria-current="page" style="color: cornflowerblue;">
                Data Pemesanan
            </li>
        </ol>
    </nav>
    <div class="section-body">
        <div class="mb-3">
            <button class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#info">
                Filter
            </button>
            <a href="javascript:void(0)" class="btn btn-outline-primary" title="Print Data" data-bs-toggle="modal"
                data-bs-target="#print">
                <i class="bi bi-printer-fill"></i>
            </a>
        </div>
        <div class="row">
            <div class="col-12 ">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-2 mb-4" style="margin-left: 83%;">
                            <input type="text" id="cari_teks" class="form-control" name="cari_teks"
                                placeholder="Cari" onkeyup="pencarian()" hidden />
                        </div>
                        <div class="table-responsive" id="read">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- FORM FILTER --}}
<div class="modal fade text-left" id="info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title white" id="myModalLabel130">
                    Filter
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form class="form" id="form_filter" method="POST">
                    <div class="row">
                        <h5 id="title_jenis_tanggal">Pilih Jenis Tanggal</h5>
                        <div class="d-flex justify-content-around mt-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis_tanggal"
                                    id="jenis_tanggal_upacara" value="tanggal_upacara"
                                    onclick="kategoriTanggal('Tanggal Upacara')" />
                                <label class="form-check-label" for="jenis_tanggal_upacara">
                                    Tanggal Upacara
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis_tanggal"
                                    id="jenis_tanggal_ambil_banten" value="tanggal_banten_pulang"
                                    onclick="kategoriTanggal('Tanggal Ambil Banten')" />
                                <label class="form-check-label" for="jenis_tanggal_ambil_banten">
                                    Tanggal Ambil Banten
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 col-12 mt-3">
                            <div class="form-group">
                                <label for="tanggal_awal">Tanggal Awal</label>
                                <input class="form-control" type="date" name="tanggal_awal" id="tanggal_awal">
                            </div>
                        </div>
                        <div class="col-md-6 col-12 mt-3">
                            <div class="form-group">
                                <label for="tanggal_akhir">Tanggal Akhir</label>
                                <input class="form-control" type="date" name="tanggal_akhir" id="tanggal_akhir">
                            </div>
                        </div>&emsp;&emsp;
                        <hr>
                        <div class="form-group" id="select-option">
                            <label for="jenis_upacara">Jenis Upacara</label>
                            <select class="form-select" id="jenis_upacara" name="jenis_upacara"
                                style="background-color: white !important;">
                                <option value="" disabled selected hidden>Jenis Upacara</option>
                                <div>
                                    @foreach ($data['tb_jenis_upacara'] as $key => $value)
                                        <option value="{{ $value->id }}">
                                            {{ $value->nama_jenis_upacara }}
                                        </option>
                                    @endforeach
                                </div>
                            </select>
                        </div>&emsp;&emsp;
                        <hr>
                        <h5>Kategori</h5>
                        <div class="d-flex justify-content-around">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="kategori" id="kategori1"
                                    value="Privat" />
                                <label class="form-check-label" for="kategori1">
                                    Privat
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="kategori" id="kategori2"
                                    value="Umum" />
                                <label class="form-check-label" for="kategori2">
                                    Umum
                                </label>
                            </div>
                        </div>&emsp;&emsp;
                        <hr>
                        <h5>Status</h5>
                        <div class="d-flex justify-content-around">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="status1"
                                    value="0" />
                                <label class="form-check-label" for="status1">
                                    Lunas
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="status2"
                                    value="1" />
                                <label class="form-check-label" for="status2">
                                    Belum Lunas
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="status3"
                                    value="2" />
                                <label class="form-check-label" for="status3">
                                    Cancel
                                </label>
                            </div>
                        </div>&emsp;&emsp;
                        <hr>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="button" class="btn btn-light-secondary me-1 mb-1"
                                onclick="resetFormFilter()">
                                Reset
                            </button>
                            <button type="submit" class="btn btn-info me-1 mb-1" id="btn_filter">
                                Cek
                            </button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<input type="hidden" id="tanggal_minggu_awal" value="{{ $data['tanggal_minggu_awal'] }}">
<input type="hidden" id="tanggal_minggu_akhir" value="{{ $data['tanggal_minggu_akhir'] }}">
{{-- PRINT --}}
<div class="modal fade text-left" id="print" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title white" id="myModalLabel130">
                    Pilihan Print
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <div style="text-align: center">
                    @if ($data['count_data'] != 0)
                        <button type="button" class="btn btn-primary" title="Print Data" id="print_hari_ini"
                            onclick="print('print')">
                            Print Hari Ini
                        </button>
                    @endif
                    <input type="hidden" id="cek_data_print" value="{{ $data['count_data'] }}">
                    <a href="javascript:void(0)" class="btn btn-primary" title="Print Data"
                        data-bs-toggle="collapse" data-bs-target="#collapseExample_print">
                        Print Custom
                    </a>
                </div>
                <div class="collapse mt-4 mb-4" id="collapseExample_print">
                    <div class="card card-body">
                        <form class="mt-4">
                            <div class="row mb-5">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="tanggal_upacara">Tanggal Upacara</label>
                                        <input class="form-control" type="date" name="tanggal_upacara"
                                            id="tanggal_upacara" onchange="clearStyle()">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Waktu Upacara</label>
                                        <fieldset class="form-group">
                                            <select class="form-select" id="waktu_upacara" name="waktu_upacara"
                                                onchange="clearStyle()" required>
                                                <option value="" disabled selected hidden>Waktu Upacara</option>
                                                <option value="Pagi">Pagi</option>
                                                <option value="Sore">Sore</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                </div>

                            </div>

                            <button type="reset" class="btn btn-danger" id="reset_print">Reset</button>
                            <button type="button" class="btn btn-primary"
                                onclick="print('custom-print')">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<input type="hidden" id="hash_" value="{{ Crypt::encrypt('print jadwal harian') }}">
@section('container.js')

    <script>
$(document).ready(function() {
            var tanggal_minggu_awal = document.getElementById("tanggal_minggu_awal").value;
            var tanggal_minggu_akhir = document.getElementById("tanggal_minggu_akhir").value;
            var tanggal_awal = document.getElementById("tanggal_awal");
            var tanggal_akhir = document.getElementById("tanggal_akhir");
            var privat = document.getElementById("kategori1");
            var ambil_banten = document.getElementById("jenis_tanggal_ambil_banten");
            var cek_tanggal_upacara = document.getElementById("jenis_tanggal_upacara");
            var belum_lunas = document.getElementById("status2");
            let btn_filter = document.getElementById("btn_filter");
            const queryString = window.location.search;

            tanggal_awal.readOnly = true;
            tanggal_akhir.readOnly = true;


            if (queryString != "") {
                tanggal_awal.readOnly = false;
                tanggal_akhir.readOnly = false;
                if (queryString == '?dashboard=belum-lunas') {
                    cek_tanggal_upacara.checked = true;
                    tanggal_awal.value = tanggal_minggu_awal;
                    tanggal_akhir.value = tanggal_minggu_akhir;
                    belum_lunas.checked = true;
                } else if (queryString == '?dashboard=transaksi') {
                    cek_tanggal_upacara.checked = true;
                    tanggal_awal.value = tanggal_minggu_awal;
                    tanggal_akhir.value = tanggal_minggu_akhir;
                } else if (queryString == '?dashboard=pelanggan') {
                    tanggal_awal.value = tanggal_minggu_awal;
                    tanggal_akhir.value = tanggal_minggu_akhir;
                    ambil_banten.checked = true;
                } else if (queryString == '?dashboard=privat') {
                    cek_tanggal_upacara.checked = true;
                    tanggal_awal.value = tanggal_minggu_awal;
                    tanggal_akhir.value = tanggal_minggu_akhir;
                    privat.checked = true;
                }

                var tanggal = 0;

                if (tanggal_minggu_awal != "" && tanggal_minggu_akhir != "") {

                    tanggal = 0;

                } else if (tanggal_minggu_awal == "" && tanggal_minggu_akhir == "") {

                    tanggal = 0;

                } else if (tanggal_minggu_awal == "" || tanggal_minggu_akhir == "") {

                    tanggal = 1;
                }

                if (tanggal == 0) {

                    let fd = new FormData(document.getElementById("form_filter"));
                    $.ajax({
                        url: "{{ route('filter-pemesanan') }}",
                        method: 'post',
                        data: fd,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            $('#info').modal('hide');
                            $('#read').html(response);
                        }
                    });

                }

            }
                else {tabelPemesanan();}

            window.history.pushState({}, document.title, "/" + "transaksi/data-pemesanan");
        });

        function tabelPemesanan() {
            $.get("{{ route('tabel-pemesanan') }}", {}, function(data, status) {
                $('#read').html(data);
            });
        }

        function resetFormFilter() {

            document.getElementById("form_filter").reset();
            console.log("hahah");
        }

        $("#form_filter").submit(function(e) {
            e.preventDefault();
            var tanggal_awal = $('#tanggal_awal').val();
            var tanggal_akhir = $('#tanggal_akhir').val();
            var tanggal = 0;

            if (tanggal_awal != "" && tanggal_akhir != "") {

                tanggal = 0;

            } else if (tanggal_awal == "" && tanggal_akhir == "") {

                tanggal = 0;

            } else if (tanggal_awal == "" || tanggal_akhir == "") {

                tanggal = 1;
            }

            if (tanggal == 0) {
                document.getElementById("tanggal_akhir").style.borderColor = "#C0C0C0";

                let fd = new FormData(this);
                console.log(fd);
                $.ajax({
                    url: "{{ route('filter-pemesanan') }}",
                    method: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        $('#info').modal('hide');
                        $('#read').html(response);

                        console.log(response);


                    }
                });

            } else {
                if (tanggal_awal == "") {
                    document.getElementById("tanggal_awal").style.borderColor = "red";
                    document.getElementById("tanggal_awal").focus();
                    console.log("tanggal_akhir kosong1");

                } else if (tanggal_akhir == "") {
                    document.getElementById("tanggal_akhir").style.borderColor = "red";
                    document.getElementById("tanggal_akhir").focus();
                    console.log("tanggal_akhir kosong2");

                }
            }
        });

        function refresh() {
            tabelPemesanan();
            resetFormFilter();
            $("#heading_title_custom").html("Data Pemesanan");

        }
        var cek_data = document.getElementById("cek_data_print").value;


        $('#collapseExample_print').on('show.bs.collapse', function() {
            if (cek_data != 0) {
                document.getElementById("print_hari_ini").disabled = true;
            }
        });

        $('#collapseExample_print').on('hide.bs.collapse', function() {
            if (cek_data != 0) {
                document.getElementById("print_hari_ini").disabled = false;

            }
            document.getElementById("reset_print").click();
        });

        function print(cek) {
            var url = "";
            var data_cek = document.getElementById("hash_").value;

            if (cek == 'print') {
                var array = [

                    {
                        'value': data_cek
                    },
                ];


                array.forEach(function(e) {
                    url += e.value + "&";
                });
                url = url.trim("&");

                var href = "{{ url('transaksi/print') }}/" + url;
                $('#print').modal('hide');
                document.getElementById("reset_print").click();
                window.location.href = href;

            } else if (cek == 'custom-print') {
                var tanggal_upacara = document.getElementById("tanggal_upacara");
                var waktu_upacara = document.getElementById("waktu_upacara");


                if (tanggal_upacara.value != "" && waktu_upacara.value != "") {
                    var array = [{
                            'value': data_cek
                        },
                        {
                            'value': tanggal_upacara.value
                        },
                        {
                            'value': waktu_upacara.value
                        },
                    ];


                    array.forEach(function(e) {
                        url += e.value + "&";
                    });
                    url = url.trim("&");


                    var href = "{{ url('transaksi/print') }}/" + url;
                    $('#print').modal('hide');
                    document.getElementById("reset_print").click();
                    $('#collapseExample_print').collapse('hide');
                    window.location.href = href;

                } else {

                    if (tanggal_upacara.value == "") {
                        tanggal_upacara.style.borderColor = "red";
                        tanggal_upacara.focus();
                    } else if (waktu_upacara.value == "") {
                        waktu_upacara.style.borderColor = "red";
                        waktu_upacara.focus();
                    }
                }
            }
        }

        function clearStyle() {
            document.getElementById("tanggal_upacara").style.borderColor = "";
            document.getElementById("waktu_upacara").style.borderColor = "";
        }

        function kategoriTanggal(status) {

            $("#title_jenis_tanggal").html(status);

            tanggal_awal.readOnly = false;
            tanggal_akhir.readOnly = false;
        }
    </script>
@endsection
@endsection
