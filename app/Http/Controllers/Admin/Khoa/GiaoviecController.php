<?php

namespace App\Http\Controllers\Admin\Khoa;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\GiaoviecRequest;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\Congviec;
use App\Models\Phancongviec;
use App\Models\Giangvien;
use DateTime;

class GiaoviecController extends Controller
{
    public function getList(){
    	$Phancongviec=Phancongviec::all();
    	$Viechoanthanh=Phancongviec::where('trangthai',1)->get();    	
    	$Viectrehan=Phancongviec::where('trangthai',0)->where('ngayketthuc','<',date("Y-m-d"))->get();
    	$Congviec=Congviec::where('trangthai',0)->get();
    	$Giangvien=Giangvien::where('id_bomon','<>',7)->get();
    	return view('Admin.Khoa.Phancongviec.List',['Phancongviec'=>$Phancongviec,'Congviec'=>$Congviec,'Giangvien'=>$Giangvien,'Viechoanthanh' => $Viechoanthanh,'Viectrehan'=>$Viectrehan]);
    }

    public function getListid($id){

    }
}
