<?php

namespace App\Http\Controllers\Admin\Khoa;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Phieudanhgia;
use App\Models\Giangvien;
use App\Models\Tieuchuan;
use App\Models\CT_danhgia;
use App\Models\Loaibaibao;
use App\Models\Quatrinhdaotao;
use App\Models\CT_baibao;
use App\Models\CT_detai;
use PDF;
use Carbon\Carbon;

class PDFController extends Controller
{

public function updatediemmoi($id_thongbao){
    $Phieudanhgia = Phieudanhgia::where('id_thongbao',$id_thongbao)
                              ->whereHas('giangvien',function($query){
                                  $query->where('id_chucvu','<>',6);
                                  $query->where('id_bomon','<>',7);
                              })
                              ->orderByRaw('((diemkhackhoa + diemgiangdaykhoa + diemnckhkhoa) - 100)  DESC') 
                              ->orderby('diemnckhkhoa','DESC')                            
                              ->get();

        foreach ($Phieudanhgia as $pdg) {

            //cập nhật lại điểm gv tự duyệt
            $tong=0;
            foreach($pdg->phieu_nckh_baibao as $pbb){
                    $tong+=$pbb->tieuchi->diem;
            }

            foreach($pdg->phieu_nckh_detai as $pdt){
                            $tong+=$pdt->tieuchi->diem;
            }


            $pdg->diemgiangday = $pdg->phieugiangday->sum('diemdat');
            $pdg->diemnckh = $tong;
            $pdg->diemkhac =$pdg->phieukhac->sum('diemdat');

            //cập nhật điểm của khoa duyệt
            $tong=0;
            foreach($pdg->phieu_nckh_baibaokhoaduyet as $pbb){
                    $tong+=$pbb->tieuchi->diem;
            }

            foreach($pdg->phieu_nckh_detaikhoaduyet as $pdt){
                            $tong+=$pdt->tieuchi->diem;
            }


            $pdg->diemgiangdaykhoa = $pdg->phieugiangdaykhoaduyet->sum('diemdatkhoa');
            $pdg->diemnckhkhoa = $tong;
            $pdg->diemkhackhoa =$pdg->phieukhackhoaduyet->sum('diemdatkhoa');
            $pdg->save();
        }
        echo "xong rồi nek";
}

public function exportkhoa($thongbao){

    $Phieudanhgia = Phieudanhgia::where('id_thongbao',$thongbao)
                                ->whereHas('giangvien',function($query){
                                    $query->where('id_chucvu','<>',6);
                                    $query->where('id_bomon','<>',7);
                                })
                                
                                ->orderByRaw('(diemkhackhoa + diemgiangdaykhoa + diemnckhkhoa) DESC')
                                ->orderby('diemnckhkhoa','DESC')
                                ->get();

    $pdf=\PDF::loadview('Admin.Khoa.PDF.dskhoaphantram',['Phieudanhgia'=>$Phieudanhgia]);
    return $pdf->stream('Thongkedanhgia.pdf');
}

public function exportbomon($id_thongbao,$id_bomon){

    $Phieudanhgia = Phieudanhgia::where('id_thongbao',$id_thongbao)
                                ->whereHas('giangvien',function($query){
                                    $query->where('id_chucvu','<>',6);
                                    $query->where('id_bomon','<>',7);
                                })
                                
                                ->orderByRaw('(diemkhackhoa + diemgiangdaykhoa + diemnckhkhoa)  DESC')
                                ->orderby('diemnckhkhoa')
                                ->get();

    $pdf=\PDF::loadview('Admin.Khoa.PDF.dskhoaphantram',['Phieudanhgia'=>$Phieudanhgia]);
    return $pdf->stream('Thongkedanhgia.pdf');
}


public function exportkhoadiemgv($thongbao){

    $Phieudanhgia = Phieudanhgia::where('id_thongbao',$thongbao)
                                ->whereHas('giangvien',function($query){
                                        $query->where('id_chucvu','<>',6);
                                        $query->where('id_bomon','<>',7);
                                })
                                ->orderBy('diemnckh','DESC')
                                ->orderByRaw('diemgiangday + diemnckh + diemkhac DESC')
                                ->get();

    $pdf=\PDF::loadview('Admin.Khoa.PDF.dskhoaphantramdiemgv',['Phieudanhgia'=>$Phieudanhgia]);
    return $pdf->stream('Thongkedanhgia.pdf');
}

public function exportbaibaokhoahoc($tungay,$denngay,$loaitacgia){
    $from=Carbon::createFromFormat('d-m-Y',$tungay)->format("Y/m/d");
    $to=Carbon::createFromFormat('d-m-Y',$denngay)->format("Y/m/d");
    $arr=explode(',',$loaitacgia);
    if($loaitacgia!=0){
        $Baibaokhoahoc=Baibaokhoahoc::whereBetween('nam',[$from,$to])
                                        ->whereIn('id_loaibaibao',$arr)
                                        ->orderby('id_loaibaibao')
                                        ->get();
    }
    else
        $Baibaokhoahoc=Baibaokhoahoc::whereBetween('nam',[$from,$to])->orderby('id_loaibaibao')->get();

    $CT_baibao= CT_baibao::all();
    $pdf=\PDF::loadview('Admin.Khoa.PDF.Baibaokhoahoc',['Baibaokhoahoc'=>$Baibaokhoahoc,'tungay'=>$tungay,'denngay'=>$denngay,'CT_baibao'=>$CT_baibao]);
    return $pdf->stream('TKbaibaokhoahoc.pdf');

}

public function exportdetainghiencuu($tungay,$denngay){

    $from=Carbon::createFromFormat('d-m-Y',$tungay)->format("Y/m/d");
    $to=Carbon::createFromFormat('d-m-Y',$denngay)->format("Y/m/d");
    $Detainghiencuu=Detainghiencuu::whereBetween('ngaynghiemthu',[$from,$to])->get();
    $CT_detai=CT_detai::all();
    $pdf=\PDF::loadview('Admin.Khoa.PDF.Congtrinhkhoahoc',['Detainghiencuu'=>$Detainghiencuu,'tungay'=>$tungay,'denngay'=>$denngay,'CT_detai'=>$CT_detai]);
    return $pdf->stream('TKcongtrinhkhoahoc.pdf');
}

public function exportchitietbomon_gioNCKH($id_thongbao,$id_bomon,$check){

    $Phieudanhgia = Phieudanhgia::where('id_thongbao',$id_thongbao)
                                    ->whereHas('giangvien',function($query)use($id_bomon){
                                        $query->where('id_chucvu','<>',6);
                                        $query->where('id_bomon',$id_bomon);
                                      })
                                      ->orderBy('diemnckhkhoa')  
                                      ->orderByRaw('(diemkhackhoa + diemgiangdaykhoa + diemnckhkhoa)  DESC')
                                      
                                        ->get();

    if($check == 1)
     $pdf=\PDF::loadview('Admin.Khoa.PDF.xuatdanhsachchitiet_gioNCKH',['Phieudanhgia'=>$Phieudanhgia]);
    else
       $pdf=\PDF::loadview('Admin.Khoa.PDF.xuatdanhsachchitiet',['Phieudanhgia'=>$Phieudanhgia]);
      return $pdf->stream("ketquadanhgiabomon.pdf");
}

public function exportchitietbomon($id_thongbao,$id_bomon,$check){
    $Phieudanhgia = Phieudanhgia::where('id_thongbao',$id_thongbao)
                                    ->whereHas('giangvien',function($query)use($id_bomon){
                                        $query->where('id_chucvu','<>',6);
                                        $query->where('id_bomon',$id_bomon);
                                      })
                                      ->orderBy('diemnckhkhoa')
                                     ->orderByRaw('(diemkhackhoa + diemgiangdaykhoa + diemnckhkhoa)  DESC')
                                     
                                     ->get();

    if($check == 1)
     $pdf=\PDF::loadview('Admin.Khoa.PDF.xuatdanhsachchitiethave',['Phieudanhgia'=>$Phieudanhgia]);
    else
       $pdf=\PDF::loadview('Admin.Khoa.PDF.xuatdanhsachchitiet',['Phieudanhgia'=>$Phieudanhgia]);
      return $pdf->stream("ketquadanhgiabomon.pdf");
}


public function lylichkhoahoclist(){
        $Giangvien=Giangvien::where('id_bomon','<>',7)->get();
        return view('Admin.Khoa.PDF.danhsachlylich',['Giangvien'=>$Giangvien]);
}

public function chitietlylich($id){
    $ids = explode(",", $id);
    $Giangvien=Giangvien::whereIn('id',$ids)->get();
    $pdf=\PDF::loadview('Admin.Khoa.PDF.lylichkhoahoc',['Lylichgiangvien'=>$Giangvien]);
    return $pdf->stream('LylichkhoahocVIcheck.pdf');
}

public function chitietlylichen($id){

        $ids = explode(",", $id);
        $Giangvien=Giangvien::whereIn('id',$ids)->get();
        $CT_baibao=CT_baibao::all();
        $pdf=\PDF::loadview('Admin.Khoa.PDF.lylichkhoahocen',['Lylichgiangvien'=>$Giangvien,'CT_baibao'=>$CT_baibao]);
         return $pdf->stream('LylichkhoahocENcheck.pdf');
}

}
