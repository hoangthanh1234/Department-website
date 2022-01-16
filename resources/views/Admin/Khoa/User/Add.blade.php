@extends('Admin.Master')
@section('title',' thêm User mới')
@section('content') 

<div class="h3 padding20 text-center">Thêm User mới</div>
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
<form name="" method="post" action="set_admin/user/add" enctype="multipart/form-data">
 <div class="container-fluid"> 
		<div id="tabs">   

          <div class="row" style="margin-bottom:25px;">
            <div class="col-lg-6 col-md-6">
                <b>Bộ môn</b>
                <select name="bomon" class="form-control select2">  
                    @foreach($Bomon as $bm)
                      <option value="{{$bm->id}}">{{$bm->ten_vi}}</option>
                    @endforeach                  
                </select>
            </div> 

            <div class="col-lg-6 col-md-6">
                <b>Quyền</b>
                <select name="level" class="form-control select2">  
                    <option value="1">Admin / Khoa</option>
                    <option value="2">Trưởng bộ môn</option>
                </select>
            </div>
          </div>

	        <ul id="ultabs">				 
	            <li type="#tab1" class="ten2x">Thông tin (VI)</li>	                                                     
	        </ul>
        <div class="clearfix"></div>
                        
        <div id="content_tabs">               
            <div id="tab1">
            	    <b class="ten2x">Tên</b><input type="text" name="ten" value="{{old('ten')}}" class="form-control" /><br/>
                   <b class="ten2x">Email</b><input type="text" name="email" value="{{old('email')}}" class="form-control"/><br/>
                  
                 
            </div> 
            
            
              
        </div>        	 
		   
			<input type="submit" value="Lưu" class="btn btn-success btn2" />
			<a href="set_admin/user/list"><input type="button" value="Thoát"  class="btn btn-danger btn2" /></a>

	</div><!---END #tabs-->	
</div>
 <input type="hidden" name="_token" value="{{ csrf_token() }}">

</form>
  @endsection

  