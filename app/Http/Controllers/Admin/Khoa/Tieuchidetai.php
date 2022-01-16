<?php
namespace App\Http\Controllers\Admin\Khoa;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\TieuchidetaiRequest;
use App\Http\Controllers\Controller;
use App\Models\Tieuchi_nckh_detai;
use App\Models\Capdetai;
use App\Models\Trachnhiemdetai;
use DateTime;

class Tieuchidetai extends Controller
{
    public function getList(){

    	$Tieuchidetai=Tieuchi_nckh_detai::orderby('stt')->get();
    	return view('Admin.Khoa.Tieuchidetai.List',['Tieuchi'=>$Tieuchidetai]);
    }

    public function getAdd(){ 
        $Capdetai=Capdetai::all();
        $Trachnhiemdetai=Trachnhiemdetai::all();   	
    	return view('Admin.Khoa.Tieuchidetai.Add',['Capdetai' => $Capdetai,'Trachnhiemdetai' => $Trachnhiemdetai]);
    }

    public function postAdd(TieuchidetaiRequest $request){

    	$Tieuchidetai =new Tieuchi_nckh_detai();
    	$max=Tieuchi_nckh_detai::max('id');
    	$Tieuchidetai->stt=$max+1;
    	$Tieuchidetai->ten=$request->ten;
    	$Tieuchidetai->diem=$request->diem;
    	$Tieuchidetai->gio=$request->gio;
    	$Tieuchidetai->donvitinh=$request->donvitinh;
        $Tieuchidetai->loaiminhchung=$request->loaiminhchung; 
        $Tieuchidetai->id_capdetai=$request->id_capdetai;
        $Tieuchidetai->id_trachnhiemdetai=$request->id_trachnhiemdetai;   	
        $Tieuchidetai->tren6thang = $request->tren6thang;
    	$Tieuchidetai->save();
    	return redirect('set_admin/tieu-chi/nghien-cuu-khoa-hoc/de-tai/list')->with('thongbao','Thêm thành công');
    }

    public function getEdit($id){    	
    	$Tieuchidetai=Tieuchi_nckh_detai::find($id);
        $Capdetai=Capdetai::all();
        $Trachnhiemdetai=Trachnhiemdetai::all(); 
    	return view('Admin.Khoa.Tieuchidetai.Edit',['Tieuchi'=>$Tieuchidetai,'Capdetai' => $Capdetai,'Trachnhiemdetai' => $Trachnhiemdetai]);
    }

    public function postEdit($id,TieuchidetaiRequest $request){
    	$Tieuchidetai=Tieuchi_nckh_detai::find($id);
    	$Tieuchidetai->ten=$request->ten;
    	$Tieuchidetai->diem=$request->diem;
    	$Tieuchidetai->gio=$request->gio;
    	$Tieuchidetai->donvitinh=$request->donvitinh;
        $Tieuchidetai->loaiminhchung=$request->loaiminhchung; 
        $Tieuchidetai->id_capdetai=$request->id_capdetai;
        $Tieuchidetai->id_trachnhiemdetai=$request->id_trachnhiemdetai; 
        $Tieuchidetai->tren6thang = $request->tren6thang;
        $Tieuchidetai->save();
    	return redirect('set_admin/tieu-chi/nghien-cuu-khoa-hoc/de-tai/edit/'.$id)->with('thongbao','Cập nhật thành công');
    }

    public function OneDelete($id){
        $Tieuchidetai =Tieuchi_nckh_detai::find($id);        
        $Tieuchidetai->delete();
        return redirect("set_admin/tieu-chi/nghien-cuu-khoa-hoc/de-tai/list")->with('thongbao','Xóa thành công');
    }

    public function MultiDelete($id){        
        $ids = explode(",", $id);
        for ($i=0; $i <count($ids) ; $i++) { 
            $Tieuchidetai =Tieuchi_nckh_detai::find($ids[$i]);                    
            $Tieuchidetai->delete();
        }              
        return redirect("set_admin/tieu-chi/nghien-cuu-khoa-hoc/de-tai/list")->with('thongbao','Xóa thành công'); 
            

    }
}
