@extends('Admin.Master')
@section('title',' thêm tin tức')
@section('content') 
<div class="h3 padding20 text-center">Thêm  tin tức mới</div>
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
<div class="box">
  <div class="body-box">
    <form name="" method="post" action="set_admin/tintuc/dang-nhanh" enctype="multipart/form-data">
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
            <b class="ten2x">Danh mục</b><br> 
              <select name="id_cate" class="form-control select2" required>                
                @foreach($Dm_tintuc as $cate)
                  <option value="{{$cate->id}}">{{$cate->ten_vi}}</option>
                @endforeach           
              </select>
        </div>

          <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
              <b class="ten2x">Bộ môn</b>  
              <select name="id_bomon" class="form-control select2" required>               
                @foreach($Bomon as $DE)
                  <option value="{{$DE->id}}">{{$DE->ten_vi}}</option>
                @endforeach           
              </select>
          </div> 

          <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
              <b class="ten2x">Loại bài viết</b>  
              <select name="loaibv" class="form-control select2"> 
                  <option value="1">Tin tức</option>
                  <option value="0">Sự kiện</option>     
              </select>
          </div>   
    </div> 
<br>
<div class="row">
  <div class="col-lg-6 col-md-6 col-xs-12">       
    <b class="ten2x">Vai trò</b>
    <select class="form-control" name="vaitro">
        <option value="0">Tham gia</option>
        <option value="1">Tham dự</option>
    </select>
  </div>
  
  <div class="col-lg-6 col-md-6 col-xs-12">
    <b class="ten2x">Ngày tham gia, tham dự</b>
    <div class="input-group date">
      <input type="text" name="ngay" class="form-control datepicker"  value="{{date('d/m/Y', strtotime(Carbon\Carbon::now()))}}"  placeholder="Ngày tham gia / tham dự">
      <div class="input-group-addon">
          <span class="glyphicon glyphicon-th"></span>
      </div>
    </div>
  </div>
</div>
<br>
    <div class="row">
      <div class="col-lg-12 col-md-12 col-xs-12">
        <b class="ten2x">Tiêu đề (Vi)</b>
        <input type="text" name="ten_vi"  class="form-control" value="{{old('ten_vi')}}" required placeholder="Nhập vào tiêu đề của hoạt động bằng tiếng Việt" />
      </div>
    </div>
<br>
    <div class="row">
      <div class="col-lg-12 col-md-12 col-xs-12">       
        <b class="ten2x">Tiêu đề (En)</b>
        <input type="text" name="ten_en" class="form-control" value="{{old('ten_en')}}"   required placeholder="Nhập vào tiêu đề của hoạt động bằng tiếng Anh"/>
      </div>
    </div> 
<br>

<div class="row">
  <div class="col-lg-12 col-md-12 col-xs-12">
    <b class="ten2x">Chọn hình</b>
    <input type="file" name="hinhanh" required class="btn btn-primary form-control">
    <p >Hình ảnh phải có Backdrop và chỉ hỗ trợ file png, jpg, jpeg (Xem định nghĩa backdrop  <a target="_blank" href="https://www.google.com/search?source=hp&ei=_q4uXPf_D4y58QXmyafQCw&q=backdrop+l%C3%A0+g%C3%AC&btnK=T%C3%ACm+v%E1%BB%9Bi+Google&oq=backdrop&gs_l=psy-ab.3.0.35i39j0i131j0l8.940.1854..3473...0.0..0.365.810.0j2j1j1......0....1..gws-wiz.eCxykwbSS5Y">Tại đây</a>)</p>
  </div>
</div>
<br>
<div class="row">
  <div class="col-lg-6 col-md-6 col-xs-12">
     <b class="ten2x">Bài học kinh nghiệm (VI)</b>
     <textarea class="form-control" id="tiny" name="baihoc_kinhnghiem_vi" placeholder="Nhập vào nội dung bài học kinh nghiệm thu được từ hoạt động Việt">{{old('baihoc_kinhnghiem_vi')}}</textarea>
  </div>

   <div class="col-lg-6 col-md-6 col-xs-12">
     <b class="ten2x">Bài học kinh nghiệm (EN)</b>
     <textarea class="form-control" id="tiny1" name="baihoc_kinhnghiem_en" placeholder="Nhập vào nội dung bài học kinh nghiệm thu được từ hoạt động bằng tiếng Anh">{{old('baihoc_kinhnghiem_en')}}</textarea>
  </div>
