@if ($cek == 'tambah')
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
@endif

<div class="center-tabel" style="width: 800px;">
    <div class="row" {{ $cek == 'edit' ? 'hidden' : '' }}>
        <div class="col-md-4" style="position: absolute; margin-left: 0.3rem; margin-top: 1rem;">
            <label>Tanggal</label>
        </div>
        <div class="col-md-8 form-group">
            <input class="tm2 form-control" type="date" name="tanggal_banten_pulang" id="tanggal_banten_pulang"
                data-date-format="DD/MM/YYYY" min="{{ Carbon\Carbon::now()->toDateString() }}" required>
        </div>
    </div>
    <table class="table table-bordered hahi">
        <thead>
            <tr>
                <th>Nama Upakara</th>
                <th>Qty</th>
                <th>Upakara Bawa Pulang</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $key => $value)
                <tr>
                    <td>{{ $value->nama_banten }}</td>
                    <td style="width: 13%; text-align: center;">
                        <input type="number" name="qty[]" placeholder="0" style="width: 90%;"
                            data-id="{{ $value->id }}" class="form-control" data-attr="banten"
                            id="qty_{{ $key + 1 }}">

                    </td>
                    <td style="width: 10%; text-align: center;">
                        <input type="checkbox" class="form-check-input" name="banten_pulang[]"
                            value="{{ $value->id }}" id="banten_pulang={{ $key + 1 }}">
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>
    $(document).ready(function() {



        if ($.fn.DataTable.isDataTable('.hahi')) {
            $('.hahi').DataTable().destroy();
        }

        var table = $('.hahi').DataTable({
            "paging": false,
            "ordering": false,
            "info": false,
            language: {
                url: "{{ asset('/DataTables/bahasa.json') }}"
            }
        });

        // menghitung jumlah data pada tabel
        cek_data_banten = table.rows().count();
        var cek_pencarian_banten = 0;
        var pencarian_banten = "";
        $(document).on("keyup", 'input[type="search"]', function() {
            // cek = table.rows({
            //     search: 'applied'
            // }).count();

            pencarian_banten = this.value;
            if (pencarian_banten == "") {
                cek_pencarian_banten = 0;
            } else {
                cek_pencarian_banten = 1;
            }

        })
        // Membuat agar input type date readonly
        document.getElementById("tanggal_banten_pulang").readOnly = true;

        // Lopping sebanyak data pada tabel
        for (let index = 1; index <= cek_data_banten; index++) {
            var cek_qty = "qty_:id";
            idd = cek_qty.replace(':id', index);
            var cek_btn_pulang = "banten_pulang=:id";
            iddd = cek_btn_pulang.replace(':id', index);

            //  replace untuk memasukan index ke id

            var qty = document.getElementById(idd);
            let banten_pulang = document.getElementById(iddd);
            banten_pulang.disabled = true;
            var dataCentang = 0;

            // Jika banten pulang di klik atau di centang
            banten_pulang.addEventListener('click', event => {

                // Jika tercentang
                if (event.target.checked) {

                    // Tambah data centang
                    dataCentang++;

                    // Jika tidak di centang
                } else {

                    // Kurang data centang
                    dataCentang--;
                }
                // Jika data centang lebih dari 0
                if (dataCentang > 0) {

                    // Menghapus readonly di tanggal banten pulang
                    if ('{{ $cek }}' == "tambah") {

                        document.getElementById("tanggal_banten_pulang").readOnly = false;
                    } else {
                        var pengecekan = $('#cek_button_transaksi_banten_pulang').val();
                        var pengecekan2 = $('#cek_button_banten_pulang').val();
                        var total_pengecekan = parseInt(pengecekan) + parseInt(1);
                        var total_pengecekan2 = parseInt(pengecekan2) + parseInt(1);
                        $('#cek_button_transaksi_banten_pulang').val(total_pengecekan)
                        $('#cek_button_banten_pulang').val(total_pengecekan2)
                        pengecekan_banten_pulang();

                    }

                    // Jika kurang dari 0 atau 0
                } else {

                    // Membuat agar input type date readonly dan menghapus value di tanggal
                    if ('{{ $cek }}' == "tambah") {

                        document.getElementById("tanggal_banten_pulang").readOnly = true;
                        document.getElementById("tanggal_banten_pulang").value = "";
                    } else {

                        var pengecekan = $('#cek_button_transaksi_banten_pulang').val();
                        var pengecekan2 = $('#cek_button_banten_pulang').val();
                        var total_pengecekan = parseInt(pengecekan) - parseInt(1);
                        var total_pengecekan2 = parseInt(pengecekan2) - parseInt(1);

                        if (total_pengecekan < 0) {
                            total_pengecekan = 0;
                        }
                        if (total_pengecekan2 < 0) {
                            total_pengecekan2 = 0;
                        }
                        $('#cek_button_transaksi_banten_pulang').val(total_pengecekan)
                        $('#cek_button_banten_pulang').val(total_pengecekan2)
                        pengecekan_banten_pulang();
                    }
                }

            });
            qty.required = true;
            var cek_data_qty = 0;
            // Jika qty berubah
            qty.addEventListener('change', function() {
                let status = $(this).attr('data-attr');
                let id = $(this).attr('data-id');
                let val = this.value;
                // Jika id sama dengan index

                // Value lebih dari 0
                if (val > 0) {

                    banten_pulang.disabled = false;
                    var qtyy = val;
                    cek_data_qty++;

                } else {

                    banten_pulang.disabled = true;
                    banten_pulang.checked = false;
                    dataCentang = 0;
                    var qtyy = 0;
                    this.value = "";
                    cek_data_qty = 0;

                    if ('{{ $cek }}' == "edit") {

                        var pengecekan = $('#cek_button_transaksi_banten_pulang').val();
                        var pengecekan2 = $('#cek_button_banten_pulang').val();
                        var total_pengecekan = parseInt(pengecekan) - parseInt(1);
                        var total_pengecekan2 = parseInt(pengecekan2) - parseInt(1);
                        if (total_pengecekan < 0) {
                            total_pengecekan = 0;
                        }
                        if (total_pengecekan2 < 0) {
                            total_pengecekan2 = 0;
                        }
                        $('#cek_button_transaksi_banten_pulang').val(total_pengecekan)
                        $('#cek_button_banten_pulang').val(total_pengecekan2)
                        pengecekan_banten_pulang();

                    }
                }
                console.log("data centang = " + banten_pulang.checked);
                // Jika data centang lebih dari 0
                if (dataCentang > 0) {

                    // Membuat agar input type date readonly dan menghapus value di tanggal
                    if ('{{ $cek }}' == "tambah") {

                        document.getElementById("tanggal_banten_pulang").readOnly = false;
                    }
                } else {
                    if ('{{ $cek }}' == "tambah") {

                        document.getElementById("tanggal_banten_pulang").readOnly = true;
                        document.getElementById("tanggal_banten_pulang").value = "";
                    }
                }



                // Membawa data melalui link atau route ke controller
                $.get("{{ url('transaksi/ganti-status') }}/" + id + "/" + status + "/" + qtyy);

                var fokus_input = "qty_:id";
                cek_fokus = fokus_input.replace(':id', index);

                table.search('').draw();
                for (let index4 = 1; index4 <= cek_data_banten; index4++) {
                    var cek_qty2 = "qty_:id";
                    idd23 = cek_qty2.replace(':id', index4);
                    var qty2 = document.getElementById(idd23);
                    console.log(qty2);
                    if (cek_data_qty > 0) {

                        qty2.required = false;
                    } else {
                        qty2.required = true;

                    }
                }
                if (cek_pencarian_banten == 1) {
                    table.search(pencarian_banten).draw();
                }
                document.getElementById(cek_fokus).focus();



            });
        }
    });

    $("#tanggal_banten_pulang").on("change", function() {
        if (this.value) {
            this.setAttribute(
                "data-date",
                moment(this.value, "YYYY-MM-DD")
                .format(this.getAttribute("data-date-format"))
            )
        } else {
            $(this).attr('data-date', 'dd/mm/yyyy');

        }
    }).trigger("change")
</script>
