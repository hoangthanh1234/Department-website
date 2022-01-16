<?php

namespace App\Http\Controllers\Admin\Khoa;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\LoaibaibaoRequest;
use App\Http\Controllers\Controller;
use App\Models\Loaibaibao;
use DateTime;

class LoaibaibaoController extends Controller
{
    public function getList(){
    	$Loaibaibao = Loaibaibao::orderby('stt')->get();
    	return view('Admin.Khoa.Loaibaibao.List',['Loaibaibao' => $Loaibaibao]);
    }

    public function getAdd(){
    	return view('Admin.Khoa.Loaibaibao.Add');
    }

    public function postAdd(LoaibaibaoRequest $request){

    	$Loaibaibao=new Loaibaibao();
        $max=Loaibaibao::max('id');
    	$Loaibaibao->stt=$max+1;
    	$Loaibaibao->ten_vi=$request->ten_vi;
    	$Loaibaibao->ten_en=$request->ten_en;
    	$Loaibaibao->tenkhongdau_vi=str_slug($request->ten_vi,"-");
    	$Loaibaibao->tenkhongdau_en=str_slug($request->ten_en,"-");
    	$Loaibaibao->created_at=new DateTime();
    	$Loaibaibao->save();
    	return redirect('set_admin/loaibaibao/list')->with('thongbao','Thêm Thành Công');
    }

    public function getEdit($id){
    	$Loaibaibao=Loaibaibao::find($id);
    	return view('Admin.Khoa.Loaibaibao.Edit',['Loaibaibao'=>$Loaibaibao]);
    }

    public function postEdit(LoaibaibaoRequest $request,$id){

    	$Loaibaibao=Loaibaibao::find($id);
    	$Loaibaibao->ten_vi=$request->ten_vi;
    	$Loaibaibao->ten_en=$request->ten_en;
    	$Loaibaibao->tenkhongdau_vi=str_slug($request->ten_vi,"-");
    	$Loaibaibao->tenkhongdau_en=str_slug($request->ten_en,"-");
    	$Loaibaibao->save();
    	return redirect('set_admin/loaibaibao/edit/'.$id)->with('thongbao','Cập nhật thành Công');
    }

     public function OneDelete($id){

    	 $Loaibaibao =Loaibaibao::find($id);
    	 $Loaibaibao->delete();
    	 return redirect('set_admin/loaibaibao/list')->with('thongbao','Xóa Thành Công');
    }

    public function MultiDelete($id){    	
		        $ids = explode(",", $id);
		        for ($i=0; $i <count($ids) ; $i++) { 
		        	 $Loaibaibao =Loaibaibao::find($ids[$i]);
    	 			 $Loaibaibao->delete();
		        }		       
		       return redirect('set_admin/loaibaibao/list')->with('thongbao','Xóa Thành Công');   		

	}
}
