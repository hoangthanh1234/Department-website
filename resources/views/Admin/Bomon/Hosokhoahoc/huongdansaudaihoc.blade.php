@extends('Admin.Bomon.Hosokhoahoc.Master')

@section('Tabvalue')
 <div role="tabpanel" class="tab-pane  @if ($tab==5) active @endif" id="profile">	  

	<p class="ten2x" style="font-size:20px;margin-top:30px;margin-bottom:30px;">Hướng dẫn sau đại học</p>

 <table  class="example4 table table-bordered table-striped" style="width:100%">
                         <thead>                 
                            <tr style="background: #ed8210;color:white;text-align: center;">
                                <th width="5%"><input type="checkbox" name="chonhetcb" id="chonhetcb" /></th>
                                <th width="20%">Tên sinh viên</th> 
                                <th width="20%">Tên đề tài</th> 
                                <th width="10%">Trình độ</th>
                                <th width="20%">Cơ sở đào tạo</th>      
                                <th width="12%">Năm hướng dẫn</th>
                                <th width="10%">Năm bảo vệ</th>                                                          
                                <th width="8%" style="text-align:center;">Sửa</th>
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
                            </tr>                                  	
                        </tfoot> 

                        <tbody>   
@foreach($Hosokhoahoc->huongdansaudaihoc as $HDSDH)                                  
   <tr>
       <td  style="text-align:center;">
           <input type="checkbox" name="choncb" id="chon{{$HDSDH->id}}" value="{{$HDSDH->id}}" class="chon" />
       </td>	
        <td>{{$HDSDH->tensinhvien}}</td>							
		<td>{{$HDSDH->tendetai}}</td>								
		<td>{{$HDSDH->trinhdo}}</td>	
		<td>{{$HDSDH->tencoso_vi}}</td>	
		<td>{{$HDSDH->namhuongdan}}</td>
		<td>{{$HDSDH->nambaove}}</td>
								
        <td class="text-center">                                                   
       		<a title="Sửa bài viết"><img src="ht96_admin/media/images/edit1.png" data-toggle="modal" data-target="#capnhathuongdansaudaihoc{{$HDSDH->id}}" border="0"/>
        </td> 

        <td class="text-center" title="xóa bài viết">                                   
            <p class="xoahuongdansaudaihoc" data-id="{{$HDSDH->id}}"><img src="ht96_admin/media/images/delete1.gif" /></p>
        </td>
    </tr>  


<div class="modal fade" id="capnhathuongdansaudaihoc{{$HDSDH->id}}" role="dialog">
	<div class="modal-dialog modal-lg"> 
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title ten2x">CẬP NHẬT HƯỚNG DẪN SAU ĐẠI HỌC SỐ: {{$HDSDH->id}}</h4>
			</div>

		<div class="modal-body">

		<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label class="ten2x">Tên sinh viên</label>
						<input type="text" id="tensinhvien{{$HDSDH->id}}" value="{{$HDSDH->tensinhvien}}" class="form-control" placeholder="nhập tên sinh viên">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label class="ten2x">Tên đề tài</label>
						<input type="text" id="tendetai{{$HDSDH->id}}" value="{{$HDSDH->tendetai}}" class="form-control" placeholder="nhập tên đề tài">
					</div>
				</div>
			</div>

			<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="ten2x">Tên cơ sở (VI)</label>
							<input type="text" id="tencoso_vi{{$HDSDH->id}}" value="{{$HDSDH->tencoso_vi}}"  class="form-control" placeholder="nhập tên cơ sở tiếng việt">
					    </div>
					</div>

					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="ten2x">Tên cơ sở (EN)</label>
							<input type="text" id="tencoso_en{{$HDSDH->id}}" value="{{$HDSDH->tencoso_en}}"  class="form-control" placeholder="nhập tên cơ sở tiếng anh">
					    </div>
					</div>
			</div>

			<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="ten2x">Năm hướng dẫn</label>
							<input type="text" id="namhuongdan{{$HDSDH->id}}"  value="{{$HDSDH->namhuongdan}}"   class="form-control" placeholder="nhập năm hướng dẫn">
					    </div>
					</div>

					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
				                <label class="ten2x">Năm bảo vệ</label>
				                <input type="text" id="nambaove{{$HDSDH->id}}" value="{{$HDSDH->nambaove}}"  class="form-control" placeholder="nhập năm bảo vệ">
	            		</div>
					</div>
			</div>


			<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="ten2x">Trình độ</label>
							<input type="text" id="trinhdo{{$HDSDH->id}}" value="{{$HDSDH->trinhdo}}"  class="form-control" placeholder="Trình độ hướng dẫn">
					    </div>
					</div>
					
			</div>									
				
		<div class="modal-footer">
			<button type="button" class="btn btn-success btn-luu" data-id="{{$HDSDH->id}}" style="float:left;">Lưu</button>
	        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
		</div>	
		</div>	      
		</div>
	</div>
