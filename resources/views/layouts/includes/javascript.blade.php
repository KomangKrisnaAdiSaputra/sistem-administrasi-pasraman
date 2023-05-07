<script src="{{ asset('assets/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>
<script src="{{ asset('assets/js/pages/horizontal-layout.js') }}"></script>

{{-- <script src="{{ asset('assets/extensions/apexcharts/apexcharts.min.js') }}"></script> --}}
{{-- <script src="{{ asset('assets/js/pages/dashboard.js') }}"></script> --}}
<script src="{{ asset('assets/extensions/jquery/jquery.min.js') }}"></script>
<script type="text/javascript" charset="utf8" src="{{ asset('/DataTables/dataTables.js') }}"></script>
<script src="{{ asset('assets/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>
<script src="{{ asset('assets/js/pages/form-element-select.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>
<script src="{{ asset('assets/extensions/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/sweetalert2.js') }}"></script>
<script src="{{ asset('assets/extensions/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/js/balinese-date-js-lib.min.js') }}"></script>
<script>
    $(document).ready(function() {

        var BD = window.BalineseDate;
        const date = new Date('{{ Carbon\Carbon::now()->addDays(1) }}');
        var now = new BD.BalineseDate(date);
        var huhu = '{{ Carbon\Carbon::now()->addDays(1) }}';
        console.log('saka = ' + '{{ date('Y/m/d') }}');
        console.log('panca = ' + now.saptaWara.name);
        console.log('sasih = ' + now.sasih.name);
    });
</script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    /* Fungsi formatRupiah */
    const formatRupiah = (money) => {
        return new Intl.NumberFormat('id-ID', {

            currency: 'IDR',
            minimumFractionDigits: 0
        }).format(money);
    }

    /* Fungsi */
    function formatRupiah2(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }

    function file_form() {
        $('#formFile').click();

        $("#formFile").change(function() {
            $('#file-chosen').html(this.files[0].name);
        });
    }

    function tanggal_sapta_panca_wara(tanggal) {
        const BD = window.BalineseDate;
        if (tanggal == "") {
            $('#sapta_wara').val('Kosong');
            $('#panca_wara').val('Kosong');
            $('#wuku').val('Kosong');
        } else {
            const date = new Date(tanggal);
            const now = new BD.BalineseDate(date);
            $('#sapta_wara').val(now.saptaWara.name);
            $('#panca_wara').val(now.pancaWara.name);
            $('#wuku').val(now.wuku.name);
        }
    }
</script>

<script>
    function modalTambah(href, title, size) {
        $.get(href, {}, function(data, status) {
            $("#modalBodyTambah").html(data);
            var modal = $("#modalTambah").modal('show');
            modal.find('.modal-title').text(title);
            modal.find('.modal-dialog').addClass(size);
        });
    }

    function modalUpdate(href, title, size) {
        $.get(href, {}, function(data, status) {
            $("#modalBodyUpdate").html(data);
            var modal = $("#modalUpdate").modal('show');
            modal.find('.modal-title').text(title);
            modal.find('.modal-dialog').addClass(size);

        });
    }

    function modalDetail(href, title, size) {
        $.get(href, {}, function(data, status) {
            $("#modalBodyDetail").html(data);
            var modal = $("#modalDetail").modal('show');
            modal.find('.modal-title').text(title);
            modal.find('.modal-dialog').addClass(size);
        });
    }
</script>

@if (session()->has('success'))
    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 1500
        })
    </script>
@endif

@if (session()->has('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ session('error') }}',
        });
    </script>
@endif
@yield('container.js')
