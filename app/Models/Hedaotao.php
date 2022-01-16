<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hedaotao extends Model
{
     protected $table = 'ht96_hedaotao';
     protected $guarded = [];

     public function chuongtrinh(){
    	return $this->hasMany('App\Models\Chuongtrinh','id_hedaotao','id');
    }

     public function quatrinhdaotao(){
    	return $this->hasMany('App\Models\Quatrinhdaotao','id_hedaotao','id');
    }
}
