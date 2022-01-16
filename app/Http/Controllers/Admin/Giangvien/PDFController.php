<?php

namespace App\Http\Controllers\Admin\Giangvien;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Phieudanhgia;
use App\Models\Tieuchuan;
use App\Models\CT_danhgia;
use App\Models\Hosokhoahoc;
use App\Models\Loaibaibao;
use App\Models\Quatrinhdaotao;
use App\Models\Giangvien;
use App\Models\Phieugiangday;
use App\Models\Phieu_nckh_detai;
use App\Models\Phieu_nckh_baibao;
use App\Models\Phieukhac;
use App\Models\Baibaokhoahoc;
use App\Models\Detainghiencuu;
use Session;
use PDF;

class PDFController extends Controller
{
    public function export($id_phieu){
    	 $Phieudanhgia=Phieudanhgia::find($id_phieu);
    	 $pdf=\PDF::loadview('Admin.Giangvien.ketquadanhgia',['Phieu'=>$Phieudanhgia]);
    	 return $pdf->stream('ketquadanhgia.pdf');        
    }

public function exportlylichvi($id){

    $Giangvien=Giangvien::find(Session::get('user_id'));
    $Loaibaibao=Loaibaibao::all();
    $Daihoc=Quatrinhdaotao::where('id_giangvien',Session::get('user_id'))->orderby('stt')->first();       
    $Saudaihoc=Quatrinhdaotao::where('id_giangvien',Session::get('user_id'))->orderby('stt')->skip(1)->take(10)->get();
    $max=Quatrinhdaotao::where('id_giangvien',Session::get('user_id'))->orderby('stt','DESC ')->first();   

    $Baibao = Baibaokhoahoc::whereHas('ct_baibao',function($query)use($Giangvien){
        $query->where('id_giangvien',$Giangvien->id);
    })->orderby('nam','DESC')->get();

    $Detai = Detainghiencuu::whereHas('ct_detai',function($query)use($Giangvien){
        $query->where('id_giangvien',$Giangvien->id);
    })->orderby('ngaybatdau','DESC')->get();

      
    $pdf=\PDF::loadview('Admin.Giangvien.lylichkhoahoc',['Giangvien'=>$Giangvien,'Loaibaibao'=>$Loaibaibao,'Daihoc'=>$Daihoc,'Saudaihoc'=>$Saudaihoc,'maxqt'=>$max,'Baibao' => $Baibao,'Detai' => $Detai]);
    return $pdf->stream('LylichkhoahocVI.pdf');
}

    public function exportlylichen($id){

        $Giangvien=Giangvien::find(Session::get('user_id'));
        $Loaibaibao=Loaibaibao::all();

        $Daihoc=Quatrinhdaotao::where('id_giangvien',Session::get('user_id'))->orderby('stt')->first();       
        $Saudaihoc=Quatrinhdaotao::where('id_giangvien',Session::get('user_id'))->orderby('stt')->skip(1)->take(10)->get();
        $max=Quatrinhdaotao::where('id_giangvien',Session::get('user_id'))->orderby('stt','DESC ')->first(); 

        $Baibao = Baibaokhoahoc::whereHas('ct_baibao',function($query)use($Giangvien){
            $query->where('id_giangvien',$Giangvien->id);
        })->orderby('nam','DESC')->get();

        $Detai = Detainghiencuu::whereHas('ct_detai',function($query)use($Giangvien){
            $query->where('id_giangvien',$Giangvien->id);
        })->orderby('ngaybatdau','DESC')->get();
         
         $pdf=\PDF::loadview('Admin.Giangvien.lylichkhoahocen',['Giangvien'=>$Giangvien,'Loaibaibao'=>$Loaibaibao,'Daihoc'=>$Daihoc,'Saudaihoc'=>$Saudaihoc,'maxqt'=>$max,'Baibao' => $Baibao,'Detai' => $Detai]);
         return $pdf->stream('LylichkhoahocEN.pdf');
    }
}
