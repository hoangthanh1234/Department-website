<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nhiemvunc extends Model{
    protected $table = 'ht96_nc_nhiemvu';
    protected $guarded = [];

    public function ct_nhom(){
    	return $this->hasMany('App\Models\CT_nhomnc','id_nhiemvu','id');
    }
}
