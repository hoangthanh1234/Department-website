@extends('Admin.Master')
@section('title',' cập nhậtphân công trả lời câu hỏi')
@section('content')

<div class="h3 padding20 text-center">Cập nhật phân công trả lời câu hỏi</div>

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

<form  method="post" action="set_admin/phancongtraloi/edit/{{$Phancongtraloi->id}}" enctype="multipart/form-data">
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
            <div class="row">
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <b class="ten2x">Giảng viên trả lời</b><br>
                  <select id="giangvien" name="id_giangvien" class="form-control select2">
                      @foreach($Giangvien as $GV)
                        <option value="{{$GV->id}}" @if($GV->id==$Phancongtraloi->id_giangvien) selected @endif>{{$GV->ten}}</option>
                      @endforeach
                  </select>
                </div>

                <div class="col-lg-4 col-md-4 col-xs-12">
                  <b class="ten2x">Chủ đề câu hỏi</b>
                  <select id="chude" name="id_chude" class="form-control select2">
                      @foreach($Chude as $CD)
                        <option value="{{$CD->id}}" @if($CD->id==$Phancongtraloi->id_chude) selected @endif>{{$CD->ten_vi}}</option>
                      @endforeach
                  </select>
                </div>

                <div class="col-lg-4 col-md-4 col-xs-12">
                  <b class="ten2x">Dường Dây Nóng</b>
                  <select id="chude" name="ddn" class="form-control select2">
                        <option value="1" @if($Phancongtraloi->hotline == 1) selected @endif>Có</option>
                        <option value="0" @if($Phancongtraloi->hotline == 0) selected @endif>Không</option>
                  </select>
                </div>

              </div>
        </div>

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
