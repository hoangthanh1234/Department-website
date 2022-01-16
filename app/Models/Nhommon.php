<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nhommon extends Model{

    protected $table = 'ht96_nhommon';
    protected $guarded = [];

    public function mon(){
    	return $this->hasMany('App\Models\Mon','id_nhommon','id');
    }
}
