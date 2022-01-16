@extends('Admin.Bomon.Hosokhoahoc.Master')

@section('Tabvalue')
 <div role="tabpanel" class="tab-pane @if ($tab==9) active @endif" id="profile">
 	

	<div class="xemlai">
		
		<table class="mytable" style="width:100%;margin-top:10px;">
			
			<tr>
				<td colspan="6" class="tieude">Personnal Information</td>
			</tr>
			<tr>
				<td colspan="2" class="ten">FULL NAME</td>
				<td colspan="4">{{$Hosokhoahoc->giangvien->ten}}</td>
			</tr>
			<tr>
				<td colspan="2" class="ten">SEX</td>
				<td colspan="4">@if($Hosokhoahoc->giangvien->gioitinh==1) M @else FM @endif</td>
			</tr>
			<tr>
				<td colspan="2" class="ten">BIRTHDATE</td>
				<td colspan="4">{{date('d-m-Y', strtotime($Hosokhoahoc->giangvien->ngaysinh))}}</td>
			</tr>
			<tr>
				<td colspan="2" class="ten">ID Number</td>
				<td colspan="4">{{$Hosokhoahoc->giangvien->cmnd}}</td>
			</tr>
			
			<tr>
				<td colspan="2" class="ten">SCIENTIFIC TITLE</td>
				<td colspan="4">{{$Hosokhoahoc->giangvien->trinhdo->ten_en}}</td>
			</tr>
						
			<tr>
				<td colspan="6">CURRENT EMPLOYER:</td>
			</tr>
			<tr>
				<td colspan="2" class="text-right">EMPLOYER:</td>
				<td colspan="4">{{$Hosokhoahoc->giangvien->chucvu->ten_en}}</td>
			<tr>
				<td colspan="2" class="text-right">Address:</td>
				<td colspan="4">{{$Hosokhoahoc->diachicoquan}}</td>
			</tr>			

			<tr>
				<td colspan="6">CONTACT INFORMATION</td>
			</tr>
			<tr>
				<td colspan="2" class="text-right">Email</td>
				<td colspan="4">{{$Hosokhoahoc->giangvien->email}}</td>
			</tr>
			<tr>
				<td colspan="2" class="text-right">Alt. Email (optional):</td>
				<td colspan="4">{{$Hosokhoahoc->giangvien->email}}</td>
			</tr>
			<tr>
				<td colspan="2" class="text-right">Office phone</td>
				<td colspan="4">{{$Hosokhoahoc->socoquan}}</td>
			</tr>
			<tr>
				<td colspan="2" class="text-right">Moble phone</td>
				<td colspan="4">{{$Hosokhoahoc->giangvien->dienthoai}}</td>
			</tr>
			<tr>
				<td colspan="2" class="text-right">Số fax</td>
				<td colspan="4">{{$Hosokhoahoc->sofaxcoquan}}</td>
			</tr>
			
			<tr>
				<td colspan="6" class="tieude">QUALIFICATIONc</td>
			</tr>

			<tr class="text-center" style="background:#E95A13;color:white;">
				<td width="5%">STT</td>
				<td>Time</td>
				<td>Institution</td>
				<td>Major</td>
				<td>Academic Degree</td>
				<td width="10%">Upload</td>
			</tr>
			<?php $i=1; ?>
			@foreach ($Hosokhoahoc->quatrinhdaotao as $qtdt)
				<tr>
					<td>{!!$i++!!}</td>
					<td width="20%">Từ: {{date('d-m-Y', strtotime($qtdt->ngaybatdau))}} &nbsp;&nbsp; Đến: {{date('d-m-Y', strtotime($qtdt->ngayketthuc))}}</td>
					<td>{{$qtdt->tencoso_en}}</td>					
					<td>{{$qtdt->chuyennganh_en}}</td>
					<td>{{$qtdt->hocvi_en}}</td>
					<td class="text-center">@if ($qtdt->minhchung!='khong' && $qtdt->minhchung!='') <a style="background:transparent;color:blue;" href="ht96_pdf/{{$qtdt->minhchung}}"  target="_blank">Có</a> @endif</td>
				</tr>
			@endforeach
			<tr>
				<td colspan="6" class="tieude">Research experience and achievement</td>
			</tr>

			<tr>
				<td colspan="6" class="" style="padding:0!important;background:#999966;font-weight:bold;border-bottom:none;border-top:none;">1 Last five year’s research interests.</td>
			</tr>
			<tr>
				<td colspan="6" style="border-bottom:none;border-top:none;">{{$Hosokhoahoc->huongnghiencuu_en}}</td>
			</tr>
			<tr>
				<td colspan="6" class="" style="padding:0!important;background:#999966;font-weight:bold;border-bottom:none;border-top:none;">2. Research grants received or applied</td>
			</tr>

			<tr class="text-center" style="background:#E95A13;color:white;">
				<td width="5%">STT</td>
				<td colspan="2">Project name</td>
				<td>Funding institution</td>
				<td>Role</td>
				<td>Project Duration</td>				
			</tr>
			
			</table>


		<table class="mytable2" style="width:100%">
			<tr>
				<td colspan="8" class="" style="padding:0!important;background:#999966;font-weight:bold;border-bottom:none;border-top:none;">3.Publications and accomplishments</td>
			</tr>

			<tr class="text-center" style="background:#E95A13;color:white;">
				<td width="5%">#</td>
				<td width="20%">Authors</td>
				<td width="20%">Publications</td>
				<td width="20%">Name of publishers</td>
				<td style="width:8%!important">ISSN</td>
				<td width="5%">Year</td>	
				<td width="10%" class="text-center">Proof</td>	
				<td width="15%">Note</td>		
			</tr>
			
			@foreach ($Hosokhoahoc->nghiencuudacongbo as $nccb)
				<tr>
					<td class="text-center">{{$nccb->id_loaiketqua}}</td>
					<td>{{$nccb->tacgia}}</td>
					<td>{{$nccb->ten}}</td>
					<td>{{$nccb->nxb}}</td>
					<td>{{$nccb->so_issn}}</td>
					<td>{{$nccb->nam}}</td>
					<td class="text-center">@if ($nccb->minhchung!='khong' && $nccb->minhchung!='') <a style="background:transparent;color:blue;" href="ht96_pdf/{{$nccb->minhchung}}"  target="_blank">Có</a> @endif</td>
					<td>{{$nccb->ghichu}}</td>
				</tr>
			@endforeach

			<tr style="background:#999966 ">
				<td colspan="8"></td>
			</tr>
			<?php $i=1; ?>
			@foreach ($Loaiketqua as $LKQ)
				<tr>
					<td>{{$i++}}</td>
					<td colspan="7">{{$LKQ->ten_en}}</td>
				</tr>
			@endforeach
			</table>
		


	</div>



 </div>
@endsection