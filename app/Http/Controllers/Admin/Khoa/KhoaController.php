<?php

namespace App\Http\Controllers\Admin\Khoa;

use App\Http\Requests;
use App\Http\Requests\KhoaRequest;
use App\Models\Khoa;
use App\Http\Controllers\Controller;
use DateTime;

class KhoaController extends Controller
{
    public function getList(){
    	$Khoa = Khoa::orderby('stt')->get();
    	return view('Admin.Khoa.Khoa.List',['Khoa' => $Khoa]);
    }

    public function getAdd(){
    	return view('Admin.Khoa.Khoa.Add');
    }

    public function postAdd(KhoaRequest $request){

    	$Khoa=new Khoa();
        $max=Khoa::max('id');
    	$Khoa->stt=$max+1;
    	$Khoa->ten_vi=$request->ten_vi;
    	$Khoa->ten_en=$request->ten_en;
    	$Khoa->tenkhongdau_vi=str_slug($request->ten_vi,"-");
    	$Khoa->tenkhongdau_en=str_slug($request->ten_en,"-");
    	$Khoa->created_at=new DateTime();
    	$Khoa->save();
    	return redirect('set_admin/khoa/list')->with('thongbao','Thêm Thành Công');
    }

    public function getEdit($id){
    	$Khoa=Khoa::find($id);
    	return view('Admin.Khoa.Khoa.Edit',['Khoa'=>$Khoa]);
    }

    public function postEdit(KhoaRequest $request,$id){

    	$Khoa=Khoa::find($id);
    	$Khoa->ten_vi=$request->ten_vi;
    	$Khoa->ten_en=$request->ten_en;
    	$Khoa->tenkhongdau_vi=str_slug($request->ten_vi,"-");
    	$Khoa->tenkhongdau_en=str_slug($request->ten_en,"-");
    	$Khoa->save();
    	return redirect('set_admin/khoa/edit/'.$id)->with('thongbao','Cập nhật Thành Công');
    }

     public function OneDelete($id){

    	 $Khoa =Khoa::find($id);
    	 $Khoa->delete();
    	 return redirect('set_admin/khoa/list')->with('thongbao','Xóa Thành Công');
    }

    public function MultiDelete($id){    	
		$ids = explode(",", $id);
		for ($i=0; $i <count($ids) ; $i++) { 
		        	 $Khoa =Khoa::find($ids[$i]);
    	 			 $Khoa->delete();
		        }		       
		       return redirect('set_admin/khoa/list')->with('thongbao','Xóa Thành Công');   		

	}
}
