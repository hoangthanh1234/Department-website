<?php

namespace App\Http\Controllers\Admin\Khoa;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\TrinhdoRequest;
use App\Http\Controllers\Controller;
use App\Models\Trinhdo;
use DateTime;

class TrinhdoController extends Controller
{
    public function getList(){
    	$Trinhdo = Trinhdo::orderby('stt')->get();
    	return view('Admin.Khoa.Trinhdo.List',['Trinhdo' => $Trinhdo]);
    }

    public function getAdd(){
    	return view('Admin.Khoa.Trinhdo.Add');
    }

    public function postAdd(TrinhdoRequest $request){

    	$Trinhdo=new Trinhdo();
        $max=Trinhdo::max('id');
    	$Trinhdo->stt=$max+1;
    	$Trinhdo->ten_vi=$request->ten_vi;
    	$Trinhdo->ten_en=$request->ten_en;    	
    	$Trinhdo->created_at=new DateTime();
    	$Trinhdo->save();
    	return redirect('set_admin/trinhdo/list')->with('thongbao','Thêm Thành Công');
    }

    public function getEdit($id){
    	$Trinhdo=Trinhdo::find($id);
    	return view('Admin.Khoa.Trinhdo.Edit',['Trinhdo'=>$Trinhdo]);
    }

    public function postEdit(TrinhdoRequest $request,$id){

    	$Trinhdo=Trinhdo::find($id);    
    	$Trinhdo->ten_vi=$request->ten_vi;
    	$Trinhdo->ten_en=$request->ten_en;    	
    	$Trinhdo->save();
    	return redirect('set_admin/trinhdo/list')->with('thongbao','Cập nhật Thành Công');
    }

     public function OneDelete($id){

    	 $Trinhdo =Trinhdo::find($id);
    	 $Trinhdo->delete();
    	 return redirect('set_admin/trinhdo/list')->with('thongbao','Xóa Thành Công');
    }

    public function MultiDelete($id){    	
		$ids = explode(",", $id);
		for ($i=0; $i <count($ids) ; $i++) { 
		    $Trinhdo =Trinhdo::find($ids[$i]);
    	 	$Trinhdo->delete();
		}		       
		return redirect('set_admin/trinhdo/list')->with('thongbao','Xóa Thành Công');   		

	}
}
