@extends('Admin.Khoa.Chuongtrinh.Them.Masteradd')
@section('Tabvalue')
<div role="tabpanel" class="tab-pane @if ($tab==3) active @endif" id="profile">
<form  method="post" action="set_admin/chuong-trinh/them-chuong-trinh/to-hop/{{$id_chuongtrinh}}.html" enctype="multipart/form-data">	

<div style="margin-top:25px;">
<div style="height:400px;overflow-y:scroll;">
	@foreach($Tohop as $th)
		<p>
			<input type="checkbox" class="check" data-id="{{$th->id}}" name="checkbox{{$th->id}}">			
			<input type="text" class="text-center" name="diem{{$th->id}}" id="diem{{$th->id}}" style="width:50px;">			
			<label>{{$th->ten}} ({{$th->monxt}})</label>			
		</p>
	@endforeach
</div>
</div>	
   <input type="submit" class="btn btn-success pull-right" value="Tiếp tục" style="margin:0 15px;">	
    <a href="set_admin/chuong-trinh/list"><input type="button" class="btn btn-danger pull-right" value="Thoát"></a>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>

@endsection


@section('script')

<script type="text/javascript">
	
	$(document).on('click','.check',function(){
		var id = $(this).data('id');
		if($(this).is(':checked')){
			if($.isNumeric($('#diem'+id).val())==false){
				alert('Vui lòng nhập điểm cho tổ hợp này');
				$(this).prop('checked', false);
				return false;
			}
		}
	});

</script>

@endsection

