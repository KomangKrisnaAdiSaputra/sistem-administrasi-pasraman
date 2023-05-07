<form action="" method="POST" class="form form-vertical" id="form-testimoni">
    @csrf
    <div class="form-body">
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="nama_testimoni">Nama Testimoni</label>
                    <input type="text" id="nama_testimoni" class="form-control" name="nama_testimoni"
                        placeholder="Nama Testimoni" required />
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea class="form-control" id="keterangan" name="keterangan" rows="3" placeholder="Keterangan" required></textarea>
                </div>
            </div>
            <input type="hidden" name="cek_tambah" value="upacara">
            <div class="col-12 d-flex justify-content-end">
                <button type="reset" class="btn btn-light-secondary me-1 mb-1">
                    Reset
                </button>
                <button type="submit" class="btn btn-primary me-1 mb-1">
                    Submit
                </button>
            </div>
        </div>
    </div>
</form>
<script>
    $("#form-testimoni").submit(function(e) {
        e.preventDefault();
        let fd = new FormData(this);
        let href = "{{ route('testimoni.store') }}";
        var x = document.getElementById("cekBox_tidak_aktif");

        $.ajax({
            url: href,
            method: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function(response) {
                // console.log(response);
                $("#modalTambah").modal('hide');

                if (x.checked == true) {

                    tabelTestimoniTidakAktif();

                } else {
                    tabelTestimoni();


                }
            }
        });
    });
</script>
