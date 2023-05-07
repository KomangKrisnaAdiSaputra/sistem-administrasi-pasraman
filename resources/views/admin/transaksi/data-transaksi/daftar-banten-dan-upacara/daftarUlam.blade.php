<div class="center-tabel" style="width: 800px;">
    <table class="table table-bordered xixi">
        <thead>
            <tr>
                <th>Nama Ulam</th>
                <th>Qty</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $key => $value)
                <tr>
                    <td>{{ $value->nama_ulam }}</td>
                    <td style="width: 13%; text-align: center;">
                        <input type="number" name="qty_ulam[]" placeholder="0" style="width: 90%;"
                            data-id="{{ $value->id }}" class="form-control" data-attr="ulam"
                            id="qty_ulam{{ $key + 1 }}">
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>
    $(document).ready(function() {
        // Libary table 
        if ($.fn.DataTable.isDataTable('.xixi')) {
            $('.xixi').DataTable().destroy();
        }
        var table = $('.xixi').DataTable({
            "paging": false,
            "ordering": false,
            "info": false,
            language: {
                url: "{{ asset('/DataTables/bahasa.json') }}"
            }
        });

        // menghitung jumlah data pada tabel
        cek_data_ulam = table.rows().count();
        var cek_pencarian_ulam = 0;
        var pencarian_ulam = "";
        $(document).on("keyup", 'input[type="search"]', function() {
            // cek = table.rows({
            //     search: 'applied'
            // }).count();

            pencarian_ulam = this.value;
            if (pencarian_ulam == "") {
                cek_pencarian_ulam = 0;
            } else {
                cek_pencarian_ulam = 1;
            }

        })

        // Lopping sebanyak data pada tabel
        for (let index = 1; index <= cek_data_ulam; index++) {
            var cek_qty = "qty_ulam:id";
            idd = cek_qty.replace(':id', index);


            //  replace untuk memasukan index ke id

            var qty = document.getElementById(idd);
            // qty.required = true;

            var cek_data_qty2 = 0;
            // Jika qty berubah
            qty.addEventListener('change', function() {
                let status = $(this).attr('data-attr');
                let id = $(this).attr('data-id');
                let val = this.value;
                // Jika id sama dengan index

                // Value lebih dari 0
                if (val > 0) {

                    var qtyy = val;
                    cek_data_qty2++;

                } else {

                    var qtyy = 0;
                    this.value = "";
                    cek_data_qty2 = 0;
                }

                // Membawa data melalui link atau route ke controller
                $.get("{{ url('transaksi/ganti-status') }}/" + id + "/" + status + "/" + qtyy);
                qty.required = false;

                var fokus_input = "qty_ulam:id";
                cek_fokus = fokus_input.replace(':id', id);

                table.search('').draw();
                // for (let index4 = 1; index4 <= cek_data_ulam; index4++) {
                //     var cek_qty2 = "qty_ulam:id";
                //     idd2 = cek_qty2.replace(':id', index4);
                //     var qty2 = document.getElementById(idd2);
                //     if (cek_data_qty2 > 0) {

                //         qty2.required = false;
                //     } else {
                //         qty2.required = true;

                //     }
                // }
                if (cek_pencarian_ulam == 1) {
                    table.search(pencarian_ulam).draw();
                }
                document.getElementById(cek_fokus).focus();




            });
        }
    });
</script>
