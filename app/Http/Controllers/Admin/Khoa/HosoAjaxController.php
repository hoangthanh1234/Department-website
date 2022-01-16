<?php

namespace App\Http\Controllers\Admin\Khoa;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\AjaxRequest;
use App\Http\Controllers\Controller;
use App\Models\Quatrinhdaotao;
use App\Models\Quatrinhcongtac;
use App\Models\Duanthamgia;
use App\Models\Baibaokhoahoc;
use App\Models\Detainghiencuu;
use App\Models\CT_baibao;
use App\Models\CT_detai;
use App\Models\Phieu_nckh_baibao;
use App\Models\Phieu_nckh_detai;
use App\Models\Capdetai;
use App\Models\Trachnhiemdetai;
use App\Models\Loaibaibao;
use App\Models\Loaitacgia;
use App\Models\Tieuchi_nckh_baibao;
use App\Models\Tieuchi_nckh_detai;
use App\Models\Huongdansaudaihoc;
use App\Models\Mongiangday;
use App\Models\Ngoaingu;
use Carbon\Carbon;

class HosoAjaxController extends Controller
{

// ho so khoa hoc - qua trinh dao tao
public function themdaotao(AjaxRequest $request){
        
    $Quatrinhdaotao=new Quatrinhdaotao();      
    $max=Quatrinhdaotao::where('id_giangvien',$request->id_giangvien)->max('id');
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
    $Quatrinhdaotao->id_giangvien=$request->id_giangvien;   	
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
    for ($i=0; $i <count($ids) ; $i++) { 
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
    $Quatrinhcongtac->sodienthoai=$request->sodienthoai;
    $Quatrinhcongtac->ngaybatdau=Carbon::createFromFormat('d/m/Y',$request->tungay)->format("Y/m/d"); 
    $Quatrinhcongtac->ngayketthuc=Carbon::createFromFormat('d/m/Y',$request->denngay)->format("Y/m/d");     
    $Quatrinhcongtac->id_chucvu=$request->chucvu;       
    $Quatrinhcongtac->ghichu=$request->ghichu;
    $Quatrinhcongtac->id_giangvien=$request->id_giangvien;    
    $Quatrinhcongtac->save();
    echo "Thêm Thành Công";
}

public function capnhatcongtac(AjaxRequest $request){
   $Quatrinhcongtac=Quatrinhcongtac::find($request->id);
    $Quatrinhcongtac->tencoso_vi=$request->tencoso_vi;
    $Quatrinhcongtac->tencoso_en=$request->tencoso_en;
    $Quatrinhcongtac->diachicoso_vi=$request->diachicoso_vi;
    $Quatrinhcongtac->diachicoso_en=$request->diachicoso_en;
    $Quatrinhcongtac->sodienthoai=$request->sodienthoai;
    $Quatrinhcongtac->ngaybatdau=Carbon::createFromFormat('d/m/Y',$request->tungay)->format("Y/m/d"); 
    $Quatrinhcongtac->ngayketthuc=Carbon::createFromFormat('d/m/Y',$request->denngay)->format("Y/m/d");     
    $Quatrinhcongtac->id_chucvu=$request->chucvu;       
    $Quatrinhcongtac->ghichu=$request->ghichu;   
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



public function themnghiencuucongbo(){
    $Nghiencuudacongbo=new Baibaokhoahoc();
    $Nghiencuudacongbo->ten_vi=isset($_POST['ten_vi']) ? $_POST['ten_vi'] : "";
    $Nghiencuudacongbo->ten_en=isset($_POST['ten_en']) ? $_POST['ten_en'] : "";
    $Nghiencuudacongbo->tacgia_vi=isset($_POST['tacgia_vi']) ? $_POST['tacgia_vi'] : "";
    $Nghiencuudacongbo->tacgia_en=isset($_POST['tacgia_en']) ? $_POST['tacgia_en'] : "";
    $Nghiencuudacongbo->nxb=isset($_POST['nxb']) ? $_POST['nxb'] : "";
    $Nghiencuudacongbo->so_issn=isset($_POST['so_issn']) ? $_POST['so_issn'] : "";
    $Nghiencuudacongbo->nam=Carbon::createFromFormat('d/m/Y',$_POST['nam'])->format("Y/m/d"); 
    $Nghiencuudacongbo->minhchung=isset($_POST['minhchung']) ? $_POST['minhchung'] : "";
    $Nghiencuudacongbo->ghichu=isset($_POST['ghichu']) ? $_POST['ghichu'] : "";
    $Nghiencuudacongbo->id_loaibaibao=isset($_POST['loaibaibao']) ? $_POST['loaibaibao'] : 1;
    $Nghiencuudacongbo->id_hoso=isset($_POST['hoso']) ? $_POST['hoso'] : "";
    $Nghiencuudacongbo->phamvi=isset($_POST['phamvi']) ? $_POST['phamvi'] : 0;
    $Nghiencuudacongbo->id_loaitacgia=isset($_POST['loaitacgia']) ? $_POST['loaitacgia'] : 1;
    $Nghiencuudacongbo->save();           
    echo "Thêm thành công";
}

public function capnhatnghiencuucongbo(){
    $Nghiencuudacongbo=Baibaokhoahoc::find($_POST['id']);
    $Nghiencuudacongbo->ten_vi=isset($_POST['ten_vi']) ? $_POST['ten_vi'] : "";
    $Nghiencuudacongbo->ten_en=isset($_POST['ten_en']) ? $_POST['ten_en'] : "";
    $Nghiencuudacongbo->tacgia_vi=isset($_POST['tacgia_vi']) ? $_POST['tacgia_vi'] : "";
    $Nghiencuudacongbo->tacgia_en=isset($_POST['tacgia_en']) ? $_POST['tacgia_en'] : "";
    $Nghiencuudacongbo->nxb=isset($_POST['nxb']) ? $_POST['nxb'] : "";
    $Nghiencuudacongbo->so_issn=isset($_POST['so_issn']) ? $_POST['so_issn'] : "";
    $Nghiencuudacongbo->nam=Carbon::createFromFormat('d/m/Y',$_POST['nam'])->format("Y/m/d");
    $Nghiencuudacongbo->minhchung=isset($_POST['minhchung']) ? $_POST['minhchung'] : "";
    $Nghiencuudacongbo->ghichu=isset($_POST['ghichu']) ? $_POST['ghichu'] : "";
    $Nghiencuudacongbo->id_loaibaibao=isset($_POST['loaibaibao']) ? $_POST['loaibaibao'] : 1;
    $Nghiencuudacongbo->id_hoso=isset($_POST['hoso']) ? $_POST['hoso'] : "";
    $Nghiencuudacongbo->phamvi=isset($_POST['phamvi']) ? $_POST['phamvi'] : 0;
    $Nghiencuudacongbo->id_loaitacgia=isset($_POST['loaitacgia']) ? $_POST['loaitacgia'] : 1;
    $Nghiencuudacongbo->save();           
    echo "Cập nhật thành công";
}


public function xoaduancongbo($id){
    $Nghiencuudacongbo=Baibaokhoahoc::find($id);                  
    $Nghiencuudacongbo->delete();
    echo "Xóa Thành Công"; 
}

public function xoaduancongbohet($id){
    $ids = explode(",", $id);
    for ($i=0; $i <count($ids) ; $i++) { 
        $Nghiencuudacongbo=Baibaokhoahoc::find($ids[$i]);                         
        $Nghiencuudacongbo->delete();
    }       
    echo "Xóa Thành Công"; 
}

    // ho so khoa hoc -- de tai nghien cuu

public function thembaibao(){
    $Congtrinhkhoahoc=new Congtrinhkhoahoc();
    $Congtrinhkhoahoc->ten_vi=isset($_POST['ten_vi']) ? $_POST['ten_vi'] : "";
    $Congtrinhkhoahoc->ten_en=isset($_POST['ten_en']) ? $_POST['ten_en'] : "";
    $Congtrinhkhoahoc->chunhiem_vi=isset($_POST['chunhiem_vi']) ? $_POST['chunhiem_vi'] : "";
    $Congtrinhkhoahoc->chunhiem_en=isset($_POST['chunhiem_en']) ? $_POST['chunhiem_en'] : "";
    $Congtrinhkhoahoc->thanhvien_vi=isset($_POST['thanhvien_vi']) ? $_POST['thanhvien_vi'] : "";
    $Congtrinhkhoahoc->thanhvien_en=isset($_POST['thanhvien_en']) ? $_POST['thanhvien_en'] : "";
    $Congtrinhkhoahoc->maso=isset($_POST['maso']) ? $_POST['maso'] : "";
    $Congtrinhkhoahoc->id_capdetai=isset($_POST['capdetai']) ? $_POST['capdetai'] : 0;
    $Congtrinhkhoahoc->trangthai=isset($_POST['trangthai']) ? $_POST['trangthai'] : "";
    $Congtrinhkhoahoc->minhchung=isset($_POST['minhchung']) ? $_POST['minhchung'] : "";
    $Congtrinhkhoahoc->id_trachnhiem=isset($_POST['trachnhiemdetai']) ? $_POST['trachnhiemdetai'] : 1;
    $Congtrinhkhoahoc->sothangthuchien=isset($_POST['sothangthuchien']) ? $_POST['sothangthuchien'] : 1;
    $Congtrinhkhoahoc->nam=Carbon::createFromFormat('d/m/Y',$_POST['nam'])->format("Y/m/d");
    $Congtrinhkhoahoc->id_hoso=isset($_POST['hoso']) ? $_POST['hoso'] : "";       
    $Congtrinhkhoahoc->save();          
     echo "Thêm thành công";
}

public function capnhatbaibao($id,$id_loaibaibao){

    // $CT_baibao = CT_baibao::find($id);
    $Baibaokhoahoc = Baibaokhoahoc::find($id); 
    // $Baibaokhoahoc->id_loaibaibao =   $id_loaibaibao;
    // $Baibaokhoahoc->save();

    $CT_baibao = CT_baibao::where('id_baibao',$id)->get(); 

    $arr = array();
    for($i = 0 ; $i<count($CT_baibao); $i++)
        $arr[$i] = $CT_baibao[$i]->id;
    
    $Phieu_nckh_baibao = Phieu_nckh_baibao::whereIn('id_chitietbaibao',$arr)->get();
    dd($Phieu_nckh_baibao);
    echo $Baibaokhoahoc->ten_vi;
}


public function loadloaibaibao($id){
    $Loaibaibao = Loaibaibao::all();
    $CT_baibao = CT_baibao::find($id);
    $noidung = '';
    foreach ($Loaibaibao as $lbb) {
        $noidung.='<option value="'.$lbb->id.'"';
        if($lbb->id == $CT_baibao->baibao->id_loaibaibao)
            $noidung.=' selected';
        $noidung.='>'.$lbb->ten_vi.'</option>';
    }
    echo $noidung;
}

public function loadloaitacgia($id){
    $Loaitacgia = Loaitacgia::all();
    $CT_baibao = CT_baibao::find($id);
    $noidung = '';
    foreach ($Loaitacgia as $ltg) {
        $noidung.='<option value="'.$ltg->id.'"';
        if($ltg->id == $CT_baibao->id_loaitacgia)
            $noidung.=' selected';
        $noidung.='>'.$ltg->ten_vi.'</option>';
    }
    echo $noidung;
}

public function loadtrachnhiem($id){
    $Trachnhiemdetai = Trachnhiemdetai::all();
    $CT_detai = CT_detai::find($id);
    $noidung = '';
    foreach ($Trachnhiemdetai as $tndt) {
        $noidung.='<option value="'.$tndt->id.'"';
        if($tndt->id == $CT_detai->id_trachnhiemdetai)
            $noidung.=' selected';
        $noidung.='>'.$tndt->ten_vi.'</option>';
    }
    echo $noidung;
}

public function loadcapdetai($id){
    $Capdetai = Capdetai::all();
    $CT_detai = CT_detai::find($id);
    $noidung = '';
    foreach ($Capdetai as $cdt) {
        $noidung.='<option value="'.$cdt->id.'"';
        if($cdt->id == $CT_detai->detai->id_capdetai)
            $noidung.=' selected';
        $noidung.='>'.$cdt->ten_vi.'</option>';
    }
    echo $noidung;

}

public function capnhatduyetbaibao($id_ct,$id_loaibaibao,$id_loaitacgia){

    $CT_baibao = CT_baibao::find($id_ct);

    if($CT_baibao->baibao->id_loaibaibao != $id_loaibaibao)
        $this->capnhatloaibaibao($CT_baibao->id_baibao,$id_loaibaibao);
    
    if($CT_baibao->id_loaitacgia != $id_loaitacgia)
        $this->capnhatloaitacgia($id_ct,$id_loaibaibao,$id_loaitacgia);
    
}

public function capnhatloaitacgia($id_ct,$id_loaibaibao,$id_loaitacgia){

    $Tieuchi_nckh_baibao = Tieuchi_nckh_baibao::where('id_loaibaibao',$id_loaibaibao)
                                                ->where('id_loaitacgia',$id_loaitacgia)
                                                ->first();
    if($Tieuchi_nckh_baibao!=null){
        $CT_baibao = CT_baibao::find($id_ct)->update(['id_loaitacgia' => $id_loaitacgia]);
        $Phieu_nckh_baibao = Phieu_nckh_baibao::where('id_chitietbaibao',$id_ct)->update(['id_tieuchi' => $Tieuchi_nckh_baibao->id]);
    }else echo "NO";
    
}

public function capnhatloaibaibao($id_baibao,$id_loaibaibao){
    $Baibaokhoahoc = Baibaokhoahoc::find($id_baibao);
    foreach ($Baibaokhoahoc->ct_baibao as $ctbb) {
        $Tieuchi_nckh_baibao = Tieuchi_nckh_baibao::where('id_loaibaibao',$id_loaibaibao)
                                                ->where('id_loaitacgia',$ctbb->id_loaitacgia)
                                                ->first();

        if($Tieuchi_nckh_baibao != null){
            $Phieu_nckh_baibao = Phieu_nckh_baibao::where('id_chitietbaibao',$ctbb->id)->update(['id_tieuchi' => $Tieuchi_nckh_baibao->id]);
            $Baibaokhoahoc->update(['id_loaibaibao' => $id_loaibaibao]);
        }else echo "NO";
    }
}

public function capnhatduyetdetai($id_ct,$id_capdetai,$id_trachnhiemdetai){
    $CT_detai = CT_detai::find($id_ct);
    if($CT_detai->detai->id_capdetai != $id_capdetai)
        $this->capnhatcapdetai($CT_detai->id_detai,$id_capdetai);
    if($CT_detai->id_trachnhiemdetai != $id_trachnhiemdetai)
        $this->capnhattrachnhiemdetai($id_ct,$id_capdetai,$id_trachnhiemdetai);
}

public function capnhattrachnhiemdetai($id_ct,$id_capdetai,$id_trachnhiemdetai){

    $Tieuchi_nckh_detai = Tieuchi_nckh_detai::where('id_trachnhiemdetai',$id_trachnhiemdetai)
                                                ->where('id_capdetai',$id_capdetai)
                                                ->first();

    if($Tieuchi_nckh_detai!=null){
        $CT_detai = CT_detai::find($id_ct)->update(['id_trachnhiemdetai' => $id_trachnhiemdetai]);
        $Phieu_nckh_detai = Phieu_nckh_detai::where('id_chitietdetai',$id_ct)->update(['id_tieuchi' => $Tieuchi_nckh_detai->id]);
    }else echo "NO";
}

public function capnhatcapdetai($id_detai,$id_capdetai){
    $Detainghiencuu = Detainghiencuu::find($id_detai);
    foreach ($Detainghiencuu->ct_detai as $ctdt) {
        $Tieuchi_nckh_detai = Tieuchi_nckh_detai::where('id_capdetai',$id_capdetai)
                                                ->where('id_trachnhiemdetai',$ctdt->id_trachnhiemdetai)
                                                ->first();

        if($Tieuchi_nckh_detai != null){
            $Phieu_nckh_detai = Phieu_nckh_detai::where('id_chitietdetai',$ctdt->id)->update(['id_tieuchi' => $Tieuchi_nckh_detai->id]);
            $Detainghiencuu->update(['id_capdetai' => $id_capdetai]);
        }else echo "NO";
    }
}




public function xoadetainghiencuu($id){
    $Congtrinhkhoahoc=Congtrinhkhoahoc::find($id);                   
    $Congtrinhkhoahoc->delete();
    echo "Xóa Thành Công"; 
}

public function xoadetainghiencuuhet($id){
    $ids = explode(",", $id);
    for ($i=0; $i <count($ids) ; $i++) { 
         $Congtrinhkhoahoc=Congtrinhkhoahoc::find($ids[$i]);                        
        $Congtrinhkhoahoc->delete();
    }       
    echo "Xóa Thành Công"; 
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
    $Huongdansaudaihoc->id_giangvien=$request->id_giangvien;       
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
    $Mongiangday->id_giangvien=$request->id_giangvien;           
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
    $Ngoaingu->id_giangvien=$request->id_giangvien;           
    $Ngoaingu->save();       
    echo "Thêm thành công";
}

public function capnhatngoaingu(AjaxRequest $request){
    $Ngoaingu=Ngoaingu::find($request->id);      
    $Ngoaingu->ten_vi=$request->ten_vi;
    $Ngoaingu->ten_en=$request->ten_en;
    $Ngoaingu->thongthao_vi=$request->thongthao_vi;
    $Ngoaingu->thongthao_en=$request->thongthao_en; 
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
