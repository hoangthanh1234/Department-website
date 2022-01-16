@extends('User.Index')
@section('title','Tuyển sinh')
@section('description','tuyển sinh đại học, cao đẳng khoa kỹ thuật và công nghệ trường đại học trà vinh')
@section('content')
<div class="nonedesktop">@include('User.Layout.MenuMobi')</div>
<div class="nonepad nonephone">
@include('User.Layout.Banner')
@include('User.Layout.Menu')
</div>

<div class="tuyensinhdetail">
    <section class="box1" style="background-image:url(ht96_image/daotao/{{$Sologan->hinhanh}});">
    	<div class="container">
            <div class="box1-content">		
                <div class="text">{{$Sologan->sologan}}</div>
                <div class="box"><a href="{{trans('Link.hoso')}}/{{trans('Link.them')}}.html" class="white">{{trans('tuyensinhdetail.taohoso')}}</a></div>
            </div>
        </div>
    </section>

  

    <div class="bomon"> 
  
    <section class="box2">            
        <div class="container">
                <div class="row" style="margin:30px 0;">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                         <h2 class="section-title wow fadeInUp upper bold">                             
                            <span style="color:#E95A13">{{trans('Menu.tintuc')}}</span>
                        </h2>
                    <div class="row" style="margin-top:10px;">
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
        </div>


</div>


    <section class="box3">   
            <div class="row clearm responsive11">
                @foreach ($Chuongtrinh as $CT)
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 clearm">                   
                    <div class="khung" style="background-image:url('ht96_image/chuongtrinh/{{$CT->hinhanh}}');">
                         <div class="khung2">
                             <div class="khung3">
                                <h2 ><?php $ten='ten_'.$lang;echo $CT->$ten; ?></h2>                            
                               
                                <div class="view"><a href="{{trans('Link.chuongtrinh')}}/<?php $tenkhongdau='tenkhongdau_'.$lang;echo $CT->$tenkhongdau; ?>/{{$CT->id}}.html" class="white">{{trans('Public.xemthem')}}</a></div>
                             </div>
                         </div>                        
                    </div>                
                </div>                 
                @endforeach
            </div>       
    </section>

    

@include('User.Layout.Footerts')
@endsection