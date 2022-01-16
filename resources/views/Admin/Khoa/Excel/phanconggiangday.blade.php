<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>DANH SÁCH PCGD</title>
 
</head>
<body>

	table>	
	<tr>		
		<td colspan="8" align="center">TRƯỜNG ĐẠI HỌC TRÀ VINH</td>		
		<td colspan="8" align="center">CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</td>				
	</tr>
	<tr>		
		<td colspan="8" align="center">KHOA KỸ THUẬT VÀ CÔNG NGHỆ</td>
		<td colspan="8" align="center">Độc lập - Tự do - Hạnh phúc</td>
	</tr>
	<tr>
		<td colspan="16" align="center">BẢNG TỔNG HỢP KẾ HOẠCH PHÂN CÔNG GIẢNG DẠY  KHOA KỸ THUẬT VÀ CÔNG NGHỆ</td>
	</tr>		
	<tr>
		<td colspan="16" align="center">NĂM HỌC: </td>
	</tr>
</table>




<table>
	<tr>
		<td colspan="7" align="center">THÔNG TIN GIẢNG VIÊN</td>
		<td colspan="9" align="center">KẾ HOẠCH GIẢNG DẠY</td>
	</tr>
	<tr>
		<td align="center">TT</td>
		<td align="center">Tên</td>
		<td align="center">Trình độ</td>
		<td align="center">Chức vụ</td>
		<td align="center">CC NVSP</td>
		<td align="center">Ngoại ngữ</td>
		<td align="center">Giờ chuẩn</td>
		<td align="center">Môn được phân công</td>
		<td align="center">Mã lớp</td>
		<td align="center">HKI</td>
		<td align="center">HKII</td>
		<td align="center">Tổng giờ GD theo GV (lớp CQ)</td>
		<td align="center">Tổng giờ GD theo GV (lớp LT,VLVH,VB2)</td>
		<td align="center">Kế hoạch công tác khác</td>
		<td align="center">Giờ còn lại</td>
		<td align="center">Ghi chú</td>
	</tr>
	

	<?php $i=1;?>
	@foreach($Giangvien as $gv)
	
	<?php 
		$dem = 1;
		foreach ($Phanconggiangday as $pcgd){
			if($gv->id ==$pcgd->id_giangvien)
				$dem++;
		}
	 ?>

	<tr>
		<td rowspan="{{$dem}}" align="center">{{$i++}}</td>
		<td rowspan="{{$dem}}">{{$gv->ten}}</td>
		<td rowspan="{{$dem}}" align="center">{{$gv->trinhdo->ten_vi}}</td>
		<td rowspan="{{$dem}}" align="center">{{$gv->chucvu->ten_vi}}</td>
		<td rowspan="{{$dem}}" align="center">@if($gv->ccnvsp == 1) Có @else Không @endif</td>
		<td rowspan="{{$dem}}" align="center">
		<?php 
		$ngoaingu = $gv->ngoaingu;
		if(count($ngoaingu)>0){
			$nni = '';
			foreach ($ngoaingu as $nn)				
				$nni.=$nn->ten_vi.'('.$nn->thongthao_vi.')'.', ';
			$nni = rtrim($nni,',');			
			echo $nni;
		}
		?>			
		</td>
		<td rowspan="{{$dem}}" align="center">
			@foreach($Chedogiochuan as $cdgc)
				@if($cdgc->id_trinhdo == $gv->id_trinhdo && $cdgc->id_chucvu==$gv->id_chucvu)
					@if(($cdgc->giochuan-176)>0) {{$cdgc->giochuan-176}} @else 0 @endif
				@endif
			@endforeach
		</td>		
		<td colspan="4"></td>		
		<td rowspan="{{$dem}}" align="center">
			<?php $hours = 0; ?>
			  @foreach ($Phanconggiangday as $pcgd)
			  	@if($pcgd->id_giangvien == $gv->id)
			    	<?php $hours+= ($pcgd->mon->lt*15) + ($pcgd->mon->th*30); ?>
			    @endif
			  @endforeach
			  {{$hours}}
		</td>

		<td rowspan="{{$dem}}" align="center">
			<?php $hours = 0; ?>
			  @foreach ($Phancongthinhgiang as $pctg)
			  	@if($pctg->id_giangvien == $gv->id)
			    	<?php $hours+= ($pctg->mon->lt*15) + ($pctg->mon->th*30); ?>
			    @endif
			  @endforeach
			  {{$hours}}
		</td>		
		<td rowspan="{{$dem}}" align="center"></td>
		<td rowspan="{{$dem}}" align="center"></td>
		<td rowspan="{{$dem}}" align="center"></td>
	</tr>	
@foreach($Phanconggiangday as $pcgd)
	@if($pcgd->id_giangvien == $gv->id)
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td>{{$pcgd->mon->ten_vi}}</td>
		<td>{{$pcgd->lop->malop}}</td>
		<?php $sotiet = $pcgd->mon->lt*15 + $pcgd->mon->th*30;?>
		<td align="center">@if($pcgd->id_hocky%2!=0){{$sotiet}}@endif</td>
		<td align="center">@if($pcgd->id_hocky%2==0){{$sotiet}}@endif</td>
	</tr>
	@endif
@endforeach
	
@endforeach
				
				
</table>



</body>
</html>

