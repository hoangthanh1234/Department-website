@extends('Admin.Khoa.Hosokhoahoc.Master')

@section('Tabvalue')
 <div role="tabpanel" class="tab-pane  @if ($tab==5) active @endif" id="profile">	  

	<p class="ten2x" style="font-size:20px;margin-top:30px;margin-bottom:30px;">Hướng dẫn sau đại học</p>

  <div class="table-responsive">
 <table class="table table-bordered table-striped example2" style="width:100%">
                         <thead>                 
                            <tr class="bg-top">
                                <th width="5%" class="text-center"><input type="checkbox" name="chonhetcb" id="chonhetcb" /></th>
                                <th width="8%" class="text-center">Sửa</th>
                                <th width="8%" class="text-center">Xóa</th>
                                <th class="text-center">Tên sinh viên</th> 
                                <th class="text-center">Tên đề tài</th> 
                                <th width="15%" class="text-center">Trình độ</th>    
                                <th width="15%" class="text-center">Năm HD</th>
                                <th width="10%" class="text-center">Năm BV</th>
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
@foreach($Giangvien->huongdansaudaihoc as $HDSDH)                                  
   <tr>
       <td class="text-center">
           <input type="checkbox" name="choncb" id="chon{{$HDSDH->id}}" value="{{$HDSDH->id}}" class="chon" />
       </td>	
        <td class="text-center">                                                   
       		<i class="fa fa-edit fa-2x blue" data-toggle="modal" data-target="#capnhathuongdansaudaihoc{{$HDSDH->id}}"></i>
        </td> 

        <td class="text-center" title="xóa bài viết">                                   
            <i class="fa fa-times text-dange fa-2x red" class="xoahuongdansaudaihoc" data-id="{{$HDSDH->id}}"></i>
        </td>
        <td>{{$HDSDH->tensinhvien_vi}}</td>							
		<td>{{$HDSDH->tendetai_vi}}</td>
		<td>{{$HDSDH->trinhdo->ten_vi}}</td>
		<td class="text-center">{{date('m/Y', strtotime($HDSDH->namhuongdan))}}</td>
		<td class="text-center">{{date('m/Y', strtotime($HDSDH->nambaove))}}</td>
    </tr>  


