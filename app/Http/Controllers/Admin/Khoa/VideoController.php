<?php

namespace App\Http\Controllers\Admin\Khoa;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\VideoRequest;
use App\Http\Controllers\Controller;
use App\Models\Video;
use DateTime;

class VideoController extends Controller
{
    public function getList(){         
        $Video=Video::all();
    	return view('Admin.Khoa.Video.List',['Video'=>$Video]);
    }

    public function getAdd(){         
       
    	return view('Admin.Khoa.Video.Add');
    }

    public function postAdd(VideoRequest $request){
    	$Video =new Video();
        $max=Video::max('id');
    	$Video->stt=$max+1;
    	$Video->hienthi=1;    	
    	$Video->ten_vi=$request->ten_vi;
    	$Video->ten_en=$request->ten_en;
    	$Video->type=$request->type;
    	$Video->link=$request->link;
    	$Video->created_at=new DateTime();
    	$Video->save();
    	return redirect("set_admin/video/list")->with('thongbao','Thêm thành công');
    }

     public function getEdit($id){
        $Video=Video::find($id);
        return view('Admin.Khoa.Video.Edit',['Video'=>$Video]);
    }

    public function postEdit(VideoRequest $request,$id){
    	$Video=Video::find($id);
        $Video->ten_vi=$request->ten_vi;
    	$Video->ten_en=$request->ten_en;
    	$Video->type=$request->type;
    	$Video->link=$request->link;
    	$Video->save();
    	return redirect("set_admin/video/edit/".$id)->with('thongbao','Sửa thành công');
    	
    }

    public function OneDelete($id){
    	 $Video =Video::find($id);    	
    	 $Video->delete();
    	 return redirect("set_admin/video/list")->with('thongbao','Xóa thành công');
    }

    public function MultiDelete($id){    	
		$ids = explode(",", $id);
		for ($i=0; $i <count($ids) ; $i++) { 
		    $Video =Video::find($ids[$i]);		        	
    	 	$Video->delete();
		}		       
		return redirect("set_admin/video/list")->with('thongbao','Xóa thành công'); 
	}


}

