@extends('Admin.Khoa.Hosokhoahoc.Master')

@section('Tabvalue')
 <div role="tabpanel" class="tab-pane @if ($tab==8) active @endif" id="profile">

	<div class="xemlai">
		
		<table class="mytable" style="width:100%;margin-top:10px;">
			
			<tr>
				<td colspan="6" class="tieude">Thông tin cá nhân</td>
			</tr>
			<tr>
				<td colspan="2" class="ten">HỌ VÀ TÊN</td>
				<td colspan="4">{{$Hosokhoahoc->giangvien->ten}}</td>
			</tr>
			<tr>
				<td colspan="2" class="ten">Giới tính</td>
				<td colspan="4">@if($Hosokhoahoc->giangvien->gioitinh==1) Nam @else Nữ @endif</td>
			</tr>
			<tr>
				<td colspan="2" class="ten">Ngày sinh</td>
				<td colspan="4">{{date('d-m-Y', strtotime($Hosokhoahoc->giangvien->ngaysinh))}}</td>
			</tr>
			<tr>
				<td colspan="2" class="ten">SỐ CMND</td>
				<td colspan="4">{{$Hosokhoahoc->giangvien->cmnd}}</td>
			</tr>
			
			<tr>
				<td colspan="2" class="ten">Chức danh khoa học / học vị</td>
				<td colspan="4">{{$Hosokhoahoc->giangvien->trinhdo->ten_vi}}</td>
			</tr>

			<tr>
				<td colspan="2" class="ten">Chức vụ Hành chính</td>
				<td colspan="4">{{$Hosokhoahoc->giangvien->chucvu->ten_vi}}</td>
			</tr>
			<tr>
				<td colspan="2" class="ten">Hướng nghiên cứu</td>
				<td colspan="4">{{$Hosokhoahoc->huongnghiencuu_vi}}</td>
			</tr>
			<tr>
				<td colspan="6">NƠI CÔNG TÁC HIỆN TẠI</td>
			</tr>
			<tr>
				<td colspan="2" class="text-right">Đơn vị công tác</td>
				<td colspan="4">{{$Hosokhoahoc->tencoquan_vi}}</td>
			</tr>
			<tr>
				<td colspan="2" class="text-right">Phòng ban / Bộ môn</td>
				<td colspan="4">{{$Hosokhoahoc->tenphongban}}</td>
			</tr>
			<tr>
				<td colspan="2" class="text-right">Địa chỉ</td>
				<td colspan="4">{{$Hosokhoahoc->diachicoquan}}</td>
			</tr>

			<tr>
				<td colspan="6">ĐỊA CHỈ EMAIL</td>
			</tr>
			<tr>
				<td colspan="2" class="text-right">Email chính</td>
				<td colspan="4">{{$Hosokhoahoc->giangvien->email}}</td>
			</tr>
			<!-- <tr>
				<td colspan="2" class="text-right">Email thay thế</td>
				<td colspan="4">{{$Hosokhoahoc->giangvien->email}}</td>
			</tr> -->

			<tr>
				<td colspan="6">ĐIỆN THOẠI</td>
			</tr>
			<tr>
				<td colspan="2" class="text-right">Số cơ quan</td>
				<td colspan="4">{{$Hosokhoahoc->socoquan}}</td>
			</tr>
			<tr>
				<td colspan="2" class="text-right">Số di động</td>
				<td colspan="4">{{$Hosokhoahoc->giangvien->dienthoai}}</td>
			</tr>
			<tr>
				<td colspan="2" class="text-right">Số fax</td>
				<td colspan="4">{{$Hosokhoahoc->sofaxcoquan}}</td>
			</tr>
			
			<tr>
				<td colspan="6" class="tieude">Quá trình đào tạo về chuyên môn và khoa học</td>
			</tr>

			<tr class="text-center" style="background:#E95A13;color:white;">
				<td width="5%">STT</td>
				<td>Thời gian</td>
				<td>Cơ sở đào tạo</td>
				<td>Chuyên ngành</td>
				<td>Học vị</td>
				<td width="10%">Minh chừng</td>
			</tr>
			<?php $i=1; ?>
			@foreach ($Hosokhoahoc->quatrinhdaotao as $qtdt)
				<tr>
					<td>{!!$i++!!}</td>
					<td width="20%">Từ: {{date('d-m-Y', strtotime($qtdt->ngaybatdau))}} &nbsp;&nbsp; Đến: {{date('d-m-Y', strtotime($qtdt->ngayketthuc))}}</td>
					<td>{{$qtdt->tencoso_vi}}</td>					
					<td>{{$qtdt->chuyennganh_vi}}</td>
					<td>{{$qtdt->hocvi_vi}}</td>
					<td class="text-center">@if ($qtdt->minhchung!='khong' && $qtdt->minhchung!='') <a style="background:transparent;color:blue;" href="ht96_pdf/{{$qtdt->minhchung}}"  target="_blank">Có</a> @endif</td>
				</tr>
			@endforeach
			<tr>
				<td colspan="6" class="tieude">Kinh nghiệm và thành tích nghiên cứu</td>
			</tr>

			<tr>
				<td colspan="6" class="" style="padding:0!important;background:#999966;font-weight:bold;border-bottom:none;border-top:none;">1 Hướng nghiên cứu theo đuổi</td>
			</tr>
			<tr>
				<td colspan="6" style="border-bottom:none;border-top:none;">{{$Hosokhoahoc->huongnghiencuu_vi}}</td>
			</tr>
			<tr>
				<td colspan="6" class="" style="padding:0!important;background:#999966;font-weight:bold;border-bottom:none;border-top:none;">2. Danh sách đề tài/dự án nghiên cứu đã tham gia thực hiện hoặc nộp hồ sơ</td>
			</tr>

			<tr class="text-center" style="background:#E95A13;color:white;">
				<td width="5%">STT</td>
				<td colspan="2">Tên đề tài / dự án</td>
				<td>Cơ quan tài trợ</td>
				<td>Thời gian thưc hiện</td>
				<td>Vai trò</td>				
			</tr>
			

			</table>


		<table class="mytable2" style="width:100%">
			<tr>
				<td colspan="8" class="" style="padding:0!important;background:#999966;font-weight:bold;border-bottom:none;border-top:none;">3. Danh sách kết quả nghiên cứu đã được công bố hoặc đăng ký</td>
			</tr>

			<tr class="text-center" style="background:#E95A13;color:white;">
				<td width="5%">#</td>
				<td width="20%">Tên tác giả</td>
				<td width="20%">Tên sản phẩm</td>
				<td width="20%">Tên tạp chí/NXB/Nơi cấp</td>
				<td style="width:8%!important">ISSN</td>
				<td width="5%">Năm</td>	
				<td width="10%" class="text-center">Minh chứng</td>	
				<td width="15%">Ghi chú</td>		
			</tr>
			
			@foreach ($Hosokhoahoc->nghiencuudacongbo as $nccb)
				<tr>
					<td>{{$nccb->id_loaiketqua}}</td>
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
					<td colspan="7">{{$LKQ->ten_vi}}</td>
				</tr>
			@endforeach
			</table>
		


	</div>
	

 </div>
@endsection