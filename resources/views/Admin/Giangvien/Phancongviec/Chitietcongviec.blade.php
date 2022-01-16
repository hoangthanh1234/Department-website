@extends('Admin.Master')
@section('title','Danh sách công việc giảng viên')
@section('content') 

<style type="text/css">
  .well-lg{padding:18px!important;}
</style>

<div class="h3 padding20 text-center">Danh sách chi tiết công việc<br><small>{{$Congviec->ten}}</small></div>
<div class="box">  

<div class="container" style="max-width:500px;margin-top:20px;">
   @if(session('thongbao'))
    <div class="alert alert-success">
      {{session('thongbao')}}
    </div>
  @endif
</div>

<div class="box-body">   

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">
			    <h3 class="panel-title"></h3>
			  </div>
			  <div class="panel-body">
			    <table class="table table-condensed table-hover">
			    	<thead>
			    		<tr>
			    			<th class="text-center">STT</th>
			    			<th class="text-center">Hành động</th>
			    			<th class="text-center">Công việc</th>
			    			<th class="text-center">Thời gian</th>
			    			<th class="text-center">Giao việc</th>
			    			<th class="text-center">Nhận việc</th>
			    			<th class="text-center">Trạng thái</th>
			    			<th class="text-center">Tệp</th>
			    		</tr>
			    	</thead>
			    	<tbody>
			    		<?php $i=1;?>
			    		@foreach($Congviec->phancongviec as $pcv)
			    			<tr>
			    				<td class="text-center">{{$i++}}</td>
			    				<td class="text-center">
			    					@if($pcv->giangvien->id == Session::get('user_id') && $pcv->trangthai != 2)
				    					<a data-id="{{$pcv->id}}" data-ten="{{$pcv->ten}}" class="btn btn-link btn-primary baocao">
	                                        <i class="fa fa-ravelry" aria-hidden="true" style="color:white;" title="Báo cáo hoàn thành"></i>
	                                    </a>
                                    @endif
                                    @if($pcv->congviec->giangvien->id == Session::get('user_id'))
                                    <a  href="set_giangvien/phancongviec/xoacongviec/{{$pcv->id}}" class="btn btn-link btn-danger">
                                        <i class="fa fa-times" style="color:white;" aria-hidden="true"  title="Xóa công việc này" data-toggle="tooltip"></i>
                                    </a>
                                    @endif
                                   
                                    @if($pcv->ghichubaocao != '' && ($pcv->congviec->giangvien->id == Session::get('user_id') || $pcv->giangvien->id == Session::get('user_id')))
                                    	<a  id="ghichub2" data-nd="{{$pcv->ghichubaocao}}" class="btn btn-warning" title="Ghi chú khi báo cáo">
                                    		<i class="fa fa-sticky-note-o" style="color:white;" aria-hidden="true"></i>
                                    	</a>
                                    @endif
			    				</td>
			    				<td>{{$pcv->ten}}</td>
			    				<td class="text-center">
			    					{{\Carbon\Carbon::parse($pcv->ngaybatdau)->format('d/m/Y')}}  
			    					&nbsp;&nbsp;<i class="fa fa-long-arrow-right" aria-hidden="true"></i>&nbsp;&nbsp;
			    					{{\Carbon\Carbon::parse($pcv->ngayketthuc)->format('d/m/Y')}}
			    				</td>
			    				<td class="text-center">{{$pcv->congviec->giangvien->ten}}</td>
			    				<td class="text-center">{{$pcv->giangvien->ten}}</td>
			    				<td class="text-center">
			    					@if($pcv->trangthai==0) Chưa thực hiện @endif 
			    					@if($pcv->trangthai==1) Đang thực hiện @endif 
			    					@if($pcv->trangthai==2) Hoàn thành @endif
			    				</td>
			    				<td class="text-center">
			    					@if($pcv->minhchung!="") <a href="set_giangvien/ajax/get/{{$pcv->minhchung}}">Xem</a>@endif
			    				</td>
			    			</tr>
			    		@endforeach
			    	</tbody>
			    </table>

			    @if($Congviec->giangvien->id == Session::get('user_id') )
			    	<a  data-toggle="modal" data-target="#myModal" class="btn btn-success">Thêm mới</a>
			    	<a  href="set_giangvien/phancongviec/list" class="btn btn-danger">Thoát</a>
			    @endif
			  </div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title ten2x" id="myModalLabel">Thêm phân công mới</h4>
	      </div>
	      <div class="modal-body">
	        	<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<b class="ten2x">Tên công việc</b>
						<input type="text" class="form-control" id="tencongviec">
					</div>

					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<b class="ten2x">Người thực hiện</b>
						<select class="form-control select2" id="nguoithuchien" style="width:100%;">
							@foreach($Giangvien as $GV)
								<option value="{{$GV->id}}">{{$GV->ten}}</option>
							@endforeach
						</select>
					</div>
				</div>
			<br>
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<b class="ten2x">Ngày bắt đầu</b>
						<div class="input-group date">
			                <input type="text" id="ngaybatdau" class="form-control datepicker"  value="{{date('d/m/Y', strtotime(Carbon\Carbon::now()))}}"  placeholder="Ngày bắt đầu công việc">
			                <div class="input-group-addon">
			                    <span class="glyphicon glyphicon-th"></span>
			                 </div>
			            </div>
					</div>

					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<b class="ten2x">Ngày kết thúc</b>
						<div class="input-group date">
			                <input type="text" id="ngayketthuc" class="form-control datepicker"  value="{{date('d/m/Y', strtotime(Carbon\Carbon::now()))}}"  placeholder="Ngày kết thúc công việc">
			                <div class="input-group-addon">
			                    <span class="glyphicon glyphicon-th"></span>
			                 </div>
			            </div>
					</div>
				</div>
			<br>
				<div class="row">
					<div class="col-lg-12 col-xs-12">
						<b class="ten2x">Ghi chú</b>
						<input type="text" class="form-control" id="ghichu">
					</div>
				</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
	        <button type="button" id="btn-luu" class="btn btn-success">Lưu</button>
	      </div>
	    </div>
	  </div>
	</div>

	<div class="modal fade" id="baocaomodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title ten2x" id="myModalLabel">BÁO CÁO CÔNG VIỆC</h4>
	      </div>
	      <div class="modal-body">
	        	<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<b class="ten2x">Tên công việc</b>
						<input type="text" class="form-control" id="tencv" readonly="">
					</div>					
				</div>	
			<br>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-xs-12">
						<input type="file" id="file" class="form-control btn btn-primary">
					</div>
				</div>	
			<br>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-xs-12">
						<b class="ten2x">Ghi chú</b>
						<input type="text" id="ghichubaocao" class="form-control">
					</div>
				</div>
				<input type="hidden" id="idbaocao">	
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
	        <button type="button" id="btn-baocao" class="btn btn-success">Lưu</button>
	      </div>
	    </div>
	  </div>
	</div>

