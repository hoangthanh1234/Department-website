<?php

namespace App\Http\Controllers\Admin\Giangvien;

use Illuminate\Http\Request;
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

class AutoController extends Controller{

	 public function tenbaibaovi(Request $request){
    	$Baibaokhoahoc=Baibaokhoahoc::select('ten_vi')->where('ten_vi', 'like', '%' . $request->value . '%')->distinct()->get();
   		return response()->json($Baibaokhoahoc);
    }
    
    public function tenbaibaoen(Request $request){
    	$Baibaokhoahoc=Baibaokhoahoc::select('ten_en')->where('ten_en', 'like', '%' . $request->value . '%')->distinct()->get();
   		return response()->json($Baibaokhoahoc);
    }

    public function nhaxuatbanvi(Request $request){
    	$Baibaokhoahoc=Baibaokhoahoc::select('nxb_vi')->where('nxb_vi', 'like', '%' . $request->value . '%')->distinct()->get();
   		return response()->json($Baibaokhoahoc);
    }

    public function nhaxuatbanen(Request $request){
    	$Baibaokhoahoc=Baibaokhoahoc::select('nxb_en')->where('nxb_en', 'like', '%' . $request->value . '%')->distinct()->get();
   		return response()->json($Baibaokhoahoc);
    }

    public function soissn(Request $request){
    	$Baibaokhoahoc=Baibaokhoahoc::select('so_issn')->where('so_issn', 'like', '%' . $request->value . '%')->distinct()->get();
   		return response()->json($Baibaokhoahoc);
    }

    public function tendetaivi(Request $request){
    	$Detainghiencuu = Detainghiencuu::select('ten_vi')->where('ten_vi','like','%'.$request->value.'%')->distinct()->get();
    	return response()->json($Detainghiencuu);
    }

    public function tendetaien(Request $request){
    	$Detainghiencuu = Detainghiencuu::select('ten_en')->where('ten_en','like','%'.$request->value.'%')->distinct()->get();
    	return response()->json($Detainghiencuu);
    }

    public function tencosovi(Request $request){
    	$Quatrinhdaotao = Quatrinhdaotao::select('tencoso_vi')->where('tencoso_vi','like','%'.$request->value.'%')->distinct()->get();
    	return response()->json($Quatrinhdaotao);
    }

    public function tencosoen(Request $request){
    	$Quatrinhdaotao = Quatrinhdaotao::select('tencoso_en')->where('tencoso_en','like','%'.$request->value.'%')->distinct()->get();
    	return response()->json($Quatrinhdaotao);
    }

    public function noidaotaovi(Request $request){
    	$Quatrinhdaotao = Quatrinhdaotao::select('noidaotao_vi')->where('noidaotao_vi','like','%'.$request->value.'%')->distinct()->get();
    	return response()->json($Quatrinhdaotao);
    }

    public function noidaotaoen(Request $request){
    	$Quatrinhdaotao = Quatrinhdaotao::select('noidaotao_en')->where('noidaotao_en','like','%'.$request->value.'%')->distinct()->get();
    	return response()->json($Quatrinhdaotao);
    }

     public function chuyennganhvi(Request $request){
    	$Quatrinhdaotao = Quatrinhdaotao::select('chuyennganhvi')->where('chuyennganh_vi','like','%'.$request->value.'%')->distinct()->get();
    	return response()->json($Quatrinhdaotao);
    }

     public function chuyennganhen(Request $request){
    	$Quatrinhdaotao = Quatrinhdaotao::select('chuyennganh_en')->where('chuyennganh_en','like','%'.$request->value.'%')->distinct()->get();
    	return response()->json($Quatrinhdaotao);
    }

     public function hdsdhtencosovi(Request $request){
    	$Huongdansaudaihoc=Huongdansaudaihoc::select('tencoso_vi')->where('tencoso_vi', 'like', '%' . $request->value . '%')->distinct()->get();
    	return response()->json($Huongdansaudaihoc);
    }

    public function hdsdhtencosoen(Request $request){
    	$Huongdansaudaihoc = Huongdansaudaihoc::select('tencoso_en')->where('tencoso_en','like','%'.$request->value.'%')->distinct()->get();
    	return response()->json($Huongdansaudaihoc);
    }

    public function tenmonvi(Request $request){
    	$Mongiangday = Mongiangday::select('ten_vi')->where('ten_vi','like','%'.$request->value.'%')->distinct()->get();
    	return response()->json($Mongiangday);
    }

     public function tenmonen(Request $request){
    	$Mongiangday = Mongiangday::select('ten_en')->where('ten_en','like','%'.$request->value.'%')->distinct()->get();
    	return response()->json($Mongiangday);
    }

     public function doituongvi(Request $request){
    	$Mongiangday = Mongiangday::select('doituong_vi')->where('doituong_vi','like','%'.$request->value.'%')->distinct()->get();
    	return response()->json($Mongiangday);
    }

     public function doituongen(Request $request){
    	$Mongiangday = Mongiangday::select('doituong_en')->where('doituong_en','like','%'.$request->value.'%')->distinct()->get();
    	return response()->json($Mongiangday);
    }

     public function noidayvi(Request $request){
    	$Mongiangday = Mongiangday::select('noiday_vi')->where('noiday_vi','like','%'.$request->value.'%')->distinct()->get();
    	return response()->json($Mongiangday);
    }

     public function noidayen(Request $request){
    	$Mongiangday = Mongiangday::select('noiday_en')->where('noiday_en','like','%'.$request->value.'%')->distinct()->get();
    	return response()->json($Mongiangday);
    }

    public function qtdttencosovi(Request $request){
    	$Quatrinhcongtac = Quatrinhcongtac::select('tencoso_vi')->where('tencoso_vi','like','%'.$request->value.'%')->distinct()->get();
    	return response()->json($Quatrinhcongtac);
    }

    public function qtdttencosoen(Request $request){
    	$Quatrinhcongtac = Quatrinhcongtac::select('tencoso_en')->where('tencoso_en','like','%'.$request->value.'%')->distinct()->get();
    	return response()->json($Quatrinhcongtac);
    }

    public function qtdtdiachicosovi(Request $request){
    	$Quatrinhcongtac = Quatrinhcongtac::select('diachicoso_vi')->where('diachicoso_vi','like','%'.$request->value.'%')->distinct()->get();
    	return response()->json($Quatrinhcongtac);
    }

    public function qtdtdiachicosoen(Request $request){
    	$Quatrinhcongtac = Quatrinhcongtac::select('diachicoso_en')->where('diachicoso_en','like','%'.$request->value.'%')->distinct()->get();
    	return response()->json($Quatrinhcongtac);
    }


}
