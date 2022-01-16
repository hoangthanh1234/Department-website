<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cuusinhvien extends Model
{
     protected $table = 'ht96_cuusinhvien';
     protected $guarded = [];

     public function sinhvien(){
     	return $this->belongsto('App\Models\Sinhvien','id_sinhvien','id');
     }
}
