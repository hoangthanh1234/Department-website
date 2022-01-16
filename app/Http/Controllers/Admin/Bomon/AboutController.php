<?php

namespace App\Http\Controllers\Admin\Bomon;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\AboutRequest;
use App\Http\Controllers\Controller;
use App\Models\About;
use DateTime;
use Session;

class AboutController extends Controller
{
   public function getList($id){
         
        $About=About::where('id_bomon',$id)->paginate(10);
    	return view('Admin.Bomon.About.List',['About'=>$About]);
    }

    public function getAdd(){    	
    	return view('Admin.Bomon.About.Add');
    
}
     public function postAdd(AboutRequest $request){
    	$About =new About();
    	$About->stt=$request->stt;
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
    	return redirect("set_bomon/about/list/".$request->id_bomon)->with('thongbao','Thêm giới thiệu thành công thành công');
    }


    public function getEdit($id){
        $About=About::find($id);
        return view('Admin.Bomon.About.Edit',['About'=>$About]);
    }

     public function postEdit(AboutRequest $request,$id){
        $About =About::find($id);
        $About->stt=$request->stt;    	
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
    	return redirect("set_bomon/about/edit/".$id)->with('thongbao','Sửa thành công');
    }

    public function OneDelete($id){
    	 $About =About::find($id);    	    	 
    	 $About->delete();
    	 return redirect("set_bomon/about/list/".Session::get('user_department'))->with('thongbao','Xóa thành công');
    }

    public function MultiDelete($id){
    	
		        $ids = explode(",", $id);
		        for ($i=0; $i <count($ids) ; $i++) { 
		        	 $About =About::find($ids[$i]);			        	       	 
    	 			  $About->delete();
		        }		       
		        return redirect("set_bomon/about/list/".Session::get('user_department'))->with('thongbao','Xóa thành công'); 
    		

	}
}
