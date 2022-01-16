<?php

namespace App\Http\Controllers\Admin\Bomon;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\GiangvienRequest;
use App\Http\Controllers\Controller;
use App\Models\Giangvien;
use App\Models\Bomon;
use App\Models\Chucvu;
use App\Models\Trinhdo;
use App\Models\Hosokhoahoc;
use DateTime;
use Session;

class GiangvienController extends Controller
{
    public function getList($id){

        if($id!=Session::get('user_department'))die('bạn không có quyền truy cặp liên kết này');
    	$Giangvien=Giangvien::where('id_bomon',$id)->orderby('stt')->get();
    	return view('Admin.Bomon.Giangvien.List',['Giangvien'=>$Giangvien]);

    }

    public function getAdd(){

    	$Trinhdo=Trinhdo::all();
    	$Chucvu=Chucvu::all();
    	$Bomon=Bomon::all();
    	return view('Admin.Bomon.Giangvien.Add',['Trinhdo'=>$Trinhdo,'Chucvu'=>$Chucvu,'Bomon'=>$Bomon]);
    }

    public function postAdd(GiangvienRequest $request){
    	$Giangvien= new Giangvien();
    	$Giangvien->stt=1;
    	$Giangvien->maso=$request->maso;
    	$Giangvien->ten=$request->ten;
        $Giangvien->tenkhongdau=str_slug($request->ten,"-");
    	$Giangvien->gioitinh=$request->gioitinh;
    	$Giangvien->ngaysinh=date('Y/m/d', strtotime($request->ngaysinh));
        $Giangvien->noisinh=$request->noisinh;
        $Giangvien->quequan=$request->quequan;
    	$Giangvien->cmnd=$request->socmnd;
    	$Giangvien->email=$request->email;
    	$Giangvien->dienthoai=$request->dienthoai;
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

        $max=Giangvien::max('id'); 
        $Hosokhoahoc=new Hosokhoahoc();
        $Hosokhoahoc->id_giangvien=$max;
        $Hosokhoahoc->save();

    	return redirect('set_admin/giangvien/list');

    }

    public function getEdit($id){
        $Trinhdo=Trinhdo::all();
        $Chucvu=Chucvu::all();
        $Bomon=Bomon::all();
        $Giangvien=Giangvien::find($id);
        if($Giangvien->id_bomon!=Session::get('user_department'))die('Bạn không có quyền truy cặp liên kêt này');
        return view('Admin.Bomon.Giangvien.Edit',['Trinhdo'=>$Trinhdo,'Chucvu'=>$Chucvu,'Bomon'=>$Bomon,'Giangvien'=>$Giangvien]);
    }

    public function postEdit(GiangvienRequest $request,$id){
        $Giangvien=Giangvien::find($id);       
        $Giangvien->maso=$request->maso;
        $Giangvien->ten=$request->ten;
        $Giangvien->tenkhongdau=str_slug($request->ten,"-");
        $Giangvien->gioitinh=$request->gioitinh;
        $Giangvien->ngaysinh=date('Y/m/d', strtotime($request->ngaysinh));
        $Giangvien->noisinh=$request->noisinh;
        $Giangvien->quequan=$request->quequan;
        $Giangvien->cmnd=$request->socmnd;
        $Giangvien->email=$request->email;
        $Giangvien->dienthoai=$request->dienthoai;
        if($request->hasFile('hinhanh')){
            $file=$request->file('hinhanh');
            $duoi=$file->getClientOriginalExtension();          
             if($duoi!='jpg' && $duoi!='png' && $duoi!='jpeg'){
                return redirect("set_admin/giangvien/add")->with('thongbao','Chỉ hỗ trợ file png, jpg, jpeg');
             }
            $name=$file->getClientOriginalName();
            $hinh=str_random(4)."_".$name;
            while(file_exists("ht96_image/giangvien/".$hinh)){
                $hinh=str_random(4)."_".$name;
            }
            $file->move("ht96_image/giangvien",$hinh);
            if($request->hinhanh!='noimage.jpg')
            unlink("ht96_image/giangvien/".$Giangvien->hinhanh);
            $Giangvien->hinhanh=$hinh;     

        }
        $Giangvien->id_chucvu=$request->id_chucvu;
        $Giangvien->id_trinhdo=$request->id_trinhdo;
        $Giangvien->id_bomon=$request->id_bomon;
        $Giangvien->save();
        return redirect('set_admin/giangvien/edit/'.$id)->with('thongbao','Sửa thành công');
    }

     public function OneDelete($id){
         $Giangvien =Giangvien::find($id);
         if($Giangvien->hinhanh!="noimage.jpg")
         unlink("ht96_image/giangvien/".$Giangvien->hinhanh);
         $Giangvien->delete();
         return redirect("set_admin/giangvien/list")->with('thongbao','Xóa thành công');
    }

    public function MultiDelete($id){
        
                $ids = explode(",", $id);
                for ($i=0; $i <count($ids) ; $i++) { 
                     $Giangvien =Giangvien::find($ids[$i]);
                     if($Giangvien->hinhanh!="noimage.jpg")
                     unlink("ht96_image/giangvien/".$Giangvien->hinhanh);
                     $Giangvien->delete();
                }              
                return redirect("set_admin/giangvien/list")->with('thongbao','Xóa thành công'); 
            

    }
}
