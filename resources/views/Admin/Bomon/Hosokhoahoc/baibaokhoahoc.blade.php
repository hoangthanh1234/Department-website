@extends('Admin.Bomon.Hosokhoahoc.Master')

@section('Tabvalue')
<div role="tabpanel" class="tab-pane @if ($tab==4) active @endif" id="profile">
<p class="ten2x" style="font-size:20px;margin-top:30px;margin-bottom:30px;">Bài báo, báo cáo khoa học </p>

  <div class="table-responsive">
 <table  class="example4 table table-bordered table-striped" style="width:100%">
                         <thead>                 
                            <tr style="background: #ed8210;color:white;text-align: center;">
                                <th width="5%"><input type="checkbox" name="chonhetcb" id="chonhetcb" /></th>
                                <th width="15%">Tên tác giả</th> 
                                <th width="15%">Tên tác phẩm</th> 
                                <th width="20%">Tên tập chí/NXB/Nơi cấp</th>
                                <th width="5%">ISSN</th>      
                                <th width="5%">Năm</th>
                                <th width="10%">Minh chứng</th>
                                <th width="8%">Ghi Chú</th>
                               	<th width="10%">Phạm vi</th>                                                               
                                <!-- <th width="10%" style="text-align:center;">Sửa</th>
                                <th  width="10%" style="text-align:center;">Xóa</th> -->
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
                                <!-- <th></th>
                                <th></th> -->
                            </tr>                                  	
                        </tfoot> 

                        <tbody>   
                          @foreach($Hosokhoahoc->nghiencuudacongbo as $duancb)                                  
                            <tr>
                                <td  style="text-align:center;">
                                	<input type="checkbox" name="choncb" id="chon{{$duancb->id}}" value="{{$duancb->id}}" class="chon" />
                                </td>	
                                <td>{{$duancb->tacgia}}</td>							
								<td>{{$duancb->ten}}</td>								
								<td>{{$duancb->nxb}}</td>	
								<td>{{$duancb->so_issn}}</td>	
								<td>{{$duancb->nam}}</td>
								<td>@if ($duancb->minhchung!='khong' && $duancb->minhchung!='') <a style="background:transparent;color:blue;" href="ht96_pdf/{{$duancb->minhchung}}"  target="_blank">Có</a> @endif</td>
								<td>{{$duancb->ghichu}}</td>
								<td>@if($duancb->phamvi==1) Quốc tế @else Trong nước @endif</td>
                                <!-- <td class="text-center">                                                   
                                    <a title="Sửa bài viết"><img src="ht96_admin/media/images/edit1.png" data-toggle="modal" data-target="#capnhatnghiencuucongbo{{$duancb->id}}" border="0"/>
                                </td> 

                                <td class="text-center" title="xóa bài viết">
                                   
                                 <p class="xoaduancongbo" data-id="{{$duancb->id}}"><img src="ht96_admin/media/images/delete1.gif" /></p>
                                   
                                </td> -->
                            </tr>  


