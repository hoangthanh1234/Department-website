@extends('User.Index')
@section('title')
<?php $ten='ten_'.$lang;echo $Chuongtrinh->$ten; ?>
@endsection
@section('description','chương trình đào tạo đại học, cao đẳng khoa kỹ thuật và công nghệ trường đại học trà vinh')
@section('content')
<div class="nonedesktop">@include('User.Layout.MenuMobi')</div>
<div class="nonepad nonephone">
@include('User.Layout.Banner')
@include('User.Layout.Menu')
</div>

<div class="tuyensinhdetail">
    <section class="box1" style="background-image:url(ht96_image/chuongtrinh/{{$Chuongtrinh->hinhanh}});">
    	<div class="container">
            <div class="box1-content">		
                <div class="text"><?php $ten='ten_'.$lang;echo $Chuongtrinh->$ten; ?></div>
                <div class="box"><a href="{{trans('Link.hoso')}}/{{trans('Link.them')}}.html" class="white">{{trans('tuyensinhdetail.taohoso')}}</a></div>
            </div>
        </div>
    </section>    
</div>

<div class="chuongtrinh">
	<section class="box1">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-9 col-sm-9 col-xs-12 box-left">
					<section class="box1">
						<h2 class="tieude">{{trans('Chuongtrinh.taisao')}} <?php $ten='ten_'.$lang;echo $Chuongtrinh->$ten; ?></h2>
						<div class="mota"><?php $mota='mota_'.$lang;echo $Chuongtrinh->$mota; ?></div>
					</section>

					<section class="box2 bold">
						<h2 class="tieude">{{trans('Chuongtrinh.chuongtrinh')}}</h2>
						{{-- <div class="tab" data-id="1" style="">{{trans('Chuongtrinh.tohopxt')}}<span class="fa fa-unsorted fa-2x"></span></div>
						<div id="pannel1" class="pannel">							
							@foreach ($Tohop as $TH)
								<p class="tohop">* {{$TH->tohop->ten}} ({{$TH->tohop->monxt}})&nbsp;&nbsp;&nbsp;&nbsp;{{trans('Chuongtrinh.diem')}}:{{$TH->diem}}</p>
							@endforeach
						</div> --}}

						<div class="tab bold" data-id="ob">
							
							@if (session::has('language') && session::get('language')=='en')
								Program Educational Objectives
							@else
								Mục tiêu chương trình
							@endif
						<span class="fa fa-unsorted fa-2x"></span></div>
						<div id="pannelob" class="pannel bold">
							@if ($PO)
								<?php $contain='contain_'.$lang;echo $PO->$contain; ?>
							@endif
						</div>

						
						<div class="tab bold" data-id="0">
							@if (session::has('language') && session::get('language')=='en')
								Student outcomes
							@else
								Chuẩn đầu ra chương trình
							@endif
							
							<span class="fa fa-unsorted fa-2x"></span></div>
						
						<div id="pannel0" class="pannel bold" >
							<div class="tab bold" data-id="cdio_so">
								@if (session::has('language') && session::get('language')=='en')
									CDIO-SOs
								@else
									CDIO-SOs
								@endif
								<span class="fa fa-unsorted fa-2x"></span>
							</div>
							<div id="pannelcdio_so" class="pannel bold">
								@foreach ($CDIO as $cdr1)
								<div class="tab bold" data-id="cdr1_{{ $cdr1->maCDR1 }}">{{ $cdr1->maCDR1VB }} -  
									@if (session::has('language') && session::get('language')=='en')
										{{ $cdr1->tenCDR1EN }}
									@else
										{{ $cdr1->tenCDR1 }}
									@endif
									<span class="fa fa-unsorted fa-2x"></span></div>

								<div id="pannelcdr1_{{ $cdr1->maCDR1 }}" class="pannel bold" >
									@foreach ($cdr1->cdr2 as $cdr2)
										<div class="tab bold" data-id="cdr2_{{$cdr2->maCDR2 }}">{{ $cdr2->maCDR2VB }} - 
											@if (session::has('language') && session::get('language')=='en')
												{{ $cdr2->tenCDR2EN }}
											@else
												{{ $cdr2->tenCDR2 }}
											@endif
											<span class="fa fa-unsorted fa-2x"></span></div>

										<div id="pannelcdr2_{{$cdr2->maCDR2 }}" class="pannel bold" >
												@foreach ($cdr2->cdr3 as $cdr3)
												<li>{{ $cdr3->maCDR3VB }} -  
													@if (session::has('language') && session::get('language')=='en')
														{{ $cdr3->tenCDR3EN }}
													@else
														{{ $cdr3->tenCDR3 }}
													@endif
												</li>
												@endforeach
												
											
										</div>
									@endforeach
									
								</div>
							@endforeach
							</div>
							<div class="tab bold" data-id="abet_so">
								@if (session::has('language') && session::get('language')=='en')
									ABET-SOs
								@else
									ABET-SOs
								@endif
								<span class="fa fa-unsorted fa-2x"></span>
							</div>
							<div id="pannelabet_so" class="pannel bold">
								@foreach ($ABET as $abet)
									<li>{{ $abet->maChuanAbetVB }} -  
										@if (session::has('language') && session::get('language')=='en')
											{{ $abet->tenChuanAbet_en }}
										@else
										{{ $abet->tenChuanAbet_vi }}
										@endif
									</li>
								@endforeach
							</div>
							
						</div>
						
						<div class="tab" data-id="2">{{trans('Chuongtrinh.kynang')}}<span class="fa fa-unsorted fa-2x"></span></div>
						<div id="pannel2" class="pannel" ><?php $kynang='kynang_'.$lang;echo $Chuongtrinh->$kynang; ?></div>

						<div class="tab" data-id="3">{{trans('Chuongtrinh.cohoi')}}<span class="fa fa-unsorted fa-2x"></span></div>
						<div id="pannel3" class="pannel"><?php $cohoi='cohoi_'.$lang;echo $Chuongtrinh->$cohoi; ?></div>

						<div class="tab" data-id="4">{{trans('Chuongtrinh.mondaotao')}}<span class="fa fa-unsorted fa-2x"></span></div>
						<div id="pannel4" class="pannel">
							@foreach($Monhoc as $Mo)
								<p class="tab2" data-id="mon{{$Mo->id}}"><?php $ten='ten_'.$lang;echo $Mo->$ten; ?> <span  class="fa fa-unsorted fa-2x"></span></p>
								<div id="pannelmon{{$Mo->id}}" class="pannelx">
									<div class="tienquyet">
										<h3 style="font-size:16px;">{{trans('Chuongtrinh.mota')}}:</h3>
										<p><?php $mota='mota_'.$lang;?> {!!$Mo->$mota!!}</p>
										<h3 style="font-size:16px;">{{trans('Chuongtrinh.sotinchi')}}:&nbsp;&nbsp;<b>{{$Mo->stc}}</b></h3>
										<h3 style="font-size:16px;">{{trans('Chuongtrinh.lythuyet')}}:&nbsp;&nbsp;{{$Mo->lt}}&nbsp;</h3>
										<h3 style="font-size:16px;">{{trans('Chuongtrinh.thuchanh')}}:&nbsp;&nbsp;{{$Mo->th}}&nbsp;</h3>
											
									</div>

								</div>
							@endforeach

						</div>
					</section>
				</div>

				<div class="col-lg-4 col-md-3 col-sm-3 col-xs-12 box-right">
					<section class="box1">
						<h3 class="tieude">{{trans('Chuongtrinh.chuongtrinhlq')}}</h3>
						@foreach($Chuongtrinhlq as $CTLQ)
							<div class="chuongtrinhlq bold">
							<a href="{{trans('Link.chuongtrinh')}}/<?php $tenkhongdau='tenkhongdau_'.$lang;echo $CTLQ->$tenkhongdau; ?>/{{$CTLQ->id}}.html"><span class="fa fa-sign-in"></span>&nbsp;&nbsp;<?php $ten='ten_'.$lang;echo $CTLQ->$ten; ?></a>
							</div>
						@endforeach
					</section>
				</div>
			</div>			
		</div>	
	</section>	
</div>
@include('User.Layout.Footerts')
@endsection

@section('script1')

  <script type="text/javascript">
    $(document).on('click','.tab',function(){
    	var id=$(this).data("id");    	
    	$('#pannel'+id).slideToggle('slow');
    });

     $(document).on('click','.tab2',function(){
    	var id=$(this).data("id"); 
    	$('#pannel'+id).slideToggle('slow');
    });
  </script>

@endsection