@extends('Admin.Master')
@section('title','Cập nhật cựu sinh viên')
@section('content') 

<div class="h3 padding20 text-center">Cập nhật cựu sinh viên</div>
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
<form name="" method="post" action="set_admin/cuusinhvien/edit/{{$Cuusinhvien->id}}" enctype="multipart/form-data">
        <div class="container-fluid">   

    <div id="tabs"> 
          <ul id="ultabs">         
              <li type="#tab1" class="ten2x">Thông tin</li>                                          
          </ul>
        <div class="clearfix"></div>
                        
        <div id="content_tabs">               
            <div id="tab1">
                <div class="row">                    

                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                         <b class="ten2x">Mã Sinh viên</b><input type="text" name="masinhvien" value="{{ $Cuusinhvien->sinhvien->ma }}"  placeholder="nhập mã sinh viên" class="form-control"  readonly="" /><br/>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <b class="ten2x">Lớp</b><input type="text" name="ma" value="{{ $Cuusinhvien->sinhvien->lop->malop }} - {{ $Cuusinhvien->sinhvien->lop->tenlop }}"   class="form-control" readonly="" /><br/>
                    </div>
                </div>

                 <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                         <b class="ten2x">Họ và tên</b><input type="text" name="ho" value="{{ $Cuusinhvien->sinhvien->ho }} {{$Cuusinhvien->sinhvien->tensinhvien}}" class="form-control"  readonly="" />
                    </div>

                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                         <b class="ten2x">Ngày Sinh</b><input type="text" name="ten" value="{{ \Carbon\Carbon::parse($Cuusinhvien->sinhvien->ngaysinh)->format('d/m/Y')}}" class="form-control" readonly="" /><br/>
                    </div>
                </div>

                <div class="row">  
                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                         <b class="ten2x">Tên cơ quan công tác (EN)</b>
                         <input type="text" name="noicongtac_en" value="{{ $Cuusinhvien->noicongtac_en }}" placeholder="Nhập Nơi làm việt hiện tại tiếng anh"   class="form-control" /><br/>
                    </div>

                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                         <b class="ten2x">Tên cơ quan công tác (VI)</b>
                         <input type="text" name="noicongtac_vi" value="{{ $Cuusinhvien->noicongtac_vi }}" placeholder="Nhập Nơi làm việt hiện tại tiếng việt"   class="form-control" /><br/>
                    </div>
                </div>

                 <div class="row">  
                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                         <b class="ten2x">Chức vụ (EN)</b>
                         <input type="text" name="chucvu_en" value="{{ $Cuusinhvien->chucvu_en }}" placeholder="Nhập chức vụ hiện tại tiếng anh"   class="form-control" /><br/>
                    </div>

                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                         <b class="ten2x">Chức vụ (VI)</b>
                         <input type="text" name="chucvu_vi" value="{{ $Cuusinhvien->chucvu_vi }}" placeholder="Nhập chức vụ hiện tại tiếng việt"   class="form-control" /><br/>
                    </div>
                </div>

                <div class="row">  
                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                         <b class="ten2x">Số cơ quan</b>
                         <input type="text" name="socoquan" value="{{ $Cuusinhvien->socoquan }}" placeholder="Nhập Số điện thoại cơ quan"   class="form-control" /><br/>
                    </div>

                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                         <b class="ten2x">Địa chỉ cơ quan</b>
                         <input type="text" name="diachicoquan" value="{{ $Cuusinhvien->diachicoquan }}" placeholder="Nhập đại chỉ cơ quan"   class="form-control" /><br/>
                    </div>
                </div>                                    
            </div> 
        </div>
        
      <input type="submit" value="Lưu" class="btn btn-success btn2" />
      <a href="set_admin/cuusinhvien/list/{{$Cuusinhvien->sinhvien->lop->id}}"><input type="button" value="Thoát"  class="btn btn-danger btn2" /></a>

  </div><!---END #tabs--> 
</div>
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
  @endsection