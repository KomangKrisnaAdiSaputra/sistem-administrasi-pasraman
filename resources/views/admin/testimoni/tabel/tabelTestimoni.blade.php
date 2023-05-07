<div class="table-responsive">
    <table class="table customTable table-bordered " id="DataTable">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Testimoni</th>
                <th>Keterangan</th>
                <th style="text-align: center;">Status</th>
                <th style="text-align: center;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $key => $value)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $value->nama_testimoni }}</td>
                    <td>{{ $value->keterangan }}</td>
                    <td style="text-align: center;">
                        @if ($value->status == 1)
                            <span class="btn badge bg-light-success kursor-klik"
                                onclick="status({{ $value->id }})">Aktif</span>
                        @else
                            <span class="btn badge bg-light-danger kursor-klik" onclick="status({{ $value->id }})">Tidak
                                Aktif</span>
                        @endif
                    </td>
                    <td style="text-align: center;">
                        <a href="javascript:void(0)" class="btn icon btn-primary"
                            onclick="modalUpdate('{{ route('testimoni.edit', $value->id) }}', 'Form Edit Data Testimoni', 'modal-md')">
                            <i class="bi bi-pencil"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>
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
</script>
