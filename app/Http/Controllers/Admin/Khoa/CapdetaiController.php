<?php

namespace App\Http\Controllers\Admin\Khoa;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CapdetaiRequest;
use App\Http\Controllers\Controller;
use App\Models\Capdetai;

class CapdetaiController extends Controller
{
    public function getList(){
    	$Capdetai=Capdetai::orderby('created_at')->get();
    	return view('Admin.Khoa.Capdetai.List',['Capdetai'=>$Capdetai]);
    }

    public function getAdd(){

    	return view('Admin.Khoa.Capdetai.Add');
    }

    public function postAdd(CapdetaiRequest $request){
    	$Capdetai=new Capdetai();
    	$Capdetai->ten_vi=$request->ten_vi;
    	$Capdetai->ten_en=$request->ten_en;
    	$Capdetai->save();
    	return redirect('set_admin/capdetai/list')->with('thongbao','Thêm thành công');
    }

    public function getEdit($id){

    	$Capdetai=Capdetai::find($id);    
    	return view('Admin.Khoa.Capdetai.Edit',['Capdetai'=>$Capdetai]);
    }

    public function postEdit(CapdetaiRequest $request,$id){
    	$Capdetai=Capdetai::find($id);
    	$Capdetai->ten_vi=$request->ten_vi;
    	$Capdetai->ten_en=$request->ten_en;
    	$Capdetai->save();
    	return redirect('set_admin/capdetai/edit/'.$id)->with('thongbao','Cập nhật thành công');
    }

    public function OneDelete($id){

         $Capdetai =Capdetai::find($id);
         $Capdetai->delete();
         return redirect('set_admin/capdetai/list')->with('thongbao','Xóa Thành Công');
    }

    public function MultiDelete($id){       
                $ids = explode(",", $id);
                for ($i=0; $i <count($ids) ; $i++) { 
                     $Capdetai =Capdetai::find($ids[$i]);
                     $Capdetai->delete();
                }              
               return redirect('set_admin/capdetai/list')->with('thongbao','Xóa Thành Công');         

    }
}
