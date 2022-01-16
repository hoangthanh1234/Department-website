<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phieukhac extends Model
{
    protected $table = 'ht96_phieu_khac';
    protected $guarded = [];

    public function tieuchi(){
     	return $this->belongsto('App\Models\Tieuchikhac','id_tieuchi','id');
    }

    public function phieudanhgia(){
    	return $this->belongsto('App\Models\Phieudanhgia','id_phieu','id');
    }
}
