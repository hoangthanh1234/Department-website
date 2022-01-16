@extends('User.Index')

@section('title')
	<?php $ten='ten_'.$lang;echo $Detainghiencuu->$ten; ?>
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
				<p class="tieude" style="padding-top:25px;font-size:25px;">
					@if (Session::has('language') && Session::get('language')=='en')
						{{ $Detainghiencuu->ten_en }}
					@else
						{{ $Detainghiencuu->ten_vi }}
					@endif
					</p>
						

			<div class="ngaydang">
				<span class="fa fa-calendar"></span>&nbsp;&nbsp;&nbsp;				
				{{ Carbon\Carbon::parse($Detainghiencuu->created_at)->diffforHumans()}}				
			</div>

			<?php $chunhiem='';$thanhvien='';?>
			@foreach($Detainghiencuu->ct_detai as $ctdt)
				@if($ctdt->id_trachnhiemdetai == 2)
					<?php $chunhiem.=$ctdt->giangvien->ten.',';?>
				@endif
				@if($ctdt->id_trachnhiemdetai == 3)
					<?php $thanhvien.=$ctdt->giangvien->ten.',';?>
				@endif
			@endforeach

			<div class="noidung" style="margin-bottom:30px;"><?php $mota='mota'.$lang; echo $Detainghiencuu->$mota;?></div>
			
			<p>{{ trans('Nhansu.maso') }}: <b>{{$Detainghiencuu->maso}}</b></p>
			<p>{{ trans('Nhansu.ngaybatdau') }}: <b>{{date('d / m / Y',strtotime($Detainghiencuu->ngaybatdau))}}</b></p>
			@if($chunhiem != '')
				<p>{{ trans('Nhansu.chunhiem') }}: <b>{{rtrim($chunhiem,',')}}</b></p>
			@endif
			@if($thanhvien != '')
				<p>{{ trans('Nhansu.thanhvien') }}: <b>{{rtrim($thanhvien,',')}}</b></p>
			@endif
			<p>{{ trans('Nhansu.trangthai') }}: <b> {{$Detainghiencuu->trangthai}}</b></p>
			@if($Detainghiencuu->minhchung!='') 
				<p>{{ trans('Public.link') }}: <a href="{{$Detainghiencuu->minhchung}}" target="_blank">{{ trans('Public.xemthem') }}</a></p>
			@endif 


		</div>

		
		
	</div>
	</div>
</section>


@endsection