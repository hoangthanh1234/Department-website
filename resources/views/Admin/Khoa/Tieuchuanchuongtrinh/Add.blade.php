@extends('Admin.Master')
@section('title',' thêm Tiêu chuẩn chương trình mới')
@section('content') 

<div class="h3 padding20 text-center">Thêm tiêu chuẩn chương trình mới</div>
<div class="container" style="max-width:500px;">
 @if(count($errors)>0)
      <div class="alert alert-warning">
        <strong>Cảnh báo ! ! !</strong>  <br>     
         @foreach($errors->all() as $err)            
            {{$err}}! &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br>            
          @endforeach         
      </div>
    @endif  
</div>


<div class="box-body" style="padding: 20px;">  

<form name="" method="post" action="set_admin/tieu-chuan-chuong-trinh/add" enctype="multipart/form-data">
      
  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
      <b class="ten2x">Danh sách chương trình</b>  
      <select name="id_chuongtrinh" class="form-control select2">               
        @foreach($Chuongtrinh as $tc)
          <option value="{{$tc->id}}">{{$tc->ten_vi}}</option>
        @endforeach           
      </select>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
      <b class="ten2x">Danh sách học kỳ</b>  
      <select name="id_hocky" class="form-control select2">               
        @foreach($Hocky as $hk)
          <option value="{{$hk->id}}">{{$hk->ten}}</option>
        @endforeach           
      </select>
    </div>  
   </div> 
  <br>
<div class="row">
   <div class="col-lg-6 col-md-6">
     <div class="col-lg-4 col-md-4">
       <label class="ten2x">Số tín chỉ bắc buộc</label>
       <input type="text" class="form-control text-center" name="TCBB">
     </div>

     <div class="col-lg-4 col-md-4">
       <label class="ten2x">Số lý thuyết bắc buộc</label>
       <input type="text" class="form-control text-center" name="LTBB">
     </div>

     <div class="col-lg-4 col-md-4">
       <label class="ten2x">Số thực hành bắc buộc</label>
       <input type="text" class="form-control text-center" name="THBB">
     </div>
   </div>  
  
    
    <div class="col-lg-6 col-md-6">
     <div class="col-lg-4 col-md-4">
       <label class="ten2x">Số tín chỉ tự chọn</label>
       <input type="text" class="form-control text-center" name="TCTC">
     </div>

     <div class="col-lg-4 col-md-4">
       <label class="ten2x">Số lý thuyết tự chọn</label>
       <input type="text" class="form-control text-center" name="LTTC">
     </div>

     <div class="col-lg-4 col-md-4">
       <label class="ten2x">Số thực hành tự chọn</label>
       <input type="text" class="form-control text-center" name="THTC">
     </div>
   </div>  

</div>
       <br>
	<input type="submit" value="Lưu" class="btn btn-success btn2" />
	<a href="set_admin/tieu-chuan-chuong-trinh/list/0"><input type="button" value="Thoát"  class="btn btn-danger btn2" /></a>
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
  @endsection
 