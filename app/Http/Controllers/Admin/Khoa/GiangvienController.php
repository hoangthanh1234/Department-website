<?php

namespace App\Http\Controllers\Admin\Khoa;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\GiangvienRequest;
use App\Http\Controllers\Controller;
use App\Models\Giangvien;
use App\Models\Bomon;
use App\Models\Chucvu;
use App\Models\Trinhdo;
use App\Models\Monsotruong;
use App\Models\Mon;
use Carbon\Carbon;
use DateTime;

class GiangvienController extends Controller
{
    public function getList($id){

    	$Giangvien=Giangvien::where('id_bomon',$id)->orderby('stt')->get();
        $Bomon=Bomon::all();
    	return view('Admin.Khoa.Giangvien.List',['Giangvien'=>$Giangvien,'Bomon'=>$Bomon]);

    }

    public function getAdd(){

    	$Trinhdo=Trinhdo::all();
    	$Chucvu=Chucvu::all();
    	$Bomon=Bomon::all();
    	return view('Admin.Khoa.Giangvien.Add',['Trinhdo'=>$Trinhdo,'Chucvu'=>$Chucvu,'Bomon'=>$Bomon]);
    }

    public function postAdd(GiangvienRequest $request){
    	$Giangvien= new Giangvien();
        $max=Giangvien::max('id');
    	$Giangvien->stt=$max+1;
    	$Giangvien->maso=$request->maso;
    	$Giangvien->ten=$request->ten;
        $Giangvien->tenkhongdau=str_slug($request->ten,"-");
    	$Giangvien->gioitinh=$request->gioitinh;
    	$Giangvien->ngaysinh= Carbon::createFromFormat('d/m/Y',$request->ngaysinh)->format("Y/m/d");
        $Giangvien->noisinh=$request->noisinh;
        $Giangvien->quequan=$request->quequan;
    	$Giangvien->cmnd=$request->socmnd;
    	$Giangvien->email=$request->email;
    	$Giangvien->dienthoai=$request->dienthoai;
        $Giangvien->dantoc=$request->dantoc;
        $Giangvien->nambonhiemhocvi=$request->nambonhiemhocvi;
        $Giangvien->nuocnhanhocvi=$request->nuocnhanhocvi;
        $Giangvien->diachilienhe=$request->diachilienhe;
        $Giangvien->linkgooglesite = $request->linkgooglesite;
        $Giangvien->linkgooglescholar = $request->linkgooglescholar;
        $Giangvien->trangthai = $request->trangthai;
    	if($request->hasFile('hinhanh')){
    		$file=$request->file('hinhanh');
    		$duoi=$file->getClientOriginalExtension();
    	 	 if($duoi!='jpg' && $duoi!='png' && $duoi!='jpeg' && $duoi!='JPG' && $duoi!='PNG' && $duoi!='JPEG'){
    		 	return redirect("set_admin/giangvien/add")->with('thongbao','Chỉ hỗ trợ file png, jpg, jpeg');
    	 	 }
    		$name=$file->getClientOriginalName();
    		$hinh=str_random(4)."_".$name;
    		while(file_exists("ht96_image/giangvien/".$hinh)){
    			$hinh=str_random(4)."_".$name;
    		}
    		$file->move("ht96_image/giangvien",$hinh);
    		$Giangvien->hinhanh=$hinh;
    	}
    	else $Giangvien->hinhanh="noimage.jpg";
    	$Giangvien->id_chucvu=$request->id_chucvu;
    	$Giangvien->id_trinhdo=$request->id_trinhdo;
    	$Giangvien->id_bomon=$request->id_bomon;
    	$Giangvien->save();




    	return redirect('set_admin/giangvien/list/'.$request->id_bomon)->with('thongbao','Thêm thành công');

    }

    public function getEdit($id){
        $Trinhdo=Trinhdo::all();
        $Chucvu=Chucvu::all();
        $Bomon=Bomon::all();
        $Giangvien=Giangvien::find($id);
        return view('Admin.Khoa.Giangvien.Edit',['Trinhdo'=>$Trinhdo,'Chucvu'=>$Chucvu,'Bomon'=>$Bomon,'Giangvien'=>$Giangvien]);
    }

    public function postEdit(GiangvienRequest $request,$id){
        $Giangvien=Giangvien::find($id);
        $Giangvien->maso=$request->maso;
        $Giangvien->ten=$request->ten;
        $Giangvien->tenkhongdau=str_slug($request->ten,"-");
        $Giangvien->gioitinh=$request->gioitinh;
        $Giangvien->ngaysinh= Carbon::createFromFormat('d/m/Y',$request->ngaysinh)->format("Y/m/d");
        $Giangvien->noisinh=$request->noisinh;
        $Giangvien->quequan=$request->quequan;
        $Giangvien->cmnd=$request->socmnd;
        $Giangvien->email=$request->email;
        $Giangvien->dienthoai=$request->dienthoai;
        $Giangvien->dantoc=$request->dantoc;
        $Giangvien->nambonhiemhocvi=$request->nambonhiemhocvi;
        $Giangvien->nuocnhanhocvi=$request->nuocnhanhocvi;
        $Giangvien->diachilienhe=$request->diachilienhe;
        $Giangvien->linkgooglesite = $request->linkgooglesite;
        $Giangvien->linkgooglescholar = $request->linkgooglescholar;
        $Giangvien->trangthai = $request->trangthai;
        if($request->hasFile('hinhanh')){
            $file=$request->file('hinhanh');
            $duoi=$file->getClientOriginalExtension();
             if($duoi!='jpg' && $duoi!='png' && $duoi!='jpeg' && $duoi!='JPG' && $duoi!='PNG' && $duoi!='JPEG'){
                return redirect("set_admin/giangvien/add")->with('thongbao','Chỉ hỗ trợ file png, jpg, jpeg');
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
        return redirect('set_admin/giangvien/edit/'.$id)->with('thongbao','Cập nhật thành công');
    }

     public function OneDelete($id){
         $Giangvien =Giangvien::find($id);
         if($Giangvien->hinhanh!="noimage.jpg" && file_exists("ht96_image/giangvien/".$Giangvien->hinhanh))
          // if(file_exists("ht96_image/chuongtrinh/".$Chuongtrinh->hinhanh))
         unlink("ht96_image/giangvien/".$Giangvien->hinhanh);
         $Giangvien->delete();
         return redirect("set_admin/giangvien/list/".$Giangvien->id_bomon)->with('thongbao','Xóa thành công');
    }

    public function MultiDelete($id){
                $bm=0;
                $ids = explode(",", $id);
                for ($i=0; $i <count($ids) ; $i++) {
                     $Giangvien =Giangvien::find($ids[$i]);
                     if($Giangvien->hinhanh!="noimage.jpg" && file_exists("ht96_image/giangvien/".$Giangvien->hinhanh))
                     unlink("ht96_image/giangvien/".$Giangvien->hinhanh);
                     $Giangvien->delete();
                     $bm=$Giangvien->id_bomon;
                }
                return redirect("set_admin/giangvien/list/".$bm)->with('thongbao','Xóa thành công');

    }

    public function getmonsotruong($id_giangvien){
        $Monsotruong = Monsotruong::where('id_giangvien',$id_giangvien)->get();
        $Mon = Mon::all();
        $Bomon = Bomon::all();
        return view('Admin.Khoa.Giangvien.Monsotruong',['Monsotruong' => $Monsotruong,'Mon' => $Mon,'id_giangvien' => $id_giangvien,'Bomon' => $Bomon]);
    }
}
