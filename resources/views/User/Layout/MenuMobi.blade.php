
<div id="mobile-nav">
    <div class="logo"><p class="tenmenu bold">{{trans('Menu.ktcn')}}</p></div>
    <div class="menu-button"><span class="fa fa-reorder"></span></div>
    <ul>
        <li><a href="{{trans('Link.trangchu')}}.html" class="upper bold">{{trans('Menu.trangchu')}}</a></li>

         <li><a href="set_admin/login" class="upper bold">{{trans('Public.dangnhap')}}</a></li>

        <li class="parent"> 
            <a  class="upper bold">{{trans('Menu.gioithieu')}}</a>
            <ul>                
                 @foreach ($About as $Abo) 
                    <li>
                         <a href="{{trans('Link.vechungtoi')}}/<?php $tenkhongdau='tenkhongdau_'.$lang;echo $Abo->$tenkhongdau;?>/{{$Abo->id}}.html"><?php $ten='ten_'.$lang;echo $Abo->$ten;?></a>
                    </li>
                @endforeach               
            </ul>
        </li>


        <li class="parent">
            <a  class="upper bold">{{trans('Menu.bomon')}}</a>
            <ul>
               @foreach ($Donvi as $Depart)                     
                    <li class="text-left"><a href="{{trans('Link.bomon')}}/<?php $tenkhongdau='tenkhongdau_'.$lang;echo $Depart->$tenkhongdau;?>/{{$Depart->id}}.html"> @if($Depart->id != 6) {{trans('Menu.bomon')}} @endif <?php $ten='ten_'.$lang;echo $Depart->$ten;?></a></li> 
                @endforeach                         
            </ul>
        </li>
       

                <li class="parent">
                    <a class="upper bold">{{trans('Menu.daotao')}}</a>
                    <ul>
                       @foreach ($Bacdaotao as $Bac)                     
                            <li class="text-left"><a href="{{trans('Link.daotao')}}/<?php $tenkhongdau='tenkhongdau_'.$lang;echo $Bac->$tenkhongdau;?>/{{$Bac->id}}.html"><?php $ten='ten_'.$lang;echo $Bac->$ten;?></a></li> 
                         @endforeach
                    </ul>
                </li>

                 <li>
                    <a href="{{trans('Link.tuyensinh')}}.html" class="upper bold">{{trans('Menu.tuyensinh')}}
                    </a>                   
                </li> 

                <li>
                 <a href="{{trans('Link.sinhvienset')}}.html" class="upper bold">{{trans('Menu.sinhvienset')}}</a>                
                </li>

                 

        <li class="parent">
            <a class="upper bold">{{trans('Menu.nghiencuu')}}</a>
            <ul>
                <li class="text-left">
                    <a href="{{trans('Link.detai')}}.html">{{trans('Menu.detai')}}</a>
                </li>     
                <li class="text-left"><a href="{{trans('Link.duan')}}.html">{{trans('Menu.duan')}}</a></li>            
            </ul>
        </li>
               
        <li class="parent">
            <a class="upper bold">{{trans('Menu.tintuc')}}</a>
            <ul>
                @foreach ($Dm_tintuc as $New_cate)                     
                    <li class="text-left"><a href="{{trans('Link.tintuc')}}/{{trans('Link.danhmuc')}}/<?php $tenkhongdau='tenkhongdau_'.$lang;echo $New_cate->$tenkhongdau; ?>/{{$New_cate->id}}.html"><?php $ten='ten_'.$lang;echo $New_cate->$ten;?></a></li> 
                @endforeach                 
            </ul>
        </li> 

         <li><a href="{{trans('Link.hoidap')}}.html" class="upper">{{trans('Menu.hoidap')}}</a></li>
         <li><a href="{{trans('Link.enroll')}}.html" class="upper">{{trans('Menu.enroll')}}</a></li>
         <li class="parent">
            <a  class="upper bold">{{trans('Menu.ngonngu')}}</a>
            <ul>
                 <li><a href="language/vi">{{trans('Public.tiengviet')}}</a></li>
                 <li><a href="language/en">English</a></li>
            </ul>
        </li>

    </ul>
</div>

