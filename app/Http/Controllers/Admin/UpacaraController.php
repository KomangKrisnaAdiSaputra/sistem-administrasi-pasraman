<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TbBanten;
use App\Models\TbJenisUpacara;
use App\Models\TbUlam;
use App\Models\TbUpacara;
use Illuminate\Http\Request;

class UpacaraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => "Data Upacara",
            'tb_jenis_upacara' => TbJenisUpacara::where('status', 1)->OrderByDesc('id')->get(),
            'tb_upacara' => TbUpacara::where('status', 1)->OrderByDesc('id')->get(),
            'tb_banten' => TbBanten::where('status', 1)->OrderByDesc('id')->get()
        ];
        return view('admin.upacara.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = TbJenisUpacara::where('status', 1)->get();
        return view('admin.upacara.tambah-dan-edit.tambahData', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->cek_tambah == 'upacara') {
            $tb_jenis_upacara = TbJenisUpacara::where('nama_jenis_upacara', $request->nama_jenis_upacara)->first();
            if ($tb_jenis_upacara == null) {
                $tb_jenis_upacara_baru = TbJenisUpacara::create([
                    'id_user' => auth()->user()->id,
                    'nama_jenis_upacara' => $request->nama_jenis_upacara,
                    'status' => 1
                ]);

                TbUpacara::create([
                    'id_jenis_upacara' => $tb_jenis_upacara_baru->id,
                    'id_user' => auth()->user()->id,
                    'nama_upacara' => $request->nama_upacara,
                    'status' => 1,
                    'status_vendor' => $request->status_vendor
                ]);
            } else {

                TbUpacara::create([
                    'id_jenis_upacara' => $tb_jenis_upacara->id,
                    'id_user' => auth()->user()->id,
                    'nama_upacara' => $request->nama_upacara,
                    'status' => 1,
                    'status_vendor' => $request->status_vendor
                ]);
            }
        } elseif ($request->cek_tambah == 'banten') {

            TbBanten::create([
                'id_user' => auth()->user()->id,
                'nama_banten' => $request->nama_banten,
                'status' => 1,
                'status_vendor' => $request->status_vendor
            ]);
        } elseif ($request->cek_tambah == 'ulam') {
            TbUlam::create([
                'id_user' => auth()->user()->id,
                'nama_ulam' => $request->nama_ulam,
                'status' => 1,
                'status_vendor' => $request->status_vendor
            ]);
        }

        return redirect(route('upacara.index'));
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
        $cek = explode(":", $id);

        if ($cek[1] == "jenis_upacara") {
            $tb_jenis_upacara = TbJenisUpacara::find($cek[0]);

            $data = [
                'label' => "Jenis Upacara",
                'value' => $tb_jenis_upacara->nama_jenis_upacara,
                'id' => $tb_jenis_upacara->id
            ];
        } elseif ($cek[1] == "upacara") {
            $tb_upacara = TbUpacara::find($cek[0]);

            $data = [
                'label' => "Upacara",
                'value' => $tb_upacara->nama_upacara,
                'id' => $tb_upacara->id,
                'status_vendor' => $tb_upacara->status_vendor
            ];
        } elseif ($cek[1] == "banten") {
            $tb_banten = TbBanten::find($cek[0]);

            $data = [
                'label' => "Banten",
                'value' => $tb_banten->nama_banten,
                'id' => $tb_banten->id,
                'status_vendor' => $tb_banten->status_vendor
            ];
        } elseif ($cek[1] == "ulam") {
            $tb_ulam = TbUlam::find($cek[0]);

            $data = [
                'label' => "Ulam",
                'value' => $tb_ulam->nama_ulam,
                'id' => $tb_ulam->id,
                'status_vendor' => $tb_ulam->status_vendor
            ];
        }
        // dd($id);
        return view('admin.upacara.tambah-dan-edit.editData', compact('data'));
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
        $status = $request->cek_edit;
        if ($status == 'Jenis Upacara') {

            TbJenisUpacara::find($id)->update(['nama_jenis_upacara' => $request->nama]);
            $tb_aktif = TbJenisUpacara::find($id);
        } elseif ($status == 'Upacara') {

            TbUpacara::find($id)->update(['nama_upacara' => $request->nama, 'status_vendor' => $request->status_vendor]);
            $tb_aktif = TbUpacara::find($id);
        } elseif ($status == 'Banten') {

            TbBanten::find($id)->update(['nama_banten' => $request->nama, 'status_vendor' => $request->status_vendor]);
            $tb_aktif = TbBanten::find($id);
        } elseif ($status == 'Ulam') {

            TbUlam::find($id)->update(['nama_ulam' => $request->nama, 'status_vendor' => $request->status_vendor]);
            $tb_aktif = TbUlam::find($id);
        }

        $data = [
            'aktif/tidak' => $tb_aktif->status,
            'status' => $status
        ];

        return response()->json($data);
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

    public function status($id, $status)
    {
        if ($status == "jenis_upacara") {

            $tb_jenis_upacara = TbJenisUpacara::find($id);
            $tb_aktif = $tb_jenis_upacara->status;

            if ($tb_jenis_upacara->status == 1) {

                $tb_jenis_upacara->update(['status' => 0]);

                $tb_Upacara = TbUpacara::where('id_jenis_upacara', $tb_jenis_upacara->id)->get();
                foreach ($tb_Upacara as $key => $value) {
                    TbUpacara::find($value->id)->update(['status' => 0]);
                }
            } elseif ($tb_jenis_upacara->status == 0) {

                $tb_jenis_upacara->update(['status' => 1]);

                $tb_Upacara = TbUpacara::where('id_jenis_upacara', $tb_jenis_upacara->id)->get();
                foreach ($tb_Upacara as $key => $value) {
                    TbUpacara::find($value->id)->update(['status' => 1]);
                }
            }
        } elseif ($status == "upacara") {

            $tb_upacara = TbUpacara::find($id);
            $tb_aktif = $tb_upacara->status;

            if ($tb_upacara->status == 1) {

                $tb_upacara->update(['status' => 0]);
            } elseif ($tb_upacara->status == 0) {

                $tb_upacara->update(['status' => 1]);
            }
        } elseif ($status == "banten") {

            $tb_banten = TbBanten::find($id);
            $tb_aktif = $tb_banten->status;

            if ($tb_banten->status == 1) {

                $tb_banten->update(['status' => 0]);
            } elseif ($tb_banten->status == 0) {

                $tb_banten->update(['status' => 1]);
            }
        } elseif ($status == "ulam") {
            $tb_ulam = TbUlam::find($id);
            $tb_aktif = $tb_ulam->status;

            if ($tb_ulam->status == 1) {

                $tb_ulam->update(['status' => 0]);
            } elseif ($tb_ulam->status == 0) {

                $tb_ulam->update(['status' => 1]);
            }
        }

        $data = [
            'aktif/tidak' => $tb_aktif,
            'status' => $status
        ];


        return response()->json($data);
    }

    public function dataJenisUpacara()
    {
        $data = TbJenisUpacara::where('status', 1)->orderBy('id', 'desc')->orderBy('updated_at', 'desc')->get();


        return view('admin.upacara.tabel.dataJenisUpacara', compact('data'));
    }

    public function dataUpacara()
    {
        $data = TbUpacara::with('tb_jenis_upacara')->where('status', 1)->orderBy('id', 'desc')->orderBy('updated_at', 'desc')->get();
        $nomor = 1;
        return view('admin.upacara.tabel.dataUpacara', compact('data', 'nomor'));
    }

    public function dataBanten()
    {
        $data = TbBanten::where('status', 1)->orderBy('id', 'desc')->orderBy('updated_at', 'desc')->get();

        return view('admin.upacara.tabel.dataBanten', compact('data'));
    }

    public function dataUlam()
    {
        $data = TbUlam::where('status', 1)->orderBy('id', 'desc')->orderBy('updated_at', 'desc')->get();

        return view('admin.upacara.tabel.dataUlam', compact('data'));
    }

    public function dataJenisUpacaraTidakAktif()
    {
        $data = TbJenisUpacara::where('status', 0)->OrderBy('updated_at', 'DESC')->get();


        return view('admin.upacara.tabel.dataJenisUpacara', compact('data'));
    }

    public function dataUpacaraTidakAktif()
    {
        $data = TbUpacara::with('tb_jenis_upacara')->where('status', 0)->OrderBy('updated_at', 'DESC')->get();
        $nomor = 1;
        return view('admin.upacara.tabel.dataUpacara', compact('data', 'nomor'));
    }

    public function dataBantenTidakAktif()
    {
        $data = TbBanten::where('status', 0)->OrderBy('updated_at', 'DESC')->get();

        return view('admin.upacara.tabel.dataBanten', compact('data'));
    }

    public function dataUlamTidakAktif()
    {
        $data = TbUlam::where('status', 0)->OrderBy('updated_at', 'DESC')->get();

        return view('admin.upacara.tabel.dataUlam', compact('data'));
    }

    // public function dataUpacaraTidakAktif()
    // {
    //     $data = [
    //         'tb_jenis_upacara' => TbJenisUpacara::where('status', 0)->OrderByDesc('id')->get(),
    //         'tb_upacara' => TbUpacara::where('status', 0)->OrderByDesc('id')->get(),
    //         'tb_banten' => TbBanten::where('status', 0)->OrderByDesc('id')->get()
    //     ];

    //     return view('admin.upacara.tabel.tabelUpacara', compact('data'));
    // }
}
