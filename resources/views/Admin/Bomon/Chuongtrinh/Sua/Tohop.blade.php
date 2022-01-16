@extends('Admin.Bomon.Chuongtrinh.Sua.Masteredit')
@section('Tabvalue')
<div role="tabpanel" class="tab-pane @if ($tab==3) active @endif" id="profile">	
<br>
{{-- <form  method="post" action="set_admin/chuong-trinh/cap-nhat-chuong-trinh/to-hop/{{$Chuongtrinh->id}}.html" enctype="multipart/form-data"> --}}

	<table class="table table-bordered table-hover example2">

		<thead>
			<tr class="bg-top">				
				<td class="text-center" width="5%">STT</td>
				<td class="text-center" width="12%">Hành động</td>
				<td class="text-center">Tên tổ hợp</td>
				<td class="text-center" width="5%">Điểm</td>				
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
		</tfoot>
		<tbody>
			<?php $i=1;?>
			@foreach($Chuongtrinh->ct_xettuyen as $ctxt)
			<tr>
				<td class="text-center">{{$i++}}</td>
				<td class="text-center">
					<a class="btn btn-link btn-warning capnhattohop" data-id="{{$ctxt->id_tohop}}">
                        <i class="fa fa-edit" style="color:white;" title="Cập nhật tổ hợp"></i>
                    </a>
                    <a onclick="return confirm('Xác nhận xóa?')" href="{{ asset('/set_bomon/chuong-trinh/cap-nhat-chuong-trinh/to-hop/xoatohopmoi/'.$ctxt->id_tohop) }}" class="btn btn-link btn-danger" >
                        <i class="fa fa-times" style="color:white;" aria-hidden="true"  title="Xóa tổ hợp này" data-toggle="tooltip"></i>
                    </a>
				</td>				
				<td>{{$ctxt->tohop->ten}} ({{$ctxt->tohop->monxt}})</td>
				<td class="text-center">{{$ctxt->diem}}</td>	
				<div id="modalcapnhat{{$ctxt->id_tohop}}" class="modal fade" role="dialog">
				  <div class="modal-dialog">

					<form action="{{ asset('/set_bomon/chuong-trinh/cap-nhat-chuong-trinh/to-hop/capnhattohop') }}" method="post">
						<!-- Modal content-->
						<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Cập nhật tổ hợp xét tuyển</h4>
						</div>
						<div class="modal-body">
							<input type="hidden" name="_token" value="{{ csrf_token() }}" hidden>
							<input type="hidden" name="tohop" value="{{ $ctxt->id_tohop }}" hidden>
							<div class="row">
								<div class="col-lg-12 col-md-12">
									<label>Tên tổ hợp:</label>
									<input type="text" class="form-control" style="border:none;" readonly value="{{$ctxt->tohop->ten}} ({{$ctxt->tohop->monxt}})">
								</div> 
							</div>
							<div class="row">
								<div class="col-lg-3 col-md-4">
									<label>Điểm</label>
									<input type="text" class="text-center form-control " name="diem" value="{{$ctxt->diem}}" id="diemtohop{{$ctxt->id_tohop}}">				        		
								</div>				        	
							</div>
						</div>
						<div class="modal-footer">
							<input type="submit" class="btn btn-success" data-id="{{$ctxt->id_tohop}}" value="Lưu">
							<button type="button" class="btn btn-danger" data-dismiss="modal">Thoát</button>
						</div>
						</div>
					</form>
				    
				  </div>
			</div>
			</tr>			
			@endforeach			
		</tbody>		
	</table>
	<input type="button" value="Thêm"  class="btn btn-success" data-toggle="modal" data-target="#modalthem">
	<a href="{{ asset('set_bomon/chuong-trinh/list') }}"><input type="button" value="Thoát" class="btn btn-danger" name=""></a>
{{-- </form> --}}



<div id="modalthem" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<form action="{{ asset('/set_bomon/chuong-trinh/cap-nhat-chuong-trinh/to-hop/themtohopmoi') }}" method="post">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Thêm tổ hợp mới</h4>
					</div>
				<div class="modal-body">
					<input type="hidden" name="_token" value="{{ csrf_token() }}" hidden>
					<div class="row">
						<div class="col-lg-10 col-md-10">
							<label>Tên tổ hợp:</label>
							<select class="form-control" name="tohop">
								@foreach($Tohop as $th)
									<option value="{{$th->id}}">{{$th->ten}} ({{$th->monxt}})</option>
								@endforeach
							</select>
							
						</div>	
						<div class="col-lg-2 col-md-2">
							<label>Điểm</label>
							<input type="text" class="form-control text-center" name="diem" required>
						</div>			      
					</div>
				</div>

				<div class="modal-footer">
					<input type="submit" class="btn btn-success" value="Lưu">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Thoát</button>
				</div>
			</div>
		</form>
		
	</div>
</div>




</div>
@endsection



@section('script')
	<script type="text/javascript">
		$(document).on('click','.capnhattohop',function(){
			var id = $(this).data('id');
			$('#modalcapnhat'+id).modal();
		});

		$(document).on('click','.btn-tohop',function(){
			var id = $(this).data('id');
			var id_chuongtrinh = <?=$Chuongtrinh->id?>;	
			var diem = $('#diemtohop'+id).val();		
			$.ajax({
	            url: "set_admin/ajax/capnhattohop/"+id_chuongtrinh+"/"+id+"/"+diem,
	            type: 'GET',
	            dataType: 'html',  
	            success: function(data){                      
	               alert(data); window.location.reload();                
	           },
	            error: function(XMLHttpRequest, textStatus, errorThrown){                     
	                alert("Status: " + textStatus+": "+errorThrown+"!!!! Không thể thực hiện yêu cầu!!! Vui Lòng kiểm tra Lại");

	            }

        	});
		});

		$(document).on('click','.xoatohopmoi',function(){
			var id = $(this).data('id');			
			var id_chuongtrinh = <?=$Chuongtrinh->id?>;	
					
			$.ajax({
	            url: "set_admin/ajax/xoatohopmoi/"+id_chuongtrinh+"/"+id,
	            type: 'GET',
	            dataType: 'html',  
	            success: function(data){                      
	               alert(data); window.location.reload();                
	           },
	            error: function(XMLHttpRequest, textStatus, errorThrown){                     
	                alert("Status: " + textStatus+": "+errorThrown+"!!!! Không thể thực hiện yêu cầu!!! Vui Lòng kiểm tra Lại");

	            }

        	});
		});

		$(document).on('click','#luuthemtohop',function(){
			var id_chuongtrinh = <?=$Chuongtrinh->id?>;
			var tohop = $('#tohopthem').val();
			var diem = $('#diemthem').val();
			if($.isNumeric(diem) == false){
				alert('Vui lòng nhập điểm');
				return false;
			}
			if(diem <= 0){
				alert('Vui lòng nhập điểm là số dương khác 0');
				return false;
			}

			$.ajax({
	            url: "set_admin/ajax/themtohopmoi/"+id_chuongtrinh+"/"+tohop+"/"+diem,
	            type: 'GET',
	            dataType: 'html',  
	            success: function(data){                      
	               alert(data); window.location.reload();                
	           },
	            error: function(XMLHttpRequest, textStatus, errorThrown){                     
	                alert("Status: " + textStatus+": "+errorThrown+"!!!! Không thể thực hiện yêu cầu!!! Vui Lòng kiểm tra Lại");

	            }

        	});

		});
	</script>
@endsection