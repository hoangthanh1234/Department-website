@extends('Admin.Master')
@section('title','Xếp loại đánh giá giảng viên')
@section('content') 
<div class="h3 padding20 text-center">Danh sách Xếp loại đánh giá giảng viên theo</div>
<p class="text-center h3" style="font-size:20px;padding-top:0;">@if(count($Phieudanhgia)>0){{$Phieudanhgia[0]->thongbao->ten}} @endif</p>


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
		<div class="col-lg-2 col-md-3 col-xs-6" style="margin-left:20px;margin-top:20px;">
			<input type="text" id="tenloaia" class="form-control" style="width:150px;" placeholder="Tên loại 1">
			<input type="text" id="loaia" class="form-control" style="width:50px;" placeholder="%">		
		</div>

		<div class="col-lg-2 col-md-3 col-xs-6"  style="margin-left:20px;margin-top:20px;">
			<input type="text" id="tenloaib" class="form-control" style="width:150px;" placeholder="Tên loại 2">
			<input type="text" id="loaib" class="form-control" style="width:50px;" placeholder="%">
		</div>

		<div class="col-lg-2 col-md-3 col-xs-6"  style="margin-left:20px;margin-top:20px;">
			<input type="text" id="tenloaic" class="form-control" style="width:150px;" placeholder="Tên loại 3">
			<input type="text" id="loaic" class="form-control" style="width:50px;" placeholder="%">
		</div>

		<div class="col-lg-2 col-md-3 col-xs-6"  style="margin-left:20px;margin-top:20px;">
			<input type="text" id="tenloaid" class="form-control" style="width:150px;" placeholder="Tên loại 4">
			<input type="text" id="loaid" class="form-control" style="width:50px;" placeholder="%">
		</div>
	</div>

	<p class="ten2x" style="margin-top:20px; color:red;">Dành cho đánh giá giảng viên có xếp loại Cao nhất</p>

	<div class="row">
		<div class="col-lg-2 col-xs-12">
			<b class="ten2x">Điểm tiêu chuẩn 1</b>
			<input type="text" id="diemtc1" class="form-control" style="width:60px;" placeholder="Điểm">
		</div>
		<div class="col-lg-2 col-xs-12">		
			<b class="ten2x">Điểm tiêu chuẩn 2</b>
			<input type="text" id="diemtc2" class="form-control" style="width:60px;" placeholder="Điểm">
		</div>
	</div>
		
	<div style="display:flex;">
		<button class="btn btn-success" id="xeploaikhoa" style="margin-top:20px;">Xếp loại toàn Khoa</button>		
		<a href="set_admin/PDF/danhsachdanhgiatheokhoa/{{$Thongbao}}" target="_blank">
			<button class="btn btn-success" style="margin-top:20px;margin-left:20px;">Xuất PDF</button>
		</a>
		<a href="set_admin/Excel/danhsachdanhgiatheokhoa/{{$Thongbao}}">
			<button class="btn btn-success" style="margin-top:20px;margin-left:20px;">Xuất Excel</button>
		</a>
		<a href="set_admin">
			<button class="btn btn-danger" style="height:35px;margin-top:20px; margin-left:20px;">Thoát</button>
		</a>
	</div>
</div>
	<div class="modal fade" id="xeploaik" role="dialog">
		<div class="modal-dialog modal-lg"> 
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title ten2x">DANH SÁCH XẾP LOẠI GIẢNG VIÊN</h4>
				</div>
				<div class="modal-body">
					<table class="table table-bordered table-hover">
						<thead>
							<tr class="bg-top">
								<th width="5%">STT</th>
								<th>Tên giảng viên</th>
								<th width="20%">Bộ môn</th>
								<th width="10%" class="text-center">Điểm đạt</th>
								<th width="12%" class="text-center">Điểm vượt</th>
								<th width="10%" class="text-center">Xếp loại</th>
							</tr>
						</thead>
						<tbody id="mybody">						
						</tbody>
					</table>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-success btn-xeploai" data-id="" style="float:left;">Xếp loại</button>
			        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				</div>      
			</div>
		</div>
	</div>
</div>
@endsection

@section('script')

<script type="text/javascript">
	

