@extends('Admin.Master')
@section('title',' cập nhật bậc đào tạo')
@section('content') 

<div class="h3 padding20 text-center">Cập nhật bậc đào tạo</div>
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
<form name="" method="post" action="set_admin/daotao/bacdaotao/edit/{{$Bacdaotao->id}}" enctype="multipart/form-data">
      	<div class="container-fluid"> 
		<div id="tabs">  


        <div class="row" style="padding-left:20px;">
              <div class="col-lg-1 colmd-2 col-sm-3 col-xs-4"><b class="ten2x">Chọn hình</b></div>
              <div class="col-lg-10 col-md-9 col-sm-9 col-xs-8"><input type="file" name="hinhanh"></div>
              <div class="clearfix"></div>
              <p style="padding-left:20px;padding-top:10px;">hỗ trợ file jpg, png,jpeg (width:800px height:500px tốt nhất)</p>
          </div>


	        <ul id="ultabs">				 
	            <li type="#tab1" class="ten2x">Thông tin (VI)</li>
	            <li type="#tab2" class="ten2x">Thông tin (EN)</li>                                          
	        </ul>
        <div class="clearfix"></div>
                        
        <div id="content_tabs">               
            <div id="tab1">
            	 <b class="ten2x">Tên bậc đào tạo</b><input type="text" name="ten_vi" value="{{$Bacdaotao->ten_vi}}" class="form-control" /><br/>
               <b class="ten2x">Sologan</b><input type="text" name="sologan_vi" value="{{$Bacdaotao->sologan_vi}}" class="form-control" /><br/>
               <b class="ten2x">Title</b><input type="text" name="title_vi" value="{{$Bacdaotao->title_vi}}" class="form-control" /><br/>
               <b class="ten2x">Description</b><input type="text" name="description_vi" value="{{$Bacdaotao->description_vi}}" class="form-control"/><br/>
            </div> 
            
            <div id="tab2">
            	 <b class="ten2x">Tên bậc đào tạo</b><input type="text" name="ten_en" value="{{$Bacdaotao->ten_en}}"  class="form-control" /><br/>
               <b class="ten2x">Sologan</b><input type="text" name="sologan_en" value="{{$Bacdaotao->sologan_en}}" class="form-control" /><br/>
               <b class="ten2x">Title</b><input type="text" name="title_en" value="{{$Bacdaotao->title_en}}" class="form-control" /><br/>
               <b class="ten2x">Description</b><input type="text" name="description_en" value="{{$Bacdaotao->description_en}}" class="form-control"/><br/>
            </div> 
        </div>
		    
			<input type="submit" value="Lưu" class="btn btn-success btn2"" />
			<a href="set_admin/daotao/bacdaotao/list"><input type="button" value="Thoát"  class="btn btn-danger btn2" /></a> 

	</div><!---END #tabs-->	
</div>
<input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
@endsection
