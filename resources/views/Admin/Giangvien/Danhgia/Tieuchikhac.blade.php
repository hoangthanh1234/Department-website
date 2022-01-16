@extends('Admin.Giangvien.Danhgia.Master')
@section('Tabvalue')
<div role="tabpanel" class="tab-pane  @if ($tab==3) active @endif" id="profile">

<br>
	<div class="container" style="max-width:500px;margin-top:20px;">
            @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
            @endif
    </div>
<br>	



@if(count($Khoagopy)>0)
	<button class="btn btn-danger pull-left" data-toggle="modal" data-target="#khoagopy" style="margin-right:15px;">
		Khoa góp ý
	</button>
@endif

@if(count($Bomongopy)>0)
	<button class="btn btn-danger pull-left" data-toggle="modal" data-target="#bomongopy" style="margin-right:15px;">
		Bộ môn góp ý
	</button>
@endif

<form method="post" action="set_giangvien/danh-gia-vien-chuc/tieu-chi-khac/3" enctype="multipart/form-data">
	<div class="text-center h3" style="padding-top:0;">{{$Thongbaodanhgia->ten}}</div>
	<a href="set_giangvien/PDF/{{$Phieudanhgia->id}}" target="_blank">
		<input type="button" value="Xuất PDF" class="btn btn-success pull-left" style="margin-bottom:20px;">
	</a>

	<a href="set_giangvien">
		<input type="button" value="Thoát" class="btn btn-danger pull-right" style="margin-bottom:20px;">
	</a>
	@if($Thongbaodanhgia->trangthai == 1)
		<input type="button" value="Xác nhận" class="btn btn-success pull-right btn-xacnhan" style="margin-bottom:20px;margin-right:20px;">
	@endif
	<table  class="table table-bordered table-hover" style="width:100%!important">
			<thead>
				<tr class="bg-top" style="width:100%">
					<th width="5%" class="text-center">STT</th>
					<th>Tên tiêu chí</th>				
					<th width="8%" class="text-center">Đơn vị tính</th>
					<th width="8%" class="text-center">Số lượng</th>
					<th width="5%" class="text-center">Điểm</th>
					<th width="5%" class="text-center">Chọn</th>
					<th width="10%" class="text-center">Khoa duyệt</th>
					<th width="10%" class="text-center">Minh chứng</th>	
					<th width="8%" class="text-center">Đạt giờ NCKH</th>										
					<th width="8%" class="text-center">Điểm đạt</th>
				</tr>
			</thead>

			<tbody>				
				<?php $j=1; ?>
				@foreach($Tieuchikhac as $Tieuchi)
					<tr>
						<td class="text-center">{{$j++}}</td>

						<td class="boldphieu2" id="ten{{$Tieuchi->id}}">
							{{$Tieuchi->ten}}
							<input type="hidden" value="{{$Tieuchi->loaiminhchung}}" id="loaiminhchung{{$Tieuchi->id}}">
						</td>	
					
						<td class="text-center boldphieu2">{{$Tieuchi->donvitinh}}</td>

						<td class="text-center">
							<input type="text" name="soluong{{$Tieuchi->id}}" style="width:50px;text-align:center;" class="soluong" data-id="{{$Tieuchi->id}}" id="soluong{{$Tieuchi->id}}" @if($Tieuchi->donvitinh == "Năm") value="1" readonly @endif>
						</td>

						<td class="text-center diem{{$Tieuchi->id}}" data-id="{{$Tieuchi->diem}}">{{$Tieuchi->diem}}</td>

						<td class="text-center">
							<input type="checkbox" name="mycheck[]" value="{{$Tieuchi->id}}" class="mycheck" id="mycheck{{$Tieuchi->id}}" data-id="{{$Tieuchi->id}}"
								@foreach($Phieudanhgia->phieukhac as $pgd )
									@if($pgd->id_tieuchi==$Tieuchi->id)
									 	checked
									 	@if($pgd->khoaduyet == 1)
									 		disabled 
									 	@endif
									@endif
								@endforeach
							>
						</td>

						<td class="text-center">
							<input type="checkbox" disabled 
								@foreach($Phieudanhgia->phieukhac as $pgd )
									@if($pgd->id_tieuchi==$Tieuchi->id && $pgd->khoaduyet == 1)
									 	checked									 	
									@endif
								@endforeach
							>
						</td>

						<td class="text-center">
							@foreach($Phieudanhgia->phieukhac as $pgd )
								@if($pgd->id_tieuchi==$Tieuchi->id)
									@if($pgd->minhchung!='')	
										<?php $soco= explode(",", $pgd->minhchung);$dem=1;?>
										@foreach($soco as $sc)
										<a href="@if(substr($sc,0,5)=='drive') set_giangvien/ajax/get/{{$sc}}@else {{$sc}} @endif" target="_blank">Có_{{$dem++}}</a>
										@endforeach
										<br>										
										<a class="capnhatminhchung" data-id="{{$Tieuchi->id}}">Cập nhật</a>
										<input type="hidden"  name="minhchunght{{$Tieuchi->id}}" value="{{$pgd->minhchung}}">
									@else
										<a class="themminhchung" data-id="{{$Tieuchi->id}}">Thêm</a>
									@endif
								@endif
							@endforeach
						</td>						
						<td class="text-center">
							@if ($Tieuchi->gio!=0)
							{{ $Tieuchi->gio }}
							@endif
							
						</td>
						<td class="text-center">
							<input type="text" name="diemdat{{$Tieuchi->id}}" id="diemdat{{$Tieuchi->id}}" class="bordernone diemdat" >
						</td>
						
					</tr>
				@endforeach
				<tr>
					<td colspan="9" class="text-center"><b class="ten2x">Tổng điểm:</b></td>
					<td class="text-center"><input type="text" id="tongdiem" name="tongdiem" value="0" class="bordernone"></td>
				</tr>
			</tbody>			
	</table>
	<input type="hidden" name="id_phieu" value="{{$Phieudanhgia->id}}">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	
	<a href="set_giangvien/PDF/{{$Phieudanhgia->id}}" target="_blank">
		<input type="button" value="Xuất PDF" class="btn btn-success pull-left" style="margin-bottom:20px;">
	</a>

	<a href="set_giangvien">
		<input type="button" value="Thoát" class="btn btn-danger pull-right" style="margin-bottom:20px;">
	</a>
	@if($Thongbaodanhgia->trangthai == 1)
		<input type="button" value="Xác nhận" class="btn btn-success pull-right btn-xacnhan" style="margin-bottom:20px;margin-right:20px;">
	@endif

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

