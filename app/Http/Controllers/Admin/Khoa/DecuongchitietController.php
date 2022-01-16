<?php

namespace App\Http\Controllers\Admin\Khoa;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\AjaxRequest;
use App\Http\Controllers\Controller;
use App\Models\Decuongchitiet;
use App\Models\Bomon;
use App\Models\Lop;

class DecuongchitietController extends Controller{
    public function getList($id){
    	$Bomon=Bomon::all();
    	$Lop=Lop::all();
    	$Decuongchitiet=Decuongchitiet::where('id_lop',$id)->orderby('stt')->get();
    	return view('Admin.Khoa.Decuongchitiet.List',['Bomon'=>$Bomon,'Lop'=>$Lop,'Decuongchitiet'=>$Decuongchitiet]);
    }

    public function getAdd(){
    	$Bomon=Bomon::all();
    	$Lop=Lop::all();
    	return view('Admin.Khoa.Decuongchitiet.Add',['Bomon'=>$Bomon,'Lop'=>$Lop]);
    }

    public function postAdd(AjaxRequest $request){    	

	    	 if($request->hasFile('files')){
	    	 	$files=$request->file('files');
	    	 	foreach($files as $file){
	    	 		if($file->getClientSize()>5000000000000)
	    	 			return redirect('set_admin/decuongchitiet/add')->with('thongbao','File có dung lượng quá lớn');
	    	 		if($file->getClientOriginalExtension()!="pdf" && $file->getClientOriginalExtension()!="PDF")
	    	 			return redirect('set_admin/decuongchitiet/add')->with('thongbao','Chỉ hỗ trợ file PDF');
	    	 	}

				foreach($files as $file){

						$Decuongchitiet=new Decuongchitiet();
						$Decuongchitiet->id_lop=$request->id_lop;
						$name=$file->getClientOriginalName();
						$duoi = $file->getClientOriginalExtension();
				        $hinh=str_random(4)."_".$name.'.'.$duoi;

				            while(file_exists("ht96_decuongchitiet/".$hinh)){				            	
				                $hinh=str_random(4)."_".$name;
				         	}
				         
				         $Decuongchitiet->ten=$hinh;	
				         $file->move("ht96_decuongchitiet",str_slug($hinh,"-"));
				         $Decuongchitiet->file=str_slug($hinh,"-");			
						 $Decuongchitiet->save();
				}
				return redirect('set_admin/decuongchitiet/list/'.$request->id_lop)->with('thongbao','Thêm thành công');
			}
			else return redirect('set_admin/decuongchitiet/add')->with('thongbao','Vui lòng chọn file');
    }


    public function OneDelete($id){
    	 $Decuongchitiet =Decuongchitiet::find($id);  
    	  if(file_exists("ht96_Decuongchitiet/".$Decuongchitiet->file))  	 
    	 	unlink("ht96_decuongchitiet/".$Decuongchitiet->file);   	 
    	 $Decuongchitiet->delete();
    	 return redirect("set_admin/decuongchitiet/list/".$Decuongchitiet->id_lop)->with('thongbao','Xóa thành công');
    }

    public function MultiDelete($id){
    	
		        $ids = explode(",", $id);
		        $l=0;
		        for ($i=0; $i <count($ids) ; $i++) { 
		        	 $Decuongchitiet =Decuongchitiet::find($ids[$i]);
		        	 if(file_exists("ht96_decuongchitiet/".$Decuongchitiet->file)) 
    	 			  unlink("ht96_decuongchitiet/".$Decuongchitiet->file);
    	 			  $Decuongchitiet->delete();
    	 			  $l=$Decuongchitiet->id_lop;
		        }		       
		        return redirect("set_admin/decuongchitiet/list/".$l)->with('thongbao','Xóa thành công'); 
    		

	} 
}
