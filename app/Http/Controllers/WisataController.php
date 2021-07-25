<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use App\Wisata;

class WisataController extends Controller
{
    public function tampil()
    {
        $wisata= Wisata::all();
        return response()->json($wisata);
    }

    public function show($wisata)
    {
        $wisata = Wisata::where('id', $wisata)->get();
        return response()->json($wisata);
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
    public function tambah(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'nama' => 'required',
            'level' => 'required',
            'fasilitas' => 'required',
            'deskripsi' => 'required'
        ]);
        if($validate->passes()) {
            $wisata = Wisata::create($request->all());
            return response()->json([
                'pesan' => 'Data Berhasil Disimpan',
                'data' => $wisata

            ]); 
            return Wisata::create($request->all());
        }
        return response()->json([
            'pesan' => 'Data Gagal Disimpan']);
    }


  

   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tugas  $tugas
     * @return \Illuminate\Http\Response
     */
    public function ubah(Request $request, wisata $wisata)
    {
        $wisata->update($request->all());
        return response()->json(['pesan' => 'Data berhasil diubah', 
        'data'=> $wisata]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tugas  $tugas
     * @return \Illuminate\Http\Response
     */
    public function hapus($wisata)
    {
        $data = Wisata::where('id', $wisata)->first();
        if (empty($data)){
            return response()->json(['pesan', 'Data tidak ditemukan'], 404);
        }
        $data->delete();
        return response()->json(['pesan'=> 'Data berhasil dihapus'],200);
    }
}
