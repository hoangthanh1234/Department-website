@extends('User.Index')
@section('title')
     {{trans('Menu.sinhvienset')}}
@endsection

@section('link')  
    
  <link rel="stylesheet" href="ht96_user/tem/css/linearicons.css">  
  <link rel="stylesheet" href="ht96_user/tem/css/nice-select.css">  
  <link rel="stylesheet" href="ht96_user/tem/css/owl.carousel.css">
  <link rel="stylesheet" href="ht96_user/tem/css/jquery-ui.css">
  <link rel="stylesheet" href="ht96_user/tem/css/main.css">

@endsection

@section('content')
@if(session('thongbao'))
     <div class="alert alert-danger" style="font-weight:bold;font-family:Arial;text-align:center;">
                        {{session('thongbao')}}
      </div>
@endif
<div class="nonedesktop">@include('User.Layout.MenuMobi')</div>
<div class="nonepad nonephone">
@include('User.Layout.Banner')
@include('User.Layout.Menu')
</div>

<section style="background: #ecf0f1;min-height:100vh;">


        <h2 class="wow fadeInUp text-center upper bold" style="padding-top:30px;">
                  <span style="margin-left:10px;color:#E95A13;">{{trans('Menu.sinhvienset')}}</span>

        </h2>

  <section class="latest-post-area pb-120">
        <div class="container no-padding">
          <div class="row">
             <div class="col-lg-8 col-md-8 col-xs-12  clearm">  
            @foreach($DM_thongbao as $dmtb)   
              @if($dmtb->quydinh!=1)  
                <div class="col-lg-12 col-md-12 col-xs-12 post-list">             
                  <div class="latest-post-wrap">
                    <h4 class="cat-title upper"><?php $ten='ten_'.$lang;echo $dmtb->$ten;?></h4>
                   @foreach($dmtb->thongbao2 as $tb2)   
                    <div class="single-latest-post row align-items-center" style="padding-left:30px;">                      
                      <div class="col-lg-12 post-right">
                        <a href="{{trans('Link.sinhvienset')}}/{{trans('Link.baiviet')}}/{{$tb2->id}}.html">
                          <h5 style="font-size:14px;"><?php $ten='ten_'.$lang;echo $tb2->$ten; ?>.</h5>
                        </a>
                        <ul class="meta" style="margin:0;">
                          <li style="padding-left:10px"><a href="{{trans('Link.sinhvienset')}}/{{trans('Link.baiviet')}}/{{$tb2->id}}.html"><span class="fa fa-calendar"></span>&nbsp;&nbsp;{{ Carbon\Carbon::parse($tb2->created_at)->diffforHumans()}}</a></li>  
                        </ul>
                        <p class="excert bold">
                          {!!$tb2->mota!!}
                        </p>
                      </div>
                    </div>                     
                    @endforeach  
                      <div style="text-align:right;font-weight:bold;"><a href="{{trans('Link.sinhvienset')}}/{{trans('Link.danhmuc')}}/{{$dmtb->id}}.html">{{trans('Public.xemthem')}}</a></div>
                  </div>              
                </div> 
              @endif             
            @endforeach
          </div>

            <div class="col-lg-4 col-md-4 col-xs-12">
                <div class="sidebars-area">             
                  <div class="single-sidebar-widget editors-pick-widget">
                    <h6 class="title upper">{{trans('Public.tracuuketquathi')}}</h6>
                    <div class="editors-pick-post"> 
                        <b class="ten2x" style="font-size:16px;font-weight:bold;">{{trans('Public.chonbomon')}}</b><br>
                        <select id="bomon" class="form-control" style="font-weight:bold;">
                          @foreach($Bomon as $bm)
                            <option value="{{$bm->id}}" class="bold"><?php $ten='ten_'.$lang;echo $bm->$ten;?></option>
                          @endforeach
                        </select>
                          <br>
                         <b class="ten2x" style="font-size:16px;font-weight:bold;">{{trans('Public.chonlop')}}</b><br>
                        <select id="lop" class="form-control select2" style="font-weight:bold;">
                                <option value="0" class="bold">{{trans('Public.chonlop')}}</option>
                                @foreach($Lop as $l)
                                  <option value="{{$l->id}}" class="bold">{{$l->malop}} - {{$l->tenlop}}</option>
                                @endforeach
                        </select><br>
                    </div>
                  </div>              
                </div>


                 <div class="sidebars-area">             
                  <div class="single-sidebar-widget editors-pick-widget">
                    <h6 class="title upper">{{trans('Public.decuongchitiet')}}</h6>
                    <div class="editors-pick-post"> 
                        <b class="ten2x" style="font-size:16px;font-weight:bold;">{{trans('Public.chonbomon')}}</b><br>
                        <select id="bomonct" class="form-control" style="font-weight:bold;">
                          @foreach($Bomon as $bm)
                            <option value="{{$bm->id}}" class="bold"><?php $ten='ten_'.$lang;echo $bm->$ten;?></option>
                          @endforeach
                        </select>
                          <br>
                         <b class="ten2x" style="font-size:16px;font-weight:bold;">{{trans('Public.chonlop')}}</b><br>
                        <select id="lopct" class="form-control select2" style="font-weight:bold;">
                                <option value="0" class="bold">{{trans('Public.chonlop')}}</option>
                                @foreach($Lop as $l)
                                  <option value="{{$l->id}}" class="bold">{{$l->malop}} - {{$l->tenlop}}</option>
                                @endforeach
                        </select><br>
                    </div>
                  </div>              
                </div>


              <div class="sidebars-area">             
                <div class="single-sidebar-widget editors-pick-widget">
                  <h6 class="title upper">{{trans('Public.bieumau')}}</h6>  
                  <div class="single-latest-post row align-items-center" style="padding-left:10px;">                      
                    <div class="col-lg-12 post-right">
                     <p>
                       <a href="/sinh-vien-set/dang-ki-bang-diem.html" target="_blank">
                         <?php Carbon\Carbon::setLocale(Session::get('language'))?>
                        <h5 style="font-size:14px;color:red;"><span class="fa fa-bullseye"></span>&nbsp;&nbsp;
                          @if (Session::has('language') && Session::get('language')=='en')
                             Registration form for transcript
                          @else
                             Mẫu đăng kí xin bảng điểm rèn luyện
                          @endif
                          
                          &nbsp;&nbsp;<span style="font-size:12px;color:#E95A13;"></span></h5>
                      </a>
                     </p>                       
                    </div>
                  </div>
                   @foreach($Bieumau as $bm)   
                    <div class="single-latest-post row align-items-center" style="padding-left:10px;">                      
                      <div class="col-lg-12 post-right">
                       <p>
                         <a href="ht96_bieumau/{{$bm->file}}" target="_blank">
                           <?php Carbon\Carbon::setLocale(Session::get('language'))?>
                          <h5 style="font-size:14px;color:red;"><span class="fa fa-bullseye"></span>&nbsp;&nbsp;
                            @if (Session::has('language') && Session::get('language')=='en')
                                {{$bm->ten_en}}
                            @else
                              {{$bm->ten}}
                            @endif
                            
                            &nbsp;&nbsp;<span style="font-size:12px;color:#E95A13;">{{ Carbon\Carbon::parse($bm->created_at)->diffforHumans()}}</span></h5>
                        </a>
                       </p>                       
                      </div>
                    </div>
                    @endforeach   
                </div>              
              </div>

               <div class="sidebars-area">             
                <div class="single-sidebar-widget editors-pick-widget">
                  @foreach($DM_thongbao as $dmtb) 
                    @if($dmtb->quydinh == 1)
                      <h6 class="title upper"><?php $ten='ten_'.$lang;echo $dmtb->$ten;?></h6>                           
                        <div class="single-latest-post row align-items-center" style="padding-left:10px;">
                          <div class="col-lg-12 post-right">
                            @foreach($dmtb->thongbao2 as $tb2)
                              <p>
                                <a href="{{trans('Link.sinhvienset')}}/{{trans('Link.baiviet')}}/{{$tb2->id}}.html">
                                      <h5 style="font-size:14px;"><?php $ten='ten_'.$lang;echo $tb2->$ten; ?></h5>
                                </a>
                                <ul class="meta"  style="margin:0;">
                                    <li style="padding-left:10px" class="text-right">
                                      <span class="fa fa-calendar"></span>&nbsp;&nbsp;{{ Carbon\Carbon::parse($tb2->created_at)->diffforHumans()}}
                                    </li>  
                                </ul>                               
                              </p>   
                            @endforeach
                             <div style="text-align:right;font-weight:bold;"><a href="{{trans('Link.sinhvienset')}}/{{trans('Link.danhmuc')}}/{{$dmtb->id}}.html">{{trans('Public.xemthem')}}</a></div>                  
                          </div>
                        </div>
                      @endif
                    @endforeach   
                </div>              
              </div>
            </div>


          </div>
        </div>
      </section>
