
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN http://www.w3.org/TR/html4/DTD/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<style type="text/css">
	.btn2{width: 100px;margin: 5px;}
</style>  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<link rel="shortcut icon" href="public/ht96_image/logo.png" type="image/x-icon" />
<title>Admin SET :: @yield('title')</title> 
{{-- <base href="/public/">	  --}}
  <!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- jQuery 3 -->
<script src="{{ asset('ht96_admin/bower_components/jquery/dist/jquery.min.js') }}"></script> 
  <!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="{{ asset('ht96_admin/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('ht96_admin/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
<link rel="stylesheet" href="{{ asset('ht96_admin/bower_components/Ionicons/css/ionicons.min.css') }}">
   <!-- datatables -->
<link rel="stylesheet" href="{{ asset('ht96_admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
  <!-- jvectormap -->
<link rel="stylesheet" href="{{ asset('ht96_admin/bower_components/jvectormap/jquery-jvectormap.css') }}">
<link rel="stylesheet" href="{{ asset('ht96_admin/bower_components/select2/dist/css/select2.min.css') }}">
  <!--  datepicker -->
<link rel="stylesheet" href="{{ asset('ht96_admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
  <!-- Theme style -->
<link href="{{ asset('ht96_admin/media/css/tab.css') }}" type="text/css" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('ht96_admin/bower_components/fullcalendar/dist/fullcalendar.min.css') }}">
<link rel="stylesheet" href="{{ asset('ht96_admin/bower_components/fullcalendar/dist/fullcalendar.print.min.css') }}" media="print">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="{{ asset('ht96_admin/dist/css/skins/_all-skins.min.css') }}"> 
<link rel="stylesheet" href="{{ asset('ht96_admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}"> 
  <!--  <link rel="stylesheet" href="../public/bootstrap/bootstrap.css"> -->
  <!-- Google Font -->
<link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<link rel="stylesheet" type="text/css" href="{{ asset('ht96_admin/css/mystyle.css') }}">
<link href="https://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>  
<link rel="stylesheet" href="{{ asset('ht96_admin/plugins/iCheck/all.css') }}">
<link rel="stylesheet" href="{{ asset('ht96_admin/dist/css/AdminLTE.min.css') }}">
<script src="{{ asset('ht96_admin/bower_components/moment/moment.js') }}"></script>
<script src="{{ asset('ht96_admin/bower_components/fullcalendar/dist/fullcalendar.min.js') }}"></script>

</head>
<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">

  <header class="main-header">	   
      <a class="logo"><span class="logo-mini">SET</span><span class="logo-lg"><b>Admin</b>&nbsp;&nbsp;SET</span></a>   
      <nav class="navbar navbar-static-top">    
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button"><span class="sr-only">Toggle navigation</span></a>      
            <div class="navbar-custom-menu">
              <ul class="nav navbar-nav"> 
                <li><a href="../" target=_blank><i class="fa fa-street-view" aria-hidden="true"></i>&nbsp;&nbsp;Xem Website</a></li> 
                <li><a href="google/logout"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;&nbsp;Đăng xuất</a></li> 
              </ul>
            </div>
      </nav>
  </header>

<aside class="main-sidebar">	  
	<section class="sidebar">  
	  <div class="user-panel">
	    <div class="pull-left image">
	        <img src="{{Session::get('user_avatar')}}" class="img-circle" alt="User Image">
	    </div>
	     <div class="pull-left info">
	        <p>&nbsp;&nbsp;{{Session::get('user_ten')}}</p>
	        <a href="#" style="color:white"><i class="fa fa-circle text-success"></i> Online</a>
	     </div>
	  </div>  	     
      	@if(Session::get('user_permission')==1)@include('Admin.Khoa.Layout.ControlAdmin')@endif
        @if(Session::get('user_permission')==2)@include('Admin.Bomon.Layout.ControlBM')@endif
        @if(Session::get('user_permission')==3)@include('Admin.Giangvien.Layout.ControlGV')@endif
        @if(Session::get('user_permission')==4)@include('Admin.Sinhvien.Layout.ControlSV')@endif
  </section> 
</aside>

 
  <div class="content-wrapper"> 
     <section class="content" style="padding-left:0;padding-right:0;">
    	  @yield('content')
     </section>
  </div> 
  

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy;2018<a href="#"> &nbsp;&nbsp;Khoa Kỹ thuật và Công nghệ Trường Đại học Trà Vinh</a>.</strong> All rights
      reserved.
      <strong style="float:right;">Designed by Dương Hoàng Thành - DA14TT - 039.622.4933&nbsp;&nbsp;</strong>
  </footer>
</div>


<!-- Bootstrap 3.3.7 -->
<script type="text/javascript" src="{{ asset('ht96_admin/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- DataTables -->
<script type="text/javascript" src="{{ asset('ht96_admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('ht96_admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('ht96_admin/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- SlimScroll -->
<script type="text/javascript" src="{{ asset('ht96_admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script type="text/javascript" src="{{ asset('ht96_admin/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script type="text/javascript" src="{{ asset('ht96_admin/dist/js/adminlte.min.js') }}"></script>
<!-- Sparkline -->
<script type="text/javascript" src="{{ asset('ht96_admin/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap  -->
<script type="text/javascript" src="{{ asset('ht96_admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('ht96_admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<script type="text/javascript" src="{{ asset('ht96_admin/plugins/iCheck/icheck.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('ht96_admin/bower_components/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
<!-- ChartJS -->
<script type="text/javascript" src="{{ asset('ht96_admin/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('ht96_admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script type="text/javascript" src="{{ asset('ht96_admin/dist/js/demo.js') }}"></script>
<script type="text/javascript" src="{{ asset('ckfinder/ckfinder.js') }}"></script>
<script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js') }}"></script> 
<script type="text/javascript" src="{{ asset('App.js') }}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js">
</script>

<script type="text/javascript">

    $(document).ready(function(){
      $('#tabs div#tab2').hide();
      $('#tabs div#tab3').hide();
      $('#tabs div#tab4').hide();
      $('#tabs div:first').show();
      $('#tabs ul li:first').addClass('active');
        $('#tabs ul li').click(function(){
        $('#tabs ul li').removeClass('active');
        $(this).addClass('active');
        var currentTab = $(this).attr('type');
        $('#tabs div#tab1').hide();
        $('#tabs div#tab2').hide();
        $('#tabs div#tab3').hide();
        $('#tabs div#tab4').hide();
        $(currentTab).show();
        return false;
      }); 
  });



       $('.select2').select2();
      $('.datepicker').datepicker({
       format: 'dd/mm/yyyy',
     });
       var token='{{Session::token()}}';

       $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })
  </script>

	@yield('script')
</body>
</html>

