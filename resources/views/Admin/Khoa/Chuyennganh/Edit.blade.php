@extends('Admin.Master')
@section('title',' cập nhật chuyên ngành')
@section('content') 

<div class="h3 padding20 text-center">Cập nhật chuyên ngành</div>
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
<form name="" method="post" action="set_admin/chuyen-nganh/edit/{{$Chuyennganh->id}}" enctype="multipart/form-data">
        <div class="container-fluid">   

    <div id="tabs">           
          <ul id="ultabs">         
              <li type="#tab1" class="ten2x">Thông tin</li>
          </ul>
        <div class="clearfix"></div>
                        
        <div id="content_tabs">               
            <div id="tab1">
                <b class="ten2x">Bộ môn</b>      
                <select class="form-control" name="id_bomon">
                  @foreach($Bomon as $bm)
                    <option value="{{$bm->id}}" @if($bm->id == $Chuyennganh->id_bomon) selected @endif>{{$bm->ten_vi}}</option>
                  @endforeach
                </select>
                <br/>
                 <b class="ten2x">Tên chuyên ngành (VI)</b><input type="text" value="{{$Chuyennganh->ten_vi}}" name="ten_vi"  class="form-control" /><br/>   
                 <b class="ten2x">Tên chuyên ngành (EN)</b><input type="text" value="{{$Chuyennganh->ten_en}}" name="ten_en"  class="form-control" /><br/> 
            </div>          
            
        </div>
       
      <input type="submit" value="Lưu" class="btn btn-success btn2"/>
      <a href="set_admin/chuyen-nganh/list/{{$Chuyennganh->id_bomon}}"><input type="button" value="Thoát"  class="btn btn-danger btn2" /></a>

  </div><!---END #tabs--> 
</div>
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
  @endsection