<?php
namespace App\Http\Controllers\Admin\Khoa;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\TieuchikhacRequest;
use App\Http\Controllers\Controller;
use App\Models\Tieuchikhac;
use DateTime;

class TieuchikhacController extends Controller
{
   public function getList(){

    	$Tieuchikhac=Tieuchikhac::orderby('stt')->get();
    	return view('Admin.Khoa.Tieuchikhac.List',['Tieuchi'=>$Tieuchikhac]);
    }

    public function getAdd(){    	
    	return view('Admin.Khoa.Tieuchikhac.Add');
    }

    public function postAdd(TieuchikhacRequest $request){

    	$Tieuchikhac =new Tieuchikhac();
    	$max=Tieuchikhac::max('id');
    	$Tieuchikhac->stt=$max+1;
    	$Tieuchikhac->ten=$request->ten;
    	$Tieuchikhac->diem=$request->diem;
    	$Tieuchikhac->gio=$request->gio;
    	$Tieuchikhac->donvitinh=$request->donvitinh;
        $Tieuchikhac->loaiminhchung=$request->loaiminhchung;    	
    	$Tieuchikhac->save();
    	return redirect('set_admin/tieu-chi/khac/list')->with('thongbao','Thêm thành công');
    }

    public function getEdit($id){    	
    	$Tieuchikhac=Tieuchikhac::find($id);
    	return view('Admin.Khoa.Tieuchikhac.Edit',['Tieuchi'=>$Tieuchikhac]);
    }

    public function postEdit($id,TieuchikhacRequest $request){
    	$Tieuchikhac=Tieuchikhac::find($id);
    	$Tieuchikhac->ten=$request->ten;
    	$Tieuchikhac->diem=$request->diem;
    	$Tieuchikhac->gio=$request->gio;
        $Tieuchikhac->loaiminhchung=$request->loaiminhchung;
    	$Tieuchikhac->donvitinh=$request->donvitinh;    	
    	$Tieuchikhac->save();
    	return redirect('set_admin/tieu-chi/khac/edit/'.$id)->with('thongbao','Cập nhật thành công');
    }

    public function OneDelete($id){
        $Tieuchikhac =Tieuchikhac::find($id);        
        $Tieuchikhac->delete();
        return redirect("set_admin/tieu-chi/khac/list")->with('thongbao','Xóa thành công');
    }

    public function MultiDelete($id){        
        $ids = explode(",", $id);
        for ($i=0; $i <count($ids) ; $i++) { 
            $Tieuchikhac =Tieuchikhac::find($ids[$i]);                    
            $Tieuchikhac->delete();
        }              
        return redirect("set_admin/tieu-chi/khac/list")->with('thongbao','Xóa thành công'); 
            

    }
}
