@extends('Admin.Master')
@section('title','Cập nhật thông tin phòng')
@section('content') 

<div class="h3 padding20 text-center">Cập nhật thông tin phòng</div>
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
<form name="" method="post" action="set_admin/nhom-nghien-cuu/phong/edit/{{$Phong->id}}" enctype="multipart/form-data">

  <div class="box">
    <div class="box-body">
        <div class="row">     
          <div class="col-lg-4 col-md-4">
            <b class="ten2x">Loại phòng</b><br>
            <select name="id_loaiphong" class="form-control">
              @foreach ($Loaiphong as $lp)
                <option value="{{$lp->id}}" @if($lp->id==$Phong->id_loaiphong) selected @endif>{{$lp->ten_vi}}</option>
              @endforeach
            </select>
          </div>
        </div>
      <br>
        <div class="row">
          <div class="col-lg-6 col-md-6 col-xs-12">
            <b class="ten2x">Mã phòng</b>
            <input type="text" class="form-control" name="ma" value="{{$Phong->ma}}" required placeholder="Nhập mã phòng">
          </div>
          <div class="col-lg-6 col-md-6 col-xs-12">
             <b class="ten2x">Sức chứa</b>
            <input type="text" class="form-control" name="soluong" value="{{$Phong->soluong}}" required placeholder="Nhập sức chứa của phòng này">
          </div>
        </div>
      <br>
        <input type="submit" value="Lưu" class="btn btn-success btn2" />
        <a href="set_admin/nhom-nghien-cuu/phong/list/{{$Phong->id_loaiphong}}">
          <input type="button" value="Thoát"  class="btn btn-danger btn2" />
        </a> 
    </div>
  </div>        
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
  @endsection