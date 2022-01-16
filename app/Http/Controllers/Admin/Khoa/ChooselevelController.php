<?php

namespace App\Http\Controllers\Admin\Khoa;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\AjaxRequest;
use App\Http\Controllers\Controller;
use App\Models\Phancongtraloi;
use App\Models\Cauhoi;

class ChooselevelController extends Controller
{
    
    public function getchoose(){    	
    	return view('Admin.Khoa.Layout.Chooselevel');
    }

    public function postchoose(AjaxRequest $request){
    	  	
    	    \Session::forget('user_permission');
             \Session::put('user_permission',$request->level); 
             if($request->level==1){

                \Session::forget('user_ten');
                  \Session::put('user_ten',\Session::get('user_ten2')); 
             	return redirect('set_admin');
             }
             
             if($request->level==2){
                \Session::forget('user_ten');
                 \Session::forget('user_department');
                 \Session::put('user_department',\Session::get('user_department2'));
                \Session::put('user_ten',\Session::get('user_ten2')); 
                return redirect('set_bomon');
             }

             if($request->level==3){
                \Session::put('user_permission',3);

                $phancong=Phancongtraloi::where('id_giangvien',\Session::get('user_id'))->get();
                $arr= array();
                if(count($phancong)>0){
                  for ($i=0; $i<count($phancong); $i++) { 
                   $arr[$i]=$phancong[$i]->id;
                  }
                } 
                
                $Cauhoi=Cauhoi::where('view',0)->whereIn('id_chude',$arr)->get(); 
                if(count($Cauhoi)>0){
                  foreach ($Cauhoi as $ch) {
                      \Session()->push('user_cauhoi',$ch->id);
                  }
                 
                }

                return redirect('set_giangvien');
             }
             	
    
    }
}
