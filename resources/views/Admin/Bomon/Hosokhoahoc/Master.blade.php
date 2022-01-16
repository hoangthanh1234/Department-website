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
			    	<a class="a" href="set_bomon/hosokhoahoc/{{$Hosokhoahoc->giangvien->tenkhongdau}}/thong-tin-chung/1/{{$Hosokhoahoc->id}}">Thông tin cá nhân</a>
			   </li>

			   <li class="@if ($tab==2) active @endif">
			    	<a class="a" href="set_bomon/hosokhoahoc/{{$Hosokhoahoc->giangvien->tenkhongdau}}/qua-trinh-dao-tao/2/{{$Hosokhoahoc->id}}">Quá trình đào tạo
			    	</a>
			    </li>

			   <li role="presentation" class="@if ($tab==3) active @endif">
			    	<a class="a" href="set_bomon/hosokhoahoc/{{$Hosokhoahoc->giangvien->tenkhongdau}}/de-tai-nghien-cuu/3/{{$Hosokhoahoc->id}}">Đề tài nghiên cứu
			    	</a>
			    </li>

			    <li role="presentation" class="@if ($tab==4) active @endif">
			    	<a class="a" href="set_bomon/hosokhoahoc/{{$Hosokhoahoc->giangvien->tenkhongdau}}/bai-bao-khoa-hoc/4/{{$Hosokhoahoc->id}}">Bài báo, báo cáo khoa học
			    	</a>
			    </li>

			     <li role="presentation" class="@if ($tab==5) active @endif">
			    	<a class="a" href="set_bomon/hosokhoahoc/{{$Hosokhoahoc->giangvien->tenkhongdau}}/huong-dan-sau-dai-hoc/5/{{$Hosokhoahoc->id}}">Hướng dẫn sau đại học
			    	</a>
			    </li>

			     <li role="presentation" class="@if ($tab==6) active @endif">
			    	<a class="a" href="set_bomon/hosokhoahoc/{{$Hosokhoahoc->giangvien->tenkhongdau}}/mon-giang-day/6/{{$Hosokhoahoc->id}}">Môn giảng dạy
			    	</a>
			    </li>			    

			    <li role="presentation" class="@if ($tab==7) active @endif" style="margin-top:10px;">
			    	<a class="a" href="set_bomon/hosokhoahoc/{{$Hosokhoahoc->giangvien->tenkhongdau}}/qua-trinh-cong-tac-giang-day/7/{{$Hosokhoahoc->id}}">Quá trình công tác, giảng dạy
			    	</a>
			    </li>

			    <li role="presentation" class="@if ($tab==8) active @endif" style="margin-top:10px;">
			    	<a class="a" href="set_bomon/hosokhoahoc/{{$Hosokhoahoc->giangvien->tenkhongdau}}/xem-lai/tieng-viet/8/{{$Hosokhoahoc->id}}">Xem trước (VI)
			    	</a>
			    </li>

			    <li role="presentation" class="@if ($tab==9) active @endif" style="margin-top:10px;">
			    	<a class="a" href="set_bomon/hosokhoahoc/{{$Hosokhoahoc->giangvien->tenkhongdau}}/xem-lai/tieng-anh/9/{{$Hosokhoahoc->id}}">Xem trước (EN)
			    	</a>
			    </li>
		  </ul>

		  <!-- Tab panes -->
		  <div class="tab-content" style="min-height:100vh;">
		  	@yield('Tabvalue')	   		  
		  </div>
		</div>	
	</div>
@endsection

