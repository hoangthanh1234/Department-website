@extends('Admin.Bomon.Hosokhoahoc.Master')

@section('Tabvalue')
 <div role="tabpanel" class="tab-pane @if ($tab==2) active @endif" id="profile">

	  

    <div class="container" style="max-width:500px;margin-top:20px;">
        @if(session('thongbao'))
           <div class="alert alert-success">
                {{session('thongbao')}}
           </div>
        @endif
    </div>

 	<div class="box-body">
         <table id="example2" class="table table-bordered table-striped" style="width:100%">
                         <thead>                 
                            <tr style="background: #ed8210;color:white;text-align: center;">
                                <th width="5%"><input type="checkbox" name="chonhet" id="chonhet" /></th>
                                <th width="5%"></th>
                                <th width="10%">Thời gian</th>               
                                <th>Tên cơ sở</th>  
                                <th width="15%">Chuyên ngành</th>
                                <th width="15%">Học vị</th>
                                <th width="10%">Minh chứng</th>                                         
                                <th width="10%" style="text-align:center;">Sửa</th>
                                <th  width="10%" style="text-align:center;">Xóa</th>
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
                                <th></th>
                            </tr>                                  	
                        </tfoot> 

                        <tbody>   
                          @foreach($Hosokhoahoc->quatrinhdaotao as $daotao)                                  
                            <tr>
                                <td  style="text-align:center;">
                                	<input type="checkbox" name="chon" id="chon{{$daotao->id}}" value="{{$daotao->id}}" class="chon" />
                                </td>
                                <td align="center">
					             <input type="text" value="{{$daotao->stt}}" data-val0="{{$daotao->id}}" data-val1="ht96_quatrinhdaotao"  data_val2="{{$daotao->stt}}"  name="ordering[]" class="tipS smallText update_stt" title="Nhập số thứ tự bài viết"  />
					             <div id="ajaxloader"><img class="numloader" id="ajaxloader" src="ht96_admin/media/images/loader.gif" alt="loader" /></div>
					         </td>
								<td>Từ: {{date('d-m-Y', strtotime($daotao->ngaybatdau))}} &nbsp;&nbsp; Đến: {{date('d-m-Y', strtotime($daotao->ngayketthuc))}}</td>
								<td>{{$daotao->tencoso_vi}}</td>
								<td>{{$daotao->chuyennganh_vi}}</td>
								<td>{{$daotao->hocvi_vi}}</td>
								<td style="text-align:center;">@if ($daotao->minhchung!='khong' && $daotao->minhchung!='') <a style="background:transparent;color:blue;" href="ht96_pdf/{{$daotao->minhchung}}"  target="_blank">Có</a> @endif</td>
                                <td class="text-center">                                                   
                                    <a title="Sửa bài viết"><img src="ht96_admin/media/images/edit1.png" data-toggle="modal" data-target="#capnhatdaotao{{$daotao->id}}" border="0"/>
                                </td> 

                                <td class="text-center" title="xóa bài viết">
                                   
                                 <p class="xoadaotao" data-id="{{$daotao->id}}"><img src="ht96_admin/media/images/delete1.gif" /></p>
                                   
                                </td>
                            </tr>  

                    <div class="modal fade" id="capnhatdaotao{{$daotao->id}}" role="dialog">
									<div class="modal-dialog modal-lg"> 
									    <div class="modal-content">
									        <div class="modal-header">
									          <button type="button" class="close" data-dismiss="modal">&times;</button>
									          <h4 class="modal-title ten2x">CẬP NHẬT QUÁ TRÌNH ĐÀO TẠO SỐ:  {{$daotao->id}}</h4>
									        </div>
									        <div class="modal-body">

												<div class="row">
										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
											<div class="form-group">
								                <label class="ten2x">Tên cơ sở (VI)</label>
								                 <input type="text" id="tencoso_vi{{$daotao->id}}" value="{{$daotao->tencoso_vi}}"  class="form-control" placeholder="nhập tên cơ sở tiếng việt">
					            			</div>
										</div>

										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
											<div class="form-group">
								                <label class="ten2x">Tên cơ sở (EN)</label>
								                 <input type="text" id="tencoso_en{{$daotao->id}}" value="{{$daotao->tencoso_en}}"  class="form-control" placeholder="nhập tên cơ sở tiếng anh">
					            			</div>
										</div>
									</div>

									<div class="row">					
										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
											<div class="form-group">
							                    <label class="ten2x">Từ ngày</label>
							                    <div class="input-group date">
							                      <div class="input-group-addon">
							                        <i class="fa fa-calendar"></i>
							                      </div>
							                      <input type="text"   class="form-control pull-right datepicker" placeholder="Ngày bắt đầu đào tạo" id="tungay{{$daotao->id}}" value="{{date('d-m-Y', strtotime($daotao->ngaybatdau))}}">
							                    </div>                   
					              			</div>
										</div>

										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
											<div class="form-group">
							                    <label class="ten2x">Đến ngày</label>
							                    <div class="input-group date">
							                      <div class="input-group-addon">
							                        <i class="fa fa-calendar"></i>
							                      </div>
							                      <input type="text"  class="form-control pull-right datepicker"  placeholder="Ngày kết thúc đào tạo" id="denngay{{$daotao->id}}" value="{{date('d-m-Y', strtotime($daotao->ngayketthuc))}}">
							                    </div>                   
					              			</div>
										</div>
									</div>
	
									<div class="row">
										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
											<div class="form-group">
								                <label class="ten2x">Tên chuyên ngành (VI)</label>
								                 <input type="text" id="chuyennganh_vi{{$daotao->id}}"  class="form-control" placeholder="nhập tên chuyên ngành đã đào tạo tiếng việt" value="{{$daotao->chuyennganh_vi}}">
					            			</div>
										</div>

										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
											<div class="form-group">
								                <label class="ten2x">Tên chuyên ngành (EN)</label>
								                 <input type="text" id="chuyennganh_en{{$daotao->id}}"  class="form-control" placeholder="nhập tên chuyên ngành đã đào tạo tiếng anh" value="{{$daotao->chuyennganh_en}}">
					            			</div>
										</div>
									</div>

									<div class="row">
										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
											<div class="form-group">
								                <label class="ten2x">Tên học vị (VI)</label>
								                 <input type="text" id="hocvi_vi{{$daotao->id}}"  class="form-control" placeholder="nhập tên học vị tiếng việt" value="{{$daotao->hocvi_vi}}">
					            			</div>
										</div>

										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
											<div class="form-group">
								                <label class="ten2x">Tên học vị (EN)</label>
								                 <input type="text" id="hocvi_en{{$daotao->id}}"  class="form-control" placeholder="nhập tên học vị tiếng anh" value="{{$daotao->hocvi_en}}">
					            			</div>
										</div>
									</div>

										<div class="row">
											<div class="col-lg-12 col-md-12 col-xs-12 col-xs-12">	
																	 
												 	<div class="form-group">
										                <label class="ten2x">Upload minh chứng</label>
										                <div class="row">
										                	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
										                		<input type="file" id="file{{$daotao->id}}" name="file">
										                	</div>
										                	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
										                		<button class="btn btn-success UploadPDFedit" data-id="{{$daotao->id}}">Upload</button>
										                	</div>
										                </div>					                            
										                			
							            				<p> 
							            					<span style="color:red;">Upload quyết định công nhận nghiên cứu sinh nếu chưa bảo vệ luận án tiến sỹ cấp nhà nước</span><br>
															Hệ thống chỉ hỗ trợ file PDF và có kích thước nhỏ hơn 5Mb
														</p>
														<input type="hidden" value="{{$daotao->minhchung}}" ="" id="tailieu{{$daotao->id}}">
							            			</div>
							            		
											</div>
										</div>
							<div class="modal-footer">
									<button type="button" data-id="{{$daotao->id}}" class="btn btn-success btn-luu" style="float:left;">Lưu</button>
	        						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
							</div>									        
							</div>	
							</div>	      
						</div>
					</div>
                @endforeach                            
            </tbody> 
        </table> 
    </div>
          
    <div class="paging text-center"></div>
    <button class=" btn btn-success btn2" data-toggle="modal" data-target="#themdaotao">Thêm</button>
    <button class=" btn btn-danger  btn2" id="xoahet">Xóa</button>





