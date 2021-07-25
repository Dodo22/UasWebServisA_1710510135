<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengunjung extends Model
{
    //model
    protected $table = "pengunjungs";
    protected $fillable = ['nik', 'nama', 'jenis_kelamin', 'alamat', 'agama', 'wisata_id', 'created_at', 'updated_at'];

    public function mk(){
        return $this->belongsTo(mk::class, 'wisata_id');
    }
}
