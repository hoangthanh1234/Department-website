@extends('User.Index')
@section('title')
   @if($lang=='vi') Hồ sơ khoa học @else Scientific Records @endif
@endsection
@section('description')
    <?php $description='description_'.$lang;echo $Bomon->$description; ?>
@endsection
@section('content')
<div class="nonedesktop">@include('User.Layout.MenuMobibm')</div>
<div class="nonepad nonephone">
@include('User.Layout.Banner')
@include('User.Layout.Menubm')
</div>

<section style="background:#F6F6F6;min-height:100vh;">		
	<div class="hosokhoahoc">
		<div class="container content">						
			<section class="box box1-r" id="thongtinchung">
				<div class="tab" data-id="1">{{trans('Nhansu.thongtinchung')}}<span class="fa fa-unsorted fa-2x"></span></div>	
					<div  class="pannel pannel1">
						<div class="row">
							<div class="col-lg-2 col-md-2 col-xs-12">
								<img src="ht96_image/giangvien/{{$Giangvien->hinhanh}}" style="width:150px;height:150px;margin:10px auto;">
							</div>
							<div class="col-lg-10 col-md-10 col-xs-12">
								<div class="row">	
									<div class="col-lg-4 col-md-5 col-xs-12">
										<p class="bold">{{trans('Nhansu.hovaten')}}:&nbsp;&nbsp;<b>{{$Giangvien->ten}}</b></p>
										<p class="bold">
											{{trans('Nhansu.chucvu')}}:&nbsp;&nbsp;<b><?php $ten='ten_'.$lang;echo $Giangvien->chucvu->$ten; ?></b>
										</p>								
									</div>

									<div class="col-lg-4 col-md-5 col-xs-12">						
									<p class="bold">E-mail:&nbsp;&nbsp;<b>{{$Giangvien->email}}</b></p>
									<p class="bold">{{trans('Nhansu.ngoaingu')}}:&nbsp;&nbsp;
										<b><?php $ngoaingu='';?>
											@foreach($Giangvien->ngoaingu as $nn)
												<?php $ten='ten_'.$lang; $ngoaingu.=$nn->$ten.','; ?>
											@endforeach
											<?php $ngoaingu=rtrim($ngoaingu,',');?>
											{{$ngoaingu}}
										</b>
									</p>			
									</div>

									<div class="col-lg-4 col-md-4 col-xs-12">										
										{{-- <p class="bold">{{trans('Nhansu.quequan')}}:&nbsp;&nbsp;<b>{{$Giangvien->quequan}}</b></p> --}}
										<p class="bold">{{trans('Nhansu.dienthoai')}}:&nbsp;&nbsp;<b>{{$Giangvien->socoquan}}</b></p>
										{{-- <p class="bold">
											{{trans('Nhansu.namsinh')}}:&nbsp;&nbsp;<b>{{date('Y', strtotime($Giangvien->ngaysinh))}}</b>
										</p> --}}
									</div>	
								</div>	
								<div class="row">
									<div class="col-lg-12 col-xs-12">
										<p class="bold">{{ trans('Nhansu.nhomnghiencuu') }}: 	
											@foreach(nhomnc($Giangvien->id) as $nhom)
												<a href="nhom-nghien-cuu/<?php $tenkhongdau = 'tenkhongdau_'.$lang;echo $nhom->$tenkhongdau;?>/{{$nhom->id}}.html"><?php $ten = 'ten_'.$lang;echo $nhom->$ten;?></a>
											@endforeach											
										</p>
									</div>									
								</div>
							</div>
						</div>
												

							<div class="row">
								<div class="col-lg-10 col-md-10">
									<p class="bold">{{trans('Nhansu.hocvi')}}:&nbsp;&nbsp;<b><?php $ten='ten_'.$lang;echo $Giangvien->trinhdo->$ten;?></b> {{trans('Nhansu.nam')}}: <b>{{$Giangvien->nambonhiemhocvi}}</b> - <b>{{$Giangvien->nuocnhanhocvi}}</b></p>
									<p class="bold">{{trans('Nhansu.chucdanhkhoahoc')}}:&nbsp;&nbsp;<b><?php $chucdanhkhoahoc='chucdanhkhoahoc_'.$lang;echo $Giangvien->$chucdanhkhoahoc; ?></b></p>
									<p class="bold">{{trans('Nhansu.linhvucnghiencuu')}}:&nbsp;&nbsp;<b><?php $huongnghiencuu='huongnghiencuu_'.$lang;echo $Giangvien->$huongnghiencuu; ?></b></p>
									<p class="bold">{{trans('Nhansu.donvicongtac')}}:&nbsp;&nbsp;<b><?php $tenphongban='tenphongban_'.$lang; echo $Giangvien->$tenphongban;?>, <?php $tencoquan='tencoquan_'.$lang;echo $Giangvien->$tencoquan; ?></b></p>
											
									<p class="bold">{{trans('Nhansu.diachi')}}:&nbsp;&nbsp;<b><?php $diachicoquan='diachicoquan_'.$lang;echo $Giangvien->$diachicoquan;?></b></p>

									<p class="bold">{{trans('Public.link')}}:&nbsp;Google site: 
										@if($Giangvien->linkgooglesite!= '')
											<a href="{{$Giangvien->linkgooglesite}}">{{ trans('Public.xemthem') }}</a>
										@endif
									</p>
									<p class="bold">{{trans('Public.link')}}:&nbsp;Google scholar:
										@if($Giangvien->linkgooglescholar!= '')
											<a href="{{$Giangvien->linkgooglescholar}}">{{ trans('Public.xemthem') }}</a>
										@endif 
									</p>
								</div>
							</div>
					</div>


						

					<div class="tab" data-id="3">{{trans('Nhansu.quatrinhcongtac')}}<span class="fa fa-unsorted fa-2x"></span></div>
						<div class="table-responsive pannel pannel3">
							<table class="table table-striped table-bordered example">
								<thead>
									<tr class="bg-top-table2">
										<th class="text-center" width="15%">{{trans('Nhansu.thoigian')}}</th>
										<th class="text-center">{{trans('Nhansu.tencoso2')}}</th>
										<th class="text-center">{{trans('Nhansu.diachi')}}</th>
										<th class="text-center" width="15%">{{trans('Nhansu.chucvu')}}</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
									</tr>											
								</tfoot>
								<tbody>
								@foreach($Giangvien->quatrinhcongtac as $congtac)
									<tr style="font-size:14px;">
										<td class="text-center bold">{{date('Y', strtotime($congtac->ngaybatdau))}} &nbsp;&nbsp; - {{date('Y', strtotime($congtac->ngayketthuc))}}</td>
										<td class="bold"><?php $tencoso='tencoso_'.$lang;echo $congtac->$tencoso; ?></td>
										<td class="bold"><?php $diachicoso='diachicoso_'.$lang;echo $congtac->$diachicoso;?></td>
										<td class="bold text-center"><?php $ten='ten_'.$lang;echo $congtac->chucvu->$ten;?></td>
									</tr>
								@endforeach
								</tbody>
							</table>
						</div>

					<div class="tab" data-id="4">{{trans('Nhansu.detainghiencuu')}}<span class="fa fa-unsorted fa-2x"></span></div>
						<div class="pannel pannel4">									
						@foreach($Capdetai as $CDT)

						@if($CDT->id != 4 && $CDT->id!=101)
									<?php 
									$check = 0;
									foreach ($Giangvien->ct_detai as $ctdtt){
										if($CDT->id==$ctdtt->detai->capdetai->id)
											$check = 1;
									}
									?>
									@if($check == 1)
									<div class="tieude" style="margin-top:20px;">
										<?php $ten='ten_'.$lang;
											if($CDT->$ten == 'Cấp trường dưới 6 tháng')
												echo str_replace('dưới 6 tháng','',$CDT->$ten);

											if($CDT->$ten == 'Cấp trường trên 6 tháng')
												echo str_replace('trên 6 tháng','',$CDT->$ten);
											 if($CDT->$ten != 'Cấp trường dưới 6 tháng' || $CDT->$ten =! 'Cấp trường trên 6 tháng')	
											 	echo $CDT->$ten;
										?>							
									</div>
									@endif
									<?php $c=1;?>
									@foreach(detai($Giangvien->id) as $dt)
										@if($dt->id_capdetai == $CDT->id)
											<a href="{{ trans('Link.chitietdetai') }}/{{$dt->id}}.html"  target="_blank">
												<p class="maubaibao bold">
													<span style="color:black;">[{{$c++}}]</span>
													<span class="mauten"><?php $ten='ten_'.$lang;echo $dt->$ten;?></span> - 
													<?php $chunhiem='';$thanhvien='';?>
													@foreach($dt->ct_detai as $ctdt)
														@if($ctdt->id_trachnhiemdetai == 2)
															<?php $chunhiem.=$ctdt->giangvien->ten.',';?>
														@endif
														@if($ctdt->id_trachnhiemdetai == 3)
															<?php $thanhvien.=$ctdt->giangvien->ten.',';?>
														@endif
													@endforeach

													@if($chunhiem!='')
														<span style="color:black;">{{trans('Nhansu.chunhiem')}}:</span>
														<span class="maunxb">												
															<?php $chunhiem = rtrim($chunhiem,','); echo $chunhiem;?>
														</span>
													@endif
													
													@if($thanhvien!='')
														<span style="color:black;">{{trans('Nhansu.thanhvien')}}:</span>
														<span class="mautacgia">												
															<?php $thanhvien = rtrim($thanhvien,','); echo $thanhvien;?>
														</span>
													@endif - {{date('Y', strtotime($ctdt->detai->ngaynghiemthu))}}
												</p>
											</a>
										@endif
									@endforeach
							@else

								<?php 
									$check = 0;
									foreach ($Giangvien->ct_detai as $ctdtt){
										if($ctdtt->detai->capdetai->id == 4 || $ctdtt->detai->capdetai->id == 101)
											$check = 1;
									}
								?>
									@if($check == 1)
									<div class="tieude" style="margin-top:20px;">
										<?php if($lang == 'vi') echo "Cấp trường"; else echo "school level";?>					
									</div>
									@endif
									<?php $c=1;?>
									@foreach(detai($Giangvien->id) as $dt)
										@if($dt->id_capdetai == 4 || $dt->id_capdetai == 101)
											<a href="{{ trans('Link.chitietdetai') }}/{{$dt->id}}.html"  target="_blank">
												<p class="maubaibao bold">
													<span style="color:black;">[{{$c++}}]</span>
													<span class="mauten"><?php $ten='ten_'.$lang;echo $dt->$ten;?></span> - 
													<?php $chunhiem='';$thanhvien='';?>
													@foreach($dt->ct_detai as $ctdt)
														@if($ctdt->id_trachnhiemdetai == 2)
															<?php $chunhiem.=$ctdt->giangvien->ten.',';?>
														@endif
														@if($ctdt->id_trachnhiemdetai == 3)
															<?php $thanhvien.=$ctdt->giangvien->ten.',';?>
														@endif
													@endforeach

													@if($chunhiem!='')
														<span style="color:black;">{{trans('Nhansu.chunhiem')}}:</span>
														<span class="maunxb">												
															<?php $chunhiem = rtrim($chunhiem,','); echo $chunhiem;?>
														</span>
													@endif
													
													@if($thanhvien!='')
														<span style="color:black;">{{trans('Nhansu.thanhvien')}}:</span>
														<span class="mautacgia">												
															<?php $thanhvien = rtrim($thanhvien,','); echo $thanhvien;?>
														</span>
													@endif - {{date('Y', strtotime($ctdt->detai->ngaynghiemthu))}}
												</p>
											</a>
										@endif
									@endforeach
									<?php break;?>
							@endif

						@endforeach	
						</div>
					
					<div class="tab" data-id="5">{{trans('Nhansu.baibaokhoahoc')}}<span class="fa fa-unsorted fa-2x"></span></div>
					<div class="pannel pannel5">
						<?php $i=1;?>

						@foreach(baibao($Giangvien->id) as $bb)
						<a href="chi-tiet-bai-bao/{{$bb->id}}.html">
							<p class="bold maubaibao">[{{$i++}}]
								<?php $tacgia = '';?>
								<span class="mauten">
									@foreach($bb->ct_baibao as $ctbb)				
										@if($ctbb->id_giangvien == $Giangvien->id && $ctbb->giangvien != null)
											<?php $tacgia.=$ctbb->giangvien->ten.',';?>
										@endif
									@endforeach

									@foreach($bb->ct_baibao as $ctbb)				
										@if($ctbb->id_giangvien != $Giangvien->id && $ctbb->giangvien != null)
											<?php $tacgia.=$ctbb->giangvien->ten.',';?>
										@endif
									@endforeach
									<?=rtrim($tacgia,',')?>
								</span> - 
								<span class="mautacgia"><?php $ten = 'ten_'.$lang;echo $bb->$ten;?></span> -  
								<span class="maunxb"><?php $nxb = 'nxb_'.$lang;echo $bb->$nxb;?></span>, 
								<span class="maunam">{{date('Y', strtotime($bb->nam))}}</span>
							</p>
						</a>
						@endforeach					
					</div>

					<div class="tab" data-id="6">{{trans('Nhansu.huongdansaudaihoc')}}<span class="fa fa-unsorted fa-2x"></span></div>	
					<div class="pannel pannel6">

						<div class="table-responsive pannel">
							<table class="table table-striped table-bordered example">
								<thead>
									<tr class="bg-top-table2">
										<th class="text-center">#</th>
										<th class="text-center" width="15%">{{trans('Nhansu.tensinhvien')}}</th>
										<th class="text-center">{{trans('Nhansu.tendetai')}}</th>
										<th class="text-center" width="17%">{{trans('Nhansu.tencoso')}}</th>
										<th class="text-center" width="10%">{{trans('Nhansu.hocvi')}}</th>
										<th class="text-center" width="12%">{{trans('Nhansu.nambaove')}}</th>	
									</tr>
								</thead>
								<tfoot>
									<tr>													
										<th></th>
										<th></th>
										<th></th>
										<th></th>
									</tr>											
								</tfoot>
								<tbody>
									<?php $j=1; ?>
								@foreach($Giangvien->huongdansaudaihoc as $hdsdh)												 
									<tr style="font-size:14px;">
										<td class="text-center">{{$j++}}</td>
										<td class="bold"><?php $tensinhvien='tensinhvien_'.$lang;echo $hdsdh->$tensinhvien;?></td>
										<td class="bold"><?php $tendetai='tendetai_'.$lang;echo $hdsdh->$tendetai;?></td>
										<td class="bold text-center"><?php $tencoso='tencoso_'.$lang;echo $hdsdh->$tencoso;?></td>
										<td class="bold text-center"><?php $ten='ten_'.$lang;echo $hdsdh->trinhdo->$ten;?></td>
										<td class="text-center bold">{{date('Y', strtotime($hdsdh->nambaove))}}</td>
									</tr>												
								@endforeach
								</tbody>
							</table>
						</div>	
					</div>

					<div class="tab" data-id="7">{{trans('Nhansu.mongiangday')}}<span class="fa fa-unsorted fa-2x"></span></div>
					<div class="pannel pannel7">
						<div class="table-responsive pannel">
							<table class="table table-striped table-bordered example">
								<thead>
									<tr class="bg-top-table2">
										<th class="text-center" >{{trans('Nhansu.tenmon')}}</th>
										<th class="text-center"  width="13%">{{trans('Nhansu.nambatdau')}}</th>
										<th class="text-center">{{trans('Nhansu.doituong')}}</th>
										<th class="text-center">{{trans('Nhansu.noiday')}}</th>	
									</tr>
								</thead>
								<tfoot>
									<tr>													
										<th></th>
										<th></th>
										<th></th>
										<th></th>
									</tr>											
								</tfoot>
								<tbody>
								@foreach($Giangvien->mongiangday as $mgd)												 
									<tr style="font-size:14px;">
										<td class="bold"><?php $ten='ten_'.$lang;echo $mgd->$ten;?></td>
										<td class="bold text-center">{{$mgd->nambatdau}}</td>
										<td class="bold text-center"><?php $doituong='doituong_'.$lang;echo $mgd->$doituong;?></td>
										<td class="text-center bold"><?php $noiday='noiday_'.$lang;echo $mgd->$noiday; ?></td>
									</tr>												
								@endforeach
								</tbody>
							</table>
						</div>										
					</div>					
				</section>												

			</div>	
	</div>

</section>

@endsection

@section('script')
	

	<script type="text/javascript">		

	$(document).on('click','.tab',function(){
		var id=$(this).data("id");    	
		$('.pannel'+id).slideToggle('slow');
	});

	$(document).on('click','.tab2',function(){
    	var id=$(this).data("id"); 
    	$('#pannel'+id).slideToggle('slow');
    });

  </script>
@endsection

