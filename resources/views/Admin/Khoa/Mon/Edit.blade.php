@extends('Admin.Master')
@section('title',' cập nhật môn học')
@section('content') 

<div class="h3 padding20 text-center">Cập nhật môn học</div>
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
      <div class="alert alert-success">
         {{session('thongbao')}}
      </div>
   @endif
</div>
<form name="" method="post" action="{{ asset('set_admin/mon/edit/'.$Moncontent->id) }}" enctype="multipart/form-data">
      <div class="container-fluid">   
     
 

  <div id="tabs">  

         <div class="row">

          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <b class="ten2x">Bật đào tạo</b>
            <select name="id_bacdaotao" class="form-control width50">
              @foreach ($Bacdaotao as $Bac)
                <option value="{{$Bac->id}}" @if ($Bac->id==$Moncontent->id_bacdaotao) selected @endif>{{$Bac->ten_vi}}</option>
               @endforeach
           </select>
          </div>

          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <b class="ten2x">Bộ Môn</b>
            <select name="id_bomon" id="id_bomon" class="form-control width50">
              @foreach ($Bomon as $BM)
                <option value="{{$BM->id}}" @if ($BM->id==$Moncontent->id_bomon) selected @endif>{{$BM->ten_vi}}</option>
              @endforeach
            </select>
          </div>

           <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
              <b class="ten2x">Chuyên ngành</b>
              <select name="id_chuyennganh" id="id_chuyennganh"  class="form-control width50">
                @foreach ($Chuyennganh as $cn)
                  <option value="{{$cn->id}}" @if($cn->id == $Moncontent->id_chuyennganh) selected @endif>{{$cn->ten_vi}}</option>
                @endforeach
              </select>
            </div>  
        </div>

        <br>


        <ul id="ultabs">         
            <li type="#tab1" class="ten2x">Thông tin (VI)</li>
            <li type="#tab2" class="ten2x">Thông tin (EN)</li> 
            <li type="#tab3" class="ten2x">Thông tin khác</li>  
        </ul>
      <div class="clearfix"></div>
                      
   <div id="content_tabs">               
     <div id="tab1">
        <b class="ten2x">Tên môn</b><input type="text" name="ten_vi" value="{{$Moncontent->ten_vi}}"  class="form-control" /><br/><b class="ten2x">Mã môn</b><input type="text" name="mamon" value="{{$Moncontent->mamon}}"  class="form-control" /><br/>
        <b class="ten2x">Số tín chỉ</b><input type="text" name="stc" value="{{$Moncontent->stc}}"  class="form-control"/><br/>
        <b class="ten2x">Lý thuyết</b><input type="text" name="lt" value="{{$Moncontent->lt}}"  class="form-control"/><br/>
        <b class="ten2x">Thực hành</b><input type="text" name="th" value="{{$Moncontent->th}}"  class="form-control"/><br/>
        <b class="ten2x">Mô tả</b><textarea id="tiny" name="mota_vi">{{$Moncontent->mota_vi}}</textarea><br/>
        <b class="ten2x">File đề cương</b> <a href="{{ asset($Moncontent->file) }}">Xem file</a>
        <b class="ten2x">Đề cương chi tiết</b><input type="file" name="files"  class="form-control"/><br/>
      </div> 
          
          <div id="tab2">
             <b class="ten2x">Tên môn</b><input type="text" name="ten_en" value="{{$Moncontent->ten_en}}" class="form-control" /><br/>
             <b class="ten2x">Mô tả</b><textarea id="tiny1" name="mota_en">{{$Moncontent->mota_en}}</textarea><br/>
          </div>  

          <div id="tab3">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                  <label class="ten2x">Môn Song Hành</label>
                    <select class="form-control select2" name="monsonghanh[]" multiple="multiple">
                      <?php $songhanh=explode(",",$Moncontent->songhanh);?>
                       @foreach ($Mon as $SH)
                          <option value="{{$SH->id}}" @if(in_array($SH->id,$songhanh) == TRUE) selected @endif>{{$SH->ten_vi}} ({{$SH->bacdaotao->ten_vi}})</option>
                       @endforeach
                    </select>
                </div>
              </div>  
              <br>
              <div class="row">
                <div class="col-lg-12 col-md-12">
                  <label class="ten2x">Môn Tiên quyết</label>
                   <?php $tienquyet=explode(",",$Moncontent->tienquyet);?>
                    <select class="form-control select2" name="montienquyet[]" multiple="multiple">
                       @foreach ($Mon as $TQ)
                          <option value="{{$TQ->id}}" @if(in_array($TQ->id,$tienquyet) == TRUE) selected @endif>{{$TQ->ten_vi}} ({{$TQ->bacdaotao->ten_vi}})</option>
                       @endforeach
                    </select>
                </div>
              </div> 


              <br>
              <div class="row">
                <div class="col-lg-12">
                    <label class="ten2x">Nhóm môn</label>
                    <select class="form-control select2" name="nhommon">
                      @foreach($Nhommon as $nm)
                        <option value="{{$nm->id}}" @if($nm->id == $Moncontent->id_nhommon) selected @endif>{{$nm->ten}}</option>
                      @endforeach
                    </select>
                </div>
              </div>    
              <br>

              <input type="checkbox" name="tuchon" class="flat-red" value="1" @if($Moncontent->tuchon == 1) checked @endif> <label class="ten2x">Môn tự chọn
</label>
          </div>                   

                    
      </div>

   
    <input type="submit" value="Lưu" class="btn btn-success btn2"/>
   <a href="set_admin/mon/list/0/0"> <input type="button" value="Thoát"  class="btn btn-danger btn2" /></a>

</div><!---END #tabs--> 
</div>
<input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
@endsection

@section('script')
  <script type="text/javascript">
      $(document).on('change','#id_bomon',function(){
          var id = $(this).val();
          $.ajax({
              url: "set_admin/ajax/loadchuyennganh/"+id,
              type: 'GET',
              dataType: 'html',  
              success: function(data){                      
                $('#id_chuyennganh').html(data);               
             },
              error: function(XMLHttpRequest, textStatus, errorThrown){                     
                  alert("Status: " + textStatus+": "+errorThrown+"!!!! Không thể thực hiện yêu cầu!!! Vui Lòng kiểm tra Lại");

              }

          });
      });
  </script>
@endsection