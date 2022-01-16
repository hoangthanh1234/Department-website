<script type="text/javascript" src="ht96_user/bootstrap/js/jquery.js"></script> 
<section class="tuyensinh" style="background:#F0F0F0;">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-xs-12 text-center tieude2 bold">{{trans('Public.ketnoi')}}</div>
		</div>
	</div>

	<div class="container">
		<div class="row" style="padding-bottom:50px;">
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center">
				<p class="text-center tuyensinhcontent2 bold">{{trans('Public.datcauhoi')}}</p>
				<a href="{{trans('Link.hoidap')}}.html">
					<img src="ht96_image/images/question.png" width="180" height="120" style="margin: 0 auto;"/>
				</a>
			</div>	
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center">
				<p class="text-center tuyensinhcontent2 bold"  style="padding-top:30px;">{{trans('Public.vitri')}}</p>
				<img src="ht96_image/images/location.png" width="200" data-toggle="modal" data-target="#location" width="180" height="120" style="margin: 0 auto;"/>
			</div>	

			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

				<p class="text-center tuyensinhcontent2 bold">{{trans('Public.theodoi')}}</p>
				<div class="row" style="margin: 0;">
				@foreach($LKweb as $LK)
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 text-center">					
						<a href="{{$LK->link}}">
							<img src="ht96_image/lkweb/{{$LK->hinhanh}}" style="width:50px;height:50px;margin:0 auto;"></a>
							<p class="bold" style="font-size:16px;"><?php $ten='ten_'.$lang;echo $LK->$ten; ?></p>		
				</div>
				@endforeach
				</div>
			</div>	
			
		</div>
	</div>
</section>


  <div class="modal fade" id="location" role="dialog">
    <div class="modal-dialog modal-lg"> 
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title bold">{{trans('Public.vitri')}}</h4>
        </div>
        <div class="modal-body">
       <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3930.132495685803!2d106.34381031476407!3d9.922921692904056!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a0175ea296facb%3A0x55ded92e29068221!2sTra+Vinh+University!5e0!3m2!1sen!2s!4v1527081381329" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default bold" data-dismiss="modal">Đóng</button>
        </div>
      </div>
      
    </div>
  </div>