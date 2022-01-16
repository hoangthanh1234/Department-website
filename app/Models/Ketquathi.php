<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ketquathi extends Model
{
     protected $table = 'ht96_ketquathi';

     public function lop(){
     	return $this->belongtos('App\Models\Lop','id_lop','id');
     }
    
}
