@extends('Admin.Master')
@section('title',' thêm slider mới')
@section('content') 

<div class="h3 padding20 text-center">Thêm Slider mới</div>
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
<form name="" method="post" action="set_admin/slider/add" enctype="multipart/form-data">
  <div class="container-fluid"> 
		<div id="tabs">
           <div class="row" style="padding-left:20px;">
              <div class="col-lg-2 colmd-2 col-sm-3 col-xs-4"><b class="ten2x">Chọn hình</b></div>
              <div class="col-lg-9 col-md-9 col-sm-9 col-xs-8"><input type="file" name="hinhanh"></div>
              <div class="clearfix"></div>
              <p style="padding-left:20px;padding-top:10px;">hỗ trợ file jpg, png,jpeg (width:800px height:500px tốt nhất)</p>
          </div>
	        <ul id="ultabs">				 
	            <li type="#tab1" class="ten2x">Thông tin (VI)</li>
	            <li type="#tab2" class="ten2x">Thông tin (EN)</li>                              
	        </ul>
        <div class="clearfix"></div>                        
        <div id="content_tabs">               
            <div id="tab1">
            	 <b class="ten2x">Tiêu đề</b><input type="text" name="ten_vi" value="{{old('ten_vi')}}"  class="form-control"/>
                <br/>
               <b class="ten2x">Link</b><input type="text" name="link" value="{{old('link')}}"  class="form-control"/>
                <br/>
            </div> 

            <div id="tab2">
            	 <b class="ten2x">Tiêu đề</b><input type="text" name="ten_en" value="{{old('ten_en')}}" class="form-control" />
                <br/>
            </div> 
        </div>

		  <input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
			<input type="submit" value="Lưu" class="btn btn-success btn2" onclick="set()" />
			<a href="set_admin/slider/list"><input type="button" value="Thoát"  class="btn btn-danger btn2" /></a>
	</div>	
</div>
<input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
  @endsection