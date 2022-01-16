@extends('Admin.Giangvien.Hosokhoahoc.Master')
@section('Tabvalue')
<div role="tabpanel" class="tab-pane  @if ($tab==3) active @endif" id="profile">	
<p class="ten2x" style="font-size:20px;margin-top:30px;margin-bottom:30px;">Đề tài nghiên cứu khoa học</p>
<div class="table-responsive">
 <table id="example2" class="table table-bordered table-striped" style="width:100%;">
    <thead>                 
        <tr class="bg-top">                                
            <th width="5%" class="text-center">#</th>
            <th width="15%" class="text-center">Hành động</th>
            <th class="text-center" width="35%">Tên dề tài</th> 
            <th width="10%" class="text-center">Cấp đề tài</th>      
            <th width="10%" class="text-center">Trạng thái</th>
            <th width="10%" class="text-center">Tháng</th> 
            <th width="10%" class="text-center">Minh chứng</th> 
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
 @foreach($CT_detai as $CTDT)                                  
   <tr>       	
        <td align="center">
            {{$i++}}
        </td> 
         <td class="text-center" width="15%">    
         	<a class="btn btn-warning" title="Cập nhật">
         		<i class="fa fa-edit" aria-hidden="true" 
         		@if(Session::get('user_id') == $CTDT->detai->tacgia) data-toggle="modal" data-target="#capnhatnghiencuucongbo{{$CTDT->id}}" 
         		@endif>         			
         		</i>
         	</a> 
       			
       		<a title="Xóa đề tài" class=" btn btn-danger @if($CTDT->detai->tacgia == Session::get('user_id')) xoadetai  @endif" data-id="{{$CTDT->detai->id}}">
            	<i class="fa fa-times text-dange" aria-hidden="true"></i>
           	</a>

           	<a  class="btn btn-primary xemngay" data-id="{{$CTDT->detai->id}}" data-tacgia="{{$CTDT->detai->tacgia}}" title="Danh sách thành viên">
           		<i class="fa fa-user-o" aria-hidden="true"></i>
           	</a>
           	@if($CTDT->detai->trangthai=="Dự kiến")
           		<a href="set_giangvien/yeu-cau-thanh-vien/list/{{$CTDT->detai->id}}.html" class="btn btn-success" title="Thêm yêu cầu thành viên"><i class="fa fa-list-alt" aria-hidden="true"></i></a>
           	@endif
        </td>

             
        <td>{{$CTDT->detai->ten_vi}}</td>							
					
		<td class="text-center">{{$CTDT->detai->capdetai->ten_vi}}</td>
		<td class="text-center">{{$CTDT->detai->trangthai}}</td>
		<td class="text-center">{{$CTDT->thangthuchien}}</td>
		<td class="text-center">@if ($CTDT->detai->minhchung!='') 
			<a style="background:transparent;color:blue;" href="{{$CTDT->detai->minhchung}}"  target="_blank">Có</a> @endif
		</td>								

    </tr>  


