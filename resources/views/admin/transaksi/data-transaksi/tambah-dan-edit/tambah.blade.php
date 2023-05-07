<form method="POST" id="form-keranjang" action="{{ route('transaksi.store') }}">
    @csrf
    <div class="form-body d-flex justify-content-center">
        <div class="row">
            <div class="col-md-4">
                <label>Nama Pelanggan</label>
            </div>
            <div class="col-md-8 form-group">
                <input type="text" id="nama_pelanggan" class="form-control" name="nama_pelanggan"
                    placeholder="Nama Pelanggan" required />
            </div>
            {{-- <div class="col-md-4">
                <label>Email</label>
            </div>
            <div class="col-md-8 form-group">
                <input type="email" id="email" class="form-control" name="email" placeholder="Email" required />
            </div> --}}
            <div class="col-md-4">
                <label>No Telepon</label>
            </div>
            <div class="col-md-8 form-group">
                <input type="number" id="no_telepon" class="form-control" name="no_telepon" placeholder="No Telepon"
                    required />
            </div>
            <div class="col-md-4">
                <label>Alamat</label>
            </div>
            <div class="col-md-8 form-group">
                <textarea class="form-control" id="alamat"name="alamat" rows="3" placeholder="Alamat" required></textarea>
            </div>
            <div class="col-md-4">
                <label>Kategori</label>
            </div>
            <div class="col-md-8 form-group">
                <div class="d-flex justify-content-around">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="kategori" id="kategori1" value="Privat"
                            required style="cursor: pointer;" />
                        <label class="form-check-label" for="kategori1" style="cursor: pointer;">
                            Privat
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="kategori" id="kategori2" value="Umum"
                            style="cursor: pointer;" required />
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
                <input class="tm form-control" type="date" name="tanggal_upacara" id="tanggal_upacara"
                    data-date-format="DD/MM/YYYY" min="{{ $tanggal }}"
                    onchange="tanggal_sapta_panca_wara(this.value)" required>
            </div>
            <div class="col-md-4">
                <label>Sapta Wara</label>
            </div>
            <div class="col-md-8 form-group">
                <input class="form-control" type="text" placeholder="Kosong" name="sapta_wara" id="sapta_wara"
                    required readonly>
            </div>
            <div class="col-md-4">
                <label>Panca Wara</label>
            </div>
            <div class="col-md-8 form-group">
                <input class="form-control" type="text" placeholder="Kosong" name="panca_wara" id="panca_wara"
                    required readonly>
            </div>
            <div class="col-md-4">
                <label>Wuku</label>
            </div>
            <div class="col-md-8 form-group">
                <input class="form-control" type="text" placeholder="Kosong" name="wuku" id="wuku" required
                    readonly>
            </div>
            <div class="col-md-4">
                <label>Waktu</label>
            </div>
            <div class="col-md-8 form-group">
                <input type="time" id="waktu_upacara" class="form-control" name="waktu_upacara" required />
            </div>
            <div class="col-md-4">
                <label>Tanggal Transaksi</label>
            </div>
            <div class="col-md-8 form-group">
                <input class="tm form-control" type="date" name="tanggal_transaksi" id="tanggal_transaksi"
                    data-date-format="DD/MM/YYYY" max="{{ $tanggal }}" required>
            </div>
        </div>
    </div>

    <div class="form-check mt-2">
        <div class="checkbox">
            <input type="checkbox" class="form-check-input" id="show-form-keterangan" style="cursor: pointer;"
                data-bs-toggle="collapse" data-bs-target="#collapseExample_ket_upacara" />
            <label for="show-form-keterangan" style="cursor: pointer; color: red;">
                Centang Untuk Mengisi Keterangan Upacara!
            </label>
        </div>
    </div>
    <div class="collapse mt-4 mb-4" id="collapseExample_ket_upacara">
        <h4>Keterangan Upacara</h4>
        <div class="form-floating mt-2">
            <textarea class="form-control" placeholder="Keterangan" id="floatingTextarea" name="keterangan_upacara"></textarea>
            <label for="floatingTextarea">Keterangan</label>
        </div>
    </div>

    <hr>
    <h4>Daftar Upacara</h4>
    <div class="card-content mt-4">
        <div class="card-body">
            <div class="table-responsive " id="tabel-daftar-upacara">

            </div>
        </div>
    </div>

    <hr>
    <h4>Daftar Upakara</h4>
    <div class="card-content mt-4 ">
        <div class="card-body">
            <div class="table-responsive" id="tabel-daftar-banten">

            </div>
        </div>
    </div>

    <hr>
    <h4>Daftar Ulam</h4>
    <div class="card-content mt-4 ">
        <div class="card-body">
            <div class="table-responsive" id="tabel-daftar-ulam">

            </div>
        </div>
    </div>

    <hr>
    <h4>Pembiayaan</h4>

    <div class="form-body mt-4">
        <div class="center-tabel  col-lg-9 col-md-12">
            <div class="row ">
                <div class="col-md-4">
                    <label>Biaya (Rp)</label>
                </div>
                <div class="col-md-8 form-group">
                    <input type="text" id="biaya" class="form-control" name="biaya" placeholder="0"
                        onkeyup="cekSisa()" style="text-align: right;" required />
                </div>
                <div class="col-md-4">
                    <label>Dp (Rp)</label>
                </div>
                <div class="col-md-8 form-group">
                    <input type="text" id="dp" class="form-control" name="dp" placeholder="0"
                        onkeyup="cekSisa()" style="text-align: right;" required />
                </div>
                <div class="col-md-4">
                    <label>Sisa (Rp)</label>
                </div>
                <div class="col-md-8 form-group">
                    <input type="text" id="sisa" class="form-control" placeholder="0" name="sisa"
                        style="text-align: right;" readonly />
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-12 d-flex justify-content-end mt-4">
        <button type="reset" class="btn btn-light-secondary me-1 mb-1">
            Reset
        </button>
        <button type="submit" class="btn btn-primary me-1 mb-1" onclick="saveData()">
            Submit
        </button>
    </div>
</form>
<script>
    $(document).ready(function() {

        // Menampilkan Data tabel upacara dan banten saat form dibuka

        tabelUpacara();
        tabelBanten();
        tabelUlam();
        $.get("{{ route('ganti-status', 'tambah') }}", {}, function(data, status) {
            tabelBanten();
            tabelUlam();
        });

    });

    // Untuk mengubah format dalam input type date
    $("#tanggal_upacara").on("change", function() {
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

    $("#tanggal_transaksi").on("change", function() {
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

    // Mengenbalikan data jika di save masih dalam keadaan search
    function saveData() {
        var table = $('.HAHA').DataTable();
        table.search('').draw();
        var table2 = $('.hahi').DataTable();
        table2.search('').draw();
        var table3 = $('.xixi').DataTable();
        table2.search('').draw();
    }

    // Jika keterangan di uncentang maka hapus value yang di text area keterangan upacara
    $('#collapseExample_ket_upacara').on('hide.bs.collapse', function() {
        document.getElementById("floatingTextarea").value = "";
    });
</script>
