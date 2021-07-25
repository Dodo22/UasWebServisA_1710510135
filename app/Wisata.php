<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    protected $table = "wisatas";
    protected $fillable = ['nama', 'level', 'fasilitas', 'deskripsi', 'created_at', 'updated_at'];
}
