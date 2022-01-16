
<!DOCTYPE html>
<html>
<head>
	<title>Đơn đăng kí xin bảng điểm rèn luyện</title>
</head>
<body>
	<p>Xin chào quý thầy/cô,</p>
	<p>Em tên là: {{$hoTen}}, mã số sinh viên: {{ $maSV }}, hiện đang là sinh viên của lớp: {{ $maLop }}</p>

	<p>Nay em viết đơn đăng kí này để xin bảng điểm rèn luyện @if ($hocKi==1)
        1 học kỳ gần nhất
    @else
        @if ($hocKi==2)
            2 học kỳ gần nhất
        @else
            cả năm
        @endif
    @endif
    của năm học {{ $namHoc }}</p>

	<p>Với lý do: {{ $lyDo }}</p>
	<p>Xin chân thành cảm ơn sự giúp đỡ của quý thầy/cô.</p> Quý thầy/cô vui lòng liên hệ thông qua số điện thoại: {{ $sdt }} hoặc email {{ $email }}.
    <p>Trân trọng</p>
    <br>
    <i>(Ghi chú: đây là email tự động được gửi từ hệ thống SET, không phản hồi qua email này!)</i>
</body>
</html>
