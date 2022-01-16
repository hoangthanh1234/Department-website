<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loaitacgia extends Model
{
    protected $table = 'ht96_loaitacgia';
    protected $guarded = [];

    public function baibaokhoahoc(){
    	return $this->hasMany('App\Models\Baibaokhoahoc','id_loaitacgia','id');
    }
}
