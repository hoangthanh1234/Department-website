@extends('Admin.Master')
@section('title','danh sách tin tức')
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
    });
    listid=listid.substr(1);
      if (listid=="") { alert("Bạn chưa chọn mục nào"); return false;}
        hoi= confirm("Bạn có chắc chắn muốn xóa?");
      if (hoi==true) document.location.href = "set_admin/tintuc/multi_delete/" + listid;
  });
});
</script>

<div class="h3 padding20 text-center">Danh sách tin tức</div>
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
      <table class="table table-bordered table-hover example2" style="width:100%;">
        <thead>                 
          <tr class="bg-top">
            <th width="5%"  class="text-center"><input type="checkbox" name="chonhet" id="chonhet" /></th>
            <th width="5%"  class="text-center">STT</th>  
            <th width="7%" class="text-center">Nổi Bật</th>              
            <th width="7%" class="text-center">Ẩn / Hiện</th>
            <th width="10%" class="text-center">Hành động</th>
            <th width="30%">Tên</th>  
            <th width="10%" class="text-center">Hình ảnh</th>         
            <th width="10%" class="text-center">Danh mục</th> 
            <th width="8%"  class="text-center">Loại</th>  
            <th width="8%"  class="text-center">Xem</th>  
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
            <th></th>
            <th></th>
            <th></th>
            <th></th>
          </tr>
        </tfoot>
        <tbody>   
        @foreach($Tintuc as $Po)                                  
          <tr>
            <td  class="text-center">
              <input type="checkbox" name="chon" id="chon" value="{{$Po->id}}" class="chon" />
            </td>
            <td class="text-center">
                <input type="text" value="{{$Po->stt}}" data-val0="{{$Po->id}}" data-val1="ht96_news"  data_val2="{{$Po->stt}}"  name="ordering[]" class="tipS smallText update_stt" title="Nhập số thứ tự bài viết"  />
                <div id="ajaxloader"><img class="numloader" id="ajaxloader" src="ht96_admin/media/images/loader.gif" alt="loader" /></div>
            </td> 
             <td class="text-center">
              <?php $f=($Po->noibat==1)?"diamondToggleOff":""; ?>
              <a data-val2="ht96_tintuc" rel="{{$Po->noibat}}" data-val3="noibat" class="checktt diamondToggle <?=$f;?>" data-val0="{{$Po->id}}"></a>   
            </td>
            <td class="text-center">
              <?php $f=($Po->hienthi==1)?"diamondToggleOff":""; ?>
              <a data-val2="ht96_tintuc" rel="{$Po->hienthi}" data-val3="hienthi" class="checktt diamondToggle <?=$f;?>"  data-val0="{{$Po->id}}" ></a>   
            </td>

            <td class="text-center">                                                   
              <a title="Sửa bài viết" href="set_admin/tintuc/edit/{{$Po->id}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
            <a href="set_admin/tintuc/one_delete/{{$Po->id}}" onClick="if(!confirm('Xác nhận xóa:')) return false;" class="btn btn-danger">
                <i class="fa fa-times text-dange"></i>
              </a>
            </td> 

            
            <td><?php echo substr($Po->ten_vi,0,55)."..."; ?></td>  
            <td class="text-center"><img src="ht96_image/news/{{$Po->hinhanh}}" width="50" height="40"></td>
            <td class="text-center">{{$Po->danhmuc->ten_vi}}</td>
            <td class="text-center">@if($Po->tintuc==1) Tin tức @else Sự kiện @endif</td>   
            <td class="text-center"><a href="tin-tuc/bai-viet/{{$Po->tenkhongdau_vi}}/{{$Po->id}}.html" target="blank" title="Xem bài viết trên website">Xem</a></td>        
          </tr>  
          @endforeach                          
          </tbody> 
        </table>  
      </div>
    </form>  
  </div>
<a href="set_admin/tintuc/add"><button class=" btn btn-success btn2">Thêm</button></a>
<button class=" btn btn-danger  btn2" id="xoahet">Xóa</button>
@endsection



