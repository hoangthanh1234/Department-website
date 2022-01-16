<?php

namespace App\Http\Controllers\Admin\Khoa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Quanlyduan;
use App\Http\Requests\AjaxRequest;
use DateTime;

class QuanlyduanController extends Controller{
    
    public function getList(){
    	$Quanlyduan = Quanlyduan::orderby('created_at','DESC')->get();
    	return view('Admin.Khoa.Quanlyduan.List',['Quanlyduan' => $Quanlyduan]);
    }

    public function getAdd(){
    	
    	return view('Admin.Khoa.Quanlyduan.Add');
    }

    public function postAdd(AjaxRequest $request){

    	$Quanlyduan =new Quanlyduan();
    	$Quanlyduan->ten_vi=$request->ten_vi;
    	$Quanlyduan->ten_en=$request->ten_en;
    	$Quanlyduan->tenkhongdau_vi=str_slug($request->ten_vi,"-");
    	$Quanlyduan->tenkhongdau_en=str_slug($request->ten_en,"-");
        $Quanlyduan->noidung_vi=$request->noidung_vi;
        $Quanlyduan->noidung_en=$request->noidung_en;
              
        if($request->hasFile('hinhanh')){
            $file=$request->file('hinhanh');
            $duoi=$file->getClientOriginalExtension();          
             if($duoi!='jpg' && $duoi!='png' && $duoi!='jpeg' && $duoi!='JPG' && $duoi!='PNG' && $duoi!='JPEG'){
                return redirect("set_admin/qlduan/add")->with('thongbao','Chỉ hỗ trợ file png, jpg, jpeg');
             }
            $name=$file->getClientOriginalName();
            $hinh=str_random(4)."_".$name;
            while(file_exists("ht96_image/qlduan/".$hinh)){
                $hinh=str_random(4)."_".$name;
            }
            $file->move("ht96_image/qlduan",$hinh);
            $Quanlyduan->hinhanh=$hinh;         
        }
        else $Quanlyduan->hinhanh="noimage.jpg";             
    	$Quanlyduan->created_at=new DateTime();
    	$Quanlyduan->save();
    	return redirect("set_admin/qlduan/list")->with('thongbao','Thêm thành công');
    }

    public function getEdit($id){      
        $Quanlyduan=Quanlyduan::find($id);
        return view('Admin.Khoa.Quanlyduan.Edit',['Quanlyduan'=>$Quanlyduan]);
    }

     public function postEdit(AjaxRequest $request,$id){
        $Quanlyduan =Quanlyduan::find($id);        
        $Quanlyduan->ten_vi=$request->ten_vi;
    	$Quanlyduan->ten_en=$request->ten_en;
    	$Quanlyduan->tenkhongdau_vi=str_slug($request->ten_vi,"-");
    	$Quanlyduan->tenkhongdau_en=str_slug($request->ten_en,"-");
        $Quanlyduan->noidung_vi=$request->noidung_vi;
        $Quanlyduan->noidung_en=$request->noidung_en;
        if($request->hasFile('hinhanh')){
            $file=$request->file('hinhanh');
            $duoi=$file->getClientOriginalExtension();          
             if($duoi!='jpg' && $duoi!='png' && $duoi!='jpeg' && $duoi!='JPG' && $duoi!='PNG' && $duoi!='JPEG'){
                return redirect("set_admin/qlduan/edit/".$id)->with('thongbao','Chỉ hỗ trợ file png, jpg, jpeg');
             }
            $name=explode('.',$file->getClientOriginalName());
            $hinh=str_random(4)."_".str_slug($name[0],'-').'.'.$name[1];
            while(file_exists("ht96_image/qlduan/".$hinh)){
                $hinh=str_random(4)."_".$name;
            }
            $file->move("ht96_image/qlduan",$hinh);
            if($Quanlyduan->hinhanh!='noimage.jpg' && file_exists("ht96_image/qlduan/".$Quanlyduan->hinhanh))
                unlink("ht96_image/qlduan/".$Quanlyduan->hinhanh);
                    
            $Quanlyduan->hinhanh=$hinh;         
        }      
        
        $Quanlyduan->updated_at=new DateTime();
        $Quanlyduan->save();
        return redirect("set_admin/qlduan/edit/".$id)->with('thongbao','Cập nhật thành công');
    }

    public function OneDelete($id){
    	 $Quanlyduan =Quanlyduan::find($id);
         if(file_exists("ht96_image/qlduan/".$Quanlyduan->hinhanh))         	
    	   unlink("ht96_image/qlduan/".$Quanlyduan->hinhanh);         
    	 $Quanlyduan->delete();
    	return redirect("set_admin/qlduan/list")->with('thongbao','Xóa thành công');
    }

    public function MultiDelete($id){
    	
		$ids = explode(",", $id);
		for ($i=0; $i <count($ids) ; $i++) { 
		    $Quanlyduan =Quanlyduan::find($ids[$i]);
            if(file_exists("ht96_image/qlduan/".$Quanlyduan->hinhanh))
		    unlink("ht96_image/qlduan/".$Quanlyduan->hinhanh);
    	 	$Quanlyduan->delete();
		}		       
		return redirect("set_admin/qlduan/list")->with('thongbao','Xóa thành công'); 
    		

	}

}
