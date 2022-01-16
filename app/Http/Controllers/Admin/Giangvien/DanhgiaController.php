<?php

namespace App\Http\Controllers\Admin\Giangvien;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\GiangdayRequest;
use App\Http\Requests\PhieukhacRequest;;
use App\Http\Controllers\Controller;
use App\Models\Thongbaodanhgia;
use App\Models\Phieudanhgia;
use App\Models\Phieugiangday;
use App\Models\Phieukhac;
use App\Models\Tieuchigiangday;
use App\Models\Tieuchi_nckh_baibao;
use App\Models\Tieuchi_nckh_detai;
use App\Models\Tieuchikhac;
use App\Models\CT_baibao;
use App\Models\CT_detai;
use App\Models\Giangvien;
use Carbon\Carbon;
use Session;
use DateTime;

class DanhgiaController extends Controller
{
    public function getGiangday($idtab){

      $Thongbaodanhgia=Thongbaodanhgia::where('hienthi',1)->first();

      // if(count($Thongbaodanhgia) > 0){
      //   $date = date("Y-m-d");
      //   if(strtotime($date)>strtotime($Thongbaodanhgia->ngayketthuc)){
      //       die("Đã quá thời gian đánh giá viên chức");
      //    }
      // }

       $Giangvien = Giangvien::find(Session::get('user_id'));
      
       if($Giangvien->hangchucdanhnghenghiep == '')
          die('Vui lòng cập nhật thông tin cá nhân về hạng chức danh nghề nghiệp trước khi đánh giá');

       if($Giangvien->bac == 0)
          die('Vui lòng cập nhật thông tin cá nhân về bậc lương hiện tại trước khi đánh giá');

       if($Giangvien->hesoluong == 0)
          die('Vui lòng cập nhật thông tin cá nhân về hệ số lương hiện tại trước khi đánh giá');


    	$Phieudanhgia=Phieudanhgia::where('id_giangvien',Session::get('user_id'))
    								->where('id_thongbao',$Thongbaodanhgia->id)
    								->first();

    	$Tieuchigiangday=Tieuchigiangday::where('hienthi',1)->orderby('stt')->get();

      $Khoagopy = Phieugiangday::where('id_phieu',$Phieudanhgia->id)
                                   ->where('gopykhoa','<>','')
                                   ->orWhere('gopykhoa','<>',null)
                                   ->where('phanhoikhoa','')
                                   ->get();

      $Bomongopy = Phieugiangday::where('id_phieu',$Phieudanhgia->id)
                                   ->where('gopybomon','<>','')
                                   ->orWhere('gopybomon','<>',null)
                                   ->where('phanhoibomon','')
                                   ->get();

    	return view('Admin.Giangvien.Danhgia.Giangday',['tab'=>$idtab,'Phieudanhgia'=>$Phieudanhgia,'Tieuchigiangday'=>$Tieuchigiangday,'Khoagopy'=>$Khoagopy,'Bomongopy'=>$Bomongopy,'Thongbaodanhgia' => $Thongbaodanhgia]);
    }

