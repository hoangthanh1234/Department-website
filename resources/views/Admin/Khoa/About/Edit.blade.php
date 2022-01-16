@extends('Admin.Master')
@section('title',' cập nhật giới thiệu')
@section('content') 

<div class="h3 padding20 text-center">Cập nhật giới thiệu</div>
<div class="container">
  @if(count($errors)>0)
    <div class="alert alert-warning">
      <strong>Cảnh báo ! ! !</strong>  <br>     
       @foreach($errors->all() as $err)            
        {{$err}}! &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br>            
       @endforeach         
    </div>
  @endif

 @if(session('thongbao'))
    <div class="alert alert-success">
      {{session('thongbao')}}
    </div>
 @endif
</div>
<form name="" method="post" action="set_admin/about/edit/{{$About->id}}" enctype="multipart/form-data">
  <div class="container-fluid">
		<div id="tabs">   
	        <ul id="ultabs">				 
	            <li type="#tab1" class="ten2x">Thông tin (VI)</li>
	            <li type="#tab2" class="ten2x">Thông tin (EN)</li>                                            
	        </ul>
     <div class="clearfix"></div>
                        
    <div id="content_tabs"><br>
      <div class="row">
        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-4">
          <b class="ten2x">Chọn đối tượng</b>
        </div>
        <div class="col-lg-10 col-md-9 col-sm-8 col-xs-8">
          <select name="id_bomon" class="form-control width50">
            @foreach($Bomon as $BM)
              <option value="{{$BM->id}}" <?php if($BM->id==$About->id_bomon) echo "selected"; ?>>{{$BM->ten_vi}}</option>
             @endforeach           
           </select>
        </div>          
      </div><br>
      <div id="tab1">
        <b class="ten2x">Tiêu đề</b><input type="text" name="ten_vi" value="{{$About->ten_vi}}" class="form-control" /><br/>
        <b class="ten2x">Mô tả</b><br/><textarea name="mota_vi"  id="tiny">{{$About->mota_vi}}</textarea><br/>  
        <b class="ten2x">Nội dung</b><br/><textarea name="noidung_vi"  id="tiny1">{{$About->noidung_vi}}</textarea><br/> 
        <b class="ten2x">Title</b><input type="text" name="title_vi" value="{{$About->title_vi}}" class="form-control" /><br/>
        <b class="ten2x">Description</b><input type="text" name="description_vi" value="{{$About->description_vi}}" class="form-control"/><br/>
      </div> 
      <div id="tab2">
        <b class="ten2x">Tiêu đề</b><input type="text" name="ten_en" value="{{$About->ten_en}}"  class="form-control" /><br/>
        <b class="ten2x">Mô tả</b><br/><textarea name="mota_en"  id="tiny2">{{$About->mota_en}}</textarea><br/> 
        <b class="ten2x">Nội dung</b><br/><textarea name="noidung_en"  id="tiny3">{{$About->noidung_en}}</textarea><br/>
        <b class="ten2x">Title</b><input type="text" name="title_en" value="{{$About->title_en}}" class="form-control" /><br/> <b class="ten2x">Description</b><input type="text" name="description_en" value="{{$About->description_en}}" class="form-control"/><br/>
      </div> 
    </div>
		<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
		<input type="submit" value="Lưu" class="btn btn-success btn2"/>
		<a href="set_admin/about/list"><input type="button" value="Thoát"  class="btn btn-danger btn2" /></a>
	</div>
</div>
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
@endsection

