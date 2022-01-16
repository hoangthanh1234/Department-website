<?php

namespace App\Http\Controllers\Admin\Giangvien;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Nhomnc;
use App\Models\CT_nhomnc;
use App\Models\Nhiemvunc;
use App\Models\Linhvucnc;
use App\Models\Giangvien;
use App\Models\Baocaonc;
use App\Models\Loaiphongnc;
use App\Models\Phongnc;
use App\Models\Phancongbaocaonc;
use Session;
use Carbon\Carbon;
use Mail;

class NhomnghiencuuController extends Controller{
    
    public function getdangkynhom(){
    	$Nhiemvu = Nhiemvunc::orderby('ten_vi')->get();
    	$Linhvuc = Linhvucnc::orderby('ten_vi')->get();
    	return view('Admin.Giangvien.Nhomnghiencuu.Dangky',['Nhiemvu' => $Nhiemvu,'Linhvuc' => $Linhvuc]);
    }

    public function postdangkynhom(Request $request){
    	$Nhomnc = new Nhomnc();
    	$Nhomnc->ten_vi = $request->ten_vi;
    	$Nhomnc->ten_en = $request->ten_en;
        $Nhomnc->tenkhongdau_vi=str_slug($request->ten_vi,'-');
        $Nhomnc->tenkhongdau_en=str_slug($request->ten_en,'-');
    	$Nhomnc->mota_vi = $request->mota_vi;
    	$Nhomnc->mota_en = $request->mota_en;
    	$Nhomnc->trangthai = 0;
    	$Giangvien = Giangvien::find(Session::get('user_id'));
    	$Nhomnc->id_bomon = $Giangvien->id_bomon;
    	$Nhomnc->id_linhvuc = $request->id_linhvuc;
    	$Nhomnc->save();

    	$CT_nhomnc = new CT_nhomnc();
    	$CT_nhomnc->id_nhom = Nhomnc::max('id');
    	$CT_nhomnc->id_giangvien = Session::get('user_id');
    	$CT_nhomnc->id_nhiemvu = 1;
    	$CT_nhomnc->save();

    	 Mail::send('Email.Nhomnghiencuu.Dangkynhomtoiadmin', array('tennhom'=>$request->ten_vi,'Giangvien'=>$Giangvien),function($message){
    	 	$message->from('ktcn@tvu.edu.vn',"Khoa Kỹ thuật và Công nghệ");
            $message->to('thanhtctv6@gmail.com')->subject('Thông báo đăng ký nhóm nghiên cứu');    
        });

    	return redirect('set_giangvien')->with('thongbao','Yêu cầu đăng ký nhóm nghiên cứu của bạn đã được gởi đến Ban quản trị, Bạn sẽ có thể thêm thành viên khi yêu cầu được duyệt. Xin cảm ơn!!!');
    }

    public function danhsachnhom(){
    	$CT_nhom = CT_nhomnc::where('id_giangvien',Session::get('user_id'))->wherehas('nhom',function($query){
    		$query->where('trangthai','<>',0);
            $query->where('trangthai','<>',2);
    	})->get();
    	return view('Admin.Giangvien.Nhomnghiencuu.List',['CT_nhom' => $CT_nhom]);
    }


    public function getthemthanhvien($id_nhom){
    	$Nhiemvu = Nhiemvunc::where('id','<>',1)->orderby('ten_vi')->get();
    	$Giangvien = Giangvien::orderby('id_bomon')->get();
    	return view('Admin.Giangvien.Nhomnghiencuu.Themthanhvien',['Nhiemvu' => $Nhiemvu,'Giangvien'=>$Giangvien,'id_nhom' => $id_nhom]);
    }

