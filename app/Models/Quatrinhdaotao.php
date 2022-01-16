<?php

namespace App\MOdels;

use Illuminate\Database\Eloquent\Model;

class Quatrinhdaotao extends Model
{
     protected $table = 'ht96_quatrinhdaotao';
     protected $guarded = [];

      public function giangvien(){
     	return $this->belongsto('App\Models\Giangvien','id_giangvien','id');
     }

     public function bacdaotao(){
     	return $this->belongsto('App\Models\Bacdaotao','id_bacdaotao','id');
     }

     public function hedaotao(){
     	return $this->belongsto('App\Models\Hedaotao','id_hedaotao','id');
     }
     public function trinhdo(){
          return $this->belongsto('App\Models\Trinhdo','id_trinhdo','id');
     }
}
