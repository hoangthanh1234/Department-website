<?php

namespace App\Http\Controllers\Admin\Khoa;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\AjaxRequest;
use App\Http\Controllers\Controller;
use App\Models\Bieumau;

class BieumauController extends Controller
{
    public function getList(){    
    	$Bieumau=Bieumau::orderby('stt')->get();
    	return view('Admin.Khoa.Bieumau.List',['Bieumau'=>$Bieumau]);
    }

    public function getAdd(){    	
    	return view('Admin.Khoa.Bieumau.Add');
    }

    public function postAdd(AjaxRequest $request){    	

	    	 if($request->hasFile('file')){
	    	 	$file=$request->file('file');	    	 	
	    	 		if($file->getClientSize()>5000000000000)
	    	 			return redirect('set_admin/bieumau/add')->with('thongbao','File có dung lượng quá lớn');

						$Bieumau=new Bieumau();
						$max=Bieumau::max('id');
						$Bieumau->stt=$max+1;
						$Bieumau->ten=$request->ten;

						$name=$file->getClientOriginalName();
						$tenbm = explode('.',$name);						
				        $hinh=str_random(4)."_".$tenbm[0];
				            while(file_exists("ht96_bieumau/".$hinh)){				            	
				                $hinh=str_random(4)."_".$tenbm[0];
				         	}
				        $file->move("ht96_bieumau",str_slug($hinh,"-").'.'.$tenbm[1]);
						$Bieumau->file=str_slug($hinh,"-").'.'.$tenbm[1];
						$Bieumau->save();
				
				return redirect('set_admin/bieumau/list')->with('thongbao','Thêm thành công vui lòng xem lại danh sách');
			}
			else return redirect('set_admin/bieumau/add')->with('thongbao','Vui lòng chọn file');
    }

    public function OneDelete($id){
    	 $Bieumau =Bieumau::find($id); 
    	 if(file_exists("ht96_bieumau/".$Bieumau->file))   	 
    	 	unlink("ht96_bieumau/".$Bieumau->file);   	 
    	 $Bieumau->delete();
    	 return redirect("set_admin/bieumau/list")->with('thongbao','Xóa thành công');
    }

    public function MultiDelete($id){
    	
		$ids = explode(",", $id);		       
		for ($i=0; $i <count($ids) ; $i++) { 
		    $Bieumau =Bieumau::find($ids[$i]);
		    if(file_exists("ht96_bieumau/".$Bieumau->file))
    	 		unlink("ht96_bieumau/".$Bieumau->file);
    	 		$Bieumau->delete();
		}		       
		return redirect("set_admin/bieumau/list")->with('thongbao','Xóa thành công'); 
    		

	} 

	

}
