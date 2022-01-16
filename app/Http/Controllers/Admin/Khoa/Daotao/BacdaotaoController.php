<?php

namespace App\Http\Controllers\Admin\Khoa\Daotao;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\Daotao\BacdaotaoRequest;
use App\Http\Controllers\Controller;
use App\Models\Bacdaotao;
use DateTime;

class BacdaotaoController extends Controller
{
    public function getList(){
         
        $Bacdaotao=Bacdaotao::orderby('stt')->get();        
    	return view('Admin.Khoa.Daotao.Bacdaotao.List',['Bacdaotao'=>$Bacdaotao]);
    }

    public function getAdd(){
    	return view('Admin.Khoa.Daotao.Bacdaotao.Add');
    }

     public function postAdd(BacdaotaoRequest $request){
    	$Bacdaotao =new Bacdaotao();
        $max=Bacdaotao::max('id');
    	$Bacdaotao->stt=$max+1;
    	$Bacdaotao->hienthi=isset($request->hienthi) ? 1 : 0;   	
    	$Bacdaotao->ten_vi=$request->ten_vi;
    	$Bacdaotao->ten_en=$request->ten_en;
    	$Bacdaotao->tenkhongdau_vi=str_slug($request->ten_vi,"-");
    	$Bacdaotao->tenkhongdau_en=str_slug($request->ten_en,"-");  
        $Bacdaotao->sologan_vi=$request->sologan_vi; 
        $Bacdaotao->sologan_en=$request->sologan_en;         
        if($request->hasFile('hinhanh')){
            $file=$request->file('hinhanh');
            $duoi=$file->getClientOriginalExtension();          
             if($duoi!='jpg' && $duoi!='png' && $duoi!='jpeg' && $duoi!='JPG' && $duoi!='PNG' && $duoi!='JPEG' ){
                return redirect("set_admin/daotao/bacdaotao/add")->with('thongbao','Chỉ hỗ trợ file png, jpg, jpeg');
             }
            $name=$file->getClientOriginalName();
            $hinh=str_random(4)."_".$name;
            while(file_exists("ht96_image/daotao/".$hinh)){
                $hinh=str_random(4)."_".$name;
            }
            $file->move("ht96_image/daotao",$hinh);
            $Bacdaotao->hinhanh=$hinh;         
        }
        else $Bacdaotao->hinhanh="noimage.jpg";   
    	$Bacdaotao->title_vi=$request->title_vi;
    	$Bacdaotao->title_en=$request->title_en;
    	$Bacdaotao->description_vi=$request->description_vi;
    	$Bacdaotao->description_en=$request->description_en;      
    	$Bacdaotao->created_at=new DateTime();
    	$Bacdaotao->save();
    	return redirect("set_admin/daotao/bacdaotao/list")->with('thongbao','Thêm bậc đào tạo thành công');
    }


    public function getEdit($id){
        $Bacdaotao=Bacdaotao::find($id);
        return view('Admin.Khoa.Daotao.Bacdaotao.Edit',['Bacdaotao'=>$Bacdaotao]);
    }

     public function postEdit(BacdaotaoRequest $request,$id){
        $Bacdaotao =Bacdaotao::find($id);
    	$Bacdaotao->ten_vi=$request->ten_vi;
    	$Bacdaotao->ten_en=$request->ten_en; 
    	$Bacdaotao->tenkhongdau_vi=str_slug($request->ten_vi,"-");
        $Bacdaotao->tenkhongdau_en=str_slug($request->ten_en,"-");
        $Bacdaotao->sologan_vi=$request->sologan_vi; 
        $Bacdaotao->sologan_en=$request->sologan_en;    	 
    	if($request->hasFile('hinhanh')){
            $file=$request->file('hinhanh');
            $duoi=$file->getClientOriginalExtension();          
             if($duoi!='jpg' && $duoi!='png' && $duoi!='jpeg' && $duoi!='JPG' && $duoi!='PNG' && $duoi!='JPEG'){
                return redirect("set_admin/daotao/Bacdaotao/edit/".$id)->with('thongbao','Chỉ hỗ trợ file png, jpg, jpeg');
             }
            $name=$file->getClientOriginalName();
            $hinh=str_random(4)."_".$name;
            while(file_exists("ht96_image/daotao/".$hinh)){
                $hinh=str_random(4)."_".$name;
            }
            $file->move("ht96_image/daotao",$hinh);
            if($Bacdaotao->hinhanh!='noimage.jpg')
            unlink("ht96_image/daotao/".$Bacdaotao->hinhanh);
            $Bacdaotao->hinhanh=$hinh;     

        }
    	$Bacdaotao->title_vi=$request->title_vi;
        $Bacdaotao->title_en=$request->title_en;
        $Bacdaotao->description_vi=$request->description_vi;
        $Bacdaotao->description_en=$request->description_en;    	
    	$Bacdaotao->created_at=new DateTime();
    	$Bacdaotao->save();
    	return redirect("set_admin/daotao/bacdaotao/edit/".$id)->with('thongbao','Cập nhật thành công');
    }

    public function OneDelete($id){
    	 $Bacdaotao =Bacdaotao::find($id);
    	 if($Bacdaotao->hinhanh != 'noimage.jpg') {
    	 	unlink("ht96_image/daotao/".$Bacdaotao->hinhanh);}   	 
    	 $Bacdaotao->delete();
    	 return redirect("set_admin/daotao/bacdaotao/list")->with('thongbao','Xóa thành công');
    }

    public function MultiDelete($id){    	
		        $ids = explode(",", $id);
		        for ($i=0; $i <count($ids) ; $i++) { 
		        	 $Bacdaotao =Bacdaotao::find($ids[$i]);	
		        	  if($Bacdaotao->hinhanh != 'noimage.jpg'){ 
    	 			  	unlink("ht96_image/daotao/".$Bacdaotao->hinhanh);	  
    	 			  }      	 
    	 			  $Bacdaotao->delete();
		        }		       
		return redirect("set_admin/daotao/bacdaotao/list")->with('thongbao','Xóa thành công'); 
    		

	}
}
