<?php

namespace App\Http\Controllers\Admin\Khoa;

use App\Http\Requests;
use App\Http\Requests\CongviecRequest;
use App\Models\Congviec;
use App\Models\CT_phancongviec;
use App\Models\Phancongviec;
use App\Models\Nhomcongviec;
use App\Models\Giangvien;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DateTime;
use Session;


class CongviecController extends Controller
{
   public function getList(){
         
        $Congviec=Congviec::all();
        $Chuabatdau = Congviec::where('trangthai',0)->get();
        $Nhomcongviec = Nhomcongviec::orderby('created_at')->get();
        return view('Admin.Khoa.Congviec.List',['Congviec'=>$Congviec,'Chuabatdau'=>$Chuabatdau,'Nhomcongviec' => $Nhomcongviec]);
    }

    public function getAdd(){
        $Nhomcongviec=Nhomcongviec::orderby('id')->get();
        $Giangvien = Giangvien::where('id_bomon','<>',7)->orderby('ten')->get();
        return view('Admin.Khoa.Congviec.Add',['Nhomcongviec'=>$Nhomcongviec,'Giangvien' => $Giangvien]);
    }

     public function postAdd(CongviecRequest $request){

        $Congviec =new Congviec();  
        $Congviec->ten=$request->ten;    
        $Congviec->noidung=$request->noidung;  
        $Congviec->ngaybatdau= Carbon::createFromFormat('d/m/Y',$request->ngaybatdau)->format("Y/m/d");
        $Congviec->ngayketthuc= Carbon::createFromFormat('d/m/Y',$request->ngayketthuc)->format("Y/m/d");
        $Congviec->ngayhoanthanh= Carbon::createFromFormat('d/m/Y',$request->ngaybatdau)->format("Y/m/d");
        $Congviec->trangthai=0;        
        $Congviec->ghichu = $request->ghichu;      
        $Congviec->taskmaster = Session::get('user_id');   
        $Congviec->id_nhomcongviec=$request->id_nhomcongviec;
        $Congviec->id_giangvien = $request->id_giangvien;
        $Congviec->save();
        return redirect("set_admin/congviec/list")->with('thongbao','Thêm công việc thành công');
    }


    public function getEdit($id){
        $Congviec=Congviec::find($id);
        $Giangvien = Giangvien::where('id_bomon','<>',7)->orderby('ten')->get();
        $Nhomcongviec=Nhomcongviec::orderby('id')->get();
        return view('Admin.Khoa.Congviec.Edit',['Congviec'=>$Congviec,'Nhomcongviec'=>$Nhomcongviec,'Giangvien' => $Giangvien]);
    }

     public function postEdit(CongviecRequest $request,$id){
        $Congviec =Congviec::find($id);            
        $Congviec->ten=$request->ten;    
        $Congviec->noidung=$request->noidung;  
        $Congviec->ngaybatdau= Carbon::createFromFormat('d/m/Y',$request->ngaybatdau)->format("Y/m/d");
        $Congviec->ngayketthuc= Carbon::createFromFormat('d/m/Y',$request->ngayketthuc)->format("Y/m/d");
        $Congviec->ghichu = $request->ghichu;      
        $Congviec->taskmaster = Session::get('user_id');   
        $Congviec->id_nhomcongviec=$request->id_nhomcongviec;
        $Congviec->id_giangvien = $request->id_giangvien;
        $Congviec->save();
        return redirect("set_admin/congviec/edit/".$id)->with('thongbao','Cập nhật thành công');
    }

    public function OneDelete($id){
         $Congviec = Congviec::find($id);    
         $CT_phancongviec = CT_phancongviec::where('id_phancong',$id)->delete();                
         $Congviec->delete();
         return redirect("set_admin/congviec/list")->with('thongbao','Xóa thành công');
    }

    public function MultiDelete($id){
        
        $ids = explode(",", $id);
        for ($i=0; $i <count($ids) ; $i++) { 
            $Congviec =Congviec::find($ids[$i]);     
            $CT_phancongviec = CT_phancongviec::where('id_phancong',$Congviec->id)->delete();                           
            $Congviec->delete();
        }              
        return redirect("set_admin/congviec/list")->with('thongbao','Xóa thành công'); 
    }

    public function getChitietgiangvien($ten,$id){
        $Nhomcongviec = Nhomcongviec::whereHas('phancongviec',function($query)use($id){
                                        $query->where('id_giangvien',$id);
                                    })->get();
        $Giangvien = Giangvien::find($id);
        return view('Admin.Khoa.Congviec.Chitietgiangvien',['Nhomcongviec' => $Nhomcongviec,'Giangvien' => $Giangvien]);
    }

}
