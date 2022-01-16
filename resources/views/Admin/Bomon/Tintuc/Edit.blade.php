@extends('Admin.Master')
@section('title',' thêm tin tức')
@section('content') 

<div class="h3 padding20 text-center">Cập nhật tin tức</div>
<div class="container">
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
<form name="" method="post" action="set_bomon/tintuc/edit/{{$Tintuc->id}}" enctype="multipart/form-data">
      	<div class="container-fluid">   
      				
		<div id="tabs">   

        <div class="row">
              <div class="col-lg-2 colmd-2 col-sm-3 col-xs-4"><b class="ten2x">Chọn hình</b></div>
              <div class="col-lg-9 col-md-9 col-sm-9 col-xs-8"><input type="file" name="hinhanh"></div>
              <div class="clearfix"></div>
              <p style="padding-left:20px;padding-top:10px;">hỗ trợ file jpg, png,jpeg</p>
          </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
            <b class="ten2x">Danh mục</b><br>
              <select name="id_cate" class="form-control width50 select2">                
                @foreach($Dm_tintuc as $cate)
                  <option value="{{$cate->id}}" @if($cate->id==$Tintuc->id_cate) selected @endif>{{$cate->ten_vi}}</option>
                @endforeach           
              </select>
          </div>

          <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
              <b class="ten2x">Loại bài viết</b>  
              <select name="loaibv" class="form-control  width50"> 
                  <option value="1" @if($Tintuc->tintuc==1) selected @endif>Tin tức</option>
                  <option value="0" @if($Tintuc->tintuc==0) selected @endif>Sự kiện</option>     
              </select>
          </div>  
        </div>   
        <br>
        <div class="row">
          <div class="col-lg-6 col-md-6 col-xs-12">       
            <b class="ten2x">Vai trò</b>
            <select class="form-control" name="vaitro">
                <option value="0" @if($Tintuc->vaitro == 0) selected @endif>Tham gia</option>
                <option value="1" @if($Tintuc->vaitro == 1) selected @endif>Tham dự</option>
            </select>
          </div>
          
          <div class="col-lg-6 col-md-6 col-xs-12">
            <b class="ten2x">Ngày tham gia, tham dự</b>
            <div class="input-group date">
              <input type="text" name="ngay" class="form-control datepicker"  value="{{date('d/m/Y', strtotime($Tintuc->ngay))}}"  placeholder="Ngày tham gia / tham dự">
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
                  <input type="text" name="ten_vi"  class="form-control" value="{{$Tintuc->ten_vi}}" />
                  <br/>

                  <b class="ten2x">Mô tả</b>
                  <textarea name="mota_vi" id="tiny">{{$Tintuc->mota_vi}}</textarea>
                  <br/>

                  <b class="ten2x">Nội dung</b>
                  <textarea name="noidung_vi" id="tiny1">{{$Tintuc->noidung_vi}}</textarea>
                  <br/>
                  
                  <b class="ten2x">Bài học kinh nghiệm (VI)</b>
                  <textarea class="form-control" id="tiny2" name="baihoc_kinhnghiem_vi">{{$Tintuc->baihoc_kinhnghiem_vi}}</textarea>
                  <br/>

                  <b class="ten2x">Nội dung phối hợp (VI)</b>
                  <textarea class="form-control" id="tiny3" name="noidung_phoihop_vi">{{$Tintuc->noidung_phoihop_vi}}</textarea>
                  <br>

                  <b class="ten2x">Đầu mối liên hệ (VI)</b>
                  <textarea class="form-control" id="tiny4" name="daumoi_lienhe_vi">{{$Tintuc->daumoi_lienhe_vi}}</textarea>
                  <br>

                  <b class="ten2x">Đặt câu hỏi (VI)</b>
                  <textarea class="form-control" name="dat_cauhoi_vi" id="tiny5">{{$Tintuc->dat_cauhoi_vi}}</textarea>
                  <br>

                  <b class="ten2x">Danh sách báo cáo (VI)</b>
                  <textarea name="baocao_chuongtrinh_vi" id="tiny6" class="form-control">{{$Tintuc->baocao_chuongtrinh_vi}}</textarea>
                  <br>

                  <b class="ten2x">Thành phần tham dự (VI)</b>
                  <textarea class="form-control" name="thanhphan_thamdu_vi" id="tiny7">{{$Tintuc->thanhphan_thamdu_vi}}</textarea>
                  <br>               

                  <b class="ten2x">Title</b>
                  <input type="text" name="title_vi" class="form-control" value="{{$Tintuc->title_vi}}"/>
                  <br/>             

                  <b class="ten2x">Description</b>
                  <input type="text" name="description_vi"  class="form-control" value="{{$Tintuc->description_vi}}"/>
                  <br/>
            </div> 
            
            <div id="tab2">
            	    <b class="ten2x">Tiêu đề</b>
                 <input type="text" name="ten_en" class="form-control" value="{{$Tintuc->ten_en}}"/>
                 <br/>

                 <b class="ten2x">Mô tả</b>
                 <textarea name="mota_en" id="tiny8">{{$Tintuc->mota_en}}</textarea>
                 <br/>

                 <b class="ten2x">Nội dung</b>
                 <textarea name="noidung_en" id="tiny9">{{$Tintuc->noidung_en}}</textarea>
                 <br/>

                  <b class="ten2x">Bài học kinh nghiệm</b>
                  <textarea class="form-control" id="tiny10" name="baihoc_kinhnghiem_en">{{$Tintuc->baihoc_kinhnghiem_en}}</textarea>
                  <br/>

                  <b class="ten2x">Nội dung phối hợp</b>
                  <textarea class="form-control" id="tiny11" name="noidung_phoihop_en">{{$Tintuc->noidung_phoihop_en}}</textarea>
                  <br>

                  <b class="ten2x">Đầu mối liên hệ</b>
                  <textarea class="form-control" id="tiny12" name="daumoi_lienhe_en">{{$Tintuc->daumoi_lienhe_en}}</textarea>
                  <br>

                  <b class="ten2x">Đặt câu hỏi</b>
                  <textarea class="form-control" name="dat_cauhoi_en" id="tiny13">{{$Tintuc->dat_cauhoi_en}}</textarea>
                  <br>

                  <b class="ten2x">Danh sách báo cáo</b>
                  <textarea name="baocao_chuongtrinh_en" id="tiny14" class="form-control">{{$Tintuc->baocao_chuongtrinh_en}}</textarea>
                  <br>

                  <b class="ten2x">Thành phần tham dự</b>
                  <textarea class="form-control" name="thanhphan_thamdu_en" id="tiny15">{{$Tintuc->thanhphan_thamdu_en}}</textarea>
                  <br>             

                 <b class="ten2x">Title</b>
                 <input type="text" name="title_en" class="form-control" value="{{$Tintuc->title_en}}"/>
                 <br/>        

                 <b class="ten2x">Description</b>
                 <input type="text" name="description_en" class="form-control" value="{{$Tintuc->description_en}}"/>
                 <br/>
            </div> 


        </div>

        	
		   
			<input type="submit" value="Lưu" class="btn btn-success btn2"/>
			<a href="set_bomon/tintuc/list"><input type="button" value="Thoát"  class="btn btn-danger btn2" /></a>

	</div><!---END #tabs-->	
</div>
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
 <input type="hidden" name="hinhanh" id="hinhanh" value="{{$Tintuc->hinhanh}}">
</form>
  @endsection

  @section('script')    
    <script type="text/javascript"> 

    $(document).ready(function(){
       html = '<img src="ht96_image/news/{{$Tintuc->hinhanh}}" style="max-width:100%"/>';
       $("#upload-demo-i").html(html);
    }); 

    $('.upload-result').on('click',function (ev) {
          $uploadCrop.croppie('result', {
              type: 'canvas',
              size: 'viewport'
          }).then(function (resp) {
            var fd=$('input[type=file]').val().replace(/C:\\fakepath\\/i, '');
             $.ajax({
                    url: "ht96_ajax/ajaxpro.php",
                    type: "Tintuc",
                    data: {"image":resp,"dir":"../ht96_image/news/","name":fd},
                    success: function (string) {
                           var getData = $.parseJSON(string);   
                           var result = getData.name;
                           var tus = getData.tus;
                            alert(tus);
                           $("#hinhanh").val(result);
                          html = '<img src="' + resp + '" />';
                          $("#upload-demo-i").html(html);
                    }
              });
          });
    });    
</script>
@endsection