    public function postGiangday(GiangdayRequest $request){

      //lấy hết thông tin cũ
        $Phieugiangday=Phieugiangday::where('id_phieu',$request->id_phieu)->get();
        //bật cờ cho list này ở trạng thái "chuẩn bị xóa"
        foreach ($Phieugiangday as  $phieu) {
           $phieu->isDelete=1;
           $phieu->update();
        }
      //có trường hợp thông tin k được lưu lại trong mycheck mà đã có sẵn trong csdl, cần lọc ra dược những thông tin này
      $array_tieuchi=[]; //mảng này lưu lại các id_tieuchi có trong mycheck nhằm kiểm lại 1 lần nữa tránh thiếu sót
        if($request->mycheck!=null){
            foreach ($request->mycheck as $mc){
               //tạo thông tin mới
               $Phieugiangday=new Phieugiangday();
               $Phieugiangday->id_phieu=$request->id_phieu;
               $Phieugiangday->id_tieuchi=$mc;
               $soluong='soluong'.$mc;
               $diemdat='diemdat'.$mc;
               $ghichu = 'ghichu'.$mc;
               $minhchung='minhchunght'.$mc;
               $Phieugiangday->soluong=$request->$soluong;
               $Phieugiangday->diemdat=$request->$diemdat;
               $Phieugiangday->minhchung=$request->$minhchung;
               $Phieugiangday->ghichu = $request->$ghichu;
               $Phieugiangday->giangvienduyet=1;
               array_push($array_tieuchi,$mc);
               //chuyển thông tin cũ sang phiếu mới
               $phieu=Phieugiangday::where('id_phieu',$request->id_phieu)->where('id_tieuchi',$mc)->where('isDelete',1)->first();
               if ($phieu) { //nếu có tông tại thông tin cũ thì cập nhật lại, nếu không thì đây là chi tiết mới hoàn toàn
                  $Phieugiangday->soluongkhoa=$phieu->soluongkhoa;
                  $Phieugiangday->diemdatkhoa=$phieu->diemdatkhoa;
                  $Phieugiangday->soluongbomon=$phieu->soluongbomon;
                  $Phieugiangday->diemdatbomon=$phieu->diemdatbomon;
                  $Phieugiangday->gopykhoa=$phieu->gopykhoa;
                  $Phieugiangday->gopybomon=$phieu->gopybomon;
                  $Phieugiangday->phanhoikhoa=$phieu->phanhoikhoa;
                  $Phieugiangday->phanhoibomon=$phieu->phanhoibomon;

                  $Phieugiangday->bomonduyet=$phieu->bomonduyet;
                  $Phieugiangday->khoaduyet=$phieu->khoaduyet;
               }
               $Phieugiangday->isDelete=0;
               $Phieugiangday->save();
            }
        }

          //kiểm lại thong tin thiết
          $Phieugiangday=Phieugiangday::where('id_phieu',$request->id_phieu)->whereNotIn('id_tieuchi',$array_tieuchi)->where('isDelete',1)->get();
          //return $Phieukhac;
        //return $Phieukhac;
        foreach ($Phieugiangday as  $phieu) {
         if($phieu->khoaduyet!=0 || $phieu->bomonduyet!=0){ //nếu thông tin được duyệt thì giữ lại
            $Phieugiangday=new Phieukhac();
            $Phieugiangday->id_phieu=$phieu->id_phieu;
            $Phieugiangday->id_tieuchi=$phieu->id_tieuchi;
            $Phieugiangday->soluong=$phieu->soluong;
            $Phieugiangday->diemdat=$phieu->diemdat;
            $Phieugiangday->minhchung=$phieu->minhchung;
            $Phieugiangday->giangvienduyet=$phieu->giangvienduyet;
            $Phieugiangday->soluongkhoa=$phieu->soluongkhoa;
            $Phieugiangday->diemdatkhoa=$phieu->diemdatkhoa;
            $Phieugiangday->soluongbomon=$phieu->soluongbomon;
            $Phieugiangday->diemdatbomon=$phieu->diemdatbomon;
            $Phieugiangday->gopykhoa=$phieu->gopykhoa;
            $Phieugiangday->gopybomon=$phieu->gopybomon;
            $Phieugiangday->phanhoikhoa=$phieu->phanhoikhoa;
            $Phieugiangday->phanhoibomon=$phieu->phanhoibomon;
            $Phieugiangday->bomonduyet=$phieu->bomonduyet;
            $Phieugiangday->khoaduyet=$phieu->khoaduyet;
            $Phieugiangday->isDelete=0;
            $Phieugiangday->save();
         }
     }

        //sau khi chay xong thi xoa thong tin cũ
        $Phieugiangday=Phieugiangday::where('id_phieu',$request->id_phieu)->where('isDelete',1)->delete();

        $Phieudanhgia=Phieudanhgia::find($request->id_phieu);
        $Phieudanhgia->diemgiangday=Phieugiangday::where('id_phieu',$request->id_phieu)->sum('diemdat');
        $Phieudanhgia->save();
        return redirect('set_giangvien/danh-gia-vien-chuc/giang-day/1')->with('thongbao','Đã lưu kết đánh giá');
    }

