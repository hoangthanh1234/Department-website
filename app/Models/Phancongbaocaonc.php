<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phancongbaocaonc extends Model{
    
    protected $table = 'ht96_nc_phancongbaocao';
    protected $guarded = [];

    public function baocao(){
    	return $this->belongsto('App\Models\Baocaonc','id_baocao','id');
    }

    public function phong(){
    	return $this->belongsto('App\Models\Phongnc','id_phong','id');
    }
}
