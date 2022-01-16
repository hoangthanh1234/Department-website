<?php

namespace App\Http\Controllers\Admin\Khoa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Nhiemvunc;

class NhiemvuController extends Controller{
    
     public function getList(){
    	$Nhiemvu=Nhiemvunc::orderby('ten_vi')->get();
    	return view('Admin.Khoa.Nhiemvu.List',['Nhiemvu'=>$Nhiemvu]);
    }

    public function getAdd(){         	
    	return view('Admin.Khoa.Nhiemvu.Add');
    }

    public function postAdd(Request $request){
    	$Nhiemvu =new Nhiemvunc();  
    	$Nhiemvu->ten_vi=$request->ten_vi;
    	$Nhiemvu->ten_en=$request->ten_en;    		
    	$Nhiemvu->save();
    	return redirect('set_admin/nhom-nghien-cuu/nhiem-vu/list')->with('thongbao','Thêm thành công');
    }

    public function getEdit($id){            	
    	$Nhiemvu=Nhiemvunc::find($id);
    	return view('Admin.Khoa.Nhiemvu.Edit',['Nhiemvu' => $Nhiemvu]);
    }

    public function postEdit($id,Request $request){
    	$Nhiemvu=Nhiemvunc::find($id);
    	$Nhiemvu->ten_vi=$request->ten_vi;
    	$Nhiemvu->ten_en=$request->ten_en;
        $Nhiemvu->save();
    	return redirect('set_admin/nhom-nghien-cuu/nhiem-vu/edit/'.$id)->with('thongbao','Cập nhật thành công');
    }

    public function OneDelete($id){
        $Nhiemvu =Nhiemvunc::find($id);        
        $Nhiemvu->delete();
        return redirect("set_admin/nhom-nghien-cuu/nhiem-vu/list")->with('thongbao','Xóa thành công');
    }

    public function MultiDelete($id){        
        $ids = explode(",", $id);
        for ($i=0; $i <count($ids) ; $i++) { 
            $Nhiemvu =Nhiemvunc::find($ids[$i]);                    
            $Nhiemvu->delete();
        }              
        return redirect("set_admin/nhom-nghien-cuu/nhiem-vu/list")->with('thongbao','Xóa thành công');     
    }

    
}
