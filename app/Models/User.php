<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
   
    protected $table = 'ht96_users';
   
    public function bomon(){
    	return $this->belongtos('App\Models\Bomon','bomon','id');
    }
}
