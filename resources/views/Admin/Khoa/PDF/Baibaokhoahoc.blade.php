<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminSET| DANH SÁCH THỐNG KÊ BÀI BÁO KHOA HỌC</title>
   <base href="{{asset('/public/')}}">
  <!-- Tell the browser to be responsive to screen width -->
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
 <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <style type="text/css"> 	
	.dam{font-weight:bold;}
	#table2{width:100%}
	#table2 tr td{border:1px solid #333;}
	body { font-family:'newfont';font-weight:normal !important;font-style:normal !important;font-size:16px;}	
	table tr td{padding:5px;}
	.f14{font-size:14px;}
	.f13{font-size:13px;}
	.ngat{ page-break-inside:avoid; page-break-after:always; }
	.col-lg-6{float: left;width:50%}
	.col-lg-6-r{float:right;width:40%;}
	.row{clear:both;padding-top:10px;}
	.col-lg-12{float:left;width:100%;}
	.pal15{padding-left:15px;margin-left:15px;} 
 </style>
</head>
<body>

	
	
	<table style="width:100%" id="table1">	
			<tr>
				<td class="text-center f13" style="padding:0!important;">TRƯỜNG ĐẠI HỌC TRÀ VINH</td>
				<td class="text-center dam f13" style="padding:0!important;">CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</td>
			</tr>
			<tr style="padding:0; margin-top:0!important;">
				<td class="text-center dam f13" style="padding:0!important;">
					KHOA KỸ THUẬT VÀ CÔNG NGHỆ
					<p style="border-top:1px solid #220044;margin:0 auto;padding-top:0;height:1px; margin-top:0!important;">
					&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
					</p>
				</td>
				<td class="text-center dam f13" style="padding:0!important;">
					Độc lập - Tự do - Hạnh phúc
					<p style="border-top:1px solid #220044;margin:0 auto;height: 1px; margin-top:0!important;">
					&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
					</p>
				</td>
			</tr>		
	</table>



<p class="text-center dam" style="margin-top:50px;">DANH SÁCH THỐNG KÊ BÀI BÁO KHOA HỌC</p>
<p class="text-center dam"> THỜI GIAN TỪ: {{date('m/Y', strtotime($tungay))}} ĐẾN: {{date('m/Y', strtotime($denngay))}}</p>

<table id="table2">
				<tr style="background:#cccccc;">
					<td width="8%" class="text-center dam">STT</td>
					<td  class="text-center dam">Tác giả</td>				
					<td  class="text-center dam">Tên bài báo</td>
					<td  class="text-center dam">NXB</td>
					<td class="text-center dam">Loại BB</td>									
					<td width="13%" class="text-center dam">Thời gian</td>
					
				</tr>
					<?php $i=1; ?>
				@foreach($Baibaokhoahoc as $bb)					
					<tr>
						<td class="text-center">{{$i++}}</td>
						<td>
							<?php $tacgia=''; ?>
							@foreach($CT_baibao as $ctbb)
								@if($ctbb->id_baibao==$bb->id)
									<?php $tacgia.=$ctbb->giangvien->ten.",";?>
								@endif
							@endforeach
							<?php $tacgia=rtrim($tacgia,',');?>
							{{$tacgia}}
						</td>	
						<td>{{$bb->ten_vi}}</td>
						<td>{{$bb->nxb}}</td>
						<td>{{$bb->loaibaibao->ten_vi}}</td>
						<td class="text-center">{{date('m/Y', strtotime($bb->nam))}}</td>
					</tr>
				@endforeach
				
</table>


	


<script src="public/ht96_admin/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="public/ht96_admin./bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="public/ht96_admin/plugins/iCheck/icheck.min.js"></script>
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