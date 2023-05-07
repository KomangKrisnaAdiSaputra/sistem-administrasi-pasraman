<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TbFaq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => "Data FAQ",
            'data_faq' => TbFaq::orderByDesc('id')->get()
        ];
        return view('admin.faq.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faq.tambah-dan-edit.tambahData');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pertanyaan = $request->pertanyaan;
        $jawaban = $request->jawaban;

        TbFaq::create([
            'id_user' => auth()->user()->id,
            'pertanyaan' => $pertanyaan,
            'jawaban' => $jawaban,
            'status' => 1,
        ]);
        return redirect(route('faq.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = TbFaq::find($id);

        return view('admin.faq.detail.detail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id_faq = $id;
        $data = TbFaq::find($id);

        return view('admin.faq.tambah-dan-edit.editData', compact('data', 'id_faq'));
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
        $pertanyaan = $request->pertanyaan;
        $jawaban = $request->jawaban;

        TbFaq::find($id)->update([
            'id_user' => auth()->user()->id,
            'pertanyaan' => $pertanyaan,
            'jawaban' => $jawaban,
            'status' => 1,
        ]);
        return redirect(route('faq.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = TbFaq::find($id);
        $data->delete();
        return response()->json();
    }
    public function tabelFaq()
    {
        $data = TbFaq::where('status', 1)->orderBy('id','desc')->orderBy('updated_at','desc')->get();
        return view('admin.faq.tabel.tabelFaq', compact('data'));
    }
    public function tabelFaqTidakAktif()
    {
        $data = $data = TbFaq::where('status', 0)->orderBy('updated_at', 'desc')->get();
        return view('admin.faq.tabel.tabelFaqTidakAktif', compact('data'));
    }
    public function status($id)
    {
        $data = TbFaq::find($id);

        if ($data->status == 1) {
            $data->update(['status' => 0]);
        } else if ($data->status == 0) {
            $data->update(['status' => 1]);
        }

        return response()->json();
    }
}
