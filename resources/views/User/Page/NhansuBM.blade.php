@extends('User.Index')
@section('title')
    <?php $title='title_'.$lang;echo $Bomon->$title; ?> : {{trans('Nhansu.nhansu')}}
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
		<div class="tieude bold">@lang('Nhansu.nhansu')</div>
		<p class="mota">{{trans('Menu.bomon')}}  {{$Bomon->ten}} {{trans('Nhansu.nhansugom')}} <?php echo count($Giangvien); ?> {{trans('Nhansu.nhansugom2')}}</p>

		<div class="table-responsive">
		<table class="table table-hover table-bordered"  style="width:100%;min-width:1000px;">
			<thead>
				<tr class="bg-top-table">
					<th width="5%" class="text-center">STT</th>
					<th width="20%" class="text-center">@lang('Nhansu.hovaten')</th>
					<th width="13%" class="text-center">@lang('Nhansu.hocvi')</th>
					<th width="20%" class="text-center">@lang('Nhansu.chucvu')</th>
					<th width="20%" class="text-center">E-MAIL</th>
					<th width="15%" class="text-center">@lang('Nhansu.dienthoai')</th>
					
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
				<?php $i=0;?>
				@foreach($Giangvien as $GV)
					<?php $i++; ?>
					<tr>
						<td class="text-center bold">{{$i}}</td>
						<td class="bold"><a href="{{trans('Link.hosokhoahoc')}}/{{$GV->tenkhongdau}}/{{$GV->id}}.html">{{$GV->ten}}</a></td>
						<td class="bold">
							@if ($GV->trinhdo)
								<?php $ten='ten_'.$lang;echo $GV->trinhdo->$ten; ?>
							@endif
						</td>
						<td class="bold">
							@if ($GV->chucvu)
								<?php $ten='ten_'.$lang;echo $GV->chucvu->$ten; ?>
							@endif
						</td>
						<td class="bold">@if($GV->id_chucvu != 15){{$GV->email}} @endif</td>
						<td class="bold">@if($GV->id_chucvu != 15){{$GV->dienthoai}} @endif</td>
					</tr>
				@endforeach
			</tbody>			
		</table>
		</div>
	</div>
</section>

@endsection