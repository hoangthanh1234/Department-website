<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminSET| Log in</title>
   {{-- <base href="/public/"> --}}
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('ht96_admin/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('ht96_admin/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('ht96_admin/bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('ht96_admin/dist/css/AdminLTE.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('ht96_admin/plugins/iCheck/square/blue.css') }}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

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
    <p class="login-box-msg">Đăng nhập để bắt đầu phiên làm việc {{Session::get('user_permission')}}</p>

    @if(count($errors)>0)
      <div class="alert alert-warning">
         <ul style="list-style:none;padding:0;">
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

    <div class="social-auth-links text-center">     
      <a href="{{ asset('google/redirect') }}" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Đăng nhập bằng
        Google+</a>
      
        <form action="{{ asset('set_admin/login_submit') }}" method="post">

          {{ csrf_field() }}
          <input type="text" name="email" class="form-control">
          <button type="submit">Submit</button>
        </form>
       <!--  <a href="login2" class="btn btn-block btn-social btn-google btn-flat">Đăng nhập bằng tạm</a> -->
    </div>

    <!-- /.social-auth-links -->
    <div class="text-center">Khoa Kỹ thuật và Công nghệ - Trường Đại học Trà Vinh </div>
   <!--  <div class="text-center" style="color: red;">Nếu không thể đăng nhập với google Vui lòng đăng nhập trên</div> -->
  </div>
  <!-- /.login-box-body -->

</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="{{ asset('ht96_admin/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('ht96_admin/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- iCheck -->
<script src="{{ asset('ht96_admin/plugins/iCheck/icheck.min.js') }}"></script>
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
