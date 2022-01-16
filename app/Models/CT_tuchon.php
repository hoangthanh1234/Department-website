<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CT_tuchon extends Model
{
    protected $table = 'ht96_ct_tuchon';
    protected $guarded = [];

    public function lop(){
    	return $this->belongsto('App\Models\Lop','id_lop','id');
    }

    public function mon(){
    	return $this->belongsto('App\Models\Mon','id_mon','id');
    }

    public function hocky(){
    	return $this->belongsto('App\Models\Hocky','id_hocky','id');
    }


}
