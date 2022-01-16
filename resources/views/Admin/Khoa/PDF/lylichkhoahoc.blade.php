<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminSET| Lý lịch khoa học</title>
   <base href="{{asset('/public/')}}">
  <!-- Tell the browser to be responsive to screen width -->
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

 <style type="text/css">

 	body { font-family:'newfont';font-weight:normal !important;font-style:normal !important;font-size:16px;}	
	.table tr td{padding:5px;}
	.f14{font-size:14px;}
	.f13{font-size:13px;}
	.ngat{ page-break-inside:avoid; page-break-after:always; }
	.col-lg-6{float: left;width:50%}
	.col-lg-6-r{float:right;width:40%;}
	.row{clear:both;}
	.col-lg-12{float:left;width:100%;}
	.pal15{padding-left:15px;margin-left:15px;}
	b{font-weight:bold;}
 </style>
</head>

<body>

	@foreach($Lylichgiangvien as $Giangvien)

		<div class="tieude1" style="display:inline-table;">
			<p style="text-align:center;font-size:25px;font-weight:bold;">LÝ LỊCH KHOA HỌC</p>
			<p style="text-align:center;font-size:16px;"><small>(Kèm theo thông tư số: 08/2011/TT-BGDĐT ngày 17 tháng 2 năm 2011 <br>của Bộ trưởng Bộ Giáo dục và Đào tạo)</small></p>
		</div>
		
		<div  style="font-size:16px;padding-top:15px;padding-bottom:10px;font-weight:bold;">I. LÝ LỊCH SƠ LƯỢC</div>

		
		<div class="row">
			<div class="col-lg-6">Họ và tên: <b>{{$Giangvien->ten}}</b></div>
			<div class="col-lg-6-r">Giới tính: <b>@if($Giangvien->gioitinh==1) Nam @else Nữ @endif</b></div>
		</div>
		
		
		
		<div class="row" style="display:inline-block;">
			<div class="col-lg-6">Ngày, tháng, năm sinh: <b>{{date('d/m/Y', strtotime($Giangvien->ngaysinh))}}</b></div>
			<div class="col-lg-6-r">Nơi sinh: <b>{{$Giangvien->noisinh}}</b></div>
		</div>

		<div class="row">
			<div class="col-lg-6">Quê quán: <b>{{$Giangvien->quequan}}</b></div>
			<div class="col-lg-6-r">Dân tộc: <b>{{$Giangvien->dantoc}}</b></div>
		</div>

		<div class="row">
			<div class="col-lg-6">Học vị cao nhất: <b>{{$Giangvien->trinhdo->ten_vi}}</b></div>
			<div class="col-lg-6-r">Năm, nước nhận học vị: <b>{{$Giangvien->nambonhiemhocvi}}, {{$Giangvien->nuocnhanhocvi}}</b></div>
		</div>

		<div class="row">
			<div class="col-lg-6">Chức danh khoa học: <b>{{$Giangvien->chucdanhkhoahoc_vi}}</b></div>
			<div class="col-lg-6-r">Năm bổ nhiệm: <b>{{$Giangvien->nambonhiemchucdanhkhoahoc}}</b></div>
		</div>

		<div class="row">
			<div class="col-lg-12">Đơn vị công tác: <b>Khoa Kỹ thuật và Công nghệ</b></div>			
		</div>

		<div class="row">
			<div class="col-lg-12">Chỗ ở riêng hoặc địa chỉ liên hệ: <b>{{$Giangvien->diachilienhe}}</b></div>
		</div>

		<div class="row">
			<div class="col-lg-6">Điện thoại liên hệ: CQ:<b>{{$Giangvien->socoquan}}</b></div>
			<div class="col-lg-6-r">DĐ: <b>{{$Giangvien->dienthoai}}</b></div>
		</div>

		<div class="row">
			<div class="col-lg-12">Email: <b>{{$Giangvien->email}}</b></div>			
		</div>

		<div class="row">
			<div class="col-lg-12">Liên kết Google site: <b>{{$Giangvien->linkgooglesite}}</b></div>
		</div>

		<div class="row">
			<div class="col-lg-12">Liên kết Google scholar: <b>{{$Giangvien->linkgooglescholar}}</b></div>
		</div>
			
		<div  style="font-size:16px;padding-top:15px;padding-bottom:10px;font-weight:bold;">II. QUÁ TRÌNH ĐÀO TẠO</div>	

		<div class="row">
			<div class="col-lg-12 dam">1. Đại học:</div>
		</div>
		@foreach($Giangvien->quatrinhdaotao as $dh)
		<div class="row">
			<div class="col-lg-12 pal15">Hệ đào tạo: <b>{{$dh->hedaotao->ten_vi}}</b></div>
		</div>
		<div class="row">
			<div class="col-lg-12 pal15">Nơi đào tạo: <b>{{$dh->tencoso_vi}}</b></div>
		</div>
		<div class="row">
			<div class="col-lg-12 pal15">Ngành học: <b>{{$dh->chuyennganh_vi}}</b></div>
		</div>
		<div class="row">
			<div class="col-lg-6 pal15">Nước đào tạo: <b>{{$dh->noidaotao_vi}}</b></div>
			<div class="col-lg-6-r">Năm tốt nghiệp: <b>{{date('Y', strtotime($dh->ngayketthuc))}}</b></div>
		</div>
		<?php break; ?>
		@endforeach
		<div class="row">
			<div class="col-lg-6 pal15">
				Bằng đại học 2: 
				<b>@if($Giangvien->bangdaihoc2!='') 
					{{$Giangvien->bangdaihoc2}} @else Không @endif 
				</b>
			</div>
			<div class="col-lg-6-r">
				Năm tốt nghiệp: 
				<b>@if($Giangvien->bangdaihoc2!='') 
						{{$Giangvien->namtotnghiepbangdaihoc2}} 
					@endif
				</b>
			</div>
		</div> 
			
