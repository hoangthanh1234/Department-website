@extends('Admin.Master')
@section('title','Trả lời Email')
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
           <div class="alert alert-warning">
                {{session('thongbao')}}
           </div>
     @endif
</div>
	<div class="content-wrapper" style="margin-left:0!important;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Mailbox
        <small style="color:red;"></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Mailbox</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <form method="post" action="set_giangvien/hoidap/traloi/{{$Cauhoi->id}}" enctype="multipart/form-data">
      <div class="row">
       		<div class="col-md-12 col-lg-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Trả lời mail cho {{$Cauhoi->ten}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="form-group">
                <input class="form-control" name="ten" placeholder="To:" readonly value="{{$Cauhoi->ten}}">
              </div>
              <div class="form-group">
                <input class="form-control" name="title" placeholder="Tiêu đề:" value="{{old('title')}}">
              </div>
              <div class="form-group">
                    <textarea id="compose-textarea" name="noidung"  class="form-control" style="height: 300px">
                          {{old('noidung')}}
                    </textarea>
              </div>
              <div class="form-group">
                   <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-envelope-o"></i> Send</button>
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
</script>
@endsection