    public function getNghiencuukhoahoc($idtab){

    	$Thongbaodanhgia=Thongbaodanhgia::where('hienthi',1)->first();
      // $date = date("Y-m-d");
      // if(strtotime($date)>strtotime($Thongbaodanhgia->ngayketthuc)){
          // die("Đã quá thời gian đánh giá viên chức");
       // }

       $Giangvien = Giangvien::find(Session::get('user_id'));
      
       if($Giangvien->hangchucdanhnghenghiep == '')
          die('Vui lòng cập nhật thông tin cá nhân về hạng chức danh nghề nghiệp trước khi đánh giá');

       if($Giangvien->bac == 0)
          die('Vui lòng cập nhật thông tin cá nhân về bậc lương hiện tại trước khi đánh giá');

       if($Giangvien->hesoluong == 0)
          die('Vui lòng cập nhật thông tin cá nhân về hệ số lương hiện tại trước khi đánh giá');


    	$Phieudanhgia=Phieudanhgia::where('id_giangvien',Session::get('user_id'))
    								->where('id_thongbao',$Thongbaodanhgia->id)
    								->first();
      
    	$Tieuchibaibao=Tieuchi_nckh_baibao::where('hienthi',1)->orderby('stt')->get();
      $Tieuchidetai=Tieuchi_nckh_detai::where('hienthi',1)->orderby('stt')->get();
      
      

      //SELECT * FROM ct_baibao WHERE id_giangvien== Session::get('user_id) JOIN baibaokhoahoc ON baibaokhoahoc.id=ct_baibao.id_baibao where baibaokhoahoc.nam BETWEEN $Thongbaodanhgia->tungay AND $Thongbaodanhgia->denngay
      $Chitietbaibao = CT_baibao::where('id_giangvien',Session::get('user_id'))
                           ->whereHas('baibao',function($query)use($Thongbaodanhgia){
                                $query->whereBetween('nam',[$Thongbaodanhgia->tungay,$Thongbaodanhgia->denngay]);
                           })->get();
                          
      $Chitietdetai = CT_detai::where('id_giangvien',Session::get('user_id'))
                                ->whereHas('detai',function($query)use($Thongbaodanhgia){
                                  $query->whereBetween('ngaynghiemthu',[$Thongbaodanhgia->tungay,$Thongbaodanhgia->denngay]);
                                })->get();
                        
    	return view('Admin.Giangvien.Danhgia.Nghiencuu',['tab'=>$idtab,'Chitietbaibao'=>$Chitietbaibao,'Chitietdetai' => $Chitietdetai,'Tieuchibaibao' => $Tieuchibaibao,'Tieuchidetai' => $Tieuchidetai,'Phieudanhgia' => $Phieudanhgia,'Thongbaodanhgia' => $Thongbaodanhgia]);
    }


  public function getTieuchikhac($idtab){

    	$Thongbaodanhgia=Thongbaodanhgia::where('hienthi',1)->first();
      // $date = date("Y-m-d");
      // if(strtotime($date)>strtotime($Thongbaodanhgia->ngayketthuc)){
          // die("Đã quá thời gian đánh giá viên chức");
      //}


       $Giangvien = Giangvien::find(Session::get('user_id'));

       if($Giangvien->hangchucdanhnghenghiep == '')
          die('Vui lòng cập nhật thông tin cá nhân về hạng chức danh nghề nghiệp trước khi đánh giá');

       if($Giangvien->bac == 0)
          die('Vui lòng cập nhật thông tin cá nhân về bậc lương hiện tại trước khi đánh giá');

       if($Giangvien->hesoluong == 0)
          die('Vui lòng cập nhật thông tin cá nhân về hệ số lương hiện tại trước khi đánh giá');

    	$Phieudanhgia=Phieudanhgia::where('id_giangvien',Session::get('user_id'))
    								->where('id_thongbao',$Thongbaodanhgia->id)
    								->first();

    	$Tieuchikhac=Tieuchikhac::where('hienthi',1)->orderby('stt')->get();

      $Khoagopy = Phieukhac::where('id_phieu',$Phieudanhgia->id)
                                   ->where('gopykhoa','<>',null)
                                   ->where('phanhoikhoa',null)
                                   ->get();

      $Bomongopy = Phieukhac::where('id_phieu',$Phieudanhgia->id)
                                   ->where('gopybomon','<>',null)
                                   ->where('phanhoibomon',null)
                                   ->get();

    	return view('Admin.Giangvien.Danhgia.Tieuchikhac',['tab'=>$idtab,'Phieudanhgia'=>$Phieudanhgia,'Tieuchikhac'=>$Tieuchikhac,'Khoagopy'=>$Khoagopy,'Bomongopy'=>$Bomongopy,'Thongbaodanhgia' => $Thongbaodanhgia]);
  }


