@extends('Admin.Master')
@section('title','Đánh giá giảng viên')
@section('content') 


  <div class="text-center h3" style="font-size:25px;padding-bottom:15px;">
  	Đánh giá Giảng viên: {{$Phieudanhgia->giangvien->ten}} Theo {{$Phieudanhgia->thongbao->ten}}
  	<p></p>
  	Từ ngày: {{date('d-m-Y', strtotime($Phieudanhgia->thongbao->ngaybatdau))}}  &nbsp; &nbsp; &nbsp; Đến ngày: {{date('d-m-Y', strtotime($Phieudanhgia->thongbao->ngayketthuc))}}
  </div>

  	

  <div class="box phieudanhgia padding20"> 
	<div class="container" style="max-width:500px;margin-top:20px;">
            @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
            @endif
    </div>	

    <div class="table-responsive">
   <form method="post" action="set_giangvien/thongbaodanhgia/danhgia/add" enctype="multipart/form-data" >
		<table class="table table-bordered table-hover" style="width:100%">
			<thead>
				<tr class="bg-top">
					<th width="5%" class="text-center">STT</th>
					<th>Tiêu chuẩn đánh giá</th>				
					<th width="6%" class="text-center">ĐVT</th>
					<th width="8%" class="text-center">Số lượng</th>
					<th width="5%" class="text-center">Điểm</th>
					<th width="7%" class="text-center">GV Chọn</th>															
					<th width="10%" class="text-center">Minh chứng</th>
					<th width="8%" class="text-center">Phản hồi</th>
					<th width="8%" class="text-center">Góp ý</th>
					<th width="8%" class="text-center">Duyệt</th>
					<th width="8%" class="text-center">Điểm BM</th>
									
				</tr>
			</thead>

			<tfoot>
				<tr>
					<th class="text-center"></th>
					<th class="text-center"></th>
					<th class="text-center"></th>
					<th class="text-center"></th>
					<th class="text-center"></th>
					<th class="text-center"></th>
					<th class="text-center"></th>					
					<th class="text-center"></th>
					<th class="text-center"></th>
					<th class="text-center"></th>
					<th class="text-center"></th>
				</tr>
			</tfoot>

			<tbody>
				<?php $i=1; ?>
				@foreach($Tieuchuan as $TC)
				<?php $j=1; ?>
					<tr style="background:#d28965">
						<td class="text-center boldphieu1">{{$i++}}</td>
						<td colspan="3" class="boldphieu1">{{$TC->ten}}</td>
						<td class="text-center boldphieu1">
							<input type="text" class="diemchuan{{$TC->id}}" value="{{$TC->diem}}" style="width:50px;text-align:center;border:none;" readonly>
						</td>		
						<td colspan="5"></td>				
						<td class="boldphieu1 text-center">
							<input type="text" value="0" class="diemtc{{$TC->id}}" style="width:50px;text-align:center;border:none;" 
								<?php $tong1=0; ?>
								@foreach($TC->tieuchi as $tcc)
								
									@foreach($last as $la)		
																	
										@if($tcc->id==$la->id_tieuchi)	
																				
											<?php $tong1+=$la->diem ?> value="<?=$tong1?>"
											<?php echo $la->diem ?>
										@endif
									@endforeach	
								@endforeach

							 readonly>
						</td>
						@foreach($TC->tieuchi as $Tieuchi)
						<tr>
							<td class="text-right">{{$i-1}}.{{$j++}}</td>
							<td class="boldphieu2">{{$Tieuchi->ten}}</td>							
							<td class="text-center boldphieu2">{{$Tieuchi->donvitinh}}</td>
							<td class="text-center">
									@if($Tieuchi->donvitinh!='Năm')
									<input type="text" style="width:50px;text-align:center;"   name="soluong{{$Tieuchi->id}}" class="soluong{{$Tieuchi->id}} soluongchange" data-tieuchuan="{{$Tieuchi->tieuchuan->id}}"  data-id="{{$Tieuchi->id}}" @if($Tieuchi->diem>0) readonly @endif
										@foreach($last as $la)										
											@if($la->id_tieuchi==$Tieuchi->id)											
												value="{{$la->soluong}}"		
											@endif
										@endforeach								
									>
									@else
									<input type="text" style="width:50px;text-align:center;" name="soluong{{$Tieuchi->id}}"  value="1" class="soluong{{$Tieuchi->id}}" readonly>
									@endif
							</td>

							<td class="text-center diem{{$Tieuchi->id}}"  name="diem{{$Tieuchi->id}}" data-value="{{$Tieuchi->diem}}">			{{$Tieuchi->diem}}
							</td>

							<td class="text-center">
								<input disabled  type="checkbox" class="checkgv{{$Tieuchi->id}}"									
										@foreach($last as $la)										
											@if($la->id_tieuchi==$Tieuchi->id && $la->giangvienduyet==1)
												checked											
											@endif
										@endforeach
								>
							</td>

							

							<td class="text-center">
								
								@foreach($last as $la)
									@if($la->id_tieuchi==$Tieuchi->id)											
												@if($la->minhchung!='')
												<p class="xemfile{{$Tieuchi->id}}">
													<a href="{{$la->minhchung}}" target="blank">Có</a>
													<input type="hidden" name="minhchung{{$Tieuchi->id}}" value="{{$la->minhchung}}">
												</p>
												@endif											
									@endif

									@if($Tieuchi->diem < 0 && $la->minhchung!='' && $la->id_tieuchi==$Tieuchi->id)
										<span class="minhchung minhchung{{$Tieuchi->id}}" data-val1="{{$Tieuchi->loaiminhchung}}" data-val2="{{$Tieuchi->ten}}" data-val3="{{$Phieudanhgia->id}}" data-id="{{$Tieuchi->id}}"  data-toggle="modal" data-target="#minhchungmodal{{$Tieuchi->id}}">Cập nhật</span>
									@endif

									@if($Tieuchi->diem < 0 && $la->minhchung=='' && $la->id_tieuchi==$Tieuchi->id)
										<span class="minhchung minhchung{{$Tieuchi->id}}" data-val1="{{$Tieuchi->loaiminhchung}}" data-val2="{{$Tieuchi->ten}}" data-val3="{{$Phieudanhgia->id}}" data-id="{{$Tieuchi->id}}"  data-toggle="modal" data-target="#minhchungmodal{{$Tieuchi->id}}">Thêm mới</span>
									@endif

								@endforeach								
							</td>
							
							<td class="text-center">									
								@foreach($last as $la)	
											@if($la->id_tieuchi==$Tieuchi->id && $la->phanhoibomon!='')
												<span class="phanhoi phanhoi{{$Tieuchi->id}}" data-val1="{{$la->phanhoibomon}}" data-val2="{{$Tieuchi->ten}}" data-id="{{$Tieuchi->id}}"  data-toggle="modal" data-target="#phanhoi">Có</span>
											@endif
								@endforeach

							</td>

							<td class="text-center">
								
								@foreach($last as $la)										
											@if($la->id_tieuchi==$Tieuchi->id && $la->bomongopy=='')
												<span class="capnhatgopy capnhatgopy{{$Tieuchi->id}}" data-val1="{{$Tieuchi->loaiminhchung}}" data-val2="{{$Tieuchi->ten}}" data-val3="{{$la->bomongopy}}"  data-id="{{$Tieuchi->id}}"  data-toggle="modal" data-target="#gopymodal">Thêm</span>
											@endif

											@if($la->id_tieuchi==$Tieuchi->id && $la->bomongopy!='')
												<span class="capnhatgopy capnhatgopy{{$Tieuchi->id}}" data-val1="{{$Tieuchi->loaiminhchung}}" data-val2="{{$Tieuchi->ten}}" data-val3="{{$la->bomongopy}}"  data-id="{{$Tieuchi->id}}"  data-toggle="modal" data-target="#gopymodal">Cập nhật</span>
											@endif
								@endforeach

							</td>
							<td class="text-center">

								<input type="checkbox" class="checkboxs checkbox{{$Tieuchi->id}}" data-id="{{$Tieuchi->id}}" data-val="{{$Tieuchi->diem}}" data-tieuchuan="{{$Tieuchi->tieuchuan->id}}"
									@foreach($last as $la)										
											@if($la->id_tieuchi==$Tieuchi->id)
												 data-soluong="{{$la->soluong}}"
												 @if($la->bomonduyet==1)
													checked
												 @endif											
											@endif
									@endforeach
								>
							</td>

							<td class="text-center">
								<input type="text" style="width:50px;text-align:center;" class="diemdat{{$Tieuchi->id}}" name="diemdat{{$Tieuchi->id}}" readonly

									@foreach($last as $la)										
											@if($la->id_tieuchi==$Tieuchi->id && $la->bomonduyet==1)
												value="{{$la->diemdat}}"											
											@endif
									@endforeach
								>
							</td>
						</tr>





