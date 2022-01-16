@extends('Admin.Master')
@section('title','Cập nhật thông tin lớp')
@section('content') 

<div class="h3 padding20 text-center">Cập nhật thông tin lớp</div>
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
<form name="" method="post" action="set_admin/lop/edit/{{$Lop->id}}" enctype="multipart/form-data">
<div class="container-fluid"> 
  <div id="tabs">
    <div class="row" style="margin:20px 0;">      
      <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-4"><b class="ten2x">Bật đào tạo</b></div>
          <div class="col-lg-8 col-md-8 col-sm-6 col-xs-8">
            <select name="id_batdaotao" id="batdaotao" class="form-control">
              @foreach ($Bacdaotao as $Bac)
              <option value="{{$Bac->id}}" @if($Lop->id_bacdaotao==$Bac->id) selected @endif>{{$Bac->ten_vi}}</option>
              @endforeach
            </select>
          </div>
         </div>
        </div>   
    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
      <div class="row" >
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-4"><b class="ten2x">Bộ môn</b></div>
        <div class="col-lg-8 col-md-8 col-sm-6 col-xs-8">
        <select name="id_bomon" class="form-control" id="bomon">
          @foreach ($Bomon as $BM)
          <option value="{{$BM->id}}" @if($BM->id==$Lop->id_bomon) selected @endif>{{$BM->ten_vi}}</option>
          @endforeach
        </select>
      </div>
    </div>
  </div>
</div>
<ul id="ultabs">         
  <li type="#tab1" class="ten2x">Thông tin</li>                                          
</ul>
<div class="clearfix"></div>
<div id="content_tabs">               
<div id="tab1">
  <div class="row">
    <div class="col-log-6 col-md-6 col-sm-6 col-xs-12">
      <b class="ten2x">Mã lớp</b><input type="text" name="malop" value="{{$Lop->malop}}" placeholder="Nhập mã lớp" class="form-control" /><br/>
    </div>
     <div class="col-log-6 col-md-6 col-sm-6 col-xs-12">
        <b class="ten2x">Tên lớp</b><input type="text" name="tenlop" value="{{$Lop->tenlop}}" placeholder="Nhập tên lớp"  class="form-control" /><br/> 
      </div>
      <div class="col-log-6 col-md-6 col-sm-6 col-xs-12">
        <b class="ten2x">Khóa học</b><input type="text" name="khoahoc" value="{{$Lop->khoahoc}}" placeholder="Nhập niên khóa"  class="form-control" /><br/>
      </div>
      <div class="col-log-6 col-md-6 col-sm-6 col-xs-12">
        <b class="ten2x">Năm tốt nghiệp</b><input type="text" name="namtotnghiep" value="{{$Lop->namtotnghiep}}" placeholder="Nhập năm tốt nghiệp"  class="form-control" /><br/>
      </div>
    </div>
  </div> 
</div>
<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
<input type="submit" value="Lưu" class="btn btn-success btn2"/>
<a href="set_admin/lop/list"><input type="button" value="Thoát"  class="btn btn-danger btn2" /></a> 
  </div><!---END #tabs--> 
</div>
<input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
@endsection