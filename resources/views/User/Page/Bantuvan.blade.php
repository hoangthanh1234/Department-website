@extends('User.Index')
@section('title')
    <?php $title='title_'.$lang;echo $Bomon->$title; ?> : {{trans('Menu.bantuvan')}}
@endsection
@section('description')
    <?php $description='description_'.$lang;echo $Bomon->$description; ?>
@endsection
@section('content')
<div class="nonedesktop">@include('User.Layout.MenuMobi')</div>
<div class="nonepad nonephone">
@include('User.Layout.Banner')
@include('User.Layout.Menubm')
</div>

<section class="bomon-nhansu">
	
	<div class="container">
		<div class="tieude bold">@lang('Menu.bantuvan')</div>
		<p class="mota">{{trans('Menu.bomon')}}  {{$Bomon->ten}} với ban tư vấn chương trình gồm <?php echo count($Bantuvan); ?> thành viên, tham gia tư vấn tuyển sinh, thông tin cụ thể của các thành viên như sau:</p>

		<div class="table-responsive">
		<table class="table table-hover table-bordered"  style="width:100%;min-width:1000px;">
			<thead>
				<tr class="bg-top-table">
					<th width="5%" class="text-center">STT</th>
					<th width="20%" class="text-center">@lang('Nhansu.hovaten')</th>					
					<th width="20%" class="text-center">E-MAIL</th>
					<th width="20%" class="text-center">@lang('Nhansu.dienthoai')</th>
					
				</tr>
			</thead>
			<tfoot>
				<tr>					
					<th></th>
					<th></th>
					<th></th>
					<th></th>
				</tr>
			</tfoot>
			<tbody>
				<?php $i=0;?>
				@foreach($Bantuvan as $btv)
					<?php $i++; ?>
					<tr>
						<td class="text-center bold">{{$i}}</td>
						<td class="bold">{{$btv->ten}}</td>
						<td class="bold">{{$btv->email}}</td>											
						<td class="bold">{{$btv->dienthoai}}</td>
					</tr>
				@endforeach
			</tbody>			
		</table>
		</div>
	</div>
</section>

@endsection