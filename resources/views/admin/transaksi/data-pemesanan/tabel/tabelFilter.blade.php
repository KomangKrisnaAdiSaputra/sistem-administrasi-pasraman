<a href="javascript:void(0)" class="btn icon " style="margin-left: 96%;" onclick="refresh()"
    title="Klik Untuk Refresh Tabel!">
    <i class="bi bi-x-circle"></i>
</a>
<table class="table customTable" id="DataTable1">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Pelanggan</th>
            <th>No Telepon</th>
            <th>Alamat</th>
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
                    {{ $value->alamat }}
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



                <td style="text-align: center;  width: 8%;">
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
<input type="hidden" id="text_heading" value="{{ $heading_custom }}">
<script>
    $(document).ready(function() {
        table = $('#DataTable1').DataTable({
            // "pageLength": 10,
            "searching": false,
            "paging": false,
            "ordering": false,
            "info": false,
            language: {
                url: "{{ asset('/DataTables/bahasa.json') }}"
            }
        });
        $("#heading_title_custom").html(document.getElementById("text_heading").value);
    });
</script>
