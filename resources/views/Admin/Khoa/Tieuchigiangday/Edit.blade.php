@extends('Admin.Master')
@section('title',' cập nhật tiêu chí giảng dạy')
@section('content') 

<div class="h3 padding20 text-center">Cập nhật tiêu chí giảng dạy</div>
        
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

<form  method="post" action="set_admin/tieu-chi/giang-day/edit/{{$Tieuchi->id}}" enctype="multipart/form-data">
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
                   <b class="ten2x">Tên tiêu chí</b><input type="text" name="ten" value="{{$Tieuchi->ten}}"  class="form-control" /><br/>      
                </div> 
              </div>

              <div class="row">
                <div class="col-lg-2 col-md-2 col-xs-12">
                  <b class="ten2x">Điểm</b>
                  <input type="text" name="diem" value="{{$Tieuchi->diem}}"  class="form-control"/><br/>
                </div>
                <div class="col-lg-2 col-md-4 col-xs-12">
                  <b class="ten2x">Đơn vị tính</b>
                  <input type="text" name="donvitinh" value="{{$Tieuchi->donvitinh}}"  class="form-control"/><br/>      
                </div>
                <div class="col-lg-2 col-md-4 col-xs-12">
                  <b class="ten2x">Loại minh chứng</b>
                  <input type="text" name="loaiminhchung" value="{{$Tieuchi->loaiminhchung}}"  class="form-control"/><br/>
                </div>
              </div>      
            </div>
        </div>
			<input type="submit" value="Lưu" class="btn btn-success btn2" />
			<a href="set_admin/tieu-chi/giang-day/list"><input type="button" value="Thoát"  class="btn btn-danger btn2" /></a>
	</div>	
</div>
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
  @endsection