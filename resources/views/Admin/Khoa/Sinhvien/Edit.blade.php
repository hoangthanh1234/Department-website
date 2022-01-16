@extends('Admin.Master')
@section('title','Cập nhật sinh viên')
@section('content') 

<div class="h3 padding20 text-center">Cập nhật sinh viên</div>
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
<form name="" method="post" action="set_admin/sinhvien/edit/{{$Sinhvien->id}}" enctype="multipart/form-data">
<div class="container-fluid"> 
  <div id="tabs"> 
  <ul id="ultabs">         
    <li type="#tab1" class="ten2x">Thông tin</li>                                          
  </ul>
  <div class="clearfix"></div>                        
  <div id="content_tabs">               
    <div id="tab1">
    <div class="row" style="margin-bottom:20px;">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
         <b class="ten2x">Bộ môn</b>
         <select id="bomon" class="form-control select2">
         <option value="0">Chọn bộ môn</option>
          @foreach ($Bomon as $BM)
            <option value="{{$BM->id}}" @if($BM->id==$Sinhvien->id_bomon) @endif>{{$BM->ten_vi}}</option>
          @endforeach
          </select>
      </div> 
       <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <b class="ten2x">Lớp</b>
          <select name="id_lop" id="id_lop" class="form-control select2">
            @foreach ($Lop as $L)
              <option value="{{$L->id}}" @if($L->id==$Sinhvien->id) selected @endif>{{$L->malop}}-{{$L->tenlop}}</option>
            @endforeach
          </select>
        </div>                     
    </div>

<div class="row">
  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <b class="ten2x">Mã Sinh viên</b><input type="text" name="ma" value="{{$Sinhvien->masinhvien}}"  placeholder="nhập mã sinh viên" class="form-control" /><br/>
  </div>
  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <b class="ten2x">Tên</b><input type="text" name="ten" value="{{$Sinhvien->tensinhvien}}"  placeholder="Nhập tên sinh viên" class="form-control" /><br/>
  </div>
</div>

<div class="row">
  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
     <b class="ten2x">Giới tính</b>
      <select name="gioitinh" class="form-control">
        <option>Chọn giới tính</option>
        <option value="1" @if($Sinhvien->gioitinh==1) selected @endif>Nam</option>
        <option value="0" @if($Sinhvien->gioitinh==0) selected @endif>Nữ</option>
     </select><br/>
  </div>
  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <b class="ten2x">Ngày Sinh</b>
      <input type="text" name="ngaysinh" value="{{ \Carbon\Carbon::parse($Sinhvien->ngaysinh)->format('d/m/Y')}}" placeholder="Ngày sinh"  class="form-control datepicker" /><br/>
  </div>
</div>
<div class="row">
  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <b class="ten2x">Nơi sinh</b><input type="text" name="noisinh" value="{{ $Sinhvien->noisinh }}" placeholder="Nhập nơi sinh"   class="form-control" /><br/>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
  <b class="ten2x">Địa chỉ</b><input type="text" name="diachi" value="{{ $Sinhvien->diachi }}" placeholder="Nhâp địa chỉ"  class="form-control" /><br/>
</div>
</div>
<div class="row">
  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <b class="ten2x">E-mail</b><input type="text" name="email" value="{{ $Sinhvien->email }}" placeholder="Nhập E-mail"  class="form-control" />
  </div>
  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <b class="ten2x">Điện thoại</b><input type="text" name="dienthoai" value="{{ $Sinhvien->dienthoai }}" placeholder="Nhập số điện thoại"  class="form-control" /><br/>
  </div>
</div>                                    
</div> 
</div>
<input type="submit" value="Lưu" class="btn btn-success btn2"/>
<a href="set_admin/sinhvien/list/{{$Sinhvien->lop->id}}">
  <input type="button" value="Thoát"  class="btn btn-danger btn2" />
</a>
</div><!---END #tabs--> 
</div>
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
  @endsection
@section('script')
<script type="text/javascript">
$(document).on('change', '#bomon', function(){
  var id_bomon=$(this).val();
  $.get("set_admin/ajax/loadlop/"+id_bomon,function(data){
      $('#id_lop').html(data);
    });      
});
</script>
@endsection