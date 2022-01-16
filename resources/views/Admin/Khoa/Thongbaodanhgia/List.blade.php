@extends('Admin.Master')
@section('title','danh sách thông báo đánh giá giảng viên')
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
  listid=listid.substr(1);
  if (listid=="") { alert("Bạn chưa chọn mục nào"); return false;}
    hoi= confirm("Bạn có chắc chắn muốn xóa? au khi xóa hệ thống sẽ xóa tất cả phiếu đánh giá thuộc thông báo này.");
     if (hoi==true) document.location.href = "set_admin/thongbaodanhgia/multi_delete/" + listid;
  });
});
</script>

<div class="h3 padding20 text-center">Danh sách Thông báo đánh giá giảng viên</div>
  <div class="box">  
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
      <table  class="table table-bordered table-hover" style="width:100%">
        <thead>                 
          <tr class="bg-top">
            <th width="5%"><input type="checkbox" name="chonhet" id="chonhet" /></th>
            <th width="5%">STT</th>
            <th width="10%"  class="text-center">Hành dộng</th>
            <th width="10%" title="Chọn trạng thái ẩn hiện">Hiển thị</th>
            <th width="10%" class="text-center" title="Ngưng đánh giá theo thông báo này">Đóng</th>           
            <th>Tên</th>  
            <th width="10%" class="text-center">Bắt đầu</th>
            <th width="10%"  class="text-center">Kết thúc </th>
          </tr>
        </thead>   
        <tbody>   
        @foreach($Thongbao as $TB)                                  
          <tr>
            <td class="text-center"> <input type="checkbox" name="chon" id="chon" value="{{$TB->id}}" class="chon" /></td> 
            <td align="center">
              <input type="text" value="{{$TB->stt}}" data-val0="{{$TB->id}}" data-val1="ht96_thongbaodanhgia"  data_val2="{{$TB->stt}}"  name="ordering[]" class="tipS smallText update_stt" title="Nhập số thứ tự bài viết"  />
              <div id="ajaxloader"><img class="numloader" id="ajaxloader" src="ht96_admin/media/images/loader.gif" alt="loader" /></div>
            </td>
            <td class="text-center">                                                   
              <a title="Sửa bài viết" href="set_admin/thongbaodanhgia/edit/{{$TB->id}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
            
              <a href="set_admin/thongbaodanhgia/one_delete/{{$TB->id}}" onClick="if(!confirm('Xác nhận xóa: sau khi xóa hệ thống sẽ xóa tất cả phiếu đánh giá thuộc thông báo này')) return false;" class=" btn btn-danger"><i class="fa fa-times text-dange"></i></a>
            </td> 
            <td class="text-center">                                                 
              <?php $f2=($TB->hienthi==1)?"diamondToggleOff":""; ?>
              <a data-val2="ht96_thongbaodanhgia" rel="{$Sli->hienthi}" data-val3="hienthi" class="checktt diamondToggle <?=$f2;?>"  data-val0="{{$TB->id}}" ></a>
            </td>
            
            <td class="text-center">                                                 
              <?php $f=($TB->trangthai==1)?"diamondToggleOff":""; ?>
              <a data-val2="ht96_thongbaodanhgia" rel="{$Sli->trangthai}" data-val3="trangthai" class="checktt diamondToggle <?=$f;?>"  data-val0="{{$TB->id}}" ></a>
            </td>            
            <td title="{{$TB->ten}}">
              <span data-id="{{$TB->ten}}" class="tenthongbaolist{{$TB->id}}" ><?php echo substr($TB->ten,0,135);?></span>
            </td> 
            <td class="text-center">{{ \Carbon\Carbon::parse($TB->ngaybatdau)->format('d/m/Y')}}</td>
            <td class="text-center">{{ \Carbon\Carbon::parse($TB->ngayketthuc)->format('d/m/Y')}}</td>
          </tr>  
        @endforeach                          
        </tbody> 
      </table>
    </div>  
  </form>  
</div>          
<div class="paging text-center">{!! $Thongbao->links() !!}</div>
<a href="set_admin/thongbaodanhgia/add"><button class=" btn btn-success btn2">Thêm</button></a>
<button class=" btn btn-danger  btn2" id="xoahet">Xóa</button>
@endsection



