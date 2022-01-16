@extends('Admin.Master')
@section('title','danh sách kết quả thi')
@section('content')  

<script type="text/javascript">
$(document).ready(function(){
$("#chonhet").click(function(){
  var status=this.checked;
  $("input[name='chon']").each(function(){this.checked=status;})
});

$("#xoahet").click(function(){
  var listid="";
  $("input[name='chon']").each(function(){
    if (this.checked) listid = listid+","+this.value;
  });
  listid=listid.substr(1);   //alert(listid);
  if (listid=="") { alert("Bạn chưa chọn mục nào"); return false;}
    hoi= confirm("Bạn có chắc chắn muốn xóa?");
    if (hoi==true) document.location.href = "set_admin/ketquathi/multi_delete/" + listid;
  });
});
</script>
<div class="h3 padding20 text-center">Danh sách kết quả thi</div>
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
    <table id="example2" class="table table-bordered table-hover" style="min-width:1200px;width: 100%">
      <thead>                 
        <tr class="bg-top">
          <th width="5%"  class="text-center"><input type="checkbox" name="chonhet" id="chonhet" /></th>
          <th class="text-center">Tên</th>
          <th width="10%" class="text-center">Tập tin</th> 
          <th width="10%" class="text-center">Xóa</th>                                      
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
        </tr>
      </tfoot>   
      <tbody>   
      @foreach($Ketquathi as $kqt)                                  
        <tr>
          <td class="text-center">
            <input type="checkbox" name="chon" id="chon" value="{{$kqt->id}}" class="chon" />
          </td>  
          <td>{{$kqt->ten}}</td> 
          <td class="text-center"><a href="ht96_ketquathi/{{$kqt->file}}" target="_blank">OK</a></td> 
          <td class="text-center" title="xóa bài viết">
            <a href="set_admin/ketquathi/one_delete/{{$kqt->id}}" onClick="if(!confirm('Xác nhận xóa:')) return false;"><i class="fa fa-times text-dange fa-2x"></i></a>
          </td> 
        </tr> 
      @endforeach                          
      </tbody> 
    </table>  
  </div>
</form>  
</div>
<a href="set_admin/ketquathi/add"><button class=" btn btn-success btn2">Thêm</button></a>
<button class=" btn btn-danger  btn2" id="xoahet">Xóa</button>         
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
   window.location.href ='set_admin/ketquathi/list/'+id;             
});
</script>
@endsection
