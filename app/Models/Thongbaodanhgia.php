<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Thongbaodanhgia extends Model
{
     protected $table = 'ht96_thongbaodanhgia';
     protected $guarded = [];

     public function phieudanhgia(){
     	return $this->hasMany('App\Models\Phieudanhgia','id_thongbao','id');
     }
}
