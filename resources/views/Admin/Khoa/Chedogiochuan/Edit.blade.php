@extends('Admin.Master')
@section('title','Cập nhật chế độ giảm giờ chuẩn giảng dạy')
@section('content') 

<div class="box">
<div class="h3 padding20 text-center">Cập nhật chế độ giảm giờ chuẩn giảng dạy</div>
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

<div class="box-body">

  <form name="" method="post" action="set_admin/che-do-gio-chuan/edit/{{$Chedogiochuan->id}}" enctype="multipart/form-data">
          
  <div class="row">
    <div class="col-lg-4 col-md-4">
      <label class="ten2x">Chức vụ</label>
      <select class="form-control" name="id_chucvu">
        @foreach($Chucvu as $cv)
          <option value="{{$cv->id}}" @if($cv->id == $Chedogiochuan->id_chucvu) selected @endif>{{$cv->ten_vi}}</option>
        @endforeach
      </select>
    </div>

    <div class="col-lg-4 col-md-4">
      <label class="ten2x">Trình độ</label>
      <select class="form-control" name="id_trinhdo">
        @foreach($Trinhdo as $td)
          <option value="{{$td->id}}" @if($td->id == $Chedogiochuan->id_trinhdo) selected @endif>{{$td->ten_vi}}</option>
        @endforeach
      </select>
    </div>

    <div class="col-lg-4 col-md-4">
       <label class="ten2x">Phần trăm định mức giờ chuẩn</label>
       <input type="text" class="form-control" name="tylephantramgiochuan" value="{{$Chedogiochuan->tylephantramgiochuan}}">
    </div>    
  </div>
<br>
  <div class="row">

    <div class="col-lg-3 col-md-3">
       <label class="ten2x">Số giờ miễn giảm</label>
       <input type="text" class="form-control" name="sogiomiengiam" value="{{$Chedogiochuan->sogiomiengiam}}">
    </div>

    <div class="col-lg-3 col-md-3">
       <label class="ten2x">Giờ thực hiện trên năm</label>
       <input type="text" class="form-control" name="sogiothuchien" value="{{$Chedogiochuan->sogiothuchien}}">
    </div>

    <div class="col-lg-3 col-md-3">
       <label class="ten2x">Giờ chuẩn trên năm</label>
       <input type="text" class="form-control" name="giochuan" value="{{$Chedogiochuan->giochuan}}">
    </div>

    <div class="col-lg-3 col-md-3">
       <label class="ten2x">Ghi chú</label>
       <input type="text" class="form-control" name="ghichu" value="{{$Chedogiochuan->ghichu}}">
    </div>
  </div>
       <br>
  <input type="submit" value="Lưu" class="btn btn-success btn2"/>
  <a href="set_admin/che-do-gio-chuan/list"><input type="button" value="Thoát"  class="btn btn-danger btn2" /></a>
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  </form>



  
</div>



</div>
  @endsection