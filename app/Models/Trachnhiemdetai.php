<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trachnhiemdetai extends Model
{
     protected $table = 'ht96_trachnhiemdetai';
     protected $guarded = [];
     
     public function ct_detai(){
        return $this->hasMany('App\Models\CT_detai','id_trachnhiem','id');
    }
}
