<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chude extends Model
{
     protected $table = 'ht96_chudecauhoi';
     
     public function phancongtraloi(){
     	return $this->hasMany('App\Models\Phancongtraloi','id_chude','id');
     }

     public function cauhoi(){
     	return $this->hasMany('App\Models\Cauhoi','id_chude','id');
     }
}
