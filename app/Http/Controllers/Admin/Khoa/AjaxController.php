<?php
namespace App\Http\Controllers\Admin\Khoa;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\AjaxRequest;
use App\Http\Controllers\Controller;
use App\Models\Cuusinhvien;
use App\Models\Sinhvien;
use App\Models\Lop;
use App\Models\Giangvien;
use App\Models\CT_danhgia;
use App\Models\Phieudanhgia;
use App\Models\Phieugiangday;
use App\Models\Phieukhac;
use App\Models\Phieu_nckh_baibao;
use App\Models\Phieu_nckh_detai;
use App\Models\Tieuchi_nckh_baibao;
use App\Models\Tieuchi_nckh_detai;
use App\Models\Baibaokhoahoc;
use App\Models\CT_baibao;
use App\Models\Detainghiencuu;
use App\Models\CT_detai;
use App\Models\Baibaotest;
use App\Models\Detaitest;
use App\Models\Hosotest;
use App\Models\Chuyennganh;
use App\Models\Nhomnc;
use Mail;

class AjaxController extends Controller
{

    public function checkct(){
        $chuoi = '';
        $Phieu_nckh_baibao = Phieu_nckh_baibao::all();
        foreach ($Phieu_nckh_baibao as $phieu) {
            if($phieu->chitietbaibao == null) 
                $chuoi.=$phieu->id_chitietbaibao.' - ';
        }
        echo $chuoi;
    }


public function capnhatbaibao(){
    $Baibaotest = Baibaotest::all();
    foreach ($Baibaotest as $bbt) {
        $Baibaokhoahoc = new Baibaokhoahoc();
        $Baibaokhoahoc->stt=$bbt->id;
        $Baibaokhoahoc->noibat=0;
        $Baibaokhoahoc->ten_vi=$bbt->ten_vi;
        $Baibaokhoahoc->ten_en=$bbt->ten_en;
        $Baibaokhoahoc->mota_vi = $bbt->mota_vi;
        $Baibaokhoahoc->mota_en = $bbt->mota_en;
        $Baibaokhoahoc->nxb=$bbt->nxb;
        $Baibaokhoahoc->so_issn=$bbt->so_issn;
        $Baibaokhoahoc->nam=$bbt->nam;
        $Baibaokhoahoc->minhchung=$bbt->minhchung;
        $Baibaokhoahoc->ghichu=$bbt->ghichu;
        $Baibaokhoahoc->sotacgia=1;
        $Baibaokhoahoc->tacgia=$bbt->id_hoso;
        $Baibaokhoahoc->id_loaibaibao=$bbt->id_loaiketqua;
        $Baibaokhoahoc->created_at=$bbt->created_at;
        $Baibaokhoahoc->updated_at=$bbt->updated_at;
        $Baibaokhoahoc->save();
        $max=Baibaokhoahoc::max('id');
        $CT_baibao = new CT_baibao();
        $CT_baibao->id_baibao=$max;
        $CT_baibao->id_giangvien=$bbt->id_hoso;
        $CT_baibao->id_loaitacgia=$bbt->id_loaitacgia;
        $CT_baibao->save();
    }
    echo "OK thêm rồi";
}

public function capnhatdetai(){
    $Detaitest = Detaitest::all();
    foreach ($Detaitest as $dtt) {
        $Detainghiencuu = new Detainghiencuu();
        $Detainghiencuu->stt=$dtt->id;
        $Detainghiencuu->noibat=0;
        $Detainghiencuu->ten_vi=$dtt->ten_vi;
        $Detainghiencuu->ten_en=$dtt->ten_en;
        $Detainghiencuu->mota_vi=$dtt->mota_vi;
        $Detainghiencuu->mota_en=$dtt->mota_en;
        $Detainghiencuu->sotacgia=1;
        $Detainghiencuu->tacgia=$dtt->id_hoso;
        $Detainghiencuu->maso=$dtt->maso;
        $Detainghiencuu->trangthai=$dtt->trangthai;
        $Detainghiencuu->minhchung=$dtt->minhchung;
        $Detainghiencuu->ngaybatdau=$dtt->nam;
        $Detainghiencuu->ngaynghiemthu=$dtt->nam;
        $Detainghiencuu->id_capdetai=$dtt->id_capdetai;
        $Detainghiencuu->created_at=$dtt->created_at;
        $Detainghiencuu->updated_at=$dtt->updated_at;
        $Detainghiencuu->save();
        $max=Detainghiencuu::max('id');
        $CT_detai=new CT_detai();
        $CT_detai->id_detai=$max;
        $CT_detai->id_giangvien=$dtt->id_hoso;
        $CT_detai->id_trachnhiemdetai=$dtt->id_trachnhiem;
        $CT_detai->thangthuchien=$dtt->sothangthuchien;
        $CT_detai->save();
    }
    echo "OK thêm thành công";
}

public function capnhathoso(){
    $Hosotest = Hosotest::all();
    foreach ($Hosotest as $hst) {
       $Giangvien = Giangvien::find($hst->id_giangvien);
       $Giangvien->huongnghiencuu_vi=$hst->huongnghiencuu_vi;
       $Giangvien->huongnghiencuu_en=$hst->huongnghiencuu_en;
       $Giangvien->tencoquan_vi=$hst->tencoquan_vi;
       $Giangvien->tencoquan_en=$hst->tencoquan_en;
       $Giangvien->tenphongban_vi=$hst->tenphongban;
       $Giangvien->diachicoquan_vi=$hst->diachicoquan;
       $Giangvien->chucdanhkhoahoc_vi=$hst->chucdanhkhoahoc_vi;
       $Giangvien->chucdanhkhoahoc_en=$hst->chucdanhkhoahoc_en;
       $Giangvien->nambonhiem=$hst->nambonhiemchucdanhkhoahoc;
       $Giangvien->socoquan=$hst->socoquan;
       $Giangvien->sofaxcoquan=$hst->sofaxcoquan;
       $Giangvien->vanbang2=$hst->bangdaihoc2;
       $Giangvien->namtotnghiepvb2=$hst->namtotnghiepbangdaihoc2;
       $Giangvien->save();
    }
    echo "OK cập nhật thành công";
}
   
public function hienthi($id,$bang,$type,$value){  
    DB::table($bang)->where('id', $id)->update([$type => $value]);
}

public function stt($id,$bang,$value){         
    DB::table($bang)->where('id', $id)->update(['stt' => $value]);
}      

public function gopy(AjaxRequest $request){
    $CT_danhgia=CT_danhgia::where('id_tieuchi',$request->tieuchi)->where('id_phieudanhgia',$request->phieudanhgia)->first();
    $CT_danhgia->khoagopy=$request->gopy;
    $CT_danhgia->save();
    echo "1";
}


public function loadlop($id_bomon){
        $Lop=Lop::where('id_bomon',$id_bomon)->get(); 
            echo '<option value="">Chọn lớp</option>';      
        foreach($Lop as $L){
            echo '<option value="'.$L->id.'">'.$L->malop.' - '.$L->tenlop.'</option>';
        }
}

public function loadchuyennganh($id){
    $Chuyennganh = Chuyennganh::where('id_bomon',$id)->get();
    $noidung = '';
    foreach ($Chuyennganh as $cn) {
       $noidung.='<option value="'.$cn->id.'">'.$cn->ten_vi.'</option>';
    }
    echo $noidung;
}

public function updatecuusinhvien(){
        $Cuusinhvien=Cuusinhvien::find($_POST['id']);
        $Cuusinhvien->noicongtac_vi=$_POST['noicongtac_vi'];
        $Cuusinhvien->noicongtac_en=$_POST['noicongtac_en'];
        $Cuusinhvien->chucvu_vi=$_POST['chucvu_vi'];
        $Cuusinhvien->chucvu_en=$_POST['chucvu_en'];
        $Cuusinhvien->socoquan=$_POST['socoquan'];
        $Cuusinhvien->diachicoquan=$_POST['diachicoquan'];
        $Cuusinhvien->save();
        echo "Cập nhật thành công";
}

public function loadgiangvien($id_bomon){
    $Giangvien=Giangvien::where('id_bomon',$id_bomon)->get();

       foreach ($Giangvien as $GV) {
           echo "<option value='".$GV->id."'>".$GV->ten."</option>";
    }
}



public function xeploaikhoa($id_thongbao,$loaia,$loaib,$loaic,$loaid,$tenloaia,$tenloaib,$tenloaic,$tenloaid,$tc1,$tc2){

    $slthongbao = Phieudanhgia::where('id_thongbao',$id_thongbao)                                      
                                ->whereHas('giangvien',function($query){
                                    $query->where('id_chucvu','<>',6);
                                    $query->where('id_bomon','<>',7);
                                })
                                ->count();

    $Phieudanhgia = Phieudanhgia::where('id_thongbao',$id_thongbao)                                      
                                ->whereHas('giangvien',function($query){
                                    $query->where('id_chucvu','<>',6);
                                    $query->where('id_bomon','<>',7);
                                })
                                ->orderByRaw('diemgiangdaykhoa + diemnckhkhoa + diemkhackhoa DESC')                                 
                                ->get();



    $sla=CEIL(($slthongbao*$loaia)/100);
    $slb=CEIL(($slthongbao*$loaib)/100);
    $slc=CEIL(($slthongbao*$loaic)/100);
    $sld=CEIL(($slthongbao*$loaid)/100);

    $loaia = Phieudanhgia::where('id_thongbao',$id_thongbao)                                      
                                ->whereHas('giangvien',function($query){
                                    $query->where('id_chucvu','<>',6);
                                    $query->where('id_bomon','<>',7);
                                })                                
                                ->where('diemgiangdaykhoa','>=',$tc1)
                                ->where('diemnckhkhoa','>=',$tc2)
                                ->orderByRaw('diemgiangdaykhoa + diemnckhkhoa + diemkhackhoa DESC')                                
                                ->take($sla)->get();


    $arr3=[];$k=0;
    foreach ($loaia as $lll) {
        $arr3[$k]=$lll->id;
        $k++;
    }

    $loaib = Phieudanhgia::where('id_thongbao',$id_thongbao)                                      
                                ->whereHas('giangvien',function($query){
                                    $query->where('id_chucvu','<>',6);
                                    $query->where('id_bomon','<>',7);
                                })                                
                                ->whereNotIn('id',$arr3)                             
                                ->orderByRaw('diemgiangdaykhoa + diemnckhkhoa + diemkhackhoa DESC')                                 
                                ->take($slb)->get();

    $loaic = Phieudanhgia::where('id_thongbao',$id_thongbao)                                      
                                ->whereHas('giangvien',function($query){
                                    $query->where('id_chucvu','<>',6);
                                    $query->where('id_bomon','<>',7);
                                })                                
                                ->whereNotIn('id',$arr3)                             
                                ->orderByRaw('diemgiangdaykhoa + diemnckhkhoa + diemkhackhoa DESC')                                 
                                ->skip($slb)
                                ->take($slc)->get();


    $loaid = Phieudanhgia::where('id_thongbao',$id_thongbao)                                      
                                ->whereHas('giangvien',function($query){
                                    $query->where('id_chucvu','<>',6);
                                    $query->where('id_bomon','<>',7);
                                })                                
                                ->whereNotIn('id',$arr3)                             
                                ->orderByRaw('diemgiangdaykhoa + diemnckhkhoa + diemkhackhoa DESC')                                 
                                ->skip($slb+$slc)
                                ->take($sla+$slb+$slc+$sld)->get();
    
 
    $noidung="";
        $i=1;
        foreach ($loaia as $pdg) {
            $noidung.="<tr style='background:#398439;color:white;'>";
            $noidung.="<td class='text-center'>".$i++."</td>";
            $noidung.="<td>".$pdg->giangvien->ten."</td>";
            $noidung.="<td>".$pdg->giangvien->bomon->ten_vi."</td>";

            $diemdat=0;
            if(($pdg->diemgiangdaykhoa+$pdg->diemnckhkhoa+$pdg->diemkhackhoa)>100) 
                $diemdat=100;
            else
             $diemdat = ($pdg->diemgiangdaykhoa+$pdg->diemnckhkhoa+$pdg->diemkhackhoa);

            $noidung.="<td class='text-center'>".$diemdat."</td>";
            $diemvuot=0;
            if(($pdg->diemgiangdaykhoa+$pdg->diemnckhkhoa+$pdg->diemkhackhoa)>100) 
                $diemvuot=(($pdg->diemgiangdaykhoa+$pdg->diemnckhkhoa+$pdg->diemkhackhoa)-100);           
            $noidung.="<td class='text-center'>".$diemvuot."</td>";
            $noidung.="<td class='text-center'>".$tenloaia."</td>";
            $noidung.="</tr>";
            
        }

        foreach ($loaib as $pdg) {
           $noidung.="<tr style='background:#25d7c7;color:white;'>";
            $noidung.="<td class='text-center'>".$i++."</td>";
            $noidung.="<td>".$pdg->giangvien->ten."</td>";
            $noidung.="<td>".$pdg->giangvien->bomon->ten_vi."</td>";
            $diemdat=0;
            if(($pdg->diemgiangdaykhoa+$pdg->diemnckhkhoa+$pdg->diemkhackhoa)>100) 
                $diemdat=100;
            else 
                $diemdat= ($pdg->diemgiangdaykhoa+$pdg->diemnckhkhoa+$pdg->diemkhackhoa);
            $noidung.="<td class='text-center'>".$diemdat."</td>";
            $diemvuot=0;
            if(($pdg->diemgiangdaykhoa+$pdg->diemnckhkhoa+$pdg->diemkhackhoa)>100) 
                $diemvuot=(($pdg->diemgiangdaykhoa+$pdg->diemnckhkhoa+$pdg->diemkhackhoa)-100);          
            $noidung.="<td class='text-center'>".$diemvuot."</td>";
            $noidung.="<td class='text-center'>".$tenloaib."</td>";
            $noidung.="</tr>";
        }

        foreach ($loaic as $pdg) {
           $noidung.="<tr style='background:#cc25d7;color:white;'>";
            $noidung.="<td class='text-center'>".$i++."</td>";
            $noidung.="<td>".$pdg->giangvien->ten."</td>";
            $noidung.="<td>".$pdg->giangvien->bomon->ten_vi."</td>";
            $diemdat=0;
            if(($pdg->diemgiangdaykhoa+$pdg->diemnckhkhoa+$pdg->diemkhackhoa)>100) 
                $diemdat=100;
            else 
                $diemdat= ($pdg->diemgiangdaykhoa+$pdg->diemnckhkhoa+$pdg->diemkhackhoa);
            $noidung.="<td class='text-center'>".$diemdat."</td>";
            $diemvuot=0;
            if(($pdg->diemgiangdaykhoa+$pdg->diemnckhkhoa+$pdg->diemkhackhoa)>100) 
                $diemvuot=(($pdg->diemgiangdaykhoa+$pdg->diemnckhkhoa+$pdg->diemkhackhoa)-100);                      
            $noidung.="<td class='text-center'>".$diemvuot."</td>";
            $noidung.="<td class='text-center'>".$tenloaic."</td>";
            $noidung.="</tr>";
        }


        foreach ($loaid as $pdg){
            $noidung.="<tr style='background:#d73925;color:white;'>";
            $noidung.="<td class='text-center'>".$i++."</td>";
            $noidung.="<td>".$pdg->giangvien->ten."</td>";
            $noidung.="<td>".$pdg->giangvien->bomon->ten_vi."</td>";
            $diemdat=0;
            if(($pdg->diemgiangdaykhoa+$pdg->diemnckhkhoa+$pdg->diemkhackhoa)>100) 
                $diemdat=100; 
            else 
                $diemdat= ($pdg->diemgiangdaykhoa+$pdg->diemnckhkhoa+$pdg->diemkhackhoa);
            $noidung.="<td class='text-center'>".$diemdat."</td>";
            $diemvuot=0;
            if(($pdg->diemgiangdaykhoa+$pdg->diemnckhkhoa+$pdg->diemkhackhoa)>100)
                 $diemvuot=(($pdg->diemgiangdaykhoa+$pdg->diemnckhkhoa+$pdg->diemkhackhoa)-100);                     
            $noidung.="<td class='text-center'>".$diemvuot."</td>";
            $noidung.="<td class='text-center'>".$tenloaid."</td>";
            $noidung.="</tr>";
        }

   echo $noidung;
     
       
}


public function luuxeploaikhoa($id_thongbao,$loaia,$loaib,$loaic,$loaid,$tenloaia,$tenloaib,$tenloaic,$tenloaid,$tc1,$tc2){

    
  $slthongbao = Phieudanhgia::where('id_thongbao',$id_thongbao)                                      
                                ->whereHas('giangvien',function($query){
                                    $query->where('id_chucvu','<>',6);
                                    $query->where('id_bomon','<>',7);
                                })
                                ->count();

    $sla=CEIL(($slthongbao*$loaia)/100);
    $slb=CEIL(($slthongbao*$loaib)/100);
    $slc=CEIL(($slthongbao*$loaic)/100);
    $sld=CEIL(($slthongbao*$loaid)/100);

    $loaia = Phieudanhgia::where('id_thongbao',$id_thongbao)                                      
                                ->whereHas('giangvien',function($query){
                                    $query->where('id_chucvu','<>',6);
                                    $query->where('id_bomon','<>',7);
                                })                                
                                ->where('diemgiangdaykhoa','>=',$tc1)
                                ->where('diemnckhkhoa','>=',$tc2)
                                ->orderByRaw('diemgiangdaykhoa + diemnckhkhoa + diemkhackhoa DESC')                                
                                ->take($sla)->get();

    $arr3=[];$k=0;
    foreach ($loaia as $lll) {
        $arr3[$k]=$lll->id;
        $k++;
    }

    $loaib = Phieudanhgia::where('id_thongbao',$id_thongbao)                                      
                                ->whereHas('giangvien',function($query){
                                    $query->where('id_chucvu','<>',6);
                                    $query->where('id_bomon','<>',7);
                                })                                
                                ->whereNotIn('id',$arr3)                             
                                ->orderByRaw('diemgiangdaykhoa + diemnckhkhoa + diemkhackhoa DESC')                                 
                                ->take($slb)->get();

    $loaic = Phieudanhgia::where('id_thongbao',$id_thongbao)                                      
                                ->whereHas('giangvien',function($query){
                                    $query->where('id_chucvu','<>',6);
                                    $query->where('id_bomon','<>',7);
                                })                                
                                ->whereNotIn('id',$arr3)                             
                                ->orderByRaw('diemgiangdaykhoa + diemnckhkhoa + diemkhackhoa DESC')                                 
                                ->skip($slb)
                                ->take($slc)->get();


    $loaid = Phieudanhgia::where('id_thongbao',$id_thongbao)                                      
                                ->whereHas('giangvien',function($query){
                                    $query->where('id_chucvu','<>',6);
                                    $query->where('id_bomon','<>',7);
                                })                                
                                ->whereNotIn('id',$arr3)                             
                                ->orderByRaw('diemgiangdaykhoa + diemnckhkhoa + diemkhackhoa DESC')
                                ->skip($slb+$slc)
                                ->take($sla+$slb+$slc+$sld)->get();

  
        foreach ($loaia as $pdg) {
           $P=Phieudanhgia::find($pdg->id);
           $P->xeploai=$tenloaia;
           $P->save();
          
        }

        foreach ($loaib as $pdg) {
           $P=Phieudanhgia::find($pdg->id);
           $P->xeploai=$tenloaib;
           $P->save();
          
           
        }

        foreach ($loaic as $pdg) {
           $P=Phieudanhgia::find($pdg->id);
           $P->xeploai=$tenloaic;
           $P->save();
         
        }

        foreach ($loaid as $pdg){
           $P=Phieudanhgia::find($pdg->id);
           $P->xeploai=$tenloaid;
           $P->save();
        }
     echo "Xếp loại thành công!!! Bạn có thể xuất PDF";
}


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

// cap nhat gop y

public function capnhatgopygiangday(AjaxRequest $request){
    $Phieugiangday=Phieugiangday::where('id_tieuchi',$request->id_tieuchi)->where('id_phieu',$request->id_phieu)->first();
    $Phieugiangday->gopykhoa=$request->gopy;
    $Phieugiangday->save();
    echo $request->gopy;
}

public function capnhatgopykhac(AjaxRequest $request){
    $Phieukhac=Phieukhac::where('id_tieuchi',$request->id_tieuchi)->where('id_phieu',$request->id_phieu)->first();
    $Phieukhac->gopykhoa=$request->gopy;
    $Phieukhac->save();
    echo $request->gopy;
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

//duyet danh gia giảng dạy và khác

public function huyduyetgiangday(AjaxRequest $request){
    $Phieugiangday=Phieugiangday::where('id_phieu',$request->id_phieu)->where('id_tieuchi',$request->id_tieuchi)->first();

    $Phieudanhgia=Phieudanhgia::find($request->id_phieu);
    $Phieudanhgia->diemgiangdaykhoa-=$Phieugiangday->diemdat;   
    $Phieudanhgia->save();

    if($Phieugiangday->giangvienduyet==0 && $Phieugiangday->khoaduyet==1)
        $Phieugiangday->delete();
    if($Phieugiangday->giangvienduyet==1){
        $Phieugiangday->khoaduyet=0;
        $Phieugiangday->save();
        echo "OK";
    }
}


public function huyduyetkhac(AjaxRequest $request){
    $Phieukhac=Phieukhac::where('id_phieu',$request->id_phieu)->where('id_tieuchi',$request->id_tieuchi)->first();

    $Phieudanhgia=Phieudanhgia::find($request->id_phieu);
    $Phieudanhgia->diemkhackhoa-=$Phieukhac->diemdat;   
    $Phieudanhgia->save();

    if($Phieukhac->giangvienduyet==0 && $Phieukhac->khoaduyet==1)
        $Phieukhac->delete();
    if($Phieukhac->giangvienduyet==1){
        $Phieukhac->khoaduyet=0;
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
        $Phieu_nckh_baibao->khoaduyet=1;
        $Phieu_nckh_baibao->save();
    }else{
        $Phieu_nckh_baibao=new Phieu_nckh_baibao();
        $Phieu_nckh_baibao->id_phieu=$request->id_phieu;
        $Phieu_nckh_baibao->id_tieuchi=$request->id_tieuchi;
        $Phieu_nckh_baibao->id_chitietbaibao=$request->id_chitietbaibao;
        $Phieu_nckh_baibao->khoaduyet=1;
        $Phieu_nckh_baibao->save();
        
    }

    $Tieuchi=Tieuchi_nckh_baibao::find($request->id_tieuchi);
    $Phieudanhgia=Phieudanhgia::find($request->id_phieu);
    $Phieudanhgia->diemnckhkhoa+=$Tieuchi->diem;//cập nhật lại điểm tổng cho phiếu đánh giá
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
        $Phieudanhgia->diemnckhkhoa-=$Phieu_nckh_baibao->tieuchi->diem;//cập nhật lại điểm tổng cho phiếu đánh giá
        $Phieudanhgia->save();

        if($Phieu_nckh_baibao->giangvienduyet==1 || $Phieu_nckh_baibao->bomonduyet==1){
            $Phieu_nckh_baibao->khoaduyet=0;
            $Phieu_nckh_baibao->save();
        }
        if($Phieu_nckh_baibao->giangvienduyet==0 && $Phieu_nckh_baibao->bomonduyet==0)
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
        $Phieu_nckh_detai->khoaduyet=1;
        $Phieu_nckh_detai->save();
    }else{
        $Phieu_nckh_detai = new Phieu_nckh_detai();
        $Phieu_nckh_detai->id_phieu=$request->id_phieu;
        $Phieu_nckh_detai->id_tieuchi=$request->id_tieuchi;
        $Phieu_nckh_detai->id_chitietdetai=$request->id_chitietdetai;
        $Phieu_nckh_detai->khoaduyet=1;
        $Phieu_nckh_detai->save();
    }

    $Tieuchi=Tieuchi_nckh_detai::find($request->id_tieuchi);
    $Phieudanhgia=Phieudanhgia::find($request->id_phieu);
    $Phieudanhgia->diemnckhkhoa+=$Tieuchi->diem;//cập nhật lại điểm tổng cho phiếu đánh giá
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
        $Phieudanhgia->diemnckhkhoa-=$Phieu_nckh_detai->tieuchi->diem;//cập nhật lại điểm tổng cho phiếu đánh giá
        $Phieudanhgia->save();

        if($Phieu_nckh_detai->giangvienduyet==1 || $Phieu_nckh_detai->bomonduyet==1){
            $Phieu_nckh_detai->khoaduyet=0;
            $Phieu_nckh_detai->save();
        }
        if($Phieu_nckh_detai->giangvienduyet==0 && $Phieu_nckh_detai->bomonduyet==0)
            $Phieu_nckh_detai->delete();           
        
     }
     echo "Cập nhật thành công";
}

public function duyetnhomnghiencuu($id_nhom,$value){
    $Nhom = Nhomnc::find($id_nhom);
    $Nhom->trangthai = $value;
    $Nhom->save();
    if($value == 1){
        $Truong = $Nhom->truongnhom;
        $Truongnhom = $Truong[0];
        Mail::send('Email.Nhomnghiencuu.Dangkynhomtoitruongnhom', array('Truongnhom' => $Truongnhom),function($message)use($Truongnhom){
            $message->from('ktcn@tvu.edu.vn',"Khoa Kỹ thuật và Công nghệ");
            $message->to($Truongnhom->giangvien->email)->subject('Thông báo duyệt đăng ký nhóm nghiên cứu');    
        });
    }    

}




}
