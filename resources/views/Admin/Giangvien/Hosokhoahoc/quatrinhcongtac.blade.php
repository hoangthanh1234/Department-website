@extends('Admin.Giangvien.Hosokhoahoc.Master')
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
<div class="table-responsive">
    <table class="table table-bordered table-striped example2" style="width:100%">
       <thead>                 
            <tr class="bg-top">
                <th width="5%"><input type="checkbox" name="chonhet" id="chonhet" class="text-center"/></th>
                <th width="5%" class="text-center">STT</th>
                <th width="10%" class="text-center">Sửa</th>
                <th  width="10%" class="text-center">Xóa</th>
                <th width="10%" class="text-center">Thời gian</th>               
                <th class="text-center">Tên cơ quan công tác</th>  
                <th width="15%" class="text-center">Địa chỉ</th>
                <th width="15%" class="text-center">Chức vụ</th>    
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
        @foreach($Quatrinhcongtac as $congtac)                                  
        <tr>
            <td  class="text-center">
                <input type="checkbox" name="chon" id="chon{{$congtac->id}}" value="{{$congtac->id}}" class="chon" />
            </td>
            <td align="center">
				<input type="text" value="{{$congtac->stt}}" data-val0="{{$congtac->id}}" data-val1="ht96_quatrinhcongtac"  data_val2="{{$congtac->stt}}"  name="ordering[]" class="tipS smallText update_sttgv" title="Nhập số thứ tự bài viết"  />
				<div id="ajaxloader">
					<img class="numloader" id="ajaxloader" src="ht96_admin/media/images/loader.gif" alt="loader" />
				</div>
			</td>
			<td class="text-center">  
               <i class="fa fa-pencil-square-o fa-2x blue" aria-hidden="true" data-toggle="modal" data-target="#capnhatcongtac{{$congtac->id}}"></i>
            </td> 

            <td class="text-center" title="xóa bài viết">                                   
               <i class="fa fa-trash fa-2x red xoacongtac" aria-hidden="true"  data-id="{{$congtac->id}}"></i>
            </td>
			<td class="text-center">{{date('Y', strtotime($congtac->ngaybatdau))}} &nbsp; - &nbsp; {{date('Y', strtotime($congtac->ngayketthuc))}}</td>
			<td>{{$congtac->tencoso_vi}}</td>
			<td>{{$congtac->diachicoso_vi}}</td>
			<td class="text-center">{{$congtac->chucvu->ten_vi}}</td>
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
												<label class="ten2x">Địa chỉ cơ quan (VI)</label>
												<input type="text" id="diachicoso_vi{{$congtac->id}}" value="{{$congtac->diachicoso_vi}}"  class="form-control" placeholder="nhập địa chỉ cơ quan bằng tiếng Việt">
											</div>
										</div>

										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
											<div class="form-group">
												<label class="ten2x">Địa chỉ cơ quan (EN)</label>
												<input type="text" id="diachicoso_en{{$congtac->id}}" value="{{$congtac->diachicoso_en}}"  class="form-control" placeholder="nhập địa chỉ cơ quan bằng tiếng Anh">
											</div>
										</div>

											
									</div>

									<div class="row">
										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
											<div class="form-group">
												<label class="ten2x">Số điện thoại cơ quan</label>
												<input type="text" id="sodienthoai{{$congtac->id}}" value="{{$congtac->sdtcoso}}"  class="form-control" placeholder="nhập số điện thoại cơ quan">
											</div>
										</div>

										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
											<div class="form-group">
												<label class="ten2x">Chức vụ</label>
												<select class="form-control" id="chucvu{{$congtac->id}}">
													@foreach($Chucvu as $CV)
														<option value="{{$CV->id}}">{{$CV->ten_vi}}</option>
													@endforeach
												</select>					
												
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
														    <input type="text" value="{{date('d/m/Y', strtotime($congtac->ngaybatdau))}}"   class="form-control pull-right datepicker" placeholder="Ngày bắt đầu làm việc" id="tungay{{$congtac->id}}" >
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
														    <input type="text" value="{{date('d/m/Y', strtotime($congtac->ngayketthuc))}}"  class="form-control pull-right datepicker"  placeholder="Ngày kết thúc làm việc" id="denngay{{$congtac->id}}">
														</div>                   
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
						<button type="button" class="btn btn-success btn-luu" data-id="{{$congtac->id}}">Lưu</button>
	        			<button type="button" class="btn btn-danger" data-dismiss="modal">Thoát</button>
					</div>	
	
							</div>	      
						</div>
					</div> 
                @endforeach                            
            </tbody> 
        </table> 
    </div>
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
							<label class="ten2x">Địa chỉ cơ quan (VI)</label>
							<input type="text" id="diachicoso_vi"  class="form-control" placeholder="nhập địa chỉ cơ quan tiếng Việt">
					    </div>
					</div>

					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="ten2x">Địa chỉ cơ quan (EN)</label>
							<input type="text" id="diachicoso_en"  class="form-control" placeholder="nhập địa chỉ cơ quan tiếng Anh">
					    </div>
					</div>					
			</div>

			<div class="row">
				
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label class="ten2x">Số điện thoại cơ quan</label>
						<input type="text" id="sodienthoai"  class="form-control" placeholder="nhập số điện thoại cơ quan">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label class="ten2x">Chức vụ</label>
						<select class="form-control" id="chucvu">
							@foreach($Chucvu as $CV)
								<option value="{{$CV->id}}">{{$CV->ten_vi}}</option>
							@endforeach
						</select>					
						
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
							    <input type="text"   class="form-control pull-right datepicker" value="{{date('d/m/Y', strtotime(Carbon\Carbon::now()))}}" placeholder="Ngày bắt đầu làm việc" id="tungay" >
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
							    <input type="text"  class="form-control pull-right datepicker" value="{{date('d/m/Y', strtotime(Carbon\Carbon::now()))}}"  placeholder="Ngày kết thúc làm việc" id="denngay">
							</div>                   
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
				<button type="button" class="btn btn-success" id="btn-luu">Lưu</button>
	        	<button type="button" class="btn btn-danger" data-dismiss="modal">Thoát</button>
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
                	var diachicoso_vi=$('#diachicoso_vi').val();
                	var diachicoso_en=$('#diachicoso_en').val();
                	var sodienthoai=$('#sodienthoai').val();                	
                	var tungay=$('#tungay').val();
                	var denngay=$('#denngay').val();
                	var chucvu=$('#chucvu').val();                	
                	var ghichu=$('#ghichu').val(); 
                	

                 	if(tencoso_vi==''){alert('Vui lòng nhập tên cơ sở tiếng việt');return false;}
                	if(tencoso_en==''){alert('Vui lòng nhập tên cơ sở tiếng anh');return false;}
                	$(this).prop('disabled', true);
					$(this).html('Đang Xữ Lý');
                

                $.ajax({
				        method:'POST',
				        url:'set_giangvien/ajax/themcongtac',
				        data:{
				        	tencoso_vi:tencoso_vi,
				        	tencoso_en:tencoso_en,
				        	diachicoso_vi:diachicoso_vi,
				        	diachicoso_en:diachicoso_en,
				        	sodienthoai:sodienthoai,
				        	tungay:tungay,
				        	denngay:denngay,
				        	chucvu:chucvu,				        	
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


$('.btn-luu').on('click',function(){

    var id=$(this).data('id');                 	
    var tencoso_vi=$('#tencoso_vi'+id).val();
    var tencoso_en=$('#tencoso_en'+id).val();
    var diachicoso_vi=$('#diachicoso_vi'+id).val();
    var diachicoso_en=$('#diachicoso_en'+id).val();
    var sodienthoai=$('#sodienthoai'+id).val();                	
    var tungay=$('#tungay'+id).val();
    var denngay=$('#denngay'+id).val();
    var chucvu=$('#chucvu'+id).val();    
    var ghichu=$('#ghichu'+id).val(); 
   
   	$(this).prop('disabled', true);
	$(this).html('Đang Xữ Lý');

     $.ajax({

				method:'POST',
				url:'set_giangvien/ajax/capnhatcongtac',
				data:{
				        tencoso_vi:tencoso_vi,
				        tencoso_en:tencoso_en,
				        diachicoso_vi:diachicoso_vi,
				        diachicoso_en:diachicoso_en,
				        sodienthoai:sodienthoai,
				        tungay:tungay,
				        denngay:denngay,
				        chucvu:chucvu,				       
				        ghichu:ghichu,				       
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
        $.get("set_giangvien/ajax/xoacongtac/"+id,function(data){alert(data);window.location.reload();});
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
    if (hoi==true){$.get("set_giangvien/ajax/xoacongtachet/"+listid,function(data){alert(data);window.location.reload();});} 
});

$(document).ready(function($) {

	var engine1 = new Bloodhound({
	    remote: {
	        url: 'set_giangvien/auto/quatrinhcongtac/tencosovi?value=%QUERY%',
	        wildcard: '%QUERY%'
	    },
	        datumTokenizer: Bloodhound.tokenizers.whitespace('value'),
	        queryTokenizer: Bloodhound.tokenizers.whitespace
	});

	var engine2 = new Bloodhound({
	    remote: {
	        url: 'set_giangvien/auto/quatrinhcongtac/tencosoen?value=%QUERY%',
	        wildcard: '%QUERY%'
	    },
	        datumTokenizer: Bloodhound.tokenizers.whitespace('value'),
	        queryTokenizer: Bloodhound.tokenizers.whitespace
	});

	var engine3 = new Bloodhound({
	    remote: {
	        url: 'set_giangvien/auto/quatrinhcongtac/diachicosovi?value=%QUERY%',
	        wildcard: '%QUERY%'
	    },
	        datumTokenizer: Bloodhound.tokenizers.whitespace('value'),
	        queryTokenizer: Bloodhound.tokenizers.whitespace
	});

	var engine4 = new Bloodhound({
	    remote: {
	        url: 'set_giangvien/auto/quatrinhcongtac/diachicosoen?value=%QUERY%',
	        wildcard: '%QUERY%'
	    },
	        datumTokenizer: Bloodhound.tokenizers.whitespace('value'),
	        queryTokenizer: Bloodhound.tokenizers.whitespace
	});

$(document).on('mouseenter','#tencoso_vi',function(){
	$("#tencoso_vi").typeahead({
		hint: false,
		highlight: true,
		minLength: 1
	}, [
		    {
		        source: engine1.ttAdapter(),
		        name: 'tencoso_vi',
		        display: function(data){		        	        	
		           return data.tencoso_vi;
		        },
		        templates: {
		        empty: [
		            '<div class="header-title">Tên cơ sở</div><div class="list-group search-results-dropdown"><div class="list-group-item">Bạn có thể thêm thông tin này.</div></div>'
		        ],                                
		        suggestion: function (data) {
		             return '<p class="list-group-item" style="width:100%">'+data.tencoso_vi+'</p>';
		                
		        }
		        }
		    }
		]);
});

$(document).on('mouseenter','#tencoso_en',function(){
	$("#tencoso_en").typeahead({
		hint: false,
		highlight: true,
		minLength: 1
	}, [
		    {
		        source: engine2.ttAdapter(),
		        name: 'tencoso_en',
		        display: function(data){		        	        	
		           return data.tencoso_en;
		        },
		        templates: {
		        empty: [
		            '<div class="header-title">Tên cơ sở</div><div class="list-group search-results-dropdown"><div class="list-group-item">Bạn có thể thêm thông tin này.</div></div>'
		        ],                                
		        suggestion: function (data) {
		             return '<p class="list-group-item" style="width:100%">'+data.tencoso_en+'</p>';
		                
		        }
		        }
		    }
		]);
});

$(document).on('mouseenter','#diachicoso_vi',function(){
	$("#diachicoso_vi").typeahead({
		hint: false,
		highlight: true,
		minLength: 1
	}, [
		    {
		        source: engine3.ttAdapter(),
		        name: 'diachicoso_vi',
		        display: function(data){		        	        	
		           return data.diachicoso_vi;
		        },
		        templates: {
		        empty: [
		            '<div class="header-title">Tên cơ sở</div><div class="list-group search-results-dropdown"><div class="list-group-item">Bạn có thể thêm thông tin này.</div></div>'
		        ],                                
		        suggestion: function (data) {
		             return '<p class="list-group-item" style="width:100%">'+data.diachicoso_vi+'</p>';
		                
		        }
		        }
		    }
		]);
});

$(document).on('mouseenter','#diachicoso_en',function(){
	$("#diachicoso_en").typeahead({
		hint: false,
		highlight: true,
		minLength: 1
	}, [
		    {
		        source: engine4.ttAdapter(),
		        name: 'diachicoso_en',
		        display: function(data){		        	        	
		           return data.diachicoso_en;
		        },
		        templates: {
		        empty: [
		            '<div class="header-title">Tên cơ sở</div><div class="list-group search-results-dropdown"><div class="list-group-item">Bạn có thể thêm thông tin này.</div></div>'
		        ],                                
		        suggestion: function (data) {
		             return '<p class="list-group-item" style="width:100%">'+data.diachicoso_en+'</p>';
		                
		        }
		        }
		    }
		]);
});

});

</script>
@endsection