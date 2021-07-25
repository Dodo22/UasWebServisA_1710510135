<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


use App\Pengunjung;



class PengunjungController extends Controller
{
    public function tampil()
    {
        //Menampilkan Data berbentuk Json
        // $pengunjung= Pengunjung::with('wisata')->get();
        // return response()->json($pengunjung);

        $pengunjung= Pengunjung::all();
        return response()->json($pengunjung);
    }
    //Menampilkan Data Berdasarkan Id
    public function show($pengunjung)
    {
        $pengunjung = Pengunjung::where('id', $pengunjung)->get();
        return response()->json($pengunjung);
    }
    public function data($pengunjung)
    {
        //Menampilkan data Relasi
        $pengunjung = Pengunjung::with('wisata')->where('id', $pengunjung)->first();
        return response()->json($pengunjung);
        $data = Pengunjung::where('id', $pengunjung)->first();
        if (!empty($data)){
            return $data;
        }
        return response()->json(['pesan' => 'Data tidak ditemukan'], 404);
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
        //Mengecek kondisi jika ada form yang tidak diisi maka tidak adan tersimpan datanya dan sebaliknya
        $validate = Validator::make($request->all(), [
            'nik' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'agama' => 'required',
            
        ]);
        if($validate->passes()) {
            $pengunjung = Pengunjung::create($request->all());
            return response()->json([
                'pesan' => 'Data Berhasil Disimpan',
                'data' => $pengunjung

            ]); 
            return Pengunjung::create($request->all());
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
    public function ubah(Request $request, Pengunjung $pengunjung)
    {
        //Fungsi Untuk Mengubah data
        $pengunjung->update($request->all());
        return response()->json(['pesan' => 'Data berhasil diubah', 
        'data'=> $pengunjung]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tugas  $tugas
     * @return \Illuminate\Http\Response
     */
    public function hapus($pengunjung)
    {
        //Fungsi Menghapus data berdasarkan
        $data = Pengunjung::where('id', $pengunjung)->first();
        if (empty($data)){
            return response()->json(['pesan', 'Data tidak ditemukan'], 404);
        }
        $data->delete();
        return response()->json(['pesan'=> 'Data berhasil dihapus'],200);
    }
}