    public function postthemthanhvien(Request $request,$id_nhom){
    	$CT_nhomtest = CT_nhomnc::where('id_giangvien',$request->id_giangvien)->get();
    	if(count($CT_nhomtest) > 0)
    		return redirect('set_giangvien/nhom-nghien-cuu/them-thanh-vien/'.$id_nhom)->with('thongbao','Giảng viên này đã là thành viên của nhóm');
    	else{
    		$CT_nhom = new CT_nhomnc();
    		$CT_nhom->id_nhom = $id_nhom;
    		$CT_nhom->id_giangvien = $request->id_giangvien;
    		$CT_nhom->id_nhiemvu = $request->id_nhiemvu;
    		$CT_nhom->save();

            $Giangvien = Giangvien::find($request->id_giangvien);
            $Nhom = Nhomnc::find($id_nhom);            
            Mail::send('Email.Nhomnghiencuu.Thongbaothemthanhvien', array('Giangvien'=>$Giangvien,'Nhom'=>$Nhom),function($message)use($Giangvien){
                $message->from('ktcn@tvu.edu.vn',"Khoa Kỹ thuật và Công nghệ");
                $message->to($Giangvien->email)->subject('Thông báo thêm thành viên');    
            });

    		return redirect('set_giangvien/nhom-nghien-cuu/danh-sach-thanh-vien/'.$id_nhom)->with('thongbao','Thêm thành công');
    	}  
    }

    public function danhsachthanhvien($id_nhom){
    	$CT_nhom = CT_nhomnc::where('id_nhom',$id_nhom)->get();
    	$Nhom = Nhomnc::find($id_nhom);
    	return view('Admin.Giangvien.Nhomnghiencuu.Danhsachthanhvien',['CT_nhom' => $CT_nhom,'Nhom' => $Nhom]);
    }

    public function xoanhom($id_nhom){
    	$Nhom = Nhomnc::find($id_nhom)->first();
    	$Nhom->trangthai = 2;
        $Nhom->save();
    	return redirect('set_giangvien/nhom-nghien-cuu/danh-sach-nhom');
    }

    public function roinhom($id_nhom){
    	$CT_nhom = CT_nhomnc::where('id_giangvien',Session::get('user_id'))->where('id_nhom',$id_nhom)->first();
        $CT_nhom->trangthai = 0;
        $CT_nhom->save();

        $Giangvien = Giangvien::find(Session::get('user_id'));
        $Nhom = Nhomnc::find($id_nhom);
        $Truong = $Nhom->truongnhom;
        $Truongnhom = $Truong[0];          

        Mail::send('Email.Nhomnghiencuu.Thongbaoroinhom', array('Giangvien'=>$Giangvien,'Nhom'=> $Nhom,'Truongnhom' => $Truongnhom),function($message)use($Truongnhom){
            $message->from('ktcn@tvu.edu.vn',"Khoa Kỹ thuật và Công nghệ");
            $message->to($Truongnhom->giangvien->email)->subject('Thông báo rời nhóm');    
        });

    	return redirect('set_giangvien/nhom-nghien-cuu/danh-sach-nhom');
    }

    public function kichnhom($id_nhom,$id_giangvien){

    	$CT_nhom = CT_nhomnc::where('id_giangvien',$id_giangvien)->where('id_nhom',$id_nhom)->first();        
        $CT_nhom->trangthai = 0;            
        $CT_nhom->save();

        $Giangvien = Giangvien::find($id_giangvien);
        $Nhom = Nhomnc::find($id_nhom);

        Mail::send('Email.Nhomnghiencuu.Thongbaokichnhom', array('Giangvien'=>$Giangvien,'Nhom' => $Nhom),function($message)use($Giangvien){
            $message->from('ktcn@tvu.edu.vn',"Khoa Kỹ thuật và Công nghệ");
            $message->to($Giangvien->email)->subject('Thông báo kích nhóm');    
        });

    	return redirect('set_giangvien/nhom-nghien-cuu/danh-sach-thanh-vien/'.$id_nhom);
    }

    public function xoabaocao($id){
        $Baocao = Baocaonc::find($id);
        $id_nhom = $Baocao->ct_nhom->id_nhom;
        foreach ($Baocao->Phancongbaocao as $pcbc)
            $pcbc->delete();
        $Baocao->delete();
        return redirect('set_giangvien/nhom-nghien-cuu/danh-sach-bai-bao-cao/'.$id_nhom)->with('thongbao','Đã xóa báo cáo và các phân công báo cáo liên quan');
    }

    public function getdangkybaocao($id){
        return view('Admin.Giangvien.Nhomnghiencuu.Dangkybaocao',['id_nhom' => $id]);
    }

