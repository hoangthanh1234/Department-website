@extends('User.Index')
@section('title')
    <?php $title='title_'.$lang;echo $Bomon->$title; ?>
@endsection
@section('description')
    <?php $description='description_'.$lang;echo $Bomon->$description; ?>
@endsection
@section('content')
<div class="nonedesktop">@include('User.Layout.MenuMobibm')</div>
<div class="nonepad nonephone">
@include('User.Layout.Banner')
@include('User.Layout.Menubm')
</div>

<div class="bomon">
    <section class="box1" style="background-image:url(ht96_image/bomon/{{$Bomon->hinhanh}});">
    	<div class="container">
            <div class="box1-content">		
                <div class="text" style="margin-top:12%">@if($Bomon->id !=6){{trans('Menu.bomon')}}@endif <?php $ten='ten_'.$lang;echo $Bomon->$ten;?>                    
                </div>                
            </div>
        </div>
    </section>

    <section class="box2" style="margin-top:20px;@if($Bomon->id==6 && count($Detaidukien) == 0) padding-bottom:50px; @endif">            
        <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <h2 class="section-title wow fadeInUp upper bold" style="margin-top:0"> 
                            <span style="color:#E95A13;font-size:25px;">{{trans('Menu.tintuc')}}</span>
                        </h2>
                    @foreach($Tintuc as $TT)
                        <div class="content new-small">
                            <article>
                                <figure class="date">
                                    <i class="fa fa-file-o" style="color:#999"></i>&nbsp; &nbsp;{{ Carbon\Carbon::parse($TT->created_at)->toDayDateTimeString()}}
                                </figure> 
                                 <header>
                                <a href="{{trans('Link.tintuc')}}/{{trans('Link.baiviet')}}/<?php $tenkhongdau='tenkhongdau_'.$lang;echo $TT->$tenkhongdau;?>/{{$TT->id}}.html"><?php $ten='ten_'.$lang;echo $TT->$ten;?></a>
                                </header>                              
                            </article>  
                        </div>
                    @endforeach

                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                       <h2 class="section-title wow fadeInUp upper bold" style="margin-top:0">
                            <span style="color:#E95A13;font-size:25px;">{{trans('Menu.nghiencuu')}}</span>
                        </h2>
                        <div class="content new-small">
                            <ul class="link-list">
                                @foreach($Nghiencuunoibat as $NCNB)
                                <li>
                                    <a  href="{{ trans('Link.chitietdetai') }}/{{$NCNB->id}}.html" target="_blank">
                                        <p class="maubaibao bold">
                                            <span class="mauten"><?php $ten='ten_'.$lang;echo $NCNB->$ten; ?></span> - 
                                            {{trans('Nhansu.chunhiem')}}: 
                                        <span class="mautacgia">
                                        
                                        <?php $chunhiem='';?>
                                            @foreach($CT_detai as $ctdt)
                                                @if($NCNB->id==$ctdt->id_detai && $ctdt->trachnhiem->id==2)
                                                    <?php $chunhiem.=$ctdt->giangvien->ten.',';?>
                                                @endif
                                            @endforeach
                                        <?php $chunhiem=rtrim($chunhiem,',');?>
                                        {{$chunhiem}}                                             
                                        </span> - 
                                            {{trans('Nhansu.nam')}}:
                                            <span class="maunxb">{{date('Y', strtotime($NCNB->ngaynghiemthu))}}</span>
                                        </p>
                                         
                                    </a>
                                </li>
                                @endforeach   
                            </ul>
                        </div>
                    </div>                    
                </div>
        </div>
    </section>
@if(count($Detaidukien) != 0)
    <section style="margin-top:50px;">
        <div class="tuyensinhdetail">
            <section class="box3"> 
                <div class="container text-center">
                    <h2 class="section-title wow fadeInUp text-center upper bold ">  
                        <span style="color:#E95A13;font-size:25px;">{{trans('Public.detaidukien')}}</span>
                    </h2>
                </div>  
                 <div class="container">
                     <table class="table table-striped table-bordered example">
                                    <thead>
                                        <tr class="bg-top-table2">
                                            <th class="text-center">#</th>
                                            <th class="text-center text-uppercase">{{trans('Nhansu.tenduan')}}</th>
                                            <th class="text-center text-uppercase">{{trans('Nhansu.chunhiem')}}</th>
                                            <th class="text-center">{{ trans('Public.dieukien') }}</th>
                                        </tr>
                                    </thead>
                                    @php
                                        $iii=1;
                                    @endphp
                                    <tbody>
                                        @foreach($Detaidukien as $dtdk)
                                            <tr>
                                               <td class="text-center">{{$iii++}}</td>
                                                <td><?php $ten = 'ten_'.$lang; echo $dtdk->$ten;?></td>
                                                <td class="text-center">
                                                    {{$dtdk->giangvien->ten}}
                                                </td>
                                                <td class="text-center"><a class="xemdk" data-id="{{$dtdk->id}}">Xem</span></a> 
                                            </tr>                                            
                                        @endforeach
                                    </tbody>
                                </table>        
                     
                 </div>      
                
                        
            </section>
        </div> 
    </section>
@endif

@if($Bomon->id!=6)
    <section style="margin-top:50px;">
        <div class="tuyensinhdetail">
                <section class="box3"> 
                <div class="container text-center">
                    
                     <h2 class="section-title wow fadeInUp text-center upper bold ">  
                         <span style="color:#E95A13;font-size:25px;">{{trans('Menu.tuyensinh')}}</span>
                    </h2>
                </div>  
                   
                <div class="row clearm responsive11">
                            @foreach ($Chuongtrinh as $CT)
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 clearm">                   
                                    <div class="khung" style="background-image:url('ht96_image/chuongtrinh/{{$CT->hinhanh}}');">
                                        <div class="khung2">
                                            <div class="khung3">                                           
                                                <h2 ><?php $ten='ten_'.$lang;echo $CT->$ten;?></h2>      
                                                <div class="view"><a href="{{trans('Link.chuongtrinh')}}/<?php $tenkhongdau='tenkhongdau_'.$lang;echo $CT->$tenkhongdau;?>/{{$CT->id}}.html" class="white">{{trans('Public.xemthem')}}</a></div>
                                            </div>
                                        </div>                        
                                    </div>                
                                </div>                 
                            @endforeach
                </div>       
    </section>
@endif


<div class="modal fade mymodal" id="xemdieukien" role="dialog">
  <div class="modal-dialog modal-lg"> 
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title ten2x">DANH SÁCH ĐIỀU KIỆN THÀNH VIÊN THÀNH GIA ĐỀ TÀI</h4>
          </div>
          <div class="modal-body"> 
              <table class="table table-bordered table-hover">
                  <thead>
                    <tr>                     
                      <th class="text-center" width="5%">#</th>
                      <th class="text-center" width="15%">Số lượng</th>
                      <th class="text-center">Chuyên Nghành</th>
                      <th class="text-center" width="35%">Ghi chú</th>
                    </tr>
                  </thead>                  
                  <tbody id="loaddl">
                    
                  </tbody>
              </table>
        
          </div>
           <div class="modal-footer">                
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
      </div>      
  </div>    
  </div>

</div>

@endsection

@section('script')
    <script type="text/javascript">
        $(document).on('click','.xemdk',function(){
            var id = $(this).data('id');
            $.get("ajax/loadthanhvien/"+id,function(data){
                $('#loaddl').html(data);
                $('#xemdieukien').modal();
            });
        });
    </script>
@endsection