@extends('Admin.Bomon.Danhgiavienchuc.Master')
@section('Tabvalue')
<div role="tabpanel" class="tab-pane  @if ($tab==1) active @endif" id="profile">

<br>
	<div class="container" style="max-width:500px;margin-top:20px;">
            @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
            @endif
    </div>
<br>	  


<form method="post" action="set_bomon/danh-gia-vien-chuc/{{$Phieudanhgia->giangvien->tenkhongdau}}/giang-day/1/{{$Phieudanhgia->id}}" enctype="multipart/form-data" >
	<div class="text-center ten2x" style="font-size:30px;color:red;font-weight:normal;">{{$Phieudanhgia->thongbao->ten}}</div>
	<a href="set_bomon/danh-gia-vien-chuc/list">
		<input type="button" value="Thoát" class="btn btn-danger pull-right" style="margin-bottom:20px;">
	</a>
	<input type="button" value="Xác nhận" class="btn btn-success pull-right btn-xacnhan" style="margin-bottom:20px;margin-right:20px;">
	<table  class="table table-bordered table-hover" style="width:100%!important">
			<thead>
				<tr class="bg-top" style="width:100%">
					<th width="5%" class="text-center">STT</th>
					<th>Tên tiêu chí</th>				
					<th width="8%" class="text-center">ĐVT</th>
					<th width="5%" class="text-center">Điểm</th>						
					<th width="8%" class="text-center">Số lượng</th>	
					<th width="8%" class="text-center">Điểm</th>
					<th width="8%" class="text-center">Ghi chú</th>
					<th width="8%" class="text-center">Góp ý</th>		
					<th width="8%" class="text-center">Phản hồi</th>
					<th width="5%" class="text-center">Chọn</th>
					<th width="5%" class="text-center">Duyệt</th>
					<th width="10%" class="text-center">Minh chứng</th>											
					<th width="8%" class="text-center">Điểm đạt</th>
				</tr>
			</thead>

			<tbody>				
				<?php $j=1; ?>
				@foreach($Tieuchigiangday as $Tieuchi)
					<tr>
						<td class="text-center">{{$j++}}</td>

						<td class="boldphieu2" id="ten{{$Tieuchi->id}}">
							{{$Tieuchi->ten}}
							<input type="hidden" value="{{$Tieuchi->loaiminhchung}}" id="loaiminhchung{{$Tieuchi->id}}">
						</td>	
					
						<td class="text-center boldphieu2">{{$Tieuchi->donvitinh}}</td>

						<td class="text-center diem{{$Tieuchi->id}}" data-id="{{$Tieuchi->diem}}">{{$Tieuchi->diem}}</td>

						<td class="text-center">							
							<input type="text" name="soluong{{$Tieuchi->id}}" style="width:50px;text-align:center;" class="soluong" data-id="{{$Tieuchi->id}}" id="soluong{{$Tieuchi->id}}"
							@foreach($Phieudanhgia->phieugiangdaytrong as $pgd)
								@if($pgd->id_tieuchi==$Tieuchi->id && $pgd->soluongbomon == 0) 
									value="{{$pgd->soluong}}"
								@endif

								@if($pgd->id_tieuchi==$Tieuchi->id && $pgd->soluongbomon != 0) 
									value="{{$pgd->soluongbomon}}"
								@endif
							@endforeach >
						</td>

						<td class="text-center diem{{$Tieuchi->id}}" data-id="{{$Tieuchi->diem}}">{{$Tieuchi->diem}}</td>

						<td class="text-center">
							@foreach($Phieudanhgia->phieugiangday as $pgd )
								@if($pgd->id_tieuchi==$Tieuchi->id && $pgd->ghichu != '')
									<span title="{{$pgd->ghichu}}">Có</span>
								@endif
							@endforeach	
						</td>

						<td class="text-center">
							@foreach($Phieudanhgia->phieugiangdaytrong as $pgd)
								@if($pgd->id_tieuchi == $Tieuchi->id && $pgd->gopybomon == '')
									<span class="capnhatgopy" data-id="{{$Tieuchi->id}}" data-ten="{{$Tieuchi->ten}}" data-loai="{{$Tieuchi->loaiminhchung}}" data-gopy="{{$pgd->gopybomon}}">Thêm</span>
								@endif

								@if($pgd->id_tieuchi == $Tieuchi->id && $pgd->gopybomon != '')
									<span class="capnhatgopy capnhatgopy{{$Tieuchi->id}}" data-gopy="{{$pgd->gopybomon}}" data-id="{{$Tieuchi->id}}" data-ten="{{$Tieuchi->ten}}" data-loai="{{$Tieuchi->loaiminhchung}}" data-gopy="{{$pgd->gopybomon}}">Cập nhật</span>
								@endif
							@endforeach
						</td>

						<td class="text-center">
							@foreach($Phieudanhgia->phieugiangdaytrong as $pgd)
								@if($pgd->id_tieuchi == $Tieuchi->id && $pgd->phanhoibomon != '')
									<span class="phanhoibomon" data-id="{{$Tieuchi->id}}" data-ten="{{$Tieuchi->ten}}" data-loai="{{$Tieuchi->loaiminhchung}}" data-phanhoi="{{$pgd->phanhoibomon}}">Có</span>
								@endif
							@endforeach
						</td>		

						<td class="text-center">
							<input type="checkbox" disabled="disabled" 
							@foreach($Phieudanhgia->phieugiangday as $pgd)
								@if($pgd->id_tieuchi == $Tieuchi->id)
									checked
								@endif
							@endforeach
							>
						</td>				

						<td class="text-center">
							<input type="checkbox" name="mycheck[]" value="{{$Tieuchi->id}}" class="mycheck" id="mycheck{{$Tieuchi->id}}" data-id="{{$Tieuchi->id}}"

							@foreach($Phieudanhgia->phieugiangdaybomonduyet as $pgd)
								@if($pgd->id_tieuchi == $Tieuchi->id)
									checked
								@endif
							@endforeach
							>
						</td>

						<td class="text-center">
							@foreach($Phieudanhgia->phieugiangdaytrong as $pgd )
								@if($pgd->id_tieuchi==$Tieuchi->id)
									@if($pgd->minhchung!='')										
										<?php $soco= explode(",", $pgd->minhchung);$dem=1;?>
										@foreach($soco as $sc)
										<a href="@if(substr($sc,0,5)=='drive') set_bomon/ajax/get/{{$sc}}@else {{$sc}} @endif" target="_blank">Có_{{$dem++}}</a>										
										@endforeach
										<br>		
										<a class="capnhatminhchung" data-id="{{$Tieuchi->id}}">Cập nhật</a>
									@else
										<a class="themminhchung" data-id="{{$Tieuchi->id}}">Thêm</a>
									@endif
								@endif
							@endforeach
						</td>						

						<td class="text-center">
							<input type="text" name="diemdat{{$Tieuchi->id}}" id="diemdat{{$Tieuchi->id}}" class="bordernone diemdat" readonly>
						</td>
					</tr>
				@endforeach
				<tr>
					<td colspan="11" class="text-center"><b class="ten2x">Tổng điểm:</b></td>
					<td class="text-center"><input type="text" id="tongdiem" name="tongdiem" value="0" class="bordernone"></td>
				</tr>
			</tbody>			
	</table>
	<input type="hidden" name="id_phieu" value="{{$Phieudanhgia->id}}">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<a href="set_bomon">
		<input type="button" value="Thoát" class="btn btn-danger pull-right" style="margin-bottom:20px;">
	</a>
	<input type="button" value="Xác nhận" class="btn btn-success pull-right btn-xacnhan" style="margin-bottom:20px;margin-right:20px;">

