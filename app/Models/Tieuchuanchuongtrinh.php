<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tieuchuanchuongtrinh extends Model{

     protected $table = 'ht96_tieuchuan_chuongtrinh';

     public function chuongtrinh(){
     	return $this->belongsto('App\Models\Chuongtrinh','id_chuongtrinh','id');
     }

     public function hocky(){
     	return $this->belongsto('App\Models\Hocky','id_hocky','id');
     }


}
