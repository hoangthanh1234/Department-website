<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phancongtraloi extends Model
{
     protected $table = 'ht96_phancongtraloi';
     protected $guarded = [];

     public function chude(){
     	return $this->belongsto('App\Models\Chude','id_chude','id');
     }

     public function giangvien(){
     	return $this->belongsto('App\Models\Giangvien','id_giangvien','id');
     }

    
}
