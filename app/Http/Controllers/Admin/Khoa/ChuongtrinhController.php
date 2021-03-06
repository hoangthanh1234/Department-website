<?php

namespace App\Http\Controllers\Admin\Khoa;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ChuongtrinhRequest;
use App\Http\Controllers\Controller;
use App\Models\Chuongtrinh;
use App\Models\CT_daotao;
use App\Models\CT_xettuyen;	
use App\Models\Mon;
use App\Models\Tohop;
use App\Models\Bomon;
use App\Models\Bacdaotao;
use App\Models\Hedaotao;
use App\Models\Hocky;
use DateTime;

class ChuongtrinhController extends Controller
{
    public function getList(){

    	$Chuongtrinh=Chuongtrinh::all();
    	return view('Admin.Khoa.Chuongtrinh.List',['Chuongtrinh'=>$Chuongtrinh]);
    }

    public function getthongtinchung($tab){
    	$Bacdaotao=Bacdaotao::all();
    	$Hedaotao=Hedaotao::all();
    	$Bomon=Bomon::all();    	
    	return view('Admin.Khoa.Chuongtrinh.Them.Thongtinchung',['Bacdaotao'=>$Bacdaotao,'Hedaotao'=>$Hedaotao,'Bomon'=>$Bomon,'tab' => $tab]);
    }

    public function postthongtinchung(ChuongtrinhRequest $request){

    	$Chuongtrinh=new Chuongtrinh();
        $max=Chuongtrinh::max('id');        
    	$Chuongtrinh->stt=$max+1;
    	$Chuongtrinh->hienthi=1;    	
    	$Chuongtrinh->ten_vi=$request->ten_vi;
    	$Chuongtrinh->ten_en=$request->ten_en;
        $Chuongtrinh->tenkhongdau_vi=str_slug($request->ten_vi,'-');
        $Chuongtrinh->tenkhongdau_en=str_slug($request->ten_en,'-');
    	$Chuongtrinh->mota_vi=$request->mota_vi;
    	$Chuongtrinh->mota_en=$request->mota_en;
    	$Chuongtrinh->kynang_vi=$request->kynang_vi;
    	$Chuongtrinh->kynang_en=$request->kynang_en;
    	$Chuongtrinh->cohoi_vi=$request->cohoi_vi;
    	$Chuongtrinh->cohoi_en=$request->cohoi_en;
        if($request->hasFile('hinhanh')){
            $file=$request->file('hinhanh');
            $duoi=$file->getClientOriginalExtension();          
             if($duoi!='jpg' && $duoi!='png' && $duoi!='jpeg' && $duoi!='JPG' && $duoi!='PNG' && $duoi!='JPEG'){
                return redirect("set_admin/chuongtrinh/add")->with('thongbao','Chỉ hỗ trợ file png, jpg, jpeg');
             }
            $name=$file->getClientOriginalName();
            $hinh=str_random(4)."_".$name;
            while(file_exists("ht96_image/chuongtrinh/".$hinh)){
                $hinh=str_random(4)."_".$name;
            }
            $file->move("ht96_image/chuongtrinh",$hinh);
            $Chuongtrinh->hinhanh=$hinh;         
        }
        else $Chuongtrinh->hinhanh="noimage.jpg"; 
    	$Chuongtrinh->id_hedaotao=$request->id_hedaotao;
    	$Chuongtrinh->id_bacdaotao=$request->id_bacdaotao;
    	$Chuongtrinh->id_bomon=$request->id_bomon;
    	$Chuongtrinh->created_at=new DateTime();
    	$Chuongtrinh->save();
    	$max=Chuongtrinh::max('id'); 

    	return redirect('set_admin/chuong-trinh/them-chuong-trinh/mon-hoc/'.$max.'/2.html');
    }

    public function getmonhoc($id_chuongtrinh,$tab){
        return view('Admin.Khoa.Chuongtrinh.Them.Mon',['tab' => $tab,'id_chuongtrinh' => $id_chuongtrinh]);
    }

