@extends('Admin.Master')
@section('title',' thêm danh mục thông báo mới')
@section('content') 

<div class="h3 padding20 text-center">Thêm danh mục thông báo mới</div>
<div class="container" style="max-width:500px;">
 @if(count($errors)>0)
      <div class="alert alert-warning">
        <strong>Cảnh báo ! ! !</strong>  <br>     
         @foreach($errors->all() as $err)            
            {{$err}}! &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br>            
          @endforeach         
      </div>
    @endif  
</div>
<form name="" method="post" action="set_admin/danhmucthongbao/add" enctype="multipart/form-data">
      	<div class="container-fluid">      			
		<div id="tabs">   
	        <ul id="ultabs">				 
	            <li type="#tab1" class="ten2x">Thông tin (VI)</li>
	            <li type="#tab2" class="ten2x">Thông tin (EN)</li>                              
	        </ul>
        <div class="clearfix"></div>
                        
        <div id="content_tabs">               
            <div id="tab1">
              
              
              <b class="ten2x">Chọn loại</b>
                <select class="form-control" name="loai">
                  <option value="0">Thông báo</option>
                  <option value="1">Quy định</option>
                </select>
              <div class="clearfix"></div>
              <br>
            	 <b class="ten2x">Tiêu đề</b><input type="text" name="ten_vi" value="{{old('ten_vi')}}"  class="form-control" /><br/>
                 <b class="ten2x">Title</b><input type="text" name="title_vi" value="{{old('title_vi')}}" class="form-control" /><br/>                	
                 <b class="ten2x">Description</b><input type="text" name="description_vi"  value="{{old('description_vi')}}" class="form-control"/><br/>
            </div> 
            
            <div id="tab2">
            	 <b class="ten2x">Tiêu đề</b><input type="text" name="ten_en" value="{{old('ten_en')}}" class="form-control" /><br/>
                 <b class="ten2x">Title</b><input type="text" name="title_en" value="{{old('title_en')}}" class="form-control" /><br/>                	
                 <b class="ten2x">Description</b><input type="text" name="description_en" value="{{old('description_en')}}" class="form-control"/><br/>
            </div>     
        </div>
		   
			<input type="submit" value="Lưu" class="btn btn-success btn2" />
			<a href="set_admin/danhmucthongbao/list"><input type="button" value="Thoát"  class="btn btn-danger btn2" /></a>

	</div><!---END #tabs-->	
</div>
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
  @endsection