@extends('Admin.Khoa.Chuongtrinh.Them.Masteradd')
@section('Tabvalue')
<style type="text/css">
	.ui-autocomplete {
z-index: 100!important;
}
</style>
<div role="tabpanel" class="tab-pane @if ($tab==2) active @endif" id="profile">
	<form  method="post" action="set_admin/chuong-trinh/them-chuong-trinh/mon-hoc/{{$id_chuongtrinh}}.html" enctype="multipart/form-data">
		<div class="row" style="margin-top:30px;">
			<div class="col-lg-12 col-md-12 col-xs-12">
				<label class="ten2x">Nhập Số học kỳ</label>
				<input type="text" class="form-control" id="sohocky" name="sohocky">
			</div>	
		</div>
		<div id="loadsohocky"  name="sohocky"></div>
		<input type="submit" class="btn btn-success pull-right" value="Tiếp tục" style="margin:0 15px;margin-top:15px;">	
	    <a href="set_admin/chuong-trinh/them-chuong-trinh/huy/{{$id_chuongtrinh}}"><input style="margin-top:15px;" type="button" class="btn btn-danger pull-right" value="Thoát"></a>
	    <input type="hidden" name="_token" value="{{ csrf_token() }}">			
	</form>
</div>
@endsection

@section('script')
<script type="text/javascript">	
	$(document).on('keyup','#sohocky',function(){
		var sohocky = $(this).val();
		$.ajax({
            url: "set_admin/ajax/loadhocky/"+sohocky,
            type: 'GET',
            dataType: 'html',  
            success: function(data){                      
                $('#loadsohocky').html(data);                
           },
            error: function(XMLHttpRequest, textStatus, errorThrown){                     
                alert("Status: " + textStatus+": "+errorThrown+"!!!! Không thể thực hiện yêu cầu!!! Vui Lòng kiểm tra Lại");

            }

        });  
	});



	$(document).on('keyup','.somonhoc',function(){
		var id=$(this).data('id');
		var soluong = $(this).val();		
		$.ajax({
            url: "set_admin/ajax/loadsomon/"+soluong+"/"+id,
            type: 'GET',
            dataType: 'html',  
            success: function(data){                      
                $('#loadsomonhoc'+id).html(data);    
                            
           },
            error: function(XMLHttpRequest, textStatus, errorThrown){                     
                alert("Status: " + textStatus+": "+errorThrown+"!!!! Không thể thực hiện yêu cầu!!! Vui Lòng kiểm tra Lại");

            }

        });  
	});


	// $(document).on('keyup','.tenmon',function(){
	// 	var id_chuongtrinh = <?=$id_chuongtrinh?>;
	// 	var hocky = $(this).data('hk');
	// 	var mon = $(this).data('m');

	// });


$(document).ready(function($){

var engine1 = new Bloodhound({
	remote:{
	    url: 'set_admin/ajax/search/tenmonhoc?value=%QUERY%',
	    wildcard: '%QUERY%'
	},
	    datumTokenizer: Bloodhound.tokenizers.whitespace('value'),
	    queryTokenizer: Bloodhound.tokenizers.whitespace
	});
	

$(document).on('mouseenter','.tenmon',function(){
	var id_chuongtrinh = <?=$id_chuongtrinh?>;
	var hocky = $(this).data('hk');
	var mon = $(this).data('m');

		
	$("#tenmonhk"+hocky+"m"+mon).typeahead({
		hint: false,
		highlight: true,
		minLength: 1
	}, [
		{
		    source: engine1.ttAdapter(),
		    name: 'ten_mon',
		    display: function(data){
		    return data.id_mon+' - '+data.ten_mon;
		},
		templates:{
		empty:[
		'<div class="header-title">Tên giảng viên</div><div class="list-group search-results-dropdown"><div class="list-group-item">Không có kết quả trùng khớp.</div></div>'
		],                                
		suggestion: function (data){
				
		    return '<p class="list-group-item checkchon" data-stc="'+data.stc+'" data-lt="'+data.lt+'" data-th="'+data.th+'"  data-m="'+mon+'" data-hk="'+hocky+'" style="width:100%"> ID:'+data.id_mon+' - Tên: '+data.ten_mon + ' - ('+data.ten_bac+')</p>';
		                
			}
		}
	}
  ]);
});

$(document).on('click','.checkchon',function(){
	var stc = $(this).data('stc');
	var lt = $(this).data('lt');
	var th = $(this).data('th');
	var mon = $(this).data('m');
	var hocky = $(this).data('hk');
	$('#stchk'+hocky+'m'+mon).val(stc);
	$('#lthk'+hocky+'m'+mon).val(lt);
	$('#thhk'+hocky+'m'+mon).val(th);

});


});

</script>

@endsection