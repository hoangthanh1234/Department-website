@extends('Admin.Bomon.Hosokhoahoc.Master')

@section('Tabvalue')
 <div role="tabpanel" class="tab-pane  @if ($tab==6) active @endif" id="profile">	  

	<p class="ten2x" style="font-size:20px;margin-top:30px;margin-bottom:30px;">Môn giảng dạy</p>

 <table  class="example4 table table-bordered table-striped" style="width:100%">
                         <thead>                 
                            <tr style="background: #ed8210;color:white;text-align: center;">
                                <th width="5%"><input type="checkbox" name="chonhetcb" id="chonhetcb" /></th>
                                <th width="20%">Tên Môn</th> 
                                <th width="20%">Năm bắt đầu</th> 
                                <th width="10%">Đối tượng</th>
                                <th width="20%">Nơi dạy</th>                           
                                <th width="8%" style="text-align:center;">Sửa</th>
                                <th  width="10%" style="text-align:center;">Xóa</th>
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
@foreach($Hosokhoahoc->mongiangday as $MGD)                                  
   <tr>
       <td  style="text-align:center;">
           <input type="checkbox" name="choncb" id="chon{{$MGD->id}}" value="{{$MGD->id}}" class="chon" />
       </td>	
        <td>{{$MGD->ten}}</td>							
		<td>{{$MGD->nambatdau}}</td>								
		<td>{{$MGD->doituong}}</td>	
		<td>{{$MGD->noiday}}</td>			
        <td class="text-center">                                                   
       		<a title="Sửa bài viết"><img src="ht96_admin/media/images/edit1.png" data-toggle="modal" data-target="#capnhathuongdansaudaihoc{{$MGD->id}}" border="0"/>
        </td> 

        <td class="text-center" title="xóa bài viết">                                   
            <p class="xoamongiangday" data-id="{{$MGD->id}}"><img src="ht96_admin/media/images/delete1.gif" /></p>
        </td>
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
						<label class="ten2x">Tên môn</label>
						<input type="text" id="ten{{$MGD->id}}" value="{{$MGD->ten}}" class="form-control" placeholder="Tên môn">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label class="ten2x">Năm bắt đầu</label>
						<input type="text" id="nambatdau{{$MGD->id}}" value="{{$MGD->nambatdau}}" class="form-control" placeholder="Năm bắt đầu">
					</div>
				</div>
			</div>

			<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="ten2x">Đối tượng giảng dạy</label>
							<input type="text" id="doituong{{$MGD->id}}" value="{{$MGD->doituong}}"  class="form-control" placeholder="Nhập tên đối tượng giảng dạy">
					    </div>
					</div>

					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="ten2x">Nơi giảng dạy</label>
							<input type="text" id="noiday{{$MGD->id}}" value="{{$MGD->noiday}}"  class="form-control" placeholder="Nhập tên nơi giảng dạy">
					    </div>
					</div>
			</div>								
				
		<div class="modal-footer">
			<button type="button" class="btn btn-success btn-luu" data-id="{{$MGD->id}}" style="float:left;">Lưu</button>
	        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
		</div>	
		</div>	      
		</div>
	</div>
</div>
@endforeach 

</tbody> 
</table> 
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
						<label class="ten2x">Tên môn</label>
						<input type="text" id="ten" class="form-control" placeholder="Tên môn">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label class="ten2x">Năm bắt đầu</label>
						<input type="text" id="nambatdau"  class="form-control" placeholder="Năm bắt đầu">
					</div>
				</div>
			</div>

			<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="ten2x">Đối tượng giảng dạy</label>
							<input type="text" id="doituong"   class="form-control" placeholder="Nhập tên đối tượng giảng dạy">
					    </div>
					</div>

					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="ten2x">Nơi giảng dạy</label>
							<input type="text" id="noiday"   class="form-control" placeholder="Nhập tên nơi giảng dạy">
					    </div>
					</div>
			</div>


		<div class="modal-footer">
			<button type="button" class="btn btn-success" id="btn-luu" style="float:left;">Lưu</button>
	        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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

                	var ten=$('#ten').val();                
                	var nambatdau=$('#nambatdau').val();
                	var doituong=$('#doituong').val();  
                	var noiday=$('#noiday').val();     	  
                	var hoso={{$Hosokhoahoc->id}};                 	

				      $.ajax({
				        method:'POST',
				        url:'set_admin/ajax/hosokhoahoc/themmongiangday',
				        data:{
				        	ten:ten,
				        	nambatdau:nambatdau,
				        	doituong:doituong,
				        	noiday:noiday,
				        	hoso:hoso,				        			        	
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
	var ten=$('#ten'+id).val();                
    var nambatdau=$('#nambatdau'+id).val();
    var doituong=$('#doituong'+id).val();  
    var noiday=$('#noiday'+id).val();     	  
    var hoso={{$Hosokhoahoc->id}};                	             	        	  
   
             	
                	
                       

  				$.ajax({
				        method:'POST',
				        url:'set_admin/ajax/hosokhoahoc/capnhatmongiangday',
				        data:{
				        	ten:ten,
				        	nambatdau:nambatdau,
				        	doituong:doituong,
				        	noiday:noiday,
				        	hoso:hoso,	
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
                 	$.get("set_admin/ajax/hosokhoahoc/xoamongiangday/"+id,function(data){alert(data);window.location.reload();});
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
                	$.get("set_admin/ajax/hosokhoahoc/xoamongiangdayhet/"+listid,function(data){
            			alert(data);
            			window.location.reload();
        			});
                } 
            });



</script>


@endsection