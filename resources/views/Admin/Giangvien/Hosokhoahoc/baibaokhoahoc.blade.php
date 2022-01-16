@extends('Admin.Giangvien.Hosokhoahoc.Master')
@section('Tabvalue')
<div role="tabpanel" class="tab-pane @if ($tab==4) active @endif" id="profile">
<p class="ten2x" style="font-size:20px;margin-top:30px;margin-bottom:30px;">Bài báo, báo cáo khoa học </p>

  <div class="table-responsive">
 <table class="table table-bordered table-striped example2" style="width:100%">
        <thead>                 
                            <tr class="bg-top">                               
                                <th width="5%"  class="text-center">Sửa</th>
                                <th  width="5%" class="text-center">Xóa</th>
                                <th width="15%" class="text-center">Danh sách tác giả</th> 
                                <th class="text-center">Tên bài báo</th> 
                                <th width="20%" class="text-center">Tên tạp chí/NXB/Nơi cấp</th>
                                <th width="5%" class="text-center">Năm</th>
                                <th width="10%" class="text-center">Minh chứng</th>
                            </tr>
                        </thead> 

                        <tfoot>
                            <tr>                                  
                                <th></th>
                                <th></th> 
                                <th></th> 
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>                                  	
                        </tfoot> 

                        <tbody> 
                         
                          @foreach($Chitietbaibao as $CT)
						    @if ($CT->baibao)           
								<tr>                               
									<td class="text-center">                                                   
										<i class="fa fa-pencil-square-o fa-2x blue" aria-hidden="true" @if($CT->baibao->tacgia == Session::get('user_id')) data-toggle="modal" data-target="#capnhatbaibaokhoahoc{{$CT->baibao->id}}" @endif></i>
									</td> 

									<td class="text-center">
										<i class="fa fa-trash fa-2x red @if($CT->baibao->tacgia == Session::get('user_id')) xoabaibao @endif" aria-hidden="true" data-id="{{$CT->baibao->id}}"></i>
									</td>
									<td class="text-center"><a class="xemngay" data-id="{{$CT->baibao->id}}" data-tacgia="{{$CT->baibao->tacgia}}">Cập nhật</a></td>							
									<td>{{$CT->baibao->ten_vi}}</td>								
									<td>{{$CT->baibao->nxb_vi}}</td>										
									<td class="text-center">{{date('Y', strtotime($CT->baibao->nam))}}</td>
									<td class="text-center">@if ($CT->baibao->minhchung!='khong' && $CT->baibao->minhchung!='') <a style="background:transparent;color:blue;" href="{{$CT->baibao->minhchung}}"  target="_blank">Có</a> @endif</td>	                               
								</tr>  

							{{-- |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| --}}
							{{-- |||||||||||||||||||||||||||||||||||||    CẬP NHẬT BÀI BÁO KHOA HỌC    |||||||||||||||||||||||||||||||||||||||||||||||||||| --}}
							{{-- |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| --}}
							<div class="modal fade" id="capnhatbaibaokhoahoc{{$CT->baibao->id}}" role="dialog">
								<div class="modal-dialog modal-lg"> 
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title ten2x">CẬP NHẬT BÀI BÁO, BÁO CÁO KHOA HỌC:</h4>
										</div>
										<div class="modal-body">
											<div class="row">
												<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
													<div class="form-group">
														<label class="ten2x">Tên bài báo, báo cáo (VI)</label>
														<input type="text" id="ten_vi{{$CT->id}}" class="form-control" placeholder="nhập tên bài báo tiếng Việt" value="{{$CT->baibao->ten_vi}}">
													</div>
												</div>

												<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
													<div class="form-group">
														<label class="ten2x">Tên bài báo, báo cáo (EN)</label>
														<input type="text" id="ten_en{{$CT->id}}"  class="form-control" placeholder="nhập tên bài báo tiếng Anh"  value="{{$CT->baibao->ten_en}}">
													</div>
												</div>				
											</div>

											<div class="row">
												<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
													<div class="form-group">
														<label class="ten2x">Mô tả (VI)</label>							
														<textarea id="mota_vi{{$CT->id}}" class="form-control" placeholder="nhập mô tả bài báo tiếng Việt">{{$CT->baibao->mota_vi}}</textarea>
													</div>
												</div>

												<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
													<div class="form-group">
														<label class="ten2x">Mô tả (EN)</label>
														<textarea id="mota_en{{$CT->id}}"  class="form-control" placeholder="nhập mô tả bài báo tiếng Anh">{{$CT->baibao->mota_en}}</textarea>
													</div>
												</div>				
											</div>
										

											<div class="row">
												<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
													<div class="form-group">
														<label class="ten2x">Tên tạp chí/NXB/Nơi cấp (VI)</label>
														<input type="text" id="nxb_vi{{$CT->id}}"  class="form-control" placeholder="nhập tên tạp chí/NXB/Nơi cấp bằng tiếng Việt"  value="{{$CT->baibao->nxb_vi}}">
													</div>
												</div>

												<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
													<div class="form-group">
														<label class="ten2x">Tên tạp chí/NXB/Nơi cấp (EN)</label>
														<input type="text" id="nxb_en{{$CT->id}}"  class="form-control" placeholder="nhập tên tạp chí/NXB/Nơi cấp bằng tiếng Anh"  value="{{$CT->baibao->nxb_en}}">
													</div>
												</div>
											</div>

											<div class="row">

												<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
													<div class="form-group">
														<label class="ten2x">Số hiệu ISSN (viết liền xxxx-xxxx) </label>
														<input type="text" id="so_issn{{$CT->id}}"  class="form-control" placeholder="nhập số hiệu ISSN"  value="{{$CT->baibao->so_issn}}">
													</div>
												</div>

												<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
													<div class="form-group">
														<label class="ten2x">Loại bài báo</label>
														<select id="loaibaibao{{$CT->id}}"  class="form-control">
															@foreach($Loaibaibao as $LBB)
																<option value="{{$LBB->id}}" @if($LBB->id == $CT->baibao->loaibaibao->id) selected @endif>{{$LBB->ten_vi}}</option>
															@endforeach
														</select>
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
													<b class="ten2x">Ngày xuất bản</b>
													<div class="input-group date">
														<input type="text" id="nam{{$CT->id}}"  class="form-control datepicker" value="{{date('d/m/Y', strtotime($CT->baibao->nam))}}" placeholder="ngày xuất bản">
														<div class="input-group-addon">
															<span class="glyphicon glyphicon-th"></span>
														</div>
													</div>
												</div>

												<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
													<div class="form-group">
															<label class="ten2x">Upload minh chứng</label>
															<div class="row">
																<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6">
																	<input type="text" id="minhchung{{$CT->id}}"  class="form-control" placeholder="nhập liên kết đến minh chứng"  value="{{$CT->baibao->minhchung}}">
																</div>
															</div>	
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
													<div class="form-group">
														<label class="ten2x">Ghi chú</label>
														<textarea id="ghichu{{$CT->id}}"  class="form-control">{{$CT->baibao->ghichu}}</textarea>	
													</div>
												</div>					
											</div>

											<div class="row">
												<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
													<div class="form-group">
														<label class="ten2x">Vai trò trong bài báo</label>
														<select class="form-control" id="loaitacgia{{$CT->id}}">
																@foreach($Loaitacgia as $ltg)
																	<option value="{{$ltg->id}}" @if($ltg->id == $CT->id_loaitacgia) selected @endif>{{$ltg->ten_vi}}</option>
																@endforeach
														</select>
													</div>
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-success btn-luu2" data-id="{{$CT->id}}">Lưu</button>
											<button type="button" class="btn btn-danger" data-dismiss="modal">Thoát</button>
										</div>
									</div>
								</div>
							</div>

							@endif  
						@endforeach 

