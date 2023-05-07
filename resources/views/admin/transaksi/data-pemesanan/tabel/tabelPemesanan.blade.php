<table class="table customTable TabelPemesanan">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Pelanggan</th>
            <th>No Telepon</th>
            <th>Sapta Wara</th>
            <th>Panca Wara</th>
            <th>Waktu Upacara</th>
            <th style="text-align: center;">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $key => $value)
            <tr>
                <td>
                    {{ $key + 1 }}
                </td>

                <td>
                    {{ $value->nama_pelanggan }}
                </td>

                <td>
                    {{ $value->no_telepon }}
                </td>

                <td>
                    {{ $value->sapta_wara }}
                </td>

                <td>
                    {{ $value->panca_wara }}
                </td>

                <td>
                    {{ $value->waktu_upacara }}
                </td>

                {{-- <td>
                    @if ($value->status == 1)
                        <span class="badge bg-light-warning">Belum Lunas</span>
                    @elseif($value->status == 0)
                        <span class="badge bg-light-success">Lunas</span>
                    @elseif($value->status == 2)
                        <span class="badge bg-light-danger">Cancel</span>
                    @endif
                </td> --}}

                <td style="text-align: center; width: 8%;">
                    <a href="javascript:void(0)" class="btn icon btn-outline-info"
                        onclick="modalDetail('{{ route('show-pemesanan', $value->id) }}', 'Detail Pemesanan', 'modal-dialog-scrollable modal-md')"
                        title="Klik Untuk Melihat Detail!">
                        <i class="bi bi-info-circle"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<script>
    $(document).ready(function() {
        // Libary table paginate, search
        $('.TabelPemesanan').DataTable({
            "searching": false,
            "paging": false,
            "ordering": false,
            "info": false,
            language: {
                url: "{{ asset('/DataTables/bahasa.json') }}"
            }
        });

    });
</script>
