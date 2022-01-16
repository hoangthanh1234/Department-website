<?php

namespace App\Http\Controllers\Admin\Khoa;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\AjaxRequest;
use App\Http\Controllers\Controller;
use App\Models\Phieudanhgia;
use App\Models\Thongbaodanhgia;
use App\Models\Bomon;
use App\Models\Giangvien;
use App\Models\Baibaokhoahoc;
use App\Models\Detainghiencuu;
use App\Models\Loaibaibao;
use App\Models\CT_detai;
use App\Models\CT_baibao;
use Carbon\Carbon;

class ThongkeController extends Controller
{
    

public function theokhoa($id_thongbao){  

    $Phieudanhgia=Phieudanhgia::where('id_thongbao',$id_thongbao)
                                    ->orderby('diemgiangdaykhoa','DESC')
                                    ->orderby('diemkhackhoa','DESC')
                                    ->orderby('diemnckhkhoa','DESC')->get();
    	
    return view('Admin.Khoa.Thongke.Khoa',['Phieudanhgia'=>$Phieudanhgia,'Thongbao'=>$id_thongbao]);
}

public function theobomon($id_thongbao,$id_bomon){

    $Bomon=Bomon::orderby('stt')->get();
    $Phieudanhgia = Phieudanhgia::where('id_thongbao',$id_thongbao)                                      
                                ->whereHas('giangvien',function($query)use($id_bomon){
                                    $query->where('id_chucvu','<>',6);
                                    $query->where('id_bomon',$id_bomon);
                                })
                                ->orderby('diemgiangdaykhoa','DESC')
                                ->orderby('diemkhackhoa','DESC')
                                ->orderby('diemnckhkhoa','DESC')->get();
    
    	return view('Admin.Khoa.Thongke.Bomon',['Phieudanhgia'=>$Phieudanhgia,'Bomon'=>$Bomon,'id_thongbao' => $id_thongbao,'id_bomon' => $id_bomon]);
}

public function xeploai($id_thongbao){       

    $Phieudanhgia = Phieudanhgia::where('id_thongbao',$id_thongbao)                                      
                                    ->whereHas('giangvien',function($query){
                                        $query->where('id_chucvu','<>',6);
                                    })
                                    ->orderby('diemgiangdaykhoa','DESC')
                                    ->orderby('diemkhackhoa','DESC')
                                    ->orderby('diemnckhkhoa','DESC')->get();
       
    $Bomon=Bomon::orderby('stt')->get();       
    $Thongbao=$id_thongbao;
    return view('Admin.Khoa.Thongke.Xeploai',['Phieudanhgia'=>$Phieudanhgia,'Bomon'=>$Bomon,'Thongbao'=>$Thongbao]);
}
   

public function getBaibaokhoahoc(){   

    $Loaibaibao=Loaibaibao::all();     
    return view('Admin.Khoa.Thongke.Baibaokhoahoc',['Loaibaibao'=>$Loaibaibao]);
}

public function postBaibaokhoahoc(AjaxRequest $Request){
    $Loaibaibao=Loaibaibao::all();
    $fromold=$Request->tungay;
    $toold=$Request->denngay;
       
    $from=Carbon::createFromFormat('d/m/Y',$fromold)->format("Y/m/d");
    $to=Carbon::createFromFormat('d/m/Y',$toold)->format("Y/m/d");
    $loaibaibaoold="";

    $Baibaokhoahoc=Baibaokhoahoc::whereBetween('nam',[$from,$to])->whereIn('id_loaibaibao',$Request->loaibaibao)->get(); 
    $loaibaibaoold=implode(",",$Request->loaibaibao);    

    $CT_baibao = CT_baibao::all();
      
    return view('Admin.Khoa.Thongke.Baibaokhoahoc',['Baibaokhoahoc'=>$Baibaokhoahoc,'fromold'=>$fromold,'toold'=>$toold,'Loaibaibao'=>$Loaibaibao,'Loaibaibaoold'=>$loaibaibaoold,'CT_baibao'=>$CT_baibao]);      
}

public function getDetainghiencuu(){        
    return view('Admin.Khoa.Thongke.Detainghiencuu');
}

public function postDetainghiencuu(AjaxRequest $Request){
    $fromold=$Request->tungay;
    $toold=$Request->denngay;
    $from=Carbon::createFromFormat('d/m/Y',$fromold)->format("Y/m/d");
    $to=Carbon::createFromFormat('d/m/Y',$toold)->format("Y/m/d");        
    $Detainghiencuu=Detainghiencuu::whereBetween('ngaynghiemthu',[$from,$to])->get();
    $CT_detai=CT_detai::all();
    return view('Admin.Khoa.Thongke.Detainghiencuu',['Detainghiencuu'=>$Detainghiencuu,'fromold'=>$fromold,'toold'=>$toold,'CT_detai'=>$CT_detai]);
}

}
