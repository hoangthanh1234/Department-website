<!DOCTYPE html>
<html>
<head>
	<title>T/B đã sắp lịch báo cáo</title>
</head>
<body>
	<p>Xin chào:<b>{{$Baocao->ct_nhom->giangvien->ten}}</b></p>
	<p>Bài báo cáo của bạn <b>{{$Baocao->ten_vi}}</b> đã được sắp lịch báo cáo vào ngày <b>{{date('d / m / Y',strtotime($Phancongbaocao->ngaybaocao))}}</b> buổi <b>
		@php
			if($Phancongbaocao->buoi == 0)
				echo "Sáng";
			else
				echo "Chiều";
		@endphp</b>
	</p>
	<p>Bạn phải đăng nhập vào hệ thông và upload file PowerPoint kèm file PDF lên hệ thống trước ngày báo cáo 3 ngày xin cảm ơn.</p>
</body>
</html>