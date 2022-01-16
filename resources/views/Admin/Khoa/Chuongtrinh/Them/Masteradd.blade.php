@extends('Admin.Master')
@section('title','Thêm chương trình đào tạo mới')
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
			    <a class="a">Thông tin chung</a>
			   </li>

			   <li class="@if ($tab==2) active @endif">
			    	<a class="a">Môn học
			    	</a>
			    </li>

			   <li role="presentation" class="@if ($tab==3) active @endif">
			    	<a class="a">Tổ hợp</a>
			    </li>
		  </ul>
		  <!-- Tab panes -->
		  <div class="tab-content" style="min-height:100vh;">
		  	@yield('Tabvalue')	   		  
		  </div>
		</div>	
	</div>
@endsection

