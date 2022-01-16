@extends('Admin.Giangvien.Hosokhoahoc.Master')

@section('Tabvalue')

<style type="text/css">
	.dam{font-weight:bold;}
	
	.table tr td{border:1px solid #333;}
	.text-center{text-align: center;}
	.f14{font-size:14px;}
	.ngat{ page-break-inside:avoid; page-break-after:always; }
</style>
 <div role="tabpanel" class="tab-pane @if ($tab==9) active @endif" id="profile">
		<a href="set_giangvien/PDF/lylichvi/{{$Giangvien->id}}" target="_blank"><button class="btn btn-success" style="float:right;margin-top:20px;">Xuất PDF</button></a>
	<div class="xemlai" style="font-family:'Muli', Arial, sans-serif;">

		<div class="container">
		<div class="tieude1">
			<p style="text-align:center;font-size:25px;margin-top:30px;">LÝ LỊCH KHOA HỌC</p>
			<p style="text-align:center;font-size:14px;"><small>(Kèm theo thông tư số: 08/2011/TT-BGDĐT ngày 17 tháng 2 năm 2011 của Bộ trưởng Bộ Giáo dục và Đào tạo)</small></p>
		</div>
		
		<div  style="font-size:16px;padding-top:15px;padding-bottom:10px;font-weight:bold;">I. LÝ LỊCH SƠ LƯỢC</div>


		<div class="row">
			<div class="col-lg-6">Họ và tên: {{$Giangvien->ten}}</div>
			<div class="col-lg-6">Giới tính: @if($Giangvien->gioitinh==1) Nam @else Nữ @endif</div>
		</div>
		
		<div class="row">
			<div class="col-lg-6">Ngày, tháng, năm sinh: {{date('d/m/Y', strtotime($Giangvien->ngaysinh))}}</div>
			<div class="col-lg-6">Nơi sinh: {{$Giangvien->noisinh}}</div>
		</div>

		<div class="row">
			<div class="col-lg-6">Quê quán: {{$Giangvien->quequan}}</div>
			<div class="col-lg-6">Dân tộc: {{$Giangvien->dantoc}}</div>
		</div>

		<div class="row">
			<div class="col-lg-6">Học vị cao nhất: {{$Giangvien->trinhdo->ten_vi}}</div>
			<div class="col-lg-6">Năm, nước nhận học vị: {{$Giangvien->nambonhiemhocvi}}, {{$Giangvien->nuocnhanhocvi}}</div>
		</div>

		<div class="row">
			<div class="col-lg-6">Chức danh khoa học: {{$Giangvien->chucdanhkhoahoc_vi}}</div>
			<div class="col-lg-6">Năm bổ nhiệm: {{$Giangvien->nambonhiemchucdanhkhoahoc}}</div>
		</div>

		<div class="row">
			<div class="col-lg-12">Đơn vị công tác: {{$Giangvien->tenphongban}} - {{$Giangvien->tencoquan_vi}}</div>			
		</div>

		<div class="row">
			<div class="col-lg-12">Chỗ ở riêng hoặc địa chỉ liên hệ: {{$Giangvien->diachilienhe}}</div>
		</div>

		<div class="row">
			<div class="col-lg-6">Điện thoại liên hệ: CQ:{{$Giangvien->socoquan}}</div>
			<div class="col-lg-6">DĐ: {{$Giangvien->dienthoai}}</div>
		</div>

		<div class="row">
			<div class="col-lg-12">Email: {{$Giangvien->email}}</div>			
		</div>
			
		<div  style="font-size:16px;padding-top:15px;padding-bottom:10px;font-weight:bold;">II. QUÁ TRÌNH ĐÀO TẠO</div>	

			<div class="row">
				<div class="col-lg-12 dam">1. Đại học:</div>
			</div>
			<div class="row">
				<div class="col-lg-12">Hệ đào tạo:@if(isset($Daihoc)) {{$Daihoc->hedaotao->ten_vi}} @endif</div>
			</div>
			<div class="row">
				<div class="col-lg-12">Nơi đào tạo:@if(isset($Daihoc)) {{$Daihoc->tencoso_vi}} @endif</div>
			</div>
			<div class="row">
				<div class="col-lg-12">Ngành học:@if(isset($Daihoc)) {{$Daihoc->chuyennganh_vi}} @endif</div>
			</div>
			<div class="row">
				<div class="col-lg-6">Nước đào tạo:@if(isset($Daihoc)) {{$Daihoc->noidaotao_vi}} @endif</div>
				<div class="col-lg-6">Năm tốt nghiệp: @if(isset($Daihoc)) {{date('Y', strtotime($Daihoc->ngayketthuc))}} @endif</div>
			</div>

			<div class="row">
				<div class="col-lg-6">
					Bằng đại học 2: @if(isset($Daihoc)) @if($Daihoc->giangvien->vanbang2!='') {{$Daihoc->giangvien->vanbang2}} @else Không @endif @endif
				</div>
				<div class="col-lg-6">
					Năm tốt nghiệp:@if(isset($Daihoc)) {{$Daihoc->giangvien->namtotnghiepvb2}} @endif
				</div>
			</div>
			
			<div class="row">
				<div class="col-lg-12 dam">2. Sau đại học:</div>
			</div>
			@foreach($Saudaihoc as $sdh)
				<div class="row">
					<div class="col-lg-6">
						- <span style="padding-left:20px;"></span> <b>{{$sdh->trinhdo->ten_vi}} Chuyên ngành: {{$sdh->chuyennganh_vi}}</b>
					</div>
					<div class="col-lg-6">
						Năm cấp bằng: {{date('Y', strtotime($sdh->ngayketthuc))}}
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12"><p style="padding-left:50px;">Nơi đào tạo:{{$sdh->noidaotao_vi}}</p></div>
				</div>
				@if($sdh->id==$maxqt->id)
					<div class="row">
						<div class="col-lg-12">
							- <span style="padding-left:20px;"></span>Tên luận án: {{$sdh->tenluanan}}
						</div>
					</div>
				@endif
			@endforeach


		

			<div class="row">
				<div class="col-lg-12 dam">3. Ngoại ngữ:</div>
			</div>

				<?php $d=1; ?>
				@foreach($Giangvien->ngoaingu as $nn)
					<div class="row">
						<div class="col-lg-6"><p style="padding-left:30px;">{{$d++}}. {{$nn->ten_vi}}</p></div>
						<div class="col-lg-6">Mức độ sử dụng:	{{$nn->thongthao_vi}}</div>
					</div>
				@endforeach

		 

		


		
		<div  style="font-size:16px;padding-top:15px;padding-bottom:10px;font-weight:bold;">III. QUÁ TRÌNH CÔNG TÁC CHUYÊN MÔN</div>	
			<table class="table table-bordered">
				<thead>
					<tr>
						<th style="text-align:center;" width="20%">Thời gian</th>
						<th style="text-align:center;" width="60%">Nơi công tác</th>
						<th style="text-align:center;" width="40%">Công việc đảm nhiệm</th>
					</tr>
				</thead>
				@foreach($Giangvien->quatrinhcongtac as $qtct)
					<tr>
						<td class="text-center">{{date('Y', strtotime($qtct->ngaybatdau))}} đến {{date('Y', strtotime($qtct->ngayketthuc))}}</td>
						<td>{{$qtct->tencoso_vi}}</td>
						<td class="text-center">{{$qtct->chucvu->ten_vi}}</td>
					</tr>
				@endforeach
			</table>


	 
		<div  style="font-size:16px;padding-top:15px;padding-bottom:10px;font-weight:bold;">IV. QUÁ TRÌNH NGHIÊN CỨU KHOA HỌC</div>
			<div>1. Đề tài nghiên cứu khoa học đã và đang tham gia:</div> 
			<table class="table table-bordered">
				<thead>
					<tr>
						<th style="text-align:center;" width="5%">STT</th>
						<th style="text-align:center;" width="30%">Tên đề tài nghiên cứu</th>
						<th style="text-align:center;" width="15%">Năm bắt đầu / Năm hoàn thành</th>
						<th style="text-align:center;" width="25%">Đề tài cấp (NN, Bộ, Ngành, Trường)</th>
						<th style="text-align:center;" width="25%">Trách nhiệm tham gia trong đề tài</th>
					</tr>
				</thead>
				<?php $kk=1; ?>
				@foreach($Detai as $dt)
					<tr>
						<td class="text-center">{{$kk++}}</td>
						<td>{{$dt->ten_vi}}</td>
						<td class="text-center">{{date('Y', strtotime($dt->ngaybatdau))}}</td>
						<td>{{$dt->capdetai->ten_vi}}</td>
						<td class="text-center">
							@foreach($dt->ct_detai as $ct)
								@if($ct->id_giangvien == Session::get('user_id')) {{$ct->trachnhiem->ten_vi}} @endif
							@endforeach
						</td>
					</tr>
				@endforeach
			</table>


			<div>2. Các công trình khoa học đã công bố:</div> 
			<table class="table table-bordered">
				<thead>
					<tr>
						<th style="text-align:center;" width="5%">STT</th>
						<th style="text-align:center;" width="40%">Tên công trình</th>
						<th style="text-align:center;" width="20%">Năm công bố</th>
						<th style="text-align:center;" width="40%">Tên tạp chí</th>						
					</tr>
				</thead>
				<?php $sttbb=1; ?>
				@foreach($Baibao as $bb)
					<tr>
						<td class="text-center">{{$sttbb++}}</td>
						<td>{{$bb->ten_vi}}</td>
						<td class="text-center">{{date('Y', strtotime($bb->nam))}}</td>
						<td>{{$bb->nxb_vi}}</td>						
					</tr>
				@endforeach
			</table>
		
		

</div>

	</div>
	

 </div>
@endsection