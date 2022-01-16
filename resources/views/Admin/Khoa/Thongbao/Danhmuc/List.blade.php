@extends('Admin.Master')
@section('title','danh sách danh mục thông báo')
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
    if (hoi==true) document.location.href = "set_admin/danhmucthongbao/multi_delete/" + listid;
  });
});
</script>

<div class="h3 padding20 text-center">Danh mục thông báo</div>
    <div class="box">
      <div class="container" style="max-width:500px;margin-top:20px;">
        @if(session('thongbao'))
          <div class="alert alert-success">
            {{session('thongbao')}}
          </div>
         @endif
      </div>

      <div class="box-body">              
        <form name="frm" method="post" action="" enctype="multipart/form-data" >
        <div class="table-responsive">
          <table id="example2" class="table table-bordered table-hover" style="width:100%">
            <thead>                 
              <tr class="bg-top">
                <th width="5%" class="text-center"><input type="checkbox" name="chonhet" id="chonhet" /></th>
                <th width="5%" class="text-center">STT</th>
                <th width="7%" class="text-center">Ẩn/Hiện</th>
                <th width="10%" class="text-center">Hành động</th>                                 
                <th>Tên</th>
                <th width="15%" class="text-center">Loại</th>
              </tr>
            </thead>   
            <tbody>   
             @foreach($Dm_thongbao as $DMTB)                                  
              <tr>
                <td class="text-center">
                  <input type="checkbox" name="chon" id="chon" value="{{$DMTB->id}}" class="chon" />
                </td>

                <td align="center">
                  <input type="text" value="{{$DMTB->stt}}" data-val0="{{$DMTB->id}}" data-val1="ht96_dm_thongbao"  data_val2="{{$DMTB->stt}}"  name="ordering[]" class="tipS smallText update_stt" title="Nhập số thứ danh mục thông báo"  />
                  <div id="ajaxloader"><img class="numloader" id="ajaxloader" src="ht96_admin/media/images/loader.gif" alt="loader" /></div>
                </td>   


                <td class="text-center">
                  <?php $f=($DMTB->hienthi==1)?"diamondToggleOff":""; ?>
                  <a data-val2="ht96_dm_thongbao" rel="{$DMTB->hienthi}" data-val3="hienthi" class="checktt diamondToggle <?=$f;?>"  data-val0="{{$DMTB->id}}" ></a>   
                </td>

                <td class="text-center">                                                   
                  <a title="Sửa bài viết" href="set_admin/danhmucthongbao/edit/{{$DMTB->id}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                
                  <a title="Xóa" href="set_admin/danhmucthongbao/one_delete/{{$DMTB->id}}" onClick="if(!confirm('Xác nhận xóa:')) return false;" class="btn btn-danger"><i class="fa fa-times"></i></a>
                </td>

                <td>{{$DMTB->ten_vi}}</td>  

                <td class="text-center">@if($DMTB->quydinh == 1) Quy định - Quy Chế @else Thông báo @endif</td>

              </tr>  
              @endforeach                          
            </tbody> 
          </table>  
        </div>
      </form>  
    </div>
<div class="text-left">
<a href="set_admin/danhmucthongbao/add"><button class=" btn btn-success btn2">Thêm</button></a>
<button class=" btn btn-danger  btn2" id="xoahet">Xóa</button>
</div> 
 @endsection



