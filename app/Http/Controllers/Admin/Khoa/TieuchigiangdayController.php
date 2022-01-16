<?php
namespace App\Http\Controllers\Admin\Khoa;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\TieuchigiangdayRequest;
use App\Http\Controllers\Controller;
use App\Models\Tieuchigiangday;
use DateTime;

class TieuchigiangdayController extends Controller
{
    public function getList(){

    	$Tieuchigiangday=Tieuchigiangday::orderby('stt')->get();
    	return view('Admin.Khoa.Tieuchigiangday.List',['Tieuchi'=>$Tieuchigiangday]);
    }

    public function getAdd(){    	
    	return view('Admin.Khoa.Tieuchigiangday.Add');
    }

    public function postAdd(TieuchigiangdayRequest $request){

    	$Tieuchigiangday =new Tieuchigiangday();
    	$max=Tieuchigiangday::max('id');
    	$Tieuchigiangday->stt=$max+1;
    	$Tieuchigiangday->ten=$request->ten;
    	$Tieuchigiangday->diem=$request->diem;
    	$Tieuchigiangday->donvitinh=$request->donvitinh;
        $Tieuchigiangday->loaiminhchung=$request->loaiminhchung;    	
    	$Tieuchigiangday->save();
    	return redirect('set_admin/tieu-chi/giang-day/list')->with('thongbao','Thêm thành công');
    }

    public function getEdit($id){    	
    	$Tieuchigiangday=Tieuchigiangday::find($id);
    	return view('Admin.Khoa.Tieuchigiangday.Edit',['Tieuchi'=>$Tieuchigiangday]);
    }

    public function postEdit($id,TieuchigiangdayRequest $request){
    	$Tieuchigiangday=Tieuchigiangday::find($id);
    	$Tieuchigiangday->ten=$request->ten;
    	$Tieuchigiangday->diem=$request->diem;
        $Tieuchigiangday->loaiminhchung=$request->loaiminhchung;
    	$Tieuchigiangday->donvitinh=$request->donvitinh;    	
    	$Tieuchigiangday->save();
    	return redirect('set_admin/tieu-chi/giang-day/edit/'.$id)->with('thongbao','Cập nhật thành công');
    }

    public function OneDelete($id){
        $Tieuchigiangday =Tieuchigiangday::find($id);        
        $Tieuchigiangday->delete();
        return redirect("set_admin/tieu-chi/giang-day/list")->with('thongbao','Xóa thành công');
    }

    public function MultiDelete($id){        
        $ids = explode(",", $id);
        for ($i=0; $i <count($ids) ; $i++) { 
            $Tieuchigiangday =Tieuchigiangday::find($ids[$i]);                    
            $Tieuchigiangday->delete();
        }              
        return redirect("set_admin/tieu-chi/giang-day/list")->with('thongbao','Xóa thành công'); 
            

    }
}
