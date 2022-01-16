@extends('Admin.Master')
@section('title',' thêm thành viên ban tư vấn chương trình')
@section('content') 

<style type="text/css">
  .top10{margin-top:10px;}
</style>

<div class="h3 padding20 text-center">Thêm thành viên ban tư vấn chương trình</div>
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
<form  method="post" action="set_bomon/bantuvan/add" enctype="multipart/form-data">
   	<div class="container-fluid">   
		<div id="tabs">  

<div class="row">             
     <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 top10">
        <b class="ten2x">Họ và tên:</b><input type="text" name="ten" value="{{old('ten')}}"  class="form-control" placeholder="Nhập tên thành viên ban tư vấn chương trình" />
      </div>

      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 top10">
          <b class="ten2x">Email:</b><input type="text" name="email" value="{{old('email')}}"  class="form-control" placeholder="Nhập email thành viên ban tư vấn chương trình" />
      </div>

      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 top10">
          <b class="ten2x">Điện thoại:</b><input type="text" name="dienthoai" value="{{old('dienthoai')}}" class="form-control" placeholder="Nhập số điện thoại thành viên ban tư vấn chương trình" />
      </div>
 </div>

 <div class="row" style="margin-top:20px;">
     <div class="col-lg-6 col-md-6 col-xs-12">
        <b class="ten2x">Đơn vị công tác:</b><input type="text" name="donvicongtac" value="{{old('donvicongtac')}}"  class="form-control" placeholder="Nhập đơn vị công tác thành viên ban tư vấn chương trình" />
     </div>

      <div class="col-lg-6 col-md-6 col-xs-12">
         <b class="ten2x">Địa chỉ liên hệ:</b><input type="text" name="diachilienhe" value="{{old('diachilienhe')}}"  class="form-control" placeholder="Nhập địa chỉ liên hệ thành viên ban tư vấn chương trình" />
     </div>
 </div>


<input type="submit" value="Lưu" class="btn btn-success btn2"/>
<a href="set_bomon/bantuvan/list/{{Session::get('user_department')}}"><input type="button" value="Thoát"  class="btn btn-danger btn2" /></a>

</div><!---END #tabs-->	

</div>
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
  @endsection

