<?php

namespace App\Http\Controllers\Admin\Khoa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Excel;
use Carbon\Carbon;
use App\Models\Phieudanhgia;
use App\Models\Giangvien;
use App\Models\Baibaokhoahoc;
use App\Models\CT_baibao;
use DateTime;
use DB;

class ExcelController extends Controller
{
   

public function exportkhoa($thongbao){

    $Phieudanhgia = Phieudanhgia::where('id_thongbao',$thongbao)                                      
                                    ->whereHas('giangvien',function($query){
                                        $query->where('id_chucvu','<>',6);
                                        $query->where('id_bomon','<>',7);                                       
                                     })      
                                    ->orderByRaw('diemgiangdaykhoa + diemnckhkhoa + diemkhackhoa DESC')                        
                                    ->get();
    	
    	
    Excel::create('MyExcel', function($excel) use($Phieudanhgia){
        	$excel->sheet('Danh sach danh gia', function($sheet) use($Phieudanhgia){
            $sheet->loadView('Admin.Khoa.Excel.dskhoa',['Phieudanhgia' => $Phieudanhgia]);
        	})->export('xlsx');
    });
}


public function exportbaibao($tungay,$denngay,$loaitacgia){

    $CT_baibao= CT_baibao::all();
    $from=Carbon::createFromFormat('d-m-Y',$tungay)->format("Y/m/d");
    $to=Carbon::createFromFormat('d-m-Y',$denngay)->format("Y/m/d");
    $arr=explode(',',$loaitacgia);
    if($loaitacgia!=0){
            $Baibaokhoahoc=Baibaokhoahoc::whereBetween('nam',[$from,$to])->whereIn('id_loaibaibao',$arr)->orderby('id_loaibaibao')->get();
        }else 
        $Baibaokhoahoc=Baibaokhoahoc::whereBetween('nam',[$from,$to])->orderby('id_loaibaibao')->get();

       Excel::create('Danhsachbaibao', function($excel) use($Baibaokhoahoc,$tungay,$denngay,$CT_baibao){
                    $excel->sheet('Danh sach bai bao khoa hoc', function($sheet) use($Baibaokhoahoc,$tungay,$denngay,$CT_baibao){
                    $sheet->setFontFamily('Times New Roman');
                    $sheet->loadView('Admin.Khoa.Excel.dsbaibao',['Baibaokhoahoc' => $Baibaokhoahoc,'tungay'=>$tungay,'denngay'=>$denngay,'CT_baibao' => $CT_baibao]);

            })->export('xlsx');

        });
    }
}
