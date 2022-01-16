@extends('Admin.Master')
@section('title',' thông tin khoa')
@section('content') 

<div class="h3 padding20 text-center">Cập nhật thông tin khoa</div>
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
<form name="" method="post" action="set_admin/infor/edit/{{$Infor->id}}" enctype="multipart/form-data">
  <div class="container-fluid"> 
		<div id="tabs">   
	    <ul id="ultabs">				 
	      <li type="#tab1" class="ten2x">Thông tin (VI)</li>
	      <li type="#tab2" class="ten2x">Thông tin (EN)</li>                                           
	    </ul>
    <div class="clearfix"></div>
      <div id="content_tabs">               
      <div id="tab1">
        <b class="ten2x">Tên khoa</b><input type="text" name="ten_vi" value="{{$Infor->ten_vi}}" class="form-control" /><br/>
        <b class="ten2x">Địa chỉ</b><input type="text" name="diachi_vi" value="{{$Infor->diachi_vi}}" class="form-control" />
        <br/>
        <b class="ten2x">Email</b><input type="text" name="email" value="{{$Infor->email}}" class="form-control"/><br/>
        <b class="ten2x">Điện thoại</b><input type="text" name="dienthoai" value="{{$Infor->dienthoai}}" class="form-control" /><br/>
        <b class="ten2x">Tọa độ</b><input type="text" name="toado" value="{{$Infor->toado}}" class="form-control" /><br/>
        <b class="ten2x">Website</b><input type="text" name="website" value="{{$Infor->website}}" class="form-control" /><br/>
      </div> 
        <div id="tab2">
        <b class="ten2x">Tên khoa</b><input type="text" name="ten_en" value="{{$Infor->ten_en}}"  class="form-control" /><br/>
        <b class="ten2x">Địa chỉ</b><input type="text" name="diachi_en" value="{{$Infor->diachi_en}}" class="form-control" />
        <br/>
       </div> 
      </div>       	
<input type="submit" value="Lưu" class="btn btn-success btn2"/>
<a href="set_admin/"><input type="button" value="Thoát"  class="btn btn-danger btn2" /></a>
</div><!---END #tabs-->	
</div>
<input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
@endsection

  