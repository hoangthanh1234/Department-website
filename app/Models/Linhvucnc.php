<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Linhvucnc extends Model{
    
    protected $table = 'ht96_nc_linhvuc';
    protected $guarded = [];

    public function nhomnghiencuu(){
    	return $this->hasMany('App\Models\Nhomnc','id_linhvuc','id');
    }
}
