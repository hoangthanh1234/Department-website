<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quatrinhcongtac extends Model
{
     protected $table = 'ht96_quatrinhcongtac';
     protected $guarded = [];

      public function giangvien(){
     	return $this->belongsto('App\Models\Giangvien','id_giangvien','id');
     }

     public function chucvu(){
     	return $this->belongsto('App\Models\Chucvu','id_chucvu','id');
     }
}
