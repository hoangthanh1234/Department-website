@extends('Admin.Master')
@section('title',' thêm tiêu chí giảng dạy mới')
@section('content') 

<div class="h3 padding20 text-center">Thêm tiêu đề tài mới</div>
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
<form name="" method="post" action="set_admin/tieu-chi/nghien-cuu-khoa-hoc/de-tai/add" enctype="multipart/form-data">
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
                     <b class="ten2x">Tên tiêu chí</b><input type="text" name="ten" value="{{old('ten')}}"  class="form-control" /><br/>      
                  </div>
              </div>

              <div class="row">
                <div class="col-lg-6 col-md-6">
                  <b class="ten2x">Cấp đề tài</b>
                  <select class="form-control" name="id_capdetai">
                    @foreach($Capdetai as $cdt)
                      <option value="{{$cdt->id}}">{{$cdt->ten_vi}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="col-lg-6 col-md-6">
                   <b class="ten2x">Trách nhiệm đề tài</b>
                  <select class="form-control" name="id_trachnhiemdetai">
                    @foreach($Trachnhiemdetai as $tndt)
                      <option value="{{$tndt->id}}">{{$tndt->ten_vi}}</option>
                    @endforeach
                  </select>
                </div>
              </div>    
            <br>
              <div class="row">
                   <div class="col-lg-2 col-md-2 col-xs-12">
                          <b class="ten2x">Điểm</b>
                          <input type="text" name="diem" value="{{old('diem')}}"   class="form-control"/><br/>      
                    </div>
                    <div class="col-lg-2 col-md-2 col-xs-12">
                      <b class="ten2x">Giờ</b>
                      <input type="text" name="gio" value="{{old('gio')}}"   class="form-control"/><br/>      
                </div>

                    <div class="col-lg-2 col-md-4 col-xs-12">
                         <b class="ten2x">Đơn vị tính</b>
                         <input type="text" name="donvitinh" value="{{old('donvitinh')}}"   class="form-control"/><br/>
                    </div>

                     <div class="col-lg-2 col-md-4 col-xs-12">
                        <b class="ten2x">Loại minh chứng</b>
                        <input type="text" name="loaiminhchung" value="{{old('loaiminhchung')}}"   class="form-control"/>
                        <br/>      
                    </div>

                    <div class="col-lg-6 col-md-4 col-xs-12">
                        <b class="ten2x">Trên 6 tháng</b>
                        <select class="form-control" name="tren6thang">
                          <option value="1"> Có </option>
                          <option value="0"> Không</option>
                        </select>
                        <br/>      
                    </div>
              </div> 
            </div> 
        </div>
		  <input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
			<input type="submit" value="Lưu" class="btn btn-success btn2" onclick="set()" />
  		<a href="set_admin/tieu-chi/nghien-cuu-khoa-hoc/de-tai/list">
        <input type="button" value="Thoát"  class="btn btn-danger btn2" />
      </a> 
	</div>
</div>
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
  @endsection