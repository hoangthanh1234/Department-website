@extends('Admin.Master')
@section('title','cập nhật một chi tiết tự chọn mới')
@section('content') 

<div class="h3 text-center">
		Cập nhật danh sách môn tự chọn lớp {{$Lop->tenlop}}
</div><br>

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
<form  method="post" action="set_giangvien/dinh-huong-tu-chon/cap-nhat-chi-tiet/{{$CT_tuchon->id}}" enctype="multipart/form-data">	
	<div class="row">
		
		<div class="col-lg-6 col-md-6">
			<label class="ten2x">Môn</label>
			<select class="form-control" name="id_mon">
				@foreach($Mon as $m)
					<option value="{{$m->id}}" @if($CT_tuchon->id_mon == $m->id) selected @endif>{{$m->ten_vi}}</option>
				@endforeach
			</select>
		</div>
		<div class="col-lg-6 col-md-6">
			<label class="ten2x">Học kỳ</label>
			<select class="form-control" name="id_hocky">
				@foreach($Hocky as $hk)
					<option value="{{$hk->id}}" @if($CT_tuchon->id_hocky == $hk->id) selected @endif>{{$hk->ten}}</option>
				@endforeach
			</select>
		</div>
	</div>

   <br>
	<div class="row">
		<div class="col-lg-12 col-md-12">
			<input type="submit" class="btn btn-success" value="Lưu">
			<a href="set_giangvien/dinh-huong-tu-chon/danh-sach-chi-tiet/{{$CT_tuchon->id_lop}}"><input type="button" class="btn btn-danger" value="Thoát"></a>
		</div>		
	</div>
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>

		</div>
	</div>
@endsection