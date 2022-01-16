<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mon extends Model
{
     protected $table = 'ht96_mon';
     protected $guarded = [];

     public function ctdaotao(){
     	return $this->hasMany('App\Models\CT_daotao','id_mon','id');
     }

     public function bacdaotao(){
     	return $this->belongsto('App\Models\Bacdaotao','id_bacdaotao','id');
     }

     public function monsotruong(){
     	return $this->hasMany('App\Models\Monsotruong','id_mon','id');
     } 

     public function chuyennganh(){
          return $this->belongsto('App\Models\Chuyennganh','id_chuyennganh','id');
     }

     public function bomon(){
          return $this->belongsto('App\Models\Bomon','id_bomon','id');
     }

     public function nhommon(){
          return $this->belongsto('App\Models\Nhommon','id_nhommon','id');
     }
}
