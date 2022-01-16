<?php

namespace App\Http\Controllers\Admin\Khoa\Daotao;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\Daotao\HedaotaoRequest;
use App\Http\Controllers\Controller;
use App\Models\Hedaotao;
use DateTime;

class HedaotaoController extends Controller
{
    public function getList(){
         
        $Hedaotao=Hedaotao::orderby('created_at')->get();
    	return view('Admin.Khoa.Daotao.Hedaotao.List',['Hedaotao'=>$Hedaotao]);
    }

    public function getAdd(){
    	return view('Admin.Khoa.Daotao.Hedaotao.Add');
    }

     public function postAdd(HedaotaoRequest $request){
    	$Hedaotao =new Hedaotao(); 
    	$Hedaotao->ten_vi=$request->ten_vi;
    	$Hedaotao->ten_en=$request->ten_en;    	    
    	$Hedaotao->created_at=new DateTime();
    	$Hedaotao->save();
    	return redirect("set_admin/daotao/hedaotao/list")->with('thongbao','Thêm hệ đào tạo thành công');
    }


    public function getEdit($id){
        $Hedaotao=Hedaotao::find($id);
        return view('Admin.Khoa.Daotao.Hedaotao.Edit',['Hedaotao'=>$Hedaotao]);
    }

     public function postEdit(HedaotaoRequest $request,$id){
        $Hedaotao =Hedaotao::find($id);           
    	$Hedaotao->ten_vi=$request->ten_vi;
    	$Hedaotao->ten_en=$request->ten_en;     	    	
    	$Hedaotao->updated_at=new DateTime();
    	$Hedaotao->save();
    	return redirect("set_admin/daotao/hedaotao/edit/".$id)->with('thongbao','Cập nhật thành công');
    }

    public function OneDelete($id){
    	 $Hedaotao =Hedaotao::find($id);    	 	 
    	 $Hedaotao->delete();
    	 return redirect("set_admin/daotao/hedaotao/list")->with('thongbao','Xóa thành công');
    }

    public function MultiDelete($id){
    	$ids = explode(",", $id);
		for ($i=0; $i <count($ids) ; $i++) { 
		    $Hedaotao =Hedaotao::find($ids[$i]);		        	       	 
    	 	$Hedaotao->delete();
		}		       
		return redirect("set_admin/daotao/hedaotao/list")->with('thongbao','Xóa thành công'); 
    		

	}
}
