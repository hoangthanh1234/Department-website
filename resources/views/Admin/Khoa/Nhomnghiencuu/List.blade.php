@extends('Admin.Master')
@section('title', 'Danh sách nhóm nghiên cứu')
@section('content')   

<div class="h3 padding20 text-center">Danh sách nhóm nghiên cứu</div>
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
                <table class="table table-bordered table-hover example2" style="width:100%">
                    <thead>                 
                        <tr class="bg-top">
                            <th width="5%" class="text-center">#</th>                             
                            <th width="10%" class="text-center">Hành động</th>     
                            <th width="5%" class="text-center">Duyệt</th>
                            <th class="text-center">Tên nhóm</th>      
                            <th width="15%" class="text-center">Trưỡng nhóm</th>                        
                            <th width="20%" class="text-center">Lĩnh vực</th> 
                        </tr>
                    </thead>   
                    <tbody> 

                      @php
                      	$i=1;
                      @endphp  

                        @foreach($Nhom as $n)                                  
                        <tr>
                            <td class="text-center">{{$i++}}</td> 

                            <td class="text-center">
                            	<a href="set_admin/nhom-nghien-cuu/chi-tiet-nhom/{{$n->id}}" title="Xem chi tiết nhóm"  class=" btn btn-primary">
                            	 	<i class="fa fa-wpexplorer" aria-hidden="true"></i>
                                </a>

                            	<a href="set_admin/nhom-nghien-cuu/xoa/{{$n->id}}" onClick="if(!confirm('Xác nhận xóa nhóm nghiên cứu này:')) return false;" class=" btn btn-danger">
                            	 	<i class="fa fa-times text-dange"></i>
                                </a>

                                <a href="set_admin/nhom-nghien-cuu/danh-sach-thanh-vien/{{$n->id}}" title="Danh sách thành viên" class=" btn btn-success">
                                    <i class="fa fa-list-alt" aria-hidden="true"></i>
                                </a>
                            </td>
                             
                            <td class="text-center" class="text-center"> 	                            
	                           <input type="checkbox" class="mycheck" @if($n->trangthai == 1) checked @endif  data-id={{$n->id}}>
	                        </td>	                       

                            <td>{{$n->ten_vi}}</td> 

                            <td class="text-center" class="text-center">
                            	@php
                            		$tn = '';
                            		foreach($n->truongnhom as $truong){
                            			$tn.=$truong->giangvien->ten.',';
                            		}                            		
                            		echo rtrim($tn,',');
                            	@endphp
                            </td>  
                            <td width="10%" class="text-center">{{$n->linhvuc->ten_vi}}</td>  
                        </tr>  
                         @endforeach                          
                    </tbody> 
            </table> 
        </div> 
    </form>  
    <br>
    <a href="set_admin"><button class=" btn btn-danger  btn2" id="xoahet">Thoát</button></a>
</div>

 @endsection

@section('script')
	<script type="text/javascript">
		$(document).on('change','.mycheck',function(){
			var id = $(this).data('id');
			if($(this).is(':checked')){
				$.get("set_admin/ajax/duyetnhomnghiencuu/"+id+"/"+1,function(data){
					alert("Cập nhật trạng thái thành công");
       				location.reload();
  			 	}); 
			}else{
				$.get("set_admin/ajax/duyetnhomnghiencuu/"+id+"/"+0,function(data){
					alert("Cập nhật trạng thái thành công");
       				location.reload();       				
  			 	});
			}

		});
		
	</script>
@endsection