</div>
@endforeach 

</tbody> 
</table> 
<button class=" btn btn-success btn2" data-toggle="modal" data-target="#themnghiencuucongbo">Thêm</button>
<button class=" btn btn-danger  btn2" id="xoahetcb">Xóa</button>
    



<div class="modal fade" id="themnghiencuucongbo" role="dialog">
	<div class="modal-dialog modal-lg"> 
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title ten2x">THÊM HƯỚNG DẪN SAU ĐẠI HỌC MỚI</h4>
			</div>

	<div class="modal-body">

			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label class="ten2x">Tên sinh viên</label>
						<input type="text" id="tensinhvien" class="form-control" placeholder="nhập tên sinh viên">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label class="ten2x">Tên đề tài</label>
						<input type="text" id="tendetai"  class="form-control" placeholder="nhập tên đề tài">
					</div>
				</div>
			</div>

			<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="ten2x">Tên cơ sở (VI)</label>
							<input type="text" id="tencoso_vi"   class="form-control" placeholder="nhập tên cơ sở tiếng việt">
					    </div>
					</div>

					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="ten2x">Tên cơ sở (EN)</label>
							<input type="text" id="tencoso_en"   class="form-control" placeholder="nhập tên cơ sở tiếng anh">
					    </div>
					</div>
			</div>

			<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="ten2x">Năm hướng dẫn</label>
							<input type="text" id="namhuongdan"   class="form-control" placeholder="nhập năm hướng dẫn">
					    </div>
					</div>

					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
				                <label class="ten2x">Năm bảo vệ</label>
				                <input type="text" id="nambaove"   class="form-control" placeholder="nhập năm bảo vệ">
	            		</div>
					</div>
			</div>


			<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="ten2x">Trình độ</label>
							<input type="text" id="trinhdo"   class="form-control" placeholder="Trình độ hướng dẫn">
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
    

</div> 
@endsection


@section('script')
	<script type="text/javascript">	
		

		


		$('#btn-luu').on('click',function(){

                	var tensinhvien=$('#tensinhvien').val();                
                	var tendetai=$('#tendetai').val();
                	var tencoso_vi=$('#tencoso_vi').val();  
                	var tencoso_en=$('#tencoso_en').val();              	
                	var namhuongdan=$('#namhuongdan').val();
                	var nambaove=$('#nambaove').val();
                	var trinhdo=$('#trinhdo').val();                	             	        	  
                	var hoso={{$Hosokhoahoc->id}}; 
                	
                
                 	if(tensinhvien==''){alert('Vui lòng nhập tên sinh viên');return false;}
                 	if(tendetai==''){alert('Vui lòng nhập tên đề tài');return false;}
                    

				      $.ajax({
				        method:'POST',
				        url:'set_admin/ajax/hosokhoahoc/themhuongdansaudaihoc',
				        data:{
				        	tensinhvien:tensinhvien,
				        	tendetai:tendetai,
				        	tencoso_vi:tencoso_vi,
				        	tencoso_en:tencoso_en,
				        	namhuongdan:namhuongdan,
				        	nambaove:nambaove,
				        	trinhdo:trinhdo,				        	
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
	var tensinhvien=$('#tensinhvien'+id).val();                
    var tendetai=$('#tendetai'+id).val();
    var tencoso_vi=$('#tencoso_vi'+id).val();  
    var tencoso_en=$('#tencoso_en'+id).val();              	
    var namhuongdan=$('#namhuongdan'+id).val();
    var nambaove=$('#nambaove'+id).val();
    var trinhdo=$('#trinhdo'+id).val();                	             	        	  
    var hoso={{$Hosokhoahoc->id}}; 
             	
                	
    if(tendetai==''){alert('Vui lòng nhập tên đề tài khoa học');return false;}                    

  				$.ajax({
				        method:'POST',
				        url:'set_admin/ajax/hosokhoahoc/capnhathuongdansaudaihoc',
				        data:{
				        	tensinhvien:tensinhvien,
				        	tendetai:tendetai,
				        	tencoso_vi:tencoso_vi,
				        	tencoso_en:tencoso_en,
				        	namhuongdan:namhuongdan,
				        	nambaove:nambaove,
				        	trinhdo:trinhdo,				        	
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


		$('.xoahuongdansaudaihoc').on('click',function(){
                 	if(!confirm('Xác nhận xóa:')) return false;
                 	var id=$(this).data('id');
                 	$.get("set_admin/ajax/hosokhoahoc/xoahuongdansaudaihoc/"+id,function(data){alert(data);window.location.reload();});
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
                	$.get("set_admin/ajax/hosokhoahoc/xoahuongdansaudaihochet/"+listid,function(data){
            			alert(data);
            			window.location.reload();
        			});
                } 
            });



</script>


@endsection