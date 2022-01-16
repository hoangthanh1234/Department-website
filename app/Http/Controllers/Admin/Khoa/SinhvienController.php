<?php

namespace App\Http\Controllers\Admin\Khoa;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\SinhvienRequest;
use App\Http\Controllers\Controller;
use App\Models\Sinhvien;
use App\Models\Lop;
use App\Models\Cuusinhvien;
use App\Models\Bomon;
use Carbon\Carbon;
use DB;

class SinhvienController extends Controller
{
    public function getList($lop){

    	$Sinhvien=Sinhvien::where('id_lop',$lop)->paginate(10);
        $Bomon=Bomon::where('hienthi',1)->get();
        $Lop=Lop::all();
        
    	return view('Admin.Khoa.Sinhvien.List',['Sinhvien'=>$Sinhvien,'Bomon'=>$Bomon,'Lop'=>$Lop,]);
    }

    public function getAdd(){
        $Bomon=Bomon::all();
    	$lop=Lop::all();
    	return view('Admin.Khoa.Sinhvien.Add',['Bomon'=>$Bomon,'Lop'=>$lop]);
    }

    public function postAdd(SinhvienRequest $request){
    	$Sinhvien=new Sinhvien();
    	$Sinhvien->masinhvien=$request->ma;    	
    	$Sinhvien->tensinhvien=$request->ten;
    	$Sinhvien->gioitinh=$request->gioitinh;
    	$Sinhvien->ngaysinh=Carbon::createFromFormat('d/m/Y',$request->ngaysinh)->format("Y/m/d"); 
    	$Sinhvien->noisinh=$request->noisinh;
    	$Sinhvien->diachi=$request->diachi;
    	$Sinhvien->email=$request->email;
    	$Sinhvien->dienthoai=$request->dienthoai;
    	$Sinhvien->id_lop=$request->id_lop;        
    	$Sinhvien->save();

    	$max=Sinhvien::max('id'); 
    	$Cuusinhvien=new Cuusinhvien();
    	$Cuusinhvien->id_sinhvien=$max;
        $Cuusinhvien->hinhanh='noimage.jpg';        
    	$Cuusinhvien->save();

    	return redirect('set_admin/sinhvien/list/'.$request->id_lop)->with('thongbao','thêm thành công');
    }

    public function getEdit($id){
    	$Sinhvien=Sinhvien::find($id);
         $Bomon=Bomon::all();
    	$lop=Lop::all();

    	return view("Admin.Khoa.Sinhvien.Edit",['Sinhvien'=>$Sinhvien,'Lop'=>$lop,'Bomon'=>$Bomon,]);
    }

    public function postEdit(SinhvienRequest $request,$id){
    	$Sinhvien=Sinhvien::find($id);
    	$Sinhvien->masinhvien=$request->ma;    	
    	$Sinhvien->tensinhvien=$request->ten;
    	$Sinhvien->gioitinh=$request->gioitinh;
    	$Sinhvien->ngaysinh=Carbon::createFromFormat('d/m/Y',$request->ngaysinh)->format("Y/m/d"); 
    	$Sinhvien->noisinh=$request->noisinh;
    	$Sinhvien->diachi=$request->diachi;
    	$Sinhvien->email=$request->email;
    	$Sinhvien->dienthoai=$request->dienthoai;
    	$Sinhvien->id_lop=$request->id_lop;
    	$Sinhvien->save();
    	return redirect('set_admin/sinhvien/edit/'.$id)->with('thongbao','cập nhật thành công');
    }

    public function OneDelete($id){
         $Sinhvien =Sinhvien::find($id);  
         $Cuusinhvien=Cuusinhvien::where('id_sinhvien',$id)->delete();      
         $Sinhvien->delete();
         return redirect("set_admin/sinhvien/list/".$Sinhvien->id_lop)->with('thongbao','Xóa thành công');
    }

    public function MultiDelete($id){
        
                $ids = explode(",", $id);
                $id_lop="";
                for ($i=0; $i <count($ids) ; $i++) { 
                     $Sinhvien =Sinhvien::find($ids[$i]);  
                     $Cuusinhvien=Cuusinhvien::where('id_sinhvien',$id)->delete();                      
                     $Sinhvien->delete();
                     $id_lop=$Sinhvien->id_lop;
                }              
                return redirect("set_admin/sinhvien/list/".$id_lop)->with('thongbao','Xóa thành công'); 
            

    }
}
