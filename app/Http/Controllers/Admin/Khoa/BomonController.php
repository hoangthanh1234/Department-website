<?php

namespace App\Http\Controllers\Admin\Khoa;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\BomonRequest;
use App\Http\Controllers\Controller;
use App\Models\Bomon;
use App\Models\Khoa;
use DateTime;

class BomonController extends Controller
{
    
public function getList(){         
    $Bomon=Bomon::all();
    return view('Admin.Khoa.Bomon.List',['Bomon'=>$Bomon]);
}

public function getAdd(){
    $Khoa=Khoa::orderby('stt')->get();
    return view('Admin.Khoa.Bomon.Add',['Khoa'=>$Khoa]);
}

public function postAdd(BomonRequest $request){
    $Bomon =new Bomon();
    $max=Bomon::max('id');
    $Bomon->stt=$max+1;
    $Bomon->hienthi=1;    	
    $Bomon->ten_vi=$request->ten_vi;
    $Bomon->ten_en=$request->ten_en;
    $Bomon->email=$request->email;
    $Bomon->tenkhongdau_vi=str_slug($request->ten_vi,"-");
    $Bomon->tenkhongdau_en=str_slug($request->ten_en,"-"); 
    if($request->hasFile('hinhanh')){
        $file=$request->file('hinhanh');
        $duoi=$file->getClientOriginalExtension();          
        if($duoi!='jpg' && $duoi!='png' && $duoi!='jpeg' && $duoi!='JPG' && $duoi!='PNG' && $duoi!='JPEG'){
            return redirect("set_admin/bomon/add")->with('thongbao','Chỉ hỗ trợ file png, jpg, jpeg');
        }
        $name=$file->getClientOriginalName();
        $hinh=str_random(4)."_".$name;
        while(file_exists("ht96_image/bomon/".$hinh)){
            $hinh=str_random(4)."_".$name;
        }
        $file->move("ht96_image/bomon",$hinh);
        $Bomon->hinhanh=$hinh;         
        }
        else 
          $Bomon->hinhanh="noimage.jpg";  

    $Bomon->title_vi=$request->title_vi;
    $Bomon->title_en=$request->title_en;
    $Bomon->description_vi=$request->description_vi;
    $Bomon->description_en=$request->description_en;
    $Bomon->id_khoa=$request->id_khoa;      
    $Bomon->created_at=new DateTime();
    $Bomon->save();
    return redirect("set_admin/bomon/list")->with('thongbao','Thêm bộ môn thành công');
}


public function getEdit($id){
    $Bomon=Bomon::find($id);
    $Khoa=Khoa::orderby('stt')->get();
    return view('Admin.Khoa.Bomon.Edit',['Khoa'=>$Khoa,'Bomon'=>$Bomon]);
}

public function postEdit(BomonRequest $request,$id){
    $Bomon =Bomon::find($id);            
    $Bomon->ten_vi=$request->ten_vi;
    $Bomon->ten_en=$request->ten_en; 
    $Bomon->email=$request->email;
    $Bomon->tenkhongdau_vi=str_slug($request->ten_vi,"-");
    $Bomon->tenkhongdau_en=str_slug($request->ten_en,"-");    	
    if($request->hasFile('hinhanh')){
        $file=$request->file('hinhanh');
        $duoi=$file->getClientOriginalExtension();          
        if($duoi!='jpg' && $duoi!='png' && $duoi!='jpeg' && $duoi!='JPG' && $duoi!='PNG' && $duoi!='JPEG'){
            return redirect("set_admin/bomon/edit/".$id)->with('thongbao','Chỉ hỗ trợ file png, jpg, jpeg');
        }
        $name=explode('.',$file->getClientOriginalName());
        $hinh=str_random(4)."_".str_slug($name[0],'-').'.'.$name[1];
        while(file_exists("ht96_image/bomon/".$hinh)){
            $hinh=str_random(4)."_".$name;
        }
        $file->move("ht96_image/bomon",$hinh);
        if($Bomon->hinhanh!='noimage.jpg' && file_exists("ht96_image/bomon/".$Bomon->hinhanh))
        unlink("ht96_image/bomon/".$Bomon->hinhanh);
        $Bomon->hinhanh=$hinh;
        }
    $Bomon->title_vi=$request->title_vi;
    $Bomon->title_en=$request->title_en;
    $Bomon->description_vi=$request->description_vi;
    $Bomon->description_en=$request->description_en; 
    $Bomon->id_khoa=$request->id_khoa;   	
    $Bomon->created_at=new DateTime();
    $Bomon->save();
    return redirect("set_admin/bomon/edit/".$id)->with('thongbao','Cập nhật thành công');
}

public function OneDelete($id){
    $Bomon =Bomon::find($id);
    if($Bomon->hinhanh != 'noimage.jpg' && file_exists("ht96_image/bomon/".$Bomon->hinhanh)) 
    unlink("ht96_image/bomon/".$Bomon->hinhanh);   	 
    $Bomon->delete();
    return redirect("set_admin/bomon/list")->with('thongbao','Xóa thành công');
}

public function MultiDelete($id){    	
	$ids = explode(",", $id);
	for ($i=0; $i <count($ids) ; $i++) { 
		$Bomon =Bomon::find($ids[$i]);	
		if($Bomon->hinhanh != 'noimage.jpg' && file_exists("ht96_image/bomon/".$Bomon->hinhanh)){ 
    	 	unlink("ht96_image/bomon/".$Bomon->hinhanh);	  
    	}      	 
    	 $Bomon->delete();
	}		       
	return redirect("set_admin/bomon/list")->with('thongbao','Xóa thành công'); 
    		

}

}
