@extends('Admin.Master')
@section('title','Phân công giảng dạy')
@section('content')  

<div class="h3 padding20 text-center">Chức năng phân công giảng dạy</div>
<style type="text/css">
	.listgroupone:hover{background:#3c763d;color:#fff;}
	.listgrouptwo:hover{background:red;color:#fff;}
	.listgrouplopone:hover{background:#3c763d;color:#fff;}
	.listgrouploptwo:hover{background:red;color:#fff;}
</style>
<div class="box">

<div class="container" style="max-width:500px;">

	@if(count($errors)>0)
	  <div class="alert alert-warning">
	    <strong>Cảnh báo ! ! !</strong>  <br>     
	    @foreach($errors->all() as $err)            
	      {{$err}}! &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br>            
	    @endforeach         
	  </div>
	@endif 
	
	@if(session('canhbao'))
	  <div class="alert alert-warning">
	  	 <strong>Cảnh báo ! ! !</strong>  <br>
	    {{session('canhbao')}}
	  </div>
	@endif  

	@if(session('thongbao'))
	  <div class="alert alert-warning">
	  	 <strong>Thông báo ! ! !</strong>  <br>
	    {{session('thongbao')}}
	  </div>
	@endif
</div>

<div class="box-body"> 
<form  method="post" action="set_admin/phan-cong-giang-day-giang-vien/phan-cong.html" enctype="multipart/form-data">
	<div class="panel panel-success">
	  <div class="panel-heading ten2x">CẤU HÌNH TRƯỚC KHI PHÂN CÔNG</div>
		<div class="panel-body">
		  <div class="row">
			<div class="col-lg-2 col-md-4">
				<label class="ten2x">Số lượng cá thể</label>
				<input type="text" name="soluong" class="form-control text-center" style="width:80px;" placeholder="VD: 100">
			</div>

			<div class="col-lg-2 col-md-4">
				<label class="ten2x">Năm học</label>
				<input type="text" name="namhoc" id="namhoc" class="form-control text-center" style="width:80px;" placeholder="VD: 2018">
			</div>

			<div class="col-lg-2 col-md-4">
				<label class="ten2x">Giờ tối đa</label>
				<input type="text" name="diemtoida" id="diemtoida" class="form-control text-center" style="width:80px;" placeholder="VD: 450">
			</div>
		   </div>
		   <br><br>
		   <input type="submit" value="Phân công giảng dạy" class="btn btn-success">
		  </div>
	</div>	


<br><br>
<div class="panel panel-success">
  <div class="panel-heading ten2x">CHỌN GIẢNG VIÊN TRƯỚC KHI PHÂN CÔNG</div>
  	<div class="panel-body">
  	<div class="row">
		<div class="col-lg-4">			
			<label class="ten2x">Chọn Bộ Môn</label>
			<select class="form-control" id="chonbomon" name="id_bomon">
				<option value="0">Chọn Bộ môn</option>
				@foreach($Bomon as $bm)
					<option value="{{$bm->id}}"> {{$bm->ten_vi}} </option>
				@endforeach
			</select>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-lg-6 col-md-6">
			<ul class="listone" id="danhsachgiangvienone" style="padding-left:0;"></ul>
		</div>

		<div class="col-lg-6 col-md-6">
			<ul class="listtwo" id="danhsachgiangvientwo"></ul>
		</div>	
	</div> 

	<div class="row">
		<div class="col-lg-12 col-md-12">
			<div id="loadmonphancong"></div>
		</div>
	</div>

  	</div>
</div>


<div class="panel panel-success">
  <div class="panel-heading ten2x">CHỌN LỚP TRƯỚC KHI PHÂN CÔNG</div>
	  <div class="panel-body">
	    <div class="row">
			<div class="col-lg-4">
				<label class="ten2x">Chọn Bộ Môn</label>
				<select class="form-control" id="chonbomontwo">
					<option value="0">Chọn Bộ môn</option>
					@foreach($Bomon as $bm)
						<option value="{{$bm->id}}"> {{$bm->ten_vi}} </option>
					@endforeach
				</select>
			</div>
			<div class="col-lg-2 col-md-2">				
				<button class="btn btn-danger xoadanhsachlop" style="padding:7px;margin-top:28px;">Xóa Session lớp</button>
			</div>
		</div>

		<br>

		<div class="row">
			<div class="col-lg-12 col-md-12">
				<ul class="listone" id="danhsachlopone" style="padding-left:0;"></ul>
			</div>	
		</div> 
			<br>
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<ul class="listtwo" id="danhsachloptwo" style="padding-left:0;"></ul>
			</div>	
		</div> 	

	  </div>
</div>

<div class="panel panel-success">
  <div class="panel-heading ten2x">
  	CHỌN LỚP KHÔNG THUỘC KHOA (Nếu có) TRƯỚC KHI PHÂN CÔNG
  </div>
	  <div class="panel-body">
	    <div class="row">
			<div class="col-lg-4">
				<label class="ten2x">Chọn Bộ Môn</label>
				<select class="form-control" id="chonbomonthree">
					<option value="0">Chọn Bộ môn</option>
					@foreach($Bomon as $bm)
						<option value="{{$bm->id}}"> {{$bm->ten_vi}} </option>
					@endforeach
				</select>
			</div>
			<div class="col-lg-2 col-md-2">				
				<button class="btn btn-danger xoadanhsachlopngoaikhoa" style="padding:7px;margin-top:28px;">Xóa Session lớp ngoài khoa</button>
			</div>
		</div>

		<br>

		<div class="row">
			<div class="col-lg-12 col-md-12">
				<ul class="listone" id="danhsachlopngoaikhoaone" style="padding-left:0;"></ul>
			</div>	
		</div> 
			<br>
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<ul class="listtwo" id="danhsachlopngoaikhoatwo" style="padding-left:0;"></ul>
			</div>	
		</div> 	

	  </div>
</div>


<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="submit" value="Phân công giảng dạy" class="btn btn-success">
</form>

	</div>
</div>	
@endsection

@section('script')

	<script type="text/javascript">
		$(document).on('change','#chonbomon',function(){			
			var id = $(this).val();
			$.get("set_admin/phan-cong-giang-day-giang-vien/loadgiangvien/"+id,function(data){					
	            $('#danhsachgiangvienone').html(data);
	        });
		});

		$(document).on('click','.listgroupone',function(){
			var id = $(this).data('id');
			$.get("set_admin/phan-cong-giang-day-giang-vien/addsessiongiangvien/"+id,function(data){

	            $.get("set_admin/phan-cong-giang-day-giang-vien/loadgiangvienbac2/"+data,function(databac2){					
	            	$('#danhsachgiangvientwo').html(databac2);	            	
	        	});
	        	if(data=="0")
	        		alert('Giảng viên này chưa đăng ký môn sở trường có thể giảng dạy.');
	        });			
		});


		$(document).on('click','.listgrouptwo',function(){
			var id = $(this).data('id');			
			$.get("set_admin/phan-cong-giang-day-giang-vien/deletesessiongiangvien/"+id,function(data){	
				if(data == ''){	
					 $('#danhsachgiangvientwo').html('')
					 return false;	
				}	
	            $.get("set_admin/phan-cong-giang-day-giang-vien/loadgiangvienbac2/"+data,function(databac2){					
	            	 $('#danhsachgiangvientwo').html(databac2)

	        	});
	        });			
		});

///////////////////////////////////////////////////////////////////////////////////////////////////////////

		$(document).on('click','.xoadanhsachlop',function(){
			$.get("set_admin/phan-cong-giang-day-giang-vien/xoadanhsachlop",function(data){					
	            	window.location.reload();
	        	});
		});

		$(document).on('change','#chonbomontwo',function(){			
				var id = $(this).val();
				$.get("set_admin/phan-cong-giang-day-giang-vien/loadlop/"+id,function(data){					
	            	$('#danhsachlopone').html(data);
	        	});
		});

		$(document).on('click','.listgrouplopone',function(){
			var id = $(this).data('id');
			$.get("set_admin/phan-cong-giang-day-giang-vien/addsessionlop/"+id,function(data){
	            $.get("set_admin/phan-cong-giang-day-giang-vien/loaddanhsachchitiet/"+data,function(datachitiet){					
	            	$('#danhsachloptwo').html(datachitiet);	            	
	        	});	        	
	        });			
		});
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		$(document).on('click','.xoadanhsachlopngoaikhoa',function(){
			$.get("set_admin/phan-cong-giang-day-giang-vien/xoadanhsachlopngoaikhoa",function(data){					
	            	window.location.reload();
	        	});
		});

		$(document).on('change','#chonbomonthree',function(){			
				var id = $(this).val();
				var nam = $('#namhoc').val();
				if(nam == ''){
					alert('Vui nhòng nhập vào năm học');
					$('#namhoc').focus();
					return false;
				}
				$.get("set_admin/phan-cong-giang-day-giang-vien/loadlopngoaikhoa/"+id+"/"+nam,function(data){					
	            	$('#danhsachlopngoaikhoaone').html(data);
	        	});
		});

		$(document).on('click','.listgrouplopngoaikhoaone',function(){
			var id = $(this).data('id');
			$.get("set_admin/phan-cong-giang-day-giang-vien/addsessionlopngoaikhoa/"+id,function(data){
	            $.get("set_admin/phan-cong-giang-day-giang-vien/loaddanhsachchitietngoaikhoa/"+data,function(datachitiet){					
	            	$('#danhsachlopngoaikhoatwo').html(datachitiet);	            	
	        	});	        	
	        });			
		});

		
	</script>
@endsection