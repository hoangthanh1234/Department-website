@extends('Admin.Master')
@section('title','Danh chi tiết các môn tự chon theo từng học kỳ')
@section('content') 

<div class="h3 text-center">Danh sách các môn tự chọn theo từng học kỳ lớp @if(count($CT_tuchon)>0) {{$CT_tuchon[0]->lop->tenlop}} @endif</div><br>

<div class="box">	

	<div class="container" style="max-width:500px;margin-top:20px;">
        @if(session('canhbao'))
            <div class="alert alert-warning">
                {{session('canhbao')}}
            </div>
        @endif

         @if(session('thongbao'))
            <div class="alert alert-success">
                {{session('thongbao')}}
            </div>
        @endif
    </div>

	<div class="body-box">
		<table class="table table-bordered table-hover example2" style="width:100%">
			<thead>
				<tr class="bg-top">
					<th class="text-center" width="2%">#</th>
					<th class="text-center" width="10%">Hành động</th>
					<th class="text-center">Tên môn</th>
					<th class="text-center">STC</th>
					<th class="text-center">LT</th>
					<th class="text-center">TH</th>
					<th class="text-center" width="10%">Học kỳ</th>						
				</tr>
			</thead>
			<tfoot>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
			</tfoot>
			<tbody>
				<?php $i=1;?>
				@foreach($CT_tuchon as $cttc)
				<tr>
					<td class="text-center">{{$i++}}</td>
					<td class="text-center">
						<a href="set_giangvien/dinh-huong-tu-chon/cap-nhat-chi-tiet/{{$cttc->id}}" class="btn btn-warning"> 
							<i class="fa fa-edit"></i>
						 </a>
						 <a href="set_giangvien/dinh-huong-tu-chon/xoa-chi-tiet/{{$cttc->id}}" class="btn btn-danger"> 
							<i class="fa fa-times"></i>
						 </a>
					</td>
					<td>{{$cttc->mon->ten_vi}}</td>
					<td class="text-center">{{$cttc->mon->stc}}</td>
					<td class="text-center">{{$cttc->mon->lt}}</td>
					<td class="text-center">{{$cttc->mon->th}}</td>
					<td class="text-center">{{$cttc->hocky->ten}}</td>						
				</tr>
				@endforeach
			</tbody>
		</table>

	<div class="row">
		<div class="col-lg-12 col-md-12">
			<a href="set_giangvien/dinh-huong-tu-chon/them-chi-tiet/{{$id_lop}}"><input type="button" class="btn btn-success" value="Thêm mới"></a>

			<a href="set_giangvien/dinh-huong-tu-chon/danh-sach-lop"><input type="button" class="btn btn-danger" value="Thoát"></a>
		</div>		
	</div>


		</div>
	</div>
@endsection