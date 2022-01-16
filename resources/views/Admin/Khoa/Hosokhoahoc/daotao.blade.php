@extends('Admin.Khoa.Hosokhoahoc.Master')

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
 		  <div class="table-responsive">
         <table class="table table-bordered table-striped example2" style="width:100%">
                         <thead>                 
                            <tr class="bg-top">
                                <th width="5%" class="text-center"><input type="checkbox" name="chonhet" id="chonhet" /></th>
                                <th width="5%" class="text-center">STT</th>
                                <th width="8%" class="text-center">Sửa</th>
                                <th  width="8%" class="text-center">Xóa</th>
                                <th width="15%" class="text-center">Thời gian</th>               
                                <th class="text-center">Tên cơ sở</th>  
                                <th width="15%" class="text-center">Chuyên ngành</th>
                                <th width="15%" class="text-center">Học vị</th>
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
                                <th></th>
                                <th></th>
                            </tr>                                  	
                        </tfoot> 

                        <tbody>   
                          @foreach($Quatrinhdaotao as $daotao)                                  
                            <tr>
                                <td  class="text-center">
                                	<input type="checkbox" name="chon" id="chon{{$daotao->id}}" value="{{$daotao->id}}" class="chon" />
                                </td>
                                <td align="center">
					             <input type="text" value="{{$daotao->stt}}" data-val0="{{$daotao->id}}" data-val1="ht96_quatrinhdaotao"  data_val2="{{$daotao->stt}}"  name="ordering[]" class="tipS smallText update_sttgv" title="Nhập số thứ tự bài viết"  />
					             <div id="ajaxloader"><img class="numloader" id="ajaxloader" src="ht96_admin/media/images/loader.gif" alt="loader" /></div>
					         	</td>
					         	<td class="text-center">  
                                    <i class="fa fa-2x fa-edit blue" data-toggle="modal" data-target="#capnhatdaotao{{$daotao->id}}"></i>
                                </td> 

                                <td class="text-center" title="xóa bài viết"> 
                                 	<i class="fa fa-times text-dange fa-2x xoadaotao red" data-id="{{$daotao->id}}"></i>
                                </td>
								<td class="text-center">{{date('m/Y', strtotime($daotao->ngaybatdau))}} -  {{date('m/Y', strtotime($daotao->ngayketthuc))}}</td>
								<td>{{$daotao->tencoso_vi}}</td>
								<td class="text-center">{{$daotao->chuyennganh_vi}}</td>
								<td class="text-center">{{$daotao->trinhdo->ten_vi}}</td>
								<td class="text-center">@if ($daotao->minhchung!='khong' && $daotao->minhchung!='') <a style="background:transparent;color:blue;" href="ht96_pdf/{{$daotao->minhchung}}"  target="_blank">Có</a> @endif</td>
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
								                <label class="ten2x">Nơi đào tạo (VI)</label>
								                 <input type="text" id="noidaotao_vi{{$daotao->id}}" value="{{$daotao->noidaotao_vi}}"  class="form-control" placeholder="Nhập tên nơi đào tạo tiếng Việt">
					            			</div>
										</div>

										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
											<div class="form-group">
								                <label class="ten2x">Nơi đào tạo (EN)</label>
								                 <input type="text" id="noidaotao_en{{$daotao->id}}" value="{{$daotao->noidaotao_en}}"  class="form-control" placeholder="Nhập tên nơi đào tạo tiếng Anh">
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
							                      <input type="text"   class="form-control pull-right datepicker" placeholder="Ngày bắt đầu đào tạo" id="tungay{{$daotao->id}}" value="{{date('d/m/Y', strtotime($daotao->ngaybatdau))}}">
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
							                      <input type="text"  class="form-control pull-right datepicker"  placeholder="Ngày kết thúc đào tạo" id="denngay{{$daotao->id}}" value="{{date('d/m/Y', strtotime($daotao->ngayketthuc))}}">
							                    </div>                   
					              			</div>
										</div>
									</div>
	
									<div class="row">
										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
											<div class="form-group">
								                <label class="ten2x">Tên chuyên ngành (VI)</label>
								                 <input type="text" id="chuyennganh_vi{{$daotao->id}}"  class="form-control" placeholder="nhập tên chuyên ngành đã đào tạo tiếng Việt" value="{{$daotao->chuyennganh_vi}}">
					            			</div>
										</div>

										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
											<div class="form-group">
								                <label class="ten2x">Tên chuyên ngành (EN)</label>
								                 <input type="text" id="chuyennganh_en{{$daotao->id}}"  class="form-control" placeholder="nhập tên chuyên ngành đã đào tạo tiếng Anh" value="{{$daotao->chuyennganh_en}}">
					            			</div>
										</div>
									</div>

									<div class="row">
										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
											<div class="form-group">
								                <label class="ten2x">Trình độ</label>
								                <select class="form-control" id="trinhdo{{$daotao->id}}">
								                	@foreach($Trinhdo as $TD)
														<option value="{{$TD->id}}" @if($TD->id==$daotao->i_trirnhdo) selected @endif>
															{{$TD->ten_vi}}
														</option>
								                	@endforeach
								                </select>								               
					            			</div>
										</div>	

										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
												<div class="form-group">
													<label class="ten2x">Hệ đào tạo</label>
													   <select id="hedaotao{{$daotao->id}}" class="form-control">
													        @foreach($Hedaotao as $hdt)
													            <option value="{{$hdt->id}}" @if($hdt->id == $daotao->hedaotao->id) selected @endif>{{$hdt->ten_vi}}</option>
													        @endforeach
													    </select>
										       </div>
										</div>

																	
									</div>

									<div class="row">	

										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<div class="form-group">
								                <label class="ten2x">Tên luận án</label>
								                 <input type="text" id="tenluanan{{$daotao->id}}" value="{{$daotao->tenluanan}}"  class="form-control" placeholder="nhập tên luận án">
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
									<button type="button" data-id="{{$daotao->id}}" class="btn btn-success btn-luu">Lưu</button>
	        						<button type="button" class="btn btn-danger" data-dismiss="modal">Thoát</button>
							</div>									        
							</div>	
							</div>	      
						</div>
					</div>
                @endforeach                            
            </tbody> 
        </table> 
       </div>
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
							<label class="ten2x">Nơi đào tạo (VI)</label>
							<input type="text" id="noidaotao_vi" class="form-control" placeholder="Nhập tên nơi đào tạo tiếng Việt">
					    </div>
					</div>

					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="ten2x">Nơi đào tạo (EN)</label>
							<input type="text" id="noidaotao_en" class="form-control" placeholder="Nhập tên nơi đào tạo tiếng Anh">
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
		                      <input type="text"  class="form-control pull-right datepicker" value="{{date('d/m/Y', strtotime(Carbon\Carbon::now()))}}" placeholder="Ngày bắt đầu đào tạo" id="tungay">
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
		                      <input type="text"  class="form-control pull-right datepicker" value="{{date('d/m/Y', strtotime(Carbon\Carbon::now()))}}"  placeholder="Ngày kết thúc đào tạo" id="denngay">
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
							 <label class="ten2x">Trình độ</label>
							<select class="form-control" id="trinhdo">
								    @foreach($Trinhdo as $TD)
									   <option value="{{$TD->id}}">
												{{$TD->ten_vi}}
										</option>
								    @endforeach
							</select>								               
					    </div>
					</div>

					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="ten2x">Hệ đào tạo</label>
							<select id="hedaotao" class="form-control">
								@foreach($Hedaotao as $hdt)
									<option value="{{$hdt->id}}">{{$hdt->ten_vi}}</option>
								 @endforeach
							</select>
						</div>
					</div>
				</div>

				<div class="row">	
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="form-group">
			                <label class="ten2x">Tên luận án</label>
			                 <input type="text" id="tenluanan"  class="form-control" placeholder="nhập tên luận án">
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
	        		<button type="button" id="btn-luu" class="btn btn-success">Lưu</button>
	        		<button type="button" class="btn btn-danger" data-dismiss="modal">Thoát</button>
	   			</div>
			</div>
	    </div>	    
	</div>	  
