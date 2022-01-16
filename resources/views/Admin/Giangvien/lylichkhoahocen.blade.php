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
 <link rel="stylesheet" href="/public/ht96_admin/bower_components/bootstrap/dist/css/bootstrap.min.css">

 <style type="text/css">
 	 body { font-family:'newfont';font-weight:normal !important;font-style:normal !important;font-size:16px;}	
	.table tr td{padding:5px;}
	.f14{font-size:14px;}
	.f13{font-size:13px;}
	.ngat{ page-break-inside:avoid; page-break-after:always; }
	.col-lg-6{float: left;width:50%}
	.col-lg-6-r{float:right;width:40%;}
	.row{clear:both;padding-top:10px;}
	.col-lg-12{float:left;width:100%;}
	.pal15{padding-left:15px;margin-left:15px;}
	.dam{font-weight:bold;}
	b{font-weight:bold;}
 
 </style>

 

</head>
<body>
<div class="tieude1">
			<p style="text-align:center;font-size:25px;margin-top:30px;">SCIENTIFIC CURRICULUM VITAE</p>
			<!-- <p style="text-align:center;font-size:14px;"><small>(Kèm theo thông tư số: 08/2011/TT-BGDĐT ngày 17 tháng 2 năm 2011 của Bộ trưởng Bộ Giáo dục và Đào tạo)</small></p> -->
		</div>
		
		<div  style="font-size:16px;padding-top:15px;padding-bottom:10px;font-weight:bold;">I. PERSONAL DETAILS</div>


		<div class="row">
			<div class="col-lg-6">Full name: <b>{{$Giangvien->ten}}</b></div>
			<div class="col-lg-6-r">Sex: <b>@if($Giangvien->gioitinh==1) Male @else Female @endif</b></div>
		</div>
		
		<div class="row">
			<div class="col-lg-6">Year of birth: <b>{{date('d/m/Y', strtotime($Giangvien->ngaysinh))}}</b></div>
			<div class="col-lg-6-r">Place of birth: <b>{{$Giangvien->noisinh}}</b></div>
		</div>

		<div class="row">
			<div class="col-lg-6">Home town: <b>{{$Giangvien->quequan}}</b></div>
			<div class="col-lg-6-r">Nation: <b>{{$Giangvien->dantoc}}</b></div>
		</div>

		<div class="row">
			<div class="col-lg-6">Administrative position: <b>{{$Giangvien->chucvu->ten_en}}</b></div>
			<div class="col-lg-6-r">ID Number: <b>{{$Giangvien->cmnd}}</b></div>
		</div>
		

		<div class="row">
			<div class="col-lg-6">Degree: <b>{{$Giangvien->trinhdo->ten_en}}</b> Years: <b>{{$Giangvien->nambonhiemhocvi}} </b></div>
			<div class="col-lg-6-r"><b>{{$Giangvien->nuocnhanhocvi}} </b></div>
		</div>

		<div class="row">
			<div class="col-lg-6">Academic title: <b>{{$Giangvien->chucdanhkhoahoc_en}}</b></div>
			<div class="col-lg-6-r">Year of appointment: <b>{{$Giangvien->nambonhiemchucdanhkhoahoc}}</b></div>
		</div>

		<div class="row">
			<div class="col-lg-12">Administrative position: <b>School of Engineering and Technolory</b></div>			
		</div>

		<div class="row">
			<div class="col-lg-12">Address: <b>{{$Giangvien->diachicoquan}}</b></div>
		</div>

		<div class="row">
			<div class="col-lg-6">Telephone: <b>{{$Giangvien->socoquan}}</b></div>
			<div class="col-lg-6-r">Cell phone: <b>{{$Giangvien->dienthoai}}</b></div>
		</div>

		<div class="row">
			<div class="col-lg-12">Email: <b>{{$Giangvien->email}}</b></div>			
		</div>
			
<div  style="font-size:16px;padding-top:15px;padding-bottom:10px;font-weight:bold;">II. QUALIFICATION</div>	

	<table class="table table-bordered">
		<thead>					
			<tr>
				<td class="dam text-center">NO</td>
				<td class="dam text-center">Years</td>
				<td class="dam text-center">Academic institutions</td>
				<td class="dam text-center">Major/ Specialty</td>
				<td class="dam text-center">Academic degree </td>
			</tr>
		</thead>

		<tbody>
			<?php $kkk=1; ?>
			@foreach($Giangvien->quatrinhdaotao as $dh)
			<tr>
				<td class="text-center">{{$kkk++}}</td>
				<td width="20%">{{date('m/Y', strtotime($dh->ngaybatdau))}} - {{date('m/Y', strtotime($dh->ngayketthuc))}}</td>
				<td>{{$dh->tencoso_en}}</td>
				<td>{{$dh->chuyennganh_en}}</td>
				<td class="text-center">{{$dh->trinhdo->ten_en}}</td>
			</tr>						
			@endforeach
		</tbody>
			
				
	</table>
			
		
		

		
