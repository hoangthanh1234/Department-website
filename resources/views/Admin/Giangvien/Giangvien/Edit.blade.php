@extends('Admin.Master')
@section('title',' cập nhật giảng viên')
@section('content') 

<style type="text/css">
  .top10{margin-top:10px;}
</style>

<div class="h3 padding20 text-center">Cập nhật giảng viên</div>
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
<form  method="post" action="set_giangvien/giangvien/edit/{{$Giangvien->id}}" enctype="multipart/form-data">
    <div class="container-fluid">   
    <div id="tabs">  

    <div class="row">             
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 top10">
            <b class="ten2x">Học vị cao nhất</b><br>
              <select name="id_trinhdo" id="batdaotao" class="form-control">
                @foreach ($Trinhdo as $TD)
                  <option value="{{$TD->id}}" @if ($Giangvien->id_trinhdo==$TD->id) selected @endif>{{$TD->ten_vi}}</option>
                 @endforeach
              </select>
        </div>

         <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 top10">
            <b class="ten2x">Năm bổ nhiệm</b><br>
              <input type="text" name="nambonhiemhocvi" value="{{$Giangvien->nambonhiemhocvi}}" class="form-control">
        </div>

         <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 top10">
            <b class="ten2x">Nước nhận học vị</b><br>
              <input type="text" name="nuocnhanhocvi" value="{{$Giangvien->nuocnhanhocvi}}" class="form-control">
        </div>       
    </div>


<div class="row">
  
   <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 top10">
            <b class="ten2x">Chức vụ</b><br>
              <select name="id_chucvu" class="form-control">
                   @foreach ($Chucvu as $CV)
                    <option value="{{$CV->id}}" @if ($Giangvien->id_chucvu==$CV->id) selected @endif>{{$CV->ten_vi}}</option>
                   @endforeach
              </select>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 top10">
            <b class="ten2x">Bộ môn</b><br>                
            <select name="id_bomon" class="form-control" id="bomon">
                @foreach ($Bomon as $BM)
                  <option value="{{$BM->id}}" @if ($Giangvien->id_bomon==$BM->id) selected @endif>{{$BM->ten_vi}}</option>
                @endforeach
            </select>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 top10">
            <b class="ten2x">Dân tộc</b><br>
              <input type="text" name="dantoc" value="{{$Giangvien->dantoc}}" class="form-control">
        </div>

</div>



