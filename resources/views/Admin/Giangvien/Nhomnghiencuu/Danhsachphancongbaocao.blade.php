@extends('Admin.Master')
@section('title', 'Danh sách nhóm nghiên cứu tham gia')
@section('content')   

<div class="h3 padding20 text-center">Danh sách phân công báo cáo</div>
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
                <table  class="table table-bordered table-hover example2" style="width:100%">
                    <thead>                 
                        <tr class="bg-top">
                            <th width="5%" class="text-center">#</th>                             
                            <th width="8%" class="text-center">Hành động</th>                                 
                            <th class="text-center">Tên báo cáo</th>  
                            <th width="10%" class="text-center">Ngày bắt đầu</th>
                            <th width="7%"  class="text-center">Buổi</th>                           
                            <th width="15%" class="text-center">Trạng thái</th>                            
                            <th width="15%" class="text-center">Tác giả</th> 
                        </tr>
                    </thead>   
                    <tbody> 

                      @php
                      	$i=1;
                      @endphp  

                    @foreach($Phancongbaocao as $pcbc)
                        <tr>
                            <td class="text-center">{{$i++}}</td> 
                             
                            <td class="text-center">
                                @if($pcbc->baocao->ct_nhom->id_giangvien == Session::get('user_id'))                                         
                                    <a href="set_giangvien/nhom-nghien-cuu/xoa-phan-cong-bao-cao/{{$pcbc->id}}" title="Xóa phân công báo cáo bài báo  này" class="btn btn-danger" onClick="if(!confirm('Xác nhận Xóa phân công báo cáo bài báo này:')) return false;">
                                        <i class="fa fa-times text-dange" aria-hidden="true"></i> 
                                    </a> 
                                @endif
	                        </td>

                            <td>{{$pcbc->baocao->ten_vi}}</td>

                            <td class="text-center">{{date('d/m/Y', strtotime($pcbc->ngaybaocao))}}</td>

                            <td class="text-center">
                                @php
                                    if($pcbc->buoi == 0)
                                        echo "Sáng";
                                    if($pcbc->buoi == 1)
                                        echo "Chiều";
                                @endphp
                            </td>

                            <td class="text-center">
                            	@php
                            		if($pcbc->baocao->trangthai == 0)
                            			echo "Chờ sắp lịch";
                            		if($pcbc->baocao->trangthai == 1)
                            			echo "Đã sắp lịch";
                            		if($pcbc->baocao->trangthai == 2)
                            			echo "Đã báo cáo";
                            	@endphp
                        	</td>
                            <td class="text-center" width="10%">{{$pcbc->baocao->ct_nhom->giangvien->ten}}</td>    
                        </tr>  
                         @endforeach                          
                    </tbody> 
            </table> 
        </div> 
    </form>  
</div>

<a href="set_giangvien/nhom-nghien-cuu/danh-sach-nhom"><button class=" btn btn-danger  btn2">Thoát</button></a>

 @endsection



