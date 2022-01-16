<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chuongtrinh extends Model
{
    protected $table = 'ht96_chuongtrinh';
    protected $guarded = [];

    public function hedaotao(){

    	return $this->belongsto('App\Models\Hedaotao','id_hedaotao','id');
    }

    public function bacdaotao(){

    	return $this->belongsto('App\Models\Bacdaotao','id_bacdaotao','id');

    }

    public function bomon(){

    	return $this->belongsto('App\Models\Bomon','id_bomon','id');

    }

    public function ct_daotao(){
        return $this->hasMany('App\Models\CT_daotao','id_chuongtrinh','id')->orderby('id_hocky');
    }

    public function ct_xettuyen(){
        return $this->hasMany('App\Models\CT_xettuyen','id_chuongtrinh','id');
    }

   
}
