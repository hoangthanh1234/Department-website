@extends('Admin.Master')
@section('title',' thêm nhóm môn mới')
@section('content') 

<div class="h3 padding20 text-center">Thêm nhóm môn mới</div>
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
  <div class="alert alert-success">
    {{session('thongbao')}}
  </div>
@endif

</div>
<form name="" method="post" action="set_admin/nhom-mon/add" enctype="multipart/form-data">
      	<div class="container-fluid">      			
		<div id="tabs">   
	        <ul id="ultabs">				 
	            <li type="#tab1" class="ten2x">Thông tin</li>	                                        
	        </ul>
        <div class="clearfix"></div>
                        
        <div id="content_tabs">               
            <div id="tab1">           	 

              <div class="row">
                <div class="col-lg-12">
                    <b class="ten2x">Tên</b>
                    <input type="text" name="ten" class="form-control" value="{{old('ten')}}">
                </div>
              </div>
            </div> 
        </div>		   
			<input type="submit" value="Lưu" class="btn btn-success btn2" />
			<a href="set_admin/nhom-mon/list"><input type="button" value="Thoát"  class="btn btn-danger btn2" /></a>
	</div><!---END #tabs-->	
</div>
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
  @endsection