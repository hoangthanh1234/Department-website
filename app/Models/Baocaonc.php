<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Baocaonc extends Model{
    protected $table = 'ht96_nc_baocao';
    protected $guarded = [];
    
    public function ct_nhom(){
    	return $this->belongsto('App\Models\CT_nhomnc','id_ct_nhom','id');
    }

    public function phancongbaocao(){
    	return $this->hasMany('App\Models\phancongbaocaonc','id_baocao','id');
    }
}
