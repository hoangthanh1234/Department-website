<?php

namespace App\Http\Controllers\Admin\Khoa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Nhommon;


class NhommonController extends Controller
{
     public function getList(){
    	$Nhommon=Nhommon::all();        
    	return view('Admin.Khoa.Nhommon.List',['Nhommon'=>$Nhommon]);
    }

    public function getAdd(){    	
    	return view('Admin.Khoa.Nhommon.Add');
    }

    public function postAdd(Request $request){
    	$Nhommon=new Nhommon();
        $Nhommon->ten = $request->ten;        
        $Nhommon->save();   
    	return redirect('set_admin/nhom-mon/list')->with('thongbao','Thêm thành Công');

    }

    public function getEdit($id){
    	$Nhommon=Nhommon::find($id);    	
    	return view('Admin.Khoa.Nhommon.Edit',['Nhommon'=>$Nhommon]);
    }

    public function postEdit(Request $request,$id){
        $Nhommon=Nhommon::find($id); 
        $Nhommon->ten = $request->ten;       
        $Nhommon->save();   
        return redirect('set_admin/nhom-mon/edit/'.$id)->with('thongbao','Cập nhật thành Công');
    }

    public function OneDelete($id){
         $Nhommon =Nhommon::find($id);        
         $Nhommon->delete();
         return redirect("set_admin/nhom-mon/list")->with('thongbao','Xóa thành công');
    }

    public function MultiDelete($id){        
        $ids = explode(",", $id);
        for ($i=0; $i <count($ids) ; $i++) { 
            $Nhommon =Nhommon::find($ids[$i]);                    
            $Nhommon->delete();
        }              
        return redirect("set_admin/nhom-mon/list")->with('thongbao','Xóa thành công'); 
    }
}
