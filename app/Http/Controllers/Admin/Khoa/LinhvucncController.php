<?php

namespace App\Http\Controllers\Admin\Khoa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Linhvucnc;

class LinhvucncController extends Controller{
   	
   	public function getList(){
    	$Linhvuc=Linhvucnc::orderby('ten_vi')->get();
    	return view('Admin.Khoa.Linhvuc.List',['Linhvuc'=>$Linhvuc]);
    }

    public function getAdd(){         	
    	return view('Admin.Khoa.Linhvuc.Add');
    }

    public function postAdd(Request $request){

    	$Linhvuc =new Linhvucnc();  
    	$Linhvuc->ten_vi=$request->ten_vi;
    	$Linhvuc->ten_en=$request->ten_en; 
    	$Linhvuc->mota_vi = $request->mota_vi;
    	$Linhvuc->mota_en = $request->mota_en;   		
    	$Linhvuc->save();
    	return redirect('set_admin/nhom-nghien-cuu/linh-vuc/list')->with('thongbao','Thêm thành công');
    }

    public function getEdit($id){            	
    	$Linhvuc=Linhvucnc::find($id);
    	return view('Admin.Khoa.Linhvuc.Edit',['Linhvuc' => $Linhvuc]);
    }

    public function postEdit($id,Request $request){
    	$Linhvuc=Linhvucnc::find($id);
    	$Linhvuc->ten_vi=$request->ten_vi;
    	$Linhvuc->ten_en=$request->ten_en; 
    	$Linhvuc->mota_vi = $request->mota_vi;
    	$Linhvuc->mota_en = $request->mota_en;
        $Linhvuc->save();
    	return redirect('set_admin/nhom-nghien-cuu/linh-vuc/edit/'.$id)->with('thongbao','Cập nhật thành công');
    }

    public function OneDelete($id){
        $Linhvuc =Linhvucnc::find($id);        
        $Linhvuc->delete();
        return redirect("set_admin/nhom-nghien-cuu/linh-vuc/list")->with('thongbao','Xóa thành công');
    }

    public function MultiDelete($id){        
        $ids = explode(",", $id);
        for ($i=0; $i <count($ids) ; $i++) { 
            $Linhvuc =Linhvucnc::find($ids[$i]);                    
            $Linhvuc->delete();
        }              
        return redirect("set_admin/nhom-nghien-cuu/linh-vuc/list")->with('thongbao','Xóa thành công'); 
            

    }
}
