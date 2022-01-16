<?php

namespace App\Http\Controllers\Admin\Khoa;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\GoiemailRequest;
use App\Http\Controllers\Controller;
use App\Models\Bomon;
use App\Models\Lop;
use Mail;

class GoiemailController extends Controller
{
    public function getgoimail(){

    	$Bomon=Bomon::where('hienthi',1)->get();
    	$Lop=Lop::all();
    	return view('Admin.Khoa.Email',['Bomon'=>$Bomon,'Lop'=>$Lop]);
    }

    public function postgoimail(GoiemailRequest $request){
    	$files=$request->file('files');
    	if(isset($request->goibm)){

    		$bomon=Bomon::find($request->bomon);    		
    		 Mail::send('Email.khoathongbao', array('name'=>$request->title,'content'=>$request->noidung), function($message) use ($bomon,$request,$files){
    					    $message->from('ktcn@tvu.edu.vn',"Khoa kỹ thuật và Công nghệ - Trường đại học trà vinh");
          				$message->to($bomon->email,'Bộ môn '.$bomon->ten_vi)->subject('Thông báo - '.$request->title);   
          				 if($request->hasFile('files')) {
					        foreach($files as $file) {
					            $message->attach($file->getRealPath(), array(
					                    'as' => $file->getClientOriginalName(),
					                    'mime' => $file->getMimeType())
					            );
					        }
        			}
      		});

    	}else{

    		if(isset($request->lops)){
    		$lops = $request->input('lops');
				$lops = implode(',', $lops);
				$lop=Lop::where('id',$lops)->get();			 
    		 Mail::send('Email.khoathongbao', array('name'=>$request->title,'content'=>$request->noidung), function($message) use ($lop,$request,$files){
    						$message->from('ktcn@tvu.edu.vn',"Khoa Kỹ thuật và Công nghệ");
	    					foreach ($lop as $l) {
	    						$message->cc($l->email,'Lớp'.$l->tenlop)->subject('Thông báo - '.$request->title);
	    					} 
          			if($request->hasFile('files')){
					            foreach($files as $file) {
					                $message->attach($file->getRealPath(), array(
					                    'as' => $file->getClientOriginalName(),
					                    'mime' => $file->getMimeType())
					           );
					     }
        			}
      		});
			
    			
    		}else{
    			return redirect('set_admin/goiemail')->with('thongbao','Vui lòng chọn người nhận');
    		}
    	}

    	return redirect('set_admin/goiemail')->with('thongbao','Email của bạn đã được gởi');


    }
}
