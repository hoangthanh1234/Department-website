<?php

namespace App\Http\Controllers\Admin\Khoa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Phongnc;
use App\Models\Loaiphongnc;

class PhongController extends Controller{
    
    public function getList($id){
    	$Phong = Phongnc::where('id_loaiphong',$id)->orderby('ma')->get();
        $Loaiphong = Loaiphongnc::orderby('ten_vi')->get();
    	return view('Admin.Khoa.Phong.List',['Phong' => $Phong,'Loaiphong' => $Loaiphong]);
    }

    public function getAdd(){
        $Loaiphong = Loaiphongnc::orderby('ten_vi')->get();
    	return view('Admin.Khoa.Phong.Add',['Loaiphong' => $Loaiphong]);
    }

    public function postAdd(Request $request){
    	$Phong=new Phongnc();       
    	$Phong->ma=$request->ma;
    	$Phong->soluong=$request->soluong;
    	$Phong->id_loaiphong=$request->id_loaiphong;    	
    	$Phong->save();
    	return redirect('set_admin/nhom-nghien-cuu/phong/list/'.$request->id_loaiphong)->with('thongbao','Thêm Thành Công');
    }

    public function getEdit($id){
        $Loaiphong = Loaiphongnc::orderby('ten_vi')->get();
    	$Phong=Phongnc::find($id);
    	return view('Admin.Khoa.Phong.Edit',['Phong'=>$Phong,'Loaiphong' => $Loaiphong]);
    }

    public function postEdit(Request $request,$id){
    	$Phong=Phongnc::find($id);
    	$Phong->ma=$request->ma;
        $Phong->soluong=$request->soluong;
        $Phong->id_loaiphong=$request->id_loaiphong; 
    	$Phong->save();
    	return redirect('set_admin/nhom-nghien-cuu/phong/edit/'.$id)->with('thongbao','Cập nhật Thành Công');
    }

     public function OneDelete($id){
    	$Phong =Phongnc::find($id);
        $loai = $Phong->id_loaiphong;
    	$Phong->delete();
    	return redirect('set_admin/nhom-nghien-cuu/phong/list/'.$loai)->with('thongbao','Xóa Thành Công');
    }

    public function MultiDelete($id){    	
		$ids = explode(",", $id);$loai = 0;
		for ($i=0; $i <count($ids) ; $i++){ 
		    $Phong =Phongnc::find($ids[$i]);
            $loai = $Phong->id_loaiphong;
    	 	$Phong->delete();
		}		       
		 return redirect('set_admin/nhom-nghien-cuu/phong/list/'.$loai)->with('thongbao','Xóa Thành Công');   		

	}
}