</tbody> 
</table> 
  </div>
 <!--  <input type="text" class="form-control" id="search" name="search"> -->

   <button class=" btn btn-success btn2" data-toggle="modal" data-target="#thembaibao">Thêm</button>
    	

{{-- |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| --}}
{{-- |||||||||||||||||||||||||||||||||||||    THÊM BÀI BÁO KHOA HỌC    |||||||||||||||||||||||||||||||||||||||||||||||||||||||| --}}
{{-- |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| --}}
<div class="modal fade" id="thembaibao" role="dialog">
	<div class="modal-dialog modal-lg"> 
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title ten2x">THÊM BÀI BÁO, BÁO CÁO KHOA HỌC</h4>
				<p>(* Đồng tác giả chủ nhiệm sẽ thêm đề tài và danh sách thành viên)</p>
			</div>

		<div class="modal-body">
		<form method="post"  enctype="multipart/form-data" id=ajaxform>
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label class="ten2x">Tên bài báo, báo cáo (VI)</label>
						<input type="text" id="ten_vi" class="form-control" placeholder="nhập tên bài báo tiếng Việt">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label class="ten2x">Tên bài báo, báo cáo (EN)</label>
						<input type="text" id="ten_en"  class="form-control" placeholder="nhập tên bài báo tiếng Anh">
					</div>
				</div>				
			</div>

			<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="ten2x">Mô tả (VI)</label>							
							<textarea id="mota_vi" class="form-control" placeholder="nhập mô tả bài báo tiếng Việt"></textarea>
						</div>
					</div>

					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="ten2x">Mô tả (EN)</label>
							<textarea id="mota_en"  class="form-control" placeholder="nhập mô tả bài báo tiếng Anh"></textarea>
						</div>
					</div>				
				</div>
			

			<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="ten2x">Tên tạp chí/NXB/Nơi cấp (VI)</label>
							<input type="text" id="nxb_vi"  class="form-control" placeholder="nhập tên tạp chí/NXB/Nơi cấp bằng tiếng Việt">
					    </div>
					</div>

					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="ten2x">Tên tạp chí/NXB/Nơi cấp (EN)</label>
							<input type="text" id="nxb_en"  class="form-control" placeholder="nhập tên tạp chí/NXB/Nơi cấp bằng tiếng Anh">
					    </div>
					</div>
			</div>

			<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="ten2x">Loại bài báo</label>
							<select id="loaibaibao"  class="form-control">
								@foreach($Loaibaibao as $LKQ)
									<option value="{{$LKQ->id}}">{{$LKQ->ten_vi}}</option>
								@endforeach
							</select>
					    </div>
					</div>

					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="ten2x">Số hiệu ISSN (viết liền xxxx-xxxx) </label>
							<input type="text" id="so_issn"  class="form-control" placeholder="nhập số hiệu ISSN">
					    </div>
					</div>
			</div>

			<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			            <b class="ten2x">Ngày xuất bản</b>
			            <div class="input-group date">
			                <input type="text" id="nam"  class="form-control datepicker" value="{{date('d/m/Y', strtotime(Carbon\Carbon::now()))}}" placeholder="ngày xuất bản">
			                <div class="input-group-addon">
			                    <span class="glyphicon glyphicon-th"></span>
			                 </div>
			            </div>
       				</div>

					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
				                <label class="ten2x">Upload minh chứng</label>
				                <div class="row">
				                	<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6">
				                		<input type="text" id="minhchung"  class="form-control" placeholder="nhập liên kết đến minh chứng">
				                	</div>
				                </div>	
	            		</div>
					</div>
			</div>


			<div class="row">	
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="form-group">
							<label class="ten2x">Ghi chú</label>
							<textarea id="ghichu"  class="form-control"></textarea>	
					    </div>
					</div>					
			</div>	

				
			<div class="panel panel-default">
			    <div class="panel-heading ten2x">Danh sách tác giả</div>
			    <div class="panel-body">
			    	<label class="ten2x">Số lượng tác giả</label>
			    	<input type="text"  id="soluongtacgia" style="width:150px;" placeholder="nhập số lượng tác giả" class="text-center form-control">
			    
			    		<div id="contentsoluongtacgia">
			    		
			    		</div>
			    				    	
			    </div>
  			</div>
  			<div class="modal-footer">			
				<button type="button" class="btn btn-success" id="btn-luu2">Lưu</button>
	    		<button type="button" class="btn btn-danger" data-dismiss="modal">Thoát</button>
			</div>
  			</form>
	</div>	

	


	</div>
	</div>
