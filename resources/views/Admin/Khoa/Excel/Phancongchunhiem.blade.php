<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Phân công chủ nhiệm</title>
</head>
<body>


<table>	
	<tr>		
		<td colspan="3" align="center">TRƯỜNG ĐẠI HỌC TRÀ VINH</td>		
		<td></td>
		<td colspan="3" align="center">CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</td>				
	</tr>
	<tr>		
		<td colspan="3" align="center">KHOA KỸ THUẬT VÀ CÔNG NGHỆ</td>	
		<td></td>	
		<td colspan="3" align="center">Độc lập - Tự do - Hạnh phúc</td>
	</tr>		
</table>


<table>
	<tr>		
		<td colspan="7" align="center">DANH SÁCH PHÂN CÔNG  CỐ VẤN HỌC TẬP BỘ MÔN @if(count($Phancongchunhiem)>0) <span style="text-transform:uppercase;">{{$Phancongchunhiem[0]->lop->bomon->ten_vi}}</span> @endif</td>
	</tr>
	
</table>


<table>
	<tr>
		<td align="center">STT</td>
		<td align="center">Mã lớp</td>				
		<td align="center">Ngành đào tạo</td>
		<td align="center">Họ và tên CVHT</td>									
		<td align="center">Địa chỉ email</td>
		<td align="center">Điện thoại</td>
		<td align="center">Ghi chú</td>
	</tr>
	<?php $i=1; ?>
	@foreach($Phancongchunhiem as $pccn)					
	<tr>
		<td align="center">{{$i++}}</td>
		<td align="center">{{$pccn->lop->malop}}</td>	
		<td>{{$pccn->lop->chuongtrinh->ten_vi}}</td>
		<td align="center">{{$pccn->giangvien->ten}}</td>
		<td align="center">{{$pccn->giangvien->email}}</td>
		<td align="center">{{$pccn->giangvien->dienthoai}}</td>
		<td align="center">{{$pccn->ghichu}}</td>
	</tr>
	@endforeach
				
</table>


	


<script src="public/ht96_admin/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="public/ht96_admin./bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="public/ht96_admin/plugins/iCheck/icheck.min.js"></script>
</body>
</html>