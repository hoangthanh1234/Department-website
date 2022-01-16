<?php

namespace App\Http\Controllers\Admin;
use Auth;
use Session;
use App\Models\User;
use App\Http\Requests;
use App\Models\Cauhoi;
use App\Models\Sinhvien;
use App\Models\Giangvien;
use App\Models\Cuusinhvien;
use Illuminate\Http\Request;
use App\Models\Phancongtraloi;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facedes;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;


class logincontroller extends Controller{
	
   public function getLogin(){
   		if(Session::has('user_permission')){   			
   			return redirect('set_admin');
   		}
   		else{
   			return view('Admin.Khoa.Layout.Login');
   		}
   }


   public function login_submit(Request $request)
   {
	   $user=User::where('email',$request->email)->first();
	   if ($user) {
		  Session::put('user_permission',$user->level);
		  Session::put('user_ten','Nguyễn Khánh Duy');
		  Session::put('user_department',$user->bomon);
		  switch ($user->level) {
			  case 1:
					return redirect('set_admin');
				  break;
			  case 2:
					return redirect('set_bomon');
				  break;
			  default:
				  # code...
				  break;
		  }
	   } else {
		    $giangvien=Giangvien::where('email',$request->email)->first();
			if($giangvien){
				Session::put('user_permission',3);
				Session::put('user_ten',$giangvien->ten);
				Session::put('user_department',$giangvien->id_bomon);
				Session::put('user_id',$giangvien->id);
				return redirect('set_giangvien');
			}
			return view('Admin.Khoa.Layout.Login');
	   }
	   
   }


	public function getLogout(){
		\Session::flush();
		 return redirect('https://www.google.com/accounts/Logout?continue=https://appengine.google.com/_ah/logout?continue=http://ktcn.tvu.edu.vn/set_admin/login#');
	}

	public function getLogout2(){
		\Session::flush();
		return redirect('set_admin/login')->with('thongbao','Bạn không có quyền truy cập tính năng này!!! vui lòng  đăng nhập lại để sử dụng hệ thống');
	}

	

	
}
