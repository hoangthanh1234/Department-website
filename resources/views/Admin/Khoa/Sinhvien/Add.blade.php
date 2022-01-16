@extends('Admin.Master')
@section('title',' thêm sinh viên mới')
@section('content') 

<div class="h3 padding20 text-center">Thêm sinh viên mới</div>
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
<form name="" method="post" action="set_admin/sinhvien/add" enctype="multipart/form-data">
<div class="container-fluid">
	<div id="tabs"> 
	<ul id="ultabs">				 
	  <li type="#tab1" class="ten2x">Thông tin</li>	                                         
	</ul>
  <div class="clearfix"></div>                        
    <div id="content_tabs">               
      <div id="tab1">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <b class="ten2x">Bộ môn</b>
            <select id="bomon" class="form-control select2">
              <option value="0">Chọn bộ môn</option>
              @foreach ($Bomon as $BM)
              <option value="{{$BM->id}}">{{$BM->ten_vi}}</option>
              @endforeach
            </select>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <b class="ten2x">Lớp</b>
            <select name="id_lop" id="id_lop" class="form-control select2" required>
              <option value="" data-val="tenlop" id="lop0">Chọn lớp</option>
              @foreach ($Lop as $L)
              <option value="{{$L->id}}" data-val="{{$L->tenlop}}" id="lop{{$L->id}}">{{$L->malop}}-{{$L->tenlop}}</option>
               @endforeach
            </select>
          </div>                    
        </div><br>
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <b class="ten2x">Mã sinh viên</b><input type="text" name="ma" id="masv" value="{{ old('ma') }}"  placeholder="nhập mã sinh viên" class="form-control" /><br/>
          </div>                    
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <b class="ten2x">Tên sinh viên</b><input type="text" name="ten" value="{{ old('ten') }}"  placeholder="Nhập tên sinh viên" class="form-control" /><br/>
          </div>                      
        </div>
        <div class="row">   
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <b class="ten2x">Giới tính</b>
            <select name="gioitinh" class="form-control">
              <option value="1">Nam</option>
              <option value="0">Nữ</option>
            </select><br/>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <b class="ten2x">Ngày Sinh</b><input type="text" name="ngaysinh" value="{{date('d/m/Y', strtotime(Carbon\Carbon::now()))}}" placeholder="Ngày sinh"  class="form-control datepicker" /><br/>
          </div>
        </div>

        <div class="row"> 
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <b class="ten2x">Nơi sinh</b><input type="text" name="noisinh" value="{{ old('noisinh') }}" placeholder="Nhập nơi sinh"   class="form-control" /><br/>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <b class="ten2x">Điện thoại</b><input type="text" name="dienthoai" value="{{ old('dienthoai') }}" placeholder="Nhập số điện thoại"  class="form-control" /><br/>
          </div>
         </div>
       <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <b class="ten2x">Địa chỉ</b><input type="text" name="diachi" value="{{ old('diachi') }}" placeholder="Nhâp địa chỉ"  class="form-control" /><br/>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <b class="ten2x">E-mail</b><input type="text" name="email" id="email" value="{{ old('email') }}" placeholder="Nhập E-mail"  class="form-control" />
          </div>
        </div>                	                  
      </div> 
    </div>		   
	<input type="submit" value="Lưu" class="btn btn-success btn2" />
  <input type="button" class="btn btn-success" value="Nhập từ file Excel" id="import" name="" style="margin-top:5px;">
	<a href="set_admin/sinhvien/list/0"><input type="button" value="Thoát"  class="btn btn-danger btn2" /></a>
</div><!---END #tabs-->	
</div>
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
<div class="modal fade" id="uploadexcel" role="dialog">
  <div class="modal-dialog modal-md"> 
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title ten2x">THÊM SINH  VIÊN TỬ FILE EXCEL</h4>
      </div>
  <div class="modal-body">
      <div class="row">        
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
              <span id="tenlopm" style="font-size:18px;"></span>
              <input type="file"  id="file" name="">
              <input type="hidden" id="malopm" name="">
            </div>
          </div>
      </div>
  </div>    
  <div class="modal-footer">
      <button type="button" class="btn btn-success" id="btn-luu">Lưu</button>
      <button type="button" class="btn btn-danger" data-dismiss="modal">Đống</button>
  </div>
  </div>
  </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
$(document).on('change', '#bomon', function(){               
  var id_bomon=$(this).val();              
  $.get("set_admin/ajax/loadlop/"+id_bomon,function(data){
    $('#id_lop').html(data);
  });      
});

$(document).on('change', '#masv', function(){               
  var email=$(this).val()+"@sv.tvu.edu.vn";              
  $('#email').val(email);      
});

$(document).on('click','#import',function(){
  var id=$('#id_lop').val();
  var tenlop=$('#lop'+id).data('val');
  if(id==0){alert('Vui lòng chọn lớp');return false;}
  $('#tenlopm').html(tenlop);
  $('#malopm').val(id);           
 $('#uploadexcel').modal();
});

$(document).on('click','#btn-luu',function(){
  var ten=$('#tenlopm').html();
  var idlop=$('#malopm').val();
  var xacnhan = confirm("Bạn có chắc muốn Import danh sách sinh viên từ file Excel cho lớp "+ten);
  if(xacnhan == true){
    var file_data = $('#file').prop('files')[0];   
    var form_data = new FormData();
      form_data.append('file', file_data);
      form_data.append('id_lop', idlop);                     
      form_data.append('_token', token);
      $(this).html("Đang xử lý");
      $.ajax({
            url: 'set_admin/Excel/importsinhvien', // point to server-side PHP script
            data:form_data,
            type: 'POST',
            contentType: false, // The content type used when sending data to the server.
            cache: false, // To unable request pages to be cached
            processData: false,
            success: function(data){
              alert(data);window.location.reload();
            }
          });  
  } 
});   
</script>
@endsection