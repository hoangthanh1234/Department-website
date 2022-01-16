<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Giangvien extends Model
{
    protected $table = 'ht96_giangvien';
    protected $guarded = [];


	public function chucvu(){
		return $this->belongsto('App\Models\Chucvu','id_chucvu','id');
	}

	public function trinhdo(){
		return $this->belongsto('App\Models\Trinhdo','id_trinhdo','id');
	}

	public function bomon(){
		return $this->belongsto('App\Models\Bomon','id_bomon','id');
	}	

	public function baibaokhoahoc(){
		return $this->hasMany('App\Models\Baibaokhoahoc','id_giangvien','id');
	}

	public function detainghiencuu(){
		return $this->hasMany('App\Models\Detainghiencuu','id_giangvien','id');
	}

	public function huongdansaudaihoc(){
		return $this->hasMany('App\Models\Huongdansaudaihoc','id_giangvien','id');
	}

	public function mongiangday(){
		return $this->hasMany('App\Models\Mongiangday','id_giangvien','id')->orderby('nambatdau','DESC');
	}

	public function quatrinhcongtac(){
		return $this->hasMany('App\Models\Quatrinhcongtac','id_giangvien','id');
	}

	public function quatrinhdaotao(){
		return $this->hasMany('App\Models\Quatrinhdaotao','id_giangvien','id');
	}

	public function saudaihoc(){
		return $this->hasMany('App\Models\Quatrinhdaotao','id_giangvien','id')->skip(1)->take(5);
	}
	
	public function phieudanhgia(){
		return $this->hasMany('App\Models\Phieudanhgia','id_giangvien','id')->orderby('id');
	}

	public function phancongtraloi(){
		return $this->hasMany('App\Models\Phancongtraloi','id_giangvien','id');
	}

	public function ct_detai(){
		return $this->hasMany('App\Models\CT_detai','id_giangvien','id')->orderby('id_detai','DESC');
	}

	public function ct_baibao(){
		return $this->hasMany('App\Models\CT_baibao','id_giangvien','id')->orderby('id_baibao','DESC');;
	}

	public function ngoaingu(){
		return $this->hasMany('App\Models\Ngoaingu','id_giangvien','id');
	}

	public function monsotruong(){
		return $this->hasMany('App\Models\Monsotruong','id_giangvien','id');
	}

	
}


