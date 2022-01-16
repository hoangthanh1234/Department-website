@extends('Admin.Giangvien.Hosokhoahoc.Master')

@section('Tabvalue')
 <div role="tabpanel" class="tab-pane  @if ($tab==6) active @endif" id="profile">	  

<p class="ten2x" style="font-size:20px;margin-top:30px;margin-bottom:30px;">Môn giảng dạy</p>

 <div class="table-responsive">
 <table class="table table-bordered table-striped example2" style="width:100%">
    <thead>                 
        <tr class="bg-top">
            <th width="5%"><input type="checkbox" name="chonhetcb" id="chonhetcb" class="text-center" /></th>
            <th width="8%"  class="text-center">Sửa</th>
            <th width="8%" class="text-center">Xóa</th>
            <th width="20%" class="text-center">Tên Môn</th> 
            <th width="10%" class="text-center">Năm bắt đầu</th> 
            <th width="10%" class="text-center">Đối tượng</th>
            <th width="20%" class="text-center">Nơi dạy</th> 
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
        </tr>                                  	
    </tfoot> 

    <tbody>   
	@foreach($Mongiangday as $MGD)                                  
	   <tr>
	       <td  class="text-center">
	           <input type="checkbox" name="choncb" id="chon{{$MGD->id}}" value="{{$MGD->id}}" class="chon" />
	       </td>	
	       <td class="text-center"> 
	       		<i class="fa fa-pencil-square-o fa-2x blue" aria-hidden="true" data-toggle="modal" data-target="#capnhathuongdansaudaihoc{{$MGD->id}}"></i>
	        </td> 

	        <td class="text-center" title="xóa bài viết">
	            <i class="fa fa-trash fa-2x red xoamongiangday" aria-hidden="true" data-id="{{$MGD->id}}"></i>
	        </td>
	        <td>{{$MGD->ten_vi}}</td>							
			<td class="text-center">{{$MGD->nambatdau}}</td>								
			<td class="text-center">{{$MGD->doituong_vi}}</td>	
			<td class="text-center">{{$MGD->noiday_vi}}</td>
	    </tr>  


