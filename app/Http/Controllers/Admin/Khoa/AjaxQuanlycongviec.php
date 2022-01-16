<?php

namespace App\Http\Controllers\Admin\Khoa;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\AjaxRequest;
use App\Http\Controllers\Controller;
use App\Models\Phancongviec;
use App\Models\CT_phancongviec;
use App\Models\Giangvien;
use Mail;
use Session;
use Carbon\Carbon;

class AjaxQuanlycongviec extends Controller{

    public function themphancong(AjaxRequest $request){

    	$Phancongviec = new Phancongviec();
    	$Phancongviec->id_congviec=$request->id_congviec;
    	$Phancongviec->id_giangvien=$request->id_giangvien;
    	$Phancongviec->ngaybatdau=Carbon::createFromFormat('d/m/Y',$request->ngaybatdau)->format("Y/m/d");
    	$Phancongviec->ngayketthuc=Carbon::createFromFormat('d/m/Y',$request->ngayketthuc)->format("Y/m/d");
    	$Phancongviec->ngayhoanthanh=Carbon::createFromFormat('d/m/Y',$request->ngaybatdau)->format("Y/m/d");
    	$Phancongviec->trangthai=0;
    	$Phancongviec->ghichu=$request->ghichu;
    	$Phancongviec->taskmaster=Session::get('user_id');
    	$Phancongviec->save();

        $max = Phancongviec::max('id');        
        $Phancongviec = Phancongviec::find($max);
        Mail::send('Email.PhancongviecAdmin', array('Phancongviec' => $Phancongviec), function($message) use ($Phancongviec){
                $message->from('ktcn@tvu.edu.vn',"Khoa kỹ thuật và Công nghệ - Trường đại học trà vinh");
                $message->to($Phancongviec->giangvien->email)->subject('Thông báo phân công việc');
        });
    	echo "Thêm thành công";
    }

    public function capnhatphancong(AjaxRequest $request){
    	$Phancongviec = Phancongviec::find($request->id);
    	$Phancongviec->id_congviec=$request->id_congviec;
    	$Phancongviec->id_giangvien=$request->id_giangvien;
    	$Phancongviec->ngaybatdau=Carbon::createFromFormat('d/m/Y',$request->ngaybatdau)->format("Y/m/d");
    	$Phancongviec->ngayketthuc=Carbon::createFromFormat('d/m/Y',$request->ngayketthuc)->format("Y/m/d");
    	$Phancongviec->ngayhoanthanh=Carbon::createFromFormat('d/m/Y',$request->ngaybatdau)->format("Y/m/d");    	
    	$Phancongviec->ghichu=$request->ghichu;
    	$Phancongviec->save();

        $Phancongviec = Phancongviec::find($request->id);

    Mail::send('Email.PhancongvieccapnhatAdmin', array('Phancongviec' => $Phancongviec), function($message) use ($Phancongviec){
        $message->from('ktcn@tvu.edu.vn',"Khoa kỹ thuật và Công nghệ - Trường đại học trà vinh");
        $message->to($Phancongviec->giangvien->email)->subject('Thông báo cập nhật phân công việc');
    });

    	echo "Cập nhật thành công";
    }

    public function xoaphancong(AjaxRequest $request){
    	$Phancongviec=Phancongviec::find($request->id);
        $CT_phancongviec = CT_phancongviec::where('id_phancong',$Phancongviec->id)->delete();
    	$Phancongviec->delete();
    	echo "Xóa thành công";
    }

    public function goimail(AjaxRequest $request){
        $Phancongviec=Phancongviec::find($request->id);
        $Giangvien=Giangvien::find($Phancongviec->id_giangvien);

         Mail::send('Email.mailcanhbao', array('name'=>$Giangvien->ten,'congviec'=>$Phancongviec->congviec->ten,'canhbao' =>      $request->noidung), function($message) use ($Giangvien,$Phancongviec){
            $message->from('ktcn@tvu.edu.vn',"Khoa kỹ thuật và Công nghệ - Trường đại học trà vinh");
            $message->to($Giangvien->email,'---'.$Giangvien->ten)->subject('Cảnh báo việc thực hiện phân công công việc');
            });
         echo "Email đã được gởi";
    }

    public function duyetcap1($id){
        $Phancongviec = Phancongviec::find($id);
        $Phancongviec->trangthai=1;
        $Phancongviec->save();
        echo "Duyệt thành công";
    }

    public function huyduyetcap1($id){
        $Phancongviec = Phancongviec::find($id);
        $Phancongviec->trangthai=0;
        $Phancongviec->save();
        echo "Hũy duyệt thành công";
    }
}
