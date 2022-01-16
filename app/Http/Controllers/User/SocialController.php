<?php

namespace App\Http\Controllers\User;

use Session;
use Socialite;
use App\Models\User;
use App\Http\Requests;
use App\Models\Cauhoi;
use App\Models\Sinhvien;
use App\Models\Giangvien;
use App\Models\AccessUser;
use App\Models\Cuusinhvien;
use Illuminate\Http\Request;
use App\Models\Phancongtraloi;
use Illuminate\Support\Carbon;
use App\Models\Thongbaodanhgia;
use App\Http\Controllers\Controller;

class SocialController extends Controller{
  
  public function redirectToProvider($provider){        
    return Socialite::driver($provider)->scopes(['profile','email'])->redirect();
  }  

    /**
     * Lấy thông tin từ Provider, kiểm tra nếu người dùng đã tồn tại trong CSDL
     * thì đăng nhập, ngược lại nếu chưa thì tạo người dùng mới trong SCDL.
     *
     * @return Response
     */
    public function handleProviderCallback($provider){
        $user = Socialite::driver($provider)->user();      
        $email = $user->email;
        \Session::put('user_avatar',$user->avatar);  
         $ac=new AccessUser();
         $ac->email=$user->email;
         $ac->date=Carbon::now();
         $ac->save();
        $CB=User::where('email',$email)->first();
        $Giangvien=Giangvien::where('email',$email)->where('trangthai','<>',0)->first();
            $Thongbaodanhgia=Thongbaodanhgia::where('hienthi',1)->first();
            if($Thongbaodanhgia!=null){
                $TB=$Thongbaodanhgia->id;
                \Session::put('user_tbdg',$TB); 
            }else
            {
               
                $Thongbaodanhgia2=Thongbaodanhgia::first();
                if($Thongbaodanhgia2!=null){
                    $TB=$Thongbaodanhgia2->id;
                  \Session::put('user_tbdg',$TB);
                }else \Session::put('user_tbdg',1); 
            }
        if($CB!=null && $Giangvien!=null){   

                 \Session::put('user_permission',$CB->level);
                 \Session::put('user_department',$Giangvien->bomon->id);  
                 \Session::put('user_department2',$CB->bomon); 
                 \Session::put('user_ten',$Giangvien->ten); 
                 \Session::put('user_ten2',$CB->ten);
                 \Session::put('user_tenkhongdau',$Giangvien->tenkhongdau);
                 \Session::put('user_id',$Giangvien->id);       
                  return redirect('chooselevel');
        }
        if($CB!=null){

            \Session::put('user_permission',$CB->level);
            \Session::put('user_department',$CB->bomon);  
            \Session::put('user_ten',$CB->ten);
            \Session::put('id_bomon',$CB->bomon);

            if ($CB->level==1) {
              return redirect('set_admin');
            }
            return redirect('set_bomon');
        }
        if($Giangvien!=null){
                \Session::put('user_permission',3);
                \Session::put('user_department',$Giangvien->id_bomon);  
                \Session::put('user_ten',$Giangvien->ten);
                \Session::put('user_tenkhongdau',$Giangvien->tenkhongdau);
                \Session::put('user_id',$Giangvien->id);
                $phancong=Phancongtraloi::where('id_giangvien',$Giangvien->id)->get();
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
        $Sinhvien=Sinhvien::where('email',$email)->where('totnghiep',0)->first();
        if($Sinhvien!=null){
                \Session::put('user_permission',4);
                \Session::put('user_department',$Sinhvien->lop->bomon->id);  
                \Session::put('user_ten',$Sinhvien->ten);
                \Session::put('user_id',$Sinhvien->id);
                  return redirect('set_admin');
        }
        $Csv=Sinhvien::where('email',$email)->where('totnghiep',1)->first();
        if($Csv!=null){
             $Csv_tt = Cuusinhvien::where('id_sinhvien',$Csv->id)->first();
                   Session()->push('Csv',['ten'=>$user->name,'email'=>$email,'id'=>$Csv->id]);
                   Session()->push('Csv_tt',['id'=>$Csv_tt->id,'ten'=>$Csv->ten,'ma'=>$Csv->ma,'noicongtac_vi'=>$Csv_tt->noicongtac_vi,'noicongtac_en'=>$Csv_tt->noicongtac_en,'chucvu_vi'=>$Csv_tt->chucvu_vi,'chucvu_en'=>$Csv_tt->chucvu_en,'socoquan'=>$Csv_tt->socoquan,'diachicoquan'=>$Csv_tt->diachicoquan]);
                return redirect('cuu-sinh-vien.html');
        }
         return redirect('https://www.google.com/accounts/Logout?continue=https://appengine.google.com/_ah/logout?continue=http://ktcn.tvu.edu.vn/set_admin/login')->with('thongbao','Email không trùng khớp với bất kỳ email nào trong hệ thống');
    }

    protected function getProvider()
    {
        return Socialite::with('google');
    }

    public function logoutProvider($provider){
    	  Session::flush();  
        Session::regenerate();  	
       return redirect('https://www.google.com/accounts/Logout?continue=https://appengine.google.com/_ah/logout?continue=http://ktcn.tvu.edu.vn/set_admin/login#');
    }

    public function logout()
    {
      Session::flush();
      return redirect('/');
    }

    public function logoutProvider2($bomon,$provider){
         Session::flush();
        return redirect('https://www.google.com/accounts/Logout?continue=https://appengine.google.com/_ah/logout?continue=http://ktcn.tvu.edu.vn/set_admin/login#');
    }

    
}
