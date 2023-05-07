<style>
    .tm2 {
        position: absolute !important;
        /*width: 150px; height: 20px;*/
        /*color: white;*/
        margin-top: 0.7rem !important;
        margin-left: 5.5rem !important;
        display: block !important;
        width: 15% !important;
        height: 2rem !important;
        padding: .375rem .75rem !important;
        font-size: 1rem !important;
        line-height: 1.5 !important;
        color: #495057 !important;
        background-color: #fff !important;
        background-clip: padding-box !important;
        border: 1px solid #ced4da !important;
        border-radius: .25rem !important;
        box-shadow: inset 0 0 0 transparent !important;
        transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out !important;
        align-content: center !important;
    }

    .tm2:before {
        position: absolute;
        top: 8px;
        left: 10px;
        font-size: 0.8em;
        content: attr(data-date);
        display: block;
        color: #aaaaaa;
    }


    .tm2::-webkit-datetime-edit,
    .tm2::-webkit-inner-spin-button,
    .tm2::-webkit-clear-button {
        display: none;
    }

    .tm2::-webkit-calendar-picker-indicator {
        position: absolute;
        top: 6px;
        right: 13px;
        color: #495057;
    }
</style>
<div class="center-tabel" style="width: 800px;">
    <div class="row mb-4">
        <div class="col-md-4" style="position: absolute; margin-left: 0.3rem; margin-top: 1rem;">
            <label>Tanggal</label>
        </div>
        <div class="col-md-8 form-group">
            <input class="tm2 form-control" type="date" name="tanggal_banten_pulang" id="tanggal_banten_pulang2"
                data-date-format="DD/MM/YYYY" onchange="ubah_tanggal_banten_pulang(this.value)" required>
        </div>
    </div>
    <table class="table table-bordered tabel-banten" id="tabel-banten">
        <thead>
            <tr>
                <th>Nama Upakara</th>
                <th>Qty</th>
                <th>Upakara Bawa Pulang</th>
                <th style="text-align: center;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $key => $value)
                <tr>
                    <td>{{ $value->tb_banten->nama_banten }}</td>
                    <td style="width: 13%; text-align: center;">
                        <input type="number" name="qty_transaksi_banten[]" placeholder="0" style="width: 90%;"
                            data-id="{{ $key + 1 }}" class="form-control" data-attr="banten"
                            id="qty_transaksi_banten{{ $key + 1 }}" value="{{ $value->qty }}" min="1"
                            onchange="ubah_qty('banten', 'qty_transaksi_banten{{ $key + 1 }}', '{{ $value->id }}')">

                    </td>
                    <td style="width: 10%; text-align: center;">
                        <input type="checkbox" class="form-check-input" name="banten_pulang_transaksi_banten[]"
                            value="{{ $value->id }}" id="banten_pulang=transaksi_banten{{ $key + 1 }}"
                            {{ $value->banten_pulang == 1 ? 'checked' : '' }}
                            onclick="ubah_qty('banten_pulang', 'qty_transaksi_banten{{ $key + 1 }}', '{{ $value->id }}')">
                    </td>
                    <td style="text-align: center;">
                        <button type="button" class="btn btn-icon btn-danger"
                            onclick="hapus_data('banten', '{{ route('hapus-data-transaksi', ['status' => 'banten', 'id' => $value->id]) }}')">
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
        $('.tabel-banten').DataTable({
            "paging": false,
            "ordering": false,
            "info": false,
            "searching": false,
            language: {
                url: "{{ asset('/DataTables/bahasa.json') }}"
            }
        });
        if ("{{ $data->sum('banten_pulang') }}" == 0) {
            document.getElementById('tanggal_banten_pulang2').readOnly = true;
        } else {
            document.getElementById('tanggal_banten_pulang2').readOnly = false;
        }

    });
</script>
