@extends('User.Index')
@section('title')
    <?php $title='title_'.$lang;echo $Bomon->$title; ?> : {{trans('Nhansu.cuusinhvien')}}
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



<div class="bomon-cuusinhvien">
    <div class="khoi1">
        <div class="container-fluid">         
            <div class="row dong1">
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12"  style="margin:5px;">
                    <input type="text" class="form-control khungtim" name="" id="khungtim" placeholder="Tìm kiếm theo tên bộ môn, tên lớp, tên sinh viên">
                </div>
                 <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12  dong text-center">
                       <div class="buying-selling-group" id="buying-selling-group" data-toggle="buttons">
                            <label class="btn btn-default buying-selling">
                                <input type="radio" name="options" value="bomon"  autocomplete="off">
                                <span class="radio-dot"></span>
                                <span class="buying-selling-word">{{trans('Menu.bomon')}}</span>
                            </label>
                        
                            <label class="btn btn-default buying-selling">
                                <input type="radio" name="options" value="lop" autocomplete="off">
                                <span class="radio-dot"></span>
                                <span class="buying-selling-word">{{trans('Cuusinhvien.lop')}}</span>
                            </label>

                            <label class="btn btn-default buying-selling">
                                <input type="radio" name="options" value="ten"  autocomplete="off">
                                <span class="radio-dot"></span>
                                <span class="buying-selling-word">{{trans('Cuusinhvien.ten')}}</span>
                            </label>
                      </div>
                </div>


                 <div class="col-lg-1 col-md-2 col-sm-6 col-xs-12 text-center" style="margin:5px;">
                      <button class="btn  btn-lg btn-success  bt-timkiem" id="btn">{{trans('Cuusinhvien.timkiem')}}</button>
                </div>

                 <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12 text-center" style="margin:5px; @if(Session::has('Csv')) display:none; @endif">
                     <a href="google/redirect"><button class="btn btn-lg  btn-success  bt-timkiem2" style="padding:8px 16px;background:#dc4e41;">{{trans('Cuusinhvien.dangnhapgg')}}</button></a> 
                </div>
                <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12  bt-timkiem2 text-center" style="margin:7px;display:none;@if(Session::has('Csv')) display:block; @endif">                  
                         <div class="dropdown" >
                                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="height:40px;">{{Session::get('Csv')[0]['ten']}}
                                    <span class="caret"></span>
                              </button>
                                <ul class="dropdown-menu" style="top:40px;left:20px;">
                                      <li><a href="#" style="font-weight:bold;" data-toggle="modal" data-target="#cuusinhvien<?php $value=Session::get('Csv');echo $value[0]['id'];?>">Cập nhật thông tin cá nhân</a></li>
                                      <li><a href="1/google/logout" style="font-weight:bold;">Đăng xuất</a></li>
                                     
                                </ul>
                          </div>                   
                </div>
            </div>
        </div>   
    </div>
    <div class="container">

      

       <h3 class="section-title wow fadeInUp  upper bold">  
           
            <span style="font-size:25px;">{{trans('Menu.cuusinhvien')}}</span>
      </h3>

    	<div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="table-responsive">
                  <table class="table table-striped table-bordered" style="width:100%;min-width:1000px;">
                    <thead>
                      <tr class="bg-top-table">
                        <th class="text-center bold">MSSV</th>
                        <th class="text-center bold">{{trans('Cuusinhvien.lop')}}</th>
                        <th class="text-center bold">{{trans('Nhansu.hovaten')}}</th>
                        <th class="text-center bold">{{trans('Cuusinhvien.nambatdau')}}</th>
                        <th class="text-center bold">{{trans('Cuusinhvien.namtonghiep')}}</th>
                        <th class="text-center bold">{{trans('Public.xemthem')}}</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                    </tfoot>
                    <tbody>
                      @foreach($Cuusinhvien as $Csv)
                        <tr>
                          <td class="text-center bold">{{$Csv->masinhvien}}</td>
                          <td class="text-center bold">{{$Csv->tenlop}}</td>
                          <td class="text-center bold">{{$Csv->tensinhvien}}</td>
                          <td class="text-center bold">{{$Csv->nambatdau}}</td>
                          <td class="text-center bold">{{$Csv->namtotnghiep}}</td>
                          <td class="text-center" data-toggle="modal" data-target="#xemthem{{$Csv->id_csv}}"><img style="margin:0 auto;" src="ht96_admin/media/images/edit1.png"  border="0"/></td>
                        </tr>
                      <div class="modal fade" id="xemthem{{$Csv->id_csv}}" role="dialog">
                                                    <div class="modal-dialog modal-lg"> 
                                                      <div class="modal-content">
                                                        <div class="modal-header">
                                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                          <h4 class="modal-title ten2x bold">THÔNG TIN CỰU SINH VIÊN:{{$Csv->tensinhvien}}  - MSSV:{{$Csv->masinhvien}}</h4>
                                                        </div>

                                                      <div class="modal-body">

                                                        <div class="row">
                                                          <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                                            <div class="form-group">                                                         
                                                              <img src="ht96_image/giangvien/99Om_333.png" alt="" style="height:150px;width:150px;margin:0 auto;">
                                                            </div>
                                                          </div>

                                                          <div class="col-lg-9 col-md-8 col-sm-6 col-xs-12">
                                                              <label class="ten2x">Họ tà tên:&nbsp;</label>{{$Csv->tensinhvien}}<br>
                                                              <label class="ten2x">Ngày Sinh:&nbsp;</label>{{date('d-m-Y', strtotime($Csv->ngaysinh))}}<br>
                                                              <label class="ten2x">Địa chỉ:&nbsp;</label>{{$Csv->diachi}}<br>
                                                              <label class="ten2x">E-mail:&nbsp;</label>{{$Csv->email}}<br>
                                                              <label class="ten2x">Điện thoại:&nbsp;</label>{{$Csv->dienthoai}}<br>
                                                          </div>
                                                        </div>

                                                       <div class="row">
                                                          <div class="col-lg-5 col-md-6 col-sm-6 col-xs-12">
                                                            
                                                              <p><label class="ten2x">MSSV:&nbsp;</label>{{$Csv->masinhvien}}</p>
                                                              <p><label class="ten2x">Bộ môn:&nbsp;</label>{{$Csv->tenbm}}</p>
                                                              <p><label class="ten2x">Lớp:&nbsp;</label>{{$Csv->tenlop}}</p>
                                                              
                                                          </div>

                                                          <div class="col-lg-7 col-md-6 col-sm-6 col-xs-12">
                                                             <p><label class="ten2x">Nơi Công tác:&nbsp;</label>{{$Csv->noicongtac}}</p>
                                                              <p><label class="ten2x">Chức vụ:&nbsp;</label>{{$Csv->chucvu}}</p>
                                                              <p><label class="ten2x">Địa chỉ cơ quan:&nbsp;</label>{{$Csv->diachicoquan}}</p>
                                                          </div>
                                                        </div>
                                                            
                                                      <div class="modal-footer">                                                  
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                      </div>  
                                                      </div>        
                                                      </div>
                                                    </div>
                     </div>
                      @endforeach
                    </tbody>
                  </table>
              </div>
              </div>
            </div>
    </div>
