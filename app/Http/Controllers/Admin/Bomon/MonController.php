<?php

namespace App\Http\Controllers\Admin\Bomon;

use Illuminate\Http\Request;
use App\Http\Requests\MonRequest;
use App\Http\Controllers\Controller;
use App\Models\Mon;
use App\Models\Bacdaotao;
use App\Models\Bomon;
use App\Models\Nhommon;
use App\Models\Chuyennganh;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Session;

class MonController extends Controller
{
    public function getList($bacdaotao){
        
        Session::put('bacdaotao',$bacdaotao);
    	$Mon=Mon::where('id_bomon',Session::get('user_department'))->where('id_bacdaotao',$bacdaotao)->orderby('stt')->get();
        $Bacdaotao=Bacdaotao::orderby('id')->get();
        $Bomon=Bomon::orderby('id')->get();
    	return view('Admin.Bomon.Mon.List',['Mon'=>$Mon,'Bacdaotao'=>$Bacdaotao,'Bomon'=>$Bomon]);
    }

    public function getAdd(){
    	$Bacdaotao=Bacdaotao::all();
    	$Mon=Mon::where('id_bomon',Session::get('user_department'))->get();
        $Bomon=Bomon::where('id',Session::get('user_department'))->get();
        $Nhommon = Nhommon::all();
        $Chuyennganh = Chuyennganh::where('id_bomon',Session::get('user_department'))->get();
    	return view('Admin.Bomon.Mon.Add',['Bacdaotao'=>$Bacdaotao,'Mon'=>$Mon,'Bomon'=>$Bomon,'Nhommon' => $Nhommon,'Chuyennganh' => $Chuyennganh]);
    }

    public function postAdd(MonRequest $request){

    	$Mon=new Mon();
        $max=Mon::max('id');
    	$Mon->stt=$max+1;
    	$Mon->hienthi=1;    	
    	$Mon->ten_vi=$request->ten_vi;
    	$Mon->ten_en=$request->ten_en;
    	$Mon->mota_vi=$request->mota_vi;
    	$Mon->mota_en=$request->mota_en;
    	$Mon->stc=(int)$request->stc;
    	$Mon->lt=(int)$request->lt;
    	$Mon->th=(int)$request->th;


        if($request->hasFile('files')){
           $files=$request->file('files');
           $currentDate = Carbon::now()->toDateString();
           $extension = $files->getClientOriginalExtension();
           $imagename = uniqid() . '_' . time() . '_' . date('Ymd') . '.' . $extension;

            $dir = 'ht96_decuongchitiet/';
            $files->move($dir, $imagename);
            $Mon->file = $dir . $imagename;
        }

        $monsonghanh="";
        if(isset($request->monsonghanh))
            $monsonghanh=implode(",",$request->monsonghanh);  

        $Mon->songhanh=$monsonghanh;

        $montienquyet="";
        if(isset($request->montienquyet))      
            $montienquyet=implode(",",$request->montienquyet);   
                    
        
        $Mon->tienquyet=$montienquyet;

    	$Mon->id_bacdaotao= Session::get('bacdaotao');
        $Mon->id_bomon=Session::get('user_department');
        $Mon->tuchon = isset($request->tuchon) ? 1 : 0;
        $Mon->mamon = $request->mamon;
        $Mon->id_nhommon = $request->nhommon;
        $Mon->id_chuyennganh = $request->id_chuyennganh;
    	$Mon->save();
    	return redirect('set_bomon/mon/list/'.Session::get('bacdaotao'))->with('thongbao','thêm thành Công');

    }

    public function getEdit($id){

    	$Bacdaotao=Bacdaotao::all();
    	$Mon=Mon::where('id','<>',$id)->get();
    	$Moncontent=Mon::find($id);
        $Bomon=Bomon::all();
        $Nhommon = Nhommon::all();
        $Chuyennganh =Chuyennganh::where('id_bomon',Session::get('user_department'))->get();
    	return view('Admin.Bomon.Mon.Edit',['Bacdaotao'=>$Bacdaotao,'Mon'=>$Mon,'Moncontent'=>$Moncontent,'Bomon' => $Bomon,'Nhommon' => $Nhommon,'Chuyennganh' => $Chuyennganh]);
    }

    public function postEdit(MonRequest $request,$id){
        $Mon=Mon::find($id); 
        $Mon->ten_vi=$request->ten_vi;
        $Mon->ten_en=$request->ten_en;
        $Mon->mota_vi=$request->mota_vi;
        $Mon->mota_en=$request->mota_en;
        $Mon->stc=(int)$request->stc;
        $Mon->lt=(int)$request->lt;
        $Mon->th=(int)$request->th;

          
        if($request->hasFile('files')){
            $files=$request->file('files');
            if (File::exists($Mon->file)) { 
                File::delete($Mon->file);
            }
            $currentDate = Carbon::now()->toDateString();
            $extension = $files->getClientOriginalExtension();
            $imagename = uniqid() . '_' . time() . '_' . date('Ymd') . '.' . $extension;
            
             $dir = 'ht96_decuongchitiet/';
             $files->move($dir, $imagename);
             $Mon->file = $dir . $imagename;
        }

        $monsonghanh="";
        if(isset($request->monsonghanh))
            $monsonghanh=implode(",",$request->monsonghanh);  

        $Mon->songhanh=$monsonghanh;

        $montienquyet="";
        if(isset($request->montienquyet))      
            $montienquyet=implode(",",$request->montienquyet); 
        
        $Mon->tienquyet=$montienquyet;
      
        $Mon->id_bacdaotao=Session::get('bacdaotao');
        $Mon->id_bomon=Session::get('user_department');
        $Mon->tuchon = isset($request->tuchon) ? 1 : 0;
        $Mon->mamon = $request->mamon;
        $Mon->id_nhommon = $request->nhommon;
        $Mon->id_chuyennganh = $request->id_chuyennganh;
        $Mon->save();
        return redirect('set_bomon/mon/list/'.Session::get('bacdaotao'))->with('thongbao','Cập nhật thành Công');
    }

    public function OneDelete($id){
         $Mon =Mon::find($id); 
         if ($Mon && File::exists($Mon->file)) { 
            File::delete($Mon->file);
         }       
         $Mon->delete();
         return redirect("set_bomon/mon/list/0")->with('thongbao','Xóa thành công');
    }

    public function MultiDelete($id){
        
        $ids = explode(",", $id);
        for ($i=0; $i <count($ids) ; $i++) { 
            $Mon =Mon::find($ids[$i]); 
            if ($Mon && File::exists($Mon->file)) { 
                File::delete($Mon->file);
             }                    
            $Mon->delete();
        }              
        return redirect("set_bomon/mon/list/0")->with('thongbao','Xóa thành công'); 
            

    }
}
