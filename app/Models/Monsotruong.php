<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Monsotruong extends Model
{
    protected $table = 'ht96_monsotruong';
    protected $guarded = [];

    public function mon(){
    	return $this->belongsto('App\Models\Mon','id_mon','id');
    }

    public function giangvien(){
    	return $this->belongsto('App\Models\Giangvien','id_giangvien','id');
    }
}
