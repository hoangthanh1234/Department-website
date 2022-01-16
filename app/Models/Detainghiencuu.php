<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detainghiencuu extends Model
{
    protected $table = 'ht96_detainghiencuu';
    protected $guarded = [];
    

    public function capdetai(){
    	return $this->belongsto('App\Models\Capdetai','id_capdetai','id');
    }    

    public function ct_detai(){
        return $this->hasMany('App\Models\CT_detai','id_detai','id');
    }

    public function giangvien(){
        return $this->belongsto('App\Models\Giangvien','tacgia','id');
    }

    public function yeucauthanhvien(){
        return $this->hasMany('App\Models\Yeucauthanhvien','id_detai','id');
    }
}
