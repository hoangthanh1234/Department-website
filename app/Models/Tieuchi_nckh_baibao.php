<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tieuchi_nckh_baibao extends Model
{
    protected $table = 'ht96_tieuchi_nckh_baibao';

    public function phieu(){
     	return $this->hasMany('App\Models\Phieu_nckh_baibao','id_tieuchi','id');
    }

    public function loaibaibao(){
    	return $this->belongsto('App\Models\Loaibaibao','id_loaibaibao','id');
    }

    public function loaitacgia(){
    	return $this->belongsto('App\Models\Loaitacgia','id_loaitacgia','id');
    }
}
