<div class="menu1">   
    <div class="container"> 
    <div class="row text-left">        
       <div id="main" role="main">
            <ul class="menu text-center">            	
                <li class="li">
                    <a style="font-size: 12px" href="{{trans('Link.trangchu')}}.html" class="upper">{{trans('Menu.trangchu')}} SET</a>
                </li>

                <li class="li">
                    <a style="font-size: 12px" href="{{trans('Link.bomon')}}/<?php $tenkhongdau='tenkhongdau_'.$lang;echo $Bomon->$tenkhongdau;?>/{{$Bomon->id}}.html" class="upper">{{trans('Menu.trangchu')}}</a>
                </li>
              
                 <li class="li">
                    <a style="font-size: 12px" class="upper">{{trans('Menu.gioithieu')}}</a>  
                    <ul class="submenu"> 
                        @foreach ($Aboutbm as $Abo)                     
                            <li class="text-left  wow flipInY">
                                <a href="{{trans('Link.vechungtoi')}}/<?php $tenkhongdau='tenkhongdau_'.$lang;echo $Abo->$tenkhongdau;?>/{{$Abo->id}}.html"><?php $ten='ten_'.$lang;echo $Abo->$ten;?></a>
                            </li> 
                         @endforeach 
                    </ul>                  
                </li> 
               
                <li class="li">
                    <a style="font-size: 12px" href="{{trans('Link.bomon')}}/<?php $tenkhongdau='tenkhongdau_'.$lang;echo $Bomon->$tenkhongdau;?>/{{$Bomon->id}}/{{trans('Link.nhansu')}}.html" class="upper">{{trans('Menu.nhansu')}}</a>  
                </li> 

                 @if($Bomon->id!=6)
                <li class="li">
                    <a style="font-size: 12px" href="{{trans('Link.bomon')}}/<?php $ten='tenkhongdau_'.$lang;echo $Bomon->$tenkhongdau; ?>/{{$Bomon->id}}/{{trans('Link.daotao')}}.html" class="upper">{{trans('Menu.daotao')}}</a>                   
                </li> 
                @endif

                 <li class="li">
                    <a style="font-size: 12px" style="font-size: 12px" href="<?php $tenkhongdau='tenkhongdau_'.$lang;echo $Bomon->$tenkhongdau;?>/{{$Bomon->id}}/{{trans('Link.detai')}}.html" class="upper">{{trans('Menu.nghiencuu')}}</a>                   
                </li> 

                <li class="li">
                    <a style="font-size: 12px" href="{{trans('Link.sinhvienset')}}.html" class="upper">{{trans('Menu.sinhvien')}}</a>                   
                </li> 

                             
                 @if($Bomon->id!=6)
                 <li class="li">
                    <a style="font-size: 12px" href="{{trans('Link.cuusinhvien')}}/{{trans('Link.timkiem')}}/{{trans('Link.bomon')}}/key={{$Bomon->id}}.html" class="upper">{{trans('Menu.cuusinhvien')}}</a>                   
                </li>
                 @endif

              <li class="li">
                    <a style="font-size: 12px" href="{{trans('Link.bomon')}}/<?php $tenkhongdau='tenkhongdau_'.$lang;echo $Bomon->$tenkhongdau;?>/{{$Bomon->id}}/{{trans('Link.bantuvan')}}.html" class="upper">{{trans('Menu.bantuvan')}}</a>  
               </li> 
                 
              <li class="li"><a style="font-size: 12px" href="{{trans('Link.hoidap')}}.html" class="upper">{{trans('Menu.hoidap')}}</a></li>
              <li><a style="font-size: 12px" href="{{trans('Link.bomon')}}/{{trans('Link.enroll')}}/<?php $tenkhongdau='tenkhongdau_'.$lang;echo $Bomon->$tenkhongdau;?>/{{$Bomon->id}}.html" class="upper">{{trans('Menu.enroll')}}</a></li>
            </ul>
            </div>  
       </div>   
    </div>    
</div>

