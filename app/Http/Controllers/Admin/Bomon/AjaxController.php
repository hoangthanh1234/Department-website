<?php

namespace App\Http\Controllers\Admin\Bomon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests;
use App\Http\Requests\AjaxRequest;
use App\Http\Controllers\Controller;
use App\Models\CT_danhgia;
use App\Models\Phieudanhgia;
use App\Models\Phieugiangday;
use App\Models\Phieukhac;
use App\Models\Phieu_nckh_baibao;
use App\Models\Phieu_nckh_detai;
use App\Models\Tieuchi_nckh_baibao;
use App\Models\Tieuchi_nckh_detai;

class AjaxController extends Controller
{
   

public function hienthi($id,$bang,$type,$value){  
    DB::table($bang)->where('id', $id)->update([$type => $value]);
}

public function stt($id,$bang,$value){         
    DB::table($bang)->where('id', $id)->update(['stt' => $value]);
}    



// cap nhat gop y
public function capnhatgopygiangday(AjaxRequest $request){
    $Phieugiangday=Phieugiangday::where('id_tieuchi',$request->id_tieuchi)->where('id_phieu',$request->id_phieu)->first();
    $Phieugiangday->gopybomon=$request->gopy;
    $Phieugiangday->save();
    echo "Ok";
}

public function capnhatgopykhac(AjaxRequest $request){
    $Phieukhac=Phieukhac::where('id_tieuchi',$request->id_tieuchi)->where('id_phieu',$request->id_phieu)->first();
    $Phieukhac->gopybomon=$request->gopy;
    $Phieukhac->save();
    echo "Ok";
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
     ->header('Content-Disposition', "attachment; filename=$filename");
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
    }else echo "Vui lòng chọn file";
}

//duyet danh gia giảng dạy và khác
public function huyduyetgiangday(AjaxRequest $request){
    
    $Phieugiangday=Phieugiangday::where('id_phieu',$request->id_phieu)->where('id_tieuchi',$request->id_tieuchi)->first();
     
    $Phieudanhgia=Phieudanhgia::find($request->id_phieu);
    $Phieudanhgia->diemgiangdaybomon-=$Phieugiangday->diemdat;   
    $Phieudanhgia->save();

    if($Phieugiangday->giangvienduyet==0 && $Phieugiangday->bomonduyet==1)
        $Phieugiangday->delete();
    if($Phieugiangday->giangvienduyet==1){
        $Phieugiangday->bomonduyet=0;
        $Phieugiangday->save();
        echo "OK";
    }
}


public function huyduyetkhac(AjaxRequest $request){

    $Phieukhac=Phieukhac::where('id_phieu',$request->id_phieu)->where('id_tieuchi',$request->id_tieuchi)->first(); 

    $Phieudanhgia=Phieudanhgia::find($request->id_phieu);
    $Phieudanhgia->diemkhacbomon-=$Phieukhac->diemdat;   
    $Phieudanhgia->save();

    if($Phieukhac->giangvienduyet==0 && $Phieukhac->bomonduyet==1)
        $Phieukhac->delete();
    if($Phieukhac->giangvienduyet==1){
        $Phieukhac->bomonduyet=0;
        $Phieukhac->save();
        echo "OK";
    }  
}

// duyệt đánh giá bài báo và đề tài

public function duyetphieubaibao(AjaxRequest $request){
    $Phieu_nckh_baibao = Phieu_nckh_baibao::where('id_tieuchi',$request->id_tieuchi)
                                            ->where('id_phieu',$request->id_phieu)
                                            ->where('id_chitietbaibao',$request->id_chitietbaibao)
                                            ->first();
    if($Phieu_nckh_baibao!=null){
        $Phieu_nckh_baibao->bomonduyet=1;
        $Phieu_nckh_baibao->save();
    }else{
        $Phieu_nckh_baibao=new Phieu_nckh_baibao();
        $Phieu_nckh_baibao->id_phieu=$request->id_phieu;
        $Phieu_nckh_baibao->id_tieuchi=$request->id_tieuchi;
        $Phieu_nckh_baibao->id_chitietbaibao=$request->id_chitietbaibao;
        $Phieu_nckh_baibao->bomonduyet=1;
        $Phieu_nckh_baibao->save();
    }

    $Tieuchi=Tieuchi_nckh_baibao::find($request->id_tieuchi);
    $Phieudanhgia=Phieudanhgia::find($request->id_phieu);
    $Phieudanhgia->diemnckhbomon+=$Tieuchi->diem;//cập nhật lại điểm tổng cho phiếu đánh giá
    $Phieudanhgia->save();
    echo "Cập nhật thành công";
}

