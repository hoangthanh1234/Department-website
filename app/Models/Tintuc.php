<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tintuc extends Model
{
     protected $table = 'ht96_tintuc';
     protected $guarded = [];

     public function danhmuc(){
    	return $this->belongsTo('App\Models\Dm_tintuc','id_danhmuc','id');
    }
}
