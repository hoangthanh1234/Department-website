<?php

namespace App\Http\Controllers\Admin\Khoa;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\TohopRequest;
use App\Http\Controllers\Controller;
use App\Models\Tohop;
use DateTime;

class TohopController extends Controller
{
    public function getList(){

    	$Tohop=Tohop::orderby('stt')->get();
    	return view("Admin.Khoa.Tohop.List",['Tohop'=>$Tohop]);
    }

    public function getAdd(){

    	return view('Admin.Khoa.Tohop.Add');
    }

    public function postAdd(TohopRequest $request){
    	$Tohop=new Tohop();
        $max=Tohop::max('id');
    	$Tohop->stt=$request->$max+1;
    	$Tohop->hienthi=1;       
        $Tohop->ten=$request->ten;
        $Tohop->monxt=$request->monxt;
        $Tohop->khoi=$request->khoi;
        $Tohop->created_at=new DateTime();
        $Tohop->save();
        return redirect('set_admin/tohop/list')->with('thongbao','Thêm thành Công');
    }

    public function getEdit($id){
    	$Tohop=Tohop::find($id);
    	return view('Admin.Khoa.Tohop.Edit',['Tohop'=>$Tohop]);
    }

    public function postEdit(TohopRequest $request,$id)
    {
    	$Tohop=Tohop::find($id);
        $Tohop->ten=$request->ten;
        $Tohop->monxt=$request->monxt;
        $Tohop->khoi=$request->khoi;
        $Tohop->updated_at=new DateTime();
        $Tohop->save();
        return redirect('set_admin/tohop/edit/'.$id)->with('thongbao','Cập nhật thành Công');
    }

    public function OneDelete($id){
    	 $Tohop =Tohop::find($id);    	
    	 $Tohop->delete();
    	 return redirect("set_admin/tohop/list")->with('thongbao','Xóa thành công');
    }

    public function MultiDelete($id){
    	
		$ids = explode(",", $id);
		for ($i=0; $i <count($ids) ; $i++) { 
		    $Tohop =Tohop::find($ids[$i]);		        	
    	 	$Tohop->delete();
		}		       
	   return redirect("set_admin/tohop/list")->with('thongbao','Xóa thành công'); 
    		

	}
}
