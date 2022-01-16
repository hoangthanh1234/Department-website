@extends('Admin.Master')
@section('title',' cập nhật chương trình đào tạo')
@section('content') 

<div class="h3 padding20 text-center">cập nhật chương trình đào tạo</div>
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



<form name="" method="post" action="set_admin/chuongtrinh/edit/{{$Chuongtrinh->id}}" enctype="multipart/form-data">
    <div class="container-fluid">   
    <div id="tabs">  

    <div class="row" style="padding-left:20px;padding-top:30px;">
          <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
              <div class="row">
                   <div class="col-lg-3 colmd-3 col-sm-4 col-xs-5"><b class="ten2x">Chọn hình</b></div>
                   <div class="col-lg-7 col-md-9 col-sm-8 col-xs-7"><input type="file" name="hinhanh"></div>
                   <div class="clearfix"></div>
                   <p style="padding-left:20px;padding-top:10px;">hỗ trợ file jpg, png,jpeg (width:800px height:500px tốt nhất)</p>
              </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-left">
            <img src="ht96_image/chuongtrinh/{{$Chuongtrinh->hinhanh}}" style="width:100px;height:100px;">
          </div>         
    </div>


  <div class="row" style="margin:20px 0;">      
            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                  <div class="row">
                      <div class="col-lg-4 colmd-2 col-sm-3 col-xs-4"><b class="ten2x">Bật đào tạo</b></div>
                      <div class="col-lg-8 col-md-9 col-sm-9 col-xs-8">
                        <select name="id_bacdaotao" id="bacdaotao" class="form-control width50">
                        @foreach ($Bacdaotao as $Bac)
                        <option value="{{$Bac->id}}" @if ($Bac->id == $Chuongtrinh->id_bacdaotao) selected      @endif>{{$Bac->ten_vi}}
                        </option>
                        @endforeach
                      </select>
                    </div>
                      <div class="clearfix"></div>              
                  </div>
            </div>

             <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                  <div class="row">
                      <div class="col-lg-4 col-md-4 col-sm-3 col-xs-4 clear text-center"><b class="ten2x">Hệ đào tạo</b></div>
                      <div class="col-lg-8 col-md-8 col-sm-9 col-xs-8 clear">
                        <select name="id_hedaotao" class="form-control width50">
                        @foreach ($Hedaotao as $He)
                        <option value="{{$He->id}}" @if ($He->id == $Chuongtrinh->id_hedaotao) selected @endif>{{$He->ten_vi}}</option>
                        @endforeach
                      </select>
                    </div>
                      <div class="clearfix"></div>              
                  </div>
            </div>

             <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                 <div class="row" >
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-4"><b class="ten2x">Bộ môn</b></div>
                      <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <select name="id_bomon" class="form-control width50" id="bomon">
                        @foreach ($Bomon as $BM)
                        <option value="{{$BM->id}}" @if ($BM->id == $Chuongtrinh->id_bomon) selected @endif>{{$BM->ten_vi}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="clearfix"></div>              
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
                 <b class="ten2x">Tên chương trình</b><input type="text" name="ten_vi" value="{!!$Chuongtrinh->ten_vi!!}"  class="form-control" /><br/> 
                 <b class="ten2x">Mô tả</b><textarea name="mota_vi" id="tiny">{!!$Chuongtrinh->mota_vi!!}</textarea><br/>
                 <b class="ten2x">Kỹ năng</b><textarea  name="kynang_vi" id="tiny1">{!!$Chuongtrinh->kynang_vi!!}</textarea><br/>
                 <b class="ten2x">Cơ hội</b><textarea name="cohoi_vi" id="tiny2">{!!$Chuongtrinh->cohoi_vi!!}</textarea><br/>               
            </div> 
            
            <div id="tab2">
                 <b class="ten2x">Tên chương trình</b><input type="text" name="ten_en" value="{!!$Chuongtrinh->ten_en!!}"  class="form-control" /><br/> 
                 <b class="ten2x">Mô tả</b> <textarea  name="mota_en" id="tiny3">{!!$Chuongtrinh->mota_en!!}</textarea><br/>
                 <b class="ten2x">Kỹ năng</b><textarea name="kynang_en" id="tiny4">{!!$Chuongtrinh->kynang_en!!}</textarea><br/>
                 <b class="ten2x">Cơ hội</b><textarea name="cohoi_en" id="tiny5">{!!$Chuongtrinh->cohoi_en!!}</textarea><br/>  
            </div>  

            <div id="tab3">
              <div class="row">              
                <div class="col-lg-6 col-md-6" style="height:400px;overflow-y:scroll;margin-top:30px;" >
                  <p class="text-center ten2x"  style="font-size:20px;">Chọn Môn</p>
                  <div id="mon">
                  @foreach ($Mon as $Mo)
                    <div class="row">                        
                        <div class="col-lg-12 col-sm-12 col-xs-12 ten2x" style="font-weight:normal;text-align: left;">
                              <label> {{$Mo->ten_vi}}</label>
                                  <p class="themmon" data-id="{{$Mo->id}}" style="float:right;">Thêm</p>                                     
                        </div>
                    </div>
                    <p></p>
                    @endforeach
                  </div>
                 </div>
                 <div class="col-lg-6 col-md-6" style="height:400px;overflow-y:scroll;width:50%;margin-top:30px;" >
                  <p class="text-center ten2x" style="font-size:20px;">Môn hiện tại</p>
                  <div id="monht">
                  @foreach ($Monht as $Moht)
                    <div class="row">                       
                        <div class="col-lg-12 col-sm-12 col-xs-12 ten2x" style="font-weight:normal;text-align: left;">
                              <label> {{$Moht->mon->ten_vi}}</label> <p class="xoamon" data-id="{{$Moht->id_mon}}" style="float:right;">Xóa</p>
                        </div>
                    </div>
                    @endforeach
                  </div>
                 </div>
            </div>  
            </div>  


            <div id="tab4">
               <div class="row">              
                <div class="col-lg-6 col-md-6" style="height:400px;overflow-y:scroll;margin-top:30px;" id="mon">
                  <p class="text-center ten2x"  style="font-size:20px;">Chọn Tổ hợp</p>
                  @foreach ($Tohop as $TH)
                    <div class="row">                        
                        <div class="col-lg-12 col-sm-12 col-xs-12 ten2x" style="font-weight:normal;text-align: left;">
                              <label style="width:300px;"> {{$TH->ten}}&nbsp;&nbsp;({{$TH->monxt}})</label>
                              <input type="text" style="width: 50px;text-align: center;" id="them{{$TH->id}}"><p class="themtohop" data-id="{{$TH->id}}" style="float:right;">Thêm</p>
                        </div>
                    </div>
                    <p></p>
                    @endforeach
                 </div>
                 <div class="col-lg-6 col-md-6" style="height:400px;overflow-y:scroll;width:50%;margin-top:30px;" >
                  <p class="text-center ten2x" style="font-size:20px;">Tổ hợp hiện tại</p>
                  <div id="tohopht">
                  @foreach ($Tohopht as $TH_ht)
                    <div class="row">                       
                        <div class="col-lg-12 col-sm-12 col-xs-12 ten2x" style="font-weight:normal;text-align: left;">
                              <label style="width:300px;"> {{$TH_ht->tohop->ten}}&nbsp;&nbsp;({{$TH_ht->tohop->monxt}})</label>
                              <input type="text" style="width: 50px;text-align:center;" value="{{$TH_ht->diem}}" class="edittohop" data-id="{{$TH_ht->id_tohop}}"><p class="xoatohop" data-id="{{$TH_ht->id_tohop}}" style="float:right;">Xóa</p>
                        </div>
                    </div>
                    @endforeach
                  </div>
                 </div>
            </div>                  
            </div>
             </div>

              <div class="row" style="padding:30px;">
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-3">
                      <label class="tenx">Số thứ tự &nbsp;</label><input type="text" name="stt" value="{!!$Chuongtrinh->stt!!}" class="text-center" style="width:30px;"> 
                   </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-3"><label class="tenx">Hiển thị: &nbsp;&nbsp;&nbsp;</label><input type="checkbox" name="hienthi" class="flat-red" @if ($Chuongtrinh->hienthi==1) checked @endif></div>                             
             </div> 

           <input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
           <input type="submit" value="Lưu" class="btn btn-success btn2" onclick="set()" />
           <a href="set_admin/chuongtrinh/list"><input type="button" value="Thoát"  class="btn btn-danger btn2" /></a> 
        </div>

         
     

  </div><!---END #tabs--> 
</div>
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
  @endsection


@section('script')

  <script type="text/javascript">
    
   
    $(document).on('change', '#bomon', function(){
         var id_batdaotao=$('#batdaotao').val();
         var id_bomon=$(this).val();
        $.get("set_admin/ajax/loadbomonedit/"+id_bomon+"/"+id_batdaotao,function(data){
            $('#mon').html(data);
        });      
    });


    $(document).on('change', '#batdaotao', function(){
         var id_batdaotao=$(this).val();
        $.get("set_admin/ajax/loadmonedit/"+id_batdaotao,function(data){
            $('#mon').html(data);
        });       
    });



    $(document).on('click', '.xoamon', function(){
         var id_mon=$(this).data("id");
         var id_chuongtrinh=<?=$Chuongtrinh->id?>;
          $.ajax({

                url: "set_admin/ajax/xoamon/"+id_mon+"/"+id_chuongtrinh,
                type: 'GET',
                dataType: 'html', 

                success: function(data){                      
                         $('#monht').html(data);
                  },

                error: function(XMLHttpRequest, textStatus, errorThrown) {
                        alert("Status: " + textStatus+": "+errorThrown+"!!!! Vui Lòng kiểm tra Lại");
                  }

            });        
    });


    $(document).on('click', '.themmon', function(){ 

        var id_mon=$(this).data("id");
        var id_chuongtrinh=<?=$Chuongtrinh->id?>;

        $.ajax({

                url: "set_admin/ajax/themmon/"+id_mon+"/"+id_chuongtrinh,
                type: 'GET',
                dataType: 'html',  
                success: function(data){                      
                         $('#monht').html(data);
                    },
                error: function(XMLHttpRequest, textStatus, errorThrown) {                     
                        alert("Status: " + textStatus+": "+errorThrown+"!!!! Môn đã thuộc chương trình!!! Vui Lòng kiểm tra Lại");

                    }

            });  

        
    });



    $(document).on('click', '.themtohop', function(){ 

        var id_tohop=$(this).data("id");
        var id_chuongtrinh=<?=$Chuongtrinh->id?>;
        var diem=$('#them'+id_tohop).val();    
        if(diem == ''){                  
                 alert("Vui lòng nhập điểm cho tổ hợp");
                 return false;
        }
              

        $.ajax({

                url: "set_admin/ajax/themtohop/"+id_tohop+"/"+diem+"/"+id_chuongtrinh,
                type: 'GET',
                dataType: 'html',  
                success: function(data){                      
                         $('#tohopht').html(data);
                    },
                error: function(XMLHttpRequest, textStatus, errorThrown) {                     
                        alert("Status: " + textStatus+": "+errorThrown+"!!!! Tổ hợp đã thuộc chương trình!!! Vui Lòng kiểm tra Lại");

                    }

            });  
    });

     $(document).on('click', '.xoatohop', function(){ 
         var id_tohop=$(this).data("id");
         var id_chuongtrinh=<?=$Chuongtrinh->id?>;
                 
        $.ajax({

                url: "set_admin/ajax/xoatohop/"+id_tohop+"/"+id_chuongtrinh,
                type: 'GET',
                dataType: 'html',  
                success: function(data){                      
                         $('#tohopht').html(data);
                    },
                error: function(XMLHttpRequest, textStatus, errorThrown) {                     
                        alert("Status: " + textStatus+": "+errorThrown+"!!!! Tổ hợp đã thuộc chương trình!!! Vui Lòng kiểm tra Lại");

                    }

            });  
    });

     $(document).on('keyup','.edittohop',function(){

         var id_tohop=$(this).data("id");
         var id_chuongtrinh=<?=$Chuongtrinh->id?>;
         var diem=$(this).val();
         if(diem == ''){alert("Vui lòng nhập điểm cho tổ hợp");return false;}
                 
        $.ajax({

                url: "set_admin/ajax/edittohop/"+id_tohop+"/"+id_chuongtrinh+"/"+diem,
                type: 'GET',
                dataType: 'html',  
                success: function(data){                      
                         // $('#tohopht').html(data);
                    },
                error: function(XMLHttpRequest, textStatus, errorThrown) {                     
                        alert("Status: " + textStatus+": "+errorThrown+"!!!! Tổ hợp đã thuộc chương trình!!! Vui Lòng kiểm tra Lại");

                    }

            });  

     });

     
     
  </script>

@endsection