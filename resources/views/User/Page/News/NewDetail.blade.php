@extends('User.Index')
@section('title')
	<?php $title='title_'.$lang;echo $tintuc_detail->$title;?>
@endsection
@section('description')
	<?php $description='description_'.$lang;echo $tintuc_detail->$description; ?>
@endsection
@section('content')
<div class="nonedesktop">@include('User.Layout.MenuMobi')</div>
<div class="nonepad nonephone">
@include('User.Layout.Banner')
@include('User.Layout.Menu')
</div>

<section class="tintuc_detail">
	<div class="container">		
	<div class="row">
		@php
			$noidung='noidung_'.$lang;
			$thanhphan_thamdu = 'thanhphan_thamdu_'.$lang;
			$baihoc_kinhnghiem = 'baihoc_kinhnghiem_'.$lang;
			$noidung_phoihop = 'noidung_phoihop_'.$lang;
			$daumoi_lienhe = 'daumoi_lienhe_'.$lang;
			$baocao_chuongtrinh = 'baocao_chuongtrinh_'.$lang;
			$dat_cauhoi = 'dat_cauhoi_'.$lang;
			$ten='ten_'.$lang;
		@endphp


		<div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
			@if($tintuc_detail->$noidung!='')
				<p class="tieude" style="padding-top:25px;font-size:20px;"><?php echo $tintuc_detail->$ten;?></p>
			@endif			

			<div class="ngaydang">
				<span class="fa fa-calendar"></span>&nbsp;&nbsp;&nbsp;				
				{{ Carbon\Carbon::parse($tintuc_detail->created_at)->diffforHumans()}}				
			</div>

			<div class="noidung" style="margin-bottom:30px;">
				
				@if($tintuc_detail->$noidung!='')
					{!!$tintuc_detail->$noidung!!}
				@else
					<p class="tieude" style="padding-top:15px;font-size:20px;"> 
					{{-- {{ trans('Tintuc.vaongay') }}  {{date('d / m / Y',strtotime($tintuc_detail->ngay))}}  --}}
					{!!$tintuc_detail->$ten!!}</p>					
					<div class="text-center">
						<img src="ht96_image/news/{{$tintuc_detail->hinhanh}}" class="img-responsive img-thumbnail" style="max-height:400px;">
					</div>
				@endif
				<?php $i=0 ;?>
				@if($tintuc_detail->$thanhphan_thamdu != '' && $tintuc_detail->$noidung=='')
				<?php $i++;?>
					<p style="font-size:18px;color:#E95A13;">{{$i}}. {{ trans('Tintuc.thanhphanthamdu') }}</p>
					<div style="margin:15px 0;">
						{!!$tintuc_detail->$thanhphan_thamdu!!}
					</div>
				@endif

				@if($tintuc_detail->$baihoc_kinhnghiem != '' && $tintuc_detail->$noidung=='')
				<?php $i++;?>
					<p style="font-size:18px;color:#E95A13;">{{$i}}. {{ trans('Tintuc.baihockinhnghiem') }}</p>
					<div style="margin:15px 0;">
						{!!$tintuc_detail->$baihoc_kinhnghiem!!}
					</div>
				@endif

				@if($tintuc_detail->$noidung_phoihop != '' && $tintuc_detail->$noidung=='')
				<?php $i++;?>
					<p style="font-size:18px;color:#E95A13;">{{$i}}. {{ trans('Tintuc.noidungphoihop') }}</p>
					<div style="margin:15px 0;">
						{!!$tintuc_detail->$noidung_phoihop!!}
					</div>
				@endif

				@if($tintuc_detail->$daumoi_lienhe != '' && $tintuc_detail->$noidung=='')
				<?php $i++;?>
					<p style="font-size:18px;color:#E95A13;">{{$i}}. {{ trans('Tintuc.daumoilienhe') }}</p>
					<div style="margin:15px 0;">
						{!!$tintuc_detail->$daumoi_lienhe!!}
					</div>
				@endif		

				@if($tintuc_detail->$baocao_chuongtrinh != '' && $tintuc_detail->$noidung=='')
				<?php $i++;?>
					<p style="font-size:18px;color:#E95A13;">{{$i}}. {{ trans('Tintuc.baocaochuongtrinh') }}</p>
					<div style="margin:15px 0;">
						{!!$tintuc_detail->$baocao_chuongtrinh!!}
					</div>
				@endif

				@if($tintuc_detail->$dat_cauhoi != '' && $tintuc_detail->$noidung=='')
				<?php $i++;?>
					<p style="font-size:18px;color:#E95A13;">{{$i}}. {{ trans('Tintuc.datcauhoi') }}</p>
					<div style="margin:15px 0;">
						{!!$tintuc_detail->$dat_cauhoi!!}
					</div>
				@endif				
								
			</div>

		</div>

		
		 <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 tinkhac">
			<div class="row tinnoibat">
				<div class="tieude">{{trans('Public.tinlienquan')}}</div>
				<div class="noidung" >	
					<div class="row noidungtin">
						<div class="col-lg-12 col-md-12" style="padding-left: 0">
					@foreach ($tin_lienquan as $tin_lq)				
							<div style="padding:5px 0;"><a class="ten" href="{{trans('Link.tintuc')}}/{{trans('Link.baiviet')}}/<?php $tenkhongdau='tenkhongdau_'.$lang;echo $tin_lq->$tenkhongdau;?>/{{$tin_lq->id}}.html"><?php $ten='ten_'.$lang;echo $tin_lq->$ten;?></a></div>
					@endforeach	
							</div>	
					</div>			
				</div>				
			</div>

			<div class="row tinnoibat" >
				<div class="tieude">{{trans('Public.tinmoinhat')}}</div>
					@foreach($tin_moinhat as $tin_moi)
						<div class="row noidungtin">
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 clearm">
									<a class="tent" href="{{trans('Link.tintuc')}}/{{trans('Link.baiviet')}}/<?php $tenkhongdau='tenkhongdau_'.$lang;echo $tin_moi->$tenkhongdau;?>/{{$tin_moi->id}}.html"><img src="ht96_image/news/{{$tin_moi->hinhanh}}" style="width:100%;height:60px;"></a>
								</div>

								<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bold" style="padding-right:0;">
									<a href="{{trans('Link.tintuc')}}/{{trans('Link.baiviet')}}/<?php $tenkhongdau='tenkhongdau_'.$lang;echo $tin_moi->$tenkhongdau;?>/{{$tin_moi->id}}.html"><?php $ten='ten_'.$lang;echo $tin_moi->$ten;?></a>
								</div>
						</div>
						<div class="clearfix"></div>
					@endforeach					
			</div>

			<div class="row tinxemnhieu">
				<div class="tieude">{{trans('Public.xemnhieunhat')}}</div>	
					@foreach($tin_xemnhieu as $tin_xn)
						<div class="row noidungtin" style="padding-left:25px;">
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 clearm">
								<a href="{{trans('Link.tintuc')}}/{{trans('Link.baiviet')}}/<?php $tenkhongdau='tenkhongdau_'.$lang;echo $tin_xn->$tenkhongdau;?>/{{$tin_xn->id}}.html"><img src="ht96_image/news/{{$tin_xn->hinhanh}}" style="width:100%;height:60px;"></a>
							</div>

							<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bold">
								<a href="{{trans('Link.tintuc')}}/{{trans('Link.baiviet')}}/<?php $tenkhongdau='tenkhongdau_'.$lang;echo $tin_xn->$tenkhongdau;?>/{{$tin_xn->id}}.html"><?php $ten='ten_'.$lang;echo $tin_xn->$ten;?></a>
							</div>
							<div class="clearfix"></div>
						</div>	
					@endforeach
			</div>

		</div>
		 	 
	</div>
	</div>
</section>
@endsection			
		