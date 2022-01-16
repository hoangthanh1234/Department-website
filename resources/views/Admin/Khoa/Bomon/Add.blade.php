@extends('Admin.Master')
@section('title',' thêm bộ môn')
@section('content') 

<div class="h3 padding20 text-center">Thêm  bộ môn mới</div>
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
<form name="" method="post" action="set_admin/bomon/add" enctype="multipart/form-data">
 <div class="container-fluid"> 
		<div id="tabs">   

          <div class="row" style="padding-left:20px;">
            <div class="col-lg-6 col-md-6">
              <div class="row">
                  <div class="col-lg-4 colmd-4 col-sm-4 col-xs-4"><b class="ten2x">Chọn hình</b></div>
                  <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8"><input type="file" name="hinhanh"></div>
                            
              </div>
            </div>
             <div class="col-lg-6 col-md-6">
               <b class="ten2x">Chọn Khoa</b><br>
               <select class="form-control" required name="id_khoa">
                 <option value="">Chọn Khoa</option>
                 @foreach($Khoa as $K)
                  <option value="{{$K->id}}">{{$K->ten_vi}}</option>
                 @endforeach
               </select>
             </div>
          </div>
<br> 
	        <ul id="ultabs">				 
	            <li type="#tab1" class="ten2x">Thông tin (VI)</li>
	            <li type="#tab2" class="ten2x">Thông tin (EN)</li>                                          
	        </ul>
        <div class="clearfix"></div>
                        
        <div id="content_tabs">               
            <div id="tab1">
            	    <b class="ten2x">Tên bộ môn</b><input type="text" name="ten_vi" value="{{old('ten_vi')}}" class="form-control" /><br/>
                   <b class="ten2x">Email</b><input type="text" name="email" value="{{old('email')}}" class="form-control"/><br/>
                  <b class="ten2x">Title</b><input type="text" name="title_vi" value="{{old('title_vi')}}" class="form-control" /><br/>                	
                  <b class="ten2x">Description</b><input type="text" name="description_vi" value="{{old('description_vi')}}" class="form-control"/><br/>
                 
            </div> 
            
            <div id="tab2">
            	   <b class="ten2x">Tên bộ môn</b><input type="text" name="ten_en" value="{{old('ten_en')}}" class="form-control" /><br/>                            
                 <b class="ten2x">Title</b><input type="text" name="title_en" value="{{old('title_en')}}" class="form-control" /><br/>                	
                 <b class="ten2x">Description</b><input type="text" name="description_en" value="{{old('description_en')}}" class="form-control"/><br/>
            </div> 
              
        </div>        	 
		    <input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
			<input type="submit" value="Lưu" class="btn btn-success btn2" onclick="set()" />
			<a href="set_admin/bomon/list"><input type="button" value="Thoát"  class="btn btn-danger btn2" /></a>

	</div><!---END #tabs-->	
</div>
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
 <input type="hidden" name="hinhanh" id="hinhanh">
</form>
  @endsection

  