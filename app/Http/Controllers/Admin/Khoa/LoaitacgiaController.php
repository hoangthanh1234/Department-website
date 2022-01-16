<?php

namespace App\Http\Controllers\Admin\Khoa;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\LoaitacgiaRequest;
use App\Http\Controllers\Controller;
use App\Models\Loaitacgia;
use DateTime;

class LoaitacgiaController extends Controller
{
    public function getList(){
    	$Loaitacgia = Loaitacgia::orderby('stt')->get();
    	return view('Admin.Khoa.Loaitacgia.List',['Loaitacgia' => $Loaitacgia]);
    }

    public function getAdd(){
    	return view('Admin.Khoa.Loaitacgia.Add');
    }

    public function postAdd(LoaitacgiaRequest $request){

    	$Loaitacgia=new Loaitacgia();
        $max=Loaitacgia::max('id');
    	$Loaitacgia->stt=$max+1;
    	$Loaitacgia->ten_vi=$request->ten_vi;
    	$Loaitacgia->ten_en=$request->ten_en;
    	$Loaitacgia->phantram=$request->phantram;    	
    	$Loaitacgia->created_at=new DateTime();
    	$Loaitacgia->save();
    	return redirect('set_admin/loaitacgia/list')->with('thongbao','Thêm Thành Công');
    }

    public function getEdit($id){
    	$Loaitacgia=Loaitacgia::find($id);
    	return view('Admin.Khoa.Loaitacgia.Edit',['Loaitacgia'=>$Loaitacgia]);
    }

    public function postEdit(LoaitacgiaRequest $request,$id){

    	$Loaitacgia=Loaitacgia::find($id);
    	$Loaitacgia->ten_vi=$request->ten_vi;
    	$Loaitacgia->ten_en=$request->ten_en;
    	$Loaitacgia->phantram=$request->phantram; 
    	$Loaitacgia->save();
    	return redirect('set_admin/loaitacgia/edit/'.$id)->with('thongbao','Cập nhật thành Công');
    }

     public function OneDelete($id){

    	 $Loaitacgia =Loaitacgia::find($id);
    	 $Loaitacgia->delete();
    	 return redirect('set_admin/loaitacgia/list')->with('thongbao','Xóa Thành Công');
    }

    public function MultiDelete($id){    	
		$ids = explode(",", $id);
		for ($i=0; $i <count($ids) ; $i++) { 
		    $Loaitacgia =Loaitacgia::find($ids[$i]);
    	 	$Loaitacgia->delete();
		}		       
		return redirect('set_admin/loaitacgia/list')->with('thongbao','Xóa Thành Công');   		

	}
}
