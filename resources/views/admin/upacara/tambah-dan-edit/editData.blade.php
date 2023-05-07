<form action="" method="POST" class="form form-vertical" id="form-upacara">
    @method('put')
    <input type="hidden" value="{{ route('upacara.update', $data['id']) }}" id="link">
    <div class="form-body">
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="input_text">{{ $data['label'] }}</label>
                    <input type="text" id="input_text" class="form-control" name="nama"
                        placeholder="{{ $data['label'] }}" value="{{ $data['value'] }}" />
                </div>
            </div>
            @if ($data['label'] != 'Jenis Upacara')
                <div class="col-md-12 form-group">
                    <label>Status</label>
                    <div class="d-flex justify-content-around">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status_vendor" id="status_vendor1"
                                value="tidak_vendor" required style="cursor: pointer;"
                                {{ $data['status_vendor'] == 'vendor' ? '' : 'checked' }} required />
                            <label class="form-check-label" for="status_vendor1" style="cursor: pointer;">
                                Tidak Vendor
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status_vendor" id="status_vendor2"
                                value="vendor" style="cursor: pointer;"
                                {{ $data['status_vendor'] == 'vendor' ? 'checked' : '' }} required />
                            <label class="form-check-label" for="status_vendor2" style="cursor: pointer;">
                                Vendor
                            </label>
                        </div>
                    </div>
                </div>
            @endif
            <input type="hidden" name="cek_edit" value="{{ $data['label'] }}">
            <div class="col-12 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary me-1 mb-1">
                    Submit
                </button>
            </div>
        </div>
    </div>
</form>
<script>
    $("#form-upacara").submit(function(e) {
        e.preventDefault();
        let fd = new FormData(this);
        let href = document.getElementById('link').value;
        console.log(href);
        $.ajax({
            url: href,
            method: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function(response) {
                // console.log(response);
                $("#modalUpdate").modal('hide');

                if (response['aktif/tidak'] == 0) {

                    if (response['status'] == "Jenis Upacara") {

                        dataJenisUpacaraTidakAktif();

                    } else if (response['status'] == "Upacara") {

                        dataUpacaraTidakAktif();

                    } else if (response['status'] == "Banten") {

                        dataBantenTidakAktif();

                    } else if (response['status'] == "Ulam") {

                        dataUlamTidakAktif();

                    }

                } else if (response['aktif/tidak'] == 1) {

                    if (response['status'] == "Jenis Upacara") {

                        dataJenisUpacara();

                    } else if (response['status'] == "Upacara") {

                        dataUpacara();

                    } else if (response['status'] == "Banten") {

                        dataBanten();

                    } else if (response['status'] == "Ulam") {

                        dataUlam();

                    }
                }
            }
        });
    });
</script>
