<?php

function fns_Rand_digit($min,$max,$num){
		$result='';
		for($i=0;$i<$num;$i++){
			$result.=rand($min,$max);
		}
		return $result;	
	}

function to_slug($str) {
    $str = trim(mb_strtolower($str));
    $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
    $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
    $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
    $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
    $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
    $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
    $str = preg_replace('/(đ)/', 'd', $str);
    $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
    $str = preg_replace('/([\s]+)/', '-', $str);
    return $str;
}


if (isset($_FILES['file']['name'])) {

	$name=$_FILES['file']['name'];
	$type=$_FILES['file']['type'];
	$size=$_FILES['file']['size'];
	$ext =explode('.',$name);
	$ran=fns_Rand_digit(0,9,4);
	$uploadok=1;
	$kq='';
    $filename='';


    if (0 < $_FILES['file']['error']) {
        $kq='Error during file upload' . $_FILES['file']['error'];
        $filename='fail';
        $uploadok=0;
    }

    if($size > 5000000){
    	$kq='File co kích thước vượt quá 5M !!! Vui lòng kiểm tra lại!!!';
    	$filename='fail';
    	$uploadok=0;
    }    

    if($uploadok==1){
        $name = explode('.',$_FILES['file']['name']);
        $filename=to_slug($ran.'-'.$name[0]).'.'.$name[1];        
    	move_uploaded_file($_FILES['file']['tmp_name'], '../ht96_pdf/'.$filename);
    	$kq='File đã được upload thành công. Bạn có thể ấn lưu để hoàn thành thao tác !'.$filename;
    	
    }   

    	$result = array('kq' => $kq,'filename'=>$filename);
		echo json_encode($result);      
    
} else {
    $kq='Vui lòng chọn file';
    $filename='fail';
    $result = array('kq' => $kq,'filename'=>$filename);
	echo json_encode($result); 
}