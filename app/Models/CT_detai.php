<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CT_detai extends Model
{
    protected $table = 'ht96_ct_detai';
    protected $guarded = [];

    public function giangvien(){
    	return $this->belongsto('App\Models\Giangvien','id_giangvien','id');    	
    }

    public function detai(){
    	return $this->belongsto('App\Models\Detainghiencuu','id_detai','id');    	
    }

    public function trachnhiem(){
    	return $this->belongsto('App\Models\Trachnhiemdetai','id_trachnhiemdetai','id');    	
    }

    public function phieu_detai(){
        return $this->hasMany('App\Models\Phieu_nckh_detai','id_chitietdetai','id');
    }

    public function delete(){
        $this->phieu_detai()->delete();
        return parent::delete();
    }
}
