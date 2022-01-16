@extends('Admin.Master')
@section('title','danh sách Video')
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
                if (hoi==true) document.location.href = "set_admin/video/multi_delete/" + listid;
            });
      });
</script>

<div class="h3 padding20 text-center">Danh sách Video</div>
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
            <th width="3%"><input type="checkbox" name="chonhet" id="chonhet" /></th>
            <th width="5%"  class="text-center">STT</th> 
            <th width="7%" class="text-center">Ẩn / Hiện</th>
            <th width="8%" class="text-center">Hành động</th>
            <th width="30%" class="text-center">Tên</th>   
            <th width="10%" class="text-center">Vị trí</th>
          </tr>
        </thead> 
        <tfoot>
          <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
          </tr>
        </tfoot>  
        <tbody>   
        @foreach($Video as $Vi)                                  
        <tr>
          <td  class="text-center">
            <input type="checkbox" name="chon" id="chon" value="{{$Vi->id}}" class="chon" />
          </td>
          <td align="center">
            <input type="text" value="{{$Vi->stt}}" data-val0="{{$Vi->id}}" data-val1="ht96_Video"  data_val2="{{$Vi->stt}}"  name="ordering[]" class="tipS smallText update_stt" title="Nhập số thứ tự bài viết"  />
            <div id="ajaxloader">
              <img class="numloader" id="ajaxloader" src="ht96_admin/media/images/loader.gif" alt="loader" />
            </div>
          </td> 
          <td class="text-center">
            <?php $f=($Vi->hienthi==1)?"diamondToggleOff":""; ?>
              <a data-val2="ht96_Video" rel="{$Vi->hienthi}" data-val3="hienthi" class="checktt diamondToggle <?=$f;?>"  data-val0="{{$Vi->id}}" ></a>   
          </td>

          <td class="text-center">                                                   
              <a title="Sửa bài viết" href="set_admin/video/edit/{{$Vi->id}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
          
            <a href="set_admin/video/one_delete/{{$Vi->id}}" onClick="if(!confirm('Xác nhận xóa:')) return false;" class="btn btn-danger">
              <i class="fa fa-times"></i>
            </a>
          </td> 
          <td>{{$Vi->ten_vi}}</td> 
          <td class="text-center">{{$Vi->type}}</td>          
         </tr>  
        @endforeach                          
        </tbody> 
      </table>  
    </form>  
  </div> 
<a href="set_admin/video/add"><button class=" btn btn-success btn2">Thêm</button></a>
<button class=" btn btn-danger  btn2" id="xoahet">Xóa</button>
@endsection



