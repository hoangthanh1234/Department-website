@extends('Admin.Master')
@section('title',' cập nhật chủ đề câu hỏi')
@section('content') 

<div class="h3 padding20 text-center">Cập nhật chủ đề câu hỏi</div>
        
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

<form  method="post" action="set_admin/chude/edit/{{$Chude->id}}" enctype="multipart/form-data">
      	<div class="container-fluid">      			
		<div id="tabs">   
	        <ul id="ultabs">				 
	            <li type="#tab1" class="ten2x">Thông tin (VI)</li>
	            <li type="#tab2" class="ten2x">Thông tin (EN)</li>                              
	        </ul>
        <div class="clearfix"></div>
                        
        <div id="content_tabs">               
            <div id="tab1">
            	 <b class="ten2x">Tiêu đề</b><input type="text" name="ten_vi" value="{{$Chude->ten_vi}}" class="input form-control" /><br/>
            </div> 
            
            <div id="tab2">
            	 <b class="ten2x">Tiêu đề</b><input type="text" name="ten_en" value="{{$Chude->ten_en}}" class="input form-control" /><br/>
            </div>     
        </div>
       
			<input type="submit" value="Lưu" class="btn btn-success btn2" />
			<a href="set_admin/chude/list"><input type="button" value="Thoát"  class="btn btn-danger btn2" /></a> 

	</div><!---END #tabs-->	
</div>
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
  @endsection