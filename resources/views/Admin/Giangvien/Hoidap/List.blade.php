@extends('Admin.Master')
@section('title','Danh sách câu hỏi')
@section('content') 

	<div class="content-wrapper" style="margin-left:0!important;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Hộp thư
        <small style="color:red;">{{count($Cauhoichuatl)}} tin nhắn mới</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
        <li class="active">Hộp thư</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
       
        <div class="col-md-12 col-lg-12">
          <div class="box-primary" style="background:#fff;">
            <div class="box-header with-border">
              <h3 class="box-title">Tin nhắn đến</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">

              <div class="mailbox-controls">
                <!-- Check all button -->
               <!-- 
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                
                </div> -->
                <!-- /.btn-group -->
                <button type="button" id="myre" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                
              </div>


              <div class="table-responsive mailbox-messages">
                <div class="table-responsive">
                <table class="table table-hover table-striped" id="example2" style="width:100%">
                  <thead> 
                    <tr class="bg-top">                   
                      <th width="15%" class="text-center">Người gởi</th>
                      <th width="10%" class="text-center">Email</th>
                      <th class="text-center">Nội dung</th>
                      <th width="15%" class="text-center">Thời gian</th>
                    </tr>
                  </thead>
                 
                  <tbody>
                    @foreach($Cauhoichuatl as $chctl)
                      <tr>               
                        <td class="mailbox-name"><a href="set_giangvien/hoidap/traloi/{{$chctl->id}}">{{$chctl->ten}}</a></td>
                        <td class="mailbox-name"><a href="set_giangvien/hoidap/traloi/{{$chctl->id}}">{{$chctl->email}}</a></td>
                        <td class="mailbox-subject">{!! $chctl->noidung !!}</td><?php \Carbon\Carbon::setLocale('vi'); ?>                     
                        <td class="mailbox-date text-center">{{Carbon\Carbon::parse($chctl->created_at)->diffforHumans()}}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                </div>
                <!-- /.table -->
              </div>


              <!-- /.mail-box-messages -->
            </div>
            
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
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

  <script type="text/javascript">
    $(document).on('click','#myre',function(){
      window.location.reload()();
    });
  </script>
@endsection