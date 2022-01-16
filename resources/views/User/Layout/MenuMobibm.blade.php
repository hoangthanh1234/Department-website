
<div id="mobile-nav">
    <div class="logo"><p class="tenmenuts">@if($Bomon->id!=6)  @lang('Menu.bomon') @endif  <?php $ten='ten_'.$lang;echo $Bomon->$ten;?></p></div>
    <div class="menu-button"><span class="fa fa-reorder"></span></div>

    <ul>

                <li><a href="{{trans('Link.trangchu')}}.html" class="upper">{{trans('Menu.trangchu')}} SET</a></li>

        		<li  class="parent">
                    <a href="#" class="upper">{{trans('Menu.gioithieu')}}</a>
                    <ul>
                        @foreach($Aboutbm as $Abo)
                            <li>
                                <a href="{{trans('Link.vechungtoi')}}/<?php $tenkhongdau='tenkhongdau_'.$lang;echo $Abo->$tenkhongdau;?>/{{$Abo->id}}.html"><?php $ten='ten_'.$lang;echo $Abo->$ten;?></a>
                            </li> 
                         @endforeach 
                    </ul>
                </li>

        		<li> 
                    <a href="{{trans('Link.bomon')}}/<?php $tenkhongdau='tenkhongdau_'.$lang;echo $Bomon->$tenkhongdau;?>/{{$Bomon->id}}/{{trans('Link.nhansu')}}.html" class="upper">{{trans('Menu.nhansu')}}</a>  
                </li>  

                <li> <a href="{{trans('Link.tuyensinh')}}.html" class="upper">{{trans('Menu.daotao')}}</a></li>

                <li><a href="{{trans('Link.detai')}}.html" class="upper">{{trans('Menu.nghiencuu')}}</a></li> 

                <li class="parent">
                     <a href="{{trans('Link.sinhvienset')}}.html" class="upper">{{trans('Menu.sinhvien')}}</a> 
                     <ul>
                          <li><a href="http://ttsv.tvu.edu.vn/default.aspx?page=nhapmasv&flag=ThoiKhoaBieu">{{trans('Menu.tkb')}}</a></li> 
                          <li><a href="http://ttsv.tvu.edu.vn/default.aspx?page=nhapmasv&flag=XemDiemThi">{{trans('Menu.ketquathi')}}</a></li>
                          <li><a href="http://ttsv.tvu.edu.vn/default.aspx?page=nhapmasv&flag=XemDiemThi">{{trans('Menu.thongbaomoi')}}</a></li>
                     </ul>
                </li>

                <li><a href="{{trans('Link.tuyensinh')}}.html" class="upper">{{trans('Menu.cuusinhvien')}}</a></li>

        		<li><a href="{{trans('Link.hoidap')}}.html" class="upper">{{trans('Menu.hoidap')}}</a></li>
                <li><a href="{{trans('Link.enroll')}}.html" class="upper">{{trans('Menu.enroll')}}</a></li>
		        <li class="parent">
		            <a href="#" class="upper">{{trans('Menu.ngonngu')}}</a>
		            <ul>
		                 <li><a href="language/vi">Việt nam</a></li>
		                 <li><a href="language/en">English</a></li>
		            </ul>
		        </li>

    </ul>
</div>

