<?php

namespace App\Http\Controllers\Admin\Giangvien;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\AjaxRequest;
use App\Http\Controllers\Controller;
use App\Models\CT_danhgia;
use App\Models\CT_baibao;
use App\Models\CT_detai;
use App\Models\Phieudanhgia;
use App\Models\Phieugiangday;
use App\Models\Phieu_nckh_baibao;
use App\Models\Phieu_nckh_detai;
use App\Models\Phieukhac;
use App\Models\Tieuchi_nckh_baibao;
use App\Models\Tieuchi_nckh_detai;
use App\Models\Phongnc;
use App\Models\Phancongbaocaonc;
use Carbon\Carbon;
use DateTime;
use Session;
use App\Models\Mon;
use App\Models\Monsotruong;
use App\Models\BacChucDanh;




class AjaxController extends Controller
{


public function hienthi($id,$bang,$type,$value){DB::table($bang)->where('id', $id)->update([$type => $value]);}

public function stt($id,$bang,$value){DB::table($bang)->where('id', $id)->update(['stt' => $value]);}  


public function uploadminhchung(AjaxRequest $request){    

	$filename='';
	if($request->hasFile('file')){
		$uploadok=1;   
		$size=$request->file('file')->getClientSize();
		$extension = $request->file('file')->getClientOriginalExtension();
		 		
		$CTdanhgia=CT_danhgia::where('id_phieudanhgia',$request->phieudanhgia)->where('id_tieuchi',$request->tieuchi)->first();
					// if($CTdanhgia->minhchung!='')
					// 	unlink('ht96_minhchung/'.$CTdanhgia->minhchung);

			$dir = 'ht96_minhchung/';
			$filename = uniqid().'_'.time().'_'.date('Ymd').'.'.$extension;
			$request->file('file')->move($dir, $filename);					
			$CTdanhgia->minhchung=$dir.$filename;
			$CTdanhgia->save();					
			$result = array('filename'=>$filename,'ketqua'=>$uploadok,'tb'=>'cập nhật thành công');	
				
			}
			else				
				$result = array('filename'=>$filename,'ketqua'=>0,'tb'=>'Vui lòng chọn file');
				echo json_encode($result);			
}		

//minh chung danh cho phieu giang day	
    	
public function uploadminhchunggiangdaylink(AjaxRequest $request){	 
	$Phieu=Phieugiangday::where('id_phieu',$request->id_phieu)->where('id_tieuchi',$request->id_tieuchi)->first();
	$Phieu->minhchung=$request->minhchung;
	$Phieu->save();
	echo "Cập nhật thành công";
}

public function uploadminhchunggiangdayfile(AjaxRequest $request){ 	
	if($request->hasFile('files')){
		$chuoitam='';
	   $files=$request->file('files');
	   foreach($files as $file){	  
	    	$filename='';
	    	$extension = $file->getClientOriginalExtension();
	 		$filename.= 'drive_'.uniqid().'_'.time().'_'.date('Ymd').'.'.$extension;   
	 		$content = file_get_contents($file);
	 		Storage::disk('google')->put($filename,$content);	 
	 		$chuoitam.=$filename.",";  	
	   }
	   $chuoitam= rtrim($chuoitam, ",");
	   $Phieugiangday=Phieugiangday::where('id_phieu',$request->id_phieu)->where('id_tieuchi',$request->id_tieuchi)->first();
	   $Phieugiangday->minhchung=$chuoitam;
	   $Phieugiangday->save();
	   echo "Cập nhật minh chứng hoàn tất";
	}
}

public function getfiledrive($filename){    	
	$dir = '/';
    $recursive = false; // Có lấy file trong các thư mục con không?
    $contents = collect(Storage::cloud()->listContents($dir, $recursive));
    $file = $contents
        ->where('type', '=', 'file')
        ->where('filename', '=', pathinfo($filename, PATHINFO_FILENAME))
        ->where('extension', '=', pathinfo($filename, PATHINFO_EXTENSION))
        ->first(); // có thể bị trùng tên file với nhau!
        //return $file; // array with file info
    $rawData = Storage::cloud()->get($file['path']);
    return response($rawData, 200)
     ->header('Content-Type', $file['mimetype'])
     ->header('Content-Disposition', "attachment; filename= $filename");
}
//minh chung danh cho tieu chi khac

public function uploadminhchungkhaclink(AjaxRequest $request){	 
	$Phieu=Phieukhac::where('id_phieu',$request->id_phieu)->where('id_tieuchi',$request->id_tieuchi)->first();
	$Phieu->minhchung=$request->minhchung;
	$Phieu->save();
	echo "Cập nhật thành công";
}

public function uploadminhchungkhacfile(AjaxRequest $request){ 

	if($request->hasFile('files')){
	   $chuoitam='';
	   $files=$request->file('files');
	   foreach($files as $file){	  
	    	$filename='';
	    	$extension = $file->getClientOriginalExtension();
	 		$filename.= 'drive_'.uniqid().'_'.time().'_'.date('Ymd').'.'.$extension;   
	 		$content = file_get_contents($file);
	 		Storage::disk('google')->put($filename,$content);	 
	 		$chuoitam.=$filename.",";  	
	   }
	   $chuoitam= rtrim($chuoitam, ",");
	   $Phieukhac=Phieukhac::where('id_phieu',$request->id_phieu)->where('id_tieuchi',$request->id_tieuchi)->first();
	   $Phieukhac->minhchung=$chuoitam;
	   $Phieukhac->save();
	   echo "Cập nhật minh chứng hoàn tất";
	}
	
}


public function phanhoibomon( AjaxRequest $request){
    $Phieugiangday=Phieugiangday::find($request->id);
    $Phieugiangday->phanhoibomon=$request->phanhoibomon;
    $Phieugiangday->save();
    echo "Phản hồi thành công";
}

public function phanhoikhoa(AjaxRequest $request){
    $Phieugiangday=Phieugiangday::find($request->id);
    $Phieugiangday->phanhoikhoa=$request->phanhoikhoa;
    $Phieugiangday->save();
    echo "1";
}

public function phanhoibomonkhac( AjaxRequest $request){
    $Phieukhac=Phieukhac::find($request->id);
    $Phieukhac->phanhoibomon=$request->phanhoibomon;
    $Phieukhac->save();
    echo "Phản hồi thành công";
}

public function phanhoikhoakhac(AjaxRequest $request){
    $Phieukhac=Phieukhac::find($request->id);
    $Phieukhac->phanhoikhoa=$request->phanhoikhoa;
    $Phieukhac->save();
    echo "1";
}

public function themphieubaibao(AjaxRequest $request){

	$CT_baibao = CT_baibao::find($request->id_chitietbaibao);
	$Phieu_nckh_baibao = new Phieu_nckh_baibao();
	$Phieu_nckh_baibao->id_tieuchi=$request->id_tieuchi;
	$Phieu_nckh_baibao->id_phieu = $request->id_phieu;
	$Phieu_nckh_baibao->id_chitietbaibao = $request->id_chitietbaibao;
	$Phieu_nckh_baibao->minhchung = $CT_baibao->baibao->minhchung;
	$Phieu_nckh_baibao->giangvienduyet=1;
	$Phieu_nckh_baibao->save();

	$Tieuchi=Tieuchi_nckh_baibao::find($request->id_tieuchi);
	$Phieudanhgia=Phieudanhgia::find($request->id_phieu);
    $Phieudanhgia->diemnckh+=$Tieuchi->diem;
    $Phieudanhgia->save();
	echo "Đã thêm đánh giá bài báo này thành công";
}

public function xoaphieubaibao(AjaxRequest $request){


	$Phieu_nckh_baibao = Phieu_nckh_baibao::where('id_phieu',$request->id_phieu)											
											->where('id_chitietbaibao',$request->id_chitietbaibao)
											->first();
	if($Phieu_nckh_baibao != null){										
		$Phieudanhgia=Phieudanhgia::find($request->id_phieu);
		$Phieudanhgia->diemnckh-=$Phieu_nckh_baibao->tieuchi->diem;
		$Phieudanhgia->save();
		$Phieu_nckh_baibao->delete();
	}
		echo "Cập nhật thành công";
}

public function themphieudetai(AjaxRequest $request){

	$CT_detai = CT_detai::find($request->id_chitietdetai);

	$Phieu_nckh_detai = new Phieu_nckh_detai();
	$Phieu_nckh_detai->id_tieuchi=$request->id_tieuchi;
	$Phieu_nckh_detai->id_phieu = $request->id_phieu;
	$Phieu_nckh_detai->id_chitietdetai= $request->id_chitietdetai;
	$Phieu_nckh_detai->minhchung = $CT_detai->detai->minhchung;
	$Phieu_nckh_detai->giangvienduyet=1;
	$Phieu_nckh_detai->save();

	$Tieuchi=Tieuchi_nckh_detai::find($request->id_tieuchi);
	$Phieudanhgia=Phieudanhgia::find($request->id_phieu);
    $Phieudanhgia->diemnckh+=$Tieuchi->diem;
    $Phieudanhgia->save();
	echo "Đã thêm đánh giá bài báo này thành công";
}


public function xoaphieudetai(AjaxRequest $request){
	$Phieu_nckh_detai = Phieu_nckh_detai::where('id_phieu',$request->id_phieu)											
											->where('id_chitietdetai',$request->id_chitietdetai)
											->first();
	if($Phieu_nckh_detai != null){
		$Phieudanhgia=Phieudanhgia::find($request->id_phieu);
		$Phieudanhgia->diemnckh-=$Phieu_nckh_detai->tieuchi->diem;
		$Phieudanhgia->save();
		$Phieu_nckh_detai->delete();
	}	
		echo "Cập nhật thành công";
}

public function luumonsotruong($id_mon){
	$Monsotruong = new Monsotruong();
	$Monsotruong->id_mon = $id_mon;
	$Monsotruong->id_giangvien = Session::get('user_id');
	$Monsotruong->save();
	echo "Thêm Thành công";
}

public function xoamonsotruong($id_mon){
	$Monsotruong = Monsotruong::where('id_mon',$id_mon)->where('id_giangvien',Session::get('user_id'))->delete();
	echo "Xóa thành công";
}

public function loadmon($id_bomon){
	$Mon = Mon::where('id_bomon',$id_bomon)->get();

	$noidung = '';
	foreach ($Mon as $m) {
		$noidung.='<option value="'.$m->id.'">'.$m->ten_vi.'</option>';
	}
	echo $noidung;
}

public function loadphong(AjaxRequest $request){

	$Phong = Phongnc::where('id_loaiphong',$request->id_baocao)->get();
	$Phancongbaocao = Phancongbaocaonc::all();
	$ngay1 = Carbon::createFromFormat('d/m/Y',$request->ngaybaocao)->format("Y/m/d");
	$noidung ='';
	foreach ($Phong as $P){
		$noidung.='<option value="';

		 $check = 1;
		 foreach ($Phancongbaocao as $pcbc){
		 	
			$ngay2 = Carbon::createFromFormat('Y-m-d',$pcbc->ngaybaocao)->format("Y/m/d");
		 if($pcbc->id_phong == $P->id && $pcbc->buoi == $request->buoi && $ngay1 == $ngay2 )
		 		$check = 0;	 
		 }

		 if($check == 1) 
		 	$noidung.=$P->id;
		 else 
		 	$noidung.=0;

		$noidung.='">'.$P->ma;
		
		if($check == 0)
		 	$noidung.= '  <b>Bận</b>';
		 
		$noidung.='</option>';
	}
	
	
	
	echo $noidung;
	
}

 public function get_bac_by_ma_hang($maHang)
 {
	 return BacChucDanh::where('id_chuc_danh',$maHang)->get();
 }
 public function get_he_so_luong_by_ma_bac($maBac)
 {
	 return BacChucDanh::find($maBac);
 }   
}
 