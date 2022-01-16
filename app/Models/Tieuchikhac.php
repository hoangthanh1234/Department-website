<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tieuchikhac extends Model
{
    protected $table = 'ht96_tieuchi_khac';

    public function phieu(){
     	return $this->hasMany('App\Models\Phieukhac','id_tieuchi','id');
    }
}
