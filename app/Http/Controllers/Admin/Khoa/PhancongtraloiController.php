<?php

namespace App\Http\Controllers\Admin\Khoa;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\PhancongtraloiRequest;
use App\Http\Controllers\Controller;
use App\Models\Phancongtraloi;
use App\Models\Bomon;
use App\Models\Chude;
use App\Models\Giangvien;

class PhancongtraloiController extends Controller
{
    public function getList(){

    	$Phancongtraloi=Phancongtraloi::orderby('id')->paginate(10);
    	return view('Admin.Khoa.Phancongtraloi.List',['Phancongtraloi'=>$Phancongtraloi]);
    }

     public function getAdd(){
     	$Bomon=Bomon::orderby('id')->get();
     	$Chude=Chude::orderby('stt')->get();
     	$Giangvien=Giangvien::orderby('stt')->get();
    	return view('Admin.Khoa.Phancongtraloi.Add',['Bomon'=>$Bomon,'Chude'=>$Chude,'Giangvien'=>$Giangvien]);
    }

    public function postAdd(PhancongtraloiRequest $request){
    	$Phancongtraloi=new Phancongtraloi();
    	$max=Phancongtraloi::max('id');
    	$Phancongtraloi->stt=$max+1;
    	$Phancongtraloi->id_giangvien=$request->id_giangvien;
    	$Phancongtraloi->id_chude=$request->id_chude;
      $Phancongtraloi->hotline=$request->ddn;
    	$Phancongtraloi->save();
    	return redirect("set_admin/phancongtraloi/list")->with('thongbao','Thêm thành công');
    }

    public function getEdit($id){
    	$Bomon=Bomon::orderby('id')->get();
     	$Chude=Chude::orderby('stt')->get();
     	$Giangvien=Giangvien::orderby('stt')->get();
    	$Phancongtraloi=Phancongtraloi::find($id);
    	return view('Admin.Khoa.Phancongtraloi.Edit',['Phancongtraloi'=>$Phancongtraloi,'Bomon'=>$Bomon,'Chude'=>$Chude,'Giangvien'=>$Giangvien]);
    }

    public function postEdit(PhancongtraloiRequest $request,$id){
    	$Phancongtraloi=Phancongtraloi::find($id);
    	$Phancongtraloi->id_giangvien=$request->id_giangvien;
    	$Phancongtraloi->id_chude=$request->id_chude;
      $Phancongtraloi->hotline=$request->ddn;
    	$Phancongtraloi->save();
    	return redirect("set_admin/phancongtraloi/edit/".$id)->with('thongbao','Cập nhật thành công');;

    }

     public function OneDelete($id){
    	 $Phancongtraloi =Phancongtraloi::find($id);
    	 $Phancongtraloi->delete();
    	return redirect("set_admin/phancongtraloi/list")->with('thongbao','Xóa thành công');
    }

    public function MultiDelete($id){

		        $ids = explode(",", $id);
		        for ($i=0; $i <count($ids) ; $i++) {
		        	 $Phancongtraloi =Phancongtraloi::find($ids[$i]);
    	 			 $Phancongtraloi->delete();
		        }
		       return redirect("set_admin/phancongtraloi/list")->with('thongbao','Xóa thành công');


	}
}
