@extends('Admin.Master')
@section('title','Danh sách lớp')
@section('content') 

<div class="h3 text-center">
	Danh sách lớp mà bạn chủ nhiệm
</div><br>

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
						<td class="text-center" width="2%">#</td>
						<td class="text-center" width="10%">Hành động</td>
						<td class="text-center">Tên lớp</td>
						<td class="text-center" width="15%">Khóa</td>						
					</tr>
				</thead>
				<tfoot>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
				</tfoot>
				<tbody>
					<?php $i=1;?>
				  @foreach($Phancongchunhiem as $pccn)
					<tr>
						<td class="text-center">{{$i++}}</td>
						<td class="text-center">
						<a href="set_giangvien/dinh-huong-tu-chon/danh-sach-chi-tiet/{{$pccn->id_lop}}" class="btn btn-warning" title="Xem thông tin chi tiết"> 
								<i class="fa fa-edit"></i>
							</a>
						</td>
						<td>{{$pccn->lop->tenlop}} ({{$pccn->lop->malop}})</td>
						<td class="text-center">{{$pccn->lop->nambatdau}} - {{$pccn->lop->namtotnghiep}}</td>
					</tr>
				  @endforeach
				</tbody>
			</table>
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<a href="set_giangvien/trang-chu.html"><button class="btn btn-danger">Thoát</button></a>
				</div>
			</div>
		</div>
	</div>
@endsection