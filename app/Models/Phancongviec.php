<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phancongviec extends Model
{
     protected $table = 'ht96_phancongviec';
     protected $guarded = [];

     public function nhomcongviec(){
     	return $this->belongsto('App\Models\Nhomcongviec','id_nhomcongviec','id');
     }

     public function giangvien(){
     	return $this->belongsto('App\Models\Giangvien','id_giangvien','id');
     }

    
}
