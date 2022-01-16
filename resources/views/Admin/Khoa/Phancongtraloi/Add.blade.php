@extends('Admin.Master')
@section('title',' thêm Phân công trà lời câu hỏi mới')
@section('content')

<div class="h3 padding20 text-center">Thêm phân công trả lời câu hỏi câu hỏi mới</div>
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
<form name="" method="post" action="set_admin/phancongtraloi/add" enctype="multipart/form-data">
      	<div class="container-fluid">
		<div id="tabs">

       <div class="row" style="margin:20px 0;">
          <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12">
            <b class="ten2x">Danh sách bộ môn</b>
              <select id="bomon" class="form-control select2">
                <option value="0" class="text-center">------------------------------------- Chọn Bộ môn ------------------------------------- </option>
                @foreach($Bomon as $bm)
                  <option value="{{$bm->id}}">{{$bm->ten_vi}}</option>
                @endforeach
              </select>
        </div>

        </div>




	        <ul id="ultabs">
	            <li type="#tab1" class="ten2x">Thông tin phân công</li>
	        </ul>
        <div class="clearfix"></div>

        <div id="content_tabs">
            <div id="tab1">
              <div class="row">

                <div class="col-lg-4 col-md-4 col-xs-12">
                    <b class="ten2x">Giảng viên trả lời</b><br>
                  <select id="giangvien" name="id_giangvien" class="form-control select2">
                      @foreach($Giangvien as $GV)
                        <option value="{{$GV->id}}">{{$GV->ten}}</option>
                      @endforeach
                  </select>
                </div>

                <div class="col-lg-4 col-md-4 col-xs-12">
                  <b class="ten2x">Chủ đề câu hỏi</b>
                  <select id="chude" name="id_chude" class="form-control select2">
                      @foreach($Chude as $CD)
                        <option value="{{$CD->id}}">{{$CD->ten_vi}}</option>
                      @endforeach
                  </select>
                </div>

                  <div class="col-lg-4 col-md-4 col-xs-12">
                    <b class="ten2x">Dường Dây Nóng</b>
                    <select id="chude" name="ddn" class="form-control select2">
                          <option value="1">Có</option>
                          <option value="0">Không</option>
                    </select>
                </div>

            </div>
        </div>
<br>
			<input type="submit" value="Lưu" class="btn btn-success btn2" />
			<a href="set_admin/phancongtraloi/list"><input type="button" value="Thoát"  class="btn btn-danger btn2" /></a>

	</div><!---END #tabs-->
</div>
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
  @endsection

  @section('script')

  <script type="text/javascript">
      $(document).on('change','#bomon',function(){
        var id_bomon=$(this).val();
        $.get("set_admin/ajax/loadgiangvien/"+id_bomon,function(data){
            $('#giangvien').html(data);
        });

      });
  </script>


  @endsection
