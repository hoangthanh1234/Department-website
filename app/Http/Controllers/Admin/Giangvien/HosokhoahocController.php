<?php

namespace App\Http\Controllers\Admin\Giangvien;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\HosokhoahocRequest;
use App\Http\Controllers\Controller;
use App\Models\Baibaokhoahoc;
use App\Models\Trinhdo;
use App\Models\Loaibaibao;
use App\Models\Capdetai;
use App\Models\Quatrinhdaotao;
use App\Models\Bacdaotao;
use App\Models\Hedaotao;
use App\Models\Loaitacgia;
use App\Models\Trachnhiemdetai;
use App\Models\Giangvien;
use App\Models\CT_detai;
use App\Models\CT_baibao;
use App\Models\Huongdansaudaihoc;
use App\Models\Mongiangday;
use App\Models\Ngoaingu;
use App\Models\Quatrinhcongtac;
use App\Models\Chucvu;
use App\Models\Detainghiencuu;
use DB;
use Session;


class HosokhoahocController extends Controller
{

public function getThongtin($ten,$idtab){        
    	$tab=$idtab;
    	$Giangvien=Giangvien::find(Session::get('user_id'));
        $Trinhdo=Trinhdo::all();
    	return view('Admin.Giangvien.Hosokhoahoc.thongtinchung',['tab'=>$tab,'Giangvien'=>$Giangvien,'Trinhdo'=>$Trinhdo]);
}

public function postThongtin(HosokhoahocRequest $request,$ten,$id_tab){
        $Giangvien=Giangvien::find(Session::get('user_id'));
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
        return redirect('set_giangvien/'.$Giangvien->tenkhongdau.'/thong-tin-chung/1')->with('thongbao','Cập nhật thành công');
}

public function getDaotao($ten,$idtab){
       
    	$Quatrinhdaotao=Quatrinhdaotao::where('id_giangvien',Session::get('user_id'))->orderby('stt')->get();
        $Bacdaotao=Bacdaotao::all();
        $Hedaotao=Hedaotao::all();
        $Trinhdo=Trinhdo::all();
        $Giangvien=Giangvien::find(Session::get('user_id'));
    	return view('Admin.Giangvien.Hosokhoahoc.quatrinhdaotao',['tab'=>$idtab,'Quatrinhdaotao'=>$Quatrinhdaotao,'Bacdaotao'=>$Bacdaotao,'Hedaotao'=>$Hedaotao,'Trinhdo'=>$Trinhdo,'Giangvien'=>$Giangvien]);
}

public function getCongtac($ten,$idtab,$id){
        if($id!=Session::get('user_id')) die('Bạn không co quyền truy cặp liện kết này');
    	$tab=$idtab;
    	$Hosokhoahoc=Hosokhoahoc::find($id);
    	return view('Admin.Giangvien.Hosokhoahoc.congtac',['tab'=>$tab,'Hosokhoahoc'=>$Hosokhoahoc]);
}

public function getDetainghiencuu($ten,$idtab){
        $tab=$idtab;
        $Giangvien=Giangvien::find(Session::get('user_id'));       
        $CT_detai=CT_detai::where('id_giangvien',Session::get('user_id'))->get();
        $Capdetai=Capdetai::all();
        $Trachnhiemdetai=Trachnhiemdetai::all();
        $Loaitacgia=Loaitacgia::where('trangthai',1)->orderby('stt')->get();
        $ListGiangvien=Giangvien::orderby('id')->where('id','<>',Session::get('user_id'))->get();
        return view('Admin.Giangvien.Hosokhoahoc.detainghiencuu',['tab'=>$tab,'CT_detai'=>$CT_detai,'Capdetai'=>$Capdetai,'Trachnhiemdetai'=>$Trachnhiemdetai,'Giangvien'=>$Giangvien,'ListGiangvien'=>$ListGiangvien,'Loaitacgia'=>$Loaitacgia]);
}

public function getBaibaokhoahoc($ten,$idtab){
       
    	$tab=$idtab;
        $Loaibaibao=Loaibaibao::all();
        $Loaitacgia=Loaitacgia::where('trangthai',1)->orderby('stt')->get();
    	$Chitietbaibao=CT_baibao::where('id_giangvien',Session::get('user_id'))->with('baibao')->get();
        $Giangvien=Giangvien::find(Session::get('user_id'));
        $ListGiangvien=Giangvien::orderby('id')->where('id','<>',Session::get('user_id'))->get();

    	return view('Admin.Giangvien.Hosokhoahoc.baibaokhoahoc',['tab'=>$tab,'Chitietbaibao'=>$Chitietbaibao,'Loaibaibao'=>$Loaibaibao,'Loaitacgia'=>$Loaitacgia,'Giangvien'=>$Giangvien,'ListGiangvien'=>$ListGiangvien]);
}

public function getHuongdansaudaihoc($ten,$idtab){      
        $tab=$idtab;
        $Giangvien=Giangvien::find(Session::get('user_id'));
        $Huongdansaudaihoc=Huongdansaudaihoc::where('id_giangvien',Session::get('user_id'))->get();      
        $Trinhdo=Trinhdo::where('hienthi',1)->get();
        return view('Admin.Giangvien.Hosokhoahoc.huongdansaudaihoc',['tab'=>$tab,'Huongdansaudaihoc'=>$Huongdansaudaihoc,'Trinhdo'=>$Trinhdo,'Giangvien'=>$Giangvien]);
}

public function getMongiangday($ten,$idtab){
       
    $tab=$idtab;
    $Mongiangday=Mongiangday::where('id_giangvien',Session::get('user_id'))->get();
    $Giangvien=Giangvien::find(Session::get('user_id'));
    return view('Admin.Giangvien.Hosokhoahoc.mongiangday',['tab'=>$tab,'Mongiangday'=>$Mongiangday,'Giangvien'=>$Giangvien]);
}

public function getQuatrinhcongtacgiangday($ten,$idtab){    
    $tab=$idtab;
    $Quatrinhcongtac=Quatrinhcongtac::where('id_giangvien',Session::get('user_id'))->orderby('stt')->get();
    $Giangvien=Giangvien::find(Session::get('user_id'));
    $Chucvu=Chucvu::orderby('stt')->get();
    return view('Admin.Giangvien.Hosokhoahoc.quatrinhcongtac',['tab'=>$tab,'Quatrinhcongtac'=>$Quatrinhcongtac,'Giangvien'=>$Giangvien,'Chucvu'=>$Chucvu]);
}

public function getngoaingu($ten,$idtab){   
    $tab=$idtab;
    $Ngoaingu=Ngoaingu::where('id_giangvien',Session::get('user_id'))->get();
    $Giangvien=Giangvien::find(Session::get('user_id'));
    return view('Admin.Giangvien.Hosokhoahoc.ngoaingu',['tab'=>$tab,'Ngoaingu'=>$Ngoaingu,'Giangvien'=>$Giangvien]);
}

public function getXemlaivi($ten,$idtab){
   
    $tab=$idtab;
    $Giangvien=Giangvien::find(Session::get('user_id'));
    $Loaibaibao=Loaibaibao::all();   

    $Baibao = Baibaokhoahoc::whereHas('ct_baibao',function($query)use($Giangvien){
        $query->where('id_giangvien',$Giangvien->id);
    })->orderby('nam','DESC')->get();

    $Detai = Detainghiencuu::whereHas('ct_detai',function($query)use($Giangvien){
        $query->where('id_giangvien',$Giangvien->id);
    })->orderby('ngaybatdau','DESC')->get();

    $Daihoc=Quatrinhdaotao::where('id_giangvien',Session::get('user_id'))->orderby('stt')->first();       
    $Saudaihoc=Quatrinhdaotao::where('id_giangvien',Session::get('user_id'))->orderby('stt')->skip(1)->take(10)->get();
    $max=Quatrinhdaotao::where('id_giangvien',Session::get('user_id'))->orderby('stt','DESC ')->first();      

    return view('Admin.Giangvien.Hosokhoahoc.xemlaivi',['tab'=>$tab,'Giangvien'=>$Giangvien,'Loaibaibao'=>$Loaibaibao,'Daihoc'=>$Daihoc,'Saudaihoc'=>$Saudaihoc,'maxqt'=>$max,'Baibao' => $Baibao,'Detai' => $Detai]);
}

public function getXemlaien($ten,$idtab){
        
    $tab=$idtab;
    $Giangvien=Giangvien::find(Session::get('user_id'));
    $Loaibaibao=Loaibaibao::all();

   $Baibao = Baibaokhoahoc::whereHas('ct_baibao',function($query)use($Giangvien){
        $query->where('id_giangvien',$Giangvien->id);
    })->orderby('nam','DESC')->get();

    $Detai = Detainghiencuu::whereHas('ct_detai',function($query)use($Giangvien){
        $query->where('id_giangvien',$Giangvien->id);
    })->orderby('ngaybatdau','DESC')->get();
    
    $Daihoc=Quatrinhdaotao::where('id_giangvien',Session::get('user_id'))->orderby('stt')->first();       
    $Saudaihoc=Quatrinhdaotao::where('id_giangvien',Session::get('user_id'))->orderby('stt')->skip(1)->take(10)->get();
    $max=Quatrinhdaotao::where('id_giangvien',Session::get('user_id'))->orderby('stt','DESC ')->first();
    return view('Admin.Giangvien.Hosokhoahoc.xemlaien',['tab'=>$tab,'Giangvien'=>$Giangvien,'Loaibaibao'=>$Loaibaibao,'Daihoc'=>$Daihoc,'Saudaihoc'=>$Saudaihoc,'maxqt'=>$max,'Baibao' => $Baibao,'Detai' => $Detai]);
}

}
