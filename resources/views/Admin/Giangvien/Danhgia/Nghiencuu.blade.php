@extends('Admin.Giangvien.Danhgia.Master')
@section('Tabvalue')
<div role="tabpanel" class="tab-pane  @if ($tab==2) active @endif" id="profile">
<div class="h3 text-center">{{$Thongbaodanhgia->ten}}</div>
<br>

	<p class="ten2x text-center" style="font-size:25px;margin-bottom:0;font-weight:normal;">Danh sách bài báo</p><br>
	<table  class="table table-bordered table-hover example2" style="width:100%!important">
			<thead>
				<tr class="bg-top" style="width:100%">
					<th width="5%" class="text-center">STT</th>
					<th class="text-center" width="5%">Chọn</th>
					<th width="5%" class="text-center">Khoa duyệt</th>
					<th>Tên bài báo</th>
					<th width="12%" class="text-center">Năm xuất bản</th>
					<th width="5%" class="text-center">Minh chứng</th>
					<th width="15%" class="text-center">Loại tác giả</th>
					<th width="15%" class="text-center">Loại bài báo</th>
					<th width="15%" class="text-center">Đạt tiêu chí</th>
					<th width="5%" class="text-center">Đạt giờ NCKH</th>
					<th width="5%" class="text-center">Điểm đạt</th>
				</tr>
			</thead>
			<tbody>
				<?php $i=1; ?>
				@foreach($Chitietbaibao as $chitiet)
					@foreach($Tieuchibaibao as $tcbb)
						 @if($chitiet->baibao->loaibaibao->id == $tcbb->id_loaibaibao && $chitiet->loaitacgia->id == $tcbb->id_loaitacgia && $tcbb->hienthi==1)
							<tr>
								<td class="text-center">{{$i++}}</td>
								<td class="text-center">
									<input type="checkbox" class="mycheckbaibao" data-id="{{$chitiet->id}}" data-chitietbaibao="{{$chitiet->id}}"
									@foreach($Phieudanhgia->phieu_nckh_baibaotrong as $phieubb)
										@if($phieubb->id_chitietbaibao == $chitiet->id)
												@if($phieubb->giangvienduyet == 1)
													checked
												@endif

											@if($phieubb->khoaduyet == 1)
												disabled
											@endif
										@endif
									@endforeach
									 >
								</td>

								<td>
									<input type="checkbox" disabled
									@foreach($Phieudanhgia->phieu_nckh_baibaokhoaduyet as $phieubb)
										@if($phieubb->id_chitietbaibao == $chitiet->id && $phieubb->khoaduyet == 1)
											checked
										@endif
									@endforeach
									 >
								</td>

								<td>{{$chitiet->baibao->ten_vi}}</td>
								<td class="text-center">{{date('d/m/Y', strtotime($chitiet->baibao->nam))}}</td>
								<td class="text-center">
									@if($chitiet->baibao->minhchung!='')
										<a target="_blank" href="{{$chitiet->baibao->minhchung}}"> Có </a>
									@else
										Chờ cập nhật
									@endif
								</td>
								<td>{{$chitiet->loaitacgia->ten_vi}}</td>
								<td>{{$chitiet->baibao->loaibaibao->ten_vi}}</td>
								<td>{{$tcbb->ten}}</td>
								<td class="text-center">{{$tcbb->gio}}</td>
								<td class="text-center">
									<input type="text" class="bordernone" id="diembb{{$chitiet->id}}" data-tieuchi="{{$tcbb->id}}" value="{{$tcbb->diem}}">
									{{-- id_tc={{$tcbb->id}} --}}
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
					<th width="5%" class="text-center">Chọn</th>
					<th width="10%">Khoa duyệt</th>
					<th>Tên đề tài</th>
					<th width="15%" class="text-center">Ngày bắt đầu</th>
					<th width="10%" class="text-center">Minh chứng</th>
					<th width="10%" class="text-center">Vai trò</th>
					<th width="10%" class="text-center">Cấp đề tài</th>
					<th width="5%" class="text-center">Đạt giờ NCKH</th>
					<th width="10%" class="text-center">Điểm đạt</th>
				</tr>
			</thead>
			<tbody>
				<?php $j=1;?>
				@foreach($Chitietdetai as $chitiet)

					@foreach($Tieuchidetai as $tcdt)

						@if($chitiet->detai->capdetai->id == $tcdt->id_capdetai && $chitiet->trachnhiem->id == $tcdt->id_trachnhiemdetai && $chitiet->tren6thang == $tcdt->tren6thang && $tcdt->hienthi==1)
							<tr>
								<td class="text-center">{{$j++}}</td>
								<td class="text-center">
									<input type="checkbox" class="mycheckdetai" data-id="{{$chitiet->id}}"
									data-chitietdetai="{{$chitiet->id}}"
									@foreach($Phieudanhgia->phieu_nckh_detaitrong as $phieudt)
										@if($phieudt->id_chitietdetai == $chitiet->id)
											@if($phieudt->giangvienduyet == 1)
												checked
											@endif

											@if($phieudt->khoaduyet == 1)
												disabled
											@endif
										@endif
									@endforeach
									>
								</td>

								<td>
									<input type="checkbox" disabled
									@foreach($Phieudanhgia->phieu_nckh_detaikhoaduyet as $phieudt)
										@if($phieudt->id_chitietdetai == $chitiet->id && $phieudt->khoaduyet == 1)
											checked
										@endif
									@endforeach
									>
								</td>

								<td>{{$chitiet->detai->ten_vi}}</td>
								<td class="text-center">{{date('d/m/Y', strtotime($chitiet->detai->ngaybatdau))}}</td>
								<td class="text-center">
									@if($chitiet->detai->minhchung!='')<a target="_blank" href="{{$chitiet->detai->minhchung}}">Có</a> @else Chờ cập nhật @endif
								</td>
								<td>{{$chitiet->trachnhiem->ten_vi}}</td>
								<td class="text-center">{{$chitiet->detai->capdetai->ten_vi}}</td>
								<td class="text-center">{{$tcdt->gio}}</td>
								<td class="text-center">
									<input type="text" class="bordernone" id="diemdt{{$chitiet->id}}" data-tieuchi="{{$tcdt->id}}" value="{{$tcdt->diem}}">
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

		$(document).on('click','.mycheckbaibao',function(){
			var id=$(this).data('id');
			var id_tieuchi = $('#diembb'+id).data('tieuchi');
			var id_phieu = <?=$Phieudanhgia->id?>;
			var id_chitietbaibao=$(this).data('chitietbaibao');
			if($(this).is(':checked')){

				 $.ajax({
				    method:'POST',
				    url:'set_giangvien/ajax/themphieubaibao',
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
				         	alert("Đã xảy ra lỗi vui lòng kiểm tra lại, Nếu cột điểm đạt không có điểm thì bài báo hoặc đề tài đó không thuộc danh sách đánh giá");
							window.location.reload();
				         }
				});

			}
			else
			{
				$.ajax({
				    method:'POST',
				    url:'set_giangvien/ajax/xoaphieubaibao',
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
				            alert("Đã xảy ra lỗi vui lòng kiểm tra lại");
				         	window.location.reload();
				         }
				});
			}
		});


$(document).on('click','.mycheckdetai',function(){
	var id=$(this).data('id');
	var id_tieuchi = $('#diemdt'+id).data('tieuchi');
	var id_phieu = <?=$Phieudanhgia->id?>;
	var id_chitietdetai=$(this).data('chitietdetai');

	if($(this).is(':checked')){

		$.ajax({
				method:'POST',
				url:'set_giangvien/ajax/themphieudetai',
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
				        alert("Đã xảy ra lỗi vui lòng kiểm tra lại");
				        window.location.reload();

				    }
				});

			}
	else
	{
		$.ajax({
				method:'POST',
				url:'set_giangvien/ajax/xoaphieudetai',
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
				        alert("Đã xảy ra lỗi vui lòng kiểm tra lại");
				        window.location.reload();

				    }
				});
			}
		});






	</script>
@endsection