<div class="modal fade" id="minhchungmodal{{$Tieuchi->id}}" role="dialog">
	<div class="modal-dialog modal-lg"> 
	    <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title ten2x" style="font-size:20px;">CẬP NHẬT MINH CHỨNG</h4>	        
	        </div>
	        <div class="modal-body">
	        	<p class="boldphieu1" style="font-weight:normal;">Tiêu chí:&nbsp; &nbsp;{{$Tieuchi->ten}}</p>
	        	<p class="boldphieu1" style="font-weight:normal;">Loại minh chứng:&nbsp; &nbsp;{{$Tieuchi->loaiminhchung}}</p>

	        	<div class="row">
	        		 <div class="form-group">
	        		 	<div class="col-lg-12">
	        		 		<input type="radio" value="1" name="radiominhchung" id="radioFile">&nbsp;&nbsp;Link liên kết đến minh chứng
	        		 	</div>
		        		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		        			<input type="text"  id="minhchungmoi{{$Tieuchi->id}}" class="form-control"
								
								@foreach($last as $la)										
											@if($la->id_tieuchi==$Tieuchi->id)											
												value="{{$la->minhchung}}"											
											@endif
								@endforeach

		        			>
		        		</div>
		        		
	        		</div>	 	
	        	</div>


	        	<div class="row" style="margin-top:20px;">
	        		 <div class="form-group">
	        		 	<div class="col-lg-3">
		        			<input type="radio" value="2" name="radiominhchung" id="radioLink">&nbsp;&nbsp; Upload File minh chứng lên
		        		</div>
		        		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">		        			        	
		        			<input type="file" id="file{{$Tieuchi->id}}" name="file">		
		        		</div>
		        				        		
	        		</div>	        		
	        	</div>

	        	

	        	<input type="hidden" id="id_tieuchi">
	        	<input type="hidden" id="id_phieudanhgia">	
			</div>
			<div class="modal-footer">
				<input type="button" class="btn btn-success btn-capnhatminhchungmoi" data-id="{{$Tieuchi->id}}" value="Cập nhật">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Thoát</button>
	   		</div>
	    </div>	    
	</div>	  