    public function postTieuchikhac(PhieukhacRequest $request){

      //lấy thông tin cũ
        $Phieukhac=Phieukhac::where('id_phieu',$request->id_phieu)->get();

      //bật cờ, chuyển thông tin cũ sang dạng "chuẩn bị xóa"
      foreach ($Phieukhac as  $phieu) {
         $phieu->isDelete=1;
         $phieu->update();
      }
      //có trường hợp thông tin k được lưu lại trong mycheck mà đã có sẵn trong csdl, cần lọc ra dược những thông tin này
      $array_tieuchi=[]; //mảng này lưu lại các id_tieuchi có trong mycheck nhằm kiểm lại 1 lần nữa tránh thiếu sót
        
      if($request->mycheck!=null){
            foreach ($request->mycheck as $mc){
               $Phieukhac=new Phieukhac();
               $Phieukhac->id_phieu=$request->id_phieu;
               $Phieukhac->id_tieuchi=$mc;
               $soluong='soluong'.$mc;
               $diemdat='diemdat'.$mc;
               $minhchung='minhchunght'.$mc;
               $Phieukhac->soluong=$request->$soluong;
               $Phieukhac->diemdat=$request->$diemdat;
               $Phieukhac->minhchung=$request->$minhchung;
               $Phieukhac->giangvienduyet=1;
               array_push($array_tieuchi,$mc);
               //lấy thông tin cũ chuyển sang phiếu mới (nếu có)
               $phieu=Phieukhac::where('id_phieu',$request->id_phieu)->where('id_tieuchi',$mc)->where('isDelete',1)->first();
               if ($phieu) {  //nếu thông tin được duyệt thì giữ lại
                  $Phieukhac->soluongkhoa=$phieu->soluongkhoa;
                  $Phieukhac->diemdatkhoa=$phieu->diemdatkhoa;
                  $Phieukhac->soluongbomon=$phieu->soluongbomon;
                  $Phieukhac->diemdatbomon=$phieu->diemdatbomon;
                  $Phieukhac->gopykhoa=$phieu->gopykhoa;
                  $Phieukhac->gopybomon=$phieu->gopybomon;
                  $Phieukhac->phanhoikhoa=$phieu->phanhoikhoa;
                  $Phieukhac->phanhoibomon=$phieu->phanhoibomon;
                  $Phieukhac->bomonduyet=$phieu->bomonduyet;
                  $Phieukhac->khoaduyet=$phieu->khoaduyet;
               }
               $Phieukhac->save();
            }
        }
        
        //kiểm lại thong tin thiết
        $Phieukhac=Phieukhac::where('id_phieu',$request->id_phieu)->whereNotIn('id_tieuchi',$array_tieuchi)->where('isDelete',1)->get();
        //return $Phieukhac;
        foreach ($Phieukhac as  $phieu) {
            if($phieu->khoaduyet!=0 || $phieu->bomonduyet!=0){
               $Phieukhac=new Phieukhac();
               $Phieukhac->id_phieu=$phieu->id_phieu;
               $Phieukhac->id_tieuchi=$phieu->id_tieuchi;
               $soluong=$phieu->soluong;
               $diemdat=$phieu->diemdat;
               $minhchung=$phieu->minhchung;
               $Phieukhac->soluong=$phieu->soluong;
               $Phieukhac->diemdat=$phieu->diemdat;
               $Phieukhac->minhchung=$phieu->minhchung;
               $Phieukhac->giangvienduyet=$phieu->giangvienduyet;
               $Phieukhac->soluongkhoa=$phieu->soluongkhoa;
               $Phieukhac->diemdatkhoa=$phieu->diemdatkhoa;
               $Phieukhac->soluongbomon=$phieu->soluongbomon;
               $Phieukhac->diemdatbomon=$phieu->diemdatbomon;
               $Phieukhac->gopykhoa=$phieu->gopykhoa;
               $Phieukhac->gopybomon=$phieu->gopybomon;
               $Phieukhac->phanhoikhoa=$phieu->phanhoikhoa;
               $Phieukhac->phanhoibomon=$phieu->phanhoibomon;
               $Phieukhac->bomonduyet=$phieu->bomonduyet;
               $Phieukhac->khoaduyet=$phieu->khoaduyet;
               $Phieukhac->save();
            }
        }
        //xóa đi thông tin cũ
        $Phieukhac=Phieukhac::where('id_phieu',$request->id_phieu)->where('isDelete',1)->delete();

        $Phieudanhgia=Phieudanhgia::find($request->id_phieu);
        $Phieudanhgia->diemkhac=Phieukhac::where('id_phieu',$request->id_phieu)->sum('diemdat');
        $Phieudanhgia->save();
        return redirect('set_giangvien/danh-gia-vien-chuc/tieu-chi-khac/3')->with('thongbao','Đã lưu kết đánh giá');
    }

