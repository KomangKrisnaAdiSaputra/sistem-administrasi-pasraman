<div class="table-responsive">
    <table class="table table-bordered customTable">
        {{-- <tr>
            <td class="fontBold">Kode Transaksi</td>
            <td>{{ $data->kode_transaksi }}</td>
        </tr> --}}
        <tr>
            <td class="fontBold">Nama Pelanggan</td>
            <td>{{ $data->nama_pelanggan }}</td>
        </tr>
        <tr>
            <td class="fontBold">No Telepon</td>
            <td>{{ $data->no_telepon }}</td>
        </tr>
        <tr>
            <td class="fontBold">Alamat</td>
            <td>{{ $data->alamat }}</td>
        </tr>
        {{-- <tr>
            <td class="fontBold">Email</td>
            <td>{{ $data->email }}</td>
        </tr> --}}
        <tr>
            <td class="fontBold">Kategori</td>
            <td>{{ $data->kategori }}</td>
        </tr>
        <tr>
            <td class="fontBold">Sapta Wara</td>
            <td>{{ $data->sapta_wara }}</td>
        </tr>
        <tr>
            <td class="fontBold">Panca Wara</td>
            <td>{{ $data->panca_wara }}</td>
        </tr>
        <tr>
            <td class="fontBold">Wuku</td>
            <td>{{ $data->wuku }}</td>
        </tr>
        <tr>
            <td class="fontBold">Tanggal Upacara</td>
            <td>{{ date('d-m-Y', strtotime($data->tanggal_upacara)) }}</td>
        </tr>
        <tr>
            <td class="fontBold">Waktu Upacara</td>
            <td>{{ $data->waktu_upacara }}</td>
        </tr>
        <tr>
            <td class="fontBold">Tanggal Transaksi</td>
            <td>{{ date('d-m-Y', strtotime($data->tanggal_transaksi)) }}</td>
        </tr>
        <tr>
            <td class="fontBold">Biaya (Rp)</td>
            <td style="text-align: right">@currency($data->biaya)</td>
        </tr>
        <tr>
            <td class="fontBold">DP (Rp)</td>
            <td style="text-align: right">@currency($data->dp)</td>
        </tr>
        <tr>
            <td class="fontBold">
                @if ($data->status == 1)
                    Sisa (Rp)
                @else
                    @if ($data->tanggal_pelunasan == null)
                        Sisa (Rp)
                    @else
                        Pelunasan (Rp)
                    @endif
                @endif
            </td>
            <td style="text-align: right">@currency($data->pelunasan)</td>
        </tr>
        <tr>
            <td class="fontBold">Tanggal Pelunasan</td>
            <td>
                @if ($data->tanggal_pelunasan == null)
                    ------------
                @else
                    {{ date('d-m-Y', strtotime($data->tanggal_pelunasan)) }}
                @endif
            </td>
        </tr>
        <tr>
            <td class="fontBold">Status</td>
            <td>
                @if ($data->status == 1)
                    <span class="badge bg-light-warning">Belum Lunas</span>
                @elseif($data->status == 0)
                    <span class="badge bg-light-success">Lunas</span>
                @elseif($data->status == 2)
                    <span class="badge bg-light-danger">Cancel</span>
                @endif
            </td>
        </tr>
        <!-- <tr>
            <td class="fontBold">Keterangan</td>
            <td>
                @if ($data->keterangan_upacara == null)
------------
@else
{{ $data->keterangan_upacara }}
@endif
            </td>
        </tr> -->

        {{-- <thead>
            <tr>
                <th>Kode Transaksi</th>
                <th>Nama Pelanggan</th>
                <th>No Telepon</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>Kategori</th>
                <th>Sapta Wara</th>
                <th>Panca Wara</th>
                <th>Tanggal Upacara</th>
                <th>Waktu Upacara</th>
                <th>Tanggal Transaksi</th>
                <th>Biaya (Rp)</th>
                <th>Dp (Rp)</th>
                @if ($data->status == 1)
                    <th>Sisa (Rp)</th>
                @else
                    <th>Pelunasan (Rp)</th>
                @endif
                <th>Tanggal Pelunasan</th>
                @if ($data->status == 2)
                    <th>Keterangan</th>
                @endif
                <th>Status</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $data->kode_transaksi }}</td>
                <td>{{ $data->nama_pelanggan }}</td>
                <td>{{ $data->no_telepon }}</td>
                <td>{{ $data->alamat }}</td>
                <td>{{ $data->email }}</td>
                <td>{{ $data->kategori }}</td>
                <td>{{ $data->sapta_wara }}</td>
                <td>{{ $data->panca_wara }}</td>
                <td>{{ $data->tanggal_upacara }}</td>
                <td>{{ $data->waktu_upacara }}</td>
                <td>{{ $data->tanggal_transaksi }}</td>
                <td style="text-align: right">@currency($data->biaya)</td>
                <td style="text-align: right">@currency($data->dp)</td>
                <td style="text-align: right">@currency($data->pelunasan)</td>
                @if ($data->status == 1)
                    <td>------------</td>
                    <td>
                        <span class="badge bg-light-warning">Belum Lunas</span>
                    </td>
                @elseif($data->status == 0)
                    <td>{{ $data->tanggal_pelunasan }}</td>
                    <td>
                        <span class="badge bg-light-success">Lunas</span>
                    </td>
                @elseif($data->status == 2)
                    <td>
                        @if ($data->tanggal_pelunasan == null)
                            ------------
                        @else
                            {{ $data->tanggal_pelunasan }}
                        @endif
                    </td>
                    <td>{{ $data->keterangan }}</td>
                    <td>
                        <span class="badge bg-light-danger">Cancel</span>
                    </td>
                @endif

                @if ($data->status == 2)
                    <td>{{ $data->keterangan_cancel }}</td>
                @else
                    <td>{{ $data->keterangan_upacara }}</td>
                @endif
            </tr>
        </tbody> --}}
    </table>
</div>