<div class="modal fade" id="xacnhan" role="dialog">
	<div class="modal-dialog modal-lg"> 
		<div class="modal-content">
		    <div class="modal-header">
		       <button type="button" class="close" data-dismiss="modal">&times;</button>
		       <h4 class="modal-title ten2x" style="font-size:20px;">Bạn đã đánh giá với kết quả như sau</h4>
		       <h5 style="color:red">Thông tin sau khi gửi sẽ được lưu vào hệ thống  và nếu đánh giá sẽ phải cập nhật lại minh chứng vui lòng kiểm tra trước khi gửi</h5>	        
		    </div>
		    <div class="modal-body">
				<table width="100%" class="table table-hover table-bordered">
					<thead>
						<tr class="bg-top">
							<td width="5%" class="text-center">STT</td>
							<td>Tiêu chí</td>
							<td width="10%" class="text-center">Điểm đạt</td>
						</tr>
					</thead>
					<tbody id="loadxacnhan">
						
					</tbody>
				</table>  		        		
			</div>
			<div class="modal-footer">	
				<input type="submit" name="" value="Lưu" class="btn btn-success">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Thoát</button>
		   	</div>
		</div>	    
	</div>	  
</div>
</form>
</div> 


<div class="modal fade" id="gopymodal" role="dialog">
	<div class="modal-dialog modal-md"> 
	    <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title ten2x" style="font-size:20px;">CẬP NHẬT GÓP Ý</h4>	        
	        </div>
	        <div class="modal-body">
	        	<p class="boldphieu1" style="font-weight:normal;font-size:16px;">Tiêu chí:&nbsp; &nbsp;<span id="tentieuchi" ></span></p>
	        	<p class="boldphieu1" style="font-weight:normal;font-size:16px;">Loại minh chứng:&nbsp; &nbsp;<span id="loaiminhchung" ></span></p>
	        	<div class="row">
	        		 <div class="form-group">
		        		<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
		        			<textarea class="form-control" id="gopy"></textarea>
		        		</div>		        		
	        		</div>	        		
	        	</div>
	        	<input type="hidden" id="id_tieuchi">	        		
			</div>
			<div class="modal-footer">		
				<button class="btn btn-success" id="btn-luu-gopy">Góp ý</button>		
				<button type="button" class="btn btn-danger" data-dismiss="modal">Thoát</button>
	   		</div>
	    </div>	    
	</div>	  
