@extends('Admin.Master')
@section('title',' thêm giảng viên')
@section('content') 

<style type="text/css">
  .top10{margin-top:10px;}
</style>

<div class="h3 padding20 text-center">Thêm giảng viên mới</div>
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
<form  method="post" action="set_admin/giangvien/add" enctype="multipart/form-data">
   	<div class="container-fluid">   
		<div id="tabs"> 

    <div class="row">
             
     <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 top10">
        <b class="ten2x">Mã số:</b><input type="text" name="maso"  class="form-control" placeholder="Mã số giảng viên" />
      </div>

      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 top10">
          <b class="ten2x">Họ Tên:</b><input type="text" name="ten"  class="form-control" placeholder="Họ tên giảng viên" />
      </div>

      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 top10">
        <b class="ten2x">Giới tính:</b>
           <select name="gioitinh" class="form-control">             
              <option value="1">Nam</option>
              <option value="0">Nữ</option>
            </select>
     </div>


 </div> 

    <div class="row">             
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 top10">
            <b class="ten2x">Học vị cao nhất:</b>
              <select name="id_trinhdo" id="batdaotao" class="form-control">
                @foreach ($Trinhdo as $TD)
                  <option value="{{$TD->id}}">{{$TD->ten_vi}}</option>
                @endforeach
              </select>
        </div>

         <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 top10">
            <b class="ten2x">Năm bổ nhiệm:</b><br>
              <input type="text" name="nambonhiemhocvi"  class="form-control">
        </div>

         <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 top10">
            <b class="ten2x">Nước nhận học vị:</b><br>
              <input type="text" name="nuocnhanhocvi"  class="form-control">
        </div>

       
    </div>


<div class="row">
          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 top10">
            <b class="ten2x">Chức vụ:</b>
              <select name="id_chucvu" class="form-control">
                   @foreach ($Chucvu as $CV)
                    <option value="{{$CV->id}}">{{$CV->ten_vi}}</option>
                   @endforeach
              </select>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 top10">
            <b class="ten2x">Bộ môn:</b>                
            <select name="id_bomon" class="form-control" id="bomon">
                @foreach ($Bomon as $BM)
                  <option value="{{$BM->id}}">{{$BM->ten_vi}}</option>
                @endforeach
            </select>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 top10">
            <b class="ten2x">Dân tộc:</b><br>
              <input type="text" name="dantoc"  class="form-control">
        </div>

</div>

<div class="row">                 
  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 top10">
    <b class="ten2x">Ngày sinh:</b>
    <div class="input-group date">
      <input type="text" name="ngaysinh" class="form-control datepicker"  value="{{date('d/m/Y', strtotime(Carbon\Carbon::now()))}}"  placeholder="Ngày sinh giảng viên">
      <div class="input-group-addon">
          <span class="glyphicon glyphicon-th"></span>
      </div>
    </div>
  </div>

  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 top10">
    <b class="ten2x">Nơi sinh:</b><input type="text" name="noisinh"  class="form-control" placeholder="Nhập nơi  sinh" />
  </div>

  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 top10">
     <b class="ten2x">Quê quán:</b><input type="text" name="quequan"  class="form-control" placeholder="Nhập quê quán" />
  </div>
</div>


    <div class="row">
                 
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 top10">
           <b class="ten2x">CMND:</b><input type="text" name="socmnd"  class="form-control" placeholder="Số SMND" />
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 top10">
            <b class="ten2x">Email:</b><input type="text" name="email"  class="form-control" placeholder="địa chỉ Email" />
        </div>
        
         <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 top10">
          <b class="ten2x">Điện thoại:</b><input type="text" name="dienthoai"  class="form-control" placeholder="Số điện thoại" /> 
       </div>
    </div>

    <div class="row">
       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 top10">
          <b class="ten2x">Địa chỉ liên hệ:</b><input type="text" name="diachilienhe"   class="form-control" placeholder="Nhập địa chỉ liên hệ" /> 
       </div> 
    </div>

    <div class="row">
       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 top10">
          <b class="ten2x">Link Google Site:</b>
            <input type="text" name="linkgooglesite" value="{{old('linkgooglesite')}}"  class="form-control" placeholder="Nhập đường dẫn đến google site của bạn" /> 
       </div> 
    </div>

    <div class="row">
       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 top10">
          <b class="ten2x">Link Google Scholar:</b>
            <input type="text" name="linkgooglescholar" value="{{old('linkgooglescholar')}}"  class="form-control" placeholder="Nhập đường dẫn đến google scholar của bạn" /> 
       </div> 
    </div>
         
    <div class="row"> 
        <div class="col-lg-4 col-md-4 col-xs-12 top10">
          <b class="ten2x">Chọn trạng thái</b>
          <select class="form-control" name="trangthai">
              <option value="0"> Đã nghĩ việc</option>
              <option value="1">Đang làm việc</option>
              <option value="2">Đang du học</option>
          </select>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 top10">
              <div class="row">
                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><b class="ten2x">Chọn hình</b></div>
                  <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8"><input type="file" name="hinhanh" id="imgInp"></div>
                  <div class="clearfix"></div>
                  <p style="padding-left:20px;padding-top:10px;">hỗ trợ file jpg, png,jpeg (width:800px height:500px tốt nhất)</p>
             </div>
       </div> 

        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 top10">
            <img id="blah" src="#" alt="Ảnh xem trước" style="width:150px;height:150px;" />
        </div> 
    </div> 

<input type="submit" value="Lưu" class="btn btn-success btn2"/>
<a href="set_admin/giangvien/list/0"><input type="button" value="Thoát"  class="btn btn-danger btn2" /></a>

</div><!---END #tabs-->	

</div>
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
  @endsection

@section('script')
  <script type="text/javascript">
    
      function readURL(input) {

      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          $('#blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
      }
    }

    $("#imgInp").change(function() {
      readURL(this);
    });

  </script>
@endsection
