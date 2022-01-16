<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tieuchi_nckh_detai extends Model
{
    protected $table = 'ht96_tieuchi_nckh_detai';

    public function phieu(){
     	return $this->hasMany('App\Models\Phieu_nckh_detai','id_tieuchi','id');
    }

    public function capdetai(){
    	return $this->belongsto('App\Models\Capdetai','id_capdetai','id');
    }

    public function trachnhiem(){
    	return $this->belongsto('App\Models\Trachnhiemdetai','id_trachnhiemdetai','id');
    }
}
