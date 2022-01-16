@extends('Admin.Master')
@section('title','Thêm thành viên mới')
@section('content') 

<div class="h3 text-center">Thêm Thành viên mới</div><br>

<div class="box">

	<div class="container" style="max-width:500px;margin-top:20px;">
        @if(session('canhbao'))
            <div class="alert alert-warning">
                {{session('canhbao')}}
            </div>
        @endif

         @if(session('thongbao'))
            <div class="alert alert-success">
                {{session('thongbao')}}
            </div>
        @endif
    </div>

<div class="body-box">
<form  method="post" action="set_giangvien/nhom-nghien-cuu/them-thanh-vien/{{$id_nhom}}" enctype="multipart/form-data">	
	<div class="row">		
		<div class="col-lg-6 col-md-6">
			<label class="ten2x">Giangvien</label>
			<select class="form-control select2" name="id_giangvien">
				@foreach($Giangvien as $gv)
					<option value="{{$gv->id}}">{{$gv->ten}}</option>
				@endforeach
			</select>
		</div>
		<div class="col-lg-6 col-md-6">
			<label class="ten2x">Vị trí</label>
			<select class="form-control" name="id_nhiemvu">
				@foreach($Nhiemvu as $nv)
					<option value="{{$nv->id}}">{{$nv->ten_vi}}</option>
				@endforeach
			</select>
		</div>
		
	</div>

   <br>
	<div class="row">
		<div class="col-lg-12 col-md-12">
			<input type="submit" class="btn btn-success" value="Lưu">
			<a href="set_giangvien/nhom-nghien-cuu/danh-sach-nhom"><input type="button" class="btn btn-danger" value="Thoát"></a>
		</div>		
	</div>
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>

		</div>
	</div>
@endsection