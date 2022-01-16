@extends('Admin.Khoa.Chuongtrinh.Sua.Masteredit')
@section('Tabvalue')
<div role="tabpanel" class="tab-pane @if ($tab==2) active @endif" id="profile">	
<br>
<form  method="post" action="set_admin/chuong-trinh/cap-nhat-chuong-trinh/mon-hoc/{{$Chuongtrinh->id}}.html" enctype="multipart/form-data">

	<table class="table table-bordered table-hover example2">

		<thead>
			<tr class="bg-top">				
				<td class="text-center">STT</td>
				<td class="text-center">Hành động</td>
				<td class="text-center">Tên môn</td>
				<td class="text-center">Bậc</td>
				<td class="text-center">Tự chọn</td>
				<td class="text-center">Học kỳ</td>
				<td class="text-center">Thỉnh giảng</td>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
		</tfoot>
		<tbody>
			<?php $i=1;?>
			@foreach($Chuongtrinh->ct_daotao as $ctdt)
			<tr>
				<td class="text-center">{{$i++}}</td>
				<td class="text-center">
					<a class="btn btn-link btn-warning capnhattacgia" data-id="{{$ctdt->id_mon}}">
                        <i class="fa fa-edit" style="color:white;" title="Cập nhật danh sách tác giả"></i>
                    </a>
                    <a  class="btn btn-link btn-danger xoamonmoi" data-id="{{$ctdt->id_mon}}">
                        <i class="fa fa-times" style="color:white;" aria-hidden="true"  title="Xóa đề tài này" data-toggle="tooltip"></i>
                    </a>
				</td>				
				<td>{{$ctdt->mon->ten_vi}}</td>
				<td class="text-center">{{$ctdt->mon->bacdaotao->ten_vi}}</td>
				<td class="text-center">@if($ctdt->mon->tuchon==1) Có @else Không @endif</td>
				<td class="text-center">{{$ctdt->hocky->ten}}</td>
				<td class="text-center" width="10%">@if($ctdt->thinhgiang == 0) Không @else Có @endif</td>
				<div id="modalcapnhat{{$ctdt->id_mon}}" class="modal fade" role="dialog">
				  <div class="modal-dialog">
				    <!-- Modal content-->
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal">&times;</button>
				        <h4 class="modal-title">Cập nhật môn học</h4>
				      </div>
				      <div class="modal-body">
				        <div class="row">
				        	<div class="col-lg-12 col-md-12">
				        		<label>Tên môn:</label>
				        		<input type="text" class="form-control" style="border:none;" readonly value="{{$ctdt->mon->ten_vi}}">
				        	</div> 
				        </div>
				        <div class="row">
				        	<div class="col-lg-6 col-md-6">
				        		<label>Học kỳ</label>
				        		<select class="form-control" id="hocky{{$ctdt->id_mon}}">
				        			@foreach($Hocky as $hk)
				        				<option value="{{$hk->id}}" @if($hk->id == $ctdt->id_hocky) selected @endif>{{$hk->ten}}</option>
				        			@endforeach
				        		</select>
				        	</div>
				        	<div class="col-lg-6 col-md-6">
				        		<label>Thỉnh giảng</label>
				        		<select class="form-control" id="thinhgiang{{$ctdt->id_mon}}">				        			
				        			<option value="1" @if($ctdt->thinhgiang == 1) selected @endif>Có</option>	
				        			<option value="0" @if($ctdt->thinhgiang == 0) selected @endif>Không</option>			        			
				        		</select>
				        	</div>
				        </div>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-danger" data-dismiss="modal">Thoát</button>
				        <input type="button" class="btn btn-success btn-luumon" data-id="{{$ctdt->id_mon}}" value="Lưu">
				      </div>
				    </div>
				  </div>
			</div>
			</tr>			
			@endforeach
		</tbody>		
	</table>
	<input type="button" value="Thêm"  class="btn btn-success" data-toggle="modal" data-target="#modalthem">
	<a href="set_admin/chuong-trinh/list"><input type="button" value="Thoát" class="btn btn-danger" name=""></a>
</form>


<div id="modalthem" class="modal fade" role="dialog">
	<div class="modal-dialog">
		 <!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				    <h4 class="modal-title ten2x">Thêm môn học mới vào chương trình</h4>
				</div>
			<div class="modal-body">
				<div class="row">
				    <div class="col-lg-12 col-md-12">
				        <label>Chọn môn:</label>
				        <select class="form-control select2" style="display: block;width:100%" id="monthem">
				        	@foreach($Mon as $m)
				        		<option value="{{$m->id}}">{{$m->ten_vi}} ({{$m->bacdaotao->ten_vi}})</option>
				        	@endforeach
				        </select>
				    </div>		      
				</div>
				<br>
				<div class="row">
					<div class="col-lg-6 col-md-6">
						<label>Chọn học kỳ</label>
						<select class=" form-control"  id="hockythem">
							@foreach($Hocky as $hk)
								<option value="{{$hk->id}}">{{$hk->ten}}</option>
							@endforeach
						</select>
					</div>		
					<div class="col-lg-6 col-md-6">
						<label>Thỉnh giảng</label>
						<select class="form-control" id="thinhgiangthem">
							<option value="0">Không</option>
							<option value="1">Có</option>
						</select>
					</div>			
				</div>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Thoát</button>
				<input type="button" class="btn btn-success" id="luuthemmon" value="Lưu">
			</div>
		</div>
	</div>
</div>


</div>
@endsection



@section('script')
	<script type="text/javascript">
		$(document).on('click','.capnhattacgia',function(){
			var id = $(this).data('id');
			$('#modalcapnhat'+id).modal();
		});

		$(document).on('click','.btn-luumon',function(){
			var id = $(this).data('id');
			var hocky = $('#hocky'+id).val();
			var thinhgiang = $('#thinhgiang'+id).val();
			var id_chuongtrinh = <?=$Chuongtrinh->id?>;			
			$.ajax({
	            url: "set_admin/ajax/capnhatmon/"+id_chuongtrinh+"/"+id+"/"+hocky+"/"+thinhgiang,
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

		$(document).on('click','.xoamonmoi',function(){
			var id = $(this).data('id');			
			var id_chuongtrinh = <?=$Chuongtrinh->id?>;	
					
			$.ajax({
	            url: "set_admin/ajax/xoamonmoi/"+id_chuongtrinh+"/"+id,
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


		$(document).on('click','#luuthemmon',function(){
			var id_chuongtrinh = <?=$Chuongtrinh->id?>;
			var id_mon = $('#monthem').val();
			var hocky = $('#hockythem').val();
			var thinhgiang = $('#thinhgiangthem').val();	
			$.ajax({
	            url: "set_admin/ajax/themmonmoi/"+id_chuongtrinh+"/"+id_mon+"/"+hocky+"/"+thinhgiang,
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