<div class="row">
             
     <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 top10">
        <b class="ten2x">Mã số:</b><input type="text" name="maso" value="{{$Giangvien->maso}}"  class="form-control" placeholder="Mã số giảng viên" />
      </div>

      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 top10">
          <b class="ten2x">Họ Tên</b><input type="text" name="ten" value="{{$Giangvien->ten}}"  class="form-control" placeholder="Họ tên giảng viên" />
      </div>

      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 top10">
        <b class="ten2x">Giới tính</b>
           <select name="gioitinh" class="form-control">
              <option value="1" @if ($Giangvien->gioitinh==1) selected @endif>Nam</option>
              <option value="0" @if ($Giangvien->gioitinh==0) selected @endif>Nữ</option>
            </select>
     </div>


 </div>


    <div class="row">                 
       <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 top10">
            <b class="ten2x">Ngày sinh</b>
            <div class="input-group date">
                <input type="text" name="ngaysinh" value="{{date('d/m/Y', strtotime($Giangvien->ngaysinh))}}" class="form-control datepicker" placeholder="Ngày sinh giảng viên">
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-th"></span>
                 </div>
            </div>
       </div>

        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 top10">
           <b class="ten2x">Nơi sinh</b><input type="text" name="noisinh" value="{{$Giangvien->noisinh}}"  class="form-control" placeholder="Nhập nơi sinh" />
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 top10">
            <b class="ten2x">Quê quán</b><input type="text" name="quequan" value="{{$Giangvien->quequan}}"  class="form-control" placeholder="quê quán" />
        </div>
    </div>

    <div class="row"> 

        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 top10">
           <b class="ten2x">CMND</b><input type="text" name="socmnd" value="{{$Giangvien->cmnd}}"  class="form-control" placeholder="Số SMND" />
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 top10">
            <b class="ten2x">Email</b><input type="text" name="email" value="{{$Giangvien->email}}"  class="form-control" placeholder="địa chỉ Email" />
        </div>

         <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 top10">
          <b class="ten2x">Điện thoại</b><input type="text" name="dienthoai" value="{{$Giangvien->dienthoai}}"  class="form-control" placeholder="Số điện thoại" /> 
       </div> 
    </div>

    <div class="row"> 

        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 top10">
           <b class="ten2x">Hạng chức danh nghề nghiệp:</b>
           <select name="hangchucdanhnghenghiep" id="hangchucdanhnghenghiep" class="form-control" required>
             @foreach ($hangCD as $h)
              @if ($Giangvien->hangchucdanhnghenghiep==$h->maHangVB)
                  <option value="{{ $h->id }}" selected>{{ $h->maHangVB }}-- {{ $h->tenHang }}</option>
              @else
                  <option value="{{ $h->id }}">{{ $h->maHangVB }}-- {{ $h->tenHang }}</option>
              @endif
             @endforeach
             {{-- <option value="V.07.01.01" @if($Giangvien->hangchucdanhnghenghiep== 'V.07.01.01') selected @endif>Hạng I (V.07.01.01)</option>
             <option value="V.07.01.02" @if($Giangvien->hangchucdanhnghenghiep== 'V.07.01.02') selected @endif>Hạng II (V.07.01.02)</option>
             <option value="V.07.01.03" @if($Giangvien->hangchucdanhnghenghiep== 'V.07.01.03') selected @endif>Hạng III (V.07.01.03)</option> --}}
           </select>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 top10">
            <b class="ten2x">Bậc</b>
            <select name="bac" class="form-control" id="bac" required>
              @foreach ($bacCD as $b)
              @if ($Giangvien->bac==$b->maBacVB)
                <option value="{{ $b->id }}" selected>{{ $b->tenBac }}</option>
              @else
                <option value="{{ $b->id }}">{{ $b->tenBac }}</option>
              @endif
              @endforeach      
           </select>
        </div>

     

         <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 top10">
            <b class="ten2x">Hệ số lương</b>
            <input type="text" name="hesoluong" id="hesoluong"  value="{{$Giangvien->hesoluong}}"   class="form-control" placeholder="Hệ số lương" readonly /> 
        </div> 
    </div>

    <div class="row">
       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 top10">
          <b class="ten2x">Địa chỉ liên hệ:</b>
            <input type="text" name="diachilienhe" value="{{$Giangvien->diachilienhe}}"  class="form-control" placeholder="Nhập địa chỉ liên hệ" /> 
       </div> 
    </div>

    <div class="row">
       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 top10">
          <b class="ten2x">WebSite:</b>
            <input type="text" name="linkgooglesite" value="{{$Giangvien->linkgooglesite}}"  class="form-control" placeholder="Nhập đường dẫn đến google site của bạn" /> 
       </div> 
    </div>

    <div class="row">
       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 top10">
          <b class="ten2x">Google Scholar:</b>
            <input type="text" name="linkgooglescholar" value="{{$Giangvien->linkgooglescholar}}"  class="form-control" placeholder="Nhập đường dẫn đến google scholar của bạn" /> 
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

<input type="submit" value="Lưu" class="btn btn-success btn2"/>
<a href="set_giangvien"><input type="button" value="Thoát"  class="btn btn-danger btn2" /></a>

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

    $(document).on('change','#hangchucdanhnghenghiep',function(){

      var maHang=$(this).val();
      var URL='set_giangvien/ajax/get-bac-by-hang-chuc-danh/'+maHang;
      $.ajax({
        type: "get",
        url: URL,
        success: function (data) {
          $('#bac').empty();
          var string="";
          var $bac_mac_dinh=0;
          var $dem=0;
          data.forEach(element => {
              string=string+"<option value='"+element['id']+"'>"+element['tenBac']+"</option>";
              if($dem==0){
                // nếu như là giá trị đầu tiên của bậc thì lưu lại maBac
                $bac_mac_dinh=element['id'];
              }
              $dem++;
          });
          $('#bac').append(string);
          //tiến hành cập nhật lại hệ số lương dựa theo mã bậc mặc định
          var URL='set_giangvien/ajax/get-he-so-luong-by-ma-bac/'+$bac_mac_dinh;
          var hesoluong=0;
          $.ajax({
            type: "get",
            url: URL,
            success: function (data) {
              if(data!=null){ 
                $('#hesoluong').val(data['heSo']);
              }else{
                $('#hesoluong').val(0);
              }
            }
          });
        }
      });
    
    });

    $(document).on('change','#bac',function(){
      //var bat=parseInt($(this).val());
      var bat=$(this).val();
      var URL='set_giangvien/ajax/get-he-so-luong-by-ma-bac/'+bat;
      var hesoluong=0;
      $.ajax({
        type: "get",
        url: URL,
        success: function (data) {
          if(data!=null){ 
            $('#hesoluong').val(data['heSo']);
          }else{
            $('#hesoluong').val(0);
          }
        }
      });

      //=================================
      // if(bat==1) hesoluong =2.34;
      // else hesoluong=((bat-1)*0.33)+2.34;
      // $('#hesoluong').val(hesoluong);
    });

  </script>
@endsection
