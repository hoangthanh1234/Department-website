<?php

namespace App\Http\Controllers\Admin\Khoa;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\DangnhanhRequest;
use App\Http\Requests\TintucRequest;
use App\Http\Controllers\Controller;
use App\Models\Tintuc;
use App\Models\Dm_tintuc;
use App\Models\Bomon;
use Carbon\Carbon;
use DateTime;

class TintucController extends Controller
{
    public function getList(){          
        $Tintuc=Tintuc::orderby('created_at','DESC')->get();
    	return view('Admin.Khoa.Tintuc.List',['Tintuc'=>$Tintuc]);
    }

    public function getAdd(){

    	$Dm_tintuc=Dm_tintuc::all();
        $Bomon=Bomon::all();
    	return view('Admin.Khoa.Tintuc.Add',["Dm_tintuc"=>$Dm_tintuc,'Bomon'=>$Bomon]);
    }

     public function postAdd(TintucRequest $request){
    	$Tintuc =new Tintuc();
        $max=Tintuc::max('id');
    	$Tintuc->stt=$max+1;
    	$Tintuc->hienthi=1;
    	$Tintuc->noibat=0;
    	$Tintuc->ten_vi=$request->ten_vi;
    	$Tintuc->ten_en=$request->ten_en;
    	$Tintuc->tenkhongdau_vi=str_slug($request->ten_vi,"-");
    	$Tintuc->tenkhongdau_en=str_slug($request->ten_en,"-");
        $Tintuc->mota_vi=$request->mota_vi;
        $Tintuc->mota_en=$request->mota_en;
        $Tintuc->noidung_vi=$request->noidung_vi;
        $Tintuc->noidung_en=$request->noidung_en;        
        if($request->hasFile('hinhanh')){
            $file=$request->file('hinhanh');
            $duoi=$file->getClientOriginalExtension();          
             if($duoi!='jpg' && $duoi!='png' && $duoi!='jpeg' && $duoi!='JPG' && $duoi!='PNG' && $duoi!='JPEG'){
                return redirect("set_admin/tintuc/add")->with('thongbao','Chỉ hỗ trợ file png, jpg, jpeg');
             }
            $name=$file->getClientOriginalName();
            $hinh=str_random(4)."_".$name;
            while(file_exists("ht96_image/news/".$hinh)){
                $hinh=str_random(4)."_".$name;
            }
            $file->move("ht96_image/news",$hinh);
            $Tintuc->hinhanh=$hinh;         
        }
        else $Tintuc->hinhanh="noimage.jpg"; 
        $Tintuc->ngay = Carbon::createFromFormat('d/m/Y',$request->ngay)->format("Y/m/d");
        $Tintuc->thanhphan_thamdu_vi = $request->thanhphan_thamdu_vi;
        $Tintuc->thanhphan_thamdu_en = $request->thanhphan_thamdu_en;
        $Tintuc->baihoc_kinhnghiem_vi = $request->baihoc_kinhnghiem_vi;
        $Tintuc->baihoc_kinhnghiem_en = $request->baihoc_kinhnghiem_en;
        $Tintuc->noidung_phoihop_vi = $request->noidung_phoihop_vi;
        $Tintuc->noidung_phoihop_en = $request->noidung_phoihop_en;
        $Tintuc->daumoi_lienhe_vi = $request->daumoi_lienhe_vi;
        $Tintuc->daumoi_lienhe_en = $request->daumoi_lienhe_en;
        $Tintuc->baocao_chuongtrinh_vi = $request->baocao_chuongtrinh_vi;
        $Tintuc->baocao_chuongtrinh_en = $request->baocao_chuongtrinh_en;
        $Tintuc->dat_cauhoi_vi = $request->dat_cauhoi_vi;
        $Tintuc->dat_cauhoi_en = $request->dat_cauhoi_en;
        $Tintuc->vaitro = $request->vaitro;      
    	$Tintuc->title_vi=$request->title_vi;
    	$Tintuc->title_en=$request->title_en;
    	$Tintuc->description_vi=$request->description_vi;
    	$Tintuc->description_en=$request->description_en;
        $Tintuc->id_danhmuc=$request->id_cate;
        $Tintuc->id_bomon=$request->id_bomon;
        $Tintuc->tintuc=$request->loaibv;
    	$Tintuc->created_at=new DateTime();
    	$Tintuc->save();
    	return redirect("set_admin/tintuc/list")->with('thongbao','Thêm thành công');
    }


