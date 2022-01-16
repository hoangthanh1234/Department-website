@extends('Admin.Master')
@section('title','danh sách phiếu đánh giá giảng viên')
@section('content') 
  <div class="h3 text-center" style="padding-bottom:15px;font-size:20px;"> Danh sách đánh giá giảng viên bộ môn @if(count($Phieudanhgia)>0) {{$Phieudanhgia[0]->giangvien->bomon->ten_vi}}@endif </div>


<div class="box">   

    <div class="container" style="max-width:500px;margin-top:20px;">
        @if(session('thongbao'))
            <div class="alert alert-success">
               {{session('thongbao')}}
            </div>
        @endif
   </div>
   <div class="box-body">  
        <form name="frm" method="post" action="" enctype="multipart/form-data" >
        <div class="table-responsive">
        <a href="set_admin/danh-gia-vien-chuc/danh-sach-bo-mon">
        	<input type="button" class="btn btn-danger pull-right" value="Thoát" name="" style="margin-bottom:20px;">
        </a>
            <table id="example2" class="table table-bordered table-striped" style="width:100%">
                <thead>                 
                    <tr class="bg-top">
                        <th width="5%" class="text-center">STT</th> 
                        <th width="10%"  title="Xem chi tiết đánh giá này" class="text-center">Chi tiết</th>
                        <th class="text-center">Tên giảng viên</th>
                        <th width="10%" class="text-center">Giảng dạy</th>
                        <th width="10%" class="text-center">Bài báo</th>
                        <th width="10%" class="text-center">Đề tài</th>
                        <th width="10%" class="text-center">Khác</th>
                        <th width="10%" class="text-center">Tổng</th>
                        <th width="10%" class="text-center">Giờ NCKH</th>

                </thead>  
                <tfoot>                             
                    <tr>         
                    	<th class="text-center"></th>
                    	<th class="text-center"></th>
                        <th class="text-center"></th>
                        <th class="text-center"></th>   
                        <th class="text-center"></th>
                        <th class="text-center"></th>  
                        <th class="text-center"></th>
                        <th class="text-center"></th>
                        <th class="text-center"></th>
                    </tr>                              
               </tfoot> 
               <tbody>   
                <?php $i=1; ?>
                @foreach($Phieudanhgia as $pdg)                                  
                     <tr>                                             
                        <td class="text-center">
                           {{$i++}}
                        </td> 

                        <td class="text-center">
                        	<a title="xem kết quả đánh giá chi tiết của giảng viên này" data-toggle="tooltip" href="set_admin/danh-gia-vien-chuc/{{$pdg->giangvien->tenkhongdau}}/giang-day/1/{{$pdg->id}}"><i class="fa fa-wrench fa-2x" aria-hidden="true"></i></a>
                        </td>					
                                              
                        <td>{{$pdg->giangvien->ten}}</td>                        

                        <td class="text-center">{{$pdg->phieugiangdaykhoaduyet->sum('diemdatkhoa')}}</td>

                        <td class="text-center">
                           <?php $tong=0;?>
                            @foreach($pdg->phieu_nckh_baibaokhoaduyet as $pbb) 
                                    <?php $tong+=$pbb->tieuchi->diem; ?>
                            @endforeach 
                            {{$tong}}    
                        </td>

                        <td class="text-center">
                            <?php $tong2=0;?>
                            @foreach($pdg->phieu_nckh_detaikhoaduyet as $pdt)  
                                    <?php $tong2+=$pdt->tieuchi->diem; ?> 
                            @endforeach 
                            {{$tong2}}
                        </td>

                        <td class="text-center">{{$pdg->phieukhackhoaduyet->sum('diemdatkhoa')}}</td>

                        <td class="text-center">
                        	<?php echo ($pdg->phieugiangdaykhoaduyet->sum('diemdatkhoa')+$tong+$tong2+$pdg->phieukhackhoaduyet->sum('diemdatkhoa')); ?>
                        </td>
                        <td>
                            <?php $tong_nckh=0;?>
                             @foreach($pdg->phieu_nckh_baibaokhoaduyet as $pbb) 
                                    <?php $tong_nckh+=$pbb->tieuchi->gio; ?>
                            @endforeach 
                             @foreach($pdg->phieu_nckh_detaikhoaduyet as $pdt)  
                                    <?php $tong_nckh+=$pdt->tieuchi->gio; ?> 
                            @endforeach 
                            <?php $tong_nckh+=$pdg->phieukhackhoaduyet->sum('gio'); ?> 
                            {{ $tong_nckh }}
                        </td>
                    </tr>  
                @endforeach                          
                </tbody> 
            </table> 
        <a href="set_admin/danh-gia-vien-chuc/danh-sach-bo-mon"><input type="button" class="btn btn-danger pull-right" value="Thoát" name=""></a> 
   </div>
 </form>  
</div>
          
              
                   
@endsection

@section('script')

<!-- <script type="text/javascript">
    $(document).on('change','#locds',function(){
      if($(this).val()!=0)
        window.location.href ="set_bomon/thongbaodanhgia/danhsachdanhgia/"+$(this).val();
    });

</script> -->

@endsection