@if(count($Khoagopy)>0)
	<button class="btn btn-danger pull-left" data-toggle="modal" data-target="#khoagopy" style="margin-right:15px;">
		Khoa góp ý
	</button>
@endif

@if(count($Bomongopy)>0)
	<button class="btn btn-danger pull-left" data-toggle="modal" data-target="#bomongopy" style="margin-right:15px;">
		Bộ môn góp ý
	</button>
@endif
</div> 

<div class="modal fade" id="minhchung" role="dialog">
	<div class="modal-dialog modal-lg"> 
	    <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title ten2x" style="font-size:20px;">CẬP NHẬT MINH CHỨNG</h4>	        
	        </div>
	        <div class="modal-body">
	        	<p class="boldphieu1" style="font-weight:normal;">Tiêu chí:&nbsp;<i><span id="tentieuchi"></span></i></p>
	        	<p class="boldphieu1" style="font-weight:normal;">Loại minh chứng:&nbsp;<i><span id="loaiminhchung"></span></i></p>
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
	        	{{-- <div class="row" style="margin-top:10px;">
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
	        	</div> --}}
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


<div class="modal fade" id="bomongopy" role="dialog">
	<div class="modal-dialog modal-lg"> 
	    <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title ten2x" style="font-size:20px;">BỘ MÔN GÓP Ý</h4>	        
	        </div>
	        <div class="modal-body">
				@foreach($Bomongopy as $bmgy)
				@if($bmgy->phanhoibomon == '')
					<div class="row" style="border-bottom:1px dashed #777;padding-top:10px">
						<div class="col-lg-5 col-md-6 col-xs-12">
							<span>Tiêu chí:&nbsp;&nbsp;</span><i>{{$bmgy->tieuchi->ten}}</i><br>
							<span class="fa fa-sign-in"></span>&nbsp;&nbsp;<span><i>{{$bmgy->gopybomon}}</i></span>
						</div> 
						<div class="col-lg-5 col-md-6 col-xs-12" style="padding-right:0;">						
							<input type="text" class="form-control" id="phanhoibomonkhac{{$bmgy->id}}" value="{{$bmgy->phanhoibomon}}"  placeholder="Nhập phản hồi tại đây">	
						</div>
						<div class="col-lg-2"><button type="button" class="btn btn-success btn-phanhoibomonkhac" data-id="{{$bmgy->id}}">Phản hồi</button></div>
					</div>
				@endif
				@endforeach	        	
	        		
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Thoát</button>
	   		</div>
	    </div>	    
	</div>	  
</div>

