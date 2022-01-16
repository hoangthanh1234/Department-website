@extends('Admin.Master')
@section('title',' thêm tiêu chí bài báo mới')
@section('content') 

<div class="h3 padding20 text-center">Thêm tiêu chí bài báo mới</div>
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
<form name="" method="post" action="set_admin/tieu-chi/nghien-cuu-khoa-hoc/bai-bao/add" enctype="multipart/form-data">
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
                  <b class="ten2x">Loại bài báo</b>
                  <select class="form-control" name="id_loaibaibao">
                    @foreach($Loaibaibao as $lbb)
                      <option value="{{$lbb->id}}">{{$lbb->ten_vi}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="col-lg-6 col-md-6">
                   <b class="ten2x">Loại tác giả</b>
                  <select class="form-control" name="id_loaitacgia">
                    @foreach($Loaitacgia as $ltg)
                      <option value="{{$ltg->id}}">{{$ltg->ten_vi}}</option>
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
                        <input type="text" name="gio" value="0"   class="form-control"/><br/>      
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
              </div>      
            </div> 
        </div>
		  <input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
			<input type="submit" value="Lưu" class="btn btn-success btn2" onclick="set()" />
		<a href="set_admin/tieu-chi/nghien-cuu-khoa-hoc/bai-bao/list"><input type="button" value="Thoát"  class="btn btn-danger btn2" /></a> 
	</div>
</div>
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
  @endsection