<div class="modal fade" id="capnhatnghiencuucongbo{{$duancb->id}}" role="dialog">
	<div class="modal-dialog modal-lg"> 
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title ten2x">CẬP NHẬT BÀI BÁO, BÁO CÁO KHOA HỌC: {{$duancb->id}}</h4>
			</div>

		<div class="modal-body">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label class="ten2x">Tên bài báo, báo cáo </label>
						<input type="text" id="ten{{$duancb->id}}" value="{{$duancb->ten}}" class="form-control" placeholder="nhập tên dự án">
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label class="ten2x">Tác giả</label>
						<input type="text" id="tacgia{{$duancb->id}}" value="{{$duancb->tacgia}}"  class="form-control" placeholder="nhập tên tác giả">
					</div>
				</div>
			</div>

			<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="ten2x">Tên tạp chí/NXB/Nơi cấp</label>
							<input type="text" id="nxb{{$duancb->id}}" value="{{$duancb->nxb}}"   class="form-control" placeholder="nhập tên tạp chí/NXB/Nơi cấp">
					    </div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="ten2x">Loại kết quả nghiên cứu</label>
							<select id="loaiketqua{{$duancb->id}}" class="form-control">
								@foreach($Loaiketqua as $LKQ)
									<option value="{{$LKQ->id}}" @if($LKQ->id==$duancb->id_loaiketqua) selected @endif>{{$LKQ->ten_vi}}</option>
								@endforeach
							</select>
					    </div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="ten2x">Năm</label>
							<input type="text" id="nam{{$duancb->id}}" value="{{$duancb->nam}}"   class="form-control" placeholder="nhập tên tạp chí/NXB/Nơi cấp">
					    </div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
				                <label class="ten2x">Upload minh chứng</label>
				                <div class="row">
				                	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				                		<input type="file" id="file{{$duancb->id}}"  name="file">
				                	</div>
				                	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				                		<button class="btn btn-success UploadPDFedit"  data-id="{{$duancb->id}}">Upload</button>
				                	</div>
				                </div>	
	            				<p>Hệ thống chỉ hỗ trợ file PDF và có kích thước nhỏ hơn 5Mb</p>
								<input type="hidden" name="" id="minhchung{{$duancb->id}}" value="{{$duancb->minhchung}}">
	            		</div>
					</div>
				</div>


				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="ten2x">Số hiệu ISSN (viết liền xxxx - xxxx) </label>
							<input type="text" id="so_issn{{$duancb->id}}" value="{{$duancb->so_issn}}" class="form-control" placeholder="nhập địa chỉ tổ chức tài trợ ">
					    </div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="ten2x">Phạm vi</label>
							<select id="phamvi{{$duancb->id}}" class="form-control">
								<option value="0" @if($duancb->phamvi==0) selected @endif>Trong nước</option>
								<option value="1" @if($duancb->phamvi==1) selected @endif>Quốc té</option>
							</select>
							
					    </div>
					</div>
				</div>

				<div class="row">					
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="form-group">
							<label class="ten2x">Ghi chú</label>
							<textarea class="form-control" id="ghichu{{$duancb->id}}">{{$duancb->ghichu}}</textarea>							
					    </div>
					</div>
				</div>							
				
		<div class="modal-footer">
			<button type="button" class="btn btn-success btn-luu2" data-id="{{$duancb->id}}" style="float:left;">Lưu</button>
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
        <!-- <button class=" btn btn-success btn2" data-toggle="modal" data-target="#themnghiencuucongbo">Thêm</button>
    	<button class=" btn btn-danger  btn2" id="xoahetcb">Xóa</button> -->
    



