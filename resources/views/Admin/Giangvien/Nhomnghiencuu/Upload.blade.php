@extends('Admin.Master')
@section('title','Đăng ký nhóm nghiên cứu')
@section('content') 

<style type="text/css">
  .top10{margin-top:10px;}
</style>

<div class="h3 padding20 text-center">Upload file cho bài báo cáo <span style="color:red;">{{$Baocao->ten_vi}}</span></div>
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
<form  method="post" action="set_giangvien/nhom-nghien-cuu/upload-file/{{$Baocao->id}}" enctype="multipart/form-data">

<div class="box">
	<div class="body-box">
      
        
		<div class="row">
			<div class="col-lg-12 col-xs-12 col-md-12">
				<b class="ten2x">File PDF_VI</b>
				<input type="file" name="pdf_vi" class="form-control btn btn-success">
			</div>			
		</div>
	<br>
		<div class="row">
			<div class="col-lg-12 col-xs-12 col-md-12">
				<b class="ten2x">File PDF_EN</b>
				<input type="file" name="pdf_en" class="form-control btn btn-success">
			</div>
		</div>
	<br>

		<div class="row">
			<div class="col-lg-12 col-xs-12 col-md-12">
				<b class="ten2x">File PPTX_VI</b>
				<input type="file" name="pptx_vi" class="form-control btn btn-primary">
			</div>			
		</div>
	<br>
		<div class="row">
			<div class="col-lg-12 col-xs-12 col-md-12">
				<b class="ten2x">File PPTX_EN</b>
				<input type="file" name="pptx_en" class="form-control btn btn-primary">
			</div>
		</div>

    <br>
    <input type="submit" value="Lưu" class="btn btn-success btn2"/>
    <a href="set_giangvien/nhom-nghien-cuu/danh-sach-bai-bao-cao/{{$Baocao->ct_nhom->id_nhom}}"><input type="button" value="Thoát"  class="btn btn-danger btn2" /></a>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
	</div>
</div>
</form>
@endsection

