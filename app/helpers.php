<?php
use App\Models\Baibaokhoahoc;
use App\Models\Detainghiencuu;
use App\Models\Nhomnc;

function getUserFullName($id) {
	$name = "thanh";

    return $name;
}

 function baibao($gv){
    $Baibao = Baibaokhoahoc::whereHas('ct_baibao',function($query)use($gv){
            $query->where('id_giangvien',$gv);
    })->orderby('nam','DESC')->get();
    return $Baibao;
}
 function detai($gv){
    $Detai = Detainghiencuu::whereHas('ct_detai',function($query)use($gv){
            $query->where('id_giangvien',$gv);
    })->orderby('ngaybatdau','DESC')->get();
    
    return $Detai;
}

function detaicaptruong($gv,$id1,$id2){
    $Detai = Detainghiencuu::whereHas('ct_detai',function($query)use($gv){
            $query->where('id_giangvien',$gv);
    })->whereIn('id_capdetai',[$id1,$id2])->orderby('ngaybatdau','DESC')->get();
    
    return $Detai;
}

function nhomnc($gv){
    $Nhomnc = Nhomnc::whereHas('ct_nhom',function($query)use($gv){
        $query->where('id_giangvien',$gv);
    })->orderby('ten_vi')->get();

    return $Nhomnc;
}