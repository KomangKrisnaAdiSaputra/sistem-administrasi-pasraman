@extends('layouts.app')
@section('container.isi')
@section('footer.css', '5%')
@section('aktif.upacara', 'header-aktif')
@section('custom.left', '1em')
@section('container.css')
    <style>
        .btn_tidak_aktif {
            --bs-btn-color: #fff;
            --bs-btn-bg: #abb6c1;
            --bs-btn-border-color: #99a597;
            --bs-btn-hover-color: #fff;
            --bs-btn-hover-bg: #797979;
            --bs-btn-hover-border-color: #767676;
        }
    </style>
@endsection
<section class="section">
    <div class="section-body">
        <div class="mb-3">
            <button class="btn btn-primary"
                onclick="modalTambah('{{ route('upacara.create') }}', 'Tambah Data', 'modal-md')">
                Tambah Data
            </button>
            <button class="btn btn_tidak_aktif" onclick="dataTidakAktif()" id="btn-tidak-aktif">
                Data Tidak Aktif
            </button>
            <input type="checkbox" id="cekBox_tidak_aktif" hidden>
        </div>
        <div class="row">
            <div class="col-12 ">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="jenis_upacara-tab" data-bs-toggle="tab"
                                    data-bs-target="#jenis_upacara-tab-pane" type="button" role="tab"
                                    aria-controls="jenis_upacara-tab-pane" aria-selected="true">Jenis Upacara</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="upacara-tab" data-bs-toggle="tab"
                                    data-bs-target="#upacara-tab-pane" type="button" role="tab"
                                    aria-controls="upacara-tab-pane" aria-selected="false">Upacara</button>

                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="banten-tab" data-bs-toggle="tab"
                                    data-bs-target="#banten-tab-pane" type="button" role="tab"
                                    aria-controls="banten-tab-pane" aria-selected="false">Banten</button>

                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="ulam-tab" data-bs-toggle="tab"
                                    data-bs-target="#ulam-tab-pane" type="button" role="tab"
                                    aria-controls="ulam-tab-pane" aria-selected="false">Ulam</button>

                            </li>
                        </ul>
                        <br><br>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="jenis_upacara-tab-pane" role="tabpanel"
                                aria-labelledby="jenis_upacara-tab" tabindex="0">
                                <div class="table-responsive" id="tabel-data-jenis-upacara">

                                </div>
                            </div>
                            <div class="tab-pane fade" id="upacara-tab-pane" role="tabpanel"
                                aria-labelledby="upacara-tab" tabindex="0">
                                <div class="table-responsive" id="tabel-data-upacara">

                                </div>
                            </div>
                            <div class="tab-pane fade" id="banten-tab-pane" role="tabpanel" aria-labelledby="banten-tab"
                                tabindex="0">
                                <div class="table-responsive" id="tabel-data-banten">

                                </div>
                            </div>

                            <div class="tab-pane fade" id="ulam-tab-pane" role="tabpanel" aria-labelledby="ulam-tab"
                                tabindex="0">
                                <div class="table-responsive" id="tabel-data-ulam">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@section('container.js')
    <script>
        $(document).ready(function() {

            // dataUpacara();
            dataJenisUpacara();
            dataUpacara();
            dataBanten();
            dataUlam();

        });


        function status(id, status) {
            var url = "{{ url('upacara/status') }}/" + id + "/" + status;
            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Untuk Mengubah Status Data ini!?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Ubah!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.get(url, {}, function(data) {
                        if (data['aktif/tidak'] == 0) {
                            if (data['status'] == "jenis_upacara") {
                                dataJenisUpacaraTidakAktif();
                                dataUpacaraTidakAktif();
                            } else if (data['status'] == "upacara") {
                                dataUpacaraTidakAktif();
                            } else if (data['status'] == "banten") {
                                dataBantenTidakAktif();
                            } else if (data['status'] == "ulam") {
                                dataUlamTidakAktif();
                            }
                        } else if (data['aktif/tidak'] == 1) {
                            if (data['status'] == "jenis_upacara") {
                                dataJenisUpacara();
                                dataUpacara();
                            } else if (data['status'] == "upacara") {
                                dataUpacara();
                            } else if (data['status'] == "banten") {
                                dataBanten();
                            } else if (data['status'] == "ulam") {
                                dataUlam();
                            }
                        }
                        Swal.fire(
                            'Berhasil!',
                            'Status berhasil diubah.',
                            'success'
                        )
                    }).fail(function() {
                        Swal.fire(
                            'Error!',
                            'Gagal mengubah status.',
                            'error'
                        )
                    });
                }
            });
        }


        // DATA AKTIF
        function dataJenisUpacara() {
            $.get("{{ route('data-jenis-upacara') }}", {}, function(data, status) {
                $('#tabel-data-jenis-upacara').html(data);
            });
        }

        function dataUpacara() {
            $.get("{{ route('data-upacara') }}", {}, function(data, status) {
                $('#tabel-data-upacara').html(data);
            });
        }

        function dataBanten() {
            $.get("{{ route('data-banten') }}", {}, function(data, status) {
                $('#tabel-data-banten').html(data);
            });
        }

        function dataUlam() {
            $.get("{{ route('data-ulam') }}", {}, function(data, status) {
                $('#tabel-data-ulam').html(data);
            });
        }
        // AKHIR DATA AKTIF

        // DATA TIDAK AKTIF
        function dataJenisUpacaraTidakAktif() {
            $.get("{{ route('data-jenis-upacara-tidak-aktif') }}", {}, function(data, status) {
                $('#tabel-data-jenis-upacara').html(data);
            });
        }

        function dataUpacaraTidakAktif() {
            $.get("{{ route('data-upacara-tidak-aktif') }}", {}, function(data, status) {
                $('#tabel-data-upacara').html(data);
            });
        }

        function dataBantenTidakAktif() {
            $.get("{{ route('data-banten-tidak-aktif') }}", {}, function(data, status) {
                $('#tabel-data-banten').html(data);
            });
        }

        function dataUlamTidakAktif() {
            $.get("{{ route('data-ulam-tidak-aktif') }}", {}, function(data, status) {
                $('#tabel-data-ulam').html(data);
            });
        } // AKHIR DATA TIDAK AKTIF        

        function dataTidakAktif() {
            var x = document.getElementById("cekBox_tidak_aktif");
            var btn_style = document.getElementById("btn-tidak-aktif");
            var cbox_jenis_upacara = document.getElementById('cbox_jenis_upacara')
            var cbox_upacara = document.getElementById('cbox_upacara')
            var cbox_banten = document.getElementById('cbox_banten')
            var title = document.getElementById("heading_title_custom");
            var el = btn_style;
            var par = el.parentNode;
            var next = el.nextSibling;
            par.removeChild(el);
            setTimeout(function() {
                par.insertBefore(el, next);
            }, 0)

            if (x.checked == true) {
                x.checked = false;
                title.innerHTML = 'Data Upacara';
                btn_style.innerHTML = 'Data Tidak Aktif';
                btn_style.classList.remove("btn-secondary");
                btn_style.classList.add("btn_tidak_aktif");
                dataJenisUpacara();
                dataUpacara();
                dataBanten();
                dataUlam();
            } else {
                x.checked = true;
                title.innerHTML = 'Data Upacara Tidak Aktif';
                btn_style.innerHTML = 'Data Aktif';
                btn_style.classList.remove("btn_tidak_aktif");
                btn_style.classList.add("btn-secondary");
                dataJenisUpacaraTidakAktif();
                dataUpacaraTidakAktif();
                dataBantenTidakAktif();
                dataUlamTidakAktif();
            }
        }
    </script>
@endsection
@endsection
