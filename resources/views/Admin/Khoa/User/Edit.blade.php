@extends('Admin.Master')
@section('title','Cập nhật user')
@section('content') 

<div class="h3 padding20 text-center">Cập nhật User</div>
<div class="container" style="max-width:500px;">
 @if(count($errors)>0)
      <div class="alert alert-warning">
        <strong>Cảnh báo ! ! !</strong>  <br>     
         @foreach($errors->all() as $err)            
            {{$err}}! &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br>            
          @endforeach         
      </div>
    @endif  
</div>
<form name="" method="post" action="set_admin/user/edit/{{$User->id}}" enctype="multipart/form-data">
 <div class="container-fluid"> 
    <div id="tabs">   

          <div class="row" style="margin-bottom:25px;">
            <div class="col-lg-6 col-md-6">
                <b>Bộ môn</b>
                <select name="bomon" class="form-control select2">  
                    @foreach($Bomon as $bm)
                      <option value="{{$bm->id}}" @if($bm->id==$User->bomon) selected @endif>{{$bm->ten_vi}}</option>
                    @endforeach                  
                </select>
            </div> 

            <div class="col-lg-6 col-md-6">
                <b>Quyền</b>
                <select name="level" class="form-control select2">  
                    <option value="1"  @if($User->level==1) selected @endif>Admin / Khoa</option>
                    <option value="2" @if($User->level==2) selected @endif>Trưởng bộ môn</option>
                </select>
            </div>
          </div>

          <ul id="ultabs">         
              <li type="#tab1" class="ten2x">Thông tin (VI)</li>                                                       
          </ul>
        <div class="clearfix"></div>
                        
        <div id="content_tabs">               
            <div id="tab1">
                  <b class="ten2x">Tên</b><input type="text" name="ten"  value="{{$User->ten}}" class="form-control" /><br/>
                   <b class="ten2x">Email</b><input type="text" name="email" value="{{$User->email}}" class="form-control"/><br/>
                  
                 
            </div> 
            
            
              
        </div>           
       
      <input type="submit" value="Lưu" class="btn btn-success btn2" />
      <a href="set_admin/user/list"><input type="button" value="Thoát"  class="btn btn-danger btn2" /></a>

  </div><!---END #tabs--> 
</div>
 <input type="hidden" name="_token" value="{{ csrf_token() }}">

</form>
  @endsection

  