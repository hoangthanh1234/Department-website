<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phanconggiangday extends Model{

    protected $table = 'ht96_phanconggiangday';
    protected $guarded = [];

    public function mon(){
    	return $this->belongsto('App\Models\Mon','id_mon','id');
    }

    public function lop(){
    	return $this->belongsto('App\Models\Lop','id_lop','id');
    }

    public function giangvien(){
    	return $this->belongsto('App\Models\Giangvien','id_giangvien','id');
    }

    public function hocky(){
    	return $this->belongsto('App\Models\Hocky','id_hocky','id');
    }
}
