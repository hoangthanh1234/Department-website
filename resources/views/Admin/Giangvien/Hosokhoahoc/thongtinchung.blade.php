@extends('Admin.Giangvien.Hosokhoahoc.Master')

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

  
    
<form  method="post" action="set_giangvien/{{$Giangvien->tenkhongdau}}/thong-tin-chung/{{$tab}}" enctype="multipart/form-data">
  
    <div id="tabs">
        <ul id="ultabs">         
              <li type="#tab1" class="ten2x">Thông tin cá nhân</li>
              <li type="#tab2" class="ten2x">Thông tin nơi làm việc</li>                                          
          </ul>
        <div class="clearfix"></div>
                        
      <div id="content_tabs"> 
          <div id="tab1">            
              <div class="row">
                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="ten2x">Hướng nghiên cứu (VI)</label>                   
                              <textarea class="form-control" name="huongnghiencuu_vi" >{{$Giangvien->huongnghiencuu_vi}}</textarea>
                        </div>
                     </div> 

                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="ten2x">Hướng nghiên cứu (EN)</label>
                            <textarea class="form-control" name="huongnghiencuu_en" >{{$Giangvien->huongnghiencuu_en}}</textarea>
                        </div>
                     </div>          
              </div>

              <div class="row">
                  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label class="ten2x">Chức Danh khoa học (VI)</label>
                         <input type="text" name="chucdanhkhoahoc_vi" value="{{$Giangvien->chucdanhkhoahoc_vi}}" class="form-control" placeholder="nhập Chức danh khoa học tiếng Việt">
                    </div> 
                  </div>

                   <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                      <div class="form-group">
                          <label class="ten2x">Chức danh khoa học (EN)</label>                   
                            <input type="text" name="chucdanhkhoahoc_en" value="{{$Giangvien->chucdanhkhoahoc_en}}" class="form-control" placeholder="nhập Chức danh khoa học tiếng Anh">
                      </div>
                  </div>

                   <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                       <div class="form-group">
                            <label class="ten2x">Năm bổ nhiệm chức danh khoa học</label>
                             <input type="text" name="nambonhiem" value="{{$Giangvien->nambonhiem}}" class="form-control" placeholder="nhập năm bổ nhiệm chức danh khoa học">
                      </div>
                  </div>                    
              </div>

              <div class="row">
                 <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                      <div class="form-group">
                          <label class="ten2x">Bằng đại học 2</label>                   
                            <input type="text" name="vanbang2" value="{{$Giangvien->vanbang2}}" class="form-control" placeholder="nhập bằng đại học hai nếu có">
                      </div>
                  </div>

                   <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                       <div class="form-group">
                            <label class="ten2x">Năm tốt nghiệp bằng đại học 2</label>
                             <input type="text" name="namtotnghiepvb2" value="{{$Giangvien->namtotnghiepvb2}}" class="form-control" placeholder="nhập năm tốt nghiệp bằng đại học 2">
                      </div>
                  </div> 
             </div>
          </div>

          <div id="tab2">            
               <div class="row">   
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                     <div class="form-group">
                               <label class="ten2x">Tên cơ quan tiếng Việt</label>
                                <input type="text" name="tencoquanht_vi" value="{{$Giangvien->tencoquan_vi}}" placeholder="nhập tên cơ quan bằng tiếng Việt" class="form-control" placeholder="nhập tên cơ quan bằng tiếng Việt" class="form-control">
                      </div>
                  </div>

                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <div class="form-group">
                          <label class="ten2x">Tên cơ quan tiếng Anh</label>
                           <input type="text" name="tencoquanht_en" value="{{$Giangvien->tencoquan_en}}" placeholder="nhập tên cơ quan bằng tiếng Anh" class="form-control" placeholder="nhập tên cơ quan bằng tiếng Anh" class="form-control">
                      </div>
                  </div>

                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                               <label class="ten2x">Địa chỉ cơ quan tiếng Việt</label>
                                <input type="text" name="diachicoquan_vi" value="{{$Giangvien->diachicoquan_vi}}" placeholder="nhập địa chỉ cơ quan bằng tiếng Việt" class="form-control" >
                        </div>
                  </div>

                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label class="ten2x">Địa chỉ cơ quan tiếng Anh</label>
                         <input type="text" name="diachicoquan_en" value="{{$Giangvien->diachicoquan_en}}" placeholder="nhập địa chỉ cơ quan bằng tiếng Anh" class="form-control" >
                    </div>
                  </div>

                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label class="ten2x">Tên phòng ban tiếng Việt</label>
                        <input type="text" name="tenphongban_vi"  value="{{$Giangvien->tenphongban_vi}}" placeholder="nhập tên phòng ban đang công tác bằng tiếng Việt" class="form-control" >
                    </div>
                 </div>

                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                     <div class="form-group">
                        <label class="ten2x">Tên phòng ban tiếng Anh</label>
                        <input type="text" name="tenphongban_en"  value="{{$Giangvien->tenphongban_en}}" placeholder="nhập tên phòng ban đang công tác bằng tiếng Anh" class="form-control" >
                      </div>
                  </div>

                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label class="ten2x">Số điện thoại cơ quan</label>
                        <input type="text" name="socoquan" value="{{$Giangvien->socoquan}}" placeholder="nhập số điện thoại cơ quan" class="form-control" >
                    </div>
                  </div>

                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <div class="form-group">
                        <label class="ten2x">Số fax cơ quan</label>
                        <input type="text" name="sofaxcoquan" value="{{$Giangvien->sofaxcoquan}}" placeholder="nhập số fax cơ quan" class="form-control" >
                      </div>
                  </div>    
                </div>
          </div>
      </div>

      <input type="submit" value="Lưu" class="btn btn-success btn2"/>
    <a href="set_giangvien"><input type="button" value="Thoát"  class="btn btn-danger btn2" /></a>
    </div>

    <input type="hidden" name="_token" value="{{ csrf_token() }}">   
</form>
@endsection