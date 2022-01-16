<!DOCTYPE html>
<html>
<head>
	<title>T/B thêm thành viên</title>
</head>
<body>
	<p>Xin chào:<b>{{$Giangvien->ten}}</b></p>
	<p>Bạn vừa được thêm vào nhóm nghiên cứu <b>{{$Nhom->ten_vi}}</b> bởi <b>
		@php
			$Truong = $Nhom->truongnhom;
        	$Truongnhom = $Truong[0];
        	echo $Truongnhom->giangvien->ten;
		@endphp <b>
		
	</p>
	<p>Bạn cố thể đăng nhập vào hệ thông để biết thêm chi tiết xin cảm ơn.</p>
</body>
</html>