    public function getEdit($id){
        $Dm_tintuc=Dm_tintuc::all();
        $Bomon=Bomon::all();
        $Tintuc=Tintuc::find($id);
        return view('Admin.Khoa.Tintuc.Edit',['Tintuc'=>$Tintuc,'Bomon'=>$Bomon,"Dm_tintuc"=>$Dm_tintuc]);
    }

     public function postEdit(TintucRequest $request,$id){
        $Tintuc =Tintuc::find($id);        
        $Tintuc->ten_vi=$request->ten_vi;
        $Tintuc->ten_en=$request->ten_en;
        $Tintuc->tenkhongdau_vi=str_slug($request->ten_vi,"-");
        $Tintuc->tenkhongdau_en=str_slug($request->ten_en,"-");
        $Tintuc->mota_vi=$request->mota_vi;
        $Tintuc->mota_en=$request->mota_en;
        $Tintuc->noidung_vi=$request->noidung_vi;
        $Tintuc->noidung_en=$request->noidung_en;
        if($request->hasFile('hinhanh')){
            $file=$request->file('hinhanh');
            $duoi=$file->getClientOriginalExtension();          
             if($duoi!='jpg' && $duoi!='png' && $duoi!='jpeg' && $duoi!='JPG' && $duoi!='PNG' && $duoi!='JPEG'){
                return redirect("set_admin/tintuc/edit/".$id)->with('thongbao','Chỉ hỗ trợ file png, jpg, jpeg');
             }
            $name=explode('.',$file->getClientOriginalName());
            $hinh=str_random(4)."_".str_slug($name[0],'-').'.'.$name[1];
            while(file_exists("ht96_image/news/".$hinh)){
                $hinh=str_random(4)."_".$name;
            }
            $file->move("ht96_image/news",$hinh);
            if($Tintuc->hinhanh!='noimage.jpg' && file_exists("ht96_image/news/".$Tintuc->hinhanh))
                unlink("ht96_image/news/".$Tintuc->hinhanh);
                    
            $Tintuc->hinhanh=$hinh;         
        } 
        $Tintuc->ngay = Carbon::createFromFormat('d/m/Y',$request->ngay)->format("Y/m/d");
        $Tintuc->thanhphan_thamdu_vi = $request->thanhphan_thamdu_vi;
        $Tintuc->thanhphan_thamdu_en = $request->thanhphan_thamdu_en;
        $Tintuc->baihoc_kinhnghiem_vi = $request->baihoc_kinhnghiem_vi;
        $Tintuc->baihoc_kinhnghiem_en = $request->baihoc_kinhnghiem_en;
        $Tintuc->noidung_phoihop_vi = $request->noidung_phoihop_vi;
        $Tintuc->noidung_phoihop_en = $request->noidung_phoihop_en;
        $Tintuc->daumoi_lienhe_vi = $request->daumoi_lienhe_vi;
        $Tintuc->daumoi_lienhe_en = $request->daumoi_lienhe_en;
        $Tintuc->baocao_chuongtrinh_vi = $request->baocao_chuongtrinh_vi;
        $Tintuc->baocao_chuongtrinh_en = $request->baocao_chuongtrinh_en;
        $Tintuc->dat_cauhoi_vi = $request->dat_cauhoi_vi;
        $Tintuc->dat_cauhoi_en = $request->dat_cauhoi_en;
        $Tintuc->vaitro = $request->vaitro;
        $Tintuc->title_vi=$request->title_vi;
        $Tintuc->title_en=$request->title_en;
        $Tintuc->description_vi=$request->description_vi;
        $Tintuc->description_en=$request->description_en;
        $Tintuc->id_danhmuc=$request->id_cate;
        $Tintuc->id_bomon=$request->id_bomon;
        $Tintuc->tintuc=$request->loaibv;
        $Tintuc->updated_at=new DateTime();
        $Tintuc->save();
        return redirect("set_admin/tintuc/edit/".$id)->with('thongbao','Cập nhật thành công');
    }

