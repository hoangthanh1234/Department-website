<?php

namespace App\Http\Controllers\Admin\Khoa;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\SliderRequest;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use DateTime;

class SliderController extends Controller
{

    public function getList(){
         
        $Slider=Slider::orderby('stt')->get();
    	return view('Admin.Khoa.Slider.List',['Slider'=>$Slider]);
    }

    public function getAdd(){
    	return view('Admin.Khoa.Slider.Add');
    }

     public function postAdd(SliderRequest $request){
    	$Slider =new Slider();
        $max=Slider::max('id');
    	$Slider->stt=$max+1;
    	$Slider->hienthi=1;  	
    	$Slider->ten_vi=$request->ten_vi;
    	$Slider->ten_en=$request->ten_en;     	
    	$Slider->link=$request->link;   	
    	if($request->hasFile('hinhanh')){
    		$file=$request->file('hinhanh');
    		$duoi=$file->getClientOriginalExtension();    		
    	 	 if($duoi!='jpg' && $duoi!='png' && $duoi!='jpeg' && $duoi!='JPG' && $duoi!='PNG' && $duoi!='JPEG'){
    		 	return redirect("set_admin/slider/add")->with('thongbao','Chỉ hỗ trợ file png, jpg, jpeg');
    	 	 }
    		$name=$file->getClientOriginalName();
    		$hinh=str_random(4)."_".$name;
    		while(file_exists("ht96_image/slider/".$hinh)){
    			$hinh=str_random(4)."_".$name;
    		}
    		$file->move("ht96_image/slider",$hinh);
    		$Slider->hinhanh=$hinh;    		
    	}
    	else $Slider->hinhanh="noimage.jpg";    
    	$Slider->created_at=new DateTime();
    	$Slider->save();
    	return redirect("set_admin/slider/list")->with('thongbao','Thêm thành công');
    }


    public function getEdit($id){
        $Slider=Slider::find($id);
        return view('Admin.Khoa.Slider.Edit',['Slider'=>$Slider]);
    }

     public function postEdit(SliderRequest $request,$id){
        $Slider =Slider::find($id);   
    	$Slider->ten_vi=$request->ten_vi;
    	$Slider->ten_en=$request->ten_en;    	
    	$Slider->link=$request->link;   	
    	if($request->hasFile('hinhanh')){
    		$file=$request->file('hinhanh');
    		$duoi=$file->getClientOriginalExtension();    		
    	 	 if($duoi!='jpg' && $duoi!='png' && $duoi!='jpeg' && $duoi!='JPG' && $duoi!='PNG' && $duoi!='JPEG'){
    		 	return redirect("set_admin/slider/add")->with('thongbao','Chỉ hỗ trợ file png, jpg, jpeg');
    	 	 }
    		$name=$file->getClientOriginalName();
    		$hinh=str_random(4)."_".$name;
    		while(file_exists("ht96_image/slider/".$hinh)){
    			$hinh=str_random(4)."_".$name;
    		}
    		$file->move("ht96_image/slider",$hinh);
            if($Slider->hinhanh!='noimage.jpg' && file_exists("ht96_image/slider/".$Slider->hinhanh))
    		unlink("ht96_image/slider/".$Slider->hinhanh);
    		$Slider->hinhanh=$hinh;    	

    	}
    	
    	$Slider->created_at=new DateTime();
    	$Slider->save();
    	return redirect("set_admin/slider/edit/".$id)->with('thongbao','Sửa thành công');
    }

    public function OneDelete($id){
    	 $Slider =Slider::find($id);
         if(file_exists("ht96_image/slider/".$Slider->hinhanh))
    	   unlink("ht96_image/slider/".$Slider->hinhanh);
    	 $Slider->delete();
    	 return redirect("set_admin/slider/list")->with('thongbao','Xóa thành công');
    }

    public function MultiDelete($id){
    	
		$ids = explode(",", $id);
		for ($i=0; $i <count($ids) ; $i++) { 
		    $Slider =Slider::find($ids[$i]);
            if(file_exists("ht96_image/slider/".$Slider->hinhanh))
		    unlink("ht96_image/slider/".$Slider->hinhanh);
    	 	$Slider->delete();
		}		       
		return redirect("set_admin/slider/list")->with('thongbao','Xóa thành công'); 
    		

	}
}
