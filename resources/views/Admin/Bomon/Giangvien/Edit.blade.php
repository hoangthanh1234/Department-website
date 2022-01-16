@extends('Admin.Master')
@section('title',' cập nhật giảng viên')
@section('content') 

<style type="text/css">
  .top10{margin-top:10px;}
</style>

<div class="h3 padding20 text-center">Cập nhật thông tin</div>
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
<form  method="post" action="set_bomon/giangvien/edit/{{$Giangvien->id}}" enctype="multipart/form-data">
    <div class="container-fluid">   
    <div id="tabs">  

    <div class="row">             
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 top10">
            <b class="ten2x">Trình độ:</b>
              <select name="id_trinhdo" id="batdaotao" class="form-control">
                @foreach ($Trinhdo as $TD)
                  <option value="{{$TD->id}}" @if ($Giangvien->id_trinhdo==$TD->id) selected @endif>{{$TD->ten_vi}}</option>
                 @endforeach
              </select>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 top10">
            <b class="ten2x">Chức vụ:</b>
              <select name="id_chucvu" class="form-control">
                   @foreach ($Chucvu as $CV)
                    <option value="{{$CV->id}}" @if ($Giangvien->id_chucvu==$CV->id) selected @endif>{{$CV->ten_vi}}</option>
                   @endforeach
              </select>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 top10">
            <b class="ten2x">Bộ môn:</b>                
            <select name="id_bomon" class="form-control" id="bomon">
                @foreach ($Bomon as $BM)
                  <option value="{{$BM->id}}" @if ($Giangvien->id_bomon==$BM->id) selected @endif>{{$BM->ten_vi}}</option>
                @endforeach
            </select>
        </div>
    </div>



<div class="row">
             
     <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 top10">
        <b class="ten2x">Mã số:</b><input type="text" name="maso" value="{{$Giangvien->maso}}"  class="form-control" placeholder="Mã số giảng viên" />
      </div>

      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 top10">
          <b class="ten2x">Họ Tên:</b><input type="text" name="ten" value="{{$Giangvien->ten}}"  class="form-control" placeholder="Họ tên giảng viên" />
      </div>

      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 top10">
        <b class="ten2x">Giới tính:</b>
           <select name="gioitinh" class="form-control">
              <option value="1" @if ($Giangvien->gioitinh==1) selected @endif>Nam</option>
              <option value="0" @if ($Giangvien->gioitinh==0) selected @endif>Nữ</option>
            </select>
     </div>


 </div>


    <div class="row">                 
       <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 top10">
            <b class="ten2x">Ngày sinh:</b>
            <div class="input-group date" data-provide="datepicker">
                <input type="text" name="ngaysinh" value="{{date('d-m-Y', strtotime($Giangvien->ngaysinh))}}" class="form-control datepicker" placeholder="Ngày sinh giảng viên">
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-th"></span>
                 </div>
            </div>
       </div>

        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 top10">
           <b class="ten2x">Nơi sinh:</b><input type="text" name="noisinh" value="{{$Giangvien->noisinh}}"  class="form-control" placeholder="Nhập nơi sinh" />
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 top10">
            <b class="ten2x">Quê quán:</b><input type="text" name="quequan" value="{{$Giangvien->quequan}}"  class="form-control" placeholder="quê quán" />
        </div>
    </div>

    <div class="row"> 

        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 top10">
           <b class="ten2x">CMND:</b><input type="text" name="socmnd" value="{{$Giangvien->cmnd}}"  class="form-control" placeholder="Số SMND" />
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 top10">
            <b class="ten2x">Email:</b><input type="text" name="email" value="{{$Giangvien->email}}"  class="form-control" placeholder="địa chỉ Email" />
        </div>

         <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 top10">
          <b class="ten2x">Điện thoại:</b><input type="text" name="dienthoai" value="{{$Giangvien->dienthoai}}"  class="form-control" placeholder="Số điện thoại" /> 
       </div> 
    </div>



         
    <div class="row">        

        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 top10">
              <div class="row">
                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><b class="ten2x">Chọn hình</b></div>
                  <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8"><input type="file" name="hinhanh" id="imgInp"></div>
                  <div class="clearfix"></div>
                  <p style="padding-left:20px;padding-top:10px;">hỗ trợ file jpg, png,jpeg (width:800px height:500px tốt nhất)</p>
             </div>
       </div> 

        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 top10">
            <img id="blah" src="ht96_image/giangvien/{{$Giangvien->hinhanh}}" alt="Ảnh xem trước" style="width:150px;height:150px;" />
        </div> 
    </div> 

<!-- <input type="submit" value="Lưu" class="btn btn-success btn2"/> -->
<a href="set_bomon/giangvien/list/{{$Giangvien->id_bomon}}"><input type="button" value="Thoát"  class="btn btn-danger btn2" /></a>

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
