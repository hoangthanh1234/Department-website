<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cauhoi extends Model
{
	 protected $table = 'ht96_cauhoi';
    public function chude(){
    	return $this->belongsto('App\Models\Chude','id_chude','id');
    }
}
