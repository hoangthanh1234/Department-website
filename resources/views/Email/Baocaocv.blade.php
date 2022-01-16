
<!DOCTYPE html>
<html>
<head>
	<title>Báo cáo công việc</title>
</head>
<body>
	<p>Xin chào: <b>{{$CT_phancongviec->congviec->giangvien->ten}}</b></p>
	<p>Tôi là: <b>{{$CT_phancongviec->giangvien->ten}}</b></p>
	<p>Tôi xin báo cáo hoàn thành công việc: <b>{{$CT_phancongviec->ten}}</b> thuộc công việc lớn <b>{{$CT_phancongviec->congviec->ten}}</b></p>

	<p>Bạn vui lòng kiểm tra hệ giống và check hoàn thành giúp tôi</p>
	
</body>
</html>




