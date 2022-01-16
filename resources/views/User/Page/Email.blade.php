@extends('User.Index')
@section('title')
     {{trans('Menu.hoidap')}}
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

	<div class="site-main-container">
			<div class="container">
				<div class="bold" style="text-align: left;margin:20px;">
						@if(session('thongbao2'))
							<div class="alert alert-success bold text-center" style="font-size:25px;">
								{{session('thongbao2')}}
							</div>
						 @endif
				</div>
			</div>

			<section class="contact-page-area">
				<div class="container">
					<div class="row contact-wrap">
						<div class="col-lg-12 col-md-12 col-xs-12">
							<form class="form-area contact-form text-right" action="email.html" method="post">
								<div class="row">
									<div class="col-lg-12">
										<input name="ten" placeholder="Vui lòng nhập họ và tên" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Vui lòng nhập họ và tên'" class="common-input mb-20 form-control bold" required="" type="text" id="ten">

										<input name="email" placeholder="Nhập Email, Vui lòng nhập Email hợp lệ , nếu là sinh viên vui lòng nhập mail sinh viên" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nhập Email, Vui lòng nhập Email hợp lệ , nếu là sinh viên vui lòng nhập mail sinh viên'" class="common-input mb-20 form-control bold" required="" type="email" id="email">

									</div>
									<div class="col-lg-12">
										<textarea class="common-textarea form-control bold" name="noidung" placeholder="Nhập nội dung câu hỏi" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nhập nội dung câu hỏi'" required="" id="noidung"></textarea>
									</div>
									<div class="col-lg-6">
										<button class="primary-btn primary upper bold mysend" style="margin-top:20px;">{{trans('Public.goicauhoi')}}</button>
									</div>
								</div>
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
							</form>
						</div>
				</div>
		</div>
	</section>
</div>
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
