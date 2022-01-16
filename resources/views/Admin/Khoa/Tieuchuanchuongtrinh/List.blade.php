@extends('Admin.Master')
@section('title','Danh sách tiêu chuẩn chương trình')
@section('content')

<div class="h3 padding20 text-center">Danh sách tiêu chuẩn chương trình</div>
    <div class="box"> 
             <div class="container" style="max-width:500px;margin-top:20px;">
                   @if(session('thongbao'))
                      <div class="alert alert-success">
                          {{session('thongbao')}}
                      </div>
                  @endif
             </div>
            <div class="box-body">   

              <div class="row">                
                
                <div class="col-lg-12 col-md-12">
                  <label class="ten2x">Chọn chương trình</label>
                  <select class="form-control select2" id="chonchuongtrinh">
                    <option value="0">Chọn chương trình</option>
                    @foreach($Chuongtrinh as $ct)
                      <option value="{{$ct->id}}">{{$ct->ten_vi}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
<br>

                      <form name="frm" method="post" action="" enctype="multipart/form-data" >
                          <div class="table-responsive">
                            <table class="table table-bordered table-hover example2" style="width:100%">
                                  <thead>                 
                                      <tr class="bg-top">                                          
                                          <th width="5%" class="text-center">STT</th>
                                          <th width="5%" class="text-center">Hành động</th>
                                          <th width="8%" class="text-center">Học kỳ</th>                 
                                          <th width="5%" class="text-center">TCBB</th> 
                                          <th width="5%" class="text-center">THBB</th>
                                          <th width="5%" class="text-center">LTBB</th> 
                                          <th width="5%"class="text-center">TCTC</th> 
                                          <th width="5%" class="text-center">THTC</th>
                                          <th width="5%" class="text-center">LTTC</th> 
                                      </tr>
                                  </thead>   
                                  <tbody>   
                                    <?php $i=1;?>
                                  @foreach($Tieuchuanchuongtrinh as $TC)                                  
                                      <tr>
                                          <td class="text-center">{{$i++}}</td>
                                          <td class="text-center">                                                   
                                              <a title="Cập nhật" href="set_admin/tieu-chuan-chuong-trinh/edit/{{$TC->id_chuongtrinh}}/{{$TC->id_hocky}}" class="btn btn-warning"><i class="fa fa-edit white"></i></a>
                                           
                                               <a href="set_admin/tieu-chuan-chuong-trinh/one_delete/{{$TC->id_chuongtrinh}}/{{$TC->id_hocky}}" onClick="if(!confirm('Xác nhận xóa:')) return false;" class="btn btn-danger"><i class="fa fa-times white"></i>
                                               </a>
                                          </td> 
                                          <td class="text-center">{{$TC->hocky->ten}}</td>
                                          <td class="text-center">{{$TC->TCBB}}</td>
                                          <td class="text-center">{{$TC->LTBB}}</td>
                                          <td class="text-center">{{$TC->THBB}}</td>
                                          <td class="text-center">{{$TC->TCTC}}</td>
                                          <td class="text-center">{{$TC->LTTC}}</td>
                                          <td class="text-center">{{$TC->THTC}}</td>                                               
                                        </tr>  
                                        @endforeach                          
                                    </tbody> 
                            </table> 
                          </div> 
                        </form>  
            </div>
          
                      
            <div class="text-center">
               <a href="set_admin/tieu-chuan-chuong-trinh/add"><button class=" btn btn-success btn2">Thêm</button></a>             
            </div>
    @endsection


@section('script')
  <script type="text/javascript">
      $(document).on('change','#chonchuongtrinh',function(){
        var id = $(this).val();
        window.location.href = "set_admin/tieu-chuan-chuong-trinh/list/"+id;
      });
  </script>
@endsection