<div class="modal fade" id="themdaotao" role="dialog">

	<div class="modal-dialog modal-lg"> 
	    <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title ten2x">THÊM QUÁ TRÌNH ĐÀO TẠO MỚI</h4>
	        </div>
	        <div class="modal-body">
	
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
			                <label class="ten2x">Tên cơ sở (VI)</label>
			                 <input type="text" id="tencoso_vi"  class="form-control" placeholder="nhập tên cơ sở tiếng việt">
            			</div>
					</div>

					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
			                <label class="ten2x">Tên cơ sở (EN)</label>
			                 <input type="text" id="tencoso_en"  class="form-control" placeholder="nhập tên cơ sở tiếng anh">
            			</div>
					</div>
				</div>

				<div class="row">					
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
		                    <label class="ten2x">Ngày bắt đầu</label>
		                    <div class="input-group date">
		                      <div class="input-group-addon">
		                        <i class="fa fa-calendar"></i>
		                      </div>
		                      <input type="text"  class="form-control pull-right datepicker" placeholder="Ngày bắt đầu đào tạo" id="tungay">
		                    </div>                   
              			</div>
					</div>

					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
		                    <label class="ten2x">Ngày kết thúc</label>
		                    <div class="input-group date">
		                      <div class="input-group-addon">
		                        <i class="fa fa-calendar"></i>
		                      </div>
		                      <input type="text"  class="form-control pull-right datepicker"  placeholder="Ngày kết thúc đào tạo" id="denngay">
		                    </div>                   
              			</div>
					</div>
				</div>
	
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
			                <label class="ten2x">Tên chuyên ngành (VI)</label>
			                 <input type="text" id="chuyennganh_vi"  class="form-control" placeholder="nhập tên chuyên ngành đã đào tạo tiếng việt">
            			</div>
					</div>

					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
			                <label class="ten2x">Tên chuyên ngành (EN)</label>
			                 <input type="text" id="chuyennganh_en"  class="form-control" placeholder="nhập tên chuyên ngành đã đào tạo tiếng anh">
            			</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
			                <label class="ten2x">Tên học vị (VI)</label>
			                 <input type="text" id="hocvi_vi"  class="form-control" placeholder="nhập tên học vị tiếng việt">
            			</div>
					</div>

					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
			                <label class="ten2x">Tên học vị (EN)</label>
			                 <input type="text" id="hocvi_en"  class="form-control" placeholder="nhập tên học vị tiếng anh">
            			</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-12 col-md-12 col-xs-12 col-xs-12">	
											 
						 	<div class="form-group">
				                <label class="ten2x">Upload minh chứng</label>
				                <div class="row">
				                	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				                		<input type="file" id="file" name="file">
				                	</div>
				                	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				                		<button class="btn btn-success" id="UploadPDF">Upload</button>
				                	</div>
				                </div>					                            
				                			
	            				<p> 
	            					<span style="color:red;">Upload quyết định công nhận nghiên cứu sinh nếu chưa bảo vệ luận án tiến sỹ cấp nhà nước</span><br>
									Hệ thống chỉ hỗ trợ file PDF và có kích thước nhỏ hơn 5Mb
								</p>
								<input type="hidden" name="" id="tailieu">
	            			</div>
	            		
					</div>
				</div>

				<div class="modal-footer">
	        <button type="button" id="btn-luu" class="btn btn-success" style="float:left;">Lưu</button>
	        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
	   </div>
			</div>
	    </div>	    
	</div>	  
	</div>
