@extends('Admin.Bomon.Hosokhoahoc.Master')
@section('Tabvalue')
 <div  class="tab-pane @if ($tab==7) active @endif" id="profile">
 	
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
                                <th width="5%">STT</th>
                                <th width="10%">Thời gian</th>               
                                <th>Tên cơ quan công tác</th>  
                                <th width="15%">Địa chỉ</th>
                                <th width="15%">Chức vụ</th>                                                                        
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
                            </tr>                                  	
                        </tfoot> 

                        <tbody>   
                          @foreach($Hosokhoahoc->quatrinhcongtac as $congtac)                                  
                            <tr>
                                <td  style="text-align:center;">
                                	<input type="checkbox" name="chon" id="chon{{$congtac->id}}" value="{{$congtac->id}}" class="chon" />
                                </td>
                                 <td align="center">
						             <input type="text" value="{{$congtac->stt}}" data-val0="{{$congtac->id}}" data-val1="ht96_quatrinhcongtac"  data_val2="{{$congtac->stt}}"  name="ordering[]" class="tipS smallText update_stt" title="Nhập số thứ tự bài viết"  />
						             <div id="ajaxloader"><img class="numloader" id="ajaxloader" src="ht96_admin/media/images/loader.gif" alt="loader" /></div>
						         </td>
								<td>Từ: {{date('d-m-Y', strtotime($congtac->ngaybatdau))}} &nbsp;&nbsp; Đến: {{date('d-m-Y', strtotime($congtac->ngayketthuc))}}</td>
								<td>{{$congtac->tencoso_vi}}</td>
								<td>{{$congtac->diachicoso}}</td>
								<td>{{$congtac->chucvu_vi}}</td>								
                                <td class="text-center">                                                   
                                    <a title="Sửa bài viết"><img src="ht96_admin/media/images/edit1.png" data-toggle="modal" data-target="#capnhatcongtac{{$congtac->id}}" border="0"/>
                                </td> 

                                <td class="text-center" title="xóa bài viết">
                                   
                                 <p class="xoacongtac" data-id="{{$congtac->id}}"><img src="ht96_admin/media/images/delete1.gif" /></p>
                                   
                                </td>
                            </tr>  

                     <div class="modal fade" id="capnhatcongtac{{$congtac->id}}" role="dialog">
									<div class="modal-dialog modal-lg"> 
									    <div class="modal-content">
									        <div class="modal-header">
									          <button type="button" class="close" data-dismiss="modal">&times;</button>
									          <h4 class="modal-title ten2x">CẬP NHẬT QUÁ TRÌNH CÔNG TÁC SỐ:  {{$congtac->id}}</h4>
									    	</div>
								<div class="modal-body">
									<div class="row">
										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
											<div class="form-group">
												<label class="ten2x">Tên cơ quan công tác (VI)</label>
												<input type="text" id="tencoso_vi{{$congtac->id}}" value="{{$congtac->tencoso_vi}}"  class="form-control" placeholder="nhập tên cơ quan công tác tiếng việt">
											</div>
										</div>

										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
											<div class="form-group">
												<label class="ten2x">Tên cơ quan công tác (EN)</label>
												<input type="text" id="tencoso_en{{$congtac->id}}" value="{{$congtac->tencoso_en}}"  class="form-control" placeholder="nhập tên cơ quan công tác tiếng anh">
											</div>
										</div>
									</div>

									<div class="row">
											<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
												<div class="form-group">
													<label class="ten2x">Địa chỉ cơ quan</label>
													<input type="text" id="diachicoso{{$congtac->id}}" value="{{$congtac->diachicoso}}"  class="form-control" placeholder="nhập địa chỉ cơ quan">
											    </div>
											</div>

											<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
												<div class="form-group">
													<label class="ten2x">Số điện thoại cơ quan</label>
													<input type="text" id="sdtcoso{{$congtac->id}}" value="{{$congtac->sdtcoso}}"  class="form-control" placeholder="nhập số điện thoại cơ quan">
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
														    <input type="text" value="{{date('d-m-Y', strtotime($congtac->ngaybatdau))}}"   class="form-control pull-right datepicker" placeholder="Ngày bắt đầu làm việc" id="tungay{{$congtac->id}}" >
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
														    <input type="text" value="{{date('d-m-Y', strtotime($congtac->ngayketthuc))}}"  class="form-control pull-right datepicker"  placeholder="Ngày kết thúc làm việc" id="denngay{{$congtac->id}}">
														</div>                   
												</div>
											</div>
										</div>

				
				

										<div class="row">
												<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
													<div class="form-group">
														<label class="ten2x">Chức vụ (VI)</label>
														<input type="text" id="chucvu_vi{{$congtac->id}}" value="{{$congtac->chucvu_vi}}"  class="form-control" placeholder="nhập chức vụ tại cơ quan tiếng việt">
											        </div>
												</div>

												<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
													<div class="form-group">
														<label class="ten2x">Chức vụ (EN)</label>
														<input type="text" id="chucvu_en{{$congtac->id}}" value="{{$congtac->chucvu_en}}"  class="form-control" placeholder="nhập chức vụ tại cơ quan tiếng anh">
											       </div>
												</div>
										</div>

										<div class="row">
												<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
													<div class="form-group">
														<label class="ten2x">Ghi chú</label>
														<textarea id="ghichu{{$congtac->id}}" class="form-control">{{$congtac->ghichu}}</textarea>								                 
											        </div>
												</div>										
										</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-success btn-luu" data-id="{{$congtac->id}}" style="float:left;">Lưu</button>
	        			<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					</div>	
	
							</div>	      
						</div>
					</div> 
                @endforeach                            
            </tbody> 
        </table> 
        <button class=" btn btn-success btn2" data-toggle="modal" data-target="#themcongtacmoi">Thêm</button>
    	<button class=" btn btn-danger  btn2" id="xoahet">Xóa</button>
    </div>    
    



