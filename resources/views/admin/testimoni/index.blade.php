@extends('layouts.app')
@section('container.isi')
@section('footer.css', '5%')
@section('aktif.testimoni', 'header-aktif')
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

        .kursor-klik {
            cursor: pointer;
        }
    </style>
@endsection
<section class="section">
    <div class="section-body">
        <div class="mb-3">
            <button class="btn btn-primary"
                onclick="modalTambah('{{ route('testimoni.create') }}', 'Tambah Data Testimoni', 'modal-md')">
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
                    <div class="card-body" id="data_testimoni">

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@section('container.js')
    <script>
        $(document).ready(function() {
            tabelTestimoni();
        });

        function tabelTestimoni() {
            $.get("{{ route('tabel-testimoni') }}", {}, function(data, status) {
                $('#data_testimoni').html(data);
            });
        }

        function tabelTestimoniTidakAktif() {
            $.get("{{ route('tabel-testimoni-tidak-aktif') }}", {}, function(data, status) {
                $('#data_testimoni').html(data);
            });
        }

        function status(id) {
        var x = document.getElementById("cekBox_tidak_aktif");
        var url = "{{ url('testimoni/status') }}/" + id;
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
            $.get(url, {}, function(data, status) {
                if (x.checked == true) {
                tabelTestimoniTidakAktif();
                } else {
                tabelTestimoni();
                }
            });
            Swal.fire(
                'Berhasil!',
                'Status berhasil diubah.',
                'success'
            )
            }
        })
        }

        function dataTidakAktif() {
            var x = document.getElementById("cekBox_tidak_aktif");
            var btn_style = document.getElementById("btn-tidak-aktif");
            var title =  document.getElementById("heading_title_custom");
            var el = btn_style;
            var par = el.parentNode;
            var next = el.nextSibling;
            par.removeChild(el);
            setTimeout(function() {
                par.insertBefore(el, next);
            }, 0)

            if (x.checked == true) {
                x.checked = false;
                title.innerHTML = 'Data Testimoni';
                btn_style.innerHTML = 'Data Tidak Aktif';
                btn_style.classList.remove("btn-secondary");
                btn_style.classList.add("btn_tidak_aktif");

                tabelTestimoni();

            } else {
                x.checked = true;
                title.innerHTML = 'Data Testimoni Tidak Aktif';
                btn_style.innerHTML = 'Data Aktif';
                btn_style.classList.remove("btn_tidak_aktif");
                btn_style.classList.add("btn-secondary");

                tabelTestimoniTidakAktif();

            }
        }

    </script>
@endsection
@endsection
