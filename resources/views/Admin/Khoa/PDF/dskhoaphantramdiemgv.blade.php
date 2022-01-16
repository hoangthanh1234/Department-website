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
 	body { font-family:'newfont';font-weight:normal !important;font-style:normal !important;font-size:16px;}
	.dam{font-weight:bold;}
	#table2{width:100%}
	#table2 tr td{border:1px solid #333;}
	table tr td{padding:5px;}
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
		<td width="10%" class="text-center dam">Đạt</td>
		<td width="10%" class="text-center dam">Vượt</td>
		<td width="10%" class="dam text-center">NCKH</td>
		<td width="12%" class="text-center dam">Xếp loại</td>
	</tr>
<?php $i=1; ?>
@foreach($Phieudanhgia as $pdg)
<?php $tong=0;?>
 @foreach($pdg->phieu_nckh_baibao as $pbb)
				 <?php $tong+=$pbb->tieuchi->diem; ?>
 @endforeach

 @foreach($pdg->phieu_nckh_detai as $pdt)
				 <?php $tong+=$pdt->tieuchi->diem; ?>
 @endforeach
	<tr>
		<td class="text-center">{{$i++}}</td>
		<td>{{$pdg->giangvien->ten}}</td>
		<td>{{$pdg->giangvien->bomon->ten_vi}}</td>
		<td class="text-center">
			@if(($pdg->phieugiangday->sum('diemdatkhoa')+$tong+$pdg->phieukhac->sum('diemdatkhoa'))>100)
				100
			@else
				{{round($pdg->phieugiangday->sum('diemdatkhoa')+$tong+$pdg->phieukhac->sum('diemdatkhoa'), 0,PHP_ROUND_HALF_UP)}}
			@endif
		</td>
		<td class="text-center">
			@if(($pdg->phieugiangday->sum('diemdatkhoa')+$tong+$pdg->phieukhac->sum('diemdatkhoa'))>100)
				{{round(($pdg->phieugiangday->sum('diemdatkhoa')+$tong+$pdg->phieukhac->sum('diemdatkhoa'))-100, 0,PHP_ROUND_HALF_UP)}}
			@else
				0
			@endif
		</td>
		<td class="text-center">
			{{round($tong, 0,PHP_ROUND_HALF_UP)}}
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
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
