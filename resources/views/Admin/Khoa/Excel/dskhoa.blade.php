<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<table>
	<tr>
		<td >STT</td>
		<td>Tên Giảng viên</td>				
		<td>Bộ môn</td>
		<td>Đạt</td>									
		<td>Vượt</td>
		<td>NCKH</td>
		<td>Xếp loại</td>
	</tr>
	<?php $i=1; ?>
	@foreach($Phieudanhgia as $pdg)					
	<tr>
		<td class="text-center">{{$i++}}</td>
		<td class="">{{$pdg->giangvien->ten}}</td>	
		<td>{{$pdg->giangvien->bomon->ten_vi}}</td>
		<td class="text-center">
			@if(($pdg->diemgiangdaykhoa+$pdg->diemnckhkhoa+$pdg->diemkhackhoa)>100) 
				100
			@else 
				{{$pdg->diemgiangdaykhoa+$pdg->diemnckhkhoa+$pdg->diemkhackhoa}} 
			@endif
		</td>
		<td class="text-center">
			@if(($pdg->diemgiangdaykhoa+$pdg->diemnckhkhoa+$pdg->diemkhackhoa)>100) 
				{{($pdg->diemgiangdaykhoa+$pdg->diemnckhkhoa+$pdg->diemkhackhoa)-100}}
			@else 
				0
			@endif
		</td>
		<td class="text-center">
			<?php $tonggiangday=0 ?>
			@foreach($pdg->phieu_nckh_baibaokhoaduyet as $pbb) 
				<?php $tonggiangday+=$pbb->tieuchi->diem; ?>
			@endforeach
			@foreach($pdg->phieu_nckh_detaikhoaduyet as $pdt) 
				<?php $tonggiangday+=$pdt->tieuchi->diem; ?>
			@endforeach
			{{$tonggiangday}}
		</td>
		<td class="text-center">{{$pdg->xeploai}}</td>
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