public function huyphieubaibao(AjaxRequest $request){

    $Phieu_nckh_baibao = Phieu_nckh_baibao::where('id_tieuchi',$request->id_tieuchi)
                                            ->where('id_phieu',$request->id_phieu)
                                            ->where('id_chitietbaibao',$request->id_chitietbaibao)
                                            ->first();
    if($Phieu_nckh_baibao!=null){

        $Phieudanhgia=Phieudanhgia::find($request->id_phieu);
        $Phieudanhgia->diemnckhbomon-=$Phieu_nckh_baibao->tieuchi->diem;//cập nhật lại điểm tổng cho phiếu đánh giá
        $Phieudanhgia->save();

        if($Phieu_nckh_baibao->giangvienduyet==1){
            $Phieu_nckh_baibao->bomonduyet=0;
            $Phieu_nckh_baibao->save();
        }
        if($Phieu_nckh_baibao->giangvienduyet==0 && $Phieu_nckh_baibao->khoaduyet==0)
            $Phieu_nckh_baibao->delete();         
    }
     echo "Cập nhật thành công";
}


public function duyetphieudetai(AjaxRequest $request){
    $Phieu_nckh_detai = Phieu_nckh_detai::where('id_tieuchi',$request->id_tieuchi)
                                            ->where('id_phieu',$request->id_phieu)
                                            ->where('id_chitietdetai',$request->id_chitietdetai)
                                            ->first();
    if($Phieu_nckh_detai!=null){
        $Phieu_nckh_detai->bomonduyet=1;
        $Phieu_nckh_detai->save();
    }else{
        $Phieu_nckh_detai = new Phieu_nckh_detai();
        $Phieu_nckh_detai->id_phieu=$request->id_phieu;
        $Phieu_nckh_detai->id_tieuchi=$request->id_tieuchi;
        $Phieu_nckh_detai->id_chitietdetai=$request->id_chitietdetai;
        $Phieu_nckh_detai->bomonduyet=1;
        $Phieu_nckh_detai->save();
    }

    $Tieuchi=Tieuchi_nckh_detai::find($request->id_tieuchi);
    $Phieudanhgia=Phieudanhgia::find($request->id_phieu);
    $Phieudanhgia->diemnckhbomon+=$Tieuchi->diem;//cập nhật lại điểm tổng cho phiếu đánh giá
    $Phieudanhgia->save();
    echo "Cập nhật thành công";
}

public function huyphieudetai(AjaxRequest $request){

    $Phieu_nckh_detai = Phieu_nckh_detai::where('id_tieuchi',$request->id_tieuchi)
                                            ->where('id_phieu',$request->id_phieu)
                                            ->where('id_chitietdetai',$request->id_chitietdetai)
                                            ->first();
     if($Phieu_nckh_detai!=null){
        $Phieudanhgia=Phieudanhgia::find($request->id_phieu);
        $Phieudanhgia->diemnckhbomon-=$Phieu_nckh_detai->tieuchi->diem;//cập nhật lại điểm tổng cho phiếu đánh giá
        $Phieudanhgia->save();
        if($Phieu_nckh_detai->giangvienduyet==1){
            $Phieu_nckh_detai->bomonduyet=0;
            $Phieu_nckh_detai->save();
        }
        if($Phieu_nckh_detai->giangvienduyet==0 && $Phieu_nckh_detai->khoaduyet==0)
            $Phieu_nckh_detai->delete();           
        
     }
     echo "Cập nhật thành công";
}















}
