<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dm_tintuc extends Model
{
    protected $table = 'ht96_dm_tintuc';
    protected $guarded = [];

    public function post(){
    	return $this->hasMany('App\Models\Tintuc','id_danhmuc','id')->orderby('created_at','DESC');
    }

    public function posttuyensinh(){
    	return $this->hasMany('App\Models\Tintuc','id_danhmuc','id')->where('hienthi',1)->take(8);
    }
}
