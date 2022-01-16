<?php

namespace App\Http\Controllers\Admin\Khoa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Loaiphongnc;

class LoaiphongController extends Controller{

    public function getList(){
    	$Loaiphong=Loaiphongnc::orderby('ten_vi')->get();
    	return view('Admin.Khoa.Loaiphong.List',['Loaiphong'=>$Loaiphong]);
    }

    public function getAdd(){         	
    	return view('Admin.Khoa.Loaiphong.Add');
    }

    public function postAdd(Request $request){

    	$Loaiphong =new Loaiphongnc();  
    	$Loaiphong->ten_vi=$request->ten_vi;
    	$Loaiphong->ten_en=$request->ten_en;    		
    	$Loaiphong->save();
    	return redirect('set_admin/nhom-nghien-cuu/loai-phong/list')->with('thongbao','Thêm thành công');
    }

    public function getEdit($id){            	
    	$Loaiphong=Loaiphongnc::find($id);
    	return view('Admin.Khoa.Loaiphong.Edit',['Loaiphong' => $Loaiphong]);
    }

    public function postEdit($id,Request $request){
    	$Loaiphong=Loaiphongnc::find($id);
    	$Loaiphong->ten_vi=$request->ten_vi;
    	$Loaiphong->ten_en=$request->ten_en;
        $Loaiphong->save();
    	return redirect('set_admin/nhom-nghien-cuu/loai-phong/edit/'.$id)->with('thongbao','Cập nhật thành công');
    }

    public function OneDelete($id){
        $Loaiphong =Loaiphongnc::find($id);        
        $Loaiphong->delete();
        return redirect("set_admin/nhom-nghien-cuu/loai-phong/list")->with('thongbao','Xóa thành công');
    }

    public function MultiDelete($id){        
        $ids = explode(",", $id);
        for ($i=0; $i <count($ids) ; $i++) { 
            $Loaiphong =Loaiphongnc::find($ids[$i]);                    
            $Loaiphong->delete();
        }              
        return redirect("set_admin/nhom-nghien-cuu/loai-phong/list")->with('thongbao','Xóa thành công'); 
            

    }
}
