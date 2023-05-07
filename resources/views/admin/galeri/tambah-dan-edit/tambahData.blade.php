<form action="{{ route('galeri.store') }}" method="POST" class="form form-vertical" enctype="multipart/form-data">
    @csrf
    <div class="form-body">
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="nama_foto">Nama Foto</label>
                    <input type="text" id="nama_foto" class="form-control" name="nama_foto" placeholder="Nama Foto"
                        required />
                </div>
            </div>

            <div class="col-12">
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea class="form-control" id="keterangan" name="keterangan" rows="3" placeholder="Keterangan" required></textarea>
                </div>
            </div>
            <div class="col-12 mt-4" style="text-align: center;">
                <div class="form-group">
                    <img src="{{ asset('/image/default.png') }}" alt="" height="20%" width="50%"
                        class="img-preview" style="border-radius: 8px;">
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="foto">Gambar</label>
                    <input type="file" name="foto" id="formFile" onchange="previewImage()"
                        accept="image/png, image/jpeg, image/jpg" required hidden />

                    <div class="form-control" style="height: 40px !important;">
                        <!-- our custom upload button -->
                        <label class="label-file" onclick="file_form()">Choose File</label>

                        <!-- name of file chosen -->
                        <span id="file-chosen" onclick="file_form()">No file chosen</span>
                    </div>
                </div>
            </div>

            <div class="col-12 d-flex justify-content-end">
                <button type="reset" class="btn btn-light-secondary me-1 mb-1" onclick="resetImg()"">
                    Reset Foto
                </button>
                <button type="submit" class="btn btn-primary me-1 mb-1">
                    Submit
                </button>
            </div>
        </div>
    </div>
</form>
