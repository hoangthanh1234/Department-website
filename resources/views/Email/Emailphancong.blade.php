<!DOCTYPE html>
<html>
<head>
	<title>Thông báo phân công việc</title>
</head>
<body>
	<p>Xin chào:<b>{{$CT_phancongviec->giangvien->ten}}</b></p>
	<p>Công việc bạn được giao: <b>{{$CT_phancongviec->ten}}</b> thuộc công việc lớn <b>{{$CT_phancongviec->phancongviec->congviec->ten}}</b></p>	
	<p>Bạn nhận được thông báo từ: <b>{{$CT_phancongviec->phancongviec->giangvien->ten}}</b> với nội dung: <b>{{$noidung}}</b></p>
</body>
</html>




