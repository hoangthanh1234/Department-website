<div class="menu1 menu2">   
    <div class="container" style=""> 
    <div class="row text-left">        
       <div id="main" role="main">
            <ul class="menu text-center" >            	
                <li class="li">
                    <a style="font-size: 12px" href="{{trans('Link.trangchu')}}.html" class="upper">{{trans('Menu.trangchu')}}</a>
                </li>
                
                 <li class="li">
                    <a style="font-size: 12px" class="upper">{{trans('Menu.gioithieu')}}</a>
                    <ul class="submenu"> 
                        @foreach ($About as $Abo)                     
                            <li class="text-left  wow fadeInLeft"><a href="{{trans('Link.vechungtoi')}}/<?php $tenkhongdau='tenkhongdau_'.$lang;echo $Abo->$tenkhongdau; ?>/{{$Abo->id}}.html"><?php $ten='ten_'.Session::get('language'); echo $Abo->$ten; ?></a></li> 
                         @endforeach 
                    </ul>
                </li> 

                 <li class="li">
                    <a style="font-size: 12px" class="upper">{{trans('Menu.bomon')}}</a>
                     <ul class="submenu">                                              
                        @foreach ($Donvi as $Depart)                                               
                                <li class="text-left wow fadeInLeft"><a href="{{trans('Link.bomon')}}/<?php $tenkhongdau='tenkhongdau_'.$lang;echo $Depart->$tenkhongdau; ?>/{{$Depart->id}}.html">@if($Depart->id != 6) {{trans('Menu.bomon')}} @endif   <?php $ten='ten_'.Session::get('language'); echo $Depart->$ten; ?></a></li> 
                         @endforeach                    
                    </ul>
                </li>

                <li class="li">
                    <a style="font-size: 12px" href="{{trans('Link.tuyensinh')}}.html" class="upper">{{trans('Menu.tuyensinh')}}</a>                   
                </li>

                <li class="li">
                    <a style="font-size: 12px" class="upper">{{trans('Menu.daotao')}}</a>  
                    <ul class="submenu">                                              
                        @foreach ($Bacdaotao as $Bac)                     
                            <li class="text-left wow fadeInLeft">
                              <a href="{{trans('Link.daotao')}}/<?php $tenkhongdau='tenkhongdau_'.$lang;echo $Bac->$tenkhongdau; ?>/{{$Bac->id}}.html"><?php $ten='ten_'.Session::get('language'); echo $Bac->$ten; ?>
                              </a>
                            </li> 
                         @endforeach                   
                    </ul>                  
                </li> 


                <li class="li">
                    <a style="font-size: 12px" class="upper">{{trans('Menu.nghiencuu')}}</a>  
                    <ul class="submenu">
                        <li class="text-left wow fadeInLeft">
                            <a href="{{trans('Link.detai')}}.html">{{trans('Menu.detai')}}</a>                            
                        </li>
                        <li class="text-left wow fadeInLeft">
                            <a href="{{trans('Link.duan')}}.html">{{trans('Menu.duan')}}</a>
                        </li>
                    </ul>                   
                </li>

                 

                <li class="li">
                    <a style="font-size: 12px" href="{{trans('Link.sinhvienset')}}.html" class="upper">{{trans('Menu.sinhvienset')}}</a>                   
                </li>

                 <li class="li">
                    <a style="font-size: 12px" href="{{trans('Link.cuusinhvien')}}.html" class="upper">{{trans('Menu.cuusinhvien')}}</a>                   
                </li>
     

                <li class="li">
                    <a style="font-size: 12px" class="upper">{{trans('Menu.tintuc')}}</a>
                    <ul class="submenu">                                              
                          @foreach ($Dm_tintuc as $New_cate)                     
                            <li class="text-left wow fadeInLeft"><a href="{{trans('Link.tintuc')}}/{{trans('Link.danhmuc')}}/<?php $tenkhongdau='tenkhongdau_'.$lang;echo $New_cate->$tenkhongdau; ?>/{{$New_cate->id}}.html"><?php $ten='ten_'.$lang; echo $New_cate->$ten; ?></a></li> 
                         @endforeach                        
                    </ul>                  
                </li> 

              <li class="li"><a style="font-size: 12px" href="{{trans('Link.hoidap')}}.html" class="upper">{{trans('Menu.hoidap')}}</a></li>
              <li><a style="font-size: 12px" href="{{trans('Link.enroll')}}.html" class="upper">{{trans('Menu.enroll')}}</a></li>
            </ul>
            </div>  
       </div>   
    </div>    
</div>

