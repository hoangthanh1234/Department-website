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
    dd($listall);
   
   $population = $this->createpopulation($socathe,$listall,$Sessiongiangvien);
   if(is_array($population) == false ){

     	$Mon = Mon::find($population);
   		return  redirect('set_admin/phan-cong-giang-day-giang-vien/list/'.$id_bomon.'/'.$namhoc.'.html')->with('canhbao','Môn "'.$Mon->ten_vi.' ('.$Mon->bacdaotao->ten_vi.')" không thuộc sở trường của giảng viên nào vui lòng kiểm tra lại');
   }     	
     
    $ketqua = $this->checkone($population,$maxpoint,$namhoc);
  
     $this->adddata($ketqua,$namhoc);  
     dd($ketqua);
    // Session::forget("listgiangvien"); 
    // Session::forget("listlop"); 
    if($Sessionlopngoaikhoa != null) Session::forget("listgiangvien"); 
    // $this->goimail(); 
  }else die("Vui lòng nhập danh sách giảng viên và môn học");

}

public function checkone($population,$maxpoint,$namhoc){

  $check=$this->gennectic($population,$maxpoint,$namhoc);  
  $suitable = $check['suitable'];
  $population = $check ['population'];     
  $ok=$check['value'];  
  $dem = 1;

  if($ok == 1){   
    
     $key = $check['key'];
     $suitabletwo = array(); 
     for ($i=0; $i < count($population); $i++) 
         $suitabletwo[$i] = ($this->evalutetwo($population[$i]));    

     $index = $this->findmin($suitabletwo);
     return $population[$index];   
  }
  else{

     do{    
        $dem++;           
        $population = $this->recombination($population,$suitable);       
        $checknew = $this->gennectic($population,$maxpoint,$namhoc); 
        $population = $checknew['population'];
        $ok = $checknew['value'];
        $suitable = $checknew['suitable'];  
        for ($sui1=0; $sui1 < count($suitable) ; $sui1++)
            echo $suitable[$sui1].'<br>';          
          echo "<hr>";            
        if($ok==1){            
            $key = $checknew['key'];
            $suitabletwo = array(); 
            for ($j=0;$j<count($population);$j++)
              $suitabletwo[$j] = ($this->evalutetwo($population[$j])); 

            $index = $this->findmin($suitabletwo);
            return $population[$index];                                  
        }
      }while($ok==0);

  } 
}


public function gennectic($population,$maxpoint,$namhoc){
  $suitable = array();  
  $dem = 0;
  for ($i=0;$i<count($population);$i++)
    $suitable[$i] = ($this->evaluteone($population[$i])) + ($this->cantren($population[$i],$maxpoint,$namhoc)) + ($this->canduoi($population[$i],$namhoc));

  $arrcheck = array_count_values($suitable); 

  $newpopulation = array();

  foreach ($arrcheck as $key => $value){
    if($value==count($population)){ 
      for ($i=0;$i<$value;$i++){ 
        for ($j=0;$j<count($suitable);$j++){ 
          if($suitable[$j] == $key)
            $newpopulation[$i] = $population[$j];
        }
      }     
      return $check = array('value' => 1,'population' => $newpopulation,'suitable' => $suitable,'key' => $key);
    }
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
			$gv = array_random($Sessiongiangvien);
			$arrcheck = array();
			do{				

				if(in_array($gv,$arrcheck) == false)
					array_push($arrcheck,$gv);

				if(count($arrcheck) >= count($Sessiongiangvien) && in_array($gv,$giangviensotruong) == false)					
					return $list[1];

				$gv = array_random($Sessiongiangvien);			

			}while(in_array($gv,$giangviensotruong) == false && count($arrcheck) < count($Sessiongiangvien));

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
			$dem += 100;
	}
	
	return $dem;
}

public function canduoi($chromosome,$namhoc){
	$dem = 0;
	foreach ($chromosome as $chr){
		$hours = 0;
		for ($i=1;$i<count($chr);$i++) 			
			$hours+=$this->getMonohours($chr[$i]['mon']);

		if($hours < ($this->gethours($chr[0]) - $this->getrealhours($chr[0],$namhoc)))
			$dem+=10;
	}	
	return $dem;
}

