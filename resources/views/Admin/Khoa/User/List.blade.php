@extends('Admin.Master')
@section('title','danh sách User')
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
                listid=listid.substr(1);
                if (listid=="") { alert("Bạn chưa chọn mục nào"); return false;}
                hoi= confirm("Bạn có chắc chắn muốn xóa?");
                if (hoi==true) document.location.href = "set_admin/user/multi_delete/" + listid;
            });
      });
</script>

<div class="h3 padding20 text-center">Danh sách User</div>
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
                                          <th width="30%">Tên</th>  
                                          <th>Email</th> 
                                          <th>Quyền</th>                                          
                                          <th width="10%" style="text-align:center;">Sửa</th>
                                          <th width="10%" style="text-align:center;">Xóa</th>
                                      </tr>
                                  </thead>   
                                  <tbody>   
                                  @foreach($User as $ur)                                  
                                      <tr>
                                              <td  style="text-align:center;">
                                                  <input type="checkbox" name="chon" id="chon" value="{{$ur->id}}" class="chon" />
                                              </td>
                                               <td>{{$ur->ten}}</td>  
                                               <td>{{$ur->email}}</td>
                                               <td>@if($ur->level==1) Khoa @else Trưởng bộ môn @endif</td>
                                                <td class="text-center">                                                   
                                                      <a title="cập nhật user" href="set_admin/user/edit/{{$ur->id}}"><i class="fa fa-2x fa-edit"></i>
                                                 </td> 
                                                 <td class="text-center" title="xóa bài viết">
                                                        <a href="set_admin/user/one_delete/{{$ur->id}}" onClick="if(!confirm('Xác nhận xóa:')) return false;"><i class="fa fa-times text-dange fa-2x"></i>
                                                        </a>
                                                  </td>
                                        </tr>  
                                        @endforeach                          
                                    </tbody> 
                            </table>  
                        </form>  
            </div>
          
           
            <a href="set_admin/user/add"><button class=" btn btn-success btn2">Thêm</button></a>
            <button class=" btn btn-danger  btn2" id="xoahet">Xóa</button>
         
    @endsection



