<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Baibaokhoahoc extends Model
{
     protected $table = 'ht96_baibaokhoahoc';
     protected $guarded = [];

     public function loaibaibao(){
     	return $this->belongsto('App\Models\Loaibaibao','id_loaibaibao','id');
     }

     public function loaitacgia(){
     	return $this->belongsto('App\Models\Loaitacgia','id_loaitacgia','id');
     }

     public function tacgiachinh(){
          return $this->belongsto('App\Models\Giangvien','tacgia','id');
     }

     public function ct_baibao(){
          return $this->hasMany('App\Models\CT_baibao','id_baibao','id');
     }
     
}
