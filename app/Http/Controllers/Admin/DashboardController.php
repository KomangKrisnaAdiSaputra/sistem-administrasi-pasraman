<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TbTransaksi;
use App\Models\TbTransaksiBanten;
use App\Models\TbTransaksiUpacara;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $waktu = Carbon::now()->toTimeString();
        if ($waktu < '12:00:00') {
            $waktu_awal = "00:00:00";
            $waktu_akhir = "11:59:00";
        } else {
            $waktu_awal = "12:00:00";
            $waktu_akhir = "23:59:00";
        }

        for ($i = 0; $i < 7; $i++) {
            $tanggal[] = Carbon::now()->addDays($i)->toDateString();
        }

        $data = [
            'title' => "Dashboard",
            'tanggal_minggu_awal' => $tanggal[0],
            'tanggal_minggu_akhir' => $tanggal[6],
            'transaksi_belum_lunas' => TbTransaksi::where('status', 1)->whereBetween('tanggal_upacara', [$tanggal[0], $tanggal[6]])->get()->count(),
            'total_transaksi' => TbTransaksi::whereNot('status', 2)->whereBetween('tanggal_upacara', [$tanggal[0], $tanggal[6]])->get()->count(),
            'total_pelanggan' => TbTransaksi::whereNot('status', 2)->whereBetween('tanggal_banten_pulang', [$tanggal[0], $tanggal[6]])->get()->count(),
            'total_privat' => TbTransaksi::whereNot('status', 2)->where('kategori', "privat")->whereBetween('tanggal_upacara', [$tanggal[0], $tanggal[6]])->get()->count(),
        ];

        return view('admin.dashboard.index', compact('data'));
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
        //
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

    public function chartTransaksi()
    {
        // Data Privat Umum        
        for ($i = 0; $i < 7; $i++) {
            $tanggal[] = Carbon::now()->addDays($i)->toDateString();
        }

        foreach ($tanggal as $key => $value) {
            $transaksi_privat = TbTransaksi::whereNot('status', 2)->where([['kategori', '=', 'privat'], ['tanggal_upacara', '=', $value]])->get()->count();
            $transaksi_umum = TbTransaksi::whereNot('status', 2)->where([['kategori', '=', 'umum'], ['tanggal_upacara', '=', $value]])->get()->count();
            $jumlah_transaksi_privat[] =  $transaksi_privat;
            $jumlah_transaksi_umum[] =  $transaksi_umum;
            $hari[] = Carbon::parse($value)->isoFormat('dddd');
        }
        // Akhir Privat Umum

        // Transaksi Pagi Sore
        // $waktu_awal_pagi = "00:00:00";
        // $waktu_akhir_pagi = "11:59:00";

        // $waktu_awal_sore = "12:00:00";
        // $waktu_akhir_sore = "23:59:00";
        // $transaksi_pagi = TbTransaksi::whereNot('status', 2)->where('tanggal_upacara', Carbon::now()->toDateString())->whereBetween('waktu_upacara', [$waktu_awal_pagi, $waktu_akhir_pagi])->get()->count();
        // $transaksi_sore = TbTransaksi::whereNot('status', 2)->where('tanggal_upacara', Carbon::now()->toDateString())->whereBetween('waktu_upacara', [$waktu_awal_sore, $waktu_akhir_sore])->get()->count();
        // Akhir Trnsaksi Pagi Sore

        // Transaksi Terbanyak minggu ini
        $transaksi_upacara = TbTransaksiUpacara::with('tb_transaksi', 'tb_upacara')
            ->whereRelation('tb_transaksi', function ($query) use ($tanggal) {
                $query->whereNot('status', 2)->whereBetween('tanggal_upacara', [$tanggal[0], $tanggal[6]]);
            })->get();

        if ($transaksi_upacara->count() > 0) {

            foreach ($transaksi_upacara as $key => $value) {
                $cek_data[] =  [
                    'upacara' => $value->tb_upacara->nama_upacara,
                    'qty' => $value->qty_upacara
                ];
            }


            foreach ($cek_data as $key => $value) {
                $qtyUpacara[] = ""; //Set qtyUpacara = kosong

                // Array data banten
                $data_upacara[] = [
                    'qty' => "",
                    'upacara' => "",
                ];
                // Akhir Array data banten

                // in_array untuk pengecekkan menggunakan array
                // Jika banten ada yang sama pada array qtyUpacara
                if (in_array($value['upacara'], $qtyUpacara) == true) {
                    $qtyUpacara[] = $value['upacara']; // Memasukkan nama banten ke dalam variabel qtyUpacara

                    // Looping data banten
                    foreach ($data_upacara as $key2 => $value2) {

                        // Jika data nama banten sama
                        if ($value2['upacara'] == $value['upacara']) {

                            // Array data banten
                            $data_upacara[] = [
                                'qty' => $value2['qty'] + $value['qty'],
                                'upacara' => $value['upacara'],
                            ];
                            // Akhir Array data banten

                            // Menghapus array banten yang sama pertama
                            unset($data_upacara[$key2]);
                        }
                    }

                    // Jika tidak ada banten yang sama pada array qtyUpacara
                } else {
                    $qtyUpacara[] = $value['upacara']; // Memasukkan nama banten ke dalam variabel qtyUpacara

                    // Array data banten
                    $data_upacara[] = [
                        'qty' => $value['qty'],
                        'upacara' => $value['upacara'],

                    ];
                    // Akhir Array data banten
                }
            }
            $data_upacara = array_unique($data_upacara, SORT_REGULAR); // Menghapus data yang duplikat pada array data_upacara

            unset($data_upacara[0]); // Menghapus array data_upacara array ke 0 karena array ke 0 itu datanya kosong
            $data_upacara = array_values($data_upacara); // Mereset angka array data_upacara
            rsort($data_upacara); // Sortir array data_upacara sesuai qty terbanyak

            if (count($data_upacara) > 5) {
                // ambil hanya 5 teratas
                for ($i = 0; $i < 5; $i++) {
                    $nama_upacara_terbanyak[] = $data_upacara[$i]['upacara'];
                    $qty_upacara_terbanyak[] = $data_upacara[$i]['qty'];
                }
            } else {
                for ($i = 0; $i < count($data_upacara); $i++) {
                    $nama_upacara_terbanyak[] = $data_upacara[$i]['upacara'];
                    $qty_upacara_terbanyak[] = $data_upacara[$i]['qty'];
                }
            }
        } else {
            $nama_upacara_terbanyak[] = "";
            $qty_upacara_terbanyak[] = "";
        }

        $data_transaksi_tanggal = TbTransaksi::whereNot('status', 2)->get();
        $cek_data_tanggal = [];
        foreach ($data_transaksi_tanggal as $key => $value) {
            $cek_data_tanggal[] = $value->tanggal_upacara;
        }
        $tanggal_upacara = array_values(array_unique($cek_data_tanggal));

        foreach ($tanggal_upacara as $key => $value) {
            // $jumlah_transaksi_per_hari = TbTransaksi::whereNot('status', 2)->where('tanggal_upacara', $value)->get();
            $jumlah_transaksi_per_hari = TbTransaksiUpacara::with('tb_transaksi', 'tb_upacara')
                ->whereRelation('tb_transaksi', function ($query) {
                    $query->whereNot('status', 2);
                })->whereRelation('tb_transaksi', ['tanggal_upacara' => $value])->get();

            $jumlah_upacara = $jumlah_transaksi_per_hari->sum('qty_upacara');
            if ($jumlah_upacara > 10) {
                $kode_warna = '#ff0000';
            } else {
                $kode_warna = '#e7d6c4';
            }

            $data_kalender[] = [
                'title' => "Kelender Upacara",
                'description' => "Total Upacara : " . $jumlah_upacara,
                'start' => $value,
                'color' => $kode_warna,
                'display' => "background",
                'textColor' => 'white'
            ];
        }

        if ($tanggal_upacara == null) {
            $data_kalender[] = [
                'title' => "Kelender Upacara",
                'description' => "Total Upacara : 0",
                'start' => '',
                'color' => '',
                'display' => "background",
                'textColor' => 'white'
            ];
        }

        $chart = [
            'privat' => $jumlah_transaksi_privat,
            'umum' => $jumlah_transaksi_umum,
            'hari' => $hari,
            // 'diagram' => [$transaksi_pagi, $transaksi_sore],
            'nama_upacara_terbanyak' => $nama_upacara_terbanyak,
            'qty_upacara_terbanyak' => $qty_upacara_terbanyak,
            'tanggal_awal' => Carbon::now()->format('d M Y'),
            'tanggal_akhir' => Carbon::now()->addDays(6)->format('d M Y'),
            'data_kalender' => $data_kalender
        ];

        // dd($jumlah_transaksi_privat);

        return response()->json($chart);
    }
}
