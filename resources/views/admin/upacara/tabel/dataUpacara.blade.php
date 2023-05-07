<table class="table customTable" id="DataTable2">
    <thead>
        <tr>
            <th>No</th>
            <th>Upacara</th>
            <th>Jenis Upacara</th>
            <th style="text-align: center; ">Status</th>
            <th style="text-align: center; ">Status Vendor</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $key => $value)
            <tr>
                <td>
                    {{ $key + 1 }}
                </td>
                <td>{{ $value->nama_upacara }}</td>
                <td>
                    {{ $value->tb_jenis_upacara->nama_jenis_upacara }}
                </td>
                <td style="text-align: center; ">
                    @if ($value->status == 1)
                        <a href="javascript:void(0)" onclick="status({{ $value->id }},'upacara')">
                            <span class="btn badge bg-light-success">Aktif</span>
                        </a>
                    @else
                        <a href="javascript:void(0)" onclick="status({{ $value->id }},'upacara')">
                            <span class="btn badge bg-light-danger">Tidak Aktif</span>
                        </a>
                    @endif
                </td>
                <td style="text-align: center; ">
                    {{ ucwords(str_replace('_', ' ', $value->status_vendor)) }}
                </td>
                <td style="width: 8%;">
                    <a href="javascript:void(0)" class="btn icon btn-primary"
                        onclick="modalUpdate('{{ route('upacara.edit', $value->id . ':' . 'upacara') }}', 'Form Upacara', 'modal-md')">
                        <i class="bi bi-pencil"></i>
                    </a>&emsp;
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<script>
    $(document).ready(function() {

        $('#DataTable2').DataTable({
            "pageLength": 10,
            // searching: false,
            // paging: false,
            // ordering: false,
            // info: false,
            language: {
                url: "{{ asset('/DataTables/bahasa.json') }}"
            }
        });
    });
</script>
