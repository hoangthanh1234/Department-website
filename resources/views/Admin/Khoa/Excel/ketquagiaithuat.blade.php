<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ket qua giai thuat</title>
	<style type="text/css">
		.tablevip tr td{border:1px solid black;}
	</style>
</head>
<body>
<table class="tablevip">
	<tr>
		<td colspan="6" align="center">Giảng viên làm góc</td>
	</tr>

	<tr>
		<td colspan="6" align="center">Cận trên (450) 1 lỗi = 100đ</td>
	</tr>
	<tr>
		<td align="center">STT</td>
		<td align="center">Cá thể</td>				
		<td align="center">Vi phạm</td>
		<td align="center">Thời gian</td>	
	</tr>	
	<?php $i =1;?>
	@foreach($Ketqua as $kq)					
	<tr>
		<td align="center">{{$i++}}</td>
		<td align="center">{{$kq->cathe}}</td>	
		<td align="center">{{$kq->vipham}}</td>
		<td align="center">{{$kq->thoigian}}</td>		
	</tr>
	@endforeach				
</table>
</body>
</html>