

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="{{Session::get('language')}}">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
	{{-- <base href="/public/"> --}}
	@include('User.Layout.SEO')
	<title>SET :: @yield('title')</title>
	<meta name="description" content="@yield('description')" />
	<link rel="stylesheet" type="text/css"  href="{{ asset('ht96_user/bootstrap/css/bootstrap.min.css') }}"/>
	<link rel="stylesheet" type="text/css"  href="{{ asset('ht96_user/awesome/css/awesome.min.css') }}">
	<link rel="stylesheet" type="text/css"  href="{{ asset('ht96_user/wow/css/animate.css') }}">
	<link rel="stylesheet" type="text/css"  href="{{ asset('ht96_user/Slick/css/slick.css') }}">
	<link rel="stylesheet" type="text/css"  href="{{ asset('ht96_user/Slider/css/slider.css') }}">
	<link rel="stylesheet" type="text/css"  href="{{ asset('ht96_user/css/phone.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('ht96_admin/plugins/iCheck/all.css') }}">
	<link rel='stylesheet' id='camera-css'  href='{{ asset('ht96_user/Slider/css/camera.css') }}' type='text/css' media='all'>
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<link rel="stylesheet" type="text/css"  href="{{ asset('ht96_user/css/ktcn.css') }}">
	@yield('link')
</head>


<body>



<div class="hotline-phone-ring-wrap left0">
	<div class="hotline-phone-ring">
		<div class="hotline-phone-ring-circle"></div>
		<div class="hotline-phone-ring-circle-fill"></div>
		<div class="hotline-phone-ring-img-circle">
		<a href="tel:029438556901" class="pps-btn-img">
			<img src="phone.png" alt="Gọi điện thoại" width="50">
		</a>
		</div>
	</div>
	<div class="hotline-bar">
		<a href="tel:029438556901">
			<span class="text-hotline">02943 855 6901</span>
		</a>
	</div>
</div>


<div class="hotline-phone-ring-wrap right120">
	<div class="hotline-phone-ring">
		<div class="hotline-phone-ring-circle"></div>
		<div class="hotline-phone-ring-circle-fill"></div>
		<div class="hotline-phone-ring-img-circle">
		<a href="email.html" class="pps-btn-img">
		<i class="fa fa-envelope-o" aria-hidden="true" style="color:white"></i>
		</a>
		</div>
	</div>
	<div class="hotline-bar">
		<a href="email.html">
			<span class="text-hotline">ktcn@tvu.edu.vn</span>
		</a>
	</div>
</div>


	<div  class="navbar-fixed-top popupcontaint" id="idnhan"></div>
	<div  class="navbar-fixed-top popupcontaint" id="idnhan2"></div>
	<div class="body-content">
		 @yield('content')
	</div>
	@include('User.Layout.Footer')
	<div id="toptop"></div>

</body>

<script type="text/javascript" src="{{ asset('ht96_user/bootstrap/js/jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('ht96_user/bootstrap/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('ht96_user/wow/js/wow.min.js') }}"></script>
<script type="text/javascript">	new WOW().init();</script>
<script type="text/javascript" src="{{ asset('ht96_user/Slick/js/slick.min.js') }}"></script>
<script type='text/javascript' src='{{ asset('ht96_user/Slider/scripts/jquery.min.js') }}'></script>
<script type='text/javascript' src='{{ asset('ht96_user/Slider/scripts/jquery.easing.1.3.js') }}'></script>
<script type='text/javascript' src='{{ asset('ht96_user/Slider/scripts/camera.min.js') }}'></script>
<script type='text/javascript' src='{{ asset('ht96_user/Slider/scripts/slider.js') }}'></script>
<script type='text/javascript' src="{{ asset('ht96_admin/plugins/iCheck/icheck.min.js') }}"></script>
<script type="text/javascript">
	 var token='{{Session::token()}}';
</script>

	@yield('script')
	@yield('script1')
</html>
