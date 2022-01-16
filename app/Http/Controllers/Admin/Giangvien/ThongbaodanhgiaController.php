<?php

namespace App\Http\Controllers\Admin\Giangvien;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CTdanhgiaRequest;
use App\Http\Controllers\Controller;
use App\Models\Giangvien;
use App\Models\Phieudanhgia;
use App\Models\Tieuchuan;
use App\Models\CT_danhgia;
use Session;
use DateTime;

class ThongbaodanhgiaController extends Controller
{
    public function getList(){

    	$Giangvien=Giangvien::find(Session::get('user_id'));    	
    	return view('Admin.Giangvien.Thongbaodanhgia.List',['Giangvien'=>$Giangvien]);
    }

    public function danhgia($id_giangvien,$id_phieu){


       $date = date("Y-m-d");
       $dieukien=1;
       $Phieudanhgia=Phieudanhgia::find($id_phieu);
       if($Phieudanhgia->id_giangvien!=Session::get('user_id')) die('Bạn không có quyền truy cặp liên kết này');

       if(strtotime($date)>strtotime($Phieudanhgia->thongbao->ngayketthuc)){         
          $dieukien=0;
       }
    	  $Tieuchuan=Tieuchuan::where('hienthi',1)->get();   
    	  $Giangvien=Giangvien::find($id_giangvien);
        $count=CT_danhgia::where('id_phieudanhgia',$id_phieu)->count();	
        $sum=CT_danhgia::where('id_phieudanhgia',$id_phieu)->sum('diemdat');
        $lastdg=CT_danhgia::where('id_phieudanhgia',$id_phieu)->get();
        $bomongopy=CT_danhgia::where('id_phieudanhgia',$id_phieu)->where('bomongopy','<>','')->get(); 
        $phanhoibomon=CT_danhgia::where('id_phieudanhgia',$id_phieu)->where('phanhoibomon','')->get(); 
        $khoagopy=CT_danhgia::where('id_phieudanhgia',$id_phieu)->where('khoagopy','<>','')->get(); 
        $phanhoikhoa=CT_danhgia::where('id_phieudanhgia',$id_phieu)->where('phanhoikhoa','')->get();  
        return view('Admin.Giangvien.Thongbaodanhgia.Danhgia',['Tieuchuan'=>$Tieuchuan,'Giangvien'=>$Giangvien,'Phieudanhgia'=>$Phieudanhgia,'last'=>$lastdg,'sum'=>$sum,'bomongopy'=>$bomongopy,'khoagopy'=>$khoagopy,'dieukien'=>$dieukien,'phanhoibomon'=>$phanhoibomon,'phanhoikhoa'=>$phanhoikhoa,]);
    }

    public function postAdd(CTdanhgiaRequest $request){
       
         $count=CT_danhgia::where('id_phieudanhgia',$request->id_phieudanhgia)->count();   

         if($request->sotc!=null){
            $array = explode(',', $request->sotc);        
            $canxoa=CT_danhgia::where('id_phieudanhgia',$request->id_phieudanhgia)->whereNotIn('id_tieuchi',$array)->get();
            if(count($canxoa)!=0){
              // foreach ($canxoa as $cx){   
              //   if($cx->minhchung!='')         
              //    unlink("ht96_minhchung/".$cx->minhchung);   
              // }
              
            }
          }
          
          if($count!=0)
              CT_danhgia::where('id_phieudanhgia',$request->id_phieudanhgia)->delete();           
    
          if(isset($array)){       
                 foreach ($array as $tc){
                      $soluong='soluong'.$tc;
                      $diemdat='diemdat'.$tc;
                      $minhchung='minhchung'.$tc;
                      $CT_danhgia=new CT_danhgia();
                      $CT_danhgia->soluong=$request->$soluong;
                      $CT_danhgia->diemdat=$request->$diemdat;
                      $CT_danhgia->id_phieudanhgia=$request->id_phieudanhgia;
                      $CT_danhgia->minhchung=$request->$minhchung;
                      $CT_danhgia->id_tieuchi=$tc;  
                      $CT_danhgia->giangvienduyet=1;              
                      $CT_danhgia->save();           
                 
                 }    

         }
         $Phieudanhgia=Phieudanhgia::find($request->id_phieudanhgia);
         $Phieudanhgia->tongdiemgv=$request->tongdiem;
         $Phieudanhgia->tongdiembm=0;
         $Phieudanhgia->tongdiemk=0;
         $Phieudanhgia->save();

      return redirect()->back()->with('thongbao','Đánh giá thành công');
       
    }

    
}
