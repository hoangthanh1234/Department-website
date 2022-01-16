@extends('Admin.Khoa.Chuongtrinh.Them.Masteradd')
@section('Tabvalue')
<div role="tabpanel" class="tab-pane @if ($tab==1) active @endif" id="profile">
<form  method="post" action="set_bomon/chuong-trinh/them-chuong-trinh/thong-tin-chung.html" enctype="multipart/form-data">

<div class="row" style="margin-top:20px;">
	<div class="col-lg-12 col-md-12">
		<div class="col-lg-2 col-md-2 col-sm-3 col-xs-4"><b class="ten2x">Chọn hình</b></div>
       	<div class="col-lg-10 col-md-9 col-sm-9 col-xs-8"><input type="file" name="hinhanh"></div> 
	</div>              
</div>

 <div class="row" style="margin:20px 0;">      
    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-4"><b class="ten2x">Bậc đào tạo</b></div>
            <div class="col-lg-8 col-md-8 col-sm-6 col-xs-8">
                <select name="id_bacdaotao" id="bacdaotao" class="form-control">
                    @foreach ($Bacdaotao as $Bac)
                    <option value="{{$Bac->id}}">{{$Bac->ten_vi}}</option>
                    @endforeach
                </select>
           </div>                                 
        </div>
    </div>

    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-4"><b class="ten2x">Hệ đào tạo</b></div>
            <div class="col-lg-8 col-md-8 col-sm-6 col-xs-8 clear">
                <select name="id_hedaotao" class="form-control">
                    @foreach ($Hedaotao as $He)
                    <option value="{{$He->id}}">{{$He->ten_vi}}</option>
                    @endforeach
                </select>
            </div>                                   
        </div>
   </div>

    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
        <div class="row" >
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-4"><b class="ten2x">Bộ môn</b></div>
            <div class="col-lg-8 col-md-8 col-sm-6 col-xs-8">
                <select name="id_bomon" class="form-control" id="bomon">
                    @foreach ($Bomon as $BM)
                    <option value="{{$BM->id}}">{{$BM->ten_vi}}</option>
                    @endforeach
                </select>
            </div>                                 
        </div>
    </div>
    </div>

	<p class="ten2x" style="font-size:20px;margin-top:30px;margin-bottom:30px;background:#E95A13;padding:5px;color:#ffffff;text-align:center;">Vui lòng nhập thông tin chương trình bằng tiếng Việt</p>
	<b class="ten2x">Tên chương trình</b><input type="text" name="ten_vi" value="{{old('ten_vi')}}"  class="form-control" /><br/> 
    <b class="ten2x">Mô tả</b><textarea name="mota_vi" id="tiny">{{old('mota_vi')}}</textarea><br/>
    <b class="ten2x">Kỹ năng</b><textarea  name="kynang_vi" id="tiny1">{{old('kynang_vi')}}</textarea><br/>
    <b class="ten2x">Cơ hội</b><textarea name="cohoi_vi" id="tiny2">{{old('cohoi_vi')}}</textarea><br/>
    <p class="ten2x" style="font-size:20px;margin-top:30px;margin-bottom:30px;background:#E95A13;padding:5px;color:#ffffff;text-align:center;">Vui lòng nhập thông tin chương trình bằng tiếng Anh</p>
    <b class="ten2x">Tên chương trình</b><input type="text" name="ten_en" value="{{old('ten_en')}}"  class="form-control" /><br/> 
    <b class="ten2x">Mô tả</b> <textarea  name="mota_en" id="tiny3">{{old('mota_en')}}</textarea><br/>
    <b class="ten2x">Kỹ năng</b><textarea name="kynang_en" id="tiny4">{{old('kynang_en')}}</textarea><br/>
    <b class="ten2x">Cơ hội</b><textarea name="cohoi_en" id="tiny5">{{old('cohoi_en')}}</textarea><br/>    
    <input type="submit" class="btn btn-success pull-right" value="Tiếp tục" style="margin:0 15px;">	
    <a href="set_bomon/chuong-trinh/list"><input type="button" class="btn btn-danger pull-right" value="Thoát"></a>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>

@endsection

