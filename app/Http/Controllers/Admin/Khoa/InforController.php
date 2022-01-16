<?php

namespace App\Http\Controllers\Admin\Khoa;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\InforRequest;
use App\Http\Controllers\Controller;
use App\Models\Infor;
use DateTime;

class InforController extends Controller
{
    public function getEdit($id){
        $Infor=Infor::find($id);
        return view('Admin.Khoa.Infor.Edit',['Infor'=>$Infor]);
    }

     public function postEdit(InforRequest $request,$id){
        $Infor =Infor::find($id);
        $Infor->ten_vi=$request->ten_vi;
    	$Infor->ten_en=$request->ten_en;
    	$Infor->diachi_vi=$request->diachi_vi;
    	$Infor->diachi_en=$request->diachi_en;
    	$Infor->email=$request->email; 
    	$Infor->dienthoai=$request->dienthoai;
    	$Infor->toado=$request->toado;
    	$Infor->website=$request->website;    	
    	$Infor->created_at=new DateTime();
    	$Infor->save();
    	return redirect("set_admin/infor/edit/".$id)->with('thongbao','Sửa thành công');
    }
}
