@extends('Admin.Master')
@section('title','Trang chủ')
@section('content') 

<div class="h3 padding20 text-center">Trang chủ</div>
 <div class="box">   
 	<div class="box-body">
	 	<div class="text-center">	
	     @if(session('thongbao'))
	           <div class="alert alert-success">
	                {{session('thongbao')}}
	           </div>
	     @endif
		</div>
 	</div>
 </div>

@endsection