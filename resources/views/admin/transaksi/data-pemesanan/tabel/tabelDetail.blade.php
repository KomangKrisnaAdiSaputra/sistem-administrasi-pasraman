<div class="table-responsive">
    <table class="table table-bordered customTable">
        <tr>
            <td class="fontBold">Kode Transaksi</td>
            <td colspan="2">{{ $data['tb_transaksi']->kode_transaksi }}</td>
        </tr>
        <tr>
            <td class="fontBold">Nama Pelanggan</td>
            <td colspan="2">{{ $data['tb_transaksi']->nama_pelanggan }}</td>
        </tr>
        <tr>
            <td class="fontBold">No Telepon</td>
            <td colspan="2">{{ $data['tb_transaksi']->no_telepon }}</td>
        </tr>
        <tr>
            <td class="fontBold">Alamat</td>
            <td colspan="2">{{ $data['tb_transaksi']->alamat }}</td>
        </tr>
        {{-- <tr>
            <td class="fontBold">Email</td>
            <td colspan="2">{{ $data['tb_transaksi']->email }}</td>
        </tr> --}}
        <tr>
            <td class="fontBold">Kategori</td>
            <td colspan="2">{{ $data['tb_transaksi']->kategori }}</td>
        </tr>
        <tr>
            <td class="fontBold">Sapta Wara</td>
            <td colspan="2">{{ $data['tb_transaksi']->sapta_wara }}</td>
        </tr>
        <tr>
            <td class="fontBold">Panca Wara</td>
            <td colspan="2">{{ $data['tb_transaksi']->panca_wara }}</td>
        </tr>
        <tr>
            <td class="fontBold">Tanggal Upacara</td>
            <td colspan="2">{{ date('d-m-Y', strtotime($data['tb_transaksi']->tanggal_upacara)) }}</td>
        </tr>
        <tr>
            <td class="fontBold">Waktu Upacara</td>
            <td colspan="2">{{ $data['tb_transaksi']->waktu_upacara }}</td>
        </tr>
        <tr>
            <td class="fontBold">Tanggal Transaksi</td>
            <td colspan="2">{{ date('d-m-Y', strtotime($data['tb_transaksi']->tanggal_transaksi)) }}</td>
        </tr>
        <tr>
            <td class="fontBold">Biaya (Rp)</td>
            <td style="text-align: right" colspan="2">@currency($data['tb_transaksi']->biaya)</td>
        </tr>
        <tr>
            <td class="fontBold">DP (Rp)</td>
            <td style="text-align: right" colspan="2">@currency($data['tb_transaksi']->dp)</td>
        </tr>
        <tr>
            <td class="fontBold">
                @if ($data['tb_transaksi']->status == 1)
                    Sisa (Rp)
                @else
                    @if ($data['tb_transaksi']->tanggal_pelunasan == null)
                        Sisa (Rp)
                    @else
                        Pelunasan (Rp)
                    @endif
                @endif
            </td>
            <td style="text-align: right" colspan="2">@currency($data['tb_transaksi']->pelunasan)</td>
        </tr>
        <tr>
            <td class="fontBold">Tanggal Pelunasan</td>
            <td colspan="2">
                @if ($data['tb_transaksi']->tanggal_pelunasan == null)
                    ------------
                @else
                    {{ date('d-m-Y', strtotime($data['tb_transaksi']->tanggal_pelunasan)) }}
                @endif
            </td>
        </tr>
        <tr>
            <td class="fontBold">Status</td>
            <td colspan="2">
                @if ($data['tb_transaksi']->status == 1)
                    <span class="badge bg-light-warning">Belum Lunas</span>
                @elseif($data['tb_transaksi']->status == 0)
                    <span class="badge bg-light-success">Lunas</span>
                @elseif($data['tb_transaksi']->status == 2)
                    <span class="badge bg-light-danger">Cancel</span>
                @endif
            </td>
        </tr>
        <!-- <tr>
            <td class="fontBold">Keterangan</td>
            <td colspan="2">
                @if ($data['tb_transaksi']->keterangan_upacara == null)
