<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model{
	
    protected $table = 'ht96_about';
    protected $guarded = [];

    public function bomon(){
    	return $this->belongsto('App\Models\Bomon','id_bomon','id');
    }
   
}
