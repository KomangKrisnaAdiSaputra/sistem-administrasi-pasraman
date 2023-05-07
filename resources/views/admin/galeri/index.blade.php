@extends('layouts.app')
@section('container.isi')
@section('footer.css', '5%')
@section('aktif.galeri', 'header-aktif')
@section('custom.left', '2em') 
<section class="section">
    <div class="section-body">
        <div class="mb-3">
            <button class="btn btn-primary"
                onclick="modalTambah('{{ route('galeri.create') }}', 'Tambah Data Galeri', 'modal-md')">
                Tambah Data
            </button>
        </div>
        <div class="row">
            <div class="col-12 ">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table customTable table-bordered " id="DataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Foto</th>
                                        <th>Keterangan</th>
                                        <th style="text-align: center;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data['data_galeri'] as $key => $value)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $value->nama_foto }}</td>
                                            <td>{{ $value->keterangan }}</td>
                                            <td style="text-align: center;">
                                                <a href="javascript:void(0)" class="btn icon btn-primary"
                                                    onclick="modalUpdate('{{ route('galeri.edit', $value->id) }}', 'Form Edit Data Galeri', 'modal-md')"
                                                    title="Klik Untuk Edit Data!">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                <a href="javascript:void(0)" class="btn icon btn-danger"
                                                    onclick="deleteFoto('{{ route('galery-hapus-data', $value->id) }}')"
                                                    title="Klik Untuk Hapus Data!">
                                                    <i class="bi bi-trash"></i>
                                                </a>
                                                <a href="javascript:void(0)" class="btn icon btn-info"
                                                    onclick="modalDetail('{{ route('galeri.show', $value->id) }}', 'Detail Galeri', 'modal-md')"
                                                    title="Klik Untuk Lihat Data!">
                                                    <i class="bi bi-info-circle"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
            $('#DataTable').DataTable({
                "pageLength": 10,
                // searching: false,
                // paging: false,
                // ordering: false,
                // info: false
                language: {
                    url: "{{ asset('/DataTables/bahasa.json') }}"
                }
            });
        });



        function previewImage() {
            const image = document.querySelector('#formFile');
            const imgPreview = document.querySelector('.img-preview')

            // imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.removeAttribute('src');
                imgPreview.src = oFREvent.target.result;
            }
        }

        function resetImg() {
            const imgPreview = document.querySelector('.img-preview')
            imgPreview.removeAttribute('src');
            imgPreview.src = "{{ asset('/image/default.png') }}";
        }

        function deleteFoto(link) {
            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Untuk Menghapus Data ini!?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.get(link, {}, function(data, status) {
                        location.reload();
                    });
                }
            })
        }
    </script>
@endsection
@endsection
