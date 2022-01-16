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
use App\Models\Thoigiantesst;
use App\Models\Bainew;
use Session;
use Carbon\Carbon;
use Excel;
use Mail;
use DateTime;


class PhancongthinhgiangController extends Controller{

public function postPhancong(PhanconggiangdayRequest $request){

    $Sessiongiangvien = Session::get('listgiangvien');
    $Sessionlop = Session::get('listlop');
    $Sessionlopngoaikhoa = Session::get('listlopngoaikhoa');

  if($Sessiongiangvien != null && $Sessionlop != null){
    $maxpoint = $request->diemtoida;
    $socathe = $request->soluong;
    $namhoc = $request->namhoc;
    $id_bomon = $request->id_bomon;
    $listall = $this->createlistall($Sessionlop,$namhoc,$id_bomon);
    $population = $this->createpopulation($socathe,$listall,$Sessiongiangvien);

    if(is_array($population) == false ){

      $Mon = Mon::find($population);
      return  redirect('set_admin/phan-cong-giang-day-giang-vien/list/0/0.html')->with('canhbao','Môn "'.$Mon->ten_vi.' ('.$Mon->bacdaotao->ten_vi.')" không thuộc sở trường của giảng viên nào vui lòng kiểm tra lại');
    }

     $ketqua = $this->checkone($population,$maxpoint,$namhoc,$listall,$Sessiongiangvien);
     $this->adddata($ketqua[1],$namhoc);
     //Session::forget("listgiangvien");
     Session::forget("listlop");
    if($Sessionlopngoaikhoa != null) Session::forget("listgiangvien");
    return redirect('set_admin/phan-cong-giang-day-giang-vien/list/0/0.html')->with('thongbao','Đã phân công thỉnh giảng thành công với số lỗi vi phạm luật là: '.$ketqua[0].'. Bạn có thể chọn năm học và bộ môn để xem kết quả');
  }else die("Vui lòng nhập danh sách giảng viên và môn học");

}

public function insoluong($chromosome){
  $dem = 0;
  foreach ($chromosome as $chr) {
    if(count($chr)>1){
      for ($i=1; $i < count($chr); $i++) {
        $dem++;
      }
    }
  }
  return $dem;
}

public function counttr($chromosome,$listall){

  $container = array();
  foreach ($chromosome as $chr){
    if(count($chr)>1){

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

public function checkone($population,$maxpoint,$namhoc,$listall,$Sessiongiangvien){

  $check=$this->gennectic($population,$maxpoint,$namhoc,$listall);
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
        $checknew = $this->gennectic($population,$maxpoint,$namhoc,$listall);
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

public function gennectic($population,$maxpoint,$namhoc,$listall){
  $suitable = array();

  for ($i=0;$i<count($population);$i++)
    $suitable[$i] = ($this->evaluteone($population[$i])) + ($this->cantren($population[$i],$maxpoint,$namhoc)) + ($this->canduoi($population[$i],$namhoc));

  	$arrcheck = array_count_values($suitable);

  foreach ($arrcheck as $key => $value){
    if($value==count($population))
      return $check = array('value' => 1,'population' => $population,'suitable' => $suitable);

  }
   return $check = array('value' => 0,'population' => $population,'suitable' => $suitable);
}

public function createpopulation($n,$listall,$Sessiongiangvien){

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

public function createlistall($Sessionlop,$namhoc,$id_bomon){

  $listall = array();

  $Phancongthinhgiang = Phanconggiangday::where('namhoc',$namhoc) // danh sách các môn được tách ra từ phân công giảng dạy
                                        ->where('trangthai',0)
                                        ->whereHas('lop',function($query)use($id_bomon){
                                          $query->where('id_bomon',$id_bomon);
                                      })->get();

  foreach ($Sessionlop as $ssl){
    $listall = $this->createstring($listall,$ssl['lop'],$ssl['CT_daotao']);
  }

  foreach ($Phancongthinhgiang as $pctg) {
  	$listall = $this->createstring($listall,$pctg->id_lop,$pctg->id_mon);
  }

  return $listall;
}

public function createstring($arr,$id_lop,$stringmon){
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
		if(count($chr)>1){
			for ($i=1;$i<count($chr);$i++){
				if(in_array($chr[0],$this->listgiangviensotruong($chr[$i]['mon'])) == false)
					$dem+=1000;
			}
		}

	}
	return $dem;
}

public function evalutetwo($chromosome){
	$dem = 0;
	foreach ($chromosome as $chr){
		if(count($chr)>3)
			$dem += 1;
	}

	return $dem;
}

public function canduoi($chromosome,$namhoc){
	$dem = 0;
	foreach ($chromosome as $chr){
		if(count($chr) > 1){
			$hours = 0;
			for ($i=1;$i<count($chr);$i++)
				$hours+=$this->getMonohours($chr[$i]['mon']);

			if(($hours + $this->getrealhours($chr[0],$namhoc)) < $this->gethours($chr[0]))
				$dem+=10;
		}
	}
	return $dem;
}

public function cantren($chromosome,$maxpoint,$namhoc){
	$dem = 0;
	foreach ($chromosome as $chr){
		if(count($chr)>1){
			$hours = 0;
			for ($i=1;$i<count($chr);$i++)
				$hours+=$this->getMonohours($chr[$i]['mon']);

			if($hours > ($maxpoint - $this->getrealhours($chr[0],$namhoc)))
				$dem+=100;
		}
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
          do{
            $index = $this->getindex($suitable);
            $population[$i] = $this->laighep($population[$index[0]],$population[$index[1]],$listall,$Sessiongiangvien);
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
	      $Phanconggiangday = new Phanconggiangday();
	      $Phanconggiangday->id_giangvien = $chr[0];
	      $Phanconggiangday->id_mon = $chr[$i]['mon'];
	      $Phanconggiangday->id_lop = $chr[$i]['lop'];
	      $Phanconggiangday->id_hocky = $CT_daotao->id_hocky;
	      $Phanconggiangday->namhoc = $namhoc;
	      $Phanconggiangday->thinhgiang = 1;
	      $Phanconggiangday->save();
	    }
	  }
  }
}

public function xoahet($nam,$id_bomon){
	$Phanconggiangday = Phanconggiangday::where('namhoc',$nam)->where('id_bomon',$id_bomon)->where('thinhgiang',1)->delete();
	echo "OK";
}

public function loaddanhsach($id,$nam){
	$pcgd = Phanconggiangday::find($id);

	$noidung = '';
	  $m=1;
	      $noidung.='<tr>';
	          $noidung.='<td class="text-center">'.$m++.'</td>';
	          $noidung.='<td>'.$pcgd->mon->ten_vi.'</td>';
	          $noidung.='<td class="text-center">'.$pcgd->lop->malop.'</td>';
	          $noidung.='<td class="text-center">';
	            $Monsotruong = Monsotruong::where('id_mon',$pcgd->id_mon)->where('id_giangvien','<>',$pcgd->id_giangvien)->get();
	            $noidung.='<select class="form-control" id="chongiangvienthinhgiang'.$pcgd->id.'">';
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
	          $noidung.='<td class="text-center"><button type="button" class="btn btn-success btn-doithinhgiang" data-id="'.$pcgd->id.'" data-gv="'.$pcgd->id_giangvien.'" data-nam="'.$nam.'">Đổi</button></td>';

	      $noidung.='</tr>';


	  echo $noidung;
}

public function excel($id_bomon,$namhoc){

	$arrgv = array();
	$Phancongthinhgiang = Phanconggiangday::where('namhoc',$namhoc)->where('thinhgiang',1)->orderby('id_giangvien')->get();
	foreach ($Phancongthinhgiang as $pctg) {
		if(in_array($pctg->id_giangvien,$arrgv) == false)
			array_push($arrgv,$pctg->id_giangvien);
	}

  $Giangvien = Giangvien::where('id_bomon',$id_bomon)->whereIn('id',$arrgv)->orderby('id_trinhdo')->get();



  Excel::create('Phancongthinhgiang', function($excel) use($Phancongthinhgiang,$Giangvien){

      $excel->sheet('Danh phân công giảng dạy', function($sheet) use($Phancongthinhgiang,$Giangvien){

      $sheet->setFontFamily('Times New Roman');

      $sheet->getStyle('J6')->getAlignment()->setWrapText(true);
      $sheet->getStyle('K6')->getAlignment()->setWrapText(true);
      $sheet->getStyle('F')->getAlignment()->setWrapText(true);
      $sheet->cells('A5:P5', function($cells){
        $cells->setFontSize(14);
        $cells->setFontColor('#840e1d');
      });

      $sheet->setAllBorders('dashDot');

      $sheet->setWidth(array(
          'A'     =>  5,
          'B'     =>  25,
          'C'     =>  15,
          'D'     =>  20,
          'H'     =>  10,
          'I'     =>  10,
          'J'     =>  15,
          'K'     =>  15,
          'L'     =>  10,
          'G'     =>  15,
          'E'     =>  25,
          'F'     =>  28,
          'P'     =>  15,
      ));

      $sheet->cells('A:E', function($cells){
         $cells->setValignment('center');
         $cells->setAlignment('center');
      });

       $sheet->cells('G:L', function($cells){
         $cells->setValignment('center');
         $cells->setAlignment('center');
      });

    $sheet->loadView('Admin.Khoa.Excel.Phancongthinhgiang',['Phancongthinhgiang' => $Phancongthinhgiang,'Giangvien'=>$Giangvien]);
    })->export('xlsx');

  });
}

public function checkxoaphancong($id){
	$Phanconggiangday = Phanconggiangday::find($id);

	$hoursnow = 0;
	$hoursdelete = $this->getMonohours($Phanconggiangday->id_mon);
	$hoursgiangvien = $this->gethours($Phanconggiangday->id_giangvien);

	$Phanconggiangdaynow = Phanconggiangday::where('id_giangvien',$Phanconggiangday->id_giangvien)->get();

	foreach ($Phanconggiangdaynow as $pcgdnow)
		$hoursnow+=$this->getMonohours($pcgdnow->id_mon);

	if(($hoursnow - $hoursdelete) < $hoursgiangvien)
		echo "0";
	else
		echo "1";
}




}
