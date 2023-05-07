@if ($tanggal != 'kosong')
    @if ($data->count() > 0)
        <div class="d-flex justify-content-between mb-2">
            <button class="btn btn-outline-primary"
                onclick="doPrint('{{ route('print-transaksi', Crypt::encrypt('print rekap') . '&' . $tanggal) }}')">
                <i class="bi bi-printer"></i>
            </button>
        @else
            <div class="d-flex justify-content-end mb-2">
    @endif
    <a href="javascript:void(0)" class="btn icon "onclick="refresh()" title="Klik Untuk Refresh Tabel!">
        <i class="bi bi-x-circle"></i>
    </a>
    </div>
@endif
<table class="table customTable" id="DataTable">
    <thead>
        <tr>
            <th>No</th>
            {{-- <th>Kode Transaksi</th> --}}
            <th>Nama Pelanggan</th>
            <th>No Telepon</th>
            <th>Tanggal Upacara</th>
            <th>Waktu Upacara</th>
            <th style="text-align: center;">Biaya (Rp)</th>
            <th style="text-align: center;">DP (Rp)</th>
            <th style="text-align: center;">Status</th>
            <th style="text-align: center;">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $key => $value)
            <tr>
                <td>{{ $key + 1 }}</td>
                {{-- <td>{{ $value->kode_transaksi }}</td> --}}
                <td>{{ $value->nama_pelanggan }}</td>
                <td>{{ $value->no_telepon }}</td>
                <td>{{ date('d-m-Y', strtotime($value->tanggal_upacara)) }}</td>
                <td>{{ $value->waktu_upacara }}</td>
                <td style="text-align: right;">@currency($value->biaya)</td>
                <td style="text-align: right;">@currency($value->dp)</td>
                <td style="text-align: center;">
                    @if ($value->status == 1)
                        <span class="badge bg-light-warning">Belum Lunas</span>
                    @elseif($value->status == 0)
                        <span class="badge bg-light-success">Lunas</span>
                    @elseif($value->status == 2)
                        <span class="badge bg-light-danger">Cancel</span>
                    @endif
                </td>
                <td style="width: 15%; text-align: center;">
                    <a href="javascript:void(0)" class="btn icon btn-primary" title="Klik Untuk Edit Data!"
                        onclick="modalUpdate('{{ route('transaksi.edit', $value->id) }}', 'Form Pelunasan', 'modal-dialog-scrollable modal-xl')">
                        <i class="bi bi-pencil"></i>
                    </a>&emsp;
                    <a href="javascript:void(0)" class="btn icon btn-info" title="Klik Untuk Melihat Detail Data"
                        onclick="modalDetail('{{ route('transaksi.show', $value->id) }}', 'Detail Transaksi', 'modal-dialog-scrollable modal-md')">
                        <i class="bi bi-info-circle"></i>
                    </a>&emsp;
                    <a href="javascript:void(0)" class="btn icon btn-warning"
                        title="Klik Untuk Mencetak Data Per Transaksi!"
                        onclick="doPrint('{{ route('print-transaksi', Crypt::encrypt('print per orang') . '&' . $value->id) }}')">
                        <i class="bi bi-printer"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<script>
    $(document).ready(function() {

        // Libary table paginate, search
        $('#DataTable').DataTable({
            "pageLength": 10,
            language: {
                url: "{{ asset('/DataTables/bahasa.json') }}"
            }
        });

    });
</script>
