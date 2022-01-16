@extends('Admin.Master')
@section('title','danh sách tổ hợp môn')
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
    if (hoi==true) document.location.href = "set_admin/tohop/multi_delete/" + listid;
  });
});
</script>

<div class="h3 padding20 text-center">Danh sách tổ hợp xét tuyển</div>
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
          <table id="example2" class="table table-bordered table-h0ver" style="width:100%">
            <thead>                 
              <tr class="bg-top">
                <th width="5%" class="text-center"><input type="checkbox" name="chonhet" id="chonhet" /></th>
                <th width="5%" class="text-center">STT</th> 
                <th width="7%" class="text-center">Ẩn / Hiện</th>
                <th width="8%" class="text-center">Hành động</th>                               
                <th width="10%" class="text-center">Tên</th>  
                <th width="30%" class="text-center">Môn Xét Tuyển</th> 
                <th width="10%" class="text-center">Khối</th>                
              </tr>
            </thead>   
            <tbody>   
            @foreach($Tohop as $TH)                                  
              <tr>
                <td class="text-center">
                  <input type="checkbox" name="chon" id="chon" value="{{$TH->id}}" class="chon" />
                </td>
                <td align="center">
                  <input type="text" value="{{$TH->stt}}" data-val0="{{$TH->id}}" data-val1="ht96_tohop"  data_val2="{{$TH->stt}}"  name="ordering[]" class="tipS smallText update_stt" title="Nhập số thứ tự bài viết"  />
                  <div id="ajaxloader"><img class="numloader" id="ajaxloader" src="ht96_admin/media/images/loader.gif" alt="loader" /></div>
                </td>
                <td class="text-center">
                  <?php $f=($TH->hienthi==1)?"diamondToggleOff":""; ?>
                  <a data-val2="ht96_tohop" rel="{$TH->hienthi}" data-val3="hienthi" class="checktt diamondToggle <?=$f;?>"  data-val0="{{$TH->id}}" ></a>   
                </td>
                <td class="text-center">                                                   
                  <a title="Sửa bài viết" href="set_admin/tohop/edit/{{$TH->id}}" class="btn btn-warning">
                    <i class="fa fa-edit"></i>
                  </a>
                  <a href="set_admin/tohop/one_delete/{{$TH->id}}" onClick="if(!confirm('Xác nhận xóa:')) return false;" class="btn btn-danger">
                    <i class="fa fa-times"></i>
                  </a>
                </td>                 
                <td class="text-center">{{$TH->ten}}</td>
                <td>{{$TH->monxt}}</td>
                <td class="text-center">{{$TH->khoi}}</td>                
              </tr>  
              @endforeach                          
            </tbody> 
          </table>  
        </form>  
      </div>
<a href="set_admin/tohop/add"><button class=" btn btn-success btn2">Thêm</button></a>
<button class=" btn btn-danger  btn2" id="xoahet">Xóa</button>         
@endsection



