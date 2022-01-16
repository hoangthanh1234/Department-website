<?php

namespace App\Http\Controllers\Admin\Khoa;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\AboutRequest;
use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Bomon;
use DateTime;

class AboutController extends Controller
{
     public function getList(){         
        $About=About::orderby('stt')->get();
    	return view('Admin.Khoa.About.List',['About'=>$About]);
    }

    public function getAdd(){

    	$Bomon=Bomon::all();
    	return view('Admin.Khoa.About.Add',['Bomon'=>$Bomon]);
    }

     public function postAdd(AboutRequest $request){
    	$About =new About();
        $max=About::max('id');
    	$About->stt=$max+1;
    	$About->hienthi=1;    	
    	$About->ten_vi=$request->ten_vi;
    	$About->ten_en=$request->ten_en;       
    	$About->tenkhongdau_vi=str_slug($request->ten_vi,"-");
    	$About->tenkhongdau_en=str_slug($request->ten_en,"-");
        $About->mota_vi=$request->mota_vi;
        $About->mota_en=$request->mota_en;
        $About->noidung_vi=$request->noidung_vi;
        $About->noidung_en=$request->noidung_en;   
    	$About->title_vi=$request->title_vi;
    	$About->title_en=$request->title_en;
    	$About->description_vi=$request->description_vi;
    	$About->description_en=$request->description_en;
    	$About->id_bomon=$request->id_bomon;      
    	$About->created_at=new DateTime();
    	$About->save();
    	return redirect("set_admin/about/list")->with('thongbao','Thêm bộ môn thành công');
    }


    public function getEdit($id){
        $About=About::find($id);
        $Bomon=Bomon::all();
        return view('Admin.Khoa.About.Edit',['About'=>$About,'Bomon'=>$Bomon]);
    }

     public function postEdit(AboutRequest $request,$id){
        $About =About::find($id);        
    	$About->hienthi=1;    	
    	$About->ten_vi=$request->ten_vi;
    	$About->ten_en=$request->ten_en;
    	$About->tenkhongdau_vi=str_slug($request->ten_vi,"-");
    	$About->tenkhongdau_en=str_slug($request->ten_en,"-");
        $About->mota_vi=$request->mota_vi;
        $About->mota_en=$request->mota_en;
        $About->noidung_vi=$request->noidung_vi;
        $About->noidung_en=$request->noidung_en;   
    	$About->title_vi=$request->title_vi;
    	$About->title_en=$request->title_en;
    	$About->description_vi=$request->description_vi;
    	$About->description_en=$request->description_en;
    	$About->id_bomon=$request->id_bomon;      
    	$About->created_at=new DateTime();
    	$About->save();    	
    	return redirect("set_admin/about/edit/".$id)->with('thongbao','Cập nhật thành công');
    }

    public function OneDelete($id){
    	 $About =About::find($id);    	    	 
    	 $About->delete();
    	 return redirect("set_admin/about/list")->with('thongbao','Cập nhật thành công');
    }

    public function MultiDelete($id){
    	
		        $ids = explode(",", $id);
		        for ($i=0; $i <count($ids) ; $i++) { 
		        	 $About =About::find($ids[$i]);			        	       	 
    	 			  $About->delete();
		        }		       
		        return redirect("set_admin/about/list")->with('thongbao','Xóa thành công'); 
    		

	}
}
