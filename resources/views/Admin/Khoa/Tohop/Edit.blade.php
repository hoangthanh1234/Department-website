@extends('Admin.Master')
@section('title',' Sửa tổ hợp môn')
@section('content') 

<div class="h3 padding20 text-center">Cập nhật tổ hợp môn</div>        
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

<form  method="post" action="set_admin/tohop/edit/{{$Tohop->id}}" enctype="multipart/form-data">
      	<div class="container-fluid"> 

		<div id="tabs"> 
	        <ul id="ultabs">				 
	            <li type="#tab1" class="ten2x">Thông tin</li>	                               
	        </ul>
        <div class="clearfix"></div>
                        
        <div id="content_tabs">               
            <div id="tab1">
            	   <b class="ten2x">Tên tổ hợp môn</b><input type="text" name="ten" value="{{$Tohop->ten}}"  class="form-control" /><br/>   
                 <b class="ten2x">Môn Xét tuyển</b><input type="text" name="monxt" value="{{$Tohop->monxt}}"  class="form-control" /><br/>   
                 <b class="ten2x">Thuộc khối</b><input type="text" name="khoi" value="{{$Tohop->khoi}}"  class="form-control" /><br/>   
            </div> 
        </div>

        	
<input type="submit" value="Lưu" class="btn btn-success btn2" />
<a href="set_admin/tohop/list"><input type="button" value="Thoát"  class="btn btn-danger btn2" /></a> 
</div><!---END #tabs-->	
</div>
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
@endsection