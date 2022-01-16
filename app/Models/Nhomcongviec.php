<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nhomcongviec extends Model
{
    protected $table = 'ht96_nhomcongviec';
    protected $guarded = [];

    public function phancongviec(){
    	return $this->hasMany('App\Models\Congviec','id_nhomcongviec','id');
    }

    public function congvieccbd(){
    	return $this->hasMany('App\Models\Congviec','id_nhomcongviec','id')->where('trangthai',0);
    }

    public function congviecdth(){
    	return $this->hasMany('App\Models\Congviec','id_nhomcongviec','id')->where('trangthai',1);
    }

    public function congviecht(){
    	return $this->hasMany('App\Models\Congviec','id_nhomcongviec','id')->where('trangthai',2);
    }
}
