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
			    	<a class="a" href="set_admin/{{$Giangvien->tenkhongdau}}/thong-tin-chung/1/{{$Giangvien->id}}">Thông tin cá nhân</a>
			   </li>

			   <li class="@if ($tab==2) active @endif">
			    	<a class="a" href="set_admin/{{$Giangvien->tenkhongdau}}/qua-trinh-dao-tao/2/{{$Giangvien->id}}">Quá trình đào tạo
			    	</a>
			    </li>

			   <li role="presentation" class="@if ($tab==3) active @endif">
			    	<a class="a" href="set_admin/{{$Giangvien->tenkhongdau}}/de-tai-nghien-cuu/3/{{$Giangvien->id}}">Đề tài nghiên cứu
			    	</a>
			    </li>

			    <li role="presentation" class="@if ($tab==4) active @endif">
			    	<a class="a" href="set_admin/{{$Giangvien->tenkhongdau}}/bai-bao-khoa-hoc/4/{{$Giangvien->id}}">Bài báo, báo cáo khoa học
			    	</a>
			    </li>

			     <li role="presentation" class="@if ($tab==5) active @endif">
			    	<a class="a" href="set_admin/{{$Giangvien->tenkhongdau}}/huong-dan-sau-dai-hoc/5/{{$Giangvien->id}}">Hướng dẫn sau đại học
			    	</a>
			    </li>

			    

			     <li role="presentation" class="@if ($tab==6) active @endif">
			    	<a class="a" href="set_admin/{{$Giangvien->tenkhongdau}}/mon-giang-day/6/{{$Giangvien->id}}">Môn giảng dạy
			    	</a>
			    </li>			    

			    <li role="presentation" class="@if ($tab==7) active @endif" style="margin-top:10px;">
			    	<a class="a" href="set_admin/{{$Giangvien->tenkhongdau}}/qua-trinh-cong-tac-giang-day/7/{{$Giangvien->id}}">Quá trình công tác, giảng dạy
			    	</a>
			    </li>

			      <li role="presentation" class="@if ($tab==8) active @endif" style="margin-top:10px;">
			    	<a class="a" href="set_admin/{{$Giangvien->tenkhongdau}}/ngoai-ngu/8/{{$Giangvien->id}}">Ngoại ngữ
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

