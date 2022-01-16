<?php

namespace App\Http\Controllers\Admin\Khoa;

use Illuminate\Http\Request;
use App\Http\Requests\PhanconggiangdayRequest;
use App\Http\Controllers\Controller;
use App\Models\Mon;
use App\Models\Chuongtrinh;
use App\Models\Bomon;
use App\Models\Giangvien;
use App\Models\Lop;
use App\Models\CT_daotao;
use App\Models\CT_tuchon;
use App\Models\Monsotruong;
use App\Models\Phanconggiangday;
use App\Models\Chedogiochuan;
use App\Models\Thoigiantest;
use App\Models\Bainew;
use Session;
use Carbon\Carbon;
use Excel;
use Mail;
use DateTime;


class PhanconggiangdaygiangvienController extends Controller{

public function getList($id_bomon,$namhoc){
  $Bomon = Bomon::orderby('ten_vi')->get();
  $name = Bomon::find($id_bomon);
  $Giangvien = Giangvien::where('id_bomon',$id_bomon)->get();
  $Phanconggiangday = Phanconggiangday::where('id_bomon',$id_bomon)->where('namhoc',$namhoc)->get();
  $Chedogiochuan = Chedogiochuan::all();
  $Montachthinhgiang = Phanconggiangday::where('id_bomon',$id_bomon)->where('namhoc',$namhoc)->where('trangthai',0)->get();
  $Phancongthinhgiang = Phanconggiangday::where('id_bomon',$id_bomon)->where('namhoc',$namhoc)->where('thinhgiang',1)->get();
  return view('Admin.Khoa.Phanconggiangday.List',[
    'Bomon' => $Bomon,'namhoc'=>$namhoc,'id_bomon'=>$id_bomon,
    'Giangvien'=>$Giangvien,'Phanconggiangday'=>$Phanconggiangday,
    'Chedogiochuan' => $Chedogiochuan, 'Montachthinhgiang'=>$Montachthinhgiang,
    'name' => $name,'Phancongthinhgiang' => $Phancongthinhgiang
  ]);
}

public function getPhancong(){
  $Bomon = Bomon::all();
  return view('Admin.Khoa.Phanconggiangday.Phanconggiangvien',['Bomon' => $Bomon]);
}

public function loadgiangvien($id){
  $Giangvien = Giangvien::where('id_bomon',$id)->where('id_trinhdo','<>',9)->get();
  $noidung = '';
  $i = 1;
  foreach ($Giangvien as $gv) {
    $noidung.='<li class="list-group-item listgroupone" data-id="'.$gv->id.'">'.$i++.'/  '.$gv->ten.'<i class="fa fa-caret-square-o-right" aria-hidden="true" style="float:right;margin-top:5px;"></i></li>';
  }
  echo $noidung;
}

public function loadgiangvienbac2($id){
  $arr = explode(',',$id);
  $Giangvien = Giangvien::whereIn('id',$arr)->orderby('id_bomon')->get();
  $noidung = '';
  $i = 1;
  foreach ($Giangvien as $gv) {
    $noidung.='<li class="list-group-item listgrouptwo text-right" data-id="'.$gv->id.'">'.$gv->ten.' | '.$i++.'<i class="fa fa-caret-square-o-left" aria-hidden="true" style="float:left;margin-top:5px;"></i></li>';
  }
  echo $noidung;
}

public function addsessiongiangvien($id){

    $Monsotruong = Monsotruong::where('id_giangvien',$id)->get();
    if(count($Monsotruong)>0){
        if(Session::has('listgiangvien')){
          $list = Session::get('listgiangvien');
          if(in_array($id, $list) == false){
            array_push($list,$id);
            Session::forget('listgiangvien');
            Session::put('listgiangvien', $list);
          }
        }else
          Session::push('listgiangvien', $id);

        $listam =  implode(',', Session::get('listgiangvien'));
        echo $listam;
    }else echo "0";


}

public function deletesessiongiangvien($id){
      $list = Session::get('listgiangvien');
      $index = array_search($id, $list);

      if($index !== false){
         unset($list[$index]);
         sort($list);
         Session::forget('listgiangvien');
         Session::put('listgiangvien', $list);
      }

      $listam =  implode(',', Session::get('listgiangvien'));
      echo $listam;
}

public function loadlop($id_bomon){

        $Lop = Lop::where('id_bomon',$id_bomon)->where('totnghiep',0)->where('id_hedaotao',1)->where('ngoaikhoa',0)->get();
        $noidung = '';
        $i = 1;
        foreach ($Lop as $l) {
           $noidung.='<li class="list-group-item listgrouplopone" data-id="'.$l->id.'">'.$i++.'/  '.$l->tenlop.'<i class="fa fa-caret-square-o-right" aria-hidden="true" style="float:right;margin-top:5px;"></i></li>';
        }
        echo $noidung;
}

public function xoadanhsachlop(){
    if(Session::has('listlop'))
        Session::forget('listlop');
}

public function danhsachlop($id_bomon){
  $Lop = Lop::where('id_bomon',$id_bomon)->get();
  $noidung = '';
  $noidung.='<option value="0">Chọn lớp</option>';
  foreach ($Lop as $l){
    $noidung .= '<option value="'.$l->id.'">'.$l->tenlop.'</option>';
  }
  echo $noidung;
}


public function addsessionlop($id){

    $Lop = Lop::find($id);

    $date = Carbon::now();
    $namdahoc = $date->year - $Lop->nambatdau;
    $hocky='';
    if($namdahoc == 0)
        $hocky.='1,2';
    if($namdahoc == 1)
      $hocky.='2,3';
    if($namdahoc == 2)
      $hocky.='3,4';
    if($namdahoc == 3)
      $hocky.='5,6';
    if($namdahoc == 4)
      $hocky.='7,8';

    $arrhocky = explode(',', $hocky);

    $CT_daotao = CT_daotao::where('id_chuongtrinh',$Lop->id_chuongtrinh)
                            ->where('thinhgiang',0)
                            ->whereHas('mon',function($query)use($Lop){
                                    $query->where('id_bomon',$Lop->id_bomon);
                                    $query->whereNotIn('id_nhommon',[6,7]);
                            })
                            ->whereIn('id_hocky',$arrhocky)
                            ->orderby('id_hocky')->get();

    $subjectchoiceone =  CT_tuchon::where('id_lop',$id)->whereIn('id_hocky',$arrhocky)->get();

    $arrfalse = array();
    foreach ($CT_daotao as $ct){
      if($ct->mon->tuchon==1 && $this->findindex($subjectchoiceone,$ct) == false)
        array_push($arrfalse,$ct->id_mon);

    }


    $CT_daotao = CT_daotao::where('id_chuongtrinh',$Lop->id_chuongtrinh)
                            ->where('thinhgiang',0)
                            ->whereHas('mon',function($query)use($Lop){
                                    $query->where('id_bomon',$Lop->id_bomon);
                                    $query->whereNotIn('id_nhommon',[6,7]);
                            })
                            ->whereNotIn('id_mon',$arrfalse)
                            ->whereIn('id_hocky',$arrhocky)
                            ->orderby('id_hocky')->get();

    $stringctdt ='';

    foreach ($CT_daotao as $ctdt)
        $stringctdt .= $ctdt->id_mon.',';

    $stringctdt = rtrim($stringctdt,',');

    $arrayName = array('lop' => $Lop->id,'hocky' => $hocky,'CT_daotao' =>$stringctdt);


    if(Session::has('listlop')){

        $list = Session::get('listlop');
        $arrtam =array();
        $count = count($list);
        for ($i=0; $i < $count ; $i++)
           array_push($arrtam,$list[$i]['lop']);


        if(in_array($id, $arrtam) == false){
            array_push($list,$arrayName);
            Session::forget('listlop');
            Session::put('listlop',$list);

        }

    }else
        Session::push('listlop', $arrayName);

        $listam = Session::get('listlop');
        $listlopnew = '';
        foreach ($listam as $lt) {
           $listlopnew.=$lt['lop'].',';
        }
        $listlopnew = rtrim($listlopnew,',');

        $listmonnew = '';
        foreach ($listam as $lt) {
           $listmonnew.=$lt['CT_daotao'].'|';
        }
        $listmonnew = rtrim($listmonnew,'|');

        $listall = $listlopnew.'&'.$listmonnew;
        echo $listall;
}

public function loaddanhsachchitiet($id){
   $arrone = explode('&',$id);
   $loparr = explode(',',$arrone[0]);
   $monarr = explode('|',$arrone[1]);
    //2,5,6,7,12,61,68&65,70,71,75,78|10,103,78,75,70,65,64,106|66,84,64,63,62,50,76,86,80,69,67,10|101,98,97,84,104,102,100,99,50,62,67,86,69,80|132,144,121,120,131,129,127,125,123|55,88,49,44,45,63,61,59,58,57,54|55,88,49,44,45,63,61,59,58,57,54
   $noidung = '';

   for ($i=0; $i < count($loparr); $i++){
      $Lop = Lop::find($loparr[$i]);
      $noidung.='<div class="panel panel-success">';
      $noidung.='<div class="panel-heading ten2x" style="text-transform:uppercase;">MÔN HỌC THỘC LỚP '.$Lop->tenlop.'</div>';
      $noidung.='<div class="panel-body">';
      $arrmonnew = explode(',',$monarr[$i]);

      $CT_daotao = CT_daotao::where('id_chuongtrinh',$Lop->id_chuongtrinh)
                                ->whereIn('id_mon',$arrmonnew)
                                ->orderby('id_hocky')->get();

    $noidung.='<table class="table table-bordered table-hover example2">';
       $noidung.='<thead>';
            $noidung.='<tr class="bg-top">';
                $noidung.='<th class="text-center" with="3%">STT</th>';
                $noidung.='<th>Tên môn</th>';
                $noidung.='<th class="text-center" with="5%">STC</th>';
                $noidung.='<th class="text-center" with="5%">LT</th>';
                $noidung.='<th class="text-center" with="5%">TH</th>';
                $noidung.='<th class="text-center" with="5%">Tự chọn</th>';
                $noidung.='<th class="text-center" with="10%">Học kỳ</th>';
            $noidung.='</tr>';
       $noidung.='</thead>';
       $noidung.='<tbody>';
       $m=1;
         foreach ($CT_daotao as $ctdt){
              $noidung.='<tr>';
                    $noidung.='<td class="text-center">'.$m++.'</td>';
                    $noidung.='<td>'.$ctdt->mon->ten_vi.'</td>';
                    $noidung.='<td class="text-center">'.$ctdt->mon->stc.'</td>';
                    $noidung.='<td class="text-center">'.$ctdt->mon->lt.'</td>';
                    $noidung.='<td class="text-center">'.$ctdt->mon->th.'</td>';
                    $noidung.='<td class="text-center">';if($ctdt->mon->tuchon==1) $noidung.='Có';else $noidung.='Không';$noidung.='</td>';
                    $noidung.='<td class="text-center">'.$ctdt->hocky->ten.'</td>';
              $noidung.='</tr>';
         }
       $noidung.='</tbody>';
    $noidung.='</table>';

      $noidung.='</div>';
      $noidung.='</div>';
   }
    echo $noidung;
}

//////////////////////////////////////////////////////////////////////////////////////////////


public function loadlopngoaikhoa($id_bomon,$nam){

        $Lop = Lop::where('id_bomon',$id_bomon)
                    ->where('totnghiep',0)
                    ->where('id_hedaotao',1)
                    ->where('ngoaikhoa',1)
                    ->where('namtotnghiep',$nam)
                    ->get();
        $noidung = '';
        $i = 1;
        foreach ($Lop as $l) {
           $noidung.='<li class="list-group-item listgrouplopngoaikhoaone" data-id="'.$l->id.'">'.$i++.'/  '.$l->tenlop.'<i class="fa fa-caret-square-o-right" aria-hidden="true" style="float:right;margin-top:5px;"></i></li>';
        }
        echo $noidung;
}

public function xoadanhsachlopngoaikhoa(){
    if(Session::has('listlopngoaikhoa'))
        Session::forget('listlopngoaikhoa');
}

public function addsessionlopngoaikhoa($id){

    $Lop = Lop::find($id);
    $date = Carbon::now();
    $hocky = '1,2';
    $arrhocky = array(1,2);
    $CT_daotao = CT_daotao::where('id_chuongtrinh',$Lop->id_chuongtrinh)

                            ->whereHas('mon',function($query)use($Lop){
                                    $query->where('id','<>',147);   // đây là môn mẫu
                            })
                            ->whereIn('id_hocky',$arrhocky)
                            ->orderby('id_hocky')->get();



    $stringctdt ='';

    foreach ($CT_daotao as $ctdt)
        $stringctdt .= $ctdt->id_mon.',';

    $stringctdt = rtrim($stringctdt,',');

    $arrayName = array('lop' => $Lop->id,'hocky' => $hocky,'CT_daotao' =>$stringctdt);


    if(Session::has('listlopngoaikhoa')){

        $list = Session::get('listlopngoaikhoa');
        $arrtam =array();
        $count = count($list);
        for ($i=0; $i < $count ; $i++)
           array_push($arrtam,$list[$i]['lop']);


        if(in_array($id, $arrtam) == false){
            array_push($list,$arrayName);
            Session::forget('listlopngoaikhoa');
            Session::put('listlopngoaikhoa',$list);
        }

    }else
        Session::push('listlopngoaikhoa', $arrayName);

        $listam = Session::get('listlopngoaikhoa');
        $listlopnew = '';
        foreach ($listam as $lt) {
           $listlopnew.=$lt['lop'].',';
        }
        $listlopnew = rtrim($listlopnew,',');

        $listmonnew = '';
        foreach ($listam as $lt) {
           $listmonnew.=$lt['CT_daotao'].'|';
        }
        $listmonnew = rtrim($listmonnew,'|');
        $listall = $listlopnew.'&'.$listmonnew;
        echo $listall;
}

public function loaddanhsachchitietngoaikhoa($id){
   $arrone = explode('&',$id);
   $loparr = explode(',',$arrone[0]);
   $monarr = explode('|',$arrone[1]);
   $noidung = '';

   for ($i=0; $i < count($loparr); $i++){
      $Lop = Lop::find($loparr[$i]);
      $noidung.='<div class="panel panel-success">';
      $noidung.='<div class="panel-heading ten2x" style="text-transform:uppercase;">MÔN HỌC THỘC '.$Lop->tenlop.'</div>';
      $noidung.='<div class="panel-body">';
      $arrmonnew = explode(',',$monarr[$i]);

      $CT_daotao = CT_daotao::where('id_chuongtrinh',$Lop->id_chuongtrinh)
                                ->whereIn('id_mon',$arrmonnew)
                                ->orderby('id_hocky')->get();

    $noidung.='<table class="table table-bordered table-hover example2">';
       $noidung.='<thead>';
            $noidung.='<tr class="bg-top">';
                $noidung.='<th class="text-center" with="2%">STT</th>';
                $noidung.='<th>Tên môn</th>';
                $noidung.='<th class="text-center" with="5%">STC</th>';
                $noidung.='<th class="text-center" with="5%">LT</th>';
                $noidung.='<th class="text-center" with="5%">TH</th>';
                $noidung.='<th class="text-center" with="8%">Học kỳ</th>';
            $noidung.='</tr>';
       $noidung.='</thead>';
       $noidung.='<tbody>';
       $m=1;
         foreach ($CT_daotao as $ctdt){
              $noidung.='<tr>';
                    $noidung.='<td class="text-center">'.$m++.'</td>';
                    $noidung.='<td>'.$ctdt->mon->ten_vi.'</td>';
                    $noidung.='<td class="text-center">'.$ctdt->mon->stc.'</td>';
                    $noidung.='<td class="text-center">'.$ctdt->mon->lt.'</td>';
                    $noidung.='<td class="text-center">'.$ctdt->mon->th.'</td>';
                    $noidung.='<td class="text-center">'.$ctdt->hocky->ten.'</td>';
              $noidung.='</tr>';
         }
       $noidung.='</tbody>';
    $noidung.='</table>';

      $noidung.='</div>';
      $noidung.='</div>';
   }
    echo $noidung;
}

//////////////////////////////////////////////////////////////////////////////////////////////


public function postPhancong(PhanconggiangdayRequest $request){

    $Sessiongiangvien = Session::get('listgiangvien');
    $Sessionlop = Session::get('listlop');
    $Sessionlopngoaikhoa = Session::get('listlopngoaikhoa');

  if($Sessiongiangvien != null && $Sessionlop != null){

    $listall = $this->createlistall($Sessionlop,$Sessionlopngoaikhoa);
    $maxpoint = $request->diemtoida;
    $socathe = $request->soluong;
    $namhoc = $request->namhoc;

    $population = $this->createpopulation($socathe,$listall,$Sessiongiangvien);


    if(is_array($population) == false ){
          $Mon = Mon::find($population);
          return  redirect('set_admin/phan-cong-giang-day-giang-vien/phan-cong.html')->with('canhbao','Môn "'.$Mon->ten_vi.' ('.$Mon->bacdaotao->ten_vi.')" không thuộc sở trường của giảng viên nào vui lòng kiểm tra lại');
    }


      $ketqua = $this->checkone($population,$maxpoint,$namhoc,$listall,$Sessiongiangvien);

       $this->adddata($ketqua[1],$namhoc);

       //Session::forget("listgiangvien");
       Session::forget("listlop");
      if($Sessionlopngoaikhoa != null) Session::forget("listgiangvien");

    return redirect('set_admin/phan-cong-giang-day-giang-vien/list/0/0.html')->with('thongbao','Đã phân công giảng dạy thành công với số lỗi vi phạm luật là: '.$ketqua[0].'. Bạn có thể chọn năm học và bộ môn để xem kết quả');
  }else die("Vui lòng nhập danh sách giảng viên và môn học");

}


public function checkone($population,$maxpoint,$namhoc,$listall,$Sessiongiangvien){

  $check=$this->gennectic($population,$maxpoint);
  $suitable = $check['suitable'];
  $population = $check['population'];
  $ok=$check['value'];

  if($ok == 1){

     $suitabletwo = array();
     for ($i=0; $i < count($population); $i++)
         $suitabletwo[$i] = ($this->evalutetwo($population[$i]));

      $index = $this->findmin($suitabletwo);
      $arrreturn = array($suitable[$index],$population[$index]);
      return $arrreturn;
  }
  else{

     do{

        $population = $this->recombination($population,$suitable,$listall,$Sessiongiangvien);
        $checknew = $this->gennectic($population,$maxpoint);
        $population = $checknew['population'];
        $ok = $checknew['value'];
        $suitable = $checknew['suitable'];

        if($ok==1){
            $suitabletwo = array();
            for ($j=0;$j<count($population);$j++)
              $suitabletwo[$j] = ($this->evalutetwo($population[$j]));

            $index = $this->findmin($suitabletwo);
            $arrreturn = array($suitable[$index],$population[$index]);
            return $arrreturn;
        }
      }while($ok==0);

  }
}

public function counttr($chromosome,$listall){
  $container = array();
  foreach ($chromosome as $chr){
    if(count($chr)>1)
    {
      for ($i=1;$i<count($chr);$i++){
        array_push($container,$chr[$i]);
      }
    }
  }

  foreach ($listall as $list){
    $dem = 0;
    for ($j=0;$j<count($container);$j++){
      if($list[0] == $container[$j]['lop'] && $list[1] == $container[$j]['mon'])
        $dem++;
    }
    if($dem > 1 || $dem == 0)
      return false;
  }
  return true;
}

public function gennectic($population,$maxpoint){
  //danh giá từng cá thể quan luật cứng và luật mềm
  //đến khi quần thể hội tụ về một số vi phạm nhất định
  $suitable = array();

  for ($i=0;$i<count($population);$i++)
    $suitable[$i] = ($this->evaluteone($population[$i])) + ($this->cantren($population[$i],$maxpoint)) + ($this->canduoi($population[$i]));

  $arrcheck = array_count_values($suitable);

  foreach ($arrcheck as $key => $value){
    if($value==count($population))
      return $check = array('value' => 1,'population' => $population,'suitable' => $suitable);

  }
   return $check = array('value' => 0,'population' => $population,'suitable' => $suitable);
}

public function createpopulation($n,$listall,$Sessiongiangvien){
  // chuyển sessiongiang viên về mảng với mỗi phần tử là một giảng viên.
  // duyệt qua lần lượt listall dựa vào môn học và tìm giảng viên có sở trường dạy môn đó nếu không tìm được giảng viên thông báo về yêu cầu thêm giảng viên có thể dạy môn đó
  //nếu tìm được thì tại mảng giảng viên thêm môn và lớp đó vào ngay giảng viên đó

  $population = array();

  for ($i=0;$i<$n;$i++){

    $chromosome = array();
    foreach ($Sessiongiangvien as $Sessgv){
      $arrtam = array($Sessgv);
      array_push($chromosome,$arrtam);
    }

    foreach ($listall as $list){
      $arrtam2 = array('lop' => $list[0], 'mon' => $list[1]);
      $giangviensotruong = $this->listgiangviensotruong($list[1]);

      $gv = array_random($giangviensotruong);

    if(in_array($gv,$Sessiongiangvien) == false){
      $container = array();
      array_push($container,$gv);
      do{
        $gv = array_random($giangviensotruong);
        if(in_array($gv,$container) == false && in_array($gv,$Sessiongiangvien) == false)
          array_push($container,$gv);
        if(count($container) == count($giangviensotruong))
          return $list[1];
      }while(in_array($gv,$Sessiongiangvien) == false);
    }

    for ($j=0;$j<count($chromosome);$j++){
      if($chromosome[$j][0] == $gv){
        array_push($chromosome[$j],$arrtam2);
        break;
      }
    }
  }
    $population[$i] = $chromosome;
  }
   return $population;
}

public function createlistall($Sessionlop,$Sessionlopngoaikhoa){

  // chuyển tất cả session lớp và môn về mảng có dạng L1-M1,L1-M2....
  $listall = array();
  foreach ($Sessionlop as $ssl){
    $listall = $this->createstring($listall,$ssl['lop'],$ssl['CT_daotao']);
  }

  if($Sessionlopngoaikhoa != 0){
    if(count($Sessionlopngoaikhoa)>0){
      foreach ($Sessionlopngoaikhoa as $ssl)
        $listall = $this->createstring($listall,$ssl['lop'],$ssl['CT_daotao']);

    }
  }
  return $listall;
}

public function createstring($arr,$id_lop,$stringmon){
  //dùng tác chuỗi session môn thành thành một mảng gồm mỗi phần tử là một môn thuộc lớp truyền vào
  // cuoi cùng trả về mảng với mỗi phần tử có dạng L1-M1,L1-M2...
  $arrmon = explode(',',$stringmon);
  foreach ($arrmon as $am){
    $arrtam = array($id_lop,$am);
    array_push($arr,$arrtam);
  }
  return $arr;
}

public function evaluteone($chromosome){
  $dem = 0;
  foreach ($chromosome as $chr){
    for ($i=1;$i<count($chr);$i++){
      if(in_array($chr[0],$this->listgiangviensotruong($chr[$i]['mon'])) == false)
        $dem+=100;
    }
    if(count($chr) == 1)
      $dem+=100;
  }
  return $dem;
}

public function evalutetwo($chromosome){
  $dem = 0;
  foreach ($chromosome as $chr){
    if(count($chr)>5)
      $dem += 1;
  }

  return $dem;
}

public function canduoi($chromosome){
  $dem = 0;
  foreach ($chromosome as $chr){
    $hours = 0;
    for ($i=1;$i<count($chr);$i++)
      $hours+=$this->getMonohours($chr[$i]['mon']);

    if($hours < $this->gethours($chr[0]))
      $dem+=1;
  }
  return $dem;
}

public function cantren($chromosome,$maxpoint){
  $dem = 0;
  foreach ($chromosome as $chr){

    $hours = 0;

    for ($i=1;$i<count($chr);$i++)
      $hours+=$this->getMonohours($chr[$i]['mon']);

    if($hours > $maxpoint)
      $dem+=1;
  }

  return $dem;
}

public function gethours($id_giangvien){
  $Giangvien = Giangvien::find($id_giangvien);
  $Chedogiochuan = Chedogiochuan::where('id_chucvu',$Giangvien->id_chucvu)->where('id_trinhdo',$Giangvien->id_trinhdo)->first();
  $Giochuan = $Chedogiochuan->giochuan-176;
  return $Giochuan;
}

public function getMonohours($id_mon){
  $Mon = Mon::find($id_mon);
  return (($Mon->lt*15)+($Mon->th*30));
}

public function getrealhours($id_giangvien,$namhoc){
  $Phanconggiangday = Phanconggiangday::where('id_giangvien',$id_giangvien)->where('namhoc',$namhoc)->get();
  $hours = 0;
  foreach ($Phanconggiangday as $pcgd){
    $hours+= ($pcgd->mon->lt*15) + ($pcgd->mon->th*30);
  }
  return $hours;
}

public function recombination($population,$suitable,$listall,$Sessiongiangvien){

  $avg = floor($this->avg($suitable));
  for ($i=0;$i<count($suitable);$i++){
   if($suitable[$i]>=$avg){

      $index = $this->getindex($suitable);
      $population[$i] = $this->laighep($population[$index[0]],$population[$index[1]],$listall,$Sessiongiangvien);

      if($this->counttr($population[$i],$listall) == false || $this->evaluteone($population[$i]) != 0){
        $dem = 0;
          do{

            $index = $this->getindex($suitable);
            $population[$i] = $this->laighep($population[$index[0]],$population[$index[1]],$listall,$Sessiongiangvien);
            $dem++;
            if($dem == count($population)){
              $population[$i] = $population[$index[0]];
              break;
            }

          }while ($this->counttr($population[$i],$listall) == false || $this->evaluteone($population[$i]) != 0);
      }

    }
  }

  return $population;
}

public function getindex($suitable){

  $avg = $this->avg($suitable);

  $indexa = rand(0,count($suitable)-1);
  $indexb = rand(0,count($suitable)-1);
  $a = $suitable[$indexa];
  $b = $suitable[$indexb];

  if($a > $avg || $b > $avg){
    do{
      $indexa = rand(0,count($suitable)-1);
      $indexb = rand(0,count($suitable)-1);
      $a = $suitable[$indexa];
      $b = $suitable[$indexb];
    }while ($a>$avg || $b>$avg);
  }

   $index = array($indexa,$indexb);
   return $index;
}

public function laighep($chromosome1,$chromosome2,$listall,$Sessiongiangvien){

  $point = rand(0,count($chromosome1)-1);
  $pointtwo = rand(0,count($chromosome1)-1);

  for ($i=0;$i<count($chromosome1);$i++){
      if($i<$point)
        $chromosome1[$i] = $chromosome2[$i];
  }

  for ($j=0;$j<count($chromosome1);$j++){
      if($j>$pointtwo)
        $chromosome1[$j] = $chromosome2[$j];
  }

  $this->mutation($chromosome1);
  return $chromosome1;
}

public function mutation($chromosome){

  $times = rand(1,count($chromosome)-1);

  for ($i=0;$i<$times;$i++){

    $point = rand(0,count($chromosome)-1);
    if(count($chromosome[$point]) < 1){
      do{
        $point = rand(0,count($chromosome)-1);
      }while (count($chromosome[$point]) < 1);
    }

    if(count($chromosome[$point]) > 1){
      $rand = rand(1,count($chromosome[$point])-1);
      $listgv = $this->listgiangviensotruong($chromosome[$point][$rand]['mon']);

      $temp = $chromosome[$point][$rand];
      unset($chromosome[$point][$rand]);
      sort($chromosome[$point]);

      $pointtwo = rand(0,count($chromosome)-1);

      if(in_array($chromosome[$pointtwo][0],$listgv) == false){
        do {
          $pointtwo = rand(0,count($chromosome)-1);
        }while (in_array($chromosome[$pointtwo][0],$listgv) == false);
      }

      array_push($chromosome[$pointtwo],$temp);
    }
  }

  return $chromosome;
}

public function avg($suitable){
  $tong = 0;
  $n = count($suitable);
  foreach ($suitable as $sui)
        $tong+=$sui;

   return($tong/$n);
}

public function listgiangviensotruong($id_mon){

  $Monsotruong = Monsotruong::where('id_mon',$id_mon)
                              ->whereHas('giangvien',function($query){
                                    $query->where('id_trinhdo','<>',9);
                            })->get();
  $listsotruong = array();

  foreach ($Monsotruong as $mst)
    array_push($listsotruong,$mst->id_giangvien);

  return $listsotruong;
}

public function findindex($arr,$element){
    foreach ($arr as $value) {
      if($value->id_mon == $element->id_mon && $value->id_hocky == $element->id_hocky)
        return true;
    }
    return false;
}

public function findmin($suitable){
  $min = 100000;
  $index = 0;
  for ($i=0;$i<count($suitable);$i++) {
    if($suitable[$i] < $min){
      $min = $suitable[$i];
      $index = $i;
    }
  }
  return $index;
}

public function adddata($chromosome,$namhoc){

  foreach ($chromosome as $chr){
    if(count($chr) > 1){
      for ($i=1;$i<count($chr);$i++){
        $Lop = Lop::find($chr[$i]['lop']);
        $CT_daotao = CT_daotao::where('id_chuongtrinh',$Lop->id_chuongtrinh)->where('id_mon',$chr[$i]['mon'])->first();
        $Phanconggiangdayold = Phanconggiangday::where('id_lop',$chr[$i]['lop'])->where('id_mon',$chr[$i]['mon'])->get();
        if(count($Phanconggiangdayold) == 0){
          $Phanconggiangday = new Phanconggiangday();
          $Phanconggiangday->id_giangvien = $chr[0];
          $Phanconggiangday->id_mon = $chr[$i]['mon'];
          $Phanconggiangday->id_lop = $chr[$i]['lop'];
          $Phanconggiangday->id_hocky = $CT_daotao->id_hocky;
          $Phanconggiangday->namhoc = $namhoc;
          $Phanconggiangday->save();
        }

      }
    }
  }
}

public function excel($id_bomon,$namhoc){

  $Phanconggiangday = Phanconggiangday::where('namhoc',$namhoc)->where('thinhgiang',0)->orderby('id_giangvien')->get();
  $Giangvien = Giangvien::where('id_bomon',$id_bomon)->orderby('id_trinhdo')->get();
  $Phancongthinhgiang = Phanconggiangday::where('namhoc',$namhoc)->where('thinhgiang',1)->orderby('id_giangvien')->get();
  $Chedogiochuan = Chedogiochuan::all();

  Excel::create('Phanconggiangday', function($excel) use($Phanconggiangday,$Phancongthinhgiang,$Giangvien,$Chedogiochuan){

      $excel->sheet('Danh phân công giảng dạy', function($sheet) use($Phanconggiangday,$Phancongthinhgiang,$Giangvien,$Chedogiochuan){

      $sheet->setFontFamily('Times New Roman');

      $sheet->cells('A5:P5', function($cells){
        $cells->setFontSize(14);
        $cells->setFontColor('#840e1d');
      });

      $sheet->getStyle('L6')->getAlignment()->setWrapText(true);
      $sheet->getStyle('M6')->getAlignment()->setWrapText(true);
      $sheet->getStyle('N6')->getAlignment()->setWrapText(true);
       $sheet->getStyle('A')->getAlignment()->setWrapText(true);
        $sheet->getStyle('C')->getAlignment()->setWrapText(true);
         $sheet->getStyle('D')->getAlignment()->setWrapText(true);
          $sheet->getStyle('F')->getAlignment()->setWrapText(true);

      $sheet->setWidth(array(
          'A'     =>  5,
          'B'     =>  21,
          'C'     =>  15,
          'D'     =>  15,
          'H'     =>  25,
          'I'     =>  10,
          'J'     =>  10,
          'K'     =>  10,
          'L'     =>  18,
          'M'     =>  18,
          'O'     =>  15,
          'N'     =>  15,
          'P'     =>  15,
      ));

       $sheet->cells('A6:O6', function($cells){
         $cells->setValignment('center');
         $cells->setAlignment('center');
      });

      $sheet->cells('A:G', function($cells){
         $cells->setValignment('center');
         $cells->setAlignment('center');
      });

      $sheet->cells('L:P', function($cells){
         $cells->setValignment('center');
         $cells->setAlignment('center');
      });

    $sheet->loadView('Admin.Khoa.Excel.phanconggiangday',['Phanconggiangday' => $Phanconggiangday,'Phancongthinhgiang' => $Phancongthinhgiang,'Giangvien'=>$Giangvien,'Chedogiochuan' => $Chedogiochuan]);
    })->export('xlsx');

  });
}

public function goimail(){

    Mail::send('Email.giaithuathoantat', array('name'=>'thanh'),function($message){
              $message->from('ktcn@tvu.edu.vn',"Khoa Kỹ thuật và Công nghệ");
            $message->to('110114075@sv.tvu.edu.vn')->subject('Thông báo giải thuật hoàn tất');
        });
}

public function exportexcelnew(){

    $Ketqua = Thoigiantest::all();
    Excel::create('KETQUAGT', function($excel)use($Ketqua){
        $excel->sheet('Ket qua giai thuat', function($sheet) use($Ketqua){
        $sheet->setFontFamily('Times New Roman');
        $sheet->loadView('Admin.Khoa.Excel.ketquagiaithuat',['Ketqua' => $Ketqua]);
        })->export('xlsx');
    });

}

public function loadloptwo($id_bomon){

  $Lop = Lop::where('id_bomon',$id_bomon)->where('totnghiep',0)->where('id_hedaotao','<>',1)->where('ngoaikhoa',0)->get();
  $noidung = '';
  $i = 1;
  foreach ($Lop as $l) {
    $noidung.='<li class="list-group-item listgrouplopone" data-id="'.$l->id.'">'.$i++.'/  '.$l->tenlop.'<i class="fa fa-caret-square-o-right" aria-hidden="true" style="float:right;margin-top:5px;"></i></li>';
  }
  echo $noidung;
}

public function loaddanhsachphancong($nam,$giangvien){

  $Giangvien = Giangvien::find($giangvien);
  $Phanconggiangday = Phanconggiangday::where('namhoc',$nam)->where('id_giangvien',$giangvien)->where('trangthai',1)->get();
  $noidung = '';
  $m=1;
  foreach ($Phanconggiangday as $pcgd){
      $noidung.='<tr>';
          $noidung.='<td class="text-center">'.$m++.'</td>';
          $noidung.='<td>'.$pcgd->mon->ten_vi.'</td>';
          $noidung.='<td class="text-center">'.$pcgd->lop->malop.'</td>';
         if($pcgd->id_hocky%2 == 0) $hk = 2; else $hk = 1;
          $noidung.='<td class="text-center">'.$hk.'</td>';
          $noidung.='<td class="text-center">';
            $Monsotruong = Monsotruong::where('id_mon',$pcgd->id_mon)->where('id_giangvien','<>',$pcgd->id_giangvien)->get();
            $noidung.='<select class="form-control" id="chongiangvien'.$pcgd->id.'">';
            $noidung.='<option value="0"> Không thay đổi </option>';
              foreach ($Monsotruong as $mst){
                $noidung.='<option value="'.$mst->id_giangvien.'"';
                if($this->gethours($mst->id_giangvien) > $this->getrealhours($mst->id_giangvien,$nam))
                  $noidung.=' style="background:red;color:white;"';
                $noidung.='>';
                $noidung.=$mst->giangvien->ten.'</option>';
                }
            $noidung.='</select>';
          $noidung.='</td>';
          $noidung.='<td class="text-center"><button type="button" class="btn btn-success btn-doi" data-id="'.$pcgd->id.'" data-gv="'.$pcgd->id_giangvien.'" data-nam="'.$nam.'">Đổi</button></td>';
          $noidung.='<td class="text-center"><button type="button" class="btn btn-danger btn-xoa" data-id="'.$pcgd->id.'" data-giangvien="'.$pcgd->id_giangvien.'">Xóa</button></td>';
      $noidung.='</tr>';
  }

  echo $noidung;
}

public function chuyengiangvien($id_phancong,$id_giangvien){
  $Phanconggiangday = Phanconggiangday::find($id_phancong);
  $Phanconggiangday->id_giangvien = $id_giangvien;
  $Phanconggiangday->save();
}

public function xoahet($nam,$bomon){
  $Phanconggiangday = Phanconggiangday::where('namhoc',$nam)
                                        ->whereHas('giangvien',function($query)use($bomon){
                                          $query->where('id_bomon',$bomon);
                                      })->delete();
}

public function xoaphancong($id){
  $Phanconggiangday = Phanconggiangday::find($id);
  $Phanconggiangday->trangthai = 0;
  $Phanconggiangday->save();
}

public function huyxoaphancong($id){

  $Phanconggiangday = Phanconggiangday::find($id);
  $Phancongthinhgiang = Phanconggiangday::where('id_lop',$Phanconggiangday->id_lop)
                                            ->where('id_mon',$Phanconggiangday->id_mon)
                                            ->where('thinhgiang',1)
                                            ->get();
  if(count($Phancongthinhgiang) > 0){
      echo "0";
  }
  else{
      $Phanconggiangday->trangthai = 1;
      $Phanconggiangday->save();
      echo "1";
  }

}

public function xoadanhsachphancong($namhoc,$id_bomon){
  $Phanconggiangday = Phanconggiangday::where('namhoc',$namhoc)->where('id_bomon',$id_bomon)->delete();
}




}
