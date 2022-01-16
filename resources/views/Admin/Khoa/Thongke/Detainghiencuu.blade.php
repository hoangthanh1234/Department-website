
@extends('Admin.Master')
@section('title','Danh sách thống kê đề tài nghiên cứu khoa học')
@section('content') 
	<div class="h3 padding20 text-center">Danh sách thống kê đề tài nghiên cứu khoa học giảng viên thuộc khoa</div>
	<div class="padding20">

	<form method="post" action="set_admin/thongke/detainghiencuu" enctype="multipart/form-data">
		<div class="row" style="margin-bottom:20px;">
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
			            <b class="ten2x">Từ ngày:</b>
			            <div class="input-group date">
			                <input type="text"  name="tungay"  class="form-control datepicker" required placeholder="Nhập ngày bắt đống thống kê (dd/mm/yyyy)">
			                <div class="input-group-addon">
			                    <span class="glyphicon glyphicon-th"></span>
			                 </div>
			            </div>
       				</div>

			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
			            <b class="ten2x">Đến ngày:</b>
			            <div class="input-group date">
			                <input type="text"  name="denngay"  class="form-control datepicker" required placeholder="Nhập ngày kết thúc thống kê (dd/mm/yyyy)">
			                <div class="input-group-addon">
			                    <span class="glyphicon glyphicon-th"></span>
			                 </div>
			            </div>
       				</div>

			<div class="col-lg-3 col-md-3">
				<br>
				<input type="submit" class="btn btn-success" value="Xem kết quả">
			@if(isset($Detainghiencuu) && count($Detainghiencuu)>0)
				<input type="button" id="xuatpdf" class="btn btn-success" value="Xuất PDF">
			@endif
			</div>
		</div>
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="hidden" id="tungay" value="@if(isset($fromold)){{$fromold}}@endif">
		<input type="hidden" id="denngay" value="@if(isset($toold)){{$toold}}@endif">

	</form>
		


		<table class="table table-bordered table-hover">
			<thead>
				<tr class="bg-top">
					<th width="5%" class="text-center">STT</th>
					<th width="20%">Chủ nhiệm</th>
					<th width="20%">Thành viên</th>
					<th>Tên công trình</th>
					<th width="10%" class="text-center">Minh chứng</th>					
				</tr>
			</thead>
			<tbody>	
				<?php $a=1; ?>
				@if(isset($Detainghiencuu))
					@foreach($Detainghiencuu as $dtnc)
						<tr>
							<td class="text-center">{{$a++}}</td>							
							<td>
							<?php $chunhiem='';?>
							@foreach($CT_detai as $ctdt)
								@if($ctdt->id_detai == $dtnc->id && $ctdt->trachnhiem->id==2)
									<?php $chunhiem.=$ctdt->giangvien->ten.',';?>
								@endif
							@endforeach
							<?php $chunhiem=rtrim($chunhiem,',');?>
							{{$chunhiem}}
						</td>	
						<td>
							<?php $thanhvien='';?>
							@foreach($CT_detai as $ctdt)
								@if($ctdt->id_detai == $dtnc->id && $ctdt->trachnhiem->id==3)
									<?php $thanhvien.=$ctdt->giangvien->ten.',';?>
								@endif
							@endforeach
							<?php $thanhvien=rtrim($thanhvien,',');?>
							{{$thanhvien}}
						</td>
						<td>{{$dtnc->ten_vi}}</td>
							<td class="text-center">
								@if($ctdt->detai->minhchung!='') 
									<a href="{{$ctdt->detai->minhchung}}" target="_blank">Có</a> 
								@else 
									Đang cập nhật 
								@endif
								
							</td>
						</tr>
					@endforeach
				@endif
			</tbody>
		</table>
		  <div class="paging text-center"></div>
		  <a href="set_admin"><button class="btn btn-danger pull-right">Thoát</button></a>


		 	 

	</div>
@endsection

@section('script')
<script type="text/javascript">
	
	$(document).on('click','#xuatpdf',function(){
		var tungay=$('#tungay').val();
		var denngay=$('#denngay').val();
		var find = '/';		
		var re = new RegExp(find, 'g');
		tungaycat = tungay.replace(re, '-');
		denngaycat=denngay.replace(re,'-');
		window.open("set_admin/PDF/detainghiencuu/"+tungaycat+"/"+denngaycat);
		
	});

</script>

@endsection