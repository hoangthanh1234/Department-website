@extends('Admin.Master')
@section('title','Hồ sơ khoa học')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<style type="text/css">

	#tabvip .active .a{
		background:#3C8DBC;
		color:#fff;
	}

	.nav-tabs>li>a{margin-right:8px;}

	div#tabvip{
		background: #FCFCFC;
	    border: 1px solid #EEEEEE;
	    padding: 10px;
	    margin-top: 10px;
	    margin-bottom: 10px;
	}

	div#tabvip ul li a{color:black;font-size:16px;background:#E9EBEE}
}

</style>


    <div class="container-fluid">
		<div id="tabvip">
		  <!-- Nav tabs -->
		  <ul class="nav nav-tabs" role="tablist">
			   <li class="@if ($tab==1) active @endif">
			    	<a class="a" href="set_giangvien/danh-gia-vien-chuc/giang-day/1">Giảng dạy</a>
			   </li>

			   <li class="@if ($tab==2) active @endif">
			    	<a class="a" href="set_giangvien/danh-gia-vien-chuc/nghien-cuu-khoa-hoc/2">Nghiên cứu khoa học</a>
			    </li>

			   <li role="presentation" class="@if ($tab==3) active @endif">
			    	<a class="a" href="set_giangvien/danh-gia-vien-chuc/tieu-chi-khac/3">Tiêu chí khác</a>
			    </li>
				<li role="presentation" class="@if ($tab==4) active @endif">
			    	<a class="a" href="set_giangvien/danh-gia-vien-chuc/tu-danh-gia/4">Tự đánh giá</a>
			    </li>

			   <li role="presentation" class="@if ($tab==5) active @endif">
			    	<a class="a" href="set_giangvien/danh-gia-vien-chuc/quy-dinh/5">Xem quy định</a>
			    </li>

					<li role="presentation" class="@if ($tab==6) active @endif">
 			    	<a class="a" href="set_giangvien/danh-gia-vien-chuc/quy-dinh-khac/6">Xem hướng dẫn kê</a>
 			    </li>

		  </ul>

		  <!-- Tab panes -->
		  <div class="tab-content" style="min-height:100vh;">
		  	@yield('Tabvalue')
		  </div>
		</div>
	</div>
@endsection
