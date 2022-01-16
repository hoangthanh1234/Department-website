@extends('Admin.Master')
@section('title','danh sách phiếu đánh giá giảng viên')
@section('content') 
<div class="text-center ten2x" style="font-size:30px;color:red;font-weight:normal;"> Danh sách đánh giá giảng viên bộ môn @if($Phieudanhgia != null) {{$Phieudanhgia[0]->giangvien->bomon->ten_vi}}@endif </div>


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

            <a href="set_bomon">
                <input type="button" class="btn btn-danger pull-right" value="Thoát" style="margin-bottom:20px;">
            </a>

            <a href="set_bomon/PDF/theodiemgv/{{$Thongbaodanhgia->id}}" target="_blank">
                <input type="button" class="btn btn-success pull-right" value="Xuất PDF theo điểm GV" style="margin-right:10px;">
            </a>

            <a href="set_bomon/PDF/theodiembm/{{$Thongbaodanhgia->id}}" target="_blank">
                <input type="button" class="btn btn-success pull-right" value="Xuất PDF theo điểm BM" style="margin-right:10px;">
            </a>

            <a href="set_bomon/PDF/tongthe/{{$Thongbaodanhgia->id}}" target="_blank">
                <input type="button" class="btn btn-success pull-right" value="Xuất PDF tổng thể" style="margin-right:10px;">
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
                        	<a title="xem kết quả đánh giá chi tiết của giảng viên này" data-toggle="tooltip" href="set_bomon/danh-gia-vien-chuc/{{$pdg->giangvien->tenkhongdau}}/giang-day/1/{{$pdg->id}}"><i class="fa fa-wrench fa-2x" aria-hidden="true"></i></a>
                        </td>					
                                              
                        <td>{{$pdg->giangvien->ten}}</td>                        

                        <td class="text-center">{{$pdg->phieugiangdaybomonduyet->sum('diemdatbomon')}}</td>

                        <td class="text-center">
                            <?php $tong=0;?>
                            @foreach($pdg->phieu_nckh_baibaobomonduyet as $pbb) 
                                    <?php $tong+=$pbb->tieuchi->diem; ?>
                            @endforeach 
                            {{$tong}}                           
                        </td>

                        <td class="text-center">
                            <?php $tong2=0;?>
                            @foreach($pdg->phieu_nckh_detaibomonduyet as $pdt) 
                                    <?php $tong2+=$pdt->tieuchi->diem;?> 
                            @endforeach 
                            {{$tong2}}
                        </td>

                        <td class="text-center">{{$pdg->phieukhacbomonduyet->sum('diemdatbomon')}}</td>

                        <td class="text-center">
                        	<?php echo ($pdg->phieugiangdaybomonduyet->sum('diemdatbomon')+$tong+$tong2+$pdg->phieukhacbomonduyet->sum('diemdatbomon')); ?>
                        </td>
                    </tr>  
                @endforeach                          
                </tbody> 
    </table> 
<a href="set_bomon">
    <input type="button" class="btn btn-danger pull-right" value="Thoát" style="margin-bottom:20px;">
</a>

<a href="set_bomon/PDF/theodiemgv/{{$Thongbaodanhgia->id}}" target="_blank">
    <input type="button" class="btn btn-success pull-right" value="Xuất PDF theo điểm GV" style="margin-right:10px;">
</a>

<a href="set_bomon/PDF/theodiembm/{{$Thongbaodanhgia->id}}" target="_blank">
    <input type="button" class="btn btn-success pull-right" value="Xuất PDF theo điểm BM" style="margin-right:10px;">
</a>

<a href="set_bomon/PDF/tongthe/{{$Thongbaodanhgia->id}}" target="_blank">
    <input type="button" class="btn btn-success pull-right" value="Xuất PDF tổng thể" style="margin-right:10px;">
</a>
</div>
</form>    
</div>           
@endsection
