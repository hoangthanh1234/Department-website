@extends('Admin.Master')
@section('title',' thêm yêu cầu thành viên mới')
@section('content') 

<div class="h3 padding20 text-center">Thêm yêu cầu thành viên mới</div>
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
<div class="box">
  <div class="box-body">
      <form name="" method="post" action="set_giangvien/yeu-cau-thanh-vien/add/{{$id}}" enctype="multipart/form-data">
        <div class="row">
          <div class="col-lg-6 col-md-6">
             <b class="ten2x">Số lượng</b>
             <input type="text" name="soluong" value="{{old('soluong')}}"  class="form-control" placeholder="nhập số lượng" />
          </div>
          <div class="col-lg-6 col-md-6">
            <b class="ten2x">Chuyên ngành</b>
            <select class="form-control select2" name="id_chuyennganh">
              @foreach($Chuyennganh as $cn)
                <option value="{{$cn->id}}">{{$cn->ten_vi}}</option>
              @endforeach
            </select>
          </div>
        </div>
     <br/> 
     <div class="row">
       <div class="col-lg-12 col-md-12 col-xs-12">
        <b class="ten2x">Ghi chú</b>
         <textarea name="ghichu" class="form-control" placeholder="Nhập ghi chú"></textarea>
       </div>
      </div>
          <br>
      <input type="submit" value="Lưu" class="btn btn-success btn2" />
      <a href="set_giangvien/yeu-cau-thanh-vien/list/{{$id}}"><input type="button" value="Thoát"  class="btn btn-danger btn2" /></a>
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
  </div>
</div>

  @endsection