</div>















						@endforeach
					</tr>
				@endforeach
				<tr class="boldphieu1">
					<td colspan="10">Tổng điểm:</td>
					<td class="text-center"><input type="text" style="border:none;width:50px;text-align:center;" name="tongdiem" id="tongdiem" value="{{$sum}}"></td>
				</tr>
			</tbody>			
		</table>		
		
	</form>
		<a href="set_bomon/thongbaodanhgia/danhsachdanhgia/{{$Phieudanhgia->id_thongbao}}"><input type="button" class="pull-right btn btn-danger" value="Thoát" name=""></a>
    </div>	
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
	        	<input type="hidden" id="id_phieudanhgia">	
			</div>
			<div class="modal-footer">		
				<button class="btn btn-success btn-luu">Góp ý</button>		
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

@endsection



@section('script')

<script type="text/javascript">


$(document).on('focusin','.soluongchange',function(){		
		$(this).data('val', $(this).val());
	});

$(document).on('change','.soluongchange',function(){
	var id = $(this).data('id');
	var value=$(this).val();
	var tieuchuan=$(this).data('tieuchuan');
	var diemchuan=parseInt($('.diemchuan'+tieuchuan).val());
	var phieu=<?=$Phieudanhgia->id?>;

	if($(this).data('val')!='')
		var oldvalue=parseInt($(this).data('val'));
		var diem=$('.diem'+id).data('value');	
		var diemtam=parseInt(value*diem);		

		if(oldvalue!==undefined){			
			if(oldvalue>value && ($('.checkbox'+id).is(':checked'))){
				var diemtcht=parseInt($('.diemtc'+tieuchuan).val());
				var tongdiemht=parseInt($('#tongdiem').val());
				
				var diemdatdat=diemtam;
				var tong=tongdiemht+((oldvalue-value)*diem);
				var soluong=value;

				if(($('.checkbox'+id).is(':checked')))
					$('.diemdat'+id).val(diemtam);

				 $('.diemtc'+tieuchuan).val(diemtcht-((oldvalue-value)*diem));
				 	$('#tongdiem').val(tongdiemht-((oldvalue-value)*diem));
				
				$.get("set_bomon/ajax/danhgiagiangvien/diemtru/update/1/"+id+"/"+phieu+"/"+soluong+"/"+diemdatdat+"/"+tong,function(data){console.log("thêm thành công");
					}).fail(function(err, status){
			   				alert("Đã xãy ra lỗi Vui lòng kiểm tra lại");
			   				$('.checkboxs'+id).prop('checked', false);
				 });

			}
			if(oldvalue<value && ($('.checkbox'+id).is(':checked'))){
				var diemtcht=parseInt($('.diemtc'+tieuchuan).val());

				var tongdiemht=parseInt($('#tongdiem').val());
				var diemdatdat=diemtam;
				var tong=tongdiemht+((value-oldvalue)*diem);
				var soluong=value;

				// if((diemtcht+((value-oldvalue)*diem)) < diemchuan )
				// 	{alert('vượt quá điểm của tiêu chuẩn vui lòng xem lại ! ! !');$(this).val(oldvalue);return false;}

				if(($('.checkbox'+id).is(':checked')))
					$('.diemdat'+id).val(diemtam);

				 $('.diemtc'+tieuchuan).val(diemtcht+((value-oldvalue)*diem));
				 	$('#tongdiem').val(tongdiemht+((value-oldvalue)*diem));

				 $.get("set_bomon/ajax/danhgiagiangvien/diemtru/update/1/"+id+"/"+phieu+"/"+soluong+"/"+diemdatdat+"/"+tong,function(data){console.log("thêm thành công");
					}).fail(function(err, status){
			   				alert("Đã xãy ra lỗi Vui lòng kiểm tra lại");
			   				$('.checkboxs'+id).prop('checked', false);
				 });

			
			}
		}
	});