    public function OneDelete($id){

    	 $Tintuc =Tintuc::find($id);
         if(file_exists("ht96_image/news/".$Tintuc->hinhanh))
         unlink("ht96_image/news/".$Tintuc->hinhanh); 
    	 $Tintuc->delete();
    	 return redirect("set_admin/tintuc/list")->with('thongbao','Xóa thành công');
    }

    public function MultiDelete($id){    	
		$ids = explode(",", $id);
		    for ($i=0; $i <count($ids) ; $i++) { 
		        $Tintuc =Tintuc::find($ids[$i]);
                if(file_exists("ht96_image/news/".$Tintuc->hinhanh)) 
                unlink("ht96_image/news/".$Tintuc->hinhanh); 
    	 		$Tintuc->delete();
		   }		       
		return redirect("set_admin/tintuc/list")->with('thongbao','Xóa thành công'); 
    		
	}

    public function getAddfast(){
        $Dm_tintuc=Dm_tintuc::all();
        $Bomon=Bomon::all();
        return view('Admin.Khoa.Tintuc.Addfast',["Dm_tintuc"=>$Dm_tintuc,'Bomon'=>$Bomon]);
    }

    public function postAddfast(DangnhanhRequest $request){
        $Tintuc =new Tintuc();
        $max=Tintuc::max('id');
        $Tintuc->stt=$max+1;
        $Tintuc->hienthi=0;
        $Tintuc->noibat=0;
        $Tintuc->ten_vi=$request->ten_vi;
        $Tintuc->ten_en=$request->ten_en;
        $Tintuc->tenkhongdau_vi=str_slug($request->ten_vi,"-");
        $Tintuc->tenkhongdau_en=str_slug($request->ten_en,"-");               
        if($request->hasFile('hinhanh')){
            $file=$request->file('hinhanh');
            $duoi=$file->getClientOriginalExtension();          
             if($duoi!='jpg' && $duoi!='png' && $duoi!='jpeg' && $duoi!='JPG' && $duoi!='PNG' && $duoi!='JPEG'){
                return redirect("set_admin/tintuc/add")->with('thongbao','Chỉ hỗ trợ file png, jpg, jpeg');
             }
            $name=$file->getClientOriginalName();
            $hinh=str_random(4)."_".$name;
            while(file_exists("ht96_image/news/".$hinh)){
                $hinh=str_random(4)."_".$name;
            }
            $file->move("ht96_image/news",$hinh);
            $Tintuc->hinhanh=$hinh;         
        }
        else $Tintuc->hinhanh="noimage.jpg"; 
        $Tintuc->ngay = Carbon::createFromFormat('d/m/Y',$request->ngay)->format("Y/m/d");
        $Tintuc->thanhphan_thamdu_vi = $request->thanhphan_thamdu_vi;
        $Tintuc->thanhphan_thamdu_en = $request->thanhphan_thamdu_en;
        $Tintuc->baihoc_kinhnghiem_vi = $request->baihoc_kinhnghiem_vi;
        $Tintuc->baihoc_kinhnghiem_en = $request->baihoc_kinhnghiem_en;
        $Tintuc->noidung_phoihop_vi = $request->noidung_phoihop_vi;
        $Tintuc->noidung_phoihop_en = $request->noidung_phoihop_en;
        $Tintuc->daumoi_lienhe_vi = $request->daumoi_lienhe_vi;
        $Tintuc->daumoi_lienhe_en = $request->daumoi_lienhe_en;
        $Tintuc->baocao_chuongtrinh_vi = $request->baocao_chuongtrinh_vi;
        $Tintuc->baocao_chuongtrinh_en = $request->baocao_chuongtrinh_en;
        $Tintuc->dat_cauhoi_vi = $request->dat_cauhoi_vi;
        $Tintuc->dat_cauhoi_en = $request->dat_cauhoi_en;
        $Tintuc->vaitro = $request->vaitro;
        $Tintuc->title_vi = $request->ten_vi;
        $Tintuc->title_en = $request->ten_en;
        $Tintuc->id_danhmuc=$request->id_cate;
        $Tintuc->id_bomon=$request->id_bomon;
        $Tintuc->tintuc=$request->loaibv;
        $Tintuc->save();
        return redirect("set_admin/tintuc/list")->with('thongbao','Thêm thành công');
    }

}
