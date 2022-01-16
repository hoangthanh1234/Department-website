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
                            <th class="text-center">Tên báo cáo</th>  
                            <th width="10%" class="text-center">Ngày bắt đầu</th>
                            <th width="7%"  class="text-center">Buổi</th>                           
                            <th width="12%" class="text-center">Trạng thái</th>                            
                            <th width="12%" class="text-center">Tác giả</th> 
                            <th width="10%" class="text-center">Pdf_vi</th>
                            <th width="10%" class="text-center">Pdf_en</th>
                            <th width="10%" class="text-center">Pptx_vi</th>
                            <th width="10%" class="text-center">Pptx_en</th>
                        </tr>
                    </thead>   
                    <tbody> 

                      @php
                      	$i=1;
                      @endphp  

                    @foreach($Phancongbaocao as $pcbc)
                        <tr>
                            <td class="text-center">{{$i++}}</td> 
                             
                            

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
                            <td class="text-center">@if($pcbc->baocao->pdf_vi) <a href="set_admin/ajax/get/{{$pcbc->baocao->pdf_vi}}">Có</a>@endif</td>
                            <td class="text-center">@if($pcbc->baocao->pdf_en) <a href="set_admin/ajax/get/{{$pcbc->baocao->pdf_en}}">Có</a>@endif</td>
                            <td class="text-center">@if($pcbc->baocao->pptx_vi) <a href="set_admin/ajax/get/{{$pcbc->baocao->pptx_vi}}">Có</a>@endif</td>
                            <td class="text-center">@if($pcbc->baocao->pptx_en) <a href="set_admin/ajax/get/{{$pcbc->baocao->pptx_en}}">Có</a>@endif</td>
                        </tr>  
                         @endforeach                          
                    </tbody> 
            </table> 
        </div> 
    </form>  
</div>

<a href="set_giangvien/nhom-nghien-cuu/danh-sach-nhom"><button class=" btn btn-danger  btn2">Thoát</button></a>

 @endsection



