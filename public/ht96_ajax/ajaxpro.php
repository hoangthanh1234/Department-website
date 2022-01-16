<?php
	
	function fns_Rand_digit($min,$max,$num)
	{
		$result='';
		for($i=0;$i<$num;$i++){
			$result.=rand($min,$max);
		}
		return $result;	
	}

	function changeTitleImage($str)
	{
		$str = stripUnicode($str);
		$str = mb_convert_case($str,MB_CASE_LOWER,'utf-8');
		$str = trim($str);
		$str = str_replace("  "," ",$str);
		$str = str_replace(" ","-",$str);
		return $str;
	}

	function stripUnicode($str){
		  if(!$str) return false;
		   $unicode = array(
		     'a'=>'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
		     'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
		     'd'=>'đ',
		     'D'=>'Đ',
		     'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
		   	  'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
		   	  'i'=>'í|ì|ỉ|ĩ|ị',	  
		   	  'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
		     'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
		   	  'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
		     'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
		   	  'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
		     'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
		     'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
		   );
		   foreach($unicode as $khongdau=>$codau) {
		     	$arr=explode("|",$codau);
		   	  $str = str_replace($arr,$khongdau,$str);
		   }
		return $str;
	}
// Doi tu co dau => khong dau

	$ext =explode('.',$_POST['name']);
    $name = $ext[0];
    $name=changeTitleImage($name).'-'.fns_Rand_digit(0,9,4);   

	define('UPLOAD_DIR', $_POST['dir']);
	$img = $_POST['image'];
	$img = str_replace('data:image/png;base64,', '', $img);
	$img = str_replace(' ', '+', $img);
	$data = base64_decode($img);
	$file = UPLOAD_DIR . $name . '.png';	
	$tus=($success = file_put_contents($file, $data))?"Upload Success ! ! !":"ERR Upload ! ! ! Please check again";
   
	$result = array('name' => $name.'.png','tus'=>$tus);
	echo json_encode($result);
	

?>