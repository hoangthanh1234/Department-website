@extends('Admin.Khoa.Hosokhoahoc.Master')
@section('Tabvalue')
<div role="tabpanel" class="tab-pane  @if ($tab==3) active @endif" id="profile">	
<p class="ten2x" style="font-size:20px;margin-top:30px;margin-bottom:30px;">Đề tài nghiên cứu khoa học</p>
<div class="table-responsive">
 <table class="table table-bordered table-striped example2" style="width:100%;">
    <thead>                 
        <tr class="bg-top">                                
            <th width="5%" class="text-center">STT</th> 
            <th width="10%">Nổi bật</th>
            <th class="text-center">Tên dề tài</th>                                                        
            <th width="10%" class="text-center">Cấp đề tài</th>      
            <th width="10%" class="text-center">Trạng thái</th>
            <th width="10%" class="text-center">Minh chứng</th> 
        </tr>
    </thead>
    <tfoot>
        <tr>   
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>                       
        </tr>                                  	
    </tfoot> 

    <tbody>   
 <?php $i=1; ?>
 @foreach($CT_detai as $CTDT)                                  
   <tr>       	
        <td align="center">{{$i++}}</td>  
        <td class="text-center" width="10%">
            <?php $f=($CTDT->detai->noibat==1)?"diamondToggleOff":""; ?>
            <a data-val2="ht96_detainghiencuu" rel="{$CTDT->detai->noibat}" data-val3="noibat" class="checktt diamondToggle <?=$f;?>"  data-val0="{{$CTDT->detai->id}}" ></a>   
        </td>     
        <td>{{$CTDT->detai->ten_vi}}</td>
		<td class="text-center">{{$CTDT->detai->capdetai->ten_vi}}</td>
		<td class="text-center">{{$CTDT->detai->trangthai}}</td>
		<td class="text-center">@if ($CTDT->detai->minhchung!='') 
			<a style="background:transparent;color:blue;" href="{{$CTDT->detai->minhchung}}"  target="_blank">Có</a> @endif
		</td>								

    </tr>
@endforeach 
</tbody> 
</table> 
</div>
</div>
@endsection


