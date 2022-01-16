<?php

namespace App\Http\Controllers\Admin\Bomon;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Giangvien;
use App\Models\Phieudanhgia;
use App\Models\Tieuchuan;
use App\Models\CT_danhgia;
use Session;
use PDF;

class PDFController extends Controller
{
    
public function exporttongthe($id_thongbao){ 

    $Phieudanhgia=Phieudanhgia::whereHas('giangvien',function($query){
            $query->where('id_bomon',Session::get('user_department'));
            $query->where('id_chucvu','<>',6);
        })->where('id_thongbao',$id_thongbao)->get();      
                   
    $pdf=\PDF::loadview('Admin.Bomon.PDF.xuatdanhsachtheoth',['Phieudanhgia'=>$Phieudanhgia]);
    return $pdf->stream("ketquadanhgiabomontonghop.pdf");
}

public function exporttheodiemgv($id_thongbao){

    $Phieudanhgia=Phieudanhgia::whereHas('giangvien',function($query){
            $query->where('id_bomon',Session::get('user_department'));
            $query->where('id_chucvu','<>',6);
        })->where('id_thongbao',$id_thongbao)->get(); 
    $pdf=\PDF::loadview('Admin.Bomon.PDF.xuatdanhsachtheogv',['Phieudanhgia'=>$Phieudanhgia]);
    return $pdf->stream("ketquadanhgiatheogiangvien.pdf");
}

public function exporttheodiembm($id_thongbao){
        $Phieudanhgia=Phieudanhgia::whereHas('giangvien',function($query){
            $query->where('id_bomon',Session::get('user_department'));
            $query->where('id_chucvu','<>',6);
        })->where('id_thongbao',$id_thongbao)->get(); 
        $pdf=\PDF::loadview('Admin.Bomon.PDF.xuatdanhsachtheobm',['Phieudanhgia'=>$Phieudanhgia]);
        return $pdf->stream("ketquadanhgiabomon.pdf");
}

}
