<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Huongdansaudaihoc extends Model
{
    protected $table = 'ht96_huongdansaudaihoc';
    protected $guarded = [];

    public function giangvien(){
    	return $this->belongsto('App\Models\Giangvien','id_giangvien','id');
    }

    public function trinhdo(){
    	return $this->belongsto('App\Models\Trinhdo','id_trinhdo','id');
    }

    
}
