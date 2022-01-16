@extends('Admin.Master')
@section('title','Danh sách thống kê')
@section('content')

<div class="h3 padding20 text-center">Danh sách thống kê đánh giá Giảng viên toàn Khoa theo</div>
<p class="text-center h3" style="font-size:26px;padding-top:0;">@if(count($Phieudanhgia)>0){{$Phieudanhgia[0]->thongbao->ten}}@endif</p>
<div class="box">
	<div class="body-box">
	<table class="table table-bordered table-hover example2" style="width:100%">
		<thead>
			<tr class="bg-top">
				<th width="5%">STT</th>
				<th>Tên giảng viên</th>
				<th width="10%" class="text-center">Điểm GV</th>
				<th width="10%" class="text-center">Vượt GV</th>
				<th width="10%" class="text-center">Điểm BM</th>
				<th width="10%" class="text-center">Vượt BM</th>
				<th width="10%" class="text-center">Điểm Khoa</th>
				<th width="10%" class="text-center">Vượt Khoa</th>
				<th width="10%" class="text-center">Giờ NCKH</th>
				<th width="10%" class="text-center">Xếp loại</th>
			</tr>
		</thead>
		<tbody id="mybody">
		<?php $i=1; ?>
		@foreach($Phieudanhgia as $pdg)
		<?php $tong=0;$tongbm=0;$tongkhoa=0;?>


		 @foreach($pdg->phieu_nckh_baibao as $pbb)
						 <?php $tong+=$pbb->tieuchi->diem; ?>
		 @endforeach
		 @foreach($pdg->phieu_nckh_detai as $pdt)
						 <?php $tong+=$pdt->tieuchi->diem; ?>
		 @endforeach



		 @foreach($pdg->phieu_nckh_baibaobomonduyet as $pbb)
						 <?php $tongbm+=$pbb->tieuchi->diem; ?>
		 @endforeach
		 @foreach($pdg->phieu_nckh_detaibomonduyet as $pdt)
						 <?php $tongbm+=$pdt->tieuchi->diem; ?>
		 @endforeach



		 @foreach($pdg->phieu_nckh_baibaokhoaduyet as $pbb)
						 <?php $tongkhoa+=$pbb->tieuchi->diem; ?>
		 @endforeach
		 @foreach($pdg->phieu_nckh_detaikhoaduyet as $pdt)
						 <?php $tongkhoa+=$pdt->tieuchi->diem; ?>
		 @endforeach


			<tr>
				<td class="text-center">{{$i++}}</td>
				<td>{{$pdg->giangvien->ten}}</td>
				<td class="text-center">
					@if(($pdg->phieugiangday->sum('diemdat')+$tong+$pdg->phieukhac->sum('diemdat'))>100)
						100
					@else
						{{$pdg->phieugiangday->sum('diemdat')+$tong+$pdg->phieukhac->sum('diemdat')}}
					@endif
				</td>
				<td class="text-center">
					@if(($pdg->phieugiangday->sum('diemdat')+$tong+$pdg->phieukhac->sum('diemdat'))>100)
						{{($pdg->phieugiangday->sum('diemdat')+$tong+$pdg->phieukhac->sum('diemdat'))-100}}
					@else
						0
					@endif
				</td>

				<td class="text-center">
					@if(($pdg->phieugiangdaybomonduyet->sum('diemdatbomon')+$tongbm+$pdg->phieukhacbomonduyet->sum('diemdatbomon'))>100)
						100
					@else
						{{$pdg->phieugiangdaybomonduyet->sum('diemdatbomon')+$tongbm+$pdg->phieukhacbomonduyet->sum('diemdatbomon')}}
					@endif
				</td>

				<td class="text-center">
					@if(($pdg->phieugiangdaybomonduyet->sum('diemdatbomon')+$tongbm+$pdg->phieukhacbomonduyet->sum('diemdatbomon'))>100)
						{{($pdg->phieugiangdaybomonduyet->sum('diemdatbomon')+$tongbm+$pdg->phieukhacbomonduyet->sum('diemdatbomon'))-100}}
					@else
						0
					@endif
				</td>

				<td class="text-center">
						@if(($pdg->phieugiangdaykhoaduyet->sum('diemdatkhoa')+$tongkhoa+$pdg->phieukhackhoaduyet->sum('diemdatkhoa'))>100)
						100
					@else
						{{$pdg->phieugiangdaykhoaduyet->sum('diemdatkhoa')+$tongkhoa+$pdg->phieukhackhoaduyet->sum('diemdatkhoa')}}
					@endif
				</td>
				<td class="text-center">
					@if(($pdg->phieugiangdaykhoaduyet->sum('diemdatkhoa')+$tongkhoa+$pdg->phieukhackhoaduyet->sum('diemdatkhoa'))>100)
						{{($pdg->phieugiangdaykhoaduyet->sum('diemdatkhoa')+$tongkhoa+$pdg->phieukhackhoaduyet->sum('diemdatkhoa'))-100}}
					@else
						0
					@endif
				</td>
				<td class="text-center">
					<?php $tong_nckh=0;?>
					@foreach($pdg->phieu_nckh_baibaokhoaduyet as $pbb) 
						   <?php $tong_nckh+=$pbb->tieuchi->gio; ?>
				   @endforeach 
					@foreach($pdg->phieu_nckh_detaikhoaduyet as $pdt)  
						   <?php $tong_nckh+=$pdt->tieuchi->gio; ?> 
				   @endforeach 
				   <?php $tong_nckh+=$pdg->phieukhackhoaduyet->sum('gio'); ?> 
				   {{ $tong_nckh }}
				</td>
				<td>{{$pdg->xeploai}}</td>
			</tr>
		@endforeach
			</tbody>
		</table>

		  <a href="set_admin" target="_blank"><button class="btn btn-danger pull-right">Thoát</button></a>
		  <a href="set_admin/PDF/danhsachdanhgiatheokhoa/{{$Thongbao}}" target="_blank"><button class="btn btn-success" style="margin-top:20px;">Xuất PDF theo điểm khoa duyệt</button></a><br>
		   <a href="set_admin/PDF/danhsachdanhgiatheokhoatheodiemgv/{{$Thongbao}}" target="_blank"><button class="btn btn-success" style="margin-top:20px;">Xuất PDF theo điểm Giảng viên tự chấm</button></a><br>
	</div>
</div>




@endsection
