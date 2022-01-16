<?php

namespace App\Http\Controllers\Admin\Khoa;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\DanhmucthongbaoRequest;
use App\Http\Controllers\Controller;
use App\Models\Dm_thongbao;
use App\Models\Thongbao;
use DateTime;

class DanhmucthongbaoController extends Controller
{
    public function getList(){
    	$Dm_thongbao=Dm_thongbao::orderby('stt')->get();
    	return view('Admin.Khoa.Thongbao.Danhmuc.List',['Dm_thongbao'=>$Dm_thongbao]);
    }

    public function getAdd(){
    	return view('Admin.Khoa.Thongbao.Danhmuc.Add');
    }

    public function postAdd(DanhmucthongbaoRequest $request){
    	$Dm_thongbao=new Dm_thongbao();
    	$max=Dm_thongbao::max('id');
    	$Dm_thongbao->stt=$max+1;
    	$Dm_thongbao->hienthi=1;
    	$Dm_thongbao->ten_vi=$request->ten_vi;
    	$Dm_thongbao->ten_en=$request->ten_en;
    	$Dm_thongbao->tenkhongdau_vi=str_slug($request->ten_vi,"-");
    	$Dm_thongbao->tenkhongdau_en=str_slug($request->ten_en,"-");
    	$Dm_thongbao->title_vi=$request->title_vi;
    	$Dm_thongbao->title_en=$request->title_en;
    	$Dm_thongbao->description_vi=$request->description_vi;
    	$Dm_thongbao->description_en=$request->description_en;
        $Dm_thongbao->quydinh = $request->loai;
    	$Dm_thongbao->save();
    	return redirect("set_admin/danhmucthongbao/list")->with('thongbao','Thêm thành công');
    }

    public function getEdit($id){
    	$Dm_thongbao=Dm_thongbao::find($id);
    	return view('Admin.Khoa.Thongbao.Danhmuc.Edit',['Dm_thongbao'=>$Dm_thongbao]);
    }

    public function postEdit(DanhmucthongbaoRequest $request,$id){
    	$Dm_thongbao=Dm_thongbao::find($id);
    	$Dm_thongbao->ten_vi=$request->ten_vi;
    	$Dm_thongbao->ten_en=$request->ten_en;
    	$Dm_thongbao->tenkhongdau_vi=str_slug($request->ten_vi,"-");
    	$Dm_thongbao->tenkhongdau_en=str_slug($request->ten_en,"-");
    	$Dm_thongbao->title_vi=$request->title_vi;
    	$Dm_thongbao->title_en=$request->title_en;
    	$Dm_thongbao->description_vi=$request->description_vi;
    	$Dm_thongbao->description_en=$request->description_en;
        $Dm_thongbao->quydinh = $request->loai;
    	$Dm_thongbao->save();
    	return redirect("set_admin/danhmucthongbao/edit/".$id)->with('thongbao','Cập nhật thành công');;

    }

     public function OneDelete($id){
    	 $Dm_thongbao =Dm_thongbao::find($id);
         $Thongbao=Thongbao::where('id_danhmuc',$id)->delete();
    	 $Dm_thongbao->delete();
    	return redirect("set_admin/danhmucthongbao/list")->with('thongbao','Xóa thành công');
    }

    public function MultiDelete($id){
    	
		$ids = explode(",", $id);
		for ($i=0; $i <count($ids) ; $i++) { 
		  $Dm_thongbao =Dm_thongbao::find($ids[$i]);	
          $Thongbao=Thongbao::where('id_danhmuc',$id)->delete();	        	 
    	  $Dm_thongbao->delete();
		}		       
	return redirect("set_admin/danhmucthongbao/list")->with('thongbao','Xóa thành công');
    		

	}
}