<div class="row">
	<div class="col-lg-12 dam">2. Sau đại học:</div>
</div>

@foreach($Giangvien->saudaihoc as $sdh)
	<div class="row">
		<div class="col-lg-6 pal15">
		- <span style="padding-left:20px;"></span> <b>{{$sdh->trinhdo->ten_vi}} Chuyên ngành: {{$sdh->chuyennganh_vi}}</b>
		</div>
		<div class="col-lg-6-r">
			Năm cấp bằng: <b>{{date('Y', strtotime($sdh->ngayketthuc))}}</b>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 pal15"><p style="padding-left:50px;">Nơi đào tạo: <b>{{$sdh->noidaotao_vi}}</b></p></div>
	</div>
	@if($sdh->id==$sdh->max('id'))
		<div class="row">
			<div class="col-lg-12 pal15">
				- <span style="padding-left:20px;"></span>Tên luận án: <b>{{$sdh->tenluanan}}</b>
			</div>
		</div>
	@endif

@endforeach
		

<div class="row">
	<div class="col-lg-12 dam">3. Ngoại ngữ:</div>
</div>

<?php $d=1; ?>
@foreach($Giangvien->ngoaingu as $nn)
	<div class="row pal15">
		<div class="col-lg-6"><p>{{$d++}}. <b>{{$nn->ten_vi}}</b></p></div>
	</div>
@endforeach

<div class="ngat"></div>		
<div  style="font-size:16px;padding-top:15px;padding-bottom:10px;font-weight:bold;">III. QUÁ TRÌNH CÔNG TÁC CHUYÊN MÔN</div>
	<table class="table table-bordered">
		<thead>
			<tr>
				<td style="text-align:center;" width="20%">Thời gian</td>
				<td style="text-align:center;" width="40%">Nơi công tác</td>
				<td style="text-align:center;" width="40%">Công việc đảm nhiệm</td>
			</tr>
		</thead>
		@foreach($Giangvien->quatrinhcongtac as $qtct)
			<tr>
				<td style="text-align:center;">{{date('Y', strtotime($qtct->ngaybatdau))}} đến {{date('Y', strtotime($qtct->ngayketthuc))}}</td>
				<td>{{$qtct->tencoso_vi}}</td>
				<td>{{$qtct->chucvu->ten_vi}}</td>
			</tr>
		@endforeach
		</table>
		<div  style="font-size:16px;padding-top:15px;padding-bottom:10px;font-weight:bold;">IV. QUÁ TRÌNH NGHIÊN CỨU KHOA HỌC</div>
			<div>1. Đề tài nghiên cứu khoa học đã và đang tham gia:</div> 
			<table class="table table-bordered">
				<thead>
					<tr>
						<td style="text-align:center;" width="5%" class="dam">#</td>
						<td style="text-align:center;" width="30%" class="dam">Tên đề tài nghiên cứu</td>
						<td style="text-align:center;" width="15%" class="dam">Năm bắt đầu / Năm hoàn thành</td>
						<td style="text-align:center;" width="25%" class="dam">Đề tài cấp (NN, Bộ, Ngành, Trường)</td>
						<td style="text-align:center;" width="25%" class="dam">Trách nhiệm tham gia trong đề tài</td>
					</tr>
				</thead>
				<?php $kk=1; ?>
				@foreach(detai($Giangvien->id) as $dt)
					<tr>
						<td class="text-center">{{$kk++}}</td>
						<td>{{$dt->ten_vi}}</td>
						<td class="text-center">{{date('Y', strtotime($dt->ngaybatdau))}}</td>
						<td>{{$dt->capdetai->ten_vi}}</td>
						<td class="text-center">
							@foreach($dt->ct_detai as $ct)
								@if($ct->id_giangvien == $Giangvien->id) {{$ct->trachnhiem->ten_vi}} @endif
							@endforeach
						</td>
					</tr>
				@endforeach
			</table>


			<div>2. Các công trình khoa học đã công bố:</div> 
			<table class="table table-bordered">
				<thead>
					<tr>
						<td style="text-align:center;" width="5%">#</td>
						<td style="text-align:center;" width="40%">Tên công trình</td>
						<td style="text-align:center;" width="20%">Năm công bố</td>
						<td style="text-align:center;" width="40%">Tên tạp chí</td>						
					</tr>
				</thead>				
				<?php $sttbb=1; ?>
				@foreach(baibao($Giangvien->id) as $bb)
					<tr>
						<td class="text-center">{{$sttbb++}}</td>
						<td>{{$bb->ten_vi}}</td>
						<td class="text-center">{{date('Y', strtotime($bb->nam))}}</td>
						<td>{{$bb->nxb_vi}}</td>						
					</tr>
				@endforeach
			</table>


<div class="row">
	<div class="col-lg-6">
		<p class="text-center">Xác nhận của cơ quan công tác</p>
		<p class="text-center">(ký và ghi rõ họ tên)</p>
		<p style="height:10px;"></p>
		<p style="height:10px;"></p>
		<p style="height:10px;"></p>
		<p style="height:10px;"></p>
		<p style="height:10px;"></p>
	</div>

	<div class="col-lg-6-r">
		<p class="text-center">Người khai</p>
		<p class="text-center">(ký và ghi rõ họ tên)</p>
		<p style="height:10px;"></p>
		<p style="height:10px;"></p>
		<p style="height:10px;"></p>
		<p style="height:10px;"></p>
		<p style="height:10px;"></p>
				
	</div>
</div>
<div class="ngat"></div>
@endforeach		
</body>
</html>