<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CT_xettuyen extends Model
{
    protected $table = 'ht96_ct_xettuyen';
    protected $guarded = [];


    public function tohop(){
    	return $this->belongsTo('App\Models\Tohop','id_tohop','id');
    }

    public function chuongtrinh(){
    	return $this->belongsTo('App\Models\Chuongtrinh','id_chuongtrinh','id');
    }
}
