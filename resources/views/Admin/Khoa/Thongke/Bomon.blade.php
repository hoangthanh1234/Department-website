@extends('Admin.Master')
@section('title','Danh sách thống kê')
@section('content')
	<div class="h3 padding20 text-center" style="font-size:25px;">Danh sách thống kê đánh giá giảng viên
		@if(count($Phieudanhgia)>0 && $Phieudanhgia[0]->giangvien->id_bomon!=6) bộ môn @endif
		@if(count($Phieudanhgia)>0){{$Phieudanhgia[0]->giangvien->bomon->ten_vi}} @endif theo</div>
	<p class="text-center h3" style="font-size:20px;padding-top:0;">@if(count($Phieudanhgia)>0){{$Phieudanhgia[0]->thongbao->ten}} @endif</p>

<div class="box">
	<div class="body-box">
		<div class="row" style="margin-bottom:20px;">
			<div class="col-lg-6 col-md-6 col-xs-12">
				<b class="ten2x">Chọn Bộ môn</b><br>
				<select id="bomon" class="form-control">
					<option value="0">Chọn bộ môn</option>
					@foreach($Bomon as $bm)
						<option value="{{$bm->id}}">{{$bm->ten_vi}}</option>
					@endforeach
				</select>
			</div>
		</div>


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
						   @foreach($pdg->phieukhackhoaduyet as $pk)
								<?php $tong_nckh+=$pk->tieuchi->gio;?>
							@endforeach	
						   {{ $tong_nckh }}
						</td>
						<td>{{$pdg->xeploai}}</td>
					</tr>
				@endforeach
			</tbody>
		</table>

		  <a href="set_admin"><button class="btn btn-danger pull-right">Thoát</button></a>

		   <a href="set_admin/PDF/danhsachdanhgiatheobomon/{{$id_thongbao}}/{{$id_bomon}}" target="_blank"><button class="btn btn-success" style="margin-top:20px;">Xuất PDF theo điểm Khoa duyệt (Toàn Khoa)</button></a><br>

		<button id="danhsachchitiet" class="btn btn-success" style="margin-top:20px;">Xuất PDF Chi tiết Khoa duyệt theo BM</button>
		<button id="danhsachchitiet_nckh" class="btn btn-success" style="margin-top:20px;">Xuất PDF Chi tiết Khoa duyệt theo BM (có giờ NCKH)</button>
		<br><br>

		<div class="col-lg-6 col-md-6">
			<b>Xếp Loại</b>
			<select class="form-control" id="check" style="with:100px">
				<option value="1">Có</option>
				<option value="0">Không</option>
			</select>
		</div>

	</div>
</div>

@endsection

@section('script')

<script type="text/javascript">

	$(document).on('change','#bomon',function(){
		var thongbao=<?=Session::get('user_tbdg')?>;
		var bomon=parseInt($(this).val());
		if(bomon==0){
			alert("Chọn bộ môn");return false;
		}
		window.location.href ="set_admin/thongke/bomon/"+thongbao+"/"+bomon;
	});


	$(document).on('click','#danhsachchitiet',function(){

		var thongbao=<?=$id_thongbao?>;
		var bomon=<?=$id_bomon?>;
		var check = $('#check').val();
		if(isNaN(bomon)){alert('Vui lòng chọn bộ môn');return false;}
		if(bomon==0){alert('Vui lòng chọn bộ môn');return false;}

			 window.open("set_admin/PDF/danhsachdanhgiachitiet/"+thongbao+"/"+bomon+"/"+check);

	});


	$(document).on('click','#danhsachchitiet_nckh',function(){

	var thongbao=<?=$id_thongbao?>;
	var bomon=<?=$id_bomon?>;
	var check = $('#check').val();
	if(isNaN(bomon)){alert('Vui lòng chọn bộ môn');return false;}
	if(bomon==0){alert('Vui lòng chọn bộ môn');return false;}

		window.open("set_admin/PDF/danhsachdanhgiachitiet_gioNCKH/"+thongbao+"/"+bomon+"/"+check);

	});



</script>


@endsection
