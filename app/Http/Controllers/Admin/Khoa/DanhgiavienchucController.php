<?php

namespace App\Http\Controllers\Admin\Khoa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\GiangdayRequest;
use App\Http\Requests\PhieukhacRequest;
use App\Models\Bomon;
use App\Models\Giangvien;
use App\Models\Phieudanhgia;
use App\Models\Phieugiangday;
use App\Models\Phieukhac;
use App\Models\Tieuchigiangday;
use App\Models\Tieuchikhac;
use App\Models\Tieuchi_nckh_baibao;
use App\Models\Tieuchi_nckh_detai;
use App\Models\CT_baibao;
use App\Models\CT_detai;
use Session;

class DanhgiavienchucController extends Controller
{
    public function getdanhsachbomon(){
    	$Bomon=Bomon::all();
    	return view('Admin.Khoa.Danhgiavienchuc.Danhsachbomon',['Bomon' => $Bomon]);
    }

    public function getdanhsachthanhvien($id_bomon){
    	
    	$Phieudanhgia=Phieudanhgia::where('id_thongbao',Session::get('user_tbdg'))->whereHas('giangvien',function($query) use ($id_bomon){
    		$query->where('id_bomon',$id_bomon);
    		$query->where('id_chucvu','<>',6);
    	})->get();
    	return view('Admin.Khoa.Danhgiavienchuc.Danhsachphieu',['Phieudanhgia' => $Phieudanhgia]);
    }

   
    public function getGiangday($ten,$idtab,$id){
    	$Phieudanhgia=Phieudanhgia::find($id); 
    	$Tieuchigiangday=Tieuchigiangday::where('hienthi',1)->orderby('stt')->get();
    	return view('Admin.Khoa.Danhgiavienchuc.Giangday',['tab'=>$idtab,'Phieudanhgia' => $Phieudanhgia,'Tieuchigiangday'=>$Tieuchigiangday]);
    }

    public function postGiangday($ten,$idtab,$id,GiangdayRequest $request){
    	
    	if($request->mycheck!=null){
    		 foreach ($request->mycheck as $mc){                
    		 	$soluong='soluong'.$mc;
    		 	$diemdat='diemdat'.$mc;
    		 	$Phieugiangday=Phieugiangday::where('id_phieu',$id)->where('id_tieuchi',$mc)->first();
    			if($Phieugiangday!=null){
    				$Phieugiangday->soluongkhoa=$request->$soluong;
    				$Phieugiangday->diemdatkhoa=$request->$diemdat;
    				$Phieugiangday->khoaduyet=1;
    				$Phieugiangday->save();
    			}else{
    				$Phieugiangday=new Phieugiangday ();
    				$Phieugiangday->id_phieu=$id;
    				$Phieugiangday->id_tieuchi=$mc;
    				$Phieugiangday->soluongkhoa=$request->$soluong;
    				$Phieugiangday->diemdatkhoa=$request->$diemdat;
    				$Phieugiangday->khoaduyet=1;
    				$Phieugiangday->save();
    			}
    	 }
    }
        $Phieudanhgia=Phieudanhgia::find($id);
        $Phieudanhgia->diemgiangdaykhoa=Phieugiangday::where('id_phieu',$id)->where('khoaduyet',1)->sum('diemdatkhoa');
        $Phieudanhgia->save();
    	return redirect('set_admin/danh-gia-vien-chuc/'.$Phieudanhgia->giangvien->tenkhongdau.'/giang-day/1/'.$id)->with('thongbao','Đánh giá tiêu chí giảng dạy hoàn tất');
    }


    public function getTieuchikhac($ten,$idtab,$id){
        $Phieudanhgia=Phieudanhgia::find($id);  
        $Tieuchikhac=Tieuchikhac::where('hienthi',1)->orderby('stt')->get();
        return view('Admin.Khoa.Danhgiavienchuc.Tieuchikhac',['tab'=>$idtab,'Phieudanhgia' => $Phieudanhgia,'Tieuchikhac'=>$Tieuchikhac]);
    }

    public function postTieuchikhac($ten,$idtab,$id,PhieukhacRequest $request){
        $Phieudanhgia=Phieudanhgia::find($id);
        if($request->mycheck!=null){
            foreach ($request->mycheck as $mc) {
                $soluong='soluong'.$mc;
                $diemdat='diemdat'.$mc;
                $Phieukhac=Phieukhac::where('id_phieu',$id)->where('id_tieuchi',$mc)->first();
                if($Phieukhac!=null){
                    $Phieukhac->soluongkhoa=$request->$soluong;
                    $Phieukhac->diemdatkhoa=$request->$diemdat;
                    $Phieukhac->khoaduyet=1;
                    $Phieukhac->save();
                }else{
                    $Phieukhac=new Phieukhac ();
                    $Phieukhac->id_phieu=$id;
                    $Phieukhac->id_tieuchi=$mc;
                    $Phieukhac->soluongkhoa=$request->$soluong;
                    $Phieukhac->diemdatkhoa=$request->$diemdat;
                    $Phieukhac->khoaduyet=1;
                    $Phieukhac->save();
                }
            }
        }

        $Phieudanhgia=Phieudanhgia::find($id);
        $Phieudanhgia->diemkhackhoa=Phieukhac::where('id_phieu',$id)->where('khoaduyet',1)->sum('diemdatkhoa');
        $Phieudanhgia->save();

        return redirect('set_admin/danh-gia-vien-chuc/'.$Phieudanhgia->giangvien->tenkhongdau.'/tieu-chi-khac/3/'.$id)->with('thongbao','Đánh giá tiêu chí giảng dạy hoàn tất');
    }

    public function getNghiencuukhoahoc($ten,$idtab,$id){
      $Phieudanhgia=Phieudanhgia::find($id);
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

        return view('Admin.Khoa.Danhgiavienchuc.Nghiencuu',['tab'=>$idtab,'Chitietbaibao'=>$Chitietbaibao,'Chitietdetai' => $Chitietdetai,'Tieuchibaibao' => $Tieuchibaibao,'Tieuchidetai' => $Tieuchidetai,'Phieudanhgia' => $Phieudanhgia]);
    }   
}
