<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tieuchigiangday extends Model
{
     protected $table = 'ht96_tieuchi_giangday';

     public function phieu(){
     	return $this->hasMany('App\Models\Phieugiangday','id_tieuchi','id');
     }
}