    public function postmonhoc($id_chuongtrinh,Request $request){
        
        $Chuongtrinh = Chuongtrinh::find($id_chuongtrinh);
        $Chuongtrinh->sohocky = $request->sohocky;
        $Chuongtrinh->save();

        $CT_daotao = CT_daotao::where('id_chuongtrinh',$id_chuongtrinh)->delete();

        for ($i=1; $i <= $request->sohocky ; $i++){            
            $somonhoc = 'somonhoc'.$i;
            for ($j=1; $j <= $request->$somonhoc ; $j++){
                $tenmon = 'tenmonhk'.$i.'m'.$j;
                $thinhgiang = 'tghk'.$i.'m'.$j; 
                $montam = explode('-',$request->$tenmon);
                $id_mon = $montam[0];
                $CT_daotao =  new CT_daotao();
                $CT_daotao->id_chuongtrinh = $id_chuongtrinh;
                $CT_daotao->id_mon = $id_mon;
                $CT_daotao->id_hocky = $i;                 
                if($request->$thinhgiang!=null)              
                $CT_daotao->thinhgiang = $request->$thinhgiang;
                $CT_daotao->save();
            }
        }

        return redirect('set_admin/chuong-trinh/them-chuong-trinh/to-hop/'.$id_chuongtrinh.'/3.html');
    }

    public function gettohop($id_chuongtrinh,$tab){
         $Tohop = Tohop::orderby('stt')->get();
         return view('Admin.Khoa.Chuongtrinh.Them.Tohop',['tab' => $tab, 'id_chuongtrinh' =>$id_chuongtrinh, 'Tohop' => $Tohop]);
        
    }

    public function posttohop($id_chuongtrinh,Request $request){
        $CT_xettuyen = CT_xettuyen::where('id_chuongtrinh',$id_chuongtrinh)->delete();
        $Tohop = Tohop::all();
       for ($i=0; $i < count($Tohop) ; $i++) { 
           $checkbox = 'checkbox'.$Tohop[$i]->id;
           $diem = 'diem'.$Tohop[$i]->id;
           if($request->$checkbox!=null){
                $CT_xettuyen = new CT_xettuyen();
                $CT_xettuyen->id_chuongtrinh = $id_chuongtrinh;
                $CT_xettuyen->id_tohop = $Tohop[$i]->id;
                $CT_xettuyen->diem = $request->$diem;
                $CT_xettuyen->save();
           }
       }
       return redirect('set_admin/chuong-trinh/list')->with('thongbao','Thêm Thành Công');

    }

    public function gethuythem($id_chuongtrinh){
        $CT_daotao = CT_daotao::where('id_chuongtrinh',$id_chuongtrinh)->delete();
        $CT_xettuyen = CT_xettuyen::where('id_chuongtrinh',$id_chuongtrinh)->delete();
        $Chuongtrinh = Chuongtrinh::where('id',$id_chuongtrinh)->delete();
        return redirect('set_admin/chuong-trinh/list');

    }

    ///////////////////////////////////////////////////////////////////////////////



    public function getcapnhatthongtinchung($id_chuongtrinh,$tab){
        $Bacdaotao=Bacdaotao::all();
        $Hedaotao=Hedaotao::all();
        $Bomon=Bomon::all(); 
        $Chuongtrinh = Chuongtrinh::find($id_chuongtrinh);      
        return view('Admin.Khoa.Chuongtrinh.Sua.Thongtinchung',['Bacdaotao'=>$Bacdaotao,'Hedaotao'=>$Hedaotao,'Bomon'=>$Bomon,'tab' => $tab,'Chuongtrinh' => $Chuongtrinh]);
    }

    public function postcapnhatthongtinchung($id_chuongtrinh,ChuongtrinhRequest $request){

        $Chuongtrinh= Chuongtrinh::find($id_chuongtrinh);           
        $Chuongtrinh->ten_vi=$request->ten_vi;
        $Chuongtrinh->ten_en=$request->ten_en;
        $Chuongtrinh->tenkhongdau_vi=str_slug($request->ten_vi,'-');
        $Chuongtrinh->tenkhongdau_en=str_slug($request->ten_en,'-');
        $Chuongtrinh->mota_vi=$request->mota_vi;
        $Chuongtrinh->mota_en=$request->mota_en;
        $Chuongtrinh->kynang_vi=$request->kynang_vi;
        $Chuongtrinh->kynang_en=$request->kynang_en;
        $Chuongtrinh->cohoi_vi=$request->cohoi_vi;
        $Chuongtrinh->cohoi_en=$request->cohoi_en;
         if($request->hasFile('hinhanh')){
            $file=$request->file('hinhanh');
            $duoi=$file->getClientOriginalExtension();          
             if($duoi!='jpg' && $duoi!='png' && $duoi!='jpeg' && $duoi!='JPG' && $duoi!='PNG' && $duoi!='JPEG' ){
                return redirect("set_admin/chuong-trinh/list")->with('thongbao','Chỉ hỗ trợ file png, jpg, jpeg');
             }
            $name=$file->getClientOriginalName();
            $hinh=str_random(4)."_".$name;
            while(file_exists("ht96_image/chuongtrinh/".$hinh)){
                $hinh=str_random(4)."_".$name;
            }
            $file->move("ht96_image/chuongtrinh",$hinh);
            if(file_exists("ht96_image/chuongtrinh/".$Chuongtrinh->hinhanh))
            unlink("ht96_image/chuongtrinh/".$Chuongtrinh->hinhanh);
            $Chuongtrinh->hinhanh=$hinh;  
        } 
        $Chuongtrinh->id_hedaotao=$request->id_hedaotao;
        $Chuongtrinh->id_bacdaotao=$request->id_bacdaotao;
        $Chuongtrinh->id_bomon=$request->id_bomon;       
        $Chuongtrinh->save();         

        return redirect('set_admin/chuong-trinh/cap-nhat-chuong-trinh/mon-hoc/'.$id_chuongtrinh.'/2.html');
    }