<div class="modal fade" id="themcongtacmoi" role="dialog">
	<div class="modal-dialog modal-lg"> 
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title ten2x">THÊM QUÁ TRÌNH CÔNG TÁC SỐ:</h4>
			</div>
		<div class="modal-body">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label class="ten2x">Tên cơ quan công tác (VI)</label>
						<input type="text" id="tencoso_vi"  class="form-control" placeholder="nhập tên cơ quan công tác tiếng việt">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label class="ten2x">Tên cơ quan công tác (EN)</label>
						<input type="text" id="tencoso_en"  class="form-control" placeholder="nhập tên cơ quan công tác tiếng anh">
					</div>
				</div>
			</div>

			<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="ten2x">Địa chỉ cơ quan</label>
							<input type="text" id="diachicoso"  class="form-control" placeholder="nhập địa chỉ cơ quan">
					    </div>
					</div>

					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="ten2x">Số điện thoại cơ quan</label>
							<input type="text" id="sdtcoso"  class="form-control" placeholder="nhập số điện thoại cơ quan">
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
							    <input type="text"   class="form-control pull-right datepicker" placeholder="Ngày bắt đầu làm việc" id="tungay" >
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
							    <input type="text"  class="form-control pull-right datepicker"  placeholder="Ngày kết thúc làm việc" id="denngay">
							</div>                   
					</div>
				</div>
			</div>

				
				

				<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="form-group">
								<label class="ten2x">Chức vụ (VI)</label>
								<input type="text" id="chucvu_vi"  class="form-control" placeholder="nhập chức vụ tại cơ quan tiếng việt">
					        </div>
						</div>

						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="form-group">
								<label class="ten2x">Chức vụ (EN)</label>
								<input type="text" id="chucvu_en"  class="form-control" placeholder="nhập chức vụ tại cơ quan tiếng anh">
					       </div>
						</div>
				</div>

				<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="form-group">
								<label class="ten2x">Ghi chú</label>
								<textarea id="ghichu" class="form-control"></textarea>								                 
					        </div>
						</div>										
				</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-success" id="btn-luu" style="float:left;">Lưu</button>
	        			<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
                	var diachicoso=$('#diachicoso').val();
                	var sdtcoso=$('#sdtcoso').val();                	
                	var tungay=$('#tungay').val();
                	var denngay=$('#denngay').val();
                	var chucvu_vi=$('#chucvu_vi').val();
                	var chucvu_en=$('#chucvu_en').val();
                	var ghichu=$('#ghichu').val();            	  
                	var hoso={{$Hosokhoahoc->id}};                	
                	

                 	if(tencoso_vi==''){alert('Vui lòng nhập tên cơ sở tiếng việt');return false;}
                	if(tencoso_en==''){alert('Vui lòng nhập tên cơ sở tiếng anh');return false;}
                	if(diachicoso==''){alert('Vui long nhập địa chỉ cơ sở');return false;}
                	if(sdtcoso==''){alert('Vui long nhập số điện thoại cơ sở');return false;} 
                

                $.ajax({
				        method:'POST',
				        url:'set_admin/ajax/hosokhoahoc/themcongtac',
				        data:{
				        	tencoso_vi:tencoso_vi,
				        	tencoso_en:tencoso_en,
				        	diachicoso:diachicoso,
				        	sdtcoso:sdtcoso,
				        	tungay:tungay,
				        	denngay:denngay,
				        	chucvu_vi:chucvu_vi,
				        	chucvu_en:chucvu_en,
				        	ghichu:ghichu,
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


$('.btn-luu').on('click',function(){

    var id=$(this).data('id');                 	
    var tencoso_vi=$('#tencoso_vi'+id).val();
    var tencoso_en=$('#tencoso_en'+id).val();
    var diachicoso=$('#diachicoso'+id).val();
    var sdtcoso=$('#sdtcoso'+id).val();                	
    var tungay=$('#tungay'+id).val();
    var denngay=$('#denngay'+id).val();
    var chucvu_vi=$('#chucvu_vi'+id).val();
    var chucvu_en=$('#chucvu_en'+id).val();
    var ghichu=$('#ghichu'+id).val();            	  
    var hoso={{$Hosokhoahoc->id}};                 	
                	

    if(tencoso_vi==''){alert('Vui lòng nhập tên cơ sở tiếng việt');return false;}
    if(tencoso_en==''){alert('Vui lòng nhập tên cơ sở tiếng anh');return false;}
    if(diachicoso==''){alert('Vui long nhập địa chỉ cơ sở');return false;}
    if(sdtcoso==''){alert('Vui long nhập số điện thoại cơ sở');return false;}
    if(tungay==''){alert('Vui lòng nhập ngày bắt đầu làm việc');return false;}
    if(denngay==''){alert('Vui lòng nhập thời gian kết thúc công việc');return false;}                	
    if(chucvu_vi==''){alert('Vui lòng nhập chức vụ tại cơ sở iếng việt');return false;}
    if(chucvu_en==''){alert('Vui lòng nhập chức vụ tại cơ sở tiếng anh');return false;}
              

     $.ajax({

				method:'POST',
				url:'set_admin/ajax/hosokhoahoc/capnhatcongtac',
				data:{
				        tencoso_vi:tencoso_vi,
				        tencoso_en:tencoso_en,
				        diachicoso:diachicoso,
				        sdtcoso:sdtcoso,
				        tungay:tungay,
				        denngay:denngay,
				        chucvu_vi:chucvu_vi,
				        chucvu_en:chucvu_en,
				        ghichu:ghichu,
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


$('.xoacongtac').on('click',function(){
        if(!confirm('Xác nhận xóa:')) return false;
        var id=$(this).data('id');
        $.get("set_admin/ajax/hosokhoahoc/xoacongtac/"+id,function(data){alert(data);window.location.reload();});
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
    if (hoi==true){$.get("set_admin/ajax/hosokhoahoc/xoacongtachet/"+listid,function(data){alert(data);window.location.reload();});} 
});



</script>
@endsection