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


class PhanconggiangdaygiangvienController extends Controller{
   
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
}

public function deletesessiongiangvien($id){    	    		
    	$list = Session::get('listgiangvien');
    	$index = array_search($id, $list);
	    if($index !== false){
	       unset($list[$index]);
	       //array_shift($list);
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

public function loadloptwo($id_bomon){

  $Lop = Lop::where('id_bomon',$id_bomon)->where('totnghiep',0)->where('id_hedaotao','<>',1)->where('ngoaikhoa',0)->get();
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


public function addsessionlop($id){

    $Lop = Lop::find($id);

    $date = Carbon::now();
    $namdahoc = $date->year - $Lop->nambatdau;
    $hocky='';
    if($namdahoc == 0)
        $hocky.='1,2';
    else{
        $hochientai = $namdahoc*2;
        $hocky.=$hochientai+1;$hocky.=',';$hocky.=$hochientai+2;
    }
        
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
   

    if($Sessiongiangvien != null && $Sessionlop != null && $Sessionlopngoaikhoa != null){  
      $listall = $this->createlistall($Sessionlop,$Sessionlopngoaikhoa);
      $maxpoint = $request->diemtoida;
      $socathe = $request->soluong;
      $namhoc = $request->namhoc;      
      $id_bomon = $request->id_bomon;

      $ketqua = $this->checkone($this->createpopulationthree($socathe,$listall,$Sessiongiangvien),$maxpoint);

      $this->adddata($ketqua,$namhoc,$id_bomon);   
      $this->goimail(); 
    }else die("Vui lòng nhập danh sách giảng viên và môn học");
}

public function createpopulationthree($soluong,$listall,$Sessiongiangvien){
  $population = $this->createpopulation($soluong,$listall,$Sessiongiangvien);
  $kq = $this->checkmonsotruong($population);
  if($kq != 0){
    $Mon = Mon::find($kq);
    return redirect('set_admin/phan-cong-giang-day/phan-cong.html')->with('canhbao','Môn "'.$Mon->ten_vi.' ('.$Mon->bacdaotao->ten_vi.')" không thuộc sở trường của giảng viên nào vui lòng kiểm tra lại');
    }

  for ($i=0;$i<count($population);$i++)
    $population[$i] = $this->createpopulationtwo($population[$i],$Sessiongiangvien);

  return $population;
}

public function getList($id_bomon,$namhoc){

  $Bomon = Bomon::all();
  $name = Bomon::find($id_bomon);
  $Giangvien = Giangvien::where('id_bomon',$id_bomon)->get();
  $Chedogiochuan = Chedogiochuan::all();

  $Phanconggiangday = Phanconggiangday::where('namhoc',$namhoc)
                                        ->whereHas('lop',function($query)use($id_bomon){
                                          $query->where('id_bomon',$id_bomon);
                                      })->get();

  $Phancongthinhgiang = Phanconggiangday::where('namhoc',$namhoc)
                                        ->where('trangthai',0)
                                        ->whereHas('lop',function($query)use($id_bomon){
                                          $query->where('id_bomon',$id_bomon);
                                      })->get();
   
  return view('Admin.Khoa.Phanconggiangday.List',['Phanconggiangday' => $Phanconggiangday,'Phancongthinhgiang' => $Phancongthinhgiang,'Giangvien' => $Giangvien,'Chedogiochuan' => $Chedogiochuan,'Bomon' => $Bomon,'name' => $name,'namhoc' => $namhoc,'id_bomon' => $id_bomon]);
}

public function checkone($population,$maxpoint){

  $check=$this->gennectic($population,$maxpoint);  
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
        $checknew = $this->gennectic($population,$maxpoint); 
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

public function gennectic($population,$maxpoint){
  $suitable = array();  
  $dem = 0;
  for ($i=0;$i<count($population);$i++)
    $suitable[$i] = ($this->evaluteone($population[$i])) + ($this->cantren($population[$i],$maxpoint)) + ($this->canduoi($population[$i]));

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
  for ($i=0; $i < $n ; $i++){ 
    $arrlistalltwo = array();
    foreach ($listall as $arrayone){
      if(in_array($arrayone[1],array_column($arrlistalltwo,0)) == false){
        $arrlop = array($arrayone[0]);   
        $arrtam = array();
        array_push($arrtam,$arrayone[1]);
         $Giangvienone = $Sessiongiangvien[rand(0,count($Sessiongiangvien)-1)];
          do{
              $Giangvienone = $Sessiongiangvien[rand(0,count($Sessiongiangvien)-1)];
          }while(in_array($Giangvienone,$this->listgiangviensotruong($arrayone[1]))  == false);
        array_push($arrtam,$arrnew = array('lop' => $arrayone[0],'giangvien' => $Giangvienone));
        foreach ($listall as $arraytwo){
          if($arraytwo[1] == $arrayone[1] && in_array($arraytwo[0],$arrlop) == false){

             $Giangvientwo = $Sessiongiangvien[rand(0,count($Sessiongiangvien)-1)];

            do{
                 $Giangvientwo = $Sessiongiangvien[rand(0,count($Sessiongiangvien)-1)];

              }while(in_array($Giangvientwo,$this->listgiangviensotruong($arrayone[1]))  == false);

            array_push($arrtam,$arrnew = array('lop' => $arraytwo[0],'giangvien' => $Giangvientwo));
            array_push($arrlop,$arraytwo[0]);           
          }          
        }        
        array_push($arrlistalltwo,$arrtam);  
      }
    }      
    $population[$i] = $arrlistalltwo;
  }

  return $population;
}

public function createpopulationtwo($chromosome,$Sessiongiangvien){
	$chromosomenew = array();
	$arrgvold = array();
	foreach ($Sessiongiangvien as $lgv){
		$arrtam = array();
		if(in_array($lgv,$arrgvold) == false){			
			array_push($arrtam,$lgv);
			foreach ($chromosome as $chr){
				for ($i=1;$i<count($chr);$i++){ 
					if($chr[$i]['giangvien'] == $lgv){
						array_push($arrtam,$arrnew = array('lop' => $chr[$i]['lop'],'mon' => $chr[0]));
					}
				}
			}
		}
		array_push($chromosomenew,$arrtam);	
		array_push($arrgvold,$lgv);
	}
	return $chromosomenew;	
}

public function checkmonsotruong($population){
   $listmon = array_column($population,0); 
   foreach($listmon as $lm){
     $Monsotruong = Monsotruong::where('id_mon',$lm)->get();
        if(count($Monsotruong)==0)
           return $lm;
   }
    return 0;
}

public function createlistall($Sessionlop,$Sessionlopngoaikhoa){
  $listall = array(); 
  foreach ($Sessionlop as $ssl){
    $listall = $this->createstring($listall,$ssl['lop'],$ssl['CT_daotao']);
  }

  if(count($Sessionlopngoaikhoa)>0){
    foreach ($Sessionlopngoaikhoa as $ssl)
      $listall = $this->createstring($listall,$ssl['lop'],$ssl['CT_daotao']);
    
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

public function canduoi($chromosome){
	$dem = 0;
	foreach ($chromosome as $chr){
		$hours = 0;
		for ($i=1;$i<count($chr);$i++) 			
			$hours+=$this->getMonohours($chr[$i]['mon']);

		if($hours < $this->gethours($chr[0]))
			$dem+=10;
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

public function adddata($chromosome,$namhoc,$id_bomon){

  foreach ($chromosome as $chr){ 
    for ($i=1;$i<count($chr);$i++){ 
      $Lop = Lop::find($chr[$i]['lop']);
      $CT_daotao = CT_daotao::where('id_chuongtrinh',$Lop->id_chuongtrinh)->where('id_mon',$chr[$i]['mon'])->first(); 

      $Phanconggiangday = new Phanconggiangday();
      $Phanconggiangday->id_giangvien = $chr[0];
      $Phanconggiangday->id_mon = $chr[$i]['mon'];
      $Phanconggiangday->id_lop = $chr[$i]['lop'];  
      $Phanconggiangday->id_hocky = $CT_daotao->id_hocky;
      $Phanconggiangday->namhoc = $namhoc;
      $Phanconggiangday->id_bomon = $id_bomon;
      $Phanconggiangday->trangthai = 1;
      $Phanconggiangday->save();
    }
  }
}

public function exportexcel($namhoc,$listgiangvien){


  $Phanconggiangday = Phanconggiangday::where('namhoc',$namhoc)->orderby('id_giangvien')->get(); 
  $Giangvien = Giangvien::whereIn('id',$listgiangvien)->get();
  $Chedogiochuan = Chedogiochuan::all();

  Excel::create('MyExcel2', function($excel) use($Phanconggiangday,$Giangvien,$Chedogiochuan){
      $excel->sheet('Danh phân công giảng dạy', function($sheet) use($Phanconggiangday,$Giangvien,$Chedogiochuan){
      $sheet->setFontFamily('Times New Roman');      

      $sheet->cells('A1:P1', function($cells){
        $cells->setFontSize(16);
        $cells->setFontColor('#840e1d');
      });

      $sheet->setWidth(array(
          'A'     =>  5,
          'B'     =>  21,
          'C'     =>  15,
          'D'     =>  15,
          'H'     =>  25,
          'I'     =>  10,
          'J'     =>  5,
          'K'     =>  5,
          'L'     =>  18,
          'M'     =>  18,
          'O'     =>  15,
          'N'     =>  15,
          'P'     =>  15,

      ));

      $sheet->cells('A:G', function($cells){
         $cells->setValignment('center');
         $cells->setAlignment('center');
      });

      $sheet->cells('L:P', function($cells){
         $cells->setValignment('center');
         $cells->setAlignment('center');
      });
      
      $sheet->loadView('Admin.Khoa.Excel.phanconggiangday',['Phanconggiangday' => $Phanconggiangday,'Giangvien'=>$Giangvien,'Chedogiochuan' => $Chedogiochuan]);

      })->export('xlsx');

  });
}

public function goimail(){

    Mail::send('Email.giaithuathoantat', array('name'=>'thanh'),function($message){
              $message->from('ktcn@tvu.edu.vn',"Khoa Kỹ thuật và Công nghệ");
            $message->to('110114075@sv.tvu.edu.vn')->subject('Thông báo giải thuật hoàn tất');    
        });
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
  $Phanconggiangday->trangthai = 1;
  $Phanconggiangday->save();  
}

public function exportexcelnew(){

    $Giangviencantren = Thoigiantesst::where('type',1)->get();
    $Giangviencanduoi = Thoigiantesst::where('type',2)->get();
    $Giangvienhaican = Thoigiantesst::where('type',3)->get();

    $Moncantren = Bainew::where('type',1)->get();
    $Moncanduoi = Bainew::where('type',2)->get();
    $Monhaican = Bainew::where('type',3)->get();

      Excel::create('MyExcel2', function($excel) use($Giangviencantren,$Giangviencanduoi,$Giangvienhaican,$Moncantren,$Moncanduoi,$Monhaican){
        $excel->sheet('Ket qua giai thuat', function($sheet) use($Giangviencantren,$Giangviencanduoi,$Giangvienhaican,$Moncantren,$Moncanduoi,$Monhaican){
        $sheet->setFontFamily('Times New Roman'); 
        
        $sheet->loadView('Admin.Khoa.Excel.ketquagiaithuat',['Giangviencantren' => $Giangviencantren,'Giangviencanduoi'=>$Giangviencanduoi,'Giangvienhaican' => $Giangvienhaican,'Moncantren' => $Moncantren,'Moncanduoi' => $Moncanduoi,'Monhaican' => $Monhaican]);

        })->export('xlsx');

    });
}










/////////////////////////////////////dddddddddddddd/////////////////////////////////////////



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
  $Phanconggiangday->trangthai = 1;
  $Phanconggiangday->save();  
}