@extends('Admin.Master')
@section('title',' cập nhật slider')
@section('content') 

<div class="h3 padding20 text-center">Cập nhật Slider</div>        
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

<form  method="post" action="set_admin/slider/edit/{{$Slider->id}}" enctype="multipart/form-data">
  <div class="container-fluid">
		<div id="tabs"> 
        <div class="row" style="padding-left:20px;padding-top:30px;">
          <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
              <div class="row">
                   <div class="col-lg-3 colmd-3 col-sm-4 col-xs-5"><b class="ten2x">Chọn hình</b></div>
                   <div class="col-lg-7 col-md-9 col-sm-8 col-xs-7"><input type="file" name="hinhanh"></div>
                   <div class="clearfix"></div>
                   <p style="padding-left:20px;padding-top:10px;">hỗ trợ file jpg, png,jpeg (width:800px height:500px tốt nhất)</p>
              </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-left">
            <img src="ht96_image/slider/{{$Slider->hinhanh}}" style="width:100px;height:100px;">
          </div>         
        </div>
	        <ul id="ultabs">				 
	            <li type="#tab1" class="ten2x">Thông tin (VI)</li>
	            <li type="#tab2" class="ten2x">Thông tin (EN)</li>                              
	        </ul>
        <div class="clearfix"></div>                        
        <div id="content_tabs">               
            <div id="tab1">
            	  <b class="ten2x">Tiêu đề</b><input type="text" name="ten_vi" value="{{$Slider->ten_vi}}"  class="form-control" /><br/>               
                 <b class="ten2x">Link</b><input type="text" name="link" value="{{$Slider->link}}" class="form-control"/><br/>
            </div>             
            <div id="tab2">
            	  <b class="ten2x">Tiêu đề</b><input type="text" name="ten_en" value="{{$Slider->ten_en}}" class="form-control" /><br/>               
            </div> 
        </div>		   
			<input type="submit" value="Lưu" class="btn btn-success btn2" />
			<a href="set_admin/slider/list"><input type="button" value="Thoát"  class="btn btn-danger btn2" /></a>
	</div><!---END #tabs-->	
</div>
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
@endsection