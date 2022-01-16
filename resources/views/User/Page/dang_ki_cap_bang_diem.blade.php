@extends('User.Index')
@section('title')
	Xin cấp bảng điểm 
@endsection
@section('content')
<div class="nonedesktop">@include('User.Layout.MenuMobi')</div>
<div class="nonepad nonephone">@include('User.Layout.Banner') @include('User.Layout.Menu')</div>

<section class="container-fluid">	
    <div class="container">
        <p style="text-align: center">
            @if (Session::has('language') && Session::get('language')=='en')
                REGISTRATION FORM FOR TRANSCRIPT
            @else
                
                PHIẾU ĐĂNG KÍ CẤP BẢNG ĐIỂM RÈN LUYỆN TRỰC TUYẾN
            @endif
        </p>
        @if (session::has('thongbao'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Thông báo!</h5>
                {{ session::get('thongbao') }}
            </div>
        @endif
        <div class="container-fluid">
            <form action="{{ asset('/sinh-vien-set/dang-ki-bang-diem.html') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">
                            @if (Session::has('language') && Session::get('language')=='en')
                                Student ID:
                            @else
                                Mã số sinh viên:
                            @endif
                        </label>
                        <input type="text" name="maSV" pattern="[0-9]{9}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">
                            @if (Session::has('language') && Session::get('language')=='en')
                                Class ID:
                            @else
                                Mã lớp:
                            @endif
                        </label>
                        <input type="text" name="maLop" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">
                            @if (Session::has('language') && Session::get('language')=='en')
                                Student's name:
                            @else
                                Họ tên:
                            @endif
                        </label>
                        <input type="text" name="hoTen" class="form-control" required>
                    </div>
    
                    <div class="form-group">
                        <label for="">
                            @if (Session::has('language') && Session::get('language')=='en')
                                Phone number:
                            @else
                                Số điện thoại:
                            @endif
                        </label>
                        <input type="text" name="sdt" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">
                            @if (Session::has('language') && Session::get('language')=='en')
                                Email:
                            @else
                                Email:
                            @endif
                        </label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="">
                            
                            @if (Session::has('language') && Session::get('language')=='en')
                                Semester:
                            @else
                                Học kỳ xin bảng điểm rèn luyện:
                            @endif
                    </label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="hocKi" id="flexRadioDefault1" value="1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            @if (Session::has('language') && Session::get('language')=='en')
                               One nearest semester:
                            @else
                                Học kỳ gần nhất:
                            @endif
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="hocKi" id="flexRadioDefault2" value="2" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            @if (Session::has('language') && Session::get('language')=='en')
                                Two nearest semesters:
                            @else
                                2 Học kỳ gần nhất:
                            @endif
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="hocKi" id="flexRadioDefault2" value="3" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            @if (Session::has('language') && Session::get('language')=='en')
                                All accademic year:
                            @else
                                Cả năm:
                            @endif
                        </label>
                      </div>
                      <div class="form-group">
                          <label for="">
                            @if (Session::has('language') && Session::get('language')=='en')
                                Year:
                            @else
                                Năm học:
                            @endif
                          </label>
                          @if (Session::has('language') && Session::get('language')=='en')
                            <input class="form-control" name="namHoc" placeholder="(Ex: 2020-2021)" required>
                            @else
                            <input class="form-control" name="namHoc" placeholder="(VD: 2020-2021)" required>
                            @endif
                           
                      </div>
                      <div class="form-group">
                        <label for="">
                          @if (Session::has('language') && Session::get('language')=='en')
                              Reason:
                              
                          @else
                              Lý do xin cấp:
                              
                          @endif
                        </label>
                         @if (Session::has('language') && Session::get('language')=='en')
                         <input class="form-control" name="lyDo" placeholder="(Ex: For scholarship, Student of 5 merits)" required>
                         @else
                         <input class="form-control" name="lyDo" placeholder="(VD: Xin học bổng, Xét Sinh viên 5 tốt)" required> 
                         @endif
                    </div>
                    <div class="form-group">
                        @if (Session::has('language') && Session::get('language')=='en')
                        <i>(Note: If you need a hard printer, you should make a phone call to mrs Ha, phone number: 0987888561)</i>
                          @else
                          <i>(Ghi chú: Nếu cần bảng điểm scan, liên hệ SĐT hoặc zalo cô Hà: 0987888561)</i>
                          @endif
                       
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit">
                        @if (Session::has('language') && Session::get('language')=='en')
                              Save
                        @else
                              Lưu
                        @endif
                    </button>
                    <button class="btn btn-secondary" type="reset">
                        @if (Session::has('language') && Session::get('language')=='en')
                              Cancel
                        @else
                              Hủy
                        @endif
                    </button>
                </div>
            </form>
            
        </div>
    </div>
</section>
@endsection	