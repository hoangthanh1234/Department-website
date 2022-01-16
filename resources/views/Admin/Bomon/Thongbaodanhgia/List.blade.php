@extends('Admin.Master')
@section('title','danh sách thông báo đánh giá giảng viên')
@section('content') 
  <div class="h3 text-center" style="padding-bottom:15px;"> Danh sách thông báo đánh giá giảng viên</div>


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
                            <table  class="table table-bordered table-striped" style="width:100%">
                                  <thead>                 
                                      <tr class="bg-top">
                                          <th width="5%">STT</th>    
                                          <th width="5%" class="text-center">Chi tiết</th>   
                                          <th width="8%" class="text-center">PDF GV</th>  
                                          <th width="8%" class="text-center">PDF BM</th> 
                                          <th width="8%" class="text-center">PDF TH</th>        
                                          <th>Tên thông báo</th> 
                                          <th width="10%" class="text-center">Ngày BĐ</th>
                                          <th width="10%" class="text-center">Ngày KT</th>                                  
                                      </tr>
                                  </thead>  
                                  <tfoot>                             
                                    <th class="text-center"></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th class="text-center"></th>
                                    <th class="text-center"></th>   
                                    <th class="text-center"></th>                                
                                  </tfoot> 
                                  <tbody>   
                                    <?php $i=1; ?>
                                  @foreach($Thongbao as $TB) 
                                    @if($TB->hienthi==1)                                 
                                      <tr>
                                             
                                               <td class="text-center">
                                                    <input type="text" name="" value="{{$i++}}" style="width:50px; text-align: center;" readonly>
                                               </td>  

                                               <td class="text-center" style="width:100px;">  
                                                @if($TB->trangthai==1)                                                 
                                                      <a title="xem danh sách đánh giá của giảng viên thuộc bộ môn" data-toggle="tooltip" href="set_bomon/thongbaodanhgia/danhsachdanhgia/{{$TB->id}}"><img src="ht96_admin/media/images/edit1.png"  border="0"/>
                                                @else
                                                 Quá hạn
                                                @endif
                                                </td> 

                                                <td class="text-center" title="Xuất danh sách phiếu đánh giá theo kết quả đánh giá giảng viên"><a href="set_bomon/PDF/theodiemgv/{{$TB->id}}">Export</a></td>
                                                <td class="text-center" title="Xuất danh sách phiếu đánh giá theo kết quả đánh giá bộ môn"><a  href="set_bomon/PDF/theodiembm/{{$TB->id}}">Export</a></td> 
                                                <td class="text-center" title="Xuất danh sách phiếu đánh giá tổng hợp"><a  href="set_bomon/PDF/tongthe/{{$TB->id}}">Export</a></td> 

                                                <td title="{{$TB->ten}}"><?php echo substr($TB->ten,0,134);?></td>  

                                                <td class="text-center">{{date('d-m-Y', strtotime($TB->ngaybatdau))}}</td>  
    
                                                <td class="text-center">{{date('d-m-Y', strtotime($TB->ngayketthuc))}}</td>

                                                                                               
                                                
                                        </tr>
                                      @endif  
                                        @endforeach                          
                                    </tbody> 
                            </table> 
                        </div> 
                      </form>  
            </div>
          
               <!--  -->
                   
@endsection
