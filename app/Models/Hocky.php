<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hocky extends Model
{
    protected $table = 'ht96_hocky';
    protected $guarded = [];

    public function ct_daotao(){
    	return $this->hasMany('App\Models\CT_daotao','id_hocky','id');
    }
}
