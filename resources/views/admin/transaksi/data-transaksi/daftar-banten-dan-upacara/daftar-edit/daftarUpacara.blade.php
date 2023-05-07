<div class="center-tabel" style="width: 800px;">
    <table class="table tabel-transaksi-upacara">
        <thead>
            <tr>
                <th>Jenis Upacara</th>
                <th>Nama Upacara</th>
                <th>Qty</th>
                <th style="text-align: center;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $key => $value)
                <tr>
                    <td class="text-bold-500">
                        {{ $value->tb_upacara->tb_jenis_upacara->nama_jenis_upacara }}
                    </td>

                    <td class="text-bold-500">{{ $value->tb_upacara->nama_upacara }}</td>
                    <td style="width: 13%; text-align: center;">
                        <input type="number" name="qty_upacara_transaksi[]" placeholder="0" style="width: 90%;"
                            class="form-control" id="qty_upacara22{{ $key + 1 }}" value="{{ $value->qty_upacara }}"
                            min="1"
                            onchange="ubah_qty('upacara',  'qty_upacara22{{ $key + 1 }}', '{{ $value->id }}')">

                    </td>
                    <td style="text-align: center;">
                        <button type="button" class="btn btn-icon btn-danger"
                            onclick="hapus_data('upacara', '{{ route('hapus-data-transaksi', ['status' => 'upacara', 'id' => $value->id]) }}')">
                            <i class="bi bi-x-square"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>
    $(document).ready(function() {
        // Libary table 
        var table = $('.tabel-transaksi-upacara').DataTable({
            "paging": false,
            "ordering": false,
            "info": false,
            "searching": false,
            language: {
                url: "{{ asset('/DataTables/bahasa.json') }}"
            }
        });

    });
</script>
