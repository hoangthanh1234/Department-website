@extends('Admin.Master')
@section('title', 'Danh sách nhóm nghiên cứu tham gia')
@section('content')   

<div class="h3 padding20 text-center">Danh sách thành viên thuộc nhóm {{$Nhom->ten_vi}}</div>
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
                            <th width="15%" class="text-center">Hành động</th>     
                            <th class="text-center">Giảng viên</th>                              
                            <th width="10%" class="text-center">Vị trị</th> 
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
	                            @foreach($Nhom->truongnhom as $tn)
									@if($tn->id_giangvien == Session::get('user_id'))
										
		                               
		                           		@if($tn->id_giangvien != $ct->giangvien->id)
		                           			<a href="set_giangvien/nhom-nghien-cuu/kich-nhom/{{$ct->nhom->id}}/{{$ct->giangvien->id}}" title="Kích thành viên này ra khỏi nhóm" onClick="if(!confirm('Xác nhận kích thành viên này khỏi nhóm nghiên cứu này:')) return false;" class=" btn btn-danger">
			                                <i class="fa fa-times text-dange"></i>	
			                                </a>
		                           		@endif
		                           			                            	
									@endif
	                            @endforeach 
	                        </td>
                            <td>{{$ct->giangvien->ten}}</td> 
                            <td class="text-center">{{$ct->nhiemvu->ten_vi}}</td>    
                        </tr>  
                         @endforeach                          
                    </tbody> 
            </table> 
        </div> 
    </form>  
</div>
 @foreach($Nhom->truongnhom as $tn)
    @if($tn->id_giangvien == Session::get('user_id'))
    <a href="set_giangvien/nhom-nghien-cuu/them-thanh-vien/{{$tn->id_nhom}}" title="Thêm thành viên mới">
        <button class=" btn btn-success  btn2">Thêm</button>
    </a>
    @endif
 @endforeach
<a href="set_giangvien/nhom-nghien-cuu/danh-sach-nhom"><button class=" btn btn-danger  btn2" id="xoahet">Thoát</button></a>
 @endsection



