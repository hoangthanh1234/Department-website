<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Thongbao extends Model
{
     protected $table = 'ht96_thongbao';

     public function danhmuc(){
     	return $this->belongsto('App\Models\Dm_thongbao','id_danhmuc','id');
     }

     public function bomon(){
     	return $this->bolongsto('App\Models\Bomon','id_bomon','id');
     }
}
