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


	.dam{font-weight:bold;}
	#table2{width:100%}
	.table2 tr td{border:1px solid #333;}
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
<!-- ,DejaVu Sans -->




@foreach($Phieudanhgia as $Phieu)

<table style="width:100%">
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


<p class="text-center dam" style="margin-top:50px;">PHIẾU ĐÁNH GIÁ PHÂN LOẠI VIÊN CHỨC THUỘC BỘ MÔN <span style="text-transform:uppercase;font-weight:bold;">{{$Phieu->giangvien->bomon->ten_vi}}</span></p>
<p class="text-center dam">KHOA ĐÁNH GIÁ</p>
<p class="text-center dam">Năm học: 2018 - 2019</p>

<p>Họ tên: <b>{{$Phieu->giangvien->ten}}</b></p>
<p>Chức danh, nghề nghiệp:<b> {{$Phieu->giangvien->chucvu->ten_vi}} </b></p>
<p>Hạng, chức danh nghề nghiệp: <b>{{$Phieu->giangvien->hangchucdanhnghenghiep}}</b> Bậc: <b>{{$Phieu->giangvien->bac}}</b> Hệ số lương: <b>{{$Phieu->giangvien->hesoluong}}</b></p>
<P class="dam">I. TỰ ĐÁNH GIÁ KẾT QUẢ CÔNG TÁC, TU DƯỠNG, RÈN LUYỆN CỦA VIÊN CHỨC</P>

<table class="table2">
	<tr  style="background:#cccccc;font-weight:bold;">
		<td width="8%" class="text-center dam">STT</td>
		<td class="dam">Tiêu chuẩn đánh giá</td>
		<td width="8%" class="text-center dam">ĐVT</td>
		<td width="10%" class="text-center dam">Số lượng</td>
		<td width="10%" class="text-center dam">Minh chứng</td>
		<td width="8%" class="text-center dam">Điểm</td>
	</tr>
<!--giảng dạy -->
	<tr>
		<td class="text-center boldphieu1">1</td>
		<td class="boldphieu1" colspan="5">Giảng dạy</td>
	</tr>

	<?php $sgd=1; ?>
	@foreach($Phieu->phieugiangdaykhoaduyet as $pgd)
	<tr>
		<td class="text-right">1.{{$sgd++}}</td>
		<td class="boldphieu2">{{$pgd->tieuchi->ten}}</td>
		<td class="text-center boldphieu2">{{$pgd->tieuchi->donvitinh}}</td>
		<td class="text-center">{{$pgd->soluongkhoa}}</td>
		<td class="text-center">
			@if($pgd->minhchung!='')
				Có
			@else
				Không
			@endif
		</td>
		<td class="text-center">{{$pgd->diemdatkhoa}}</td>
		</tr>
	@endforeach

<!-- nghiên cứu khoa học - bài báo -->

	<tr>
		<td class="text-center boldphieu1">2</td>
		<td class="boldphieu1" colspan="5">Nghiên cứu khoa học</td>
	</tr>

<?php $sncc=1;$id_tieuchi=0;?>
@foreach($Phieu->phieu_nckh_baibaokhoaduyet as $pbb)
	@if($pbb->id_tieuchi!=$id_tieuchi)
		<?php $soluong=0;$tong=0;$minhchung='Có'?>
		@foreach($Phieu->phieu_nckh_baibaokhoaduyet as $pbb2)
			@if($pbb2->id_tieuchi==$pbb->id_tieuchi)
				<?php $soluong=$soluong+1;$tong+=$pbb2->tieuchi->diem;?>
				<?php $id_tieuchi=$pbb2->id_tieuchi;?>
				<?php if($pbb2->chitietbaibao->baibao->minhchung=='') $minhchung='Không';?>
			@endif
		@endforeach
		<tr>
			<td class="text-right">2.{{$sncc++}}</td>
			<td class="boldphieu2">{{$pbb->tieuchi->ten}}</td>
			<td class="text-center boldphieu2">{{$pbb->tieuchi->donvitinh}}</td>
			<td class="text-center">{{$soluong}}</td>
			<td class="text-center">{{$minhchung}}</td>
			<td class="text-center">{{$tong}}</td>
		</tr>
	@endif
@endforeach

<!-- nghiên cứu khoa học - đề tài -->
<?php $id_tieuchidetai=0;?>
@foreach($Phieu->phieu_nckh_detaikhoaduyet as $pdt)
	@if($pdt->id_tieuchi!=$id_tieuchidetai)
		<?php $soluong=0;$tong=0;$minhchung='có'?>
		@foreach($Phieu->phieu_nckh_detaikhoaduyet as $pdt2)
			@if($pdt2->id_tieuchi==$pdt->id_tieuchi)
				<?php $soluong=$soluong+1;$tong+=$pdt2->tieuchi->diem;?>
				<?php $id_tieuchidetai=$pdt2->id_tieuchi;?>
				<?php if($pdt2->chitietdetai->detai->minhchung=='') $minhchung='Không';?>
			@endif
		@endforeach
		<tr>
			<td class="text-right">2.{{$sncc++}}</td>
			<td class="boldphieu2">{{$pdt->tieuchi->ten}}</td>
			<td class="text-center boldphieu2">{{$pdt->tieuchi->donvitinh}}</td>
			<td class="text-center">{{$soluong}}</td>
			<td class="text-center">{{$minhchung}}</td>
			<td class="text-center">{{$tong}}</td>
		</tr>
	@endif
@endforeach

<!--tiêu chí khác -->
	<tr>
		<td class="text-center boldphieu1">3</td>
		<td class="boldphieu1" colspan="5">Tiêu chí khác</td>
	</tr>

	<?php $spk=1; ?>
	@foreach($Phieu->phieukhackhoaduyet as $pk)
	<tr>
		<td class="text-right">3.{{$spk++}}</td>
		<td class="boldphieu2">{{$pk->tieuchi->ten}}</td>
		<td class="text-center boldphieu2">{{$pk->tieuchi->donvitinh}}</td>
		<td class="text-center">{{$pk->soluongkhoa}}</td>
		<td class="text-center">
			@if($pk->minhchung!='')
				Có
			@else
				Không
			@endif
		</td>
		<td class="text-center">{{$pk->diemdatkhoa}}</td>
		</tr>
	@endforeach

<tr class="boldphieu1">
	<td colspan="5"><b>Tổng điểm:</b></td>
	<td class="text-center"><?php $tongdiem=0;?>
		@foreach($Phieu->phieugiangdaykhoaduyet as $pgd)
			<?php $tongdiem+=$pgd->diemdatkhoa;?>
		@endforeach
		@foreach($Phieu->phieu_nckh_baibaokhoaduyet as $pbb)
			<?php $tongdiem+=$pbb->tieuchi->diem;?>
		@endforeach
		@foreach($Phieu->phieu_nckh_detaikhoaduyet as $pdt)
			<?php $tongdiem+=$pdt->tieuchi->diem;?>
		@endforeach
		@foreach($Phieu->phieukhackhoaduyet as $pk)
			<?php $tongdiem+=$pk->diemdatkhoa;?>
		@endforeach
		<b>{{round($tongdiem, 0, PHP_ROUND_HALF_UP)}}</b>
	</td>
</tr>
</table>

	<p style="height:10px;"></p>
	{{-- <p>Phân loại đánh giá: <b>{{$Phieu->xeploai}}</b></p> --}}
	<p>Phân loại đánh giá: <b>.........................</b></p>
	<p style="height:10px;"></p>
	<div style="width:220px;float:right;">
		<p class="text-center"  style="margin:0;">Ngày ...... tháng ...... năm ...... </p>
		<p class="dam text-center" style="margin:0;">Viên chức tự đánh giá</p>
		<p class="text-center"  style="margin:0;">(Ký tên và ghi rõ họ tên)</p>
	</div>
	<p style="height:10px;"></p>
	<p style="height:10px;"></p>
	<p style="height:10px;"></p>
	<p style="height:10px;"></p>


<div class="ngat"></div>
<p class="dam">III. Ý KIẾN CỦA TẬP THỂ ĐƠN VỊ VÀ LÃNH ĐẠO TRỰC TIẾP QUẢN LÝ VIÊN CHỨC</p>
	<p>1. Ý kiến của tập thể đơn vị nơi công tác</p>
	<p style="width:100%">....................................................................................................................................................................</p>
	<p>2. Nhận xét của lãnh đạo trực tiếp quản lý viên chức</p>
	<p style="width:100%">....................................................................................................................................................................</p>
	<p style="height:10px;"></p>
	<p style="height:10px;"></p>
	<div style="width:220px;float:right;">
		<p class="text-center"  style="margin:0;">Ngày ...... tháng ...... năm ...... </p>
		<p class="dam text-center"  style="margin:0;">Thủ trưởng trực tiếp đánh giá</p>
		<p class="text-center"  style="margin:0;">(Ký tên và ghi rõ họ tên)</p>
	</div>
<div style="clear:both;"></div>
	<p style="height:20px;"></p>
	<p style="height:20px;"></p>
	<p style="height:10px;"></p>
	<p style="height:10px;"></p>
	<p style="height:10px;"></p>

<p class="dam">IV. KẾT QUẢ ĐÁNH GIÁ PHÂN LOẠI CỦA CẤP CÓ THẨM QUYỀN</p>
	<p>1. Nhận xét ưu, nhược điểm</p>
	<p style="width:100%">....................................................................................................................................................................</p>
	<p style="width:100%">....................................................................................................................................................................</p>
	<p>2. Kết quả đánh giá phân loại viên chức</p>
	<p style="width:100%">....................................................................................................................................................................</p>
	<p style="width:100%">....................................................................................................................................................................</p>
	<p style="height:10px;"></p>
	<p style="height:10px;"></p>

	<div style="width:220px;float:right;">
		<p class="text-center"  style="margin:0;">Ngày ...... tháng ...... năm ...... </p>
		<p class="dam text-center" style="margin:0;">Thủ trưởng đơn vị</p>
		<p class="text-center"  style="margin:0;">(Ký tên và ghi rõ họ tên)</p>
	</div>
	<p style="height:10px;"></p>
	<p style="height:10px;"></p>
	<p style="height:10px;"></p>
	<p style="height:10px;"></p>
	<p style="height:10px;"></p>
	<div class="ngat"></div>
@endforeach




<script src="public/ht96_admin/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="public/ht96_admin./bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="public/ht96_admin/plugins/iCheck/icheck.min.js"></script>

</body>
</html>
