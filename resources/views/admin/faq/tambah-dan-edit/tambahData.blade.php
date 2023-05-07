<form action="{{ route('faq.store') }}" method="POST" class="form form-vertical" enctype="multipart/form-data">
    @csrf
    <div class="form-body">
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="pertanyaan">Pertanyaan</label>
                    <input type="text" id="pertanyaan" class="form-control" name="pertanyaan" placeholder="Pertanyaan"
                        required />
                </div>
            </div>

            <div class="col-12">
                <div class="form-group">
                    <label for="jawaban">Jawaban</label>
                    <textarea class="form-control" id="jawaban" name="jawaban" rows="3" placeholder="Jawaban" required></textarea>
                </div>
            </div>

            <div class="col-12 d-flex justify-content-end">
                <button type="reset" class="btn btn-light-secondary me-1 mb-1" onclick="resetImg()"">
                    Reset
                </button>
                <button type="submit" class="btn btn-primary me-1 mb-1">
                    Submit
                </button>
            </div>
        </div>
    </div>
</form>
