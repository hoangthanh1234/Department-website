@extends('Admin.Master')
@section('title',' thêm chương trình đào tạo')
@section('content') 

<div class="h3 padding20 text-center">Thêm chương trình đào tạo mới</div>
<div class="container" style="max-width:500px;">
 @if(count($errors)>0)
      <div class="alert alert-warning">
        <strong>Cảnh báo ! ! !</strong>  <br>     
         @foreach($errors->all() as $err)            
            {{$err}}! &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br>            
          @endforeach         
      </div>
    @endif  

     @if(session('thongbao'))
                <div class="alert alert-warning">
                        {{session('thongbao')}}
                </div>
     @endif
</div>
<form  method="post" action="set_admin/chuongtrinh/add" enctype="multipart/form-data">
   	<div class="containe-fluid">   
		<div id="tabs">  

    <div class="row" style="padding-left:20px;">
        <div class="col-lg-1 col-md-2 col-sm-3 col-xs-4"><b class="ten2x">Chọn hình</b></div>
        <div class="col-lg-10 col-md-9 col-sm-9 col-xs-8"><input type="file" name="hinhanh"></div>
        <div class="clearfix"></div>
        <p style="padding-left:20px;padding-top:10px;">hỗ trợ file jpg, png,jpeg (width:800px height:500px tốt nhất)</p>
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
          

	     <ul id="ultabs">				 
	       <li type="#tab1" class="ten2x">Thông tin (VI)</li>
	       <li type="#tab2" class="ten2x">Thông tin (EN)</li> 
         <li type="#tab3" class="ten2x">Môn Học</li>                              
         <li type="#tab4" class="ten2x">Tổ hợp xét tuyển</li> 
	     </ul>
        <div class="clearfix"></div>
                        
        <div id="content_tabs">               
            <div id="tab1">
            	   <b class="ten2x">Tên chương trình</b><input type="text" name="ten_vi" value="{{old('ten_vi')}}"  class="form-control" /><br/> 
                 <b class="ten2x">Mô tả</b><textarea name="mota_vi" id="tiny">{{old('mota_vi')}}</textarea><br/>
                 <b class="ten2x">Kỹ năng</b><textarea  name="kynang_vi" id="tiny1">{{old('kynang_vi')}}</textarea><br/>
                 <b class="ten2x">Cơ hội</b><textarea name="cohoi_vi" id="tiny2">{{old('cohoi_vi')}}</textarea><br/>               
            </div> 
            
            <div id="tab2">
            	   <b class="ten2x">Tên chương trình</b><input type="text" name="ten_en" value="{{old('ten_en')}}"  class="form-control" /><br/> 
                 <b class="ten2x">Mô tả</b> <textarea  name="mota_en" id="tiny3">{{old('mota_en')}}</textarea><br/>
                 <b class="ten2x">Kỹ năng</b><textarea name="kynang_en" id="tiny4">{{old('kynang_en')}}</textarea><br/>
                 <b class="ten2x">Cơ hội</b><textarea name="cohoi_en" id="tiny5">{{old('cohoi_en')}}</textarea><br/>  
            </div>  

            <div id="tab3">
                <div style="height:400px;overflow-y:scroll;width:100%;margin-top:30px;" id="mon">               
                  @foreach ($Mon as $Mo)
                    <div class="row">
                        <div class="col-lg-1 col-sm-1 col-xs-1 text-right">
                            <div class="form-group">
                                <input type="checkbox" name="monhoc[]" class="flat-red" value="{{$Mo->id}}">
                            </div>
                        </div>
                        <div class="col-lg-10 col-sm-10 col-xs-10 ten2x" style="font-weight:normal;text-align: left;">
                              <label> {{$Mo->ten_vi}}</label>
                        </div>
                    </div>
                    @endforeach
                 </div>
            </div>                   

            <div id="tab4">
                 <div style="height:400px;overflow-y:scroll;width:100%;margin-top:30px;">
                  @foreach ($Tohop as $TH)
                    <div class="row">
                        <div class="col-lg-1 col-sm-1 col-xs-1 text-right">
                          <div class="form-group">
                            <input type="checkbox" name="tohop[]" class="flat-red" value="{{$TH->id}}">
                          </div>
                        </div>
                        <div class="col-lg-10 col-sm-10 col-xs-10 ten2x" style="font-weight:normal;text-align: left;">
                          <label style="width:300px!important;">{{$TH->ten}}&nbsp;&nbsp;({{$TH->monxt}})&nbsp;&nbsp;&nbsp;</label>Điểm&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="{{$TH->id}}" style="width:30px;">
                        </div>
                    </div>
                    @endforeach
                 </div>
            </div>
            
        </div>

        	
		    
			<input type="submit" value="Lưu" class="btn btn-success btn2"/>
			<a href="set_admin/chuongtrinh/list"><input type="button" value="Thoát"  class="btn btn-danger btn2" /></a>
	</div><!---END #tabs-->	
</div>
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
  @endsection


@section('script')
  <script type="text/javascript"> 
     
    $(document).ready(function(){
      $('#bacdaotao').change(function(){
        var id_bacdaotao=$(this).val();
        $.get("set_admin/ajax/loadmon/"+id_bacdaotao,function(data){
            $('#mon').html(data);
        });
      });

      $('#bomon').change(function(){
        var id_batdaotao=$('#batdaotao').val();
        var id_bomon=$(this).val();
        $.get("set_admin/ajax/loadbomon/"+id_bomon+"/"+id_batdaotao,function(data){
            $('#mon').html(data);
        });
      });

    });
  </script>
@endsection