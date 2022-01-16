<?php

namespace App\Http\Controllers\Admin\Khoa;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\HosokhoahocRequest;
use App\Http\Controllers\Controller;
use App\Models\Trinhdo;
use App\Models\Loaibaibao;
use App\Models\Capdetai;
use App\Models\Bacdaotao;
use App\Models\Hedaotao;
use App\Models\Loaitacgia;
use App\Models\Trachnhiemdetai;
use App\Models\Giangvien;
use App\Models\Quatrinhdaotao;
use App\Models\Huongdansaudaihoc;
use App\Models\Chucvu;
use App\Models\CT_detai;
use App\Models\CT_baibao;



class HosokhoahocController extends Controller
{
    public function getThongtin($ten,$idtab,$id){
    	$tab=$idtab;
    	$Giangvien=Giangvien::find($id);
        $Trinhdo=Trinhdo::all();
    	return view('Admin.Khoa.Hosokhoahoc.thongtinchung',['tab'=>$tab,'Giangvien'=>$Giangvien,'Trinhdo'=>$Trinhdo]);
    }

    public function postThongtin(HosokhoahocRequest $request,$ten,$id_tab,$id_giangvien){

        $Giangvien=Giangvien::find($id_giangvien);
        $Giangvien->huongnghiencuu_vi=$request->huongnghiencuu_vi;
        $Giangvien->huongnghiencuu_en=$request->huongnghiencuu_en;
        $Giangvien->tencoquan_en=$request->tencoquanht_en;
        $Giangvien->tencoquan_vi=$request->tencoquanht_vi;
        $Giangvien->diachicoquan_vi=$request->diachicoquan_vi;
        $Giangvien->diachicoquan_en=$request->diachicoquan_en;
        $Giangvien->tenphongban_vi=$request->tenphongban_vi;
        $Giangvien->tenphongban_en=$request->tenphongban_en;
        $Giangvien->socoquan=$request->socoquan;
        $Giangvien->sofaxcoquan=$request->sofaxcoquan;
        $Giangvien->chucdanhkhoahoc_vi=$request->chucdanhkhoahoc_vi;
        $Giangvien->chucdanhkhoahoc_en=$request->chucdanhkhoahoc_en; 
        $Giangvien->nambonhiem=$request->nambonhiem;    
        $Giangvien->vanbang2=$request->vanbang2;
        $Giangvien->namtotnghiepvb2=$request->namtotnghiepvb2;   
        $Giangvien->save();
        return redirect('set_admin/'.$Giangvien->tenkhongdau.'/thong-tin-chung/1/'.$Giangvien->id)->with('thongbao','Cập nhật thành công');
    }

    public function getDaotao($ten,$idtab,$id){
    	$tab=$idtab;
    	$Quatrinhdaotao=Quatrinhdaotao::where('id_giangvien',$id)->get();
        $Bacdaotao=Bacdaotao::all();
        $Hedaotao=Hedaotao::all();
        $Trinhdo=Trinhdo::all();
        $Giangvien=Giangvien::find($id);
    	return view('Admin.Khoa.Hosokhoahoc.daotao',['tab'=>$tab,'Quatrinhdaotao'=>$Quatrinhdaotao,'Trinhdo'=>$Trinhdo,'Bacdaotao'=>$Bacdaotao,'Hedaotao'=>$Hedaotao,'Giangvien'=>$Giangvien]);
    }   

    public function getDetainghiencuu($ten,$idtab,$id){
        $tab=$idtab;
        $Giangvien=Giangvien::find($id);
        $CT_detai=CT_detai::where('id_giangvien',$id)->get();
        $Capdetai=Capdetai::all();
        $Trachnhiemdetai=Trachnhiemdetai::all();
        return view('Admin.Khoa.Hosokhoahoc.detainghiencuu',['tab'=>$tab,'Giangvien'=>$Giangvien,'Capdetai'=>$Capdetai,'Trachnhiemdetai'=>$Trachnhiemdetai,'CT_detai'=>$CT_detai]);
    }

    public function getBaibaokhoahoc($ten,$idtab,$id){
    	$tab=$idtab;
        $Loaitacgia=Loaitacgia::all();
        $Loaibaibao=Loaibaibao::all();
    	$Giangvien=Giangvien::find($id);
        $Chitietbaibao=CT_baibao::where('id_giangvien',$id)->get();
    	return view('Admin.Khoa.Hosokhoahoc.baibaokhoahoc',['tab'=>$tab,'Giangvien'=>$Giangvien,'Loaibaibao'=>$Loaibaibao,'Loaitacgia'=>$Loaitacgia,'Chitietbaibao'=>$Chitietbaibao]);
    }

    public function getHuongdansaudaihoc($ten,$idtab,$id){
        $tab=$idtab;
        $Giangvien=Giangvien::find($id);
        $Trinhdo=Trinhdo::all();
        return view('Admin.Khoa.Hosokhoahoc.huongdansaudaihoc',['tab'=>$tab,'Giangvien'=>$Giangvien,'Trinhdo'=>$Trinhdo]);
    }

    public function getMongiangday($ten,$idtab,$id){
        $tab=$idtab;
        $Giangvien=Giangvien::find($id);        
        return view('Admin.Khoa.Hosokhoahoc.mongiangday',['tab'=>$tab,'Giangvien'=>$Giangvien]);
       
    }

     public function getQuatrinhcongtacgiangday($ten,$idtab,$id){
        $tab=$idtab;
        $Giangvien=Giangvien::find($id);
        $Chucvu=Chucvu::all();
        return view('Admin.Khoa.Hosokhoahoc.quatrinhcongtac',['tab'=>$tab,'Giangvien'=>$Giangvien,'Chucvu'=>$Chucvu]);
    }

     public function getNgoaingu($ten,$idtab,$id){
        $tab=$idtab;
        $Giangvien=Giangvien::find($id);
        return view('Admin.Khoa.Hosokhoahoc.ngoaingu',['tab'=>$tab,'Giangvien'=>$Giangvien]);
    }

    public function getXemlaivi($ten,$idtab,$id){
    	$tab=$idtab;
    	$Hosokhoahoc=Hosokhoahoc::find($id);
        $Loaiketqua=Loaiketqua::all();
    	return view('Admin.Khoa.Hosokhoahoc.xemlaivi',['tab'=>$tab,'Hosokhoahoc'=>$Hosokhoahoc,'Loaiketqua'=>$Loaiketqua]);
    }

    public function getXemlaien($ten,$idtab,$id){
    	$tab=$idtab;
    	$Hosokhoahoc=Hosokhoahoc::find($id);
        $Loaiketqua=Loaiketqua::all();
    	return view('Admin.Khoa.Hosokhoahoc.xemlaien',['tab'=>$tab,'Hosokhoahoc'=>$Hosokhoahoc,'Loaiketqua'=>$Loaiketqua]);
    }

    public function xoabaibao(){
        $CT_baibao = CT_baibao::all();
        foreach ($CT_baibao as $ctbb){           
            if($ctbb->giangvien == null || $ctbb->baibao == null )
                $ctbb->delete();
        }
        echo "Đã cập nhật xong";
    }

    public function xoadetai(){
        $CT_detai = CT_detai::all();
        foreach ($CT_detai as $ctdt){           
            if($ctdt->giangvien == null || $ctdt->detai == null )
                $ctdt->delete();
        }
        echo "Đã cập nhật xong";
    }
}
