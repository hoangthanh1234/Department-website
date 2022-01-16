@extends('Admin.Bomon.Hosokhoahoc.Master')

@section('Tabvalue')
<div role="tabpanel" class="tab-pane  @if ($tab==3) active @endif" id="profile">	  
	
	<p class="ten2x" style="font-size:20px;margin-top:30px;margin-bottom:30px;">Đề tài nghiên cứu khoa học</p>

<div class="table-responsive">
 <table  class="example4 table table-bordered table-striped" style="width:1500px">
                         <thead>                 
                            <tr style="background: #ed8210;color:white;text-align: center;">
                                <th width="5%"><input type="checkbox" name="chonhetcb" id="chonhetcb" /></th>
                                <th width="5%">STT</th>
                                <th width="10%">Nổi bật</th>
                                <th width="20%">Tên dề tài</th> 
                                <th width="20%">Chủ nhiệm</th> 
                                <th width="8%">Mã số</th>
                                <th width="10%">Cấp đề tài</th>      
                                <th width="10%">Trạng thái</th>
                                <th width="20%">Minh chứng</th>                                                          
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
                                <th></th> 
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>                                  	
                        </tfoot> 

                        <tbody>   
@foreach($Hosokhoahoc->congtrinhkhoahoc as $CTKH)                                  
   <tr>
       <td  style="text-align:center;">
           <input type="checkbox" name="choncb" id="chon{{$CTKH->id}}" value="{{$CTKH->id}}" class="chon" />
       </td>	
        <td align="center">
             <input type="text" value="{{$CTKH->stt}}" data-val0="{{$CTKH->id}}" data-val1="ht96_congtrinhkhoahoc"  data_val2="{{$CTKH->stt}}"  name="ordering[]" class="tipS smallText update_stt" title="Nhập số thứ tự bài viết"  />
             <div id="ajaxloader"><img class="numloader" id="ajaxloader" src="ht96_admin/media/images/loader.gif" alt="loader" /></div>
         </td> 

        <td style="text-align:center;">
            <?php $f=($CTKH->noibat==1)?"diamondToggleOff":""; ?>
            <a data-val2="ht96_congtrinhkhoahoc" rel="{{$CTKH->noibat}}" data-val3="noibat" class="checktt diamondToggle <?=$f;?>" data-val0="{{$CTKH->id}}" data-val4="{{Auth::user()->level}}"></a>   
         </td>
        <td>{{$CTKH->ten}}</td>							
		<td>{{$CTKH->chunhiem}}</td>								
		<td>{{$CTKH->maso}}</td>	
		<td>{{$CTKH->capdetai->ten_vi}}</td>	
		<td>{{$CTKH->trangthai}}</td>
		<td>@if ($CTKH->minhchung!='') 
			<a style="background:transparent;color:blue;" href="ht96_pdf/{{$CTKH->minhchung}}"  target="_blank">Có</a> @endif
		</td>
								
        <td class="text-center">                                                   
       		<a title="Sửa bài viết"><img src="ht96_admin/media/images/edit1.png" data-toggle="modal" data-target="#capnhatnghiencuucongbo{{$CTKH->id}}" border="0"/>
        </td> 

        <td class="text-center" title="xóa bài viết">                                   
            <p class="xoaduancongbo" data-id="{{$CTKH->id}}"><img src="ht96_admin/media/images/delete1.gif" /></p>
        </td>
    </tr>  


