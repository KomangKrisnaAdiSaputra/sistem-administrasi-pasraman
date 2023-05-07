<div class="row">
    <div class="col-12 ">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-column" style="text-align: center;">
                    <div class="p-2">
                        <img src="{{ asset('/image/galeri/' . $data->foto) }}" alt="" height="20%" width="40%"
                            class="img-preview" style="border-radius: 20px;">
                    </div>
                    <hr>
                    <label for="" style="text-align: left; font-weight: bold;">Nama Foto :</label>
                    <div class="p-2">{{ $data->nama_foto }}</div>
                    <hr>
                    <label for="" style="text-align: left; font-weight: bold;">Keterangan :</label>
                    <div class="p-2">{{ $data->keterangan }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
