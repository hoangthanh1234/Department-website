@extends('Admin.Bomon.Danhgiavienchuc.Master')
@section('Tabvalue')
<div role="tabpanel" class="tab-pane  @if ($tab==2) active @endif" id="profile">

<br>	  
	
	<p class="ten2x text-center" style="font-size:25px;margin-bottom:0;font-weight:normal;">Danh sách bài báo</p><br>
	<a href="set_bomon/danh-gia-vien-chuc/list">
		<input type="button" value="Thoát" class="btn btn-danger pull-right" style="margin-bottom:20px;">
	</a>
	<div class="table-responsive">		
		<table  class="table table-bordered table-hover example2" style="width:100%;">
				<thead>
					<tr class="bg-top" style="width:100%">
						<th width="5%" class="text-center">STT</th>
						<th class="text-center" width="5%">Duyệt</th>						
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

									<td class="text-center"><input type="checkbox" class="duyetbaibao"  data-id="{{$chitiet->id}}" data-chitietbaibao="{{$chitiet->id}}"
										@foreach($Phieudanhgia->phieu_nckh_baibaobomonduyet as $phieubb)
											@if($phieubb->id_chitietbaibao == $chitiet->id)
												checked
											@endif
										@endforeach
										>
									</td>

									<td class="text-center"><input type="checkbox"  disabled="disabled" 
										@foreach($Phieudanhgia->phieu_nckh_baibao as $phieubb)
											@if($phieubb->id_chitietbaibao == $chitiet->id)
												checked
											@endif
										@endforeach
										>
									</td>
									<td>{{$chitiet->baibao->ten_vi}}</td>
									<td class="text-center">{{date('d/m/Y', strtotime($chitiet->baibao->nam))}}</td>
									<td class="text-center">
										@if($chitiet->baibao->minhchung!='') <a href="{{$chitiet->baibao->minhchung}}"> Có </a> @endif
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

	</div>

	<p class="ten2x text-center" style="font-size:25px;margin-bottom:0;font-weight:normal;">Danh sách đề tài</p><br>

	<table  class="table table-bordered table-hover example2" style="width:100%!important">
			<thead>
				<tr class="bg-top" style="width:100%">
					<th width="5%" class="text-center">STT</th>
					<th width="5%" class="text-center">Duyệt</th>
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
								<td class="text-center">
									<input type="checkbox" class="duyetdetai" data-id="{{$chitiet->id}}" 								
									data-chitietdetai="{{$chitiet->id}}"
									@foreach($Phieudanhgia->phieu_nckh_detaibomonduyet as $phieudt)
										@if($phieudt->id_chitietdetai == $chitiet->id && $phieudt->bomonduyet==1)
											checked
										@endif
									@endforeach>
								</td>

								<td class="text-center">
									<input type="checkbox" disabled="disabled" 
									@foreach($Phieudanhgia->phieu_nckh_detai as $phieudt)
										@if($phieudt->id_chitietdetai == $chitiet->id && $phieudt->giangvienduyet==1)
											checked
										@endif
									@endforeach>
								</td>

								<td>{{$chitiet->detai->ten_vi}}</td>
								<td class="text-center">{{date('d/m/Y', strtotime($chitiet->detai->ngaynghiemthu))}}</td>
								<td class="text-center">
									@if($chitiet->detai->minhchung!='') <a href="{{$chitiet->detai->minhchung}}"> Có </a> @endif
								</td>
								<td>{{$chitiet->trachnhiem->ten_vi}}</td>
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
				    url:'set_bomon/ajax/duyet-phieu-bai-bao',
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
				    url:'set_bomon/ajax/huy-phieu-bai-bao',
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
				url:'set_bomon/ajax/duyet-phieu-de-tai',
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
				url:'set_bomon/ajax/huy-phieu-de-tai',
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






	</script>
@endsection