    public function getcapnhatmonhoc($id_chuongtrinh,$tab){
        $Chuongtrinh = Chuongtrinh::find($id_chuongtrinh);
        $Hocky = Hocky::all();
        $Mon = Mon::all();
        return view('Admin.Khoa.Chuongtrinh.Sua.Mon',['tab' => $tab,'Chuongtrinh' => $Chuongtrinh,'Hocky' => $Hocky,'Mon' => $Mon]);
    }

    public function postcapnhatmonhoc($id_chuongtrinh,Request $request){
        
        $Chuongtrinh = Chuongtrinh::find($id_chuongtrinh);
        $Chuongtrinh->sohocky = $request->sohocky;
        $Chuongtrinh->save();

        $CT_daotao = CT_daotao::where('id_chuongtrinh',$id_chuongtrinh)->delete();

        for ($i=1; $i <= $request->sohocky ; $i++){            
            $somonhoc = 'somonhoc'.$i;
            for ($j=1; $j <= $request->$somonhoc ; $j++){
                $tenmon = 'tenmonhk'.$i.'m'.$j;
                $thinhgiang = 'tghk'.$i.'m'.$j; 
                $montam = explode('-',$request->$tenmon); 
                $id_mon = $montam[0];
                $CT_daotao =  new CT_daotao();
                $CT_daotao->id_chuongtrinh = $id_chuongtrinh;
                $CT_daotao->id_mon = $id_mon;
                $CT_daotao->id_hocky = $i;                 
                if($request->$thinhgiang!=null)              
                $CT_daotao->thinhgiang = $request->$thinhgiang;
                $CT_daotao->save();
            }
        }

        return redirect('set_admin/chuong-trinh/them-chuong-trinh/to-hop/'.$id_chuongtrinh.'/3.html');
    }


    public function getcapnhattohop($id_chuongtrinh,$tab){
        $Chuongtrinh = Chuongtrinh::find($id_chuongtrinh);
        $Tohop = Tohop::all();
        return view('Admin.Khoa.Chuongtrinh.Sua.Tohop',['tab' => $tab,'Chuongtrinh' => $Chuongtrinh,'Tohop' => $Tohop]);
    }

    /////////////////////////////////////////////////////////////////////////////

    

     public function OneDelete($id){
         $Chuongtrinh =Chuongtrinh::find($id);        
         if(file_exists("ht96_image/chuongtrinh/".$Chuongtrinh->hinhanh))
            unlink("ht96_image/chuongtrinh/".$Chuongtrinh->hinhanh); 
         $ctxettuyen=CT_xettuyen::where('id_chuongtrinh',$id)->delete();
         $ctdaotao=CT_daotao::where('id_chuongtrinh',$id)->delete();
         $Chuongtrinh->delete();
         return redirect("set_admin/chuong-trinh/list")->with('thongbao','xóa thành công');
    }

    public function MultiDelete($id){        
        $ids = explode(",", $id);
        for ($i=0; $i <count($ids) ; $i++) { 
        $Chuongtrinh =Chuongtrinh::find($ids[$i]);            
            if(file_exists("ht96_image/chuongtrinh/".$Chuongtrinh->hinhanh))
                        unlink("ht96_image/chuongtrinh/".$Chuongtrinh->hinhanh); 
                    $ctxettuyen=CT_xettuyen::where('id_chuongtrinh',$ids[$i])->delete();
                    $ctdaotao=CT_daotao::where('id_chuongtrinh',$ids[$i])->delete();
                    $Chuongtrinh->delete();
                }
               
                return redirect("set_admin/chuong-trinh/list")->with('thongbao','xóa thành công');

    }

    


   
}
