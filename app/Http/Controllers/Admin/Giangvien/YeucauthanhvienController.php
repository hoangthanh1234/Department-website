<?php

namespace App\Http\Controllers\Admin\Giangvien;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Detainghiencuu;
use App\Models\Yeucauthanhvien;
use App\Models\Chuyennganh;

class YeucauthanhvienController extends Controller{
    
    public function getList($id){
    	$Yeucauthanhvien = Yeucauthanhvien::where('id_detai',$id)->get();
    	$Detainghiencuu = Detainghiencuu::find($id);
    	return view('Admin.Giangvien.Yeucauthanhvien.List',['Yeucauthanhvien' => $Yeucauthanhvien,'Detainghiencuu' => $Detainghiencuu]);
    }

    public function getAdd($id){
    	$Chuyennganh = Chuyennganh::all();
    	return view('Admin.Giangvien.Yeucauthanhvien.Add',['Chuyennganh' => $Chuyennganh,'id' => $id]);
    }

    public function postAdd(Request $request,$id){
    	$Yeucauthanhvien = new Yeucauthanhvien();
    	$Yeucauthanhvien->soluong = $request->soluong;
    	$Yeucauthanhvien->id_chuyennganh = $request->id_chuyennganh;
    	$Yeucauthanhvien->ghichu = $request->ghichu;
    	$Yeucauthanhvien->id_detai = $id;
    	$Yeucauthanhvien->save();
    	return redirect('set_giangvien/yeu-cau-thanh-vien/list/'.$id)->with('thongbao','Thêm thành công');;
    }

    public function getEdit($id){
    	$Yeucauthanhvien = Yeucauthanhvien::find($id);
    	$Chuyennganh = Chuyennganh::all();
    	return view('Admin.Giangvien.Yeucauthanhvien.Edit',['Chuyennganh' => $Chuyennganh,'Yeucauthanhvien' => $Yeucauthanhvien]);
    
    }

    public function postEdit(Request $request,$id){
    	$Yeucauthanhvien = Yeucauthanhvien::find($id);
    	$Yeucauthanhvien->soluong = $request->soluong;
    	$Yeucauthanhvien->id_chuyennganh = $request->id_chuyennganh;
    	$Yeucauthanhvien->ghichu = $request->ghichu;
    	$Yeucauthanhvien->save();
    	return redirect('set_giangvien/yeu-cau-thanh-vien/edit/'.$id)->with('thongbao','Cập nhật thành công');
    }

    public function getxoa($id){
    	$Yeucauthanhvien = Yeucauthanhvien::find($id);
    	$id_detai = $Yeucauthanhvien->id_detai;
    	$Yeucauthanhvien->delete();
    	return redirect('set_giangvien/yeu-cau-thanh-vien/list/'.$id_detai)->with('thongbao','Xóa thành công');;
    }
}
