<?php

namespace App\Http\Controllers\Admin\Khoa;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\LKwebRequest;
use App\Http\Controllers\Controller;
use App\Models\LKweb;
use DateTime;

class LKwebController extends Controller
{
    public function getList(){
    	$LKweb=LKweb::orderby('stt')->get();
    	return view('Admin.Khoa.LKweb.List',['LKweb'=>$LKweb]);
    }

     public function getAdd(){
    	return view('Admin.Khoa.LKweb.Add');
    }


     public function postAdd(LKwebRequest $request){
    	$LKweb =new LKweb();
        $max=LKweb::max('id');
    	$LKweb->stt=$max+1;
    	$LKweb->hienthi=1;   	
    	$LKweb->ten_vi=$request->ten_vi;
    	$LKweb->ten_en=$request->ten_en;
    	$LKweb->link=$request->link; 
        $LKweb->type=$request->type;  	
    	if($request->hasFile('hinhanh')){
    		$file=$request->file('hinhanh');
    		$duoi=$file->getClientOriginalExtension();    		
    	 	 if($duoi!='jpg' && $duoi!='png' && $duoi!='jpeg' && $duoi!='JPG' && $duoi!='PNG' && $duoi!='JPEG'){
    		 	return redirect("set_admin/lkweb/add")->with('thongbao','Chỉ hỗ trợ file png, jpg, jpeg');
    	 	 }
    		$name=$file->getClientOriginalName();
    		$hinh=str_random(4)."_".$name;
    		while(file_exists("ht96_image/lkweb/".$hinh)){
    			$hinh=str_random(4)."_".$name;
    		}
    		$file->move("ht96_image/lkweb",$hinh);
    		$LKweb->hinhanh=$hinh;    		
    	}
    	else $LKweb->hinhanh="noimage.jpg";    
    	$LKweb->created_at=new DateTime();
    	$LKweb->save();
    	return redirect("set_admin/lkweb/list")->with('thongbao','Thêm thành công');
    }


    public function getEdit($id){
        $LKweb=LKweb::find($id);
        return view('Admin.Khoa.LKweb.Edit',['LKweb'=>$LKweb]);
    }

     public function postEdit(LKwebRequest $request,$id){
        $LKweb =LKweb::find($id);           	
    	$LKweb->ten_vi=$request->ten_vi;
    	$LKweb->ten_en=$request->ten_en;     	
    	$LKweb->link=$request->link;  
        $LKweb->type=$request->type;  	
    	if($request->hasFile('hinhanh')){
    		$file=$request->file('hinhanh');
    		$duoi=$file->getClientOriginalExtension();    		
    	 	 if($duoi!='jpg' && $duoi!='png' && $duoi!='jpeg' && $duoi!='JPG' && $duoi!='PNG' && $duoi!='JPEG'){
    		 	return redirect("set_admin/lkweb/add")->with('thongbao','Chỉ hỗ trợ file png, jpg, jpeg');
    	 	 }
    		$name=$file->getClientOriginalName();
    		$hinh=str_random(4)."_".$name;
    		while(file_exists("ht96_image/lkweb/".$hinh)){
    			$hinh=str_random(4)."_".$name;
    		}
    		$file->move("ht96_image/lkweb",$hinh);
    		if($LKweb->hinhanh!='noimage.jpg' && file_exists("ht96_image/lkweb/".$LKweb->hinhanh))
    		unlink("ht96_image/lkweb/".$LKweb->hinhanh);
    		$LKweb->hinhanh=$hinh;    	

    	}
    	
    	$LKweb->created_at=new DateTime();
    	$LKweb->save();
    	return redirect("set_admin/lkweb/edit/".$id)->with('thongbao','Sửa thành công');
    }

    public function OneDelete($id){
    	 $LKweb =LKweb::find($id);
    	 if($LKweb->hinhanh!='noimage.jpg' && file_exists("ht96_image/lkweb/".$LKweb->hinhanh))
    	   unlink("ht96_image/lkweb/".$LKweb->hinhanh);
    	 $LKweb->delete();
    	 return redirect("set_admin/lkweb/list")->with('thongbao','Xóa thành công');
    }

    public function MultiDelete($id){
		$ids = explode(",", $id);
		for ($i=0; $i <count($ids) ; $i++) { 
		    $LKweb =LKweb::find($ids[$i]);
            if($LKweb->hinhanh!='noimage.jpg' && file_exists("ht96_image/lkweb/".$LKweb->hinhanh))
		    unlink("ht96_image/lkweb/".$LKweb->hinhanh);
    	 	$LKweb->delete();
		}		       
		return redirect("set_admin/lkweb/list")->with('thongbao','Xóa thành công'); 
    		

	}
}
