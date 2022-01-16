@extends('Admin.Master')
@section('title','danh sách hệ đào tạo')
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
        listid=listid.substr(1);   //alert(listid);
        if (listid=="") { alert("Bạn chưa chọn mục nào"); return false;}
          hoi= confirm("Bạn có chắc chắn muốn xóa?");
          if (hoi==true) document.location.href = "set_admin/daotao/hedaotao/multi_delete/" + listid;
      });
});
</script>

<div class="h3 padding20 text-center">Danh sách hệ đào tạo</div>
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
          <table class="table table-bordered table-hover example2" style="width:100%">
            <thead>                 
              <tr class="bg-top">
                <th width="5%"><input type="checkbox" name="chonhet" id="chonhet" /></th>
                <th width="10%" class="text-center">Hành động</th>
                <th>Tên</th>                 
              </tr>
            </thead>   
            <tbody>   
            @foreach($Hedaotao as $He)                                  
              <tr>
                <td class="text-center"><input type="checkbox" name="chon" id="chon" value="{{$He->id}}" class="chon"/></td>
                <td class="text-center">                                                   
                <a title="Sửa bài viết" href="set_admin/daotao/hedaotao/edit/{{$He->id}}" class="btn btn-warning">
                  <i class="fa fa-edit"></i>
                </a>

                <a href="set_admin/daotao/hedaotao/one_delete/{{$He->id}}" onClick="if(!confirm('Xác nhận xóa:')) return false;" class="btn btn-danger">
                  <i class="fa fa-times"></i>
                </a>
                </td>                
                <td>{{$He->ten_vi}}</td>  
              </tr>  
            @endforeach                          
            </tbody> 
          </table>  
        </div>
      </form>  
    </div>  
<a href="set_admin/daotao/hedaotao/add"><button class=" btn btn-success btn2">Thêm</button></a>
<button class=" btn btn-danger  btn2" id="xoahet">Xóa</button>         
@endsection



