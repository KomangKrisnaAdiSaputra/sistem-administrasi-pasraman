<div class="center-tabel" style="width: 800px;">
    <table class="table table-bordered tabel-transaksi-ulam">
        <thead>
            <tr>
                <th>Nama Ulam</th>
                <th>Qty</th>
                <th style="text-align: center;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $key => $value)
                <tr>
                    <td>{{ $value->tb_ulam->nama_ulam }}</td>
                    <td style="width: 13%; text-align: center;">
                        <input type="number" name="qty_transaksi_ulam[]" placeholder="0" style="width: 90%;"
                            data-id="{{ $key + 1 }}" class="form-control" data-attr="ulam"
                            value="{{ $value->qty }}" id="qty_transaksi_ulam{{ $key + 1 }}"
                            onclick="ubah_qty('ulam', 'qty_transaksi_ulam{{ $key + 1 }}', '{{ $value->id }}')">
                    </td>
                    <td style="text-align: center;">
                        <button type="button" class="btn btn-icon btn-danger"
                            onclick="hapus_data('ulam', '{{ route('hapus-data-transaksi', ['status' => 'ulam', 'id' => $value->id]) }}')">
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
        var table = $('.tabel-transaksi-ulam').DataTable({
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
