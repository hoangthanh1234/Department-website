<?php

namespace App\Http\Controllers\Admin\Khoa;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\TieuchibaibaoRequest;
use App\Http\Controllers\Controller;
use App\Models\Tieuchi_nckh_baibao;
use App\Models\Loaibaibao;
use App\Models\Loaitacgia;
use DateTime;

class Tieuchibaibao extends Controller
{
    public function getList(){

    	$Tieuchibaibao=Tieuchi_nckh_baibao::orderby('stt')->get();
    	return view('Admin.Khoa.Tieuchibaibao.List',['Tieuchi'=>$Tieuchibaibao]);
    }

    public function getAdd(){
        $Loaitacgia=Loaitacgia::all();
        $Loaibaibao=Loaibaibao::all();    	
    	return view('Admin.Khoa.Tieuchibaibao.Add',['Loaibaibao'=>$Loaibaibao,'Loaitacgia'=>$Loaitacgia]);
    }

    public function postAdd(TieuchibaibaoRequest $request){

    	$Tieuchibaibao =new Tieuchi_nckh_baibao();
    	$max=Tieuchi_nckh_baibao::max('id');
    	$Tieuchibaibao->stt=$max+1;
    	$Tieuchibaibao->ten=$request->ten;
    	$Tieuchibaibao->diem=$request->diem;
        $Tieuchibaibao->gio=$request->gio;
    	$Tieuchibaibao->donvitinh=$request->donvitinh;
        $Tieuchibaibao->loaiminhchung=$request->loaiminhchung; 
        $Tieuchibaibao->id_loaibaibao=$request->id_loaibaibao;
        $Tieuchibaibao->id_loaitacgia=$request->id_loaitacgia;   	
    	$Tieuchibaibao->save();
    	return redirect('set_admin/tieu-chi/nghien-cuu-khoa-hoc/bai-bao/list')->with('thongbao','Thêm thành công');
    }

    public function getEdit($id){ 
        $Loaitacgia=Loaitacgia::all();
        $Loaibaibao=Loaibaibao::all();    	
    	$Tieuchibaibao=Tieuchi_nckh_baibao::find($id);
    	return view('Admin.Khoa.Tieuchibaibao.Edit',['Tieuchi'=>$Tieuchibaibao,'Loaibaibao'=>$Loaibaibao,'Loaitacgia'=>$Loaitacgia]);
    }

    public function postEdit($id,TieuchibaibaoRequest $request){
    	$Tieuchibaibao=Tieuchi_nckh_baibao::find($id);
    	$Tieuchibaibao->ten=$request->ten;
    	$Tieuchibaibao->diem=$request->diem;
        $Tieuchibaibao->gio=$request->gio;
    	$Tieuchibaibao->donvitinh=$request->donvitinh;
        $Tieuchibaibao->loaiminhchung=$request->loaiminhchung; 
        $Tieuchibaibao->id_loaibaibao=$request->id_loaibaibao;
        $Tieuchibaibao->id_loaitacgia=$request->id_loaitacgia; 
        $Tieuchibaibao->save();
    	return redirect('set_admin/tieu-chi/nghien-cuu-khoa-hoc/bai-bao/edit/'.$id)->with('thongbao','Cập nhật thành công');
    }

    public function OneDelete($id){
        $Tieuchibaibao =Tieuchi_nckh_baibao::find($id);        
        $Tieuchibaibao->delete();
        return redirect("set_admin/tieu-chi/nghien-cuu-khoa-hoc/bai-bao/list")->with('thongbao','Xóa thành công');
    }

    public function MultiDelete($id){        
        $ids = explode(",", $id);
        for ($i=0; $i <count($ids) ; $i++) { 
            $Tieuchibaibao =Tieuchi_nckh_baibao::find($ids[$i]);                    
            $Tieuchibaibao->delete();
        }              
        return redirect("set_admin/tieu-chi/nghien-cuu-khoa-hoc/bai-bao/list")->with('thongbao','Xóa thành công'); 
            

    }
}
