@extends('Admin.Master')
@section('title','Thêm phân công chủ nhiệm')
@section('content') 

<div class="h3 padding20 text-center">Thêm phân công chủ nhiệm</div>
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
        <div class="alert alert-warning">
            {{session('thongbao')}}
        </div>
     @endif
</div>
<div class="box">
<form name="" method="post" action="set_admin/phan-cong-chu-nhiem/add" enctype="multipart/form-data">
  <div class="box-body">
    <div class="row">  
    
      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <b class="ten2x">Bộ môn</b>
        <select name="bomon" id="bomon" class="form-control select2">
          <option value="">Chọn bộ môn</option>
          @foreach ($Bomon as $bm)
          <option value="{{$bm->id}}">{{$bm->ten_vi}}</option>
          @endforeach
        </select>
      </div>

      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <b class="ten2x">Lớp</b>
        <select name="id_lop" id="lop" class="form-control select2" required>
          <option value="">Chọn lớp</option>
          @foreach ($Lop as $L)
          <option value="{{$L->id}}">{{$L->malop}}-{{$L->tenlop}}</option>
          @endforeach
        </select>
      </div>  
  
      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <b class="ten2x">Giảng viên</b>
        <select name="id_giangvien" id="giangvien" class="form-control select2" required>
          <option value="">Chọn giảng viên</option>
          @foreach ($Giangvien as $gv)
          <option value="{{$gv->id}}">{{$gv->ten}}  ({{$gv->bomon->ten_vi}})</option>
          @endforeach
        </select>
      </div> 

      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <b class="ten2x">Ghi chú</b>
        <input type="text" class="form-control" name="ghichu" value="{{old('ghichu')}}">
      </div>

    </div>
  </div>
  
<input type="submit" value="Lưu" class="btn btn-success btn2" />
<a href="set_admin/phan-cong-chu-nhiem/list/0"><input type="button" value="Thoát"  class="btn btn-danger btn2" /></a>
<input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
</div>
@endsection

@section('script')
  <script type="text/javascript">
      $(document).on('change','#bomon',function(){
        var id = $(this).val();
        $.get("set_admin/ajax/loadlop/"+id,function(data){
            $('#lop').html(data);
        });

        $.get("set_admin/ajax/loadgiangvien/"+id,function(data){
            $('#giangvien').html(data);
        });
      });
  </script>
@endsection