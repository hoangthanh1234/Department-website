<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CT_danhgia extends Model
{
     protected $table = 'ht96_ct_danhgia';
     protected $guarded = [];

     public function tieuchi(){
     	return $this->belongsto('App\Models\Tieuchi','id_tieuchi','id');
     }

     public function phieudanhgia(){
     	return $this->belongsto('App\Models\Phieudanhgia','id_phieudanhgia','id');
     }
}
