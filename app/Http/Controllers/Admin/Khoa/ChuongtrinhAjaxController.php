<?php

namespace App\Http\Controllers\Admin\Khoa;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Mon;
use App\Models\CT_daotao;
use App\Models\CT_xettuyen;
use App\Models\Monsotruong;
use DB;

class ChuongtrinhAjaxController extends Controller
{
    


public function loadhocky($sohk){
	$noidung = '';
	$stt=0;
	for ($i=0; $i < $sohk ; $i++){ 
		$stt++;
		$noidung.='<div class="row" style="margin-top:30px;">';
		$noidung.='<div class="col-lg-12 col-md-12 col-xs-12">';
		$noidung.='<label class="ten2x">Nhập Số môn học của học kỳ: '.$stt.'</label>';
		$noidung.='<input type="text" style="margin-bottom:15px;" class="form-control somonhoc" name="somonhoc'.$stt.'" data-id="'.$stt.'">';
		$noidung.='</div>';
		$noidung.='<div id="loadsomonhoc'.$stt.'"></div>';
		$noidung.='</div>';

	}
	echo $noidung;
}

public function loadsomon($soluong,$hocky){
	$noidung = '';
	$stt = 0;
	for ($i=0; $i < $soluong; $i++) { 
		$stt++;
		$noidung.='<div class="row">';
		$noidung.='<div class="col-lg-12 col-md-12">';

		$noidung.='<div class="col-lg-5 col-md-5"><input type="text" placeholder="Nhập vào tên môn" class="form-control tenmon" name="tenmonhk'.$hocky.'m'.$stt.'" id="tenmonhk'.$hocky.'m'.$stt.'" data-hk="'.$hocky.'" data-m="'.$stt.'"></div>';

		$noidung.='<div class="col-lg-1 col-md-1" style="padding:0;"><input type="checkbox" class="text-center" name="tghk'.$hocky.'m'.$stt.'" id="tghk'.$hocky.'m'.$stt.'" value="1"> Thỉnh giảng</div>';

		$noidung.='<div class="col-lg-2 col-md-2"> <input type="text" class="form-control text-center" placeholder="Số tính chỉ" name="stchk'.$hocky.'m'.$stt.'" id="stchk'.$hocky.'m'.$stt.'" readonly></div>';

		$noidung.='<div class="col-lg-2 col-md-2"> <input type="text" class="form-control text-center" placeholder="Tiết lý thuyết" name="lthk'.$hocky.'m'.$stt.'" id="lthk'.$hocky.'m'.$stt.'" readonly></div>';

		$noidung.='<div class="col-lg-2 col-md-2"> <input type="text" class="form-control text-center" placeholder="Tiết thực hành" name="thhk'.$hocky.'m'.$stt.'" id="thhk'.$hocky.'m'.$stt.'" readonly ></div>';		

		$noidung.='</div>';
		$noidung.='</div>';
	}
	echo $noidung;
}

public function searchbyname(Request $request){
	
	$Mon = DB::table('ht96_mon')
			->join('ht96_bacdaotao','ht96_mon.id_bacdaotao','=','ht96_bacdaotao.id')
			->where('ht96_mon.ten_vi', 'like', '%' . $request->value . '%')
			->select('ht96_mon.id as id_mon','ht96_mon.ten_vi as ten_mon','ht96_bacdaotao.ten_vi as ten_bac','ht96_mon.stc','ht96_mon.lt','ht96_mon.th')
			->get();
	

    return response()->json($Mon);
}
////////////////////////////////////////////////////////////////////////
public function capnhatmon($chuongtrinh,$mon,$hocky,$thinhgiang){
    $CT_daotao = CT_daotao::where('id_chuongtrinh',$chuongtrinh)->where('id_mon',$mon)
    						->update(['id_hocky' => $hocky,'thinhgiang' => $thinhgiang]);
    echo "Cập nhật thành công";  
   
}

public function themmonmoi($chuongtrinh,$mon,$hocky,$thinhgiang){
	$CT_daotao = new CT_daotao();
	$CT_daotao->id_chuongtrinh = $chuongtrinh;
	$CT_daotao->id_mon = $mon;
	$CT_daotao->id_hocky = $hocky;
	$CT_daotao->thinhgiang = $thinhgiang;
	$CT_daotao->save();	
	echo "Thêm thành công";

}

public function xoamonmoi($chuongtrinh,$mon){
	$CT_daotao =  CT_daotao::where('id_chuongtrinh',$chuongtrinh)->where('id_mon',$mon)->delete();
		echo "Xóa thành công";

}
///////////////////////////////////////////

public function capnhattohop($chuongtrinh,$tohop,$diem){
    $CT_xettuyen = CT_xettuyen::where('id_chuongtrinh',$chuongtrinh)->where('id_tohop',$tohop)
    						->update(['diem' => $diem]);
    echo "Cập nhật thành công";  
   
}

public function themtohopmoi($chuongtrinh,$tohop,$diem){
	$CT_xettuyen = new CT_xettuyen();
	$CT_xettuyen->id_chuongtrinh = $chuongtrinh;
	$CT_xettuyen->id_tohop = $tohop;
	$CT_xettuyen->diem = $diem;
	$CT_xettuyen->save();	
	echo "Thêm thành công";

}


public function xoatohopmoi($chuongtrinh,$tohop){
	$CT_xettuyen =  CT_xettuyen::where('id_chuongtrinh',$chuongtrinh)->where('id_tohop',$tohop)->delete();
		echo "Xóa thành công";

}

public function luumonsotruong($id_mon,$id_giangvien){
	$Monsotruong = new Monsotruong();
	$Monsotruong->id_mon = $id_mon;
	$Monsotruong->id_giangvien = $id_giangvien;
	$Monsotruong->save();
	echo "Thêm Thành công";
}

public function xoamonsotruong($id_mon,$id_giangvien){
	$Monsotruong = Monsotruong::where('id_mon',$id_mon)->where('id_giangvien',$id_giangvien)->delete();
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





}
