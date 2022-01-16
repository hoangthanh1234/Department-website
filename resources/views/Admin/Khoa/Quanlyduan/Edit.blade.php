@extends('Admin.Master')
@section('title',' cập nhật thông tin dự án')
@section('content') 

<div class="h3 padding20 text-center">Cập nhật thông tin dự án</div>
<div class="container">
         @if(count($errors)>0)
              <div class="alert alert-warning">
                <strong>Cảnh báo ! ! !</strong>  <br>     
                 @foreach($errors->all() as $err)            
                    {{$err}}! &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br>            
                  @endforeach         
              </div>
         @endif

         @if(session('thongbao'))
                <div class="alert alert-success">
                        {{session('thongbao')}}
                </div>
         @endif
</div>
<form name="" method="post" action="set_admin/qlduan/edit/{{$Quanlyduan->id}}" enctype="multipart/form-data">
  <div class="container-fluid">                 
    <div id="tabs">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-xs-12">
              <b class="ten2x">Chọn hình</b>
              <input type="file" name="hinhanh" class="btn btn-primary form-control">
          </div>                         
         </div>
<br>
          <ul id="ultabs">         
              <li type="#tab1" class="ten2x">Thông tin (VI)</li>
              <li type="#tab2" class="ten2x">Thông tin (EN)</li>                                          
          </ul>
        <div class="clearfix"></div>
                        
        <div id="content_tabs">               
            <div id="tab1">
                  <b class="ten2x">Tên dự án</b>
                  <input type="text" name="ten_vi"  class="form-control" value="{{$Quanlyduan->ten_vi}}" />
                  <br/>

                  <b class="ten2x">Nội dung dự án</b>
                  <textarea name="noidung_vi" id="tiny">{!!$Quanlyduan->noidung_vi!!}</textarea>
                  <br/>
            </div> 
            
            <div id="tab2">
                 <b class="ten2x">Tên dự án</b>
                 <input type="text" name="ten_en" class="form-control" value="{{$Quanlyduan->ten_en}}"/>
                 <br/>

                 <b class="ten2x">Nội dung dự án</b>
                 <textarea name="noidung_en" id="tiny1">{!!$Quanlyduan->noidung_en!!}</textarea>
                 <br/>
            </div> 
        </div>
                      
      <input type="submit" value="Lưu" class="btn btn-success btn2" />
      <a href="set_admin/qlduan/list"><input type="button" value="Thoát"  class="btn btn-danger btn2" /></a>

  </div>
</div>
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
  @endsection

 