<div class="modal fade" id="capnhatnghiencuucongbo{{$CTKH->id}}" role="dialog">
	<div class="modal-dialog modal-lg"> 
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title ten2x">CẬP NHẬT BÀI BÁO, BÁO CÁO KHOA HỌC: {{$CTKH->id}}</h4>
			</div>

		<div class="modal-body">

		<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label class="ten2x">Tên đề tài</label>
						<input type="text" id="ten{{$CTKH->id}}" value="{{$CTKH->ten}}" class="form-control" placeholder="nhập tên dự án">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label class="ten2x">Chủ nhiệm đề tài</label>
						<input type="text" id="chunhiem{{$CTKH->id}}" value="{{$CTKH->chunhiem}}"  class="form-control" placeholder="nhập tên chủ nhiệm đề tài">
					</div>
				</div>
		</div>

		<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="ten2x">Thành viên thực hiện</label>
							<input type="text" id="thanhvien{{$CTKH->id}}"  value="{{$CTKH->thanhvien}}"  class="form-control" placeholder="nhập tên thành viên thực hiện">
					    </div>
					</div>

					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="ten2x">Cấp đề tài</label>
							<select id="capdetai{{$CTKH->id}}" class="form-control">
								@foreach($Capdetai as $CDT)
									<option value="{{$CDT->id}}" @if($CTKH->id_capdetai==$CDT->id) selected @endif>{{$CDT->ten_vi}}</option>
								@endforeach
							</select>
					    </div>
					</div>
			</div>

			<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="ten2x">Trạng thái</label>
							<select id="trangthai{{$CTKH->id}}" class="form-control">
								<option value="Đang thực hiện" @if($CTKH->trangthai=='Đang thực hiện') selected @endif>Đang thực hiện</option>
								<option value="Đã nghiệm thu" @if($CTKH->trangthai=='Đã nghiệm thu') selected @endif>Đã nghiệm thu</option>
							</select>
					    </div>
					</div>

					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
				                <label class="ten2x">Upload minh chứng</label>
				                <div class="row">
				                	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				                		<input type="file" id="file{{$CTKH->id}}" name="file">
				                	</div>
				                	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				                		<button class="btn btn-success UploadPDF" data-id="{{$CTKH->id}}">Upload</button>
				                	</div>
				                </div>					                            
				                			
	            				<p> 	            					
									Hệ thống chỉ hỗ trợ file PDF và có kích thước nhỏ hơn 5Mb
								</p>
								<input type="hidden"  id="minhchung{{$CTKH->id}}" value="{{$CTKH->minhchung}}">
	            		</div>
					</div>
			</div>


			<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="ten2x">Mã số</label>
							<input type="text" id="maso{{$CTKH->id}}" value="{{$CTKH->maso}}" class="form-control" placeholder="nhập mã số đề tài">
					    </div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
								<label class="ten2x">Năm</label>
								<input type="text" id="nam{{$CTKH->id}}" value="{{$CTKH->nam}}" class="form-control" placeholder="nhập địa chỉ năm thực hiện">	
					    </div>
					</div>
			</div>								
				
		<div class="modal-footer">
			<button type="button" class="btn btn-success btn-luu2" data-id="{{$CTKH->id}}" style="float:left;">Lưu</button>
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
<button class=" btn btn-success btn2" data-toggle="modal" data-target="#themnghiencuucongbo">Thêm</button>
<button class=" btn btn-danger  btn2" id="xoahetcb">Xóa</button>
    