<div class="modal fade" id="modalghichub2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>	        
	      </div>
	      <div class="modal-body">
	        	<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">						
						<input type="text" class="form-control" id="textghichub2" readonly="">
					</div>					
				</div>					
	      </div>	      
	    </div>
	  </div>
	</div>




</div> 
@endsection

@section('script')
<script type="text/javascript">

$(document).on('click','.lapkehoach',function(){
	$('#themkehoach').modal();
});

$(document).on('click','.baocao',function(){
	$('#idbaocao').val($(this).data('id'));
	$('#tencv').val($(this).data('ten'));
	$('#baocaomodal').modal();
});

$(document).on('click','#btn-baocao',function(){
	if(confirm("Bạn có thực sự muốn báo cáo không? Sau khi báo cáo sẽ không thể sửa đổi.")){

		$(this).val('Đang thực hiện');
		$(this).prop('disabled',true);

		var file_data = $('#file').prop('files')[0];
		 

		var form_data = new FormData();
            form_data.append('file', file_data);
            form_data.append('idbaocao',$('#idbaocao').val());   
            form_data.append('ghichu',$('#ghichubaocao').val());        
            form_data.append('_token','{{ csrf_token() }}');           

		$.ajax({
                url: 'set_giangvien/phancongviec/baocaoc2', // point to server-side PHP script
                data:form_data,
                method:'POST',
                contentType: false, // The content type used when sending data to the server.
                cache: false, // To unable request pages to be cached
                processData: false,
                success: function(data){
                    alert(data);window.location.reload();   
                }
        });    		
	}
	
});



$(document).on('click','#btn-luu',function(){
	$(this).html('Đang thực hiện');
    $(this).prop('disabled',true);  
    $(this).css('background','red');
		var id = <?=$Congviec->id;?>;	
		var tencongviec=$('#tencongviec').val();
		var ngaybatdau=$('#ngaybatdau').val();
		var ngayketthuc=$('#ngayketthuc').val();
		var nguoithuchien=$('#nguoithuchien').val();
		var ghichu=$('#ghichu').val();			

		$.ajax({
			method:'POST',
			url:'set_giangvien/phancongviec/themkehoach',
			data:{
				 ten:tencongviec,
				 ngaybatdau:ngaybatdau,
				 ngayketthuc:ngayketthuc,
				 id_giangvien:nguoithuchien,				 
				 id_phancong:id,
				 ghichu:ghichu,
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

$(document).on('click','#ghichub2',function(){	
	$('#textghichub2').val($(this).data('nd'));
	$('#modalghichub2').modal();
});








	
</script>
@endsection

  