<div class="modal fade" id="capnhathuongdansaudaihoc{{$MGD->id}}" role="dialog">
	<div class="modal-dialog modal-lg"> 
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title ten2x">CẬP NHẬT HƯỚNG DẪN SAU ĐẠI HỌC SỐ: {{$MGD->id}}</h4>
			</div>

		<div class="modal-body">

		<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label class="ten2x">Tên môn (VI)</label>
						<input type="text" id="ten_vi{{$MGD->id}}" value="{{$MGD->ten_vi}}" class="form-control" placeholder=" nhập tên môn bằng tiếng Việt">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label class="ten2x">Tên môn (EN)</label>
						<input type="text" id="ten_en{{$MGD->id}}" value="{{$MGD->ten_en}}" class="form-control" placeholder=" nhập tên môn bằng tiếng Anh">
					</div>
				</div>
				
			</div>

			<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="ten2x">Đối tượng giảng dạy (VI)</label>
							<input type="text" id="doituong_vi{{$MGD->id}}" value="{{$MGD->doituong_vi}}"  class="form-control" placeholder="nhập tên đối tượng giảng dạy bằng tiếng Việt">
					    </div>
					</div>

					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="ten2x">Đối tượng giảng dạy (EN)</label>
							<input type="text" id="doituong_en{{$MGD->id}}" value="{{$MGD->doituong_en}}"  class="form-control" placeholder="nhập tên đối tượng giảng dạy bằng tiếng Anh">
					    </div>
					</div>					
			</div>

			<div class="row">
				
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="ten2x">Nơi giảng dạy (VI)</label>
							<input type="text" id="noiday_vi{{$MGD->id}}" value="{{$MGD->noiday_vi}}"  class="form-control" placeholder="nhập  nơi giảng dạy bằng tiếng Việt">
					    </div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="ten2x">Nơi giảng dạy (EN)</label>
							<input type="text" id="noiday_en{{$MGD->id}}" value="{{$MGD->noiday_en}}"  class="form-control" placeholder="nhập  nơi giảng dạy bằng tiếng Anh">
					    </div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label class="ten2x">Năm bắt đầu</label>
						<input type="text" id="nambatdau{{$MGD->id}}" value="{{$MGD->nambatdau}}" class="form-control" placeholder=" nhập năm bắt đầu">
					</div>
				</div>
			</div>								
				
		<div class="modal-footer">
			<button type="button" class="btn btn-success btn-luu" data-id="{{$MGD->id}}">Lưu</button>
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
				<h4 class="modal-title ten2x">THÊM MÔN GIẢNG DẠY</h4>
			</div>

	<div class="modal-body">

			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label class="ten2x">Tên môn (VI)</label>
						<input type="text" id="ten_vi" class="form-control" placeholder="nhập tên môn bằng tiếng Việt">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label class="ten2x">Tên môn (EN)</label>
						<input type="text" id="ten_en" class="form-control" placeholder="nhập tên môn bằng tiếng Anh">
					</div>
				</div>				
			</div>

			<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="ten2x">Đối tượng giảng dạy (VI)</label>
							<input type="text" id="doituong_vi"   class="form-control" placeholder="nhập tên đối tượng giảng dạy bằng tiếng Việt">
					    </div>
					</div>

					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="ten2x">Đối tượng giảng dạy (EN)</label>
							<input type="text" id="doituong_en"   class="form-control" placeholder="nhập tên đối tượng giảng dạy bằng tiếng Anh">
					    </div>
					</div>
					
			</div>

			<div class="row">
				
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="ten2x">Nơi giảng dạy (VI)</label>
							<input type="text" id="noiday_vi"   class="form-control" placeholder="nhập tên nơi giảng dạy bằng tiếng Việt">
					    </div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="ten2x">Nơi giảng dạy (EN)</label>
							<input type="text" id="noiday_en"   class="form-control" placeholder="nhập tên nơi giảng dạy bằng tiếng Anh">
					    </div>
				</div>

			</div>

			<div class="row">
				
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label class="ten2x">Năm bắt đầu</label>
						<input type="text" id="nambatdau"  class="form-control" placeholder="Năm bắt đầu">
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

                	var ten_vi=$('#ten_vi').val();  
                	var ten_en=$('#ten_en').val();              
                	var nambatdau=$('#nambatdau').val();
                	var doituong_vi=$('#doituong_vi').val();
                	var doituong_en=$('#doituong_en').val();  
                	var noiday_vi=$('#noiday_vi').val(); 
                	var noiday_en=$('#noiday_en').val();   

                	if(ten_vi==''){alert('Vui lòng nhập tên môn giảng dạy bằng tiếng Việt');return false;}  	  
                	
                	$(this).prop('disabled', true);
	   				$(this).html('Đang Xữ Lý');

				      $.ajax({
				        method:'POST',
				        url:'set_giangvien/ajax/themmongiangday',
				        data:{
				        	ten_vi:ten_vi,
				        	ten_en:ten_en,
				        	nambatdau:nambatdau,
				        	doituong_vi:doituong_vi,
				        	doituong_en:doituong_en,
				        	noiday_vi:noiday_vi,
				        	noiday_en:noiday_en,				        					        			        	
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
	var ten_vi=$('#ten_vi'+id).val(); 
	var ten_en=$('#ten_en'+id).val();                
    var nambatdau=$('#nambatdau'+id).val();
    var doituong_vi=$('#doituong_vi'+id).val(); 
    var doituong_en=$('#doituong_en'+id).val();  
    var noiday_vi=$('#noiday_vi'+id).val();  
    var noiday_en=$('#noiday_en'+id).val();  

    if(ten_vi==''){alert('Vui lòng nhập tên môn giảng dạy bằng tiếng Việt');return false;}   
                          
    $(this).prop('disabled', true);
	$(this).html('Đang Xữ Lý');
	
  				$.ajax({
				        method:'POST',
				        url:'set_giangvien/ajax/capnhatmongiangday',
				        data:{
				        	ten_vi:ten_vi,
				        	ten_en:ten_en,
				        	nambatdau:nambatdau,
				        	doituong_vi:doituong_vi,
				        	doituong_en:doituong_en,
				        	noiday_vi:noiday_vi,
				        	noiday_en:noiday_en,				        	
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


		$('.xoamongiangday').on('click',function(){
                 	if(!confirm('Xác nhận xóa:')) return false;
                 	var id=$(this).data('id');
                 	$.get("set_giangvien/ajax/xoamongiangday/"+id,function(data){alert(data);window.location.reload();});
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
                	$.get("set_giangvien/ajax/xoamongiangdayhet/"+listid,function(data){
            			alert(data);
            			window.location.reload();
        			});
                } 
            });

$(document).ready(function($) {

	var engine1 = new Bloodhound({
	    remote: {
	        url: 'set_giangvien/auto/mongiangday/tenmonvi?value=%QUERY%',
	        wildcard: '%QUERY%'
	    },
	        datumTokenizer: Bloodhound.tokenizers.whitespace('value'),
	        queryTokenizer: Bloodhound.tokenizers.whitespace
	});

	var engine2 = new Bloodhound({
	    remote: {
	        url: 'set_giangvien/auto/mongiangday/tenmonen?value=%QUERY%',
	        wildcard: '%QUERY%'
	    },
	        datumTokenizer: Bloodhound.tokenizers.whitespace('value'),
	        queryTokenizer: Bloodhound.tokenizers.whitespace
	});

	var engine3 = new Bloodhound({
	    remote: {
	        url: 'set_giangvien/auto/mongiangday/doituongvi?value=%QUERY%',
	        wildcard: '%QUERY%'
	    },
	        datumTokenizer: Bloodhound.tokenizers.whitespace('value'),
	        queryTokenizer: Bloodhound.tokenizers.whitespace
	});

	var engine4 = new Bloodhound({
	    remote: {
	        url: 'set_giangvien/auto/mongiangday/doituongen?value=%QUERY%',
	        wildcard: '%QUERY%'
	    },
	        datumTokenizer: Bloodhound.tokenizers.whitespace('value'),
	        queryTokenizer: Bloodhound.tokenizers.whitespace
	});

	var engine5 = new Bloodhound({
	    remote: {
	        url: 'set_giangvien/auto/mongiangday/noidayvi?value=%QUERY%',
	        wildcard: '%QUERY%'
	    },
	        datumTokenizer: Bloodhound.tokenizers.whitespace('value'),
	        queryTokenizer: Bloodhound.tokenizers.whitespace
	});

	var engine6 = new Bloodhound({
	    remote: {
	        url: 'set_giangvien/auto/mongiangday/noidayen?value=%QUERY%',
	        wildcard: '%QUERY%'
	    },
	        datumTokenizer: Bloodhound.tokenizers.whitespace('value'),
	        queryTokenizer: Bloodhound.tokenizers.whitespace
	});

$(document).on('mouseenter','#ten_vi',function(){
	$("#ten_vi").typeahead({
		hint: false,
		highlight: true,
		minLength: 1
	}, [
		    {
		        source: engine1.ttAdapter(),
		        name: 'ten_vi',
		        display: function(data){		        	        	
		           return data.ten_vi;
		        },
		        templates: {
		        empty: [
		            '<div class="header-title">Tên cơ sở</div><div class="list-group search-results-dropdown"><div class="list-group-item">Bạn có thể thêm thông tin này.</div></div>'
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
		        source: engine2.ttAdapter(),
		        name: 'ten_en',
		        display: function(data){		        	        	
		           return data.ten_en;
		        },
		        templates: {
		        empty: [
		            '<div class="header-title">Tên cơ sở</div><div class="list-group search-results-dropdown"><div class="list-group-item">Bạn có thể thêm thông tin này.</div></div>'
		        ],                                
		        suggestion: function (data) {
		             return '<p class="list-group-item" style="width:100%">'+data.ten_en+'</p>';
		                
		        }
		        }
		    }
		]);
});

$(document).on('mouseenter','#doituong_vi',function(){
	$("#doituong_vi").typeahead({
		hint: false,
		highlight: true,
		minLength: 1
	}, [
		    {
		        source: engine3.ttAdapter(),
		        name: 'doituong_vi',
		        display: function(data){		        	        	
		           return data.doituong_vi;
		        },
		        templates: {
		        empty: [
		            '<div class="header-title">Tên cơ sở</div><div class="list-group search-results-dropdown"><div class="list-group-item">Bạn có thể thêm thông tin này.</div></div>'
		        ],                                
		        suggestion: function (data) {
		             return '<p class="list-group-item" style="width:100%">'+data.doituong_vi+'</p>';
		                
		        }
		        }
		    }
		]);
});

$(document).on('mouseenter','#doituong_en',function(){
	$("#doituong_en").typeahead({
		hint: false,
		highlight: true,
		minLength: 1
	}, [
		    {
		        source: engine4.ttAdapter(),
		        name: 'doituong_en',
		        display: function(data){		        	        	
		           return data.doituong_en;
		        },
		        templates: {
		        empty: [
		            '<div class="header-title">Tên cơ sở</div><div class="list-group search-results-dropdown"><div class="list-group-item">Bạn có thể thêm thông tin này.</div></div>'
		        ],                                
		        suggestion: function (data) {
		             return '<p class="list-group-item" style="width:100%">'+data.doituong_en+'</p>';
		                
		        }
		        }
		    }
		]);
});

$(document).on('mouseenter','#noiday_vi',function(){
	$("#noiday_vi").typeahead({
		hint: false,
		highlight: true,
		minLength: 1
	}, [
		    {
		        source: engine5.ttAdapter(),
		        name: 'noiday_vi',
		        display: function(data){		        	        	
		           return data.noiday_vi;
		        },
		        templates: {
		        empty: [
		            '<div class="header-title">Tên cơ sở</div><div class="list-group search-results-dropdown"><div class="list-group-item">Bạn có thể thêm thông tin này.</div></div>'
		        ],                                
		        suggestion: function (data) {
		             return '<p class="list-group-item" style="width:100%">'+data.noiday_vi+'</p>';
		                
		        }
		        }
		    }
		]);
});

$(document).on('mouseenter','#noiday_en',function(){
	$("#noiday_en").typeahead({
		hint: false,
		highlight: true,
		minLength: 1
	}, [
		    {
		        source: engine6.ttAdapter(),
		        name: 'noiday_en',
		        display: function(data){		        	        	
		           return data.noiday_en;
		        },
		        templates: {
		        empty: [
		            '<div class="header-title">Tên cơ sở</div><div class="list-group search-results-dropdown"><div class="list-group-item">Bạn có thể thêm thông tin này.</div></div>'
		        ],                                
		        suggestion: function (data) {
		             return '<p class="list-group-item" style="width:100%">'+data.noiday_en+'</p>';
		                
		        }
		        }
		    }
		]);
});

       
});
</script>


@endsection