<div class="modal fade" id="capnhathuongdansaudaihoc{{$HDSDH->id}}" role="dialog">
	<div class="modal-dialog modal-lg"> 
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title ten2x">CẬP NHẬT HƯỚNG DẪN SAU ĐẠI HỌC</h4>
			</div>

		<div class="modal-body">

		<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label class="ten2x">Tên sinh viên (VI)</label>
						<input type="text" id="tensinhvien_vi{{$HDSDH->id}}" value="{{$HDSDH->tensinhvien_vi}}" class="form-control" placeholder="nhập tên sinh viên bằng tiếng Việt">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label class="ten2x">Tên sinh viên (EN)</label>
						<input type="text" id="tensinhvien_en{{$HDSDH->id}}" value="{{$HDSDH->tensinhvien_en}}" class="form-control" placeholder="nhập tên sinh viên bằng tiếng Anh">
					</div>
				</div>				
			</div>

			<div class="row">
				
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label class="ten2x">Tên đề tài (VI)</label>
						<input type="text" id="tendetai_vi{{$HDSDH->id}}" value="{{$HDSDH->tendetai_vi}}" class="form-control" placeholder="nhập tên đề tài bẳng tiếng Việt">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label class="ten2x">Tên đề tài (EN)</label>
						<input type="text" id="tendetai_en{{$HDSDH->id}}" value="{{$HDSDH->tendetai_en}}" class="form-control" placeholder="nhập tên đề tài bằng tiếng Anh">
					</div>
				</div>


			</div>

			<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="ten2x">Tên cơ sở (VI)</label>
							<input type="text" id="tencoso_vi{{$HDSDH->id}}" value="{{$HDSDH->tencoso_vi}}"  class="form-control" placeholder="nhập tên cơ sở bằng tiếng Việt">
					    </div>
					</div>

					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="ten2x">Tên cơ sở (EN)</label>
							<input type="text" id="tencoso_en{{$HDSDH->id}}" value="{{$HDSDH->tencoso_en}}"  class="form-control" placeholder="nhập tên cơ sở tiếng Anh">
					    </div>
					</div>
			</div>

			<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="ten2x">Năm hướng dẫn</label>
							 <div class="input-group date">
				                <input type="text" class="form-control datepicker" id="namhuongdan{{$HDSDH->id}}" placeholder="nhập năm hướng dẫn" value="{{date('d/m/Y', strtotime($HDSDH->namhuongdan))}}">
				                <div class="input-group-addon">
				                    <span class="glyphicon glyphicon-th"></span>
				                 </div>
				            </div>
					    </div>
					</div>

					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
				                <label class="ten2x">Năm bảo vệ</label>
				                <div class="input-group date">
					                <input type="text" class="form-control datepicker" id="nambaove{{$HDSDH->id}}" placeholder="nhập năm bảo vệ" value="{{date('d/m/Y', strtotime($HDSDH->nambaove))}}">
					                	<div class="input-group-addon">
					                    <span class="glyphicon glyphicon-th"></span>
					                 </div>
				            	</div>
	            		</div>
					</div>
			</div>


			<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="ten2x">Trình độ</label>							
							<select class="form-control" id="trinhdo{{$HDSDH->id}}">
								@foreach($Trinhdo as $TD)
									<option value="{{$TD->id}}" @if($TD->id==$HDSDH->id_trinhdo) selected @endif>{{$TD->ten_vi}}</option>
								@endforeach
							</select>
					    </div>
					</div>
			</div>									
				
		<div class="modal-footer">
			<button type="button" class="btn btn-success btn-luu" data-id="{{$HDSDH->id}}">Lưu</button>
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
						<label class="ten2x">Tên sinh viên (VI)</label>
						<input type="text" id="tensinhvien_vi" class="form-control" placeholder="nhập tên sinh viên bằng tiếng Việt">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label class="ten2x">Tên sinh viên (EN)</label>
						<input type="text" id="tensinhvien_en" class="form-control" placeholder="nhập tên sinh viên bẳng tiếng Anh">
					</div>
				</div>				
			</div>

			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label class="ten2x">Tên đề tài (VI)</label>
						<input type="text" id="tendetai_vi"  class="form-control" placeholder="nhập tên đề tài tiếng Việt">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label class="ten2x">Tên đề tài (EN)</label>
						<input type="text" id="tendetai_en"  class="form-control" placeholder="nhập tên đề tài tiếng Anh">
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
							 <div class="input-group date">
				                <input type="text" class="form-control datepicker" id="namhuongdan" placeholder="nhập năm hướng dẫn" value="{{date('d/m/Y', strtotime(Carbon\Carbon::now()))}}">
				                <div class="input-group-addon">
				                    <span class="glyphicon glyphicon-th"></span>
				                 </div>
				            </div>
					    </div>
					</div>

					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
				                <label class="ten2x">Năm bảo vệ</label>
				                <div class="input-group date">
					                <input type="text" class="form-control datepicker" id="nambaove" placeholder="nhập năm bảo vệ" value="{{date('d/m/Y', strtotime(Carbon\Carbon::now()))}}">
					                <div class="input-group-addon">
					                    <span class="glyphicon glyphicon-th"></span>
					                </div>
				           		 </div>
	            		</div>
					</div>
			</div>


			<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="ten2x">Trình độ</label>							
							<select class="form-control" id="trinhdo">
								@foreach($Trinhdo as $TD)
								<option value="{{$TD->id}}">{{$TD->ten_vi}}</option>
								@endforeach
							</select>
					    </div>
					</div>
			</div>	

		<div class="modal-footer">
			<button type="button" class="btn btn-success" id="btn-luu">Lưu</button>
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

            var tensinhvien_vi=$('#tensinhvien_vi').val();
            var tensinhvien_en=$('#tensinhvien_en').val();                
            var tendetai_vi=$('#tendetai_vi').val();
            var tendetai_en=$('#tendetai_en').val();
            var tencoso_vi=$('#tencoso_vi').val();  
            var tencoso_en=$('#tencoso_en').val();              	
            var namhuongdan=$('#namhuongdan').val();
            var nambaove=$('#nambaove').val();
            var trinhdo=$('#trinhdo').val();      
            var id_giangvien=<?=$Giangvien->id?>             	               	             	        	  
                	                
            if(tensinhvien_vi==''){alert('Vui lòng nhập tên sinh viên bằng tiếng Việt');return false;}
                if(tendetai_vi==''){alert('Vui lòng nhập tên đề tài bằng tiếng Việt');return false;}
                    
				    $.ajax({
				        method:'POST',
				        url:'set_admin/ajax/themhuongdansaudaihoc',
				        data:{
				        	tensinhvien_vi:tensinhvien_vi,
				        	tensinhvien_en:tensinhvien_en,
				        	tendetai_vi:tendetai_vi,
				        	tendetai_en:tendetai_en,
				        	tencoso_vi:tencoso_vi,
				        	tencoso_en:tencoso_en,
				        	namhuongdan:namhuongdan,
				        	nambaove:nambaove,
				        	trinhdo:trinhdo,	
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


$('.btn-luu').on('click',function(){

	var id=$(this).data('id');
	var tensinhvien_vi=$('#tensinhvien_vi'+id).val(); 
	var tensinhvien_en=$('#tensinhvien_en'+id).val();                
    var tendetai_vi=$('#tendetai_vi'+id).val();
    var tendetai_en=$('#tendetai_en'+id).val();
    var tencoso_vi=$('#tencoso_vi'+id).val();  
    var tencoso_en=$('#tencoso_en'+id).val();              	
    var namhuongdan=$('#namhuongdan'+id).val();
    var nambaove=$('#nambaove'+id).val();
    var trinhdo=$('#trinhdo'+id).val();               	             	        	  
                    	
    if(tendetai_vi==''){alert('Vui lòng nhập tên đề tài khoa học bằng tiếng Việt');return false;}                    

  				$.ajax({
				        method:'POST',
				        url:'set_admin/ajax/capnhathuongdansaudaihoc',
				        data:{
				        	tensinhvien_vi:tensinhvien_vi,
				        	tensinhvien_en:tensinhvien_en,
				        	tendetai_vi:tendetai_vi,
				        	tendetai_en:tendetai_en,
				        	tencoso_vi:tencoso_vi,
				        	tencoso_en:tencoso_en,
				        	namhuongdan:namhuongdan,
				        	nambaove:nambaove,
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


$('.xoahuongdansaudaihoc').on('click',function(){
    if(!confirm('Xác nhận xóa:')) return false;
        var id=$(this).data('id');
        $.get("set_admin/ajax/xoahuongdansaudaihoc/"+id,function(data){alert(data);window.location.reload();});
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
                $.get("set_admin/ajax/xoahuongdansaudaihochet/"+listid,function(data){
            		alert(data);
            		window.location.reload();
        		});
            } 
});



</script>


@endsection