<div class="modal fade" id="themnghiencuucongbo" role="dialog">
	<div class="modal-dialog modal-lg"> 
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title ten2x">THÊM BÀI BÁO, BÁO CÁO KHOA HỌC</h4>
			</div>

		<div class="modal-body">

			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label class="ten2x">Tên bài báo, báo cáo</label>
						<input type="text" id="ten" class="form-control" placeholder="nhập tên dự án">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label class="ten2x">Tác giả</label>
						<input type="text" id="tacgia"  class="form-control" placeholder="nhập tên tác giả">
					</div>
				</div>
			</div>

			<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="ten2x">Tên tạp chí/NXB/Nơi cấp</label>
							<input type="text" id="nxb"   class="form-control" placeholder="nhập tên tạp chí/NXB/Nơi cấp">
					    </div>
					</div>

					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="ten2x">Loại kết quả nghiên cứu</label>
							<select id="loaiketqua" class="form-control">
								@foreach($Loaiketqua as $LKQ)
									<option value="{{$LKQ->id}}">{{$LKQ->ten_vi}}</option>
								@endforeach
							</select>
					    </div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="ten2x">Năm</label>
							<input type="text" id="nam"   class="form-control" placeholder="nhập tên tạp chí/NXB/Nơi cấp">
					    </div>
					</div>

					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
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
									Hệ thống chỉ hỗ trợ file PDF và có kích thước nhỏ hơn 5Mb
								</p>
								<input type="hidden" name="" id="minhchung">
	            		</div>
					</div>
				</div>


				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="ten2x">Số hiệu ISSN (viết liền xxxx - xxxx) </label>
							<input type="text" id="so_issn" class="form-control" placeholder="nhập địa chỉ tổ chức tài trợ ">
					    </div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
								<label class="ten2x">Phạm vị</label>
								<select id="phamvi" class="form-control">
									<option value="0">Trong nước</option>
									<option value="1">Quốc tế</option>
								</select>						                 
					    </div>
					</div>
				</div>	

				<div class="row">					
					<div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
						<div class="form-group">
								<label class="ten2x">Ghi chú</label>
								<textarea id="ghichu" class="form-control"></textarea>												                 
					    </div>
					</div>
				</div>						
				
		<div class="modal-footer">
			<button type="button" class="btn btn-success" id="btn-luu2" style="float:left;">Lưu</button>
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
                           $("#minhchung").val(filename);
                        },
                        error: function (response) {
                            
                           var getData = $.parseJSON(response);   
                           var result = getData.kq;
                           var filename = getData.filename;
                           alert(result);

                        }
                    });
                });


		$('#btn-luu2').on('click',function(){

                	var ten=$('#ten').val();                
                	var tacgia=$('#tacgia').val();
                	var nxb=$('#nxb').val();  
                	var so_issn=$('#so_issn').val();              	
                	var nam=$('#nam').val();
                	var minhchung=$('#minhchung').val();
                	var ghichu=$('#ghichu').val();
                	var loaiketqua=$('#loaiketqua').val();                	        	  
                	var hoso={{$Hosokhoahoc->id}}; 
                	var phamvi=$('#phamvi').val();
                	
                
                 	if(ten==''){alert('Vui lòng nhập tên tác phẩm');return false;}
                    if(tacgia==''){alert('Vui lòng nhập tên tác giả');return false;}
                	if(nxb==''){alert('Vui long nhập tên nhà xuất bản');return false;}

				      $.ajax({
				        method:'POST',
				        url:'set_admin/ajax/hosokhoahoc/themnghiencuucongbo',
				        data:{
				        	ten:ten,
				        	tacgia:tacgia,
				        	nxb:nxb,
				        	so_issn:so_issn,
				        	nam:nam,
				        	minhchung:minhchung,
				        	ghichu:ghichu,
				        	loaiketqua:loaiketqua,
				        	hoso:hoso,
				        	phamvi:phamvi,
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
                success: function (response){
                        var getData = $.parseJSON(response);   
                        var result = getData.kq;
                        var filename = getData.filename;
                        alert(result);
                           $("#minhchung"+idxx).val(filename); 
                        },
                error: function (response){
                            
                        var getData = $.parseJSON(response);   
                        var result = getData.kq;
                        var filename = getData.filename;
                         alert(result);

                        }
            });
});




$('.btn-luu2').on('click',function(){

	var id=$(this).data('id');
    var ten=$('#ten'+id).val();                
    var tacgia=$('#tacgia'+id).val();
    var nxb=$('#nxb'+id).val();  
    var so_issn=$('#so_issn'+id).val();              	
    var nam=$('#nam'+id).val();
    var minhchung=$('#minhchung'+id).val();
    var ghichu=$('#ghichu'+id).val();
    var loaiketqua=$('#loaiketqua'+id).val(); 
    var phamvi=$('#phamvi'+id).val();               	        	  
    var hoso={{$Hosokhoahoc->id}};                 	
                	
        if(ten==''){alert('Vui lòng nhập tên tác phẩm');return false;}
        if(tacgia==''){alert('Vui lòng nhập tên tác giả');return false;}
        if(nxb==''){alert('Vui long nhập tên nhà xuất bản');return false;}                 

            $.ajax({

				    method:'POST',
				    url:'set_admin/ajax/hosokhoahoc/capnhatnghiencuucongbo',
				    data:{
				        	ten:ten,
				        	tacgia:tacgia,
				        	nxb:nxb,
				        	so_issn:so_issn,
				        	nam:nam,
				        	minhchung:minhchung,
				        	ghichu:ghichu,
				        	loaiketqua:loaiketqua,
				        	hoso:hoso,
				        	phamvi:phamvi,
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


		$('.xoaduancongbo').on('click',function(){
                 	if(!confirm('Xác nhận xóa:')) return false;
                 	var id=$(this).data('id');
                 	$.get("set_admin/ajax/hosokhoahoc/xoaduancongbo/"+id,function(data){alert(data);window.location.reload();});
			});


		$('#chonhetcb').on('click',function(){
                var status=this.checked;
                $("input[name='choncb']").each(function(){this.checked=status;})
            });

            $('#xoahetcb').on('click',function(){
                var listid="";
                $("input[name='choncb']").each(function(){
                  if (this.checked) listid = listid+","+this.value;
                  })
                listid=listid.substr(1);  // alert(listid);
                if (listid=="") { alert("Bạn chưa chọn mục nào"); return false;}
                hoi= confirm("Bạn có chắc chắn muốn xóa?");
                if (hoi==true){
                	$.get("set_admin/ajax/hosokhoahoc/xoaduancongbohet/"+listid,function(data){
            			alert(data);
            			window.location.reload();
        			});
                } 
            });



</script>


@endsection