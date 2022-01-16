@extends('Admin.Giangvien.Hosokhoahoc.Master')

@section('Tabvalue')
 <div role="tabpanel" class="tab-pane  @if ($tab==8) active @endif" id="profile">	  

	<p class="ten2x" style="font-size:20px;margin-top:30px;margin-bottom:30px;">Ngoại ngữ</p>

  <div class="table-responsive">
 <table class="table table-bordered table-striped example2" style="width:100%">
    <thead>                 
        <tr class="bg-top">
            <th width="2%" class="text-center"><input type="checkbox" name="chonhetcb" id="chonhetcb" /></th>
            <th width="3%" class="text-center">Sửa</th>
            <th  width="3%" class="text-center">Xóa</th>
            <th width="20%" class="text-center">Tên ngoại ngữ</th> 
            <th width="20%" class="text-center">Mức độ sử dụng</th>
        </tr>
    </thead> 

    <tfoot>
        <tr>                               
            <th></th>
            <th></th>
            <th></th>
            <th></th> 
           <th></th>
       </tr>                                  	
    </tfoot> 

<tbody>   
@foreach($Ngoaingu as $nn)                                  
   <tr>
       <td class="text-center">
           <input type="checkbox" name="choncb" id="chon{{$nn->id}}" value="{{$nn->id}}" class="chon" />
       </td>	
        <td class="text-center">
       		<i class="fa fa-pencil-square-o fa-2x blue" aria-hidden="true" data-toggle="modal" data-target="#capnhathuongdansaudaihoc{{$nn->id}}"></i>
        </td> 

        <td class="text-center" title="xóa bài viết">    
            <i class="fa fa-trash fa-2x red xoamongiangday" aria-hidden="true" data-id="{{$nn->id}}"></i>
        </td>
        <td>{{$nn->ten_vi}}</td>							
		<td>{{$nn->thongthao_vi}}</td>
    </tr>  


<div class="modal fade" id="capnhathuongdansaudaihoc{{$nn->id}}" role="dialog">
	<div class="modal-dialog modal-lg"> 
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title ten2x">CẬP NGOẠI NGỮ SỐ: {{$nn->id}}</h4>
			</div>

		<div class="modal-body">

		<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label class="ten2x">Tên Ngoại ngữ (VI)</label>
						<input type="text" id="ten_vi{{$nn->id}}" value="{{$nn->ten_vi}}" class="form-control" placeholder="Tên môn bằng tiếng Việt">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label class="ten2x">Tên Ngoại ngữ (EN)</label>
						<input type="text" id="ten_en{{$nn->id}}" value="{{$nn->ten_en}}" class="form-control" placeholder="Tên môn bằng tiếng Anh">
					</div>
				</div>
				
			</div>

			<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="ten2x">Mức độ (VI)</label>
							<input type="text" id="thongthao_vi{{$nn->id}}" value="{{$nn->thongthao_vi}}"  class="form-control" placeholder="Nhập mức độ thông thạo bằng tiếng Việt">
					    </div>
					</div>

					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="ten2x">Mức độ (EN)</label>
							<input type="text" id="thongthao_en{{$nn->id}}" value="{{$nn->thongthao_en}}"  class="form-control" placeholder="Nhập mức độ thông thạo tiếng Anh">
					    </div>
					</div>					
			</div>

									
				
		<div class="modal-footer">
			<button type="button" class="btn btn-success btn-luu" data-id="{{$nn->id}}">Lưu</button>
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
				<h4 class="modal-title ten2x">THÊM Ngoại ngữ mới</h4>
			</div>

	<div class="modal-body">

			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label class="ten2x">Tên ngoại ngữ (VI)</label>
						<input type="text" id="ten_vi" class="form-control" placeholder="Tên ngoại ngữ bằng tiếng Việt">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label class="ten2x">Tên ngoại ngữ (EN)</label>
						<input type="text" id="ten_en" class="form-control" placeholder="Tên ngoại ngữ bằng tiếng Anh">
					</div>
				</div>				
			</div>

			<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="ten2x">Mức độ (VI)</label>
							<input type="text" id="thongthao_vi"   class="form-control" placeholder="Nhập mức độ thông thạo tiếng Việt">
					    </div>
					</div>

					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="ten2x">Mức độ (EN)</label>
							<input type="text" id="thongthao_en"   class="form-control" placeholder="Nhập mức độ thông thạo bằng tiếng Anh">
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
                	var thongthao_vi=$('#thongthao_vi').val();
                	var thongthao_en=$('#thongthao_en').val();  
                	if(ten_vi == ''){alert('Vui lòng nhập tên ngoại ngữ bằng tiếng Việt');return false;}
                	$(this).prop('disabled', true);
					$(this).html('Đang Xữ Lý');

				      $.ajax({
				        method:'POST',
				        url:'set_giangvien/ajax/themngoaingu',
				        data:{
				        	ten_vi:ten_vi,
				        	ten_en:ten_en,
				        	thongthao_vi:thongthao_vi,
				        	thongthao_en:thongthao_en,			        	
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
    var thongthao_vi=$('#thongthao_vi'+id).val();
    var thongthao_en=$('#thongthao_en'+id).val();     	  
                  	             	        	  
    if(ten_vi == ''){alert('Vui lòng nhập tên ngoại ngữ bằng tiếng Việt');return false;}
    $(this).prop('disabled', true);
	$(this).html('Đang Xữ Lý');                    

    $.ajax({
			method:'POST',
			url:'set_giangvien/ajax/capnhatngoaingu',
			data:{
				    ten_vi:ten_vi,
				    ten_en:ten_en,
				    thongthao_vi:thongthao_vi,
				    thongthao_en:thongthao_en,	
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
        $.get("set_giangvien/ajax/xoangoaingu/"+id,function(data){alert(data);window.location.reload();});
});


$('#chonhetcb').on('click',function(){
    var status=this.checked;
    $("input[name='choncb']").each(function(){this.checked=status;})
});

$('#xoahetcb').on('click',function(){
   var listid="";
    $("input[name='choncb']").each(function(){
        if (this.checked) listid = listid+","+this.value;
    });
    listid=listid.substr(1);  // alert(listid);
        if (listid=="") { alert("Bạn chưa chọn mục nào"); return false;}
            hoi= confirm("Bạn có chắc chắn muốn xóa?");
    if (hoi==true){
        $.get("set_giangvien/ajax/xoangoainguhet/"+listid,function(data){
            alert(data);
           window.location.reload();
        });
    } 
});



</script>


@endsection