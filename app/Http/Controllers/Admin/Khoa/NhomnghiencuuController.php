<?php

namespace App\Http\Controllers\Admin\Khoa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Nhomnc;
use App\Models\CT_nhomnc;
use App\Models\Phancongbaocaonc;
use Carbon\Carbon;

class NhomnghiencuuController extends Controller{
    
    public function getList(){
    	$Nhom = Nhomnc::orderby('trangthai','DESC')->get();
    	return view('Admin.Khoa.Nhomnghiencuu.List',['Nhom' => $Nhom]);    	
    }

     public function xoa($id_nhom){
    	$Nhom = Nhomnc::find($id_nhom);
      $Nhom->trangthai = 0;    
    	return redirect('set_admin/nhom-nghien-cuu/danh-sach-nhom');
    }

    public function chitietnhom($id_nhom){
    	$Nhom = Nhomnc::find($id_nhom);
    	return view('Admin.Khoa.Nhomnghiencuu.Chitiet',['Nhom' => $Nhom]);
    }

    public function danhsachthanhvien($id){
        $Nhom = Nhomnc::find($id);
        $CT_nhom = CT_nhomnc::where('id_nhom',$id)->get();
        return view('Admin.Khoa.Nhomnghiencuu.Danhsachthanhvien',['CT_nhom' => $CT_nhom,'Nhom' => $Nhom]);
    }

    public function baocaochuyende(){
        $Phancongbaocao = Phancongbaocaonc::orderby('created_at')->get();
        return view('Admin.Khoa.Nhomnghiencuu.Baocao',['Phancongbaocao' => $Phancongbaocao]);
    }

    public function baocaohangthang(){
         $now = Carbon::now();
         $year =  $now->year;
         $month =  $now->month;

         $Phancongbaocao = Phancongbaocaonc::whereMonth('ngaybaocao',$month)->whereYear('ngaybaocao',$year)->orderby('created_at')->get();
          return view('Admin.Khoa.Nhomnghiencuu.Baocao',['Phancongbaocao' => $Phancongbaocao]);
    }

}
