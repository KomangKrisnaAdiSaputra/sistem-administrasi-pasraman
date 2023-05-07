<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TbBanten;
use App\Models\TbJenisUpacara;
use App\Models\TbTransaksi;
use App\Models\TbTransaksiBanten;
use App\Models\TbTransaksiUlam;
use App\Models\TbTransaksiUpacara;
use App\Models\TbUlam;
use App\Models\TbUpacara;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // ARRAY DATA
        $data = [
            'title' => "Data Transaksi",  //ARRAY TITTLE BERFUNGSI UNTUK MEMBAWA TEKS TTILE 
        ];

        // DIBAWA KE DALAM FOLDER ADMIN/TRANSAKSI/INDEX.BLADE.PHP dan membawa variabel $data
        return view('admin.transaksi.data-transaksi.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tanggal = Carbon::now()->toDateString();

        // MENAMPILKAN DATA FORM TAMBAH YANG BERADA DI ADMIN.TRANSAKSI/TAMBAH-DAN-EDIT/TAMBAH.BLADE.PHP
        return view('admin.transaksi.data-transaksi.tambah-dan-edit.tambah', compact('tanggal'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // DATA YANG DI TANGKAP DARI BLADE MELALUI ROUTE
        $nama_pelanggan = $request->nama_pelanggan;
        $email = $request->email;
        $no_telepon = $request->no_telepon;
        $alamat = $request->alamat;
        $kategori = $request->kategori;
        $sapta_wara = $request->sapta_wara;
        $panca_wara = $request->panca_wara;
        $wuku = $request->wuku;
        $tanggal_upacara = $request->tanggal_upacara;
        $waktu_upacara = $request->waktu_upacara;
        $tanggal_transaksi = $request->tanggal_transaksi;
        $cek_biaya = $request->biaya;
        $biaya = str_replace(".", "", $cek_biaya); // str_replace berfungsi untuk menghilangkan titik di dalam teks biaya
        $cek_dp = $request->dp;
        $dp = str_replace(".", "", $cek_dp);
        $cek_pelunasan = $request->sisa;
        $cek_qty = $request->qty;
        $cek_qty_ulam = $request->qty_ulam;
        $tb_banten = TbBanten::where('status', 2)->get();
        $tb_ulam = TbUlam::where('status', 2)->get();
        $cek_qty_upacara = $request->qty_upacara;
        $tb_upacara = $request->upacara;

        // fungsi untuk pengecekkan bahwa lunas atau tidak
        if ($cek_pelunasan == 0) {
            $pelunasan = 0;
            $status = 0;
            $tanggal_pelunasan = Carbon::now()->toDateString();
        } else {
            $pelunasan = str_replace(".", "", $cek_pelunasan);
            $status = 1;
            $tanggal_pelunasan = NULL;
        }

        $cek_qty_banten = array_diff($cek_qty, [null, 0]); //array_diff berfungsi untuk menghapus data yang null dan 0
        $cek_qty = array_values($cek_qty_banten); //array_values untuk mereset urutan array menjadi 0,1 dst

        $cek_qty_data_ulam = array_diff($cek_qty_ulam, [null, 0]); //array_diff berfungsi untuk menghapus data yang null dan 0
        $cek_qty_ulam_baru = array_values($cek_qty_data_ulam); //array_values untuk mereset urutan array menjadi 0,1 dst

        $cek_qty_upacara2 = array_diff($cek_qty_upacara, [null, 0]);
        $qty_upacara = array_values($cek_qty_upacara2);

        // berfungsi untuk menggabungkan 2 array menjadi 1 dengan sesuai
        foreach ($tb_banten as $key1 => $value_id_banten) {
            // array transaksi banten dengan qty banten
            $array_baru[] = array(
                'qty_id_banten' => $value_id_banten->id,
                'qty_banten' => $cek_qty[$key1]
            );
        }
        $array_ulam = [];
        foreach ($tb_ulam as $key1 => $value) {
            // array transaksi banten dengan qty banten
            $array_ulam[] = array(
                'qty_id_ulam' => $value->id,
                'qty_ulam' => $cek_qty_ulam_baru[$key1]
            );
        }

        // berfungsi untuk menggabungkan 2 array menjadi 1 dengan sesuai
        foreach ($tb_upacara as $key2 => $id_upacara_value) {
            // array transaksi upacara dengan qty upacara
            $array_baru2[] = array(
                'qty_id_upacara' => $id_upacara_value,
                'qty_upacara' => $qty_upacara[$key2]
            );
        }

        // fungsi untuk pengecekkan jika ada banten pulang
        if ($request->banten_pulang != null) {
            $cek_id_banten_pulang = array_diff($request->banten_pulang, [null]);
        }

        // FORMAT KODE TRANSAKSI
        $huruf = "PB";
        // TANGGAL
        $tanggal = Carbon::now()->toDateString();
        $urutan_tanggal = explode("-", $tanggal);
        $tanggal_kode_transaksi = $urutan_tanggal[2] . $urutan_tanggal[1] . substr($urutan_tanggal[0], 2);
        // AMBIL DATA YANG ADA KODE TRANSAKSI PB
        $tb_transaksi = TbTransaksi::where('kode_transaksi', 'LIKE', '%PB%')->OrderByDesc('id')->get();

        // PENGECEKKAN APAKAH DATA tb_transaksi ada atau tidak
        if ($tb_transaksi->count() == 0) {

            $angka_default = 1;
            $angka = sprintf("%04s", $angka_default); //sprinttf berfungsi untuk menambahkan angka 0000 sebelum angka_default
        } else {

            $angka_default = substr($tb_transaksi[0]->kode_transaksi, 8); //substr berfungsi untuk menghapus 8 karakter dari depan
            $angka_default++;
            $jumlahKarakter = strlen($angka_default);

            if ($jumlahKarakter > 4) {

                $angka = sprintf("%05s", $angka_default);
            } else {

                $angka = sprintf("%04s", $angka_default);
            }
        }

        // menggabungkan semua huruf agar menjadi kode transaksi
        $kode_transaksi = $huruf . $tanggal_kode_transaksi . $angka;
        //Akhir

        // data transaksi yang akan dimasukkan kedalam tabel
        $data_transaksi = array(
            'id_user' => auth()->user()->id, //mengambil id yang login
            'kode_transaksi' => $kode_transaksi,
            'nama_pelanggan' => $nama_pelanggan,
            'no_telepon' => $no_telepon,
            'alamat' => $alamat,
            'email' => $email,
            'kategori' => $kategori,
            'sapta_wara' => $sapta_wara,
            'panca_wara' => $panca_wara,
            'wuku' => $wuku,
            'tanggal_upacara' => $tanggal_upacara,
            'waktu_upacara' => $waktu_upacara,
            'status' => $status,
            'tanggal_transaksi' => $tanggal_transaksi,
            'biaya' => $biaya,
            'dp' => $dp,
            'pelunasan' => $pelunasan,
            'tanggal_pelunasan' => $tanggal_pelunasan
        );
        $tb_transaksi = TbTransaksi::create($data_transaksi); //menambah data dalam tabel transaksi

        // Update jika ada keterangan upacara
        if ($request->keterangan_upacara != null) {
            TbTransaksi::find($tb_transaksi->id)->update(['keterangan_upacara' => $request->keterangan_upacara]);
        }

        // memasukkan data transaksi banten kedalam tabel transaksi banten
        foreach ($array_baru as $key3 => $value_transaksi_banten) {
            TbTransaksiBanten::create([
                'id_transaksi' => $tb_transaksi->id,
                'id_banten' => $value_transaksi_banten['qty_id_banten'],
                'banten_pulang' => 0,
                'qty' => $value_transaksi_banten['qty_banten']
            ]);
        }

        if ($array_ulam == null) {
            foreach ($array_ulam as $key3 => $value_transaksi_ulam) {
                TbTransaksiUlam::create([
                    'id_transaksi' => $tb_transaksi->id,
                    'id_ulam' => $value_transaksi_ulam['qty_id_ulam'],
                    'qty' => $value_transaksi_ulam['qty_ulam']
                ]);
            }
        }

        // memasukkan data transaksi upacara kedalam tabel transaksi upacara
        foreach ($array_baru2 as $key4 => $value_transaksi_upacara) {
            TbTransaksiUpacara::create([
                'id_transaksi' => $tb_transaksi->id,
                'id_upacara' => $value_transaksi_upacara['qty_id_upacara'],
                'qty_upacara' => $value_transaksi_upacara['qty_upacara']
            ]);
        }

        // pengecekkan apakah ada banten pulang 
        if ($request->banten_pulang != null) {
            // mengambil data berdasarkan id_banten dari tabel transaksi banten
            $id_banten_transaksi = TbTransaksiBanten::where('id_transaksi', $tb_transaksi->id)->whereIn('id_banten', $cek_id_banten_pulang)->get();

            // update tabel transaksi banten sesuai dengan data banten pulang
            foreach ($id_banten_transaksi as $key4 => $value_banten_pulang) {
                TbTransaksiBanten::find($value_banten_pulang->id)->update(['banten_pulang' => 1]);
            }
        }

        // pengecekkan apakah ada tanggal banten pulang
        if ($request->tanggal_banten_pulang != null) {
            // update data transaksi 
            TbTransaksi::find($tb_transaksi->id)->update(['tanggal_banten_pulang' => $request->tanggal_banten_pulang]);
        }

        // mengembalikkan status tabel banten
        $tb_banten_0 = TbBanten::where('status', 2)->get();
        foreach ($tb_banten_0 as $key6 => $value_status_banten) {
            TbBanten::find($value_status_banten->id)->update(['status' => 1]);
        }

        $tb_ulam_0 = TbUlam::where('status', 2)->get();
        foreach ($tb_ulam_0 as $key6 => $value_status_ulam) {
            TbUlam::find($value_status_ulam->id)->update(['status' => 1]);
        }

        // mengembalikkan tampilan ke tampilan sebelumnya
        return redirect(route('index-transaksi'));
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
        $data = TbTransaksi::find($id);

        // dibawa ke dalam folder admin/transaksi/tabel/tabelDetailTransaksi.blade.php dan membawa variabel $data
        return view('admin.transaksi.data-transaksi.tabel.tabelDetailTransaksi', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // mengambil data transaksi berdasarkan id
        $transaksi = TbTransaksi::find($id);

        $tb_upacara = TbUpacara::OrderBy('id', 'ASC')->get();
        $tb_transaksi_upacara = TbTransaksiUpacara::where('id_transaksi', $id)->OrderBy('id_upacara', 'ASC')->get('id_upacara')->mapToGroups(function ($item, $key) {
            return [$item['id_upacara']];
        })->toArray();

        foreach ($tb_upacara as $key => $value) {
            $qty = "";
            $status = "";
            if (in_array($value->id, $tb_transaksi_upacara[0]) === true) {
                $qty = TbTransaksiUpacara::where([['id_transaksi', '=', $id], ['id_upacara', '=', $value->id]])->first()->qty_upacara;
                $status = 'checked';
            }


            $data_upacara[] = [
                'id' => $value->id,
                'jenis_upacara' => $value->tb_jenis_upacara->nama_jenis_upacara,
                'nama_upacara' => $value->nama_upacara,
                'qty' => $qty,
                'status' => $status
            ];
        }

        $data = [
            // data_transaksi banten dan upacara berdasarkan id transaksi
            'transaksi_upacara' => TbTransaksiUpacara::with('tb_upacara', 'tb_upacara.tb_jenis_upacara')->where('id_transaksi', $transaksi->id)->get(),
            'transaksi_banten' => TbTransaksiBanten::with('tb_banten')->where('id_transaksi', $transaksi->id)->get(),
            'transaksi_ulam' => TbTransaksiUlam::with('tb_ulam')->where('id_transaksi', $transaksi->id)->get(),
            'daftar_upacara' => $data_upacara
        ];

        // id transaksi
        $id_transaksi = $id;
        $tanggal = Carbon::now()->toDateString();

        // dibawa ke dalam folder admin/transaksi/tambah-dan-edit/edit.blade.php dan membawa variabel $data, $transaksi, $id_transaksi, $sapta_wara, $panca_wara
        return view('admin.transaksi.data-transaksi.tambah-dan-edit.edit', compact('transaksi', 'data', 'id_transaksi',  'tanggal'));
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
        $data_transaksi = array(
            'id_user' => auth()->user()->id, //mengambil id yang login
            'nama_pelanggan' => $request->nama_pelanggan,
            'no_telepon' => $request->no_telepon,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'kategori' => $request->kategori,
            'sapta_wara' => $request->sapta_wara,
            'panca_wara' => $request->panca_wara,
            'wuku' => $request->wuku,
            'tanggal_upacara' => $request->tanggal_upacara,
            'tanggal_banten_pulang' => $request->tanggal_banten_pulang,
            'waktu_upacara' => $request->waktu_upacara,
            'tanggal_transaksi' => $request->tanggal_transaksi,
            'keterangan_upacara' => $request->keterangan_upacara,
        );

        if ($request->qty_upacara != null) {
            $cek_qty_upacara = array_diff($request->qty_upacara, [null, 0]);
            $qty_upacara = array_values($cek_qty_upacara);
            foreach ($request->upacara as $key => $value) {
                TbTransaksiUpacara::create([
                    'id_transaksi' => $id,
                    'id_upacara' => $value,
                    'qty_upacara' => $qty_upacara[$key]
                ]);
            }
        }

        if ($request->qty != null) {
            $cek_qty_banten = array_diff($request->qty, [null, 0]);
            $qty_banten = array_values($cek_qty_banten);

            $data_banten = TbBanten::where('status', 2)->get();
            foreach ($data_banten as $key => $value) {
                TbTransaksiBanten::create([
                    'id_transaksi' => $id,
                    'id_banten' => $value->id,
                    'qty' => $qty_banten[$key],
                    'banten_pulang' => 0
                ]);
            }

            if ($request->banten_pulang != null) {
                foreach ($request->banten_pulang as $key => $value) {
                    $tb_transaksi_banten =  TbTransaksiBanten::where([['id_transaksi', '=', $id], ['id_banten', '=', $value]])->first();
                    TbTransaksiBanten::find($tb_transaksi_banten->id)->update(['banten_pulang' => 1]);
                }
            }
        }

        if ($request->qty_ulam != null) {
            $cek_qty_ulam = array_diff($request->qty_ulam, [null, 0]);
            $qty_ulam = array_values($cek_qty_ulam);

            $data_ulam = TbUlam::where('status', 2)->get();
            foreach ($data_ulam as $key => $value) {
                TbTransaksiUlam::create([
                    'id_transaksi' => $id,
                    'id_ulam' => $value->id,
                    'qty' => $qty_ulam[$key],
                ]);
            }
        }
        TbTransaksi::find($id)->update($data_transaksi);


        // // pengecekkan apakah keterangan ada atau tidak
        // // untuk menjalankan fungsi apakah dia cancel atau hanya untuk pembayaran sisa hutang
        if ($request->keterangan_cancel != null) {
            // jika ada keterangan berarti cancel
            $data_pelunasan = array(
                'keterangan_cancel' => $request->keterangan_cancel,
                'status' => 2
            );
            TbTransaksi::find($id)->update($data_pelunasan);
        } elseif ($request->tanggal_pelunasan != null && $request->pelunasan != null) {
            $data_pelunasan = array(
                'tanggal_pelunasan' => $request->tanggal_pelunasan,
                'pelunasan' =>  str_replace(".", "", $request->pelunasan),
                'status' => 0,
            );
            TbTransaksi::find($id)->update($data_pelunasan);
        }

        // mengembalikkan tampilan ke tampilan sebelumnya
        return redirect(route('index-transaksi'));
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

    // DATA DAFTAR UPACARA UNTUK DI FORM TAMBAH
    public function daftarUpacara()
    {
        // data upcara 
        $data = TbUpacara::with('tb_jenis_upacara')->where('status', 1)->OrderBy('id_jenis_upacara', 'ASC')->OrderBy('id', 'ASC')->get();

        // dibawa ke dalam folder admin/transaksi/daftar-banten-dan-upacara/daftarUpacara.blade.php dan membawa variabel $data
        return view('admin.transaksi.data-transaksi.daftar-banten-dan-upacara.daftarUpacara', compact('data'));
    }

    // DATA DAFTAR BANTEN UNTUK DI FORM TAMBAH
    public function daftarBanten()
    {
        // data banten
        $data = TbBanten::where('status', 1)->get();
        $cek = "tambah";
        // dibawa ke dalam folder admin/transaksi/daftar-banten-dan-upacara/daftarBanten.blade.php dan membawa variabel $data
        return view('admin.transaksi.data-transaksi.daftar-banten-dan-upacara.daftarBanten', compact('data', 'cek'));
    }

    public function daftarUlam()
    {
        // data banten
        $data = TbUlam::where('status', 1)->get();

        // dibawa ke dalam folder admin/transaksi/daftar-banten-dan-upacara/daftarBanten.blade.php dan membawa variabel $data
        return view('admin.transaksi.data-transaksi.daftar-banten-dan-upacara.daftarUlam', compact('data'));
    }

    public function daftarTransaksiUpacara($id)
    {
        // data upcara 
        $data = TbTransaksiUpacara::with('tb_transaksi', 'tb_upacara', 'tb_upacara.tb_jenis_upacara')->where('id_transaksi', $id)->OrderBy('id', 'ASC')->get();

        // dibawa ke dalam folder admin/transaksi/daftar-banten-dan-upacara/daftarUpacara.blade.php dan membawa variabel $data
        return view('admin.transaksi.data-transaksi.daftar-banten-dan-upacara.daftar-edit.daftarUpacara', compact('data'));
    }

    public function daftarTransaksiBanten($id)
    {
        // data upcara 
        $data = TbTransaksiBanten::with('tb_transaksi', 'tb_banten')->where('id_transaksi', $id)->OrderBy('id', 'ASC')->get();

        // dibawa ke dalam folder admin/transaksi/daftar-banten-dan-upacara/daftarUpacara.blade.php dan membawa variabel $data
        return view('admin.transaksi.data-transaksi.daftar-banten-dan-upacara.daftar-edit.daftarBanten', compact('data'));
    }

    public function daftarTransaksiUlam($id)
    {
        // data upcara 
        $data = TbTransaksiUlam::with('tb_transaksi', 'tb_ulam')->where('id_transaksi', $id)->OrderBy('id', 'ASC')->get();

        // dibawa ke dalam folder admin/transaksi/daftar-banten-dan-upacara/daftarUpacara.blade.php dan membawa variabel $data
        return view('admin.transaksi.data-transaksi.daftar-banten-dan-upacara.daftar-edit.daftarUlam', compact('data'));
    }


    public function daftarTransaksiEdit($status, $id)
    {
        if ($status == "upacara") {
            $tb_transaksi_upacara = TbTransaksiUpacara::where('id_transaksi', $id)->OrderBy('id_upacara', 'ASC')->get('id_upacara')->mapToGroups(function ($item, $key) {
                return [$item['id_upacara']];
            })->toArray();
            // data upcara 
            $data_upacara = ($tb_transaksi_upacara == null) ? [0] : $tb_transaksi_upacara[0];

            $data = TbUpacara::with('tb_jenis_upacara')->whereNotIn('id', $data_upacara)->where('status', 1)->OrderBy('id_jenis_upacara', 'ASC')->OrderBy('id', 'ASC')->get();

            // dibawa ke dalam folder admin/transaksi/daftar-banten-dan-upacara/daftarUpacara.blade.php dan membawa variabel $data
            return view('admin.transaksi.data-transaksi.daftar-banten-dan-upacara.daftarUpacara', compact('data'));
        } elseif ($status == "banten") {
            $tb_transaksi_banten = TbTransaksiBanten::where('id_transaksi', $id)->OrderBy('id_banten', 'ASC')->get('id_banten')->mapToGroups(function ($item, $key) {
                return [$item['id_banten']];
            })->toArray();

            $data_banten = ($tb_transaksi_banten == null) ? [0] : $tb_transaksi_banten[0];

            // dd($tb_transaksi_banten);
            // data upcara 
            $data = TbBanten::whereNotIn('id', $data_banten)->where('status', 1)->OrderBy('id', 'ASC')->get();
            $cek = "edit";
            // dibawa ke dalam folder admin/transaksi/daftar-banten-dan-upacara/daftarUpacara.blade.php dan membawa variabel $data
            return view('admin.transaksi.data-transaksi.daftar-banten-dan-upacara.daftarBanten', compact('data', 'cek'));
        } elseif ($status == "ulam") {
            $tb_transaksi_ulam = TbTransaksiUlam::where('id_transaksi', $id)->OrderBy('id_ulam', 'ASC')->get('id_ulam')->mapToGroups(function ($item, $key) {
                return [$item['id_ulam']];
            })->toArray();

            $data_ulam = ($tb_transaksi_ulam == null) ? [0] : $tb_transaksi_ulam[0];
            // data upcara 
            $data = TbUlam::whereNotIn('id', $data_ulam)->where('status', 1)->OrderBy('id', 'ASC')->get();

            // dibawa ke dalam folder admin/transaksi/daftar-banten-dan-upacara/daftarUpacara.blade.php dan membawa variabel $data
            return view('admin.transaksi.data-transaksi.daftar-banten-dan-upacara.daftarUlam', compact('data'));
        }
    }

    // ganti status di banten
    public function gantiStatus($id, $status, $qtyy)
    {
        // jika status nya banten
        if ($status == "banten") {
            // cari data banten di tabel banten berdasarkan id yang di bawa
            $tb_banten = TbBanten::find($id);

            // jika qtynya 0 maka ubah ke 1
            if ($qtyy == 0) {
                $tb_banten->update(['status' => 1]);
            } else {
                $tb_banten->update(['status' => 2]);
            }
        } elseif ($status == "ulam") {
            $tb_ulam = TbUlam::find($id);

            // jika qtynya 0 maka ubah ke 1
            if ($qtyy == 0) {
                $tb_ulam->update(['status' => 1]);
            } else {
                $tb_ulam->update(['status' => 2]);
            }
        }
        // mengembalikan ke response melalui json
        return response()->json();
    }

    public function ubahDataTransaksi($status, $id, $id_transaksi, $value)
    {
        if ($status == "upacara") {
            TbTransaksiUpacara::find($id)->update(['qty_upacara' => $value]);
        } elseif ($status == "banten") {
            TbTransaksiBanten::find($id)->update(['qty' => $value]);
        } elseif ($status == "banten_pulang") {
            $data_transaksi_banten = TbTransaksiBanten::find($id);
            $banten_pulang = ($data_transaksi_banten->banten_pulang == 0) ? 1 : 0;

            $data_transaksi_banten->update(['banten_pulang' => $banten_pulang]);

            $total_banten_pulang = TbTransaksiBanten::where([['id_transaksi', '=', $id_transaksi], ['banten_pulang', '=', 1]])->get()->count();
            return response()->json($data_transaksi_banten->banten_pulang);
        } elseif ($status == "tanggal_banten_pulang") {
            $tanggal = ($value == 0) ? null : $value;
            TbTransaksi::find($id)->update(['tanggal_banten_pulang' => $tanggal]);
            $total_banten_pulang = TbTransaksiBanten::where([['id_transaksi', '=', $id_transaksi], ['banten_pulang', '=', 1]])->get()->count();
            return response()->json($total_banten_pulang);
        } elseif ($status == "ulam") {
            TbTransaksiUlam::find($id)->update(['qty' => $value]);
        }
    }

    public function hapusDataTransaksi($status, $id)
    {
        if ($status == "upacara") {
            TbTransaksiUpacara::find($id)->delete();
        } elseif ($status == "banten") {
            TbTransaksiBanten::find($id)->delete();
        } elseif ($status == "ulam") {
            TbTransaksiUlam::find($id)->delete();
        }

        return response()->json();
    }

    public function tabelTransaksi($tanggal)
    {
        // Jika isi variabel $tanggal = kosong
        if ($tanggal == "kosong") {

            // ARRAY tb_transaksi BERFUNGSI UNTUK MEMBAWA DATA TRANSAKSI 
            $data = TbTransaksi::OrderByDesc('id')->get();
        } else {
            // Memisah tanggal
            $rangeTanggal = explode("&", $tanggal);

            // ARRAY tb_transaksi BERFUNGSI UNTUK MEMBAWA DATA TRANSAKSI FILTER
            $data = TbTransaksi::whereBetween('tanggal_transaksi', [$rangeTanggal[0], $rangeTanggal[1]])->OrderByDesc('id')->get();
        }

        // dibawa ke dalam folder admin/transaksi/tabel/tabelTransaksi.blade.php dan membawa variabel $data dan $tanggal
        return view('admin.transaksi.data-transaksi.tabel.tabelTransaksi', compact('data', 'tanggal'));
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
        if (Crypt::decrypt($cek_data) == 'print per orang') {
            $data = [
                'data_transaksi' => TbTransaksi::find($cek[1]),
                'data_banten' => TbTransaksiBanten::with('tb_banten')->where('id_transaksi', $cek[1])->get(),
                'data_upacara' => TbTransaksiUpacara::with('tb_upacara')->where('id_transaksi', $cek[1])->get(),
                'tanggal' => Carbon::now()->translatedFormat('d/m/Y'),
                'waktu' => Carbon::now()->toTimeString()
            ];

            return view('admin.transaksi.index-print.indexPrintPerOrang', compact('data'));
        } elseif (Crypt::decrypt($cek_data) == 'print rekap') {
            // dd($cek);
            $transaksi = TbTransaksi::whereNot('status', 2)->whereBetween('tanggal_transaksi', [$cek[1], $cek[2]])->get();

            foreach ($transaksi as $key => $value) {
                if ($value->tanggal_pelunasan == null) {
                    $sisa = $value->pelunasan;
                } else {
                    $sisa = 0;
                }
                if ($value->status == 0) {
                    $status = "Lunas";
                } else {
                    $status = "Belum Lunas";
                }
                $tb_transaksi_upacara = TbTransaksiUpacara::with('tb_upacara', 'tb_transaksi')->where('id_transaksi', $value->id)->whereRelation('tb_transaksi', function ($query) {
                    $query->whereNot('status', 2);
                })->get();
                // Looping data transaksi upacara
                foreach ($tb_transaksi_upacara as $key2 => $value2) {

                    // Memasukkan nama upacara ke dalam array transaksi_upacara
                    $transaksi_upacara[] = $value2->tb_upacara->nama_upacara;
                }

                if (count($transaksi_upacara) > 1) {
                    $nama_upacara = implode(", ", $transaksi_upacara);
                } else {
                    $nama_upacara = $transaksi_upacara[0];
                }

                $data[] = [
                    'kode_transaksi' => $value->kode_transaksi,
                    'nama_pelanggan' => $value->nama_pelanggan,
                    'tanggal_transaksi' => $value->tanggal_transaksi,
                    'tanggal_upacara' => $value->tanggal_upacara,
                    'nama_upacara' => $nama_upacara,
                    'total_biaya' => $value->biaya,
                    'dp' => $value->dp,
                    'pelunasan' => $value->pelunasan,
                    'sisa' => $sisa,
                    'status' => $value->status,
                    'keterangan' => $status
                ];
                unset($transaksi_upacara); // unset untuk menghapus array , yaitu array transaksi_upacara
            }
            $tanggal = [
                'tanggal_awal' => Carbon::parse($cek[1])->translatedFormat('d F Y'),
                'tanggal_akhir' => Carbon::parse($cek[2])->translatedFormat('d F Y'),
                'tanggal_print' => Carbon::now()->translatedFormat('d/m/Y'),
                'waktu' => Carbon::now()->toTimeString()
            ];
            return view('admin.transaksi.index-print.indexPrintRekap', compact('data', 'tanggal'));
        } else if (Crypt::decrypt($cek_data) == 'print jadwal harian') {

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
            $tb_transaksi = TbTransaksi::where('tanggal_upacara', $tanggal)->whereBetween('waktu_upacara', [$waktu_awal, $waktu_akhir])->get();

            // Jika jumlah data dari tabel transaksi = 0
            if ($tb_transaksi->count() == 0) {

                // Membawa pesan error bahwa data tidak ditemukan
                session()->flash('error', 'Data Tidak Ditemukan, Silahkan Pilih Tanggal atau Waktu Yang Lain!');

                // Kembali ke halaman sebelumnya melalui route dengan name index-pemesanan
                return redirect(route('index-pemesanan'));
            }

            // Looping tabel transaksi
            foreach ($tb_transaksi as $key => $value) {

                // Mendapatkan data hari bali 
                $hari_bali[] = $value->sapta_wara . " " . $value->panca_wara . " " . $value->wuku;

                // Mendapatkan data tanggal upacara 
                $tanggal_upacara[] = $value->tanggal_upacara;

                // Mencari data transaksi upacara berdasarkan id transaksi dan status tidak sama dengan 2 atau cancel
                $tb_transaksi_upacara = TbTransaksiUpacara::with('tb_upacara', 'tb_transaksi')->where('id_transaksi', $value->id)->get();

                // Looping data transaksi upacara
                foreach ($tb_transaksi_upacara as $key2 => $value2) {
                    $vendor_upacara = ($value2->tb_upacara->status_vendor == 'vendor') ? 'color-vendor' : '';
                    // Jika qty_upacara lebih dari 1
                    if ($value2->qty_upacara > 1) {

                        // Deklarasi nama upacara dengan qty upacara
                        $nama_upacara_qty = "<span class='" . $vendor_upacara . "'> " . $value2->tb_upacara->nama_upacara . ' (' . $value2->qty_upacara . ')' . " </span>";

                        // Jika qty_upacara kurang dari 1
                    } else {

                        // Deklarasi nama upacara tanpa qty upacara
                        $nama_upacara_qty = "<span class='" . $vendor_upacara . "'> " . $value2->tb_upacara->nama_upacara . " </span>";
                    }

                    // Memasukkan nama upacara ke dalam array transaksi_upacara
                    $transaksi_upacara[] = $nama_upacara_qty;
                }

                // Jika jumlah data pada array transaksi_upacara lebih dari 1
                if (count($transaksi_upacara) > 1) {

                    // Mengubah menjadi string dan menambahkan koma
                    $nama_upacara = implode(" + ", $transaksi_upacara);
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
                        $vendor_banten = ($value3->tb_banten->status_vendor == 'vendor') ? 'color-vendor' : '';

                        // Jika qty lebih dari 1
                        if ($value3->qty > 1) {

                            // Deklarasi nama banten dengan qty banten
                            $nama_banten_qty = "<span class='"  . $vendor_banten . "'>" . $value3->tb_banten->nama_banten . ' (' . $value3->qty . ')' . "</span>";
                        } else {

                            // Deklarasi nama banten tanpa qty banten
                            $nama_banten_qty = "<span class='"  . $vendor_banten . "'>" . $value3->tb_banten->nama_banten . "</span>";
                        }

                        // Memasukkan nama banten ke dalam array transaksi_banten
                        $transaksi_banten[] = $nama_banten_qty;
                    }

                    // Jika jumlah data transaksi banten lebih dari 1
                    if (count($transaksi_banten) > 1) {

                        // Mengubah array ke string dan menambahkan koma
                        $nama_banten = implode(" + ", $transaksi_banten);
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
                    $vendor_banten_pulang = ($value4->tb_banten->status_vendor == 'vendor') ? 'color-vendor' : '';

                    if ($value4->qty > 1) {

                        // Deklarasi nama banten dengan qty banten
                        $nama_banten_pulang_qty = "<span class='"  . $vendor_banten_pulang . "'>" . $value4->tb_banten->nama_banten . ' (' . $value4->qty . ')' . "</span>";
                    } else {

                        // Deklarasi nama banten tanpa qty banten
                        $nama_banten_pulang_qty = "<span class='"  . $vendor_banten_pulang . "'>" . $value4->tb_banten->nama_banten . "</span>";
                    }

                    // Memasukkan nama banten pulang ke dalam array transaksi_banten_pulang
                    $transaksi_banten_pulang[] = $nama_banten_pulang_qty;
                }

                // Jika jumlah data transaksi banten pulang lebih dari 1
                if (count($transaksi_banten_pulang) > 1) {

                    // Mengubah array ke string dan menambahkan koma
                    $nama_banten_pulang = implode(" + ", $transaksi_banten_pulang);

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

                $tb_transaksi_ulam = TbTransaksiUlam::with('tb_ulam')->where('id_transaksi', $value->id)->get();
                // Set variavel transaksi banten pulang = array kosong
                $transaksi_ulam = [];

                // Looping data transaksi banten
                foreach ($tb_transaksi_ulam as $key5 => $value5) {
                    $vendor_ulam = ($value5->tb_ulam->status_vendor == 'vendor') ? 'color-vendor' : '';

                    // Jika qty lebih dari 1
                    if ($value5->qty > 1) {

                        // Deklarasi nama banten pulang dengan qty banten pulang
                        $nama_ulam_qty = "<span class='"  . $vendor_ulam . "'>" . $value5->tb_ulam->nama_ulam . ' (' . $value5->qty . ')' . "</span>";
                    } else {

                        // Deklarasi nama banten pulang tanpa qty banten pulang
                        $nama_ulam_qty = "<span class='"  . $vendor_ulam . "'>" . $value5->tb_ulam->nama_ulam . "</span>";
                    }

                    // Memasukkan nama banten pulang ke dalam array transaksi_ulam
                    $transaksi_ulam[] = $nama_ulam_qty;
                }

                // Jika jumlah data transaksi banten pulang lebih dari 1
                if (count($transaksi_ulam) > 1) {

                    // Mengubah array ke string dan menambahkan koma
                    $nama_ulam = implode(" + ", $transaksi_ulam);

                    // Jika jumlah data transaksi banten pulang kurang dari 1
                } else {

                    // Jika transaksi banten pulang = null atau tidak ada data
                    if ($transaksi_ulam == null) {

                        // Set nama banten pulang = null
                        $nama_ulam = null;

                        // Jika transaksi banten pulang tidak sama dengan null atau ada data
                    } else {

                        // Set nama banten pulang = transaksi_ulam di array ke 0
                        $nama_ulam = $transaksi_ulam[0];
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
                    'nama_banten_pulang' => $nama_banten_pulang,
                    'nama_ulam' => $nama_ulam,
                ];
                // Akhir Array data print halaman 1

                unset($transaksi_upacara); // unset untuk menghapus array , yaitu array transaksi_upacara
                unset($transaksi_banten); // unset untuk menghapus array , yaitu array transaksi_banten
                unset($transaksi_ulam); // unset untuk menghapus array , yaitu array transaksi_banten
                $id_transaksi[] = $value->id; // Memasukkan id transaksi ke dalam array id_transaksi
            }
            // unsort untuk mensortir berdasarkan waktu upacara sesuai abjad
            usort($data_print, fn ($a, $b) => $a['waktu_upacara'] <=> $b['waktu_upacara']);

            // Array judul pada halaman print
            $data = [
                'hari_bali' => strtoupper(array_unique($hari_bali)[0]),
                'tanggal_upacara' => strtoupper(Carbon::parse(array_unique($tanggal_upacara)[0])->translatedFormat('d F Y')),
                'title_tanggal_upacara' => Carbon::parse(array_unique($tanggal_upacara)[0])->translatedFormat('d/m/Y'),
                'detail_waktu' => $detail_waktu
            ];
            // Akhir Array judul pada halaman print

            // ===================================================================  PRINT HALAMAN 2 ==================================================================  //

            // Mencari data transaksi upacara berdasarkan id transaksi
            $cek_tb_transaksi_upacara = TbTransaksiUpacara::with('tb_upacara', 'tb_transaksi')->whereIn('id_transaksi', $id_transaksi)
                ->whereRelation('tb_transaksi', function ($query) {
                    $query->whereNot('status', 2);
                })
                ->get();
            $total_upacara = [];
            // Looping data transaksi upacara untuk mendapatkan nama upacaranya
            foreach ($cek_tb_transaksi_upacara as $key => $value) {
                $total_upacara[] = $value->tb_upacara->nama_upacara; // Menyimpan nama upacara ke dalam array total_upacara
                $status_vendor_upacara[] = $value->tb_upacara->status_vendor;
            }


            // array_count_values untuk mendapatkan jumlah data yang sama, array_unique untuk menghilangkan data yang sama, array_values untuk mereset angka array
            $cek_total_upacara = array_values(array_count_values($total_upacara));
            $cek_nama_upacara = array_values(array_unique($total_upacara));

            if (count($cek_total_upacara) == 0) {
                $cek_data1[] = [
                    'upacara' => '',
                    'total_upacara' => '',
                    'status_vendor' => '',
                ];
            }

            // Looping cek_total_upacara untuk menggabungkan array cek_total_upacara dan cek_nama_upacara dengan sesuai
            foreach ($cek_total_upacara as $key => $value) {

                // Memasukkan datanya ke dalam array cek_data1
                $cek_data1[] = [
                    'upacara' => $cek_nama_upacara[$key],
                    'total_upacara' => $value,
                    'status_vendor' => $status_vendor_upacara[$key],
                ];
            }

            // Looping cek_data1 untuk melakukan pengecekkan qty upacara
            foreach ($cek_data1 as $key => $value) {

                // Mencari data transaksi upacara berdasarkan id transaksi dan nama upacara
                $cek_tb_transaksi_upacara2 = TbTransaksiUpacara::with('tb_upacara', 'tb_transaksi')->whereIn('id_transaksi', $id_transaksi)->whereRelation('tb_upacara', ['nama_upacara' => $value['upacara']])->get();
                $cek_jumlah = [];
                foreach ($cek_tb_transaksi_upacara2 as $key2 => $value2) {
                    if ($value2->qty_upacara > 1) {
                        $cekQty = $value2->qty_upacara;
                    } else {
                        $cekQty = "";
                    }
                    $cek_jumlah[] = $cekQty;
                }

                $jumlah_qty = array_values(array_diff($cek_jumlah, [""]));
                unset($cek_jumlah);

                if ($jumlah_qty != null) {
                    $data_qty = $value2->tb_upacara->nama_upacara . " = " . $value['total_upacara'] . " " . "(" . array_sum($jumlah_qty) . " Orang)";
                    $data_qty_upacara = explode(' = ', $data_qty);
                } else {
                    $data_qty_upacara = [1];
                }

                if ($data_qty_upacara[0] == $value['upacara']) {
                    $totall_upacara =  $data_qty_upacara[1];
                } else {
                    $totall_upacara = $value['total_upacara'];
                }

                // Array data_upacara
                $data_upacara[] = [
                    'upacara' => $value['upacara'],
                    'total_upacara' => $totall_upacara,
                    'status_vendor' => $value['status_vendor']
                ];

                sort($data_upacara); // Mensortir data upacara sesuai abjad 
            }
            // Mencari data transaksi banten sesuai dengan id transaksi dengan banten_pulang = 0
            $tb_transaksi_banten2 = TbTransaksiBanten::with('tb_banten', 'tb_transaksi')->where('banten_pulang', 0)->whereIn('id_transaksi', $id_transaksi)
                ->whereRelation('tb_transaksi', function ($query) {
                    $query->whereNot('status', 2);
                })
                ->get();

            // Jika jumlah transaksi banten = 0
            if ($tb_transaksi_banten2->count() == 0) {

                // Array data banten
                $data_banten[] = [
                    'banten' => "",
                    'qty' => "",
                    'status_vendor' => ""
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
                        'status_vendor' => $value->tb_banten->status_vendor,
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
                        'status_vendor' => ""
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
                                    'status_vendor' => $value['status_vendor']

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
                            'status_vendor' => $value['status_vendor'],
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
            $tb_transaksi_banten_pulang2 = TbTransaksiBanten::with('tb_banten', 'tb_transaksi')->where('banten_pulang', 1)->whereRelation('tb_transaksi', ['tanggal_banten_pulang' => $tanggal])
                ->whereRelation('tb_transaksi', function ($query) {
                    $query->whereNot('status', 2);
                })
                ->get();

            // Jika jumlah transaksi banten pulang = 0
            if ($tb_transaksi_banten_pulang2->count() == 0) {

                // Array data banten pulang
                $data_banten_pulang[] = [
                    'banten_pulang' => "",
                    'qty' => "",
                    'status_vendor' => ""
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
                        'status_vendor' => $value->tb_banten->status_vendor,
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
                        'status_vendor' => ""
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
                                    'status_vendor' => $value['status_vendor']

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
                            'status_vendor' => $value['status_vendor']
                        ];
                        // Akhir Array data banten pulang
                    }
                }
                $data_banten_pulang = array_unique($data_banten_pulang, SORT_REGULAR); // Menghapus data yang duplikat pada array data_banten pulang

                unset($data_banten_pulang[0]); // Menghapus array data_banten_pulang array ke 0 karena array ke 0 itu datanya kosong
                $data_banten_pulang = array_values($data_banten_pulang); // Mereset angka array data_banten_pulang
                sort($data_banten_pulang); // Sortir array data_banten_pulang sesuai abjad
            }

            $tb_transaksi_ulam2 = TbTransaksiUlam::with('tb_ulam', 'tb_transaksi')->whereIn('id_transaksi', $id_transaksi)
                ->whereRelation('tb_transaksi', function ($query) {
                    $query->whereNot('status', 2);
                })
                ->get();

            // Jika jumlah transaksi banten pulang = 0
            if ($tb_transaksi_ulam2->count() == 0) {

                // Array data banten pulang
                $data_ulam[] = [
                    'nama_ulam' => "",
                    'qty' => "",
                    'status_vendor' => ""
                ];
                // Akhir Array data banten pulang

                // Jika jumlah transaksi banten pulang tidak sama dengan 0
            } else {

                // Looping data transaksi banten pulang
                foreach ($tb_transaksi_ulam2 as $key => $value) {

                    // Array cek data banten pulang
                    $cek_data_ulam[] = [
                        'nama_ulam' => $value->tb_ulam->nama_ulam,
                        'qty' => $value->qty,
                        'status_vendor' => $value->tb_ulam->status_vendor
                    ];
                    // Akhir Array cek data banten pulang
                }

                // Looping data cek data banten pulang
                foreach ($cek_data_ulam as $key => $value) {
                    $qtyUlam[] = ""; //Set qtyBanten = kosong

                    // Array data banten pulang
                    $data_ulam[] = [
                        'nama_ulam' => "",
                        'qty' => "",
                        'status_vendor' => ""
                    ];
                    // Akhir Array data banten pulang


                    // in_array untuk pengecekkan menggunakan array
                    // Jika banten pulang ada yang sama pada array qtyUlam
                    if (in_array($value['nama_ulam'], $qtyUlam) == true) {
                        $qtyUlam[] = $value['nama_ulam']; // Memasukkan nama banten ke dalam variabel qtyBanten

                        // Looping data banten pulang
                        foreach ($data_ulam as $key2 => $value2) {

                            // Jika data nama banten pulang sama
                            if ($value2['nama_ulam'] == $value['nama_ulam']) {

                                // Array data banten pulang
                                $data_ulam[] = [
                                    'nama_ulam' => $value['nama_ulam'],
                                    'qty' => $value2['qty'] + $value['qty'],
                                    'status_vendor' => $value['status_vendor']
                                ];
                                // Akhir Array data banten pulang

                                // Menghapus array banten pulang yang sama pertama
                                unset($data_ulam[$key2]);
                            }
                        }

                        // Jika tidak ada banten yang sama pada array qtyUlam
                    } else {
                        $qtyUlam[] = $value['nama_ulam']; // Memasukkan nama banten ke dalam variabel qtyUlam

                        // Array data banten pulang
                        $data_ulam[] = [
                            'nama_ulam' => $value['nama_ulam'],
                            'qty' => $value['qty'],
                            'status_vendor' => $value['status_vendor']
                        ];
                        // Akhir Array data banten pulang
                    }
                }
                $data_ulam = array_unique($data_ulam, SORT_REGULAR); // Menghapus data yang duplikat pada array data_banten pulang

                unset($data_ulam[0]); // Menghapus array data_ulam array ke 0 karena array ke 0 itu datanya kosong
                $data_ulam = array_values($data_ulam); // Mereset angka array data_ulam
                sort($data_ulam); // Sortir array data_ulam sesuai abjad
            }
            // Array waktu saat print
            $waktuPrint = [
                'tanggal' => Carbon::now()->translatedFormat('d/m/Y'),
                'waktu' => Carbon::now()->toTimeString()
            ];
            // Akhir Array waktu saat print

            // dibawa ke dalam folder admin/transaksi/index-print/indexPrintJadwalHarian.blade.php dan membawa variabel $data, $data_print, $data_upacara, $data_banten, $data_banten_pulang, dan $waktuPrint
            return view('admin.transaksi.index-print.indexPrintJadwalHarian',  compact('data', 'data_print', 'data_upacara', 'data_banten', 'data_banten_pulang', 'data_ulam', 'waktuPrint'));

            // Jika hasil decrypt dari $cek_data hasilnya tidak sama dengan print         
        } else {
            return redirect(route('index-transaksi'));
        }
    }


    // ======================================================== DATA PEMESANAN ======================================================

    public function indexPemesanan()
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
        $hari =  TbTransaksi::where('tanggal_upacara', Carbon::now()->toDateString())->get();
        for ($i = 0; $i < 7; $i++) {
            $tanggal[] = Carbon::now()->addDays($i)->toDateString();
        }
        if ($hari->count() == 0) {
            $title = "Data Pemesanan";
        } else {
            $title = "Data Pemesanan " . $hari[0]->sapta_wara . " " . $hari[0]->panca_wara . " " . $hari[0]->wuku . ", " . Carbon::now()->translatedFormat('d F Y');
        }
        // Array Data
        $data = [
            'title' => $title, //ARRAY TITTLE BERFUNGSI UNTUK MEMBAWA TEKS TTILE 
            'tanggal_minggu_awal' => $tanggal[0],
            'tanggal_minggu_akhir' => $tanggal[6],
            'tb_jenis_upacara' => TbJenisUpacara::get(), // Array tb_jenis_upacara untuk mengambil data dari tabel TbJenisUpacara
            // Array count_data untuk mengetahui jumlah data pada tabel Transaksi berdasarkan tanggal dan waktu
            'count_data' => TbTransaksi::where('tanggal_upacara', Carbon::now()->toDateString())->whereBetween('waktu_upacara', [$waktu_awal, $waktu_akhir])->get()->count()
        ];

        // DIBAWA KE DALAM FOLDER ADMIN/TRANSAKSI/DATA-PEMESANAN/INDEX.BLADE.PHP dan membawa variabel $data
        return view('admin.transaksi.data-pemesanan.index', compact('data'));
    }

    public function showDetailPemesanan($id)
    {
        // data transaksi berdasarkan id yang di bawa
        // $data = TbTransaksiBanten::with('tb_transaksi', 'tb_banten')->where(['id_transaksi' => $id])->get();
        $data = [
            'tb_transaksi' => TbTransaksi::find($id),
            'tb_upacara' => TbTransaksiUpacara::with('tb_upacara', 'tb_upacara.tb_jenis_upacara')->where('id_transaksi', $id)->get(),
            'tb_banten' => TbTransaksiBanten::with('tb_banten')->where('id_transaksi', $id)->get(),
            'tb_ulam' => TbTransaksiUlam::with('tb_ulam')->where('id_transaksi', $id)->get(),
        ];
        // dd($data['tb_upacara']);
        // dibawa ke dalam folder admin/transaksi/data-pemesanan/tabel/tabelDetail.blade.php dan membawa variabel $data
        return view('admin.transaksi.data-pemesanan.tabel.tabelDetail', compact('data'));
    }

    // Data Tabel Pemesanan
    public function tabelPemesanan()
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
        // $data = TbTransaksiUpacara::with('tb_transaksi', 'tb_upacara', 'tb_upacara.tb_jenis_upacara')
        //     ->whereRelation('tb_transaksi', ['tanggal_upacara' => $tanggal])
        //     ->whereRelation('tb_transaksi', function ($query) use ($waktu_awal, $waktu_akhir) {
        //         $query->whereNot('status', 2)->whereBetween('waktu_upacara', [$waktu_awal, $waktu_akhir]);
        //     })->OrderByDesc('id')->get();

        $data = TbTransaksi::whereNot('status', 2)->where('tanggal_upacara', $tanggal)->orderBy('waktu_upacara', 'ASC')->get();
        // Nomor urutan tabel
        $nomor = 1;

        // dibawa ke dalam folder admin/transaksi/data-pemesanan/tabel/tabelPemesanan.blade.php dan membawa variabel $data dan $nomor
        return view('admin.transaksi.data-pemesanan.tabel.tabelPemesanan', compact('data', 'nomor'));
    }

    // Fungsi Filter pada Pemesanan
    public function filter(Request $request)
    {
        // Data yang ditanggkap melalui route
        $tanggal_awal = $request->tanggal_awal; // Deklarasi tanggal awal yang di tanggap melalui request dari input dengan name tanggal_awal
        $tanggal_akhir = $request->tanggal_akhir; // Deklarasi tanggal akhir yang di tanggap melalui request dari input dengan name tanggal_akhir
        $jenis_upacara = $request->jenis_upacara; // Deklarasi jenis upacara yang di tanggap melalui request dari input dengan name jenis upacara
        $kategori = $request->kategori; // Deklarasi kategori yang di tanggap melalui request dari input dengan name kategori
        $status = $request->status; // Deklarasi status yang di tanggap melalui request dari input dengan name status
        $jenis_tanggal = $request->jenis_tanggal;
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

            // $data = TbTransaksiUpacara::with('tb_transaksi', 'tb_upacara', 'tb_upacara.tb_jenis_upacara')
            //     ->whereRelation('tb_transaksi', function ($query) use ($id_transaksi) {
            //         $query->whereIn('id', $id_transaksi);
            //     })->get();
            $data = TbTransaksi::whereNot('status', 2)->whereIn('id', $id_transaksi)->get();

            // JIKA HANYA MEMILIH TANGGAL UPACARA
        } elseif ($jenis_upacara == "" && $kategori == "" && $status == "" && $tanggal_awal != "" && $tanggal_akhir != "") {

            // $data = TbTransaksiUpacara::with('tb_transaksi', 'tb_upacara', 'tb_upacara.tb_jenis_upacara')
            //     ->whereRelation('tb_transaksi', function ($query) use ($tanggal_awal, $tanggal_akhir) {
            //         $query->whereBetween('tanggal_upacara', [$tanggal_awal, $tanggal_akhir]);
            //     })->get();
            $data = TbTransaksi::whereNot('status', 2)->whereBetween($jenis_tanggal, [$tanggal_awal, $tanggal_akhir])->get();

            // JIKA HANYA MEMILIH KATEGORI
        } elseif ($tanggal_awal == "" && $tanggal_akhir == "" && $jenis_upacara == ""  && $status == "" && $kategori != "") {

            // $data = TbTransaksiUpacara::with('tb_transaksi', 'tb_upacara', 'tb_upacara.tb_jenis_upacara')
            //     ->whereRelation('tb_transaksi', ['kategori' => $kategori])->get();
            $data = TbTransaksi::whereNot('status', 2)->where('kategori', $kategori)->get();

            // JIKA HANYA MEMILIH STATUS
        } elseif ($tanggal_awal == "" && $tanggal_akhir == "" && $jenis_upacara == "" && $kategori == "" && $status != "") {

            // $data = TbTransaksiUpacara::with('tb_transaksi', 'tb_upacara', 'tb_upacara.tb_jenis_upacara')
            //     ->whereRelation('tb_transaksi', ['status' => $status])->get();
            $data = TbTransaksi::whereNot('status', 2)->where('status', $status)->get();

            // JIKA MEMILIH TANGGAL DAN JENIS UPACARA
        } elseif ($kategori == "" && $status == "" && $tanggal_awal != "" && $tanggal_akhir != "" && $jenis_upacara != "") {

            // $data = TbTransaksiUpacara::with('tb_transaksi', 'tb_upacara', 'tb_upacara.tb_jenis_upacara')
            //     ->whereRelation('tb_transaksi', function ($query) use ($tanggal_awal, $tanggal_akhir, $id_transaksi) {
            //         $query->whereBetween($jenis_tanggal, [$tanggal_awal, $tanggal_akhir])->whereIn('id', $id_transaksi);
            //     })->get();
            $data = TbTransaksi::whereNot('status', 2)->whereBetween($jenis_tanggal, [$tanggal_awal, $tanggal_akhir])->whereIn('id', $id_transaksi)->get();

            // JIKA MEMILIH TANGGAL DAN KATEGORI
        } elseif ($status == "" && $jenis_upacara == "" && $tanggal_awal != "" && $tanggal_akhir != ""  && $kategori != "") {

            // $data = TbTransaksiUpacara::with('tb_transaksi', 'tb_upacara', 'tb_upacara.tb_jenis_upacara')
            //     ->whereRelation('tb_transaksi', function ($query) use ($tanggal_awal, $tanggal_akhir) {
            //         $query->whereBetween($jenis_tanggal, [$tanggal_awal, $tanggal_akhir]);
            //     })->whereRelation('tb_transaksi', ['kategori' => $kategori])->get();
            $data = TbTransaksi::whereNot('status', 2)->whereBetween($jenis_tanggal, [$tanggal_awal, $tanggal_akhir])->where('kategori', $kategori)->get();

            // JIKA MEMILIH TANGGAL DAN STATUS
        } elseif ($kategori == "" && $jenis_upacara == "" && $tanggal_awal != "" && $tanggal_akhir != ""  && $status != "") {

            // $data = TbTransaksiUpacara::with('tb_transaksi', 'tb_upacara', 'tb_upacara.tb_jenis_upacara')
            //     ->whereRelation('tb_transaksi', function ($query) use ($tanggal_awal, $tanggal_akhir) {
            //         $query->whereBetween($jenis_tanggal, [$tanggal_awal, $tanggal_akhir]);
            //     })->whereRelation('tb_transaksi', ['status' => $status])->get();
            $data = TbTransaksi::whereNot('status', 2)->whereBetween($jenis_tanggal, [$tanggal_awal, $tanggal_akhir])->where('status', $status)->get();

            // JIKA MEMILIH JENIS UPACARA DAN KATEGORI
        } elseif ($tanggal_awal == "" && $tanggal_akhir == ""  && $status == "" && $kategori != "" && $jenis_upacara != "") {
            $data = TbTransaksiUpacara::with('tb_transaksi', 'tb_upacara', 'tb_upacara.tb_jenis_upacara')
                ->whereRelation('tb_transaksi', function ($query) use ($id_transaksi) {
                    $query->whereIn('id', $id_transaksi);
                })->whereRelation('tb_transaksi', ['kategori' => $kategori])->get();
            $data = TbTransaksi::whereNot('status', 2)->whereIn('id', $id_transaksi)->where('kategori', $kategori)->get();

            // JIKA MEMILIH JENIS UPACARA DAN STATUS
        } elseif ($tanggal_awal == "" && $tanggal_akhir == ""  && $kategori == "" && $status != "" &&  $jenis_upacara != "") {
            // $data = TbTransaksiUpacara::with('tb_transaksi', 'tb_upacara', 'tb_upacara.tb_jenis_upacara')
            //     ->whereRelation('tb_transaksi', function ($query) use ($id_transaksi) {
            //         $query->whereIn('id', $id_transaksi);
            //     })->whereRelation('tb_transaksi', ['status' => $status])->get();
            $data = TbTransaksi::whereNot('status', 2)->whereIn('id', $id_transaksi)->where('status', $status)->get();

            // JIKA MEMILIH KATEGORI DAN STATUS
        } elseif ($tanggal_awal == "" && $tanggal_akhir == "" &&  $jenis_upacara == "" && $kategori != "" && $status != "") {
            // $data = TbTransaksiUpacara::with('tb_transaksi', 'tb_upacara', 'tb_upacara.tb_jenis_upacara')
            //     ->whereRelation('tb_transaksi', ['kategori' => $kategori])->whereRelation('tb_transaksi', ['status' => $status])->get();
            $data = TbTransaksi::whereNot('status', 2)->where([['status', '=', $status], ['kategori', '=', $kategori]])->get();

            // JIKA MEMILIH TANGGAL , JENIS DAN KATEGORI
        } elseif ($tanggal_awal != "" && $tanggal_akhir != "" && $jenis_upacara != "" && $kategori != "" && $status == "") {
            // $data = TbTransaksiUpacara::with('tb_transaksi', 'tb_upacara', 'tb_upacara.tb_jenis_upacara')
            //     ->whereRelation('tb_transaksi', function ($query) use ($tanggal_awal, $tanggal_akhir, $id_transaksi) {
            //         $query->whereBetween($jenis_tanggal, [$tanggal_awal, $tanggal_akhir])->whereIn('id', $id_transaksi);
            //     })->whereRelation('tb_transaksi', ['kategori' => $kategori])->get();
            $data = TbTransaksi::whereNot('status', 2)->whereBetween($jenis_tanggal, [$tanggal_awal, $tanggal_akhir])->whereIn('id', $id_transaksi)->where('kategori', $kategori)->get();

            // JIKA MEMILIH JENIS, KATEGORI, DAN STATUS
        } elseif ($tanggal_awal == "" && $tanggal_akhir == "" && $jenis_upacara != "" && $kategori != "" && $status != "") {
            // $data = TbTransaksiUpacara::with('tb_transaksi', 'tb_upacara', 'tb_upacara.tb_jenis_upacara')
            //     ->whereRelation('tb_transaksi', function ($query) use ($tanggal_awal, $tanggal_akhir, $id_transaksi) {
            //         $query->whereIn('id', $id_transaksi);
            //     })->whereRelation('tb_transaksi', ['kategori' => $kategori])->whereRelation('tb_transaksi', ['status' => $status])->get();
            $data = TbTransaksi::whereNot('status', 2)->whereIn('id', $id_transaksi)->where([['status', '=', $status], ['kategori', '=', $kategori]])->get();

            // JIKA MEMILIH TANGGAL, JENIS DAN STATUS
        } elseif ($tanggal_awal != "" && $tanggal_akhir != "" && $jenis_upacara != "" && $kategori == "" && $status != "") {
            // $data = TbTransaksiUpacara::with('tb_transaksi', 'tb_upacara', 'tb_upacara.tb_jenis_upacara')
            //     ->whereRelation('tb_transaksi', function ($query) use ($tanggal_awal, $tanggal_akhir, $id_transaksi) {
            //         $query->whereBetween($jenis_tanggal, [$tanggal_awal, $tanggal_akhir])->whereIn('id', $id_transaksi);
            //     })->whereRelation('tb_transaksi', ['status' => $status])->get();
            $data = TbTransaksi::whereNot('status', 2)->whereBetween($jenis_tanggal, [$tanggal_awal, $tanggal_akhir])->whereIn('id', $id_transaksi)->where('status', $status)->get();

            // JIKA MEMILIH TANGGAL, KATEGORI, STATUS
        } elseif ($tanggal_awal != "" && $tanggal_akhir != "" && $jenis_upacara == "" && $kategori != "" && $status != "") {
            // $data = TbTransaksiUpacara::with('tb_transaksi', 'tb_upacara', 'tb_upacara.tb_jenis_upacara')
            //     ->whereRelation('tb_transaksi', function ($query) use ($tanggal_awal, $tanggal_akhir, $id_transaksi) {
            //         $query->whereBetween($jenis_tanggal, [$tanggal_awal, $tanggal_akhir]);
            //     })->whereRelation('tb_transaksi', ['kategori' => $kategori])->whereRelation('tb_transaksi', ['status' => $status])->get();
            $data = TbTransaksi::whereNot('status', 2)->whereBetween($jenis_tanggal, [$tanggal_awal, $tanggal_akhir])->where([['status', '=', $status], ['kategori', '=', $kategori]])->get();

            // JIKA MEMILIH SEMUA
        } elseif ($tanggal_awal != "" && $tanggal_akhir != "" && $jenis_upacara != "" && $kategori != "" && $status != "") {

            // $data = TbTransaksiUpacara::with('tb_transaksi', 'tb_upacara', 'tb_upacara.tb_jenis_upacara')
            //     ->whereRelation('tb_transaksi', function ($query) use ($tanggal_awal, $tanggal_akhir, $id_transaksi) {
            //         $query->whereBetween($jenis_tanggal, [$tanggal_awal, $tanggal_akhir])->whereIn('id', $id_transaksi);
            //     })->whereRelation('tb_transaksi', ['kategori' => $kategori])->whereRelation('tb_transaksi', ['status' => $status])->get();
            $data = TbTransaksi::whereNot('status', 2)->whereBetween($jenis_tanggal, [$tanggal_awal, $tanggal_akhir])->whereIn('id', $id_transaksi)->where([['status', '=', $status], ['kategori', '=', $kategori]])->get();
        }

        if ($tanggal_awal == "") {
            $tanggal_heading = " ";
        } else {
            if ($jenis_tanggal == "tanggal_upacara") {
                $teks = "Tanggal Upacara ";
            } elseif ($jenis_tanggal == "tanggal_banten_pulang") {
                $teks = "Tanggal Ambil Banten ";
            }
            $tanggal_heading = " " . $teks . Carbon::parse($tanggal_awal)->translatedFormat('d F Y') . " - " . Carbon::parse($tanggal_akhir)->translatedFormat('d F Y');
        }

        if ($jenis_upacara != "") {
            $tb_jenis_upacara_filter = TbJenisUpacara::find($jenis_upacara);
            $jenis_upacara_heading = $tb_jenis_upacara_filter->nama_jenis_upacara . ", ";
        } else {
            $jenis_upacara_heading = "";
        }

        if ($kategori != "") {
            $kategori_heading = $kategori . ", ";
        } else {
            $kategori_heading = "";
        }

        if ($status != "") {
            if ($status == 1) {
                $status_heading =  "Belum Lunas";
            } elseif ($status == 2) {
                $status_heading = "Cancel";
            } elseif ($status == 0) {
                $status_heading = "Lunas";
            }
        } else {
            $status_heading = "";
        }

        $gabung_isi_kolom = [$jenis_upacara_heading, $kategori_heading, $status_heading];
        $cek_kolom = array_values(array_diff($gabung_isi_kolom, [""]));
        if (count($cek_kolom) == 1) {
            $jenis_filter = str_replace(", ", "", $cek_kolom[0]);
        } else if (count($cek_kolom) == 2) {
            $jenis_filter = $cek_kolom[0] . str_replace(", ", "", $cek_kolom[1]);
        } elseif (count($cek_kolom) == 3) {
            $jenis_filter = $jenis_upacara_heading . $kategori_heading . $status_heading;
        }

        if (count($cek_kolom) > 0) {
            $jenis_filter = " (" . $jenis_filter . ")";
        } else {
            $jenis_filter = "";
        }

        $heading_custom = "Daftar Pemesanan Filter" . $tanggal_heading . $jenis_filter;
        // dibawa ke dalam folder admin/transaksi/data-pemesanan/tabel/tabelFilter.blade.php dan membawa variabel $data dan $tanggal
        return view('admin.transaksi.data-pemesanan.tabel.tabelFilter', compact('data', 'heading_custom'));
    }

    public function ganti_status($status)
    {
        if ($status == "tambah" || $status == "banten") {
            foreach (TbBanten::where('status', 2)->get() as $key => $value) {
                TbBanten::find($value->id)->update(['status' => 1]);
            }
        }

        if ($status == "tambah" || $status == "ulam") {

            foreach (TbUlam::where('status', 2)->get() as $key => $value) {
                TbUlam::find($value->id)->update(['status' => 1]);
            }
        }
        return response()->json();
    }
}
