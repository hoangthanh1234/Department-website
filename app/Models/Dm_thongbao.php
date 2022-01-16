<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dm_thongbao extends Model
{
     protected $table = 'ht96_dm_thongbao';
     
     public function thongbao(){
     	return $this->hasMany('App\Models\Thongbao','id_danhmuc','id')->orderby('created_at','ASC');
     }

     public function thongbao2(){
     	return $this->hasMany('App\Models\Thongbao','id_danhmuc','id')->where('hienthi',1)->take(6)->orderby('created_at','DESC');
     }

     public function getOptionsPaginatedAttribute(){
   			 return $this->thongbao()->paginate(10);
	}

    
}
