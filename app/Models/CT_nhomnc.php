<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CT_nhomnc extends Model{

    protected $table = 'ht96_nc_ct_nhom';
    protected $guarded = [];

    public function nhiemvu(){
    	return $this->belongsto('App\Models\Nhiemvunc','id_nhiemvu','id');
    }

    public function nhom(){
    	return $this->belongsto('App\Models\Nhomnc','id_nhom','id');
    }

    public function giangvien(){
    	return $this->belongsto('App\Models\Giangvien','id_giangvien','id');
    }

    public function baocao(){
        return $this->hasMany('App\Models\Baocaonc','id_ct_nhom','id');
    }
}
