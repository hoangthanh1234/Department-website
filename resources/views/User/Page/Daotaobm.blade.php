@extends('User.Index')
@section('title')
    <?php $title='title_'.$lang;echo $Bomon->$title; ?> : {{trans('Menu.daotao')}}
@endsection
@section('description')
    <?php $description='description_'.$lang;echo $Bomon->$description; ?>
@endsection
@section('content')
<div class="nonedesktop">@include('User.Layout.MenuMobi')</div>
<div class="nonepad nonephone">
@include('User.Layout.Banner')
@include('User.Layout.Menubm')
</div>


<div class="daotaobm">
  <div class="container">
     <h2 class="bold">{{trans('Menu.daotao')}}&nbsp;&nbsp;<small class="bold">{{trans('Chuongtrinh.danhsachchuongtrinh')}}</small></h2>

     <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr class="bg-top-table">
                    <th  class="text-center">STT</th>
                    <th  class="text-center">{{trans('Chuongtrinh.tenchuongtrinh')}}</th>
                    <th  class="text-center">{{trans('Chuongtrinh.hedaotao')}}</th>
                    <th  class="text-center">{{trans('Chuongtrinh.batdaotao')}}</th>
                    <th width="20%"  class="text-center">{{trans('Chuongtrinh.chuongtrinh')}}</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </tfoot>
            <tbody>
              <?php $i=1; ?>
              @foreach($Chuongtrinh as $CT)
              <tr>
                  <td class="bold text-center">{{$i++}}</td>
                  <td class="bold"><?php $ten='ten_'.$lang;echo $CT->$ten; ?></td>
                  <td class="bold text-center"><?php $ten='ten_'.$lang;echo $CT->hedaotao->$ten; ?></td>
                  <td class="bold text-center"><?php $ten='ten_'.$lang;echo $CT->bacdaotao->$ten; ?></td>
                  <td class="bold text-center"><a href="{{trans('Link.bomon')}}/<?php $tenkhongdau='tenkhongdau_'.$lang;echo $Bomon->$tenkhongdau;?>/{{$Bomon->id}}/<?php $tenkhongdau='tenkhongdau_'.$lang;echo $CT->$tenkhongdau;?>/{{$CT->id}}.html">{{trans('Public.xemthem')}}</a></td>
              </tr>
              @endforeach
            </tbody>
        </table>
     </div>
  </div>
</div>





@endsection














