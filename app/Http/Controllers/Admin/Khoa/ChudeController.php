<?php

namespace App\Http\Controllers\Admin\Khoa;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\ChudeRequest;
use App\Http\Controllers\Controller;
use App\Models\Chude;

class ChudeController extends Controller
{
   public function getList(){
   		
   		$Chude=Chude::orderby('stt')->paginate(10);
   		return view('Admin.Khoa.Chude.List',['Chude'=>$Chude]);
   }

    public function getAdd(){
    	return view('Admin.Khoa.Chude.Add');
    }

    public function postAdd(ChudeRequest $request){
    	$Chude=new Chude();
    	$max=Chude::max('id');
    	$Chude->stt=$max+1;
    	$Chude->ten_vi=$request->ten_vi;
    	$Chude->ten_en=$request->ten_en;
    	$Chude->save();
    	return redirect("set_admin/chude/list")->with('thongbao','Thêm thành công');
    }

    public function getEdit($id){
    	$Chude=Chude::find($id);
    	return view('Admin.Khoa.Chude.Edit',['Chude'=>$Chude]);
    }

    public function postEdit(ChudeRequest $request,$id){
    	$Chude=Chude::find($id);
    	$Chude->ten_vi=$request->ten_vi;
    	$Chude->ten_en=$request->ten_en;
    	$Chude->save();
    	return redirect("set_admin/chude/edit/".$id)->with('thongbao','Cập nhật thành công');;

    }

     public function OneDelete($id){
    	 $Chude =Chude::find($id);
    	 $Chude->delete();
    	return redirect("set_admin/chude/list")->with('thongbao','Xóa thành công');
    }

    public function MultiDelete($id){
    	
		        $ids = explode(",", $id);
		        for ($i=0; $i <count($ids) ; $i++) { 
		        	 $Chude =Chude::find($ids[$i]);		        	 
    	 			 $Chude->delete();
		        }		       
		       return redirect("set_admin/chude/list")->with('thongbao','Xóa thành công');
    		

	}
}
