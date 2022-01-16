<?php

namespace App\Http\Controllers\Admin\Khoa;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\TrachnhiemdetaiRequest;
use App\Http\Controllers\Controller;
use App\Models\Trachnhiemdetai;
use DateTime;

class TrachnhiemdetaiController extends Controller
{
   public function getList(){
    	$Trachnhiemdetai = Trachnhiemdetai::orderby('stt')->get();
    	return view('Admin.Khoa.Trachnhiemdetai.List',['Trachnhiemdetai' => $Trachnhiemdetai]);
    }

    public function getAdd(){
    	return view('Admin.Khoa.Trachnhiemdetai.Add');
    }

    public function postAdd(TrachnhiemdetaiRequest $request){

    	$Trachnhiemdetai=new Trachnhiemdetai();
        $max=Trachnhiemdetai::max('id');
    	$Trachnhiemdetai->stt=$max+1;
    	$Trachnhiemdetai->ten_vi=$request->ten_vi;
    	$Trachnhiemdetai->ten_en=$request->ten_en;    	   	
    	$Trachnhiemdetai->created_at=new DateTime();
    	$Trachnhiemdetai->save();
    	return redirect('set_admin/trachnhiemdetai/list')->with('thongbao','Thêm Thành Công');
    }

    public function getEdit($id){
    	$Trachnhiemdetai=Trachnhiemdetai::find($id);
    	return view('Admin.Khoa.Trachnhiemdetai.Edit',['Trachnhiemdetai'=>$Trachnhiemdetai]);
    }

    public function postEdit(TrachnhiemdetaiRequest $request,$id){

    	$Trachnhiemdetai=Trachnhiemdetai::find($id);
    	$Trachnhiemdetai->ten_vi=$request->ten_vi;
    	$Trachnhiemdetai->ten_en=$request->ten_en;    	
    	$Trachnhiemdetai->save();
    	return redirect('set_admin/trachnhiemdetai/edit/'.$id)->with('thongbao','Cập nhật Thành Công');
    }

     public function OneDelete($id){

    	 $Trachnhiemdetai =Trachnhiemdetai::find($id);
    	 $Trachnhiemdetai->delete();
    	 return redirect('set_admin/trachnhiemdetai/list')->with('thongbao','Xóa Thành Công');
    }

    public function MultiDelete($id){    	
		        $ids = explode(",", $id);
		        for ($i=0; $i <count($ids) ; $i++) { 
		        	 $Trachnhiemdetai =Trachnhiemdetai::find($ids[$i]);
    	 			 $Trachnhiemdetai->delete();
		        }		       
		       return redirect('set_admin/trachnhiemdetai/list')->with('thongbao','Xóa Thành Công');   		

	}
}
