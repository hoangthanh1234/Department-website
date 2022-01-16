@extends('Admin.Master')
@section('title',' cập nhật danh mục thông báo')
@section('content') 

<div class="h3 padding20 text-center">Cập nhật danh mục thông báo</div>
        
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

<form  method="post" action="set_admin/danhmucthongbao/edit/{{$Dm_thongbao->id}}" enctype="multipart/form-data">
      	<div class="container-fluid">      			
		<div id="tabs">   
	        <ul id="ultabs">				 
	            <li type="#tab1" class="ten2x">Thông tin (VI)</li>
	            <li type="#tab2" class="ten2x">Thông tin (EN)</li>                              
	        </ul>
        <div class="clearfix"></div>
                        
        <div id="content_tabs">    

            <b class="ten2x">Chọn loại</b>
                <select class="form-control" name="loai">
                  <option value="0" @if($Dm_thongbao->loai == 0) selected @endif>Thông báo</option>
                  <option value="1" @if($Dm_thongbao->loai == 1) selected @endif>Quy định</option>
                </select>
              <div class="clearfix"></div>
              <br>

            <div id="tab1">
            	 <b class="ten2x">Tiêu đề</b><input type="text" name="ten_vi" value="{{$Dm_thongbao->ten_vi}}" class="input form-control" /><br/>
                 <b class="ten2x">Title</b><input type="text" name="title_vi" value="{{$Dm_thongbao->title_vi}}" class="input form-control" /><br/>                	
                 <b class="ten2x">Description</b><input type="text" name="description_vi" value="{{$Dm_thongbao->description_vi}}" class="input form-control"/><br/>
            </div> 
            
            <div id="tab2">
            	 <b class="ten2x">Tiêu đề</b><input type="text" name="ten_en" value="{{$Dm_thongbao->ten_en}}" class="input form-control" /><br/>
                 <b class="ten2x">Title</b><input type="text" name="title_en" value="{{$Dm_thongbao->title_en}}" class="input form-control" /><br/>                	
                 <b class="ten2x">Description</b><input type="text" name="description_en" value="{{$Dm_thongbao->description_en}}" class="input form-control"/><br/>
            </div>     
        </div>
       
			<input type="submit" value="Lưu" class="btn btn-success btn2" />
			<a href="set_admin/danhmucthongbao/list"><input type="button" value="Thoát"  class="btn btn-danger btn2" /></a> 

	</div><!---END #tabs-->	
</div>
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
  @endsection