<div style="font-size:16px;padding-top:15px;padding-bottom:10px;font-weight:bold;">III. FOREIGN LANGUAGE:</div>

<table class="table table-bordered">
	<thead>
		<tr>
			<td style="text-align:center;" class="dam">NO</td>
			<td style="text-align:center;" width="50%" class="dam">Language</td>
			<td style="text-align:center;" width="42%" class="dam">rating</td>
		</tr>
	</thead>
	<tbody>
		<?php $d=1; ?>
		@foreach($Giangvien->ngoaingu as $nn)
			<tr>
				<td>{{$d++}}</td>
				<td>{{$nn->ten_en}}</td>
				<td>{{$nn->thongthao_en}}</td>
			</tr>
		@endforeach
	</tbody>

</table>
		



<div class="ngat"></div>


	


		<div  style="font-size:16px;padding-top:15px;padding-bottom:10px;font-weight:bold;text-transform:uppercase;">IV. Expertise and research interests</div>
			<div  style="font-size:16px;padding-top:15px;padding-bottom:10px;font-weight:bold">1. Main research orientation.</div> 	
			<p>{{$Giangvien->huongnghiencuu_en}}</p>
			<div  style="font-size:16px;padding-top:15px;padding-bottom:10px;font-weight:bold">2. List of research projects List all the research grants/ projects received the last 5 years.</div> 			
			<table class="table table-bordered">
				<thead>
					<tr>
						<td style="text-align:center;"  class="dam">NO</td>
						<td style="text-align:center;" width="30%" class="dam">Project name</td>
						<td style="text-align:center;" width="15%" class="dam">Project duration</td>
						<td style="text-align:center;" width="25%" class="dam">Subject level</td>
						<td style="text-align:center;" width="25%" class="dam">Position</td>
					</tr>
				</thead>
				<?php $kk=1; ?>
				@foreach($Detai as $dt)
					@if($dt->ten_en != '')
						<tr>
							<td class="text-center">{{$kk++}}</td>
							<td>{{$dt->ten_en}}</td>
							<td class="text-center">{{date('Y', strtotime($dt->ngaybatdau))}}</td>
							<td>{{$dt->capdetai->ten_en}}</td>
							<td class="text-center">
								@foreach($dt->ct_detai as $ct)
									@if($ct->id_giangvien == Session::get('user_id')) {{$ct->trachnhiem->ten_en}} @endif
								@endforeach
							</td>
						</tr>
					@endif
				@endforeach
			</table>


		<div style="font-size:16px;padding-top:15px;padding-bottom:10px;font-weight:bold">3. Publications and accomplishments:</div> 

		<?php $bbstt=1; ?>
		@foreach($Baibao as $bb)
		@if($bb->ten_en != '' && $bb->nxb_en != '')
			<p class="bold maubaibao">[{{$bbstt++}}]
				<?php $tacgia = '';?>
				<span class="mauten">
					@foreach($bb->ct_baibao as $ctbb)				
						@if($ctbb->id_giangvien == Session::get('user_id'))
							<?php $tacgia.=$ctbb->giangvien->ten.',';?>
						@endif
					@endforeach

					@foreach($bb->ct_baibao as $ctbb)				
						@if($ctbb->id_giangvien != Session::get('user_id') && $ctbb->giangvien != null)
							<?php $tacgia.=$ctbb->giangvien->ten.',';?>
						@endif
					@endforeach
					<?=rtrim($tacgia,',')?>
				</span> - 
				<span class="mautacgia">{{$bb->ten_en}}</span> -  
				<span class="maunxb">{{$bb->nxb_en}}</span>, 
				<span class="maunam">{{date('Y', strtotime($bb->nam))}}</span>
			</p>
		@endif
		@endforeach

			

		<div class="row">
			<div class="col-lg-6">
				<p class="text-center">Applicant's Institution</p>
				<p class="text-center">(Sign and write full name)</p>
				<p style="height:10px;"></p>
				<p style="height:10px;"></p>
				<p style="height:10px;"></p>
				<p style="height:10px;"></p>
				<p style="height:10px;"></p>
			</div>

			<div class="col-lg-6-r">
				<p class="text-center">Applicant</p>
				<p class="text-center">(Sign and write full name)</p>
				<p style="height:10px;"></p>
				<p style="height:10px;"></p>
				<p style="height:10px;"></p>
				<p style="height:10px;"></p>
				<p style="height:10px;"></p>				
			</div>
		</div>

		
</body>
</html>