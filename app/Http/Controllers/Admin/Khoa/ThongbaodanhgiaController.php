<?php

namespace App\Http\Controllers\Admin\Khoa;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ThongbaodanhgiaRequest;
use App\Http\Controllers\Controller;
use App\Models\Thongbaodanhgia;
use App\Models\Giangvien;
use App\Models\Phieudanhgia;
use App\Models\Phieu_nckh_baibao;
use App\Models\Phieu_nckh_detai;
use App\Models\Phieugiangday;
use App\Models\Phieukhac;
use App\Models\Bomon;
use App\Models\Tieuchuan;
use App\Models\CT_danhgia;
use Carbon\Carbon;
use DB;
use Mail;
use DateTime;

class ThongbaodanhgiaController extends Controller
{
   public function getList(){
   	
   		$Thongbao=Thongbaodanhgia::orderby('stt')->paginate(10);
      $Bomon=Bomon::orderby('stt')->get();
   		return view('Admin.Khoa.Thongbaodanhgia.List',['Thongbao'=>$Thongbao,'Bomon'=>$Bomon]);
   }

   public function getAdd(){

   		return view('Admin.Khoa.Thongbaodanhgia.Add');
   }

   public function postAdd(ThongbaodanhgiaRequest $request){

   		$Thongbaodanhgia=new Thongbaodanhgia();
   		$Thongbaodanhgia->stt=Thongbaodanhgia::max('id')+1;
   		$Thongbaodanhgia->trangthai=1;
   		$Thongbaodanhgia->ten=$request->ten;
   		$Thongbaodanhgia->ngaybatdau= Carbon::createFromFormat('d/m/Y',$request->ngaybatdau)->format("Y/m/d");
   		$Thongbaodanhgia->ngayketthuc= Carbon::createFromFormat('d/m/Y',$request->ngayketthuc)->format("Y/m/d");
      $Thongbaodanhgia->tungay= Carbon::createFromFormat('d/m/Y',$request->tungay)->format("Y/m/d");
      $Thongbaodanhgia->denngay= Carbon::createFromFormat('d/m/Y',$request->denngay)->format("Y/m/d");
   		$Thongbaodanhgia->save();

   		$Giangvien=Giangvien::where('id_bomon','<>',7)->where('id_chucvu','<>',15)->get();
   		foreach ($Giangvien as $GV) {
   			$Phieudanhgia=new Phieudanhgia();
   			$Phieudanhgia->maphieu=Carbon::createFromFormat('d/m/Y',$request->ngaybatdau)->format("Y/m/d").'_GV'.$GV->id.'_TB'.Thongbaodanhgia::max('id');
   			$Phieudanhgia->id_giangvien=$GV->id;
   			$Phieudanhgia->id_thongbao=Thongbaodanhgia::max('id');
        $Phieudanhgia->xeploai="";
   			$Phieudanhgia->created_at=new DateTime();
   			$Phieudanhgia->save();
         // Mail::send('Email.Thongbaodanhgia', array('name'=>$request->ten, 'ngaybd'=>Carbon::createFromFormat('d/m/Y',$request->ngaybatdau)->format("Y/m/d"), 'ngaykt' => Carbon::createFromFormat('d/m/Y',$request->ngayketthuc)->format("Y/m/d")), function($message) use ($GV){
         //    $message->from('ktcn@tvu.edu.vn',"Khoa Kỹ thuật và Công nghệ");
         //    $message->to($GV->email)->subject('Thông báo đánh giá viên chức');    
     // });

   		}

      
   		return redirect('set_admin/thongbaodanhgia/list')->with('thongbao','Thêm thành công');
   }

   public function getEdit($id){

   		$Thongbaodanhgia=Thongbaodanhgia::find($id);
   		return view('Admin.Khoa.Thongbaodanhgia.Edit',['Thongbaodanhgia'=>$Thongbaodanhgia]);
   		
   }

   public function postEdit($id,ThongbaodanhgiaRequest $request){

   		$Thongbaodanhgia=Thongbaodanhgia::find($id);   		
   		$Thongbaodanhgia->ten=$request->ten;
   		$Thongbaodanhgia->ngaybatdau= Carbon::createFromFormat('d/m/Y',$request->ngaybatdau)->format("Y/m/d");
   		$Thongbaodanhgia->ngayketthuc= Carbon::createFromFormat('d/m/Y',$request->ngayketthuc)->format("Y/m/d");
      $Thongbaodanhgia->tungay= Carbon::createFromFormat('d/m/Y',$request->tungay)->format("Y/m/d");
      $Thongbaodanhgia->denngay= Carbon::createFromFormat('d/m/Y',$request->denngay)->format("Y/m/d");
   		$Thongbaodanhgia->save();
   		return redirect('set_admin/thongbaodanhgia/list')->with('thongbao','cập nhật thành công');;

   }