$(document).on('change','.checkboxs',function(){

	var id=$(this).data('id');
	var phieu=<?=$Phieudanhgia->id?>;
	var diem=$(this).data('val');
	var tieuchuan=$(this).data('tieuchuan');
	var diemchuan=parseInt($('.diemchuan'+tieuchuan).val());
	var giangvienduyet=($('.checkgv'+id).is(':checked')) ? 1 : 0;
	var soluongduyet=$(this).data('soluong');

	if(diem>0){	
		if ($(this).is(':checked')){
			if(giangvienduyet==0){alert("Bạn không thể duyệt tiêu chí này");$(this).prop('checked', false);return false;}
				var diemtcht=parseInt($('.diemtc'+tieuchuan).val());
				var diem=parseInt($('.diem'+id).data('value'));
				var soluong=$('.soluong'+id).val();
				if(soluong==''){alert('Nhập số lượng');$(this).prop('checked', false); return false;}
					$('.diemdat'+id).val(soluong*diem);	
					var diemdatdat=parseInt((soluong*diem));
					var diemtc=diemdatdat+parseInt(diemtcht);
					$('.diemtc'+tieuchuan).val(diemtc);
				var tong=0;
				@foreach ($Tieuchuan as $TC)
					tong+=parseInt($('.diemtc'+<?=$TC->id?>).val());
				@endforeach				
					$('#tongdiem').val(tong);
			$.get("set_bomon/ajax/danhgiagiangvien/duyet/1/"+id+"/"+phieu+"/"+diem+"/"+soluongduyet,function(data){
			}).fail(function(err, status){
			   	alert("Bạn không thể duyệt tiêu chí này");
			   	$('.checkbox'+id).prop('checked', false);
			});
		}
		else{
				var diemtcht=parseInt($('.diemtc'+tieuchuan).val());
				var diem=parseInt($('.diem'+id).data('value'));
				var soluong=$('.soluong'+id).val();
				if(soluong==''){alert('Nhập số lượng');$(this).prop('checked', false); return false;}
					$('.diemdat'+id).val(soluong*diem);	
					var diemdatdat=parseInt((soluong*diem));
					var diemtc=parseInt(diemtcht)-diemdatdat;
					$('.diemtc'+tieuchuan).val(diemtc);
				var tong=0;
				@foreach ($Tieuchuan as $TC)
					tong+=parseInt($('.diemtc'+<?=$TC->id?>).val());
				@endforeach				
					$('#tongdiem').val(tong);
			$.get("set_bomon/ajax/danhgiagiangvien/duyet/0/"+id+"/"+phieu+"/"+diem+"/"+soluongduyet,function(data){});
		}
		
	}else{

			if($(this).is(':checked')){

				var diemtcht=parseInt($('.diemtc'+tieuchuan).val());
				var diem=parseInt($('.diem'+id).data('value'));
				var soluong=$('.soluong'+id).val();
				if(soluong==''){alert('Nhập số lượng');$(this).prop('checked', false); return false;}
					$('.diemdat'+id).val(soluong*diem);	
					var diemdatdat=parseInt((soluong*diem));
					var diemtc=diemdatdat+parseInt(diemtcht);				
				if(giangvienduyet==0)
					$('.diemtc'+tieuchuan).val(diemtc);
				var tong=0;
				@foreach ($Tieuchuan as $TC)
					tong+=parseInt($('.diemtc'+<?=$TC->id?>).val());
				@endforeach

				if(giangvienduyet==0)
					$('#tongdiem').val(tong);
					
					$.get("set_bomon/ajax/danhgiagiangvien/diemtru/1/"+id+"/"+phieu+"/"+soluong+"/"+diemdatdat+"/"+tong,function(data){console.log("thêm thành công");
					}).fail(function(err, status) {
			   				alert("Đã xãy ra lỗi Vui lòng kiểm tra lại");
			   				$('.checkboxs'+id).prop('checked', false);
				 });

 	 		}else{
			 	 	var diemtcht=parseInt($('.diemtc'+tieuchuan).val());
			 	 	var diemdat=parseInt($('.diemdat'+id).val()); 
			 	 	var diemtc=parseInt(diemtcht-diemdat);
			 	 	if(giangvienduyet==0)
						$('.diemtc'+tieuchuan).val(diemtc);

					var tong=0;
					@foreach ($Tieuchuan as $TC)
						tong+=parseInt($('.diemtc'+<?=$TC->id?>).val());
					@endforeach
					if(giangvienduyet==0)
						$('#tongdiem').val(tong);
					$.get("set_bomon/ajax/danhgiagiangvien/diemtru/xoa/"+id+"/"+phieu+"/"+$('#tongdiem').val(),function(data){console.log(123)}).fail(function(err, status) {
			   				alert("Đã xãy ra lỗi Vui lòng kiểm tra lại");
			   				$('.checkboxs'+id).prop('checked', false);
				 });;
 	 		}		


			 }

	});

	$(document).on('click','.capnhatgopy',function(){
		var id=$(this).data('id');
		var phieu=<?=$Phieudanhgia->id?>;	
		var id=$(this).data("id");		
		$('#tentieuchi').html($(this).data("val2"));
		$('#loaiminhchung').html($(this).data("val1"));
		$('#gopy').html($(this).data("val3"));
		$('#id_tieuchi').val(id);
		$('#id_phieudanhgia').val(phieu);
	});

	

	$(document).on('click','.btn-luu',function(){

				
					var tieuchi=$('#id_tieuchi').val();
					var phieudanhgia=$('#id_phieudanhgia').val();
                    var gopy=$('#gopy').val();
                 

                     var form_data = new FormData();
        			
        			form_data.append('tieuchi', tieuchi);
        			form_data.append('phieudanhgia', phieudanhgia);
        			form_data.append('gopy', gopy);
        			form_data.append('_token', token);
                    

                    $.ajax({
				            url: 'set_bomon/ajax/capnhatgopy', // point to server-side PHP script
				            data:form_data,
				            type: 'POST',
				            contentType: false, // The content type used when sending data to the server.
				            cache: false, // To unable request pages to be cached
				            processData: false,
				            success: function(data) {
				            	if(data=="1"){
				            		$('.capnhatgopy'+tieuchi).html('Cập nhật');   
				            		$('#gopymodal').modal('toggle');                    		 
				            	}
                           		  
                           		
				            }
       				 });                         
                  
     });

	$(document).on('click','.phanhoi',function(){
		var id=$(this).data("id");
		var ten=$(this).data("val2");
		var noidung=$(this).data("val1");		
		$('#tentieuchiphanhoi').html(ten);
		$('#giangvienphanhoi').html(noidung);
	});


	