    public function postdangkybaocao(Request $request,$id_nhom){

        $CT_nhom = CT_nhomnc::where('id_giangvien',Session::get('user_id'))->where('id_nhom',$id_nhom)->first();
        $Baocao = new Baocaonc();
        $Baocao->ten_vi = $request->ten_vi;
        $Baocao->ten_en = $request->ten_en;
        $Baocao->tenkhongdau_vi=str_slug($request->ten_vi,'-');
        $Baocao->tenkhongdau_en=str_slug($request->ten_en,'-');
        $Baocao->mota_vi = $request->mota_vi;
        $Baocao->mota_en = $request->mota_en;
        $Baocao->trangthai = 0;
        $Baocao->id_ct_nhom = $CT_nhom->id;
        $Baocao->save();

        $Nhom = Nhomnc::find($CT_nhom->id_nhom);
        $Truong = $Nhom->truongnhom;
        $Truongnhom = $Truong[0];

        Mail::send('Email.Nhomnghiencuu.Dangkybaocaotoiadmin', array('CT_nhom'=>$CT_nhom,'tenbaocao'=>$request->ten_vi,'Truongnhom' => $Truongnhom),function($message)use($Truongnhom){
            $message->from('ktcn@tvu.edu.vn',"Khoa Kỹ thuật và Công nghệ");
            $message->to($Truongnhom->giangvien->email)->subject('Thông báo đăng ký báo cáo');    
        });
        return redirect('set_giangvien/nhom-nghien-cuu/danh-sach-nhom')->with('thongbao','Bạn đã đang ký báo cáo đề tài '.$request->ten_vi.' thành công hệ thống sẽ sắp lịch và thông báo lại qua email. Vui lòng kiểm tra email thường xuyên.');
     }


     public function getdanhsachbaibaocao($id){

        $Baocao = Baocaonc::wherehas('ct_nhom',function($query)use($id){
            $query->where('id_nhom',$id);            
        })->orderby('trangthai')->orderby('created_at')->get();

        $Nhom = Nhomnc::find($id);

        return view('Admin.Giangvien.Nhomnghiencuu.Danhsachbaibaocao',['Baocao' => $Baocao,'Nhom' => $Nhom]);
     }

     public function getsaplich($id){
        $Phong = Phongnc::orderby('ma','DESC')->get();
        $Phancongbaocao = Phancongbaocaonc::all();
        $Baocao = Baocaonc::find($id);
        $Loaiphong = Loaiphongnc::all();
        return view('Admin.Giangvien.Nhomnghiencuu.Saplich',['Phong' => $Phong,'Phancongbaocao' => $Phancongbaocao,'Baocao' => $Baocao,'Loaiphong' => $Loaiphong]);
     }

     public function postsaplich($id,Request $request){
        if($request->id_phong == 0)
            return redirect('set_giangvien/nhom-nghien-cuu/sap-lich/'.$id)->with('canhbao','Vui lòng chọn phòng phù hợp có lẽ phòng bạn vừa chọn đã được người khác đăng ký');

        $Phancongbaocao = new Phancongbaocaonc();
        $Phancongbaocao->ngaybaocao=Carbon::createFromFormat('d/m/Y',$request->ngaybaocao)->format("Y/m/d");       
        $Phancongbaocao->buoi = $request->buoi;
        $Phancongbaocao->id_baocao = $id;
        $Phancongbaocao->id_phong = $request->id_phong;      
        $Phancongbaocao->save();       

        $Baocao = Baocaonc::find($id);
        $Baocao->trangthai = 1;
        $Baocao->save();

        $idnew = Phancongbaocaonc::max('id');
        $Phancongbaocaonew = Phancongbaocaonc::find($idnew);

        Mail::send('Email.Nhomnghiencuu.Thongbaosaplich', array('Baocao'=>$Baocao,'Phancongbaocao' => $Phancongbaocaonew),function($message)use($Baocao){
            $message->from('ktcn@tvu.edu.vn',"Khoa Kỹ thuật và Công nghệ");
            $message->to($Baocao->ct_nhom->giangvien->email)->subject('Thông báo đã sắp lịch báo cáo');    
        });

        return redirect('set_giangvien/nhom-nghien-cuu/danh-sach-bai-bao-cao/'.$Baocao->ct_nhom->id_nhom)->with('thongbao','Đã sắp lịch thành công Bạn cố thể xem tất cả lịch đã sắp bằng cách nhấn vào nút xem lịch bên dưới');
     }

