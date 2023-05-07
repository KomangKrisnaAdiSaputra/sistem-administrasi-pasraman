<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TbTestimoni;
use Illuminate\Http\Request;

class TestimoniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => "Data Testimoni",

        ];
        return view('admin.testimoni.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimoni.tambah-dan-edit.tambahData');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data_testimoni = array(
            'id_user' => auth()->user()->id,
            'nama_testimoni' => $request->nama_testimoni,
            'keterangan' => $request->keterangan,
            'status' => 1
        );
        TbTestimoni::create($data_testimoni);

        return redirect(route('testimoni.index'));
    }


    public function testimonimasyarakat(Request $request)
    {
        $data_testimoni = array(
            'id_user' => 1,
            'nama_testimoni' => $request->nama_testimoni,
            'keterangan' => $request->keterangan,
            'status' => 2,
        );
        TbTestimoni::create($data_testimoni);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id_testimoni = $id;
        $data = TbTestimoni::find($id);

        return view('admin.testimoni.tambah-dan-edit.editData', compact('data', 'id_testimoni'));
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
        $data_testimoni = array(
            'id_user' => auth()->user()->id,
            'nama_testimoni' => $request->nama_testimoni,
            'keterangan' => $request->keterangan,
            'status' => 1
        );
        TbTestimoni::find($id)->update($data_testimoni);

        return redirect(route('testimoni.index'));
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

    public function tabelTestimoni()
    {
        $data = TbTestimoni::where('status', 1)->orderBy('id','desc')->get();
        return view('admin.testimoni.tabel.tabelTestimoni', compact('data'));
    }

    public function tabelTestimoniTidakAktif()
    {
        $data = TbTestimoni::whereIn('status', [0, 2])->get();
        return view('admin.testimoni.tabel.tabelTestimoniTidakAktif', compact('data'));
    }

    public function status($id)
    {
        $data = TbTestimoni::find($id);

        if ($data->status == 1) {
            $data->update(['status' => 0]);
        } elseif ($data->status == 0 || $data->status == 2) {
            $data->update(['status' => 1]);
        }

        return response()->json();
    }
}
