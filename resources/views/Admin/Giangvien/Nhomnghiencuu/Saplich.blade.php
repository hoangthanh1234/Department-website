@extends('Admin.Master')
@section('title','Thêm thành viên mới')
@section('content') 

<div class="h3 text-center">Sắp lịch báo cáo cho  <span style="color:red">{{$Baocao->ten_vi}}</span></div><br>

<div class="box">

	<div class="container" style="max-width:500px;margin-top:20px;">
        @if(session('canhbao'))
            <div class="alert alert-warning">
                {{session('canhbao')}}
            </div>
        @endif

         @if(session('thongbao'))
            <div class="alert alert-success">
                {{session('thongbao')}}
            </div>
        @endif
    </div>

<div class="body-box">
<form  method="post" action="set_giangvien/nhom-nghien-cuu/sap-lich/{{$Baocao->id}}" enctype="multipart/form-data">	

	<div class="row">
		<div class="col-lg-6 col-md-6 col-xs-12">
			<b class="ten2x">Ngày báo cáo</b>
			<div class="input-group date">
		      <input type="text" id="ngaybaocao" name="ngaybaocao" class="form-control datepicker"  value="{{date('d/m/Y', strtotime(Carbon\Carbon::now()))}}"  placeholder="Ngày sinh giảng viên">
		      <div class="input-group-addon">
		          <span class="glyphicon glyphicon-th"></span>
		      </div>
		    </div>
		</div>
		<div class="col-lg-6 col-md-6 col-xs-12">
			<b class="ten2x">Buổi</b>
			<select class="form-control" name="buoi" id="buoi">
				<option value="0">Sáng</option>
				<option value="1">Chiều</option>
			</select>
		</div>
	</div>
   <br>	
	<div class="row">
		<div class="col-lg-6 col-md-6 col-xs-12">
			<b class="ten2x">Loại phòng</b>
			<select class="form-control select2" id="id_loaiphong">
				<option value="0">Chọn loại phòng</option>
				@foreach($Loaiphong as $lp)
					<option value="{{$lp->id}}">{{$lp->ten_vi}}</option>
				@endforeach
			</select>			
		</div>
		<div class="col-lg-6 col-md-6 col-xs-12">
			<b class="ten2x">Phòng</b>
			<select class="form-control" id="id_phong" name="id_phong" required>
				<option value="0">Chọn phòng</option>
			</select>
		</div>
	</div>
   <br>   
	<div class="row">
		<div class="col-lg-12 col-md-12">
			<input type="submit" class="btn btn-success" value="Lưu">
			<a href="set_giangvien/nhom-nghien-cuu/danh-sach-bai-bao-cao/{{$Baocao->ct_nhom->id_nhom}}"><input type="button" class="btn btn-danger" value="Thoát"></a>
		</div>		
	</div>
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
</div>
</div>
@endsection

@section('script')
	<script type="text/javascript">
		$(document).on('change','#id_loaiphong',function(){
			var id_baocao = $(this).val();
			var buoi = $('#buoi').val();
			var ngaybaocao = $('#ngaybaocao').val();		
  			
    		$.ajax({

				    method:'POST',
				    url:'set_giangvien/ajax/loadphong',
				    data:{
				        	id_baocao:id_baocao,
				        	buoi:buoi,
				        	ngaybaocao:ngaybaocao,	
				        	_token:token
				        },
				        success: function(data){     				                         
				            $('#id_phong').html(data);
				               
				         },
				        error: function(XMLHttpRequest, textStatus, errorThrown){                     
				                alert("Status: " + textStatus+": "+errorThrown+"!!!!");

				        }
			});

		});
	</script>
@endsection