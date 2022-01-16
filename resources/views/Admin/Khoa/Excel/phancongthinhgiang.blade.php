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
		<td colspan="6" align="center">TRƯỜNG ĐẠI HỌC TRÀ VINH</td>		
		<td colspan="6" align="center">CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</td>				
	</tr>
	<tr>		
		<td colspan="6" align="center">KHOA KỸ THUẬT VÀ CÔNG NGHỆ</td>
		<td colspan="6" align="center">Độc lập - Tự do - Hạnh phúc</td>
	</tr>
	<tr>
		<td colspan="12" align="center">BẢNG TỔNG HỢP KẾ HOẠCH PHÂN CÔNG GIẢNG DẠY  KHOA KỸ THUẬT VÀ CÔNG NGHỆ</td>
	</tr>		
	<tr>
		<td colspan="12" align="center">NĂM HỌC: </td>
	</tr>
</table>




<table>
	<tr>
		<td colspan="5" align="center">THÔNG TIN GIẢNG VIÊN</td>
		<td colspan="7" align="center">KẾ HOẠCH GIẢNG DẠY</td>
	</tr>
	<tr>
		<td align="center">TT</td>
		<td align="center">HỌ TÊN</td>
		<td align="center">TRÌNH ĐỘ</td>
		<td align="center">CHỨC VỤ</td>
		<td align="center">ĐƠN VỊ CÔNG TÁC</td>
		<td align="center">MÔN ĐƯỢC MỜI GIẢNG</td>	
		<td align="center">Mã lớp</td>
		<td align="center">HKI</td>
		<td align="center">HKII</td>
		<td align="center">TỔNG CỘNG <br style="mso-data-placement:same-cell;" /> THEO GV (lớp CQ)</td>
		<td align="center">TTỔNG CỘNG THEO GV (lớp LT,VLVH,VB2)</td>		
		<td align="center">Ghi chú</td>
	</tr>
	

	<?php $i=1;?>
	@foreach($Giangvien as $gv)	
	<?php 
		$dem = 1;
		foreach ($Phancongthinhgiang as $pctg){
			if($gv->id ==$pctg->id_giangvien)
				$dem++;
		}
	 ?>

	<tr>
		<td rowspan="{{$dem}}" align="center">{{$i++}}</td>
		<td rowspan="{{$dem}}">{{$gv->ten}}</td>
		<td rowspan="{{$dem}}" align="center">{{$gv->trinhdo->ten_vi}}</td>
		<td rowspan="{{$dem}}" align="center">{{$gv->chucvu->ten_vi}}</td>
		<td rowspan="{{$dem}}" align="center">{{$gv->tenphongban_vi}}</td>					
		<td colspan="4"></td>	
		<?php $hourscp = 0; $hourslt = 0; ?>
			  @foreach ($Phancongthinhgiang as $pctg)
			  	@if($pctg->id_giangvien == $gv->id && $pctg->lop->id_hedaotao == 1)
			    	<?php $hourscp+= ($pctg->mon->lt*15) + ($pctg->mon->th*30); ?>
			    @endif
			    @if($pctg->id_giangvien == $gv->id && $pctg->lop->id_hedaotao != 1)
			    	<?php $hourslt+= ($pctg->mon->lt*15) + ($pctg->mon->th*30); ?>
			    @endif
		@endforeach
		<td rowspan="{{$dem}}" align="center">{{$hourscp}}</td>
		<td rowspan="{{$dem}}" align="center">{{$hourslt}}</td>
		<td rowspan="{{$dem}}" align="center">			
			 {{$hourscp + $hourslt}}
		</td>
	</tr>	
	@foreach($Phancongthinhgiang as $pctg)
	@if($pctg->id_giangvien == $gv->id)
	<tr>
		
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td>{{$pctg->mon->ten_vi}}</td>
		<td>{{$pctg->lop->malop}}</td>
		<?php $sotiet = $pctg->mon->lt*15 + $pctg->mon->th*30;?>
		<td align="center">@if($pctg->id_hocky%2!=0){{$sotiet}}@endif</td>
		<td align="center">@if($pctg->id_hocky%2==0){{$sotiet}}@endif</td>
	</tr>
	@endif
@endforeach
	
@endforeach
				
				
</table>



</body>
</html>

