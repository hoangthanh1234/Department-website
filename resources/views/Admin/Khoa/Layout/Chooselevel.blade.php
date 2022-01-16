<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminSET| Chooselevel</title>
   <base href="/public/">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="ht96_admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="ht96_admin/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="ht96_admin/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="ht96_admin/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="ht96_admin/plugins/iCheck/square/blue.css">



  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="ht96_admin/index2.html" style="color:#111;"><b>Admin</b>SET</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Bạn muốn đăng nhập với quyền</p>

    @if(count($errors)>0)
      <div class="alert alert-danger">
         <ul style="list-style:none;">
         @foreach($errors->all() as $err)            
               <li>{{$err}}</li>              
          @endforeach
          </ul>
      </div>
    @endif   
    @if(session('thongbao'))
           <div class="alert alert-warning">
                {{session('thongbao')}}
           </div>
     @endif  
    <form action="chooselevel" method="Post">
      <div class="form-group has-feedback">
        <select id="chonquyen" name="level" class="form-control">
        	<option value="{{Session::get('user_permission')}}">@if(Session::get('user_permission')==1) Văn phòng Khoa @else Bộ môn @endif</option>
        	<option value="3">Giảng viên</option>
        </select>
      </div>    
      <div class="row">
        <div class="col-xs-8">         
        </div>
        <!-- /.col -->
        <div class="col-xs-4">          
          <input type="submit" class="btn btn-primary btn-block btn-flat" value="Đăng nhập">
        </div>
        <!-- /.col -->
      </div>
       <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
   
  </div>
  <!-- /.login-box-body -->

</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="ht96_admin/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="ht96_admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="ht96_admin/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
