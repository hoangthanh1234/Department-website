@extends('Admin.Master')
@section('title',' thêm kết quả thi mới')
@section('content') 

<div class="h3 padding20 text-center">Thêm Biễu mẫu mới mới</div>
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
<form name="" method="post" action="set_admin/bieumau/add" enctype="multipart/form-data">
 <div class="container-fluid">  
      <div id="tabs"> 
            <ul id="ultabs">         
                  <li type="#tab1" class="ten2x">Thông tin</li>                                          
            </ul>          
            <div id="content_tabs">               
                <div id="tab1">

                    <div class="row" style="margin-top:20px;">
                        <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                             <b class="ten2x">Tên biểu mẫu</b><br>
                             <input type="text" name="ten" value="{{old('ten')}}" class="form-control">
                        </div> 
                    </div>
                    <div class="row" style="margin-top:20px;">
                      <div class="col-lg-12 col-md-12">
                               <div class="form-group">
                                    <div class="btn btn-default btn-file">
                                      <i class="fa fa-paperclip"></i> Choose File
                                      <input type="file" name="file" required>
                                    </div>
                               </div>
                        </div>
                    </div>                                                  
                </div> 
            </div>           
          <input type="submit" value="Lưu" class="btn btn-success btn2" />
          <a href="set_admin/bieumau/list"><input type="button" value="Thoát"  class="btn btn-danger btn2" /></a>
      </div>
  </div>
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
@endsection

