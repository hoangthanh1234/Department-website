<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chuyennganh extends Model
{
    protected $table = 'ht96_chuyennganh';
    protected $guarded = [];

    public function mon(){
    	return $this->hasMany('App\Models\Mon','id_mon','id');
    }

    public function bomon(){
    	return $this->belongsto('App\Models\Bomon','id_bomon','id');
    }
}
