<?php

namespace App\Http\Controllers\Admin\Giangvien;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Models\Phancongchunhiem;
use App\Models\CT_tuchon;
use App\Models\Lop;
use App\Models\Mon;
use App\Models\Hocky;

class CTtuchonController extends Controller{
    
    public function getDanhsachlop(){

    	$Phancongchunhiem = Phancongchunhiem::where('id_giangvien',Session::get('user_id'))
    										  ->whereHas('lop',function($query){
                                    				$query->where('totnghiep',0);
                               				 })->get();

		return view('Admin.Giangvien.CTtuchon.Danhsachlop',['Phancongchunhiem' => $Phancongchunhiem]);
    }

    public function getDanhsachchitiet($id_lop){    	

    	$Phancongchunhiem = Phancongchunhiem::where('id_lop',$id_lop)->where('id_giangvien',Session::get('user_id'))->get();

    	if(count($Phancongchunhiem)>0){
    		$CT_tuchon = CT_tuchon::where('id_lop',$id_lop)->orderby('id_hocky')->get();
    		return view('Admin.Giangvien.CTtuchon.Danhsachchitiet',['CT_tuchon' => $CT_tuchon,'id_lop' => $id_lop]);
    	}
        else
    		return redirect('set_giangvien/dinh-huong-tu-chon/danh-sach-lop')->with('canhbao','Vui lòng kiểm tra lại');
    	
    }

    public function getAdd($id){

        $Phancongchunhiem = Phancongchunhiem::where('id_lop',$id)->where('id_giangvien',Session::get('user_id'))->get();

        if(count($Phancongchunhiem)>0){
            $Lop = Lop::find($id);          
            $Mon = Mon::where('tuchon',1)->get();
            $Hocky = Hocky::all();
            return view('Admin.Giangvien.CTtuchon.Add',['Lop' => $Lop,'Mon' => $Mon,'Hocky' => $Hocky]);
        }
        else
            return redirect('set_giangvien/dinh-huong-tu-chon/danh-sach-chi-tiet/'.$id)->with('canhbao','Vui lòng kiểm tra lại trước khi thực hiện');

    	
    }

    public function postAdd($id,Request $request){
    	$CT_tuchon = new CT_tuchon();
    	$CT_tuchon->id_lop = $id;
    	$CT_tuchon->id_mon = $request->id_mon;
    	$CT_tuchon->id_hocky = $request->id_hocky;
    	$CT_tuchon->save();
    	return redirect('set_giangvien/dinh-huong-tu-chon/danh-sach-chi-tiet/'.$id)->with('thongbao','Thêm thành công');
    }

    public function getEdit($id){
        $CT_tuchon = CT_tuchon::find($id);
        $Lop = Lop::find($CT_tuchon->id_lop);       
        $Mon = Mon::where('tuchon',1)->get();
        $Hocky = Hocky::all();
        return view('Admin.Giangvien.CTtuchon.Edit',['Lop' => $Lop,'Mon' => $Mon,'Hocky' => $Hocky,'CT_tuchon' => $CT_tuchon]);
    }

    public function postEdit($id,Request $request){
        $CT_tuchon = CT_tuchon::find($id);        
        $CT_tuchon->id_mon = $request->id_mon;
        $CT_tuchon->id_hocky = $request->id_hocky;
        $CT_tuchon->save();
        return redirect('set_giangvien/dinh-huong-tu-chon/cap-nhat-chi-tiet/'.$id)->with('thongbao','Cập nhật thành công');
    }

    public function getXoa($id){
        $CT_tuchon = CT_tuchon::find($id);
        $id_lop = $CT_tuchon->id_lop;
        $CT_tuchon->delete();
        return redirect('set_giangvien/dinh-huong-tu-chon/danh-sach-chi-tiet/'.$id_lop)->with('thongbao','Xóa thành công');
    }
	
}
