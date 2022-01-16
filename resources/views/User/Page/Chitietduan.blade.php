@extends('User.Index')

@section('title')
	<?php $ten='ten_'.$lang;echo $Quanlyduan->$ten; ?>
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
				<p class="tieude" style="padding-top:25px;font-size:25px;"><?php $ten='ten_'.$lang;echo $Quanlyduan->$ten;?></p>
						

			<div class="ngaydang">
				<span class="fa fa-calendar"></span>&nbsp;&nbsp;&nbsp;				
				{{ Carbon\Carbon::parse($Quanlyduan->created_at)->diffforHumans()}}				
			</div>
			<div class="noidung" style="margin-bottom:30px;"><?php $noidung='noidung_'.$lang; echo $Quanlyduan->$noidung;?></div>
		</div>

		
		
	</div>
	</div>
</section>


@endsection