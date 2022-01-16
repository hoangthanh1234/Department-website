<?php

namespace App\Http\Controllers\Admin\Giangvien;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\AjaxRequest;
use App\Http\Controllers\Controller;
use App\Models\Nhomcongviec;
use App\Models\Congviec;
use App\Models\CT_phancongviec;
use App\Models\Giangvien;
use Carbon\Carbon;
use DateTime;
use Session;
use Calendar;
use Mail;

class PhancongviecController extends Controller{

public  function getList(){

    	//$Phancongvieccap1=Phancongviec::where('id_giangvien',Session::get('user_id'))->orderby('ngaybatdau')->get();
    	//$Phancongvieccap2=CT_phancongviec::where('id_giangvien',Session::get('user_id'))->orderby('ngaybatdau')->get();
    	$Giangvien=Giangvien::find(Session::get('user_id'));       
        $Nhomcongviec = Nhomcongviec::whereHas('phancongviec',function($query){
                                      $query->where('id_giangvien',Session::get('user_id'));
        })->get();
    	return  view('Admin.Giangvien.Phancongviec.List',['Giangvien'=>$Giangvien,'Nhomcongviec' => $Nhomcongviec]);
}

public function themkehoach(AjaxRequest $request){
    	$CT_phancongviec=new CT_phancongviec();
    	$CT_phancongviec->ten=$request->ten;
    	$CT_phancongviec->ngaybatdau=Carbon::createFromFormat('d/m/Y',$request->ngaybatdau)->format("Y/m/d");
    	$CT_phancongviec->ngayketthuc=Carbon::createFromFormat('d/m/Y',$request->ngayketthuc)->format("Y/m/d");
    	$CT_phancongviec->ngayhoanthanh=Carbon::createFromFormat('d/m/Y',$request->ngaybatdau)->format("Y/m/d");
    	$CT_phancongviec->trangthai=0;
    	$CT_phancongviec->id_giangvien=$request->id_giangvien;
    	$CT_phancongviec->id_phancong=$request->id_phancong;
    	$CT_phancongviec->ghichu=$request->ghichu;        
    	$CT_phancongviec->save();
        $max = CT_phancongviec::max('id');
        $CT_phancongviec = CT_phancongviec::find($max);
        Mail::send('Email.Phancongviec', array('CT_phancongviec' => $CT_phancongviec),function($message)use($CT_phancongviec){
                $message->from('ktcn@tvu.edu.vn',"Khoa Kỹ thuật và Công nghệ");
                $message->to($CT_phancongviec->giangvien->email)->subject('Thông báo giao việc');    
        });
    	echo "Thêm thành công";
} 

public function loadkehoach($id){
        $CT_phancongviec= CT_phancongviec::where('id_phancong',$id)->get();
        $noidung='';
        $i=1;$j=0;
        foreach ($CT_phancongviec as $CTPC) {
        	$noidung.='<tr>';
        		$noidung.='<td width="5%" class="text-center">'.$i++.'</td>';
                $noidung.='<td class="text-center"><input type="checkbox" class="duyetcap2" data-id="'.$CTPC->id.'"';
                    if($CTPC->trangthai==1) $noidung.=' checked';
                $noidung.='></td>';
        		$noidung.='<td width="15%" class="text-center">';
        		if($CTPC->trangthai==1) $noidung.='Hoàn thành'; else $noidung.='Chưa hoàn thành';
        		$noidung.='</td>';
                $noidung.='<td>'.$CTPC->giangvien->ten.'</td>';
                $noidung.='<td class="text-center">';
                    if($CTPC->minhchung!='')
                        $noidung.='<a href="set_giangvien/ajax/get/'.$CTPC->minhchung.'">Có</a>';
                $noidung.='</td>';
                $noidung.='<td class="text-center"><i title="Gỡi email đến người thực hiện" class="fa fa-envelope-o goiemail" aria-hidden="true"  data-id="'.$CTPC->id.'" data-gv="'.$CTPC->giangvien->ten.'"></i></td>';
        		$noidung.='<td>'.$CTPC->ten.'</td>';
        		$noidung.='<td width="15%" class="text-center">'.date('d/m/Y', strtotime($CTPC->ngaybatdau)).'</td>';
        		$noidung.='<td width="15%" class="text-center">'.date('d/m/Y', strtotime($CTPC->ngayketthuc)).'</td>';
        		$noidung.='<td width="15%" class="text-center">'.$CTPC->ghichu.'</td>';
        	$noidung.='</tr>';
        	
        }
      echo $noidung;
}

public function loadphancong($id){
    $Phancongviec=Phancongviec::find($id);
    $dulieu=[

            "id"=>$Phancongviec->id,
            "ten"=>$Phancongviec->congviec->ten,
            "nguoithuchien"=>$Phancongviec->giangvien->ten,
            "ngaybatdau"=>$Phancongviec->ngaybatdau,
            "ngayketthuc"=>$Phancongviec->ngayketthuc

        ];

        echo json_encode($dulieu);
 }

public function loadlich(){
    $Phancongviec=Phancongviec::where('id_giangvien',Session::get('user_id'))->get();

    $Phancongviecct=CT_phancongviec::where('id_giangvien',Session::get('user_id'))->get();

    foreach ($Phancongviec as $pcv) {
        $data[]=array(
            'id' => $pcv->id,
            'title' => $pcv->congviec->ten,
            'start' => $pcv->ngaybatdau,
            'end' => $pcv->ngayketthuc,
            'trangthai' => $pcv->trangthai,
            'type' => 'pcc1',
            'nguoithuchien' => $pcv->giangvien->ten,
            'nguoiphancong' => $pcv->giaoviec->ten,            
            'backgroundColor' => $pcv->color, //red
            'minhchung' => $pcv->minhchung,
        );
    }

    foreach ($Phancongviecct as $pcvct) {
        $data[]=array(
            'id' => $pcvct->id,
            'title' => $pcvct->ten,
            'start' => $pcvct->ngaybatdau,
            'end' => $pcvct->ngayketthuc,
            'trangthai' => $pcvct->trangthai,
            'type' => 'pcc2',
            'nguoithuchien' => $pcvct->giangvien->ten,
            'nguoiphancong' => $pcvct->phancongviec->giangvien->ten,
            'backgroundColor' => $pcvct->color, //red
            'minhchung' => $pcvct->minhchung,
        );
    }
      
   
        echo json_encode($data);
 }


public function baocaobc1(AjaxRequest $request){
    
    if($request->hasFile('file')){
        $chuoitam='';
        $file=$request->file('file');        
        $filename='';
        $extension = $file->getClientOriginalExtension();
        $filename.= 'phancongviec_'.uniqid().'_'.time().'_'.date('Ymd').'.'.$extension;   
        $content = file_get_contents($file);
        Storage::disk('google')->put($filename,$content);    
        $chuoitam.=$filename.",";          
        $chuoitam= rtrim($chuoitam, ",");
        $Phancongviec=Phancongviec::find($request->id_phancong);
        $Phancongviec->ghichubaocao=$request->ghichu;       
        $Phancongviec->minhchung=$chuoitam;
        $Phancongviec->color="#337ab7";
        $Phancongviec->trangthai = 1;
        $Phancongviec->save();
        Mail::send('Email.Baocaocvcap1', array('Phancongviec' => $Phancongviec), function($message) use ($Phancongviec){
                $message->from('ktcn@tvu.edu.vn',"Khoa Kỹ thuật và Công nghệ");
                $message->to($Phancongviec->giaoviec->email,"Thanks")->subject('Báo cáo phân công việc');    
        });
         echo "Báo cáo hoàn thành công";
     }else echo "Vui lòng chọn file";
}

public function loadchitietphancong($id){
    $CT_phancongviec=CT_phancongviec::find($id);

    $dulieu=[
                "id"=>$CT_phancongviec->id,
                "ten"=>$CT_phancongviec->ten,
                "nguoithuchien"=>$CT_phancongviec->giangvien->ten,
                "ngaybatdau"=>$CT_phancongviec->ngaybatdau,
                "ngayketthuc"=>$CT_phancongviec->ngayketthuc
            ];

        echo json_encode($dulieu);
}

public function baocaoc2(AjaxRequest $request){


    if($request->hasFile('file')){ 

        $chuoitam='';
        $file=$request->file('file');        
        $filename='';
        $extension = $file->getClientOriginalExtension();
        $filename.= 'phancongviec_'.uniqid().'_'.time().'_'.date('Ymd').'.'.$extension;   
        $content = file_get_contents($file);
        Storage::disk('google')->put($filename,$content);    
        $chuoitam.=$filename.",";          
        $chuoitam= rtrim($chuoitam, ",");



        $CT_phancongviec=CT_phancongviec::find($request->idbaocao);
        $id_phancong = $CT_phancongviec->id_phancong;
        $CT_phancongviec->ghichubaocao=$request->ghichu;       
        $CT_phancongviec->minhchung=$chuoitam;
        $CT_phancongviec->trangthai = 2;
        $CT_phancongviec->color="#337ab7";
        $CT_phancongviec->save();

        $check = CT_phancongviec::where('id_phancong',$id_phancong)->where('trangthai','<>',2)->get();

        if(count($check) == 0){
            $Congviec = Congviec::find($id_phancong);
            $Congviec->trangthai = 2;
            $Congviec->save();
        }

        Mail::send('Email.Baocaocv', array('CT_phancongviec' => $CT_phancongviec), function($message) use ($CT_phancongviec){
                $message->from('ktcn@tvu.edu.vn',"Khoa Kỹ thuật và Công nghệ");
                $message->to($CT_phancongviec->congviec->giangvien->email,"Báo cáo")->subject('Báo cáo phân công việc');    
        });

        echo "Báo cáo hoàn thành công";
     }else echo "Vui lòng chọn file";
   
}

public function Goimail(AjaxRequest $request){
    $CT_phancongviec = CT_phancongviec::find($request->id_chitiet);
    $tieude=$request->tieude;
    Mail::send('Email.Emailphancong', array('CT_phancongviec' => $CT_phancongviec,'noidung' => $request->noidung), function($message) use ($CT_phancongviec,$tieude){
        $message->from('ktcn@tvu.edu.vn',"Khoa Kỹ thuật và Công nghệ");
        $message->to($CT_phancongviec->giangvien->email,"Thanks")->subject($tieude);    
    });
    echo "Báo cáo hoàn thành công";

}

public function duyetcap2($id){
    $CT_phancongviec = CT_phancongviec::find($id);
    $CT_phancongviec->trangthai = 1;
    $CT_phancongviec->save();
    echo "Duyệt thành công";
}

public function huyduyetcap2($id){
    $CT_phancongviec = CT_phancongviec::find($id);
    $CT_phancongviec->trangthai = 2;
    $CT_phancongviec->save();
    echo "Hủy duyệt thành công";
}


public function getChitietgiangvien($ten,$id){
    $Nhomcongviec = Nhomcongviec::whereHas('phancongviec',function($query)use($id){
            $query->where('id_giangvien',$id);
    })->get();

    $Giangvien = Giangvien::find($id);

    return  view('Admin.Giangvien.Phancongviec.List',['Giangvien'=>$Giangvien,'Nhomcongviec' => $Nhomcongviec]);
}

public function getchitietcongviec($id){
    
    $Congviec = Congviec::find($id);
    if($Congviec->id_giangvien != Session::get('user_id'))
        die('Bạn không có quyền truy cập công việc này');
    $Giangvien = Giangvien::where('id_bomon','<>',7)->orderby('ten')->get();
    return view('Admin.Giangvien.Phancongviec.Chitietcongviec',['Congviec' => $Congviec,'Giangvien' => $Giangvien]);
}

public function xoacongviec($id){
    $CT_phancongviec = CT_phancongviec::find($id);
    $CT_phancongviec->delete();
    return redirect()->back()->with('thongbao','Xóa thành công');
}

public function gettesttin(){
    return view('Admin.Giangvien.testtin');
}

}