</section>

<div class="modal fade mymodal" id="themdaotao" role="dialog">
  <div class="modal-dialog modal-lg"> 
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title ten2x">DANH SÁCH ĐIỂM</h4>
          </div>
          <div class="modal-body"> 
              <table class="table table-hover">
                  <thead>
                    <tr>                     
                      <th>Tên môn</th>
                      <th>Liên kết</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>                     
                      <th></th>
                      <th></th>
                    </tr>
                  </tfoot>
                  <tbody id="loaddl">
                    
                  </tbody>
              </table>
        
          </div>
           <div class="modal-footer">                
                <button type="button" class="btn btn-danger" data-dismiss="modal">Thoát</button>
          </div>
      </div>      
  </div>    
  </div>

  <div class="modal fade mymodalct" role="dialog">
    <div class="modal-dialog modal-lg"> 
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title ten2x">DANH SÁCH ĐỀ CƯƠNG CHI TIẾT</h4>
            </div>
            <div class="modal-body"> 
                <table class="table table-hover">
                    <thead>
                      <tr>                     
                        <th>Tên môn</th>
                        <th>Liên kết</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>                     
                        <th></th>
                        <th></th>
                      </tr>
                    </tfoot>
                    <tbody id="loaddlct">
                      
                    </tbody>
                </table>
          
            </div>
             <div class="modal-footer">                
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Thoát</button>
            </div>
        </div>      
    </div>    
  </div>


