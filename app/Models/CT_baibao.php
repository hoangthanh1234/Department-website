<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CT_baibao extends Model
{
    protected $table = 'ht96_ct_baibao';
    protected $guarded = [];

    public function baibao(){
    	return $this->belongsto('App\Models\Baibaokhoahoc','id_baibao','id');
    }

    public function giangvien(){
    	return $this->belongsto('App\Models\Giangvien','id_giangvien','id');
    }

    public function loaitacgia(){
    	return $this->belongsto('App\Models\Loaitacgia','id_loaitacgia','id');
    }

    public function phieu_baibao(){
        return $this->hasMany('App\Models\Phieu_nckh_baibao','id_chitietbaibao','id');
    }
 
    public function delete(){
        $this->phieu_baibao()->delete();
        return parent::delete();
    }

}