</div>




{{-- |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| --}}
{{-- |||||||||||||||||||||||||||||||||||||    CẬP NHẬT DANH SÁCH TÁC GIẢ    ||||||||||||||||||||||||||||||||||||||||||||||||||| --}}
{{-- |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| --}}
<div class="modal fade" id="danhsachtacgia" role="dialog">
	<div class="modal-dialog modal-lg"> 
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h3 class="modal-title ten2x">Cập nhật danh sách tác giả</h3>
					<div id="clickclick">
						<br>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<b class="ten2x">Giảng viên</b><br>
								<select class="form-control select2" id="chontacgia" style="width:100%">
									<option value="1080">Chọn tác giả</option>
									<option value="1081">Tác giả không thuộc TVU</option>
									@foreach($ListGiangvien as $GV)
										<option value="{{$GV->id}}">{{$GV->ten}}</option>
									@endforeach
								</select>

							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<b class="ten2x">Loại tác giả</b><br>
								<select class="form-control" id="chonloaitacgia">
									@foreach($Loaitacgia as $ltg)
										{{-- <option value="{{$ltg->id}}" @if($ltg->trangthai == 1) selected @endif>{{$ltg->ten_vi}}</option> --}}
										<option value="{{$ltg->id}}" @if($ltg->trangthai == 1)  @endif>{{$ltg->ten_vi}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<br>
						<div class="row">					
							<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
								<b class="ten2x">Tác giả khác không thuộc TVU</b><br>
								<input type="text" class="form-control" name="" readonly id="tacgiakhac">
							</div>

							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<b class="ten2x">Đơn vị công tác tác giả khác không thuộc TVU</b><br>
								<input type="text" class="form-control" name="" readonly id="donvitacgiakhac">
							</div>
							<div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
								<input type="button" class="btn btn-success" value="Lưu" id="luuthemtacgia" style="margin-top:22px;">
							</div>
						</div>
					</div>
					
			</div>

			<input type="hidden" id="id_baibao">

			<div class="modal-body">
												
					<table class="table-bordered table table-hover">
						<thead>
							<tr>
								<th width="5%" class="text-center">STT</th>
								<th width="5%" class="text-center">Xóa</th>
								<th width="50%" class="text-center">Tên</th>
								<th class="text-center">Loại tác giả</th>
							</tr>
						</thead>
						<tbody id="loadbb">							
						</tbody>						
					</table>
				
			</div>

			<div class="modal-footer">				
		        <button type="button" class="btn btn-danger" data-dismiss="modal">Thoát</button>
			</div>


		</div>
	</div>
</div>


<div class="modal fade" id="themtacgia" role="dialog">
	<div class="modal-dialog modal-lg"> 
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h3 class="modal-title ten2x">Thêm tác giả cho bài báo</h3>
					
						<br>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<b class="ten2x">Giảng viên</b><br>
								<select class="form-control select2" id="chontacgia" style="width:100%">
									<option value="1080">Chọn tác giả</option>
									<option value="1081">Tác giả không thuộc TVU</option>
									@foreach($ListGiangvien as $GV)
										<option value="{{$GV->id}}">{{$GV->ten}}</option>
									@endforeach
								</select>

							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<b class="ten2x">Loại tác giả</b><br>
								<select class="form-control" id="chonloaitacgia">
									@foreach($Loaitacgia as $ltg)
										<option value="{{$ltg->id}}" >{{$ltg->ten_vi}}</option>
                                                                                
									@endforeach
								</select>
							</div>
						</div>
						<br>
						<div class="row">					
							<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
								<b class="ten2x">Tác giả khác không thuộc TVU</b><br>
								<input type="text" class="form-control" name="" readonly id="tacgiakhac">
							</div>

							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<b class="ten2x">Đơn vị công tác tác giả khác không thuộc TVU</b><br>
								<input type="text" class="form-control" name="" readonly id="donvitacgiakhac">
							</div>
							<div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
								<input type="button" class="btn btn-success" value="Lưu" id="luuthemtacgia" style="margin-top:22px;">
							</div>
						</div>
					
			</div>

			<input type="hidden" id="id_baibao">

			<div class="modal-body">
												
					<table class="table-bordered table table-hover">
						<thead>
							<tr>
								<th width="5%" class="text-center">STT</th>
								<th width="5%" class="text-center">Xóa</th>
								<th width="50%" class="text-center">Tên</th>
								<th class="text-center">Loại tác giả</th>
							</tr>
						</thead>
						<tbody id="loadbb">
							
						</tbody>						
					</table>
				
			</div>

			<div class="modal-footer">
				
		        <button type="button" class="btn btn-danger" data-dismiss="modal">Thoát</button>
			</div>

		</div>
	</div>
</div>




@endsection



{{-- |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| --}}
{{-- |||||||||||||||||||||||||||||||||||||    java script    |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| --}}
{{-- |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| --}}
@section('script')
<script type="text/javascript">	

	$(document).on('click','#luuthemtacgia',function(){
		var id_giangvien=$('#chontacgia').val();
		var id_baibao=$('#id_baibao').val();
		var id_loaitacgia=$('#chonloaitacgia').val();
		var tengv=$('#tacgiakhac').val();
		var diachigv=$('#donvitacgiakhac').val();
		
		if(id_giangvien==1080){alert('Vui lòng chọn tác giả cho bài báo');return false;}
		if(id_giangvien==1081){
			if(diachigv==''){alert('Vui lòng nhập địa chỉ tác giả không thuộc TVU');return false;}
			if(tengv==''){alert('Vui lòng nhập tên tác giả không thuộc TVU');return false;}		

			$.ajax({
					method:'POST',
					url:'set_giangvien/ajax/themtacgiabaibaotest',
					data:{
						tengv:tengv,
						diachigv:diachigv,
					    id_giangvien:id_giangvien,
					    id_loaitacgia:id_loaitacgia,
					    id_baibao:id_baibao,				    
					    _token:token
					},
					    success: function(data){                      
					           alert(data);window.location.reload();
					      },
					    error: function(XMLHttpRequest, textStatus, errorThrown){                     
					             alert("Thao tác không thành công, Vui lòng kiểm tra lại thông tin.");

					      }
			});

		}else{

			 $.ajax({
					method:'POST',
					url:'set_giangvien/ajax/themtacgiabaibao',
					data:{
					    id_giangvien:id_giangvien,
					    id_loaitacgia:id_loaitacgia,
					    id_baibao:id_baibao,				    
					    _token:token
					},
					    success: function(data){                      
					           alert(data);window.location.reload();
					      },
					    error: function(XMLHttpRequest, textStatus, errorThrown){                     
					            alert("Thao tác không thành công, Vui lòng kiểm tra lại thông tin.");

					      }
			});
		}
	});


	$(document).on('click','.xoatacgia',function(){
		var id=$(this).data('id');		
		 $.ajax({
				method:'POST',
				url:'set_giangvien/ajax/xoatacgiabaibao',
				data:{
				    id:id,				   			    
				    _token:token
				},
				    success: function(data){                      
				           alert(data);window.location.reload();
				      },
				    error: function(XMLHttpRequest, textStatus, errorThrown){                     
				            alert("Thao tác không thành công, Vui lòng kiểm tra lại thông tin.");

				      }
		});
		
	});

	$(document).on('keyup','#soluongtacgia',function(){
		var id=$(this).val();
		
		 $.get("set_giangvien/ajax/loadtextfile/"+id,function(data){
		 	$('#contentsoluongtacgia').html(data);
		 });
	});
		



$('#btn-luu2').on('click',function(){
    var ten_vi=$('#ten_vi').val();  
    var ten_en=$('#ten_en').val(); 
    var mota_vi=$('#mota_vi').val();  
    var mota_en=$('#mota_en').val();  
    var nxb_vi=$('#nxb_vi').val();
    var nxb_en=$('#nxb_en').val();  
    var so_issn=$('#so_issn').val();              	
    var nam=$('#nam').val();
    var minhchung=$('#minhchung').val();
    var ghichu=$('#ghichu').val();
    var loaibaibao=$('#loaibaibao').val();   
                	               	             	
                
    if(ten_vi==''){alert('Vui lòng nhập tên bài báo tiếng Việt');return false;}
    if(nam==''){alert('Vui lòng nhập Ngày xuất bản');return false;}           

    var sotacgia=$('#soluongtacgia').val();
    if(isNaN(sotacgia) || sotacgia == ''){alert('Vui lòng nhập số lượng tác giả là số'); $('#soluongtacgia').focus();return false;}

    $(this).prop('disabled', true);
	$(this).html('Đang Xữ Lý');

    var form_data = new FormData();
        form_data.append('ten_vi',ten_vi); 
        form_data.append('ten_en',ten_en); 
        form_data.append('mota_vi',mota_vi); 
        form_data.append('mota_en',mota_en);
        form_data.append('nxb_vi',nxb_vi);
        form_data.append('nxb_en',nxb_en);
        form_data.append('so_issn',so_issn);
        form_data.append('nam',nam);
        form_data.append('minhchung',minhchung);
        form_data.append('ghichu',ghichu);
        form_data.append('loaibaibao',loaibaibao);                 	 
        form_data.append('sotacgia',sotacgia);

        for(i=1;i<=sotacgia;i++){
            form_data.append('tacgia'+i,$('#tacgia'+i).val());
            form_data.append('loaitacgia'+i,$('#ltacgia'+i).val());
        }
        form_data.append('_token',token);

		$.ajax({
			method:'POST',
			url:'set_giangvien/ajax/thembaibao',
			data:form_data,
			contentType: false, // The content type used when sending data to the server.
			ache: false, // To unable request pages to be cached
			processData: false,
			success: function(data){                      
				alert(data);window.location.reload();
			},
			error: function(XMLHttpRequest, textStatus, errorThrown){                     
				alert("Thao tác không thành công, Vui lòng kiểm tra lại thông tin (đảm bảo danh sách tác giả).");
				$('#soluongtacgia').focus();
			}
		});
		
  });

$(document).on('click','.xemngay',function(){
	var id_baibao=$(this).data('id');
	var tacgia=$(this).data('tacgia');
	var user_id=<?=Session::get('user_id')?>;
	$('.nodelete').css('display','none');
	if(tacgia!=user_id) $('#clickclick').css('display','none');
	$('#id_baibao').val(id_baibao);
	$.get("set_giangvien/ajax/loadtacgia/"+id_baibao,function(data){
            $('#loadbb').html(data);
    });
	$.get("set_giangvien/ajax/load_loaitacgia/"+id_baibao+"/"+user_id,function(data){
		console.log("set_giangvien/ajax/load_loaitacgia/"+id_baibao+"/"+user_id);
		console.log(data);
		$('#chonloaitacgia').val(data);
    });

	$('#danhsachtacgia').modal();
});

$(document).on('change','#chontacgia',function(){
	id=$(this).val();	
	if(id==1081){
		$('#tacgiakhac').attr('readonly', false);
		$('#donvitacgiakhac').attr('readonly', false);
        setTimeout(function(){ $('#tacgiakhac').focus(); },600);
	}else{
		$('#tacgiakhac').val('');
		$('#donvitacgiakhac').val('');
		$('#tacgiakhac').attr('readonly', true);
		$('#donvitacgiakhac').attr('readonly', true);
	}
});


$('.btn-luu2').on('click',function(){

	var id=$(this).data('id');
    var ten_vi=$('#ten_vi'+id).val();  
    var ten_en=$('#ten_en'+id).val();
    var mota_vi=$('#mota_vi'+id).val();  
    var mota_en=$('#mota_en'+id).val();  
    var nxb_vi=$('#nxb_vi'+id).val();
    var nxb_en=$('#nxb_en'+id).val();  
    var so_issn=$('#so_issn'+id).val();              	
    var nam=$('#nam'+id).val();
    var minhchung=$('#minhchung'+id).val();
    var ghichu=$('#ghichu'+id).val();
    var loaibaibao=$('#loaibaibao'+id).val();     
    var loaitacgia=$('#loaitacgia'+id).val();   
                	
    if(ten_vi==''){alert('Vui lòng nhập tên tác phẩm');return false;}
    if(nam==''){alert('Vui lòng nhập Ngày xuất bản');return false;}   

    $(this).prop('disabled', true);
	$(this).html('Đang Xữ Lý');               

    $.ajax({
		method:'POST',
		url:'set_giangvien/ajax/capnhatbaibao',
		data:{
			ten_vi:ten_vi,
			ten_en:ten_en,	
			mota_vi:mota_vi,
			mota_en:mota_en,				        	
			nxb_vi:nxb_vi,
			nxb_en:nxb_en,
			so_issn:so_issn,
			nam:nam,
			minhchung:minhchung,
			ghichu:ghichu,
			loaibaibao:loaibaibao,	
			loaitacgia:loaitacgia,
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


$('.xoabaibao').on('click',function(){
       if(!confirm('Xác nhận xóa:')) return false;
        var id=$(this).data('id');
        $.get("set_giangvien/ajax/xoabaibao/"+id,function(data){alert(data);window.location.reload();});
});


$(document).ready(function($) {

	var engine1 = new Bloodhound({
	    remote: {
	        url: 'set_giangvien/ajax/search/name?value=%QUERY%',
	        wildcard: '%QUERY%'
	    },
	        datumTokenizer: Bloodhound.tokenizers.whitespace('value'),
	        queryTokenizer: Bloodhound.tokenizers.whitespace
	    });

	var engine2 = new Bloodhound({
	    remote: {
	        url: 'set_giangvien/auto/baibao/tenbaibaovi?value=%QUERY%',
	        wildcard: '%QUERY%'
	        },
	        datumTokenizer: Bloodhound.tokenizers.whitespace('value'),
	        queryTokenizer: Bloodhound.tokenizers.whitespace
	    });	

	var engine3 = new Bloodhound({
	    remote: {
	        url: 'set_giangvien/auto/baibao/tenbaibaoen?value=%QUERY%',
	        wildcard: '%QUERY%'
	        },
	        datumTokenizer: Bloodhound.tokenizers.whitespace('value'),
	        queryTokenizer: Bloodhound.tokenizers.whitespace
	    });

	var engine4 = new Bloodhound({
	    remote: {
	        url: 'set_giangvien/auto/baibao/nhaxuatbanvi?value=%QUERY%',
	        wildcard: '%QUERY%'
	        },
	        datumTokenizer: Bloodhound.tokenizers.whitespace('value'),
	        queryTokenizer: Bloodhound.tokenizers.whitespace
	    });

	var engine5 = new Bloodhound({
	    remote: {
	        url: 'set_giangvien/auto/baibao/nhaxuatbanen?value=%QUERY%',
	        wildcard: '%QUERY%'
	        },
	        datumTokenizer: Bloodhound.tokenizers.whitespace('value'),
	        queryTokenizer: Bloodhound.tokenizers.whitespace
	    });

	var engine6 = new Bloodhound({
	    remote: {
	        url: 'set_giangvien/auto/baibao/soissn?value=%QUERY%',
	        wildcard: '%QUERY%'
	        },
	        datumTokenizer: Bloodhound.tokenizers.whitespace('value'),
	        queryTokenizer: Bloodhound.tokenizers.whitespace
	    });
  

$(document).on('mouseenter','.tacgia',function(){
	var id=$(this).data('id');	
	$("#tacgia"+id).typeahead({
		hint: false,
		highlight: true,
		minLength: 1
	}, [
		{
		    source: engine1.ttAdapter(),
		    name: 'ten',
		    display: function(data) {
		    return data.id+' - '+data.maso+' - '+data.ten;
		},
		templates:{
		empty:[
		'<div class="header-title">Tên giảng viên</div><div class="list-group search-results-dropdown"><div class="list-group-item">Không có kết quả trùng khớp.</div></div>'
		],                                
		suggestion: function (data) {
		    return '<p class="list-group-item" style="width:100%"> ID:'+data.id+' - MSGV: '+data.maso+' - Tên: '+data.ten + '</p>';
		                
			}
		}
	}
  ]);
});


$(document).on('mouseenter','#ten_vi',function(){
	$("#ten_vi").typeahead({
		hint: false,
		highlight: true,
		minLength: 1
	}, [
		    {
		        source: engine2.ttAdapter(),
		        name: 'ten_vi',
		        display: function(data) {
		           return 'Bài báo này đã được thêm trước đó bạn không thể thêm bài báo này ! ! ! Vui lòng kiểm tra lại';
		        },
		        templates: {
		        empty: [
		            '<div class="header-title">Tên bài báo</div><div class="list-group search-results-dropdown"><div class="list-group-item">Bạn có thể thêm bài báo này.</div></div>'
		        ],                                
		        suggestion: function (data){
		        	console.log(data);
		             return '<p class="list-group-item" style="width:100%">'+data.ten_vi+'</p>';
		                
		        }
		        }
		    }
		]);
});

$(document).on('mouseenter','#ten_en',function(){
	$("#ten_en").typeahead({
		hint: false,
		highlight: true,
		minLength: 1
	}, [
		    {
		        source: engine3.ttAdapter(),
		        name: 'ten_vi',
		        display: function(data) {
		           return 'Bài báo này đã được thêm trước đó bạn không thể thêm bài báo này ! ! ! Vui lòng kiểm tra lại';
		        },
		        templates: {
		        empty: [
		            '<div class="header-title">Tên bài báo</div><div class="list-group search-results-dropdown"><div class="list-group-item">Bạn có thể thêm bài báo này.</div></div>'
		        ],                                
		        suggestion: function (data) {
		             return '<p class="list-group-item" style="width:100%">'+data.ten_en+'</p>';
		                
		        }
		        }
		    }
		]);
});

$(document).on('mouseenter','#nxb_vi',function(){
	$("#nxb_vi").typeahead({
		hint: false,
		highlight: true,
		minLength: 1
	}, [
		    {
		        source: engine4.ttAdapter(),
		        name: 'nxb_vi',
		        display: function(data) {
		           return data.nxb_vi;
		        },
		        templates: {
		        empty: [
		            '<div class="header-title">Tên bài báo</div><div class="list-group search-results-dropdown"><div class="list-group-item">Bạn có thể thêm bài báo này.</div></div>'
		        ],                                
		        suggestion: function (data) {
		             return '<p class="list-group-item" style="width:100%">'+data.nxb_vi+'</p>';
		                
		        }
		        }
		    }
		]);
});

$(document).on('mouseenter','#nxb_en',function(){
	$("#nxb_en").typeahead({
		hint: false,
		highlight: true,
		minLength: 1
	}, [
		    {
		        source: engine5.ttAdapter(),
		        name: 'nxb_en',
		        display: function(data) {
		           return data.nxb_en;
		        },
		        templates: {
		        empty: [
		            '<div class="header-title">Tên bài báo</div><div class="list-group search-results-dropdown"><div class="list-group-item">Bạn có thể thêm bài báo này.</div></div>'
		        ],                                
		        suggestion: function (data) {
		             return '<p class="list-group-item" style="width:100%">'+data.nxb_en+'</p>';
		                
		        }
		        }
		    }
		]);
});

$(document).on('mouseenter','#so_issn',function(){
	$("#so_issn").typeahead({
		hint: false,
		highlight: true,
		minLength: 1
	}, [
		    {
		        source: engine6.ttAdapter(),
		        name: 'so_issn',
		        display: function(data) {
		           return data.so_issn;
		        },
		        templates: {
		        empty: [
		            '<div class="header-title">Tên bài báo</div><div class="list-group search-results-dropdown"><div class="list-group-item">Bạn có thể thêm bài báo này.</div></div>'
		        ],                                
		        suggestion: function (data) {
		             return '<p class="list-group-item" style="width:100%">'+data.so_issn+'</p>';
		                
		        }
		        }
		    }
		]);
});

});
</script>
@endsection