   public function getTuDanhGia($idtab)
   {
      $Thongbaodanhgia=Thongbaodanhgia::where('hienthi',1)->first();
      
      $Phieudanhgia=Phieudanhgia::where('id_giangvien',Session::get('user_id'))
    								->where('id_thongbao',$Thongbaodanhgia->id)
    								->first();
      
      return view('Admin.Giangvien.Danhgia.Tudanhgia',['tab'=>$idtab,'Phieudanhgia'=>$Phieudanhgia,'Thongbaodanhgia'=>$Thongbaodanhgia]);
   }

   public function postTuDanhGia(Request $request)
   {
      $Phieudanhgia=Phieudanhgia::find($request->id_phieu);
      $Phieudanhgia->chinhTriTuTuong=$request->chinhTriTuTuong;
      $Phieudanhgia->daoDucLoiSong=$request->daoDucLoiSong;
      $Phieudanhgia->tacPhong=$request->tacPhong;
      $Phieudanhgia->toChucKyLuat=$request->toChucKyLuat;
      $Phieudanhgia->thaiDoPhucVu=$request->thaiDoPhucVu;
      $Phieudanhgia->kqHoatDongCoQuan=$request->kqHoatDongCoQuan;
      $Phieudanhgia->nangLucLanhDao=$request->nangLucLanhDao;

      $Phieudanhgia->nangLucDoanKet=$request->nangLucDoanKet;
      $Phieudanhgia->tuNhanXet=$request->tuNhanXet;
      $Phieudanhgia->tuXepLoai=$request->tuXepLoai;
      $Phieudanhgia->save();
      return redirect('set_giangvien/danh-gia-vien-chuc/tu-danh-gia/4')->with('thongbao','Đã lưu kết đánh giá');
   }

    public function getquydinh($idtab){
      return view('Admin.Giangvien.Danhgia.Xemthongbao',['tab'=>$idtab]);
  }

  public function getquydinhkhac($idtab){
   return view('Admin.Giangvien.Danhgia.Xemthongbaokhac',['tab'=>$idtab]);
   }  



    public function test(){
    	// $Tieuchi=Tieuchi::where('id_tieuchuan',2)->get();
    	// foreach ($Tieuchi as $tc) {
	    // 	$Tieuchi_nckh_detai =new Tieuchi_nckh_detai();
	    // 	$max=Tieuchi_nckh_detai::max('id');
	    // 	$Tieuchi_nckh_detai->stt=$max+1;
	    // 	$Tieuchi_nckh_detai->ten=$tc->ten;
	    // 	$Tieuchi_nckh_detai->diem=$tc->diem;
	    // 	$Tieuchi_nckh_detai->donvitinh=$tc->donvitinh;
	    //     $Tieuchi_nckh_detai->loaiminhchung=$tc->loaiminhchung;
	    //     $Tieuchi_nckh_detai->id_capdetai=100;
	    //     $Tieuchi_nckh_detai->id_loaitacgia=100;
	    // 	$Tieuchi_nckh_detai->save();
    	// }
    	$Tieuchi_nckh_baibao=Tieuchi_nckh_baibao::where('ten','like','%đề tài%')->delete();

    }
}
