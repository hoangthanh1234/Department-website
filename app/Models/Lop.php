<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lop extends Model
{
     protected $table = 'ht96_lop';
     protected $guarded = [];

     public function bomon(){
     	return $this->belongsto('App\Models\Bomon','id_bomon','id');
     }

     public function sinhvien(){
     	return $this->hasMany('App\Models\Sinhvien','id_lop','id');
     }

     public function hedaotao(){
          return $this->belongsto('App\Models\Hedaotao','id_hedaotao','id');
     }

     public function bacdaotao(){
     	return $this->belongsto('App\Models\Bacdaotao','id_bacdaotao','id');
     }

     public function cuusinhvien(){
          return $this->hasManyThrough('App\Models\Cuusinhvien','App\Models\Sinhvien','id_lop','id_sinhvien','id')->orderby('stt')->where('totnghiep',1);
     }

     public function cuusinhviennoibat(){
          return $this->hasManyThrough('App\Models\Cuusinhvien','App\Models\Sinhvien','id_lop','id_sinhvien','id')->orderby('stt')->where('noibat',1);
     }

     public function ketquathi(){
          return $this->hasMany('App\Models\Ketquathi','id_lop','id');
     }

     public function chuongtrinh(){
          return $this->belongsto('App\Models\Chuongtrinh','id_chuongtrinh','id');
     }


}
