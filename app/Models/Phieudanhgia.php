<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phieudanhgia extends Model
{
     protected $table = 'ht96_phieudanhgia';
     protected $guarded = [];

     public function thongbao(){
     	return $this->belongsto('App\Models\Thongbaodanhgia','id_thongbao','id');
     }

     public function giangvien(){
     	return $this->belongsto('App\Models\Giangvien','id_giangvien','id');
     }

     public function ct_danhgia(){
     	return $this->hasMany('App\Models\CT_danhgia','id_phieudanhgia','id');
     }

     public function vienchuc(){
          return $this->belongsto('App\Models\Giangvien','id_giangvien','id')->where('id_chucvu','<>',6);
     }

// phieu trong

      public function phieugiangdaytrong(){
          return $this->hasMany('App\Models\Phieugiangday','id_phieu','id');
     }

     public function phieu_nckh_baibaotrong(){
          return $this->hasMany('App\Models\Phieu_nckh_baibao','id_phieu','id')
                                   ->orderby('id_tieuchi');
     }

     public function phieu_nckh_detaitrong(){
          return $this->hasMany('App\Models\Phieu_nckh_detai','id_phieu','id')
                              ->orderby('id_tieuchi');
     }

     public function phieukhactrong(){
          return $this->hasMany('App\Models\Phieukhac','id_phieu','id');     
     }


//phieu giang vien tu cham điểm
     public function phieugiangday(){
          return $this->hasMany('App\Models\Phieugiangday','id_phieu','id')
                         ->where('giangvienduyet',1);
     }

     public function phieu_nckh_baibao(){
          return $this->hasMany('App\Models\Phieu_nckh_baibao','id_phieu','id')
                         ->where('giangvienduyet',1)->orderby('id_tieuchi');
     }

     public function phieu_nckh_detai(){
          return $this->hasMany('App\Models\Phieu_nckh_detai','id_phieu','id')
                         ->where('giangvienduyet',1)->orderby('id_tieuchi');
     }

     public function phieukhac(){
          return $this->hasMany('App\Models\Phieukhac','id_phieu','id')
                      ->where('giangvienduyet',1);     
     }
     
// phieu bomon cham diem

     public function phieugiangdaybomonduyet(){
          return $this->hasMany('App\Models\Phieugiangday','id_phieu','id')
                         ->where('bomonduyet',1);
     }

     public function phieu_nckh_baibaobomonduyet(){
          return $this->hasMany('App\Models\Phieu_nckh_baibao','id_phieu','id')
                         ->where('bomonduyet',1)->orderby('id_tieuchi');
     }

     public function phieu_nckh_detaibomonduyet(){
          return $this->hasMany('App\Models\Phieu_nckh_detai','id_phieu','id')
                         ->where('bomonduyet',1)->orderby('id_tieuchi');
     }

     public function phieukhacbomonduyet(){
          return $this->hasMany('App\Models\Phieukhac','id_phieu','id')
                         ->where('bomonduyet',1);
     }

//phieu khoa cham diem

     public function phieugiangdaykhoaduyet(){
          return $this->hasMany('App\Models\Phieugiangday','id_phieu','id')
                         ->where('khoaduyet',1);
     }

     public function phieu_nckh_baibaokhoaduyet(){
          return $this->hasMany('App\Models\Phieu_nckh_baibao','id_phieu','id')
                         ->where('khoaduyet',1)->orderby('id_tieuchi');
     }

     public function phieu_nckh_detaikhoaduyet(){
          return $this->hasMany('App\Models\Phieu_nckh_detai','id_phieu','id')
                         ->where('khoaduyet',1)->orderby('id_tieuchi');
     }

     public function phieukhackhoaduyet(){
          return $this->hasMany('App\Models\Phieukhac','id_phieu','id')
                         ->where('khoaduyet',1);
     }
}
