<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chedogiochuan extends Model{

	protected $table = 'ht96_chedogiochuan';
    protected $guarded = [];

    public function chucvu(){
    	return $this->belongsto('App\Models\Chucvu','id_chucvu','id');
    }

    public function trinhdo(){
    	return $this->belongsto('App\Models\Trinhdo','id_trinhdo','id');
    }
    
}
