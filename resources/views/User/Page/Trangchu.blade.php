  @extends('User.Index')
  @section('title')
    {{trans('Menu.trangchu')}}
  @endsection
  @section('description','Trang chủ khoa kỹ thuật và công nghệ - trường đại học trà vinh')
  @section('content')

  <div class="nonedesktop">@include('User.Layout.MenuMobi')</div>
  <div class="nonepad nonephone">
  @include('User.Layout.Banner')
  @include('User.Layout.Menu')

  </div>
  @include('User.Layout.Slider')

@if(isset($Vechungtoi))
  <section class="trangchu">  
    <div class="container">
     <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h2 class="section-title wow fadeInUp text-center upper bold"><?php $ten='ten_'.$lang;echo $Vechungtoi->$ten; ?></h2>
               <div class="section-title-divider text-center"><img src="ht96_image/hinhanh/line.png"></div>           
          </div>
    </div>

      <div class="row"> 
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
            <div class="mota"><?php $mota='mota_'.$lang;echo $Vechungtoi->$mota; ?></div>
            <div class="button text-right">
                  <div class="eff"></div>
                  <a href="{{trans('Link.vechungtoi')}}/<?php $tenkhongdau='tenkhongdau_'.$lang;echo $Vechungtoi->$tenkhongdau; ?>/{{$Vechungtoi->id}}.html" class="float-right bold">{{trans('Public.xemthem')}}</a>
             </div>
        </div> 

      </div>
    </div>
  </section>

