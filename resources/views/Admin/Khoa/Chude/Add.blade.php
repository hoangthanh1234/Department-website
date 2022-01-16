@extends('Admin.Master')
@section('title',' thêm chủ đề câu hỏi mới')
@section('content') 

<div class="h3 padding20 text-center">Thêm chủ đề câu hỏi mới</div>
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
<form name="" method="post" action="set_admin/chude/add" enctype="multipart/form-data">
      	<div class="container-fluid">      			
		<div id="tabs">   
	        <ul id="ultabs">				 
	            <li type="#tab1" class="ten2x">Thông tin (VI)</li>
	            <li type="#tab2" class="ten2x">Thông tin (EN)</li>                              
	        </ul>
        <div class="clearfix"></div>
                        
        <div id="content_tabs">               
            <div id="tab1">
            	 <b class="ten2x">Tiêu đề</b><input type="text" name="ten_vi" value="{{old('ten_vi')}}"  class="form-control" /><br/>                 
            </div> 
            
            <div id="tab2">
            	 <b class="ten2x">Tiêu đề</b><input type="text" name="ten_en" value="{{old('ten_en')}}" class="form-control" /><br/>                
            </div>     
        </div>
		   
			<input type="submit" value="Lưu" class="btn btn-success btn2" />
			<input type="button" value="Thoát"  class="btn btn-danger btn2" />

	</div><!---END #tabs-->	
</div>
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
  @endsection