@extends('Admin.Master')
@section('title','Danh sách thống kê bài báo khoa học')
@section('content') 
	<div class="h3 padding20 text-center">Danh sách thống kê bài báo khoa học giảng viên thuộc khoa</div>
	<div class="padding20">

	<form method="post" action="set_admin/thongke/baibaokhoahoc" enctype="multipart/form-data">
		<div class="row" style="margin-bottom:20px;">
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
			            <b class="ten2x">Từ ngày:</b>
			            <div class="input-group date">
			                <input type="text"  name="tungay" @if(isset($fromold)) value="{{$fromold}}" @endif  class="form-control datepicker" required placeholder="Nhập ngày bắt đống thống kê (dd/mm/yyyy)">
			                <div class="input-group-addon">
			                    <span class="glyphicon glyphicon-th"></span>
			                 </div>
			            </div>
       				</div>

			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
			            <b class="ten2x">Đến ngày:</b>
			            <div class="input-group date">
			                <input type="text"  name="denngay" @if(isset($toold)) value="{{$toold}}" @endif  class="form-control datepicker" required placeholder="Nhập ngày kết thúc thống kê (dd/mm/yyyy)">
			                <div class="input-group-addon">
			                    <span class="glyphicon glyphicon-th"></span>
			                 </div>
			            </div>
       				</div>

			<div class="col-lg-3 col-md-3">
				<br>
				<input type="submit" class="btn btn-success" value="Xem kết quả">
			@if(isset($Baibaokhoahoc) && count($Baibaokhoahoc)>0)
				<input type="button" id="xuatpdf" class="btn btn-success" value="Xuất PDF">
				<input type="button" id="xuatexcel" class="btn btn-success" value="Xuât Excel">
			@endif
			</div>
		</div>

		<div class="row" style="margin-bottom:30px;">			
			<div class="col-lg-4 col-md-4">
				<b class="ten2x">Loại bài báo khoa học</b>
			<select class="form-control select2" multiple="multiple" id="loaibaibao" name="loaibaibao[]" data-placeholder="chọn loại tác giả bài báo muôn xuất" required>
				<?php if(isset($Loaibaibaoold)) $loai = explode(',',$Loaibaibaoold);?>					
					@foreach($Loaibaibao as $LBB)
						<option value="{{$LBB->id}}" 
							@if(isset($Loaibaibaoold)) @if(in_array($LBB->id,$loai) ) selected @endif @endif>{{$LBB->ten_vi}}
						</option>
					@endforeach
			</select>
			</div>

			
		</div>


		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="hidden" id="tungay" value="@if(isset($fromold)){{$fromold}}@endif">
		<input type="hidden" id="denngay" value="@if(isset($toold)){{$toold}}@endif">
		<input type="hidden" id="loaiketquakk" value="@if(isset($Loaibaibaoold)){{$Loaibaibaoold}}@endif">

	</form>
		


		<table class="table table-bordered table-hover">
			<thead>
				<tr class="bg-top">
					<th width="5%" class="text-center">STT</th>
					<th width="25%">Tác giả</th>
					<th>Tên bài báo</th>
					<th width="10%" class="text-center">NXB</th>
					<th width="10%" class="text-center">Minh chứng</th>					
				</tr>
			</thead>
			<tbody>	
				<?php $a=1; ?>
				@if(isset($Baibaokhoahoc))
					@foreach($Baibaokhoahoc as $bb)
						<tr>
							<td class="text-center">{{$a++}}</td>
							<td>
								<?php $tacgia='';?>
								@foreach($CT_baibao as $ctbb)
									@if($ctbb->id_baibao == $bb->id)
										@if ($ctbb->giangvien)
										<?php $tacgia.=$ctbb->giangvien->ten.',';?>
										@else
										 <i style="color:red">Không tìm thấy tên giảng viên</i>,	
										@endif
										
									@endif
								@endforeach
								<?php $tacgia=rtrim($tacgia,',');?>
								{{$tacgia}}
							</td>
							<td>{{$bb->ten_vi}}</td>
							<td>{{$bb->nxb}}</td>
							<td class="text-center"><a href="@if($bb->minhchung!='') {{$bb->minhchung}} @else # @endif" target="_blank">Có</a></td>
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
		var loaikq=$('#loaiketquakk').val();
		
		window.open("set_admin/PDF/baibaokhoahoc/"+tungaycat+"/"+denngaycat+"/"+loaikq);
		
	});


	$(document).on('click','#xuatexcel',function(){
		var tungay=$('#tungay').val();
		var denngay=$('#denngay').val();
		var find = '/';		
		var re = new RegExp(find, 'g');
		tungaycat = tungay.replace(re, '-');
		denngaycat=denngay.replace(re,'-');
		var loaikq=$('#loaiketquakk').val();
		
		window.open("set_admin/Excel/danhsachbaibaokhoahoc/"+tungaycat+"/"+denngaycat+"/"+loaikq);
		
	});	

</script>

@endsection