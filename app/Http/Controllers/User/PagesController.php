<?php

use App\Models\Enrollment;
use App\Models\program_object;

  namespace App\Http\Controllers\User;
  use Illuminate\Http\Request;
  use App\Http\Requests;
  use App\Http\Requests\AjaxRequest;
  use App\Http\Controllers\Controller;
  use App\Models\CDR1;
  use App\Models\CDR2;
  use App\Models\About;
  use App\Models\Bomon;
  use App\Models\Bacdaotao;
  use App\Models\Dm_tintuc;
  use App\Models\Tintuc;
  use App\Models\Slider;
  use App\Models\Infor;
  use App\Models\Counter;
  use App\Models\Video;
  use App\Models\LKweb;
  use App\Models\Chuongtrinh;
  use App\Models\CT_daotao;
  use App\Models\CT_xettuyen;
  use App\Models\CT_detai;
  use App\Models\CT_baibao;
  use App\Models\Mon;
  use App\Models\Giangvien;
  use App\Models\Detainghiencuu;
  use App\Models\Capdetai;
  use App\Models\Sinhvien;
  use App\Models\Dm_thongbao;
  use App\Models\Thongbao;
  use App\Models\Chude;
  use App\Models\Cauhoi;
  use App\Models\Phancongtraloi;
  use App\Models\Lop;
  use App\Models\Bieumau;
  use App\Models\Bantuvan;
  use App\Models\Baibaokhoahoc;
  use App\Models\Nhomnc;
  use App\Models\Baocaonc;
  use App\Models\Quanlyduan;
  use App\Models\program_object;
  use App\Models\chuan_abet;
  use App\Models\Enrollment;
  use DB;
  use Session;
  use Mail;
  use Carbon;


  class PagesController extends Controller
  {
  	public function __construct(){

        if(Session::get('language')=='')Session::put('language','en');

            	$this->CountOnline();

              $lang=Session::get('language');

              Carbon\Carbon::setLocale(Session::get('language'));
            	$Donvi=Bomon::where('hienthi','=',1)->orderBy('stt')->get();
            	$Bacdaotao=Bacdaotao::where('hienthi','=',1)->orderBy('stt')->get();
            	$Dm_tintuc=Dm_tintuc::where('hienthi','=',1)->orderBy('stt')->get();
            	$About=About::where('hienthi','=',1)->where('id_bomon',6)->orderBy('stt')->get();
            	$Slider=Slider::where('hienthi','=',1)->orderBy('stt')->get();
            	$Infor=Infor::where('id',1)->get()->first();
            	$Lkweb=LKweb::where('hienthi',1)->where('type','lkweb')->get();

            	view()->share('LKweb',$Lkweb);
            	view()->share('Infor',$Infor);
            	view()->share('Slider',$Slider);
            	view()->share('Bacdaotao',$Bacdaotao);
            	view()->share('Donvi',$Donvi);
            	view()->share('Dm_tintuc',$Dm_tintuc);
            	view()->share('About',$About);
              view()->share('lang',$lang);

    }

    public function getEmail(){
      return view('User.Page.Email');
    }

    public function postEmail(AjaxRequest $request){

      $giangvien=Phancongtraloi::where('hotline',1)->get();

      if(count($giangvien)>0){

           Mail::send('Email.emailtong', array('name'=>$request->ten,'email'=>$request->email, 'content'=>$request->noidung), function($message) use ($giangvien){
                foreach ($giangvien as $gv) {
                    $message->from('ktcn@tvu.edu.vn',"Khoa Kỹ thuật và Công nghệ");
                    $message->to($gv->giangvien->email, 'Visitor')->subject('Hỏi đáp Sinh viên');
                }

              });
      }


      return redirect('email.html')->with('thongbao2','Câu hỏi của bạn đã được gỡi!!! Ban tư vấn sẽ trả lởi trong thời gian sớm nhất');
}


  public function changeLanguage($language){
     \Carbon\Carbon::setLocale($language);
  		\Session::put('language', $language);
  		return redirect()->back();
  }

  public function trangchu(){

  	$lang=Session::get('language');

    Carbon\Carbon::setLocale(Session::get('language'));

  	$Vechungtoi=About::where('hienthi', 1)->where('id_bomon',6)->orderBy('stt')->first();

  	$Tintuc=Tintuc::where('noibat',1)
                    ->where('hienthi',1)
                    ->where('id_bomon',6)
                    ->where('tintuc',1)->orderby('created_at','DESC')
                    ->take(9)->get();

    $Sukien=Tintuc::where('noibat',1)->where('hienthi',1)
                                    ->where('tintuc',0)->where('id_bomon',6)
                                    ->orderby('created_at','DESC')->get();

    $Doitac=LKweb::where('type','doitac')->where('hienthi',1)->get();

  	return view('User.Page.Trangchu',
      [
        'Vechungtoi'=>$Vechungtoi,
        'Tintuc'=>$Tintuc,
        'title'=>'Trang Chủ',
        'Sukien'=>$Sukien,
        'Doitac'=>$Doitac,
        'lang'=>$lang
      ]);

  }

  public function tuyensinh(){
          $lang=Session::get('language');

          Carbon\Carbon::setLocale(Session::get('language'));

  		   	$Video_tuyensinh=Video::where('hienthi',1)->where('type','tuyensinh')->orderBy('stt')->get();
          $Tintuyensinh=Dm_tintuc::where('ten_vi','Tuyển sinh')->first();


  		   	return view('User.Page.Tuyensinh',
            [
              'Video_tuyensinh'=>$Video_tuyensinh,
              'Tintuyensinh'=>$Tintuyensinh,
              'lang'=>$lang
            ]);
  }

  public function tuyensinhdetail($ten,$id){

  			  $lang=Session::get('language');

          Carbon\Carbon::setLocale($lang);

  		   	$Chuongtrinh=Chuongtrinh::where('id_bacdaotao',$id)->where('hienthi',1)->get();

  		   	$Sologan=Bacdaotao::select('sologan_'.$lang.' as sologan','hinhanh')->where('id',$id)->get()->first();

          $Tintuyensinh=Dm_tintuc::where('ten_vi','Tuyển sinh')->first();

  		   	return view('User.Page.Tuyensinhdetail',
            [
              'Chuongtrinh' => $Chuongtrinh,
              'Sologan'=>$Sologan,
              'Tintuyensinh'=>$Tintuyensinh,
              'lang'=>$lang
            ]);
  }


public function chuongtrinh($ten,$id){

  $lang=Session::get('language');

  Carbon\Carbon::setLocale(Session::get('language'));

  $Chuongtrinh=Chuongtrinh::where('id',$id)->get()->first();

  $Tohop=CT_xettuyen::where('id_chuongtrinh',$id)->get();

  $Chuongtrinhlq=Chuongtrinh::where('id','<>',$id)->where('hienthi',1)->orderby('ten_vi')->get();

  $Monhoc=Mon::whereHas('ctdaotao',function($query)use($id){
          $query->where('id_chuongtrinh',$id);
    })->get();


    $cdio=CDR1::with('cdr2')->get();
    foreach ($cdio as  $x) {
        foreach ($x->cdr2 as  $y) {
          $cd2=CDR2::where('maCDR2',$y->maCDR2)->with('cdr3')->get();
          $y=$cd2;
        }
    }
    $po=program_object::where('id_ct',$id)->first();
    $abet=chuan_abet::get();

     		return view('User.Page.Chuongtrinh',
          [
            'Chuongtrinh'=>$Chuongtrinh,
            'Tohop'=>$Tohop,
            'Monhoc'=>$Monhoc,
            'Chuongtrinhlq'=>$Chuongtrinhlq,
            'lang'=>$lang,'ABET'=>$abet,
            'PO'=>$po,
            'CDIO'=>$cdio
          ]);
  }

public function themhoso(){
  $lang=Session::get('language');
  return view('User.Page.Taohoso',['lang'=>$lang]);
}

public function gioithieu($ten,$id){
  $lang=Session::get('language');

  Carbon\Carbon::setLocale(Session::get('language'));

  $Gioithieu_detail=About::where('id',$id)->first();

  $Gioithieu_lq=About::where('id','<>',$id)->where('id_bomon',$Gioithieu_detail->id_bomon)->orderBy('created_at','desc')->get();

  return view('User.Page.About',
    [
      'Gioithieu_detail'=>$Gioithieu_detail,
      'Gioithieu_lq'=>$Gioithieu_lq,
      'title'=>$Gioithieu_detail->title,
      'Description'=>$Gioithieu_detail->description,
      'lang'=>$lang
    ]);

}

public function enrollment()
{
  Session::put('language','en');
  $lang=Session::get('language');
  Carbon\Carbon::setLocale(Session::get('language'));
  $enroll=Enrollment::where('id_bm',1)->get();
  return view('User.Page.enrollment',['Enrollment'=>$enroll]);
}

public function enrollment_bm($ten,$id)
{
  Session::put('language','en');
  Carbon\Carbon::setLocale(Session::get('language'));
  $Bomon=Bomon::where('id',$id)->first();
  $Aboutbm=About::where('hienthi',1)->where('id_bomon',$id)->get();
  $enroll=Enrollment::where('id_bm',$id)->get();
  return view('User.Page.enrollment_bm', ['Bomon'=>$Bomon,
  'Aboutbm'=>$Aboutbm,
  'Enrollment'=>$enroll]);
}

public function tintucdetail($ten,$id){
      $lang=Session::get('language');

      Carbon\Carbon::setLocale(Session::get('language'));

  		$Tintuc_detail=Tintuc::find($id);

      $Tintuc_detail->luotxem += 1;

      $Tintuc_detail->save();

  		$Tin_lq=Tintuc::where('id_danhmuc',$Tintuc_detail->id_danhmuc)->where('id','<>',$id)->orderBy('id','desc')->take(5)->get();

  		$Tin_mn=Tintuc::where('hienthi',1)->where('id','<>',$id)->orderBy('created_at','desc')->take(5)->get();

  		$Tin_xn=Tintuc::where('hienthi',1)->where('id','<>',$id)->orderBy('luotxem','desc')->take(5)->get();

  			return view('User.Page.News.NewDetail',
          [
            'tintuc_detail'=>$Tintuc_detail,
            'tin_lienquan'=>$Tin_lq,
            'tin_moinhat'=>$Tin_mn,
            'tin_xemnhieu'=>$Tin_xn,
            'title'=>$Tintuc_detail->title,
            'description'=>$Tintuc_detail->description,
            'lang'=>$lang
          ]);
  }


public function tintuc($ten,$id){

    $lang=Session::get('language');

    Carbon\Carbon::setLocale(Session::get('language'));

   	$Tintuc=Tintuc::where('id_danhmuc',$id)->where('tintuc',1)->where('hienthi',1)->orderby('created_at','DESC')->paginate(6);

   	$Dm_tintuc=Dm_tintuc::where('id',$id)->first();

   	return view('User.Page.News.New',
      [
        'Tintuc'=>$Tintuc,
        'Dmtintuc'=>$Dm_tintuc,
        'title' => $Dm_tintuc->ten,
        'description'=>$Dm_tintuc->description,
        'lang'=>$lang
      ]);
}


  public function bomon($ten,$id){

      $lang=Session::get('language');

      Carbon\Carbon::setLocale(Session::get('language'));

   		$Aboutbm=About::where('hienthi',1)->where('id_bomon',$id)->get();

   		$Bomon=Bomon::where('id',$id)->first();

   		$Tintuc=Tintuc::where('id_bomon',$id)->where('noibat',1)->where('hienthi',1)->take(5)->get();

   		$Chuongtrinh=Chuongtrinh::where('id_bomon',$id)->where('hienthi',1)->get();

   		$Nghiencuunoibat=Detainghiencuu::where('noibat',1)->whereHas('giangvien',function($query)use($id){
        $query->where('id_bomon',$id);
      })->take(5)->get();

      $CT_detai = CT_detai::all();

      $Detaidukien = Detainghiencuu::where('trangthai','Dự kiến')->whereHas('giangvien',function($query)use($id){
        $query->where('id_bomon',$id);
      })->get();

   		return view('User.Page.Bomon',
        [
          'Bomon'=>$Bomon,
          'Tintuc'=>$Tintuc,
          'Chuongtrinh'=>$Chuongtrinh,
          'Tintuc'=>$Tintuc,
          'Aboutbm'=>$Aboutbm,
          'Nghiencuunoibat'=>$Nghiencuunoibat,
          'Detaidukien' => $Detaidukien,
          'CT_detai'=>$CT_detai,
          'lang'=>$lang
        ]);

  }


  public function nhansubomon($ten,$id){

   		$lang=Session::get('language');

      Carbon\Carbon::setLocale(Session::get('language'));

   		$Aboutbm=About::where('hienthi',1)->where('id_bomon',$id)->get();

   		$Bomon=Bomon::where('id',$id)->first();

   		$Giangvien=Giangvien::where('id_bomon',$id)->orderBy('stt')->get();

   		return view('User.Page.NhansuBM',
        [
          'Giangvien'=>$Giangvien,
          'Aboutbm'=>$Aboutbm,
          'Bomon'=>$Bomon,
          'lang'=>$lang
        ]);

   	}

  public function gethosokhoahoc($ten,$id){

      $lang=Session::get('language');

      Carbon\Carbon::setLocale(Session::get('language'));

   		$Giangvien=Giangvien::find($id);

   		$Aboutbm=About::where('hienthi',1)->where('id_bomon',$Giangvien->id_bomon)->get();

   		$Bomon=Bomon::where('id',$Giangvien->id_bomon)->first();

   		$Capdetai=Capdetai::orderby('id')->get();
      $CT_detai = CT_detai::all();
      $CT_baibao = CT_baibao::all();
   		return view('User.Page.Hosokhoahoc',
        [
          'Aboutbm'=>$Aboutbm,
          'Bomon'=>$Bomon,
          'Giangvien'=>$Giangvien,
          'Capdetai'=>$Capdetai,
          'CT_detai' => $CT_detai,
          'CT_baibao' => $CT_baibao,
          'lang'=>$lang
        ]);
   	}


   	public function getnghiencuubm($ten,$id){

      $lang=Session::get('language');

      Carbon\Carbon::setLocale(Session::get('language'));

   		$Aboutbm=About::where('hienthi',1)->where('id_bomon',$id)->get();

   		$Bomon=Bomon::where('id',$id)->first();

   		$Nghiencuu=Detainghiencuu::whereHas('giangvien',function($query)use($id){
        $query->where('id_bomon',$id);
      })->orderby('ngaynghiemthu','DESC')->get();

   		$Capdetai=Capdetai::orderBy('stt')->get();

      $CT_detai = CT_detai::all();

   		return view('User.Page.NghiencuuBM',
        [
          'Aboutbm'=>$Aboutbm,
          'Bomon'=>$Bomon,
          'Nghiencuu'=>$Nghiencuu,
          'Capdetai'=>$Capdetai,
          'CT_detai'=>$CT_detai,
          'lang'=>$lang
        ]);

   	}

   	public function getnghiencuu(){

      $lang=Session::get('language');
      Carbon\Carbon::setLocale(Session::get('language'));
   		$Nghiencuu=Detainghiencuu::orderby('ngaynghiemthu','DESC')->get();
   		$Capdetai=Capdetai::orderBy('stt')->get();
      $CT_detai = CT_detai::with('giangvien')->get();
   		return view('User.Page.Nghiencuu',['Nghiencuu'=>$Nghiencuu,'Capdetai'=>$Capdetai,'lang'=>$lang,'CT_detai' => $CT_detai]);

   	}

    public function getduan(){
      $lang=Session::get('language');
      Carbon\Carbon::setLocale(Session::get('language'));
      $Quanlyduan=Quanlyduan::orderby('created_at','DESC')->get();
      return view('User.Page.Duan',['Quanlyduan'=>$Quanlyduan,'lang'=>$lang]);
    }

  public function getcuusinhvienbomonbm($key){

      $lang=Session::get('language');

      Carbon\Carbon::setLocale(Session::get('language'));

   		$Aboutbm=About::where('hienthi',1)->where('id_bomon',$key)->get();

   		$Bomon=Bomon::where('id',$key)->first();

   		$Cuusinhvien = DB::table('ht96_cuusinhvien')
            ->join('ht96_sinhvien', 'ht96_cuusinhvien.id_sinhvien', '=', 'ht96_sinhvien.id')
            ->join('ht96_lop', 'ht96_sinhvien.id_lop', '=', 'ht96_lop.id')
            ->join('ht96_bomon', 'ht96_lop.id_bomon', '=', 'ht96_bomon.id')
            ->select('ht96_cuusinhvien.id as id_csv','ht96_bomon.ten_'.$lang.' as tenbm', 'ht96_lop.tenlop','ht96_lop.nambatdau','ht96_lop.namtotnghiep', 'ht96_sinhvien.*','ht96_cuusinhvien.noicongtac_'.$lang.' as noicongtac','ht96_cuusinhvien.chucvu_'.$lang.' as chucvu','socoquan','diachicoquan')
            ->where('ht96_bomon.id',$key)
            ->where('ht96_cuusinhvien.noibat',1)
            ->where('ht96_sinhvien.totnghiep',1)
            ->get();

   		return view('User.Page.Cuusinhvienbm',['Aboutbm'=>$Aboutbm,'Bomon'=>$Bomon,'Cuusinhvien'=>$Cuusinhvien,'lang'=>$lang]);
   	}


  public function getcuusinhvienbomonbm2($id,$key){

      $lang=Session::get('language');
      Carbon\Carbon::setLocale(Session::get('language'));
   		$Aboutbm=About::where('hienthi',1)->where('id_bomon',$id)->get();
   		$Bomon=Bomon::where('id',$id)->first();
   		  	$Cuusinhvien = DB::table('ht96_cuusinhvien')
              ->join('ht96_sinhvien', 'ht96_cuusinhvien.id_sinhvien', '=', 'ht96_sinhvien.id')
              ->join('ht96_lop', 'ht96_sinhvien.id_lop', '=', 'ht96_lop.id')
              ->join('ht96_bomon', 'ht96_lop.id_bomon', '=', 'ht96_bomon.id')
              ->select('ht96_cuusinhvien.id as id_csv','ht96_bomon.ten_'.$lang.' as tenbm', 'ht96_lop.tenlop','ht96_lop.nambatdau','ht96_lop.namtotnghiep', 'ht96_sinhvien.*','ht96_cuusinhvien.noicongtac_'.$lang.' as noicongtac','ht96_cuusinhvien.chucvu_'.$lang.' as chucvu','socoquan','diachicoquan')
              ->where('ht96_bomon.ten_'.$lang,'like','%'.$key.'%')
              ->where('ht96_cuusinhvien.noibat',1)
              ->where('ht96_sinhvien.totnghiep',1)
              ->orderBy('ht96_bomon.id')
              ->get();
   		return view('User.Page.Cuusinhvienbm',['Aboutbm'=>$Aboutbm,'Bomon'=>$Bomon,'Cuusinhvien'=>$Cuusinhvien,'lang'=>$lang]);
   	}

  public function getcuusinhvienlopbm($id,$key){

      $lang=Session::get('language');
      Carbon\Carbon::setLocale(Session::get('language'));
   		$Aboutbm=About::where('hienthi',1)->where('id_bomon',$id)->get();
   		$Bomon=Bomon::where('id',$id)->first();

   		  	$Cuusinhvien = DB::table('ht96_cuusinhvien')
              ->join('ht96_sinhvien', 'ht96_cuusinhvien.id_sinhvien', '=', 'ht96_sinhvien.id')
              ->join('ht96_lop', 'ht96_sinhvien.id_lop', '=', 'ht96_lop.id')
              ->join('ht96_bomon', 'ht96_lop.id_bomon', '=', 'ht96_bomon.id')
              ->select('ht96_cuusinhvien.id as id_csv','ht96_bomon.ten_'.$lang.' as tenbm', 'ht96_lop.tenlop','ht96_lop.nambatdau','ht96_lop.namtotnghiep', 'ht96_sinhvien.*','ht96_cuusinhvien.noicongtac_'.$lang.' as noicongtac','ht96_cuusinhvien.chucvu_'.$lang.' as chucvu','socoquan','diachicoquan')
              ->where('ht96_lop.tenlop','like','%'.$key.'%')
              ->where('ht96_cuusinhvien.noibat',1)
              ->where('ht96_sinhvien.totnghiep',1)
              ->get();


   		return view('User.Page.Cuusinhvienbm',['Aboutbm'=>$Aboutbm,'Bomon'=>$Bomon,'Cuusinhvien'=>$Cuusinhvien,'lang'=>$lang]);
   	}

  public function getcuusinhvientenbm($id,$key){

      $lang=Session::get('language');
      Carbon\Carbon::setLocale(Session::get('language'));
   		$Aboutbm=About::where('hienthi',1)->where('id_bomon',$id)->get();
   		$Bomon=Bomon::where('id',$id)->first();

   		  	$Cuusinhvien = DB::table('ht96_cuusinhvien')
              ->join('ht96_sinhvien', 'ht96_cuusinhvien.id_sinhvien', '=', 'ht96_sinhvien.id')
              ->join('ht96_lop', 'ht96_sinhvien.id_lop', '=', 'ht96_lop.id')
              ->join('ht96_bomon', 'ht96_lop.id_bomon', '=', 'ht96_bomon.id')
              ->select('ht96_cuusinhvien.id as id_csv','ht96_bomon.ten_'.$lang.' as tenbm', 'ht96_lop.tenlop','ht96_lop.nambatdau','ht96_lop.namtotnghiep', 'ht96_sinhvien.*','ht96_cuusinhvien.noicongtac_'.$lang.' as noicongtac','ht96_cuusinhvien.chucvu_'.$lang.' as chucvu','socoquan','diachicoquan')
              ->where('ht96_sinhvien.tensinhvien','like','%'.$key.'%')
              ->where('ht96_cuusinhvien.noibat',1)
              ->where('ht96_sinhvien.totnghiep',1)
              ->get();


   		return view('User.Page.Cuusinhvienbm',['Aboutbm'=>$Aboutbm,'Bomon'=>$Bomon,'Cuusinhvien'=>$Cuusinhvien,'lang'=>$lang]);

   	}

  public function getcuusinhvien(){

  	$lang=Session::get('language');
    Carbon\Carbon::setLocale(Session::get('language'));
   	$Cuusinhvien = DB::table('ht96_cuusinhvien')
          ->join('ht96_sinhvien', 'ht96_cuusinhvien.id_sinhvien', '=', 'ht96_sinhvien.id')
          ->join('ht96_lop', 'ht96_sinhvien.id_lop', '=', 'ht96_lop.id')
          ->join('ht96_bomon', 'ht96_lop.id_bomon', '=', 'ht96_bomon.id')
          ->select('ht96_cuusinhvien.id as id_csv','ht96_bomon.ten_'.$lang.' as tenbm', 'ht96_lop.tenlop','ht96_lop.nambatdau','ht96_lop.namtotnghiep', 'ht96_sinhvien.*','ht96_cuusinhvien.noicongtac_'.$lang.' as noicongtac','ht96_cuusinhvien.chucvu_'.$lang.' as chucvu','socoquan','diachicoquan')
          ->where('ht96_cuusinhvien.noibat',1)
          ->where('ht96_sinhvien.totnghiep',1)
          ->orderby('id_lop')
          ->get();

   		return view('User.Page.Cuusinhvien',['Cuusinhvien'=>$Cuusinhvien,'lang'=>$lang]);
  }


  public function getcuusinhvienbomon($key){

  	$lang=Session::get('language');
    Carbon\Carbon::setLocale(Session::get('language'));
   	$Cuusinhvien = DB::table('ht96_cuusinhvien')
          ->join('ht96_sinhvien', 'ht96_cuusinhvien.id_sinhvien', '=', 'ht96_sinhvien.id')
          ->join('ht96_lop', 'ht96_sinhvien.id_lop', '=', 'ht96_lop.id')
          ->join('ht96_bomon', 'ht96_lop.id_bomon', '=', 'ht96_bomon.id')
          ->select('ht96_cuusinhvien.id as id_csv','ht96_bomon.ten_'.$lang.' as tenbm', 'ht96_lop.tenlop','ht96_lop.nambatdau','ht96_lop.namtotnghiep', 'ht96_sinhvien.*','ht96_cuusinhvien.noicongtac_'.$lang.' as noicongtac','ht96_cuusinhvien.chucvu_'.$lang.' as chucvu','socoquan','diachicoquan')
          ->where('ht96_bomon.ten_'.$lang,'like','%'.$key.'%')
          ->where('ht96_cuusinhvien.noibat',1)
          ->where('ht96_sinhvien.totnghiep',1)
          ->orderby('id_lop')
          ->get();

   		return view('User.Page.Cuusinhvien',['Cuusinhvien'=>$Cuusinhvien,'lang'=>$lang]);
  }

  public function getcuusinhvienlop($key){

  	$lang=Session::get('language');
    Carbon\Carbon::setLocale(Session::get('language'));
   	$Cuusinhvien = DB::table('ht96_cuusinhvien')
          ->join('ht96_sinhvien', 'ht96_cuusinhvien.id_sinhvien', '=', 'ht96_sinhvien.id')
          ->join('ht96_lop', 'ht96_sinhvien.id_lop', '=', 'ht96_lop.id')
          ->join('ht96_bomon', 'ht96_lop.id_bomon', '=', 'ht96_bomon.id')
          ->select('ht96_cuusinhvien.id as id_csv','ht96_bomon.ten_'.$lang.' as tenbm', 'ht96_lop.tenlop','ht96_lop.nambatdau','ht96_lop.namtotnghiep', 'ht96_sinhvien.*','ht96_cuusinhvien.noicongtac_'.$lang.' as noicongtac','ht96_cuusinhvien.chucvu_'.$lang.' as chucvu','socoquan','diachicoquan')
          ->where('ht96_lop.tenlop','like','%'.$key.'%')
          ->where('ht96_cuusinhvien.noibat',1)
          ->where('ht96_sinhvien.totnghiep',1)
          ->orderby('id_lop')
          ->get();

   		return view('User.Page.Cuusinhvien',['Cuusinhvien'=>$Cuusinhvien,'lang'=>$lang]);
  }

  public function getcuusinhvienten($key){

  	$lang=Session::get('language');
    Carbon\Carbon::setLocale(Session::get('language'));
   	$Cuusinhvien = DB::table('ht96_cuusinhvien')
          ->join('ht96_sinhvien', 'ht96_cuusinhvien.id_sinhvien', '=', 'ht96_sinhvien.id')
          ->join('ht96_lop', 'ht96_sinhvien.id_lop', '=', 'ht96_lop.id')
          ->join('ht96_bomon', 'ht96_lop.id_bomon', '=', 'ht96_bomon.id')
          ->select('ht96_cuusinhvien.id as id_csv','ht96_bomon.ten_'.$lang.' as tenbm', 'ht96_lop.tenlop','ht96_lop.nambatdau','ht96_lop.namtotnghiep', 'ht96_sinhvien.*','ht96_cuusinhvien.noicongtac_'.$lang.' as noicongtac','ht96_cuusinhvien.chucvu_'.$lang.' as chucvu','socoquan','diachicoquan')
          ->where('ht96_sinhvien.tensinhvien','like','%'.$key.'%')
          ->where('ht96_cuusinhvien.noibat',1)
          ->where('ht96_sinhvien.totnghiep',1)
          ->orderby('id_lop')
          ->get();

   		return view('User.Page.Cuusinhvien',['Cuusinhvien'=>$Cuusinhvien,'lang'=>$lang]);
  }


  public function getdaotaobm($tenbomon,$id){

      $lang=Session::get('language');
      Carbon\Carbon::setLocale(Session::get('language'));
      $Aboutbm=About::where('hienthi',1)->where('id_bomon',$id)->get();
      $Bomon=Bomon::where('id',$id)->first();
      $Chuongtrinh=Chuongtrinh::where('id_bomon',$id)->where('hienthi',1)->orderby('stt')->get();
      return view('User.Page.Daotaobm',['Aboutbm'=>$Aboutbm,'Bomon'=>$Bomon,'Chuongtrinh'=>$Chuongtrinh,'lang'=>$lang]);
  }

  public function getctdaotaobm($tenbomon,$idbomon,$tenchuongtrinh,$idchuongtrinh){

      $lang=Session::get('language');
      Carbon\Carbon::setLocale(Session::get('language'));
      $Aboutbm=About::where('hienthi',1)->where('id_bomon',$idbomon)->get();
      $Bomon=Bomon::where('id',$idbomon)->first();
      $Chuongtrinh=Chuongtrinh::where('id',$idchuongtrinh)->first();

      $Mon=CT_daotao::where('id_chuongtrinh',$idchuongtrinh)->get();

      $Chuongtrinhlq=Chuongtrinh::where('id','<>',$idchuongtrinh)->where('id_bomon',$idbomon)->where('hienthi',1)->get();

        $arr=array();$i=0;
        if(count($Mon)>0){
          foreach ($Mon as $Mo){
            $arr[$i]=$Mo->id_mon;
            $i++;
          }
        }

        $Mon2=Mon::whereIn('id',$arr)->get();
      
      $cdio=CDR1::with('cdr2')->get();
      foreach ($cdio as  $x) {
          foreach ($x->cdr2 as  $y) {
            $cd2=CDR2::where('maCDR2',$y->maCDR2)->with('cdr3')->get();
            $y=$cd2;
          }
      }
      $po=program_object::where('id_ct',$idchuongtrinh)->first();
      $abet=chuan_abet::get();
      return view('User.Page.CTdaotaobm',['Aboutbm'=>$Aboutbm,'Bomon'=>$Bomon,
      'Chuongtrinh'=>$Chuongtrinh,'Mon2'=>$Mon2,
      'Chuongtrinhlq'=>$Chuongtrinhlq,'lang'=>$lang,'ABET'=>$abet,
      'PO'=>$po,
      'CDIO'=>$cdio]);
  }


  public function getdaotao($ten,$id){

      $lang=Session::get('language');
      Carbon\Carbon::setLocale(Session::get('language'));
      $Chuongtrinh=Chuongtrinh::where('id_bacdaotao',$id)->where('hienthi',1)->orderby('id_bomon')->orderby('stt')->get();
      return view('User.Page.Daotao',['Chuongtrinh'=>$Chuongtrinh,'lang'=>$lang]);
  }

  public function getctdaotao($tenchuongtrinh,$idchuongtrinh){ //--chinh o day
      $lang=Session::get('language');
      Carbon\Carbon::setLocale(Session::get('language'));
      $Chuongtrinh=Chuongtrinh::where('id',$idchuongtrinh)->first();
      $Mon=CT_daotao::where('id_chuongtrinh',$idchuongtrinh)->get();

      $Chuongtrinhlq=Chuongtrinh::where('id','<>',$idchuongtrinh)->where('hienthi',1)->orderby('id_bomon')->get();
        $arr=array();$i=0;
        if(count($Mon)>0){
          foreach ($Mon as $Mo){
            $arr[$i]=$Mo->id_mon;
            $i++;
          }
        }
        $Mon2=Mon::whereIn('id',$arr)->get();

        $cdio=CDR1::with('cdr2')->get();
        foreach ($cdio as  $x) {
            foreach ($x->cdr2 as  $y) {
              $cd2=CDR2::where('maCDR2',$y->maCDR2)->with('cdr3')->get();
              $y=$cd2;
            }
        }
      $po=program_object::where('id_ct',$idchuongtrinh)->first();
      $abet=chuan_abet::get();
      return view('User.Page.CTdaotao',['Chuongtrinh'=>$Chuongtrinh,'Mon2'=>$Mon2,
      'Chuongtrinhlq'=>$Chuongtrinhlq,'lang'=>$lang,'PO'=>$po,'ABET'=>$abet,
      'CDIO'=>$cdio]);
  }

  public function getSinhvien(){
    $lang=Session::get('language');
    Carbon\Carbon::setLocale(Session::get('language'));
    $DM_thongbao=Dm_thongbao::where('hienthi',1)->get();
    $Bomon=Bomon::where('id','<>',6)->orderby('ten_vi')->get();
    $Lop=Lop::where('ngoaikhoa',0)->orderby('malop')->get();
    $Bieumau=Bieumau::orderby('stt')->get();
    return view('User.Page.Sinhvienset',['DM_thongbao'=>$DM_thongbao,'Bomon'=>$Bomon,'Lop'=>$Lop,'Bieumau'=>$Bieumau,'lang'=>$lang]);
  }

  public function getChitietsinhvien($id){

    $lang=Session::get('language');
    Carbon\Carbon::setLocale(Session::get('language'));
    $Danhmuc=Dm_thongbao::find($id);
    $Danhmuc2=Dm_thongbao::where('id','<>',$id)->where('hienthi',1)->get();
    return view('User.Page.Danhmucsinhvienset',['Danhmuc'=>$Danhmuc,'Danhmuc2'=>$Danhmuc2,'lang'=>$lang]);
  }

  public function getChitietsinhvienbaiviet($id){

    $lang=Session::get('language');
    Carbon\Carbon::setLocale(Session::get('language'));
    $Thongbao=Thongbao::find($id);
    $Thongbao->luotxem=$Thongbao->luotxem+1;
    $Thongbao->save();
    Carbon\Carbon::setLocale(Session::get('language'));
    $Thongbaolienquan=Thongbao::where('id','<>',$id)->where('id_danhmuc',$Thongbao->id_danhmuc)->where('hienthi',1)->take(3)->orderby('stt')->get();
    $Thongbaoxemnhieu=Thongbao::where('id','<>',$id)->where('hienthi',1)->orderby('luotxem')->take(3)->get();
    return view('User.Page.baivietsinhvienset',['Thongbao'=>$Thongbao,'Thongbaoxemnhieu'=>$Thongbaoxemnhieu,'Thongbaolienquan'=>$Thongbaolienquan,'lang'=>$lang]);
  }

  public function hoidap(){

    $lang=Session::get('language');
    Carbon\Carbon::setLocale(Session::get('language'));
    $Chude=Chude::orderby('stt')->get();
    $Cauhoithuonggap=Cauhoi::where('view',1)->orderby('created_at')->take(5)->get();
    return view('User.Page.hoidap',['Chude'=>$Chude,'Cauhoithuonggap'=>$Cauhoithuonggap,'lang'=>$lang]);
  }

  public function posthoidap(AjaxRequest $request){

      $lang=Session::get('language');
      Carbon\Carbon::setLocale(Session::get('language'));
      $Cauhoi=new Cauhoi();
      $max=Cauhoi::max('id');
      $Cauhoi->stt=$max+1;
      $Cauhoi->noibat=0;
      $Cauhoi->ten=$request->ten;
      $Cauhoi->email=$request->email;
      $Cauhoi->id_chude=$request->chude;
      $Cauhoi->noidung=$request->noidung;
      $Cauhoi->traloi="";
      $Cauhoi->save();

      $max=Cauhoi::max('id');
      $Cauhoi2=Cauhoi::find($max);
      $giangvien=Phancongtraloi::where('id_chude',$request->chude)->get();

          Mail::send('Email.hoidaptonguoihoi', array('name'=>$request->ten,'email'=>$request->email, 'content'=>$request->noidung), function($message) use ($Cauhoi2,$giangvien){
              $message->from('ktcn@tvu.edu.vn',"Khoa Kỹ thuật và Công nghệ");
            $message->to($Cauhoi2->email, $Cauhoi2->ten)->subject('Hỏi đáp Sinh viên');
        });

          if(count($giangvien)>0){

               Mail::send('Email.hoidaptogiangvien', array('name'=>$request->ten,'email'=>$request->email, 'content'=>$request->noidung), function($message) use ($giangvien){
                    foreach ($giangvien as $gv) {
                        $message->from('ktcn@tvu.edu.vn',"Khoa Kỹ thuật và Công nghệ");
                        $message->to($gv->giangvien->email, 'Visitor')->subject('Hỏi đáp Sinh viên');
                    }

            });
          }


      return redirect('hoi-dap.html')->with('thongbao2','Câu hỏi của bạn đã được gỡi!!! Ban tư vấn sẽ trả lởi trong thời gian sớm nhất');
  }


  public function bantuvan($ten,$id){
      $lang=Session::get('language');
      Carbon\Carbon::setLocale(Session::get('language'));
      $Aboutbm=About::where('hienthi',1)->where('id_bomon',$id)->get();
      $Bomon=Bomon::where('id',$id)->first();
      $Bantuvan=Bantuvan::where('id_bomon',$id)->orderby('stt')->get();
      return view('User.Page.Bantuvan',['Bantuvan'=>$Bantuvan,'Aboutbm'=>$Aboutbm,'Bomon'=>$Bomon,'lang'=>$lang]);
  }


  public function CountOnline(){

      		$locktime       =  15;
  		    $initialvalue   =    1;
  		    $records        =    100000;

  		    $s_today        =    1;
  		    $s_yesterday    =    1;
  		    $s_all          =    1;
  		    $s_week         =    1;
  		    $s_month        =    1;

  		    $s_digit        =    1;
  		    $disp_type      =     'Mechanical';

  		    $widthtable     =    '60';
  		    $pretext        =     '';
  		    $posttext       =     '';
  		    $locktime       =    $locktime * 60;
  		    // Now we are checking if the ip was logged in the database. Depending of the value in minutes in the locktime variable.
  		    $day            =    date('d');
  		    $month          =    date('m');
  		    $year           =    date('Y');
  		    $daystart       =    mktime(0,0,0,$month,$day,$year);
  		    $monthstart     =    mktime(0,0,0,$month,1,$year);
  		    // weekstart
  		    $weekday        =    date('w');
  		    $weekday--;
  		    if ($weekday < 0)    $weekday = 7;
  		    $weekday        =    $weekday * 24*60*60;
  		    $weekstart      =    $daystart - $weekday;
  		    $now            =    time();
  		    $ip             =    $_SERVER['REMOTE_ADDR'];

  		    $t = Counter::count();
  		    $tongtruycap   =    $t;
  		    if ($tongtruycap !== NULL) {$tongtruycap += $initialvalue;}
  		    else {$tongtruycap = $initialvalue;}


  		    // Delete old records
  		    $temp = $tongtruycap - $records;
  		    if ($temp>0){Counter::where('id', '<', $temp)->delete();}
  		     	$items=Counter::where('ip', '=', $ip)->where('tm','>',$now-$locktime)->get();

  		    if (count($items) == 0){
            $c=new Counter();
            $c->tm=$now;
            $c->ip=$ip;
            $c->save();
          }

  		    $online =Counter::where('tm', '>', $now-$locktime)->count();

  		    $homnay=Counter::where('tm', '>', $daystart)->count();
  		    $trongtuan = Counter::where('tm', '>=', $weekstart)->count();
  		    $trongthang =Counter::where('tm', '>=', $monthstart)->count();

  		    view()->share('online',$online);
  		    view()->share('homnay',$homnay);
  		    view()->share('trongthang',$trongthang);
  		    view()->share('tongtri',$t);
      		}



  public function chitietdetai($id){
    $Detainghiencuu = Detainghiencuu::find($id);
    return view('User.Page.Chitietdetai',['Detainghiencuu' => $Detainghiencuu]);
  }

  public function chitietduan($ten,$id){
    $Quanlyduan = Quanlyduan::find($id);
    return view('User.Page.chitietduan',['Quanlyduan' => $Quanlyduan]);
  }

  public function chitietbaibao($id){
    $Baibaokhoahoc = Baibaokhoahoc::find($id);
    return view('User.Page.Chitietbaibao',['Baibaokhoahoc' => $Baibaokhoahoc]);
  }

  public function getnhomnghiencuu($ten,$id_nhom){
    $Nhom =Nhomnc::find($id_nhom);
    $Baocao = Baocaonc::whereHas('ct_nhom',function($query)use($id_nhom){
      $query->where('id_nhom',$id_nhom);
    })->get();
    return view('User.Page.Chitietnhom',['Nhom' => $Nhom,'Baocao' => $Baocao]);
  }


  public function view_dangKyCapBangDiem()
	{
		return view('User.Page.dang_ki_cap_bang_diem');
	}

	public function post_dangKyCapBangDiem(Request $request)
	{
    #ngocha_dtvt2006@tvu.edu.vn
    Mail::send('Email.DangKiXinBangDiem', array('hoTen'=>$request->hoTen,'maSV'=>$request->maSV,"hocKi"=>$request->hocKi,"namHoc"=>$request->namHoc,
    'maLop' => $request->maLop,'sdt'=>$request->sdt,'email'=>$request->email,"lyDo"=>$request->lyDo), function($message) use ($request){
      $message->from('smartfarmcoop@gmail.com',"From SET");
      $message->to('ngocha_dtvt2006@tvu.edu.vn')->subject('XIN CẤP BẢNG ĐIỂM RÈN LUYỆN -'.$request->hoTen.'-'.$request->maSV.'-'.$request->maLop);
    });
    $thongbao='Thông tin đã được gửi đến văn phòng khoa! Cán bộ sẽ gửi phản hồi trong thời gian sớm nhất.';
    return redirect()->back()->with('thongbao',$thongbao);
	}


  }
