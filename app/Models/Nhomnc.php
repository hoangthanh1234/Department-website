<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nhomnc extends Model{
    protected $table = 'ht96_nc_nhom';
    protected $guarded = [];

    public function ct_nhom(){
    	return $this->hasMany('App\Models\CT_nhomnc','id_nhom','id');
    }

    public function linhvuc(){
    	return $this->belongsto('App\Models\Linhvucnc','id_linhvuc','id');
    }

    public function truongnhom(){
    	return $this->hasMany('App\Models\CT_nhomnc','id_nhom','id')->where('id_nhiemvu',1);
    }
}
