@extends('Admin.Master')
@section('title',' Sử danh mục tin tức')
@section('content') 

<div class="h3 padding20 text-center">Cập nhật danh mục tin tức</div>
        
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

<form  method="post" action="set_admin/dmtintuc/edit/{{$cate->id}}" enctype="multipart/form-data">
      	<div class="container-fluid">      			
		<div id="tabs">   
	        <ul id="ultabs">				 
	            <li type="#tab1" class="ten2x">Thông tin (VI)</li>
	            <li type="#tab2" class="ten2x">Thông tin (EN)</li>                              
	        </ul>
        <div class="clearfix"></div>
                        
        <div id="content_tabs">               
            <div id="tab1">
            	 <b class="ten2x">Tiêu đề</b><input type="text" name="ten_vi" value="{{$cate->ten_vi}}" class="input form-control" /><br/>
                 <b class="ten2x">Title</b><input type="text" name="title_vi" value="{{$cate->title_vi}}" class="input form-control" /><br/>                	
                 <b class="ten2x">Description</b><input type="text" name="description_vi" value="{{$cate->description_vi}}" class="input form-control"/><br/>
            </div> 
            
            <div id="tab2">
            	 <b class="ten2x">Tiêu đề</b><input type="text" name="ten_en" value="{{$cate->ten_en}}" class="input form-control" /><br/>
                 <b class="ten2x">Title</b><input type="text" name="title_en" value="{{$cate->title_en}}" class="input form-control" /><br/>                	
                 <b class="ten2x">Description</b><input type="text" name="description_en" value="{{$cate->description_en}}" class="input form-control"/><br/>
            </div>                     
            
        </div>

        	
			<input type="submit" value="Lưu" class="btn btn-success btn2" />
			<a href="set_admin/dmtintuc/list"><input type="button" value="Thoát"  class="btn btn-danger btn2" /></a> 

	</div><!---END #tabs-->	
</div>
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
  @endsection