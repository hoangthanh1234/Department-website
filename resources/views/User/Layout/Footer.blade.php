 

@if(isset($Infor))
<section class="footer" style="background:#414141;">
  <div class="container">
    <div class="row">
      <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
       <p class="cam upper tieude"><?php $ten='ten_'.Session::get('language'); echo $Infor->$ten; ?></p>

       <div class="row">        
         <div class="col-lg-12 col-md-11 col-sm-12 col-xs-12 cam">
          {{trans('Footer.diachi')}}&nbsp;:&nbsp;&nbsp;<?php $diachi='diachi_'.Session::get('language'); echo $Infor->$diachi; ?>
         </div>
       </div>

        <div class="row">         
         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 cam ubuntu">
           {{trans('Footer.dienthoai')}}&nbsp;:&nbsp;&nbsp;{!! $Infor->dienthoai !!}
         </div>
       </div>

        <div class="row">         
         <div class="col-lg-12 col-md-11 col-sm-12 col-xs-12 cam ubuntu ">
           {{trans('Footer.email')}}&nbsp;:&nbsp;&nbsp;{{$Infor->email}}
         </div>
       </div>
      </div>
      
      <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 text-right"> 
        <p class="cam icom upper text-left tieude"> {{trans('Footer.thongketruycap')}}</p>
           <p class="cam text-left clearm ubuntu"> {{trans('Footer.dangonline')}}&nbsp;:&nbsp;{{$online}} </p>              
           <p class="text-left cam icom clearm ubuntu">{{trans('Footer.homnay')}}&nbsp;:&nbsp;{{$homnay}}</p>
           <p class="text-left cam icom clearm ubuntu">{{trans('Footer.tongtruycap')}}&nbsp;:&nbsp;{{$tongtri}}</p>
      </div>
    </div>
    <div class="row" style="padding-top:10px;">
      <div class="col-lg-12 col-md-12">
        <p class="cam text-center">{{trans('Footer.banquyen')}}</p>   
      </div>
    </div>
  </div>
</section>
@endif
