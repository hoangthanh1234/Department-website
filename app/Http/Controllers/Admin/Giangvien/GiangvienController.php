<?php

namespace App\Http\Controllers\Admin\Giangvien;
use Session;
use DateTime;
use Carbon\Carbon;
use App\Models\Mon;
use App\Models\HangChucDanh;
use App\Models\BacChucDanh;
use App\Models\Bomon;
use App\Http\Requests;
use App\Models\Chucvu;
use App\Models\Trinhdo;
use App\Models\Giangvien;
use App\Models\Hosokhoahoc;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\GiangvienRequest;

class GiangvienController extends Controller
{
   
    public function getEdit($id){
        $Trinhdo=Trinhdo::all();
        $Chucvu=Chucvu::all();
        $Bomon=Bomon::all();
        $Giangvien=Giangvien::find($id);
        $hangCD=HangChucDanh::all();
        $hangCDGV=HangChucDanh::where('maHangVB',$Giangvien->hangchucdanhnghenghiep)->first();
        if($hangCDGV){
            $bac=BacChucDanh::where('id_chuc_danh',$hangCDGV->id)->get();
        }else{
            $bac=BacChucDanh::where('id_chuc_danh',1)->get();
        }
       
        return view('Admin.Giangvien.Giangvien.Edit',['bacCD'=>$bac,'hangCD'=>$hangCD,'Trinhdo'=>$Trinhdo,'Chucvu'=>$Chucvu,'Bomon'=>$Bomon,'Giangvien'=>$Giangvien]);
    }

    public function postEdit(GiangvienRequest $request,$id){
        $Giangvien=Giangvien::find($id);       
        $Giangvien->maso=$request->maso;
        $Giangvien->ten=$request->ten;
        $Giangvien->tenkhongdau=str_slug($request->ten,"-");
        $Giangvien->gioitinh=$request->gioitinh;
        $Giangvien->ngaysinh=Carbon::createFromFormat('d/m/Y',$request->ngaysinh)->format("Y/m/d");
        $Giangvien->noisinh=$request->noisinh;
        $Giangvien->quequan=$request->quequan;
        $Giangvien->cmnd=$request->socmnd;
        $Giangvien->email=$request->email;
        $Giangvien->dienthoai=$request->dienthoai;
        $Giangvien->dantoc=$request->dantoc;
        $Giangvien->nambonhiemhocvi=$request->nambonhiemhocvi;
        $Giangvien->nuocnhanhocvi=$request->nuocnhanhocvi;
        $Giangvien->diachilienhe=$request->diachilienhe;
        $hangCD=HangChucDanh::find($request->hangchucdanhnghenghiep);
        $Giangvien->hangchucdanhnghenghiep=$hangCD->maHangVB;
        $bac=BacChucDanh::find($request->bac);
        $Giangvien->bac=$bac->maBacVB;
        $Giangvien->hesoluong=$request->hesoluong;
        $Giangvien->linkgooglesite = $request->linkgooglesite;
        $Giangvien->linkgooglescholar = $request->linkgooglescholar;
        if($request->hasFile('hinhanh')){
            $file=$request->file('hinhanh');
            $duoi=$file->getClientOriginalExtension();          
             if($duoi!='jpg' && $duoi!='png' && $duoi!='jpeg'){
                return redirect("set_giangvien/giangvien/edit/".$id)->with('thongbao','Chỉ hỗ trợ file png, jpg, jpeg');
             }
            $name=$file->getClientOriginalName();
            $hinh=str_random(4)."_".$name;
            while(file_exists("ht96_image/giangvien/".$hinh)){
                $hinh=str_random(4)."_".$name;
            }
            $file->move("ht96_image/giangvien",$hinh);
            if($Giangvien->hinhanh!='noimage.jpg' && file_exists("ht96_image/giangvien/".$Giangvien->hinhanh))
            unlink("ht96_image/giangvien/".$Giangvien->hinhanh);
            $Giangvien->hinhanh=$hinh;  
        }
        $Giangvien->id_chucvu=$request->id_chucvu;
        $Giangvien->id_trinhdo=$request->id_trinhdo;
        $Giangvien->id_bomon=$request->id_bomon;
        $Giangvien->save();
        return redirect('set_giangvien/giangvien/edit/'.$id)->with('thongbao','Cập nhật thành công');
    }

    public function getmonsotruong(){
        $Giangvien = Giangvien::find(Session::get('user_id'));
        $Mon = Mon::all();
        $Bomon = Bomon::all();
        return view('Admin.Giangvien.Giangvien.Monsotruong',['Giangvien' => $Giangvien,'Mon' => $Mon,'Bomon' => $Bomon]);
    }


}
