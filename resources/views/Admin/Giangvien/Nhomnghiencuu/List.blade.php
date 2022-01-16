@extends('Admin.Master')
@section('title', 'Danh sách nhóm nghiên cứu tham gia')
@section('content')   

<div class="h3 padding20 text-center">Danh sách nhóm nghiên cứu tham gia</div>
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
                <table id="example2" class="table table-bordered table-hover" style="width:100%">
                    <thead>                 
                        <tr class="bg-top">
                            <th width="5%" class="text-center">#</th>                             
                            <th width="25%" class="text-center">Hành động</th>     
                            <th class="text-center">Tên nhóm</th>                              
                            <th width="10%" class="text-center">Vai trò</th> 
                            <th width="20%" class="text-center">Lĩnh vực</th> 
                        </tr>
                    </thead>   
                    <tbody> 

                      @php
                      	$i=1;
                      @endphp  

                        @foreach($CT_nhom as $ct)                                  
                        <tr>
                            <td class="text-center">{{$i++}}</td> 

                            <td class="text-center">     

                                @if($ct->nhiemvu->id == 1)
                               	  <a href="set_giangvien/nhom-nghien-cuu/them-thanh-vien/{{$ct->id_nhom}}" title="Thêm thành viên mới" class=" btn btn-success">
                                	<i class="fa fa-plus" aria-hidden="true"></i>
                                  </a>
								@endif

								
	                            <a href="set_giangvien/nhom-nghien-cuu/danh-sach-thanh-vien/{{$ct->id_nhom}}" title="Danh sách thành viên"  class=" btn btn-primary">
	                                	<i class="fa fa-list-alt" aria-hidden="true"></i>
	                            </a>
	                        


								@if($ct->nhiemvu->id == 1)
	                                <a href="set_giangvien/nhom-nghien-cuu/xoa-nhom/{{$ct->id_nhom}}" title="xóa nhóm nghiên cứu này" onClick="if(!confirm('Xác nhận xóa nhóm nghiên cứu này:')) return false;" class=" btn btn-danger">
	                                	<i class="fa fa-times text-dange"></i>
	                                </a>
	                            @endif

	                            
	                            @if($ct->nhiemvu->id != 1)
	                                <a href="set_giangvien/nhom-nghien-cuu/roi-nhom/{{$ct->id_nhom}}" title="rời khỏi nhóm nghiên cứu này" onClick="if(!confirm('Xác nhận rời khỏi nhóm nghiên cứu này:')) return false;" class=" btn btn-danger">
	                                	<i class="fa fa-times text-dange"></i>
	                                </a>
	                            @endif

                                <a href="set_giangvien/nhom-nghien-cuu/dang-ky-bao-cao/{{$ct->id_nhom}}" title="Đăng ký báo cáo nhóm này" class=" btn btn-success">
                                       <i class="fa fa-plus-square-o" aria-hidden="true"></i>
                                </a>
                           
                                <a href="set_giangvien/nhom-nghien-cuu/danh-sach-bai-bao-cao/{{$ct->id_nhom}}" title="danh sách các bài báo cáo của nhóm này" class=" btn btn-primary">
                                       <i class="fa fa-flag-checkered" aria-hidden="true"></i>
                                </a>                               
                            </td>
                            <td>{{$ct->nhom->ten_vi}}</td> 
                            <td class="text-center" width="10%">{{$ct->nhiemvu->ten_vi}}</td>    
                            <td class="text-center" width="10%">{{$ct->nhom->linhvuc->ten_vi}}</td>
                        </tr>  
                         @endforeach                          
                    </tbody> 
            </table> 
        </div> 
    </form>  
</div>
 <a href="set_giangvien/nhom-nghien-cuu/danh-sach-phan-cong-bao-cao" title="Danh sách phân công báo cáo">
    <button class="btn btn-primary">Danh sách phân công báo cáo</button>
 </a>
<a href="set_giangvien"><button class=" btn btn-danger  btn2" id="xoahet">Thoát</button></a>
 @endsection



