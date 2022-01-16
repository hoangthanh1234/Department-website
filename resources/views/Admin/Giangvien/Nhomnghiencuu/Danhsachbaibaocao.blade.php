@extends('Admin.Master')
@section('title', 'Danh sách nhóm nghiên cứu tham gia')
@section('content')   

<div class="h3 padding20 text-center">Danh sách bài báo cáo thuộc nhóm {{$Nhom->ten_vi}}</div>
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
                            <th width="15%" class="text-center">Hành động</th>                                 
                            <th class="text-center">Tên báo cáo</th>  
                            <th width="5%">Pdf_vi</th>
                            <th width="5%">Pdf_en</th>
                            <th width="5%">Pptx_vi</th>
                            <th width="5%">Pptx_en</th>
                            <th class="text-center" width="10%">Trạng thái</th>                            
                            <th width="10%" class="text-center">Tác giả</th> 
                        </tr>
                    </thead>   
                    <tbody> 

                      @php
                      	$i=1;
                      @endphp  

                        @foreach($Baocao as $bc)

                        <tr>
                            <td class="text-center">{{$i++}}</td> 
                             
                            <td class="text-center">

                                @foreach($Nhom->truongnhom as $tn)
                                  @if($tn->id_giangvien == Session::get('user_id')) 
                                        @if($bc->trangthai == 0)
                                            <a href="set_giangvien/nhom-nghien-cuu/sap-lich/{{$bc->id}}" title="Sắp lịch cho bài báo cáo này" class=" btn btn-primary">
                                                <i class="fa fa-calendar-check-o" aria-hidden="true"></i>   
                                            </a> 
                                        @endif                                           

                                    <a href="set_giangvien/nhom-nghien-cuu/xoa-bao-cao/{{$bc->id}}" title="Xóa bài báo cáo này và xóa các phân công báo cáo liên quan (nếu có)" class=" btn btn-danger" onClick="if(!confirm('Xác nhận Xóa bài báo cáo này và xóa các phân công báo cáo liên quan (nếu có):')) return false;">
                                        <i class="fa fa-times text-dange" aria-hidden="true"></i> 
                                    
                                    </a> 

                                    @endif
                                @endforeach

                                @if($bc->ct_nhom->id_giangvien == Session::get('user_id'))
                                    <a href="set_giangvien/nhom-nghien-cuu/upload-file/{{$bc->id}}" title="Tải tập tin lên" class=" btn btn-success">
                                        <i class="fa fa-upload" aria-hidden="true"></i>
                                    </a>
                                @endif
                               
	                        </td>

                            <td>{{$bc->ten_vi}}</td> 
                            <td class="text-center">@if($bc->pdf_vi) <a href="set_giangvien/ajax/get/{{$bc->pdf_vi}}">Có</a>@endif</td>
                            <td class="text-center">@if($bc->pdf_en) <a href="set_giangvien/ajax/get/{{$bc->pdf_en}}">Có</a>@endif</td>
                            <td class="text-center">@if($bc->pptx_vi) <a href="set_giangvien/ajax/get/{{$bc->pptx_vi}}">Có</a>@endif</td>
                            <td class="text-center">@if($bc->pptx_en) <a href="set_giangvien/ajax/get/{{$bc->pptx_en}}">Có</a>@endif</td>

                            <td class="text-center">
                            	@php
                            		if($bc->trangthai == 0)
                            			echo "Chờ sắp lịch";
                            		if($bc->trangthai == 1)
                            			echo "Đã sắp lịch";
                            		if($bc->trangthai == 2)
                            			echo "Đã báo cáo";
                            	@endphp
                        	</td>
                            <td class="text-center" width="10%">{{$bc->ct_nhom->giangvien->ten}}</td>    
                        </tr>  
                         @endforeach                          
                    </tbody> 
            </table> 
        </div> 
    </form>  
</div>

<a href="set_giangvien/nhom-nghien-cuu/danh-sach-nhom"><button class=" btn btn-danger  btn2">Thoát</button></a>

 @endsection



