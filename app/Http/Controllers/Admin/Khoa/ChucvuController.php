<?php

namespace App\Http\Controllers\Admin\Khoa;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\ChucvuRequest;
use App\Http\Controllers\Controller;
use App\Models\Chucvu;
use DateTime;

class ChucvuController extends Controller
{
    public function getList(){
    	$Chucvu = Chucvu::orderby('stt')->get();
    	return view('Admin.Khoa.Chucvu.List',['Chucvu' => $Chucvu]);
    }

    public function getAdd(){
    	return view('Admin.Khoa.Chucvu.Add');
    }

    public function postAdd(ChucvuRequest $request){

    	$Chucvu=new Chucvu();
        $max=Chucvu::max('id');
    	$Chucvu->stt=$max+1;
    	$Chucvu->ten_vi=$request->ten_vi;
    	$Chucvu->ten_en=$request->ten_en;    	
    	$Chucvu->created_at=new DateTime();
    	$Chucvu->save();
    	return redirect('set_admin/chucvu/list')->with('thongbao','Thêm Thành Công');
    }

    public function getEdit($id){
    	$Chucvu=Chucvu::find($id);
    	return view('Admin.Khoa.Chucvu.Edit',['Chucvu'=>$Chucvu]);
    }

    public function postEdit(ChucvuRequest $request,$id){

    	$Chucvu=Chucvu::find($id);    	
    	$Chucvu->ten_vi=$request->ten_vi;
    	$Chucvu->ten_en=$request->ten_en;    	
    	$Chucvu->save();
    	return redirect('set_admin/chucvu/edit/'.$id)->with('thongbao','Sửa Thành Công');
    }

     public function OneDelete($id){

    	 $Chucvu =Chucvu::find($id);
    	 $Chucvu->delete();
    	 return redirect('set_admin/chucvu/list')->with('thongbao','Xóa Thành Công');
    }

    public function MultiDelete($id){    	
		$ids = explode(",", $id);
		for ($i=0; $i <count($ids) ; $i++) { 
		    $Chucvu =Chucvu::find($ids[$i]);
    	 	$Chucvu->delete();
		}		       
		return redirect('set_admin/chucvu/list')->with('thongbao','Xóa Thành Công');   		

	}
}
