@extends('Admin.Master')
@section('title',' thêm bộ môn')
@section('content') 

<div class="h3 padding20 text-center">Thêm  giới thiệu mới</div>
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
<form name="" method="post" action="set_bomon/about/add" enctype="multipart/form-data">
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
                  <b class="ten2x">Mô tả</b><br/><textarea name="mota_vi"  id="tiny">{{old('mota_vi')}}</textarea><br/>                
                  <b class="ten2x">Nội dung</b><br/><textarea name="noidung_vi" id="tiny1">{{old('noidung_vi')}}</textarea><br/>                
                  <b class="ten2x">Title</b><input type="text" name="title_vi" value="{{old('title_vi')}}" class="form-control" /><br/>                	
                  <b class="ten2x">Description</b><input type="text" name="description_vi" value="{{old('description_vi')}}" class="form-control"/><br/>
                  <input type="hidden" name="id_bomon" value="{{Session::get('user_department')}}">
            </div> 
            
            <div id="tab2">
            	   <b class="ten2x">Tiêu đề</b><input type="text" name="ten_en" value="{{old('ten_en')}}" class="form-control" /><br/>
                  <b class="ten2x">Mô tả</b><br/><textarea name="mota_en"  id="tiny2">{{old('mota_en')}}</textarea><br/>
                 <b class="ten2x">Nội dung</b><br/><textarea name="noidung_en" id="tiny3">{{old('noidung_en')}}</textarea><br/>              
                 <b class="ten2x">Title</b><input type="text" name="title_en" value="{{old('title_en')}}"class="form-control" /><br/>                	
                 <b class="ten2x">Description</b><input type="text" name="description_en" value="{{old('description_en')}}" class="form-control"/><br/>
            </div> 
        </div>

        	<div class="row" style="padding:30px;">
	      			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-3">
	      					<label class="tenx">Số thứ tự &nbsp;</label><input type="text" name="stt" value="{{old('stt')}}" class="text-center" style="width:30px;"> 
	      			 </div>
	      			 	      			 
      		</div> 
		    <input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
			<input type="submit" value="Lưu" class="btn btn-success btn2"/>
			<a href="set_bomon/about/list/{{Session::get('user_department')}}"><input type="button" value="Thoát"  class="btn btn-danger btn2" /></a>

	</div><!---END #tabs-->	
</div>
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
 
</form>
  @endsection

 