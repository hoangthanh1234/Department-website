<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phieu_nckh_detai extends Model
{
    protected $table = 'ht96_phieu_nckh_detai';
    protected $guarded = [];

    public function tieuchi(){
     	return $this->belongsto('App\Models\Tieuchi_nckh_detai','id_tieuchi','id');
    }

    public function phieudanhgia(){
    	return $this->belongsto('App\Models\Phieudanhgia','id_phieu','id');
    }

    public function chitietdetai(){
    	return $this->belongsto('App\Models\CT_detai','id_chitietdetai','id');
    }
}
