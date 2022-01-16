<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CT_phancongviec extends Model
{
    protected $table = 'ht96_ct_phancongviec';
    protected $guarded = [];

    public function giangvien(){
    	return $this->belongsto('App\Models\Giangvien','id_giangvien','id');
    }

    public function congviec(){
    	return $this->belongsto('App\Models\Congviec','id_phancong','id');
    }
}
