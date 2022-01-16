@extends('Admin.Khoa.Danhgiavienchuc.Master')
@section('Tabvalue')
<div role="tabpanel" class="tab-pane  @if ($tab==2) active @endif" id="profile">

<br>	  

	<p class="ten2x text-center" style="font-size:25px;margin-bottom:0;font-weight:normal;">Danh sách bài báo</p><br>
	<a href="set_admin/danh-gia-vien-chuc/danh-sach-thanh-vien/{{$Phieudanhgia->giangvien->bomon->id}}">
		<input type="button" value="Thoát" class="btn btn-danger pull-right" style="margin-bottom:20px;">
	</a>
	<br>
		
		<table  class="table table-bordered table-hover example2" style="width:100%;">
				<thead>
					<tr class="bg-top" style="width:100%">
						<th width="5%" class="text-center">STT</th>
						<th width="5%" class="text-center">Edit</th>
						<th class="text-center" width="5%">Duyệt</th>
						<th class="text-center" width="8%">BM duyệt</th>						
						<th class="text-center" width="5%">Chọn</th>
						<th>Tên bài báo</th>				
						<th width="11%" class="text-center">Năm xuất bản</th>
						<th width="9%" class="text-center">Minh chứng</th>
						<th width="15%" class="text-center">Loại tác giả</th>
						<th width="15%" class="text-center">Loại bài báo</th>
						<th width="8%" class="text-center">Điểm đạt</th>					
					</tr>
				</thead>	
				<tbody>				
					<?php $i=1; ?>
					@foreach($Chitietbaibao as $chitiet)
						@foreach($Tieuchibaibao as $tcbb)
							@if($chitiet->baibao->loaibaibao->id == $tcbb->id_loaibaibao && $chitiet->loaitacgia->id == $tcbb->id_loaitacgia)
								<tr>
									<td class="text-center">{{$i++}}</td>
									<td><i class="fa fa-asterisk btn btn-warning capnhatbaibao" data-ten="{{$chitiet->baibao->ten_vi}}" aria-hidden="true" data-id="{{$chitiet->id}}"></i></td>
									<td class="text-center"><input type="checkbox" class="duyetbaibao"  data-id="{{$chitiet->id}}" data-chitietbaibao="{{$chitiet->id}}"
										@foreach($Phieudanhgia->phieu_nckh_baibaokhoaduyet as $phieubb)
											@if($phieubb->id_chitietbaibao == $chitiet->id)
												checked
											@endif
										@endforeach
										>
									</td>

									<td class="text-center">
										<input type="checkbox" disabled="disabled" 
										@foreach($Phieudanhgia->phieu_nckh_baibaobomonduyet as $phieubb)
											@if($phieubb->id_chitietbaibao == $chitiet->id)									
												checked																		
											@endif
										@endforeach>
									</td>

									<td class="text-center"><input type="checkbox"  disabled="disabled" 
										@foreach($Phieudanhgia->phieu_nckh_baibaotrong as $phieubb)
											@if($phieubb->id_chitietbaibao == $chitiet->id && $phieubb->giangvienduyet==1)
												checked
											@endif
										@endforeach
										>
									</td>
									<td>{{$chitiet->baibao->ten_vi}}</td>
									<td class="text-center">{{date('d/m/Y', strtotime($chitiet->baibao->nam))}}</td>
									<td class="text-center">
										@if($chitiet->baibao->minhchung!='')<a href="{{$chitiet->baibao->minhchung}}">Có</a> @else Chờ cập nhật @endif
									</td>
									<td>{{$chitiet->loaitacgia->ten_vi}}</td>
									<td>{{$chitiet->baibao->loaibaibao->ten_vi}}</td>
									<td class="text-center">													 		
										<input type="text" class="bordernone" id="diembb{{$chitiet->id}}" data-tieuchi="{{$tcbb->id}}" value="{{$tcbb->diem}}" readonly>							 	
									</td>
								</tr>
							@endif
						@endforeach
					@endforeach
				</tbody>				
		</table>

	

	<p class="ten2x text-center" style="font-size:25px;margin-bottom:0;font-weight:normal;">Danh sách đề tài</p><br>

	<table  class="table table-bordered table-hover example2" style="width:100%!important">
			<thead>
				<tr class="bg-top" style="width:100%">
					<th width="5%" class="text-center">STT</th>
					<th width="5%" class="text-center">Edit</th>
					<th width="5%" class="text-center">Duyệt</th>
					<th width="8%" class="text-center">BM duyệt</th>
					<th width="5%" class="text-center">Chọn</th>
					<th>Tên đề tài</th>				
					<th width="15%" class="text-center">Ngày nghiệm thu</th>
					<th width="10%" class="text-center">Minh chứng</th>
					<th width="10%" class="text-center">Vai trò</th>
					<th width="10%" class="text-center">Cấp đề tài</th>					
					<th width="10%" class="text-center">Điểm đạt</th>
				</tr>
			</thead>
			<tbody>
				<?php $j=1;?>
				@foreach($Chitietdetai as $chitiet)
					@foreach($Tieuchidetai as $tcdt)
						@if($chitiet->detai->capdetai->id == $tcdt->id_capdetai && $chitiet->trachnhiem->id == $tcdt->id_trachnhiemdetai && $chitiet->tren6thang == $tcdt->tren6thang)
							<tr>
								<td class="text-center">{{$j++}}</td>
								<td><i class="fa fa-asterisk btn btn-warning capnhatdetai" data-ten="{{$chitiet->detai->ten_vi}}" aria-hidden="true" data-id="{{$chitiet->id}}"></i></td>
								<td class="text-center">
									<input type="checkbox" class="duyetdetai" data-id="{{$chitiet->id}}" 								
									data-chitietdetai="{{$chitiet->id}}"
									@foreach($Phieudanhgia->phieu_nckh_detaikhoaduyet as $phieudt)
										@if($phieudt->id_chitietdetai == $chitiet->id)
											checked
										@endif
									@endforeach>
								</td>

								<td class="text-center">
									<input type="checkbox" disabled="disabled" 
									@foreach($Phieudanhgia->phieu_nckh_detaibomonduyet as $phieudt)
										@if($phieudt->id_chitietdetai == $chitiet->id)									
											checked																		
										@endif
									@endforeach>
								</td>

								<td class="text-center">
									<input type="checkbox" disabled="disabled" 
									@foreach($Phieudanhgia->phieu_nckh_detai as $phieudt)
										@if($phieudt->id_chitietdetai == $chitiet->id)
											checked																		
										@endif
									@endforeach>
								</td>

								<td>{{$chitiet->detai->ten_vi}}</td>
								<td class="text-center">{{date('d/m/Y', strtotime($chitiet->detai->ngaynghiemthu))}}</td>
								<td class="text-center">
									@if($chitiet->detai->minhchung!='')<a href="{{$chitiet->detai->minhchung}}">Có</a>  @else Chờ cập nhật @endif
								</td>
								<td class="text-center">{{$chitiet->trachnhiem->ten_vi}}</td>
								<td class="text-center">{{$chitiet->detai->capdetai->ten_vi}}</td>
								<td class="text-center">										
									<input type="text" class="bordernone" id="diemdt{{$chitiet->id}}" data-tieuchi="{{$tcdt->id}}" value="{{$tcdt->diem}}" readonly>									 	
								</td>						
							</tr>
						@endif
					@endforeach
				@endforeach
			</tbody>					
	</table>
	<a href="set_admin/danh-gia-vien-chuc/danh-sach-thanh-vien/{{$Phieudanhgia->giangvien->bomon->id}}">
		<input type="button" value="Thoát" class="btn btn-danger pull-right" style="margin-bottom:20px;">
	</a>
