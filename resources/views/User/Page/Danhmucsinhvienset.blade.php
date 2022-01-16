@extends('User.Index')
@section('title')
     {{trans('Nhansu.cuusinhvien')}}
@endsection

@section('link')	
		
	<link rel="stylesheet" href="ht96_user/tem/css/linearicons.css">	
	<link rel="stylesheet" href="ht96_user/tem/css/nice-select.css">	
	<link rel="stylesheet" href="ht96_user/tem/css/owl.carousel.css">
	<link rel="stylesheet" href="ht96_user/tem/css/jquery-ui.css">
	<link rel="stylesheet" href="ht96_user/tem/css/main.css">

@endsection

@section('content')
@if(session('thongbao'))
     <div class="alert alert-danger" style="font-weight:bold;font-family:Arial;text-align:center;">
                        {{session('thongbao')}}
      </div>
@endif
<div class="nonedesktop">@include('User.Layout.MenuMobi')</div>
<div class="nonepad nonephone">
@include('User.Layout.Banner')
@include('User.Layout.Menu')
</div>

<section style="background: #ecf0f1;min-height:100vh;">
	<section class="latest-post-area pb-120">
				<div class="container no-padding">
					<div class="row">
						<div class="col-lg-12 col-md-8 col-xs-12 post-list">							
							<div class="latest-post-wrap">
								<h5 class="cat-title upper">{{trans('Menu.sinhvienset')}}&nbsp;&nbsp;-&nbsp;&nbsp;<?php $ten='ten_'.$lang;echo $Danhmuc->$ten;?></h5>
								@foreach($Danhmuc->getOptionsPaginatedAttribute() as $tb)
								<div class="single-latest-post row align-items-center" style="padding-left:30px;">									
									<div class="col-lg-12 post-right">
										<a href="{{trans('Link.sinhvienset')}}/{{trans('Link.baiviet')}}/{{$tb->id}}.html">
											<h5 style="font-size:14px;"><?php $ten='ten_'.$lang;echo $tb->$ten; ?>.</h5>
										</a>
										<ul class="meta" style="margin:0;">
											<li class="bold"><a href="{{trans('Link.sinhvienset')}}/{{trans('Link.baiviet')}}/{{$tb->id}}.html"><span class="fa fa-calendar"></span>&nbsp;&nbsp; 
												<?php Carbon\Carbon::setLocale(Session::get('language'))?>
											{{Carbon\Carbon::parse($tb->created_at)->diffforHumans()}}</a></li>	
										</ul>
										<p class="excert bold">
											{!!$tb->mota!!}
										</p>
									</div>
								</div>
								@endforeach

							 <div class="paging text-center">{!! $Danhmuc->getOptionsPaginatedAttribute()->links() !!}</div>
							</div>
							
						</div>


					</div>
				</div>
			</section>
</section>
@endsection



@section('script')	     
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="ht96_user/tem/js/easing.min.js"></script>
		<script src="ht96_user/tem/js/hoverIntent.js"></script>		
		<script src="ht96_user/tem/js/jquery.ajaxchimp.min.js"></script>
		<script src="ht96_user/tem/js/mn-accordion.js"></script>		
		<script src="ht96_user/tem/js/jquery.nice-select.min.js"></script>
		<script src="ht96_user/tem/js/owl.carousel.min.js"></script>	
		<script src="ht96_user/tem/js/main.js"></script>
@endsection










