<?php

namespace App\Http\Controllers\Admin\Giangvien;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\AjaxRequest;
use App\Http\Controllers\Controller;
use App\Models\Quatrinhdaotao;
use App\Models\Quatrinhcongtac;
use App\Models\Baibaokhoahoc;
use App\Models\Detainghiencuu;
use App\Models\Huongdansaudaihoc;
use App\Models\Mongiangday;
use App\Models\Ngoaingu;
use App\Models\CT_baibao;
use App\Models\CT_detai;
use App\Models\Giangvien;
use App\Models\Loaitacgia;
use App\Models\Trachnhiemdetai;
use Carbon\Carbon;
use Session;
use Mail;

class HosoAjaxController extends Controller
{

// ho so khoa hoc - qua trinh dao tao
public function themdaotao(AjaxRequest $request){
        
    $Quatrinhdaotao=new Quatrinhdaotao();
    $max=Quatrinhdaotao::where('id_giangvien',Session::get('user_id'))->max('id');
    $Quatrinhdaotao->stt=$max+1;
    $Quatrinhdaotao->tencoso_vi=$request->tencoso_vi;
    $Quatrinhdaotao->tencoso_en=$request->tencoso_en;
    $Quatrinhdaotao->ngaybatdau=Carbon::createFromFormat('d/m/Y',$request->tungay)->format("Y/m/d");
    $Quatrinhdaotao->ngayketthuc=Carbon::createFromFormat('d/m/Y',$request->denngay)->format("Y/m/d"); 
    $Quatrinhdaotao->chuyennganh_vi=$request->chuyennganh_vi;
    $Quatrinhdaotao->chuyennganh_en=$request->chuyennganh_en;               
    $Quatrinhdaotao->noidaotao_vi=$request->noidaotao_vi;
    $Quatrinhdaotao->noidaotao_en=$request->noidaotao_en;
    $Quatrinhdaotao->minhchung=$request->tailieu;       
    $Quatrinhdaotao->id_hedaotao=$request->hedaotao;
    $Quatrinhdaotao->id_trinhdo=$request->trinhdo;
    $Quatrinhdaotao->tenluanan=$request->tenluanan;
    $Quatrinhdaotao->id_giangvien=Session::get('user_id');   	
    $Quatrinhdaotao->save();      
    echo "Thêm Thành Công";   
}

public function capnhatdaotao(AjaxRequest $request){
    	
    $Quatrinhdaotao=Quatrinhdaotao::find($request->id);
    $Quatrinhdaotao->tencoso_vi=$request->tencoso_vi;
    $Quatrinhdaotao->tencoso_en=$request->tencoso_en;
    $Quatrinhdaotao->ngaybatdau=Carbon::createFromFormat('d/m/Y',$request->tungay)->format("Y/m/d");
    $Quatrinhdaotao->ngayketthuc=Carbon::createFromFormat('d/m/Y',$request->denngay)->format("Y/m/d"); 
    $Quatrinhdaotao->chuyennganh_vi=$request->chuyennganh_vi;
    $Quatrinhdaotao->chuyennganh_en=$request->chuyennganh_en;               
    $Quatrinhdaotao->noidaotao_vi=$request->noidaotao_vi;
    $Quatrinhdaotao->noidaotao_en=$request->noidaotao_en;
    $Quatrinhdaotao->minhchung=$request->tailieu;       
    $Quatrinhdaotao->id_hedaotao=$request->hedaotao;
    $Quatrinhdaotao->id_trinhdo=$request->trinhdo;
    $Quatrinhdaotao->tenluanan=$request->tenluanan;
    $Quatrinhdaotao->id_giangvien=Session::get('user_id');
    $Quatrinhdaotao->save();
    echo "cập nhật Thành Công";
}

public function xoadaotao($id){
    $Quatrinhdaotao=Quatrinhdaotao::find($id);
    if($Quatrinhdaotao->minhchung!='')
    	unlink('ht96_pdf/'.$Quatrinhdaotao->minhchung);
    	$Quatrinhdaotao->delete();
    echo "Xóa Thành Công"; 
}

public function xoadaotaohet($id){
    $ids = explode(",", $id);
    for ($i=0; $i <count($ids) ; $i++){ 
        $Quatrinhdaotao=Quatrinhdaotao::find($ids[$i]);                    
        if($Quatrinhdaotao->chungchi!='')
    	   unlink('ht96_pdf/'.$Quatrinhdaotao->chungchi);
    	$Quatrinhdaotao->delete();
    }     	
    echo "Xóa Thành Công"; 
}

// ho so khoa hoc qua trinh cong tac
public function themcongtac(AjaxRequest $request){
    $Quatrinhcongtac=new Quatrinhcongtac();
    $Quatrinhcongtac->tencoso_vi=$request->tencoso_vi;
    $Quatrinhcongtac->tencoso_en=$request->tencoso_en;
    $Quatrinhcongtac->diachicoso_vi=$request->diachicoso_vi;
    $Quatrinhcongtac->diachicoso_en=$request->diachicoso_en;
    $Quatrinhcongtac->sdtcoso=$request->sodienthoai;
    $Quatrinhcongtac->ngaybatdau=Carbon::createFromFormat('d/m/Y',$request->tungay)->format("Y/m/d"); 
    $Quatrinhcongtac->ngayketthuc=Carbon::createFromFormat('d/m/Y',$request->denngay)->format("Y/m/d");  
    $Quatrinhcongtac->ghichu=$request->ghichu;   
    $Quatrinhcongtac->id_chucvu=$request->chucvu;   
    $Quatrinhcongtac->id_giangvien=Session::get('user_id');    
    $Quatrinhcongtac->save();
    echo "Thêm Thành Công";
}

public function capnhatcongtac(AjaxRequest $request){
    $Quatrinhcongtac=Quatrinhcongtac::find($request->id);
    $Quatrinhcongtac->tencoso_vi=$request->tencoso_vi;
    $Quatrinhcongtac->tencoso_en=$request->tencoso_en;
    $Quatrinhcongtac->diachicoso_vi=$request->diachicoso_vi;
    $Quatrinhcongtac->diachicoso_en=$request->diachicoso_en;
    $Quatrinhcongtac->sdtcoso=$request->sodienthoai;
    $Quatrinhcongtac->ngaybatdau=Carbon::createFromFormat('d/m/Y',$request->tungay)->format("Y/m/d"); 
    $Quatrinhcongtac->ngayketthuc=Carbon::createFromFormat('d/m/Y',$request->denngay)->format("Y/m/d");     
    $Quatrinhcongtac->id_chucvu=$request->chucvu;       
    $Quatrinhcongtac->ghichu=$request->ghichu;
    $Quatrinhcongtac->id_giangvien=Session::get('user_id');    
    $Quatrinhcongtac->save();
    echo "Cập nhật Thành Công";     
}

public function xoacongtac($id){
    $Quatrinhcongtac=Quatrinhcongtac::find($id);        
    $Quatrinhcongtac->delete();
    echo "Xóa Thành Công"; 
}

public function xoacongtachet($id){
    $ids = explode(",", $id);
    for ($i=0; $i <count($ids) ; $i++) { 
        $Quatrinhcongtac=Quatrinhcongtac::find($ids[$i]); 
        $Quatrinhcongtac->delete();
    }       
   echo "Xóa Thành Công"; 
}

    

public function thembaibao(AjaxRequest $request){
    $Baibaokhoahoc=new Baibaokhoahoc();
    $Baibaokhoahoc->ten_vi=$request->ten_vi;
    $Baibaokhoahoc->ten_en=$request->ten_en;
    $Baibaokhoahoc->mota_vi = $request->mota_vi;
    $Baibaokhoahoc->mota_en = $request->mota_en;
    $Baibaokhoahoc->tacgia=Session::get('user_id');      
    $Baibaokhoahoc->nxb_vi=$request->nxb_vi;
    $Baibaokhoahoc->nxb_en=$request->nxb_en;
    $Baibaokhoahoc->so_issn=$request->so_issn;
    $Baibaokhoahoc->nam=Carbon::createFromFormat('d/m/Y',$request->nam)->format("Y/m/d");
    $Baibaokhoahoc->minhchung=$request->minhchung;
    $Baibaokhoahoc->ghichu=$request->ghichu;
    $Baibaokhoahoc->sotacgia=$request->sotacgia;
    $Baibaokhoahoc->id_loaibaibao=$request->loaibaibao;     
    $Baibaokhoahoc->save();    
    $id=Baibaokhoahoc::max('id');

    for($i=1;$i<=$request->sotacgia;$i++){
        $tacgia='tacgia'.$i;
        $loaitacgia='loaitacgia'.$i;
         $post=explode('-',$request->$tacgia);
         if(count($post) >= 2){
            $giangvienid=$post[0];
            $CT_baibao=new CT_baibao();
            $CT_baibao->id_giangvien=$giangvienid;
            $CT_baibao->id_loaitacgia=$request->$loaitacgia;
            $CT_baibao->id_baibao=$id;       
            $CT_baibao->save();   
                         
        }else{
            $Giangvien=new Giangvien();
            $Giangvien->ten=$request->$tacgia;
            $Giangvien->tenkhongdau=str_slug($request->$tacgia,"-");
            $Giangvien->ngaysinh=Carbon::now();
            $Giangvien->id_chucvu=5;
            $Giangvien->id_trinhdo=3;
            $Giangvien->id_bomon=7;
            $Giangvien->save();
            $giangvienid=$Giangvien::max('id');
            $CT_baibao=new CT_baibao();
            $CT_baibao->id_giangvien=$giangvienid;
            $CT_baibao->id_loaitacgia=$request->$loaitacgia;
            $CT_baibao->id_baibao=$id;       
            $CT_baibao->save(); 
        }
    }

 echo "Thêm thành công";     
}

public function capnhatbaibao(AjaxRequest $request){
    $CT_baibao=CT_baibao::find($request->id);
    $CT_baibao->id_loaitacgia=$request->loaitacgia;
    $Baibaokhoahoc=Baibaokhoahoc::find($CT_baibao->id_baibao);
    $Baibaokhoahoc->ten_vi=$request->ten_vi;
    $Baibaokhoahoc->ten_en=$request->ten_en;  
    $Baibaokhoahoc->mota_vi = $request->mota_vi;
    $Baibaokhoahoc->mota_en = $request->mota_en;     
    $Baibaokhoahoc->nxb_vi=$request->nxb_vi;
    $Baibaokhoahoc->nxb_en=$request->nxb_en;
    $Baibaokhoahoc->so_issn=$request->so_issn;
    $Baibaokhoahoc->nam=Carbon::createFromFormat('d/m/Y',$request->nam)->format("Y/m/d");
    $Baibaokhoahoc->minhchung=$request->minhchung;
    $Baibaokhoahoc->ghichu=$request->ghichu;
    $Baibaokhoahoc->id_loaibaibao=$request->loaibaibao;       
    $Baibaokhoahoc->save();  
    $CT_baibao->save();
    echo "Cập nhật thành công";
}


public function xoabaibao($id){

    $Baibaokhoahoc=Baibaokhoahoc::find($id);
    $CT_baibao=CT_baibao::where('id_baibao',$Baibaokhoahoc->id)->get(); 
    foreach ($CT_baibao as $CT){
        if($CT->giangvien->bomon->id==7)
            $Giangvien=Giangvien::where('id',$CT->id_giangvien)->delete();
            $CT->delete();
        }   
            
    $Baibaokhoahoc->delete();
    echo "Xóa Thành Công"; 
} 

public function themtacgiabaibao(AjaxRequest $request){
  $CT_baibaotest=CT_baibao::where('id_giangvien',$request->id_giangvien)->where('id_baibao',$request->id_baibao)->get();
    if(count($CT_baibaotest)==0){//bắt trùng giảng viên và bài báo trong bảng chi tiết bài báo
        $CT_baibao=new CT_baibao();
        $CT_baibao->id_baibao=$request->id_baibao;
        $CT_baibao->id_giangvien=$request->id_giangvien;
        $CT_baibao->id_loaitacgia=$request->id_loaitacgia;
        $CT_baibao->save();
        echo "Thêm thành công";
    }else
    echo "Không thể thêm người này. Vì người này đã là tác giả bài báo này";  
}

public function themtacgiabaibaotest(AjaxRequest $request){
    $Giangvien=new Giangvien();
    $Giangvien->ten=$request->tengv;
    $Giangvien->tenkhongdau=str_slug($request->tengv,"-");
    $Giangvien->diachilienhe=$request->diachigv;
    $Giangvien->ngaysinh=Carbon::now();
    $Giangvien->id_chucvu=5;
    $Giangvien->id_trinhdo=3;
    $Giangvien->id_bomon=7; 
    $Giangvien->save();
    $max=Giangvien::max('id');
    $CT_baibao=new CT_baibao();
    $CT_baibao->id_giangvien=$max;
    $CT_baibao->id_baibao=$request->id_baibao;
    $CT_baibao->id_loaitacgia=$request->id_loaitacgia;
    $CT_baibao->save();
    echo "Thêm Thành Công";  
}

public function xoatacgiabaibao(AjaxRequest $request){
    $CT_baibao=CT_baibao::find($request->id);
    if($CT_baibao->giangvien->bomon->id==7){
        $Giangvien=Giangvien::find($CT_baibao->id_giangvien);
        $Giangvien->delete();
    }
       // không xóa tác giả đã thêm bài báo này
    if($CT_baibao->baibao->tacgia==$CT_baibao->id_giangvien)
        echo "Không thể xóa mục này";
    else{             
        $CT_baibao->delete();
        echo "Xóa thành công";
    }       
       
}


public function loadtextfile($id){

    $loaitacgia=Loaitacgia::orderby('id')->get();
    $Giangvien=Giangvien::find(Session::get('user_id'));
    $Giatri=$Giangvien->id.' - '.$Giangvien->maso.' - '.$Giangvien->ten;
    $noidung="";
    for ($i=0; $i <$id ; $i++) { 
        $tam=$i+1;
        $noidung.="<br>";
        $noidung.='<div class="row">';
        $noidung.='<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">';
        $noidung.='<input type="text" name="tacgia'.$tam.'"  data-id="'.$tam.'"  placeholder="nhập tên tác giả" class="form-control tacgia typeahead" id="tacgia'.$tam.'"';
                if($i==0)
                    $noidung.=' value="'.$Giatri.'" readonly';
                $noidung.='>';
        $noidung.='</div>';
        $noidung.='<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">';
                $noidung.='<select class="form-control ltacgia'.$tam.'" id="ltacgia'.$tam.'">';
                    foreach ($loaitacgia as $ltg) {
if ($ltg->trangthai==1){
                        $noidung.=' <option value="'.$ltg->id.'">';
                        $noidung.=$ltg->ten_vi;
                        $noidung.='</option>';
                    
}}
                $noidung.='</select>';
             $noidung.='</div>';
             $noidung.='</div>';

    }
    echo $noidung;        
}


public function loadtextfiledetai($id){
    $trachnhiemdetai=Trachnhiemdetai::orderby('id')->get();
    $Giangvien=Giangvien::find(Session::get('user_id'));
    $Giatri=$Giangvien->id.' - '.$Giangvien->maso.' - '.$Giangvien->ten;
    $noidung="";
    for ($i=0; $i <$id ; $i++) { 
        $tam=$i+1;
        $noidung.="<br>";
        $noidung.='<div class="row">';
        $noidung.='<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">';
        $noidung.='<input type="text" name="tacgia'.$tam.'"  data-id="'.$tam.'"  placeholder="nhập tên thành viên" class="form-control tacgia typeahead" id="tacgia'.$tam.'"';
                if($i==0)
                    $noidung.=' value="'.$Giatri.'" readonly';
                $noidung.='>';
             $noidung.='</div>';

        $noidung.='<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">';
                $noidung.='<input type="text" name"thangthuchien'.$tam.'" id="thangthuchien'.$tam.'" data-id='.$tam.' placeholder="số tháng thực hiện" class="form-control thangthuchien text-center">';
        $noidung.='</div>';

        $noidung.='<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">';
        $noidung.='<select class="form-control trachnhiem'.$tam.'" id="trachnhiem'.$tam.'">';
                    foreach ($trachnhiemdetai as $tn) {
                        $noidung.='<option value="'.$tn->id.'">';
                        $noidung.=$tn->ten_vi;
                        $noidung.='</option>';
                    }
                $noidung.='</select>';
             $noidung.='</div>';





            $noidung.='</div>';

    }
    echo $noidung;
        
}

public function searchByName(Request $request){
    $Giangvien = Giangvien::where('ten', 'like', '%' . $request->value . '%')->where('id','<>',Session::get('user_id'))->get();
    return response()->json($Giangvien); 
}

public function searchbaibaoByName(Request $request){
    $Baibaokhoahoc=Baibaokhoahoc::where('ten_vi', 'like', '%' . $request->value . '%')->get();
    return response()->json($Baibaokhoahoc); 
}

public function searchdetaiByName(Request $request){
    $Detainghiencuu=Detainghiencuu::where('ten_vi', 'like', '%' . $request->value . '%')->get();
    return response()->json($Detainghiencuu); 
}

public function loadtacgia($id_baibao){
    $CT_baibao=CT_baibao::where('id_baibao',$id_baibao)->get();

    $noidung='';
    $i=1;
    foreach ($CT_baibao as $ct){
        $noidung.='<tr>';
        $noidung.='<td class="text-center">'.$i++.'</td>';
        $noidung.='<td class="text-center">'.'<i class="fa fa-times text-dange fa-2x';
        if($ct->baibao->tacgia==Session::get('user_id')) 
        $noidung.=' xoatacgia';         
        $noidung.='"';
        $noidung.='data-id="'.$ct->id.'" style="color:red;"></i>'.'</td>';
        $noidung.='<td>'.$ct->giangvien->ten.'</td>';
        $noidung.='<td>'.$ct->loaitacgia->ten_vi.'</td>';           
        $noidung.='</tr>';
    }
    echo $noidung;
}

public function load_loaitacgia($id_baibao,$id_giangvien)
{
    $CT_baibao=CT_baibao::where('id_baibao',$id_baibao)->where('id_giangvien',$id_giangvien)->first();
    echo $CT_baibao->id_loaitacgia;
}

// ho so khoa hoc -- de tai nghien cuu
public function themdetai(AjaxRequest $request){
    $Detainghiencuu=new Detainghiencuu();
    $Detainghiencuu->ten_vi=$request->ten_vi;
    $Detainghiencuu->ten_en=$request->ten_en;
    $Detainghiencuu->mota_vi = $request->mota_vi;
    $Detainghiencuu->mota_en = $request->mota_en; 
    $Detainghiencuu->sotacgia=$request->sotacgia; 
    $Detainghiencuu->tacgia=Session::get('user_id');      
    $Detainghiencuu->maso=$request->maso;       
    $Detainghiencuu->trangthai=$request->trangthai;
    $Detainghiencuu->minhchung=$request->minhchung;       
    $Detainghiencuu->ngaybatdau= Carbon::createFromFormat('d/m/Y',$request->ngaybatdau)->format("Y/m/d");
    $Detainghiencuu->ngaynghiemthu= Carbon::createFromFormat('d/m/Y',$request->ngaynghiemthu)->format("Y/m/d");        
    $Detainghiencuu->id_capdetai=$request->capdetai;      
    $Detainghiencuu->save(); 

$iddetai=Detainghiencuu::max('id');

for($i=1;$i<=$request->sotacgia;$i++){
    $tacgia='tacgia'.$i;
    $trachnhiem='trachnhiem'.$i;
    $thangthuchien='thangthuchien'.$i;
    $post=explode('-',$request->$tacgia);
    if(count($post) >= 2){
        $giangvienid=$post[0];
        $CT_detai=new CT_detai();
        $CT_detai->id_giangvien=$giangvienid;
        $CT_detai->id_detai=$iddetai;
        $CT_detai->id_trachnhiemdetai=$request->$trachnhiem;  
        $CT_detai->thangthuchien=$request->$thangthuchien;    
        if($request->$thangthuchien < 6)
            $CT_detai->tren6thang = 0; 
        else
            $CT_detai->tren6thang = 1;
        $CT_detai->save(); 
    }
    else{
        $Giangvien=new Giangvien();
        $Giangvien->ten=$request->$tacgia;
        $Giangvien->tenkhongdau=str_slug($request->$tacgia,"-");
        $Giangvien->ngaysinh=Carbon::now();
        $Giangvien->id_chucvu=5;
        $Giangvien->id_trinhdo=3;
        $Giangvien->id_bomon=7;
        $Giangvien->save();
        $giangvienid=$Giangvien::max('id');

        $CT_detai=new CT_detai();
        $CT_detai->id_giangvien=$giangvienid;
        $CT_detai->id_detai=$iddetai;
        $CT_detai->id_trachnhiemdetai=$request->$trachnhiem;  
        $CT_detai->thangthuchien=$request->$thangthuchien;     
            if($request->$thangthuchien < 6)
                $CT_detai->tren6thang = 0;
            else
                $CT_detai->tren6thang = 1;
        $CT_detai->save();
    }
}
    echo "Thêm thành công";
}

public function capnhatdetainghiencuu(AjaxRequest $request){
    $CT_detai=CT_detai::find($request->id);
    $Detainghiencuu=Detainghiencuu::find($CT_detai->detai->id);
    $CT_detai->thangthuchien=$request->sothangthuchien;
        if($request->sothangthuchien < 6)
            $CT_detai->tren6thang = 0;
        else
            $CT_detai->tren6thang = 1;
    $CT_detai->save();
    $Detainghiencuu->ten_vi=$request->ten_vi;
    $Detainghiencuu->ten_en=$request->ten_en;
    $Detainghiencuu->mota_vi = $request->mota_vi;
    $Detainghiencuu->mota_en = $request->mota_en;     
    $Detainghiencuu->maso=$request->maso;
    $Detainghiencuu->id_capdetai=$request->capdetai;
    $Detainghiencuu->trangthai=$request->trangthai;
    $Detainghiencuu->minhchung=$request->minhchung;  
    $Detainghiencuu->ngaybatdau= Carbon::createFromFormat('d/m/Y',$request->ngaybatdau)->format("Y/m/d");
    $Detainghiencuu->ngaynghiemthu= Carbon::createFromFormat('d/m/Y',$request->ngaynghiemthu)->format("Y/m/d");
    $Detainghiencuu->save();       
    echo "Cập nhật thành công";
}

public function xoadetainghiencuu($id){
    $Detainghiencuu=Detainghiencuu::find($id);
    $CT_detai=CT_detai::where('id_detai',$id)->get(); 
    foreach ($CT_detai as $CT){
        if($CT->giangvien->bomon->id==7)
            $Giangvien=Giangvien::where('id',$CT->id_giangvien)->delete();
            $CT->delete();                    
    }               
    $Detainghiencuu->delete();
    echo "Xóa Thành Công"; 
}

   

public function loadtacgiadetai($id_detai){
    $CT_detai=CT_detai::where('id_detai',$id_detai)->get();

    $noidung='';
    $i=1;
    foreach ($CT_detai as $ct) {
        $noidung.='<tr>';
        $noidung.='<td class="text-center">'.$i++.'</td>';
        $noidung.='<td class="text-center">'.'<i class="fa fa-times text-dange fa-2x';
        if($ct->detai->tacgia==Session::get('user_id')) 
        $noidung.=' xoatacgia';         
        $noidung.='"';
        $noidung.='data-id="'.$ct->id.'" style="color:red;"></i>'.'</td>';
        $noidung.='<td>'.$ct->giangvien->ten.'</td>';
        $noidung.='<td>'.$ct->trachnhiem->ten_vi.'</td>'; 
        $noidung.='<td class="text-center">'.$ct->thangthuchien.'</td>';          
        $noidung.='</tr>';
    }
    echo $noidung;
}


public function themtacgiadetai(AjaxRequest $request){

    $CT_detaitest=CT_detai::where('id_giangvien',$request->id_giangvien)->where('id_detai',$request->id_detai)->get();
    if(count($CT_detaitest)==0){//bắt trùng giảng viên và bài báo trong bảng chi tiết bài báo
        $CT_detai=new CT_detai();
        $CT_detai->id_giangvien=$request->id_giangvien;
        $CT_detai->id_detai=$request->id_detai;               
        $CT_detai->id_trachnhiemdetai=$request->id_trachnhiemdetai;
        $CT_detai->thangthuchien=$request->thangthuchien;
        if($request->thangthuchien < 6)
            $CT_detai->tren6thang = 0;
        else
            $CT_detai->tren6thang = 1;
        $CT_detai->save();
        echo "Thêm thành công";
    }else
        echo "Không thể thêm người này. Vì người này đã là tác giả bài báo này";   
             
}


public function themtacgiadetaitest(AjaxRequest $request){
    $Giangvien=new Giangvien();
    $Giangvien->ten=$request->tengv;
    $Giangvien->tenkhongdau=str_slug($request->tengv,"-");
    $Giangvien->diachilienhe=$request->diachigv;
    $Giangvien->ngaysinh=Carbon::now();
    $Giangvien->id_chucvu=5;
    $Giangvien->id_trinhdo=3;
    $Giangvien->id_bomon=7; 
    $Giangvien->save();
    $max=Giangvien::max('id');
    $CT_detai=new CT_detai();
    $CT_detai->id_giangvien=$max;
    $CT_detai->id_detai=$request->id_detai;
    $CT_detai->id_trachnhiemdetai=$request->id_trachnhiemdetai;
    $CT_detai->thangthuchien=$request->thangthuchien;
    if($request->thangthuchien < 6)
        $CT_detai->tren6thang = 0;
    else
        $CT_detai->tren6thang = 1;
    $CT_detai->save();
    echo "Thêm Thành Công";
}

public function xoatacgiadetai(AjaxRequest $request){
    $CT_detai=CT_detai::find($request->id);
    if($CT_detai->giangvien->bomon->id==7){
        $Giangvien=Giangvien::find($CT_detai->id_giangvien);
        $Giangvien->delete();
    }
    // không xóa tác giả đã thêm bài báo này
    if($CT_detai->detai->tacgia==$CT_detai->id_giangvien)
        echo "Không thể xóa mục này";
    else{             
        $CT_detai->delete();
        echo "Xóa thành công";
    }       
       
}

// ho so khoa hoc -- huong dan sau dai hoc

public function themhuongdansaudaihoc(AjaxRequest $request){
    $Huongdansaudaihoc=new Huongdansaudaihoc();
    $Huongdansaudaihoc->tensinhvien_vi=$request->tensinhvien_vi;
    $Huongdansaudaihoc->tensinhvien_en=$request->tensinhvien_en;
    $Huongdansaudaihoc->tendetai_vi=$request->tendetai_vi;
    $Huongdansaudaihoc->tendetai_en=$request->tendetai_en;
    $Huongdansaudaihoc->tencoso_vi=$request->tencoso_vi;
    $Huongdansaudaihoc->tencoso_en=$request->tencoso_en;
    $Huongdansaudaihoc->namhuongdan=Carbon::createFromFormat('d/m/Y',$request->namhuongdan)->format("Y/m/d");
    $Huongdansaudaihoc->nambaove=Carbon::createFromFormat('d/m/Y',$request->nambaove)->format("Y/m/d");
    $Huongdansaudaihoc->id_trinhdo=$request->trinhdo;                
    $Huongdansaudaihoc->id_giangvien=Session::get('user_id');       
    $Huongdansaudaihoc->save();       
    echo "Thêm thành công";
}

public function capnhathuongdansaudaihoc(AjaxRequest $request){
    $Huongdansaudaihoc=Huongdansaudaihoc::find($request->id);
    $Huongdansaudaihoc->tensinhvien_vi=$request->tensinhvien_vi;
    $Huongdansaudaihoc->tensinhvien_en=$request->tensinhvien_en;
    $Huongdansaudaihoc->tendetai_vi=$request->tendetai_vi;
    $Huongdansaudaihoc->tendetai_en=$request->tendetai_en;
    $Huongdansaudaihoc->tencoso_vi=$request->tencoso_vi;
    $Huongdansaudaihoc->tencoso_en=$request->tencoso_en;
    $Huongdansaudaihoc->namhuongdan=Carbon::createFromFormat('d/m/Y',$request->namhuongdan)->format("Y/m/d");
    $Huongdansaudaihoc->nambaove=Carbon::createFromFormat('d/m/Y',$request->nambaove)->format("Y/m/d");
    $Huongdansaudaihoc->id_trinhdo=$request->trinhdo;                
    $Huongdansaudaihoc->id_giangvien=Session::get('user_id');  
    $Huongdansaudaihoc->save();      
    echo "Cập nhật thành công";
}

public function xoahuongdansaudaihoc($id){
    $Huongdansaudaihoc=Huongdansaudaihoc::find($id);                   
    $Huongdansaudaihoc->delete();
    echo "Xóa Thành Công"; 
}

public function xoahuongdansaudaihochet($id){
    $ids = explode(",", $id);
    for ($i=0; $i <count($ids) ; $i++) { 
        $Huongdansaudaihoc=Huongdansaudaihoc::find($ids[$i]);                        
        $Huongdansaudaihoc->delete();
    }       
    echo "Xóa Thành Công"; 
}
    // ho so khoa hoc -- mon giang day
public function themmongiangday(AjaxRequest $request){
    $Mongiangday=new Mongiangday();
    $Mongiangday->ten_vi=$request->ten_vi;
    $Mongiangday->ten_en=$request->ten_en;
    $Mongiangday->nambatdau=$request->nambatdau;
    $Mongiangday->doituong_vi=$request->doituong_vi;
    $Mongiangday->doituong_en=$request->doituong_en;
    $Mongiangday->noiday_vi=$request->noiday_vi;
    $Mongiangday->noiday_en=$request->noiday_en;
    $Mongiangday->id_giangvien=Session::get('user_id');           
    $Mongiangday->save();       
    echo "Thêm thành công";
}

public function capnhatmongiangday(AjaxRequest $request){
    $Mongiangday=Mongiangday::find($request->id);
    $Mongiangday->ten_vi=$request->ten_vi;
    $Mongiangday->ten_en=$request->ten_en;
    $Mongiangday->nambatdau=$request->nambatdau;
    $Mongiangday->doituong_vi=$request->doituong_vi;
    $Mongiangday->doituong_en=$request->doituong_en;
    $Mongiangday->noiday_vi=$request->noiday_vi;
    $Mongiangday->noiday_en=$request->noiday_en;
    $Mongiangday->id_giangvien=Session::get('user_id');           
    $Mongiangday->save();   
    echo "Cập nhật thành công";
}

public function xoamongiangday($id){
    $Mongiangday=Mongiangday::find($id);                   
    $Mongiangday->delete();
    echo "Xóa Thành Công"; 
}

public function xoamongiangdayhet($id){
    $ids = explode(",", $id);
    for ($i=0; $i <count($ids) ; $i++) { 
        $Mongiangday=Mongiangday::find($ids[$i]);                        
        $Mongiangday->delete();
    }       
    echo "Xóa Thành Công"; 
}


//ngoai ngu
public function themngoaingu(AjaxRequest $request){
    $Ngoaingu=new Ngoaingu();
    $Ngoaingu->ten_vi=$request->ten_vi;
    $Ngoaingu->ten_en=$request->ten_en;
    $Ngoaingu->thongthao_vi=$request->thongthao_vi;
    $Ngoaingu->thongthao_en=$request->thongthao_en;       
    $Ngoaingu->id_giangvien=Session::get('user_id');           
    $Ngoaingu->save();       
    echo "Thêm thành công";
}

 public function capnhatngoaingu(AjaxRequest $request){

    $Ngoaingu=Ngoaingu::find($request->id);      
    $Ngoaingu->ten_vi=$request->ten_vi;
    $Ngoaingu->ten_en=$request->ten_en;
    $Ngoaingu->thongthao_vi=$request->thongthao_vi;
    $Ngoaingu->thongthao_en=$request->thongthao_en;       
    $Ngoaingu->id_giangvien=Session::get('user_id');           
    $Ngoaingu->save();       
    echo "Cập nhật thành công";
}

public function xoangoaingu($id){
    $Ngoaingu=Ngoaingu::find($id);                   
            $Ngoaingu->delete();
    echo "Xóa Thành Công"; 
}

public function xoangoainguhet($id){
    $ids = explode(",", $id);
    for ($i=0; $i <count($ids) ; $i++) { 
        $Ngoaingu=Ngoaingu::find($ids[$i]);                        
        $Ngoaingu->delete();
    }       
    echo "Xóa Thành Công"; 
}

   
    
}
