<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hosokhoahoc extends Model
{
     protected $table = 'ht96_hosokhoahoc';
     protected $guarded = [];

     public function giangvien(){
     	return $this->belongsto('App\Models\Giangvien','id_giangvien','id');
     }

     public function nghiencuudacongbo(){
     	return $this->hasMany('App\Models\Baibaokhoahoc','id_hoso','id')->orderBy('stt');
     }

     public function quatrinhcongtac(){
     	return $this->hasMany('App\Models\Quatrinhcongtac','id_hoso','id')->orderBy('stt');
     }

     public function quatrinhdaotao(){
     	return $this->hasMany('App\Models\Quatrinhdaotao','id_hoso','id')->orderBy('stt');
     }

      public function quatrinhdaotao2(){
          return $this->hasMany('App\Models\Quatrinhdaotao','id_hoso','id')->skip(1)->take(10)->orderBy('stt');
     }

     public function duanthamgia(){
     	return $this->hasMany('App\Models\Duanthamgia','id_hoso','id');
     }

     public function detainghiencuu(){
          return $this->hasMany('App\Models\Detainghiencuu','id_hoso','id')->orderBy('stt');
     }

     public function huongdansaudaihoc(){
          return $this->hasMany('App\Models\Huongdansaudaihoc','id_hoso','id');
     }

     public function mongiangday(){
          return $this->hasMany('App\Models\Mongiangday','id_hoso','id');
     }

      public function ngoaingutt(){
          return $this->hasMany('App\Models\Ngoaingu','id_hoso','id');
     }
}
