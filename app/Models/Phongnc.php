<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phongnc extends Model{
    protected $table = 'ht96_nc_phong';
    protected $guarded = [];

    public function loaiphong(){
    	return $this->belongsto('App\Models\Loaiphongnc','id_loaiphong','id');
    }
}
