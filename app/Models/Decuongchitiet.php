<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Decuongchitiet extends Model{
    protected $table = 'ht96_decuongchitiet';

    public function lop(){
     	return $this->belongtos('App\Models\Lop','id_lop','id');
    }
}
