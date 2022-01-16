<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ngoaingu extends Model
{
    protected $table = 'ht96_ngoaingu';
    protected $guarded = [];

    public function giangvien(){
    	return $this->belongsto('App\Models\Giangvien','id_giangvien','id');
    }
}
