<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mongiangday extends Model
{
    protected $table = 'ht96_mongiangday';
    protected $guarded = [];

    public function giangvien(){
    	return $this->belongsto('App\Models\Giangvien','id_giangvien','id');
    }
}