</div>
</div> 
@endsection

@section('script')

<script type="text/javascript">

$('#btn-luu').on('click',function(){
    var tencoso_vi=$('#tencoso_vi').val();
    var tencoso_en=$('#tencoso_en').val();
    var noidaotao_vi=$('#noidaotao_vi').val();
    var noidaotao_en=$('#noidaotao_en').val(); 
    var tungay=$('#tungay').val();
    var denngay=$('#denngay').val();
    var chuyennganh_vi=$('#chuyennganh_vi').val();
    var chuyennganh_en=$('#chuyennganh_en').val(); 
    var trinhdo=$('#trinhdo').val();    
    var hedaotao=$('#hedaotao').val(); 
    var tailieu=$('#tailieu').val();   
    var tenluanan=$('#tenluanan').val();
    var id_giangvien=<?=$Giangvien->id?>            	
                	              	
    if(tencoso_vi==''){alert('Vui lòng nhập tên cơ sở tiếng việt');return false;}
    if(tencoso_en==''){alert('Vui lòng nhập tên cơ sở tiếng anh');return false;}
                	               	


    $.ajax({
		method:'POST',
		url:'set_admin/ajax/themdaotao',
		 data:{
				tencoso_vi:tencoso_vi,
				tencoso_en:tencoso_en,
				noidaotao_vi:noidaotao_vi,
				noidaotao_en:noidaotao_en,
				tungay:tungay,
				denngay:denngay,
				chuyennganh_vi:chuyennganh_vi,
				chuyennganh_en:chuyennganh_en,				        	
				trinhdo:trinhdo,
				tailieu:tailieu,				
				hedaotao:hedaotao,
				tenluanan:tenluanan,	
				id_giangvien:id_giangvien,			        	
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

$('.UploadPDFedit').on('click', function (){

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
    var noidaotao_vi=$('#noidaotao_vi'+id).val();
    var noidaotao_en=$('#noidaotao_en'+id).val();
    var tungay=$('#tungay'+id).val();
    var denngay=$('#denngay'+id).val();
    var chuyennganh_vi=$('#chuyennganh_vi'+id).val();
    var chuyennganh_en=$('#chuyennganh_en'+id).val();   
    var tailieu=$('#tailieu'+id).val();    
    var hedaotao=$('#hedaotao'+id).val();
    var trinhdo=$('#trinhdo'+id).val();
    var tenluanan=$('#tenluanan'+id).val();
                	
                	              	
   if(tencoso_vi==''){alert('Vui lòng nhập tên cơ sở tiếng việt');return false;}
   if(tencoso_en==''){alert('Vui lòng nhập tên cơ sở tiếng anh');return false;}                	
                	
   $.ajax({
		method:'POST',
		url:'set_admin/ajax/capnhatdaotao',
		data:{
				tencoso_vi:tencoso_vi,
				tencoso_en:tencoso_en,
				noidaotao_vi:noidaotao_vi,
				noidaotao_en:noidaotao_en,
				tungay:tungay,
				denngay:denngay,
				chuyennganh_vi:chuyennganh_vi,
				chuyennganh_en:chuyennganh_en,				        					        	
				tailieu:tailieu,				        	
				hedaotao:hedaotao,
				tenluanan:tenluanan,
				trinhdo:trinhdo,
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

$('.xoadaotao').on('click',function(){
        if(!confirm('Xác nhận xóa:')) return false;
        var id=$(this).data('id');
        $.get("set_admin/ajax/xoadaotao/"+id,function(data){
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
            $.get("set_admin/ajax/xoadaotaohet/"+listid,function(data){
            	alert(data);
            	window.location.reload();
        	});
        } 
});

</script>
@endsection