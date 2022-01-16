@extends('Admin.Master')
@section('title','danh sách yêu cầu thành viên')
@section('content')  

 

<div class="h3 padding20 text-center">Danh sách yêu cầu thành viên cho đề tài {{$Detainghiencuu->ten_vi}}</div>
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
                            <table class="table table-bordered table-hover example2">
                                  <thead>                 
                                      <tr class="bg-top">
                                          <td class="text-center" width="5%">#</td>
                                          <td width="10%" class="text-center">Hành động</td> 
                                          <td class="text-center" width="10%">Số lượng</td>
                                          <td class="text-center" width="15%">Chuyên ngành</td>
                                          <td class="text-center">Ghi chú</td>                           
                                      </tr>
                                  </thead>   
                                  <tbody>   
                                    @php
                                      $i=1;
                                    @endphp
                                  @foreach($Yeucauthanhvien as $yeucau)                                  
                                      <tr>
                                        <td  class="text-center">
                                           {{$i++}}
                                        </td>

                                        <td class="text-center">                                                   
                                            <a title="Sửa bài viết" href="set_giangvien/yeu-cau-thanh-vien/edit/{{$yeucau->id}}" class=" btn btn-warning">
                                              <i class="fa fa-edit"></i>
                                            </a>
                                                
                                            <a href="set_giangvien/yeu-cau-thanh-vien/xoa/{{$yeucau->id}}" onClick="if(!confirm('Xác nhận xóa:')) return false;" class=" btn btn-danger">
                                              <i class="fa fa-times text-dange"></i>
                                            </a>
                                        </td>
                                        <td class="text-center">{{$yeucau->soluong}}</td>
                                        <td class="text-center">{{$yeucau->chuyennghanh->ten_vi}}</td>
                                        <td class="text-center">{{$yeucau->ghichu}}</td>
                                      </tr>  
                                   @endforeach                          
                                    </tbody> 
                            </table>  
                            </div>
                        </form>  
                </div>          
           <a href="set_giangvien/yeu-cau-thanh-vien/add/{{$Detainghiencuu->id}}"><button class=" btn btn-success btn2">Thêm</button></a>
@endsection



