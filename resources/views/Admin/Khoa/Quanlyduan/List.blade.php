@extends('Admin.Master')
@section('title','Danh sách dự án')
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
      if (hoi==true) document.location.href = "set_admin/qlduan/multi_delete/" + listid;
  });
});
</script>

<div class="h3 padding20 text-center">Danh sách dự án</div>
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
            <th width="12%" class="text-center">Hành động</th>           
            <th             class="text-center">Tên dự án</th>
            <th width="10%"  class="text-center">Ảnh đại diện</th> 
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
          </tr>
        </tfoot>
        <tbody>   
        @foreach($Quanlyduan as $qlduan)    
        <?php $i=1;?>                              
          <tr>

            <td  class="text-center">
              <input type="checkbox" name="chon" id="chon" value="{{$qlduan->id}}" class="chon" />
            </td>  

            <td class="text-center">{{$i++}}</td>            

            <td class="text-center">                                                   
              <a title="Sửa bài viết" href="set_admin/qlduan/edit/{{$qlduan->id}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
              <a href="set_admin/qlduan/one_delete/{{$qlduan->id}}" onClick="if(!confirm('Xác nhận xóa:')) return false;" class="btn btn-danger">
                <i class="fa fa-times text-dange"></i>
              </a>
            </td>     

            <td>
              {{$qlduan->ten_vi}}
            </td>        
           
            <td class="text-center"><img src="ht96_image/qlduan/{{$qlduan->hinhanh}}" width="50" height="40"></td>            
              
            <td class="text-center">
              <a href="qlduan/{{$qlduan->tenkhongdau_vi}}/{{$qlduan->id}}.html" target="blank" title="Xem bài viết trên website">click</a>
            </td>

          </tr>  
          @endforeach                          
          </tbody> 
        </table>  
      </div>
    </form>  
  </div>
<a href="set_admin/qlduan/add"><button class=" btn btn-success btn2">Thêm</button></a>
<button class=" btn btn-danger  btn2" id="xoahet">Xóa</button>
@endsection



