<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminSET| DANH SÁCH THỐNG KÊ ĐÁNH GIÁ GIẢNG VIÊN</title>
   <base href="{{asset('/public/')}}">
  <!-- Tell the browser to be responsive to screen width -->
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
 <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <style type="text/css">
	.dam{font-weight:bold;}
	#table2{width:100%}
	#table2 tr td{border:1px solid #333;}
	body { font-family:'newfont';font-weight:normal !important;font-style:normal !important;font-size:16px;}
	 table tr td{padding:5px;}
	.f14{font-size:14px;}
	.f13{font-size:13px;}
	.ngat{ page-break-inside:avoid; page-break-after:always; }
	.col-lg-6{float: left;width:50%}
	.col-lg-6-r{float:right;width:40%;}
	.row{clear:both;padding-top:10px;}
	.col-lg-12{float:left;width:100%;}
	.pal15{padding-left:15px;margin-left:15px;}
	b{font-weight:bold;}
 </style>
</head>
<body>



<table style="width:100%" id="table1">
	<tr>
		<td class="text-center f13" style="padding:0!important;">TRƯỜNG ĐẠI HỌC TRÀ VINH</td>
		<td class="text-center dam f13" style="padding:0!important;">CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</td>
	</tr>
	<tr style="padding:0; margin-top:0!important;">
		<td class="text-center dam f13" style="padding:0!important;">
			KHOA KỸ THUẬT VÀ CÔNG NGHỆ
			<p style="border-top:1px solid #220044;margin:0 auto;padding-top:0;height:1px; margin-top:0!important;">
				&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
			</p>
		</td>
		<td class="text-center dam f13" style="padding:0!important;">
			Độc lập - Tự do - Hạnh phúc
			<p style="border-top:1px solid #220044;margin:0 auto;height: 1px; margin-top:0!important;">
			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
			</p>
		</td>
	</tr>
</table>



<p class="text-center dam" style="margin-top:50px;">DANH SÁCH ĐÁNH GIÁ GIẢNG VIÊN</p>
<p style="height:20px;"></p>



<table id="table2">
	<tr style="background:#cccccc">
		<td width="8%" class="text-center dam">STT</td>
		<td class="dam">Tên Giảng viên</td>
		<td width="25%" class="text-center dam">Bộ môn</td>
		<td width="7%" class="text-center dam">Đạt</td>
		<td width="7%" class="text-center dam">Vượt</td>
		<td width="9%" class="dam text-center">NCKH</td>
		<td width="9%" class="dam text-center">Giờ NCKH</td>
		<td width="12%" class="text-center dam">Xếp loại</td>
	</tr>
<?php $i=1; ?>
@foreach($Phieudanhgia as $pdg)
<?php $tong=0;?>
 @foreach($pdg->phieu_nckh_baibaokhoaduyet as $pbb)
				 <?php $tong+=$pbb->tieuchi->diem; ?>
 @endforeach

 @foreach($pdg->phieu_nckh_detaikhoaduyet as $pdt)
				 <?php $tong+=$pdt->tieuchi->diem; ?>
 @endforeach
	<tr>
		<td class="text-center">{{$i++}}</td>
		<td class="">{{$pdg->giangvien->ten}}</td>
		<td>{{$pdg->giangvien->bomon->ten_vi}}</td>
		<td class="text-center">
			@if(($pdg->phieugiangdaykhoaduyet->sum('diemdatkhoa')+$tong+$pdg->phieukhackhoaduyet->sum('diemdatkhoa'))>100)
				100
			@else
				{{round($pdg->phieugiangdaykhoaduyet->sum('diemdatkhoa')+$tong+$pdg->phieukhackhoaduyet->sum('diemdatkhoa'), 0, PHP_ROUND_HALF_UP)}}
			@endif
		</td>
		<td class="text-center">
			@if(($pdg->phieugiangdaykhoaduyet->sum('diemdatkhoa')+$tong+$pdg->phieukhackhoaduyet->sum('diemdatkhoa'))>100)
				{{round($pdg->phieugiangdaykhoaduyet->sum('diemdatkhoa')+$tong+$pdg->phieukhackhoaduyet->sum('diemdatkhoa'))-100, 0, PHP_ROUND_HALF_UP}}
			@else
				0
			@endif
		</td>
		<td class="text-center">
			{{round($tong, 0, PHP_ROUND_HALF_UP)}}
		</td>
		<td class="text-center">
		 	<?php $tong_nckh=0;?>
                @foreach($pdg->phieu_nckh_baibaokhoaduyet as $pbb) 
                    <?php $tong_nckh+=$pbb->tieuchi->gio; ?>
                @endforeach 
                @foreach($pdg->phieu_nckh_detaikhoaduyet as $pdt)  
                    <?php $tong_nckh+=$pdt->tieuchi->gio; ?> 
                @endforeach 
				@foreach($pdg->phieukhackhoaduyet as $pk)
					<?php $tong_nckh+=$pk->tieuchi->gio;?>
				@endforeach	
                {{ $tong_nckh }}
		</td>
		<td class="text-center">{{$pdg->xeploai}}</td>
	</tr>
@endforeach
</table>
</body>
</html>
