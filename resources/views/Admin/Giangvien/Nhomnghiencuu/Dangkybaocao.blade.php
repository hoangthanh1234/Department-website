@extends('Admin.Master')
@section('title','Đăng ký nhóm nghiên cứu')
@section('content') 

<style type="text/css">
  .top10{margin-top:10px;}
</style>

<div class="h3 padding20 text-center">Đăng ký báo cáo nghiên cứu khoa học</div>
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
<form  method="post" action="set_giangvien/nhom-nghien-cuu/dang-ky-bao-cao/{{$id_nhom}}" enctype="multipart/form-data">

<div class="box">
	<div class="body-box">
      	
      	<div class="row">
			<div class="col-lg-6 col-md-6 col-xs-12">
				<b class="ten2x">Tên đề tài (Vi)</b><br>
        		<input type="text" class="form-control" name="ten_vi" placeholder="Nhập tên đề tài báo cáo bằng tiếng Việt">
			</div>
			<div class="col-lg-6 col-md-6 col-xs-12">
				<b class="ten2x">Tên đề tài (En)</b><br>
        		<input type="text" class="form-control" name="ten_en" placeholder="Nhập tên đề tài báo cáo bằng tiếng Anh">
			</div>
		</div>

    <br>

		<div class="row">
			<div class="col-lg-6 col-md-6 col-xs-12">
				<b class="ten2x">Mô tả (Vi)</b><br>
        		<textarea id="tiny" name="mota_vi" placeholder="Nhập mô tả đề tài báo cáo bằng tiếng Việt"></textarea>
			</div>
			<div class="col-lg-6 col-md-6 col-xs-12">
				<b class="ten2x">Mô tả (En)</b><br>
        		<textarea id="tiny1" name="mota_en" placeholder="Nhập mô tả đề tài báo cáo bằng tiếng Anh"></textarea>
			</div>
		</div>

    <br>
    <input type="submit" value="Lưu" class="btn btn-success btn2"/>
    <a href="set_giangvien/nhom-nghien-cuu/danh-sach-nhom"><input type="button" value="Thoát"  class="btn btn-danger btn2" /></a>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
</div>
</div>
</form>
@endsection

