<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TbGaleri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => "Data Galeri",
            'data_galeri' => TbGaleri::orderByDesc('id')->get(),
        ];
        return view('admin.galeri.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.galeri.tambah-dan-edit.tambahData');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nama_foto = $request->nama_foto;
        $keterangan = $request->keterangan;
        $foto = $request->file('foto');
        // dd($foto);
        $ekstensi_diperbolehkan    = array('image/png', 'image/jpg', 'image/jpeg');
        $ekstensi = $foto->getClientMimeType();
        $ukuran    = $foto->getSize();

        if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
            if ($ukuran > 3048000) {
                return redirect(route('galeri.index'))->with('error', 'Upload Foto Kurang dari 3mb!');
            } else {

                $fileName = time() . '.' . $foto->getClientOriginalExtension();
                $foto->move('image/galeri/', $fileName);

                TbGaleri::create([
                    'id_user' => auth()->user()->id,
                    'nama_foto' => $nama_foto,
                    'keterangan' => $keterangan,
                    'foto' => $fileName
                ]);
            }


            return redirect(route('galeri.index'));
        } else {
            return redirect(route('galeri.index'))->with('error', 'Upload Foto Dengan Ekstensi png/jpg/jpeg!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = TbGaleri::find($id);

        return view('admin.galeri.detail.detail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id_galeri = $id;
        $data = TbGaleri::find($id);

        return view('admin.galeri.tambah-dan-edit.editData', compact('data', 'id_galeri'));
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
        $nama_foto = $request->nama_foto;
        $keterangan = $request->keterangan;
        $image = $request->foto_lama;

        $imagePath = public_path('image/galeri/' . $request->foto_lama);

        if ($request->hasFile('foto') == true) {

            $foto = $request->file('foto');
            $ekstensi_diperbolehkan    = array('image/png', 'image/jpg', 'image/jpeg');
            $ekstensi = $foto->getClientMimeType();
            $ukuran    = $foto->getSize();

            if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
                if ($ukuran > 3048000) {
                    return redirect(route('galeri.index'))->with('error', 'Upload Foto Kurang dari 3mb!');
                } else {
                    if (File::exists($imagePath)) {
                        File::delete($imagePath);
                    }
                    $fileName = time() . '.' . $foto->getClientOriginalExtension();
                    $foto->move('image/galeri/', $fileName);
                    $image = $fileName;
                }
            } else {
                return redirect(route('galeri.index'))->with('error', 'Upload Foto Dengan Ekstensi png/jpg/jpeg!');
            }
        }
        TbGaleri::find($id)->update([
            'nama_foto' => $nama_foto,
            'keterangan' => $keterangan,
            'foto' => $image
        ]);
        return redirect(route('galeri.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $data = TbGaleri::find($id);
        $imagePath = public_path('image/galeri/' . $data->foto);

        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }

        $data->delete();

        return response()->json();
    }

    public function tabelGaleri()
    {
        $data = TbGaleri::get();
        return view('admin.galeri.tabel.tabelGaleri', compact('data'));
    }
}
