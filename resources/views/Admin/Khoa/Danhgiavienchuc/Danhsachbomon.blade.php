@extends('Admin.Master')
@section('title', 'Danh bộ môn thuộc khoa')
@section('content')  
<div class="h3 padding20 text-center">Danh sách kết quả đánh giá viên chức các bộ môn thuộc khoa</div>
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
                    <th width="5%" class="text-center">STT</th>
                    <th width="10%" class="text-center">Danh sách</th>
                   <!--  <th width="10%" class="text-center">Xuất PDF</th> -->
                    <th class="text-center">Tên</th>
                    <th width="20%" class="text-center">Email</th>                                  
                </tr>
               </thead>   
                <tbody>  
                <?php $i=1; ?> 
                @foreach($Bomon as $BM)                                  
                    <tr>
                        <td class="text-center">{{$i++}}</td>                                         
                        <td class="text-center">                                                   
                            <a title="Sửa bài viết" href="set_admin/danh-gia-vien-chuc/danh-sach-thanh-vien/{{$BM->id}}">
                            	<i class="fa fa-2x fa-edit"></i>
                            </a>
                        </td>
                        <!-- <td class="text-center"><a href="set_admin/PDF/bomon/{{$BM->id}}">Export</a></td> -->
                        <td>{{$BM->ten_vi}}</td>
                        <td class="text-center">{{$BM->email}}</td>                                           
                    </tr>  
                @endforeach                          
                </tbody> 
            </table> 
        </div> 
        </form>  
    </div>            
    <a href="set_admin"><button class=" btn btn-danger">Thoát</button></a>
    @endsection



