<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Congviec extends Model
{
   protected $table = 'ht96_congviec';
   protected $guarded = [];

   public function nhomcongviec(){
   		return $this->belongsto('App\Models\Nhomcongviec','id_nhomcongviec','id');
   }

   public function phancongviec(){
   		return $this->hasMany('App\Models\CT_phancongviec','id_phancong','id');
   }

   public function phancongviecht(){
         return $this->hasMany('App\Models\CT_phancongviec','id_phancong','id')->where('trangthai',2);
   }

   public function giangvien(){
   	return $this->belongsto('App\Models\Giangvien','id_giangvien','id');
   }
}
