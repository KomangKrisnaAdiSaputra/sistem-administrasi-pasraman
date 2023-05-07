<table class="table customTable" id="DataTable">
    <thead>
        <tr>
            <th>No</th>
            <th>Jenis Upacara</th>
            <th style="text-align: center; ">Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $key => $value)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $value->nama_jenis_upacara }}</td>
                <td style="text-align: center; ">
                    @if ($value->status == 1)
                        <a href="javascript:void(0)" onclick="status({{ $value->id }},'jenis_upacara')">
                            <span class="btn badge bg-light-success">Aktif</span>
                        </a>
                    @else
                        <a href="javascript:void(0)" onclick="status({{ $value->id }},'jenis_upacara')">
                            <span class="btn badge bg-light-danger">Tidak Aktif</span>
                        </a>
                    @endif
                </td>

                <td style="width: 8%;">
                    <a href="javascript:void(0)" class="btn icon btn-primary"
                        onclick="modalUpdate('{{ route('upacara.edit', $value->id . ':' . 'jenis_upacara') }}', 'Form Edit Jenis Upacara', 'modal-md')">
                        <i class="bi bi-pencil"></i>
                    </a>&emsp;
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
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
</script>
