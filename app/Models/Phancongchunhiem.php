<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phancongchunhiem extends Model
{
    protected $table = 'ht96_phancongchunhiem';
    protected $guarded = [];

    public function giangvien(){
    	return $this->belongsto('App\Models\Giangvien','id_giangvien','id');
    }

    public function lop(){
    	return $this->belongsto('App\Models\Lop','id_lop','id');
    }
}
