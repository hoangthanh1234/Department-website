<?php

namespace App\Http\Controllers\Admin\Khoa;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\LopRequest;
use App\Http\Controllers\Controller;
use App\Models\Lop;
use App\Models\Bacdaotao;
use App\Models\Hedaotao;
use App\Models\Bomon;
use App\Models\Chuongtrinh;

class LopController extends Controller
{
    
public function getList($id){
    $Lop=Lop::where('id_bomon',$id)->orderByRaw('ngoaikhoa','totnghiep AESC')->get();
    $Bomon=Bomon::all();
    return view('Admin.Khoa.Lop.List',['Lop'=>$Lop,'Bomon'=>$Bomon]);
}

public function getAdd(){
    $Bomon=Bomon::all();
    $Bacdaotao=Bacdaotao::all();
    $Chuongtrinh = Chuongtrinh::all();
    $Hedaotao = Hedaotao::all();
    return view('Admin.Khoa.Lop.Add',['Bomon'=>$Bomon,'Bacdaotao'=>$Bacdaotao,'Chuongtrinh' => $Chuongtrinh,'Hedaotao' => $Hedaotao]);
}

public function postAdd(LopRequest $request){
    $Lop=new Lop();
    $Lop->malop=$request->malop;
    $Lop->tenlop=$request->tenlop;
    $Lop->nambatdau=$request->nambatdau;
    $Lop->namtotnghiep=$request->namtotnghiep;
    $Lop->email=$request->email;
    $Lop->totnghiep = $request->totnghiep;
    $Lop->ngoaikhoa = ($request->ngoaikhoa == 1) ? 1 : 0;
    $Lop->id_bomon=$request->id_bomon;
    $Lop->id_hedaotao = $request->id_hedaotao;
    $Lop->id_bacdaotao=$request->id_bacdaotao;
    $Lop->id_chuongtrinh = $request->id_chuongtrinh;
    $Lop->save();

    return redirect('set_admin/lop/list/'.$request->id_bomon)->with('thongbao','thêm thành công');;
}

public function getEdit($id){
    $Bomon=Bomon::all();
    $Bacdaotao=Bacdaotao::all();
    $Lop=Lop::find($id);
    $Chuongtrinh = Chuongtrinh::all();
    $Hedaotao = Hedaotao::all();
    return view('Admin.Khoa.Lop.Edit',['Bomon'=>$Bomon,'Bacdaotao'=>$Bacdaotao,'Lop'=>$Lop,'Chuongtrinh' => $Chuongtrinh,'Hedaotao' => $Hedaotao]);
}

public function postEdit(LopRequest $request,$id){
    $Lop=Lop::find($id);
    $Lop->malop=$request->malop;
    $Lop->tenlop=$request->tenlop;
    $Lop->nambatdau=$request->nambatdau;
    $Lop->namtotnghiep=$request->namtotnghiep;
    $Lop->email=$request->email;
    $Lop->totnghiep = $request->totnghiep;
    $Lop->ngoaikhoa = ($request->ngoaikhoa == 1) ? 1 : 0;
    $Lop->id_bomon=$request->id_bomon;
    $Lop->id_hedaotao = $request->id_hedaotao;
    $Lop->id_bacdaotao=$request->id_bacdaotao;
    $Lop->id_chuongtrinh = $request->id_chuongtrinh;
    $Lop->save();
    return redirect('set_admin/lop/edit/'.$id)->with('thongbao','Cập nhật thành công');
}

public function OneDelete($id){
    $Lop =Lop::find($id);    	
    $Lop->delete();
    return redirect("set_admin/lop/list/".$Lop->id_bomon)->with('thongbao','Xóa thành công');
}


public function MultiDelete($id){    	
	$ids = explode(",", $id);
    $bm=0;
	for ($i=0; $i <count($ids) ; $i++) { 
		$Lop =Lop::find($ids[$i]);		        	
    	 $Lop->delete();
        $bm=$Lop->id_bomon;
	}		       
	return redirect("set_admin/lop/list/".$bm)->with('thongbao','Xóa thành công'); 
}


}