</div>



<div class="modal fade" id="cuusinhvien<?php $value=Session::get('Csv');echo $value[0]['id'];?>" role="dialog">
    <div class="modal-dialog modal-lg"> 

    <div class="modal-content">
     <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title ten2x bold">THÔNG TIN CỰU SINH VIÊN:{{Session::get('Csv_tt')[0]['ten']}} - {{Session::get('Csv_tt')[0]['ma']}}</h4>
     </div>

      <div class="modal-body">             

                 <div class="row">                    

                       <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                           <b class="ten2x">Nơi công tác (VI)</b><input  style="font-weight:bold;" type="text" id="noicongtac_vi" value="{{Session::get('Csv_tt')[0]['noicongtac_vi']}}" placeholder="nhập nơi công tác tiếng việt" class="form-control" /><br/>
                      </div>

                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <b class="ten2x">Nơi công tác (EN)</b><input style="font-weight:bold;" type="text" id="noicongtac_en" value="{{Session::get('Csv_tt')[0]['noicongtac_en']}}" placeholder="nhập nơi công tác tiếng anh"   class="form-control" /><br/>
                      </div>

                </div>

                <div class="row">                    

                       <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                           <b class="ten2x">Chức vụ (VI)</b><input style="font-weight:bold;" type="text" id="chucvu_vi" value="{{Session::get('Csv_tt')[0]['chucvu_vi']}}" placeholder="nhập Chức vụ  tiếng việt" class="form-control" /><br/>
                      </div>

                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <b class="ten2x">Chức vụ (EN)</b><input style="font-weight:bold;" type="text" id="chucvu_en" value="{{Session::get('Csv_tt')[0]['chucvu_en']}}" placeholder="nhập Chức vụ  tiếng anh"   class="form-control" /><br/>
                      </div>

                </div>

                 <div class="row">                    

                       <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                           <b class="ten2x">Số điện thoại cơ quan</b><input style="font-weight:bold;" id="socoquan" type="text" value="{{Session::get('Csv_tt')[0]['socoquan']}}" placeholder="nhập số điện thoại cơ quan" class="form-control" /><br/>
                      </div>

                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <b class="ten2x">Địa chỉ cơ quan</b><input style="font-weight:bold;" id="diachicoquan" type="text" value="{{Session::get('Csv_tt')[0]['diachicoquan']}}" placeholder="nhập địa chỉ cơ quan"   class="form-control" /><br/>
                      </div>

                </div>


                                                            
          <div class="modal-footer">        
              <button type="button" class="btn btn-success" id="btn-luu">{{trans('Cuusinhvien.luu')}}</button>                                          
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
           </div>  
       </div>   

    <input type="hidden" id="cuusinhvienid" value="{{Session::get('Csv_tt')[0]['id']}}" name="">



    </div>

   </div>
