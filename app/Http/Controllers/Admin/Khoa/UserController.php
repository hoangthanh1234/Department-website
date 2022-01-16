<?php

namespace App\Http\Controllers\Admin\Khoa;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Dangnhap;
use App\Http\Requests\UserRequest;
use App\Models\Bomon;

class UserController extends Controller
{
    public function getList(){
    	$User=Dangnhap::get();
    	return view('Admin.Khoa.User.List',['User'=>$User]);
    }

    public function getAdd(){
    	$Bomon=Bomon::all();
    	return view('Admin.Khoa.User.Add',['Bomon'=>$Bomon]);
    }

    public function postAdd(UserRequest $request){
    	$user=new Dangnhap();
    	$user->ten=$request->ten;
    	$user->email=$request->email;
    	$user->level=$request->level;
    	$user->bomon=$request->bomon;
        // $user->pass=md5(123456);
    	$user->save();
    	return redirect('set_admin/user/list')->with('thongbao','Thêm thành công');

    }

    public function getEdit($id){
    	$user=Dangnhap::find($id);
    	$Bomon=Bomon::all();
    	return view('Admin.Khoa.User.Edit',['User'=>$user,'Bomon'=>$Bomon]);

    }

    public function postEdit(UserRequest $request,$id){
    	$user=Dangnhap::find($id);
    	$user->ten=$request->ten;
    	$user->email=$request->email;
    	$user->level=$request->level;
    	$user->bomon=$request->bomon;
    	$user->save();
    	return redirect('set_admin/user/list')->with('thongbao','Cập nhật thành công');
    }

    public function OneDelete($id){

    	 $Dangnhap =Dangnhap::find($id);
    	 $Dangnhap->delete();
    	 return redirect('set_admin/user/list')->with('thongbao','Xóa Thành Công');
    }

    public function MultiDelete($id){    	
		        $ids = explode(",", $id);
		        for ($i=0; $i <count($ids) ; $i++) { 
		        	 $Dangnhap =Dangnhap::find($ids[$i]);
    	 			 $Dangnhap->delete();
		        }		       
		       return redirect('set_admin/user/list')->with('thongbao','Xóa Thành Công');   		

	}
}
