@extends('layouts.app')
@section('container.isi')
@section('footer.css', '5%')
@section('aktif.transaksi', 'header-aktif')
@section('container.css')
    <style>
        .center-tabel {
            /* width: 800px; */
            margin-left: auto;
            margin-right: auto;
        }

        .fontBold {
            font-weight: bold;
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
                Data Transaksi
            </li>
        </ol>
    </nav>
    <div class="section-body">
        <div class="mb-3">
            <button class="btn btn-primary"
                onclick="modalTambah('{{ route('transaksi.create') }}', 'Form Data', 'modal-dialog-scrollable modal-xl')">
                Tambah Data
            </button>
            <button class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#info">
                Filter
            </button>

        </div>
        <div class="row">
            <div class="col-12 ">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive" id="tabel-transaksi">

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
                        <h5>Tanggal Transaksi</h5>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="tanggal_awal">Tanggal Awal</label>
                                <input class="form-control" type="date" name="tanggal_awal" id="tanggal_awal"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="tanggal_akhir">Tanggal Akhir</label>
                                <input class="form-control" type="date" name="tanggal_akhir" id="tanggal_akhir"
                                    required>
                            </div>
                        </div>&emsp;&emsp;
                        <hr>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">
                                Reset
                            </button>
                            <button type="submit" class="btn btn-info me-1 mb-1">
                                Cek
                            </button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@section('container.js')
    <script>
        $(document).ready(function() {

            // Mejalankan function tabel transaksi
            tabelTransaksi();

        });

        // Fungsi untuk menampilkan data tabel transaksi
        function tabelTransaksi() {

            // Deklarasi variabel
            var tanggal = "kosong";

            // Mendapatkan data transaksi melalui route / link dikirim yang dikirimkan dari controller dan di masukkan kedalam id
            $.get("{{ url('transaksi/tabel-transaksi') }}/" + tanggal, {}, function(data, status) {
                $('#tabel-transaksi').html(data);
            });
        }

        // Fungsi untuk menampilkan data tabel upacara di form tambah transaksi
        function tabelUpacara() {

            // Mendapatkan data upacara melalui route / link dikirim yang dikirimkan dari controller dan di masukkan kedalam id
            $.get("{{ route('daftar-upacara') }}", {}, function(data, status) {
                $('#tabel-daftar-upacara').html(data);
            });
        }

        // Fungsi untuk menampilkan data tabel banten di form tambah transaksi
        function tabelBanten() {

            // Mendapatkan data banten melalui route / link dikirim yang dikirimkan dari controller dan di masukkan kedalam id
            $.get("{{ route('daftar-banten') }}", {}, function(data, status) {
                $('#tabel-daftar-banten').html(data);
            });
        }

        function tabelUlam() {

            // Mendapatkan data banten melalui route / link dikirim yang dikirimkan dari controller dan di masukkan kedalam id
            $.get("{{ route('daftar-ulam') }}", {}, function(data, status) {
                $('#tabel-daftar-ulam').html(data);
            });
        }

        //Fungsi untuk mengecek sisa saat menambah data transaksi
        function cekSisa() {

            //Deklarasi variabel input berdasarkan id
            var cek_biaya = document.getElementById('biaya').value = formatRupiah2($('#biaya').val());
            var cek_dp = document.getElementById('dp').value = formatRupiah2($('#dp').val());
            var cek_sisa = cek_biaya.replaceAll(".", "") - cek_dp.replaceAll(".", "");
            var sisa = document.getElementById('sisa');
            var biaya = document.getElementById('biaya');
            var dp = document.getElementById('dp');

            // formatRupiah2 untuk mengubah angka bentuk pecahan rupiah
            // replaceAll untuk menghilangkan titik

            sisa.style.borderColor = "";
            biaya.style.borderColor = "";
            dp.style.borderColor = "";

            // style.borderColor untuk mengubah warna atau menghilangkan warna border

            // Jika hasil sisa kurang dari 0 
            if (cek_sisa < 0) {

                // Reset ke 0 
                sisa.value = 0;
                biaya.value = 0;
                dp.value = 0;

                // Beri warna merah pada input text
                sisa.style.borderColor = "red";
                biaya.style.borderColor = "red";
                dp.style.borderColor = "red";

                // Beri notifikasi alert jika sisanya kurang dari 0 atau minus
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Hasil Sisa Minus!',
                });

                // Arahkan kursor ke input text biaya
                biaya.focus();

                // Jika sisanya lebih dari 0
            } else {

                // Ubah format tampilan di sisa
                sisa.value = formatRupiah(cek_sisa);
            }
        }

        $("#form_filter").submit(function(e) {
            e.preventDefault();
            var tanggal_awal = $('#tanggal_awal').val();
            var tanggal_akhir = $('#tanggal_akhir').val();
            var tanggal = tanggal_awal + "&" + tanggal_akhir;

            $.get("{{ url('transaksi/tabel-transaksi') }}/" + tanggal, {}, function(data, status) {
                $('#info').modal('hide');
                $('#tabel-transaksi').html(data);
            });
        })

        function refresh() {
            tabelTransaksi();
            document.getElementById("form_filter").reset();
        }

        function doPrint(link) {
            $.get(link, {}, function(data, status) {
                location.href = link;
            });
        }

        $('#modalUpdate').on('hidden.bs.modal', function(e) {
            $('#data_upacara').html('');
            $('#data_banten').html('');
            $('#data_ulam').html('');
        })
    </script>
@endsection
@endsection
