@extends('User.Index')

@section('title')
	<?php $ten='ten_'.$lang;echo $Nhom->$ten; ?>
@endsection


@section('content')
	<div class="nonedesktop">
		@include('User.Layout.MenuMobi')
	</div>
	<div class="nonepad nonephone">
		@include('User.Layout.Banner')
		@include('User.Layout.Menu')
	</div>


<section class="tintuc_detail">
	<div class="container">		
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<p class="tieude" style="padding-top:25px;font-size:25px;"><?php $ten='ten_'.$lang;echo $Nhom->$ten;?></p>
						
			
			<div class="ngaydang">
				<span class="fa fa-calendar"></span>&nbsp;&nbsp;&nbsp;				
				{{ Carbon\Carbon::parse($Nhom->created_at)->diffforHumans()}}				
			</div>

			<?php $truongnhom = ''; $thanhvien = '';?>
			@foreach($Nhom->ct_nhom as $ctn)	
				@if($ctn->id_nhom == $Nhom->id && $ctn->id_nhiemvu == 1 && $ctn->giangvien != null)			
					<?php $truongnhom.=$ctn->giangvien->ten.',';?>
				@endif
				@if($ctn->id_nhom == $Nhom->id && $ctn->id_nhiemvu != 1 && $ctn->giangvien != null)			
					<?php $thanhvien.=$ctn->giangvien->ten.',';?>
				@endif				
			@endforeach

			<div class="nxb">
				<b>{{ trans('Nhansu.truongnhom') }}</b>:&nbsp;			
				{{rtrim($truongnhom,',')}}			
			</div>
		<br>
			<div class="nxb">
				<b>{{ trans('Nhansu.thanhvien') }}</b>:&nbsp;			
				{{rtrim($thanhvien,',')}}				
			</div>
		<br>
			<div class="nxb">
				<b>{{ trans('Nhansu.linhvucnghiencuu') }}</b>:&nbsp;			
				<?php $ten = 'ten_'.$lang; echo $Nhom->linhvuc->$ten;?>				
			</div>		
		<br>
			<div class="nxb">
				<b>{{ trans('Tintuc.tomtat') }}</b>:&nbsp;			
				<div style="text-align:justify;"><?php $mota = 'mota_'.$lang;echo $Nhom->$mota;?></div>				
			</div>
		<br>
		
		<br>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12 col-md-12 col-xs-12">
			<p class="tieude" style="padding-top:25px;font-size:20px;">{{ trans('Nhansu.detainghiencuu') }}</p>
		</div>
		<div class="col-lg-12 col-md-12 col-xs-12">
			<table class="table table-striped table-bordered example">
				<tr>
					<th width="5%">#</th>
					<th>{{ trans('Nhansu.tenduan') }}</th>
					<th width="25%" class="text-center">{{ trans('Nhansu.thanhvien') }}</th>
					<th width="10%" class="text-center">{{trans('Public.xemthem')}}</th>
				</tr>
				<?php $i = 1;?>
				@foreach ($Baocao as $bc)
					<tr>
						<td class="text-center">{{$i++}}</td>
						<td><?php $ten = 'ten_'.$lang; echo $bc->$ten;?></td>
						<td class="text-center">{{$bc->ct_nhom->giangvien->ten}}</td>
						<td>
							<?php $pdf = 'pdf_'.$lang;?>
							@if($bc->$pdf != '')
								<a href="{{$bc->$pdf}}">{{ trans('Public.xemthem') }}</a>
							@endif
						</td>
					</tr>
				@endforeach
			</table>
		</div>
	</div>


	</div>
</section>


@endsection