------------
@else
{{ $data['tb_transaksi']->keterangan_upacara }}
@endif
            </td>
        </tr> -->
        <tr>
            <td colspan="3" class="fontBold centered">Upacara</td>
        </tr>
        <tr>
            <td class="fontBold centered">Jenis Upacara</td>
            <td class="fontBold centered">Nama Upacara</td>
            <td class="fontBold centered">Jumlah Upacara</td>
        </tr>
        @foreach ($data['tb_upacara'] as $key => $value)
            <?php
            $angka1 = 0;
            if ($key > 0) {
                $angka1 = $key - 1;
            }
            $angka2 = 1;
            for ($x = 1; $x < $data['tb_upacara']->count(); $x++) {
                if ($value->tb_upacara->tb_jenis_upacara->nama_jenis_upacara == $data['tb_upacara'][$x]->tb_upacara->tb_jenis_upacara->nama_jenis_upacara) {
                    $angka2++;
                }
            }
            ?>
            <tr>
                <td <?php
                if ($key > 0) {
                    if ($data['tb_upacara'][$angka1]->tb_upacara->tb_jenis_upacara->nama_jenis_upacara != $value->tb_upacara->tb_jenis_upacara->nama_jenis_upacara) {
                        $angka2 -= 1;
                    }
                }
                if ($angka2 > 0) {
                    echo "rowspan='" . $angka2 . "'";
                
                    if ($key > 0) {
                        if ($data['tb_upacara'][$angka1]->tb_upacara->tb_jenis_upacara->nama_jenis_upacara == $value->tb_upacara->tb_jenis_upacara->nama_jenis_upacara) {
                            echo 'hidden';
                        }
                    }
                }
                ?>>
                    {{ $value->tb_upacara->tb_jenis_upacara->nama_jenis_upacara }}
                </td>
                <td>{{ $value->tb_upacara->nama_upacara }}</td>
                <td class="centered">{{ $value->qty_upacara }}</td>
            </tr>
        @endforeach
        <tr>
            <td colspan="3" class="fontBold centered">Banten</td>
        </tr>
        @if ($data['tb_transaksi']->tanggal_banten_pulang != null)
            <tr>
                <td class="fontBold">Tanggal Pengambilan Banten</td>
                <td colspan="2" class="centered">
                    {{ Carbon\Carbon::parse($data['tb_transaksi']->tanggal_banten_pulang)->isoFormat('D MMMM Y') }}
                </td>
            </tr>
        @endif

        <tr>
            <td class="fontBold centered">Nama Banten</td>
            <td class="fontBold centered">Jumlah Banten</td>
            <td class="fontBold centered">Keterangan</td>
        </tr>
        @foreach ($data['tb_banten'] as $key => $value)
            <tr>
                <td>{{ $value->tb_banten->nama_banten }}</td>
                <td class="centered">{{ $value->qty }}</td>
                <td>
                    @if ($value->banten_pulang == 0)
                        Tidak Bawa Pulang
                    @else
                        Bawa Pulang
                    @endif
                </td>
            </tr>
        @endforeach
        <tr>
            <td colspan="3" class="fontBold centered">Ulam</td>
        </tr>
        <tr>
            <td colspan="2" class="fontBold centered">Nama Ulam</td>
            <td class="fontBold centered">Jumlah Ulam</td>
        </tr>
        @if ($data['tb_ulam']->count() == 0)
            <tr>
                <td colspan="3" class="fontBold centered">Tidak Ada Banten Ulam</td>
            </tr>
        @else
            @foreach ($data['tb_ulam'] as $key => $value)
                <tr>
                    <td colspan="2">{{ $value->tb_ulam->nama_ulam }}</td>
                    <td class="centered">{{ $value->qty }}</td>
                </tr>
            @endforeach
        @endif
    </table>
</div>


{{-- <div class="table-responsive">
    <table class="table customTable">
        <thead>
            <tr>
                <th>Kode Transaksi</th>
                @if ($data['tb_transaksi'][0]->tb_transaksi->tanggal_banten_pulang != null)
                    <th>Tanggal Banten Pulang</th>
                @endif
                <th>Nama Banten</th>
                <th>Qty</th>
                <th style="text-align: center;">Banten Pulang</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data['tb_transaksi'] as $key => $value)
                <?php
                $angka1 = 0;
                if ($key > 0) {
                    $angka1 = $key - 1;
                }
                $angka2 = 1;
                for ($x = 1; $x < $data['tb_transaksi']->count(); $x++) {
                    if ($value->tb_transaksi->kode_transaksi == $data['tb_transaksi'][$x]->tb_transaksi->kode_transaksi) {
                        $angka2++;
                    }
                }
                ?>
                <tr>
                    <td <?php
                    if ($key > 0) {
                        if ($data['tb_transaksi'][$angka1]->tb_transaksi->kode_transaksi != $value->tb_transaksi->kode_transaksi) {
                            $angka2 -= 1;
                        }
                    }
                    if ($angka2 > 0) {
                        echo "rowspan='" . $angka2 . "'";
                    
                        if ($key > 0) {
                            if ($data['tb_transaksi'][$angka1]->tb_transaksi->kode_transaksi == $value->tb_transaksi->kode_transaksi) {
                                echo 'hidden';
                            }
                        }
                    }
                    ?>>
                        {{ $value->tb_transaksi->kode_transaksi }}
                    </td>
                    @if ($value->tb_transaksi->tanggal_banten_pulang != null)
                        <td <?php
                        if ($angka2 > 0) {
                            echo "rowspan='" . $angka2 . "'";
                        
                            if ($key > 0) {
                                if ($data['tb_transaksi'][$angka1]->tb_transaksi->kode_transaksi == $value->tb_transaksi->kode_transaksi) {
                                    echo 'hidden';
                                }
                            }
                        }
                        ?>>
                            {{ $value->tb_transaksi->tanggal_banten_pulang }}
                        </td>
                    @endif

                    <td style="width: 40%;">
                        {{ $value->tb_banten->nama_banten }}
                    </td>
                    <td style="width: 8%;">
                        {{ $value->qty }}
                    </td>
                    <td style="width: 10%; text-align: center;">
                        @if ($value->banten_pulang == 0)
                            <span class="badge bg-light-warning">Tidak Bawa Pulang</span>
                        @else
                            <span class="badge bg-light-primary">Bawa Pulang</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div> --}}
