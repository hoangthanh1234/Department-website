@extends('Admin.Master')
@section('title',' thêm kết quả thi mới')
@section('content') 

<div class="h3 padding20 text-center">Thêm kết quả thi mới</div>
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
<form name="" method="post" action="set_admin/ketquathi/add" enctype="multipart/form-data">
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
                            <option value="">Chọn bộ môn</option>
                              @foreach ($Bomon as $BM)
                              <option value="{{$BM->id}}">{{$BM->ten_vi}}</option>
                              @endforeach
                          </select>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                         <b class="ten2x">Lớp</b>
                          <select name="id_lop" id="id_lop" class="form-control select2" required>
                             <option value="">Chọn lớp</option>
                              @foreach ($Lop as $L)
                              <option value="{{$L->id}}">{{$L->malop}}-{{$L->tenlop}}</option>
                              @endforeach
                          </select>
                    </div>                    
                    <div class="col-lg-12 col-md-12" style="margin-top:20px;">
                           <div class="form-group">
                                <div class="btn btn-default btn-file">
                                  <i class="fa fa-paperclip"></i> Chọn tệp
                                  <input type="file" name="files[]" multiple>
                                </div>
                           </div>
                    </div>                   
                </div>
                <br>                                                  
            </div> 
        </div>
      <input type="submit" value="Lưu" class="btn btn-success btn2" />
      <a href="set_admin/ketquathi/list/0"><input type="button" value="Thoát"  class="btn btn-danger btn2" /></a>
  </div><!---END #tabs--> 
</div>
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
@endsection
@section('script')
<script type="text/javascript">
$(document).on('change', '#bomon', function(){
  var id_bomon=$(this).val();              
  $.get("set_admin/ajax/loadlop/"+id_bomon,function(data){
    $('#id_lop').html(data);
  });      
});
</script>
@endsection