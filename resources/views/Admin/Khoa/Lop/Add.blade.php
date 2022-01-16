@extends('Admin.Master')
@section('title',' thêm lớp mới')
@section('content') 

<div class="h3 padding20 text-center">Thêm lớp mới</div>
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
<form name="" method="post" action="set_admin/lop/add" enctype="multipart/form-data">
  <div class="container-fluid">  
		<div id="tabs">   

    <div class="row" style="margin:20px 0;">      
      <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
        <b class="ten2x">Bậc đào tạo</b><br>
        <select name="id_bacdaotao" id="bacdaotao" class="form-control">
            @foreach ($Bacdaotao as $Bac)
              <option value="{{$Bac->id}}">{{$Bac->ten_vi}}</option>
            @endforeach
        </select>        
      </div>      

      <div class="col-lg-4 col-md-4">
        <b class="ten2x">Hệ đào tạo</b><br>
        <select name="id_hedaotao" class="form-control" id="id_hedaotao">
          @foreach ($Hedaotao as $hdt)
            <option value="{{$hdt->id}}">{{$hdt->ten_vi}}</option>
          @endforeach
        </select>
      </div> 
            
      <div class="col-lg-4 col-md-4">
        <b class="ten2x">Bộ môn</b><br>
        <select name="id_bomon" class="form-control" id="bomon">
          @foreach ($Bomon as $BM)
            <option value="{{$BM->id}}">{{$BM->ten_vi}}</option>
          @endforeach
        </select>
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
                  <b class="ten2x">Mã lớp</b><input type="text" name="malop" value="{{old('malop')}}" placeholder="Nhập mã lớp" class="form-control" /><br/>
                </div>
                 <div class="col-log-6 col-md-6 col-sm-6 col-xs-12">
                  <b class="ten2x">Tên lớp</b><input type="text" name="tenlop" value="{{old('tenlop')}}" placeholder="Nhập tên lớp"  class="form-control" /><br/> 
                </div>
                 <div class="col-log-6 col-md-6 col-sm-6 col-xs-12">
                   <b class="ten2x">Năm bắt đầu</b><input type="text" name="nambatdau" value="{{old('nambatdau')}}" placeholder="Nhập niên khóa" class="form-control" /><br/>
                </div>
                 <div class="col-log-6 col-md-6 col-sm-6 col-xs-12">
                  <b class="ten2x">Năm tốt nghiệp</b><input type="text" name="namtotnghiep" value="{{old('namtotnghiep')}}" placeholder="Nhập năm tốt nghiệp"  class="form-control" /><br/>
                </div>

                <div class="col-log-6 col-md-6 col-sm-6 col-xs-12">
                  <b class="ten2x">Email</b><input type="text" name="email" value="{{old('email')}}" placeholder="Nhập email lớp"  class="form-control" /><br/>
                </div>

                <div class="col-log-6 col-md-6 col-sm-6 col-xs-12">
                  <b class="ten2x">Tốt nghiệp</b><br>
                  <select class="form-control" name="totnghiep">
                    <option value="0">Chưa tốt nghiệp</option>
                    <option value="1">Đã tốt nghiệp</option>
                  </select>
                </div>                
              </div>

              <div class="row">
                <div class="col-log-6 col-md-6 col-sm-6 col-xs-12">
                  <b class="ten2x">Chương trình đào tạo</b>
                  <select class="form-control" name="id_chuongtrinh">
                    @foreach($Chuongtrinh as $tt)
                     <option value="{{$tt->id}}">{{$tt->ten_vi}}</option> 
                    @endforeach                   
                  </select>
                </div>

                <div class="col-log-6 col-md-6 col-sm-6 col-xs-12">
                  <b class="ten2x">Lớp không thuộc Khoa</b>
                  <input type="checkbox" name="ngoaikhoa" value="1" class="flat-red">
                </div>
              </div>                                   
            </div> 
        </div>
		    <input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
			<input type="submit" value="Lưu" class="btn btn-success btn2" onclick="set()" />
		<a href="set_admin/lop/list/0"><input type="button" value="Thoát"  class="btn btn-danger btn2" /></a>	

	</div><!---END #tabs-->	
</div>
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
  @endsection