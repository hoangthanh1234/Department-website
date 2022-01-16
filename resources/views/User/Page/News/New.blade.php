@extends('User.Index')
@section('title')
  <?php $title='title_'.$lang;echo $Dmtintuc->$title; ?>
@endsection
@section('description')
  <?php $description='description_'.$lang;echo $Dmtintuc->$description; ?>
@endsection
@section('content')
<div class="nonedesktop">@include('User.Layout.MenuMobi')</div>
<div class="nonepad nonephone">
@include('User.Layout.Banner')
@include('User.Layout.Menu')
</div>

	
<section class="tintuc">
   <div class="container">  
   	<h2 class="text-center tieudecap1"><?php $ten='ten_'.$lang;echo $Dmtintuc->$ten;?></h2>
            <div class="row nonepad nonephone"> 
                    @for ($i = 0; $i < count($Tintuc); $i++)
                      @if($i%3==0) <div class='clearfix'></div> @endif
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 khung">
                     	<div class="img">       
	                        <div class="image clearm">
	                        <a href="{{trans('Link.tintuc')}}/{{trans('Link.baiviet')}}/<?php $tenkhongdau='tenkhongdau_'.$lang;echo $Tintuc[$i]->$tenkhongdau;?>/{{$Tintuc[$i]->id}}.html"> <img src="ht96_image/news/{{$Tintuc[$i]->hinhanh}}"/></a>
	                        </div>          
                    	</div>

                    	<div style="background:rgba(200, 200, 200, 0.18);padding:10px;">
		                    <p class="tieude bold"><?php $ten='ten_'.$lang;echo $Tintuc[$i]->$ten;?></p>              
		                    <p class="luotxem">
		                           {{$Tintuc[$i]->luotxem}}&nbsp;&nbsp;&nbsp;
		                            <i class="fa fa-eye" aria-hidden="true"></i>
		                            <a class="bold" href="">&nbsp;&nbsp;&nbsp;
		                           {{trans('Public.xemthem')}}</a>
		                           &nbsp;&nbsp;&nbsp;<i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;
		                  	</p>
                        </div>
                    </div>
                    
                   @endfor 
            </div> 

            <div class="row nonedesktop"> 
                    @for ($i = 0; $i < count($Tintuc); $i++)
                      @if($i%2==0) <div class='clearfix'></div> @endif
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    	<div class=" khung">
                     	<div class="img">       
	                        <div class="image clearm">
	                        <a href="{{trans('Link.tintuc')}}/{{trans('Link.baiviet')}}/<?php $tenkhongdau='tenkhongdau_'.$lang;echo $Tintuc[$i]->$tenkhongdau;?>/{{$Tintuc[$i]->id}}.html"> <img src="ht96_image/news/{{$Tintuc[$i]->hinhanh}}"/></a>
	                        </div>          
                    	</div>

                    	<div style="background:rgba(200, 200, 200, 0.18);padding:10px;">
		                    <p class="tieude bold"><?php $ten='ten_'.$lang;echo $Tintuc[$i]->$ten;?></p>              
		                    <p class="luotxem bold">
		                           {{$Tintuc[$i]->luotxem}}&nbsp;&nbsp;&nbsp;
		                            <i class="fa fa-eye" aria-hidden="true"></i>
		                            <a class="bold" href="">&nbsp;&nbsp;&nbsp;
		                           {{trans('Public.xemthem')}}</a>
		                           &nbsp;&nbsp;&nbsp;<i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;
		                  	</p>
                        </div>
                    </div>
                    </div>
                    
                   @endfor 
            </div>  
   </div>  
  
    <div class="row">      
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-bottom:20px;">
           <div class="phantrang">{!! $Tintuc->links()!!}</div>
        </div>
    </div>                   
       
</section>

@endsection