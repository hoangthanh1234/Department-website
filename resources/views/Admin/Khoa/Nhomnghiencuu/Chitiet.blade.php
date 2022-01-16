@extends('Admin.Master')
@section('title', 'Mô tả chi tiết nhóm')
@section('content')   

<div class="h3 padding20 text-center">Mô tả chi tiết nhóm {{$Nhom->ten_vi}}</div>
    <div class="box">   

        <div class="container" style="max-width:500px;margin-top:20px;">
            @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
            @endif
        </div>

    <div class="box-body"> 
    	<div class="row">
    		<div class="col-lg-6 col-md-6 col-xs-12">
    			<b class="ten2x">Mô tả (Vi)</b>
    			<textarea id="tiny">{{$Nhom->mota_vi}}</textarea>
    		</div>

    		<div class="col-lg-6 col-md-6 col-xs-12">
    			<b class="ten2x">Mô tả (En)</b>
    			<textarea id="tiny1">{{$Nhom->mota_en}}</textarea>
    		</div>
    	</div>
    </div>      
    <br>       
        <a href="set_admin/nhom-nghien-cuu/danh-sach-nhom"><button class=" btn btn-danger  btn2" id="xoahet">Thoát</button></a>

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



