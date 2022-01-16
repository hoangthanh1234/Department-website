<?php

namespace App\Http\Controllers\Admin\Khoa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Chedogiochuan;
use App\Models\Chucvu;
use App\Models\Trinhdo;


class ChedogiochuanController extends Controller{


    public function getList(){
    	$Chedogiochuan = Chedogiochuan::all();
    	return view('Admin.Khoa.Chedogiochuan.List',['Chedogiochuan' => $Chedogiochuan]);
    }

    public function getAdd(){
    	$Chucvu = Chucvu::all();
        $Trinhdo = Trinhdo::all();
    	return view('Admin.Khoa.Chedogiochuan.Add',['Chucvu' => $Chucvu,'Trinhdo' => $Trinhdo]);
    }

    public function postAdd(Request $request){
    	$Chedogiochuan=new Chedogiochuan();        
    	$Chedogiochuan->id_chucvu=$request->id_chucvu;
        $Chedogiochuan->id_trinhdo = $request->id_trinhdo;
    	$Chedogiochuan->tylephantramgiochuan=$request->tylephantramgiochuan;    	   	
    	$Chedogiochuan->sogiomiengiam = $request->sogiomiengiam;
    	$Chedogiochuan->sogiothuchien = $request->sogiothuchien;
    	$Chedogiochuan->giochuan = $request->giochuan;
    	$Chedogiochuan->ghichu = $request->ghichu;
    	$Chedogiochuan->save();
    	return redirect('set_admin/che-do-gio-chuan/list')->with('thongbao','Thêm Thành Công');
    }

    public function getEdit($id){
    	$Chedogiochuan=Chedogiochuan::find($id);
    	$Chucvu = Chucvu::all();
        $Trinhdo = Trinhdo::all();
    	return view('Admin.Khoa.Chedogiochuan.Edit',['Chedogiochuan'=>$Chedogiochuan,'Chucvu' => $Chucvu,'Trinhdo' => $Trinhdo]);
    }

    public function postEdit(Request $request,$id){
    	$Chedogiochuan=Chedogiochuan::find($id);
    	$Chedogiochuan->id_chucvu=$request->id_chucvu;
        $Chedogiochuan->id_trinhdo = $request->id_trinhdo;
    	$Chedogiochuan->tylephantramgiochuan=$request->tylephantramgiochuan;    	   	
    	$Chedogiochuan->sogiomiengiam = $request->sogiomiengiam;
    	$Chedogiochuan->sogiothuchien = $request->sogiothuchien;
    	$Chedogiochuan->giochuan = $request->giochuan;
    	$Chedogiochuan->ghichu = $request->ghichu;
    	$Chedogiochuan->save();
    	return redirect('set_admin/che-do-gio-chuan/edit/'.$id)->with('thongbao','Cập nhật Thành Công');
    }

     public function OneDelete($id){
    	 $Chedogiochuan =Chedogiochuan::find($id);
    	 $Chedogiochuan->delete();
    	 return redirect('set_admin/che-do-gio-chuan/list')->with('thongbao','Xóa Thành Công');
    }

    public function MultiDelete($id){    	
		$ids = explode(",", $id);
		for ($i=0; $i <count($ids) ; $i++) { 
		    $Chedogiochuan =Chedogiochuan::find($ids[$i]);
    	 	$Chedogiochuan->delete();
		}		       
		return redirect('set_admin/che-do-gio-chuan/list')->with('thongbao','Xóa Thành Công');   		

	}
}
