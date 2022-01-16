@extends('Admin.Master')
@section('title',' thêm tổ hợp xét tuyển')
@section('content') 

<div class="h3 padding20 text-center">Thêm hệ tổ hợp xét tuyển mới</div>
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
<form name="" method="post" action="set_admin/tohop/add" enctype="multipart/form-data">
      	<div class="container-fluid">   

		<div id="tabs">           
	        <ul id="ultabs">				 
	            <li type="#tab1" class="ten2x">Thông tin</li>
	                                         
	        </ul>
        <div class="clearfix"></div>
                        
        <div id="content_tabs">               
            <div id="tab1">
            	   <b class="ten2x">Tên tổ hợp môn</b><input type="text" name="ten" value="{{old('ten')}}"  class="form-control" /><br/>   
                 <b class="ten2x">Môn Xét tuyển</b><input type="text" name="monxt" value="{{old('monxt')}}"  class="form-control" /><br/>   
                 <b class="ten2x">Thuộc khối</b><input type="text" name="khoi" value="{{old('khoi')}}"  class="form-control" /><br/>                
            </div>
        </div>        	
			<input type="submit" value="Lưu" class="btn btn-success btn2"/>
			<a href="set_admin/tohop/list"><input type="button" value="Thoát"  class="btn btn-danger btn2" /></a>

	</div>
</div>
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
  @endsection