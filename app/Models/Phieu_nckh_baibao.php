<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phieu_nckh_baibao extends Model
{
    protected $table = 'ht96_phieu_nckh_baibao';
    protected $guarded = [];

    public function tieuchi(){
     	return $this->belongsto('App\Models\Tieuchi_nckh_baibao','id_tieuchi','id');
    }

    public function phieudanhgia(){
    	return $this->belongsto('App\Models\Phieudanhgia','id_phieu','id');
    }

    public function chitietbaibao(){
    	return $this->belongsto('App\Models\CT_baibao','id_chitietbaibao','id');
    }
}
