<?php

namespace App\Http\Controllers\Admin\Bomon;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\BantuvanRequest;
use App\Http\Controllers\Controller;
use App\Models\Bantuvan;
use App\Models\Bomon;
use Session;


class BantuvanController extends Controller
{
    public function getList($id){

        if($id!=Session::get('user_department'))die('bạn không có quyền truy cặp liên kết này');
    	$Bantuvan=Bantuvan::where('id_bomon',$id)->orderby('stt')->paginate(10);
    	return view('Admin.Bomon.Bantuvan.List',['Bantuvan'=>$Bantuvan]);

    }

    public function getAdd(){   	
    	
    	return view('Admin.Bomon.Bantuvan.Add');
    }

    public function postAdd(BantuvanRequest $request){
    	$Bantuvan= new Bantuvan();
    	$max=Bantuvan::max('id');
    	$Bantuvan->stt=$max+1;    	
    	$Bantuvan->ten=$request->ten;        
    	$Bantuvan->email=$request->email;
    	$Bantuvan->dienthoai=$request->dienthoai; 
    	$Bantuvan->donvicongtac=$request->donvicongtac;
    	$Bantuvan->diachilienhe=$request->diachilienhe;    	
    	$Bantuvan->id_bomon=Session::get('user_department');   	
    	$Bantuvan->save();   
    	return redirect('set_bomon/bantuvan/list/'.Session::get('user_department'))->with('thongbao','thêm thành công');
    }

    public function getEdit($id){       
        $Bantuvan=Bantuvan::find($id);        
        if($Bantuvan->id_bomon!=Session::get('user_department'))die('Bạn không có quyền truy cặp liên kêt này');
        return view('Admin.Bomon.Bantuvan.Edit',['Bantuvan'=>$Bantuvan]);
    }

    public function postEdit(BantuvanRequest $request,$id){
        $Bantuvan=Bantuvan::find($id);   
    	$Bantuvan->ten=$request->ten;        
    	$Bantuvan->email=$request->email;
    	$Bantuvan->dienthoai=$request->dienthoai; 
    	$Bantuvan->donvicongtac=$request->donvicongtac;
    	$Bantuvan->diachilienhe=$request->diachilienhe;    	
    	$Bantuvan->id_bomon=Session::get('user_department');
        $Bantuvan->save();
        return redirect('set_bomon/bantuvan/edit/'.$id)->with('thongbao','Cập nhật thành công');
    }

     public function OneDelete($id){
         $Bantuvan =Bantuvan::find($id);        
         $Bantuvan->delete();
         return redirect("set_bomon/bantuvan/list/".Session::get('user_department'))->with('thongbao','Xóa thành công');
    }

    public function MultiDelete($id){
        
                $ids = explode(",", $id);
                for ($i=0; $i <count($ids) ; $i++) { 
                     $Bantuvan =Bantuvan::find($ids[$i]);                     
                     $Bantuvan->delete();
                }              
                return redirect("set_bomon/bantuvan/list/".Session::get('user_department'))->with('thongbao','Xóa thành công'); 
            

    }
}