     public function getuploadfile($id){
        $Baocao = Baocaonc::find($id);
        if($Baocao->ct_nhom->id_giangvien != Session::get('user_id'))
            return redirect('set_giangvien/nhom-nghien-cuu/danh-sach-bai-bao-cao/'.$Baocao->ct_nhom->id_nhom)->with('thongbao','Bạn không có quyền truy cập trang này');
        return view('Admin.Giangvien.Nhomnghiencuu.Upload',['Baocao' => $Baocao]);
     }

    public function postuploadfile(Request $request,$id){
        $Baocao = Baocaonc::find($id);
        if($Baocao->ct_nhom->id_giangvien != Session::get('user_id'))
            return redirect('set_giangvien/nhom-nghien-cuu/danh-sach-bai-bao-cao/'.$Baocao->ct_nhom->id_nhom)->with('thongbao','Bạn không có quyền truy cập trang này');

        if($request->hasFile('pdf_vi')){
           $chuoitam='';
           $file=$request->file('pdf_vi');
           $filename='';
           $extension = $file->getClientOriginalExtension();
           $filename.= 'drive_'.uniqid().'_'.time().'_'.date('Ymd').'.'.$extension;   
           $content = file_get_contents($file);
           Storage::disk('google')->put($filename,$content);    
           $chuoitam.=$filename.",";             
           $chuoitam= rtrim($chuoitam, ",");
           $Baocao->pdf_vi = $chuoitam;           
        }

        if($request->hasFile('pdf_en')){
           $chuoitam='';
           $file=$request->file('pdf_en');
           $filename='';
           $extension = $file->getClientOriginalExtension();
           $filename.= 'drive_'.uniqid().'_'.time().'_'.date('Ymd').'.'.$extension;   
           $content = file_get_contents($file);
           Storage::disk('google')->put($filename,$content);    
           $chuoitam.=$filename.",";             
           $chuoitam= rtrim($chuoitam, ",");
           $Baocao->pdf_en = $chuoitam;           
        }

        if($request->hasFile('pptx_vi')){
           $chuoitam='';
           $file=$request->file('pptx_vi');
           $filename='';
           $extension = $file->getClientOriginalExtension();
           $filename.= 'drive_'.uniqid().'_'.time().'_'.date('Ymd').'.'.$extension;   
           $content = file_get_contents($file);
           Storage::disk('google')->put($filename,$content);    
           $chuoitam.=$filename.",";             
           $chuoitam= rtrim($chuoitam, ",");
           $Baocao->pptx_vi = $chuoitam;           
        }

        if($request->hasFile('pptx_en')){
           $chuoitam='';
           $file=$request->file('pptx_en');
           $filename='';
           $extension = $file->getClientOriginalExtension();
           $filename.= 'drive_'.uniqid().'_'.time().'_'.date('Ymd').'.'.$extension;   
           $content = file_get_contents($file);
           Storage::disk('google')->put($filename,$content);    
           $chuoitam.=$filename.",";             
           $chuoitam= rtrim($chuoitam, ",");
           $Baocao->pptx_en = $chuoitam;           
        }

        $Baocao->save();

        return redirect('set_giangvien/nhom-nghien-cuu/danh-sach-bai-bao-cao/'.$Baocao->ct_nhom->id_nhom)->with('thongbao','Cập nhật file thành công');

     }

    public function getdanhsachphancong(){
        $Phancongbaocao = Phancongbaocaonc::orderby('created_at')->get();
        return view('Admin.Giangvien.Nhomnghiencuu.Danhsachphancongbaocao',['Phancongbaocao' => $Phancongbaocao]);
    }

    public function xoaphancongbaocao($id){
        $Phancongbaocao = Phancongbaocaonc::find($id);
        $Baocao = Baocaonc::find($Phancongbaocao->id_baocao);
        $Baocao->trangthai = 0;
        $Baocao->save();
        $Phancongbaocao->delete();
        return redirect('set_giangvien/nhom-nghien-cuu/danh-sach-nhom')->with('thongbao','Xóa thành công');
    }
}
