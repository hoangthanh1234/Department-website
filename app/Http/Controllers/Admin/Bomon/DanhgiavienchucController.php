<?php

namespace App\Http\Controllers\Admin\Bomon;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\GiangdayRequest;
use App\Http\Requests\PhieukhacRequest;
use App\Http\Controllers\Controller;
use App\Models\Thongbaodanhgia;
use App\Models\Phieudanhgia;
use App\Models\Phieugiangday;
use App\Models\Phieukhac;
use App\Models\Bomon;
use App\Models\Tieuchigiangday;
use App\Models\Tieuchikhac;
use App\Models\Tieuchi_nckh_baibao;
use App\Models\Tieuchi_nckh_detai;
use App\Models\CT_baibao;
use App\Models\CT_detai;
use Session;

class DanhgiavienchucController extends Controller
{
    public function getList(){
    	$Thongbaodanhgia=Thongbaodanhgia::where('hienthi',1)->first();
        
        $Phieudanhgia=[];
        if($Thongbaodanhgia){
            if( $Thongbaodanhgia->trangthai==0)
                die("Hiện tại không thể duyệt đánh giá vui lòng liên hệ văn phòng khoa để biết thêm chi tiết");
            $Phieudanhgia=Phieudanhgia::where('id_thongbao',$Thongbaodanhgia->id)
    					->whereHas('giangvien',function($query){
    							$query->where('id_bomon',Session::get('user_department'));
    					})
            ->get();
        }
        
    	return view('Admin.Bomon.Danhgiavienchuc.List',['Phieudanhgia'=>$Phieudanhgia,'Thongbaodanhgia'=>$Thongbaodanhgia]);
    }

    public function getGiangday($ten,$idtab,$id){
    	$Phieudanhgia=Phieudanhgia::find($id);   
        if($Phieudanhgia->thongbao->trangthai==0)
            die("Hiện tại không thể duyệt đánh giá vui lòng liên hệ văn phòng khoa để biết thêm chi tiết");

    	if($Phieudanhgia->giangvien->bomon->id!=Session::get('user_department'))
    		die('Bạn không có quyền truy cặp liên kết này');
    	$Tieuchigiangday=Tieuchigiangday::where('hienthi',1)->orderby('stt')->get();
    	return view('Admin.Bomon.Danhgiavienchuc.Giangday',['tab'=>$idtab,'Phieudanhgia' => $Phieudanhgia,'Tieuchigiangday'=>$Tieuchigiangday]);
    }

    public function postGiangday($ten,$idtab,$id,GiangdayRequest $request){
    	
    	if($request->mycheck!=null){
    		foreach ($request->mycheck as $mc) {
    			$soluong='soluong'.$mc;
    			$diemdat='diemdat'.$mc;
    			$Phieugiangday=Phieugiangday::where('id_phieu',$id)->where('id_tieuchi',$mc)->first();
    			if($Phieugiangday!=null){
    				$Phieugiangday->soluongbomon=$request->$soluong;
    				$Phieugiangday->diemdatbomon=$request->$diemdat;
    				$Phieugiangday->bomonduyet=1;
    				$Phieugiangday->save();
    			}else{
    				$Phieugiangday=new Phieugiangday ();
    				$Phieugiangday->id_phieu=$id;
    				$Phieugiangday->id_tieuchi=$mc;
    				$Phieugiangday->soluongbomon=$request->$soluong;
    				$Phieugiangday->diemdatbomon=$request->$diemdat;
    				$Phieugiangday->bomonduyet=1;
    				$Phieugiangday->save();
    			}
    		}
    	}

        $Phieudanhgia=Phieudanhgia::find($id);
        $Phieudanhgia->diemgiangdaybomon=Phieugiangday::where('id_phieu',$id)->where('bomonduyet',1)->sum('diemdatbomon');
        $Phieudanhgia->save();

    	return redirect('set_bomon/danh-gia-vien-chuc/'.$Phieudanhgia->giangvien->tenkhongdau.'/giang-day/1/'.$id)->with('thongbao','Đánh giá tiêu chí giảng dạy hoàn tất');
    }


