@extends('Admin.Master')
@section('title','danh sách  giá giảng viên bộ môn')
@section('content') 
  <div class="h3 text-center" style="padding-bottom:15px;font-size:18px;"> Danh sách  đánh giá giảng viên bộ môn @if($Danhsach != null) {{$Danhsach[0]->tenbomon}} theo <p></p> {{$Danhsach[0]->ten}} @endif </div>


  <div class="box">   

             <div class="container" style="max-width:500px;margin-top:20px;">
                   @if(session('thongbao'))
                      <div class="alert alert-success">
                          {{session('thongbao')}}
                      </div>
                  @endif
             </div>
  <!-- 
             <div class="row padding20">
                <div class="col-lg-6 col-md-6 col-xs-12">
                   <b class="ten2x">Thông báo</b><br>
                    <select class="form-control select2" id="locds">
                      <option value="0"> Chọn Thông báo đánh giá</option>
                      @foreach($Thongbaodanhgia as $tb)
                        <option value="{{$tb->id}}">{{$tb->ten}}</option>
                      @endforeach
                    </select>
                   <br/> 
                </div>
            </div> -->

            <div class="box-body">     
                   
                      <form name="frm" method="post" action="" enctype="multipart/form-data" >
                        <div class="table-responsive">
                            <a href="set_bomon/thongbaodanhgia/list"><input type="button" class="btn btn-danger pull-right" value="Thoát" name="" style="margin-bottom:20px;"></a>
                            <table id="example2" class="table table-bordered table-striped" style="width:100%">
                                  <thead>                 
                                      <tr class="bg-top">
                                          <th width="5%" class="text-center">STT</th> 
                                           <th width="10%"  title="Xem chi tiết đánh giá này" class="text-center">Chi tiết</th>
                                          <th width="10%" class="text-center">MSGV</th>
                                          <th>Tên Giảng viên</th> 
                                          @foreach($Tieuchuan as $TC)
                                          <th  title="{{$TC->ten}}" width="5%" class="text-center">TC{{$TC->stt}}</th>
                                          @endforeach
                                          <th width="5%" title="Tổng điểm" class="text-center">Tổng</th>
                                      </tr>
                                  </thead>  
                                  <tfoot>                             
                                   
                                    <th class="text-center"></th>
                                    <th class="text-center"></th>
                                    <th class="text-center"></th>
                                    @foreach($Tieuchuan as $TC)
                                      <th class="text-center"></th>
                                    @endforeach
                                    <th class="text-center"></th>   
                                    <th class="text-center"></th>                                
                                  </tfoot> 
                                  <tbody>   
                                    <?php $i=1; ?>
                                  @foreach($Danhsach as $ds)                                  
                                      <tr>
                                             
                                               <td class="text-center">
                                                    <input type="text" name="" value="{{$i++}}" style="width:50px; text-align: center;" readonly>
                                               </td> 

                                               <td class="text-center"><a title="xem kết quả đánh giá chi tiết của giảng viên này" data-toggle="tooltip" href="set_bomon/thongbaodanhgia/danhgia/P={{$ds->id_phieu}}"><img src="ht96_admin/media/images/edit1.png"  border="0"/></a></td>

												                        <td class="text-center">{{$ds->maso}}</td>
                                              <?php $tong2=0; ?>
                                                <td>{{$ds->tengiangvien}}</td> 
												
                                                  @foreach($Tieuchuan as $TC)                                                  
                                          			   <td  class="text-center">
                                                     <?php $tong=0; ?>
                                                    @foreach($CT_danhgia as $chi)
                                                        @if($chi->tieuchi->tieuchuan->id==$TC->id && $ds->id_phieu == $chi->id_phieudanhgia)
                                                              <?php $tong+=$chi->diemdat?>
                                                             
                                                        @endif
                                                    @endforeach
                                                    {{$tong}}
                                                   </td>
                                                   <?php $tong2+=$tong ?>
                                         		     @endforeach
    
                                                <td  class="text-center">{{$tong2}}</td>

                                                                                                
                                                
                                        </tr>  
                                        @endforeach                          
                                    </tbody> 
                            </table> 
                            <a href="set_bomon/thongbaodanhgia/list"><input type="button" class="btn btn-danger pull-right" value="Thoát" name=""></a> 
                        </div>

                      </form>  
             
            </div>
          
              
                   
@endsection

@section('script')

<!-- <script type="text/javascript">
    $(document).on('change','#locds',function(){
      if($(this).val()!=0)
        window.location="set_bomon/thongbaodanhgia/danhsachdanhgia/"+$(this).val();
    });

</script> -->

@endsection