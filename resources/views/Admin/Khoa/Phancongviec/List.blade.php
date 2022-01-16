@extends('Admin.Master')
@section('title','Danh sách phân công công việc')
@section('content')

	<div class="h3 padding20 text-center">Danh sách phân công công việc</div>
    <div class="box">

        <div class="container" style="max-width:500px;margin-top:20px;">
            @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                 </div>
            @endif
        </div>

<div class="box-body">
	<div id="tabs">

			 <ul id="ultabs">
	            <li type="#tab1" class="ten2x" style="font-size:18px;font-weight:normal;">Việc đã giao</li>
	            <li type="#tab2" class="ten2x" style="font-size:18px;font-weight:normal;">Việc hoàn thành</li>
	            <li type="#tab3" class="ten2x" style="font-size:18px;font-weight:normal;">Việc trễ hạn</li>
	        </ul>

	    <div class="clearfix"></div>

	    <div id="content_tabs">
			 <div id="tab1">
				<div class="table-responsive">
					<table class="table table-bordered table-hover example2" style="width:100%">
						<thead>
							<tr class="bg-top">
								<th width="5%" class="textStatus">STT</th>
								<th width="8%" class="text-center">Duyệt</th>
								<th width="8%" class="text-center">Hành động</th>
								<th class="text-center">Tên công việc</th>
								<th class="text-center" width="5%">File</th>
								<th class="text-center" width="15%">Ngày bắt đầu</th>
								<th class="text-center" width="15%">Ngày kết thúc</th>
								<th class="text-center" width="15%">Nhận việc</th>
							</tr>
						</thead>
						<tbody>
							<?php $stt1=1; ?>
							@foreach($Phancongviec as $PCV)
							<tr>
								<td class="text-center">{{$stt1++}}</td>
								<td class="text-center">
									<input type="checkbox" @if($PCV->trangthai==1) checked @endif class="checkduyet" data-id="{{$PCV->id}}">
								</td>
								<td class="text-center">
								   <i class="fa fa-edit btn btn-warning" data-toggle="modal" data-target="#capnhatphancong{{$PCV->id}}"></i>
									 <i class="fa fa-times text-dange xoapcv btn btn-danger" data-id="{{$PCV->id}}"></i>
								</td>
								<td>{{$PCV->congviec->ten}}</td>
								<td class="text-center">@if($PCV->minhchung!='') <a href="set_admin/ajax/get/{{$PCV->minhchung}}">Xem</a>@endif</td>
								<td class="text-center">{{date('d/m/Y', strtotime($PCV->ngaybatdau))}}</td>
								<td class="text-center">{{date('d/m/Y', strtotime($PCV->ngayketthuc))}}</td>
								<td class="text-center">{{$PCV->giangvien->ten}}</td>
							</tr>

				<div class="modal fade" id="capnhatphancong{{$PCV->id}}" role="dialog">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">CẬP NHẬT PHÂN CÔNG CÔNG VIỆC</h4>
							</div>
							<div class="modal-body">
								<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
										<div class="form-group">
											<label class="ten2x">Chọn công việc</label><br>
											<select class="form-control select2" id="congviec{{$PCV->id}}" style="width:100%">
												@foreach($Congviec as $CV)
													<option value="{{$CV->id}}" @if($CV->id==$PCV->id_congviec) selected @endif>{{$CV->ten}}</option>
												@endforeach
											</select>
										</div>
									</div>

									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
										<div class="form-group">
											<label class="ten2x">Chọn giảng viên thực hiện</label><br>
											<select class="form-control select2" id="giangvien{{$PCV->id}}" style="width:100%">
												@foreach($Giangvien as $GV)
													<option value="{{$GV->id}}" @if($GV->id==$PCV->id_giangvien) selected @endif>{{$GV->maso}} - {{$GV->ten}}</option>
												@endforeach
											</select>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
										<div class="form-group">
							            	<b class="ten2x">Ngày Bắt đầu</b>
								            <div class="input-group date">
								                <input type="text" id="ngaybatdau{{$PCV->id}}"  class="form-control datepicker" value="{{date('d/m/Y', strtotime($PCV->ngaybatdau))}}" placeholder="ngày bắt đầu công việc">
								                <div class="input-group-addon">
								                    <span class="glyphicon glyphicon-th"></span>
								                 </div>
								            </div>
							            </div>
				       				</div>

				       				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				       					<div class="form-group">
								            <b class="ten2x">Ngày kết thúc</b>
								            <div class="input-group date">
								                <input type="text" id="ngayketthuc{{$PCV->id}}"  class="form-control datepicker" value="{{date('d/m/Y', strtotime($PCV->ngayketthuc))}}" placeholder="ngày kết thúc công việc">
								                <div class="input-group-addon">
								                    <span class="glyphicon glyphicon-th"></span>
								                 </div>
								            </div>
							        	</div>
				       				</div>
       							</div>

       							<div class="row">
       								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
       									<div class="form-group">
							            	<b class="ten2x">Ghi chú</b>
							            	<input type="text" class="form-control" id="ghichu{{$PCV->id}}" value="{{$PCV->ghichu}}">
							        	</div>
							        </div>
       							</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-success btn-luu" data-id="{{$PCV->id}}">Lưu</button>
					    		<button type="button" class="btn btn-danger" data-dismiss="modal">Thoát</button>
							</div>
						</div>
					</div>
				</div>
							@endforeach
						</tbody>
					</table>
				</div>
				<button class=" btn btn-success btn2" data-toggle="modal" data-target="#themphancong">Thêm</button>
            	<button class=" btn btn-danger  btn2" id="xoahet">Xóa</button>


				<div class="modal fade" id="themphancong" role="dialog">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">THÊM PHÂN CÔNG CÔNG VIỆC MỚI</h4>
							</div>
							<div class="modal-body">
								<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
										<div class="form-group">
											<label class="ten2x">Chọn công việc</label><br>
											<select class="form-control select2" id="congviec" style="width:100%">
												@foreach($Congviec as $CV)
													<option value="{{$CV->id}}">{{$CV->ten}}</option>
												@endforeach
											</select>
										</div>
									</div>

									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
										<div class="form-group">
											<label class="ten2x">Chọn giảng viên thực hiện</label><br>
											<select class="form-control select2" id="giangvien" style="width:100%">
												@foreach($Giangvien as $GV)
													<option value="{{$GV->id}}">{{$GV->maso}} - {{$GV->ten}}</option>
												@endforeach
											</select>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
										<div class="form-group">
							            	<b class="ten2x">Ngày Bắt đầu</b>
								            <div class="input-group date">
								                <input type="text" id="ngaybatdau"  class="form-control datepicker" value="{{date('d/m/Y', strtotime(Carbon\Carbon::now()))}}" placeholder="ngày bắt đầu công việc">
								                <div class="input-group-addon">
								                    <span class="glyphicon glyphicon-th"></span>
								                 </div>
								            </div>
							            </div>
				       				</div>

				       				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				       					<div class="form-group">
								            <b class="ten2x">Ngày kết thúc</b>
								            <div class="input-group date">
								                <input type="text" id="ngayketthuc"  class="form-control datepicker" value="{{date('d/m/Y', strtotime(Carbon\Carbon::now()))}}" placeholder="ngày kết thúc công việc">
								                <div class="input-group-addon">
								                    <span class="glyphicon glyphicon-th"></span>
								                 </div>
								            </div>
							        	</div>
				       				</div>
       							</div>

       							<div class="row">
       								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
       									<div class="form-group">
							            	<b class="ten2x">Ghi chú</b>
							            	<input type="text" class="form-control" id="ghichu">
							        	</div>
							        </div>
       							</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-success" id="btn-luu">Lưu</button>
					    		<button type="button" class="btn btn-danger" data-dismiss="modal">Thoát</button>
							</div>
						</div>
					</div>
				</div>
			</div>

			 <div id="tab2">
			 	<div class="table-responsive">
					<table  class="table table-bordered table-hover example2" style="width:100%">
						<thead>
							<tr class="bg-top">
								<th width="5%" class="textStatus">STT</th>
								<th class="text-center">Tên công việc</th>
								<th class="text-center" width="15%">Ngày bắt đầu</th>
								<th class="text-center" width="15%">Ngày kết thúc</th>
								<th class="text-center" width="15%">Ngày hoàn thành</th>
								<th class="text-center" width="15%">Nhận việc</th>
							</tr>
						</thead>
						<tbody>
							<?php $stt2=1; ?>
							@foreach($Viechoanthanh as $VHT)
								<tr>
									<td class="text-center">{{$stt2++}}</td>
									<td>{{$VHT->congviec->ten}}</td>
									<td class="text-center">{{date('d/m/Y', strtotime($VHT->ngaybatdau))}}</td>
									<td class="text-center">{{date('d/m/Y', strtotime($VHT->ngayketthuc))}}</td>
									<td class="text-center">{{date('d/m/Y', strtotime($VHT->ngayhoanthanh))}}</td>
									<td class="text-center">{{$VHT->giangvien->ten}}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			 </div>

			 <div id="tab3">
			 	<div class="table-responsive">
					<table  class="table table-bordered table-hover example2" style="width:100%">
						<thead>
							<tr class="bg-top">
								<th width="5%" class="text-center">STT</th>
								<th width="10%" class="text-center">Cảnh báo</th>
								<th class="text-center">Tên công việc</th>
								<th class="text-center" width="15%">Ngày bắt đầu</th>
								<th class="text-center" width="15%">Ngày kết thúc</th>
								<th class="text-center" width="15%">Nhận việc</th>
							</tr>
						</thead>
						<tbody>
							<?php $stt4=1; ?>
							@foreach($Viectrehan as $VTH)
								<tr>
									<td class="text-center">{{$stt4++}}</td>
									<td class="text-center"><i class="fa fa-google-wallet red fa-2x mail" aria-hidden="true" data-id="{{$VTH->id}}" data-nguoinhan="{{$VTH->giangvien->ten}}"></i></td>
									<td>{{$VTH->congviec->ten}}</td>
									<td class="text-center">{{date('d/m/Y', strtotime($VTH->ngaybatdau))}}</td>
									<td class="text-center">{{date('d/m/Y', strtotime($VTH->ngayketthuc))}}</td>
									<td class="text-center">{{$VTH->giangvien->ten}}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			 </div>
	    </div>
	</div>
