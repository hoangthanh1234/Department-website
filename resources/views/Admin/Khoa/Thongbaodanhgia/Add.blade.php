@extends('Admin.Master')
@section('title',' thêm thông báo đánh giá mới mới')
@section('content') 

<div class="h3 padding20 text-center">Thêm thông báo đánh giá giảng viên mới</div>
<div class="container" style="max-width:500px;">
@if(count($errors)>0)
  <div class="alert alert-warning">
    <strong>Cảnh báo ! ! !</strong>  <br>     
    @foreach($errors->all() as $err)            
        {{$err}}! &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br>            
    @endforeach         
  </div>
@endif  

@if(session('thongbao'))
  <div class="alert alert-warning">
    {{session('thongbao')}}
  </div>
@endif
</div>
<form name="" method="post" action="set_admin/thongbaodanhgia/add" enctype="multipart/form-data">
<div class="container-fluid"> 
	<div id="tabs">           
	  <ul id="ultabs">				 
	    <li type="#tab1" class="ten2x">Thông tin</li>
	  </ul>
  <div class="clearfix"></div>                        
  <div id="content_tabs">               
    <div id="tab1">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
          <b class="ten2x">Tiêu đề thông báo</b><input type="text" name="ten" value="{{old('ten')}}" class="form-control" /><br/>      
        </div>               
      </div>            
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 top10">
          <b class="ten2x">Ngày Bắt đầu đánh giá:</b>
          <div class="input-group date">
            <input type="text" name="ngaybatdau" value="{{date('d/m/Y', strtotime(Carbon\Carbon::now()))}}" class="form-control datepicker"  placeholder="Ngày bắt đầu">
            <div class="input-group-addon">
              <span class="glyphicon glyphicon-th"></span>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 top10">
          <b class="ten2x">Ngày  kết thúc đánh giá:</b>
          <div class="input-group date">
            <input type="text" name="ngayketthuc" value="{{date('d/m/Y', strtotime(Carbon\Carbon::now()))}}" class="form-control datepicker"  placeholder="Ngày kết thúc">
            <div class="input-group-addon">
              <span class="glyphicon glyphicon-th"></span>
            </div>
          </div>
        </div>
      </div>
                

      <div class="row"><br>
        <div class="col-lg-12 col-md-12">
          <p class="ten2x">Các minh chứng được áp dụng:</p>
        </div>
      </div>
                   
      <div class="row">                      
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 top10">
          <b class="ten2x">Từ ngày:</b>
          <div class="input-group date">
            <input type="text" name="tungay" value="{{date('d/m/Y', strtotime(Carbon\Carbon::now()))}}" class="form-control datepicker"  placeholder="Ngày bắt đầu">
            <div class="input-group-addon">
              <span class="glyphicon glyphicon-th"></span>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 top10">
          <b class="ten2x">Đến ngày:</b>
          <div class="input-group date">
            <input type="text" name="denngay" value="{{date('d/m/Y', strtotime(Carbon\Carbon::now()))}}" class="form-control datepicker"  placeholder="Ngày kết thúc">
            <div class="input-group-addon">
              <span class="glyphicon glyphicon-th"></span>
            </div>
          </div>
        </div>
      </div>
    </div> 
  </div>
<input type="submit" value="Lưu" class="btn btn-success btn2" />
<a href="set_admin/thongbaodanhgia/list"><input type="button" value="Thoát"  class="btn btn-danger btn2" /></a>
</div><!---END #tabs-->	
</div>
<input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
@endsection