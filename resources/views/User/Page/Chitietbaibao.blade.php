@extends('User.Index')

@section('title')
	<?php $ten='ten_'.$lang;echo $Baibaokhoahoc->$ten; ?>
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
			<p class="tieude" style="padding-top:25px;font-size:25px;"><?php $ten='ten_'.$lang;echo $Baibaokhoahoc->$ten;?></p>
						
			
			<div class="ngaydang">
				<span class="fa fa-calendar"></span>&nbsp;&nbsp;&nbsp;				
				{{ Carbon\Carbon::parse($Baibaokhoahoc->created_at)->diffforHumans()}}				
			</div>

			<?php $tacgia='';?>
			@foreach($Baibaokhoahoc->ct_baibao as $ctbb)	
				@if($ctbb->giangvien != null)			
					<?php $tacgia.=$ctbb->giangvien->ten.',';?>
				@endif				
			@endforeach

			<div class="nxb">
				<b>{{ trans('Nhansu.tacgia') }}</b>:&nbsp;			
				{{rtrim($tacgia,',')}}				
			</div>
		<br>
			<div class="nxb">
				<b>{{ trans('Nhansu.ngayxuatban') }}</b>:&nbsp;			
				{{date('d / m / Y',strtotime($Baibaokhoahoc->nam))}}				
			</div>
		<br>
			<div class="nxb">
				<b>{{ trans('Nhansu.nhaxuatban') }}</b>:&nbsp;			
				<?php $nxb = 'nxb_'.$lang;echo $Baibaokhoahoc->$nxb;?>				
			</div>
		<br>
			<div class="nxb">
				<b>{{ trans('Tintuc.tomtat') }}</b>:&nbsp;			
				<div style="text-align:justify;"><?php $mota = 'mota_'.$lang;echo $Baibaokhoahoc->$mota;?></div>				
			</div>
		<br>
		@if($Baibaokhoahoc->minhchung != '')
			<div class="nxb">
				<b>{{ trans('Public.link') }}</b>:&nbsp;			
				<a href="{{$Baibaokhoahoc->minhchung}}" target="_blank"><?php $ten='ten_'.$lang;echo $Baibaokhoahoc->$ten;?></a>			
			</div>
		@endif
		<br>
		</div>




		
		
	</div>
	</div>
</section>


@endsection