@extends('Admin.Master')
@section('title','danh sách cựu sinh viên')
@section('content')  
<div class="h3 padding20 text-center">Danh sách cựu sinh viên</div>
  <div class="box"> 
    <div class="row padding20" style="padding-bottom:0;">
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <b class="ten2x">Bộ môn</b><br>
        <select id="bomon" class="form-control select2">
          <option value="0">Chọn bộ môn</option>
          @foreach ($Bomon as $BM)
            <option value="{{$BM->id}}">{{$BM->ten_vi}}</option>
          @endforeach
        </select>
       </div>
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <b class="ten2x">Lớp</b><br>
        <select id="lop" class="form-control select2">
          <option value="0">Chọn lớp</option>
          @foreach ($Lop as $L)
          <option value="{{$L->id}}">{{$L->malop}} - {{$L->tenlop}}</option>
          @endforeach
        </select>
      </div>
    </div> 
    <div class="container" style="max-width:500px;margin-top:20px;">
      @if(session('thongbao'))
        <div class="alert alert-success">
          {{session('thongbao')}}
        </div>
      @endif
    </div>
<div class="box-body">              
  <form name="frm" method="post" action="" enctype="multipart/form-data">
  <div class="table-responsive">
  <table  class="table table-bordered table-hover example2" style="min-width:1400px;width: 100%">
    <thead>                 
      <tr class="bg-top">
        <th width="5%" class="text-center">MSSV</th>
        <th width="5%" class="text-center">STT</th>
        <th width="10%" class="text-center">Nổi bật</th>
        <th width="10%" class="text-center">Cập nhật</th>
        <th width="15%" class="text-center">Họ và tên</th> 
        <th width="15%"  class="text-center">Nơi công tác</th>
        <th width="10%"  class="text-center">Chức vụ</th>
        <th width="10%" class="text-center">Email</th>
        <th width="10%" class="text-center">Điện thoại</th>  
        <th width="10%" class="text-center">Lớp</th>   
      </tr>
      </thead>
      <tfoot>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
      </tfoot>   
      <tbody>   
       @if(isset($myclass->cuusinhvien))
       @foreach($myclass->cuusinhvien as $csv)                                  
        <tr>
          <td>{{$csv->sinhvien->ma}}</td> 
            <td align="center">
              <input type="text" value="{{$csv->stt}}" data-val0="{{$csv->id}}" data-val1="ht96_cuusinhvien"  data_val2="{{$csv->stt}}"  name="ordering[]" class="tipS smallText update_stt" title="Nhập số thứ tự bài viết"  />
              <div id="ajaxloader"><img class="numloader" id="ajaxloader" src="ht96_admin/media/images/loader.gif" alt="loader" /></div>
            </td>
            <td class="text-center">
              <?php $f=($csv->noibat==1)?"diamondToggleOff":""; ?>
              <a data-val2="ht96_cuusinhvien" rel="{{$csv->noibat}}" data-val3="noibat" class="checktt diamondToggle <?=$f;?>" data-val0="{{$csv->id}}"></a>   
             </td>
             <td class="text-center">                                                   
              <a title="Sửa bài viết" href="set_admin/cuusinhvien/edit/{{$csv->id}}"><i class="fa fa-2x fa-edit"></i>
             </td>                                                                   
             <td>{{$csv->sinhvien->tensinhvien}}</td>
             <td>{{$csv->noicongtac_vi}}</td>
             <td>{{$csv->chucvu_vi}}</td>
             <td>{{$csv->sinhvien->email}}</td>
             <td>{{$csv->sinhvien->dienthoai}}</td>
             <td>{{$csv->sinhvien->lop->tenlop}}</td>
            </tr>  
          @endforeach  
        @endif                        
      </tbody> 
    </table>  
   </div>
  </form>  
</div>
<div class="paging text-center"></div>            
@endsection
@section('script')  
<script type="text/javascript"> 
$(document).on('change', '#bomon', function(){         
var id_bomon=$(this).val();
  $.get("set_admin/ajax/loadlop/"+id_bomon,function(data){
       $('#lop').html(data);
  });      
});

$(document).on('change', '#lop', function(){
  var id=$(this).val();       
  window.location.href ='set_admin/cuusinhvien/list/'+id;       
});
</script>
@endsection