<div class="modal fade" id="khoagopy" role="dialog">
	<div class="modal-dialog modal-lg"> 
	    <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title ten2x" style="font-size:20px;">KHOA GÓP Ý</h4>	        
	        </div>
	        <div class="modal-body">
	        	
	        	@foreach($Khoagopy as $kgy)
	        	@if($kgy->phanhoikhoa== '')
					<div class="row" style="border-bottom:1px dashed #777;padding-top:10px">
						<div class="col-lg-5 col-md-5 col-xs-12">
							<span>Tiêu chí:&nbsp;&nbsp;</span><span><i>{{$kgy->tieuchi->ten}}</i></span><br>
							<span class="fa fa-sign-in"></span>&nbsp;&nbsp;<span>{{$kgy->gopykhoa}}</span>
						</div> 
						<div class="col-lg-5 col-md-5 col-xs-10" style="padding-right:0;">						
							<input type="text" class="form-control" id="phanhoikhoakhac{{$kgy->id}}" value="{{$kgy->phanhoikhoa}}"  placeholder="Nhập phản hồi tại đây">	
						</div>					
						<div class="col-lg-2 col-md-2 col-xs-2"><button type="button" class="btn btn-success btn-phanhoikhoakhac" data-id="{{$kgy->id}}">Phản hồi</button></div>
					</div>
				@endif
				@endforeach	        		
			</div>
			<div class="modal-footer">	
				<button type="button" class="btn btn-danger" data-dismiss="modal">Thoát</button>
	   		</div>
	    </div>	    
	</div>	  
</div>



@endsection
@section('script')
<script type="text/javascript">

	$(document).on('change','.mycheck',function(){
		var id = $(this).data('id');
		var soluong = $('#soluong'+id).val();
		var diem = $('.diem'+id).data('id');

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
			$('.soluong'+id).val(0);
			$('#diemdat'+id).val(0);
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


	$(document).ready(function(){
		var tong=0;
		@foreach($Phieudanhgia->phieukhac as $pgd)
			$('#soluong<?=$pgd->id_tieuchi?>').val('<?=$pgd->soluong?>');
			$('#diemdat<?=$pgd->id_tieuchi?>').val('<?=$pgd->diemdat?>');
			tong+=<?=$pgd->diemdat?>;
		@endforeach
		$('#tongdiem').val(tong);
	});

	$(document).on('click','.themminhchung',function(){
		var id = $(this).data('id');
		var ten=$('#ten'+id).html();
		var loaiminhchung=$('#loaiminhchung'+id).val();		
		$('#id_tieuchi').val(id);
		$('#tentieuchi').html(ten);
		$('#loaiminhchung').html(loaiminhchung);		
		$('#minhchung').modal();		
	});

	$(document).on('click','.capnhatminhchung',function(){
		var id = $(this).data('id');
		var ten=$('#ten'+id).html();
		var loaiminhchung=$('#loaiminhchung'+id).val();
		var minhchunght=$('#minhchunght'+id).val();
		$('#id_tieuchi').val(id);
		$('#tentieuchi').html(ten);
		$('#loaiminhchung').html(loaiminhchung);		
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
				    url:'set_giangvien/ajax/uploadminhchungkhaclink',
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
				    url: 'set_giangvien/ajax/uploadminhchungkhacfile', // point to server-side PHP script
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

	$(document).on('click','.btn-xacnhan',function(){
		var noidung='';
		var z=0;
		@foreach($Tieuchikhac as $tc)
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

$(document).on('click','.btn-phanhoibomonkhac',function(){
		var id =$(this).data("id");
		var value=$('#phanhoibomonkhac'+id).val();
		var phieu=<?=$Phieudanhgia->id?>;

		var form_data = new FormData();        	   
        		form_data.append('id', id);
        		form_data.append('phanhoibomon', value);        		
        		form_data.append('_token', token);                    

        $.ajax({
			url: 'set_giangvien/ajax/phanhoibomonkhac', // point to server-side PHP script
			data:form_data,
			type: 'POST',
			contentType: false, // The content type used when sending data to the server.
			cache: false, // To unable request pages to be cached
			processData: false,
			success: function(data,status) {
				alert(status);window.location.reload();
			}
       	});   
		
});


$(document).on('click','.btn-phanhoikhoakhac',function(){
		var id =$(this).data("id");
		var value=$('#phanhoikhoakhac'+id).val();

		var form_data = new FormData();        	   
        		form_data.append('id', id);
        		form_data.append('phanhoikhoa', value);        		
        		form_data.append('_token', token);                    

        $.ajax({
			url: 'set_giangvien/ajax/phanhoikhoakhac', // point to server-side PHP script
			data:form_data,
			type: 'POST',
			contentType: false, // The content type used when sending data to the server.
			cache: false, // To unable request pages to be cached
			processData: false,
			success: function(data,status) {
				alert(status);window.location.reload(); 
			}
       	});   
		
});

$(document).on('click','#file',function(){
	var radiofile=$('input[name=r3]:checked').val();	
	if(radiofile==1){alert('Vui lòng chọn cách tải minh chứng lên là file');return false;}
});

</script>
@endsection