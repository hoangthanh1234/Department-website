<?php

namespace App\Http\Controllers\Admin\Bomon;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Thongbaodanhgia;
use App\Models\Tieuchuan;
use App\Models\CT_danhgia;
use App\Models\Phieudanhgia;
use DB;
use Session;


class ThongbaodanhgiaController extends Controller
{
    public function getList(){
    	$Thongbao=Thongbaodanhgia::orderby('stt')->get();
    	return view('Admin.Bomon.Thongbaodanhgia.List',['Thongbao'=>$Thongbao]);
    }

    public function danhsachdanhgia($id_thongbao){
       
      $thongbaokiem=Thongbaodanhgia::find($id_thongbao);
      if($thongbaokiem->trangthai==0)
        die("Không thể đánh giá vào lúc này vui lòng liên hệ quản trị viên để biết thêm chi tiết");

    	$danhsach=DB::table('ht96_thongbaodanhgia')
    			 ->join('ht96_phieudanhgia','ht96_phieudanhgia.id_thongbao','=','ht96_thongbaodanhgia.id' )
    			 ->join('ht96_giangvien','ht96_giangvien.id','=','ht96_phieudanhgia.id_giangvien')
    			 ->join('ht96_bomon','ht96_bomon.id','=','ht96_giangvien.id_bomon')
    			 ->where('ht96_giangvien.id_bomon',Session::get('user_department'))
    			 ->where('ht96_thongbaodanhgia.id',$id_thongbao)
    			 ->select('ht96_thongbaodanhgia.*','ht96_giangvien.ten as tengiangvien','ht96_giangvien.maso','ht96_bomon.ten_vi as tenbomon','ht96_phieudanhgia.id as id_phieu')
           ->orderby('ht96_phieudanhgia.tongdiemgv','DESC')
           ->orderby('ht96_giangvien.ten','DESC')
    			 ->get();
    	$Tieuchuan=Tieuchuan::where('hienthi',1)->orderby('stt')->get(); 
        $CT_danhgia=CT_danhgia::get();
        $Thongbaodanhgia=Thongbaodanhgia::orderby('stt')->get();
    			
    	 	return view('Admin.Bomon.Thongbaodanhgia.Danhsachdanhgia',['Danhsach'=>$danhsach,'Tieuchuan'=>$Tieuchuan,'CT_danhgia'=>$CT_danhgia,'Thongbaodanhgia'=>$Thongbaodanhgia]);
    	
    }

    public function getdanhgia($id_phieu){
          $Tieuchuan=Tieuchuan::where('hienthi',1)->get();             
          $Phieudanhgia=Phieudanhgia::find($id_phieu);
          if($Phieudanhgia->giangvien->bomon->id!=Session::get('user_department'))die('Bạn không có quyền truy cặp liên kết này');
          $lastdg=CT_danhgia::where('id_phieudanhgia',$id_phieu)->get();
          $sum=Phieudanhgia::find($id_phieu)->tongdiembm;
   return view('Admin.Bomon.Thongbaodanhgia.Danhgia',['Tieuchuan'=>$Tieuchuan,'Phieudanhgia'=>$Phieudanhgia,'last'=>$lastdg,'sum'=>$sum]);
    }
}
