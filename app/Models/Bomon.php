<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bomon extends Model
{
     protected $table = 'ht96_bomon';
     protected $guarded = [];

     public function chuongtrinh(){
    	return $this->hasMany('App\Models\Chuongtrinh','id_bomon','id');
    }

    public function lop(){
    	return $this->hasMany('App\Models\Lop','id_bomon','id');
    }

    public function thongbao(){
    	return $this->hasMany('App\Models\Thongbao','id_bomon','id');
    }

    public function user(){
        return $this->hasMany('App\Models\Dangnhap','bomon','id');
    }

    public function khoa(){
        return $this->belongsto('App\Models\Khoa','id_khoa','id');
    }

    
}
