<?php

namespace App\Http\Controllers\Admin\Khoa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tieuchuanchuongtrinh;
use App\Models\Chuongtrinh;
use App\Models\Bomon;
use App\Models\Hocky;

class TieuchuanchuongtrinhController extends Controller{
    
     public function getList($id){
    	
    	$Bomon = Bomon::all();
    	$Chuongtrinh = Chuongtrinh::all();
    	$Tieuchuanchuongtrinh = Tieuchuanchuongtrinh::where('id_chuongtrinh',$id)->orderby('id_hocky')->get();
    	
    	return view('Admin.Khoa.Tieuchuanchuongtrinh.List',['Bomon'=>$Bomon,'Chuongtrinh' => $Chuongtrinh,'Tieuchuanchuongtrinh' => $Tieuchuanchuongtrinh]);
    }

     public function getAdd(){     	
     	$Chuongtrinh=Chuongtrinh::all();  
        $Hocky = Hocky::all();   	
    	return view('Admin.Khoa.Tieuchuanchuongtrinh.Add',['Hocky'=>$Hocky,'Chuongtrinh'=>$Chuongtrinh]);
    }

    public function postAdd(Request $request){

        $Tieuchuanchuongtrinhtest = Tieuchuanchuongtrinh::where('id_chuongtrinh',$request->id_chuongtrinh)
                                                            ->where('id_hocky',$request->id_hocky)
                                                            ->get();

        if( count($Tieuchuanchuongtrinhtest) != 0)
            
        	return redirect("set_admin/tieu-chuan-chuong-trinh/list/".$Tieuchuanchuongtrinhtest[0]->id_chuongtrinh)->with('thongbao','Tiêu chuẩn này đã được thêm trước đó. Vui lòng kiểm tra lại');        
        else{

            $Tieuchuanchuongtrinh = new Tieuchuanchuongtrinh();     
            $Tieuchuanchuongtrinh->id_chuongtrinh = $request->id_chuongtrinh;
            $Tieuchuanchuongtrinh->id_hocky = $request->id_hocky;
            $Tieuchuanchuongtrinh->TCBB = $request->TCBB;
            $Tieuchuanchuongtrinh->LTBB = $request->LTBB;
            $Tieuchuanchuongtrinh->THBB = $request->THBB;
            $Tieuchuanchuongtrinh->TCTC = $request->TCTC;
            $Tieuchuanchuongtrinh->LTTC = $request->LTTC;
            $Tieuchuanchuongtrinh->THTC = $request->THTC;
            $Tieuchuanchuongtrinh->save();      
            return redirect("set_admin/tieu-chuan-chuong-trinh/list/".$request->id_chuongtrinh)->with('thongbao','Thêm thành công');
        }
        
    }

    public function getEdit($id_chuongtrinh,$id_hocky){
    	$Hocky=Hocky::all();
     	$Chuongtrinh=Chuongtrinh::all();
     	$Tieuchuanchuongtrinh = Tieuchuanchuongtrinh::where('id_chuongtrinh',$id_chuongtrinh)
                                                        ->where('id_hocky',$id_hocky)
                                                        ->first();                                                        
    	return view('Admin.Khoa.Tieuchuanchuongtrinh.Edit',['Hocky'=>$Hocky,'Chuongtrinh'=>$Chuongtrinh,'Tieuchuanchuongtrinh'=>$Tieuchuanchuongtrinh]);
    }

    public function postEdit(Request $request,$id_chuongtrinh,$id_hocky){
    	$Tieuchuanchuongtrinh = Tieuchuanchuongtrinh::where('id_chuongtrinh',$id_chuongtrinh)
                                                    ->where('id_hocky',$id_hocky) 
                                                    ->update(['TCBB' => $request->TCBB,'LTBB' => $request->LTBB,'THBB' => $request->THBB,'TCTC' => $request->TCTC, 'LTTC' => $request->LTTC, 'THTC' => $request->THTC]); 
                                                       
    
    	return redirect("set_admin/tieu-chuan-chuong-trinh/edit/".$id_chuongtrinh."/".$id_hocky)->with('thongbao','Cập nhật thành công');

    }

     public function OneDelete($id_chuongtrinh,$id_hocky){
    	 $Tieuchuanchuongtrinh = Tieuchuanchuongtrinh::where('id_chuongtrinh',$id_chuongtrinh)
                                                        ->where('id_hocky',$id_hocky)
                                                        ->delete(); 
    	return redirect("set_admin/tieu-chuan-chuong-trinh/list/".$id_chuongtrinh)->with('thongbao','Xóa thành công');
    }

}
