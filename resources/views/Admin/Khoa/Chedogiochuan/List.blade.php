@extends('Admin.Master')
@section('title','danh sách mức giảm chế độ giờ chuẩn')
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
      hoi= confirm("Bạn có chắc chắn muốn xóa?");
      if (hoi==true) document.location.href = "set_admin/che-do-gio-chuan/multi_delete/" + listid;
    });    
  });
</script>

<div class="h3 padding20 text-center">Danh sách chế độ giảm giờ chuẩn giảng dạy</div>
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
      
        <table class="table table-bordered table-hover example2">
          <thead>                 
            <tr class="bg-top">              
              <th width="5%" class="text-center">STT</th>     
              <th class="text-center" width="10%">Hành động</th>
              <th class="text-center">Trình độ</th>            
              <th class="text-center">Chức vụ</th>
              <th class="text-center">% mức giờ chuẩn</th> 
              <th class="text-center">Số giờ miễn giảm</th>
              <th class="text-center">Giờ thực hiện / năm</th>
              <th class="text-center">Giờ chuẩn / năm</th>    
              <th class="text-center">Ghi chú</th>        
            </tr>
          </thead>   
          <tbody>   
            <?php $i=1; ?>
            @foreach($Chedogiochuan as $cd)                                  
            <tr>
              <td class="text-center">{{$i++}}</td>
              <td class="text-center">
                <a title="Sửa bài viết" href="set_admin/che-do-gio-chuan/edit/{{$cd->id}}" class="btn btn-warning"><i class="fa fa-edit wite"></i></a>
                <a href="set_admin/che-do-gio-chuan/one_delete/{{$cd->id}}" class="btn btn-danger" onClick="if(!confirm('Xác nhận xóa:')) return false;"><i class="fa fa-times white"></i></a>
              </td>
              <td class="text-center">{{$cd->trinhdo->ten_vi}}</td>
              <td class="text-center">{{$cd->chucvu->ten_vi}}</td>  
              <td class="text-center">{{$cd->tylephantramgiochuan}}</td>
              <td class="text-center">{{$cd->sogiomiengiam}}</td>
              <td class="text-center">{{$cd->sogiothuchien}}</td>
              <td class="text-center">{{$cd->giochuan}}</td>
              <td class="text-center">{{$cd->ghichu}}</td> 
            </tr>  
           @endforeach                          
          </tbody> 
        </table> 
    </form>  
  </div>
<a href="set_admin/che-do-gio-chuan/add"><button class=" btn btn-success btn2">Thêm</button></a>
<button class=" btn btn-danger  btn2" id="xoahet">Xóa</button>
@endsection



