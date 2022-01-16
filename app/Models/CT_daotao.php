<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CT_daotao extends Model
{
    protected $table = 'ht96_ct_daotao';
    protected $guarded = [];

    public function mon(){
    	return $this->belongsTo('App\Models\Mon','id_mon','id');
    }

    public function chuongtrinh(){
    	return $this->belongsTo('App\Models\Chuongtrinh','id_chuongtrinh','id');
    }

    public function hocky(){
    	return $this->belongsTo('App\Models\Hocky','id_hocky','id');
    }
}
