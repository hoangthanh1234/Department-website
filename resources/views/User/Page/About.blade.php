@extends('User.Index')
@section('title')
	<?php $title='title_'.$lang;echo $Gioithieu_detail->$title; ?>
@endsection
@section('description')
	<?php $description='description_'.$lang;echo $Gioithieu_detail->$description; ?>
@endsection
@section('content')
<div class="nonedesktop">@include('User.Layout.MenuMobi')</div>
<div class="nonepad nonephone">@include('User.Layout.Banner') @include('User.Layout.Menu')</div>
	<section class="container-fluid">	
		<div class="container">
			<div class="row gioithieu">
					<div class="col-lg-12 col-md-9 col-sm-8 col-xs-12">
						<p class="tieude"><?php $ten='ten_'.$lang; echo $Gioithieu_detail->$ten;?></p>							
						<div class="ngaydang">
							<span class="fa fa-calendar"></span>&nbsp;&nbsp;&nbsp;
							{{ Carbon\Carbon::parse($Gioithieu_detail->created_at)->diffforHumans()}}				
						</div>
						<div class="noidung"><?php $noidung='noidung_'.$lang;echo $Gioithieu_detail->$noidung?></div>			
					</div>
			</div>	
		</div>
	</section>
@endsection	


@section('script')
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.12';
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
@endsection