public function cantren($chromosome,$maxpoint,$namhoc){
	$dem = 0;
	foreach ($chromosome as $chr){

		$hours = 0;

		for ($i=1;$i<count($chr);$i++) 			
			$hours+=$this->getMonohours($chr[$i]['mon']);

		if($hours > ($maxpoint - $this->getrealhours($chr[0],$namhoc)))
			$dem+=100;
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

public function recombination($population,$suitable){

  $avg = floor($this->avg($suitable)); 
  for ($i=0;$i<count($suitable);$i++){
   if($suitable[$i]>=$avg){    
      $index = $this->getindex($suitable);
      $population[$i] = $this->laighep($population[$index[0]],$population[$index[1]]);              
    }        
  }

  return $population;
}

public function getindex($suitable){

  $avg = $this->avg($suitable); 
  $a = $b = $avg+10;
  $indexa = 0;
  $indexb = 0;
  do{
     $indexa = rand(0,count($suitable)-1);
     $indexb = rand(0,count($suitable)-1);
     $a = $suitable[$indexa];     
     $b = $suitable[$indexb];     
   }while ($a>$avg && $b>$avg);

   $index = array($indexa,$indexb);
   return $index;
}

public function laighep($chromosome1,$chromosome2){  
 
  $point = rand(0,count($chromosome1)-1);
   
   for ($j=0;$j<count($chromosome1);$j++){ 
     if($j<$point)
      $chromosome1[$j] = $chromosome2[$j];     
   }
   
  $this->mutation($chromosome1);
  return $chromosome1;
}

public function mutation($chromosome){  	

		$giangvienthieugio = $this->giangvienthieugio($chromosome);

	    if($giangvienthieugio != 0){

	      $giangviendugio = $this->timdugiomax($this->giangviendugio($chromosome,$giangvienthieugio));   
	      $index = -1;
	      $arrtam = array();
	      $check = false;

	        for ($i=0;$i<count($chromosome);$i++){ 
	            if($chromosome[$i][0] == $giangviendugio){
	              for ($j=1;$j<count($chromosome[$i]);$j++){ 
	                 if(in_array($giangvienthieugio,$this->listgiangviensotruong($chromosome[$i][$j]['mon']))==true){
	                      $arrtam = $chromosome[$i][$j];
	                      $index = $i;
	                      unset($chromosome[$i][$j]);
	                      $chromosome[$i] = array_values($chromosome[$i]);
	                      $check = true;
	                      break;
	                      
	                  }
	              }             
	            } 
	            if($check == true)
	              break;         
	        }

	       for ($k=0;$k<count($chromosome);$k++){
	          if($chromosome[$k][0] == $giangvienthieugio && count($arrtam) > 0)
	             array_push($chromosome[$k],$arrtam);       
	       }
	          
	    }
	     return $chromosome;
} 

public function giangvienthieugio($chromosome){

	$giangvien = 0;
	foreach ($chromosome as $chr){
		$hours = 0;
		$hoursgv = $this->gethours($chr[0]);
		for ($i=1;$i<count($chr);$i++)
			$hours += $this->getMonohours($chr[$i]['mon']);
		if($hours < $hoursgv){
			$giangvien = $chr[0];
			break;
		}	
	}
	return $giangvien;
}

public function timdugiomax($arrgiangvien){
	$max = 1;
	$giangvien = 0;
	foreach ($arrgiangvien as $arrgv){
		if($arrgv[1] > $max){
			$max = $arrgv[1];
			$giangvien = $arrgv[0];
		}
	}
	return $giangvien;
}

public function giangviendugio($chromosome,$giangvienthieugio){
	$giangvien = array();
	foreach ($chromosome as $chr){
		$hours = 0;
    $listmon = array();
		$hoursgv = $this->gethours($chr[0]);
		for ($i=1;$i<count($chr);$i++){
			$hours += $this->getMonohours($chr[$i]['mon']);
      if(in_array($chr[$i]['mon'],$listmon) == false)
          array_push($listmon,$chr[$i]['mon']);
    }
  
		if($hours > $hoursgv && $this->checktrue($listmon,$giangvienthieugio) == true)
			 array_push($giangvien,$arrnew = array($chr[0],$hours));
			
	}
	return $giangvien;
}

public function checktrue($listmon,$giangvienthieugio){

  foreach ($listmon as $list){
      foreach ($this->listgiangviensotruong($list) as $giangvienst){
          if($giangvienst == $giangvienthieugio)
              return true;
      }
  }

  return false;
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
	//$dem = 0;
  foreach ($chromosome as $chr){
	  if(count($chr) > 1){
	  	for ($i=1;$i<count($chr);$i++){ 
	  		//$dem ++;
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
	     // echo $dem;
	    }
	  }    
  }
}







}