@endif

  <div class="trangchu">

      <div class="container">
            <div class="row wow fadeInUp top40" style="padding-bottom:20px;">
             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearm text-center">     
                    <h2 class="section-title wow fadeInUp text-center upper bold" style="display:inline-flex;"> <!--  <img src="ht96_image/images/dua.png"> -->
                <span style="margin-left:10px;">{{trans('Menu.tuyensinh')}}</span></h2>       
              </div>
            </div>
      </div>

      <div class="container-fluid">
            <div class="row" style="">
               @foreach ($Bacdaotao as $Bac)   
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 hinhanh clearm" style="background-image:url(ht96_image/daotao/{{$Bac->hinhanh}});" alt="No image">
                    <div class="khung">
                      <div class="nen clearm"></div>
                      <a  href="{{trans('Link.tuyensinh')}}/<?php $tenkhongdau='tenkhongdau_'.$lang;echo $Bac->$tenkhongdau; ?>/{{$Bac->id}}.html"><div class="khungtext">
                        <div style="font-size: 12pt" class="text"><?php $ten='ten_'.$lang;echo $Bac->$ten; ?>
                        </div>                   
                      </div></a>
                    </div>
                </div>
               @endforeach         
            </div>
      </div>





  <div style="background:#203854;padding:50px 0;">

      <div class="container">
            <div class="row wow fadeInUp">
                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearm text-center">     
                         <h2 class="wow fadeInUp upper bold" style="display:inline-flex;">
                              <span style="margin-left:10px;color:#fff;">{{trans('Menu.tintuc')}}</span>
                         </h2>                  
                  </div>
            </div>     

            <div class="row tintuc nonedesktop">  
                           
                         @for ($i = 0; $i < count($Tintuc); $i++)       
                            @if($i%2==0)
                            <div class="clearfix"></div>
                            @endif         
                          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style="margin-top:20px;">
                              <div class="nen" style="background:#fff;width:350px;margin-left:auto;margin-right:auto;">
                               <div class="img">       
                                  <div class="image">
                                    <a href="{{trans('Link.tintuc')}}/{{trans('Link.baiviet')}}/<?php $tenkhongdau='tenkhongdau_'.$lang;echo $Tintuc[$i]->$tenkhongdau; ?>/{{$Tintuc[$i]->id}}.html"> <img src="ht96_image/news/{{$Tintuc[$i]->hinhanh}}" alt="No image"/></a>
                                  </div>          
                              </div>

                              <div class="content">
                                  <p class="ten"><a style="color:black;font-size:16px;" href="{{trans('Link.tintuc')}}/{{trans('Link.baiviet')}}/<?php $tenkhongdau='tenkhongdau_'.$lang;echo $Tintuc[$i]->$tenkhongdau; ?>/{{$Tintuc[$i]->id}}.html"><?php $ten='ten_'.$lang;echo $Tintuc[$i]->$ten; ?></a></p>              
                                <p class="luotxem bold">                          
                                      <i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; {{$Tintuc[$i]->luotxem}}
                                      <a class="xemthem" href="">&nbsp;&nbsp;&nbsp;</a>                                   
                                      <i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;
                                      {{ Carbon\Carbon::parse($Tintuc[$i]->created_at)->diffforHumans()}}
                                  </p>

                                   <div class="khungxem bold" style="padding: 10px;border:1px solid black;width:120px;margin:0 auto;text-align:center;"><a  href="{{trans('Link.tintuc')}}/{{trans('Link.baiviet')}}/<?php $tenkhongdau='tenkhongdau_'.$lang;echo $Tintuc[$i]->$tenkhongdau; ?>/{{ $Tintuc[$i]->id}}.html">{{trans('Public.xemthem')}}</a></div>
                              </div>

                            </div>
                          </div>
                        @endfor
                    
            </div>  


            <div class="row tintuc nonepad nonephone">  
                          @for ($i = 0; $i < count($Tintuc); $i++)  
                          @if($i%3==0)
                          <div class="clearfix"></div>
                          @endif                 
                          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style="margin-top:20px;max-width:350px;margin-left:auto;margin-right:auto;">
                              <div class="nen" style="background:#fff;">
                               <div class="img">       
                                  <div class="image">
                                    <a href="{{trans('Link.tintuc')}}/{{trans('Link.baiviet')}}/<?php $tenkhongdau='tenkhongdau_'.$lang; echo $Tintuc[$i]->$tenkhongdau; ?>/{{$Tintuc[$i]->id}}.html"> <img src="ht96_image/news/{{$Tintuc[$i]->hinhanh}}" alt="No image"/></a>
                                  </div>          
                              </div>

                              <div class="content">
                                  <p class="ten"><a style="color:black;font-size:16px;" href="{{trans('Link.tintuc')}}/{{trans('Link.baiviet')}}/<?php $tenkhongdau='tenkhongdau_'.$lang;echo $Tintuc[$i]->$tenkhongdau; ?>/{{$Tintuc[$i]->id}}.html"><?php $ten='ten_'.$lang;echo $Tintuc[$i]->$ten; ?></a></p>              
                                <p class="luotxem bold">                          
                                      <i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; {{$Tintuc[$i]->luotxem}}
                                      <a class="xemthem" href="">&nbsp;&nbsp;&nbsp;</a>                                   
                                      <i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;
                                      {{ Carbon\Carbon::parse($Tintuc[$i]->created_at)->diffforHumans()}}
                                  </p>

                                   <div class="khungxem bold" style="padding: 10px;border:1px solid black;width:120px;margin:0 auto;text-align:center;"><a  href="{{trans('Link.tintuc')}}/{{trans('Link.baiviet')}}/<?php $tenkhongdau='tenkhongdau_'.$lang;echo $Tintuc[$i]->$tenkhongdau; ?>/{{$Tintuc[$i]->id}}.html">{{trans('Public.xemthem')}}</a></div>
                              </div>

                            </div>
                          </div>
                        @endfor   
                    
            </div>  
      </div> 
  </div>             
  <div class="clear"></div>




    

  <div style="background:#4e84c4;padding:50px 0;">
  <div class="container">
        <div class="row wow fadeInUp">
             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearm text-center">     
                     <h2 class="section-title wow fadeInUp upper bold" style="display:inline-flex;"> 
                          <span style="color:white;">{{trans('Public.sukien')}}</span>
                      </h2>                
              </div>
        </div>

        <div class="row nghiencuu responsive">  
                     @foreach ($Sukien as $nc)                   
                      <div class="col-lg-4 col-md-4 col-xs-12" style="margin-top:20px;">
                          <div class="nen" style="background:#fff;">
                          <div class="content" style="border-top:4px solid #E95A13;">
                              <p class="ten"> <a href="{{trans('Link.tintuc')}}/{{trans('Link.baiviet')}}/<?php $tenkhongdau='tenkhongdau_'.$lang;echo $nc->$tenkhongdau; ?>/{{$nc->id}}.html"><?php $ten='ten_'.$lang;echo $nc->$ten; ?></a></p> 
                               <?php $mota='mota_'.$lang;echo $nc->$mota; ?>               
                            <p class="luotxem bold">
                                  <i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;
                                  {{ Carbon\Carbon::parse($nc->created_at)->diffforHumans()}}
                                    &nbsp;&nbsp;&nbsp; 
                                  <i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; {{$nc->luotxem}}
                              </p>

                              <div class="khungxem" style="padding: 10px;border:1px solid black;width:120px;margin:0 auto;text-align:center;"><a href="{{trans('Link.tintuc')}}/{{trans('Link.baiviet')}}/<?php $tenkhongdau='tenkhongdau_'.$lang;echo $nc->$tenkhongdau; ?>/{{$nc->id}}.html">{{trans('Public.xemthem')}}</a></div>
                          </div>

                        </div>
                      </div>
                    @endforeach  
        </div>  
  </div> 
  </div>           




    <div class="container bomon" style="padding:50px 0;">
            <div class="row wow fadeInUp">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">     
                        <h2 class="section-title wow fadeInUp upper bold" style="display:inline-flex;">  
                            <span>{{trans('Public.bomon')}}</span>
                        </h2>                 
                </div>
            </div>

             <div class="row">
                 @foreach($Donvi as $De)
                      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 bomonx"> 
                          <div class="tenbomon">
                            <a  href="{{trans('Link.bomon')}}/<?php $tenkhongdau='tenkhongdau_'.$lang;echo $De->$tenkhongdau; ?>/{{$De->id}}.html"><p class="tenbm"><?php $ten='ten_'.$lang;echo $De->$ten; ?></p></a>
                          </div>
                      </div>
                  @endforeach
            </div>
    </div> 

      

   

     <div class="container bomon" style="padding-bottom:50px;">
            <div class="row wow fadeInUp">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">     
                        <h2 class="section-title wow fadeInUp upper bold" style="display:inline-flex;">  
                            <span>{{trans('Public.doitac')}}</span>
                        </h2>                 
                </div>
            </div>

             <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="doitac">
                    @foreach ($Doitac as $dt)                       
                     <a href="{{$dt->link}}" style="outline:none;" target="_blank"  title="{{$dt->ten_vi}}"><img style="width:250px;height:150px;outline:none;" src="ht96_image/lkweb/{{$dt->hinhanh}}"></a>         
                  
                    @endforeach
                  </div>
                </div>
            </div>
    </div>    

  </div>
  @endsection