</div>
<br>
<div class="row">
   <div class="col-lg-6 col-md-6 col-xs-12">
    <b class="ten2x">Nội dung phối hợp (VI)</b>
    <textarea class="form-control" id="tiny2" name="noidung_phoihop_vi" placeholder="Nhập vào nội dụng phối hợp đã thực hiên trong hoạt động bằng tiếng Việt">{{old('noidung_phoihop_vi')}}</textarea>
  </div>

  <div class="col-lg-6 col-md-6 col-xs-12">
    <b class="ten2x">Nội dung phối hợp (En)</b>
    <textarea class="form-control" id="tiny3" name="noidung_phoihop_en" placeholder="Nhập vào nội dụng phối hợp đã thực hiên trong hoạt động bằng tiếng Anh">{{old('noidung_phoihop_en')}}</textarea>
  </div>
</div>
<br>
<div class="row">
  <div class="col-lg-6 col-md-6 col-xs-12">
     <b class="ten2x">Đầu mối liên hệ (VI)</b>
     <textarea class="form-control" id="tiny4" name="daumoi_lienhe_vi" placeholder="Nhập vào các đầu mối quan hệ trong hoạt động bằng tiếng Việt">{{old('daumoi_lienhe_vi')}}</textarea>
  </div>
  <div class="col-lg-6 col-md-6 col-xs-12">
     <b class="ten2x">Đầu mối liên hệ (EN)</b>
     <textarea class="form-control" id="tiny5" name="daumoi_lienhe_en" placeholder="Nhập vào các đầu mối quan hệ trong hoạt động bằng tiếng Anh">{{old('daumoi_lienhe_en')}}</textarea>
  </div>
</div>
<br>
<div class="row">
  <div class="col-lg-6 col-md-6 col-xs-12">
    <b class="ten2x">Đặt câu hỏi (VI)</b>
    <textarea class="form-control" name="dat_cauhoi_vi" id="tiny6" placeholder="Nhập vào các câu hỏi đã đặt ra trong hoạt động (nếu có) bằng tiếng Việt">{{old('dat_cauhoi_vi')}}</textarea>
  </div>
  <div class="col-lg-6 col-md-6 col-xs-12">
    <b class="ten2x">Đặt câu hỏi (EN)</b>
    <textarea class="form-control" name="dat_cauhoi_en" id="tiny7" placeholder="Nhập vào các câu hỏi đã đặt ra trong hoạt động (nếu có) bằng tiếng Anh">{{old('dat_cauhoi_en')}}</textarea>
  </div>
</div>

<br>
    <div class="row">
      <div class="col-lg-6 col-md-6 col-xs-12">
        <b class="ten2x">Danh sách báo cáo (VI)</b>
        <textarea name="baocao_chuongtrinh_vi" id="tiny8" class="form-control" placeholder="Nhập vào danh sách các báo cáo (nếu có) bằng tiếng Việt">{{old('baocao_chuongtrinh_vi')}}</textarea>
      </div>

      <div class="col-lg-6 col-md-6 col-xs-12">
        <b class="ten2x">Danh sách báo cáo (EN)</b>
        <textarea name="baocao_chuongtrinh_en" id="tiny9" class="form-control" placeholder="Nhập vào danh sách các báo cáo (nếu có) bằng tiếng Anh">{{old('baocao_chuongtrinh_en')}}</textarea>
      </div>  
    </div>
<br>
<div class="row">
  <div class="col-lg-6 col-md-6 col-xs-12">
      <b class="ten2x">Thành phần tham dự (VI)</b>
      <textarea class="form-control" name="thanhphan_thamdu_vi" id="tiny10" placeholder="Nhập vào danh sách các thành phần tham dự hoạt động bằng tiếng Việt">{{old('thanhphan_thamdu_vi')}}</textarea>
  </div>
  <div class="col-lg-6 col-md-6 col-xs-12">
      <b class="ten2x">Thành phần tham dự (EN)</b>
      <textarea class="form-control" name="thanhphan_thamdu_en" id="tiny11" placeholder="Nhập vào danh sách các thành phần tham dự hoạt động bằng tiếng Anh">{{old('thanhphan_thamdu_en')}}</textarea>
  </div>
</div>
<br>
<input type="submit" value="Lưu" class="btn btn-success btn2" />
<a href="set_admin/tintuc/list"><input type="button" value="Thoát"  class="btn btn-danger btn2"/></a>
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
 <input type="hidden" name="hinhanh" id="hinhanh">
</form>
  </div>
</div>

@endsection
