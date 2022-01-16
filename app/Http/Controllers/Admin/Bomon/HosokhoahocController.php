<?php

namespace App\Http\Controllers\Admin\Bomon;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\HosokhoahocRequest;
use App\Http\Controllers\Controller;
use App\Models\Hosokhoahoc;
use App\Models\Trinhdo;
use App\Models\Loaiketqua;
use App\Models\Capdetai;


class HosokhoahocController extends Controller
{
    public function getThongtin($ten,$idtab,$id){
    	$tab=$idtab;
    	$Hosokhoahoc=Hosokhoahoc::find($id);
        $Trinhdo=Trinhdo::all();
    	return view('Admin.Bomon.Hosokhoahoc.thongtinchung',['tab'=>$tab,'Hosokhoahoc'=>$Hosokhoahoc,'Trinhdo'=>$Trinhdo]);
    }

    public function postThongtin(HosokhoahocRequest $request,$ten,$id_tab,$id_hoso){

        $Hosokhoahoc=Hosokhoahoc::find($id_hoso);
        $Hosokhoahoc->huongnghiencuu_vi=$request->huongnghiencuu_vi;
        $Hosokhoahoc->huongnghiencuu_en=$request->huongnghiencuu_en;
        $Hosokhoahoc->tencoquan_en=$request->tencoquanht_en;
        $Hosokhoahoc->tencoquan_vi=$request->tencoquanht_vi;
        $Hosokhoahoc->diachicoquan=$request->diachicoquan;
        $Hosokhoahoc->tenphongban=$request->tenphongban;
        $Hosokhoahoc->socoquan=$request->socoquan;
        $Hosokhoahoc->sofaxcoquan=$request->sofaxcoquan;
        $Hosokhoahoc->chucdanhkhoahoc_vi=$request->chucdanhkhoahoc_vi;
        $Hosokhoahoc->chucdanhkhoahoc_en=$request->chucdanhkhoahoc_en;
        $Hosokhoahoc->ngoaingu=$request->ngoaingu;
        $Hosokhoahoc->save();
        return redirect('set_bomon/hosokhoahoc/'.$Hosokhoahoc->giangvien->tenkhongdau.'/thong-tin-chung/1/'.$Hosokhoahoc->id)->with('thongbao','Cập nhật thành công');
    }

    public function getDaotao($ten,$idtab,$id){
    	$tab=$idtab;
    	$Hosokhoahoc=Hosokhoahoc::find($id);
    	return view('Admin.Bomon.Hosokhoahoc.daotao',['tab'=>$tab,'Hosokhoahoc'=>$Hosokhoahoc]);
    }

    public function getCongtac($ten,$idtab,$id){
    	$tab=$idtab;
    	$Hosokhoahoc=Hosokhoahoc::find($id);
    	return view('Admin.Bomon.Hosokhoahoc.congtac',['tab'=>$tab,'Hosokhoahoc'=>$Hosokhoahoc]);
    }

    public function getDetainghiencuu($ten,$idtab,$id){
        $tab=$idtab;
        $Hosokhoahoc=Hosokhoahoc::find($id);
        $Capdetai=Capdetai::all();
        return view('Admin.Bomon.Hosokhoahoc.detainghiencuu',['tab'=>$tab,'Hosokhoahoc'=>$Hosokhoahoc,'Capdetai'=>$Capdetai]);
    }

    public function getBaibaokhoahoc($ten,$idtab,$id){
    	$tab=$idtab;
        $Loaiketqua=Loaiketqua::all();
    	$Hosokhoahoc=Hosokhoahoc::find($id);
        
    	return view('Admin.Bomon.Hosokhoahoc.baibaokhoahoc',['tab'=>$tab,'Hosokhoahoc'=>$Hosokhoahoc,'Loaiketqua'=>$Loaiketqua]);
    }

    public function getHuongdansaudaihoc($ten,$idtab,$id){
        $tab=$idtab;
        $Hosokhoahoc=Hosokhoahoc::find($id);
        $Trinhdo=Trinhdo::all();
        return view('Admin.Bomon.Hosokhoahoc.huongdansaudaihoc',['tab'=>$tab,'Hosokhoahoc'=>$Hosokhoahoc,'Trinhdo'=>$Trinhdo]);
    }

    public function getMongiangday($ten,$idtab,$id){
        $tab=$idtab;
        $Hosokhoahoc=Hosokhoahoc::find($id);
        return view('Admin.Bomon.Hosokhoahoc.mongiangday',['tab'=>$tab,'Hosokhoahoc'=>$Hosokhoahoc]);
    }

     public function getQuatrinhcongtacgiangday($ten,$idtab,$id){
        $tab=$idtab;
        $Hosokhoahoc=Hosokhoahoc::find($id);
        return view('Admin.Bomon.Hosokhoahoc.quatrinhcongtac',['tab'=>$tab,'Hosokhoahoc'=>$Hosokhoahoc]);
    }

    public function getXemlaivi($ten,$idtab,$id){
    	$tab=$idtab;
    	$Hosokhoahoc=Hosokhoahoc::find($id);
        $Loaiketqua=Loaiketqua::all();
    	return view('Admin.Bomon.Hosokhoahoc.xemlaivi',['tab'=>$tab,'Hosokhoahoc'=>$Hosokhoahoc,'Loaiketqua'=>$Loaiketqua]);
    }

    public function getXemlaien($ten,$idtab,$id){
    	$tab=$idtab;
    	$Hosokhoahoc=Hosokhoahoc::find($id);
        $Loaiketqua=Loaiketqua::all();
    	return view('Admin.Bomon.Hosokhoahoc.xemlaien',['tab'=>$tab,'Hosokhoahoc'=>$Hosokhoahoc,'Loaiketqua'=>$Loaiketqua]);
    }
}
