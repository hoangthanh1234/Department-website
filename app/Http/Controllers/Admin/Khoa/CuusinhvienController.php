<?php

namespace App\Http\Controllers\Admin\Khoa;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CuusinhvienRequest;
use App\Http\Controllers\Controller;
use App\Models\Cuusinhvien;
use App\Models\Bomon;
use App\Models\Lop;

class CuusinhvienController extends Controller
{
   public function getList($id){
   	
     $Bomon=Bomon::where('hienthi',1)->get();
     $Lop=Lop::all(); 
     $myclass=Lop::find($id);  
   	 return view ('Admin.Khoa.Cuusinhvien.List',['Bomon'=>$Bomon,'Lop'=>$Lop,'myclass'=>$myclass]);
   }

   public function getEdit($id){
   		$Cuusinhvien=Cuusinhvien::find($id);

   		return view('Admin.Khoa.Cuusinhvien.Edit',['Cuusinhvien'=>$Cuusinhvien]);
   }

   public function postEdit(CuusinhvienRequest $request,$id){
   		$Cuusinhvien=Cuusinhvien::find($id);
   		$Cuusinhvien->noicongtac_vi=$request->noicongtac_vi;
   		$Cuusinhvien->noicongtac_en=$request->noicongtac_en;
   		$Cuusinhvien->chucvu_vi=$request->chucvu_vi;
   		$Cuusinhvien->chucvu_en=$request->chucvu_en;
   		$Cuusinhvien->socoquan=$request->socoquan;
   		$Cuusinhvien->diachicoquan=$request->diachicoquan;
   		$Cuusinhvien->save();
   		return redirect('set_admin/cuusinhvien/list/'.$Cuusinhvien->sinhvien->lop->id)->with('thongbao','Cập nhật thành công');
   }
}
