@extends('Admin.Master')
@section('title','danh sách trình độ - học vị')
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
                if (hoi==true) document.location.href = "set_admin/trinhdo/multi_delete/" + listid;
            });
      });
</script>

<div class="h3 padding20 text-center">Danh sách trình độ - học vị</div>
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
      <table id="example2" class="table table-bordered table-hover">
        <thead>                 
          <tr class="bg-top">
            <th width="5%"><input type="checkbox" name="chonhet" id="chonhet" /></th>
            <th width="5%">STT</th> 
            <th class="text-center" width="8%">Ẩn hiện</th>
            <th width="10%" class="text-center">Hành động</th>    
            <th class="text-center">Tên trình độ</th>                                          
          </tr>
        </thead>   
        <tbody>   
        @foreach($Trinhdo as $TD)                                  
          <tr>
            <td  class="text-center">
              <input type="checkbox" name="chon" id="chon" value="{{$TD->id}}" class="chon" />
            </td>
            <td align="center">
              <input type="text" value="{{$TD->stt}}" data-val0="{{$TD->id}}" data-val1="ht96_trinhdo"  data_val2="{{$TD->stt}}"  name="ordering[]" class="tipS smallText update_stt" title="Nhập số thứ tự bài viết"  />
              <div id="ajaxloader"><img class="numloader" id="ajaxloader" src="ht96_admin/media/images/loader.gif" alt="loader" /></div>
            </td> 

            <td class="text-center">
              <?php $f=($TD->hienthi==1)?"diamondToggleOff":""; ?>
              <a data-val2="ht96_trinhdo" rel="{{$TD->hienthi}}" data-val3="hienthi" class="checktt diamondToggle <?=$f;?>" data-val0="{{$TD->id}}" title="Hiễn thị"></a>
            </td>  

            <td class="text-center">
              <a title="Sửa bài viết" href="set_admin/trinhdo/edit/{{$TD->id}}" class="btn btn-warning" title="Cặp nhật"><i class="fa fa-edit"></i></a>

              <a href="set_admin/trinhdo/one_delete/{{$TD->id}}" onClick="if(!confirm('Xác nhận xóa:')) return false;" class="btn btn-danger" title="Xóa"><i class="fa fa-times"></i></a>
           </td>
           
           <td>{{$TD->ten_vi}}</td> 
        </tr>  
        @endforeach                          
      </tbody> 
    </table>  
   </form>  
  </div>
<a href="set_admin/trinhdo/add"><button class=" btn btn-success btn2">Thêm</button></a>
<button class=" btn btn-danger  btn2" id="xoahet">Xóa</button>
@endsection



