@extends('Admin.Master')
@section('title','Danh sách công việc được phân công')
@section('content') 
	

<div class="h3 text-center">Danh sách công việc được phân công</div>

<div class="container" style="max-width:500px;margin-top:20px;">
    @if(session('thongbao'))
        <div class="alert alert-success">
            {{session('thongbao')}}
        </div>
    @endif
</div>


<div id="tabs" style="margin-top:0;">           
<ul id="ultabs">				 
	<li type="#tab1" class="ten2x">Dạng lịch</li>
	<li type="#tab2" class="ten2x">Dạng danh sách</li>                                          
</ul>
<div class="clearfix"></div>                        
<div id="content_tabs">               
<div id="tab1">
    <div class="row">   
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-body no-padding">             
              <div id="calendar"></div>
            </div>           
          </div>         
        </div>       
    </div>
</div> 
            
<div id="tab2">
   <table class="table table-bordered table-hover example2" style="width:100%">
		<thead>
			<tr class="bg-top">
				<th width="5%" class="textStatus">STT</th>
				<th width="10%" class="text-center">Kế hoạch</th>
				<th width="10%" class="text-center">Báo cáo</th>
				<th class="text-center">File</th>
				<th class="text-center">Tên công việc</th>
				<th class="text-center" width="15%">Ngày bắt đầu</th>
				<th class="text-center" width="15%">Ngày kết thúc</th>
				<th class="text-center" width="15%">Giao việc</th>
			</tr>
		</thead>
		<tbody>					
			<?php $stt1=1; ?>
			@foreach($Phancongvieccap1 as $PCV1)
			<tr>
				<td class="text-center">{{$stt1++}}</td>
				<td class="text-center">
				@if($PCV1->trangthai==0)
					<i class="fa fa-paper-plane-o blue lapkehoach" aria-hidden="true"  data-id="{{$PCV1->id}}"></i>
				@else
					Đã báo cáo
				@endif
				</td>
				<td class="text-center">
				@if($PCV1->trangthai==0)
					<i class="fa fa-tags blue baocaocap1" data-id="{{$PCV1->id}}" aria-hidden="true"></i>
				@else
					Đã báo cáo
				@endif
				</td>
				<td class="text-center">@if($PCV1->minhchung!='') <a href="set_giangvien/ajax/get/{{$PCV1->minhchung}}">Xem</a> @endif</td>
				<td>{{$PCV1->congviec->ten}}</td>
				<td class="text-center">{{date('d/m/Y', strtotime($PCV1->ngaybatdau))}}</td>
				<td class="text-center">{{date('d/m/Y', strtotime($PCV1->ngayketthuc))}}</td>
				<td class="text-center">{{$PCV1->giaoviec->ten}}</td>
			</tr>
			@endforeach					
		</tbody>
	</table>
			