$(document).on('click','.btn-capnhatminhchungmoi',function(){
	var id=$(this).data("id");
	var phieudanhgia=<?=$Phieudanhgia->id?>;
	var chon = $("input[name=radiominhchung]:checked").val();	
	if(isNaN(chon)){alert('Vui lòng chọn cách Upload minh chứng');return false;}
	if(chon==1){
		 var minhchung=$('#minhchungmoi'+id).val();		
		 var form_data = new FormData();
	         form_data.append('tieuchi',id);
	         form_data.append('minhchung', minhchung);
	         form_data.append('phieudanhgia', phieudanhgia);
	         form_data.append('_token', token);

	    $.ajax({
				url: 'set_bomon/ajax/uploadminhchunglink', // point to server-side PHP script
				data:form_data,
				type: 'POST',
				contentType: false, // The content type used when sending data to the server.
				ache: false, // To unable request pages to be cached
				processData: false,
				success: function(data) {

				var getData = $.parseJSON(data); 				            	  
	            var result = getData.ketqua;
	            var filename = getData.filename;
	            var tb=getData.tb;                           		  
	                if(result==1)
	                    window.location.reload();                           		    
	                    alert(tb);
				}
	    });  
    } 
    if(chon==2){

    		
    	var file_data = $('#file'+id).prop('files')[0];   
     	var form_data = new FormData();
            form_data.append('file', file_data);
            form_data.append('tieuchi', id);
            form_data.append('phieudanhgia', phieudanhgia);
            form_data.append('_token', token);
                    

             $.ajax({
				    url: 'set_bomon/ajax/uploadminhchung', // point to server-side PHP script
				    data:form_data,
				    type: 'POST',
				    contentType: false, // The content type used when sending data to the server.
				    ache: false, // To unable request pages to be cached
				    processData: false,
				    success: function(data){

				        var getData = $.parseJSON(data); 				            	  
                        var result = getData.ketqua;
                        var filename = getData.filename;
                        var tb=getData.tb;                           		  
                           	if(result==1)
                           		window.location.reload();                           		    
                           		alert(tb);
				            }
       	});        



    }
	
});


    $(document).ready(function(){
		
		@foreach ($Tieuchuan as $TC)
			var tong=0;
				@foreach ($TC->tieuchi as $tcc)
				if($('.diemdat<?=$tcc->id?>').val()!='')
					tong+=parseInt($('.diemdat<?=$tcc->id?>').val());
				@endforeach		
			$('.diemtc<?=$TC->id?>').val(tong);		
		@endforeach
	
});
	

</script>


@endsection