</div>

<div class="modal fade" id="phanhoi" role="dialog">
	<div class="modal-dialog modal-md"> 
	    <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title ten2x" style="font-size:20px;">PHẢN HỒI TỪ GIẢNG VIÊN</h4>	        
	        </div>
	        <div class="modal-body">
	        	<p class="boldphieu1" style="font-weight:normal;font-size:16px;">Tiêu chí:&nbsp; &nbsp;<span id="tentieuchiphanhoi" ></span></p>
	        	<div class="row">
	        		 <div class="form-group">
		        		<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
		        			<textarea class="form-control" id="giangvienphanhoi" readonly=""></textarea>
		        		</div>		        		
	        		</div>
	        	</div>	        	
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Thoát</button>
	   		</div>
	    </div>	    
	</div>	  
</div>

<div class="modal fade" id="minhchung" role="dialog">
	<div class="modal-dialog modal-lg"> 
	    <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title ten2x" style="font-size:20px;">CẬP NHẬT MINH CHỨNG</h4>	        
	        </div>
	        <div class="modal-body">
	        	<p class="boldphieu1" style="font-weight:normal;">Tiêu chí:&nbsp;<i><span id="tentieuchiminhchung"></span></i></p>
	        	<p class="boldphieu1" style="font-weight:normal;">Loại minh chứng:&nbsp;<i><span id="loaiminhchungminhchung"></span></i></p>
	        	<div class="row">
	        		<div class="col-lg-12 col-md-12">
	        			<p id="minhchungold"></p>
	        		</div>	        		
	        	</div>

	        	<div class="row">
	        		 <div class="form-group" style="margin-bottom:25px;">
	        		 	<div class="col-lg-12">
	        		 		<input type="radio" checked name="r3" class="flat-red" value="1">&nbsp;&nbsp;Link liên kết đến minh chứng
	        		 	</div>
	        		</div>
	        		 <div class="form-group">
		        		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		        			<input type="text"  id="minhchunglink" class="form-control">
		        		</div>
		        		
	        		</div>	 	
	        	</div>
	        	<div class="row" style="margin-top:10px;">
	        		 <div class="form-group">
	        		 	<div class="col-lg-3" style="margin-bottom:10px;">
		        			<input type="radio" name="r3" class="flat-red" value="2">&nbsp;&nbsp; Upload File minh chứng lên
		        		</div>		        		
		        		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		        			<div class="form-group">
				                <div class="btn btn-success btn-file">
				                  <i class="fa fa-paperclip"></i> Chọn file
				                  <input type="file" name="files[]" id="file" class="form-control" multiple  onchange="javascript:updateList()">				                  
				                </div>
				                <br/><br><b>File đã chọn là:</b>
								  <ul id="fileList" class="list-group"></ul>
			              	</div>
		        		</div>
		        				        		
	        		</div>	        		
	        	</div>
	        	<input type="hidden" id="id_tieuchi">
	        	<input type="hidden" id="id_phieu">	
			</div>
			<div class="modal-footer">
				<input type="button" class="btn btn-success btn-capnhatminhchungmoi"  value="Cập nhật">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Thoát</button>
	   		</div>
	    </div>	    
	</div>	  
</div>

@endsection
@section('script')

