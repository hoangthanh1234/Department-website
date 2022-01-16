@extends('Admin.Master')
@section('title','danh sách nhóm công việc')
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
                if (hoi==true) document.location.href = "set_admin/nhomcongviec/multi_delete/" + listid;
            });
      });
</script>

<div class="h3 padding20 text-center">Danh các nhóm công việc</div>
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
                          
                            <table id="example2" class="table table-bordered table-hover" style="width:100%">
                                  <thead>                 
                                      <tr class="bg-top">
                                          <th width="5%" class="text-center">
                                            <input type="checkbox" name="chonhet" id="chonhet" />
                                          </th>
                                          <th width="10%" class="text-center">Hành động</th>
                                          <th>Tên</th>                                         
                                      </tr>
                                  </thead>   
                                  <tbody>   
                                  @foreach($Nhomcongviec as $ncv)                                  
                                      <tr>
                                          <td class="text-center">
                                            <input type="checkbox" name="chon" id="chon" value="{{$ncv->id}}" class="chon" />
                                          </td>
                                          <td class="text-center">                                                   
                                            <a title="Sửa bài viết" href="set_admin/nhomcongviec/edit/{{$ncv->id}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                         
                                            <a href="set_admin/nhomcongviec/one_delete/{{$ncv->id}}" onClick="if(!confirm('Xác nhận xóa:')) return false;" class="btn btn-danger"><i class="fa fa-times text-dange"></i></a>
                                          </td>                                             
                                          <td>{{$ncv->ten}}</td> 
                                        </tr>  
                                        @endforeach                          
                                    </tbody> 
                            </table>  
                          
                        </form>  
            </div>
          
                    
            <a href="set_admin/nhomcongviec/add"><button class=" btn btn-success btn2">Thêm</button></a>
            <button class=" btn btn-danger  btn2" id="xoahet">Xóa</button>
         
    @endsection



