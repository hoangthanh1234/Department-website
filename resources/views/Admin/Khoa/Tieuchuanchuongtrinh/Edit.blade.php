@extends('Admin.Master')
@section('title',' Cập nhật Tiêu chuẩn chương trình')
@section('content') 

<div class="h3 padding20 text-center">Cập nhật tiêu chuẩn chương trình</div>
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
    <div class="alert alert-success">
      {{session('thongbao')}}
    </div>
  @endif
</div>


<div class="box-body" style="padding: 20px;">  

<form name="" method="post" action="set_admin/tieu-chuan-chuong-trinh/edit/{{$Tieuchuanchuongtrinh->id_chuongtrinh}}/{{$Tieuchuanchuongtrinh->id_hocky}}" enctype="multipart/form-data">
  
  <div class="row">
   <div class="col-lg-6 col-md-6">
     <div class="col-lg-4 col-md-4">
       <label class="ten2x">Số tín chỉ bắc buộc</label>
       <input type="text" class="form-control text-center" value="{{$Tieuchuanchuongtrinh->TCBB}}" name="TCBB">
     </div>

     <div class="col-lg-4 col-md-4">
       <label class="ten2x">Số lý thuyết bắc buộc</label>
       <input type="text" class="form-control text-center" value="{{$Tieuchuanchuongtrinh->LTBB}}" name="LTBB">
     </div>

     <div class="col-lg-4 col-md-4">
       <label class="ten2x">Số thực hành bắc buộc</label>
       <input type="text" class="form-control text-center" value="{{$Tieuchuanchuongtrinh->THBB}}" name="THBB">
     </div>
   </div>  
  
   
    <div class="col-lg-6 col-md-6">
     <div class="col-lg-4 col-md-4">
       <label class="ten2x">Số tín chỉ tự chọn</label>
       <input type="text" class="form-control text-center" value="{{$Tieuchuanchuongtrinh->TCTC}}" name="TCTC">
     </div>

     <div class="col-lg-4 col-md-4">
       <label class="ten2x">Số lý thuyết tự chọn</label>
       <input type="text" class="form-control text-center" value="{{$Tieuchuanchuongtrinh->LTTC}}" name="LTTC">
     </div>

     <div class="col-lg-4 col-md-4">
       <label class="ten2x">Số thực hành tự chọn</label>
       <input type="text" class="form-control text-center" value="{{$Tieuchuanchuongtrinh->THTC}}" name="THTC">
     </div>
   </div>  
    
</div>
<br>
  <input type="submit" value="Lưu" class="btn btn-success btn2" />
  <a href="set_admin/tieu-chuan-chuong-trinh/list/0"><input type="button" value="Thoát"  class="btn btn-danger btn2" /></a>
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
  @endsection
 