<script type="text/javascript">

	$(document).on('click','.themminhchung',function(){
		var id = $(this).data('id');
		var ten=$('#ten'+id).html();
		var loaiminhchung=$('#loaiminhchung'+id).val();		
		$('#id_tieuchi').val(id);
		$('#tentieuchiminhchung').html(ten);
		$('#loaiminhchungminhchung').html(loaiminhchung);		
		$('#minhchung').modal();		
	});

	$(document).on('click','.capnhatminhchung',function(){
		var id = $(this).data('id');
		var ten=$('#ten'+id).html();
		var loaiminhchung=$('#loaiminhchung'+id).val();
		var minhchunght=$('#minhchunght'+id).val();
		$('#id_tieuchi').val(id);
		$('#tentieuchiminhchung').html(ten);
		$('#loaiminhchungminhchung').html(loaiminhchung);		
		$('#minhchung').modal();		
	});

	updateList = function() {
  		var input = document.getElementById('file');
  		var output = document.getElementById('fileList');

  		output.innerHTML = '<ul>';
 			for (var i = 0; i < input.files.length; ++i) {
   				output.innerHTML += '<li class="list-group-item list-group-item-warning">' + input.files.item(i).name + '</li>';
  		}
  			output.innerHTML += '</ul>';
	}


	$(document).on('click','.btn-capnhatminhchungmoi',function(){
		var id_tieuchi=	$('#id_tieuchi').val();
		var id_phieu=<?=$Phieudanhgia->id?>;		
		var type=$('input[name=r3]:checked').val();	
		var minhchunglink=$('#minhchunglink').val();		
		if(isNaN(type)){alert('Vui lòng chọn hình thức upload minh chứng');return false;}
		if(type==1 && minhchunglink==''){alert('Vui lòng nhập liên kết đến minh chứng');return false;}
		if(type==1){
			 $.ajax({

				    method:'POST',
				    url:'set_bomon/ajax/uploadminhchunggiangdaylink',
				    data:{
				        	id_tieuchi:id_tieuchi,
				        	id_phieu:id_phieu,
				        	minhchung:minhchunglink,	
				        	_token:token
				        },
				        success: function(data){                      
				                alert(data);window.location.reload();
				         },
				         error: function(XMLHttpRequest, textStatus, errorThrown){                     
				                alert("Status: " + textStatus+": "+errorThrown+"!!!!");

				         }
			});
		}

		if(type==2){
			$(this).val('Đang thực hiện');
			$(this).prop('disabled',true);			   
     		var form_data = new FormData();
     		var ins = document.getElementById('file').files.length;
				for (var x = 0; x < ins; x++)    				
    				form_data.append('files[]',document.getElementById('file').files[x]);
            
            form_data.append('id_tieuchi', id_tieuchi);  
            form_data.append('id_phieu', id_phieu);          
            form_data.append('_token', token);

			 $.ajax({
				    url: 'set_bomon/ajax/uploadminhchunggiangdayfile', // point to server-side PHP script
				    data:form_data,
				    type: 'POST',
				    contentType: false, // The content type used when sending data to the server.
				    ache: false, // To unable request pages to be cached
				    processData: false,
				    success: function(data){
					   alert(data);window.location.reload();			       
				   }
       	}); 
			 
		}

	});



	$(document).on('change','.mycheck',function(){
		var id = $(this).data('id');
		var soluong = $('#soluong'+id).val();
		var diem = $('.diem'+id).data('id');
		var id_phieu=<?=$Phieudanhgia->id?>;

		if($.isNumeric(soluong)==false){
			alert('Vui lòng nhập số lượng là số ! ! !');
			$(this).prop('checked', false);
			return false;
		}
				
		if($(this).is(':checked')){
			var diemdat=parseFloat(soluong*diem);
			$('#diemdat'+id).val(diemdat);
			var tongdiem=parseFloat($('#tongdiem').val());
			$('#tongdiem').val(tongdiem+diemdat);
		}
		else{

			var diemdat=parseFloat(soluong*diem);
			$('#diemdat'+id).val(diemdat);
			var tongdiem=parseFloat($('#tongdiem').val());
			$('#tongdiem').val(tongdiem-diemdat);			
			$('#diemdat'+id).val(0);

			$.ajax({
				method:'POST',
				url:'set_bomon/ajax/huy-duyet/giang-day',
				data:{
				    id_tieuchi:id,
				    id_phieu:id_phieu,				   
				    _token:token
				},
				success: function(data){  
					alert('Bỏ duyệt tiêu chí này thành công!');	
					window.location.reload();			      
				},
				error: function(XMLHttpRequest, textStatus, errorThrown){                     
				   alert("Status: " + textStatus+": "+errorThrown+"!!!!");

				}
			});
		}
	});

	$(document).on('focusin','.soluong',function(){		
		$(this).data('val', $(this).val());
	});

	$(document).on('change','.soluong',function(){
		var id = $(this).data('id');
		var value=$(this).val();//get so luong danh gia			
		var diem = $('.diem'+id).data('id');//get diem tieu chi

		if(!$.isNumeric(value)){
			$(this).val(parseFloat($(this).data('val')));
			alert('Số lượng phải là một con số');
			return false;
		}

		if($(this).data('val')!='')
			var oldvalue=parseFloat($(this).data('val'));//lay  gia tri củ của số lượng
	
				
		if(oldvalue>value && ($('#mycheck'+id).is(':checked'))){
			var diemdatht=parseFloat($('#diemdat'+id).val());//lấy điểm đạt hiện tại
			var diemdat=parseFloat((oldvalue-value)*diem);//tính điếm đạt được
			$('#diemdat'+id).val(diemdatht-diemdat);//change điếm đạt trên form
			var tongdiem=parseFloat($('#tongdiem').val());//tính tổng điểm
			$('#tongdiem').val(tongdiem-diemdat);//change tổng điểm trên form
		}

		if(oldvalue<value && ($('#mycheck'+id).is(':checked'))){
			var diemdatht=parseFloat($('#diemdat'+id).val());//lấy điểm đạt hiện tại
			var diemdat=parseFloat((value-oldvalue)*diem);//tính điếm đạt được
			$('#diemdat'+id).val(diemdatht+diemdat);//change điếm đạt trên form
			var tongdiem=parseFloat($('#tongdiem').val());//tính tổng điểm
			$('#tongdiem').val(tongdiem+diemdat);//change tổng điểm trên form
		}
	});

	$(document).on('click','.capnhatgopy',function(){
		var id_tieuchi=$(this).data('id');
		$('#tentieuchi').html($(this).data('ten'));
		$('#loaiminhchung').html($(this).data('loai'));
		$('#id_tieuchi').val(id_tieuchi);	
		$('#gopy').val($(this).data('gopy'));	
		$('#gopymodal').modal();
	});

	$(document).on('click','#btn-luu-gopy',function(){
		var id_tieuchi=$('#id_tieuchi').val();
		var id_phieu=<?=$Phieudanhgia->id?>;
		var gopy=$('#gopy').val();

		 $.ajax({

				method:'POST',
				url:'set_bomon/ajax/cap-nhat-gop-y/giang-day',
				data:{
				    id_tieuchi:id_tieuchi,
				    id_phieu:id_phieu,
				    gopy:gopy,	
				    _token:token
				},
				success: function(data){  
					alert('Cập nhật thành công !');
				    window.location.reload();   
				},
				error: function(XMLHttpRequest, textStatus, errorThrown){                     
				   alert("Status: " + textStatus+": "+errorThrown+"!!!!");

				}
			}); 
	});


	$(document).on('click','.btn-xacnhan',function(){
		var noidung='';
		var z=0;
		@foreach($Tieuchigiangday as $tc)
		  if($('#mycheck<?=$tc->id?>').is(':checked')){
		  	noidung+='<tr>';
		  		z++;
		  		noidung+='<td class="text-center">'+z+'</td>';
		  		noidung+='<td><?=$tc->ten?></td>';
		  		noidung+='<td class="text-center">'+$('#diemdat<?=$tc->id?>').val()+'</td>';
		  	noidung+='</tr>';		  
		  }
		@endforeach
		$('#loadxacnhan').html(noidung);		
		$('#xacnhan').modal();
	});

	$(document).on('click','.phanhoibomon',function(){
		var id_tieuchi=$(this).data('id');
		$('#tentieuchiphanhoi').html($(this).data('ten'));		
		$('#giangvienphanhoi').val($(this).data('phanhoi'));
		$('#phanhoi').modal();
	});

	$(document).ready(function(){
		
		@foreach($Phieudanhgia->phieugiangdaybomonduyet as $pgd)	
			@if($pgd->bomonduyet==1)		
				$('#diemdat<?=$pgd->id_tieuchi?>').val('<?=$pgd->diemdatbomon?>');				
			@endif
		@endforeach
		$('#tongdiem').val(<?=$Phieudanhgia->phieugiangdaybomonduyet->sum('diemdatbomon')?>);
	});
$(document).on('click','#file',function(){
	var radiofile=$('input[name=r3]:checked').val();	
	if(radiofile==1){alert('Vui lòng chọn cách tải minh chứng lên là file');return false;}
});

</script>

@endsection