<?php

namespace App\Http\Controllers\Admin\Khoa\Excel;

use Illuminate\Http\Request;
use App\Http\Requests\AjaxRequest;
use App\Http\Controllers\Controller;
use App\Models\Sinhvien;
use App\Models\Cuusinhvien;
use Excel;
use Carbon\Carbon;
use DateTime;

class Importsinhvien extends Controller
{
    public function importsinhvien(AjaxRequest $request){
    		
    		if($request->hasFile('file')){

				$extension = $request->file('file')->getClientOriginalExtension(); 

				if($extension=='xlsx' || $extension=='xlsm' || $extension=='xls'){

				            $path = $request->file('file')->getRealPath();
				            $data = Excel::load($path)->get();
				          	
				             if($data->count()){

				                 foreach ($data as $key => $value) {

				                     $arr[] = [                    	
				                     	'stt' => $value->stt, 
				                    	'totnghiep' => $value->totnghiep,
				                    	'ma' => $value->mssv,
				                     	'ten' => $value->ten,
				                     	'gioitinh' => $value->gioitinh,
				                     	'ngaysinh' => $value->ngaysinh,
				                     	'noisinh' => $value->noisinh,
				                     	'diachi' => $value->diachi,
				                     	'email' => $value->email,
				                     	'dienthoai' => $value->dienthoai,
				                     	'id_lop' => $request->id_lop,                    	
				                     ];
				                 }

				                 if(!empty($arr)){

				                     foreach ($arr as $key) {
				                     	$sv=new Sinhvien();
				                     	$sv->stt=$key['stt'];
				                     	$sv->totnghiep=$key['totnghiep'];
				                     	$sv->masinhvien=$key['ma'];
				                     	$sv->tensinhvien=$key['ten'];
				                     	$sv->gioitinh=$key['gioitinh'];
				                     	$sv->ngaysinh=Carbon::createFromFormat('d/m/Y',$key['ngaysinh'])->format("Y/m/d");
				                     	$sv->noisinh=$key['noisinh'];
				                     	$sv->diachi=$key['diachi'];
				                     	$sv->email=$key['email'];
				                    	$sv->dienthoai=$key['dienthoai'];
				                     	$sv->id_lop=$key['id_lop'];
				                     	$sv->save();
				                     	$max=Sinhvien::max('id'); 
								    	$Cuusinhvien=new Cuusinhvien();
								    	$Cuusinhvien->id_sinhvien=$max;
								        $Cuusinhvien->hinhanh='noimage.jpg';        
								    	$Cuusinhvien->save();
				                     }

				                     echo ('Thêm sinh viên thành công.');

				                 }			              

							}
				}else echo "Chỉ hỗ trợ file excel";

         }
        else
        	echo "Vui lòng chọn file";
    }

}


