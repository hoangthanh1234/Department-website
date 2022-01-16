@extends('Admin.Master')
@section('title',' thêm tin tức')
@section('content') 

<div class="h3 padding20 text-center">Cập nhật thông báo</div>
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
<form name="" method="post" action="set_admin/thongbao/edit/{{$Thongbao->id}}" enctype="multipart/form-data">
      	<div class="container-fluid">   
      				
		<div id="tabs">   


        <div class="row" style="margin:20px 0;">
          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <b class="ten2x">Danh mục</b>  
              <select name="id_danhmuc" class="form-control select2">               
                @foreach($Danhmuc as $dm)
                  <option value="{{$dm->id}}" @if($dm->id==$Thongbao->id_danhmuc) selected @endif>{{$dm->ten_vi}}</option>
                @endforeach           
              </select>
          </div>

          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
              <b class="ten2x">Bộ môn</b>  
              <select name="id_bomon" class="form-control select2">               
                @foreach($Bomon as $bm)
                  <option value="{{$bm->id}}" @if($bm->id==$Thongbao->id_bomon) selected @endif>{{$bm->ten_vi}}</option>
                @endforeach           
              </select>
          </div> 
                   
        </div>   


	        <ul id="ultabs">				 
	            <li type="#tab1" class="ten2x">Thông tin (VI)</li>
	            <li type="#tab2" class="ten2x">Thông tin (EN)</li>
	        </ul>
        <div class="clearfix"></div>
                        
        <div id="content_tabs">               
            <div id="tab1">
            	    <b class="ten2x">Tiêu đề</b><input type="text" name="ten_vi" value="{{$Thongbao->ten_vi}}" class="form-control" /><br/>
                  <b class="ten2x">Mô tả</b><br/><textarea name="mota_vi"  id="tiny">{{$Thongbao->mota_vi}}</textarea><br/>
                  <b class="ten2x">Nội dung</b><br/><textarea name="noidung_vi"  id="tiny2">{{$Thongbao->noidung_vi}}</textarea><br/>
                  <b class="ten2x">Title</b><input type="text" name="title_vi" value="{{$Thongbao->title_vi}}" class="form-control" /><br/>
                  <b class="ten2x">Description</b><input type="text" name="description_vi" value="{{$Thongbao->description_vi}}" class="form-control"/><br/>
            </div> 
            
            <div id="tab2">
            	   <b class="ten2x">Tiêu đề</b><input type="text" name="ten_en" value="{{$Thongbao->ten_en}}"  class="form-control" /><br/>
                 <b class="ten2x">Mô tả</b><br/><textarea name="mota_en"  id="tiny1">{{$Thongbao->mota_en}}</textarea><br/>
                 <b class="ten2x">Nội dung</b><br/><textarea name="noidung_en" id="tiny3">{{$Thongbao->noidung_en}}</textarea><br/>
                 <b class="ten2x">Title</b><input type="text" name="title_en" value="{{$Thongbao->title_en}}" class="form-control" /><br/>                	
                 <b class="ten2x">Description</b><input type="text" name="description_en" value="{{$Thongbao->description_en}}" class="form-control"/><br/>
            </div>
        </div>

        	
		    
			<input type="submit" value="Lưu" class="btn btn-success btn2" />
			<a href="set_admin/thongbao/list/{{$Thongbao->id_bomon}}"><input type="button" value="Thoát"  class="btn btn-danger btn2" /></a>

	</div><!---END #tabs-->	
</div>
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
 <input type="hidden" name="hinhanh" id="hinhanh" value="{{$Thongbao->hinhanh}}">
</form>
  @endsection

  @section('script')    
    <script type="text/javascript"> 

    $(document).ready(function(){
       html = '<img src="ht96_image/thongbao/{{$Thongbao->hinhanh}}" style="max-width:100%"/>';
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
                    type: "POST",
                    data: {"image":resp,"dir":"../ht96_image/thongbao/","name":fd},
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