@endsection



@section('script')       
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="ht96_user/tem/js/easing.min.js"></script>
    <script src="ht96_user/tem/js/hoverIntent.js"></script>    
    <script src="ht96_user/tem/js/jquery.ajaxchimp.min.js"></script>
    <script src="ht96_user/tem/js/mn-accordion.js"></script>    
    <script src="ht96_user/tem/js/jquery.nice-select.min.js"></script>
    <script src="ht96_user/tem/js/owl.carousel.min.js"></script>  
    <script src="ht96_user/tem/js/main.js"></script>

    <script type="text/javascript">
        $(document).on('change','#bomon',function(){
             var id_bomon=$(this).val();              
                $.get("ajax/loadlop/"+id_bomon,function(data){
                     $('#lop').html(data);
               }); 
        });

        $(document).on('change','#bomonct',function(){
             var id_bomon=$(this).val();              
                $.get("ajax/loadlop/"+id_bomon,function(data){
                     $('#lopct').html(data);
               }); 
        });

        $(document).on('change','#lop',function(){
            var id_lop=$(this).val();              
                $.get("ajax/loadketquathi/"+id_lop,function(data){
                    $('#loaddl').html(data);
                    $('.mymodal').modal();
                    $('#lop').val("0");
            });               
              
        });

        $(document).on('change','#lopct',function(){
            var id_lop=$(this).val();              
                $.get("ajax/loaddecuongchitiet/"+id_lop,function(data){
                    $('#loaddlct').html(data);
                    $('.mymodalct').modal();
                    $('#lopct').val("0");
            });               
              
        });
    </script>



@endsection










