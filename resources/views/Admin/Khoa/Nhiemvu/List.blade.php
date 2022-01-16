@extends('Admin.Master')
@section('title','danh sách nhiệm vụ nghiên cứu')
@section('content')  

 
<div class="h3 padding20 text-center">Danh sách nhiệm vụ nghiên cứu</div>
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
        <table class="table table-bordered table-hover example2" style="width:100%">
          <thead>                 
              <tr class="bg-top">               
                <th width="5%" class="text-center">#</th>            
                <th width="10%" class="text-center">Hành động</th>     
                <th class="text-center">Tên</th>               
              </tr>
           </thead>   
           <tbody>   
            @php
              $i=1;
            @endphp
           @foreach($Nhiemvu as $nv)                                  
           <tr>           

            <td align="center">{{$i++}}</td>   
            <td class="text-center">                                                   
              <a title="Cập nhật bài viết" href="set_admin/nhom-nghien-cuu/nhiem-vu/edit/{{$nv->id}}" class="btn btn-warning"><i class="fa fa-edit"></i></a> 
              @if($nv->id!=1)          
              <a href="set_admin/nhom-nghien-cuu/nhiem-vu/one_delete/{{$nv->id}}" onClick="if(!confirm('Xác nhận xóa:')) return false;" class="btn btn-danger">
                <i class="fa fa-times"></i>
              </a>
              @endif
            </td>
            <td>{{$nv->ten_vi}}</td>  
          </tr>  
        @endforeach                          
        </tbody> 
      </table>  
     </form>  
    </div>
<a href="set_admin/nhom-nghien-cuu/nhiem-vu/add"><button class=" btn btn-success btn2">Thêm</button></a>

@endsection



