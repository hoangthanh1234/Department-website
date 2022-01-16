@extends('Admin.Khoa.Hosokhoahoc.Master')

@section('Tabvalue')
 <div role="tabpanel" class="tab-pane  @if ($tab==6) active @endif" id="profile">	  

	<p class="ten2x" style="font-size:20px;margin-top:30px;margin-bottom:30px;">Môn giảng dạy</p>

  <div class="table-responsive">
 <table class="table table-bordered table-striped example2" style="width:100%">
                         <thead>                 
                            <tr class="bg-top">
                                <th width="5%"><input type="checkbox" name="chonhetcb" id="chonhetcb" /></th>
                                <th width="8%"  class="text-center">Sửa</th>
                                <th width="10%" class="text-center">Xóa</th>
                                <th width="20%" class="text-center">Tên Môn</th> 
                                <th width="10%" class="text-center">Năm bắt đầu</th> 
                                <th width="15%" class="text-center">Đối tượng</th>
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
@foreach($Giangvien->mongiangday as $MGD)                                  
   <tr>
       <td class="text-center">
           <input type="checkbox" name="choncb" id="chon{{$MGD->id}}" value="{{$MGD->id}}" class="chon" />
       </td>	
       <td class="text-center">                                                   
       		<i class="fa fa-2x fa-edit blue" data-toggle="modal" data-target="#capnhathuongdansaudaihoc{{$MGD->id}}"></i>
        </td> 
        <td class="text-center" title="xóa bài viết">   
            <i class="fa fa-times text-dange fa-2x xoamongiangday red" data-id="{{$MGD->id}}"></i>
        </td>
        <td>{{$MGD->ten_vi}}</td>							
		<td class="text-center">{{$MGD->nambatdau}}</td>								
		<td class="text-center">{{$MGD->doituong_vi}}</td>	
		<td>{{$MGD->noiday_vi}}</td>
    </tr>  


<div class="modal fade" id="capnhathuongdansaudaihoc{{$MGD->id}}" role="dialog">
	<div class="modal-dialog modal-lg"> 
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title ten2x">CẬP NHẬT HƯỚNG DẪN SAU ĐẠI HỌC</h4>
			</div>

		<div class="modal-body">

		<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label class="ten2x">Tên môn (VI)</label>
						<input type="text" id="ten_vi{{$MGD->id}}" value="{{$MGD->ten_vi}}" class="form-control" placeholder="Tên môn bằng tiếng Việt">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label class="ten2x">Tên môn (EN)</label>
						<input type="text" id="ten_en{{$MGD->id}}" value="{{$MGD->ten_en}}" class="form-control" placeholder="Tên môn bằng tiếng Anh">
					</div>
				</div>
				
			</div>

			<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="ten2x">Đối tượng giảng dạy (VI)</label>
							<input type="text" id="doituong_vi{{$MGD->id}}" value="{{$MGD->doituong_vi}}"  class="form-control" placeholder="Nhập tên đối tượng giảng dạy bằng tiếng Việt">
					    </div>
					</div>

					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="ten2x">Đối tượng giảng dạy (EN)</label>
							<input type="text" id="doituong_en{{$MGD->id}}" value="{{$MGD->doituong_en}}"  class="form-control" placeholder="Nhập tên đối tượng giảng dạy bằng tiếng Anh">
					    </div>
					</div>					
			</div>

			<div class="row">
				
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="ten2x">Nơi giảng dạy (VI)</label>
							<input type="text" id="noiday_vi{{$MGD->id}}" value="{{$MGD->noiday_vi}}"  class="form-control" placeholder="Nhập  nơi giảng dạy bằng tiếng Việt">
					    </div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="ten2x">Nơi giảng dạy (EN)</label>
							<input type="text" id="noiday_en{{$MGD->id}}" value="{{$MGD->noiday_en}}"  class="form-control" placeholder="Nhập  nơi giảng dạy bằng tiếng Anh">
					    </div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label class="ten2x">Năm bắt đầu</label>
						<input type="text" id="nambatdau{{$MGD->id}}" value="{{$MGD->nambatdau}}" class="form-control" placeholder="Năm bắt đầu">
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
						<input type="text" id="ten_vi" class="form-control" placeholder="Tên môn bằng tiếng Việt">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label class="ten2x">Tên môn (EN)</label>
						<input type="text" id="ten_en" class="form-control" placeholder="Tên môn bằng tiếng Anh">
					</div>
				</div>				
			</div>

			<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="ten2x">Đối tượng giảng dạy (VI)</label>
							<input type="text" id="doituong_vi"   class="form-control" placeholder="Nhập tên đối tượng giảng dạy bằng tiếng Việt">
					    </div>
					</div>

					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="ten2x">Đối tượng giảng dạy (EN)</label>
							<input type="text" id="doituong_en"   class="form-control" placeholder="Nhập tên đối tượng giảng dạy bằng tiếng Anh">
					    </div>
					</div>
					
			</div>

			<div class="row">
				
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="ten2x">Nơi giảng dạy (VI)</label>
							<input type="text" id="noiday_vi"   class="form-control" placeholder="Nhập tên nơi giảng dạy bằng tiếng Việt">
					    </div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="ten2x">Nơi giảng dạy (EN)</label>
							<input type="text" id="noiday_en"   class="form-control" placeholder="Nhập tên nơi giảng dạy bằng tiếng Anh">
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
                	var id_giangvien=<?=$Giangvien->id?>;               	

				      $.ajax({
				        method:'POST',
				        url:'set_admin/ajax/themmongiangday',
				        data:{
				        	ten_vi:ten_vi,
				        	ten_en:ten_en,
				        	nambatdau:nambatdau,
				        	doituong_vi:doituong_vi,
				        	doituong_en:doituong_en,
				        	noiday_vi:noiday_vi,
				        	noiday_en:noiday_en,
				        	id_giangvien:id_giangvien,				        			        	
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

  	$.ajax({
		method:'POST',
		url:'set_admin/ajax/capnhatmongiangday',
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
        $.get("set_admin/ajax/xoamongiangday/"+id,function(data){alert(data);window.location.reload();});
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
        $.get("set_admin/ajax/xoamongiangdayhet/"+listid,function(data){
            alert(data);
            window.location.reload();
        });
        } 
});
</script>
@endsection