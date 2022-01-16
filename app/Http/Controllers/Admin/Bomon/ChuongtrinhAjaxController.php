<?php

namespace App\Http\Controllers\Admin\Bomon;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Mon;
use App\Models\CT_daotao;
use App\Models\CT_xettuyen;
use App\Models\Monsotruong;
use DB;

class ChuongtrinhAjaxController extends Controller
{
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
