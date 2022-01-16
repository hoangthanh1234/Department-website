<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phieugiangday extends Model
{
    protected $table = 'ht96_phieu_giangday';
    protected $guarded = [];

    public function tieuchi(){
     	return $this->belongsto('App\Models\Tieuchigiangday','id_tieuchi','id');
    }

    public function phieudanhgia(){
    	return $this->belongsto('App\Models\Phieudanhgia','id_phieu','id');
    }
}
