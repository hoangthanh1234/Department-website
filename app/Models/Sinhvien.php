<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sinhvien extends Model
{
     protected $table = 'ht96_sinhvien';
     protected $guarded = [];

     public function lop(){
     	return $this->belongsto('App\Models\Lop','id_lop','id');
     }

     public function cuusinhvien(){
     	return $this->hasOne('App\Models\Cuusinhvien','id_sinhvien','id');
     }
}