</div> 





<div id="capnhatbaibao" class="modal fade" role="dialog">
  <div class="modal-dialog">    
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Cập nhật bài báo</h4>
        <p id="tenten"></p>
      </div>
      <div class="modal-body">
        <div class="row">
        	<div class="col-lg-6 col-md-6 col-xs-12">
        		<b class="ten2x">Loại Bài báo</b>
        		<select class="form-control" id="loaibaibao">
        			
        		</select>
        	</div>
        	<div class="col-lg-6 col-md-6 col-xs-12">
        		<b class="ten2x">Loại tác giả</b>
        		<select class="form-control" id="loaitacgia">
        			
        		</select>
        	</div>
        </div>
        <input type="hidden" id="id_ct_baibao">
      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-primary" id="luucapnhatbaibao">Lưu</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
      </div>
    </div>
  </div>
</div>

<div id="capnhatdetai" class="modal fade" role="dialog">
  <div class="modal-dialog">    
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Cập nhật đề tài</h4>
        <p id="tendetai"></p>
      </div>
      <div class="modal-body">
        <div class="row">
        	<div class="col-lg-6 col-md-6 col-xs-12">
        		<b class="ten2x">Cấp đề tài</b>
        		<select class="form-control" id="capdetai">
        			
        		</select>
        	</div>
        	<div class="col-lg-6 col-md-6 col-xs-12">
        		<b class="ten2x">Trách nhiệm đề tài</b>
        		<select class="form-control" id="trachnhiem">
        			
        		</select>
        	</div>
        </div>
        <input type="hidden" id="id_ct_detai">
      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-primary" id="luucapnhatdetai">Lưu</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
      </div>
    </div>
  </div>
</div>








@endsection


