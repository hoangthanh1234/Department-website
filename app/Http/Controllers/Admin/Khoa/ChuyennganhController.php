<?php

namespace App\Http\Controllers\Admin\Khoa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Chuyennganh;
use App\Models\Bomon;

class ChuyennganhController extends Controller
{
    public function getList($id){
    	$Chuyennganh = Chuyennganh::where('id_bomon',$id)->get();
    	$Bomon = Bomon::all();
    	return view('Admin.Khoa.Chuyennganh.List',['Chuyennganh' => $Chuyennganh,'Bomon' => $Bomon]);
    }

    public function getAdd(){
    	$Bomon = Bomon::all();
    	return view('Admin.Khoa.Chuyennganh.Add',['Bomon' => $Bomon]);
    }

    public function postAdd(Request $request){
    	$Chuyennganh=new Chuyennganh();  
    	$Chuyennganh->ten_vi=$request->ten_vi;
    	$Chuyennganh->ten_en=$request->ten_en;  
    	$Chuyennganh->id_bomon = $request->id_bomon;  
    	$Chuyennganh->save();
    	return redirect('set_admin/chuyen-nganh/list/'.$request->id_bomon)->with('thongbao','Thêm Thành Công');
    }

    public function getEdit($id){
    	$Chuyennganh=Chuyennganh::find($id);
    	$Bomon = Bomon::all();
    	return view('Admin.Khoa.Chuyennganh.Edit',['Chuyennganh'=>$Chuyennganh,'Bomon' => $Bomon]);
    }

    public function postEdit(Request $request,$id){
    	$Chuyennganh=Chuyennganh::find($id);    	
    	$Chuyennganh->ten_vi=$request->ten_vi;
    	$Chuyennganh->ten_en=$request->ten_en;  
    	$Chuyennganh->id_bomon = $request->id_bomon;  	
    	$Chuyennganh->save();
    	return redirect('set_admin/chuyen-nganh/edit/'.$id)->with('thongbao','Cập nhật Thành Công');
    }

     public function OneDelete($id){
    	 $Chuyennganh =Chuyennganh::find($id);
         $id_bomon = $Chuyennganh->id_bomon;
    	 $Chuyennganh->delete();
    	 return redirect('set_admin/chuyen-nganh/list/'.$id_bomon)->with('thongbao','Xóa Thành Công');
    }

    public function MultiDelete($id){    	
		$ids = explode(",", $id);
        $id_bomon = 0;
		for ($i=0; $i <count($ids) ; $i++) { 
		    $Chuyennganh =Chuyennganh::find($ids[$i]);
            $id_bomon = $Chuyennganh->id_bomon;
    	 	$Chuyennganh->delete();
		}		       
		return redirect('set_admin/chuyen-nganh/list/'.$id_bomon)->with('thongbao','Xóa Thành Công');   		

	}
}