</div> 
@endsection

@section('script')

<script type="text/javascript">
            $(document).ready(function (e) {

                $('#UploadPDF').on('click', function () {
                    var file_data = $('#file').prop('files')[0];
                    var form_data = new FormData();
                    form_data.append('file', file_data);
                    $.ajax({
                        url: 'ht96_ajax/ajaxupfile.php', // point to server-side PHP script 
                        dataType: 'text', // what to expect back from the PHP script
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: 'post',
                        success: function (response) {
                           var getData = $.parseJSON(response);   
                           var result = getData.kq;
                           var filename = getData.filename;
                           alert(result);
                           $("#tailieu").val(filename);
                        },
                        error: function (response) {
                            
                           var getData = $.parseJSON(response);   
                           var result = getData.kq;
                           var filename = getData.filename;
                           alert(result);

                        }
                    });
                });


                $('#btn-luu').on('click',function(){

                	var tencoso_vi=$('#tencoso_vi').val();
                	var tencoso_en=$('#tencoso_en').val();
                	var tungay=$('#tungay').val();
                	var denngay=$('#denngay').val();
                	var chuyennganh_vi=$('#chuyennganh_vi').val();
                	var chuyennganh_en=$('#chuyennganh_en').val();
                	var hocvi_vi=$('#hocvi_vi').val();
                	var hocvi_en=$('#hocvi_en').val();
                	var tailieu=$('#tailieu').val();  
                	var hoso={{$Hosokhoahoc->id}};
                	              	
                 	if(tencoso_vi==''){alert('Vui lòng nhập tên cơ sở tiếng việt');return false;}
                	if(tencoso_en==''){alert('Vui lòng nhập tên cơ sở tiếng anh');return false;}
                	               	


                	$.ajax({
				        method:'POST',
				        url:'set_admin/ajax/hosokhoahoc/themdaotao',
				        data:{
				        	tencoso_vi:tencoso_vi,
				        	tencoso_en:tencoso_en,
				        	tungay:tungay,
				        	denngay:denngay,
				        	chuyennganh_vi:chuyennganh_vi,
				        	chuyennganh_en:chuyennganh_en,
				        	hocvi_vi:hocvi_vi,
				        	hocvi_en:hocvi_en,
				        	tailieu:tailieu,
				        	hoso:hoso,
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








                $('.UploadPDFedit').on('click', function () {

                	var idxx=$(this).data('id');                	
                    var file_data = $('#file'+idxx).prop('files')[0];
                    var form_data = new FormData();
                    form_data.append('file', file_data);
                    $.ajax({
                        url: 'ht96_ajax/ajaxupfile.php', // point to server-side PHP script 
                        dataType: 'text', // what to expect back from the PHP script
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: 'post',
                        success: function (response) {
                           var getData = $.parseJSON(response);   
                           var result = getData.kq;
                           var filename = getData.filename;
                           alert(result);
                           $("#tailieu"+idxx).val(filename); 
                        },
                        error: function (response) {
                            
                           var getData = $.parseJSON(response);   
                           var result = getData.kq;
                           var filename = getData.filename;
                           alert(result);

                        }
                    });
                });


                 $('.btn-luu').on('click',function(){

                 	var id=$(this).data('id');                 	
                	var tencoso_vi=$('#tencoso_vi'+id).val();
                	var tencoso_en=$('#tencoso_en'+id).val();
                	var tungay=$('#tungay'+id).val();
                	var denngay=$('#denngay'+id).val();
                	var chuyennganh_vi=$('#chuyennganh_vi'+id).val();
                	var chuyennganh_en=$('#chuyennganh_en'+id).val();
                	var hocvi_vi=$('#hocvi_vi'+id).val();
                	var hocvi_en=$('#hocvi_en'+id).val();
                	var tailieu=$('#tailieu'+id).val();  
                	var hoso={{$Hosokhoahoc->id}};
                	              	
                 	if(tencoso_vi==''){alert('Vui lòng nhập tên cơ sở tiếng việt');return false;}
                	if(tencoso_en==''){alert('Vui lòng nhập tên cơ sở tiếng anh');return false;}                	
                	
                	$.ajax({
				        method:'POST',
				        url:'set_admin/ajax/hosokhoahoc/capnhatdaotao',
				        data:{
				        	tencoso_vi:tencoso_vi,
				        	tencoso_en:tencoso_en,
				        	tungay:tungay,
				        	denngay:denngay,
				        	chuyennganh_vi:chuyennganh_vi,
				        	chuyennganh_en:chuyennganh_en,
				        	hocvi_vi:hocvi_vi,
				        	hocvi_en:hocvi_en,
				        	tailieu:tailieu,
				        	id:id,
				        	hoso:hoso,
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

                 $('.xoadaotao').on('click',function(){
                 	if(!confirm('Xác nhận xóa:')) return false;
                 	var id=$(this).data('id');
                 	$.get("set_admin/ajax/hosokhoahoc/xoadaotao/"+id,function(data){
            				alert(data);
            				  window.location.reload();
        				});
			});


              $('#chonhet').on('click',function(){
                var status=this.checked;
                $("input[name='chon']").each(function(){this.checked=status;})
            });

            $('#xoahet').on('click',function(){
                var listid="";
                $("input[name='chon']").each(function(){
                  if (this.checked) listid = listid+","+this.value;
                  })
                listid=listid.substr(1);  // alert(listid);
                if (listid=="") { alert("Bạn chưa chọn mục nào"); return false;}
                hoi= confirm("Bạn có chắc chắn muốn xóa?");
                if (hoi==true){
                	$.get("set_admin/ajax/hosokhoahoc/xoadaotaohet/"+listid,function(data){
            			alert(data);
            			window.location.reload();
        			});
                } 
            });



            });
</script>


@endsection