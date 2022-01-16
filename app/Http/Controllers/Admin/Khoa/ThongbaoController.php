<?php

namespace App\Http\Controllers\Admin\Khoa;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ThongbaoRequest;
use App\Http\Controllers\Controller;
use App\Models\Thongbao;
use App\Models\Dm_thongbao;
use App\Models\Bomon;
use DateTime;

class ThongbaoController extends Controller
{
    public function getList($id){
    	$Bomon=Bomon::orderby('stt')->get();
    	if($id==0)
    		$Thongbao=Thongbao::orderby('id')->get();
    	else
    		$Thongbao=Thongbao::where('id_bomon',$id)->orderby('created_at','DESC')->get();
        
    	return view('Admin.Khoa.Thongbao.Thongbao.List',['Thongbao'=>$Thongbao,'Bomon'=>$Bomon,'bmm'=>$id]);
    }

    public function getAdd(){

    	$Bomon=Bomon::orderby('stt')->get();
    	$Danhmuc=Dm_thongbao::orderby('stt')->get();
    	return view('Admin.Khoa.Thongbao.Thongbao.Add',['Bomon'=>$Bomon,'Danhmuc'=>$Danhmuc]);
    }

    public function postAdd(ThongbaoRequest $request){
    	$Thongbao=new Thongbao();
    	$max=Thongbao::max('id');
    	$Thongbao->stt=$max+1;
    	$Thongbao->ten_vi=$request->ten_vi;
    	$Thongbao->ten_en=$request->ten_en;
    	$Thongbao->tenkhongdau_vi=str_slug($request->ten_vi,"-");
    	$Thongbao->tenkhongdau_en=str_slug($request->ten_en,"-");
        $Thongbao->mota_vi=$request->mota_vi;
        $Thongbao->mota_en=$request->mota_en;
        $Thongbao->noidung_vi=$request->noidung_vi;
        $Thongbao->noidung_en=$request->noidung_en;        
        $Thongbao->hinhanh="noimage.jpg";        
    	$Thongbao->title_vi=$request->title_vi;
    	$Thongbao->title_en=$request->title_en;
    	$Thongbao->description_vi=$request->description_vi;
    	$Thongbao->description_en=$request->description_en;
        $Thongbao->id_danhmuc=$request->id_danhmuc;
        $Thongbao->id_bomon=$request->id_bomon;
    	$Thongbao->created_at=new DateTime();
    	$Thongbao->save();
    	return redirect("set_admin/thongbao/list/".$request->id_bomon)->with('thongbao','Thêm thành công');
    }

    public function getEdit($id){
    	$Bomon=Bomon::orderby('stt')->get();
    	$Danhmuc=Dm_thongbao::orderby('stt')->get();
    	$Thongbao=Thongbao::find($id);
    	return view('Admin.Khoa.Thongbao.Thongbao.Edit',['Bomon'=>$Bomon,'Danhmuc'=>$Danhmuc,'Thongbao'=>$Thongbao]);
    }

    public function postEdit(ThongbaoRequest $request,$id){
    	$Thongbao =Thongbao::find($id);       
        $Thongbao->ten_vi=$request->ten_vi;
        $Thongbao->ten_en=$request->ten_en;
        $Thongbao->tenkhongdau_vi=str_slug($request->ten_vi,"-");
        $Thongbao->tenkhongdau_en=str_slug($request->ten_en,"-");
        $Thongbao->mota_vi=$request->mota_vi;
        $Thongbao->mota_en=$request->mota_en;
        $Thongbao->noidung_vi=$request->noidung_vi;
        $Thongbao->noidung_en=$request->noidung_en;           
        $Thongbao->title_vi=$request->title_vi;
        $Thongbao->title_en=$request->title_en;
        $Thongbao->description_vi=$request->description_vi;
        $Thongbao->description_en=$request->description_en;
        $Thongbao->id_danhmuc=$request->id_danhmuc;
        $Thongbao->id_bomon=$request->id_bomon;
        $Thongbao->updated_at=new DateTime();
        $Thongbao->save();
        return redirect("set_admin/thongbao/edit/".$Thongbao->id)->with('thongbao','Sửa thành công');

    }

     public function OneDelete($id){

    	 $Thongbao =Thongbao::find($id);
         if($Thongbao->hinhanh != 'noimage.jpg') 
         unlink("ht96_image/thongbao/".$Thongbao->hinhanh); 
    	 $Thongbao->delete();
    	 return redirect("set_admin/thongbao/list/".$Thongbao->id_bomon)->with('thongbao','Xóa thành công');
    }

    public function MultiDelete($id){

    			
		        $ids = explode(",", $id);
		        for ($i=0; $i <count($ids) ; $i++) { 
		        	 $Thongbao =Thongbao::find($ids[$i]);
                     if($Thongbao->hinhanh != 'noimage.jpg') 
                        unlink("ht96_image/thongbao/".$Thongbao->hinhanh); 
    	 			 $Thongbao->delete();

		        }
		       
		        return redirect("set_admin/thongbao/list/0")->with('thongbao','Xóa thành công'); 
    		

	}
}
