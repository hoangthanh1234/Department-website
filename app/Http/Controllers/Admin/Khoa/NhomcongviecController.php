<?php

namespace App\Http\Controllers\Admin\Khoa;

use App\Http\Requests;
use App\Http\Requests\NhomcongviecRequest;
use App\Models\Nhomcongviec;
use App\Http\Controllers\Controller;
use DateTime;

class NhomcongviecController extends Controller
{
    public function getList(){
    	$Nhomcongviec = Nhomcongviec::all();
    	return view('Admin.Khoa.Nhomcongviec.List',['Nhomcongviec' => $Nhomcongviec]);
    }

    public function getAdd(){
    	return view('Admin.Khoa.Nhomcongviec.Add');
    }

    public function postAdd(NhomcongviecRequest $request){

    	$Nhomcongviec=new Nhomcongviec();  
    	$Nhomcongviec->ten=$request->ten; 
    	$Nhomcongviec->save();
    	return redirect('set_admin/nhomcongviec/list')->with('thongbao','Thêm Thành Công');
    }

    public function getEdit($id){
    	$Nhomcongviec=Nhomcongviec::find($id);
    	return view('Admin.Khoa.Nhomcongviec.Edit',['Nhomcongviec'=>$Nhomcongviec]);
    }

    public function postEdit(NhomcongviecRequest $request,$id){

    	$Nhomcongviec=Nhomcongviec::find($id);
    	$Nhomcongviec->ten=$request->ten; 
    	$Nhomcongviec->save();
    	return redirect('set_admin/nhomcongviec/edit/'.$id)->with('thongbao','Cập nhật Thành Công');
    }

     public function OneDelete($id){

    	 $Nhomcongviec =Nhomcongviec::find($id);
    	 $Nhomcongviec->delete();
    	 return redirect('set_admin/nhomcongviec/list')->with('thongbao','Xóa Thành Công');
    }

    public function MultiDelete($id){    	
		        $ids = explode(",", $id);
		        for ($i=0; $i <count($ids) ; $i++) { 
		        	 $Nhomcongviec =Nhomcongviec::find($ids[$i]);
    	 			 $Nhomcongviec->delete();
		        }		       
		       return redirect('set_admin/nhomcongviec/list')->with('thongbao','Xóa Thành Công');   		

	}
}
