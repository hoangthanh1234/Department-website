<?php

namespace App\Http\Controllers\Admin\Khoa;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\AjaxRequest;
use App\Http\Controllers\Controller;
use App\Models\Ketquathi;
use App\Models\Bomon;
use App\Models\Lop;

class KetquathiController extends Controller
{
    public function getList($id){
    	$Bomon=Bomon::all();
    	$Lop=Lop::all();
    	$Ketquathi=Ketquathi::where('id_lop',$id)->orderby('stt')->get();
    	return view('Admin.Khoa.Ketquathi.List',['Bomon'=>$Bomon,'Lop'=>$Lop,'Ketquathi'=>$Ketquathi]);
    }

    public function getAdd(){
    	$Bomon=Bomon::all();
    	$Lop=Lop::all();
    	return view('Admin.Khoa.Ketquathi.Add',['Bomon'=>$Bomon,'Lop'=>$Lop]);
    }

    public function postAdd(AjaxRequest $request){    	

	    	 if($request->hasFile('files')){
	    	 	$files=$request->file('files');
	    	 	foreach($files as $file){
	    	 		if($file->getClientSize()>5000000000000)
	    	 			return redirect('set_admin/ketquathi/add')->with('thongbao','File có dung lượng quá lớn');
	    	 		if($file->getClientOriginalExtension()!="pdf" && $file->getClientOriginalExtension()!="PDF")
	    	 			return redirect('set_admin/ketquathi/add')->with('thongbao','Chỉ hỗ trợ file PDF');
	    	 	}

				foreach($files as $file){

						$ketquathi=new Ketquathi();
						$ketquathi->id_lop=$request->id_lop;
						$name=$file->getClientOriginalName();
				        $hinh=str_random(4)."_".$name;
				            while(file_exists("ht96_ketquathi/".$hinh)){				            	
				                $hinh=str_random(4)."_".$name;
				         	}
				         
				         $ketquathi->ten=$hinh;	
				         $file->move("ht96_ketquathi",str_slug($hinh,"-"));
				         $ketquathi->file=str_slug($hinh,"-");			
						 $ketquathi->save();
				}
				return redirect('set_admin/ketquathi/list/'.$request->id_lop)->with('thongbao','Thêm thành công');
			}
			else return redirect('set_admin/ketquathi/add')->with('thongbao','Vui lòng chọn file');
    }


    public function OneDelete($id){
    	 $Ketquathi =Ketquathi::find($id);  
    	  if(file_exists("ht96_ketquathi/".$Ketquathi->file))  	 
    	 	unlink("ht96_ketquathi/".$Ketquathi->file);   	 
    	 $Ketquathi->delete();
    	 return redirect("set_admin/ketquathi/list/".$Ketquathi->id_lop)->with('thongbao','Xóa thành công');
    }

    public function MultiDelete($id){
    	
		        $ids = explode(",", $id);
		        $l=0;
		        for ($i=0; $i <count($ids) ; $i++) { 
		        	 $Ketquathi =Ketquathi::find($ids[$i]);
		        	 if(file_exists("ht96_ketquathi/".$Ketquathi->file)) 
    	 			  unlink("ht96_ketquathi/".$Ketquathi->file);
    	 			  $Ketquathi->delete();
    	 			  $l=$Ketquathi->id_lop;
		        }		       
		        return redirect("set_admin/ketquathi/list/".$l)->with('thongbao','Xóa thành công'); 
    		

	} 
}




