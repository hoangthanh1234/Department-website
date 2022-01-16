<?php
namespace App\Http\Controllers\Admin\Khoa;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\DmtintucRequest;
use App\Http\Controllers\Controller;
use App\Models\Dm_tintuc;
use App\Models\Tintuc;
use DateTime;

class Dm_tintucController extends Controller
{
    public function getList(){
         
        $Dm_tintuc=Dm_tintuc::all();

    	return view('Admin.Khoa.Dm_tintuc.List',['Dm_tintuc'=>$Dm_tintuc]);
    }

    public function getAdd(){
    	return view('Admin.Khoa.Dm_tintuc.Add');
    }

     public function postAdd(DmtintucRequest $request){
    	$Dm_tintuc =new Dm_tintuc();
        $max=Dm_tintuc::max('id');
    	$Dm_tintuc->stt=$max+1;
    	$Dm_tintuc->hienthi=1; 	
    	$Dm_tintuc->ten_vi=$request->ten_vi;
    	$Dm_tintuc->ten_en=$request->ten_en;
    	$Dm_tintuc->tenkhongdau_vi=str_slug($request->ten_vi,"-");
    	$Dm_tintuc->tenkhongdau_en=str_slug($request->ten_en,"-");
    	$Dm_tintuc->title_vi=$request->title_vi;
    	$Dm_tintuc->title_en=$request->title_en;
    	$Dm_tintuc->description_vi=$request->description_vi;
    	$Dm_tintuc->description_en=$request->description_en;
    	$Dm_tintuc->created_at=new DateTime();
    	$Dm_tintuc->save();
    	return redirect("set_admin/dmtintuc/list")->with('thongbao','Thêm thành công');
    }


    public function getEdit($id){
        $Dm_tintuc=Dm_tintuc::find($id);
        return view('Admin.Khoa.Dm_tintuc.Edit',['cate'=>$Dm_tintuc]);
    }

     public function postEdit(DmtintucRequest $request,$id){
        $Dm_tintuc =Dm_tintuc::find($id);
        $Dm_tintuc->ten_vi=$request->ten_vi;
        $Dm_tintuc->ten_en=$request->ten_en;
        $Dm_tintuc->tenkhongdau_vi=str_slug($request->ten_vi,"-");
        $Dm_tintuc->tenkhongdau_en=str_slug($request->ten_en,"-");
        $Dm_tintuc->title_vi=$request->title_vi;
        $Dm_tintuc->title_en=$request->title_en;
        $Dm_tintuc->description_vi=$request->description_vi;
        $Dm_tintuc->description_en=$request->description_en;
        $Dm_tintuc->updated_at=new DateTime();
        $Dm_tintuc->save();
        return redirect("set_admin/dmtintuc/edit/".$id)->with('thongbao','Sửa thành công');
    }

    public function OneDelete($id){
    	 $Dm_tintuc =Dm_tintuc::find($id);
         $Tintuc = Tintuc::where('id_danhmuc',$id)->delete();
    	 $Dm_tintuc->delete();
    	 return redirect("set_admin/dmtintuc/list")->with('thongbao','Xóa thành công');
    }

    public function MultiDelete($id){

    	$ids = explode(",", $id);
		for ($i=0; $i <count($ids) ; $i++) { 
		    $Dm_tintuc =Dm_tintuc::find($ids[$i]);
            $Tintuc = Tintuc::where('id_danhmuc',$ids[$i])->delete();
    	 	$Dm_tintuc->delete();
		}		       
		return redirect("set_admin/dmtintuc/list")->with('thongbao','Xóa thành công'); 
    		

	}


}