</div>


<div class="modal fade" id="goimail" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Gửi Email cảnh báo</h4>
			</div>

			<div class="modal-body">
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<b class="ten2x">Email sẽ được gởi đến:</b>&nbsp; &nbsp;&nbsp; &nbsp; <span class="ten2x" id="nguoinhan"></span>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-xs-12">
						<input type="text" id="moidungmail" class="form-control" placeholder="Nhập nội dung vắn tắt">
					</div>
				</div>
			</div>
		<input type="hidden" id="idmail" name="">
			<div class="modal-footer">
				<button type="button" class="btn btn-success" id="btn-mail">Gởi</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Thoát</button>
			</div>
		</div>
	</div>
</div>


</div>
@endsection


@section('script')

<script type="text/javascript">

	$(document).on('click','#btn-luu',function(){
		var id_congviec=$('#congviec').val();
		var id_giangvien=$('#giangvien').val();
		var ngaybatdau=$('#ngaybatdau').val();
		var ngayketthuc=$('#ngayketthuc').val();
		var ghichu=$('#ghichu').val();

		$(this).html('Đang thực hiện');
        $(this).prop('disabled',true);
        $(this).css('background','red');

		$.ajax({
			method:'POST',
			url:'set_admin/ajax/phancongviec/themmoi',
			data:{
				 id_congviec:id_congviec,
				 id_giangvien:id_giangvien,
				 ngaybatdau:ngaybatdau,
				 ngayketthuc:ngayketthuc,
				 ghichu:ghichu,
				_token:token
				},
				success: function(data){
				    alert(data);window.location.reload();
				},
				error: function(XMLHttpRequest, textStatus, errorThrown){
				   alert("Status: " + textStatus+": "+errorThrown+"!!!!");

				}
		});

	});

	$(document).on('click','.btn-luu',function(){
		var id=$(this).data('id');
		var id_congviec=$('#congviec'+id).val();
		var id_giangvien=$('#giangvien'+id).val();
		var ngaybatdau=$('#ngaybatdau'+id).val();
		var ngayketthuc=$('#ngayketthuc'+id).val();
		var ghichu=$('#ghichu'+id).val();

		$(this).html('Đang thực hiện');
        $(this).prop('disabled',true);
        $(this).css('background','red');

		$.ajax({
			method:'POST',
			url:'set_admin/ajax/phancongviec/capnhat',
			data:{
				 id_congviec:id_congviec,
				 id_giangvien:id_giangvien,
				 ngaybatdau:ngaybatdau,
				 ngayketthuc:ngayketthuc,
				 ghichu:ghichu,
				 id:id,
				_token:token
				},
				success: function(data){
				    alert(data);window.location.reload();
				},
				error: function(XMLHttpRequest, textStatus, errorThrown){
				   alert("Status: " + textStatus+": "+errorThrown+"!!!!");

				}
		});

	});

	$(document).on('click','.xoapcv',function(){
		var id=$(this).data('id');
		$.ajax({
			method:'POST',
			url:'set_admin/ajax/phancongviec/xoa',
			data:{
				 id:id,
				_token:token
				},
				success: function(data){
				    alert(data);window.location.reload();
				},
				error: function(XMLHttpRequest, textStatus, errorThrown){
				   alert("Status: " + textStatus+": "+errorThrown+"!!!!");

				}
		});
	});

	$(document).on('click','.mail',function(){
		var id=$(this).data('id');
		$('#idmail').val(id);
		$('#nguoinhan').html($(this).data('nguoinhan'));
		$('#goimail').modal();
	});

	$(document).on('click','#btn-mail',function(){

		var id= $('#idmail').val();
		var noidung=$('#moidungmail').val();
		$(this).html('Đang thực hiện');
        $(this).prop('disabled',true);
        $(this).css('background','red');
		$.ajax({
			method:'POST',
			url:'set_admin/ajax/phancongviec/goimail',
			data:{
				 id:id,
				 noidung:noidung,
				_token:token
				},
				success: function(data){
				    alert(data);window.location.reload();
				},
				error: function(XMLHttpRequest, textStatus, errorThrown){
				   alert("Status: " + textStatus+": "+errorThrown+"!!!!");

				}
		});

	});

	$(document).on('click','.checkduyet',function(){
		if($(this).is(':checked')){
		$.get("set_admin/ajax/phancongviec/duyetcap1/"+$(this).data('id'),function(data){
		 	alert(data);
		});
	}
	else{
		$.get("set_admin/ajax/phancongviec/huyduyetcap1/"+$(this).data('id'),function(data){
		 	alert(data);
		});
	}

	});

</script>

@endsection
