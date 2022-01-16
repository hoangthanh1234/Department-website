<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loaiphongnc extends Model{
    
    protected $table = 'ht96_nc_loaiphong';
    protected $guarded = [];

    public function phong(){
    	return $this->hasMany('App\Models\Phongnc','id_loaiphong','id');
    }
}