@section('script')
	<script type="text/javascript">

		$(document).on('click','.duyetbaibao',function(){
			var id=$(this).data('id');
			var id_tieuchi = $('#diembb'+id).data('tieuchi');
			var id_phieu = <?=$Phieudanhgia->id?>;
			var id_chitietbaibao=$(this).data('chitietbaibao');	
					
			if($(this).is(':checked')){

				 $.ajax({
				    method:'POST',
				    url:'set_admin/ajax/duyet-phieu-bai-bao',
				    data:{
				        	id_tieuchi:id_tieuchi,
				        	id_phieu:id_phieu,	
				        	id_chitietbaibao:id_chitietbaibao,		        	
				        	_token:token
				        },
				        success: function(data){                      
				                alert(data);window.location.reload();
				         },
				         error: function(XMLHttpRequest, textStatus, errorThrown){                     
				                alert("Status: " + textStatus+": "+errorThrown+"!!!!");

				         }
				});
				
			}
			else
			{
				$.ajax({
				    method:'POST',
				    url:'set_admin/ajax/huy-phieu-bai-bao',
				    data:{
				        	id_tieuchi:id_tieuchi,
				        	id_phieu:id_phieu,	
				        	id_chitietbaibao:id_chitietbaibao,			        	
				        	_token:token
				        },
				        success: function(data){                      
				                alert(data);window.location.reload();
				         },
				         error: function(XMLHttpRequest, textStatus, errorThrown){                     
				                alert("Status: " + textStatus+": "+errorThrown+"!!!!");

				         }
				});				 
			}
		});


$(document).on('click','.duyetdetai',function(){
	var id=$(this).data('id');
	var id_tieuchi = $('#diemdt'+id).data('tieuchi');
	var id_phieu = <?=$Phieudanhgia->id?>;
	var id_chitietdetai=$(this).data('chitietdetai');
	
	if($(this).is(':checked')){

		$.ajax({
				method:'POST',
				url:'set_admin/ajax/duyet-phieu-de-tai',
				data:{
				        id_tieuchi:id_tieuchi,
				        id_phieu:id_phieu,	
				        id_chitietdetai:id_chitietdetai,		        	
				        _token:token
				    },
				    success: function(data){                      
				        alert(data);window.location.reload();
				    },
				    error: function(XMLHttpRequest, textStatus, errorThrown){                     
				        alert("Status: " + textStatus+": "+errorThrown+"!!!!");

				    }
				});
				
	}
	else
	{
		$.ajax({
				method:'POST',
				url:'set_admin/ajax/huy-phieu-de-tai',
				data:{
				        id_tieuchi:id_tieuchi,
				        id_phieu:id_phieu,	
				        id_chitietdetai:id_chitietdetai,			        	
				        _token:token
				    },
				    success: function(data){                      
				        alert(data);window.location.reload();
				    },
				    error: function(XMLHttpRequest, textStatus, errorThrown){                     
				        alert("Status: " + textStatus+": "+errorThrown+"!!!!");

				    }
				});				 
			}
		});


$(document).on('click','.capnhatbaibao',function(){
	var id = $(this).data('id');
	var ten = $(this).data('ten');

	$('#tenten').html(ten);
	$.get("set_admin/ajax/loadloaibaibao/"+id,function(data){
        $('#loaibaibao').html(data);
    });

    $.get("set_admin/ajax/loadloaitacgia/"+id,function(data){
        $('#loaitacgia').html(data);
    });   

    $('#id_ct_baibao').val(id);

	$('#capnhatbaibao').modal();

});

$(document).on('click','#luucapnhatbaibao',function(){
	var loaibaibao = $('#loaibaibao').val();
    var loaitacgia = $('#loaitacgia').val();
    var ct_bb = $('#id_ct_baibao').val();

    $.get("set_admin/ajax/capnhatduyetbaibao/"+ct_bb+"/"+loaibaibao+"/"+loaitacgia,function(data){
        if(data != '')
    		alert("Sau khi cập nhật thông tin vừa chọn không có tiêu chí phù hợp Vui lòng kiểm tra lại danh sách tiêu chí NCKH bài báo")
    	else
       		alert("Cập nhật thành công");

        window.location.reload();
    });

});


$(document).on('click','.capnhatdetai',function(){
	var id = $(this).data('id');
	var ten = $(this).data('ten');

	$('#tendetai').html(ten);
	$.get("set_admin/ajax/loadcapdetai/"+id,function(data){
        $('#capdetai').html(data);
    });

    $.get("set_admin/ajax/loadtrachnhiem/"+id,function(data){
        $('#trachnhiem').html(data);
    });   

    $('#id_ct_detai').val(id);

	$('#capnhatdetai').modal();

});

$(document).on('click','#luucapnhatdetai',function(){
	var capdetai = $('#capdetai').val();
    var trachnhiem = $('#trachnhiem').val();
    var ct_dt = $('#id_ct_detai').val();

    $.get("set_admin/ajax/capnhatduyetdetai/"+ct_dt+"/"+capdetai+"/"+trachnhiem,function(data){
    	if(data != '')
    		alert("Sau khi cập nhật thông tin vừa chọn không có tiêu chí phù hợp Vui lòng kiểm tra lại danh sách tiêu chí NCKH đề tài")
    	else
       		alert("Cập nhật thành công");
        window.location.reload();
    });

});



	</script>




@endsection