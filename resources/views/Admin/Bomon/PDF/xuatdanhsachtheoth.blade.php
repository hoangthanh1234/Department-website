<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminSET| Kết quả đánh giá</title>
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
	.ngat{ page-break-inside:avoid; page-break-after:always; }
	.f14{font-size:14px;}
	.f13{font-size:13px;}

 </style>
</head>
<body>
<!-- ,DejaVu Sans -->


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



	<p class="text-center dam" style="margin-top:50px;">PHIẾU ĐÁNH GIÁ PHÂN LOẠI VIÊN CHỨC @if($Phieudanhgia[0]->giangvien->id_bomon !=6)  BỘ MÔN @endif <span style="text-transform:uppercase;font-weight:bold;">{{$Phieudanhgia[0]->giangvien->bomon->ten_vi}}</span></p>
	<p class="text-center dam">DANH SÁCH TỔNG HỢP</p>
	<!-- <p class="text-center dam">Năm học: 2017 - 2018</p> -->


	<table id="table2">
		<tr style="background:#cccccc">
			<td width="8%" class="text-center dam">STT</td>
			<td class="text-center dam">Họ và tên</td>
			<td width="30%" class="text-center dam">Bộ môn</td>
			<td width="15%" class="text-center dam">Điểm đạt</td>
			<td width="10%" class="text-center dam">Vượt</td>
			<td width="15%" class="text-center dam">Xếp loại</td>
		</tr>
		<?php $i=1;?>
			@foreach($Phieudanhgia as $pdg)
			<?php $tong=0;?>
			 @foreach($pdg->phieu_nckh_baibaobomonduyet as $pbb)
							 <?php $tong+=$pbb->tieuchi->diem; ?>
			 @endforeach

			 @foreach($pdg->phieu_nckh_detaibomonduyet as $pdt)
							 <?php $tong+=$pdt->tieuchi->diem; ?>
			 @endforeach
				<tr>
					<td class="text-center">{{$i++}}</td>
					<td>{{$pdg->giangvien->ten}}</td>
					<td>{{$pdg->giangvien->bomon->ten_vi}}</td>
					<td class="text-center">
						@if(($pdg->phieugiangdaybomonduyet->sum('diemdatbomon')+$tong+$pdg->phieukhacbomonduyet->sum('diemdatbomon'))>100)
							100
						@else
							{{($pdg->phieugiangdaybomonduyet->sum('diemdatbomon')+$tong+$pdg->phieukhacbomonduyet->sum('diemdatbomon'))}}
						@endif
					</td>
					<td class="text-center">
						@if(($pdg->phieugiangdaybomonduyet->sum('diemdatbomon')+$tong+$pdg->phieukhacbomonduyet->sum('diemdatbomon'))>100)
							{{($pdg->phieugiangdaybomonduyet->sum('diemdatbomon')+$tong+$pdg->phieukhacbomonduyet->sum('diemdatbomon'))-100}}
						@else
							0
						@endif
					</td>
					<td class="text-center">{{$pdg->xeploai}}</td>
				</tr>
			@endforeach
	</table>
	<div class="ngat"></div>
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
