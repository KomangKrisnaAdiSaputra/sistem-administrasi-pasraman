<form method="POST" id="form-keranjang" action="{{ route('transaksi.update', $id_transaksi) }}">
    @method('put')
    @csrf
    <div class="form-body d-flex justify-content-center">
        <div class="row">
            <div class="col-md-4">
                <label>Nama Pelanggan</label>
            </div>
            <div class="col-md-8 form-group">
                <input type="text" id="nama_pelanggan" class="form-control" name="nama_pelanggan"
                    placeholder="Nama Pelanggan" value="{{ $transaksi->nama_pelanggan }}"
                    {{ $transaksi->status == 2 ? 'readonly' : '' }} required />
            </div>
            {{-- <div class="col-md-4">
                <label>Email</label>
            </div>
            <div class="col-md-8 form-group">
                <input type="email" id="email" class="form-control" name="email" placeholder="Email"
                    value="{{ $transaksi->email }}" {{ $transaksi->status == 2 ? 'readonly' : '' }} required />
            </div> --}}
            <div class="col-md-4">
                <label>No Telepon</label>
            </div>
            <div class="col-md-8 form-group">
                <input type="number" id="no_telepon" class="form-control" name="no_telepon" placeholder="No Telepon"
                    value="{{ $transaksi->no_telepon }}" {{ $transaksi->status == 2 ? 'readonly' : '' }} required />
            </div>
            <div class="col-md-4">
                <label>Alamat</label>
            </div>
            <div class="col-md-8 form-group">
                <textarea class="form-control" id="alamat"name="alamat" rows="3" placeholder="Alamat"
                    {{ $transaksi->status == 2 ? 'readonly' : '' }} required>{{ $transaksi->alamat }}</textarea>
            </div>
            <div class="col-md-4">
                <label>Kategori</label>
            </div>
            <div class="col-md-8 form-group">
                <div class="d-flex justify-content-around">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="kategori" id="kategori1" value="Privat"
                            {{ $transaksi->kategori == 'Privat' ? 'checked' : '' }} style="cursor: pointer;"
                            onclick="{{ $transaksi->status == 2 ? 'return false;' : '' }}" required />
                        <label class="form-check-label" for="kategori1" style="cursor: pointer;">
                            Privat
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="kategori" id="kategori2" value="Umum"
                            {{ $transaksi->kategori == 'Umum' ? 'checked' : '' }} style="cursor: pointer;"
                            onclick="{{ $transaksi->status == 2 ? 'return false;' : '' }}" required />
                        <label class="form-check-label" for="kategori2" style="cursor: pointer;">
                            Umum
                        </label>
                    </div>
                </div>
            </div>
        </div>
        &emsp;&emsp;&emsp;&emsp;
        <div class="row">
            <div class="col-md-4">
                <label>Tanggal Upacara</label>
            </div>
            <div class="col-md-8 form-group">
                <input class="tm form-control" type="date" name="tanggal_upacara" id="tanggal_upacara_edit"
                    data-date-format="DD/MM/YYYY" value="{{ $transaksi->tanggal_upacara }}" min="{{ $tanggal }}"
                    onchange="tanggal_sapta_panca_wara(this.value)" {{ $transaksi->status == 2 ? 'readonly' : '' }}
                    required>
            </div>
            <div class="col-md-4">
                <label>Sapta Wara</label>
            </div>
            <div class="col-md-8 form-group">
                <input class="form-control" type="text" value="{{ $transaksi->sapta_wara }}" name="sapta_wara"
                    id="sapta_wara" readonly>
            </div>
            <div class="col-md-4">
                <label>Panca Wara</label>
            </div>
            <div class="col-md-8 form-group">

                <input class="form-control" type="text" value="{{ $transaksi->panca_wara }}" name="panca_wara"
                    id="panca_wara" readonly>
            </div>
            <div class="col-md-4">
                <label>Wuku</label>
            </div>
            <div class="col-md-8 form-group">
                <input class="form-control" type="text" value="{{ $transaksi->wuku }}" placeholder="Kosong"
                    name="wuku" id="wuku" required readonly>
            </div>
            <div class="col-md-4">
                <label>Waktu</label>
            </div>
            <div class="col-md-8 form-group">
                <input type="time" id="waktu_upacara" class="form-control" name="waktu_upacara"
                    value="{{ $transaksi->waktu_upacara }}" {{ $transaksi->status == 2 ? 'readonly' : '' }}
                    required />
            </div>
            <div class="col-md-4">
                <label>Tanggal Transaksi</label>
            </div>
            <div class="col-md-8 form-group">
                <input class="form-control tm" type="date" name="tanggal_transaksi" id="tanggal_transaksi_edit"
                    data-date-format="DD/MM/YYYY" value="{{ $transaksi->tanggal_transaksi }}"
                    max="{{ $tanggal }}" {{ $transaksi->status == 2 ? 'readonly' : '' }} required>

            </div>
        </div>
    </div>
    <hr>
    <h4>Keterangan Upacara</h4>
    <div class="form-floating mt-2">
        <textarea class="form-control" placeholder="Keterangan" id="floatingTextarea" name="keterangan_upacara"
            {{ $transaksi->status == 2 ? 'readonly' : '' }}>{{ $transaksi->keterangan_upacara }}</textarea>
        <label for="floatingTextarea">Keterangan</label>
    </div>
    <hr>

    @if ($transaksi->status == 2)
        <h4>Daftar Upacara</h4>
        <div class="card-content mt-4">
            <div class="card-body">
                <div class="table-responsive d-flex justify-content-center">
                    <div class="center-tabel" style="width: 800px;">
                        <table class="table tabel-transaksi-upacara">
                            <thead>
                                <tr>
                                    <th>Jenis Upacara</th>
                                    <th>Nama Upacara</th>
                                    <th style="text-align: center;">Qty</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['transaksi_upacara'] as $key => $value)
                                    <tr>
                                        <td class="text-bold-500">
                                            {{ $value->tb_upacara->tb_jenis_upacara->nama_jenis_upacara }}
                                        </td>

                                        <td class="text-bold-500">{{ $value->tb_upacara->nama_upacara }}</td>
                                        <td style="width: 13%; text-align: center;">
                                            {{ $value->qty_upacara }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <h4>Daftar Upakara</h4>
        <div class="card-content mt-4">
            <div class="card-body">
                <div class="table-responsive d-flex justify-content-center">
                    <div class="center-tabel" style="width: 800px;">
                        <table class="table table-bordered tabel-banten">
                            <thead>
                                <tr>
                                    <th>Nama Upakara</th>
                                    <th>Qty</th>
                                    <th>Upakara Bawa Pulang</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['transaksi_banten'] as $key => $value)
                                    <tr>
                                        <td>{{ $value->tb_banten->nama_banten }}</td>
                                        <td style="width: 13%; text-align: center;">
                                            {{ $value->qty }}
                                        </td>
                                        <td style="width: 10%; text-align: center;">
                                            <input type="checkbox" class="form-check-input"
                                                {{ $value->banten_pulang == 1 ? 'checked' : '' }}
                                                onclick="return false;">
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <h4>Daftar Ulam</h4>
        <div class="card-content mt-4">
            <div class="card-body">
                <div class="table-responsive d-flex justify-content-center">
                    <div class="center-tabel" style="width: 800px;">
                        <table class="table table-bordered tabel-transaksi-ulam">
                            <thead>
                                <tr>
                                    <th>Nama Ulam</th>
                                    <th style="text-align: center;">Qty</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['transaksi_ulam'] as $key => $value)
                                    <tr>
                                        <td>{{ $value->tb_ulam->nama_ulam }}</td>
                                        <td style="width: 13%; text-align: center;">
                                            {{ $value->qty }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @else
        <h4>Daftar Upacara</h4>
        <div class="card-content mt-4">
            <div class="card-body">
                <div class="table-responsive d-flex justify-content-center" id="tabel-daftar-transaksi-upacara">

                </div>
            </div>
        </div>
        <div class="form-check mt-2">
            <button type="button" class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#data_upacara">
                Tambah Data Upacara
            </button>
        </div>
        <div class="collapse mt-4 mb-4" id="data_upacara">

        </div>
        <hr>
        <h4>Daftar Upakara</h4>
        <div class="card-content mt-4">
            <div class="card-body">
                <div class="table-responsive d-flex justify-content-center" id="tabel-daftar-transaksi-banten">
                </div>
            </div>
        </div>
        <div class="form-check mt-2">
            <button type="button" class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#data_banten">
                Tambah Data Upakara
            </button>
        </div>
        <div class="collapse mt-4 mb-4" id="data_banten">

        </div>
        <hr>
        <h4>Daftar Ulam</h4>
        <div class="card-content mt-4">
            <div class="card-body">
                <div class="table-responsive d-flex justify-content-center" id="tabel-daftar-transaksi-ulam">
                </div>
            </div>
        </div>
        <div class="form-check mt-2">
            <button type="button" class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#data_ulam">
                Tambah Data Ulam
            </button>
        </div>
        <div class="collapse mt-4 mb-4" id="data_ulam">

        </div>
    @endif

    <hr>
    <h4>Pelunasan</h4>

    <div class="form-body mt-4">
        <div class="center-tabel  col-lg-9 col-md-12">
            <div class="row ">
                <div class="col-md-4">
                    <label>Biaya (Rp)</label>
                </div>
                <div class="col-md-8 form-group">
                    <input type="text" id="biaya" class="form-control" name="biaya" placeholder="0"
                        value="@currency($transaksi->biaya)"style="text-align: right;" readonly />
                </div>
                <div class="col-md-4">
                    <label>Dp (Rp)</label>
                </div>
                <div class="col-md-8 form-group">
                    <input type="text" id="dp" class="form-control" name="dp" placeholder="0"
                        value="@currency($transaksi->dp)" style="text-align: right;" readonly />
                </div>
                <div class="col-md-4">
                    <label>Sisa (Rp)</label>
                </div>
                <div class="col-md-8 form-group">
                    <input type="text" id="sisa" class="form-control" placeholder="0" name="sisa"
                        value="@currency($transaksi->pelunasan)" style="text-align: right;" readonly />
                </div>
                <hr>
                <div class="d-flex col-md-7">
                    <div class="col-lg-4 col-md-3">
                        <label>Tanggal Pelunasan</label>
                    </div>&emsp;&emsp;
                    <div class="col-lg-6 col-md-6 form-group">
                        @if ($transaksi->status == 1)
                            <input class="tm form-control" type="date" name="tanggal_pelunasan"
                                id="tanggal_pelunasan" data-date-format="DD/MM/YYYY"
                                onchange="pelunasanEdit('tanggal_pelunasan')"
                                value="{{ $transaksi->tanggal_pelunasan }}">
                        @else
                            @if ($transaksi->tanggal_pelunasan == null)
                                <input class="form-control" type="text" value="dd/mm/yyyy" readonly>
                            @else
                                <input class="form-control" type="text"
                                    value="{{ date('d/m/Y', strtotime($transaksi->tanggal_pelunasan)) }}" readonly>
                            @endif

                        @endif

                    </div>
                    &emsp;
                    <div class="col-md-3">
                        <label>Pelunasan (Rp)</label>
                    </div>&emsp;&emsp;
                    <div class="col-lg-6 col-md-6 form-group">
                        @if ($transaksi->status == 1)
                            <input type="text" class="form-control" placeholder="0" name="pelunasan"
                                style="text-align: right;" id="pelunasan_edit"
                                onkeyup="pelunasanEdit('pelunasan')" />
                        @else
                            @if ($transaksi->tanggal_pelunasan == null)
                                <input type="text" id="pelunasan" class="form-control" value="@currency(0)"
                                    style="text-align: right;" readonly />
                            @else
                                <input type="text" id="pelunasan" class="form-control" value="@currency($transaksi->pelunasan)"
                                    style="text-align: right;" readonly />
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if ($transaksi->status == 0 || $transaksi->status == 1)
        <hr>
        <div class="form-check">
            <div class="checkbox">
                <input type="checkbox" class="form-check-input" id="show-form-keterangan" style="cursor: pointer;"
                    data-bs-toggle="collapse" data-bs-target="#collapseExample_ket_cancel" />
                <label for="show-form-keterangan" style="cursor: pointer;">Centang Untuk Cancel Transaksi!</label>
            </div>
        </div>
        <div class="collapse mt-4 mb-4" id="collapseExample_ket_cancel">
            <h4>Cancel Transaksi</h4>
            <div class="form-floating mt-2">
                <textarea class="form-control" placeholder="Keterangan Cancel" id="floatingTextarea2" name="keterangan_cancel"></textarea>
                <label for="floatingTextarea2">Keterangan</label>
            </div>
        </div>
    @else
        <hr>
        <h4>Cancel Transaksi</h4>
        <div class="form-floating mt-2">
            <textarea class="form-control" placeholder="Keterangan Cancel" id="floatingTextarea2" name="keterangan_cancel"
                readonly>{{ $transaksi->keterangan_cancel }}</textarea>
            <label for="floatingTextarea2">Keterangan</label>
        </div>
    @endif

    <div class="col-sm-12 d-flex justify-content-end mt-4">
        <button type="reset" class="btn btn-light-secondary me-1 mb-1" data-bs-dismiss="modal">
            Close
        </button>
        <button type="submit" class="btn btn-primary me-1 mb-1" id="btnSumbit" onclick="saveData()"
            {{ $transaksi->status == 2 ? 'hidden' : '' }}>
            Submit
        </button>
    </div>

</form>
<input type="text" id="cek_button_transaksi_banten_pulang"
    value="{{ $data['transaksi_banten']->sum('banten_pulang') }}" hidden>
<input type="text" id="cek_button_banten_pulang" value="0" hidden>
<script>
    $(document).ready(function() {

        tabelTransaksiUpacara();
        tabelTransaksiBanten();
        tabelTransaksiUlam();
    });
    // Mengubah format input type date

    function tabelTransaksiUpacara() {

        // Mendapatkan data upacara melalui route / link dikirim yang dikirimkan dari controller dan di masukkan kedalam id
        $.get("{{ route('daftar-transaksi-upacara', $id_transaksi) }}", {}, function(data, status) {
            $('#tabel-daftar-transaksi-upacara').html(data);
        });
    }

    function tabelTransaksiBanten() {

        // Mendapatkan data upacara melalui route / link dikirim yang dikirimkan dari controller dan di masukkan kedalam id
        $.get("{{ route('daftar-transaksi-banten', $id_transaksi) }}", {}, function(data, status) {
            $('#tabel-daftar-transaksi-banten').html(data);
            var tanggal_banten_pulang_edit = $('#tanggal_banten_pulang2');
            tanggal_banten_pulang_edit.val('{{ $transaksi->tanggal_banten_pulang }}');
            tanggal_banten_pulang_edit.attr('min', '{{ $tanggal }}');

            if ('{{ $transaksi->tanggal_banten_pulang }}' == "") {
                tanggal_banten_pulang_edit.attr('data-date', 'dd/mm/yyyy');

            } else {

                tanggal_banten_pulang_edit.attr('data-date',
                    '{{ Carbon\Carbon::parse($transaksi->tanggal_banten_pulang)->translatedFormat('d/m/Y') }}'
                );

            }

            $("#tanggal_banten_pulang2").on("change", function() {
                if (this.value) {
                    this.setAttribute(
                        "data-date",
                        moment(this.value, "YYYY-MM-DD")
                        .format(this.getAttribute("data-date-format"))
                    )
                } else {
                    $(this).attr('data-date', 'dd/mm/yyyy');

                }
            })
        });
    }

    function tabelTransaksiUlam() {

        // Mendapatkan data upacara melalui route / link dikirim yang dikirimkan dari controller dan di masukkan kedalam id
        $.get("{{ route('daftar-transaksi-ulam', $id_transaksi) }}", {}, function(data, status) {
            $('#tabel-daftar-transaksi-ulam').html(data);
        });
    }

    function pelunasanEdit(status) {

        //Deklarasi variabel input berdasarkan id
        var tanggal_pelunasan = document.getElementById('tanggal_pelunasan');
        var pelunasan_edit = document.getElementById('pelunasan_edit');
        var cek_sisa = document.getElementById('sisa');
        var btnSumbit = document.getElementById("btnSumbit");

        // Jika salah satu di isi maka isikan required di input text yang kosong sebagai penanda jika melakukan save saat data belum terisi semua
        if (tanggal_pelunasan.value != "" || pelunasan_edit.value != "") {
            if (tanggal_pelunasan.value == "") {
                tanggal_pelunasan.required = true;

            } else if (pelunasan_edit.value == "") {
                pelunasan_edit.required = true;
            }
        }

        // Jika status nya pelunasan atau jika sedang mengisi input text pelunasan
        if (status == "pelunasan") {
            pelunasan_edit.value = formatRupiah2(pelunasan_edit.value);
            var pelunasan = pelunasan_edit.value.replaceAll(".", "");
            var sisa = cek_sisa.value.replaceAll(".", "");
            var cek_tambah = sisa - pelunasan;
            pelunasan_edit.style.borderColor = "";

            // Jika pengurangan menjadi min 
            if (cek_tambah < 0) {

                // Berikan Notifikasi 
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Pelunasan Melebihi Dari Jumlah Sisa!',
                });

                // Beri warna pada input text
                pelunasan_edit.style.borderColor = "red";
                pelunasan_edit.value = "";
            }
        }

        // Jika tanggal dan pelunasan sudah terisi value
        if (tanggal_pelunasan.value != "" && pelunasan_edit.value != "") {

            // Jika sisa dan pelunasan tidak sama
            if (cek_sisa.value != pelunasan_edit.value) {
                btnSumbit.disabled = true;
                pelunasan_edit.style.borderColor = "red";
                pelunasan_edit.focus();

                // Jika sisa dan pelunasan sudah sama
            } else {
                btnSumbit.disabled = false;
            }
        }
    }

    $("#tanggal_pelunasan").on("change", function() {
        if (this.value) {
            this.setAttribute(
                "data-date",
                moment(this.value, "YYYY-MM-DD")
                .format(this.getAttribute("data-date-format"))
            )
        } else {
            $(this).attr('data-date', 'dd/mm/yyyy');

        }
    }).trigger("change")

    $("#tanggal_upacara_edit").on("change", function() {
        if (this.value) {
            this.setAttribute(
                "data-date",
                moment(this.value, "YYYY-MM-DD")
                .format(this.getAttribute("data-date-format"))
            )
        } else {

            $(this).attr('data-date', 'dd/mm/yyyy');
        }
    }).trigger("change")

    $("#tanggal_transaksi_edit").on("change", function() {
        if (this.value) {
            this.setAttribute(
                "data-date",
                moment(this.value, "YYYY-MM-DD")
                .format(this.getAttribute("data-date-format"))
            )
        } else {
            $(this).attr('data-date', 'dd/mm/yyyy');
        }
    }).trigger("change")
    // Fungsi jika ingin mengganti hari

    function ubah_qty(status, input, id) {
        if ($('#' + input).val() < 1) {
            $('#' + input).val(1);
        }
        var dudu = status;
        var link =
            "{{ route('ubah-data-transaksi', ['status' => ':status', 'id' => ':id', 'id_transaksi' => $id_transaksi, 'value' => ':value']) }}";
        route = link.replace(':id', id);
        route = route.replace(':status', status);
        route = route.replace(':value', $('#' + input).val());
        $.get(route, {}, function(data, status) {
            if (dudu == "banten_pulang") {
                var pengecekan = $('#cek_button_transaksi_banten_pulang').val();
                if (data == 0) {
                    $('#cek_button_transaksi_banten_pulang').val(parseInt(pengecekan) - parseInt(1));
                } else {
                    $('#cek_button_transaksi_banten_pulang').val(parseInt(pengecekan) + parseInt(1));
                }
                pengecekan_banten_pulang();

            }

        });
    }

    function pengecekan_banten_pulang() {
        if ($('#cek_button_transaksi_banten_pulang').val() == 0) {
            document.getElementById('tanggal_banten_pulang2').required = false;
            document.getElementById("tanggal_banten_pulang2").readOnly = true;
            document.getElementById("tanggal_banten_pulang2").value = "";
            $('#tanggal_banten_pulang2').attr('data-date', 'dd/mm/yyyy');

            ubah_tanggal_banten_pulang(null);

        } else {
            document.getElementById('tanggal_banten_pulang2').required = true;
            document.getElementById("tanggal_banten_pulang2").readOnly = false;
        }

        if (document.getElementById("tanggal_banten_pulang2").value == "") {
            $(".modal-close-update").prop('disabled', true);
        } else {
            $(".modal-close-update").prop('disabled', false);
        }
    }

    function ubah_tanggal_banten_pulang(value) {

        if (value == "" || value == null) {
            value = 0;
        }
        var link =
            "{{ route('ubah-data-transaksi', ['status' => 'tanggal_banten_pulang', 'id' => $id_transaksi, 'id_transaksi' => $id_transaksi, 'value' => ':value']) }}";
        route = link.replace(':value', value);
        $.get(route, {}, function(data, status) {
            if (data == 0) {
                document.getElementById('tanggal_banten_pulang2').required = false;
                $(".modal-close-update").prop('disabled', false);

            } else {
                document.getElementById('tanggal_banten_pulang2').required = true;
                if (document.getElementById("tanggal_banten_pulang2").value == "") {
                    $(".modal-close-update").prop('disabled', true);
                } else {
                    $(".modal-close-update").prop('disabled', false);
                }
            }
        });


    }

    function hapus_data(status, link) {
        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Untuk Mengubah Menghapus Data ini!?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.get(link, {}, function(data) {
                    if (status == 'upacara') {
                        tabelTransaksiUpacara();
                    } else if (status == 'banten') {
                        tabelTransaksiBanten();
                    } else if (status == 'ulam') {
                        tabelTransaksiUlam();
                    }
                })
            }
        });
    }

    function saveData() {
        var table = $('.HAHA').DataTable();
        table.search('').draw();
        var table2 = $('.hahi').DataTable();
        table2.search('').draw();
        var table3 = $('.xixi').DataTable();
        table2.search('').draw();

        if ('{{ $transaksi->tanggal_upacara }}' < "{{ $tanggal }}") {
            $('#tanggal_upacara_edit').attr('min', '');
        }

        if ('{{ $transaksi->tanggal_banten_pulang }}' != "" && '{{ $transaksi->tanggal_banten_pulang }}' <
            "{{ $tanggal }}") {
            $('#tanggal_banten_pulang2').attr('min', '');
        }
    }

    $('#data_upacara').on('hide.bs.collapse', function() {
        $('#data_upacara').html('');
    });

    $('#data_upacara').on('show.bs.collapse', function() {
        $.get("{{ route('daftar-transaksi-edit', ['status' => 'upacara', 'id' => $id_transaksi]) }}", {},
            function(data,
                status) {

                $('#data_upacara').html(data);
            });
    });

    $('#data_banten').on('hide.bs.collapse', function() {
        var pengecekan = $('#cek_button_transaksi_banten_pulang').val();
        var pengecekan2 = $('#cek_button_banten_pulang').val();
        var total = parseInt(pengecekan) - parseInt(pengecekan2);
        $('#cek_button_transaksi_banten_pulang').val(total);
        $('#cek_button_banten_pulang').val(0);
        pengecekan_banten_pulang();
        $('#data_banten').html('');
    });

    $('#data_banten').on('show.bs.collapse', function() {
        $.get("{{ route('daftar-transaksi-edit', ['status' => 'banten', 'id' => $id_transaksi]) }}", {},
            function(data,
                status) {
                $.get("{{ route('ganti-status', 'banten') }}", {}, function(data2, status2) {
                    $('#data_banten').html(data);

                });
            });
    });

    $('#data_ulam').on('hide.bs.collapse', function() {

        $('#data_ulam').html('');
    });

    $('#data_ulam').on('show.bs.collapse', function() {
        $.get("{{ route('daftar-transaksi-edit', ['status' => 'ulam', 'id' => $id_transaksi]) }}", {},
            function(data,
                status) {
                $.get("{{ route('ganti-status', 'ulam') }}", {}, function(data2, status2) {
                    $('#data_ulam').html(data);

                });
            });
    });
</script>
