@extends('Admin.Master')
@section('title',' Thêm tin tức')
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
<form name="" method="post" action="set_bomon/tintuc/add" enctype="multipart/form-data">
      	<div class="container-fluid">   
      				
		<div id="tabs">
         <div class="row">
          <div class="col-lg-12 col-md-12 col-xs-12">
              <b class="ten2x">Chọn hình</b>
              <input type="file" name="hinhanh" required class="btn btn-primary form-control">
              <p >Hình ảnh phải có Backdrop và chỉ hỗ trợ file png, jpg, jpeg (Xem định nghĩa backdrop  <a target="_blank" href="https://www.google.com/search?source=hp&ei=_q4uXPf_D4y58QXmyafQCw&q=backdrop+l%C3%A0+g%C3%AC&btnK=T%C3%ACm+v%E1%BB%9Bi+Google&oq=backdrop&gs_l=psy-ab.3.0.35i39j0i131j0l8.940.1854..3473...0.0..0.365.810.0j2j1j1......0....1..gws-wiz.eCxykwbSS5Y">Tại đây</a>)</p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
            <b class="ten2x">Danh mục</b><br> 
              <select name="id_cate" class="form-control width50 select2">                
                @foreach($Dm_tintuc as $cate)
                  <option value="{{$cate->id}}">{{$cate->ten_vi}}</option>
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
	        <ul id="ultabs">				 
	            <li type="#tab1" class="ten2x">Thông tin (VI)</li>
	            <li type="#tab2" class="ten2x">Thông tin (EN)</li>                                          
	        </ul>
        <div class="clearfix"></div>
                        
        <div id="content_tabs">               
            <div id="tab1">
            	    <b class="ten2x">Tiêu đề</b>
                  <input type="text" name="ten_vi"  class="form-control" value="{{old('ten_vi')}}" />
                  <br/>

                  <b class="ten2x">Mô tả</b>
                  <textarea name="mota_vi" id="tiny">{{old('mota_vi')}}</textarea>
                  <br/>

                  <b class="ten2x">Nội dung</b>
                  <textarea name="noidung_vi" id="tiny1">{{old('noidung_vi')}}</textarea>
                  <br/>
                  
                  <b class="ten2x">Bài học kinh nghiệm (VI)</b>
                  <textarea class="form-control" id="tiny2" name="baihoc_kinhnghiem_vi">{{old('baihoc_kinhnghiem_vi')}}</textarea>
                  <br/>

                  <b class="ten2x">Nội dung phối hợp (VI)</b>
                  <textarea class="form-control" id="tiny3" name="noidung_phoihop_vi">{{old('noidung_phoihop_vi')}}</textarea>
                  <br>

                  <b class="ten2x">Đầu mối liên hệ (VI)</b>
                  <textarea class="form-control" id="tiny4" name="daumoi_lienhe_vi">{{old('daumoi_lienhe_vi')}}</textarea>
                  <br>

                  <b class="ten2x">Đặt câu hỏi (VI)</b>
                  <textarea class="form-control" name="dat_cauhoi_vi" id="tiny5">{{old('dat_cauhoi_vi')}}</textarea>
                  <br>

                  <b class="ten2x">Danh sách báo cáo (VI)</b>
                  <textarea name="baocao_chuongtrinh_vi" id="tiny6" class="form-control">{{old('baocao_chuongtrinh_vi')}}</textarea>
                  <br>

                  <b class="ten2x">Thành phần tham dự (VI)</b>
                  <textarea class="form-control" name="thanhphan_thamdu_vi" id="tiny7">{{old('thanhphan_thamdu_vi')}}</textarea>
                  <br>               

                  <b class="ten2x">Title</b>
                  <input type="text" name="title_vi" class="form-control" value="{{old('title_vi')}}"/>
                  <br/>             

                  <b class="ten2x">Description</b>
                  <input type="text" name="description_vi"  class="form-control" value="{{old('description_vi')}}"/>
                  <br/>
            </div> 
            
            <div id="tab2">
            	    <b class="ten2x">Tiêu đề</b>
                 <input type="text" name="ten_en" class="form-control" value="{{old('ten_en')}}"/>
                 <br/>

                 <b class="ten2x">Mô tả</b>
                 <textarea name="mota_en" id="tiny8">{{old('mota_en')}}</textarea>
                 <br/>

                 <b class="ten2x">Nội dung</b>
                 <textarea name="noidung_en" id="tiny9">{{old('noidung_en')}}</textarea>
                 <br/>

                  <b class="ten2x">Bài học kinh nghiệm</b>
                  <textarea class="form-control" id="tiny10" name="baihoc_kinhnghiem_en">{{old('baihoc_kinhnghiem_en')}}</textarea>
                  <br/>

                  <b class="ten2x">Nội dung phối hợp</b>
                  <textarea class="form-control" id="tiny11" name="noidung_phoihop_en">{{old('noidung_phoihop_en')}}</textarea>
                  <br>

                  <b class="ten2x">Đầu mối liên hệ</b>
                  <textarea class="form-control" id="tiny12" name="daumoi_lienhe_en">{{old('daumoi_lienhe_en')}}</textarea>
                  <br>

                  <b class="ten2x">Đặt câu hỏi</b>
                  <textarea class="form-control" name="dat_cauhoi_en" id="tiny13">{{old('dat_cauhoi_en')}}</textarea>
                  <br>

                  <b class="ten2x">Danh sách báo cáo</b>
                  <textarea name="baocao_chuongtrinh_en" id="tiny14" class="form-control">{{old('baocao_chuongtrinh_en')}}</textarea>
                  <br>

                  <b class="ten2x">Thành phần tham dự</b>
                  <textarea class="form-control" name="thanhphan_thamdu_en" id="tiny15">{{old('thanhphan_thamdu_en')}}</textarea>
                  <br>             

                 <b class="ten2x">Title</b>
                 <input type="text" name="title_en" class="form-control" value="{{old('title_en')}}"/>
                 <br/>        

                 <b class="ten2x">Description</b>
                 <input type="text" name="description_en" class="form-control" value="{{old('description_en')}}"/>
                 <br/>
            </div> 


        </div>

        			 
      	
			<input type="submit" value="Lưu" class="btn btn-success btn2" />
			<a href="set_bomon/tintuc/list"><input type="button" value="Thoát"  class="btn btn-danger btn2" /></a>

	</div><!---END #tabs-->	
</div>
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
 <input type="hidden" name="hinhanh" id="hinhanh">
</form>
@endsection
