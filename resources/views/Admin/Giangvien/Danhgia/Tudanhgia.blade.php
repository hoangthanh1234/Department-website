@extends('Admin.Giangvien.Danhgia.Master')
@section('Tabvalue')
<div role="tabpanel" class="tab-pane  @if ($tab==4) active @endif" id="profile">

<br>

<form method="post" action="set_giangvien/danh-gia-vien-chuc/tu-danh-gia/4" enctype="multipart/form-data" >
    <input type="text" hidden name="id_phieu" value="{{ $Phieudanhgia->id }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <h3>I. KẾT QUẢ TỰ ĐÁNH GIÁ</h3>
    <div class="form-group">
        <label for="">1. Chính trị, tư tưởng:</label>
        <textarea name="chinhTriTuTuong" class="form-control" cols="" rows="3">{{ $Phieudanhgia->chinhTriTuTuong }}</textarea>
    </div>
    <div class="form-group">
        <label for="">2. Đạo đức lối sống:</label>
        <textarea name="daoDucLoiSong" class="form-control" cols="" rows="3">{{ $Phieudanhgia->daoDucLoiSong }}</textarea>
    </div>
    <div class="form-group">
        <label for="">3. Tác phong, lề lối làm việc:</label>
        <textarea name="tacPhong" class="form-control" cols="" rows="3">{{ $Phieudanhgia->tacPhong }}</textarea>
    </div>
    <div class="form-group">
        <label for="">4. Ý thức tổ chức kỷ luật</label>
        <textarea name="toChucKyLuat" class="form-control" cols="" rows="3">{{ $Phieudanhgia->toChucKyLuat }}</textarea>
    </div>
    <div class="form-group">
        <label for="">5. Kết quả thực hiện chức trách, nhiệm vụ được giao (xác định rõ nội dung công việc thực hiện; tỷ lệ hoàn thành, chất lượng, tiến độ công việc):</label>
        <span>Bảng đánh giá từ hệ thống</span>
    </div>
    <div class="form-group">
        <label for="">6. Thái độ phục vụ khách hàng (nhân dân, sinh viên, học viên, doanh nghiệp….):</label>
        <textarea name="thaiDoPhucVu" class="form-control" cols="" rows="3">{{ $Phieudanhgia->thaiDoPhucVu }}</textarea>
    </div>
    <h4>PHẦN DÀNH RIÊNG CHO VIÊN CHỨC QUẢN LÝ</h4>
    <div class="form-group">
        <label for="">7. Kết quả hoạt động của cơ quan, tổ chức, đơn vị được giao lãnh đạo, quản lý, phụ trách (xác định rõ nội dung công việc thực hiện; tỷ lệ hoàn thành, chất lượng, tiến độ công việc):</label>
        <textarea name="kqHoatDongCoQuan" class="form-control" cols="" rows="3">{{ $Phieudanhgia->kqHoatDongCoQuan }}</textarea>
    </div>
    <div class="form-group">
        <label for="">8. Năng lực lãnh đạo, quản lý:</label>
        <textarea name="nangLucLanhDao" class="form-control" cols="" rows="3">{{ $Phieudanhgia->nangLucLanhDao }}</textarea>
    </div>
    <div class="form-group">
        <label for="">9. Năng lực tập hợp, đoàn kết:</label>
        <textarea name="nangLucDoanKet" class="form-control" cols="" rows="3">{{ $Phieudanhgia->nangLucDoanKet }}</textarea>
    </div>
    <h3>II. TỰ ĐÁNH GIÁ, XẾP LOẠI CHẤT LƯỢNG</h3>
    <div class="form-group">
        <label for="">1. Tự nhận xét ưu, khuyết điểm:</label>
        <textarea name="tuNhanXet" class="form-control" cols="" rows="3">{{ $Phieudanhgia->tuNhanXet }}</textarea>
    </div>
    <div class="form-group">
        <label for="">2. Tự xếp loại chất lượng: <span style="font-style: italic;">(Hoàn thành xuất sắc nhiệm vụ; hoàn thành tốt nhiệm vụ; hoàn thành nhiệm; không hoàn thành nhiệm vụ)</span></label>
        <textarea name="tuXepLoai" class="form-control" cols="" rows="3">{{ $Phieudanhgia->tuXepLoai }}</textarea>
    </div>
    <a href="set_giangvien/PDF/{{$Phieudanhgia->id}}" target="_blank">
		<input type="button" value="Xuất PDF" class="btn btn-success pull-left" style="margin-bottom:20px;">
	</a>
    @if($Thongbaodanhgia->trangthai == 1)
		<input type="submit" value="Xác nhận" class="btn btn-success pull-right btn-xacnhan" style="margin-bottom:20px;margin-right:20px;">
	@endif
</form>

@endsection
