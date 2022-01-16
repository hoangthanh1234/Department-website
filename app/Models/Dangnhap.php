<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dangnhap extends Model
{
    protected $table = 'ht96_users';   
    public function bomon(){
    	return $this->belongtos('App\Models\Department','bomon','id');
    }
}
