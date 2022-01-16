@extends('Admin.Bomon.Hosokhoahoc.Master')

@section('Tabvalue')
 
    <div class="container" style="max-width:500px;margin-top:20px;">
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

  
    
     <form  name="" method="post" action="set_bomon/hosokhoahoc/{{$Hosokhoahoc->giangvien->tenkhongdau}}/thong-tin-chung/{{$tab}}/{{$Hosokhoahoc->id}}" enctype="multipart/form-data">
      <section style="padding-top:30px;">
      <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="form-group">
                <label class="ten2x">Họ tên</label>
                <input type="text" name="ten" value="{{$Hosokhoahoc->giangvien->ten}}" class="form-control" placeholder="Nhập họ tên" readonly>
            </div> 
          </div>

           <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
              <div class="form-group">
                  <label class="ten2x">Giới tính</label>
                   <select class="form-control" name="gioitinh" disabled="true">
                        <option value="1" @if ($Hosokhoahoc->giangvien->gioitinh==1) selected @endif>Nam</option>
                        <option value="0" @if ($Hosokhoahoc->giangvien->gioitinh==0) selected @endif>Nữ</option>
                   </select>
              </div>
          </div>

           <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
               <div class="form-group">
                    <label class="ten2x">Ngày sinh:</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" value="{{date('d-m-Y', strtotime($Hosokhoahoc->giangvien->ngaysinh))}}" class="form-control pull-right datepicker" readonly>
                    </div>                   
              </div>
          </div>
      </div>

      <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="form-group">
                <label class="ten2x">Số CMND</label>
                 <input type="text" name="cmnd" value="{{$Hosokhoahoc->giangvien->cmnd}}" class="form-control" placeholder="Số CMND" readonly>
            </div> 
          </div>

           <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
              <div class="form-group">
                  <label class="ten2x">Địa chỉ Email</label>
                    <input type="text" name="email" value="{{$Hosokhoahoc->giangvien->email}}" class="form-control" placeholder="Nhập đại chỉ Email" readonly>
              </div>
          </div>

           <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
               <div class="form-group">
                    <label class="ten2x">Số điện thoại:</label>
                     <input type="text" name="dienthoai" value="{{$Hosokhoahoc->giangvien->dienthoai}}" class="form-control" placeholder="Nhập số điện thoại" readonly>
              </div>
          </div>
      </div>


      <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="form-group">
                <label class="ten2x">Học vị</label>
                <select name="trinhdo" class="form-control" disabled="true">
                    @foreach ($Trinhdo as $TD)
                      <option value="{{$TD->id}}" @if ($TD->id==$Hosokhoahoc->giangvien->trinhdo->id) selected @endif>{{$TD->ten_vi}}</option>
                    @endforeach
                </select>
            </div> 
          </div>

           <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
              <div class="form-group">
                  <label class="ten2x">Hướng nghiên cứu (VI)</label>                   
                    <textarea class="form-control" name="huongnghiencuu_vi" >{{$Hosokhoahoc->huongnghiencuu_vi}}</textarea>
              </div>
          </div> 

           <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
              <div class="form-group">
                  <label class="ten2x">Hướng nghiên cứu (EN)</label>
                  <textarea class="form-control" name="huongnghiencuu_en" >{{$Hosokhoahoc->huongnghiencuu_en}}</textarea>
              </div>
          </div>          
      </div>

      <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="form-group">
                <label class="ten2x">Chức Danh khoa học (VI)</label>
                 <input type="text" name="chucdanhkhoahoc_vi" value="{{$Hosokhoahoc->chucdanhkhoahoc_vi}}" class="form-control" placeholder="Nhập Chức danh khoa học tiếng việt">
            </div> 
          </div>

           <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
              <div class="form-group">
                  <label class="ten2x">Chức danh khoa học (EN)</label>                   
                    <input type="text" name="chucdanhkhoahoc_en" value="{{$Hosokhoahoc->chucdanhkhoahoc_en}}" class="form-control" placeholder="Nhập Chức danh khoa học tiếng anh">
              </div>
          </div> 

           <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
              <div class="form-group">
                  <label class="ten2x">Ngoại ngữ</label>
                 <input type="text" name="ngoaingu" value="{{$Hosokhoahoc->ngoaingu}}" class="form-control" placeholder="Nhập ngoại ngữ hiện tại">
              </div>
          </div>          
      </div>

      
  
  <p class="ten2x" style="font-weight:bold;font-size:18px;">Thông tin nơi làm việc hiện tại</p>

  <div class="row">
   
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="form-group">
             <label class="ten2x">Tên cơ quan tiếng anh</label>
              <input type="text" name="tencoquanht_vi" value="{{$Hosokhoahoc->tencoquan_en}}" placeholder="nhập tên cơ quan bằng tiếng việt" class="form-control" >
      </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="form-group">
             <label class="ten2x">Tên cơ quan tiếng Việt</label>
              <input type="text" name="tencoquanht_en" value="{{$Hosokhoahoc->tencoquan_vi}}" placeholder="nhập tên cơ quan bằng tiếng anh" class="form-control" >
      </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="form-group">
             <label class="ten2x">Địa chỉ cơ quan</label>
              <input type="text" name="diachicoquan" value="{{$Hosokhoahoc->diachicoquan}}" placeholder="nhập địa chỉ cơ quan" class="form-control" >
      </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="form-group">
             <label class="ten2x">Tên phòng ban</label>
              <input type="text" name="tenphongban"  value="{{$Hosokhoahoc->tenphongban}}" placeholder="nhập tên phòng bang đang công tác" class="form-control" >
      </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="form-group">
             <label class="ten2x">Số điện thoại cơ quan</label>
              <input type="text" name="socoquan" value="{{$Hosokhoahoc->socoquan}}" placeholder="nhập số điện thoại cơ quan" class="form-control" >
      </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="form-group">
             <label class="ten2x">Số fax cơ quan</label>
              <input type="text" name="sofaxcoquan" value="{{$Hosokhoahoc->sofaxcoquan}}" placeholder="nhập số fax cơ quan" class="form-control" >
      </div>
    </div>    
  </div>
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="submit" value="Lưu" class="btn btn-success btn2"/>
  <a href="set_bomon/giangvien/list"><input type="button" value="Thoát"  class="btn btn-danger btn2" /></a>
   </section>
</form>
@endsection