<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bantuvan extends Model
{
    protected $table = 'ht96_bantuvan';
    protected $guarded = [];
	

	public function bomon(){
		return $this->belongsto('App\Models\Department','id_bomon','id');
	}
}