<div class="modal fade" id="capnhatnghiencuucongbo{{$CTDT->id}}" role="dialog">
	<div class="modal-dialog modal-lg"> 
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title ten2x">CẬP NHẬT ĐỀ TÀI NGHIÊN CỨU KHOA HỌC: {{$CTDT->detai->ten_vi}}</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="ten2x">Tên đề tài (VI)</label>
							<input type="text" id="ten_vi{{$CTDT->id}}" class="form-control" placeholder="nhập tên dự án tiếng Việt" value="{{$CTDT->detai->ten_vi}}">
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="ten2x">Tên đề tài (EN)</label>
							<input type="text" id="ten_en{{$CTDT->id}}" class="form-control" placeholder="nhập tên dự án tiếng Anh" 
							value="{{$CTDT->detai->ten_en}}">
						</div>
					</div>				
				</div>


				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="ten2x">Mô tả (VI)</label>
							<textarea class="form-control" id="mota_vi{{$CTDT->id}}" placeholder="nhập mô tả dự án tiếng Việt">{{$CTDT->detai->mota_vi}}</textarea>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="ten2x">Mô tả (EN)</label>
							<textarea class="form-control" id="mota_en{{$CTDT->id}}" placeholder="nhập mô tả dự án tiếng Anh">{{$CTDT->detai->mota_en}}</textarea>
						</div>
					</div>				
				</div>


				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="ten2x">Cấp đề tài</label>
							<select id="capdetai{{$CTDT->id}}" class="form-control">
								@foreach($Capdetai as $CDT)
									<option value="{{$CDT->id}}" @if($CDT->id==$CTDT->detai->capdetai->id) selected @endif>{{$CDT->ten_vi}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="ten2x">Mã số</label>
							<input type="text" id="maso{{$CTDT->id}}" class="form-control" placeholder="nhập mã số đề tài" value="{{$CTDT->detai->maso}}">
						</div>
					</div>				
				</div>
				<div class="row">					
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 top10">
						<div class="form-group">
						    <b class="ten2x">Ngày hợp đồng</b>
						    <div class="input-group date">
						        <input type="text" id="ngaybatdau{{$CTDT->id}}"  class="form-control datepicker" value="{{date('d/m/Y', strtotime($CTDT->detai->ngaybatdau))}}" placeholder="ngày Ký hợp đồng triển khai">
						        <div class="input-group-addon">
						             <span class="glyphicon glyphicon-th"></span>
						        </div>
						    </div>
						</div>
		       		</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 top10">
						<div class="form-group">
						    <b class="ten2x">Ngày nghiệm thu</b>
						    <div class="input-group date">
						        <input type="text" id="ngaynghiemthu{{$CTDT->id}}"  class="form-control datepicker" value="{{date('d/m/Y', strtotime($CTDT->detai->ngaynghiemthu))}}" placeholder="ngày nghiệm thu đề tài">
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
						    <label class="ten2x">Liên kết đến minh chứng</label>
						    <div class="row">
						        <div class="col-lg-12 col-md-12 col-sm-6 col-xs-6">
						            <input type="text" id="minhchung{{$CTDT->id}}" value="{{$CTDT->detai->minhchung}}" class="form-control" placeholder="nhập liên kết đến minh chứng">
						        </div>
						    </div>	
			            </div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="ten2x">Trạng thái</label>
							<select id="trangthai{{$CTDT->id}}" class="form-control">
								<option value="Đang thực hiện" @if($CTDT->detai->trangthai == 'Đang thực hiện') selected @endif>Đang thực hiện</option>
								<option value="Đã nghiệm thu"@if($CTDT->detai->trangthai == 'Đã nghiệm thu') selected @endif>Đã nghiệm thu</option>
								<option value="Dự kiến"@if($CTDT->detai->trangthai == 'Dự kiến') selected @endif>Dự kiến</option>
							</select>
						</div>
					</div>
				</div>
				<div class="row">		
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
						    <label class="ten2x">Số tháng thực hiện</label>
						    <div class="row">
						        <div class="col-lg-12 col-md-12 col-sm-6 col-xs-6">
						            <input type="text" id="thangthuchien{{$CTDT->id}}" value="{{$CTDT->thangthuchien}}" class="form-control">
						        </div>
						    </div>	
			            </div>
					</div>
				</div>							
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success btn-luu2" data-id="{{$CTDT->id}}">Lưu</button>
	        	<button type="button" class="btn btn-danger" data-dismiss="modal">Thoát</button>
			</div>	      
		</div>
	</div>
</div>
@endforeach  

</tbody> 
</table> 
</div>
<button class=" btn btn-success btn2" data-toggle="modal" data-target="#themnghiencuucongbo">Thêm</button>

<div class="modal fade" id="themnghiencuucongbo" role="dialog">
	<div class="modal-dialog modal-lg"> 
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title ten2x">THÊM ĐỀ TÀI NGHIÊN CỨU KHOA HỌC MỚI</h4>
				<p>(* Đồng tác giả chủ nhiệm sẽ thêm đề tài và danh sách thành viên)</p>
			</div>

	<div class="modal-body">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label class="ten2x">Tên đề tài (VI)</label>
					<input type="text" id="ten_vi" class="form-control" placeholder="nhập tên dự án tiếng Việt">
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label class="ten2x">Tên đề tài (EN)</label>
					<input type="text" id="ten_en" class="form-control" placeholder="nhập tên dự án tiếng Anh">
				</div>
			</div>				
		</div>

		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label class="ten2x">Mô tả (VI)</label>
					<textarea class="form-control" id="mota_vi" placeholder="nhập mô tả dự án tiếng Việt"></textarea>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label class="ten2x">Mô tả (EN)</label>
					<textarea class="form-control" id="mota_en" placeholder="nhập mô tả dự án tiếng Anh"></textarea>
				</div>
			</div>				
		</div>


		<div class="row">
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
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label class="ten2x">Mã số</label>
					<input type="text" id="maso" class="form-control" placeholder="nhập mã số đề tài">
				</div>
			</div>				
		</div>
		<div class="row">					
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 top10">
				<div class="form-group">
				    <b class="ten2x">Ngày hợp đồng</b>
				    <div class="input-group date">
				        <input type="text" id="ngaybatdau"  class="form-control datepicker" value="{{date('d/m/Y', strtotime(Carbon\Carbon::now()))}}" placeholder="ngày Ký hợp đồng triển khai">
				        <div class="input-group-addon">
				             <span class="glyphicon glyphicon-th"></span>
				        </div>
				    </div>
				</div>
       		</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 top10">
				<div class="form-group">
				    <b class="ten2x">Ngày nghiệm thu</b>
				    <div class="input-group date">
				        <input type="text" id="ngaynghiemthu"  class="form-control datepicker" value="{{date('d/m/Y', strtotime(Carbon\Carbon::now()))}}" placeholder="ngày nghiệm thu đề tài">
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
				    <label class="ten2x">Upload minh chứng</label>
				    <div class="row">
				        <div class="col-lg-12 col-md-12 col-sm-6 col-xs-6">
				            <input type="text" id="minhchung" class="form-control" placeholder="nhập liên kết đến minh chứng">
				        </div>
				    </div>	
	            </div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label class="ten2x">Trạng thái</label>
					<select id="trangthai" class="form-control">
						<option value="Đang thực hiện">Đang thực hiện</option>
						<option value="Đã nghiệm thu">Đã nghiệm thu</option>
						<option value="Dự kiến">Dự kiến</option>
					</select>
				</div>
			</div>
		</div>			

		<div class="panel panel-default">
			<div class="panel-heading ten2x">Danh sách thành viên</div>
			<div class="panel-body">
			    <label class="ten2x">Số lượng tác giả</label>
			    <input type="text"  id="sotacgia" style="width:150px;" placeholder="nhập số lượng thành viên" class="text-center form-control">			    
			    <div id="contentsoluongtacgia">			    		
			    </div>			    				    	
			</div>
  		</div>			

		<div class="modal-footer">
			<button type="button" class="btn btn-success" id="btn-luu2">Lưu</button>
	        <button type="button" class="btn btn-danger" data-dismiss="modal">Thoát</button>
		</div>
	</div>	      
	</div>
	</div>
</div>

</div> 



<div class="modal fade" id="danhsachtacgia" role="dialog">
	<div class="modal-dialog modal-lg"> 
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h3 class="modal-title ten2x">Cập nhật danh sách tác giả</h3>
					<div id="clickclick">
						<br>
						<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
								<b class="ten2x">Giảng viên</b><br>
								<select class="form-control select2" id="chontacgia" style="width:100%">
									<option value="1080">Chọn tác giả</option>
									<option value="1081">Tác giả không thuộc TVU</option>
									@foreach($ListGiangvien as $GV)
										<option value="{{$GV->id}}">{{$GV->ten}}</option>
									@endforeach
								</select>

							</div>
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
								<b class="ten2x">Trách nhiệm trong đề tài</b><br>
								<select class="form-control" id="chontrachnhiem">
									@foreach($Trachnhiemdetai as $tn)
										<option value="{{$tn->id}}">{{$tn->ten_vi}}</option>
									@endforeach
								</select>
							</div>

							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
								<b class="ten2x">Tháng thực hiện</b><br>
								<input type="text" id="thangthuchienthem" class="form-control">
							</div>
						</div>
						<br>
						<div class="row">					
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<b class="ten2x">Tác giả khác không thuộc TVU</b><br>
								<input type="text" class="form-control" name="" readonly id="tacgiakhac">
							</div>

							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<b class="ten2x">Đơn vị công tác tác giả khác không thuộc TVU</b><br>
								<input type="text" class="form-control" name="" readonly id="donvitacgiakhac">
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<input type="button" class="btn btn-success pull-right" value="Lưu" id="luuthemtacgia" style="margin-top:22px;">
							</div>
						</div>
					</div>
					
			</div>

			<input type="hidden" id="id_detai">

			<div class="modal-body">
												
					<table class="table-bordered table table-hover">
						<thead>
							<tr>
								<th width="5%" class="text-center">STT</th>
								<th width="5%" class="text-center">Xóa</th>
								<th width="50%" class="text-center">Tên</th>
								<th class="text-center">Loại tác giả</th>
								<th width="15%">Tháng thực hiện</th>
							</tr>
						</thead>
						<tbody id="loadbb">							
						</tbody>						
					</table>
				
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
	

$('#btn-luu2').on('click',function(){

    var ten_vi=$('#ten_vi').val();  
    var ten_en=$('#ten_en').val();
    var mota_vi=$('#mota_vi').val();  
    var mota_en=$('#mota_en').val();  
    var maso=$('#maso').val(); 
    var trangthai=$('#trangthai').val();
    var minhchung=$('#minhchung').val();
    var ngaybatdau=$('#ngaybatdau').val();
    var ngaynghiemthu=$('#ngaynghiemthu').val();
    var capdetai=$('#capdetai').val(); 
    var sotacgia=$('#sotacgia').val();
    
    if(isNaN(sotacgia) || sotacgia == ''){
        alert('Vui lòng nhập số lượng tác giả là số'); 
        $('#sotacgia').focus();
        return false; 
    }        	
                	                
    if(ten_vi==''){alert('Vui lòng nhập tên đề tài tiếng Việt');return false;}   

	for(j=1;j<=sotacgia;j++){
        var giatri = $('#thangthuchien'+j).val();
        if(giatri == '' || isNaN(giatri)){
            alert('Vui lòng nhập số tháng thực hiện đúng định dạng (số, viết liền không dấu)');
            $('#thangthuchien'+j).focus();
            return false;
        }
    }

    $(this).prop('disabled', true);
	$(this).html('Đang Xữ Lý');

        var form_data = new FormData();
            form_data.append('ten_vi',ten_vi);
            form_data.append('ten_en',ten_en);
            form_data.append('mota_vi',mota_vi);
            form_data.append('mota_en',mota_en);
            form_data.append('maso',maso); 
            form_data.append('trangthai',trangthai);
            form_data.append('minhchung',minhchung);
            form_data.append('ngaybatdau',ngaybatdau);
            form_data.append('ngaynghiemthu',ngaynghiemthu);
            form_data.append('capdetai',capdetai);
            form_data.append('sotacgia',sotacgia);

            

            for(i=1;i<=sotacgia;i++){
                form_data.append('tacgia'+i,$('#tacgia'+i).val());
                form_data.append('thangthuchien'+i,$('#thangthuchien'+i).val());
                form_data.append('trachnhiem'+i,$('#trachnhiem'+i).val());
            }

            form_data.append('_token',token);


            $.ajax({
				method:'POST',
				url:'set_giangvien/ajax/themdetai',
				data:form_data,
				contentType: false, // The content type used when sending data to the server.
				ache: false, // To unable request pages to be cached
				processData: false,
				success: function(data){                      
				    alert(data);window.location.reload();
				},
				error: function(XMLHttpRequest, textStatus, errorThrown){                     
				    alert("Thao tác không thành công, Vui lòng kiểm tra lại thông tin (đảm bảo danh sách tác giả).");
					$('#sotacgia').focus();

				}			                    

	});	
});	




$('.btn-luu2').on('click',function(){
	var id=$(this).data('id');
	var ten_vi=$('#ten_vi'+id).val();  
    var ten_en=$('#ten_en'+id).val();
    var mota_vi=$('#mota_vi'+id).val();  
    var mota_en=$('#mota_en'+id).val();  
    var maso=$('#maso'+id).val(); 
    var trangthai=$('#trangthai'+id).val();
    var minhchung=$('#minhchung'+id).val();
    var ngaybatdau=$('#ngaybatdau'+id).val();
    var ngaynghiemthu=$('#ngaynghiemthu'+id).val();
    var capdetai=$('#capdetai'+id).val(); 
    var sothangthuchien=$('#thangthuchien'+id).val();              	        	  
            	
                	
    if(ten_vi==''){alert('Vui lòng nhập tên đề tài khoa học tiếng Việt');return false;}  
    if(sothangthuchien==''){alert("Vui lòng nhập số tháng thực hiện vui lòng nhập số nguyên");return false;}
    if(isNaN(sothangthuchien)){alert("Số tháng thực hiện vui lòng nhập số nguyên");return false;}   

    $(this).prop('disabled', true);
	$(this).html('Đang Xữ Lý');               

  	$.ajax({

		method:'POST',
		url:'set_giangvien/ajax/capnhatdetainghiencuu',
		data:{
			ten_vi:ten_vi,
			ten_en:ten_en,
			mota_vi:mota_vi,
			mota_en:mota_en,
			maso:maso,
			trangthai:trangthai,
			minhchung:minhchung,
			ngaybatdau:ngaybatdau,
			ngaynghiemthu:ngaynghiemthu,
			capdetai:capdetai,
			sothangthuchien:sothangthuchien,
			id:id,			        	
			_token:token
			},
			success: function(data){                      
				alert(data);window.location.reload();
			},
			error: function(XMLHttpRequest, textStatus, errorThrown){                     
				alert("Thao tác không thành công, Vui lòng kiểm tra lại thông tin.");

			}
	});

});

  

$(document).on('keyup','#sotacgia',function(){
	var id=$(this).val();		
	$.get("set_giangvien/ajax/loadtextfiledetai/"+id,function(data){
		$('#contentsoluongtacgia').html(data);
	});
});    

$(document).ready(function($) {

	    var engine1 = new Bloodhound({
	        remote: {
	            url: 'set_giangvien/ajax/search/name?value=%QUERY%',
	            wildcard: '%QUERY%'
	        },
	        datumTokenizer: Bloodhound.tokenizers.whitespace('value'),
	        queryTokenizer: Bloodhound.tokenizers.whitespace
	    });

	    var engine2 = new Bloodhound({
	        remote: {
	            url: 'set_giangvien/auto/detai/tendetaivi?value=%QUERY%',
	            wildcard: '%QUERY%'
	        },
	        datumTokenizer: Bloodhound.tokenizers.whitespace('value'),
	        queryTokenizer: Bloodhound.tokenizers.whitespace
	    });

	    var engine3 = new Bloodhound({
	        remote: {
	            url: 'set_giangvien/auto/detai/tendetaien?value=%QUERY%',
	            wildcard: '%QUERY%'
	        },
	        datumTokenizer: Bloodhound.tokenizers.whitespace('value'),
	        queryTokenizer: Bloodhound.tokenizers.whitespace
	    });
  

		$(document).on('mouseenter','.tacgia',function(){

			var id=$(this).data('id');	
		    $("#tacgia"+id).typeahead({
		        hint: false,
		        highlight: true,
		        minLength: 1
		    }, [
		        {
		            source: engine1.ttAdapter(),
		            name: 'ten',
		            display: function(data) {
		                return data.id+' - '+data.maso+' - '+data.ten;
		            },
		            templates: {
		                empty: [
		                    '<div class="header-title">Tên giảng viên</div><div class="list-group search-results-dropdown"><div class="list-group-item">Không có kết quả trùng khớp.</div></div>'
		                ],                                
		                suggestion: function (data) {
		                   return '<p class="list-group-item" style="width:100%"> ID:'+data.id+' - MSGV: '+data.maso+' - Tên: '+data.ten + '</p>';
		                
		                }
		            }
		        }
		    ]);
		});


$(document).on('mouseenter','#ten_vi',function(){				
				
		    $("#ten_vi").typeahead({
		        hint: false,
		        highlight: true,
		        minLength: 1
		    }, [
		        {
		            source: engine2.ttAdapter(),
		            name: 'ten_vi',
		            display: function(data) {
		                return 'Đề tài này đã được thêm trước đó bạn không thể thêm đề tài này ! ! ! Vui lòng kiểm tra lại';
		            },
		            templates: {
		                empty: [
		                    '<div class="header-title">Tên đề tài</div><div class="list-group search-results-dropdown"><div class="list-group-item">Bạn có thể thêm đề tài này.</div></div>'
		                ],                                
		                suggestion: function (data) {
		                   return '<p class="list-group-item" style="width:100%">'+data.ten_vi+'</p>';
		                
		                }
		            }
		        }
		    ]);
	});

$(document).on('mouseenter','#ten_en',function(){				
				
		    $("#ten_en").typeahead({
		        hint: false,
		        highlight: true,
		        minLength: 1
		    }, [
		        {
		            source: engine3.ttAdapter(),
		            name: 'ten_en',
		            display: function(data) {
		                return 'Đề tài này đã được thêm trước đó bạn không thể thêm đề tài này ! ! ! Vui lòng kiểm tra lại';
		            },
		            templates: {
		                empty: [
		                    '<div class="header-title">Tên đề tài</div><div class="list-group search-results-dropdown"><div class="list-group-item">Bạn có thể thêm đề tài này.</div></div>'
		                ],                                
		                suggestion: function (data) {
		                   return '<p class="list-group-item" style="width:100%">'+data.ten_en+'</p>';
		                
		                }
		            }
		        }
		    ]);
	});

});



$(document).on('change','.thangthuchien',function(){
	var id=$(this).data('id');
	var value=$('#thangthuchien'+id).val();
	if(isNaN(value)){ 
		alert('Vui lòng nhập số tháng thực hiện là một số ! ! ! Vui lòng kiểm tra lại'); 
		$('#thangthuchien'+id).val('');
		$('#thangthuchien'+id).focus();

		return false;
	}	
});

$(document).on('click','.xemngay',function(){
	var id_detai=$(this).data('id');
	var tacgia=$(this).data('tacgia');
	var user_id=<?=Session::get('user_id')?>;
	$('.nodelete').css('display','none');
	if(tacgia!=user_id) $('#clickclick').css('display','none');

	$('#id_detai').val(id_detai);	

	$.get("set_giangvien/ajax/loadtacgiadetai/"+id_detai,function(data){
            $('#loadbb').html(data);
        });

	$('#danhsachtacgia').modal();
});

$('.xoadetai').on('click',function(){
       if(!confirm('Xác nhận xóa:')) return false;
        var id=$(this).data('id');
        $.get("set_giangvien/ajax/xoadetai/"+id,function(data){alert(data);window.location.reload();});
});


$(document).on('click','#luuthemtacgia',function(){
		var id_giangvien=$('#chontacgia').val();
		var id_detai=$('#id_detai').val();
		var id_trachnhiemdetai=$('#chontrachnhiem').val();
		var thangthuchien=$('#thangthuchienthem').val();
		var tengv=$('#tacgiakhac').val();
		var diachigv=$('#donvitacgiakhac').val();
		
		
		if(id_giangvien==1080){alert('Vui lòng chọn tác giả cho đề tài này');return false;}
		if(id_giangvien==1081){
			if(diachigv==''){alert('Vui lòng nhập địa chỉ tác giả không thuộc TVU');return false;}
			$.ajax({
					method:'POST',
					url:'set_giangvien/ajax/themtacgiadetaitest',
					data:{
						diachigv:diachigv,
						tengv:tengv,
					    id_giangvien:id_giangvien,
					    id_trachnhiemdetai:id_trachnhiemdetai,
					    id_detai:id_detai,	
					    thangthuchien:thangthuchien,			    
					    _token:token
					},
					    success: function(data){                      
					           alert(data);window.location.reload();
					      },
					    error: function(XMLHttpRequest, textStatus, errorThrown){                     
					            alert("Thao tác không thành công, Vui lòng kiểm tra lại thông tin.");

					      }
			});

		}else{

			 $.ajax({
					method:'POST',
					url:'set_giangvien/ajax/themtacgiadetai',
					data:{
					    id_giangvien:id_giangvien,
					    id_trachnhiemdetai:id_trachnhiemdetai,
					    id_detai:id_detai,	
					    thangthuchien:thangthuchien,			    
					    _token:token
					},
					    success: function(data){                      
					           alert(data);window.location.reload();
					      },
					    error: function(XMLHttpRequest, textStatus, errorThrown){                     
					            alert("Thao tác không thành công, Vui lòng kiểm tra lại thông tin.");

					      }
			});
		}
	});

$(document).on('change','#chontacgia',function(){
	id=$(this).val();	
	if(id==1081){
		$('#tacgiakhac').attr('readonly', false);
		$('#donvitacgiakhac').attr('readonly', false);
        setTimeout(function(){ $('#tacgiakhac').focus(); },600);
	}else{
		$('#tacgiakhac').val('');
		$('#donvitacgiakhac').val('');
		$('#tacgiakhac').attr('readonly', true);
		$('#donvitacgiakhac').attr('readonly', true);
	}
});

$(document).on('click','.xoatacgia',function(){
		var id=$(this).data('id');		
		 $.ajax({
				method:'POST',
				url:'set_giangvien/ajax/xoatacgiadetai',
				data:{
				    id:id,				   			    
				    _token:token
				},
				    success: function(data){                      
				           alert(data);window.location.reload();
				      },
				    error: function(XMLHttpRequest, textStatus, errorThrown){                     
				             alert("Thao tác không thành công, Vui lòng kiểm tra lại thông tin.");

				      }
		});
		
	});
</script>


@endsection