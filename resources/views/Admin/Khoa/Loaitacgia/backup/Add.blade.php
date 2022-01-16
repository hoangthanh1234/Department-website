@extends('Admin.Master')
@section('title',' loại bài báo khoa học mới')
@section('content') 

<div class="h3 padding20 text-center">Thêm loại tác giả bài báo khoa học mới</div>
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
<form name="" method="post" action="set_admin/loaitacgia/add" enctype="multipart/form-data">
      	<div class="container-fluid">   

		<div id="tabs">           
	        <ul id="ultabs">				 
	            <li type="#tab1" class="ten2x">Thông tin</li>
	                                         
	        </ul>
        <div class="clearfix"></div>
                        
        <div id="content_tabs">               
            <div id="tab1">
            	   <b class="ten2x">Tên loại kết quả (VI)</b><input type="text" name="ten_vi" value="{{old('ten_vi')}}"  class="form-control" /><br/>   
                 <b class="ten2x">Tên loại kết quả (EN)</b><input type="text" name="ten_en" value="{{old('ten_en')}}" class="form-control" /><br/> 
                  <div style="display:inline-flex;"><b class="ten2x">Phần trăm điểm được hưởng</b> &nbsp; &nbsp;
                <input type="text" name="phantram" value="{{old('phantram')}}" class="form-control" style="width:50px;" /> &nbsp; &nbsp; &nbsp;% </div><br/> 
            </div>          
            
        </div>
		   
			<input type="submit" value="Lưu" class="btn btn-success btn2"/>
			<a href="set_admin/loaitacgia/list"><input type="button" value="Thoát"  class="btn btn-danger btn2" /></a>

	</div><!---END #tabs-->	
</div>
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
  @endsection