<div class="modal fade" id="themnghiencuucongbo" role="dialog">
	<div class="modal-dialog modal-lg"> 
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title ten2x">THÊM ĐỀ TÀI NGHIÊN CỨU KHOA HỌC MỚI</h4>
			</div>

	<div class="modal-body">

			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label class="ten2x">Tên đề tài</label>
						<input type="text" id="ten" class="form-control" placeholder="nhập tên dự án">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label class="ten2x">Chủ nhiệm đề tài</label>
						<input type="text" id="chunhiem"  class="form-control" placeholder="nhập tên chủ nhiệm đề tài">
					</div>
				</div>
			</div>

			<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="ten2x">Thành viên thực hiện</label>
							<input type="text" id="thanhvien"   class="form-control" placeholder="nhập tên thành viên thực hiện">
					    </div>
					</div>

					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="ten2x">Cấp đề tài</label>
							<select id="capdetai" class="form-control">
								@foreach($Capdetai as $CDT)
									<option value="{{$CDT->id}}">{{$CDT->ten_vi}}</option>
								@endforeach
							</select>
					    </div>
					</div>
			</div>

			<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="ten2x">Trạng thái</label>
							<select id="trangthai" class="form-control">
								<option value="Đang thực hiện">Đang thực hiện</option>
								<option value="Đã nghiệm thu">Đã nghiệm thu</option>
							</select>
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
							<label class="ten2x">Mã số</label>
							<input type="text" id="maso" class="form-control" placeholder="nhập mã số đề tài">
					    </div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
								<label class="ten2x">Năm</label>
								<input type="text" id="nam" class="form-control" placeholder="nhập địa chỉ năm thực hiện">	
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
                	var chunhiem=$('#chunhiem').val();
                	var thanhvien=$('#thanhvien').val();  
                	var capdetai=$('#capdetai').val();              	
                	var trangthai=$('#trangthai').val();
                	var minhchung=$('#minhchung').val();
                	var maso=$('#maso').val();
                	var nam=$('#nam').val();                	        	  
                	var hoso={{$Hosokhoahoc->id}}; 
                	
                
                 	if(ten==''){alert('Vui lòng nhập tên đề tài');return false;}
                    

				      $.ajax({
				        method:'POST',
				        url:'set_admin/ajax/hosokhoahoc/themdetainghiencuu',
				        data:{
				        	ten:ten,
				        	chunhiem:chunhiem,
				        	thanhvien:thanhvien,
				        	capdetai:capdetai,
				        	trangthai:trangthai,
				        	minhchung:minhchung,
				        	maso:maso,
				        	nam:nam,
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


		$('a.diamondToggle').click(function(){
			var quyen=$(this).data("val4");
			if(quyen!=1 && quyen !=2){
					if($(this).attr("rel")==0){
					$.get('set_admin/ajax/hienthi/'+$(this).attr("data-val0")+'/'+$(this).attr("data-val2")+'/'+$(this).attr("data-val3")+'/0');
					$(this).addClass("diamondToggleOff");
					$(this).attr("rel",1);
				}else{					
					$.get('set_admin/ajax/hienthi/'+$(this).attr("data-val0")+'/'+$(this).attr("data-val2")+'/'+$(this).attr("data-val3")+'/1');
					$(this).removeClass("diamondToggleOff");
					$(this).attr("rel",0);
				}
				alert("Bạn không có quyền thay đổi trang thái này vui lòng liên hệ Admin");
			}
		});

$('.UploadPDF').on('click', function (){

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
    var chunhiem=$('#chunhiem'+id).val();
    var thanhvien=$('#thanhvien'+id).val();  
    var capdetai=$('#capdetai'+id).val();              	
    var trangthai=$('#trangthai'+id).val();
    var minhchung=$('#minhchung'+id).val();
    var maso=$('#maso'+id).val();
    var nam=$('#nam'+id).val();                	        	  
    var hoso={{$Hosokhoahoc->id}}; 
             	
                	
    if(ten==''){alert('Vui lòng nhập tên đề tài khoa học');return false;}                    

  				$.ajax({

				        method:'POST',
				        url:'set_admin/ajax/hosokhoahoc/capnhatdetainghiencuu',
				        data:{
				        	ten:ten,
				        	chunhiem:chunhiem,
				        	thanhvien:thanhvien,
				        	capdetai:capdetai,
				        	trangthai:trangthai,
				        	minhchung:minhchung,
				        	maso:maso,
				        	nam:nam,
				        	hoso:hoso,	
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
                 	$.get("set_admin/ajax/hosokhoahoc/xoadetainghiencuu/"+id,function(data){alert(data);window.location.reload();});
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
                	$.get("set_admin/ajax/hosokhoahoc/xoadetainghiencuuhet/"+listid,function(data){
            			alert(data);
            			window.location.reload();
        			});
                } 
            });



</script>


@endsection