    public function getTieuchikhac($ten,$idtab,$id){
        $Phieudanhgia=Phieudanhgia::find($id);     
        if($Phieudanhgia->thongbao->trangthai==0)
            die("Hiện tại không thể duyệt đánh giá vui lòng liên hệ văn phòng khoa để biết thêm chi tiết"); 
        if($Phieudanhgia->giangvien->bomon->id!=Session::get('user_department'))
            die('Bạn không có quyền truy cặp liên kết này');
        $Tieuchikhac=Tieuchikhac::where('hienthi',1)->orderby('stt')->get();
        return view('Admin.Bomon.Danhgiavienchuc.Tieuchikhac',['tab'=>$idtab,'Phieudanhgia' => $Phieudanhgia,'Tieuchikhac'=>$Tieuchikhac]);
    }

    public function postTieuchikhac($ten,$idtab,$id,PhieukhacRequest $request){
       
        if($request->mycheck!=null){
            foreach ($request->mycheck as $mc) {
                $soluong='soluong'.$mc;
                $diemdat='diemdat'.$mc;
                $Phieukhac=Phieukhac::where('id_phieu',$id)->where('id_tieuchi',$mc)->first();
                if($Phieukhac!=null){
                    $Phieukhac->soluongbomon=$request->$soluong;
                    $Phieukhac->diemdatbomon=$request->$diemdat;
                    $Phieukhac->bomonduyet=1;
                    $Phieukhac->save();
                }else{
                    $Phieukhac=new Phieukhac ();
                    $Phieukhac->id_phieu=$id;
                    $Phieukhac->id_tieuchi=$mc;
                    $Phieukhac->soluongbomon=$request->$soluong;
                    $Phieukhac->diemdatbomon=$request->$diemdat;
                    $Phieukhac->bomonduyet=1;
                    $Phieukhac->save();
                }
            }
        }
        $Phieudanhgia=Phieudanhgia::find($id);
        $Phieudanhgia->diemkhacbomon=Phieukhac::where('id_phieu',$id)->where('bomonduyet',1)->sum('diemdatbomon');
        $Phieudanhgia->save();
        return redirect('set_bomon/danh-gia-vien-chuc/'.$Phieudanhgia->giangvien->tenkhongdau.'/tieu-chi-khac/3/'.$id)->with('thongbao','Đánh giá tiêu chí giảng dạy hoàn tất');
    }

    public function getNghiencuukhoahoc($ten,$idtab,$id){
        $Phieudanhgia=Phieudanhgia::find($id);
        if($Phieudanhgia->thongbao->trangthai==0)
            die("Hiện tại không thể duyệt đánh giá vui lòng liên hệ văn phòng khoa để biết thêm chi tiết");
        if($Phieudanhgia->giangvien->bomon->id!=Session::get('user_department'))
            die('Bạn không có quyền truy cặp liên kết này');

      $Tieuchibaibao=Tieuchi_nckh_baibao::where('hienthi',1)->orderby('stt')->get();
      $Tieuchidetai=Tieuchi_nckh_detai::where('hienthi',1)->orderby('stt')->get();         

      $Chitietbaibao = CT_baibao::where('id_giangvien',$Phieudanhgia->giangvien->id)
                          ->whereHas('baibao',function($query)use($Phieudanhgia){
                            $query->whereBetween('nam',[$Phieudanhgia->thongbao->tungay,$Phieudanhgia->thongbao->denngay]);
                          })->get();

      $Chitietdetai = CT_detai::where('id_giangvien',$Phieudanhgia->giangvien->id)
                                ->whereHas('detai',function($query)use($Phieudanhgia){
                                  $query->whereBetween('ngaynghiemthu',[$Phieudanhgia->thongbao->tungay,$Phieudanhgia->thongbao->denngay]);
                                })->get();

        return view('Admin.Bomon.Danhgiavienchuc.Nghiencuu',['tab'=>$idtab,'Chitietbaibao'=>$Chitietbaibao,'Chitietdetai' => $Chitietdetai,'Tieuchibaibao' => $Tieuchibaibao,'Tieuchidetai' => $Tieuchidetai,'Phieudanhgia' => $Phieudanhgia]);
    }   


   
}
