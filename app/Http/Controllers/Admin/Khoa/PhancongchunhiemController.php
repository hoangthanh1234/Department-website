<?php

namespace App\Http\Controllers\Admin\Khoa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bomon;
use App\Models\Phancongchunhiem;
use App\Models\Giangvien;
use App\Models\Lop;
use Excel;

class PhancongchunhiemController extends Controller
{
    public function getList($id){
    	$Bomon = Bomon::all();
    	$Phancongchunhiem = Phancongchunhiem::whereHas('lop',function($query)use($id){
                                    $query->where('id_bomon',$id);                                    
                                })->get();

    	return view('Admin.Khoa.Phancongchunhiem.List',['Phancongchunhiem' => $Phancongchunhiem,'Bomon' => $Bomon,'id_bomon' => $id]);
    }

    public function getAdd(){
    	$Bomon = Bomon::all();    	
    	$Giangvien = Giangvien::all();
    	$Lop = Lop::all();
    	return view('Admin.Khoa.Phancongchunhiem.Add',['Giangvien' => $Giangvien,'Lop' => $Lop,'Bomon' => $Bomon]);
    }

    public function postAdd(Request $request){

        $Phancongchunhiemtest = Phancongchunhiem::where('id_lop',$request->id_lop)->get();
        if(count($Phancongchunhiemtest)>0){
            $Lop = Lop::find($request->id_lop);
            return redirect('set_admin/phan-cong-chu-nhiem/list/'.$Lop->bomon->id)->with('canhbao','Phân công này đã được thêm trước đó vui lòng kiểm tra lại');
        }
        else{
        	$Phancongchunhiem = new Phancongchunhiem();
        	$Phancongchunhiem->id_giangvien = $request->id_giangvien;
        	$Phancongchunhiem->id_lop = $request->id_lop;
        	$Phancongchunhiem->ghichu = $request->ghichu;
        	$Phancongchunhiem->save();
            $Lop = Lop::find($request->id_lop);
            return redirect('set_admin/phan-cong-chu-nhiem/list/'.$Lop->bomon->id)->with('thongbao','Thêm thành công');
        }
    	
    }

    public function getEdit($id){
    	$Phancongchunhiem = Phancongchunhiem::find($id);    	
    	$Giangvien = Giangvien::all();
    	$Lop = Lop::all();
    	return view('Admin.Khoa.Phancongchunhiem.Edit',['Phancongchunhiem' => $Phancongchunhiem,'Giangvien' => $Giangvien,'Lop' => $Lop]);
    }

    public function postEdit($id,Request $request){
    	$Phancongchunhiem = Phancongchunhiem::find($id);
    	$Phancongchunhiem->id_giangvien = $request->id_giangvien;
    	$Phancongchunhiem->id_lop = $request->id_lop;
    	$Phancongchunhiem->ghichu = $request->ghichu;
    	$Phancongchunhiem->save();
    	return redirect('set_admin/phan-cong-chu-nhiem/edit/'.$id)->with('thongbao','Cập nhật thành công');
    }

    public function one_delete($id){
    	$Phancongchunhiem = Phancongchunhiem::find($id);
    	$bomon = $Phancongchunhiem->giangvien->id_bomon;
    	$Phancongchunhiem->delete();
    	return redirect('set_admin/phan-cong-chu-nhiem/list/'.$bomon)->with('thongbao','Xóa thành công');
    }

    public function export($id_bomon){
        $Bomon = Bomon::find($id_bomon);
        $Phancongchunhiem = Phancongchunhiem::whereHas('lop',function($query)use($id_bomon){
            $query->where('id_bomon',$id_bomon);
        })->get();

Excel::create('Phancongchunhiem-'.$Bomon->ten_vi, function($excel) use($Phancongchunhiem){
      $excel->sheet('Danh sách phân công chủ nhiệm', function($sheet) use($Phancongchunhiem){
      $sheet->setFontFamily('Times New Roman');       
      $sheet->loadView('Admin.Khoa.Excel.Phancongchunhiem',['Phancongchunhiem' => $Phancongchunhiem]);
      })->export('xlsx');

  });


    }
}
