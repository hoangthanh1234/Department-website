<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bacdaotao extends Model
{
    protected $table = 'ht96_bacdaotao';
    protected $guarded = [];

    public function chuongtrinh(){
    	return $this->hasMany('App\Models\Chuongtrinh','id_bacdaotao','id');
    }

    public function quatrinhdaotao(){
    	return $this->hasMany('App\Models\Quatrinhdaotao','id_bacdaotao','id');
    }
}
