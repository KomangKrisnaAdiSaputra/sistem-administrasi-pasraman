<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TbJenisUpacara;
use App\Models\TbTransaksi;
use App\Models\TbTransaksiBanten;
use App\Models\TbTransaksiUpacara;
use App\Models\TbUpacara;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Deklarasi variabel waktu hari ini
        $waktu = Carbon::now()->toTimeString();

        // Jika waktu kurang dari jam 12
        if ($waktu < '12:00:00') {
            $waktu_awal = "00:00:00";
            $waktu_akhir = "11:59:00";

            // Jika waktu lebih dari jam 12
        } else {
            $waktu_awal = "12:00:00";
            $waktu_akhir = "23:59:00";
        }

        // Array Data
        $data = [
            'title' => "Daftar Laporan", //ARRAY TITTLE BERFUNGSI UNTUK MEMBAWA TEKS TTILE 
            'tb_jenis_upacara' => TbJenisUpacara::get(), // Array tb_jenis_upacara untuk mengambil data dari tabel TbJenisUpacara

            // Array count_data untuk mengetahui jumlah data pada tabel Transaksi berdasarkan tanggal dan waktu
            'count_data' => TbTransaksi::where('tanggal_upacara', Carbon::now()->toDateString())->whereBetween('waktu_upacara', [$waktu_awal, $waktu_akhir])->get()->count()
        ];

        // DIBAWA KE DALAM FOLDER ADMIN/LAPORAN/INDEX.BLADE.PHP dan membawa variabel $data
        return view('admin.laporan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // data transaksi berdasarkan id yang di bawa
        $data = TbTransaksiBanten::with('tb_transaksi', 'tb_banten')->where(['id_transaksi' => $id])->get();

        // dibawa ke dalam folder admin/laporan/tabel/tabelDetail.blade.php dan membawa variabel $data
        return view('admin.laporan.tabel.tabelDetail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // Data Tabel Laporan
    public function tabelLaporan()
    {
        $tanggal = Carbon::now()->toDateString(); // Deklarasi tanggal hari ini
        $waktu = Carbon::now()->toTimeString(); // Deklarasi waktu hari ini

        // Jika waktu kurang dari jam 12
        if ($waktu < '12:00:00') {
            $waktu_awal = "00:00:00";
            $waktu_akhir = "11:59:00";

            // Jika waktu lebih dari jam 12
        } else {
            $waktu_awal = "12:00:00";
            $waktu_akhir = "23:59:00";
        }

        // Data tabel berdasarkan waktu dan tanggal hari ini tanpa status 2 atau status cancel
        $data = TbTransaksiUpacara::with('tb_transaksi', 'tb_upacara', 'tb_upacara.tb_jenis_upacara')
            ->whereRelation('tb_transaksi', ['tanggal_upacara' => $tanggal])
            ->whereRelation('tb_transaksi', function ($query) use ($waktu_awal, $waktu_akhir) {
                $query->whereNot('status', 2)->whereBetween('waktu_upacara', [$waktu_awal, $waktu_akhir]);
            })->OrderByDesc('id')->get();

        // Nomor urutan tabel
        $nomor = 1;

        // dibawa ke dalam folder admin/laporan/tabel/tabelLaporan.blade.php dan membawa variabel $data dan $nomor
        return view('admin.laporan.tabel.tabelLaporan', compact('data', 'nomor'));
    }

    // Fungsi Filter pada laporan
    public function filter(Request $request)
    {
        // Data yang ditanggkap melalui route
        $tanggal_awal = $request->tanggal_awal; // Deklarasi tanggal awal yang di tanggap melalui request dari input dengan name tanggal_awal
        $tanggal_akhir = $request->tanggal_akhir; // Deklarasi tanggal akhir yang di tanggap melalui request dari input dengan name tanggal_akhir
        $jenis_upacara = $request->jenis_upacara; // Deklarasi jenis upacara yang di tanggap melalui request dari input dengan name jenis upacara
        $kategori = $request->kategori; // Deklarasi kategori yang di tanggap melalui request dari input dengan name kategori
        $status = $request->status; // Deklarasi status yang di tanggap melalui request dari input dengan name status
        // Akhir

        // Jika jenis upacara nya isi
        if ($jenis_upacara != "") {

            // Cari data upacara sesuai dengan id jenis upacara
            $tb_upacara = TbUpacara::where('id_jenis_upacara', $jenis_upacara)->get();

            // Looping data upacara untuk mendapatkan id
            foreach ($tb_upacara as $key => $value) {
                $tb_upacara_id[] = $value->id; // Array id upacara
            }

            // Cari data transaksi upacara sesuai dengan id upacara
            $tb_transaksi_upacara = TbTransaksiUpacara::whereIn('id_upacara', $tb_upacara_id)->get();

            // Jika jumlah data sama dengan 0, count() berfungsi untuk menghitung jumlah data
            if ($tb_transaksi_upacara->count() == 0) {

                // Set id transaksinya 0
                $id_transaksi = array(
                    'o' => 0
                );

                // Jika jumlah data lebih dari 0
            } else {

                // looping data transaksi upacara untuk mendapatkan id transaksi
                foreach ($tb_transaksi_upacara as $key => $value) {
                    $tb_transaksi_id[] = $value->id_transaksi; // Array id transaksi
                }

                // array_unique berfungsi untuk menghilangkan id yang sama
                $id_transaksi = array_unique($tb_transaksi_id);
            }
        }

        // JIKA HANYA MEMILIH JENIS UPACARA
        if ($tanggal_awal == "" && $tanggal_akhir == "" && $kategori == "" && $status == "" && $jenis_upacara != "") {

            $data = TbTransaksiUpacara::with('tb_transaksi', 'tb_upacara', 'tb_upacara.tb_jenis_upacara')
                ->whereRelation('tb_transaksi', function ($query) use ($id_transaksi) {
                    $query->whereIn('id', $id_transaksi);
                })->get();

            // JIKA HANYA MEMILIH TANGGAL UPACARA
        } elseif ($jenis_upacara == "" && $kategori == "" && $status == "" && $tanggal_awal != "" && $tanggal_akhir != "") {

            $data = TbTransaksiUpacara::with('tb_transaksi', 'tb_upacara', 'tb_upacara.tb_jenis_upacara')
                ->whereRelation('tb_transaksi', function ($query) use ($tanggal_awal, $tanggal_akhir) {
                    $query->whereBetween('tanggal_upacara', [$tanggal_awal, $tanggal_akhir]);
                })->get();

            // JIKA HANYA MEMILIH KATEGORI
        } elseif ($tanggal_awal == "" && $tanggal_akhir == "" && $jenis_upacara == ""  && $status == "" && $kategori != "") {

            $data = TbTransaksiUpacara::with('tb_transaksi', 'tb_upacara', 'tb_upacara.tb_jenis_upacara')
                ->whereRelation('tb_transaksi', ['kategori' => $kategori])->get();

            // JIKA HANYA MEMILIH STATUS
        } elseif ($tanggal_awal == "" && $tanggal_akhir == "" && $jenis_upacara == "" && $kategori == "" && $status != "") {

            $data = TbTransaksiUpacara::with('tb_transaksi', 'tb_upacara', 'tb_upacara.tb_jenis_upacara')
                ->whereRelation('tb_transaksi', ['status' => $status])->get();

            // JIKA MEMILIH TANGGAL DAN JENIS UPACARA
        } elseif ($kategori == "" && $status == "" && $tanggal_awal != "" && $tanggal_akhir != "" && $jenis_upacara != "") {

            $data = TbTransaksiUpacara::with('tb_transaksi', 'tb_upacara', 'tb_upacara.tb_jenis_upacara')
                ->whereRelation('tb_transaksi', function ($query) use ($tanggal_awal, $tanggal_akhir, $id_transaksi) {
                    $query->whereBetween('tanggal_upacara', [$tanggal_awal, $tanggal_akhir])->whereIn('id', $id_transaksi);
                })->get();

            // JIKA MEMILIH TANGGAL DAN KATEGORI
        } elseif ($status == "" && $jenis_upacara == "" && $tanggal_awal != "" && $tanggal_akhir != ""  && $kategori != "") {

            $data = TbTransaksiUpacara::with('tb_transaksi', 'tb_upacara', 'tb_upacara.tb_jenis_upacara')
                ->whereRelation('tb_transaksi', function ($query) use ($tanggal_awal, $tanggal_akhir) {
                    $query->whereBetween('tanggal_upacara', [$tanggal_awal, $tanggal_akhir]);
                })->whereRelation('tb_transaksi', ['kategori' => $kategori])->get();

            // JIKA MEMILIH TANGGAL DAN STATUS
        } elseif ($kategori == "" && $jenis_upacara == "" && $tanggal_awal != "" && $tanggal_akhir != ""  && $status != "") {

            $data = TbTransaksiUpacara::with('tb_transaksi', 'tb_upacara', 'tb_upacara.tb_jenis_upacara')
                ->whereRelation('tb_transaksi', function ($query) use ($tanggal_awal, $tanggal_akhir) {
                    $query->whereBetween('tanggal_upacara', [$tanggal_awal, $tanggal_akhir]);
                })->whereRelation('tb_transaksi', ['status' => $status])->get();

            // JIKA MEMILIH JENIS UPACARA DAN KATEGORI
        } elseif ($tanggal_awal == "" && $tanggal_akhir == ""  && $status == "" && $kategori != "" && $jenis_upacara != "") {
            $data = TbTransaksiUpacara::with('tb_transaksi', 'tb_upacara', 'tb_upacara.tb_jenis_upacara')
                ->whereRelation('tb_transaksi', function ($query) use ($id_transaksi) {
                    $query->whereIn('id', $id_transaksi);
                })->whereRelation('tb_transaksi', ['kategori' => $kategori])->get();

            // JIKA MEMILIH JENIS UPACARA DAN STATUS
        } elseif ($tanggal_awal == "" && $tanggal_akhir == ""  && $kategori == "" && $status != "" &&  $jenis_upacara != "") {
            $data = TbTransaksiUpacara::with('tb_transaksi', 'tb_upacara', 'tb_upacara.tb_jenis_upacara')
                ->whereRelation('tb_transaksi', function ($query) use ($id_transaksi) {
                    $query->whereIn('id', $id_transaksi);
                })->whereRelation('tb_transaksi', ['status' => $status])->get();

            // JIKA MEMILIH KATEGORI DAN STATUS
        } elseif ($tanggal_awal == "" && $tanggal_akhir == "" &&  $jenis_upacara == "" && $kategori != "" && $status != "") {
            $data = TbTransaksiUpacara::with('tb_transaksi', 'tb_upacara', 'tb_upacara.tb_jenis_upacara')
                ->whereRelation('tb_transaksi', ['kategori' => $kategori])->whereRelation('tb_transaksi', ['status' => $status])->get();

            // JIKA MEMILIH TANGGAL , JENIS DAN KATEGORI
        } elseif ($tanggal_awal != "" && $tanggal_akhir != "" && $jenis_upacara != "" && $kategori != "" && $status == "") {
            $data = TbTransaksiUpacara::with('tb_transaksi', 'tb_upacara', 'tb_upacara.tb_jenis_upacara')
                ->whereRelation('tb_transaksi', function ($query) use ($tanggal_awal, $tanggal_akhir, $id_transaksi) {
                    $query->whereBetween('tanggal_upacara', [$tanggal_awal, $tanggal_akhir])->whereIn('id', $id_transaksi);
                })->whereRelation('tb_transaksi', ['kategori' => $kategori])->get();

            // JIKA MEMILIH JENIS, KATEGORI, DAN STATUS
        } elseif ($tanggal_awal == "" && $tanggal_akhir == "" && $jenis_upacara != "" && $kategori != "" && $status != "") {
            $data = TbTransaksiUpacara::with('tb_transaksi', 'tb_upacara', 'tb_upacara.tb_jenis_upacara')
                ->whereRelation('tb_transaksi', function ($query) use ($tanggal_awal, $tanggal_akhir, $id_transaksi) {
                    $query->whereIn('id', $id_transaksi);
                })->whereRelation('tb_transaksi', ['kategori' => $kategori])->whereRelation('tb_transaksi', ['status' => $status])->get();

            // JIKA MEMILIH TANGGAL, JENIS DAN STATUS
        } elseif ($tanggal_awal != "" && $tanggal_akhir != "" && $jenis_upacara != "" && $kategori == "" && $status != "") {
            $data = TbTransaksiUpacara::with('tb_transaksi', 'tb_upacara', 'tb_upacara.tb_jenis_upacara')
                ->whereRelation('tb_transaksi', function ($query) use ($tanggal_awal, $tanggal_akhir, $id_transaksi) {
                    $query->whereBetween('tanggal_upacara', [$tanggal_awal, $tanggal_akhir])->whereIn('id', $id_transaksi);
                })->whereRelation('tb_transaksi', ['status' => $status])->get();

            // JIKA MEMILIH TANGGAL, KATEGORI, STATUS
        } elseif ($tanggal_awal != "" && $tanggal_akhir != "" && $jenis_upacara == "" && $kategori != "" && $status != "") {
            $data = TbTransaksiUpacara::with('tb_transaksi', 'tb_upacara', 'tb_upacara.tb_jenis_upacara')
                ->whereRelation('tb_transaksi', function ($query) use ($tanggal_awal, $tanggal_akhir, $id_transaksi) {
                    $query->whereBetween('tanggal_upacara', [$tanggal_awal, $tanggal_akhir]);
                })->whereRelation('tb_transaksi', ['kategori' => $kategori])->whereRelation('tb_transaksi', ['status' => $status])->get();

            // JIKA MEMILIH SEMUA
        } elseif ($tanggal_awal != "" && $tanggal_akhir != "" && $jenis_upacara != "" && $kategori != "" && $status != "") {

            $data = TbTransaksiUpacara::with('tb_transaksi', 'tb_upacara', 'tb_upacara.tb_jenis_upacara')
                ->whereRelation('tb_transaksi', function ($query) use ($tanggal_awal, $tanggal_akhir, $id_transaksi) {
                    $query->whereBetween('tanggal_upacara', [$tanggal_awal, $tanggal_akhir])->whereIn('id', $id_transaksi);
                })->whereRelation('tb_transaksi', ['kategori' => $kategori])->whereRelation('tb_transaksi', ['status' => $status])->get();
        }

        // dibawa ke dalam folder admin/laporan/tabel/tabelFilter.blade.php dan membawa variabel $data
        return view('admin.laporan.tabel.tabelFilter', compact('data'));
    }

    public function print($status)
    {
        // Jika jumlah stringnya lebih dari 200
        if (strlen($status) > 200) {
            $cek = explode('&', $status); // Memisahkan string menjadi array
            $cek_data = $cek[0]; // Menyimpan $cek array ke 0  ke dalam variabel $cek_data

            // Jika jumlah string kurang dari 200
        } elseif (strlen($status) < 200) {
            $cek_data = Crypt::encrypt($status); // Mengencrypt string $status
        }

        // Jika hasil decrypt dari $cek_data hasilnya adalah print 
        if (Crypt::decrypt($cek_data) == 'print') {

            // Jika jumlah dari $cek adalah 2
            if (count($cek) == 2) {
                $tanggal = Carbon::now()->toDateString(); // Deklarasi tanggal hari ini
                $waktu = Carbon::now()->toTimeString(); // Deklarasi waktu hari ini

                // Jika waktu kurang dari jam 12
                if ($waktu < '12:00:00') {
                    $waktu_awal = "00:00:00";
                    $waktu_akhir = "11:59:00";
                    $detail_waktu = "PAGI";

                    // Jika waktu lebih dari jam 12
                } else {
                    $waktu_awal = "12:00:00";
                    $waktu_akhir = "23:59:00";
                    $detail_waktu = "SORE";
                }

                // Jika jumlah dari $cek tidak 2
            } else {

                $tanggal = $cek[1]; // Deklarasi tanggal yang diambil dari variabel $cek array ke 1

                // Jika $cek array ke 2nya adalah Pagi
                if ($cek[2] == 'Pagi') {
                    $waktu_awal = "00:00:00";
                    $waktu_akhir = "11:59:00";
                    $detail_waktu = "PAGI";

                    // Jika $cek array ke 2nya adalah Sore
                } elseif ($cek[2] == 'Sore') {
                    $waktu_awal = "12:00:00";
                    $waktu_akhir = "23:59:00";
                    $detail_waktu = "SORE";
                }
            }

            // Deklarasi data transaksi berdasarkan tanggal dan waktu
            $tb_transaksi = TbTransaksi::whereNot('status', 2)->where('tanggal_upacara', $tanggal)->whereBetween('waktu_upacara', [$waktu_awal, $waktu_akhir])->get();

            // Jika jumlah data dari tabel transaksi = 0
            if ($tb_transaksi->count() == 0) {

                // Membawa pesan error bahwa data tidak ditemukan
                session()->flash('error', 'Data Tidak Ditemukan, Silahkan Pilih Tanggal atau Waktu Yang Lain!');

                // Kembali ke halaman sebelumnya melalui route dengan name laporan.index
                return redirect(route('laporan.index'));
            }

            // Looping tabel transaksi
            foreach ($tb_transaksi as $key => $value) {

                // Mendapatkan data hari bali 
                $hari_bali[] = $value->sapta_wara . " " . $value->panca_wara;

                // Mendapatkan data tanggal upacara 
                $tanggal_upacara[] = $value->tanggal_upacara;

                // Mencari data transaksi upacara berdasarkan id transaksi dan status tidak sama dengan 2 atau cancel
                $tb_transaksi_upacara = TbTransaksiUpacara::with('tb_upacara', 'tb_transaksi')->where('id_transaksi', $value->id)->whereRelation('tb_transaksi', function ($query) {
                    $query->whereNot('status', 2);
                })->get();

                // Looping data transaksi upacara
                foreach ($tb_transaksi_upacara as $key2 => $value2) {

                    // Jika qty_upacara lebih dari 1
                    if ($value2->qty_upacara > 1) {

                        // Deklarasi nama upacara dengan qty upacara
                        $nama_upacara_qty = $value2->tb_upacara->nama_upacara . ' (' . $value2->qty_upacara . ')';

                        // Jika qty_upacara kurang dari 1
                    } else {

                        // Deklarasi nama upacara tanpa qty upacara
                        $nama_upacara_qty = $value2->tb_upacara->nama_upacara;
                    }

                    // Memasukkan nama upacara ke dalam array transaksi_upacara
                    $transaksi_upacara[] = $nama_upacara_qty;
                }

                // Jika jumlah data pada array transaksi_upacara lebih dari 1
                if (count($transaksi_upacara) > 1) {

                    // Mengubah menjadi string dan menambahkan koma
                    $nama_upacara = implode(", ", $transaksi_upacara);
                } else {

                    // Mengambil nama upacara dengan transaksi upacara array ke 0
                    $nama_upacara = $transaksi_upacara[0];
                }

                // Mencari data transaksi banten dengan kondisi banten_pulang = 0 dan berdasarkan id_transaksi
                $tb_transaksi_banten = TbTransaksiBanten::with('tb_banten')->where('banten_pulang', 0)->where('id_transaksi', $value->id)->get();

                // Jika jumlah data pada transaksi banten lebih dari 0
                if ($tb_transaksi_banten->count() > 0) {

                    // Looping data transaksi banten
                    foreach ($tb_transaksi_banten as $key3 => $value3) {

                        // Jika qty lebih dari 1
                        if ($value3->qty > 1) {

                            // Deklarasi nama banten dengan qty banten
                            $nama_banten_qty = $value3->tb_banten->nama_banten . ' (' . $value3->qty . ')';
                        } else {

                            // Deklarasi nama banten tanpa qty banten
                            $nama_banten_qty = $value3->tb_banten->nama_banten;
                        }

                        // Memasukkan nama banten ke dalam array transaksi_banten
                        $transaksi_banten[] = $nama_banten_qty;
                    }

                    // Jika jumlah data transaksi banten lebih dari 1
                    if (count($transaksi_banten) > 1) {

                        // Mengubah array ke string dan menambahkan koma
                        $nama_banten = implode(", ", $transaksi_banten);
                    } else {

                        // Mengambil nama banten dengan transaksi banten array ke 0
                        $nama_banten = $transaksi_banten[0];
                    }

                    // Jika jumlah data pada transaksi banten kurang dari 0
                } else {

                    // Set nama banten = kosong
                    $nama_banten = "";
                }

                // Mencari data transaksi banten pulang dengan kondisi banten_pulang = 1 dan berdasarkan id_transaksi
                $tb_transaksi_banten_pulang = TbTransaksiBanten::with('tb_banten')->where('banten_pulang', 1)->where('id_transaksi', $value->id)->get();

                // Set variavel transaksi banten pulang = array kosong
                $transaksi_banten_pulang = [];

                // Looping data transaksi banten
                foreach ($tb_transaksi_banten_pulang as $key4 => $value4) {

                    // Jika qty lebih dari 1
                    if ($value4->qty > 1) {

                        // Deklarasi nama banten pulang dengan qty banten pulang
                        $nama_banten_pulang_qty = $value4->tb_banten->nama_banten . ' (' . $value4->qty . ')';
                    } else {

                        // Deklarasi nama banten pulang tanpa qty banten pulang
                        $nama_banten_pulang_qty = $value4->tb_banten->nama_banten;
                    }

                    // Memasukkan nama banten pulang ke dalam array transaksi_banten_pulang
                    $transaksi_banten_pulang[] = $nama_banten_pulang_qty;
                }

                // Jika jumlah data transaksi banten pulang lebih dari 1
                if (count($transaksi_banten_pulang) > 1) {

                    // Mengubah array ke string dan menambahkan koma
                    $nama_banten_pulang = implode(", ", $transaksi_banten_pulang);

                    // Jika jumlah data transaksi banten pulang kurang dari 1
                } else {

                    // Jika transaksi banten pulang = null atau tidak ada data
                    if ($transaksi_banten_pulang == null) {

                        // Set nama banten pulang = null
                        $nama_banten_pulang = null;

                        // Jika transaksi banten pulang tidak sama dengan null atau ada data
                    } else {

                        // Set nama banten pulang = transaksi_banten_pulang di array ke 0
                        $nama_banten_pulang = $transaksi_banten_pulang[0];
                    }
                }

                // Array data print halaman 1
                $data_print[] = [
                    'id_transaksi' => $value->id,
                    'nama' => $value->nama_pelanggan,
                    'alamat' => $value->alamat,
                    'status' => $value->status,
                    'keterangan_upacara' => $value->keterangan_upacara,
                    'keterangan_cancel' => $value->keterangan_cancel,
                    'waktu_upacara' => Carbon::parse($value->waktu_upacara)->format('g'),
                    'nama_upacara' => $nama_upacara,
                    'nama_banten' => $nama_banten,
                    'nama_banten_pulang' => $nama_banten_pulang
                ];
                // Akhir Array data print halaman 1

                unset($transaksi_upacara); // unset untuk menghapus array , yaitu array transaksi_upacara
                unset($transaksi_banten); // unset untuk menghapus array , yaitu array transaksi_banten
                $id_transaksi[] = $value->id; // Memasukkan id transaksi ke dalam array id_transaksi
            }

            // unsort untuk mensortir berdasarkan waktu upacara sesuai abjad
            usort($data_print, fn ($a, $b) => $a['waktu_upacara'] <=> $b['waktu_upacara']);

            // Array judul pada halaman print
            $data = [
                'hari_bali' => strtoupper(array_unique($hari_bali)[0]),
                'tanggal_upacara' => strtoupper(Carbon::parse(array_unique($tanggal_upacara)[0])->translatedFormat('d F Y')),
                'detail_waktu' => $detail_waktu
            ];
            // Akhir Array judul pada halaman print

            // ===================================================================  PRINT HALAMAN 2 ==================================================================  //

            // Mencari data transaksi upacara berdasarkan id transaksi
            $cek_tb_transaksi_upacara = TbTransaksiUpacara::with('tb_upacara', 'tb_transaksi')->whereIn('id_transaksi', $id_transaksi)->whereRelation('tb_transaksi', function ($query) {
                $query->whereNot('status', 2);
            })->get();

            // Looping data transaksi upacara untuk mendapatkan nama upacaranya
            foreach ($cek_tb_transaksi_upacara as $key => $value) {
                $total_upacara[] = $value->tb_upacara->nama_upacara; // Menyimpan nama upacara ke dalam array total_upacara
            }

            // array_count_values untuk mendapatkan jumlah data yang sama, array_unique untuk menghilangkan data yang sama, array_values untuk mereset angka array
            $cek_total_upacara = array_values(array_count_values($total_upacara));
            $cek_nama_upacara = array_values(array_unique($total_upacara));

            // Looping cek_total_upacara untuk menggabungkan array cek_total_upacara dan cek_nama_upacara dengan sesuai
            foreach ($cek_total_upacara as $key => $value) {

                // Memasukkan datanya ke dalam array cek_data1
                $cek_data1[] = [
                    'upacara' => $cek_nama_upacara[$key],
                    'total_upacara' => $value,
                ];
            }

            // Looping cek_data1 untuk melakukan pengecekkan qty upacara
            foreach ($cek_data1 as $key => $value) {

                // Mencari data transaksi upacara berdasarkan id transaksi dan nama upacara
                $cek_tb_transaksi_upacara2 = TbTransaksiUpacara::with('tb_upacara', 'tb_transaksi')->whereIn('id_transaksi', $id_transaksi)->whereRelation('tb_transaksi', function ($query) {
                    $query->whereNot('status', 2);
                })->whereRelation('tb_upacara', ['nama_upacara' => $value['upacara']])->get();

                // Jika jumlah data transaksi upacara2 lebih dari 1
                if ($cek_tb_transaksi_upacara2->count() > 1) {

                    // Looping cek_tb_transaksi_upacara2 untuk memasukkan qty upacara
                    foreach ($cek_tb_transaksi_upacara2 as $key2 => $value2) {

                        // Jika qty_upacara lebih dari 1
                        if ($value2->qty_upacara > 1) {
                            $cekQty = "(" . $value2->qty_upacara . " Orang)"; // Memasukkan qty_upacara dengan string ke dalam variabel $cekQty

                            // Jika qty_upacara kurang dari 1
                        } else {
                            $cekQty = ""; // Set variabel $cekQty = kosong
                        }
                        $cek_jumlah[] = $cekQty; // Memasukkan variabel $cekQty ke dalam array $cek_jumlah
                    }

                    // array_diff untuk menghapus array yang kosong, count untuk menghitung jumlah data pada array
                    // Jika jumlah data pada array cek_jumlah lebih dari 1
                    if (count(array_diff($cek_jumlah, [""])) > 1) {
                        $cekQty = "(" . $cek_tb_transaksi_upacara2->sum('qty_upacara') . " Orang)"; // Memasukkan total qty_upacara dengan string
                    }

                    // Jika jumlah data transaksi upacara2 kurang dari 1
                } else {

                    // Looping cek_tb_transaksi_upacara2 untuk memasukkan qty upacara
                    foreach ($cek_tb_transaksi_upacara2 as $key2 => $value2) {

                        // Jika qty_upacara lebih dari 1
                        if ($value2->qty_upacara > 1) {
                            $cekQty = "(" . $value2->qty_upacara . " Orang)";  // Memasukkan qty_upacara dengan string ke dalam variabel $cekQty

                            // Jika qty_upacara kurang dari 1
                        } else {
                            $cekQty = ""; // Set variabel $cekQty = kosong
                        }
                    }
                }

                // Array data_upacara
                $data_upacara[] = [
                    'upacara' => $value['upacara'],
                    'total_upacara' => $value['total_upacara'] . ' ' . $cekQty,
                ];
                // Akhir Array data_upacara

                sort($data_upacara); // Mensortir data upacara sesuai abjad 
            }

            // Mencari data transaksi banten sesuai dengan id transaksi dengan banten_pulang = 0
            $tb_transaksi_banten2 = TbTransaksiBanten::with('tb_banten', 'tb_transaksi')->where('banten_pulang', 0)->whereIn('id_transaksi', $id_transaksi)->whereRelation('tb_transaksi', function ($query) {
                $query->whereNot('status', 2);
            })->get();

            // Jika jumlah transaksi banten = 0
            if ($tb_transaksi_banten2->count() == 0) {

                // Array data banten
                $data_banten[] = [
                    'banten' => "",
                    'qty' => ""
                ];
                // Akhir Array data banten

                // Jika jumlah transaksi banten tidak sama dengan 0
            } else {

                // Looping data transaksi banten
                foreach ($tb_transaksi_banten2 as $key => $value) {

                    // Array cek data banten
                    $cek_data_banten[] = [
                        'banten' => $value->tb_banten->nama_banten,
                        'qty' => $value->qty,
                    ];
                    // Akhir Array cek data banten
                }

                // Looping data cek data banten
                foreach ($cek_data_banten as $key => $value) {
                    $qtyBanten[] = ""; //Set qtyBanten = kosong

                    // Array data banten
                    $data_banten[] = [
                        'banten' => "",
                        'qty' => "",
                    ];
                    // Akhir Array data banten

                    // in_array untuk pengecekkan menggunakan array
                    // Jika banten ada yang sama pada array qtyBanten
                    if (in_array($value['banten'], $qtyBanten) == true) {
                        $qtyBanten[] = $value['banten']; // Memasukkan nama banten ke dalam variabel qtyBanten

                        // Looping data banten
                        foreach ($data_banten as $key2 => $value2) {

                            // Jika data nama banten sama
                            if ($value2['banten'] == $value['banten']) {

                                // Array data banten
                                $data_banten[] = [
                                    'banten' => $value['banten'],
                                    'qty' => $value2['qty'] + $value['qty'],
                                ];
                                // Akhir Array data banten

                                // Menghapus array banten yang sama pertama
                                unset($data_banten[$key2]);
                            }
                        }

                        // Jika tidak ada banten yang sama pada array qtyBanten
                    } else {
                        $qtyBanten[] = $value['banten']; // Memasukkan nama banten ke dalam variabel qtyBanten

                        // Array data banten
                        $data_banten[] = [
                            'banten' => $value['banten'],
                            'qty' => $value['qty'],
                        ];
                        // Akhir Array data banten
                    }
                }
                $data_banten = array_unique($data_banten, SORT_REGULAR); // Menghapus data yang duplikat pada array data_banten

                unset($data_banten[0]); // Menghapus array data_banten array ke 0 karena array ke 0 itu datanya kosong
                $data_banten = array_values($data_banten); // Mereset angka array data_banten
                sort($data_banten); // Sortir array data_banten sesuai abjad
            }

            // Mencari data transaksi banten pulang sesuai dengan id transaksi dengan banten_pulang = 1
            $tb_transaksi_banten_pulang2 = TbTransaksiBanten::with('tb_banten', 'tb_transaksi')->where('banten_pulang', 1)->whereRelation('tb_transaksi', ['tanggal_banten_pulang' => $tanggal])->whereRelation('tb_transaksi', function ($query) {
                $query->whereNot('status', 2);
            })->get();

            // Jika jumlah transaksi banten pulang = 0
            if ($tb_transaksi_banten_pulang2->count() == 0) {

                // Array data banten pulang
                $data_banten_pulang[] = [
                    'banten_pulang' => "",
                    'qty' => ""
                ];
                // Akhir Array data banten pulang

                // Jika jumlah transaksi banten pulang tidak sama dengan 0
            } else {

                // Looping data transaksi banten pulang
                foreach ($tb_transaksi_banten_pulang2 as $key => $value) {

                    // Array cek data banten pulang
                    $cek_data_banten_pulang[] = [
                        'banten_pulang' => $value->tb_banten->nama_banten,
                        'qty' => $value->qty,
                    ];
                    // Akhir Array cek data banten pulang
                }

                // Looping data cek data banten pulang
                foreach ($cek_data_banten_pulang as $key => $value) {
                    $qtyBantenPulang[] = ""; //Set qtyBanten = kosong

                    // Array data banten pulang
                    $data_banten_pulang[] = [
                        'banten_pulang' => "",
                        'qty' => "",
                    ];
                    // Akhir Array data banten pulang


                    // in_array untuk pengecekkan menggunakan array
                    // Jika banten pulang ada yang sama pada array qtyBantenPulang
                    if (in_array($value['banten_pulang'], $qtyBantenPulang) == true) {
                        $qtyBantenPulang[] = $value['banten_pulang']; // Memasukkan nama banten ke dalam variabel qtyBanten

                        // Looping data banten pulang
                        foreach ($data_banten_pulang as $key2 => $value2) {

                            // Jika data nama banten pulang sama
                            if ($value2['banten_pulang'] == $value['banten_pulang']) {

                                // Array data banten pulang
                                $data_banten_pulang[] = [
                                    'banten_pulang' => $value['banten_pulang'],
                                    'qty' => $value2['qty'] + $value['qty'],
                                ];
                                // Akhir Array data banten pulang

                                // Menghapus array banten pulang yang sama pertama
                                unset($data_banten_pulang[$key2]);
                            }
                        }

                        // Jika tidak ada banten yang sama pada array qtyBantenPulang
                    } else {
                        $qtyBantenPulang[] = $value['banten_pulang']; // Memasukkan nama banten ke dalam variabel qtyBantenPulang

                        // Array data banten pulang
                        $data_banten_pulang[] = [
                            'banten_pulang' => $value['banten_pulang'],
                            'qty' => $value['qty'],
                        ];
                        // Akhir Array data banten pulang
                    }
                }
                $data_banten_pulang = array_unique($data_banten_pulang, SORT_REGULAR); // Menghapus data yang duplikat pada array data_banten pulang

                unset($data_banten_pulang[0]); // Menghapus array data_banten_pulang array ke 0 karena array ke 0 itu datanya kosong
                $data_banten_pulang = array_values($data_banten_pulang); // Mereset angka array data_banten_pulang
                sort($data_banten_pulang); // Sortir array data_banten_pulang sesuai abjad
            }

            // Array waktu saat print
            $waktuPrint = [
                'tanggal' => Carbon::now()->translatedFormat('d/m/Y'),
                'waktu' => Carbon::now()->toTimeString()
            ];
            // Akhir Array waktu saat print

            // dibawa ke dalam folder admin/laporan/tampilan-print/indexPrint.blade.php dan membawa variabel $data, $data_print, $data_upacara, $data_banten, $data_banten_pulang, dan $waktuPrint
            return view('admin.laporan.tampilan-print.indexPrint',  compact('data', 'data_print', 'data_upacara', 'data_banten', 'data_banten_pulang', 'waktuPrint'));

            // Jika hasil decrypt dari $cek_data hasilnya tidak sama dengan print         
        } else {

            // mengembalikkan tampilan ke tampilan sebelumnya
            return redirect(route('laporan.index'));
        }
    }
}
