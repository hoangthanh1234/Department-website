@extends('Admin.Master')
@section('title','danh sách lkweb')
@section('content')  

 <script type="text/javascript">
       $(document).ready(function() {

            $("#chonhet").click(function(){
                var status=this.checked;
                $("input[name='chon']").each(function(){this.checked=status;})
            });

            $("#xoahet").click(function(){
                var listid="";
                $("input[name='chon']").each(function(){
                  if (this.checked) listid = listid+","+this.value;
                  })
                listid=listid.substr(1);   //alert(listid);
                if (listid=="") { alert("Bạn chưa chọn mục nào"); return false;}
                hoi= confirm("Bạn có chắc chắn muốn xóa?");
                if (hoi==true) document.location.href = "set_admin/lkweb/multi_delete/" + listid;
            });
      });
</script>

<div class="h3 padding20 text-center">Danh sách website liên kết</div>
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
        <table id="example2" class="table table-bordered table-striped" style="width:100%">
          <thead>                 
            <tr class="bg-top">
              <th width="3%"><input type="checkbox" name="chonhet" id="chonhet" /></th>
              <th width="3%">STT</th>   
              <th width="7%" class="text-center">Ẩn / Hiện</th>
              <th width="10%" class="text-center">Hành động</th>
              <th width="30%">Tên</th> 
              <th width="10%" class="text-center">Ảnh</th>   
              <th width="10%" class="text-center">Type</th>
            </tr>
          </thead>   
          <tbody>   
          @foreach($LKweb as $LK)                                  
          <tr>
            <td class="text-center">
                <input type="checkbox" name="chon" id="chon" value="{{$LK->id}}" class="chon" />
            </td>

            <td align="center">
              <input type="text" value="{{$LK->stt}}" data-val0="{{$LK->id}}" data-val1="ht96_lkweb"  data_val2="{{$LK->stt}}"  name="ordering[]" class="tipS smallText update_stt" title="Nhập số thứ tự bài viết"  />
               <div id="ajaxloader">
                  <img class="numloader" id="ajaxloader" src="ht96_admin/media/images/loader.gif" alt="loader" />
              </div>
            </td>
            <td class="text-center">
              <?php $f=($LK->hienthi==1)?"diamondToggleOff":""; ?>
              <a data-val2="ht96_lkweb" rel="{$LK->hienthi}" data-val3="hienthi" class="checktt diamondToggle <?=$f;?>"  data-val0="{{$LK->id}}" ></a>   
            </td>

            <td class="text-center">                                                   
                <a title="Sửa bài viết" href="set_admin/lkweb/edit/{{$LK->id}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
           
              <a href="set_admin/lkweb/one_delete/{{$LK->id}}" onClick="if(!confirm('Xác nhận xóa:')) return false;" class=" btn btn-danger"><i class="fa fa-times"></i>
              </a>
            </td>  
            <td>{{$LK->ten_vi}}</td>
            <td class="text-center"><img src="ht96_image/lkweb/{{$LK->hinhanh}}" style="height:30px;width:50px;"/></td>  
            <td class="text-center">{{$LK->type}}</td>            
           </tr>  
         @endforeach                          
        </tbody> 
      </table>  
    </div>
  </form>  
</div>           
<a href="set_admin/lkweb/add"><button class=" btn btn-success btn2">Thêm</button></a>
<button class=" btn btn-danger  btn2" id="xoahet">Xóa</button>
@endsection



