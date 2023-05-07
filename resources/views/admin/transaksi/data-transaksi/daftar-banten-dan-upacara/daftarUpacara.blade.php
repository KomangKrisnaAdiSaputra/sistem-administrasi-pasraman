<div class="center-tabel" style="width: 800px;">
    <table class="table HAHA">
        <thead>
            <tr>
                <th>Jenis Upacara</th>
                <th>Nama Upacara</th>
                <th>Qty</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $key => $value)
                <tr>
                    <td class="text-bold-500">
                        {{ $value->tb_jenis_upacara->nama_jenis_upacara }}
                    </td>

                    <td class="text-bold-500">{{ $value->nama_upacara }}</td>
                    <td style="width: 13%; text-align: center;">
                        <input type="number" name="qty_upacara[]" placeholder="0" style="width: 90%;" class="form-control"
                            id="qty_upacara{{ $key + 1 }}">

                    </td>
                    <td style="text-align: center;">
                        <input type="checkbox" class="form-check-input" name="upacara[]" value="{{ $value->id }}"
                            id="upacara{{ $key + 1 }}">
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>
    $(document).ready(function() {

        // Libary table 
        if ($.fn.DataTable.isDataTable('.HAHA')) {
            $('.HAHA').DataTable().destroy();
        }
        var table2 = $('.HAHA').DataTable({
            // "searching": false,
            "paging": false,
            "ordering": false,
            "info": false,
            language: {
                url: "{{ asset('/DataTables/bahasa.json') }}"
            }
        });
        // menghitung jumlah data pada tabel
        cek_data_upacara = table2.rows().count();
        var cek_pencarian_upacara = 0;
        var pencarian_upacara = "";
        $(document).on("keyup", 'input[type="search"]', function() {
            // cek = table.rows({
            //     search: 'applied'
            // }).count();

            pencarian_upacara = this.value;
            if (pencarian_upacara == "") {
                cek_pencarian_upacara = 0;
            } else {
                cek_pencarian_upacara = 1;
            }

        })

        // Lopping sebanyak data pada tabel
        for (let index2 = 1; index2 <= cek_data_upacara; index2++) {
            var cek_upacara = "upacara:id";
            upacara_id = cek_upacara.replace(':id', index2);

            var cek_qty_upacara = "qty_upacara:id";
            qty_upacara_id = cek_qty_upacara.replace(':id', index2);

            //  replace untuk memasukan index ke id

            let textBox_upacara = document.getElementById(upacara_id);
            let qty_upacara = document.getElementById(qty_upacara_id);

            qty_upacara.readOnly = true;
            textBox_upacara.required = true;
            var cek_centang = 0;
            // Jika upacar di klik atau di centang
            textBox_upacara.addEventListener('click', event => {

                // Jika tercentang
                if (event.target.checked) {
                    qty_upacara.readOnly = false;
                    qty_upacara.required = true;
                    cek_centang++;
                    // Jika tidak tercentang
                } else {
                    qty_upacara.readOnly = true;
                    qty_upacara.value = "";
                    cek_centang--;
                }
                table2.search('').draw();

                for (let index3 = 1; index3 <= cek_data_upacara; index3++) {
                    var cek_upacara3 = "upacara:id";
                    upacara_id3 = cek_upacara3.replace(':id', index3);
                    let textBox_upacara2 = document.getElementById(upacara_id3);

                    if (cek_centang > 0) {
                        textBox_upacara2.required = false;
                    } else {
                        textBox_upacara2.required = true;
                    }
                }

                if (cek_pencarian_upacara == 1) {
                    table2.search(pencarian_upacara).draw();
                }
                // console.log(cek_tabel_search);
            });


            // Jika qty berubah
            qty_upacara.addEventListener('change', function() {

                let val = this.value;

                // Jika value kurang dari 0
                if (val < 0) {
                    this.value = 0;
                }
            });
        }
    });
</script>
