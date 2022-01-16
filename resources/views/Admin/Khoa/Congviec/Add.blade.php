@extends('Admin.Master')
@section('title',' thêm công việc mới')
@section('content') 

<div class="h3 padding20 text-center">Thêm công việc mới</div>
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
<form name="" method="post" action="set_admin/congviec/add" enctype="multipart/form-data">
  <div class="box">
 <div class="container-fluid"> 
	
    <div class="row">            
        <div class="col-lg-6 col-md-6">
            <b class="ten2x">Nhóm công việc</b><br>
            <select class="form-control" required name="id_nhomcongviec">                
              @foreach($Nhomcongviec as $ncv)
                <option value="{{$ncv->id}}">{{$ncv->ten}}</option>
              @endforeach
            </select>
        </div>

         <div class="col-lg-6 col-md-6">
            <b class="ten2x">Giảng viên</b><br>
            <select class="form-control select2"  name="id_giangvien">                
              @foreach($Giangvien as $gv)
                <option value="{{$gv->id}}">{{$gv->ten}}</option>
              @endforeach
            </select>
        </div>
    </div>
<br> 
   <div class="row">            
        <div class="col-lg-6 col-md-6">
            <b class="ten2x">Ngày bắt đầu</b><br>
            <div class="input-group date">
              <input type="text" name="ngaybatdau" class="form-control datepicker"  value="{{date('d/m/Y', strtotime(Carbon\Carbon::now()))}}"  placeholder="Ngày bắt đầu công việc">
              <div class="input-group-addon">
                  <span class="glyphicon glyphicon-th"></span>
              </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6">
            <b class="ten2x">Ngày kết thúc</b><br>
            <div class="input-group date">
              <input type="text" name="ngayketthuc" class="form-control datepicker"  value="{{date('d/m/Y', strtotime(Carbon\Carbon::now()))}}"  placeholder="Ngày bắt đầu công việc">
              <div class="input-group-addon">
                  <span class="glyphicon glyphicon-th"></span>
              </div>
            </div>
        </div>
    </div>
<br>
    <b class="ten2x">Tên công việc</b>
    <input type="text" name="ten" value="{{old('ten')}}" class="form-control" /><br/>
    <b class="ten2x">Nội dung công việc</b>
    <textarea name="noidung" id="tiny" class="form-control"></textarea><br>
    <b class="ten2x">Ghi chú</b>
    <input type="text" name="ghichu" value="{{old('ghichu')}}" class="form-control" /><br/>
    <br> 
		<input type="submit" value="Lưu" class="btn btn-success btn2"/>
		<a href="set_admin/congviec/list"><input type="button" value="Thoát"  class="btn btn-danger btn2" /></a>
	</div>
</div>
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
  @endsection

  