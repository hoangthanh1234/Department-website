@extends('Admin.Giangvien.Hosokhoahoc.Master')

@section('Tabvalue')
 <div role="tabpanel" class="tab-pane @if ($tab==10) active @endif" id="profile">
 	<style type="text/css">
 		
 		.dam{font-weight:bold;}
	
	.table tr td{border:1px solid #333;}
	.text-center{text-align: center;}
	.f14{font-size:14px;}
	.ngat{ page-break-inside:avoid; page-break-after:always; }
 	</style>

	<div class="xemlai">
		<a href="set_giangvien/PDF/lylichen/{{$Giangvien->id}}" target="_blank">
			<button class="btn btn-success" style="float:right;margin-top:20px;">Export PDF</button>
		</a>
	
		
		<div class="container">
			
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
			<div class="col-lg-6">Home address: <b>{{$Giangvien->quequan}}</b></div>			
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
			<div class="col-lg-12">Units: <b>School of Engineering and Technolory</b></div>			
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
				<td class="dam">NO</td>
				<td class="dam">Years</td>
				<td class="dam">Academic institutions</td>
				<td class="dam">Major/ Specialty</td>
				<td class="dam">Academic degree </td>
			</tr>
		</thead>

		<tbody>
			<?php $kkk=1; ?>
			@foreach($Giangvien->quatrinhdaotao as $dh)
			<tr>
				<td class="text-center">{{$kkk++}}</td>
				<td>{{date('m/Y', strtotime($dh->ngaybatdau))}} - {{date('m/Y', strtotime($dh->ngayketthuc))}}</td>
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
			<td style="text-align:center;" width="5%" class="dam">NO</td>
			<td style="text-align:center;" width="50%" class="dam">Language</td>
			<td style="text-align:center;" width="45%" class="dam">Rating</td>
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
						<td style="text-align:center;" width="5%" class="dam">NO</td>
						<td style="text-align:center;" width="30%" class="dam">Project name</td>
						<td style="text-align:center;" width="15%" class="dam">The beginning year</td>
						<td style="text-align:center;" width="25%" class="dam">Fundy Organizations</td>
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
		
		

</div>

	</div>



 </div>
@endsection