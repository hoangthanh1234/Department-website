@extends('Admin.Khoa.Hosokhoahoc.Master')
@section('Tabvalue')
<div role="tabpanel" class="tab-pane @if ($tab==4) active @endif" id="profile">
<p class="ten2x" style="font-size:20px;margin-top:30px;margin-bottom:30px;">Bài báo, báo cáo khoa học </p>
 <div class="table-responsive">
 <table  class="table table-bordered table-striped example2" style="width:100%">
                         <thead>                 
                            <tr class="bg-top">                                
                                <th width="15%" class="text-center">Tên tác phẩm</th> 
                                <th width="20%" class="text-center">Tên tạp chí/NXB/Nơi cấp</th>
                                <th width="5%" class="text-center">Năm</th>
                                <th width="10%" class="text-center">MC</th>
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
                          @foreach($Chitietbaibao as $CT)                                  
                            <tr>				
								<td>{{$CT->baibao->ten_vi}}</td>								
								<td>{{$CT->baibao->nxb_vi}}</td>										
								<td class="text-center">{{date('Y', strtotime($CT->baibao->nam))}}</td>
								<td class="text-center">@if ($CT->baibao->minhchung!='khong' && $CT->baibao->minhchung!='') <a style="background:transparent;color:blue;" href="{{$CT->baibao->minhchung}}"  target="_blank">Có</a> @endif</td>	
                            </tr>

@endforeach 
</tbody> 
	</table> 
</div>
@endsection


