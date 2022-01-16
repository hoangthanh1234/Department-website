<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Khoa extends Model
{
    protected $table = 'ht96_khoa';
    protected $guarded = [];

    public function bomon(){
    	return $this->hasMany('App\Models\Khoa','id_khoa','id');
    }

}
