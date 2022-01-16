<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>DANH SÁCH BÀI BÁO KHOA HỌC</title>
</head>
<body>

	
	
	<table>	
			<tr>
				<td colspan="6"></td>
				<td colspan="6" align="center">TRƯỜNG ĐẠI HỌC TRÀ VINH</td>
				<td colspan="4"></td>
				<td colspan="6" align="center">CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</td>				
			</tr>
			<tr>
				<td colspan="6"></td>
				<td colspan="6" align="center">KHOA KỸ THUẬT VÀ CÔNG NGHỆ</td>
				<td colspan="4"></td>
				<td colspan="6" align="center">Độc lập - Tự do - Hạnh phúc</td>
			</tr>		
	</table>


<table>
	<tr>
		<td colspan="11"></td>
		<td colspan="6" align="center">DANH SÁCH THỐNG KÊ BÀI BÁO KHOA HỌC</td>
	</tr>
	<tr>
		<td colspan="11"></td>
		<td colspan="6" align="center">THỜI GIAN TỪ: {{date('m/Y', strtotime($tungay))}} ĐẾN: {{date('m/Y', strtotime($denngay))}}</td>
	</tr>
</table>



<table>
				<tr>
					<td><b>STT</b></td>
					<td colspan="3" align="center"><b>Tác giả</b></td>				
					<td colspan="9" align="center"><b>Tên bài báo</b></td>
					<td colspan="10" align="center"><b>NXB</b></td>
					<td colspan="4" align="center"><b>Loại BB</b></td>									
					<td colspan="2" align="center"><b>Thời gian</b></td>					
				</tr>
					<?php $i=1; ?>
				@foreach($Baibaokhoahoc as $bb)								
					<tr>
						<td align="center">{{$i++}}</td>
						<td colspan="3">
							<?php $tacgia=''; ?>
							@foreach($CT_baibao as $ctbb)
								@if($ctbb->id_baibao==$bb->id)
									<?php $tacgia.=$ctbb->giangvien->ten.",";?>
								@endif
							@endforeach
							<?php $tacgia=rtrim($tacgia,',');?>
							{{$tacgia}}
						</td>	
						<td colspan="9">{{$bb->ten_vi}}</td>
						<td colspan="10">{{$bb->nxb}}</td>
						<td colspan="4">{{$bb->loaibaibao->ten_vi}}</td>
						<td colspan="2" align="center">{{date('m/Y', strtotime($bb->nam))}}</td>
					</tr>
				@endforeach
				
</table>



</body>
</html>