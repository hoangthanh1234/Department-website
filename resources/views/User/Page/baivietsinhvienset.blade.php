@extends('User.Index')
@section('title')
	<?php $title='title_'.$lang;echo $Thongbao->$title; ?>
@endsection
@section('description')
	<?php $description='description_'.$lang;echo $Thongbao->$description; ?>
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
						<div class="col-lg-8 post-list">
							<!-- Start single-post Area -->
							<div class="single-post-wrap">
								<div class="feature-img-thumb relative">
									<div class="overlay overlay-bg"></div>
									<img class="img-fluid" src="img/f1.jpg" alt="">
								</div>
								<div class="content-wrap">
									
									<a href="#">
										<h3 style="font-size:20px;"><?php $ten='ten_'.$lang; echo $Thongbao->$ten;?></h3>
									</a>
									<ul class="meta" style="margin:0">										
										<li><a href="#" class="bold"><span class="fa fa-calendar"></span> {{Carbon\Carbon::parse($Thongbao->created_at)->diffforHumans()}}</a></li>
										<li><a href="#" class="bold"><span class="fa fa-eye"></span>  {{$Thongbao->luotxem}} </a></li>
									</ul>
									
								<blockquote><?php $mota='mota_'.$lang;echo $Thongbao->$mota; ?></blockquote>

								<?php $noidung='noidung_'.$lang;echo $Thongbao->$noidung; ?>
								
							</div>
							
						</div>
						<!-- End single-post Area -->
					</div>
					<div class="col-lg-4">
						<div class="sidebars-area">							
							<div class="single-sidebar-widget most-popular-widget">
								<h6 class="title">{{trans('Public.tinlienquan')}}</h6>
								@foreach($Thongbaolienquan as $tblq)
								<div class="single-list flex-row d-flex" style="width:100%">
									
									<div class="details">
										<a href="{{trans('Link.sinhvienset')}}/{{trans('Link.baiviet')}}/{{$tblq->id}}.html">
											<h6><?php $ten='ten_'.$lang;echo $tblq->$ten; ?></h6>
										</a>
										<ul class="meta" style="margin:0">
											<li><a class="bold"><span class="fa fa-calendar"></span> {{Carbon\Carbon::parse($tblq->created_at)->diffforHumans()}}</a></li>
											<li><a  class="bold"><span class="fa fa-eye"></span> {{$tblq->luotxem}}</a></li>
										</ul>
									</div>
								</div>
								@endforeach
							</div>

							<div class="single-sidebar-widget most-popular-widget">
								<h6 class="title">{{trans('Public.xemnhieunhat')}}</h6>
								@foreach($Thongbaoxemnhieu as $tbxn)
								<div class="single-list flex-row d-flex" style="width:100%">
									<div class="details">
										<a href="{{trans('Link.sinhvienset')}}/{{trans('Link.baiviet')}}/{{$tbxn->id}}.html">
											<h6><?php $ten='ten_'.$lang;echo $tbxn->$ten; ?></h6>
										</a>
										<ul class="meta" style="margin:0">
											<li><a  class="bold"><span class="fa fa-calendar"></span> &nbsp;&nbsp;{{Carbon\Carbon::parse($tbxn->created_at)->diffforHumans()}}</a></li>
											<li><a  class="bold"><span class="fa fa-eye"></span> {{$tbxn->luotxem}}</a></li>
										</ul>
									</div>
								</div>
								@endforeach
							</div>
							
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