   public function OneDelete($id){
    
         $Thongbaodanhgia =Thongbaodanhgia::find($id);   
         $Phieudanhgia=Phieudanhgia::where('id_thongbao',$id)->get();   

         if(count($Phieudanhgia) != 0){
          foreach ($Phieudanhgia as $phieu){
            $Phieugiangday = Phieugiangday::where('id_phieu',$phieu->id)->delete();
            $Phieu_nckh_baibao = Phieu_nckh_baibao::where('id_phieu',$phieu->id)->delete();
            $Phieu_nckh_detai = Phieu_nckh_detai::where('id_phieu',$phieu->id)->delete();
            $Phieukhac = Phieukhac::where('id_phieu',$phieu->id)->delete();
            $Phieudanhgia = Phieudanhgia::where('id',$phieu->id)->delete();
          }
          
         }

         $Thongbaodanhgia->delete();
         return redirect("set_admin/thongbaodanhgia/list")->with('thongbao','Xóa thành công');
    }

    public function MultiDelete($id){
        
                $ids = explode(",", $id);
                for ($i=0; $i <count($ids) ; $i++) { 
                     $Thongbaodanhgia =Thongbaodanhgia::find($ids[$i]);         
                     $Phieudanhgia=Phieudanhgia::where('id_thongbao',$ids[$i])->get();                        
                     if(count($Phieudanhgia) != 0){
                      foreach ($Phieudanhgia as $phieu) {
                        $Phieugiangday = Phieugiangday::where('id_phieu',$phieu->id)->delete();
                        $Phieu_nckh_baibao = Phieu_nckh_baibao::where('id_phieu',$phieu->id)->delete();
                        $Phieu_nckh_detai = Phieu_nckh_detai::where('id_phieu',$phieu->id)->delete();
                        $Phieukhac = Phieukhac::where('id_phieu',$phieu->id)->delete();
                        $Phieudanhgia = Phieudanhgia::where('id',$phieu->id)->delete();
                      }
                      
                     }
                      $Thongbaodanhgia->delete();
                }              
                return redirect("set_admin/thongbaodanhgia/list")->with('thongbao','Xóa thành công'); 
            

    }

    public function danhsachdanhgia($thongbao,$bomon){
        
          $danhsach=DB::table('ht96_thongbaodanhgia')
           ->join('ht96_phieudanhgia','ht96_phieudanhgia.id_thongbao','=','ht96_thongbaodanhgia.id' )
           ->join('ht96_giangvien','ht96_giangvien.id','=','ht96_phieudanhgia.id_giangvien')
           ->join('ht96_bomon','ht96_bomon.id','=','ht96_giangvien.id_bomon')
           ->where('ht96_giangvien.id_bomon',$bomon)
           ->where('ht96_thongbaodanhgia.id',$thongbao)
           ->select('ht96_thongbaodanhgia.*','ht96_giangvien.ten as tengiangvien','ht96_giangvien.maso','ht96_bomon.ten_vi as tenbomon','ht96_phieudanhgia.id as id_phieu')
           ->orderby('ht96_phieudanhgia.tongdiemgv','DESC')
           ->orderby('ht96_giangvien.ten','DESC')
           ->get();
        $Tieuchuan=Tieuchuan::where('hienthi',1)->orderby('stt')->get(); 
        $CT_danhgia=CT_danhgia::all();
        $Thongbaodanhgia=Thongbaodanhgia::orderby('stt')->get();
        $Bomon=Bomon::orderby('stt')->get();
        return view('Admin.Khoa.Thongbaodanhgia.Danhsachdanhgia',['Danhsach'=>$danhsach,'Tieuchuan'=>$Tieuchuan,'CT_danhgia'=>$CT_danhgia,'Thongbaodanhgia'=>$Thongbaodanhgia,'Bomon'=>$Bomon,'tbn'=>$thongbao,'bmn'=>$bomon]);
    }

    public function getdanhgia($id_phieu){
          $Tieuchuan=Tieuchuan::where('hienthi',1)->get();             
          $Phieudanhgia=Phieudanhgia::find($id_phieu);
          $lastdg=CT_danhgia::where('id_phieudanhgia',$id_phieu)->get();
          $sum=Phieudanhgia::find($id_phieu)->tongdiemk;
          return view('Admin.Khoa.Thongbaodanhgia.Danhgia',['Tieuchuan'=>$Tieuchuan,'Phieudanhgia'=>$Phieudanhgia,'last'=>$lastdg,'sum'=>$sum]);
    }
}