$(document).on('click','#xeploaikhoa',function(){

	var loaia=parseInt($('#loaia').val());
	var loaib=parseInt($('#loaib').val());
	var loaic=parseInt($('#loaic').val());
	var loaid=parseInt($('#loaid').val());
	var tc1=parseInt($('#diemtc1').val());
	var tc2=parseInt($('#diemtc2').val());

	var tenloaia=$('#tenloaia').val();
	var tenloaib=$('#tenloaib').val();
	var tenloaic=$('#tenloaic').val();
	var tenloaid=$('#tenloaid').val();
	var thongbao=parseInt(<?=$Thongbao?>);

		if(isNaN(loaia)){alert("Nhập loại thứ 1");return false;}
			if(loaia<0 || loaia>100){alert("Loại thứ 1 phải nhỏ hơn 100 và lớn hơn 0");return false;}

		if(isNaN(loaib)){alert("Nhập loại thứ 2");return false;}
			if(loaib<0 || loaib>100){alert("Loại thứ 2 phải nhỏ hơn 100 và lớn hơn 0");return false;}

		if(isNaN(loaic)){alert("Nhập loại thứ 3");return false;}
			if(loaic<0 || loaic>100){alert("Loại thứ 3 phải nhỏ hơn 100 và lớn hơn 0");return false;}

		if(isNaN(loaid)){alert("Nhập loại thứ 4");return false;}				
			if(loaid<0 || loaid>100){alert("Loại thứ 4 phải nhỏ hơn 100 và lớn hơn 0");return false;}

		if(isNaN(tc1)){alert("Vui lòng nhập điểm tiêu chuẩn 1 để xếp loại cao nhất");return false;}				
			if(tc1<0 || loaid>100){alert("Điểm tiêu chuẩn 1 phải lớn hơn 0");return false;}

		if(isNaN(tc2)){alert("Vui lòng nhập điểm tiêu chuẩn 2 để xếp loại cao nhất");return false;}				
			if(tc2<0 || loaid>100){alert("Điểm tiêu chuẩn 2 phải lớn hơn 0");return false;}

		if(thongbao==0){alert("Chọn thông báo");return false;}

		if((loaia+loaib+loaic+loaid)!=100){alert("Tổng các loại 1, 2, 3, 4 phải là 100 Vui lòng kiểm tra lại");return false;}

		
		if(tenloaia==''){alert('Vui lòng nhập tên loại 1');return false;}
		if(tenloaib==''){alert('Vui lòng nhập tên loại 2');return false;}
		if(tenloaic==''){alert('Vui lòng nhập tên loại 3');return false;}
		if(tenloaid==''){alert('Vui lòng nhập tên loại 4');return false;}

		$.get("set_admin/ajax/xeploaitoankhoatheopt/"+thongbao+"/"+loaia+"/"+loaib+"/"+loaic+"/"+loaid+"/"+tenloaia+"/"+tenloaib+"/"+tenloaic+"/"+tenloaid+"/"+tc1+"/"+tc2,function(data){
		         $('#mybody').html(data);
		});

		$("#xeploaik").modal();
				
});

$(document).on('click','.btn-xeploai',function(){
	$(this).html("Đang xữ lý");
	var loaia=parseInt($('#loaia').val());
	var loaib=parseInt($('#loaib').val());
	var loaic=parseInt($('#loaic').val());
	var loaid=parseInt($('#loaid').val());
	var tc1=parseInt($('#diemtc1').val());
	var tc2=parseInt($('#diemtc2').val());

	var tenloaia=$('#tenloaia').val();
	var tenloaib=$('#tenloaib').val();
	var tenloaic=$('#tenloaic').val();
	var tenloaid=$('#tenloaid').val();
	var thongbao=<?=$Thongbao?>;

	$.get("set_admin/ajax/luuxeploaitoankhoatheopt/"+thongbao+"/"+loaia+"/"+loaib+"/"+loaic+"/"+loaid+"/"+tenloaia+"/"+tenloaib+"/"+tenloaic+"/"+tenloaid+"/"+tc1+"/"+tc2,function(data){
		        alert(data);
		        window.location.reload();
	});
});

</script>
@endsection