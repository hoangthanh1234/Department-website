@extends('User.Index')
@section('title','Tuyển sinh')
@section('description','tuyển sinh đại học, cao đẳng khoa kỹ thuật và công nghệ trường đại học trà vinh')
@section('content')
<div class="nonedesktop">@include('User.Layout.MenuMobi')</div>
<div class="nonepad nonephone">
  @include('User.Layout.Banner')
  @include('User.Layout.Menu')

</div>


<section class="tuyensinh">	
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-sm-12 col-xs-12 left0">				
				<p class="tieude">{{trans('Menu.tuyensinh')}}</p>
				<div class="mota bold">{{trans('Public.motatuyensinh')}}</div>
			</div>
		</div>		
	</div>
</section> 

<div class="bomon"> 
  
  <section class="box2" style="margin-top:20px;">            
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">   
          <h2 class="section-title wow fadeInUp upper bold">
            <div style="color:#E95A13;font-weight:bold;">{{trans('Menu.tintuc')}}</div>
          </h2>                   
        </div>                               
      </div>

      <div class="row">
        @if(isset($Tintuyensinh->posttuyensinh))
        @foreach($Tintuyensinh->posttuyensinh as $TT)
        <div class="col-lg-6 col-md-6 col-xs-12">
          <div class="content new-small">
            <article>
              <figure class="date">
                <i class="fa fa-file-o" style="color:#999"></i>&nbsp; &nbsp;<?php Carbon\Carbon::setLocale('vi'); ?>
                {{Carbon\Carbon::parse($TT->created_at)->format('l, dS F Y')}}

              </figure> 
              <header>
                <a href="{{trans('Link.tintuc')}}/{{trans('Link.baiviet')}}/<?php $tenkhongdau='tenkhongdau_'.$lang;echo $TT->$tenkhongdau;?>/{{$TT->id}}.html"><?php $ten='ten_'.$lang;echo $TT->$ten;?></a>
              </header>                              
            </article>  
          </div>
        </div>
        @endforeach
        @endif
      </div>
    </div>


  </div>


  <section class="trangchu"> 
    <div class="container-fluid">   
      <div class="row" style="padding-top:30px;">
       @foreach ($Bacdaotao as $Bac)   
       <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 clearm hinhanh" style="background-image:url(ht96_image/daotao/{{$Bac->hinhanh}});">
        <div class="khung">
          <div class="nen"></div>
          <a href="{{trans('Link.tuyensinh')}}/<?php $tenkhongdau='tenkhongdau_'.$lang; echo $Bac->$tenkhongdau; ?>/{{$Bac->id}}.html"><div class="khungtext">
            <div class="text"><?php $ten='ten_'.$lang; echo $Bac->$ten; ?>
          </div>                   
        </div></a>
      </div>
    </div>
    @endforeach         
  </div>
</div>
</section>



<section class="tuyensinh">
  <div class="container" >
    <div class="row text-center">
      <h2 class="section-title wow fadeInUp text-center upper bold"> 
       <span style="margin-left:10px;color:#E95A13">Video</span>
     </h2>
   </div>
 </div>
 @if(isset($Video_tuyensinh) && count($Video_tuyensinh)>=3)
 <div class="container-fluid">
  <div class="col-lg-8 col-md-8 col-sm-8" style="">
    <div class="border-top">
      <p class="posi">
        <span class="fa fa-youtube-play fa-2x" style="color:red;"></span>
        <span class="text">Youtube</span>
      </p>
    </div>
    <iframe id="iframeYoutube" width="100%" class="heightvideo"  src="https://www.youtube.com/embed/{{$Video_tuyensinh[0]->link}}" frameborder="0" allowfullscreen>       
    </iframe>  
    <div class="tieudevideo"><?php $ten='ten_'.$lang;echo $Video_tuyensinh[0]->$ten; ?></div>
  </div>
  
  <div class="col-lg-4 col-md-4 col-sm-4">
    <div class="border-top">
      <p class="posi">
        <span class="fa fa-youtube-play fa-2x" style="color:red;"></span>
        <span class="text">Youtube</span>
      </p>
    </div>
    <iframe src="https://www.youtube.com/embed/{{$Video_tuyensinh[1]->link}}" class="heightvideo1"></iframe>
    <div class="tieudevideo"><?php $ten='ten_'.$lang;echo $Video_tuyensinh[1]->$ten; ?></div>
    <iframe src="https://www.youtube.com/embed/{{$Video_tuyensinh[2]->link}}" class="heightvideo1"></iframe>
    <div class="tieudevideo"><?php $ten='ten_'.$lang;echo $Video_tuyensinh[2]->$ten; ?></div>
  </div>
</div>
@endif
</section>
@include('User.Layout.Footerts')
@endsection