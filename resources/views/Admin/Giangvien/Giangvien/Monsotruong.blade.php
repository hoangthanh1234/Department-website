@extends('Admin.Master')
@section('title','danh sách môn sở trường của giảng viên')
@section('content') 

 
<div class="h3 padding20 text-center">Danh sách môn sở trường của giảng viên</div>
    <div class="box">   

        <div class="container" style="max-width:500px;margin-top:20px;">
            @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
             @endif
         </div>

            <div class="box-body"> 
                <form name="frm" method="post" action="" enctype="multipart/form-data" >
                    <div class="table-responsive">
                        <table  class="table table-bordered table-hover example2" style="width:100%">
                            <thead>                 
                                <tr class="bg-top">                                    
                                    <th width="5%">STT</th>  
                                    <th width="10%" class="text-center">Hành động</th>            
                                    <th >Tên Môn</th>                                          
                                    <th width="15%" class="text-center">Bậc đào tạo</th>
                                    <th width="15%" class="text-center">Chuyên ngành</th>
                                    <th width="15%" class="text-center">Bộ môn</th> 
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
                            	</tr>                                                                 
                           </tfoot> 
                            <tbody>   
                            	<?php $i=1; ?>
                                @foreach($Giangvien->monsotruong as $mst)                                  
                                    <tr>  
                                        <td class="text-center"> {{$i++}} </td>
                                                
                                        <td class="text-center">
                                            <a  class="btn btn-link btn-danger xoamonsotruong" data-id="{{$mst->id_mon}}"  title="Xóa mục này">
                                                 <i class="fa fa-times" style="color:white;" aria-hidden="true"></i>
                                            </a>
                                        </td> 
	                                        <td>{{$mst->mon->ten_vi}}</td>
	                                        <td>{{$mst->mon->bacdaotao->ten_vi}}</td>
	                                        <td>{{$mst->mon->chuyennganh->ten_vi}}</td>
	                                        <td>{{$mst->mon->bomon->ten_vi}}</td>
                                        </tr>  
                                  @endforeach                          
                                  </tbody> 
                            </table> 
                        </div> 
                 </form>  
            </div>
          
                      
  	<button class=" btn btn-success btn2" data-toggle="modal" data-target="#modalthem">Thêm</button>
   
<div id="modalthem" class="modal fade" role="dialog">
	<div class="modal-dialog">		 
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				    <h4 class="modal-title ten2x">Thêm môn sở trường</h4>
				</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<label>Chọn bộ môn:</label>
				        <select class="form-control select2" id="bomonthem" style="display:block;width:100%;">
				        	@foreach($Bomon as $bm)
				        		<option value="{{$bm->id}}">{{$bm->ten_vi}}</option>
				        	@endforeach
				        </select>
					</div>
				</div>
				<br>
				<div class="row">
				    <div class="col-lg-12 col-md-12">
				        <label>Chọn môn:</label>
				        <select class="form-control select2" id="monthem" style="display:block;width:100%;">
				        	@foreach($Mon as $m)
				        		<option value="{{$m->id}}">{{$m->ten_vi}} ({{$m->bacdaotao->ten_vi}})</option>
				        	@endforeach
				        </select>				        
				    </div>      
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Thoát</button>
				<input type="button" class="btn btn-success" id="luumonthem" value="Lưu">
			</div>
		</div>
	</div>
</div>
@endsection


@section('script')
	<script type="text/javascript">
		$(document).on('click','#luumonthem',function(){
			var id_mon = $('#monthem').val();			
			$.ajax({
	            url: "set_giangvien/ajax/luumonsotruong/"+id_mon,
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

		$(document).on('click','.xoamonsotruong',function(){
			var id_mon = $(this).data('id');
			$.ajax({
	            url: "set_giangvien/ajax/xoamonsotruong/"+id_mon,
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

		$(document).on('change','#bomonthem',function(){
			var id = $(this).val();
			$.ajax({
	            url: "set_giangvien/ajax/loadmon/"+id,
	            type: 'GET',
	            dataType: 'html',  
	            success: function(data){                      
	               $('#monthem').html(data);           
	           },
	            error: function(XMLHttpRequest, textStatus, errorThrown){                     
	                alert("Status: " + textStatus+": "+errorThrown+"!!!! Không thể thực hiện yêu cầu!!! Vui Lòng kiểm tra Lại");

	            }

        	});

		});
	</script>
@endsection



