@extends('User.Index')
@section('title','Danh sách dự án nghiên cứu khoa học')
@section('description','Danh sách dự án nghiên cứu khoa học thuộc khoa kỹ thuật và công nghệ trường đại học trà vinh')
@section('content')
<div class="nonedesktop">@include('User.Layout.MenuMobi')</div>
<div class="nonepad nonephone">
@include('User.Layout.Banner')
@include('User.Layout.Menu')
</div>



<div class="bomon">
 <section class="box2" style="margin-top:50px;">            
    <div class="container">


        <div class="row">
            <div class="clear-fix"></div>			
                <p class="section-title wow fadeInUp text-center upper bold text-center" style="margin-top:20px;"> 
                    <span style="color:#E95A13;font-size:25px;">{{trans('Tintuc.danhsachduan')}}</span>
                </p> 


            <div class="row"> 
                @foreach($Quanlyduan as $qlda)                     
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 khung">
                     	<div class="img">       
	                        <div class="image clearm">
	                        <a href="{{trans('Link.chitietduan')}}/<?php $tenkhongdau='tenkhongdau_'.$lang;echo $qlda->$tenkhongdau;?>/{{$qlda->id}}.html"> 
	                        	<img src="ht96_image/qlduan/{{$qlda->hinhanh}}" width="100%" />
	                        </a>
	                        </div>          
                    	</div>

                    	<div style="background:rgba(200, 200, 200, 0.18);padding:10px;">
		                    <p class="tieude bold"><a href="{{trans('Link.chitietduan')}}/<?php $tenkhongdau='tenkhongdau_'.$lang;echo $qlda->$tenkhongdau;?>/{{$qlda->id}}.html"><?php $ten='ten_'.$lang;echo $qlda->$ten;?></a></p>              
		                    
                        </div>
                    </div>                    
                @endforeach
            </div> 

                            
                        
        </div>


		 




    </div>        
 </section>
</div>
@endsection