</div>


@endsection

@section('script')

<script type="text/javascript">
  $(document).on('click','#btn',function(){
       var selValue = $('input[name=options]:checked').val(); 
       var value=$('#khungtim').val();
       
    if(value==""){alert("Vui lòng nhập giá trị");return false;}
      if(selValue=='lop'){
        window.location="{{trans('Link.cuusinhvien')}}/{{trans('Link.timkiem')}}/{{trans('Link.bomon')}}/{{$Bomon->id}}/{{trans('Link.lop')}}="+value+".html";
      }

      if(selValue=='ten'){
        window.location="{{trans('Link.cuusinhvien')}}/{{trans('Link.timkiem')}}/{{trans('Link.bomon')}}/{{$Bomon->id}}/{{trans('Link.ten')}}="+value+".html";
      }


      if(selValue=='bomon'){
        window.location="{{trans('Link.cuusinhvien')}}/{{trans('Link.timkiem')}}/{{trans('Link.bomon')}}/{{$Bomon->id}}/key="+value+".html";
      }
  });

   $(document).on('click','#btn-luu',function(){

      var noicongtac_vi=$('#noicongtac_vi').val();
      var noicongtac_en=$('#noicongtac_en').val();
      var chucvu_vi=$('#chucvu_vi').val();
      var chucvu_en=$('#chucvu_en').val();
      var socoquan=$('#socoquan').val();
      var diachicoquan=$('#diachicoquan').val();
      var id=$('#cuusinhvienid').val();
      var bomon=<?=$Bomon->id?>;

     
      $.ajax({
                method:'POST',
                url:'ajax/cuusinhvien/updatecuusinhvien',
                data:{
                  noicongtac_vi:noicongtac_vi,
                  noicongtac_en:noicongtac_en,
                  chucvu_vi:chucvu_vi,
                  chucvu_en:chucvu_en,
                  socoquan:socoquan,
                  diachicoquan:diachicoquan,
                  id:id,
                  _token:token
                },
                success: function(data){                      
                                 alert(data);window.location=bomon+"/google/logout";
                 },
                 error: function(XMLHttpRequest, textStatus, errorThrown){                     
                                alert("Status: " + textStatus+": "+errorThrown+"!!!!");

                    }
              });
     
  });

</script>
  
@endsection













