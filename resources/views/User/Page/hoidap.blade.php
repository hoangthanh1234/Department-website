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
						<div class="col-lg-8 col-md-8 col-xs-12">
							<form class="form-area contact-form text-right" action="hoi-dap.html" method="post">
								<div class="row">
									<div class="col-lg-12">
										<input name="ten" placeholder="Vui lòng nhập họ và tên" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Vui lòng nhập họ và tên'" class="common-input mb-20 form-control bold" required="" type="text" id="ten">

										<input name="email" placeholder="Nhập Email, Vui lòng nhập Email hợp lệ , nếu là sinh viên vui lòng nhập mail sinh viên" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nhập Email, Vui lòng nhập Email hợp lệ , nếu là sinh viên vui lòng nhập mail sinh viên'" class="common-input mb-20 form-control bold" required="" type="email" id="email">

										<select class="form-control common-input mb-20 bold" required id="chude" name="chude">
											<option value="">{{trans('Public.chonchude')}}</option>											
											@foreach($Chude as $cd)
												<option value="{{$cd->id}}"><?php $ten='ten_'.$lang;echo $cd->$ten;?></option>
											@endforeach
										</select>

										
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

						<div class="col-lg-4 col-md-4 col-xs-12">
							<div class="sidebars-area">
							<div class="single-sidebar-widget most-popular-widget">
								<h6 class="title upper">{{trans('Public.cauhoithuonggap')}}</h6>
								@foreach($Cauhoithuonggap as $tblq)
								<div class="single-list flex-row d-flex" style="width:100%">									
									<div class="details">										
											<h6 class="cauhoi"   data-toggle="modal" data-target="#cauhoimodal{{$tblq->id}}" style="text-transform:lowercase;font-size:14px;">		<?php 
														$b=substr($tblq->noidung,0,75);
														$c=$b.' ';												
														echo $b.'[...]';
													?>
											</h6>
										
										<ul class="meta">
											<li><a class="bold"><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp; &nbsp; {{ Carbon\Carbon::parse($tblq->created_at)->diffforHumans()}}</a></li>											
										</ul>
									</div>
								</div>

								<div class="modal fade" id="cauhoimodal{{$tblq->id}}" role="dialog">
									<div class="modal-dialog modal-lg"> 
									    <div class="modal-content">
									        <div class="modal-header">
									          <button type="button" class="close" data-dismiss="modal">&times;</button>
									          <h4 class="modal-title ten2x" style="font-size:20px;">CHI TIÊT CÂU HỎI</h4>	        
									        </div>
									        <div class="modal-body">	        	
									        	<div class="row">
									        		 <div class="form-group">
										        		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
										        			<b class="ten2x">Câu hỏi</b><br>
										        			<div style="width:100;height:100px;background:#333;border-radius:5px;color:white;padding:10px;overflow:scroll;">
										        				{!!$tblq->noidung!!}
										        			</div>
										        		</div>

										        		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
										        			<b class="ten2x">Trả lời từ giảng viên</b>
											        		<div style="width:100;height:100px;background:#333;border-radius:5px;color:white;padding:10px;overflow:scroll;">
											        			<?php echo $tblq->traloi; ?>
											        		</div>
										        		</div>			        		
									        		</div>
									        	</div>	        	
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
									   		</div>
									    </div>	    
									</div>	  
								</div>
								@endforeach
							</div>							
						</div>						
					</div>					
				</div>	
				<div class="row contact-wrap">
					<div class="map-wrap" style="width:100%; height: 445px;" id="map">	
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3930.132495685803!2d106.34381031476407!3d9.922921692904056!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a0175ea296facb%3A0x55ded92e29068221!2sTra+Vinh+University!5e0!3m2!1sen!2s!4v1527081381329" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
					</div>					
				</div>					
		</div>					
	</section>
			<!-- End contact-page Area -->
		</div>
		<!-- start footer Area -->
		



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










