<div class="d-flex justify-content-center">
    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample"
        aria-expanded="false" aria-controls="collapseExample" id="btn_upacara">
        Form Upacara
    </button>&emsp;
    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample2"
        aria-expanded="false" aria-controls="collapseExample2" id="btn_banten">
        Form Banten
    </button>&emsp;
    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample3"
        aria-expanded="false" aria-controls="collapseExample3" id="btn_ulam">
        Form Ulam
    </button>
</div>
<div class="collapse mt-4" id="collapseExample">
    <form action="{{ route('upacara.store') }}" method="POST" class="form form-vertical" id="form-upacara">
        @csrf
        <div class="form-body">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="jenis_upacara">Jenis Upacara</label>
                        <input type="text" name="nama_jenis_upacara" class="form-control form-control-sm"
                            id="jenis_upacara" list="datalist1" autocomplete='off' placeholder="Jenis Upacara" required
                            autofocus>
                        <datalist id="datalist1">
                            @foreach ($data as $value)
                                <option value="{{ $value->nama_jenis_upacara }}"></option>
                            @endforeach
                        </datalist>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="upacara">Upacara</label>
                        <input type="text" id="upacara" class="form-control" name="nama_upacara" required
                            placeholder="Upacara" />
                    </div>
                </div>
                <div class="col-md-12 form-group">
                    <label>Status</label>
                    <div class="d-flex justify-content-around">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status_vendor" id="status_vendor1"
                                value="tidak_vendor" required style="cursor: pointer;" required />
                            <label class="form-check-label" for="status_vendor1" style="cursor: pointer;">
                                Tidak Vendor
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status_vendor" id="status_vendor2"
                                value="vendor" style="cursor: pointer;" required />
                            <label class="form-check-label" for="status_vendor2" style="cursor: pointer;">
                                Vendor
                            </label>
                        </div>
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
</div>
<div class="collapse mt-4" id="collapseExample2">
    <form action="{{ route('upacara.store') }}" method="POST" class="form form-vertical" id="form-banten">
        @csrf
        <div class="form-body">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="nama_banten">Nama Banten</label>
                        <input type="text" id="nama_banten" class="form-control" name="nama_banten"
                            placeholder="Nama Banten" />
                    </div>
                </div>
                <div class="col-md-12 form-group">
                    <label>Status</label>
                    <div class="d-flex justify-content-around">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status_vendor" id="status_vendor3"
                                value="tidak_vendor" required style="cursor: pointer;" required />
                            <label class="form-check-label" for="status_vendor3" style="cursor: pointer;">
                                Tidak Vendor
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status_vendor" id="status_vendor4"
                                value="vendor" style="cursor: pointer;" required />
                            <label class="form-check-label" for="status_vendor4" style="cursor: pointer;">
                                Vendor
                            </label>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="cek_tambah" value="banten">
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
</div>
<div class="collapse mt-4" id="collapseExample3">
    <form action="{{ route('upacara.store') }}" method="POST" class="form form-vertical" id="form-ulam">
        @csrf
        <div class="form-body">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="nama_ulam">Nama Ulam</label>
                        <input type="text" id="nama_ulam" class="form-control" name="nama_ulam"
                            placeholder="Nama Ulam" />
                    </div>
                </div>
                <div class="col-md-12 form-group">
                    <label>Status</label>
                    <div class="d-flex justify-content-around">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status_vendor" id="status_vendor5"
                                value="tidak_vendor" required style="cursor: pointer;" required />
                            <label class="form-check-label" for="status_vendor5" style="cursor: pointer;">
                                Tidak Vendor
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status_vendor" id="status_vendor6"
                                value="vendor" style="cursor: pointer;" required />
                            <label class="form-check-label" for="status_vendor6" style="cursor: pointer;">
                                Vendor
                            </label>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="cek_tambah" value="ulam">
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
</div>
<script>
    $('#collapseExample').on('show.bs.collapse', function() {
        document.getElementById("btn_banten").disabled = true;
        document.getElementById("btn_ulam").disabled = true;
    });

    $('#collapseExample').on('hide.bs.collapse', function() {
        document.getElementById("btn_banten").disabled = false;
        document.getElementById("btn_ulam").disabled = false;
        document.getElementById("form-upacara").reset();
    });

    $('#collapseExample2').on('show.bs.collapse', function() {
        document.getElementById("btn_upacara").disabled = true;
        document.getElementById("btn_ulam").disabled = true;
    });

    $('#collapseExample2').on('hide.bs.collapse', function() {
        document.getElementById("btn_upacara").disabled = false;
        document.getElementById("btn_ulam").disabled = false;
        document.getElementById("form-banten").reset();
    });

    $('#collapseExample3').on('show.bs.collapse', function() {
        document.getElementById("btn_upacara").disabled = true;
        document.getElementById("btn_banten").disabled = true;
    });

    $('#collapseExample3').on('hide.bs.collapse', function() {
        document.getElementById("btn_upacara").disabled = false;
        document.getElementById("btn_banten").disabled = false;
        document.getElementById("form-ulam").reset();
    });
</script>
