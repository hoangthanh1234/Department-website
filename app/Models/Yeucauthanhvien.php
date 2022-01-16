<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Yeucauthanhvien extends Model{

	 protected $table = 'ht96_yeucauthanhvien';
     protected $guarded = [];

     public function detai(){
     	return $this->belongsto('App\Models\Detainghiencuu','id_detai','id');
     }

     public function chuyennghanh(){
     	return $this->belongsto('App\Models\Chuyennganh','id_chuyennganh','id');
     }
}
