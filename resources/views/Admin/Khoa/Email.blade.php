@extends('Admin.Master')
@section('title','Gởi Email tới sinh viên')
@section('content') 

   <div class="container" style="max-width:500px;">
     @if(count($errors)>0)
          <div class="alert alert-warning" style="margin-top:20px;">
              <strong>Cảnh báo ! ! !</strong>  <br>     
               @foreach($errors->all() as $err)            
                  {{$err}}! &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br>            
                @endforeach         
          </div>
     @endif  

     @if(session('thongbao'))
           <div class="alert alert-warning" style="margin-top:20px;">
                {{session('thongbao')}}
           </div>
     @endif
</div>
	<div class="content-wrapper" style="margin-left:0!important;">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content">
      <form method="post" action="set_admin/goiemail" enctype="multipart/form-data">

      <div class="row">
                    <div class="col-lg-5 col-md-5 col-xs-12">
                       <b class="ten2x">Bộ môn</b><br>
                        <select name="bomon" id="bomon" class="form-control select2">
                            @foreach ($Bomon as $bm)
                            <option value="{{$bm->id}}">{{$bm->ten_vi}}</option>
                            @endforeach
                      </select>
                    </div>

                    <div class="col-lg-6 col-md-6 col-xs-12">
                       <b class="ten2x">Lớp</b><br>
                        <select name="lops[]" id="lop" multiple   class="form-control select2">
                            @foreach ($Lop as $l)
                            <option value="{{$l->id}}">{{$l->tenlop}}</option>
                            @endforeach
                      </select>
                    </div>
     </div>

     <br>
      <div class="row">
        <div class="col-lg-12 col-md-12">
           <div class="form-group">
                <span class="ten2x">Gởi theo bộ môn &nbsp; &nbsp;</span><input type="checkbox" name="goibm" class="flat-red">
            </div>
        </div>
      </div>    
      <br>

      <div class="row">
       		<div class="col-md-12 col-lg-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Giởi thông báo đến sinh viên</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">             
              <div class="form-group">
                <input class="form-control" name="title" placeholder="Tiêu đề:" value="{{old('title')}}">
              </div>
              <div class="form-group">
                    <textarea id="compose-textarea" name="noidung"  class="form-control" style="height: 300px">
                          {{old('noidung')}}
                    </textarea>
              </div>
                <div class="form-group">
                    <div class="btn btn-default btn-file">
                      <i class="fa fa-paperclip"></i> Chọn file
                      <input type="file" name="files[]" multiple>
                    </div>
              </div>
              <div class="form-group">
                   <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-envelope-o"></i> Gửi</button>
              </div>


                   
            
            
            <!-- /.box-body -->
            <div class="box-footer">
              <div class="pull-right">
               
               
              </div>
             
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /. box -->
        </div>
      </div>  
    </div>
     <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
    </form>   
    </section>   
  </div>
@endsection


@section('script')
	<script type="text/javascript">
		$(".checkbox-toggle").click(function () {
      var clicks = $(this).data('clicks');
      if (clicks) {
        //Uncheck all checkboxes
        $(".mailbox-messages input[type='checkbox']").iCheck("uncheck");
        $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
      } else {
        //Check all checkboxes
        $(".mailbox-messages input[type='checkbox']").iCheck("check");
        $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
      }
      $(this).data("clicks", !clicks);
    });

    //Handle starring for glyphicon and font awesome
    $(".mailbox-star").click(function (e) {
      e.preventDefault();
      //detect type
      var $this = $(this).find("a > i");
      var glyph = $this.hasClass("glyphicon");
      var fa = $this.hasClass("fa");

      //Switch states
      if (glyph) {
        $this.toggleClass("glyphicon-star");
        $this.toggleClass("glyphicon-star-empty");
      }

      if (fa) {
        $this.toggleClass("fa-star");
        $this.toggleClass("fa-star-o");
      }
    });
	</script>

  <script>
  $(function () {
    //Add text editor
    $("#compose-textarea").wysihtml5();
  });

$(document).on('change','#bomon',function(){
      var id=$(this).val();      
      $.get("set_admin/ajax/loadlop/"+id,function(data){
            $('#lop').html(data);
        });
})
</script>
@endsection