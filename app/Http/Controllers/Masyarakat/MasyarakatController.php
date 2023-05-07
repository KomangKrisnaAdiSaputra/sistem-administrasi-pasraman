<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use App\Models\TbFaq;
use App\Models\TbGaleri;
use App\Models\TbTestimoni;
use Illuminate\Http\Request;

class MasyarakatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('masyarakat.index');
    }

    public function about()
    {
        $data = TbTestimoni::where('status', 1)->get();
        return view('masyarakat.about', compact('data'));
    }

    public function faq()
    {
        // $data = [
        //     'data_faq' => TbFaq::get()
        // ];
        $data = TbFaq::where('status', 1)->orderBy('created_at', 'desc')->get();
        return view('masyarakat.faq', compact('data'));

    }

    public function gallery()
    {
        $data = TbGaleri::orderBy('id', 'desc')->get();
        return view('masyarakat.gallery', compact('data'));
    }

    public function contact()
    {
        return view('masyarakat.contactus');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
}
