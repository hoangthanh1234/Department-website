<?php

namespace App\Http\Controllers\Admin\Giangvien;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\TraloiRequest;
use App\Http\Controllers\Controller;
use App\Models\Cauhoi;
use Mail;
use Session;

class HoidapController extends Controller
{
    public function getList(){

    	$arr=Session::get('user_cauhoi');       
        if(Session::get('user_cauhoi') !=null){
    	   $Cauhoichuatl=Cauhoi::where('view',0)->whereIn('id',$arr)->get();
           return view('Admin.Giangvien.Hoidap.list',['Cauhoichuatl'=>$Cauhoichuatl]);
        }else{
            $Cauhoichuatl=Cauhoi::where('id','<',0)->get();
           return view('Admin.Giangvien.Hoidap.list',['Cauhoichuatl'=>$Cauhoichuatl]);
        }

    	 
    }

    public function traloi($id){
    	$Cauhoi=Cauhoi::find($id);
    	return view('Admin.Giangvien.Hoidap.Traloi',['Cauhoi'=>$Cauhoi]);
    }

    public function posttraloi(TraloiRequest $request,$id){
    	$Cauhoi=Cauhoi::find($id);
    	$Cauhoi->view=1;
    	$Cauhoi->traloi=$request->noidung;
    	$Cauhoi->nguoitraloi=Session::get('user_id');
    	$Cauhoi->save();

    	 Mail::send('Email.canbotraloi', array('name'=>$Cauhoi->ten,'cau'=>$Cauhoi->noidung,'email'=>$Cauhoi->email, 'content'=>$request->noidung), function($message) use ($request,$Cauhoi){
          $message->from('ktcn@tvu.edu.vn',"Khoa Kỹ thuật và Công nghệ");
          $message->to($Cauhoi->email, 'Visitor')->subject($request->title);  
      });
    	
    	return redirect('set_giangvien/hoidap/list')->with('thongbao','Email của bạn đã được gởi');
    }
}