<br><br><br>
<p class="ten2x text-center" style="font-size:25px;">Danh sách công việc được phân công</p>
			
	<table class="table table-bordered table-hover example2" style="width:100%">
		<thead>
			<tr class="bg-top">
				<th width="5%" class="textStatus">STT</th>				
				<th width="8%" class="text-center">Báo cáo</th>
				<th class="text-center" width="10%">File BC</th>
				<th class="text-center">Tên công việc</th>
				<th class="text-center">Ghi chú</th>
				<th class="text-center" width="15%">Ngày bắt đầu</th>
				<th class="text-center" width="15%">Ngày kết thúc</th>
				<th class="text-center" width="15%">Giao việc</th>
			</tr>
		</thead>

		<tbody>				
			<?php $stt2=1; ?>
			@foreach($Phancongvieccap2 as $PCV2)
				<tr>
					<td class="text-center">{{$stt2++}}</td>						
					<td class="text-center">
					@if($PCV2->trangthai==0)
						<i class="fa fa-tags blue baocaocap2" data-id="{{$PCV2->id}}" aria-hidden="true"></i>
					@else
						Đã báo cáo
					@endif
					</td>
					<td class="text-center">@if($PCV2->minhchung!='') <a href="set_giangvien/ajax/get/{{$PCV2->minhchung}}">Có</a> @endif</td>
					<td>{{$PCV2->ten}}</td>
					<td class="text-center"><span title="{{$PCV2->ghichu}}">Rê chuột để xem</span></td>
					<td class="text-center">{{date('d/m/Y', strtotime($PCV2->ngaybatdau))}}</td>
					<td class="text-center">{{date('d/m/Y', strtotime($PCV2->ngayketthuc))}}</td>
					<td class="text-center">{{$PCV2->phancongviec->giangvien->ten}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>			 
</div>   
</div>     
</div>

<div class="modal fade" id="lapkehoach" role="dialog">
	<div class="modal-dialog modal-lg"> 
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">DANH SÁCH KẾ HOẠCH THỰC HIỆN</h4>
			</div>
			<div class="modal-body">
				<div class="table-responsive">
					<table class="table table-bordered table-hover example2" style="width:100%">
						<thead>
							<tr>
								<th class="text-center">STT</th>
								<th class="text-center">Duyệt</th>
								<th class="text-center">Trạng thái</th>
								<th class="text-center">Thực hiện</th>
								<th class="text-center">File</th>
								<th class="text-center">Email</th>
								<th class="text-center">Tên công việc</th>
								<th class="text-center">Ngày bắt đầu</th>
								<th class="text-center">Ngày kết thúc</th>
								<th class="text-center">Ghi chú</th>
							</tr>							
						</thead>
						<tbody id="loadkehoach">
							
						</tbody>					
					</table>					
				</div>					
				<br>
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
						<div class="input-group date ">
							<input type="text" id="ngaybatdau"  class="form-control datepicker" value="{{date('d/m/Y', strtotime(Carbon\Carbon::now()))}}" placeholder="ngày bắt đầu công việc">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-th"></span>
							</div>
						</div>						
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<b class="ten2x">Ngày kết thúc</b>						
						<div class="input-group date">
							<input type="text" id="ngayketthuc"  class="form-control datepicker" value="{{date('d/m/Y', strtotime(Carbon\Carbon::now()))}}" placeholder="ngày bắt đầu công việc">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-th"></span>
							</div>
						</div>						
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-xs-12">
						<b class="ten2x">Ghi chú</b>
						<input type="text" class="form-control" id="ghichu">
					</div>
				</div>
				<input type="hidden" id="id_congviec">
			</div>

			<div class="modal-footer">			
				<button type="button" class="btn btn-success" id="btn-luu">Lưu</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Thoát</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="baocaocap1" role="dialog">
	<div class="modal-dialog modal-lg"> 
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">BÁO CÁO CÔNG VIỆT</h4>
			</div>
			<div class="modal-body">				
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<b class="ten2x">Tên công việc</b>
						<input type="text" id="tencongviecbc1" class="form-control" readonly="">
					</div>

					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<b class="ten2x">Người thực hiện</b>
						<input type="text" id="nguoithuchienbc1" class="form-control" readonly>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<b class="ten2x">Ngày bắt đầu</b>						
						<div class="input-group date ">
							<input type="text" id="ngaybatdaubc1"  class="form-control" value="{{date('d/m/Y', strtotime(Carbon\Carbon::now()))}}" placeholder="ngày bắt đầu công việc" readonly>
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-th"></span>
							</div>
						</div>						
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<b class="ten2x">Ngày kết thúc</b>						
						<div class="input-group date">
							<input type="text" id="ngayketthucbc1"  class="form-control" value="{{date('d/m/Y', strtotime(Carbon\Carbon::now()))}}" placeholder="ngày bắt đầu công việc" readonly>
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-th"></span>
							</div>
						</div>						
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<b class="ten2x">Ghi chú</b>
						<input type="text" class="form-control" id="ghichubaocaobc1">
					</div>
				</div>
				<input type="hidden" id="id_phancong">
			
			<br>
	        <div class="row">
	        	<div class="col-lg-12 col-md-12">	        		
	        		<div class="form-group">
	        			<b class="ten2x">Minh chứng (nếu có)</b>
	        			<div class="row">	        				
	        				<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">		        			        	
			        			<input type="file" id="filebc1" name="filebc1" class="form-control">		
			        		</div>			        		
	        			</div>	        				        		
	        		</div>	
	        	</div>        	        		
	       </div>
		</div>
			<div class="modal-footer">			
				<button type="button" class="btn btn-success" id="btn-luubcc1">Lưu</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Thoát</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="baocaocap2" role="dialog">
	<div class="modal-dialog modal-lg"> 
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">BÁO CÁO CÔNG VIỆT</h4>
			</div>
			<div class="modal-body">				
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<b class="ten2x">Tên công việc</b>
						<input type="text" id="tencongviecbc2" class="form-control" readonly="">
					</div>

					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<b class="ten2x">Người thực hiện</b>
						<input type="text" id="nguoithuchienbc2" class="form-control" readonly>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<b class="ten2x">Ngày bắt đầu</b>						
						<div class="input-group date ">
							<input type="text" id="ngaybatdaubc2"  class="form-control" value="{{date('d/m/Y', strtotime(Carbon\Carbon::now()))}}" placeholder="ngày bắt đầu công việc" readonly>
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-th"></span>
							</div>
						</div>						
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<b class="ten2x">Ngày kết thúc</b>						
						<div class="input-group date">
							<input type="text" id="ngayketthucbc2"  class="form-control" value="{{date('d/m/Y', strtotime(Carbon\Carbon::now()))}}" placeholder="ngày bắt đầu công việc" readonly>
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-th"></span>
							</div>
						</div>						
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<b class="ten2x">Ghi chú</b>
						<input type="text" class="form-control" id="ghichubaocaobc2">
					</div>
				</div>
				<input type="hidden" id="id_chitietphancong">
			
			<br>
	        <div class="row">
	        	<div class="col-lg-12 col-md-12">	        		
	        		<div class="form-group">
	        			<b class="ten2x">Minh chứng (nếu có)</b>
	        			<div class="row">	        				
	        				<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">		        			        	
			        			<input type="file" id="filebc2" name="filebc2" class="form-control">		
			        		</div>			        		
	        			</div>	        				        		
	        		</div>	
	        	</div>        	        		
	       </div>
		</div>
			<div class="modal-footer">			
				<button type="button" class="btn btn-success" id="btn-luubcc2">Lưu</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Thoát</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Thêm phân công mới</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary">Lưu</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" role="dialog" id="modalemail">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="text-center modal-title" style="width:100%">Gỡi mail đến giảng viên: <span id="tengvgm"></span></h4>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="form-group has-label">
                        <label>
                           Tiêu đề                            
                        </label>
                         <input type="text" class="form-control" id="tieudemail">
                    </div>      
            </div>
            <div class="col-lg-12 col-md-12">
                <div class="form-group has-label">
                        <label>
                            Nội dung                            
                        </label>
                          <input type="text" class="form-control" id="noidungmail">
                    </div>
            </div>
        </div>
        <input type="hidden" id="id_chitietmail">
      </div>
      <div class="modal-footer text-right" style="display: block;">        
        <input type="button" class="btn btn-success btn-fill btn-goiemail" value="Gữi">        
      </div>
    </div>
  </div>
</div>

@endsection

@section('script')

<script>

	$(document).ready(function(){
		$.get("set_giangvien/phancongviec/loadlich",function(data){
			 var data=JSON.parse(data);
			 var calendar = $('#calendar').fullCalendar({
				editable: true,
				header:{
					left: 'prev,next today',
					center: 'title',
					right: 'month,agendaWeek,agendaDay'
				},
				events:data,
				selectable: true,
				selectHelper: true,			
				eventClick:function(event){
					var title=event.title;
					var id=event.id;
					var start = $.fullCalendar.formatDate(event.start,'DD-MM-YYYY');
					var end = $.fullCalendar.formatDate(event.end,'DD-MM-YYYY');
					var trangthai=event.trangthai;
					var type=event.type;
					var nguoithuchien=event.nguoithuchien;
					var nguoiphancong=event.nguoiphancong;
					var minhchung=event.minhchung;
					if(trangthai!=1){
						if(type=='pcc1'){
							$('#tencongviecbc1').val(title);
				 			$('#nguoithuchienbc1').val(nguoithuchien);
							$('#ngaybatdaubc1').val(start);
				 			$('#ngayketthucbc1').val(end);
				 			$('#id_phancong').val(id);
				 			$('#baocaocap1').modal();
						}

						if(type=='pcc2'){
							$('#tencongviecbc2').val(title);
				 			$('#nguoithuchienbc2').val(nguoithuchien);
				 			$('#ngaybatdaubc2').val(start);
				 			$('#ngayketthucbc2').val(end);
				 			$('#id_chitietphancong').val(id);
				 			$('#baocaocap2').modal();
						}
						calendar.fullCalendar('refetchEvents');
					}else {
						var r = confirm("Hoạt động này đã được báo cáo!!! Bạn có muốn xem file đính kèm");
						if (r == true){
							if(minhchung!='')					    	
						     	window.open('public/'+minhchung,'_blank');
						    else alert('Báo cáo này không có minh chứng');
						}
						
					}
				},
		});
			 
	    });
		
	});

</script>
 


<script type="text/javascript">

$(document).on('click','.lapkehoach',function(){
	var id=$(this).data('id');
		$('#id_congviec').val(id);
		$.get("set_giangvien/phancongviec/loadkehoach/"+id,function(data){
		 	$('#loadkehoach').html(data);		 	
		});
		$('#lapkehoach').modal();
});

$(document).on('click','#btn-luu',function(){
	$(this).html('Đang thực hiện');
    $(this).prop('disabled',true);  
    $(this).css('background','red');
		var id=$('#id_congviec').val();
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

$(document).on('click','.baocaocap1',function(){
	var id=$(this).data('id');
	$.get("set_giangvien/phancongviec/loadphancong/"+id,function(data){
		var data=JSON.parse(data);
		 $('#tencongviecbc1').val(data.ten);
		 $('#nguoithuchienbc1').val(data.nguoithuchien);
		 $('#ngaybatdaubc1').val(data.ngaybatdau);
		 $('#ngayketthucbc1').val(data.ngayketthuc);
		 $('#id_phancong').val(data.id);

	});
	$('#baocaocap1').modal();
});


$(document).on('click','#btn-luubcc1',function(){
	var id=$('#id_phancong').val();
	var hoi= confirm("Khi lưu bạn sẽ không thể cập nhật lại ! ! ! Bạn có chắc chắn không ?");
   if (hoi==true){
   		var ghichu=$('#ghichubaocaobc1').val();
   		$(this).html('Đang thực hiện');
        $(this).prop('disabled',true);  
        $(this).css('background','red');

        var file_data = $('#filebc1').prop('files')[0];
        var form_data = new FormData();
            form_data.append('file', file_data);
            form_data.append('id_phancong',id);
            form_data.append('ghichu',ghichu);
            form_data.append('_token','{{ csrf_token() }}');

		$.ajax({
                url: 'set_giangvien/phancongviec/baocaobc1', // point to server-side PHP script
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

$(document).on('click','.baocaocap2',function(){
	var id=$(this).data('id');
	$.get("set_giangvien/phancongviec/loadchitietphancong/"+id,function(data){
		var data=JSON.parse(data);
		 $('#tencongviecbc2').val(data.ten);
		 $('#nguoithuchienbc2').val(data.nguoithuchien);
		 $('#ngaybatdaubc2').val(data.ngaybatdau);
		 $('#ngayketthucbc2').val(data.ngayketthuc);
		 $('#id_chitietphancong').val(data.id);
	});
	$('#baocaocap2').modal();
});


$(document).on('click','#btn-luubcc2',function(){
	var id=$('#id_chitietphancong').val();
	var hoi= confirm("Khi lưu bạn sẽ không thể cập nhật lại ! ! ! Bạn có chắc chắn không ?");
   if (hoi==true){
   		var ghichu=$('#ghichubaocaobc2').val();

   		 $(this).html('Đang thực hiện');
         $(this).prop('disabled',true);  
         $(this).css('background','red');
            var file_data = $('#filebc2').prop('files')[0];
            var form_data = new FormData();
                form_data.append('file', file_data);
                form_data.append('id_phancong',id);
                form_data.append('ghichu',ghichu);
                form_data.append('_token','{{ csrf_token() }}');   		

		 $.ajax({
                url: 'set_giangvien/phancongviec/baocaobc2', // point to server-side PHP script
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

$(document).on('click','.goiemail',function(){
	var id = $(this).data('id');
	$('#tengvgm').html($(this).data('gv'));
	$('#id_chitietmail').val($(this).data('id'));
	$('#modalemail').modal();
});

$(document).on('click','.btn-goiemail',function(){
	var tieude = $('#tieudemail').val();
	var id_chitiet = $('#id_chitietmail').val();
	var noidung = $('#noidungmail').val();
	$(this).val('Đang thực hiện');
    $(this).prop('disabled',true);  
    $(this).css('background','red');
    var form_data = new FormData();       
        form_data.append('tieude',tieude);
        form_data.append('noidung',noidung);
        form_data.append('id_chitiet',id_chitiet);
        form_data.append('_token','{{ csrf_token() }}');   		

		 $.ajax({
                url: 'set_giangvien/phancongviec/goimail', // point to server-side PHP script
                data:form_data,
                method:'POST',
                contentType: false, // The content type used when sending data to the server.
                cache: false, // To unable request pages to be cached
                processData: false,
                success: function(data){
                    alert(data);window.location.reload();                

                }
        });
	
});

$(document).on('click','.duyetcap2',function(){
	if($(this).is(':checked')){
		$.get("set_giangvien/phancongviec/duyetcap2/"+$(this).data('id'),function(data){
		 	alert(data);		 	
		});
	}
	else{
		$.get("set_giangvien/phancongviec/huyduyetcap2/"+$(this).data('id'),function(data){
		 	alert(data);		 	
		});
	}
});
		
</script>

@endsection